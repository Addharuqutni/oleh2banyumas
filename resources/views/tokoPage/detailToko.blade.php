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
                                                @if ($shop->has_delivery)
                                                    <span class="badge bg-success">Tersedia</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak Tersedia</span>
                                                @endif
                                            </p>
                                            @if ($shop->has_delivery)
                                                <div class="delivery-links mt-2">
                                                    @if ($shop->grab_link)
                                                        <a href="{{ $shop->grab_link }}" target="_blank"
                                                            class="btn btn-sm delivery-btn grab-btn me-2">
                                                            <i class="bi bi-car-front-fill"></i>
                                                            <span>Pesan via Grab</span>
                                                        </a>
                                                    @endif
                                                    @if ($shop->gojek_link)
                                                        <a href="{{ $shop->gojek_link }}" target="_blank"
                                                            class="btn btn-sm delivery-btn gojek-btn">
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

    <style>
        Add commentMore actions .delivery-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border-radius: 4px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .delivery-btn i {
            margin-right: 0.5rem;
        }

        .grab-btn {
            background-color: #00b14f;
            color: white;
            border: none;
        }

        .grab-btn:hover {
            background-color: #009a43;
            color: white;
        }

        .gojek-btn {
            background-color: #00aa13;
            color: white;
            border: none;
        }

        .gojek-btn:hover {
            background-color: #009510;
            color: white;
        }

        .store-distance {
            color: #2e7d32;
            font-weight: 500;
            font-size: 0.9rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .store-distance i {
            font-size: 1rem;
        }

        /* Store Detail Card */
        .store-detail-card {
            background-color: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .store-header {
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .store-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .store-rating {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .rating-badge {
            background-color: white;
            color: #1b5e20;
            font-weight: 700;
            font-size: 1.25rem;
            padding: 0.3rem 0.8rem;
            border-radius: 0.5rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .star-rating {
            display: flex;
            gap: 0.2rem;
        }

        .star-rating i {
            color: #ffc107;
            font-size: 1.2rem;
        }

        .review-count {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .store-content {
            padding: 1.5rem;
        }

        /* Store Carousel */
        .store-carousel {
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 1rem;
        }

        .carousel-img {
            height: 300px;
            object-fit: cover;
        }

        .caption-tag {
            background-color: rgba(255, 255, 255, 0.9);
            color: #1b5e20;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.3rem 0.7rem;
            border-radius: 50px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 10%;
            opacity: 0.7;
        }

        .carousel-indicators {
            margin-bottom: 0.5rem;
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: white;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            background-color: white;
            opacity: 1;
            transform: scale(1.2);
        }

        /* Store Info */
        .store-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            gap: 1rem;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background-color: #81c784;
            /* var(--primary-light) */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .info-icon i {
            font-size: 1.2rem;
        }

        .info-content {
            flex: 1;
        }

        .info-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2e7d32;
            margin-bottom: 0.5rem;
        }

        .info-text {
            color: #00000;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }

        .direction-btn,
        .call-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #2e7d32;
            color: #ffffff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Map Section */
        .map-container {
            height: 400px;
            border-radius: 0.5rem;
            overflow: hidden;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        #map {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .map-loading {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 100;
        }

        .navigation-btn-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .navigation-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #2e7d32;
            color: white;
            padding: 0.8rem 1.2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Product Cards */
        .product-card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .product-card {
            background-color: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-img-container {
            position: relative;
            padding-top: 75%;
            overflow: hidden;
        }

        .product-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
        }

        .product-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #000000;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .product-price {
            color: #2e7d32;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .product-action {
            margin-top: auto;
        }

        .product-detail-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #81c784;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover .product-detail-btn {
            background-color: #2e7d32;
        }

        /* Empty State */
        .empty-state {
            background-color: white;
            border-radius: 0.5rem;
            padding: 3rem 1.5rem;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .empty-state i {
            font-size: 3rem;
            color: #888888;
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state p {
            color: #888888;
            font-size: 1.1rem;
            margin: 0;
        }

        /* Reviews Section */
        .review-summary {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .rating-badge-large {
            background: #2e7d32;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
        }

        .rating-details {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .star-rating-large {
            display: flex;
            gap: 0.3rem;
        }

        .star-rating-large i {
            font-size: 1.5rem;
            color: #ffc107;
        }

        .review-count-large {
            color: #888888;
            font-size: 1rem;
        }

        .reviews-container {
            margin-bottom: 3rem;
        }

        .review-card {
            background-color: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .review-header {
            padding: 1.25rem;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            background: #2e7d32;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .reviewer-name {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #000000;
        }

        .review-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #888888;
            font-size: 0.85rem;
        }

        .review-rating {
            display: flex;
            gap: 0.2rem;
        }

        .review-rating i {
            color: #ffc107;
            font-size: 1rem;
        }

        .review-body {
            padding: 1rem;
        }

        .review-text {
            color: #888888;
            margin: 0;
            line-height: 1.6;
        }

        /* Add Review Form */
        .add-review-container {
            background-color: white;
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            color: #2e7d32;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #2e7d32;
            border-radius: 3px;
        }

        .review-form {
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #000000;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #888888;
        }

        .input-with-icon.textarea i {
            top: 0.5rem;
            transform: none;
        }

        .input-with-icon input,
        .input-with-icon textarea {
            padding-left: 2.5rem;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .input-with-icon input:focus,
        .input-with-icon textarea:focus {
            border-color: #2e7d32;
            box-shadow: #2e7d32;
        }

        /* Star Rating Input */
        .rating-input {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stars-container {
            display: flex;
            flex-direction: row-reverse;
            gap: 0.3rem;
        }

        .stars-container input {
            display: none;
        }

        .stars-container label {
            cursor: pointer;
            font-size: 1.5rem;
            color: #ddd;
            transition: color 0.3s ease;
        }

        .stars-container label:hover,
        .stars-container label:hover~label,
        .stars-container input:checked~label {
            color: #ffc107;
        }

        .rating-text {
            color: #888888;
            font-size: 0.9rem;
        }

        .submit-review-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #2e7d32;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }


        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .page-title {
                font-size: 1.8rem;
                text-align: center;
                margin-top: 2rem;
            }

            .btn-back {
                top: 0;
                left: 0;
                transform: none;
            }

            .store-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .store-rating {
                align-self: flex-start;
            }

            .carousel-img {
                height: 250px;
            }

            .map-container {
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .carousel-img {
                height: 200px;
            }

            .rating-badge-large {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .star-rating-large i {
                font-size: 1rem;
            }

            .review-summary {
                padding: 1rem;
            }

            .navigation-btn {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .navigation-btn-container {
                bottom: 15px;
                right: 15px;
            }

            .form-title {
                font-size: 1.3rem;
            }

            .stars-container label {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }

            .btn-back span {
                display: none;
            }

            .btn-back {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0;
            }

            .btn-back i {
                margin-right: 0;
            }

            .store-name {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .carousel-img {
                height: 180px;
            }

            .map-container {
                height: 250px;
            }

            .info-icon {
                width: 35px;
                height: 35px;
            }

            .info-title {
                font-size: 0.95rem;
            }

            .info-text {
                font-size: 0.9rem;
            }

            .direction-btn,
            .call-btn {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }

            .review-card {
                margin-bottom: 1rem;
            }

            .review-header {
                flex-direction: column;
                gap: 0.5rem;
            }

            .review-rating {
                align-self: flex-start;
            }

            .add-review-container {
                padding: 1rem;
            }

            .rating-input {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.1rem;
            }

            .submit-review-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection
