<section class="py-4 py-md-5" style="background: var(--bs-gray-100);">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 col-lg-8 mx-auto text-center">
                <h1 class="fw-bold">Pilihan Toko Oleh-oleh seBanyumas</h1>
                <p class="w-lg-50">Website bekerja sama dengan toko Oleh-oleh untuk menyediakan informasi dan wawasan
                    pada daerah Banyumas</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="map-container shadow-sm rounded">
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize map centered on Banyumas
        var map = L.map('map').setView([-7.4292, 109.2297], 12);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        // Add markers for each location from database
        @foreach($shops as $shop)
            L.marker([{{ $shop->latitude }}, {{ $shop->longitude }}])
                .bindPopup('<div class="popup-content">' +
                    '<img src="{{ asset("storage/" . $shop->featured_image) }}" alt="{{ $shop->name }}">' +
                    '<h3 class="text-primary fw-bold">{{ $shop->name }}</h3>' +
                    '<div>' +
                    '<h5 class="fw-semibold text-secondary">Alamat:</h5>' +
                    '<h6 class="text-secondary">{{ $shop->address }}</h6>' +
                    '<a class="btn btn-sm btn-light text-primary rounded text-decoration-none" href="{{ route("shops.show", $shop->id) }}">Detail Toko</a>' +
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
