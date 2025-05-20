@extends('layouts.index')

@section('title', 'Toko - Oleh Oleh')

@section('content')
    <div class="container-fluid py-4">
        <div class="container">
            <!-- Back Button and Header -->
            <div class="mb-5 position-relative">
                <a href="{{ url()->previous() }}" class="btn btn-link position-absolute start-0 text-success">
                    <i class="bi bi-chevron-left fs-4 me-1"></i>
                </a>
                <div class="text-center">
                    <h2 class="judul fw-bold mb-1">Daftar Toko Oleh Oleh Makanan Ringan Banyumas</h2>
                </div>
            </div>

            <!-- Combined Search and Filter -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body p-3 p-md-4">
                    <form action="{{ route('shops.list') }}" method="GET" class="row g-2">
                        <div class="col-md-8">
                            <div class="input-group search-input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search text-success"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 py-2" name="search" 
                                    placeholder="Cari toko atau produk..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select py-2 category-select" name="category_id">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-success w-100 py-2" type="submit">
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
                                <i class="bi bi-tag-fill me-1 text-success small"></i>
                                {{ $selectedCategory->name }}
                                <a href="{{ route('shops.list', array_merge(request()->except(['category_id', 'page']), [])) }}" 
                                   class="text-dark ms-1">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                        @endif
                        
                        @if(request('search'))
                            <div class="badge bg-light text-dark p-2">
                                <i class="bi bi-search me-1 text-success small"></i>
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
                        @include('partials.store-card', ['shop' => $shop, 'selectedCategory' => $selectedCategory ?? null])
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="empty-results">
                            <i class="bi bi-shop"></i>
                            <h5 class="mt-3">Tidak ada toko yang ditemukan</h5>
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
@endsection