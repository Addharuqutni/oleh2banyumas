@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">

            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">&lt;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
                </li>
            @endif

            {{-- Link Halaman --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Link Halaman Aktif --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link" style="background-color: #6c757d; border-color: #6c757d">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">&gt;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
