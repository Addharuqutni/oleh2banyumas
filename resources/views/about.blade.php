@extends('layouts.index')

@section('title', 'Tentang Kami - Snack Banyumas')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="text-dark fw-bold">Tentang Kami</h1>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-12 text-center">
            <img src="{{ asset('images/Logo.png') }}" alt="Snack Banyumas Logo" class="img-fluid" style="height: 150px;">
        </div>
        <div class="col-12 mt-4">
            <p class="text-muted text-center fw-semibold lh-base">
                Selamat datang di platform Sistem Informasi Geografis (SIG) Pemetaan Oleh-Oleh Khas Banyumas.Website yang bertujuan untuk memudahkan wisatawan dalam menemukan dan mengakses informasi tentang oleh-oleh makanan ringan khas Banyumas.
            </p>
            
            <h4 class="text-dark fw-bold text-center mt-4">Latar Belakang</h4>
            <p class="text-muted text-center fw-normal lh-base">
                Kabupaten Banyumas, dengan kekayaan alam dan budayanya, telah menjadi destinasi wisata yang semakin diminati. Terletak strategis di jalur utama Jawa Tengah, daerah ini mampu menarik perhatian wisatawan yang ingin menikmati keindahan alam yang masih terjaga serta keunikan budaya lokal yang beragam.
            </p>
            <p class="text-muted text-center fw-normal lh-base">
                Berbagai macam jenis makanan ringan oleh-oleh khas Banyumas bisa dinikmati, mulai dari getuk goreng Sokaraja yang manis dan gurih, hingga nopia yang renyah dan legit, menjadi incaran para wisatawan untuk dibawa pulang sebagai buah tangan atau kenang-kenangan.
            </p>
            <p class="text-muted text-center fw-normal lh-base">
                Namun, tantangan utama yang dihadapi wisatawan adalah kurangnya akses informasi yang memadai mengenai jenis-jenis oleh-oleh makanan ringan serta lokasi toko-toko yang menjualnya. Informasi mengenai oleh-oleh khas Banyumas rata-rata masih tersebar secara konvensional melalui brosur, pamflet, atau dari mulut ke mulut.
            </p>
            
            <h4 class="text-dark fw-bold text-center mt-4">Tujuan Kami</h4>
            <p class="text-muted text-center fw-normal lh-base">
                Website ini dikembangkan dengan tujuan untuk menyediakan sistem informasi geografis berbasis web yang mendukung pencarian dan pemetaan toko oleh-oleh makanan ringan khas Banyumas, memberikan informasi detail seperti lokasi, jenis oleh-oleh, harga, jam operasional, dan ulasan pelanggan, serta memudahkan wisatawan dalam merencanakan kunjungan ke berbagai toko oleh-oleh dengan lebih efektif.
            </p>
            <p class="text-muted text-center fw-normal lh-base">
                Selain itu, kami juga bertujuan untuk meningkatkan visibilitas toko oleh-oleh, mempromosikan produk-produk lokal, mendorong pertumbuhan ekonomi lokal dan melestarikan budaya kuliner Banyumas.
            </p>
        </div>
    </div>
    
    <div class="row mt-5 mb-5">
        <div class="col-12 text-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/Banyumas_Regency.jpg" alt="Banyumas Sign" class="img-fluid rounded shadow-sm" style="max-width: 100%;">
        </div>
    </div>
</div>
@endsection
