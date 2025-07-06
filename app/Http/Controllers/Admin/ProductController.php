<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menyajikan halaman daftar produk dengan dukungan filter berdasarkan toko atau nama produk.
     */
    public function index(Request $request)
    {
        $query = Product::with('shop'); // Sertakan relasi toko untuk ditampilkan

        // Filter berdasarkan toko jika dipilih
        if ($request->filled('shop_id')) {
            $query->where('shop_id', $request->shop_id);
        }

        // Pencarian berdasarkan nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil data produk dan daftar toko untuk form filter
        $products = $query->orderBy('name')->paginate(10);
        $shops = Shop::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'shops'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     */
    public function create()
    {
        $shops = Shop::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        
        session(['previous_url' => url()->previous()]);
        return view('admin.products.create', compact('shops', 'categories'));
    }

    /**
     * Memproses penyimpanan produk baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'shop_id'     => 'required|exists:shops,id',
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories'  => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Tandai produk tersedia jika dicentang
        $validated['is_available'] = $request->has('is_available');

        // Buat slug dari nama produk dan pastikan unik
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        $originalSlug = $validated['slug'];
        $count = 2;
        while (Product::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        // Upload gambar jika tersedia
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Simpan data produk
        $product = Product::create($validated);

        // Hubungkan kategori
        if ($request->has('categories') && is_array($request->categories)) {
            $product->categories()->attach($request->categories);
        }

        return redirect(session('previous_url', route('admin.products.index')))
            ->with('success', 'Produk berhasil diperbarui.');
        // return redirect()->route('admin.products.index')
        //     ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir pengeditan produk yang sudah ada.
     */
    public function edit(Product $product)
    {
        $shops = Shop::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $selectedCategories = $product->categories->pluck('id')->toArray();

        session(['previous_url' => url()->previous()]);
        return view('admin.products.edit', compact('product', 'shops', 'categories', 'selectedCategories'));
    }

    /**
     * Memperbarui data produk ke database sesuai perubahan form.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi form
        $validated = $request->validate([
            'shop_id'     => 'required|exists:shops,id',
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories'  => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $validated['is_available'] = $request->has('is_available');

        // Update slug hanya jika nama berubah
        if ($product->name !== $validated['name']) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
            $originalSlug = $validated['slug'];
            $count = 2;
            while (Product::where('slug', $validated['slug'])->where('id', '!=', $product->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        // Ganti gambar jika diunggah
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        } elseif ($request->has('remove_image') && $product->image) {
            // Hapus gambar jika diminta
            Storage::disk('public')->delete($product->image);
            $validated['image'] = null;
        }

        // Simpan perubahan
        $product->update($validated);

        // Sinkronisasi kategori
        if ($request->has('categories') && is_array($request->categories)) {
            $product->categories()->sync($request->categories);
        } else {
            $product->categories()->detach();
        }

        return redirect(session('previous_url', route('admin.products.index')))
            ->with('success', 'Produk berhasil diperbarui.');
        // return redirect()->route('admin.products.index')
        //     ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari sistem beserta file gambar jika ada.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
