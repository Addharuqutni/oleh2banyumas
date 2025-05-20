@extends('admin.layouts.app')

@section('title', 'Moderasi Ulasan Menunggu')

@section('styles')
    <style>
        .review-card {
            transition: all 0.2s ease;
            border-left: 4px solid #dc3545;
        }

        .review-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .review-meta {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .review-meta .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-weight: bold;
            color: #6c757d;
        }

        .rating {
            color: #ffc107;
        }

        .rating-empty {
            color: #e9ecef;
        }

        .review-actions {
            display: flex;
            gap: 0.5rem;
        }

        .badge-shop {
            background-color: #e9f7fe;
            color: #0d6efd;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: #adb5bd;
            margin-bottom: 1rem;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-1">Moderasi Ulasan</h1>
                <p class="text-muted">Tinjau dan setujui ulasan yang menunggu moderasi</p>
            </div>
            <div>
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Semua Ulasan
                </a>
            </div>
        </div>

        @if ($reviews->isEmpty())
            <div class="card">
                <div class="card-body empty-state">
                    <div class="empty-state-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h4>Tidak Ada Ulasan Menunggu</h4>
                    <p class="text-muted mb-4">Semua ulasan telah dimoderasi. Kembali lagi nanti untuk memeriksa ulasan
                        baru.</p>
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">
                        Lihat Semua Ulasan
                    </a>
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($reviews as $review)
                    <div class="col-md-6 mb-4">
                        <div class="card review-card h-100">
                            <div class="card-body">
                                <div class="review-header">
                                    <span class="badge badge-shop">
                                        </i> {{ $review->shop->name }}
                                    </span>
                                    <small class="text-muted">{{ $review->created_at->format('d M Y, H:i') }}</small>
                                </div>

                                <div class="review-meta">
                                    <div class="avatar">
                                        {{ strtoupper(substr($review->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $review->name }}</h6>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="bi bi-star-fill"></i>
                                                @else
                                                    <i class="bi bi-star rating-empty"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <div class="review-content my-3">
                                    <p class="mb-0">{{ $review->comment }}</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{ route('shops.show', $review->shop) }}" target="_blank"
                                        class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye me-1"></i> Lihat Toko
                                    </a>
                                    <div class="review-actions">
                                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash me-1"></i> Tolak
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.reviews.approve', $review) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="bi bi-check-circle me-1"></i> Setujui
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
@endsection
