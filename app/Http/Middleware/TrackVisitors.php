<?php

namespace App\Http\Middleware;

use App\Models\VisitorLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Middleware ini bertugas mencatat setiap kunjungan pengguna ke halaman publik,
     * dengan mengecualikan area admin dan file statis seperti JS, CSS, dan gambar.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lanjutkan permintaan ke proses selanjutnya terlebih dahulu
        $response = $next($request);

        // Hindari pencatatan kunjungan pada dashboard admin atau asset statis
        if (
            !$request->is('admin*') &&
            !$request->is('*.js') &&
            !$request->is('*.css') &&
            !$request->is('*.jpg') &&
            !$request->is('*.png')
        ) {
            $shopId = null;

            // Identifikasi jika URL saat ini adalah detail dari suatu toko
            if ($request->route()) {
                $routeName = $request->route()->getName();
                if ($routeName == 'shops.show' || $routeName == 'shops.detail') {
                    $shop = $request->route()->parameter('shop');
                    $shopId = $shop->id ?? null;
                }
            }

            // Ambil informasi perangkat dan browser dari user agent
            $userAgent = $request->userAgent();
            $deviceType = $this->detectDeviceType($userAgent);
            $browser = $this->detectBrowser($userAgent);

            // Simpan log kunjungan ke dalam database
            VisitorLog::create([
                'ip_address'    => $request->ip(),
                'user_agent'    => $userAgent,
                'page_visited'  => $request->fullUrl(),
                'shop_id'       => $shopId,
                'referrer'      => $request->header('referer'),
                'device_type'   => $deviceType,
                'browser'       => $browser
            ]);
        }

        return $response;
    }

    /**
     * Menentukan jenis perangkat yang digunakan pengguna dari user agent.
     */
    private function detectDeviceType(?string $userAgent): string
    {
        // Jika user agent tidak tersedia, kembalikan "unknown"
        if (empty($userAgent)) {
            return 'unknown';
        }

        // Identifikasi perangkat mobile atau tablet dari pola user agent
        if (preg_match('/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i', $userAgent)) {
            if (preg_match('/(tablet|ipad)/i', $userAgent)) {
                return 'tablet';
            }
            return 'mobile';
        }

        // Jika tidak masuk kategori di atas, asumsikan sebagai desktop
        return 'desktop';
    }

    /**
     * Menentukan jenis browser yang digunakan berdasarkan user agent.
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
            if (preg_match('/Edge/i', $userAgent) || preg_match('/Edg/i', $userAgent)) {
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
