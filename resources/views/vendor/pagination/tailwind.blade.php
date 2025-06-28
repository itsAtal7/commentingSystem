@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-4">
        <ul class="inline-flex items-center -space-x-px">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-3 py-2 ml-0 leading-tight text-gray-400 bg-white border border-gray-300 rounded-l">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l hover:bg-gray-100 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-3 py-2 leading-tight text-white bg-blue-600 border border-blue-600">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r hover:bg-gray-100 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <span class="px-3 py-2 leading-tight text-gray-400 bg-white border border-gray-300 rounded-r">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
