@extends('layouts.index')

@section('title', $shop->name)

@section('content')
    <div class="container py-4">
        <div class="container mb-4">
            <div class="row position-relative align-items-center">
                <!-- Back Button -->
                <div class="col-auto position-absolute start-0 d-flex align-items-center" style="z-index: 10;">
                    <a href="{{ route('shops.index') }}" class="text-dark">
                        <i class="bi bi-chevron-left fs-4"></i>
                    </a>
                </div>

                <div class="col-12 text-center">
                    <h1 class="mb-0 fw-bold">Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.index') }}" class="text-decoration-none">Toko</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $shop->name }}</li>
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
                <h2 class="fw-semibold">{{ $shop->name }}</h2>
                <p class="text-secondary">Alamat: {{ $shop->address }}</p>
                @if ($shop->phone)
                    <p class="text-secondary">Telepon: {{ $shop->phone }}</p>
                @endif
                @if ($shop->operating_hours)
                    <p class="text-secondary">Jam Operasional: {{ $shop->operating_hours }}</p>
                @endif
                <p class="text-secondary">Deskripsi: {{ $shop->description ?? 'Belum ada deskripsi untuk toko ini.' }}</p>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="fw-semibold mb-4 text-center">Foto Toko</h2>
                <div id="storeCarousel" class="carousel slide shadow rounded" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @if ($shop->featured_image)
                            <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="0"
                                class="active"></button>
                        @endif

                        @foreach ($shop->images as $index => $image)
                            <button type="button" data-bs-target="#storeCarousel"
                                data-bs-slide-to="{{ $shop->featured_image ? $index + 1 : $index }}"
                                class="{{ !$shop->featured_image && $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>

                    <!-- Foto Toko -->
                    <div class="carousel-inner">
                        @if ($shop->featured_image)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $shop->featured_image) }}"
                                    alt="Tampak depan {{ $shop->name }}" class="d-block w-100 carousel-img">
                            </div>
                        @endif

                        @foreach ($shop->images as $index => $image)
                            <div class="carousel-item {{ !$shop->featured_image && $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    alt="{{ $image->caption ?? $shop->name }}" class="d-block w-100 carousel-img">
                            </div>
                        @endforeach

                        @if (!$shop->featured_image && count($shop->images) == 0)
                            <div class="carousel-item active">
                                <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $shop->name }}"
                                    class="d-block w-100 carousel-img">
                            </div>
                        @endif
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
            @forelse($shop->products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="product-card shadow rounded">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="card-img">
                        @else
                            <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}"
                                class="card-img">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="#" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada produk yang tersedia di toko ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Reviews Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="fw-semibold mb-4">Ulasan Pelanggan</h2>

                @if (count($reviews) > 0)
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-3">
                                <span
                                    class="badge bg-success rounded-pill fs-5">{{ number_format($shop->average_rating, 1) }}</span>
                            </div>
                            <div class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= round($shop->average_rating))
                                        <i class="bi bi-star-fill text-warning fs-4"></i>
                                    @else
                                        <i class="bi bi-star text-warning fs-4"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="ms-3">
                                <span class="text-muted">({{ count($reviews) }} ulasan)</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="fw-bold mb-0">{{ $review->name }}</h5>
                                            <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                                        </div>
                                        <div class="mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                @else
                                                    <i class="bi bi-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <p class="mb-0">{{ $review->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        Belum ada ulasan untuk toko ini.
                    </div>
                @endif

                <!-- Add Review Form -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Tambahkan Ulasan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('shops.reviews.store', $shop->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <div class="rating-input">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating1"
                                            value="1" required>
                                        <label class="form-check-label" for="rating1">1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating2"
                                            value="2">
                                        <label class="form-check-label" for="rating2">2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating3"
                                            value="3">
                                        <label class="form-check-label" for="rating3">3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating4"
                                            value="4">
                                        <label class="form-check-label" for="rating4">4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating5"
                                            value="5">
                                        <label class="form-check-label" for="rating5">5</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Komentar</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Kirim Ulasan</button>
                        </form>
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

        /* Map container */
        .map-container {
            overflow: hidden;
            border-radius: 8px;
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

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map centered on shop location
            var map = L.map('map').setView([{{ $shop->latitude }}, {{ $shop->longitude }}], 15);

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Add marker for the shop
            L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}])
                .addTo(map)
                .bindPopup('<strong>{{ $shop->name }}</strong><br>{{ $shop->address }}');

            // Make map responsive
            window.addEventListener('resize', function() {
                map.invalidateSize();
            });
        });
    </script>

@endsection
