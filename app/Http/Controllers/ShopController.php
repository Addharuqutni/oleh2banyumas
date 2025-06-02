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
     * Display a listing of the shops on the main toko page.
     */
    public function index(Request $request)
    {
        // Cek apakah ada parameter lokasi pengguna
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;

        // Get all active shops for both map and card display
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug', 'has_delivery')
            ->orderBy('name')
            ->get();

        // Dapatkan toko populer (yang sering dikunjungi)
        $popularShops = $this->getPopularShops(4);

        // Jika ada lokasi pengguna, urutkan toko berdasarkan jarak
        if ($useLocation) {
            $shops = $this->sortShopsByDistance($shops, $userLat, $userLng);
            $nearbyShops = $shops->take(4);
        } else {
            $nearbyShops = collect(); // Kosong jika tidak ada lokasi
        }

        return view('toko', compact('shops', 'popularShops', 'nearbyShops', 'useLocation'));
    }

    /**
     * Mengurutkan toko berdasarkan jarak dari lokasi pengguna
     */
    private function sortShopsByDistance($shops, $userLat, $userLng)
    {
        // Hitung jarak untuk setiap toko
        $shopsWithDistance = $shops->map(function ($shop) use ($userLat, $userLng) {
            $distance = LocationHelper::calculateDistance(
                $userLat,
                $userLng,
                $shop->latitude,
                $shop->longitude
            );

            $shop->distance = round($distance, 2); // Tambahkan properti distance
            return $shop;
        });

        // Urutkan berdasarkan jarak terdekat
        return $shopsWithDistance->sortBy('distance');
    }

    /**
     * Display the shop list page with category filtering.
     */
    public function listToko(Request $request)
    {
        // Get all categories for the filter dropdown
        $categories = Category::orderBy('name')->get();

        $query = Shop::where('status', 'active');

        // Handle search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $this->logSearchQuery($search); // Log pencarian untuk analisis

            $query->where(function ($q) use ($search) {
                // Search in shop name and address
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    // Search in related products
                    ->orWhereHas('products', function ($productQuery) use ($search) {
                        $productQuery->where('name', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%');
                    });
            });
        }

        // Handle category filter
        $selectedCategory = null;
        if ($request->filled('category_id') && $request->category_id != '') {
            $categoryId = $request->category_id;
            $selectedCategory = Category::find($categoryId);

            // Menggunakan relasi many-to-many yang benar
            $query->whereHas('products', function ($q) use ($categoryId) {
                $q->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            });

            // Jika kategori dipilih, muat produk yang termasuk dalam kategori tersebut
            $query->with(['products' => function ($q) use ($categoryId) {
                $q->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            }]);
        }

        // Cek apakah ada parameter lokasi pengguna
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;

        // Make sure to select necessary fields for URL generation and display
        $shops = $query->select('id', 'name', 'address', 'featured_image', 'description', 'slug', 'has_delivery', 'latitude', 'longitude');

        // Jika ada lokasi pengguna, urutkan berdasarkan jarak
        if ($useLocation) {
            $allShops = $shops->get();
            $sortedShops = $this->sortShopsByDistance($allShops, $userLat, $userLng);

            // Konversi collection ke paginator
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
            // Jika tidak ada lokasi, gunakan pagination biasa
            $shops = $shops->orderBy('name')
                ->paginate(12)
                ->appends($request->except('page')); // Keep filter parameters when paginating
        }

        return view('tokoPage.listToko', compact('shops', 'categories', 'selectedCategory', 'useLocation'));
    }

    /**
     * Log pencarian untuk analisis
     */
    private function logSearchQuery($query)
    {
        try {
            \App\Models\SearchLog::create([
                'query' => $query,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent()
            ]);
        } catch (\Exception $e) {
            Log::error('Error logging search query: ' . $e->getMessage());
        }
    }

    /**
     * Display a map of all shops.
     */
    public function maps(Request $request)
    {
        // Cek apakah ada parameter lokasi pengguna
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;

        // Include slug field for URL generation if needed
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'slug', 'featured_image')
            ->get();

        // Jika ada lokasi pengguna, tambahkan informasi jarak
        if ($useLocation) {
            $shops = $this->sortShopsByDistance($shops, $userLat, $userLng);
        }

        return view('landingPage.maps', compact('shops', 'useLocation', 'userLat', 'userLng'));
    }

    /**
     * Display the specified shop.
     * Uses Route Model Binding - will automatically work with slug
     */
    public function show(Shop $shop)
    {
        if ($shop->status !== 'active') {
            abort(404);
        }

        // Log kunjungan toko
        $this->logShopVisit($shop);

        $shop->load(['products' => function ($query) {
            $query->where('is_available', true);
        }, 'images']);

        $reviews = $shop->reviews()
            ->where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Dapatkan toko lain dengan kategori serupa
        $relatedShops = $this->getRelatedShops($shop);

        return view('tokoPage.detailToko', compact('shop', 'reviews', 'relatedShops'));
    }

    /**
     * Log kunjungan toko untuk analisis
     */
    private function logShopVisit($shop)
    {
        try {
            \App\Models\VisitorLog::create([
                'shop_id' => $shop->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device_type' => $this->getDeviceType(request()->userAgent())
            ]);
        } catch (\Exception $e) {
            Log::error('Error logging shop visit: ' . $e->getMessage());
        }
    }

    /**
     * Mendeteksi jenis perangkat dari user agent
     */
    private function getDeviceType($userAgent)
    {
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($userAgent, 0, 4))) {
            return 'mobile';
        }

        if (preg_match('/tablet|ipad|playbook|silk|android(?!.*mobile)/i', $userAgent)) {
            return 'tablet';
        }

        return 'desktop';
    }

    /**
     * Mendapatkan toko lain dengan kategori serupa
     */
    private function getRelatedShops($shop, $limit = 4)
    {
        // Dapatkan kategori dari produk toko ini
        $categories = Category::whereHas('products', function ($query) use ($shop) {
            $query->where('shop_id', $shop->id);
        })->pluck('id');

        if ($categories->isEmpty()) {
            return collect();
        }

        // Dapatkan toko lain dengan kategori yang sama
        return Shop::where('status', 'active')
            ->where('id', '!=', $shop->id)
            ->whereHas('products', function ($query) use ($categories) {
                $query->whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('categories.id', $categories);
                });
            })
            ->select('id', 'name', 'address', 'featured_image', 'slug', 'has_delivery')
            ->inRandomOrder()
            ->take($limit)
            ->get();
    }

    /**
     * Display the detailed shop page.
     * Uses Route Model Binding - will automatically work with slug
     */
    public function detailToko(Shop $shop)
    {
        return $this->show($shop);
    }

    /**
     * Store a new review for a shop.
     * Uses Route Model Binding - will automatically work with slug
     */
    public function storeReview(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        $validated['shop_id'] = $shop->id;
        $validated['is_approved'] = false; // Require admin approval

        Review::create($validated);

        // Invalidate cache untuk rata-rata rating
        Cache::forget('shop_rating_' . $shop->id);

        return back()->with('success', 'Terima kasih atas ulasan Anda. Ulasan akan ditampilkan setelah disetujui.');
    }

    /**
     * Optional: Add backward compatibility for old ID-based URLs
     * This can help during transition to slug-based URLs
     */
    public function detailTokoFallback($identifier)
    {
        // Try to find by slug first
        $shop = Shop::where('slug', $identifier)->first();

        // If not found and identifier is numeric, try to find by ID
        if (!$shop && is_numeric($identifier)) {
            $shop = Shop::find($identifier);
        }

        if (!$shop || $shop->status !== 'active') {
            abort(404);
        }

        // Redirect ke URL berbasis slug untuk SEO
        if (is_numeric($identifier) && $shop->slug) {
            return redirect()->route('shops.detail', ['shop' => $shop]);
        }

        return $this->show($shop);
    }

    /**
     * Filter toko berdasarkan kategori
     */
    public function filterByCategory($categoryId, Request $request)
    {
        $category = Category::findOrFail($categoryId);

        // Cek apakah ada parameter lokasi pengguna
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;

        $query = Shop::where('status', 'active')
            ->whereHas('products', function ($query) use ($categoryId) {
                // Menggunakan relasi many-to-many yang benar
                $query->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            })
            ->with(['products' => function ($query) use ($categoryId) {
                // Menggunakan relasi many-to-many yang benar
                $query->whereHas('categories', function ($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            }])
            ->select('id', 'name', 'address', 'featured_image', 'description', 'slug', 'latitude', 'longitude', 'has_delivery');

        // Jika ada lokasi pengguna, urutkan berdasarkan jarak
        if ($useLocation) {
            $allShops = $query->get();
            $sortedShops = $this->sortShopsByDistance($allShops, $userLat, $userLng);

            // Konversi collection ke paginator
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
            $shops = $query->orderBy('name')->paginate(12);
        }

        $categories = Category::orderBy('name')->get();
        $selectedCategory = $category;

        return view('tokoPage.listToko', compact('shops', 'categories', 'selectedCategory', 'useLocation'));
    }

    /**
     * Mendapatkan daftar toko terdekat berdasarkan lokasi pengguna
     */
    public function getNearbyShops(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'limit' => 'nullable|integer|min:1|max:20'
            ]);

            $userLat = $request->input('latitude');
            $userLng = $request->input('longitude');
            $limit = $request->input('limit', 5); // Default 5 toko terdekat

            // Ambil semua toko aktif
            $shops = Shop::where('status', 'active')
                ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug', 'has_delivery')
                ->get();

            // Hitung jarak untuk setiap toko
            $shopsWithDistance = $shops->map(function ($shop) use ($userLat, $userLng) {
                $distance = LocationHelper::calculateDistance(
                    $userLat,
                    $userLng,
                    $shop->latitude,
                    $shop->longitude
                );

                return [
                    'id' => $shop->id,
                    'name' => $shop->name,
                    'address' => $shop->address,
                    'latitude' => $shop->latitude,
                    'longitude' => $shop->longitude,
                    'featured_image' => $shop->featured_image,
                    'slug' => $shop->slug,
                    'has_delivery' => $shop->has_delivery,
                    'distance' => round($distance, 2) // Bulatkan ke 2 desimal
                ];
            });

            // Urutkan berdasarkan jarak terdekat
            $sortedShops = $shopsWithDistance->sortBy('distance')->take($limit);

            return response()->json([
                'status' => 'success',
                'shops' => $sortedShops->values()->all()
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getNearbyShops: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getPopularShops($limit = 4)
    {
        return Shop::withCount('visitorLogs')
            ->where('status', 'active')
            ->orderBy('visitor_logs_count', 'desc')
            ->limit($limit)
            ->get(['id', 'name', 'address', 'featured_image', 'slug', 'has_delivery']);
    }
}
