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
        $query = Product::with('shop')
            ->whereHas('shop', function($query) {
                $query->where('status', 'active');
            })
            ->where('is_available', true);
            
        // Filter by category if provided
        if ($request->has('category')) {
            $categoryId = $request->input('category');
            $query->whereHas('categories', function($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }
            
        $products = $query->orderBy('name')->paginate(12);
        $categories = Category::orderBy('name')->get();
        
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        if (!$product->is_available || $product->shop->status !== 'active') {
            abort(404);
        }
        
        $product->load('shop', 'categories');
        $relatedProducts = Product::where('shop_id', $product->shop_id)
            ->where('id', '!=', $product->id)
            ->where('is_available', true)
            ->limit(4)
            ->get();
            
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
