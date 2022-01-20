<nav class="ls-pagination">
@if ($paginator->hasPages())
    <ul role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <i class="fa fa-arrow-left"></i>
            </li>
        @else
            <li class="prev">
                <a wire:click="previousPage" rel="prev"
                        aria-label="@lang('pagination.previous')">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true">{{ $element }}</li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="current-page">{{ $page }}</a></li>
                    @else
                        <li class="d-none d-md-block">
                            <a wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next">
                <a wire:click="nextPage({{$paginator->lastPage()}})" rel="next"
                        aria-label="@lang('pagination.next')">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <i class="fa fa-arrow-right"></i>
            </li>
        @endif
    </ul>
@endif
</nav>
