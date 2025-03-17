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

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data statis untuk demo (ganti dengan data dinamis dari database)
        var locations = [{
                nama: "Getuk Goreng Sokaraja",
                alamat: "Jl. Raya Sokaraja, Banyumas",
                latitude: -7.4576737,
                longitude: 109.2925581,
                foto: "https://asset.kompas.com/crops/WYVkY6Lk1HtXCw9uA5Cw-NJkBtw=/0x0:698x465/750x500/data/photo/2020/12/30/5fec4ca8f3fd9.jpg"
            },
            {
                nama: "Pusat Oleh-oleh Nopia",
                alamat: "Jl. Suparjo Rustam, Purwokerto",
                latitude: -7.4312,
                longitude: 109.2350,
                foto: "https://visitjawatengah.jatengprov.go.id/assets/images/c55b5229-9b76-4248-b4dd-07eb530d03b5.jpg"
            },
            {
                nama: "Jenang Jaket Banyumas",
                alamat: "Jl. S. Parman, Purwokerto",
                latitude: -7.4159,
                longitude: 109.2376,
                foto: "https://radarbanyumas.disway.id//upload/600a36d2ce150a861848b8cad106f2ee.jpg"
            },
            {
                nama: "Toko Lanting Asli",
                alamat: "Jl. Raya Baturraden, Banyumas",
                latitude: -7.3800,
                longitude: 109.2290,
                foto: "https://down-id.img.susercontent.com/file/2244ce68d5cc9d5b5456131a4edbed17"
            }
        ];

        // Initialize map centered on Banyumas
        var map = L.map('map').setView([-7.4312, 109.2350], 11);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        // Add markers for each location
        for (var i = 0; i < locations.length; i++) {
            var location = locations[i];

            // Create marker
            L.marker([location.latitude, location.longitude])
                .bindPopup('<div class="popup-content">' +
                    '<img src="' + location.foto + '" alt="' + location.nama + '">' +
                    '<h3 class="text-primary fw-bold">' + location.nama + '</h3>' +
                    '<div>' +
                    '<h5 class="fw-semibold text-secondary">Alamat:</h5>' +
                    '<h6 class="text-secondary">' + location.alamat + '</h6>' +
                    '<a class="btn btn-sm btn-light text-primary rounded text-decoration-none" href="/shop-toko/' +
                    encodeURIComponent(location.nama) + '">Detail Toko</a>' +
                    '<div class="view-link d-flex align-items-center mt-2">' +
                    '<small class="text-secondary">Klik untuk melihat lokasi:</small>' +
                    '<a class="text-decoration-none ms-2" target="_blank" href="https://www.google.com/maps?q=' +
                    location.latitude + ',' + location.longitude + '">' +
                    '<small class="badge bg-light text-primary">View on Google Maps</small></a>' +
                    '</div>' +
                    '</div>' +
                    '</div>')
                .addTo(map);
        }

        // Make map responsive
        window.addEventListener('resize', function() {
            map.invalidateSize();
        });
    });
</script>
