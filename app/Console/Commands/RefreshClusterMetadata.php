<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RefreshClusterMetadata extends Command
{
    /**
     * Nama dan signature dari command console.
     *
     * @var string
     */
    protected $signature = 'cluster:refresh-metadata';

    /**
     * Deskripsi dari command console.
     *
     * @var string
     */
    protected $description = 'Memperbarui metadata cluster harga dari file JSON ke cache';

    /**
     * Menjalankan command console.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Memulai proses refresh metadata cluster harga...');
        
        try {
            $jsonPath = storage_path('app/price_cluster_metadata.json');
            
            if (!file_exists($jsonPath)) {
                $this->error('File metadata tidak ditemukan di: ' . $jsonPath);
                return 1;
            }
            
            $jsonContent = file_get_contents($jsonPath);
            $metadata = json_decode($jsonContent, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->error('Gagal memproses file JSON: ' . json_last_error_msg());
                return 1;
            }
            
            if (empty($metadata)) {
                $this->warn('File metadata kosong atau tidak valid.');
                return 1;
            }
            
            // Simpan metadata ke cache
            Cache::forever('price_cluster_metadata', $metadata);
            
            $this->info('Metadata cluster berhasil dimuat dari file JSON ke cache.');
            Log::info('Metadata cluster berhasil diperbarui dari file JSON.');
            
            // Tampilkan informasi metadata
            $this->info('Informasi metadata cluster:');
            foreach ($metadata as $index => $info) {
                $this->line(sprintf(
                    "Cluster %d: %s - %s (Jumlah: %d, Harga: %s - %s)",
                    $index,
                    $info['name'],
                    $info['description'],
                    $info['count'],
                    number_format($info['min_price'], 0, ',', '.'),
                    number_format($info['max_price'], 0, ',', '.')
                ));
            }
            
            return 0;
        } catch (\Exception $e) {
            $this->error('Terjadi kesalahan: ' . $e->getMessage());
            Log::error('Refresh metadata gagal: ' . $e->getMessage());
            return 1;
        }
    }
}