<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Review;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the shops on the main toko page.
     */
    public function index()
    {
        // Get all active shops for both map and card display
        // Added 'slug' to the select fields to ensure it's available for URL generation
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name')
            ->get();

        // Get featured shops for the card display (limit to 4)
        $featuredShops = $shops->take(4);

        return view('toko', compact('shops', 'featuredShops'));
    }

    /**
     * Display the shop list page with category filtering.
     */
    public function listToko(Request $request)
    {
        // Get all categories for the filter dropdown
        $categories = \App\Models\Category::orderBy('name')->get();
        
        $query = Shop::where('status', 'active');

        // Handle search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');

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
            $selectedCategory = \App\Models\Category::find($categoryId);
            
            // Perbaikan: Menggunakan relasi many-to-many yang benar
            $query->whereHas('products', function ($q) use ($categoryId) {
                $q->whereHas('categories', function($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            });

            // Jika kategori dipilih, muat produk yang termasuk dalam kategori tersebut
            $query->with(['products' => function ($q) use ($categoryId) {
                $q->whereHas('categories', function($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            }]);
        }

        // Make sure to select necessary fields for URL generation and display
        $shops = $query->select('id', 'name', 'address', 'featured_image', 'description', 'slug')
            ->orderBy('name')
            ->paginate(12)
            ->appends($request->except('page')); // Keep filter parameters when paginating

        return view('tokoPage.listToko', compact('shops', 'categories', 'selectedCategory'));
    }

    /**
     * Display a map of all shops.
     */
    public function maps()
    {
        // Include slug field for URL generation if needed
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'slug')
            ->get();
        return view('landingPage.maps', compact('shops'));
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

        $shop->load(['products' => function ($query) {
            $query->where('is_available', true);
        }, 'images']);

        $reviews = $shop->reviews()
            ->where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tokoPage.detailToko', compact('shop', 'reviews'));
    }

    /**
     * Display the detailed shop page.
     * Uses Route Model Binding - will automatically work with slug
     */
    public function detailToko(Shop $shop)
    {
        if ($shop->status !== 'active') {
            abort(404);
        }

        $shop->load(['products' => function ($query) {
            $query->where('is_available', true);
        }, 'images']);

        $reviews = $shop->reviews()
            ->where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tokoPage.detailToko', compact('shop', 'reviews'));
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

        $shop->load(['products' => function ($query) {
            $query->where('is_available', true);
        }, 'images']);

        $reviews = $shop->reviews()
            ->where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tokoPage.detailToko', compact('shop', 'reviews'));
    }

    /**
     * Filter toko berdasarkan kategori
     */
    public function filterByCategory($categoryId)
    {
        $category = \App\Models\Category::findOrFail($categoryId);
        
        $shops = Shop::where('status', 'active')
            ->whereHas('products', function ($query) use ($categoryId) {
                // Perbaikan: Menggunakan relasi many-to-many yang benar
                $query->whereHas('categories', function($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            })
            ->with(['products' => function ($query) use ($categoryId) {
                // Perbaikan: Menggunakan relasi many-to-many yang benar
                $query->whereHas('categories', function($cq) use ($categoryId) {
                    $cq->where('categories.id', $categoryId);
                });
            }])
            ->select('id', 'name', 'address', 'featured_image', 'description', 'slug')
            ->orderBy('name')
            ->paginate(12);
        
        $categories = \App\Models\Category::orderBy('name')->get();
        $selectedCategory = $category;
        
        return view('tokoPage.listToko', compact('shops', 'categories', 'selectedCategory'));
    }
}
