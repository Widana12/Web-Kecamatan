@if ($paginator->hasPages())
    <div class="col-xxl-12">
        <div class="basic-pagination wow mt-30">
            <ul class="d-flex align-items-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="prev" aria-disabled="true">
                        <a href="#" class="link-btn link-prev text-muted" disabled="disabled">
                            Prev
                            <i class="arrow_left"></i>
                            <i class="arrow_left"></i>
                        </a>
                    </li>
                @else
                    <li class="prev">
                        <a href="{{ $paginator->previousPageUrl() }}" class="link-btn link-prev">
                            Prev
                            <i class="arrow_left"></i>
                            <i class="arrow_left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li aria-disabled="true" disabled="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active">
                                    <a href="#" disabled="disabled">
                                        <span>{{ $page }}</span>
                                    </a>
                                </li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="next">
                        <a href="{{ $paginator->nextPageUrl() }}" class="link-btn">
                            Next
                            <i class="arrow_right"></i>
                            <i class="arrow_right"></i>
                        </a>
                    </li>
                @else
                    <li class="next" aria-disabled="true">
                        <a href="#" class="link-btn text-muted" disabled="disabled">
                            Next
                            <i class="arrow_right"></i>
                            <i class="arrow_right"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif
