@if (isset($rating))
    <div class="star-rating {{ $containerClass ?? '' }}">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= round($rating))
                <i class="bi bi-star-fill {{ $size ?? '' }}"></i>
            @else
                <i class="bi bi-star {{ $size ?? '' }}"></i>
            @endif
        @endfor
        
        @if(isset($showValue) && $showValue)
            <span class="rating-value {{ $valueClass ?? '' }}">{{ number_format($rating, 1) }}</span>
        @endif
        
        @if(isset($reviewCount))
            <span class="review-count {{ $countClass ?? '' }}">({{ $reviewCount }} ulasan)</span>
        @endif
    </div>
@endif
