<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\SearchLog;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name')
            ->get();
            
        return view('index', compact('shops'));
    }
    
    /**
     * Show the welcome page.
     */
    public function welcome()
    {
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name')
            ->get();
            
        return view('welcome', compact('shops'));
    }
        /**
     * Show the about page.
     */
    public function about()
    {
        return view('about');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    
    $shops = Shop::where('name', 'like', "%{$query}%")
        ->orWhere('address', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->orWhereHas('products', function($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })
        ->orWhereHas('products.category', function($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })
        ->with(['products', 'products.category'])
        ->get();
    
    // Log pencarian
    SearchLog::create([
        'query' => $query,
        'results_count' => $shops->count(),
        'ip_address' => $request->ip(),
        'has_results' => $shops->count() > 0
    ]);
    
    return view('search', compact('shops', 'query'));
}
}
