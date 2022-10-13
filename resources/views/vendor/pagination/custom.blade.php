@if ($paginator->hasPages())
    <nav class="blog-navigation d-flex justify-content-center pb-50">
        <ul class="d-flex align-items-center get-bottom " style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled am-comon d-center" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="icofont-thin-right rotate-180 text-25 d-block"></i></span>
                </li>
            @else
                <li class="am-comon d-center">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="icofont-thin-right rotate-180 text-25 d-block"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="am-comon d-center disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="am-comon d-center active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="am-comon d-center"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="am-comon d-center ">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="icofont-thin-right text-25"></i></a>
                </li>
            @else
                <li class="am-comon d-center disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="icofont-thin-right text-25"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
