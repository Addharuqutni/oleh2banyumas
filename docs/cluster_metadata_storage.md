# Dokumentasi Penyimpanan Metadata Cluster Harga

## Latar Belakang

Sebelumnya, metadata cluster harga produk hanya disimpan di cache Laravel menggunakan `Cache::forever()`. Meskipun metode ini menyimpan data "selamanya", data tersebut masih bisa hilang jika cache dibersihkan, server di-restart, atau ada masalah dengan penyimpanan cache.

## Solusi

Untuk mengatasi masalah ini, kami telah mengimplementasikan sistem penyimpanan metadata yang lebih permanen dengan pendekatan berlapis:

1. **Penyimpanan Cache** - Tetap menggunakan cache untuk akses cepat
2. **Penyimpanan File** - Menyimpan metadata dalam file JSON sebagai backup permanen
3. **Pemulihan Otomatis** - Sistem akan otomatis memulihkan metadata dari file JSON jika tidak ditemukan di cache
4. **Penjadwalan Refresh** - Metadata di-refresh secara berkala untuk memastikan ketersediaan

## Komponen Utama

### 1. Command Clustering Produk (`ClusterProductsByPrice`)

Command ini telah diperbarui untuk menyimpan metadata cluster tidak hanya di cache tetapi juga di file JSON:

```php
// Simpan metadata ke cache
Cache::forever('price_cluster_metadata', $clusterMetadata);

// Simpan juga ke dalam file JSON sebagai backup permanen
$jsonPath = storage_path('app/price_cluster_metadata.json');
file_put_contents($jsonPath, json_encode($clusterMetadata, JSON_PRETTY_PRINT));
```

### 2. Controller Peta Cluster (`ClusterMapController`)

Controller ini telah diperbarui untuk mencari metadata dari cache terlebih dahulu, dan jika tidak ditemukan, akan mencoba membacanya dari file JSON:

```php
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
```

### 3. Command Refresh Metadata (`RefreshClusterMetadata`)

Command baru ini dibuat untuk memperbarui metadata di cache dari file JSON kapan saja:

```bash
php artisan cluster:refresh-metadata
```

Command ini akan:
1. Membaca file JSON metadata
2. Memvalidasi isinya
3. Menyimpannya ke cache
4. Menampilkan informasi metadata yang diperbarui

### 4. Penjadwalan Otomatis

Kernel scheduler telah diperbarui untuk menjalankan refresh metadata secara berkala:

```php
// Memperbarui metadata cluster harga dari file JSON ke cache setiap 4 jam
$schedule->command('cluster:refresh-metadata')->everyFourHours();
```

## Cara Penggunaan

### Menjalankan Clustering Manual

```bash
php artisan products:cluster-price
```

Command ini akan melakukan clustering produk dan menyimpan metadata ke cache dan file JSON.

### Memperbarui Cache dari File JSON

```bash
php artisan cluster:refresh-metadata
```

Command ini berguna jika cache terhapus dan Anda ingin memulihkan metadata tanpa menjalankan proses clustering ulang.

### Memastikan Scheduler Berjalan

Pastikan Laravel scheduler berjalan di server untuk refresh otomatis:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Troubleshooting

### Metadata Tidak Muncul di Peta

Jika metadata tidak muncul di peta cluster:

1. Periksa apakah file JSON ada di `storage/app/price_cluster_metadata.json`
2. Jalankan command `php artisan cluster:refresh-metadata`
3. Periksa log Laravel untuk pesan error

### Memperbarui Metadata

Untuk memperbarui metadata (misalnya mengubah nama cluster):

1. Edit file `app/Console/Commands/ClusterProductsByPrice.php`
2. Ubah array `$clusterNames`
3. Jalankan command `php artisan products:cluster-price`

## Kesimpulan

Dengan implementasi ini, metadata cluster harga akan tetap tersedia meskipun cache dibersihkan. Sistem akan secara otomatis memulihkan data dari file JSON, dan scheduler akan memastikan cache selalu terisi dengan data terbaru.