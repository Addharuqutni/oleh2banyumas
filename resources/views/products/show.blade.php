@extends('layouts.index')

@section('title', $product->name)

@section('content')
    <div class="container py-5">
        <!-- Back Button and Header -->
        <div class="mb-4 position-relative">
            <a href="{{ url()->previous() }}" class="btn-back position-absolute">
                <i class="bi bi-chevron-left"></i>
            </a>
            <h1 class="text-center fw-bold">Detail Produk</h1>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.index') }}">Toko</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('shops.show', $product->shop->slug) }}">{{ $product->shop->name }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        @if (isset($product) && $product)
            <!-- Product Main Section -->
            <div class="card product-detail-card border-0 shadow-sm mb-5">
                <div class="row g-0">
                    <!-- Product Image -->
                    <div class="col-md-6">
                        <div class="product-image-container">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="product-main-image">
                            @else
                                <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}"
                                    class="product-main-image">
                            @endif
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="col-md-6">
                        <div class="card-body product-info p-4">
                            <span class="shop-badge">{{ $product->shop->name }}</span>
                            <h2 class="product-title fw-bold mb-1">{{ $product->name }}</h2>
                            <div class="price-container mb-2">
                                <h5 class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                            </div>
                            <div class="description-container">
                                <h5 class="description-title">Deskripsi Produk</h5>
                                <div class="product-description">
                                    {{ $product->description ?? 'Belum ada deskripsi untuk produk ini.' }}
                                </div>
                            </div>

                            <div class="action-buttons mt-4">
                                <a href="{{ route('shops.detail', $product->shop->slug) }}"
                                    class="btn btn-outline-success btn-lg me-2">
                                    <i class="bi bi-shop me-2"></i>Lihat Toko
                                </a>
                                <a href="https://wa.me/?text=Lihat produk {{ $product->name }} di {{ route('shops.products.show', ['shop' => $product->shop->slug, 'product' => $product->slug]) }}"
                                    class="btn btn-success btn-lg">
                                    <i class="bi bi-share me-2"></i>Bagikan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shop Information Card -->
            <div class="card shop-info-card border-0 shadow-sm mb-5">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="shop-image-container">
                                @if ($product->shop->featured_image)
                                    <img src="{{ asset('storage/' . $product->shop->featured_image) }}"
                                        alt="{{ $product->shop->name }}" class="shop-image">
                                @else
                                    <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $product->shop->name }}"
                                        class="shop-image">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h4 class="shop-name">{{ $product->shop->name }}</h4>
                            <p class="shop-address"><i class="bi bi-geo-alt me-2"></i>{{ $product->shop->address }}</p>
                            @if ($product->shop->phone)
                                <p class="shop-phone"><i class="bi bi-telephone me-2"></i>{{ $product->shop->phone }}</p>
                            @endif
                        </div>
                        <div class="col-md-3 text-md-end">
                            <a href="{{ route('shops.detail', $product->shop->slug) }}" class="btn btn-success">
                                Kunjungi Toko
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            <div class="related-products-section">
                <div class="section-header d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Produk Terkait</h2>
                </div>

                @if ($relatedProducts->count() > 0)
                    <div class="row g-4">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-card h-100">
                                    <div class="card-img-container">
                                        @if ($relatedProduct->image)
                                            <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                                alt="{{ $relatedProduct->name }}" class="card-img">
                                        @else
                                            <img src="{{ asset('images/default-product.jpg') }}"
                                                alt="{{ $relatedProduct->name }}" class="card-img">
                                        @endif
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                        <p class="card-price mt-auto">Rp
                                            {{ number_format($relatedProduct->price, 0, ',', '.') }}</p>
                                        <a class="btn btn-outline-success w-100 mt-2"
                                            href="{{ route('shops.products.show', ['shop' => $relatedProduct->shop->slug, 'product' => $relatedProduct->slug]) }}">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-light text-center">
                        <i class="bi bi-info-circle me-2"></i>Tidak ada produk terkait saat ini.
                    </div>
                @endif
            </div>
        @else
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle me-2"></i>Produk tidak ditemukan atau tidak tersedia.
            </div>
        @endif
    </div>

    <style>
        /* Product Detail Card */
        .product-detail-card {
            border-radius: 8px;
            overflow: hidden;
        }

        .product-image-container {
            height: 100%;
            min-height: 400px;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .product-main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-image-container:hover .product-main-image {
            transform: scale(1.03);
        }

        .product-info {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .shop-badge {
            display: inline-block;
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 0.25rem 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .product-price {
            color: #2e7d32;
        }

        .divider {
            margin: 1.5rem 0;
            border-color: #e9ecef;
        }

        .description-title {
            margin-bottom: 0.75rem;
            color: #495057;
        }

        .product-description {
            color: #6c757d;
        }

        /* Shop Info Card */
        .shop-info-card {
            border-radius: 8px;
            background-color: #fff;
        }

        .shop-image-container {
            width: 100%;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
        }

        .shop-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .shop-image:hover {
            transform: scale(1.05);
        }

        .shop-name {
            font-weight: 600;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .shop-address,
        .shop-phone {
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        /* Related Products Section */
        .related-products-section {
            margin-top: 3rem;
        }

        /* Product Card Styling */
        .product-card {
            border-radius: 8px;
            border: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            background-color: #fff;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-img-container {
            height: 200px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .card-img {
            transform: scale(1.08);
        }

        .card-title {
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .card-price {
            color: #2e7d32;
        }

        /* Button Styling */
        .btn-success,
        .btn-outline-success {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            transition: all 0.3s ease;
        }

        .btn-success {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }

        .btn-success:hover {
            background-color: #1b5e20;
            border-color: #1b5e20;
            transform: translateY(-2px);
        }

        .btn-outline-success {
            color: #2e7d32;
            border-color: #2e7d32;
        }

        .btn-outline-success:hover {
            background-color: #2e7d32;
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .product-title {
                font-size: 1.7rem;
            }

            .product-price {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .product-image-container {
                min-height: 300px;
            }

            .product-title {
                font-size: 1.5rem;
            }

            .product-info {
                padding: 1.5rem !important;
            }

            .action-buttons .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .action-buttons .btn:last-child {
                margin-bottom: 0;
            }
        }

        @media (max-width: 576px) {
            .product-image-container {
                min-height: 250px;
            }

            .section-title {
                font-size: 1.3rem;
            }
        }
    </style>
    
    <script>
        // Image lazy loading
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

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

@endsection
