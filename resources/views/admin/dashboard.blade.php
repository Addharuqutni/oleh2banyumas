@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Dashboard</h1>
            <span class="text-muted">Selamat datang di Panel Admin Oleh-oleh Banyumas</span>
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                            <i class="bi bi-shop text-primary fs-4"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-0">Total Toko</h6>
                            <h2 class="mt-2 mb-0">{{ $shopCount }}</h2>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('admin.shops.index') }}" class="text-decoration-none">Lihat semua <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                            <i class="bi bi-box-seam text-success fs-4"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-0">Total Produk</h6>
                            <h2 class="mt-2 mb-0">{{ $productCount }}</h2>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">Lihat semua <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="bi bi-star text-warning fs-4"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-0">Total Ulasan</h6>
                            <h2 class="mt-2 mb-0">{{ $reviewCount }}</h2>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('admin.reviews.index') }}" class="text-decoration-none">Lihat semua <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 me-3">
                            <i class="bi bi-clock-history text-danger fs-4"></i>
                        </div>
                        <div>
                            <h6 class="card-title mb-0">Ulasan Pending</h6>
                            <h2 class="mt-2 mb-0">{{ $pendingReviewCount }}</h2>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('admin.reviews.pending') }}" class="text-decoration-none">Lihat semua <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Toko Terbaru</h5>
                            <a href="{{ route('admin.shops.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestShops as $shop)
                                        <tr>
                                            <td>{{ $shop->name }}</td>
                                            <td>{{ Str::limit($shop->address, 30) }}</td>
                                            <td>
                                                @if($shop->status == 'active')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.shops.edit', $shop->slug) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada data toko</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Ulasan Terbaru</h5>
                            <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Toko</th>
                                        <th>Nama</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($latestReviews as $review)
                                        <tr>
                                            <td>{{ $review->shop->name }}</td>
                                            <td>{{ $review->name }}</td>
                                            <td>
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        <i class="bi bi-star-fill text-warning small"></i>
                                                    @else
                                                        <i class="bi bi-star text-warning small"></i>
                                                    @endif
                                                @endfor
                                            </td>
                                            <td>
                                                @if($review->is_approved)
                                                    <span class="badge bg-success">Disetujui</span>
                                                @else
                                                    <span class="badge bg-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada ulasan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection