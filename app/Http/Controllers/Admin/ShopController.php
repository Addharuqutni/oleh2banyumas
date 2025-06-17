<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Menampilkan daftar semua toko yang telah terdaftar,
     * lengkap dengan jumlah produk yang dimiliki masing-masing toko.
     */
    public function index()
    {
        $shops = Shop::withCount('products') // Hitung total produk per toko
            ->orderBy('name')
            ->paginate(10);

        return view('admin.shops.index', compact('shops'));
    }

    /**
     * Menampilkan form pembuatan toko baru.
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Menyimpan data toko yang baru ditambahkan ke sistem.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name'             => 'required|string|max:100',
            'address'          => 'required|string',
            'latitude'         => 'required|numeric|between:-90,90',
            'longitude'        => 'required|numeric|between:-180,180',
            'description'      => 'nullable|string',
            'phone'            => 'nullable|string|max:15',
            'email'            => 'nullable|email|max:100',
            'operating_hours'  => 'nullable|string',
            'featured_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'           => 'required|in:active,inactive',
            'images.*'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug'             => 'nullable|string|unique:shops,slug',
            'has_delivery'     => 'boolean',
            'grab_link'        => 'nullable|url',
            'gojek_link'       => 'nullable|url',
        ]);

        // Buat slug dari nama toko, pastikan unik
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        $originalSlug = $validated['slug'];
        $count = 2;
        while (Shop::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        // Upload gambar utama toko
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('shops', $filename, 'public');
            $validated['featured_image'] = $path;
        }

        // Simpan data toko
        $shop = Shop::create($validated);

        // Upload dan simpan banyak gambar jika disediakan
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('shops', $filename, 'public');
                $shop->images()->create([
                    'image_path' => $path,
                    'caption' => null,
                ]);
            }
        }

        return redirect()->route('admin.shops.index')
            ->with('success', 'Toko berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail lengkap sebuah toko, termasuk produk, galeri gambar, dan ulasan.
     */
    public function show(Shop $shop)
    {
        $shop->load('products', 'images', 'reviews');

        return view('admin.shops.show', compact('shop'));
    }

    /**
     * Menampilkan form pengeditan untuk toko tertentu.
     */
    public function edit(Shop $shop)
    {
        $shop->load('images');

        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Memperbarui data toko berdasarkan perubahan form.
     */
    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:100',
            'address'          => 'required|string',
            'latitude'         => 'required|numeric|between:-90,90',
            'longitude'        => 'required|numeric|between:-180,180',
            'description'      => 'nullable|string',
            'phone'            => 'nullable|string|max:15',
            'email'            => 'nullable|email|max:100',
            'operating_hours'  => 'nullable|string',
            'featured_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'           => 'required|in:active,inactive',
            'images.*'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug'             => 'nullable|string|unique:shops,slug,' . $shop->id,
            'has_delivery'     => 'boolean',
            'grab_link'        => 'nullable|url',
            'gojek_link'       => 'nullable|url',
        ]);

        // Regenerasi slug jika nama berubah dan slug tidak diisi manual
        if ($shop->name !== $validated['name'] && (!isset($validated['slug']) || empty($validated['slug']))) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
            $originalSlug = $validated['slug'];
            $count = 2;
            while (Shop::where('slug', $validated['slug'])->where('id', '!=', $shop->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        // Ganti gambar utama jika baru diupload
        if ($request->hasFile('featured_image')) {
            if ($shop->featured_image) {
                Storage::disk('public')->delete($shop->featured_image);
            }
            $path = $request->file('featured_image')->store('shops', 'public');
            $validated['featured_image'] = $path;
        } elseif ($request->has('remove_featured_image')) {
            if ($shop->featured_image) {
                Storage::disk('public')->delete($shop->featured_image);
                $validated['featured_image'] = null;
            }
        }

        $shop->update($validated);

        // Tambahkan gambar baru jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('shop_images', 'public');
                $shop->images()->create([
                    'image_path' => $path,
                    'caption' => null,
                ]);
            }
        }

        return redirect()->route('admin.shops.index')
            ->with('success', 'Toko berhasil diperbarui.');
    }

    /**
     * Menghapus toko beserta semua gambar yang terkait dengannya.
     */
    public function destroy(Shop $shop)
    {
        // Hapus gambar utama jika ada
        if ($shop->featured_image) {
            Storage::disk('public')->delete($shop->featured_image);
        }

        // Hapus semua gambar galeri
        foreach ($shop->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Hapus data toko
        $shop->delete();

        return redirect()->route('admin.shops.index')
            ->with('success', 'Toko berhasil dihapus.');
    }

    /**
     * Menghapus salah satu gambar toko berdasarkan ID gambar.
     */
    public function deleteImage($id)
    {
        $image = ShopImage::findOrFail($id);

        Storage::disk('public')->delete($image->image_path);

        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    /**
     * Membuat ulang slug semua toko berdasarkan nama mereka agar tetap unik.
     */
    public function regenerateSlugs()
    {
        $shops = Shop::all();

        foreach ($shops as $shop) {
            $originalSlug = \Illuminate\Support\Str::slug($shop->name);
            $slug = $originalSlug;
            $count = 2;

            while (Shop::where('slug', $slug)->where('id', '!=', $shop->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $shop->slug = $slug;
            $shop->save();
        }

        return redirect()->route('admin.shops.index')
            ->with('success', 'Semua slug toko berhasil diregenerasi.');
    }
}
