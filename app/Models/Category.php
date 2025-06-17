<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Atribut-atribut yang diizinkan untuk diisi secara massal (bulk assignment).
     * Digunakan saat membuat atau memperbarui kategori lewat form atau request.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    /**
     * Relasi many-to-many: Mengambil semua produk yang terhubung dengan kategori ini.
     * Relasi ini melalui tabel pivot `product_categories`.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    /**
     * Mengambil toko-toko yang memiliki produk dalam kategori ini.
     * Ini bukan relasi langsung, melainkan menggunakan query `whereHas` secara dinamis.
     */
    public function shops()
    {
        return Shop::whereHas('products', function ($query) {
            $query->whereHas('categories', function ($q) {
                $q->where('categories.id', $this->id);
            });
        });
    }
}
