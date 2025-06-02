@extends('layouts.index')

@section('title', $product->name)

@section('content')
    <div class="container py-5">
        <!-- Back Button and Header -->
        <div class="mb-5 position-relative">
            <a href="{{ url()->previous() }}" class="btn btn-link position-absolute start-0 text-success" 
               style="transition: transform 0.3s ease;">
                <i class="bi bi-chevron-left fs-4 me-1"></i>
            </a>
            <div class="text-center">
                <h2 class="judul fw-bold mb-1">Detail Produk</h2>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4 mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.index') }}">Toko</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shops.detail', $product->shop->slug) }}">{{ $product->shop->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>

        @if (isset($product) && $product)
            <!-- Product Main Section -->
            <div class="card border-0 shadow-sm mb-5 rounded-3 overflow-hidden">
                <div class="row g-0">
                    <!-- Product Image -->
                    <div class="col-md-6">
                        <div class="bg-light h-100 position-relative">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            @else
                                <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100 h-100 object-fit-cover">
                            @endif
                            
                            <!-- Categories badges overlay -->
                            @if($product->categories && $product->categories->count() > 0)
                                <div class="position-absolute bottom-0 start-0 p-3">
                                    @foreach($product->categories as $category)
                                        <span class="badge bg-success me-1 mb-1">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="col-md-6">
                        <div class="card-body p-4">
                            <span class="badge bg-light-green text-success mb-3 rounded-pill">{{ $product->shop->name }}</span>
                            <h2 class="fw-bold mb-2">{{ $product->name }}</h2>
                            <div class="mb-3">
                                <h5 class="fw-semibold text-success">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                            </div>
                            <div class="mb-4">
                                <h5 class="fw-semibold text-dark-green">Deskripsi Produk</h5>
                                <p class="text-muted">
                                    {{ $product->description ?? 'Belum ada deskripsi untuk produk ini.' }}
                                </p>
                            </div>

                            <div class="d-flex flex-column flex-md-row gap-2 mt-4">
                                <a href="https://wa.me/?text=Lihat produk {{ $product->name }} di {{ route('shops.products.show', ['shop' => $product->shop->slug, 'product' => $product->slug]) }}"
                                    class="btn btn-success">
                                    <i class="bi bi-share me-2"></i>Bagikan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shop Information Card -->
            <div class="card border-0 shadow-sm mb-5 rounded-3">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="rounded-3 overflow-hidden" style="height: 120px;">
                                @if ($product->shop->featured_image)
                                    <img src="{{ asset('storage/' . $product->shop->featured_image) }}"
                                        alt="{{ $product->shop->name }}" class="img-fluid w-100 h-100 object-fit-cover">
                                @else
                                    <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $product->shop->name }}"
                                        class="img-fluid w-100 h-100 object-fit-cover">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h4 class="fw-semibold subjudul">{{ $product->shop->name }}</h4>
                            <p class="text-muted mb-1"><i class="bi bi-geo-alt me-2"></i>{{ $product->shop->address }}</p>
                            @if ($product->shop->phone)
                                <p class="text-muted mb-0"><i class="bi bi-telephone me-2"></i>{{ $product->shop->phone }}</p>
                            @endif
                        </div>
                        <div class="col-md-3 text-md-end">
                            <a href="{{ route('shops.detail', $product->shop->slug) }}" class="btn-detail">
                                <i class="bi bi-shop me-1"></i> Kunjungi Toko
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            @if ($relatedProducts->count() > 0)
                <div class="mt-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0 subjudul">Produk Terkait</h2>
                    </div>

                    <div class="row g-4">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                @include('partials.product-card', ['product' => $relatedProduct])
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle me-2"></i>Produk tidak ditemukan atau tidak tersedia.
            </div>
        @endif
    </div>

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
