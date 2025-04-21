<?php

namespace App\Http\Middleware;

use App\Models\VisitorLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Jangan catat kunjungan pada halaman admin atau asset
        if (!$request->is('admin*') && !$request->is('*.js') && !$request->is('*.css') && !$request->is('*.jpg') && !$request->is('*.png')) {
            $shopId = null;
            
            // Deteksi jika halaman adalah detail toko
            if ($request->route() && $request->route()->getName() == 'shop.detail') {
                $shopId = $request->route()->parameter('id');
            }
            
            VisitorLog::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'page_visited' => $request->fullUrl(),
                'shop_id' => $shopId,
                'referrer' => $request->header('referer')
            ]);
        }
        
        return $response;
    }
}
