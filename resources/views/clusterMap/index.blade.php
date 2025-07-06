@extends('layouts.index')

@section('title', 'Peta Clustering Harga Produk')

@section('content')
    <section class="map-section py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold mb-3 judul">Peta Clustering Harga Produk</h2>
                    <p class="text-muted">Visualisasi toko berdasarkan kelompok harga produk yang dominan</p>
                    <a href="{{ route('products.cluster') }}" class="btn btn-outline-success mt-2">
                        <i class="bi bi-box-seam me-1"></i> Lihat Daftar Produk
                    </a>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h5 class="fw-bold">Keterangan Cluster:</h5>
                                <div class="d-flex flex-wrap gap-2 mt-2">
                                    @foreach ($clusterMetadata as $index => $metadata)
                                        <div class="cluster-legend cluster-header-{{ $index }}">
                                            {{ $metadata['name'] }}
                                            <span class="small">({{ $metadata['description'] }})</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="position-relative border rounded shadow-sm">
                        <div id="map" style="width: 100%; height: 70vh;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        /* Styling untuk legend cluster */
        .cluster-legend {
            padding: 6px 12px;
            border-radius: 20px;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }

        /* Warna untuk setiap cluster */
        .cluster-header-0 {
            background: #28a745;
            /* Hijau - Ekonomis */
        }

        .cluster-header-1 {
            background: #ffc107;
            /* Kuning - Menengah */
            color: #212529 !important;
            /* Teks gelap untuk latar belakang terang */
        }

        .cluster-header-2 {
            background: #fd7e14;
            /* Oranye - Tinggi */
        }

        .cluster-header-3 {
            background: #dc3545;
            /* Merah */
        }

        .cluster-header-4 {
            background: #6f42c1;
            /* Ungu */
        }

        .cluster-header-default {
            background: #6c757d;
            /* Abu-abu - Default */
        }

        /* Tambahkan CSS untuk cluster lain jika diperlukan */
        @foreach ($clusterMetadata as $index => $metadata)
            .cluster-header-{{ $index }} {
                background: {{ $index == 0 ? '#28a745' : ($index == 1 ? '#ffc107' : ($index == 2 ? '#fd7e14' : '#6c757d')) }};
                {{ $index == 1 ? 'color: #212529 !important;' : '' }}
            }
        @endforeach

        /* Styling untuk marker lokasi pengguna */
        .user-location-marker .pulse {
            width: 20px;
            height: 20px;
            background-color: #2196F3;
            border-radius: 50%;
            position: relative;
        }

        .user-location-marker .pulse:after {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(33, 150, 243, 0.3);
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.5);
                opacity: 1;
            }

            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        /* Pastikan map memiliki tinggi yang cukup */
        #map {
            width: 100%;
            height: 70vh;
            z-index: 1;
            /* Pastikan z-index lebih rendah dari navbar */
        }

        /* Styling untuk popup Leaflet */
        .leaflet-popup-content-wrapper {
            border-radius: 8px;
        }

        .leaflet-popup-content {
            margin: 12px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, checking for map element');

            // Pastikan elemen map ada sebelum menginisialisasi Leaflet
            const mapElement = document.getElementById('map');
            if (!mapElement) {
                console.error('Elemen map tidak ditemukan');
                return;
            }

            console.log('Map element found, initializing Leaflet');

            // Initialize map centered on Banyumas
            var map = L.map('map').setView([-7.4312, 109.2350], 11);
            var userMarker = null;

            // Log untuk debugging
            console.log('Map initialized');

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Definisikan warna untuk setiap cluster
            const clusterColors = {
                0: '#28a745', // Hijau - Ekonomis
                1: '#ffc107', // Kuning - Menengah
                2: '#fd7e14', // Oranye - Tinggi
                'default': '#6c757d' // Abu-abu - Default
            };

            // Tambahkan warna untuk cluster lain dari metadata jika ada
            @foreach ($clusterMetadata as $index => $metadata)
                clusterColors['{{ $index }}'] = clusterColors['{{ $index }}'] ||
                    ({{ $index }} == 0 ? '#28a745' :
                        {{ $index }} == 1 ? '#ffc107' :
                        {{ $index }} == 2 ? '#fd7e14' : '#6c757d');
            @endforeach

            // Log untuk debugging
            console.log('Cluster metadata:', @json($clusterMetadata));
            console.log('Cluster colors:', clusterColors);

            // Fungsi untuk membuat ikon marker berdasarkan warna
            function createClusterIcon(clusterIndex) {
                // Dapatkan warna untuk cluster ini
                const color = clusterColors[clusterIndex] || clusterColors['default'];

                // Tentukan nama warna untuk URL marker
                let iconColor;
                switch (color) {
                    case '#28a745':
                        iconColor = 'green';
                        break;
                    case '#ffc107':
                        iconColor = 'gold';
                        break;
                    case '#fd7e14':
                        iconColor = 'orange';
                        break;
                    default:
                        iconColor = 'grey';
                }

                console.log('Creating icon for cluster:', clusterIndex, 'with color:', color, 'mapped to:',
                    iconColor);

                return L.icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-' +
                        iconColor + '.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });
            }

            // Buat ikon untuk setiap cluster
            const clusterIcons = {};

            // Buat ikon untuk cluster default
            clusterIcons['default'] = createClusterIcon('default');

            // Buat ikon untuk semua cluster dari metadata
            @foreach ($clusterMetadata as $index => $metadata)
                clusterIcons['{{ $index }}'] = createClusterIcon('{{ $index }}');
            @endforeach

            console.log('Created cluster icons:', Object.keys(clusterIcons));

            // Add markers for each shop from database with cluster information
            @foreach ($shopsWithCluster as $shop)
                @if ($shop->latitude && $shop->longitude)
                    (function() {
                        // Tentukan cluster key dengan pengecekan yang lebih aman
                        @php
                            $clusterKey = isset($shop->dominant_cluster) && $shop->dominant_cluster !== null ? $shop->dominant_cluster : 'default';
                        @endphp

                        console.log(
                            'Adding marker for shop: {{ $shop->name }}, cluster: {{ $clusterKey }}');

                        // Pastikan icon ada untuk cluster key ini
                        const iconKey = '{{ $clusterKey }}';
                        const icon = clusterIcons[iconKey] || clusterIcons['default'];

                        // Log untuk debugging
                        console.log('Shop: {{ $shop->name }}', 'Using icon for cluster:', iconKey,
                            'Cluster Name: {{ $shop->cluster_name }}');

                        // Buat popup content dengan template string
                        const popupContent = `
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
                            <p class="mb-1">
                                <span class="cluster-legend cluster-header-{{ $clusterKey }}" style="font-size: 0.75rem; padding: 2px 8px;">
                                    {{ $shop->cluster_name }}
                                </span>
                            </p>
                                <div class="d-grid gap-1 mt-2">
                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('shops.detail', ['shop' => $shop]) }}">
                                        Detail Toko
                                    </a>
                                    <a class="btn btn-sm btn-light text-primary" target="_blank" href="https://www.google.com/maps?q={{ $shop->latitude }},{{ $shop->longitude }}">
                                        Lihat di Google Maps
                                    </a>
                                </div>
                            </div>
                        `;

                        // Buat marker dan tambahkan ke peta
                        L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}], {
                                icon: icon
                            })
                            .bindPopup(popupContent)
                            .addTo(map);
                    })();
                @endif
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
        });
    </script>

@endsection
