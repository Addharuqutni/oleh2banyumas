<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/artikel', function () {
    return view('artikel');
});
Route::get('/artikel/getukgoreng', function () {
    return view('artikelPage.getukgoreng');
});
Route::get('/artikel/jenangjaket', function () {
    return view('artikelPage.jenangjaket');
});
Route::get('/artikel/nopia', function () {
    return view('artikelPage.nopia');
});


Route::get('/toko', function () {
    return view('toko');
});
Route::get('/list-toko', function () {
    return view('tokoPage.listToko');
});
Route::get('/detail-toko', function () {
    return view('tokoPage.detailToko');
});