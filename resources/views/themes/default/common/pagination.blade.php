@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();

    if ($last <= 5) {
        $start = 1;
        $end = $last;
        $showLeftDots = false;
        $showRightDots = false;
    } elseif ($current <= 3) {
        $start = 1;
        $end = 3;
        $showLeftDots = false;
        $showRightDots = true;
    } elseif ($current >= $last - 2) {
        $start = $last - 3;
        $end = $last;
        $showLeftDots = true;
        $showRightDots = false;
    } else {
        $start = $current - 1;
        $end = $current + 1;
        $showLeftDots = true;
        $showRightDots = true;
    }
@endphp

@if ($paginator->hasPages())
    <nav class="flex items-center justify-center mt-8 gap-1" aria-label="pagination">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span
                class="w-6 h-8 rounded-xl bg-[#42A3DA]/40 text-white flex items-center justify-center text-sm cursor-not-allowed">
                <i class="fa-solid fa-angle-left" aria-hidden="true"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous page"
                class="w-6 h-8 rounded-xl bg-[#42A3DA] text-white flex items-center justify-center text-sm hover:bg-[var(--teal-brand)] transition-colors">
                <i class="fa-solid fa-angle-left" aria-hidden="true"></i>
            </a>
        @endif

        {{-- First Page --}}
        @if ($start > 1)
            <a href="{{ $paginator->url(1) }}"
                class="w-8 h-8 flex items-center justify-center rounded-lg text-[18px] font-semibold text-black hover:text-[#42A3DA] transition-colors">
                1
            </a>
        @endif

        {{-- Left Dots --}}
        @if ($showLeftDots)
            <span class="w-8 h-8 flex items-center justify-center text-gray-500 text-lg">...</span>
        @endif

        {{-- Page Numbers --}}
        @for ($i = $start; $i <= $end; $i++)
            <a href="{{ $paginator->url($i) }}" @if ($current == $i) aria-current="page" @endif
                class="w-8 h-8 flex items-center justify-center rounded-lg text-[18px] font-semibold transition-all
           {{ $current == $i ? 'bg-[#42A3DA] text-white shadow-sm' : 'text-black hover:text-[#42A3DA] hover:bg-white/60' }}">
                {{ $i }}
            </a>
        @endfor

        {{-- Right Dots --}}
        @if ($showRightDots)
            <span class="w-8 h-8 flex items-center justify-center text-gray-500 text-lg">...</span>
        @endif

        {{-- Last Page --}}
        @if ($end < $last)
            <a href="{{ $paginator->url($last) }}"
                class="w-8 h-8 flex items-center justify-center rounded-lg text-[18px] font-semibold text-black hover:text-[#42A3DA] transition-colors">
                {{ $last }}
            </a>
        @endif

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" aria-label="Next page"
                class="w-6 h-8 rounded-xl bg-[#42A3DA] text-white flex items-center justify-center text-sm hover:bg-[var(--teal-brand)] transition-colors">
                <i class="fa-solid fa-angle-right" aria-hidden="true"></i>
            </a>
        @else
            <span
                class="w-6 h-8 rounded-xl bg-[#42A3DA]/40 text-white flex items-center justify-center text-sm cursor-not-allowed">
                <i class="fa-solid fa-angle-right" aria-hidden="true"></i>
            </span>
        @endif

    </nav>
@endif
