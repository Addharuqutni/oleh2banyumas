@extends('admin.layouts.app')

@section('title', $shop->name)

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 300px;
            width: 100%;
            margin-bottom: 20px;
        }

        .gallery-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .gallery-img:hover {
            transform: scale(1.03);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Detail Toko</h1>
            <div>
                <a href="{{ route('admin.shops.edit', $shop->id) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil me-1"></i> Edit
                </a>
                <a href="{{ route('admin.shops.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            @if ($shop->featured_image)
                                <img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}"
                                    class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center rounded me-3"
                                    style="width: 80px; height: 80px;">
                                    <i class="bi bi-shop fs-1 text-secondary"></i>
                                </div>
                            @endif
                            <div>
                                <h2 class="h4 mb-1">{{ $shop->name }}</h2>
                                <p class="text-muted mb-0">
                                    @if ($shop->status == 'active')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Informasi Toko</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <p class="mb-1 fw-bold">Alamat</p>
                                    <p class="mb-0">{{ $shop->address }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <p class="mb-1 fw-bold">Koordinat</p>
                                    <p class="mb-0">{{ $shop->latitude }}, {{ $shop->longitude }}</p>
                                </div>

                                @if ($shop->phone)
                                    <div class="col-md-6 mb-3">
                                        <p class="mb-1 fw-bold">Telepon</p>
                                        <p class="mb-0">{{ $shop->phone }}</p>
                                    </div>
                                @endif

                                @if ($shop->email)
                                    <div class="col-md-6 mb-3">
                                        <p class="mb-1 fw-bold">Email</p>
                                        <p class="mb-0">{{ $shop->email }}</p>
                                    </div>
                                @endif

                                @if ($shop->website)
                                    <div class="col-md-6 mb-3">
                                        <p class="mb-1 fw-bold">Website</p>
                                        <p class="mb-0"><a href="{{ $shop->website }}"
                                                target="_blank">{{ $shop->website }}</a></p>
                                    </div>
                                @endif

                                @if ($shop->operating_hours)
                                    <div class="col-md-6 mb-3">
                                        <p class="mb-1 fw-bold">Jam Operasional</p>
                                        <p class="mb-0">{{ $shop->operating_hours }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if ($shop->description)
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2">Deskripsi</h5>
                                <p class="mb-0">{{ $shop->description }}</p>
                            </div>
                        @endif

                        <div class="mb-4">
                            <h5 class="border-bottom pb-2">Lokasi</h5>
                            <div id="map"></div>
                        </div>

                        @if ($shop->images->count() > 0)
                            <div>
                                <h5 class="border-bottom pb-2">Galeri Foto</h5>
                                <div class="row g-3">
                                    @foreach ($shop->images as $image)
                                        <div class="col-md-3 col-sm-4 col-6">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                alt="{{ $image->caption ?? $shop->name }}" class="gallery-img"
                                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                                data-src="{{ asset('storage/' . $image->image_path) }}">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Image Modal -->
                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">Galeri {{ $shop->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="" id="modalImage" class="img-fluid"
                                                    style="max-height: 80vh;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Produk ({{ $shop->products->count() }})</h5>
                            <a href="{{ route('admin.products.create', ['shop_id' => $shop->id]) }}"
                                class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-lg"></i> Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if ($shop->products->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach ($shop->products as $product)
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" class="rounded me-3"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center rounded me-3"
                                                    style="width: 50px; height: 50px;">
                                                    <i class="bi bi-box-seam text-secondary"></i>
                                                </div>
                                            @endif
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $product->name }}</h6>
                                                <p class="text-primary mb-0">Rp
                                                    {{ number_format($product->price, 0, ',', '.') }}</p>
                                            </div>
                                            <div>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="p-4 text-center">
                                <p class="text-muted mb-0">Belum ada produk untuk toko ini.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Ulasan ({{ $shop->reviews->count() }})</h5>
                    </div>
                    <div class="card-body p-0">
                        @if ($shop->reviews->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach ($shop->reviews->take(5) as $review)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h6 class="mb-0">{{ $review->name }}</h6>
                                            <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                                        </div>
                                        <div class="mb-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="bi bi-star-fill text-warning small"></i>
                                                @else
                                                    <i class="bi bi-star text-warning small"></i>
                                                @endif
                                            @endfor

                                            @if ($review->is_approved)
                                                <span class="badge bg-success ms-2">Disetujui</span>
                                            @else
                                                <span class="badge bg-warning ms-2">Pending</span>
                                            @endif
                                        </div>
                                        <p class="small mb-0">{{ Str::limit($review->comment, 100) }}</p>
                                    </li>
                                @endforeach
                            </ul>

                            @if ($shop->reviews->count() > 5)
                                <div class="p-3 text-center">
                                    <a href="{{ route('admin.reviews.index', ['shop_id' => $shop->id]) }}"
                                        class="btn btn-sm btn-outline-primary">Lihat Semua Ulasan</a>
                                </div>
                            @endif
                        @else
                            <div class="p-4 text-center">
                                <p class="text-muted mb-0">Belum ada ulasan untuk toko ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map centered on shop location
            var lat = {{ $shop->latitude }};
            var lng = {{ $shop->longitude }};
            var map = L.map('map').setView([lat, lng], 15);

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Add marker for shop location
            L.marker([lat, lng])
                .addTo(map)
                .bindPopup('<strong>{{ $shop->name }}</strong><br>{{ $shop->address }}');

            // Handle gallery image click
            const galleryImages = document.querySelectorAll('.gallery-img');
            const modalImage = document.getElementById('modalImage');

            galleryImages.forEach(function(img) {
                img.addEventListener('click', function() {
                    modalImage.src = this.getAttribute('data-src');
                });
            });
        });
    </script>
@endsection
