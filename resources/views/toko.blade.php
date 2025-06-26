@extends('layouts.index')

@section('title', 'Toko - Oleh Oleh')
@section('description', 'Website Oleh Oleh Banyumas menyediakan daftar toko oleh-oleh makanan khas Banyumas, langsung dari pengrajin asli. Temukan camilan favorit Anda di sini!')

@section('content')
    <div class="container py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 mx-auto text-center">
                    <h1 class="judul fw-bold">Peta Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                    <p class="text-muted">dimana aja sih oleh-oleh makanan ringan khas Banyumas? berikut pilihannya</p>
                </div>
            </div>

            <!-- Filter Kategori -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="filter-container bg-white p-3 rounded shadow-sm">
                        <h5 class="mb-3">Filter Berdasarkan Kategori Produk</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary btn-sm category-filter active" data-category="all">
                                <i class="bi bi-grid-3x3-gap"></i> Semua Kategori
                            </button>
                            @foreach($categories as $category)
                                <button class="btn btn-outline-primary btn-sm category-filter" data-category="{{ $category->id }}">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
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
            var shopMarkers = []; // Array untuk menyimpan semua marker toko

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Data toko dengan kategori produk
            var shopsData = [
                @foreach ($shops as $shop)
                {
                    id: {{ $shop->id }},
                    name: '{{ addslashes($shop->name) }}',
                    address: '{{ addslashes($shop->address) }}',
                    latitude: {{ $shop->latitude }},
                    longitude: {{ $shop->longitude }},
                    slug: '{{ $shop->slug }}',
                    featured_image: '{{ $shop->featured_image ? asset('storage/' . $shop->featured_image) : asset('images/default-shop.jpg') }}',
                    detail_url: '{{ route('shops.detail', ['shop' => $shop]) }}',
                    has_delivery: {{ $shop->has_delivery ? 'true' : 'false' }},
                    categories: [
                        @php
                            $categoryIds = [];
                            foreach($shop->products as $product) {
                                foreach($product->categories as $category) {
                                    if (!in_array($category->id, $categoryIds)) {
                                        $categoryIds[] = $category->id;
                                    }
                                }
                            }
                        @endphp
                        @foreach($categoryIds as $categoryId)
                            {{ $categoryId }},
                        @endforeach
                    ]
                },
                @endforeach
            ];

            // Fungsi untuk membuat marker toko
            function createShopMarker(shop) {
                var marker = L.marker([shop.latitude, shop.longitude])
                    .bindPopup(`
                        <div class="popup-content" style="max-width: 220px;">
                            <div class="mb-2 text-center">
                                <img 
                                    src="${shop.featured_image}" 
                                    alt="${shop.name}" 
                                    style="width: 100%; height: 120px; object-fit: cover; border-radius: 6px;"
                                >
                            </div>
                            <h6 class="text-primary fw-bold mb-1">${shop.name}</h6>
                            <p class="text-muted mb-1" style="font-size: 0.85rem;"><strong>Alamat:</strong> ${shop.address}</p>
                            <div class="d-grid gap-1 mt-2">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('shops.detail', ['shop' => $shop]) }}">
                                    Detail Toko
                                </a>
                                <a class="btn btn-sm btn-light text-primary" target="_blank" href="https://www.google.com/maps?q=${shop.latitude},${shop.longitude}">
                                    Lihat di Google Maps
                                </a>
                            </div>
                        </div>
                    `);
                
                marker.shopData = shop; // Simpan data toko di marker
                return marker;
            }

            // Tambahkan semua marker toko ke peta
            shopsData.forEach(function(shop) {
                var marker = createShopMarker(shop);
                marker.addTo(map);
                shopMarkers.push(marker);
            });


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

            // Fungsi untuk filter marker berdasarkan kategori
            function filterMarkersByCategory(categoryId) {
                shopMarkers.forEach(function(marker) {
                    var shop = marker.shopData;
                    
                    if (categoryId === 'all') {
                        // Tampilkan semua marker
                        if (!map.hasLayer(marker)) {
                            marker.addTo(map);
                        }
                    } else {
                        // Tampilkan marker hanya jika toko memiliki produk dengan kategori yang dipilih
                        if (shop.categories.includes(parseInt(categoryId))) {
                            if (!map.hasLayer(marker)) {
                                marker.addTo(map);
                            }
                        } else {
                            if (map.hasLayer(marker)) {
                                map.removeLayer(marker);
                            }
                        }
                    }
                });
            }

            // Event listener untuk tombol filter kategori
            document.querySelectorAll('.category-filter').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Hapus class active dari semua tombol
                    document.querySelectorAll('.category-filter').forEach(function(btn) {
                        btn.classList.remove('active');
                    });
                    
                    // Tambahkan class active ke tombol yang diklik
                    this.classList.add('active');
                    
                    // Filter marker berdasarkan kategori yang dipilih
                    var categoryId = this.getAttribute('data-category');
                    filterMarkersByCategory(categoryId);
                });
            });

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


@endsection
