@if (isset($rating))
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= round($rating))
            <i class="bi bi-star-fill {{ $size ?? '' }}"></i>
        @else
            <i class="bi bi-star {{ $size ?? '' }}"></i>
        @endif
    @endfor
@endif
