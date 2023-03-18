@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                <span class="pagination-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-link" aria-label="{{ __('pagination.previous') }}">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true"><span class="pagination-link disabled">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page"><span class="pagination-link" aria-current="page">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="pagination-link" aria-label="{{ __('pagination.goto_page', ['page' => $page]) }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-link" aria-label="{{ __('pagination.next') }}">&rsaquo;</a>
            </li>
        @else
            <li aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                <span class="pagination-link disabled" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </nav>
@endif
