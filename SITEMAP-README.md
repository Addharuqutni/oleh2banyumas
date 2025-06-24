# Sitemap Generator untuk Oleh Banyumas

File ini berisi instruksi tentang cara menggunakan dan memperbarui sitemap untuk website Oleh Banyumas.

## Tentang Sitemap

Sitemap adalah file XML yang berisi daftar URL dari website Anda yang membantu mesin pencari seperti Google untuk menemukan, menjelajahi, dan mengindeks semua halaman website Anda dengan lebih efisien. Sitemap juga memberikan informasi tambahan seperti:

- Kapan halaman terakhir diperbarui
- Seberapa sering halaman berubah
- Seberapa penting halaman tersebut relatif terhadap halaman lain di situs

## Cara Menggunakan Sitemap Generator

### Menghasilkan Sitemap Secara Manual

Untuk menghasilkan sitemap secara manual, jalankan perintah berikut di terminal:

```bash
php artisan sitemap:generate
```

Perintah ini akan menghasilkan file `sitemap.xml` di folder `public` yang berisi:
- Semua halaman statis (beranda, tentang, peta, dll.)
- Semua toko aktif
- Semua produk yang tersedia dari toko aktif

### Menghasilkan Sitemap Secara Otomatis

Untuk menghasilkan sitemap secara otomatis, Anda dapat menambahkan perintah ke dalam Laravel Scheduler. Buka file `app/Console/Kernel.php` dan tambahkan kode berikut di dalam metode `schedule`:

```php
$schedule->command('sitemap:generate')->daily();
```

Ini akan menghasilkan sitemap baru setiap hari. Pastikan cron job server Anda sudah dikonfigurasi dengan benar untuk menjalankan scheduler Laravel.

## Mendaftarkan Sitemap ke Google Search Console

Setelah sitemap dihasilkan, Anda perlu mendaftarkannya ke Google Search Console:

1. Login ke [Google Search Console](https://search.google.com/search-console)
2. Pilih properti website Anda
3. Di menu sidebar kiri, klik "Sitemaps"
4. Masukkan URL sitemap Anda (misalnya: `https://olehbanyumas.com/sitemap.xml`)
5. Klik "Submit"

Google akan memproses sitemap Anda dan mulai mengindeks halaman-halaman yang terdaftar.

## Memverifikasi Sitemap

Untuk memverifikasi bahwa sitemap Anda valid dan dapat diakses:

1. Buka browser dan kunjungi URL sitemap Anda (misalnya: `https://olehbanyumas.com/sitemap.xml`)
2. Pastikan file XML ditampilkan dengan benar dan tidak ada error
3. Gunakan alat validasi sitemap online seperti [XML Sitemap Validator](https://www.xml-sitemaps.com/validate-xml-sitemap.html)

## Troubleshooting

Jika Anda mengalami masalah dengan sitemap:

- Pastikan file `sitemap.xml` memiliki izin baca yang benar (biasanya 644)
- Verifikasi bahwa URL dalam sitemap menggunakan domain yang benar (sesuai dengan konfigurasi `APP_URL` di file `.env`)
- Periksa apakah `robots.txt` Anda mengizinkan akses ke sitemap

## Catatan Penting

- Sitemap harus diperbarui secara berkala untuk mencerminkan perubahan pada website
- Ukuran maksimum sitemap adalah 50MB atau 50.000 URL
- Jika website Anda memiliki lebih dari 50.000 URL, Anda perlu membuat beberapa file sitemap dan sitemap indeks