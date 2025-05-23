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

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Add markers for each shop from database
            @foreach ($shops as $shop)
                L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}])
                    .bindPopup('<div class="popup-content">' +
                        '@if ($shop->featured_image)' +
                        '<img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}">' +
                        '@else' +
                        '<img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $shop->name }}">' +
                        '@endif' +
                        '<h3 class="text-primary fw-bold">{{ $shop->name }}</h3>' +
                        '<div>' +
                        '<h5 class="fw-semibold text-secondary">Alamat:</h5>' +
                        '<h6 class="text-secondary">{{ $shop->address }}</h6>' +
                        '<a class="btn btn-sm btn-light text-primary rounded text-decoration-none" href="{{ route('shops.detail', ['shop' => $shop]) }}">Detail Toko</a>' +
                        '<div class="view-link d-flex align-items-center mt-2">' +
                        '<small class="text-secondary">Klik untuk melihat lokasi:</small>' +
                        '<a class="text-decoration-none ms-2" target="_blank" href="https://www.google.com/maps?q={{ $shop->latitude }},{{ $shop->longitude }}">' +
                        '<small class="badge bg-light text-primary">View on Google Maps</small></a>' +
                        '</div>' +
                        '</div>' +
                        '</div>')
                    .addTo(map);
            @endforeach

            // Make map responsive
            window.addEventListener('resize', function() {
                map.invalidateSize();
            });
        });
    </script>
