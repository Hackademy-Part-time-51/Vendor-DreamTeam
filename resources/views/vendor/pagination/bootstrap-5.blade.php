@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="mt-1">
        <!-- Mobile Pagination -->
        <div class="d-flex justify-content-center d-sm-none mb-3">
            <ul class="pagination pagination-lg">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link border-0 bg-transparent text-blu">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link border-0 bg-transparent text-blu scalebig" 
                           href="{{ $paginator->previousPageUrl() }}">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                @endif

                <li class="page-item">
                    <span class="page-link border-0 bg-transparent text-blu">
                        {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
                    </span>
                </li>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link border-0 bg-transparent text-blu scalebig" 
                           href="{{ $paginator->nextPageUrl() }}">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link border-0 bg-transparent text-blu">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Desktop Pagination -->
        <div class="d-none d-sm-flex flex-column align-items-center">
            <!-- Results Info -->
            

            <!-- Pagination Links -->
            <ul class="pagination pagination-lg">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link border-0 bg-transparent text-blu">
                            <i class="bi bi-chevron-double-left"></i>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link border-0 bg-transparent text-blu scalebig" 
                           href="{{ $paginator->previousPageUrl() }}">
                            <i class="bi bi-chevron-double-left"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link border-0 bg-transparent text-blu">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <span class="page-link border-0 bg-blu text-white">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link border-0 bg-transparent text-blu scalebig" 
                                       href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link border-0 bg-transparent text-blu scalebig" 
                           href="{{ $paginator->nextPageUrl() }}">
                            <i class="bi bi-chevron-double-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link border-0 bg-transparent text-blu">
                            <i class="bi bi-chevron-double-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif

