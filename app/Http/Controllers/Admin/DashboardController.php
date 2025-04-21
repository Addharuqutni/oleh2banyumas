<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SearchLog;
use App\Models\Shop;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Statistik total
        $stats = [
            'totalShops' => Shop::count(),
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'totalVisits' => VisitorLog::count(),
            'totalSearches' => SearchLog::count(),
            'uniqueVisitors' => VisitorLog::distinct('ip_address')->count('ip_address'),
        ];
        
        // Toko paling banyak dikunjungi
        $popularShops = Shop::withCount(['visitorLogs' => function($query) {
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
            }])
            ->orderBy('visitor_logs_count', 'desc')
            ->take(5)
            ->get();
        
        // Kategori produk paling populer
        $popularCategories = Category::withCount(['products' => function($query) {
                $query->whereHas('shop.visitorLogs');
            }])
            ->orderBy('products_count', 'desc')
            ->take(5)
            ->get();
        
        // Pencarian populer
        $popularSearches = SearchLog::select('query', DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('query')
            ->orderBy('count', 'desc')
            ->take(10)
            ->get();
            
        // Pencarian tanpa hasil
        $noResultSearches = SearchLog::select('query', DB::raw('count(*) as count'))
            ->where('has_results', false)
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('query')
            ->orderBy('count', 'desc')
            ->take(10)
            ->get();
        
        // Data grafik pengunjung per hari (30 hari terakhir)
        $visitorStats = VisitorLog::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
            
        // Data grafik pencarian per hari (30 hari terakhir)
        $searchStats = SearchLog::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        return view('admin.dashboard', compact(
            'stats', 
            'popularShops', 
            'popularCategories', 
            'popularSearches', 
            'noResultSearches',
            'visitorStats',
            'searchStats'
        ));
    }
}
