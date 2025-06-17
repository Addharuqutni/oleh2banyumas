<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\SearchLog;
use App\Models\Shop;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin utama.
     * Dashboard ini menampilkan berbagai statistik penggunaan aplikasi seperti jumlah toko, produk,
     * kunjungan, pencarian, dan tren lainnya untuk 30 hari terakhir.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Statistik angka total untuk berbagai entitas dalam sistem
        $stats = [
            'totalShops'      => Shop::count(),
            'totalProducts'   => Product::count(),
            'totalCategories' => Category::count(),
            'totalVisits'     => VisitorLog::count(),
            'totalSearches'   => SearchLog::count(),
            'uniqueVisitors'  => VisitorLog::distinct('ip_address')->count('ip_address'),
            'pendingReviews'  => Review::where('is_approved', false)->count(),
            'totalReviews'    => Review::count(),
        ];

        // Ambil 5 toko dengan jumlah kunjungan terbanyak dalam 30 hari terakhir
        $popularShops = Shop::withCount(['visitorLogs' => function ($query) {
            $query->where('created_at', '>=', Carbon::now()->subDays(30));
        }])
            ->orderBy('visitor_logs_count', 'desc')
            ->take(5)
            ->get();

        // Ambil 5 kategori dengan produk yang paling sering dikunjungi
        $popularCategories = Category::withCount(['products' => function ($query) {
            $query->whereHas('shop.visitorLogs');
        }])
            ->orderBy('products_count', 'desc')
            ->take(5)
            ->get();

        // 10 pencarian terpopuler dalam 30 hari terakhir
        $popularSearches = SearchLog::select('query', DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('query')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        // 10 pencarian yang paling sering tidak menghasilkan hasil (null result)
        $noResultSearches = SearchLog::select('query', DB::raw('count(*) as count'))
            ->where('has_results', false)
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('query')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        // Statistik pengunjung harian dalam 30 hari terakhir (untuk grafik)
        $visitorStats = VisitorLog::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as count')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Statistik jumlah pencarian harian (untuk grafik)
        $searchStats = SearchLog::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as count')
        )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Statistik perangkat yang digunakan pengunjung (mobile, desktop, dll.)
        $deviceStats = VisitorLog::select('device_type', DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->whereNotNull('device_type')
            ->groupBy('device_type')
            ->get()
            ->mapWithKeys(fn($item) => [$item['device_type'] => $item['count']]);

        // Statistik browser teratas dalam 30 hari terakhir
        $browserStats = VisitorLog::select('browser', DB::raw('count(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->whereNotNull('browser')
            ->groupBy('browser')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        // Hitung tren pertumbuhan jumlah pengunjung 7 hari terakhir vs 7 hari sebelumnya
        $currentPeriodVisits = VisitorLog::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $previousPeriodVisits = VisitorLog::whereBetween('created_at', [Carbon::now()->subDays(14), Carbon::now()->subDays(7)])->count();

        $visitorsGrowth = $previousPeriodVisits > 0
            ? round((($currentPeriodVisits - $previousPeriodVisits) / $previousPeriodVisits) * 100, 1)
            : 0;

        // Hitung tren pertumbuhan jumlah pencarian
        $currentPeriodSearches = SearchLog::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $previousPeriodSearches = SearchLog::whereBetween('created_at', [Carbon::now()->subDays(14), Carbon::now()->subDays(7)])->count();

        $searchesGrowth = $previousPeriodSearches > 0
            ? round((($currentPeriodSearches - $previousPeriodSearches) / $previousPeriodSearches) * 100, 1)
            : 0;

        // Tambahkan data pertumbuhan ke statistik utama
        $stats['visitorsGrowth'] = $visitorsGrowth;
        $stats['searchesGrowth'] = $searchesGrowth;

        // Tampilkan semua data ke halaman dashboard admin
        return view('admin.dashboard', compact(
            'stats',
            'popularShops',
            'popularCategories',
            'popularSearches',
            'noResultSearches',
            'visitorStats',
            'searchStats',
            'deviceStats',
            'browserStats'
        ));
    }
}
