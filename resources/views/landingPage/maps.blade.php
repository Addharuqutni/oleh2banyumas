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
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-white bg-opacity-75 d-flex justify-content-center align-items-center" style="z-index: 1000;">
                        <div class="text-center text-success">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Memuat peta...</p>
                        </div>
                    </div>
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
        // Get loading overlay
        const mapOverlay = document.querySelector('.position-absolute');

        // Initialize map centered on Banyumas
        var map = L.map('map', {
            zoomControl: false
        }).setView([-7.4292, 109.2297], 12);

        // Add custom zoom control to top-right
        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        // Add markers for each location from database
        @foreach ($shops as $shop)
            L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}])
                .bindPopup('<div class="popup-content">' +
                    '@if ($shop->featured_image)' +
                    '<img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}">' +
                    '@else' +
                    '<img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $shop->name }}">' +
                    '@endif' +
                    '<h3 class="fw-bold">{{ $shop->name }}</h3>' +
                    '<div>' +
                    '<h5 class="fw-semibold">Alamat:</h5>' +
                    '<p class="mb-3">{{ $shop->address }}</p>' +
                    '<a class="btn btn-success btn-sm rounded" href="{{ route('shops.detail', ['shop' => $shop]) }}">Detail Toko</a>' +
                    '<div class="view-link">' +
                    '<small>Klik untuk melihat di Google Maps:</small>' +
                    '<a class="badge bg-success" target="_blank" href="https://www.google.com/maps?q={{ $shop->latitude }},{{ $shop->longitude }}">' +
                    'Lihat di Maps <i class="bi bi-box-arrow-up-right"></i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>', {
                        maxWidth: 300,
                        minWidth: 200
                    })
                .addTo(map);
        @endforeach

        // Hide loading overlay after 1.5 seconds
        setTimeout(function() {
            mapOverlay.style.opacity = '0';
            setTimeout(function() {
                mapOverlay.style.display = 'none';
            }, 500);
        }, 1500);

        // Make map responsive
        window.addEventListener('resize', function() {
            map.invalidateSize();
        });
    });
</script>
