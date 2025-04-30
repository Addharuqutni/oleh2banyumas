@extends('admin.layouts.app')

@section('title', 'Kelola Toko')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Kelola Toko</h1>
            <a href="{{ route('admin.shops.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Toko
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($shops as $shop)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($shop->featured_image)
                                            <img src="{{ asset('storage/' . $shop->featured_image) }}"
                                                alt="{{ $shop->name }}" width="50" height="50" class="rounded"
                                                style="object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                                style="width: 50px; height: 50px;">
                                                <i class="bi bi-image text-secondary"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $shop->name }}</td>
                                    <td>{{ Str::limit($shop->address, 30) }}</td>
                                    <td>
                                        @if ($shop->status == 'active')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>{{ $shop->products_count ?? 0 }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.shops.show', ['shop' => $shop]) }}"
                                                class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip"
                                                title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.shops.edit', ['shop' => $shop]) }}"
                                                class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $shop->id }}" data-bs-toggle="tooltip"
                                                title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $shop->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $shop->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $shop->id }}">
                                                            Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus toko
                                                        <strong>{{ $shop->name }}</strong>? Semua produk dan ulasan
                                                        terkait toko ini juga akan dihapus.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('admin.shops.destroy', $shop->slug) }}"
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
                                    <td colspan="7" class="text-center">Belum ada data toko</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $shops->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
