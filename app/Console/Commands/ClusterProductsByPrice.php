<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\PriceClusteringService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ClusterProductsByPrice extends Command
{
    protected $signature = 'products:cluster-price {--k=3 : Jumlah cluster yang diinginkan}';
    protected $description = 'Menjalankan clustering harga produk dan menyimpan hasilnya ke database';

    public function handle()
    {
        $this->info('Memulai proses clustering harga produk...');
        Log::info('Job clustering harga dimulai.');

        try {
            $products = Product::query()
                ->where('is_available', true)
                ->whereHas('shop', function ($query) {
                    $query->where('status', 'active');
                })
                ->get();

            if ($products->count() < $this->option('k')) {
                $this->warn('Jumlah produk tidak cukup untuk di-cluster. Proses dibatalkan.');
                Log::warning('Jumlah produk tidak cukup untuk clustering.');
                return 1;
            }

            $k = (int) $this->option('k');
            $this->info("Menggunakan k={$k} cluster.");

            $clusteringService = new PriceClusteringService($k);
            $result = $clusteringService->clusterByPrice($products);

            $this->info('Clustering selesai. Menyimpan hasil ke database...');
            Product::query()->update(['price_cluster_group' => null]);
            foreach ($result['clusters'] as $clusterIndex => $productsInCluster) {
                $productIds = collect($productsInCluster)->pluck('id');
                if ($productIds->isNotEmpty()) {
                    Product::whereIn('id', $productIds)->update([
                        'price_cluster_group' => $clusterIndex
                    ]);
                }
            }
            
            // --- BLOK KODE UNTUK MENYIMPAN METADATA CLUSTER ---
            $this->info('Membuat dan menyimpan metadata cluster...');
            
            // Siapkan nama deskriptif untuk setiap cluster
            $clusterNames = ['Ekonomis', 'Menengah', 'Tinggi'];
            
            $clusterMetadata = [];
            foreach ($result['cluster_info'] as $index => $info) {
                $clusterMetadata[$index] = [
                    'name'        => $clusterNames[$index] ?? "Kelompok {$index}", // Ambil nama atau gunakan default
                    'description' => "Rentang harga: " . $info['price_range'],
                    'count'       => $info['count'],
                    'min_price'   => $info['min_price'],
                    'max_price'   => $info['max_price'],
                ];
            }
            
            // Simpan metadata ke cache dan database untuk memastikan data tidak hilang
            Cache::forever('price_cluster_metadata', $clusterMetadata);
            
            // Simpan juga ke dalam file JSON sebagai backup permanen
            $jsonPath = storage_path('app/price_cluster_metadata.json');
            file_put_contents($jsonPath, json_encode($clusterMetadata, JSON_PRETTY_PRINT));
            
            $this->info('Metadata berhasil disimpan ke cache dan file permanen.');

            $this->info('Proses clustering harga produk berhasil diselesaikan.');
            Log::info('Job clustering harga selesai.');
            return 0;

        } catch (\Exception $e) {
            $this->error('Terjadi kesalahan selama proses clustering: ' . $e->getMessage());
            Log::error('Clustering Gagal: ' . $e->getMessage());
            return 1;
        }
    }
}