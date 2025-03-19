@extends('layouts.index')

@section('title', 'Toko - Oleh Oleh')

@section('content')
    <div class="container-fluid py-4 d-flex flex-column min-vh-100" style="background-color: #e8f5e9;">
        <div class="container">
            <!-- Back Button and Title -->
            <div class="container mb-4">
                <div class="row position-relative align-items-center">
                    <!-- Back Button (Left) -->
                    <div class="col-auto position-absolute start-0 d-flex align-items-center" style="z-index: 10;">
                        <a href="{{ route('shops.index') }}" class="text-dark">
                            <i class="bi bi-chevron-left fs-4"></i>
                        </a>
                    </div>

                    <!-- Title (Center) -->
                    <div class="col-12 text-center">
                        <h1 class="mb-0 fw-bold">Daftar Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                    </div>
                </div>
            </div>

            <!-- Search Bar (Center) -->
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('shops.list') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-start" name="search" placeholder="Cari toko atau produk..." value="{{ request('search') }}">
                                <button class="btn btn-dark rounded-end" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Store Cards - Row 1 -->
            <div class="row g-4 mb-4">
                <!-- Store Card 1 -->
                @forelse($shops as $shop)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="store-card">
                            <div class="card-img-container">
                                @if ($shop->featured_image)
                                    <img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}"
                                        class="card-img">
                                @else
                                    <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $shop->name }}"
                                        class="card-img">
                                @endif
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">{{ $shop->name }}</h5>
                                <p class="card-address">{{ $shop->address }}</p>
                                <a href="{{ route('shops.detail', $shop->id) }}" class="btn-detail">Detail Toko</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada toko yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $shops->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        /* Background color */
        body {
            background-color: #e8f5e9;
        }

        /* Store Card Styling */
        .store-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .store-card:hover .card-img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.25rem;
        }

        .card-title {
            font-weight: 600;
            color: #2e7d32;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .card-address {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .btn-detail {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #e8f5e9;
            color: #2e7d32;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-detail:hover {
            background-color: #c8e6c9;
        }

        /* Pagination Styling */
        .pagination {
            margin-top: 2rem;
        }

        .pagination .page-link {
            color: #2e7d32;
            border-color: #ddd;
            background-color: #fff;
        }

        .pagination .page-item.active .page-link {
            background-color: #555;
            border-color: #555;
            color: white;
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #e8f5e9;
        }

        /* Search Bar Styling */
        .input-group .form-control {
            border-right: none;
        }

        .input-group .btn {
            border-left: none;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .card-img-container {
                height: 160px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>

@endsection
