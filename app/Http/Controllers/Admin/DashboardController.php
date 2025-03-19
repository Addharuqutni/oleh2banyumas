<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Review;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Count statistics
        $shopCount = Shop::count();
        $productCount = Product::count();
        $reviewCount = Review::count();
        $pendingReviewCount = Review::where('is_approved', false)->count();
        
        // Get latest shops
        $latestShops = Shop::withCount('products')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        // Get latest reviews
        $latestReviews = Review::with('shop')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'shopCount',
            'productCount',
            'reviewCount',
            'pendingReviewCount',
            'latestShops',
            'latestReviews'
        ));
    }
}
