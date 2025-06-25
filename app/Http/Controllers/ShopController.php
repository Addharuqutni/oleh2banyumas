<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Review;
use App\Models\Category;
use App\Helpers\LocationHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ShopController extends Controller
{
    /**
     * Fungsi ini menampilkan daftar toko pada halaman utama pengguna.
     * Jika tersedia, lokasi pengguna akan digunakan untuk mengurutkan toko berdasarkan jarak terdekat.
     */
    public function index(Request $request)
    {
        // Ambil data lokasi pengguna dari parameter request (jika tersedia)
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');

        // Tentukan apakah informasi lokasi pengguna dapat digunakan
        $useLocation = $userLat && $userLng;

        // Ambil semua toko yang berstatus aktif untuk ditampilkan dalam daftar dan peta
        $shops = Shop::where('status', 'active')
            ->with(['products' => function($query) {
                $query->where('is_available', true)->with('categories');
            }]) // Load relasi produk yang tersedia dan kategorinya
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug', 'has_delivery')
            ->orderBy('name') // Urutkan berdasarkan nama toko
            ->get();

        // Ambil semua kategori untuk filter
        $categories = Category::orderBy('name')->get();

        // Ambil daftar toko yang populer berdasarkan jumlah kunjungan
        $popularShops = $this->getPopularShops(4);

        // Jika lokasi pengguna diketahui, lakukan pengurutan toko berdasarkan jarak dan ambil 4 toko terdekat
        if ($useLocation) {
            $shops = $this->sortShopsByDistance($shops, $userLat, $userLng);
            $nearbyShops = $shops->take(4); // Ambil hanya 4 toko terdekat
        } else {
            // Jika tidak ada informasi lokasi, variabel toko terdekat diisi dengan koleksi kosong
            $nearbyShops = collect();
        }

        // Tampilkan tampilan 'toko' dengan data toko lengkap, toko populer, dan toko terdekat (jika ada)
        return view('toko', compact('shops', 'popularShops', 'nearbyShops', 'useLocation', 'categories'));
    }

    /**
     * Fungsi ini digunakan untuk mengurutkan daftar toko berdasarkan jarak dari posisi pengguna.
     * Diperlukan koordinat latitude dan longitude pengguna untuk menghitung estimasi jarak ke tiap toko.
     */
    private function sortShopsByDistance($shops, $userLat, $userLng)
    {
        // Lakukan perhitungan jarak antara tiap toko dan lokasi pengguna
        $shopsWithDistance = $shops->map(function ($shop) use ($userLat, $userLng) {

            // Gunakan helper untuk mengukur jarak antara dua koordinat
            $distance = LocationHelper::calculateDistance(
                $userLat,
                $userLng,
                $shop->latitude,
                $shop->longitude
            );

            // Simpan hasil perhitungan jarak ke dalam properti baru di setiap objek toko
            $shop->distance = round($distance, 2);

            return $shop;
        });

        // Setelah jarak diketahui, urutkan seluruh toko dari yang paling dekat ke yang paling jauh
        return $shopsWithDistance->sortBy('distance');
    }

    /**
     * Menampilkan halaman daftar toko lengkap dengan fitur pencarian dan filter kategori.
     * Fungsi ini juga mendukung pengurutan berdasarkan jarak jika koordinat pengguna tersedia.
     */
    public function listToko(Request $request)
    {
        // Ambil seluruh kategori yang tersedia untuk ditampilkan di menu dropdown filter
        $categories = Category::orderBy('name')->get();

        // Mulai query toko aktif sebagai dasar pencarian
        $query = Shop::where('status', 'active');

        // Jika pengguna mengisi kolom pencarian, lakukan pencocokan kata kunci
        if ($request->filled('search')) {
            $search = $request->input('search');

            // Simpan data pencarian untuk kebutuhan statistik
            $this->logSearchQuery($search);

            // Terapkan filter pencarian terhadap nama, alamat, deskripsi toko, dan produk terkait
            // objek query builder
            // Closure memudahkan filter pencarian multikolom & relasi.
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('products', function ($productQuery) use ($search) {
                        $productQuery->where('name', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%');
                    });
            });
        }

        // Inisialisasi variabel kategori yang sedang dipilih
        $selectedCategory = null;

        // Jika pengguna memilih kategori tertentu, filter toko berdasarkan produk dalam kategori tersebut
        if ($request->filled('category_id') && $request->category_id != '') {
            $categoryId = $request->category_id;
            $selectedCategory = Category::find($categoryId);

            // Cari toko yang memiliki produk dengan kategori tersebut menggunakan relasi many-to-many
            $query->whereHas('products', function ($q) use ($categoryId) {
                $q->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            });

            // Muat produk yang sesuai dengan kategori agar dapat langsung digunakan di view
            $query->with(['products' => function ($q) use ($categoryId) {
                $q->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            }]);
        }

        // Ambil koordinat lokasi pengguna jika tersedia (biasanya dari browser)
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;

        // Pilih field-field penting dari setiap toko untuk ditampilkan
        $shops = $query->select(
            'id',
            'name',
            'address',
            'featured_image',
            'description',
            'slug',
            'has_delivery',
            'latitude',
            'longitude'
        );

        // Jika lokasi pengguna tersedia, urutkan toko berdasarkan jarak terdekat
        if ($useLocation) {
            $allShops = $shops->get();
            $sortedShops = $this->sortShopsByDistance($allShops, $userLat, $userLng);

            // Lakukan pemisahan hasil berdasarkan halaman untuk keperluan pagination
            $page = $request->input('page', 1);
            $perPage = 12;
            $offset = ($page - 1) * $perPage;

            $paginatedShops = new \Illuminate\Pagination\LengthAwarePaginator(
                $sortedShops->slice($offset, $perPage),
                $sortedShops->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );

            $shops = $paginatedShops;
        } else {
            // Jika tidak ada lokasi pengguna, urutkan alfabetis dan paginasi biasa
            $shops = $shops->orderBy('name')
                ->paginate(12)
                ->appends($request->except('page')); // Tambahan untuk menjaga filter saat pindah halaman
        }

        // Kirim data ke view untuk ditampilkan ke pengguna
        return view('tokoPage.listToko', compact('shops', 'categories', 'selectedCategory', 'useLocation'));
    }

    /**
     * Fungsi ini bertujuan untuk menyimpan log pencarian pengguna
     * Tujuannya adalah untuk menganalisis pola pencarian yang dilakukan melalui fitur pencarian toko.
     */
    private function logSearchQuery($query)
    {
        try {
            // Buat entri baru ke dalam tabel SearchLog untuk merekam kata kunci yang dicari,
            // alamat IP pengguna, dan informasi perangkat yang digunakan
            \App\Models\SearchLog::create([
                'query' => $query,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent()
            ]);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat proses penyimpanan log, catat pesan error ke dalam sistem log Laravel
            Log::error('Gagal mencatat log pencarian: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan tampilan peta yang berisi lokasi semua toko aktif.
     * Jika pengguna memberikan lokasi mereka, maka informasi jarak akan dihitung dan digunakan untuk pengurutan.
     */
    public function maps(Request $request)
    {
        // Ambil koordinat lokasi pengguna jika tersedia dari parameter permintaan
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');

        // Tentukan apakah lokasi pengguna valid untuk dipakai
        $useLocation = $userLat && $userLng;

        // Ambil semua data toko yang statusnya aktif, termasuk informasi lokasi dan gambar utamanya
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'slug', 'featured_image')
            ->get();

        // Jika tersedia data koordinat pengguna, hitung jarak dari setiap toko ke lokasi tersebut
        if ($useLocation) {
            $shops = $this->sortShopsByDistance($shops, $userLat, $userLng);
        }

        // Kirim data toko dan lokasi ke view peta untuk ditampilkan ke pengguna
        return view('landingPage.maps', compact('shops', 'useLocation', 'userLat', 'userLng'));
    }

    /**
     * Menampilkan detail dari sebuah toko berdasarkan data model yang di-inject melalui slug (Route Model Binding).
     * Jika toko tidak aktif, pengguna akan diarahkan ke halaman 404.
     */
    public function show(Shop $shop)
    {
        // Jika status toko bukan "active", maka tampilkan halaman tidak ditemukan
        if ($shop->status !== 'active') {
            abort(404);
        }

        // Catat kunjungan pengguna ke toko ini untuk kebutuhan statistik atau analisis
        $this->logShopVisit($shop);

        // Muat relasi produk (hanya yang tersedia) dan gambar-gambar toko untuk ditampilkan di halaman detail
        $shop->load([
            'products' => function ($query) {
                $query->where('is_available', true);
            },
            'images'
        ]);

        // Ambil semua ulasan yang telah disetujui untuk toko ini dan urutkan berdasarkan waktu pembuatan
        $reviews = $shop->reviews()
            ->where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Temukan toko lain yang berada dalam kategori produk yang serupa
        $relatedShops = $this->getRelatedShops($shop);

        // Tampilkan halaman detail toko dengan data toko, ulasan, dan toko lain yang relevan
        return view('tokoPage.detailToko', compact('shop', 'reviews', 'relatedShops'));
    }

    /**
     * Fungsi ini mencatat setiap kunjungan pengguna ke halaman detail toko.
     * Data ini bisa digunakan untuk keperluan analitik, seperti mengukur tingkat popularitas toko.
     */
    private function logShopVisit($shop)
    {
        try {
            // Simpan informasi kunjungan ke dalam tabel visitor_logs
            // Informasi yang dicatat meliputi ID toko, alamat IP, user agent, dan jenis perangkat pengguna
            \App\Models\VisitorLog::create([
                'shop_id'     => $shop->id,
                'ip_address'  => request()->ip(),
                'user_agent'  => request()->userAgent(),
                'device_type' => $this->getDeviceType(request()->userAgent())
            ]);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan selama pencatatan kunjungan, tulis log error-nya agar bisa dianalisis nanti
            Log::error('Terjadi kesalahan saat mencatat kunjungan toko: ' . $e->getMessage());
        }
    }

    /**
     * Fungsi ini berfungsi untuk mendeteksi jenis perangkat yang digunakan pengguna berdasarkan user agent-nya.
     * Tujuannya adalah mengkategorikan perangkat menjadi: mobile, tablet, atau desktop.
     */
    private function getDeviceType($userAgent)
    {
        // Cek apakah user agent cocok dengan pola umum perangkat mobile
        if (
            preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent)
            || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|...|zte\-/i', substr($userAgent, 0, 4)) // Pola tambahan prefix dari string awal
        ) {
            return 'mobile'; // Kembalikan jenis perangkat sebagai mobile
        }

        // Jika cocok dengan pola umum tablet
        if (preg_match('/tablet|ipad|playbook|silk|android(?!.*mobile)/i', $userAgent)) {
            return 'tablet'; // Kembalikan nilai tablet jika cocok
        }

        // Jika tidak cocok dengan keduanya, anggap sebagai desktop
        return 'desktop';
    }

    /**
     * Fungsi ini bertujuan untuk mengambil daftar toko lain yang menjual produk dengan kategori yang sama
     * seperti toko yang sedang ditampilkan. Digunakan untuk menampilkan rekomendasi toko serupa.
     */
    private function getRelatedShops($shop, $limit = 4)
    {
        // Ambil daftar kategori yang terkait dengan produk milik toko ini
        $categories = Category::whereHas('products', function ($query) use ($shop) {
            $query->where('shop_id', $shop->id);
        })->pluck('id'); // Ambil hanya ID kategorinya

        // Jika tidak ditemukan kategori, kembalikan koleksi kosong
        if ($categories->isEmpty()) {
            return collect();
        }

        // Ambil toko lain (selain toko ini) yang memiliki produk dalam kategori yang sama
        return Shop::where('status', 'active')
            ->where('id', '!=', $shop->id) // Hindari menampilkan toko yang sama
            ->whereHas('products', function ($query) use ($categories) {
                // Filter produk yang memiliki relasi kategori sesuai
                $query->whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('categories.id', $categories);
                });
            })
            ->select('id', 'name', 'address', 'featured_image', 'slug', 'has_delivery') // Ambil kolom penting saja
            ->inRandomOrder()  // Acak hasil agar variasi rekomendasi muncul
            ->take($limit)     // Batasi jumlah toko yang ditampilkan
            ->get();
    }

    /**
     * Fungsi ini bertugas menampilkan halaman detail toko berdasarkan slug yang diberikan.
     * Karena menggunakan Route Model Binding, parameter $shop langsung terisi dengan data toko terkait.
     * Fungsi ini hanyalah pembungkus (alias) yang memanggil fungsi utama `show()`.
     */
    public function detailToko(Shop $shop)
    {
        // Delegasikan proses tampilan detail toko ke fungsi show()
        return $this->show($shop);
    }

    /**
     * Fungsi ini menyimpan ulasan baru yang diberikan oleh pengguna untuk sebuah toko tertentu.
     * Parameter $shop akan otomatis terisi berkat fitur Route Model Binding berdasarkan slug di URL.
     */
    public function storeReview(Request $request, Shop $shop)
    {
        // Validasi input dari formulir ulasan agar sesuai dengan format yang ditentukan
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'rating'  => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        // Hubungkan ulasan ini dengan toko yang sedang dituju
        $validated['shop_id'] = $shop->id;

        // Tandai bahwa ulasan masih menunggu persetujuan admin sebelum ditampilkan
        $validated['is_approved'] = false;

        // Simpan ulasan baru ke database
        Review::create($validated);

        // Hapus cache rating toko agar diperbarui saat data ulasan berubah
        Cache::forget('shop_rating_' . $shop->id);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Terima kasih atas ulasan Anda. Ulasan akan ditampilkan setelah disetujui.');
    }
    
    /**
     * Fungsi ini menampilkan daftar toko yang memiliki produk dalam kategori tertentu.
     * Lokasi pengguna juga dapat digunakan untuk menyusun daftar toko berdasarkan jarak.
     */
    public function filterByCategory($categoryId, Request $request)
    {
        // Ambil data kategori berdasarkan ID, dan hentikan jika tidak ditemukan
        $category = Category::findOrFail($categoryId);

        // Ambil data lokasi pengguna jika tersedia dari request
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;

        // Mulai query untuk mencari toko aktif yang memiliki produk sesuai kategori
        $query = Shop::where('status', 'active')
            ->whereHas('products', function ($query) use ($categoryId) {
                // Gunakan relasi many-to-many untuk filter produk berdasarkan kategori
                $query->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            })
            ->with(['products' => function ($query) use ($categoryId) {
                // Muat hanya produk yang berada dalam kategori yang dipilih
                $query->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            }])
            ->select(
                'id',
                'name',
                'address',
                'featured_image',
                'description',
                'slug',
                'latitude',
                'longitude',
                'has_delivery'
            );

        // Jika data lokasi pengguna tersedia, urutkan berdasarkan jarak
        if ($useLocation) {
            // Ambil semua toko terlebih dahulu untuk diproses manual
            $allShops = $query->get();

            // Hitung jarak dan urutkan dari yang terdekat
            $sortedShops = $this->sortShopsByDistance($allShops, $userLat, $userLng);

            // Buat pagination manual dari hasil yang sudah diurutkan
            $page = $request->input('page', 1);
            $perPage = 12;
            $offset = ($page - 1) * $perPage;

            $shops = new \Illuminate\Pagination\LengthAwarePaginator(
                $sortedShops->slice($offset, $perPage),
                $sortedShops->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            // Jika tidak ada lokasi, gunakan pagination standar dengan urutan nama toko
            $shops = $query->orderBy('name')->paginate(12);
        }

        // Ambil semua kategori untuk menu filter, dan tetapkan kategori yang dipilih
        $categories = Category::orderBy('name')->get();
        $selectedCategory = $category;

        // Tampilkan hasil pada halaman daftar toko
        return view('tokoPage.listToko', compact('shops', 'categories', 'selectedCategory', 'useLocation'));
    }

    /**
     * Fungsi ini digunakan untuk mengambil daftar toko yang paling dekat dari lokasi pengguna.
     * Data dikembalikan dalam format JSON, biasanya digunakan untuk kebutuhan API atau frontend dinamis (AJAX).
     */
    public function getNearbyShops(Request $request)
    {
        try {
            // Pastikan input yang diterima valid: lat dan long wajib ada, limit opsional
            $request->validate([
                'latitude'  => 'required|numeric',
                'longitude' => 'required|numeric',
                'limit'     => 'nullable|integer|min:1|max:20'
            ]);

            // Ambil nilai koordinat dan batas jumlah hasil yang ingin ditampilkan
            $userLat = $request->input('latitude');
            $userLng = $request->input('longitude');
            $limit   = $request->input('limit', 5); // Batas default: 5 toko terdekat

            // Ambil semua toko yang statusnya aktif
            $shops = Shop::where('status', 'active')
                ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug', 'has_delivery')
                ->get();

            // Hitung jarak toko ke lokasi pengguna dan susun dalam bentuk array dengan data lengkap
            $shopsWithDistance = $shops->map(function ($shop) use ($userLat, $userLng) {
                $distance = LocationHelper::calculateDistance(
                    $userLat,
                    $userLng,
                    $shop->latitude,
                    $shop->longitude
                );

                return [
                    'id'             => $shop->id,
                    'name'           => $shop->name,
                    'address'        => $shop->address,
                    'latitude'       => $shop->latitude,
                    'longitude'      => $shop->longitude,
                    'featured_image' => $shop->featured_image,
                    'slug'           => $shop->slug,
                    'has_delivery'   => $shop->has_delivery,
                    'distance'       => round($distance, 2) // Bulatkan jarak ke 2 desimal untuk tampilan
                ];
            });

            // Urutkan berdasarkan nilai jarak dari yang paling dekat, dan ambil sesuai batas yang diminta
            $sortedShops = $shopsWithDistance->sortBy('distance')->take($limit);

            // Kembalikan hasil dalam bentuk JSON untuk dikonsumsi oleh frontend
            return response()->json([
                'status' => 'success',
                'shops'  => $sortedShops->values()->all()
            ]);
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan dan catat ke log error
            Log::error('Error in getNearbyShops: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Fungsi ini digunakan untuk mengambil daftar toko yang paling sering dikunjungi oleh pengguna.
     * Pengurutan didasarkan pada jumlah kunjungan yang tercatat melalui relasi visitorLogs.
     */
    private function getPopularShops($limit = 4)
    {
        return Shop::withCount('visitorLogs') // Hitung jumlah kunjungan yang terkait dengan setiap toko
            ->where('status', 'active')       // Hanya ambil toko yang masih aktif
            ->orderBy('visitor_logs_count', 'desc') // Urutkan dari yang paling banyak dikunjungi
            ->limit($limit)                   // Batasi jumlah toko yang diambil (default: 4)
            ->get([
                'id',
                'name',
                'address',
                'featured_image',
                'slug',
                'has_delivery'
            ]);
    }
}
