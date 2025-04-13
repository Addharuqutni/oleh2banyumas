<section class="map-section py-4 py-md-5">
    <div class="container">
        <div class="row mb-4 mb-md-8">
            <div class="col-12 mx-auto text-center">
                <div class="section-header">
                    <h1 class="section-title fw-bold">Pilihan Toko Oleh-oleh seBanyumas</h1>
                    <div class="section-divider mx-auto"></div>
                    <p class="section-description">Website bekerja sama dengan toko Oleh-oleh untuk menyediakan
                        informasidan wawasanpada daerah Banyumas</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mx-auto">
                <div class="map-container shadow rounded">
                    <div class="map-overlay">
                        <div class="map-loading">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Memuat peta...</p>
                        </div>
                    </div>
                    <div id="map"></div>
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
    /* Section Styling */
    .map-section {
        background: #ffffff;
        position: relative;
    }

    .section-header {
        margin-bottom: 1.5rem;
    }

    .section-title {
        color: var(--primary-color);
        font-size: 2.25rem;
        margin-bottom: 1rem;
        position: relative;
    }

    .section-divider {
        width: 70px;
        height: 4px;
        background: linear-gradient(to right, var(--primary-light), var(--primary-color));
        border-radius: 2px;
        margin-bottom: 1.5rem;
    }

    .section-description {
        color: var(--secondary-color);
        font-size: 1rem;
        margin: 0 auto;
    }

    /* Map Container */
    .map-container {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    #map {
        width: 100%;
        height: 70vh;
        transition: filter 0.1s ease;
    }

    .map-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        transition: opacity 0.5s ease;
    }

    .map-loading {
        text-align: center;
        color: var(--primary-color);
    }

    .map-legend {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background-color: white;
        padding: 10px 15px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-sm);
        z-index: 500;
        font-size: 0.9rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .legend-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        color: var(--secondary-color);
    }

    .legend-item:last-child {
        margin-bottom: 0;
    }

    .legend-item i {
        margin-right: 8px;
        color: var(--primary-color);
    }

    /* Styling for popup content */
    .leaflet-popup-content-wrapper {
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }

    .leaflet-popup-content {
        max-width: 300px;
        padding: 0;
        margin: 0;
    }

    .popup-content {
        padding: 10px;
    }

    .popup-content img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: var(--border-radius) var(--border-radius) 0 0;
        margin-bottom: 0.75rem;
        border-bottom: 3px solid var(--primary-color);
    }

    .popup-content h3 {
        font-size: 1.2rem;
        margin-bottom: 0.75rem;
        color: var(--primary-color);
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        padding-bottom: 0.5rem;
    }

    .popup-content h5 {
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
        color: var(--secondary-color);
    }

    .popup-content h6 {
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
        color: var(--secondary-color);
        font-weight: normal;
    }

    .popup-content .btn {
        background-color: var(--primary-color);
        color: white;
        border: none;
        transition: all 0.3s ease;
        font-weight: 600;
        padding: 0.5rem 1rem;
    }

    .popup-content .btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .view-link {
        margin-top: 0.75rem;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        padding-top: 0.75rem;
    }

    .view-link a {
        display: inline-flex;
        align-items: center;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .view-link a:hover {
        color: var(--primary-dark);
    }

    .view-link a i {
        margin-left: 5px;
    }

    .view-link .badge {
        background-color: var(--primary-light);
        color: white;
        transition: all 0.3s ease;
    }

    .view-link .badge:hover {
        background-color: var(--primary-color);
    }

    /* Leaflet Controls Styling */
    .leaflet-control-zoom {
        border-radius: var(--border-radius) !important;
        overflow: hidden;
        box-shadow: var(--shadow-sm) !important;
    }

    .leaflet-control-zoom a {
        background-color: white !important;
        color: var(--secondary-color) !important;
        transition: all 0.3s ease;
    }

    .leaflet-control-zoom a:hover {
        background-color: var(--primary-light) !important;
        color: white !important;
    }

    .leaflet-control-attribution {
        font-size: 0.7rem !important;
        background-color: rgba(255, 255, 255, 0.8) !important;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        #map {
            height: 50vh;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .section-description {
            max-width: 100%;
            font-size: 1rem;
        }

        .map-legend {
            bottom: 10px;
            left: 10px;
            font-size: 0.8rem;
            padding: 8px 12px;
        }

        .popup-content img {
            height: 120px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide loading overlay when map is ready
        const mapOverlay = document.querySelector('.map-overlay');

        // Initialize map centered on Banyumas
        var map = L.map('map', {
            zoomControl: false // We'll add zoom control manually
        }).setView([-7.4292, 109.2297], 12);

        // Add custom zoom control to top-right
        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        // Add OpenStreetMap tile layer with custom styling
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
                    '<h6>{{ $shop->address }}</h6>' +
                    '<a class="btn btn-sm rounded" href="{{ route('shops.detail', ['shop' => $shop]) }}">Detail Toko</a>' +
                    '<div class="view-link">' +
                    '<small>Klik untuk melihat di Google Maps:</small>' +
                    '<a class="badge" target="_blank" href="https://www.google.com/maps?q={{ $shop->latitude }},{{ $shop->longitude }}">' +
                    'Lihat di Maps <i class="bi bi-box-arrow-up-right"></i></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>', {
                        maxWidth: 300,
                        minWidth: 200,
                        className: 'custom-popup'
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
