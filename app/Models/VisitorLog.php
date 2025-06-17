<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;

    /**
     * Atribut-atribut yang dapat diisi secara massal.
     * Digunakan untuk mencatat aktivitas kunjungan pengguna di sistem.
     */
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited',
        'shop_id',
        'referrer',
        'device_type',
        'browser'
    ];

    /**
     * Relasi: satu log kunjungan dapat dikaitkan dengan satu toko.
     * Berguna untuk mengetahui statistik per toko.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
