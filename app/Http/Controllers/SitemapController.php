<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;

class SitemapController extends Controller
{
    /**
     * Menghasilkan sitemap XML secara dinamis
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = config('app.url');
        
        // Halaman statis
        $staticPages = [
            '' => ['priority' => '1.0', 'changefreq' => 'daily'],
            'about' => ['priority' => '0.8', 'changefreq' => 'monthly'],
            'maps' => ['priority' => '0.8', 'changefreq' => 'weekly'],
            'toko' => ['priority' => '0.9', 'changefreq' => 'daily'],
            'list-toko' => ['priority' => '0.9', 'changefreq' => 'daily'],
            'artikel' => ['priority' => '0.8', 'changefreq' => 'weekly'],
            'artikel/getukgoreng' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/jenangjaket' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/nopia' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/keripiktempe' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/lanting' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/mendoan' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/cimplung' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            'artikel/mireng' => ['priority' => '0.7', 'changefreq' => 'monthly'],
        ];
        
        // Ambil semua toko aktif
        $shops = Shop::where('status', 'active')->get();
        
        // Ambil semua produk yang tersedia dari toko aktif
        $products = Product::whereHas('shop', function ($query) {
            $query->where('status', 'active');
        })->where('is_available', true)->get();
        
        // Set header content type
        return response()
            ->view('sitemap', [
                'staticPages' => $staticPages,
                'shops' => $shops,
                'products' => $products,
                'baseUrl' => $baseUrl
            ], 200)
            ->header('Content-Type', 'text/xml');
    }
}