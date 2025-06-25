<section class="map-section py-4 py-md-5 bg-white">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="fw-bold mb-3 judul">Pilihan Toko Oleh-oleh seBanyumas</h1>
                <p class="text-muted">Website bekerja sama dengan toko Oleh-oleh untuk menyediakan
                    informasi dan wawasan pada daerah Banyumas</p>
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

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<style>
    /* Minimal styling for popup content */
    .popup-content img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-bottom: 2px solid #198754;
        margin-bottom: 10px;
    }

    .popup-content h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
        color: #198754;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 8px;
    }

    .view-link {
        margin-top: 10px;
        border-top: 1px solid #dee2e6;
        padding-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 768px) {
        #map {
            height: 50vh !important;
        }
    }
</style>

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
