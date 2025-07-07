<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ClusterMetadataStorageTest extends TestCase
{
    /**
     * Test apakah command refresh metadata berfungsi dengan benar.
     *
     * @return void
     */
    public function test_refresh_metadata_command()
    {
        // Hapus metadata dari cache
        Cache::forget('price_cluster_metadata');
        
        // Pastikan metadata tidak ada di cache
        $this->assertNull(Cache::get('price_cluster_metadata'));
        
        // Buat metadata dummy untuk pengujian
        $testMetadata = [
            0 => [
                'name' => 'Ekonomis Test',
                'description' => 'Rentang harga: 10000-50000',
                'count' => 10,
                'min_price' => 10000,
                'max_price' => 50000,
            ],
            1 => [
                'name' => 'Menengah Test',
                'description' => 'Rentang harga: 50001-100000',
                'count' => 5,
                'min_price' => 50001,
                'max_price' => 100000,
            ],
        ];
        
        // Simpan metadata dummy ke file JSON
        $jsonPath = storage_path('app/price_cluster_metadata.json');
        File::put($jsonPath, json_encode($testMetadata, JSON_PRETTY_PRINT));
        
        // Jalankan command refresh metadata
        $this->artisan('cluster:refresh-metadata')
             ->expectsOutput('Metadata cluster berhasil dimuat dari file JSON ke cache.')
             ->assertExitCode(0);
        
        // Verifikasi metadata telah dimuat ke cache
        $cachedMetadata = Cache::get('price_cluster_metadata');
        $this->assertNotNull($cachedMetadata);
        $this->assertEquals($testMetadata, $cachedMetadata);
        
        // Bersihkan file pengujian
        File::delete($jsonPath);
    }
    
    /**
     * Test apakah controller dapat memuat metadata dari file JSON jika tidak ada di cache.
     *
     * @return void
     */
    public function test_controller_loads_metadata_from_json()
    {
        // Hapus metadata dari cache
        Cache::forget('price_cluster_metadata');
        
        // Buat metadata dummy untuk pengujian
        $testMetadata = [
            0 => [
                'name' => 'Ekonomis Test',
                'description' => 'Rentang harga: 10000-50000',
                'count' => 10,
                'min_price' => 10000,
                'max_price' => 50000,
            ],
        ];
        
        // Simpan metadata dummy ke file JSON
        $jsonPath = storage_path('app/price_cluster_metadata.json');
        File::put($jsonPath, json_encode($testMetadata, JSON_PRETTY_PRINT));
        
        // Akses halaman cluster map
        $response = $this->get('/cluster-map');
        $response->assertStatus(200);
        
        // Verifikasi metadata telah dimuat ke cache dari file JSON
        $cachedMetadata = Cache::get('price_cluster_metadata');
        $this->assertNotNull($cachedMetadata);
        $this->assertEquals($testMetadata, $cachedMetadata);
        
        // Bersihkan file pengujian
        File::delete($jsonPath);
    }
}