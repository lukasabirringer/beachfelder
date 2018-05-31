@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination__item pagination__item--disabled">
                <span class="pagination__text">vor</span>
            </li>
        @else
            <li class="pagination__item">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination__link">
                    vor
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pagination__item pagination__item--disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination__item pagination__item--active">
                            <span class="pagination__text pagination__text--active">{{ $page }}</span>
                        </li>
                    @else
                        <li class="pagination__item">
                            <a href="{{ $url }}" class="pagination__link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination__item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination__link">
                    weiter
                </a>
            </li>
        @else
            <li class="pagination__item pagination__item--disabled">
                <span class="pagination__text">weiter</span>
            </li>
        @endif
    </ul>
@endif
