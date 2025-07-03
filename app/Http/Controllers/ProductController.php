<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use App\Http\Controllers\ShopController;
use App\Services\PriceClusteringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    /**
     * Fungsi ini digunakan untuk menampilkan daftar produk yang tersedia.
     * Termasuk fitur filter berdasarkan kategori dan pagination untuk membatasi jumlah tampilan per halaman.
     */
    public function index(Request $request)
    {
        // Inisialisasi query untuk mengambil produk yang tersedia dan berasal dari toko yang aktif
        $query = Product::with('shop')
            ->whereHas('shop', function ($query) {
                $query->where('status', 'active'); // Pastikan toko tempat produk berada masih aktif
            })
            ->where('is_available', true); // Hanya ambil produk yang tersedia untuk dibeli

        // Jika terdapat filter kategori dari request, terapkan filter tersebut
        if ($request->filled('category')) {
            $categoryId = $request->input('category');

            // Pastikan produk memiliki kategori sesuai yang dipilih oleh pengguna
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        // Urutkan hasil berdasarkan nama produk dan tampilkan dalam bentuk halaman (12 item per halaman)
        $products = $query->orderBy('name')->paginate(12);

        // Ambil semua kategori untuk ditampilkan sebagai filter di halaman
        $categories = Category::orderBy('name')->get();

        // Kirim data produk dan kategori ke tampilan view
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Fungsi ini menampilkan detail dari suatu produk berdasarkan slug toko dan slug produk.
     * Digunakan pada halaman detail produk, sekaligus menampilkan produk terkait sebagai rekomendasi.
     */
    public function show($shopSlug, $productSlug)
    {
        // Ambil data produk beserta relasi kategorinya
        $product = Product::with(['categories'])
            ->whereHas('shop', function ($query) use ($shopSlug) {
                // Pastikan produk berasal dari toko yang sesuai slug dan masih aktif
                $query->where('slug', $shopSlug)
                    ->where('status', 'active');
            })
            ->where('slug', $productSlug)      // Cocokkan slug produk
            ->where('is_available', true)      // Pastikan produk tersedia
            ->firstOrFail();                   // Gagal jika tidak ditemukan

        // Ambil daftar produk lain yang memiliki kemiripan kategori
        $relatedProducts = $this->getRelatedProducts($product);

        // Kirim data produk utama dan produk terkait ke tampilan
        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Mengambil produk lain yang berasal dari toko yang sama dengan produk yang sedang ditampilkan.
     * Digunakan sebagai rekomendasi produk serupa di halaman detail produk.
     *
     * @param Product $product Produk utama yang sedang ditampilkan
     * @return \Illuminate\Database\Eloquent\Collection Koleksi produk yang relevan
     */
    protected function getRelatedProducts(Product $product)
    {
        return Product::with('shop') // Muat relasi toko sekaligus untuk mencegah query berulang (N+1)
            ->where('shop_id', $product->shop_id)      // Ambil hanya produk dari toko yang sama
            ->where('id', '!=', $product->id)          // Kecualikan produk itu sendiri dari hasil
            ->where('is_available', true)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public function clusterByPrice(Request $request)
    {
        $selectedCategory = $request->input('category');
        $selectedCluster = $request->input('cluster');

        $query = Product::with(['shop', 'categories'])
            ->where('is_available', true)
            ->whereHas('shop', function ($q) {
                $q->where('status', 'active');
            })
            ->whereNotNull('price_cluster_group');

        if ($selectedCategory) {
            $query->whereHas('categories', function ($q) use ($selectedCategory) {
                $q->where('categories.id', $selectedCategory);
            });
        }

        $availableClusters = $query->clone()
            ->select('price_cluster_group')
            ->distinct()
            ->orderBy('price_cluster_group')
            ->pluck('price_cluster_group');

        if ($selectedCluster !== null && $selectedCluster !== '') {
            $query->where('price_cluster_group', $selectedCluster);
        }

        $products = $query->orderBy('price')->paginate(12)->withQueryString();
        $categories = Category::orderBy('name')->get();

        // Ambil metadata dari cache, jika tidak ada, berikan array kosong
        $clusterMetadata = Cache::get('price_cluster_metadata', []);

        return view('products.cluster', [
            'products' => $products,
            'categories' => $categories,
            'available_clusters' => $availableClusters,
            'cluster_metadata'   => $clusterMetadata, // <-- KIRIM METADATA KE VIEW
            'selected_category'  => $selectedCategory,
            'selected_cluster'   => $selectedCluster,
        ]);
    }
}
