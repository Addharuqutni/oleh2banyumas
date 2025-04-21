@extends('layouts.index')

@section('title', 'Tentang Kami - Snack Banyumas')

@section('content')
<div class="container py-5">
    <!-- Header Section with Logo -->
    <div class="row mb-2">
        <div class="col-lg-10 col-md-10 mx-auto text-center">
        <h1 class="fw-bold judul">About US</h1>
            <img src="{{ asset('images/Logo.png') }}" alt="Snack Banyumas Logo" class="img-fluid mb-4" style="height: 120px;">
            <div class="divider mx-auto mb-4"></div>
            <p class="text-muted">
                Selamat datang di platform Sistem Informasi Geografis (SIG) Pemetaan Oleh-Oleh Khas Banyumas.
                Website yang bertujuan untuk memudahkan wisatawan dalam menemukan dan mengakses informasi 
                tentang oleh-oleh makanan ringan khas Banyumas.
            </p>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="row mb-5">
        <div class="col-lg-10 mx-auto">
                <div class="card-body">
                    <!-- Background Section -->
                    <div class="content-section mb-5">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/Banyumas_Regency.jpg" 
                                     alt="Banyumas Sign" 
                                     class="img-fluid rounded shadow-sm w-100 h-100 object-fit-cover">
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted lh-lg">
                                    Kabupaten Banyumas, dengan kekayaan alam dan budayanya, telah menjadi destinasi wisata yang semakin
                                    diminati. Terletak strategis di jalur utama Jawa Tengah, daerah ini mampu menarik perhatian wisatawan
                                    yang ingin menikmati keindahan alam yang masih terjaga serta keunikan budaya lokal yang beragam.
                                </p>
                                <p class="text-muted lh-lg">
                                    Berbagai macam jenis makanan ringan oleh-oleh khas Banyumas bisa dinikmati, mulai dari getuk goreng
                                    Sokaraja yang manis dan gurih, hingga nopia yang renyah dan legit, menjadi incaran para wisatawan untuk
                                    dibawa pulang sebagai buah tangan atau kenang-kenangan.
                                </p>
                            </div>
                        </div>
                        
                        <p class="text-muted lh-lg mt-4">
                            Namun, tantangan utama yang dihadapi wisatawan adalah kurangnya akses informasi yang memadai mengenai
                            jenis-jenis oleh-oleh makanan ringan serta lokasi toko-toko yang menjualnya. Informasi mengenai
                            oleh-oleh khas Banyumas rata-rata masih tersebar secara konvensional melalui brosur, pamflet, atau dari
                            mulut ke mulut.
                        </p>
                    </div>
                    
                    <!-- Our Goals Section -->
                    <div class="content-section">
                        <h2 class="judul text-center mb-3">Tujuan Kami</h2>
                        <div class="row">
                            <div class="col-lg-12 mx-auto">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="goal-card p-4 h-100 bg-light rounded">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle bg-success text-white me-3">
                                                    <i class="bi bi-geo-alt"></i>
                                                </div>
                                                <h5 class="mb-0">Sistem Informasi Geografis</h5>
                                            </div>
                                            <p class="text-muted mb-0">
                                                Menyediakan sistem informasi geografis berbasis web yang mendukung pencarian 
                                                dan pemetaan toko oleh-oleh makanan ringan khas Banyumas.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="goal-card p-4 h-100 bg-light rounded">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle bg-success text-white me-3">
                                                    <i class="bi bi-info-circle"></i>
                                                </div>
                                                <h5 class="mb-0">Informasi Detail</h5>
                                            </div>
                                            <p class="text-muted mb-0">
                                                Memberikan informasi detail seperti lokasi, jenis oleh-oleh, harga, 
                                                jam operasional, dan ulasan pelanggan.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="goal-card p-4 h-100 bg-light rounded">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle bg-success text-white me-3">
                                                    <i class="bi bi-shop"></i>
                                                </div>
                                                <h5 class="mb-0">Promosi Produk Lokal</h5>
                                            </div>
                                            <p class="text-muted mb-0">
                                                Meningkatkan visibilitas toko oleh-oleh dan mempromosikan
                                                produk-produk lokal Banyumas ke wisatawan.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="goal-card p-4 h-100 bg-light rounded">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle bg-success text-white me-3">
                                                    <i class="bi bi-heart"></i>
                                                </div>
                                                <h5 class="mb-0">Pelestarian Budaya</h5>
                                            </div>
                                            <p class="text-muted mb-0">
                                                Mendorong pertumbuhan ekonomi lokal dan melestarikan 
                                                budaya kuliner khas Banyumas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<style>
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    
    .goal-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .goal-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    @media (max-width: 768px) {
        .lead {
            font-size: 1rem;
        }
    }
</style>
@endsection