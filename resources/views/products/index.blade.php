@extends('layouts.index')

@section('title', $product->name)

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">{{ $product->name }}</h1>
            <div>
                <a href="{{ route('shops.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>

        <!-- Product Image -->
        <div class="mb-4 text-center">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="img-fluid" style="max-height: 400px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}"
                    class="img-fluid" style="max-height: 400px; object-fit: cover;">
            @endif
        </div>

        <!-- Product Information -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-semibold">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
                <h5 class="text-secondary">Deskripsi:</h5>
                <p>{{ $product->description ?? 'Belum ada deskripsi untuk produk ini.' }}</p>
            </div>
        </div>

        <!-- Add to Cart Button -->
        <div class="d-flex justify-content-end mt-4">
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
            </form>
        </div>

        <!-- Related Products Section -->
        <div class="row mt-5">
            <h2 class="fw-semibold mb-4">Produk Terkait</h2>
            @if ($relatedProducts->count() > 0)
                <div class="row g-3">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="col-md-4 col-sm-6">
                            <div class="card shadow-sm">
                                @if ($relatedProduct->image)
                                    <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $relatedProduct->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                    <p class="card-text">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('shops.products.show', ['shop' => $relatedProduct->shop->slug, 'product' => $relatedProduct->slug]) }}" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">Tidak ada produk terkait.</p>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Optional: Add any custom JavaScript for additional interactions if necessary
    </script>
@endsection