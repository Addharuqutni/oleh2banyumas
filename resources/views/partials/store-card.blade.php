<div class="store-card">
    <div class="card-img-container">
        @if ($shop->featured_image)
            <img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}" class="card-img">
        @else
            <img src="{{ asset('images/default-shop.jpg') }}" alt="{{ $shop->name }}" class="card-img">
        @endif
        
        @if(isset($selectedCategory) && $selectedCategory)
            <div class="category-badges">
                <span class="badge bg-success">{{ $selectedCategory->name }}</span>
            </div>
        @endif
    </div>
    <div class="card-content">
        <h5 class="card-title">{{ $shop->name }}</h5>
        <p class="card-address"><i class="bi bi-geo-alt-fill me-1 text-muted"></i>{{ $shop->address }}</p>
        
        @if(isset($selectedCategory) && $selectedCategory && isset($shop->products) && $shop->products->count() > 0)
            <div class="shop-products mb-3">
                <small class="text-muted d-block mb-1">Produk {{ $selectedCategory->name }}:</small>
                <div class="d-flex flex-wrap gap-1">
                    @foreach($shop->products->take(3) as $product)
                        <small class="badge bg-light text-dark">{{ $product->name }}</small>
                    @endforeach
                    @if($shop->products->count() > 3)
                        <small class="badge bg-light text-dark">+{{ $shop->products->count() - 3 }}</small>
                    @endif
                </div>
            </div>
        @endif
        
        <a href="{{ route('shops.detail', ['shop' => $shop]) }}" class="btn-detail w-100 text-center">Detail Toko</a>
    </div>
</div> 