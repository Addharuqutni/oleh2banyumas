<div class="product-card">
    <div class="product-img-container">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img">
        @else
            <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}" class="card-img">
        @endif
        
        @if($product->categories && $product->categories->count() > 0)
            <div class="category-badges">
                @foreach($product->categories->take(2) as $category)
                    <span class="badge bg-success">{{ $category->name }}</span>
                @endforeach
                @if($product->categories->count() > 2)
                    <span class="badge bg-success">+{{ $product->categories->count() - 2 }}</span>
                @endif
            </div>
        @endif
    </div>
    <div class="product-body">
        <h5 class="product-title">{{ $product->name }}</h5>
        <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        
        @if(isset($product->shop))
            <small class="d-block mb-2 text-muted">
                <i class="bi bi-shop"></i> {{ $product->shop->name }}
            </small>
        @endif
        
        <div class="product-action">
            <a href="{{ route('shops.products.show', ['shop' => $product->shop->slug, 'product' => $product->slug]) }}" class="btn-detail w-100 text-center">Detail Produk</a>
        </div>
    </div>
</div> 