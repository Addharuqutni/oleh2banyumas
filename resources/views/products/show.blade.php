@extends('layouts.index')

@section('title', $product->name)

@section('content')
    <div class="container py-4">
        <div class="container mb-4">
            <div class="row position-relative align-items-center">
                <!-- Back Button -->
                <div class="col-auto position-absolute start-0 d-flex align-items-center" style="z-index: 10;">
                    <a href="{{ url()->previous() }}" class="text-dark">
                        <i class="bi bi-chevron-left fs-4"></i>
                    </a>
                </div>

                <div class="col-12 text-center">
                    <h1 class="mb-0 fw-bold">Toko Oleh Oleh Makanan Ringan Banyumas</h1>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.index') }}" class="text-decoration-none">Toko</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.show', $product->shop->slug) }}"
                        class="text-decoration-none">{{ $product->shop->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        @if (isset($product) && $product)
            <div class="row mb-5">
                <!-- Product Image - Left Column -->
                <div class="col-md-5 mb-4">
                    <div class="bg-white shadow rounded p-1">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="img-fluid w-100" style="height: 400px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}"
                                class="img-fluid w-100" style="object-fit: cover;">
                        @endif
                    </div>
                </div>

                <!-- Product Details - Right Column -->
                <div class="col-md-7 mb-4">
                    <h2 class="fw-semibold mb-3">{{ $product->name }}</h2>
                    <h3 class="mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>

                    <hr class="my-4">

                    <div class="mb-4">
                        <p>{{ $product->description ?? 'Belum ada deskripsi untuk produk ini.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Shop Information Section -->
            <div class="py-4 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="bg-white rounded p-1 shadow-sm mb-3">
                                @if ($product->shop->featured_image)
                                    <img src="{{ asset('storage/' . $product->shop->featured_image) }}"
                                        alt="{{ $product->shop->name }}" class="img-fluid" style="object-fit: cover; height: 250px;">
                                @else
                                    <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $product->name }}"
                                        class="img-fluid" style="object-fit: cover; height: 250px;">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-9">
                            <h3 class="fw-semibold mb-3">{{ $product->shop->name }}</h3>
                            <p class="text-secondary">{{ $product->shop->address }}</p>
                            @if ($product->shop->phone)
                                <p class="text-secondary">Telepon: {{ $product->shop->phone }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="fw-semibold mb-4">Produk Terkait</h2>

                    @if ($relatedProducts->count() > 0)
                        <div class="row g-4">
                            @foreach ($relatedProducts as $relatedProduct)
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-card shadow rounded">
                                        @if ($relatedProduct->image)
                                            <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                                alt="{{ $relatedProduct->name }}" class="card-img">
                                        @else
                                            <img src="{{ asset('images/default-product.jpg') }}"
                                                alt="{{ $relatedProduct->name }}" class="card-img">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                            <p class="card-text">Rp
                                                {{ number_format($relatedProduct->price, 0, ',', '.') }}</p>
                                            <a class="btn btn-primary"
                                                href="{{ route('shops.products.show', ['shop' => $relatedProduct->shop->slug, 'product' => $relatedProduct->slug]) }}">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Tidak ada produk terkait.</p>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-warning">
                Produk tidak ditemukan atau tidak tersedia.
            </div>
        @endif
    </div>

    <style>
        /* Card Styling */
        .product-card {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
        }

        .card-title {
            font-weight: bold;
            color: #2e7d32;
        }

        .card-text {
            color: #666;
        }

        .btn {
            background-color: #2e7d32;
            color: white;
            border: none;
        }

        .btn:hover {
            background-color: #1b5e20;
        }

        /* Breadcrumb styling */
        .breadcrumb-item+.breadcrumb-item::before {
            content: "/";
        }

        .breadcrumb-item a {
            color: #2e7d32;
        }

        .breadcrumb-item.active {
            color: #666;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.3rem;
            }

            h3 {
                font-size: 1.1rem;
            }
        }
    </style>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection

@section('scripts')
    <script>
        // Lazy loading images for better performance
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>
@endsection
