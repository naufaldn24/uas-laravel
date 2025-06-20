@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col items-center space-y-2 mt-8">

        {{-- Teks jumlah hasil --}}
        <div class="text-sm text-gray-500">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
        </div>

        {{-- Tombol pagination --}}
        <div class="flex justify-center">
            <div class="flex items-center space-x-1">
                {{-- Tombol Sebelumnya --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-2 text-sm text-gray-400 border border-gray-300 rounded-lg">‹</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-3 py-2 text-sm text-blue-600 border border-gray-300 rounded-lg hover:bg-blue-50 transition">
                        ‹
                    </a>
                @endif

                {{-- Nomor Halaman --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-4 py-2 text-sm text-gray-500">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span
                                    class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 border border-blue-600 rounded-lg shadow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-4 py-2 text-sm text-blue-600 border border-gray-300 rounded-lg hover:bg-blue-50 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Tombol Selanjutnya --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-3 py-2 text-sm text-blue-600 border border-gray-300 rounded-lg hover:bg-blue-50 transition">
                        ›
                    </a>
                @else
                    <span class="px-3 py-2 text-sm text-gray-400 border border-gray-300 rounded-lg">›</span>
                @endif
            </div>
        </div>
    </nav>
@endif