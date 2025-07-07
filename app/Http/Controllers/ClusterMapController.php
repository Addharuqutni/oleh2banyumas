<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * Controller untuk menampilkan peta dengan toko-toko yang dikelompokkan berdasarkan cluster harga produk
 * 
 * Kelas ini bertanggung jawab untuk mengelola tampilan peta yang menunjukkan lokasi toko-toko
 * berdasarkan kelompok harga produk yang dominan di setiap toko.
 */
class ClusterMapController extends Controller
{
    /**
     * Konstanta untuk radius bumi dalam kilometer
     * 
     * Digunakan dalam perhitungan jarak menggunakan rumus Haversine
     */
    private const EARTH_RADIUS_KM = 6371;
    
    /**
     * Menampilkan peta dengan toko-toko yang dikelompokkan berdasarkan cluster harga produk
     * 
     * Metode ini mengambil data lokasi pengguna, metadata cluster, dan data toko,
     * kemudian memproses data tersebut untuk ditampilkan pada peta.
     *
     * @param Request $request Request HTTP yang berisi parameter lokasi pengguna
     * @return \Illuminate\View\View Tampilan peta dengan data toko dan cluster
     */
    public function index(Request $request)
    {        
        // Ambil data lokasi pengguna dan metadata cluster
        [$userLat, $userLng, $useLocation] = $this->getUserLocation($request);
        $clusterMetadata = $this->getClusterMetadata();
        
        // Ambil dan proses data toko
        $shops = $this->getActiveShopsWithPriceCluster();
        $shopsWithCluster = $this->processShopsWithCluster($shops, $clusterMetadata);
        
        // Urutkan toko berdasarkan jarak jika lokasi pengguna tersedia
        if ($useLocation) {
            $shopsWithCluster = $this->sortShopsByDistance($shopsWithCluster, $userLat, $userLng);
        }

        // Kirim data ke view
        return view('clusterMap.index', compact(
            'shopsWithCluster', 
            'clusterMetadata', 
            'useLocation', 
            'userLat', 
            'userLng'
        ));
    }
    
    /**
     * Mendapatkan lokasi pengguna dari request
     * 
     * Mengekstrak data latitude dan longitude dari request HTTP dan menentukan
     * apakah lokasi tersebut valid untuk digunakan.
     *
     * @param Request $request Request HTTP yang berisi parameter lokasi
     * @return array Array berisi [latitude, longitude, useLocation]
     */
    private function getUserLocation(Request $request): array
    {
        $userLat = $request->input('latitude');
        $userLng = $request->input('longitude');
        $useLocation = $userLat && $userLng;
        
        return [$userLat, $userLng, $useLocation];
    }
    
    /**
     * Mendapatkan metadata cluster dari cache atau file backup
     * 
     * Mengambil data metadata cluster harga dari cache sistem.
     * Jika data tidak tersedia di cache, akan mencoba membaca dari file JSON backup.
     * Metadata ini berisi informasi tentang setiap cluster seperti label, nama, dan rentang harga.
     *
     * @return array Array berisi metadata cluster harga
     */
    private function getClusterMetadata(): array
    {
        // Coba ambil dari cache terlebih dahulu
        $metadata = Cache::get('price_cluster_metadata');
        
        // Jika tidak ada di cache, coba ambil dari file JSON
        if (empty($metadata)) {
            $jsonPath = storage_path('app/price_cluster_metadata.json');
            if (file_exists($jsonPath)) {
                $jsonContent = file_get_contents($jsonPath);
                $metadata = json_decode($jsonContent, true);
                
                // Simpan kembali ke cache untuk mempercepat akses berikutnya
                if (!empty($metadata)) {
                    Cache::forever('price_cluster_metadata', $metadata);
                    Log::info('Metadata cluster berhasil dimuat dari file backup JSON');
                }
            }
        }
        
        return $metadata ?: [];
    }
    
    /**
     * Mendapatkan toko aktif yang memiliki produk dengan cluster harga
     * 
     * Mengambil daftar toko yang aktif dan memiliki setidaknya satu produk
     * yang sudah dikelompokkan dalam cluster harga tertentu.
     *
     * @return \Illuminate\Database\Eloquent\Collection Koleksi toko aktif dengan produk bercluster
     */
    private function getActiveShopsWithPriceCluster()
    {
        return Shop::where('status', 'active')
            ->whereHas('products', function($query) {
                $query->whereNotNull('price_cluster_group');
            })
            ->with(['products' => function($query) {
                $query->whereNotNull('price_cluster_group')
                      ->where('is_available', true);
            }])
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'slug', 'featured_image')
            ->get();
    }
    
    /**
     * Memproses toko dengan menambahkan informasi cluster
     * 
     * Menentukan cluster harga dominan untuk setiap toko berdasarkan jumlah produk
     * dalam setiap cluster, kemudian menambahkan informasi cluster tersebut ke data toko.
     *
     * @param \Illuminate\Database\Eloquent\Collection $shops Koleksi toko yang akan diproses
     * @param array $clusterMetadata Metadata cluster harga
     * @return \Illuminate\Support\Collection Koleksi toko yang telah ditambahkan informasi cluster
     */
    private function processShopsWithCluster($shops, array $clusterMetadata)
    {
        return $shops->map(function($shop) use ($clusterMetadata) {
            // Hitung jumlah produk per cluster untuk toko ini
            $clusterCounts = $shop->products->groupBy('price_cluster_group')
                ->map->count();
            
            // Tentukan cluster dominan (dengan jumlah produk terbanyak)
            $dominantCluster = $clusterCounts->isEmpty() ? null : $clusterCounts->sortDesc()->keys()->first();
            
            // Tambahkan informasi cluster ke data toko
            $shop->dominant_cluster = $dominantCluster;
            $shop->cluster_name = $this->getClusterName($dominantCluster, $clusterMetadata);
            
            // Debug info
            $this->logShopClusterInfo($shop, $dominantCluster);
            
            return $shop;
        });
    }
    
    /**
     * Mendapatkan nama cluster berdasarkan cluster dominan dan metadata
     * 
     * Menentukan nama yang sesuai untuk cluster berdasarkan indeks cluster dominan
     * dan metadata cluster yang tersedia. Jika tidak ada cluster yang cocok,
     * akan mengembalikan teks default.
     *
     * @param mixed $dominantCluster Indeks cluster dominan
     * @param array $clusterMetadata Metadata cluster harga
     * @return string Nama cluster yang sesuai
     */
    private function getClusterName($dominantCluster, array $clusterMetadata): string
    {
        if ($dominantCluster === null || !isset($clusterMetadata[$dominantCluster])) {
            return 'Tidak ada cluster';
        }
        
        return $clusterMetadata[$dominantCluster]['label'] ?? 
               $clusterMetadata[$dominantCluster]['name'] ?? 
               'Cluster ' . ($dominantCluster + 1);
    }
    
    /**
     * Mencatat informasi cluster toko ke log
     * 
     * Membuat catatan log debug yang berisi informasi tentang toko,
     * cluster dominan, dan nama cluster untuk keperluan debugging.
     *
     * @param Shop $shop Objek toko yang akan dicatat
     * @param mixed $dominantCluster Indeks cluster dominan
     * @return void
     */
    private function logShopClusterInfo($shop, $dominantCluster): void
    {
        Log::debug(
            "Shop: {$shop->name}, Dominant Cluster: " . 
            ($dominantCluster ?? 'null') . 
            ", Cluster Name: {$shop->cluster_name}"
        );
    }

    /**
     * Mengurutkan toko berdasarkan jarak dari lokasi pengguna
     * 
     * Menghitung jarak setiap toko dari lokasi pengguna menggunakan formula Haversine,
     * kemudian mengurutkan toko-toko tersebut berdasarkan jarak terdekat.
     *
     * @param \Illuminate\Support\Collection $shops Koleksi toko yang akan diurutkan
     * @param float $userLat Latitude lokasi pengguna
     * @param float $userLng Longitude lokasi pengguna
     * @return \Illuminate\Support\Collection Koleksi toko yang telah diurutkan berdasarkan jarak
     */
    private function sortShopsByDistance($shops, $userLat, $userLng)
    {
        return $shops->map(function($shop) use ($userLat, $userLng) {
            // Hitung jarak menggunakan formula Haversine
            $shop->distance = $this->calculateDistance($userLat, $userLng, $shop->latitude, $shop->longitude);
            return $shop;
        })->sortBy('distance');
    }

    /**
     * Menghitung jarak antara dua titik koordinat menggunakan formula Haversine
     * 
     * Formula Haversine digunakan untuk menghitung jarak antara dua titik di permukaan bumi
     * dengan mempertimbangkan kelengkungan bumi. Hasil perhitungan dalam satuan kilometer.
     *
     * @param float $lat1 Latitude titik pertama
     * @param float $lon1 Longitude titik pertama
     * @param float $lat2 Latitude titik kedua
     * @param float $lon2 Longitude titik kedua
     * @return float Jarak dalam kilometer
     */
    private function calculateDistance($lat1, $lon1, $lat2, $lon2): float
    {
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat/2) * sin($dLat/2) + 
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
             sin($dLon/2) * sin($dLon/2);
             
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        
        return self::EARTH_RADIUS_KM * $c;
    }
}