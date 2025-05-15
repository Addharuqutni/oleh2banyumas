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
     * Display a listing of the shops.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $shops = Shop::withCount('products')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new shop.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Store a newly created shop in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'operating_hours' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'nullable|string|unique:shops,slug',
        ]);

        // Generate slug from the name
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        $count = 2;
        $originalSlug = $validated['slug'];
        while (Shop::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('shops', $filename, 'public');
            $validated['featured_image'] = $path;
        }

        // Create the shop
        $shop = Shop::create($validated);

        // Handle multiple images upload
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
     * Display the specified shop.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\View\View
     */
    public function show(Shop $shop)
    {
        $shop->load('products', 'images', 'reviews');

        return view('admin.shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified shop.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\View\View
     */
    public function edit(Shop $shop)
    {
        $shop->load('images');

        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Update the specified shop in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'description' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
            'operating_hours' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'nullable|string|unique:shops,slug,' . $shop->id,
        ]);

        // Update slug if name changed and slug not manually set
        if ($shop->name !== $validated['name'] && (!isset($validated['slug']) || empty($validated['slug']))) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

            // Ensure slug is unique
            $count = 2;
            $originalSlug = $validated['slug'];
            while (Shop::where('slug', $validated['slug'])->where('id', '!=', $shop->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($shop->featured_image) {
                Storage::disk('public')->delete($shop->featured_image);
            }

            $path = $request->file('featured_image')->store('shops', 'public');
            $validated['featured_image'] = $path;
        } elseif ($request->has('remove_featured_image')) {
            // Remove featured image if requested
            if ($shop->featured_image) {
                Storage::disk('public')->delete($shop->featured_image);
                $validated['featured_image'] = null;
            }
        }

        // Update the shop
        $shop->update($validated);

        // Handle multiple images upload
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
     * Remove the specified shop from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Shop $shop)
    {
        // Delete featured image
        if ($shop->featured_image) {
            Storage::disk('public')->delete($shop->featured_image);
        }

        // Delete shop images
        foreach ($shop->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        // Delete shop (will cascade delete related records)
        $shop->delete();

        return redirect()->route('admin.shops.index')
            ->with('success', 'Toko berhasil dihapus.');
    }

    /**
     * Delete a shop image.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteImage($id)
    {
        // Cari image berdasarkan ID, bukan slug
        $image = ShopImage::findOrFail($id);

        // Delete image file
        Storage::disk('public')->delete($image->image_path);

        // Delete database record
        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

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
