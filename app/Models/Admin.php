<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Menentukan atribut-atribut yang boleh diisi secara massal (mass assignment).
     * Ini digunakan ketika kita membuat atau memperbarui data admin secara langsung dari request.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Menyembunyikan atribut-atribut sensitif saat model diubah menjadi array atau JSON.
     * Data seperti kata sandi dan token akan otomatis disembunyikan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mengubah tipe data atribut tertentu saat diakses.
     * Dalam hal ini, password otomatis di-hash saat disimpan.
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
