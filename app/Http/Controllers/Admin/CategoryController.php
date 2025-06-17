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
     * Menampilkan daftar kategori yang tersedia, lengkap dengan jumlah produk pada masing-masing kategori.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua kategori beserta hitungan jumlah produk di dalamnya
        $categories = Category::withCount('products')
            ->orderBy('name')   // Urutkan berdasarkan nama kategori
            ->paginate(10);     // Batasi tampilan per halaman

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Menyimpan kategori baru ke dalam database setelah divalidasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input kategori dari form
        $validated = $request->validate([
            'name'        => 'required|string|max:50|unique:categories',
            'description' => 'nullable|string',
        ]);

        // Buat slug otomatis dari nama untuk keperluan URL
        $validated['slug'] = Str::slug($validated['name']);

        // Simpan data kategori baru
        Category::create($validated);

        // Redirect kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Memperbarui data kategori yang telah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        // Validasi input dan abaikan validasi unik pada nama jika nama tidak berubah
        $validated = $request->validate([
            'name'        => 'required|string|max:50|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        // Jika nama kategori berubah, maka slug juga harus diperbarui
        if ($category->name != $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Simpan pembaruan ke database
        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database, jika tidak sedang digunakan oleh produk manapun.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        // Hitung berapa produk yang masih menggunakan kategori ini
        $productsCount = $category->products()->count();

        if ($productsCount > 0) {
            // Jika kategori masih digunakan, tolak penghapusan dan beri pesan error
            return redirect()->route('admin.categories.index')
                ->with('error', 'Tidak dapat menghapus kategori karena masih digunakan oleh ' . $productsCount . ' produk.');

            // Atau, jika diinginkan: putuskan relasi kategori dari semua produk
            // $category->products()->detach();
        }

        // Lakukan penghapusan kategori
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    /**
     * Menampilkan statistik penggunaan kategori tertentu.
     * Termasuk jumlah produk, toko terkait, dan produk terpopuler dalam kategori tersebut.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function showStats(Category $category)
    {
        // Muat jumlah produk pada kategori ini
        $category->loadCount('products');

        // Ambil daftar toko unik yang memiliki produk dalam kategori ini
        $shops = $category->products()
            ->select('shop_id')
            ->distinct()
            ->with('shop:id,name,slug') // Muat informasi toko
            ->get()
            ->pluck('shop');

        // Ambil 5 produk teratas berdasarkan jumlah views
        $topProducts = $category->products()
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Tampilkan data ke halaman statistik kategori
        return view('admin.categories.stats', compact('category', 'shops', 'topProducts'));
    }
}
