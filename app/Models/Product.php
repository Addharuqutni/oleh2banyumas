<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Daftar atribut yang dapat diisi secara massal.
     * Digunakan untuk menghindari error MassAssignmentException saat menyimpan data.
     */
    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
        'slug', // Slug wajib disertakan untuk kebutuhan route model binding
    ];

    /**
     * Relasi satu produk dimiliki oleh satu toko.
     * Menyambungkan produk ke toko pemiliknya.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Relasi many-to-many: produk dapat memiliki banyak kategori.
     * Menggunakan tabel pivot `product_categories` sebagai penghubung.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    /**
     * Mengubah perilaku default route model binding.
     * Laravel akan menggunakan kolom `slug` saat mencocokkan model di route.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
