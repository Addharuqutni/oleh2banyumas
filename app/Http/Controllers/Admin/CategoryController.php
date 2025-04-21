<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->paginate(10);
            
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:categories',
            'description' => 'nullable|string',
        ]);
        
        // Automatically generate a slug from the name
        $validated['slug'] = Str::slug($validated['name']);
        
        Category::create($validated);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);
        
        // Update slug if name has changed
        if ($category->name != $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        
        $category->update($validated);
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Check if products are using this category
        $productsCount = $category->products()->count();
        
        if ($productsCount > 0) {
            // Option 1: Prevent deletion if products are using this category
            return redirect()->route('admin.categories.index')
                ->with('error', 'Tidak dapat menghapus kategori karena masih digunakan oleh ' . $productsCount . ' produk.');
            
            // Option 2: Update products to remove this category (uncomment if you want this behavior)
            // $category->products()->update(['category_id' => null]);
        }
        
        // Delete the category
        $category->delete();
        
        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
    
    /**
     * Display category usage statistics.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function showStats(Category $category)
    {
        $category->loadCount('products');
        
        $shops = $category->products()
            ->select('shop_id')
            ->distinct()
            ->with('shop:id,name,slug')
            ->get()
            ->pluck('shop');
            
        $topProducts = $category->products()
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();
            
        return view('admin.categories.stats', compact('category', 'shops', 'topProducts'));
    }
}
