<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\SearchLog;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Fungsi ini menampilkan halaman beranda utama aplikasi.
     * Data toko yang ditampilkan hanya yang berstatus aktif dan telah disusun berdasarkan nama.
     */
    public function index()
    {
        // Ambil semua toko aktif dari database, hanya kolom penting yang dipilih untuk efisiensi
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name') // Urutkan toko secara alfabetis berdasarkan nama
            ->get();

        // Tampilkan view 'index' dengan data toko yang telah dikumpulkan
        return view('index', compact('shops'));
    }

    /**
     * Fungsi ini digunakan untuk menampilkan halaman sambutan (welcome page) aplikasi.
     * Umumnya ditampilkan kepada pengguna yang belum masuk atau sebagai halaman pembuka publik.
     */
    public function welcome()
    {
        // Ambil data semua toko yang statusnya aktif dari database
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name') // Urutkan nama toko secara alfabetis
            ->get();

        // Tampilkan halaman 'welcome' dan kirimkan data toko untuk ditampilkan pada halaman tersebut
        return view('welcome', compact('shops'));
    }

    /**
     * Fungsi ini menampilkan halaman "Tentang Kami" (About Page).
     * Halaman ini bersifat statis dan biasanya berisi informasi tentang aplikasi atau tim pengembang.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Fungsi ini digunakan untuk melakukan pencarian toko berdasarkan kata kunci yang dimasukkan oleh pengguna.
     * Sistem akan mencari kecocokan pada nama, alamat, deskripsi toko, produk, maupun nama kategori produk.
     */
    public function search(Request $request)
    {
        // Ambil kata kunci pencarian dari input pengguna
        $query = $request->input('query');

        // Lakukan pencarian ke berbagai kolom dan relasi
        $shops = Shop::where('name', 'like', "%{$query}%")
            ->orWhere('address', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhereHas('products', function ($q) use ($query) {
                // Cocokkan nama produk yang terkait dengan toko
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('products.category', function ($q) use ($query) {
                // Cocokkan nama kategori dari produk toko
                $q->where('name', 'like', "%{$query}%");
            })
            ->with(['products', 'products.category']) // Muat relasi produk dan kategori sekaligus
            ->get();

        // Simpan log pencarian untuk keperluan analisis atau statistik penggunaan
        SearchLog::create([
            'query'         => $query,
            'results_count' => $shops->count(),       // Jumlah hasil ditemukan
            'ip_address'    => $request->ip(),        // Alamat IP pengguna
            'has_results'   => $shops->count() > 0    // Penanda apakah hasil ditemukan
        ]);

        // Tampilkan halaman hasil pencarian dengan data yang ditemukan
        return view('search', compact('shops', 'query'));
    }
}
