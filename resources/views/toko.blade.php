@extends('layouts.index')

@section('title', 'Toko - Oleh Oleh')

@section('content')
    <div class="container py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 mx-auto text-center">
                    <h1 class="judul fw-bold">Peta Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                    <p class="text-muted">dimana aja sih oleh-oleh makanan ringan khas Banyumas? berikut pilihannya</p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <div class="map-container shadow-sm rounded">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Toko Populer Section -->
        <div class="container py-4">
            <h2 class="subjudul fw-semibold mb-4">Rekomendasi Toko Oleh-Oleh</h2>
            <div class="row g-4">
                @forelse($popularShops as $shop)
                    <!-- Toko Card -->
                    <div class="col-md-3 col-sm-6">
                        @include('partials.store-card', ['shop' => $shop])
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada toko populer yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('shops.list') }}"
                        class="btn btn-outline-success rounded-pill px-4 py-2 d-inline-flex align-items-center justify-content-center">
                        <span class="me-2">Semua Toko Oleh-oleh</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map centered on Banyumas
            var map = L.map('map').setView([-7.4312, 109.2350], 11);
            var userMarker = null;

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Add markers for each shop from database
            @foreach ($shops as $shop)
                L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}])
                    .bindPopup(`
                        <div class="popup-content" style="max-width: 220px;">
                            <div class="mb-2 text-center">
                                <img 
                                    src="{{ $shop->featured_image ? asset('storage/' . $shop->featured_image) : asset('images/default-shop.jpg') }}" 
                                    alt="{{ $shop->name }}" 
                                    style="width: 100%; height: 120px; object-fit: cover; border-radius: 6px;"
                                >
                            </div>
                            <h6 class="text-primary fw-bold mb-1">{{ $shop->name }}</h6>
                            <p class="text-muted mb-1" style="font-size: 0.85rem;"><strong>Alamat:</strong> {{ $shop->address }}</p>
                            <div class="d-grid gap-1 mt-2">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('shops.detail', ['shop' => $shop]) }}">
                                    Detail Toko
                                </a>
                                <a class="btn btn-sm btn-light text-primary" target="_blank" href="https://www.google.com/maps?q={{ $shop->latitude }},{{ $shop->longitude }}">
                                    Lihat di Google Maps
                                </a>
                            </div>
                        </div>
                    `).addTo(map);
            @endforeach


            // Ambil lokasi pengguna secara langsung
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    // Tambahkan marker lokasi pengguna ke peta
                    const userIcon = L.divIcon({
                        className: 'user-location-marker',
                        html: '<div class="pulse"></div>',
                        iconSize: [20, 20]
                    });

                    const userMarker = L.marker([lat, lng], {
                            icon: userIcon
                        }).addTo(map)
                        .bindPopup('Lokasi Anda')
                        .openPopup();

                    // Pusatkan peta ke lokasi pengguna
                    map.setView([lat, lng], 13);
                }, function(error) {
                    console.warn('Gagal mendapatkan lokasi:', error);
                    // Tidak ada alert agar pengalaman pengguna tetap smooth
                });
            }

            // Make map responsive
            window.addEventListener('resize', function() {
                map.invalidateSize();
            });

            // Event listener untuk tombol refresh lokasi
            document.getElementById('refresh-location')?.addEventListener('click', function() {
                getUserLocation();
            });
        });
    </script>

    <style>
        .map-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 0.375rem;
        }

        #map {
            width: 100%;
            height: 70vh;
        }

        /* Styling for popup content */
        .leaflet-popup-content {
            max-width: 300px;
        }

        .leaflet-popup-content img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .leaflet-popup-content h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .leaflet-popup-content h5 {
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .leaflet-popup-content h6 {
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }

        .leaflet-popup-content .view-link {
            margin-top: 0.75rem;
            font-size: 0.8rem;
        }

        @media (max-width: 768px) {
            #map {
                height: 50vh;
            }
        }

        /* Card Styling */
        .store-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
            position: relative;
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

        /* Distance Badge */
        .distance-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        /* Pagination Styling */
        .pagination {
            margin-top: 2rem;
        }

        .pagination .page-link {
            color: #2e7d32;
            border-color: #ddd;
        }

        .pagination .page-item.active .page-link {
            background-color: #2e7d32;
            border-color: #2e7d32;
            color: white;
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #e8f5e9;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .store-card {
                margin-bottom: 1.5rem;
            }

            .card-img-container {
                height: 160px;
            }
        }

        .user-location-marker .pulse {
            width: 20px;
            height: 20px;
            background: rgba(0, 123, 255, 0.5);
            border-radius: 50%;
            position: relative;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.2;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.7;
            }
        }
    </style>
@endsection
