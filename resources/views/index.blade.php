@extends('layouts.index')

@section('title', 'Oleh Oleh Banyumas')
@section('description', 'Website Oleh Oleh Banyumas menyediakan daftar toko oleh-oleh makanan khas Banyumas, langsung dari pengrajin asli. Temukan camilan favorit Anda di sini!')

@section('content')
    @include('landingPage.heroGuest')
    @include('landingPage.maps')
    @include('landingPage.kategori')
@endsection
