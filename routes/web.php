<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ClusterMapController;
use App\Http\Controllers\Admin\ShopController as AdminShopController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

/**
 *  Halaman Umum
 */

// Halaman utama (landing)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Sitemap XML
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Halaman peta semua toko
Route::get('/maps', [ShopController::class, 'maps'])->name('maps');

// Halaman peta clustering harga produk
Route::get('/cluster-map', [ClusterMapController::class, 'index'])->name('cluster.map');

// Halaman tentang aplikasi
Route::get('/about', [HomeController::class, 'about'])->name('about');

// API toko terdekat berbasis lokasi pengguna
Route::get('/api/shops/nearby', [ShopController::class, 'getNearbyShops']);


/**
 *  Manajemen Toko
 */

// Daftar toko per kategori
Route::get('/toko/kategori/{id}', [ShopController::class, 'filterByCategory'])->name('shops.filter.category');

// Halaman list semua toko
Route::get('/toko', [ShopController::class, 'index'])->name('shops.index');

// List view dengan pencarian dan filter
Route::get('/list-toko', [ShopController::class, 'listToko'])->name('shops.list');

// Detail toko berdasarkan slug
Route::get('/toko/detail-toko/{shop:slug}', [ShopController::class, 'detailToko'])->name('shops.detail');

// Detail toko berdasarkan model binding (ID/slug fallback)
Route::get('/toko/{shop}', [ShopController::class, 'show'])->name('shops.show');

// Tambahkan ulasan pada toko
Route::post('/toko/{shop}/reviews', [ShopController::class, 'storeReview'])->name('shops.reviews.store');


/**
 *  Manajemen Produk
 */

// Detail produk pada toko tertentu
Route::get('/toko/detail-toko/{shop:slug}/produk/{product:slug}', [ProductController::class, 'show'])->name('shops.products.show');
Route::prefix('products')->name('products.')->group(function () {
    // name('products.') + name('index') = 'products.index'
    Route::get('/', [ProductController::class, 'index'])->name('index');
    
    // name('products.') + name('cluster') = 'products.cluster'
    Route::get('/cluster', [ProductController::class, 'clusterByPrice'])->name('cluster');
    Route::get('/cluster-refresh', [ProductController::class, 'generatePriceClusters'])->name('cluster.refresh');
    
    // name('products.') + name('show') = 'products.show'
    Route::get('/{shop:slug}/{product:slug}', [ProductController::class, 'show'])->name('show');
});

/**
 *  Halaman Artikel
 */

// Beranda artikel
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');

// Artikel per-oleh-oleh khas
Route::get('/artikel/getukgoreng', [ArticleController::class, 'getukgoreng'])->name('artikel.getukgoreng');
Route::get('/artikel/jenangjaket', [ArticleController::class, 'jenangjaket'])->name('artikel.jenangjaket');
Route::get('/artikel/nopia', [ArticleController::class, 'nopia'])->name('artikel.nopia');
Route::get('/artikel/keripiktempe', [ArticleController::class, 'keripiktempe'])->name('artikel.keripiktempe');
Route::get('/artikel/lanting', [ArticleController::class, 'lanting'])->name('artikel.lanting');
Route::get('/artikel/mendoan', [ArticleController::class, 'mendoan'])->name('artikel.mendoan');
Route::get('/artikel/cimplung', [ArticleController::class, 'cimplung'])->name('artikel.cimplung');
Route::get('/artikel/mireng', [ArticleController::class, 'mireng'])->name('artikel.mireng');


/**
 *  Admin Panel
 */

// Halaman login admin
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);

// Logout admin
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Route khusus untuk admin yang sudah login
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Toko
    Route::resource('shops', AdminShopController::class);
    Route::delete('/shop-images/{id}', [AdminShopController::class, 'deleteImage'])->name('shop-images.destroy');
    Route::get('/shops-regenerate-slugs', [AdminShopController::class, 'regenerateSlugs'])->name('shops.regenerate-slugs');

    // Manajemen Produk
    Route::resource('products', AdminProductController::class);

    // Manajemen Ulasan
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/pending', [AdminReviewController::class, 'pending'])->name('reviews.pending');
    Route::patch('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('reviews.approve');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

    // Manajemen Kategori
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{category}/stats', [AdminCategoryController::class, 'showStats'])->name('categories.stats');
});
