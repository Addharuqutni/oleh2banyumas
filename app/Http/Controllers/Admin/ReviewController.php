<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Review::with('shop');
        
        // Filter by shop
        if ($request->filled('shop_id')) {
            $query->where('shop_id', $request->shop_id);
        }
        
        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }
        
        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $reviews = $query->orderBy('created_at', 'desc')->paginate(10);
        $shops = Shop::orderBy('name')->get();
        $pendingCount = Review::where('is_approved', false)->count();
        
        return view('admin.reviews.index', compact('reviews', 'shops', 'pendingCount'));
    }
    
    /**
     * Display a listing of pending reviews.
     *
     * @return \Illuminate\View\View
     */
    public function pending()
    {
        $reviews = Review::with('shop')
            ->where('is_approved', false)
            ->orderBy('created_at', 'asc')
            ->paginate(10);
            
        return view('admin.reviews.pending', compact('reviews'));
    }
    
    /**
     * Approve a review.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Review $review)
    {
        $review->update(['is_approved' => true]);
        
        return back()->with('success', 'Ulasan berhasil disetujui.');
    }
    
    /**
     * Remove the specified review from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Review $review)
    {
        $review->delete();
        
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
