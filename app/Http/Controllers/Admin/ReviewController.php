<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Menampilkan halaman daftar ulasan yang masuk dari pengguna.
     * Admin dapat memfilter berdasarkan toko, status, atau nama pengulas.
     */
    public function index(Request $request)
    {
        $query = Review::with('shop'); // Sertakan data toko untuk setiap ulasan

        // Jika dipilih toko tertentu, tampilkan hanya ulasan untuk toko tersebut
        if ($request->filled('shop_id')) {
            $query->where('shop_id', $request->shop_id);
        }

        // Filter berdasarkan status persetujuan
        if ($request->filled('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        // Pencarian berdasarkan nama pengulas
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $reviews = $query->orderBy('created_at', 'desc')->paginate(10);
        $shops = Shop::orderBy('name')->get(); // Untuk dropdown filter toko
        $pendingCount = Review::where('is_approved', false)->count(); // Total ulasan menunggu

        return view('admin.reviews.index', compact('reviews', 'shops', 'pendingCount'));
    }

    /**
     * Menampilkan daftar ulasan yang masih dalam status menunggu konfirmasi admin.
     */
    public function pending()
    {
        $reviews = Review::with('shop')
            ->where('is_approved', false)
            ->orderBy('created_at', 'asc') // Tampilkan yang paling lama terlebih dahulu
            ->paginate(10);

        return view('admin.reviews.pending', compact('reviews'));
    }

    /**
     * Menandai ulasan sebagai telah disetujui.
     */
    public function approve(Review $review)
    {
        $review->update(['is_approved' => true]); // Ubah status menjadi disetujui

        return back()->with('success', 'Ulasan berhasil disetujui.');
    }

    /**
     * Menghapus ulasan dari sistem.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
