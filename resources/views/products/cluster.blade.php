@extends('layouts.index')

@section('title', 'Kelompok Harga Produk')

@section('content')
    <div class="container py-5">
        <div class="mb-5 position-relative">
            <a href="{{ url()->previous() }}" class="btn btn-link position-absolute start-0 text-success"
                style="transition: transform 0.3s ease;">
                <i class="bi bi-chevron-left fs-4 me-1"></i>
            </a>
            <div class="text-center">
                <h2 class="judul fw-bold mb-1">Klasterisasi Harga Produk</h2>
                <p class="text-muted">Temukan produk berdasarkan kelompok harga yang telah ditentukan.</p>
                <a href="{{ route('cluster.map') }}" class="btn btn-outline-success mt-2">
                    <i class="bi bi-geo-alt me-1"></i> Lihat Pada Peta
                </a>
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
                                <button type="submit" class="btn btn-success w-100">
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
                            <div class="cluster-badge cluster-header-{{ $product->price_cluster_group ?? 'default' }}">
                                {{-- Mengambil nama deskriptif dari metadata untuk badge --}}
                                {{ $cluster_metadata[$product->price_cluster_group]['name'] ?? 'Lainnya' }}
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <small class="d-block mb-2 text-muted">
                                <i class="bi bi-shop"></i> {{ $product->shop->name }}
                            </small>
                            <div class="mt-auto">
                                <a href="{{ route('shops.products.show', ['shop' => $product->shop->slug, 'product' => $product->slug]) }}"
                                    class="btn-detail w-100 text-center">Detail Produk</a>
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
            background-color: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .product-img-container {
            position: relative;
            padding-top: 75%;
            overflow: hidden;
        }

        .product-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
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
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #000000;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .product-shop {
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
@endsection
