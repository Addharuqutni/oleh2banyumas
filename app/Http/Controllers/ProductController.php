<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        // Base query to get active shops and available products
        $query = Product::with('shop')
            ->whereHas('shop', function ($query) {
                $query->where('status', 'active');
            })
            ->where('is_available', true);

        // Filter by category if provided
        if ($request->filled('category')) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        // Paginate products
        $products = $query->orderBy('name')->paginate(12);
        $categories = Category::orderBy('name')->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show($product)
    {
        // Find the product by slug
        $product = Product::where('slug', $product)->firstOrFail();

        // Check if the product is available and the shop is active
        if (!$product->is_available || $product->shop->status !== 'active') {
            abort(404);
        }

        // Load related data
        $product->load('shop', 'categories');

        // Get related products from the same shop
        $relatedProducts = $this->getRelatedProducts($product);

        // Return to the product detail view (you may need to create this view)
        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Get related products from the same shop.
     *
     * @param Product $product
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getRelatedProducts(Product $product)
    {
        return Product::where('shop_id', $product->shop_id)
            ->where('id', '!=', $product->id)
            ->where('is_available', true)
            ->limit(4)
            ->get();
    }
}
