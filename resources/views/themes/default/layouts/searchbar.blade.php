<div id="search-modal" class="hidden fixed inset-0 z-[10001] flex items-center justify-center p-4 sm:p-6">
    <button id="search-close" type="button" class="absolute top-4 right-4 sm:top-6 sm:right-6 lg:top-8 lg:right-8 flex items-center justify-center w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-white/10 border border-white/20 text-white hover:bg-white hover:text-[var(--primary)] transition-all duration-300 hover:rotate-90 focus:outline-none focus:ring-2 focus:ring-white/50 z-10" aria-label="Close search">
        <i class="fa-solid fa-xmark text-lg sm:text-xl"></i>
    </button>
    <!-- Search Box -->
    <div class="satori-search-box w-full max-w-3xl">
        <form action="#" method="GET" class="satori-search-form w-full">
            <input type="text" id="search-input" name="q" class="satori-search-input w-full" aria-label="Search Satori Adventures">
            <button type="submit" class="satori-search-submit whitespace-nowrap">
                SEARCH
            </button>
        </form>
        <!-- Popular Search -->
        <div class="satori-popular-search">
            <p class="satori-popular-title">
                POPULAR SEARCH
            </p>
            <div class="satori-search-tags flex flex-wrap gap-2 sm:gap-3">
                <a href="#" class="satori-search-tag">EVEREST</a>
                <a href="#" class="satori-search-tag">MANASLU</a>
                <a href="#" class="satori-search-tag">LANGTANG</a>
            </div>
        </div>
    </div>
</div>