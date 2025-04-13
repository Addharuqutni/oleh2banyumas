<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name')
            ->get();
            
        return view('index', compact('shops'));
    }
    
    /**
     * Show the welcome page.
     */
    public function welcome()
    {
        $shops = Shop::where('status', 'active')
            ->select('id', 'name', 'address', 'latitude', 'longitude', 'featured_image', 'slug')
            ->orderBy('name')
            ->get();
            
        return view('welcome', compact('shops'));
    }
    
    /**
     * Show the hero guest page.
     */
    public function heroGuest()
    {
        return view('landingPage.heroGuest');
    }
    
    /**
     * Show the kategori page.
     */
    public function kategori()
    {
        $categories = Category::orderBy('name')->get();
        return view('landingPage.kategori', compact('categories'));
    }
    
    /**
     * Show the about page.
     */
    public function about()
    {
        return view('about');
    }
}
