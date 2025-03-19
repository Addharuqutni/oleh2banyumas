@extends('admin.layouts.app')

@section('title', 'Ulasan Pending')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Ulasan Pending</h1>
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Semua Ulasan
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                @if ($reviews->count() > 0)
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Terdapat {{ $reviews->total() }} ulasan yang menunggu persetujuan.
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
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
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
                                        <td>{{ $review->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-info text-white"
                                                    data-bs-toggle="modal" data-bs-target="#viewModal{{ $review->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <form action="{{ route('admin.reviews.approve', $review->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="bi bi-check-lg"></i>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $review->id }}">
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
                                                            <div>
                                                                <h6>Tanggal</h6>
                                                                <p>{{ $review->created_at->format('d M Y H:i') }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <form
                                                                action="{{ route('admin.reviews.approve', $review->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="btn btn-success">Setujui</button>
                                                            </form>
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
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $review->id }}">Konfirmasi Hapus
                                                            </h5>
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
                                                            <form
                                                                action="{{ route('admin.reviews.destroy', $review->id) }}"
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $reviews->links() }}
                    </div>
                @else
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Tidak ada ulasan yang menunggu persetujuan.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
