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
            if ($request->route()) {
                $routeName = $request->route()->getName();
                if ($routeName == 'shops.show' || $routeName == 'shops.detail') {
                    $shop = $request->route()->parameter('shop');
                    $shopId = $shop->id ?? null;
                }
            }
            
            // Tambahkan informasi perangkat
            $userAgent = $request->userAgent();
            $deviceType = $this->detectDeviceType($userAgent);
            $browser = $this->detectBrowser($userAgent);
            
            VisitorLog::create([
                'ip_address' => $request->ip(),
                'user_agent' => $userAgent,
                'page_visited' => $request->fullUrl(),
                'shop_id' => $shopId,
                'referrer' => $request->header('referer'),
                'device_type' => $deviceType,
                'browser' => $browser
            ]);
        }
        
        return $response;
    }
    
    /**
     * Deteksi jenis perangkat dari user agent
     *
     * @param string|null $userAgent
     * @return string
     */
    private function detectDeviceType(?string $userAgent): string
    {
        if (empty($userAgent)) {
            return 'unknown';
        }
        
        if (preg_match('/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i', $userAgent)) {
            if (preg_match('/(tablet|ipad)/i', $userAgent)) {
                return 'tablet';
            }
            return 'mobile';
        }
        
        return 'desktop';
    }
    
    /**
     * Deteksi browser dari user agent
     *
     * @param string|null $userAgent
     * @return string
     */
    private function detectBrowser(?string $userAgent): string
    {
        if (empty($userAgent)) {
            return 'unknown';
        }
        
        if (preg_match('/MSIE|Trident/i', $userAgent)) {
            return 'Internet Explorer';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            return 'Firefox';
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            if (preg_match('/Edge/i', $userAgent)) {
                return 'Edge';
            } elseif (preg_match('/Edg/i', $userAgent)) {
                return 'Edge';
            } elseif (preg_match('/OPR|Opera/i', $userAgent)) {
                return 'Opera';
            } elseif (preg_match('/SamsungBrowser/i', $userAgent)) {
                return 'Samsung Browser';
            } else {
                return 'Chrome';
            }
        } elseif (preg_match('/Safari/i', $userAgent)) {
            return 'Safari';
        }
        
        return 'unknown';
    }
}
