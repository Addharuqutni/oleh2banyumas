<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use app\Models\Shop;
use app\Http\Controllers\ShopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
    public function show($shopSlug, $productSlug)
    {
        // Find the product with eager loading
        $product = Product::with(['categories'])
            ->whereHas('shop', function ($query) use ($shopSlug) {
                $query->where('slug', $shopSlug)
                    ->where('status', 'active');
            })
            ->where('slug', $productSlug)
            ->where('is_available', true)
            ->firstOrFail();

        // Get related products
        $relatedProducts = $this->getRelatedProducts($product);

        // Return view with product data
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
        return Product::with('shop') // Eager load shop untuk menghindari N+1 query
            ->where('shop_id', $product->shop_id)
            ->where('id', '!=', $product->id)
            ->where('is_available', true)
            ->inRandomOrder() // Tampilkan produk secara acak untuk variasi
            ->limit(4)
            ->get();
    }
}
