<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShopController as AdminShopController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing/Home Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/hero-guest', [HomeController::class, 'heroGuest'])->name('hero.guest');
Route::get('/kategori', [HomeController::class, 'kategori'])->name('kategori');

// Map Routes
Route::get('/maps', [ShopController::class, 'maps'])->name('maps');

// Shop Toko Routes
Route::get('/toko', [ShopController::class, 'index'])->name('shops.index');
Route::get('/toko/{shop}', [ShopController::class, 'show'])->name('shops.show');
Route::get('/list-toko', [ShopController::class, 'listToko'])->name('shops.list');
Route::get('/toko/detail-toko/{shop:slug}', [ShopController::class, 'detailToko'])->name('shops.detail');
Route::post('/toko/{shop}/reviews', [ShopController::class, 'storeReview'])->name('shops.reviews.store');

// Product Routes
Route::get('/toko/detail-toko/{shop:slug}/produk/{product:slug}', [ProductController::class, 'show'])->name('shops.products.show');


// Article Pages
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/getukgoreng', [ArticleController::class, 'getukgoreng'])->name('artikel.getukgoreng');
Route::get('/artikel/jenangjaket', [ArticleController::class, 'jenangjaket'])->name('artikel.jenangjaket');
Route::get('/artikel/nopia', [ArticleController::class, 'nopia'])->name('artikel.nopia');
Route::get('/artikel/keripiktempe', [ArticleController::class, 'keripiktempe'])->name('artikel.keripiktempe');
Route::get('/artikel/lanting', [ArticleController::class, 'lanting'])->name('artikel.lanting');
Route::get('/artikel/mendoan', [ArticleController::class, 'mendoan'])->name('artikel.mendoan');
Route::get('/artikel/cimplung', [ArticleController::class, 'cimplung'])->name('artikel.cimplung');
Route::get('/artikel/mireng', [ArticleController::class, 'mireng'])->name('artikel.mireng');

// Other Pages
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Protected Routes
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Shop Management
    Route::resource('shops', AdminShopController::class);
    Route::delete('/shop-images/{id}', [AdminShopController::class, 'deleteImage'])->name('shop-images.destroy');
    Route::get('/shops-regenerate-slugs', [AdminShopController::class, 'regenerateSlugs'])->name('shops.regenerate-slugs');
    Route::put('/shops/{shop}', [AdminShopController::class, 'update'])->name('shops.update');

    // Product Management
    Route::resource('products', AdminProductController::class);

    // Review Management
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/pending', [AdminReviewController::class, 'pending'])->name('reviews.pending');
    Route::patch('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('reviews.approve');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

    // Category Management
    Route::resource('categories', AdminCategoryController::class);
});
