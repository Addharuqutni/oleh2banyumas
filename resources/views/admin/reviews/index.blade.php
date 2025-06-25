@extends('admin.layouts.app')

@section('title', 'Manajemen Ulasan')

@section('styles')
    <style>
        .filter-card {
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .review-status {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .review-status.approved {
            background-color: #198754;
        }

        .review-status.pending {
            background-color: #dc3545;
        }

        .rating {
            color: #ffc107;
        }

        .rating-empty {
            color: #e9ecef;
        }

        .review-table th,
        .review-table td {
            vertical-align: middle;
        }

        .badge-shop {
            background-color: #e9f7fe;
            color: #0d6efd;
            font-weight: normal;
        }

        .badge-pending {
            background-color: #fff4e5;
            color: #fd7e14;
            font-weight: normal;
        }

        .badge-approved {
            background-color: #e7f6e7;
            color: #198754;
            font-weight: normal;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-1">Manajemen Ulasan</h1>
                <p class="text-muted">Kelola semua ulasan toko di platform</p>
            </div>
            @if ($pendingCount > 0)
                <a href="{{ route('admin.reviews.pending') }}" class="btn btn-primary">
                    <i class="bi bi-clock-history me-1"></i> Moderasi Ulasan
                    <span class="badge bg-white text-primary ms-1">{{ $pendingCount }}</span>
                </a>
            @endif
        </div>

        <!-- Filter Card -->
        <div class="card filter-card">
            <div class="card-body">
                <form action="{{ route('admin.reviews.index') }}" method="GET" class="row g-3">
                    <div class="col-md-4">
                        <label for="search" class="form-label">Cari</label>
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Nama reviewer..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="shop_id" class="form-label">Toko</label>
                        <select class="form-select" id="shop_id" name="shop_id">
                            <option value="">Semua Toko</option>
                            @foreach ($shops as $shop)
                                <option value="{{ $shop->id }}" {{ request('shop_id') == $shop->id ? 'selected' : '' }}>
                                    {{ $shop->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">Semua Status</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui
                            </option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-filter me-1"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Reviews Table -->
        <div class="card">
            <div class="card-body">
                @if ($reviews->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-chat-square-text text-muted" style="font-size: 3rem;"></i>
                        <h4 class="mt-3">Tidak Ada Ulasan</h4>
                        <p class="text-muted">Belum ada ulasan yang sesuai dengan filter yang dipilih.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover review-table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No.</th>
                                    <th style="width: 20%">Toko</th>
                                    <th style="width: 15%">Reviewer</th>
                                    <th style="width: 10%">Rating</th>
                                    <th style="width: 25%">Ulasan</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $review->shop->name }}
                                        </td>
                                        <td>
                                            <div>{{ $review->name }}</div>
                                            <small class="text-muted">{{ $review->email }}</small>
                                        </td>
                                        <td>
                                            <div class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="bi bi-star-fill"></i>
                                                    @else
                                                        <i class="bi bi-star rating-empty"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                                {{ $review->comment }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($review->is_approved)
                                                <span class="badge badge-approved">
                                                    <i class="bi bi-check-circle me-1"></i> Disetujui
                                                </span>
                                            @else
                                                <span class="badge badge-pending">
                                                    <i class="bi bi-clock-history me-1"></i> Menunggu
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal" data-bs-target="#viewModal{{ $review->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                @if (!$review->is_approved)
                                                    <form action="{{ route('admin.reviews.approve', $review) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                                            <i class="bi bi-check-lg"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- View Modal -->
                                            <div class="modal fade" id="viewModal{{ $review->id }}" tabindex="-1"
                                                aria-labelledby="viewModalLabel{{ $review->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewModalLabel{{ $review->id }}">
                                                                Detail Ulasan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">
                                                                </i> {{ $review->shop->name }}

                                                                <small
                                                                    class="text-muted">{{ $review->created_at->format('d M Y, H:i') }}</small>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label text-muted">Nama</label>
                                                                <div class="fw-bold">{{ $review->name }}</div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label text-muted">Email</label>
                                                                <div>{{ $review->email }}</div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label text-muted">Rating</label>
                                                                <div class="rating">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $review->rating)
                                                                            <i class="bi bi-star-fill"></i>
                                                                        @else
                                                                            <i class="bi bi-star rating-empty"></i>
                                                                        @endif
                                                                    @endfor
                                                                    <span class="ms-2">({{ $review->rating }}/5)</span>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label text-muted">Ulasan</label>
                                                                <div class="p-3 bg-light rounded">
                                                                    {{ $review->comment }}
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label text-muted">Status</label>
                                                                @if ($review->is_approved)
                                                                    <span class="badge badge-approved">
                                                                        <i class="bi bi-check-circle me-1"></i> Disetujui
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-pending">
                                                                        <i class="bi bi-clock-history me-1"></i> Menunggu
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('shops.show', $review->shop) }}"
                                                                target="_blank" class="btn btn-outline-secondary">
                                                                <i class="bi bi-eye me-1"></i> Lihat Toko
                                                            </a>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            @if (!$review->is_approved)
                                                                <form
                                                                    action="{{ route('admin.reviews.approve', $review) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class="bi bi-check-circle me-1"></i> Setujui
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            Menampilkan {{ $reviews->firstItem() ?? 0 }} hingga {{ $reviews->lastItem() ?? 0 }} dari
                            {{ $reviews->total() }} ulasan
                        </div>
                        <div>
                            {{ $reviews->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
