@extends('layouts.index')

@section('title', 'Oleh Oleh Banyumas')

@section('content')
    <div class="container py-4">

        <div class="container mb-4">
            <div class="row position-relative align-items-center">
                <!-- Back Button (Left) -->
                <div class="col-auto position-absolute start-0 d-flex align-items-center" style="z-index: 10;">
                    <a href="#" class="text-dark">
                        <i class="bi bi-chevron-left fs-4"></i>
                    </a>
                </div>

                <!-- Title (Center) -->
                <div class="col-12 text-center">
                    <h1 class="mb-0 fw-bold">Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="/toko" class="text-decoration-none">Toko</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nama Toko</li>
            </ol>
        </nav>

        <!-- Map Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="map-container shadow rounded">
                    <div id="map" style="height: 300px;">
                        <p class="text-center">Peta lokasi toko oleh-oleh</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Store Details -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="fw-semibold">Nama Toko</h2>
                <p class="text-secondary">Alamat: Jl. Contoh Alamat No. 123, Banyumas</p>
                <p class="text-secondary">Deskripsi: Toko ini menyediakan berbagai oleh-oleh khas Banyumas, mulai dari
                    makanan ringan hingga kerajinan tangan.</p>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="fw-semibold mb-4 text-center">Foto Toko</h2>
                <div id="storeCarousel" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="2"></button>
                    </div>

                    <!-- Foto Toko -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src=""
                                alt="Tampak depan Toko Oleh Oleh Makanan Ringan Banyumas"
                                class="d-block w-100 carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src=""
                                alt="Bagian dalam Toko Oleh Oleh Makanan Ringan Banyumas"
                                class="d-block w-100 carousel-img">
                        </div>
                        <div class="carousel-item">
                            <img src=""
                                alt="Staff Toko Oleh Oleh Makanan Ringan Banyumas" class="d-block w-100 carousel-img">
                        </div>
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#storeCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#storeCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>


        <!-- Products Section -->
        <h2 class="fw-semibold mb-4">Daftar Produk Toko</h2>
        <div class="row g-4">
            <!-- Product Card 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card shadow rounded">
                    <img src="https://radarbanyumas.disway.id/upload/21f2411871cc16ea65d41cc9f6f10379.jpg"
                        alt="Getuk Goreng" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">Getuk Goreng</h5>
                        <p class="card-text">Rp 15.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card shadow rounded">
                    <img src="https://visitjawatengah.jatengprov.go.id/assets/images/c55b5229-9b76-4248-b4dd-07eb530d03b5.jpg"
                        alt="Nopia" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">Nopia</h5>
                        <p class="card-text">Rp 20.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card shadow rounded">
                    <img src="https://radarbanyumas.disway.id//upload/600a36d2ce150a861848b8cad106f2ee.jpg"
                        alt="Jenang Jaket" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">Jenang Jaket</h5>
                        <p class="card-text">Rp 25.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card shadow rounded">
                    <img src="https://down-id.img.susercontent.com/file/2244ce68d5cc9d5b5456131a4edbed17" alt="Lanting"
                        class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">Lanting</h5>
                        <p class="card-text">Rp 30.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Card Styling */
        .product-card {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-weight: bold;
            color: #2e7d32;
        }

        .card-text {
            color: #666;
        }

        .btn {
            background-color: #2e7d32;
            color: white;
        }

        .btn:hover {
            background-color: #1b5e20;
        }

        /* Carousel Styling */
        .carousel-img {
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            padding: 15px;
            bottom: 20px;
        }

        .carousel-indicators {
            bottom: 0;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .carousel-img {
                height: 300px;
            }

            .carousel-caption h5 {
                font-size: 1rem;
            }

            .carousel-caption p {
                font-size: 0.8rem;
            }
        }
    </style>

@endsection
