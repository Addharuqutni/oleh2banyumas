@extends('admin.layouts.app')

@section('title', 'Kelola Ulasan')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Kelola Ulasan</h1>
            <a href="{{ route('admin.reviews.pending') }}" class="btn btn-warning">
                <i class="bi bi-clock-history me-1"></i> Ulasan Pending
                @if ($pendingCount > 0)
                    <span class="badge bg-light text-dark ms-1">{{ $pendingCount }}</span>
                @endif
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="mb-4">
                    <form action="{{ route('admin.reviews.index') }}" method="GET" class="row g-3">
                        <div class="col-md-4">
                            <select name="shop_id" class="form-select">
                                <option value="">-- Semua Toko --</option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->id }}"
                                        {{ request('shop_id') == $shop->id ? 'selected' : '' }}>{{ $shop->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="status" class="form-select">
                                <option value="">-- Semua Status --</option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui
                                </option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary w-100">Reset</a>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Toko</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Ulasan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reviews as $review)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $review->shop->name }}</td>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="bi bi-star-fill text-warning small"></i>
                                            @else
                                                <i class="bi bi-star text-warning small"></i>
                                            @endif
                                        @endfor
                                    </td>
                                    <td>{{ Str::limit($review->comment, 50) }}</td>
                                    <td>
                                        @if ($review->is_approved)
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $review->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-info text-white"
                                                data-bs-toggle="modal" data-bs-target="#viewModal{{ $review->id }}"
                                                data-bs-toggle="tooltip" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                            @if (!$review->is_approved)
                                                <form action="{{ route('admin.reviews.approve', $review->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success"
                                                        data-bs-toggle="tooltip" title="Setujui">
                                                        <i class="bi bi-check-lg"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $review->id }}" data-bs-toggle="tooltip"
                                                title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
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
                                                        <div class="mb-3">
                                                            <h6>Toko</h6>
                                                            <p>{{ $review->shop->name }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6>Nama</h6>
                                                            <p>{{ $review->name }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6>Email</h6>
                                                            <p>{{ $review->email }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6>Rating</h6>
                                                            <p>
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $review->rating)
                                                                        <i class="bi bi-star-fill text-warning"></i>
                                                                    @else
                                                                        <i class="bi bi-star text-warning"></i>
                                                                    @endif
                                                                @endfor
                                                                ({{ $review->rating }}/5)
                                                            </p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6>Ulasan</h6>
                                                            <p>{{ $review->comment }}</p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <h6>Tanggal</h6>
                                                            <p>{{ $review->created_at->format('d M Y H:i') }}</p>
                                                        </div>
                                                        <div>
                                                            <h6>Status</h6>
                                                            <p>
                                                                @if ($review->is_approved)
                                                                    <span class="badge bg-success">Disetujui</span>
                                                                @else
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        @if (!$review->is_approved)
                                                            <form
                                                                action="{{ route('admin.reviews.approve', $review->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="btn btn-success">Setujui</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $review->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $review->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $review->id }}">
                                                            Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus ulasan dari
                                                        <strong>{{ $review->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada data ulasan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $reviews->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
