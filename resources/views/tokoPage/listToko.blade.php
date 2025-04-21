@extends('layouts.index')

@section('title', 'Toko - Oleh Oleh')

@section('content')
    <div class="container-fluid py-4">
        <div class="container">
            <!-- Back Button and Header -->
            <div class="mb-5 position-relative">
                <a href="{{ url()->previous() }}" class="btn btn-link position-absolute start-0 text-success" 
                style="transition: transform 0.3s ease;">
                    <i class="bi bi-chevron-left fs-4 me-1"></i>
                </a>
                <div class="text-center">
                    <h2 class="judul fw-bold mb-1">Daftar Toko Oleh Oleh Makanan Ringan Banyumas</h2>
                </div>
            </div>

            <!-- Combined Search and Filter -->
            <div>
                <div class="card-body p-3">
                    <form action="{{ route('shops.list') }}" method="GET" class="row g-1">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" name="search" 
                                    placeholder="Cari toko atau produk..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" name="category_id">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-success w-100" type="submit">
                                <i class="bi bi-search d-md-none"></i>
                                <span class="d-none d-md-inline">Cari</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Active Filters (if any) -->
            @if($selectedCategory || request('search'))
                <div class="mb-3">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="text-muted small">Filter aktif:</span>
                        
                        @if($selectedCategory)
                            <div class="badge bg-light text-dark p-2">
                                Kategori: {{ $selectedCategory->name }}
                                <a href="{{ route('shops.list', array_merge(request()->except(['category_id', 'page']), [])) }}" 
                                   class="text-dark ms-1">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                        @endif
                        
                        @if(request('search'))
                            <div class="badge bg-light text-dark p-2">
                                "{{ request('search') }}"
                                <a href="{{ route('shops.list', array_merge(request()->except(['search', 'page']), [])) }}" 
                                   class="text-dark ms-1">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                        @endif
                        
                        <a href="{{ route('shops.list') }}" class="text-decoration-none small text-muted">
                            <i class="bi bi-x"></i> Hapus semua
                        </a>
                    </div>
                </div>
            @endif
            
            <!-- Results Count -->
            <p class="small text-muted mb-3">
                Menampilkan {{ $shops->count() }} dari {{ $shops->total() }} toko
                @if($selectedCategory)
                    kategori <strong>{{ $selectedCategory->name }}</strong>
                @endif
            </p>

            <!-- Store Cards - Row -->
            <div class="row g-4 mb-4">
                <!-- Store Card -->
                @forelse($shops as $shop)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="store-card">
                            <div class="card-img-container">
                                @if ($shop->featured_image)
                                    <img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}"
                                        class="card-img">
                                @else
                                    <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $shop->name }}"
                                        class="card-img">
                                @endif
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">{{ $shop->name }}</h5>
                                <p class="card-address">{{ $shop->address }}</p>
                                
                                <!-- Show product categories if filtered -->
                                @if($selectedCategory)
                                    <div class="shop-categories mb-2">
                                        <small class="text-success">
                                            <i class="bi bi-tag"></i> {{ $selectedCategory->name }}
                                        </small>
                                        @if(isset($shop->products) && $shop->products->count() > 0)
                                            <div class="mt-1">
                                                @foreach($shop->products->take(3) as $product)
                                                    <small class="badge bg-light text-dark me-1">{{ $product->name }}</small>
                                                @endforeach
                                                @if($shop->products->count() > 3)
                                                    <small class="text-muted">+{{ $shop->products->count() - 3 }} lainnya</small>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                
                                <a href="{{ route('shops.detail', ['shop' => $shop]) }}" class="btn-detail">Detail Toko</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center empty-results">
                        <h5>Tidak ada toko yang ditemukan</h5>
                        @if($selectedCategory)
                            <p>Tidak ada toko yang menjual produk kategori <strong>{{ $selectedCategory->name }}</strong></p>
                        @elseif(request('search'))
                            <p>Tidak ada toko yang cocok dengan pencarian "<strong>{{ request('search') }}</strong>"</p>
                        @else
                            <p>Coba ubah filter pencarian Anda</p>
                        @endif
                        <div class="mt-3">
                            <a href="{{ route('shops.list') }}" class="btn btn-outline-success">
                                <i class="bi bi-arrow-repeat me-1"></i> Lihat Semua Toko
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $shops->links() }}
            </div>
        </div>
    </div>

    <script>
        // Auto-submit form when category is changed
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.querySelector('select[name="category_id"]');
            if (categorySelect) {
                categorySelect.addEventListener('change', function() {
                    this.form.submit();
                });
            }
        });
    </script>

    <style>

                /* Store Card Styling */
                .store-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-img-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .store-card:hover .card-img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 1.25rem;
        }

        .card-title {
            font-weight: 600;
            color: #2e7d32;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .card-address {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .btn-detail {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #e8f5e9;
            color: #2e7d32;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .btn-detail:hover {
            background-color: #c8e6c9;
        }
        /* Simplified styling */
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 8px;
            border: none;
        }
        
        .object-fit-cover {
            object-fit: cover;
        }
        
        /* Pagination styling */
        .pagination .page-link {
            color: #198754;
            border-color: #dee2e6;
        }
        
        .pagination .page-item.active .page-link {
            background-color: #198754;
            border-color: #198754;
        }
        
        .badge {
            font-weight: normal;
        }
    </style>
@endsection