<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    use HasFactory;

    /**
     * Atribut-atribut yang boleh diisi secara langsung (mass assignment).
     * Digunakan untuk mencatat setiap aktivitas pencarian pengguna.
     */
    protected $fillable = [
        'query',         // Kata kunci yang dicari pengguna
        'results_count', // Jumlah hasil yang ditemukan dari pencarian
        'ip_address',
        'has_results'
    ];
}
