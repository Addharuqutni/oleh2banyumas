<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopImage extends Model
{
    use HasFactory;

    /**
     * Atribut-atribut yang dapat diisi secara massal.
     * Digunakan ketika menyimpan data gambar tambahan untuk toko.
     */
    protected $fillable = [
        'shop_id',     // ID toko yang memiliki gambar ini
        'image_path',  // Lokasi penyimpanan file gambar
        'caption',     // Teks keterangan untuk gambar (opsional)
    ];

    /**
     * Relasi: satu gambar dimiliki oleh satu toko.
     * Menghubungkan gambar ini dengan entitas toko induknya.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
