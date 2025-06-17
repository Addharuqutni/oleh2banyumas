<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Menampilkan halaman utama indeks artikel yang berisi daftar pilihan oleh-oleh khas.
     */
    public function index()
    {
        // Jika dibutuhkan, data tambahan bisa disisipkan di sini
        return view('artikel');
    }

    /**
     * Menampilkan artikel yang membahas tentang Getuk Goreng.
     */
    public function getukgoreng()
    {
        return view('artikelPage.getukgoreng');
    }

    /**
     * Menampilkan artikel seputar Jenang Jaket sebagai jajanan tradisional.
     */
    public function jenangjaket()
    {
        return view('artikelPage.jenangjaket');
    }

    /**
     * Menampilkan halaman artikel khusus tentang makanan khas Nopia.
     */
    public function nopia()
    {
        return view('artikelPage.nopia');
    }

    /**
     * Menyediakan konten artikel yang membahas Keripik Tempe.
     */
    public function keripiktempe()
    {
        return view('artikelPage.keripiktempe');
    }

    /**
     * Menampilkan artikel kuliner tentang camilan Lanting.
     */
    public function lanting()
    {
        return view('artikelPage.lanting');
    }

    /**
     * Halaman artikel khusus yang menjelaskan makanan khas Mendoan.
     */
    public function mendoan()
    {
        return view('artikelPage.mendoan');
    }

    /**
     * Menampilkan informasi dalam bentuk artikel mengenai Cimplung.
     */
    public function cimplung()
    {
        return view('artikelPage.cimplung');
    }

    /**
     * Menyajikan artikel tentang makanan tradisional bernama Mireng.
     */
    public function mireng()
    {
        return view('artikelPage.mireng');
    }
}
