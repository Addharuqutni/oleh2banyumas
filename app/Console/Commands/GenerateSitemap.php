<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Shop;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap XML file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Generating sitemap...');
        
        // Mulai XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        
        // Tambahkan halaman statis
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
        
        $baseUrl = config('app.url');
        
        foreach ($staticPages as $page => $meta) {
            $url = $baseUrl . '/' . $page;
            $xml .= $this->getUrlXml($url, $meta['changefreq'], $meta['priority']);
        }
        
        // Tambahkan halaman toko
        $shops = Shop::where('status', 'active')->get();
        $this->info('Adding ' . $shops->count() . ' shops to sitemap...');
        
        foreach ($shops as $shop) {
            $url = $baseUrl . '/toko/' . $shop->slug;
            $xml .= $this->getUrlXml($url, 'weekly', '0.8');
            
            // Tambahkan halaman detail toko
            $url = $baseUrl . '/toko/detail-toko/' . $shop->slug;
            $xml .= $this->getUrlXml($url, 'weekly', '0.8');
        }
        
        // Tambahkan halaman produk
        $products = Product::whereHas('shop', function ($query) {
            $query->where('status', 'active');
        })->where('is_available', true)->get();
        
        $this->info('Adding ' . $products->count() . ' products to sitemap...');
        
        foreach ($products as $product) {
            $url = $baseUrl . '/toko/detail-toko/' . $product->shop->slug . '/produk/' . $product->slug;
            $xml .= $this->getUrlXml($url, 'weekly', '0.7');
        }
        
        // Tutup XML
        $xml .= '</urlset>';
        
        // Simpan file
        File::put(public_path('sitemap.xml'), $xml);
        
        $this->info('Sitemap generated successfully!');
        return 0;
    }
    
    /**
     * Generate XML untuk URL
     *
     * @param string $url
     * @param string $changefreq
     * @param string $priority
     * @return string
     */
    private function getUrlXml($url, $changefreq, $priority)
    {
        return "    <url>\n" .
               "        <loc>{$url}</loc>\n" .
               "        <changefreq>{$changefreq}</changefreq>\n" .
               "        <priority>{$priority}</priority>\n" .
               "    </url>\n";
    }
}