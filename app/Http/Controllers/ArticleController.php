<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the main article index page with all snack options.
     */
    public function index()
    {
        // You could add more data here if needed
        return view('artikel');
    }

    /**
     * Display the Getuk Goreng article page.
     */
    public function getukgoreng()
    {
        return view('artikelPage.getukgoreng');
    }

    /**
     * Display the Jenang Jaket article page.
     */
    public function jenangjaket()
    {
        return view('artikelPage.jenangjaket');
    }

    /**
     * Display the Nopia article page.
     */
    public function nopia()
    {
        return view('artikelPage.nopia');
    }

    /**
     * Display the Keripik Tempe article page.
     */
    public function keripiktempe()
    {
        return view('artikelPage.keripiktempe');
    }

    /**
     * Display the Lanting article page.
     */
    public function lanting()
    {
        return view('artikelPage.lanting');
    }

    /**
     * Display the Mendoan article page.
     */
    public function mendoan()
    {
        return view('artikelPage.mendoan');
    }

    /**
     * Display the Cimplung article page.
     */
    public function cimplung()
    {
        return view('artikelPage.cimplung');
    }

    /**
     * Display the Mireng article page.
     */
    public function mireng()
    {
        return view('artikelPage.mireng');
    }
}
