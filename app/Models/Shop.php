<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shop extends Model
{
    use HasFactory;

    /**
     * Atribut-atribut yang dapat diisi secara massal saat pembuatan atau pembaruan toko.
     */
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'description',
        'phone',
        'email',
        'operating_hours',
        'has_delivery',
        'grab_link',
        'gojek_link',
        'featured_image',
        'status',
        'slug',
    ];

    /**
     * Gunakan kolom 'slug' sebagai pengenal utama pada route (route model binding).
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Fungsi boot digunakan saat model pertama kali dimuat.
     * Menambahkan logika otomatis untuk menghasilkan slug unik dari nama toko.
     */
    protected static function boot()
    {
        parent::boot();

        // Saat toko baru dibuat
        static::creating(function ($shop) {
            if (empty($shop->slug)) {
                $shop->slug = Str::slug($shop->name);
                $count = 2;
                $originalSlug = $shop->slug;

                // Pastikan slug tidak duplikat
                while (static::where('slug', $shop->slug)->exists()) {
                    $shop->slug = $originalSlug . '-' . $count++;
                }
            }
        });

        // Saat toko diperbarui dan nama berubah, slug ikut diperbarui
        static::updating(function ($shop) {
            if ($shop->isDirty('name') && !$shop->isDirty('slug')) {
                $shop->slug = Str::slug($shop->name);
                $count = 2;
                $originalSlug = $shop->slug;

                // Pastikan slug tetap unik saat update
                while (static::where('slug', $shop->slug)->where('id', '!=', $shop->id)->exists()) {
                    $shop->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    /**
     * Relasi satu toko memiliki banyak produk.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Relasi satu toko dapat memiliki beberapa gambar tambahan (galeri).
     */
    public function images()
    {
        return $this->hasMany(ShopImage::class);
    }

    /**
     * Relasi satu toko memiliki banyak ulasan dari pengguna.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Mendapatkan rata-rata rating dari ulasan yang disetujui.
     * Jika belum ada, akan mengembalikan nilai 0.
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->where('is_approved', true)->avg('rating') ?? 0;
    }

    /**
     * Relasi ke log kunjungan pengguna ke toko ini.
     */
    public function visitorLogs()
    {
        return $this->hasMany(VisitorLog::class);
    }

    /**
     * Mengambil semua kategori produk yang dimiliki oleh toko ini.
     * Ini bukan relasi Eloquent langsung, tapi query dinamis.
     */
    public function getCategoriesAttribute()
    {
        return Category::whereHas('products', function ($query) {
            $query->where('shop_id', $this->id);
        })->get();
    }
}
