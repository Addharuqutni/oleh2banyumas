@extends('layouts.index')

@section('title', $shop->name)

@section('content')
    <div class="container py-5">
        <!-- Back Button and Header -->
        <div class="mb-5 position-relative">
            <a href="{{ url()->previous() }}" class="btn btn-link position-absolute start-0 text-success"
                style="transition: transform 0.3s ease;">
                <i class="bi bi-chevron-left fs-4 me-1"></i>
            </a>
            <div class="text-center">
                <h2 class="judul fw-bold mb-1">Toko Oleh Oleh Makanan Ringan Banyumas</h2>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-1 mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.index') }}" class="text-decoration-none"></i>Toko</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $shop->name }}</li>
            </ol>
        </nav>

        <!-- Store Details Card -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="store-detail-card">
                    <div class="store-header">
                        <h1 class="store-name">{{ $shop->name }}</h1>
                        <div class="store-rating">
                            <span class="rating-badge">{{ number_format($shop->average_rating ?? 0, 1) }}</span>
                            <div class="star-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= round($shop->average_rating ?? 0))
                                        <i class="bi bi-star-fill"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="review-count">({{ count($reviews ?? []) }} ulasan)</span>
                        </div>
                    </div>

                    <div class="store-content">
                        <div class="row">
                            <!-- Store Images Carousel -->
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div id="storeCarousel" class="carousel slide store-carousel" data-bs-ride="carousel">
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

                                    <!-- Carousel Items -->
                                    <div class="carousel-inner">
                                        @if ($shop->featured_image)
                                            <div class="carousel-item active">
                                                <img src="{{ Storage::url($shop->featured_image) }}"
                                                    alt="Tampak depan {{ $shop->name }}"
                                                    class="d-block w-100 carousel-img">
                                            </div>
                                        @endif

                                        @foreach ($shop->images as $index => $image)
                                            <div
                                                class="carousel-item {{ !$shop->featured_image && $index == 0 ? 'active' : '' }}">
                                                <img src="{{ Storage::url($image->image_path) }}"
                                                    alt="{{ $image->caption ?? $shop->name }}"
                                                    class="d-block w-100 carousel-img">
                                                @if ($image->caption)
                                                    <div class="carousel-caption">
                                                        <span class="caption-tag">{{ $image->caption }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach

                                        @if (!$shop->featured_image && count($shop->images) == 0)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('images/default-shop.jpg') }}"
                                                    alt="{{ $shop->name }}" class="d-block w-100 carousel-img">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Controls -->
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

                            <!-- Store Information -->
                            <div class="col-lg-6">
                                <div class="store-info">
                                    <!-- Address -->
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6 class="info-title">Alamat</h6>
                                            <p class="info-text">{{ $shop->address }}</p>
                                            <a href="https://www.google.com/maps/dir/?api=1&destination={{ $shop->latitude }},{{ $shop->longitude }}"
                                                target="_blank" class="direction-btn">
                                                <i class="bi bi-signpost-split"></i>
                                                <span>Petunjuk Arah</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    @if ($shop->phone)
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <i class="bi bi-telephone-fill"></i>
                                            </div>
                                            <div class="info-content">
                                                <h6 class="info-title">Telepon</h6>
                                                <p class="info-text">{{ $shop->phone }}</p>
                                                <a href="tel:{{ $shop->phone }}" class="call-btn">
                                                    <i class="bi bi-telephone"></i>
                                                    <span>Hubungi</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Operating Hours -->
                                    @if ($shop->operating_hours)
                                        <div class="info-item">
                                            <div class="info-icon">
                                                <i class="bi bi-clock-fill"></i>
                                            </div>
                                            <div class="info-content">
                                                <h6 class="info-title">Jam Operasional</h6>
                                                <p class="info-text">{{ $shop->operating_hours }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Description -->
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6 class="info-title">Deskripsi</h6>
                                            <p class="info-text">
                                                {{ $shop->description ?? 'Belum ada deskripsi untuk toko ini.' }}</p>
                                        </div>
                                    </div>

                                    <!-- Delivery Service -->
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-truck"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6 class="info-title">Layanan Antar Jemput</h6>
                                            <p class="info-text">
                                                @if($shop->has_delivery)
                                                    <span class="badge bg-success">Tersedia</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak Tersedia</span>
                                                @endif
                                            </p>
                                            @if($shop->has_delivery)
                                                <div class="delivery-links mt-2">
                                                    @if($shop->grab_link)
                                                        <a href="{{ $shop->grab_link }}" target="_blank" class="btn btn-sm delivery-btn grab-btn me-2">
                                                            <i class="bi bi-car-front-fill"></i>
                                                            <span>Pesan via Grab</span>
                                                        </a>
                                                    @endif
                                                    @if($shop->gojek_link)
                                                        <a href="{{ $shop->gojek_link }}" target="_blank" class="btn btn-sm delivery-btn gojek-btn">
                                                            <i class="bi bi-car-front-fill"></i>
                                                            <span>Pesan via Gojek</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="section-container mb-5">
            <h2 class="section-title">Lokasi Toko</h2>
            <div class="map-container">
                <div id="map">
                    <div class="map-loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p>Memuat peta...</p>
                    </div>
                </div>
                <div class="navigation-btn-container">
                    <a href="https://www.google.com/maps/dir/?api=1&destination={{ $shop->latitude }},{{ $shop->longitude }}"
                        target="_blank" class="navigation-btn">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Navigasi ke Lokasi</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="section-container mb-5">
            <h2 class="section-title">Daftar Produk Toko</h2>
            <div class="row g-4">
                @forelse($shop->products as $product)
                    <div class="col-md-3 col-sm-6">
                        <a href="{{ route('shops.products.show', ['shop' => $shop->slug, 'product' => $product->slug]) }}" 
                           class="product-card-link">
                            @include('partials.product-card', ['product' => $product])
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-bag-x"></i>
                            <p>Produk belum terdaftar pada sistem.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="section-container mb-5">
            <h2 class="section-title">Ulasan Pelanggan</h2>

            @if (count($reviews) > 0)
                <div class="review-summary mb-4">
                    <div class="rating-badge-large">{{ number_format($shop->average_rating, 1) }}</div>
                    <div class="rating-details">
                        <div class="star-rating-large">
                            @include('partials.star-rating', [
                                'rating' => $shop->average_rating,
                                'size' => 'fs-4',
                            ])
                        </div>
                        <span class="review-count-large">{{ count($reviews) }} ulasan</span>
                    </div>
                </div>

                <div class="reviews-container">
                    <div class="row g-2">
                        @foreach ($reviews as $review)
                            <div class="col-md-6">
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="reviewer-info">
                                            <div class="reviewer-avatar">
                                                {{ substr($review->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <h5 class="reviewer-name">{{ $review->name }}</h5>
                                                <div class="review-date">
                                                    <i class="bi bi-calendar3"></i>
                                                    <span>{{ $review->created_at->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-rating">
                                            @include('partials.star-rating', ['rating' => $review->rating])
                                        </div>
                                    </div>
                                    <div class="review-body">
                                        <p class="review-text">{{ $review->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-chat-left-text"></i>
                    <p>Belum ada ulasan untuk toko ini.</p>
                </div>
            @endif

            <!-- Add Review Form -->
            <div class="add-review-container mt-5">
                <h3 class="form-title">Tambahkan Ulasan</h3>
                <form action="{{ route('shops.reviews.store', $shop) }}" method="POST" class="review-form">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama</label>
                                <div class="input-with-icon">
                                    <i class="bi bi-person"></i>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        placeholder="Masukkan nama Anda">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-with-icon">
                                    <i class="bi bi-envelope"></i>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Masukkan email Anda">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label class="form-label">Rating</label>
                        <div class="rating-input">
                            <div class="stars-container">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating" id="rating{{ $i }}"
                                        value="{{ $i }}" {{ $i === 5 ? 'checked' : '' }}>
                                    <label for="rating{{ $i }}"><i class="bi bi-star-fill"></i></label>
                                @endfor
                            </div>
                            <span class="rating-text">Pilih rating (1-5)</span>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <div class="input-with-icon textarea">
                            <i class="bi bi-chat-text"></i>
                            <textarea class="form-control" id="comment" name="comment" rows="4" required
                                placeholder="Bagikan pengalaman Anda di toko ini"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="submit-review-btn mt-4">
                        <i class="bi bi-send"></i> Kirim Ulasan
                    </button>
                </form>
            </div>
        </div>

    </div>




    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loading overlay when map is loaded
            const mapLoading = document.querySelector('.map-loading');

            // Initialize map centered on shop location
            var map = L.map('map', {
                zoomControl: false // We'll add zoom control manually
            }).setView([{{ $shop->latitude }}, {{ $shop->longitude }}], 15);

            // Add custom zoom control to top-right
            L.control.zoom({
                position: 'topright'
            }).addTo(map);

            // Add OpenStreetMap tile layer with custom styling
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 15
            }).addTo(map);

            // Add marker for the shop
            var marker = L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}])
                .addTo(map)
                .bindPopup(
                    '<div class="map-popup">' +
                    '<h3>{{ $shop->name }}</h3>' +
                    '<p>{{ $shop->address }}</p>' +
                    '<a href="https://www.google.com/maps/dir/?api=1&destination={{ $shop->latitude }},{{ $shop->longitude }}" target="_blank" class="popup-nav-btn">' +
                    '<i class="bi bi-signpost-split"></i> Navigasi</a>' +
                    '</div>', {
                        maxWidth: 200,
                        className: 'custom-popup'
                    }
                );

            // Open popup by default
            marker.openPopup();

            // Try to get user's location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;

                    // Add marker for user's location
                    var userIcon = L.icon({
                        iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                        iconSize: [24, 24],
                        iconAnchor: [12, 12],
                        popupAnchor: [0, -12]
                    });

                    L.marker([userLat, userLng], {
                            icon: userIcon
                        })
                        .addTo(map)
                        .bindPopup('<strong>Lokasi Anda</strong>');

                    // Add a line between user location and shop
                    var routeLine = L.polyline([
                        [userLat, userLng],
                        [{{ $shop->latitude }}, {{ $shop->longitude }}]
                    ], {
                        color: '#2e7d32',
                        weight: 3,
                        opacity: 0.7,
                        dashArray: '10, 10',
                        lineJoin: 'round'
                    }).addTo(map);

                    // Fit bounds to show both markers
                    map.fitBounds([
                        [userLat, userLng],
                        [{{ $shop->latitude }}, {{ $shop->longitude }}]
                    ], {
                        padding: [50, 50]
                    });
                });
            }

            // Hide loading overlay after map is loaded
            map.on('load', function() {
                if (mapLoading) {
                    mapLoading.style.display = 'none';
                }
            });

            // Fallback if load event doesn't fire
            setTimeout(function() {
                if (mapLoading) {
                    mapLoading.style.display = 'none';
                }
            }, 2000);

            // Make map responsive
            window.addEventListener('resize', function() {
                map.invalidateSize();
            });

            // Initialize carousel
            var carousel = document.querySelector('#storeCarousel');
            if (carousel) {
                var carouselInstance = new bootstrap.Carousel(carousel, {
                    interval: 5000,
                    wrap: true
                });
            }

            // Star rating hover effect for review form
            const stars = document.querySelectorAll('.stars-container label');
            const ratingText = document.querySelector('.rating-text');
            const ratingTexts = [
                'Sangat Buruk',
                'Buruk',
                'Biasa',
                'Baik',
                'Sangat Baik'
            ];

            stars.forEach((star, index) => {
                star.addEventListener('mouseover', () => {
                    if (ratingText) {
                        ratingText.textContent = ratingTexts[4 - index];
                    }
                });
            });

            const starsContainer = document.querySelector('.stars-container');
            if (starsContainer) {
                starsContainer.addEventListener('mouseout', () => {
                    const checkedInput = document.querySelector('.stars-container input:checked');
                    if (checkedInput && ratingText) {
                        const checkedIndex = parseInt(checkedInput.value) - 1;
                        ratingText.textContent = ratingTexts[checkedIndex];
                    } else if (ratingText) {
                        ratingText.textContent = 'Pilih rating (1-5)';
                    }
                });
            }
        });
    </script>

@endsection
