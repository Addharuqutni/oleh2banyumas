@extends('layouts.index')

@section('title', 'Kelompok Harga Produk')

@section('content')
    <div class="container mt-4">
        {{-- Header Section --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="page-title">Kelompok Harga Produk</h1>
                        <p class="text-muted">Temukan produk berdasarkan kelompok harga yang telah ditentukan.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Produk
                    </a>
                </div>
            </div>
        </div>

        {{-- Filter Section --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('products.cluster') }}" class="row g-3 align-items-end">
                            {{-- Filter Kategori --}}
                            <div class="col-md-5">
                                <label for="category" class="form-label fw-bold">Filter Kategori</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $selected_category == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Filter Kelompok Harga (Menggunakan Metadata) --}}
                            <div class="col-md-5">
                                <label for="cluster" class="form-label fw-bold">Filter Kelompok Harga</label>
                                <select name="cluster" id="cluster" class="form-select">
                                    <option value="">Semua Kelompok</option>
                                    @foreach ($available_clusters as $cluster_group)
                                        <option value="{{ $cluster_group }}"
                                            {{ (string) $selected_cluster === (string) $cluster_group ? 'selected' : '' }}>
                                            {{-- Mengambil nama deskriptif dari metadata --}}
                                            {{ $cluster_metadata[$cluster_group]['name'] ?? 'Kelompok ' . ($cluster_group + 1) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-2"></i>Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Products Display --}}
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card h-100">
                        <div class="product-img-container">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-product.jpg') }}"
                                alt="{{ $product->name }}" class="product-img">
                            <div class="price-badge">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            <div class="cluster-badge cluster-header-{{ $product->price_cluster_group ?? 'default' }}">
                                {{-- Mengambil nama deskriptif dari metadata untuk badge --}}
                                {{ $cluster_metadata[$product->price_cluster_group]['name'] ?? 'Lainnya' }}
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="product-title">{{ Str::limit($product->name, 50) }}</h6>
                            <p class="product-shop mb-2">
                                <i class="fas fa-store me-1"></i>{{ $product->shop->name }}
                            </p>
                            <div class="mt-auto pt-2">
                                <a href="{{ route('products.show', [$product->shop->slug, $product->slug]) }}"
                                    class="btn btn-outline-primary btn-sm w-100">
                                    <i class="fas fa-eye me-1"></i>Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Empty State --}}
                <div class="col-12">
                    <div class="text-center py-5 my-3 bg-light rounded">
                        <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Produk Tidak Ditemukan</h4>
                        <p>Coba ubah kriteria filter Anda atau kembali ke daftar produk.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="d-flex justify-content-center">
            {{ $products->onEachSide(1)->links('partials.custom-pagination') }}
        </div>

    </div>

    <style>
        .cluster-badge {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .cluster-header-0 {
            background: #28a745;
        }

        .cluster-header-1 {
            background: #ffc107;
            color: #212529 !important;
        }

        .cluster-header-2 {
            background: #fd7e14;
        }

        .cluster-header-3 {
            background: #dc3545;
        }

        .cluster-header-4 {
            background: #6f42c1;
        }

        .cluster-header-default {
            background: #6c757d;
        }

        .product-card {
            border: 1px solid #e9ecef;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .product-img-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }

        .price-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.85rem;
        }

        .product-body {
            padding: 1rem;
        }

        .product-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            min-height: 44px;
            /* Ensure consistent title height */
        }

        .product-shop {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
    </style>
@endsection
