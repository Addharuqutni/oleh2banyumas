<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Atribut-atribut yang diperbolehkan untuk diisi secara massal.
     * Digunakan saat menyimpan ulasan dari pengguna ke database.
     */
    protected $fillable = [
        'shop_id',
        'name',
        'email',
        'rating',
        'comment',
        'is_approved',
    ];

    /**
     * Relasi satu ulasan dimiliki oleh satu toko.
     * Menghubungkan ulasan ini dengan toko yang diulas.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
