<div id="globalGalleryModal" class="fixed inset-0 z-[99999] hidden items-center justify-center bg-[#06111c]/95 backdrop-blur-sm" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="globalGalleryTitle">
    <div id="globalGalleryContent" class="relative w-full h-full flex flex-col transform scale-95 opacity-0 transition-all duration-300">
        <!-- HEADER -->
        <div class="flex-shrink-0 h-[74px] bg-[#0b263d] border-b border-white/10 flex items-center justify-between px-4 sm:px-6">
            <!-- TITLE -->
            <div class="min-w-0 pr-4">
                <h2 id="globalGalleryTitle" class="text-white text-base sm:text-lg md:text-xl font-bold truncate">
                    Gallery
                </h2>
                <p id="globalGalleryCounter" class="text-white/60 text-xs sm:text-sm mt-0.5">
                    1 / 1
                </p>
            </div>
            <!-- CLOSE -->
            <button type="button" id="globalGalleryClose" class="flex-shrink-0 w-10 h-10 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white hover:text-[#0b263d] transition-all duration-300 hover:rotate-90" aria-label="Close gallery">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        <!-- IMAGE AREA -->
        <div class="relative flex-1 min-h-0 flex items-center justify-center p-4 sm:p-8">
            <!-- PREVIOUS -->
            <button type="button" id="globalGalleryPrev" class="absolute left-3 sm:left-6 md:left-10 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/10 hover:bg-white hover:text-[#0b263d] text-white backdrop-blur-md border border-white/20 flex items-center justify-center transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Previous image">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <!-- IMAGE -->
            <div class="w-full h-full flex items-center justify-center">
                <img id="globalGalleryImage" src="" alt="" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl select-none" draggable="false">
            </div>
            <!-- NEXT -->
            <button type="button" id="globalGalleryNext" class="absolute right-3 sm:right-6 md:right-10 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/10 hover:bg-white hover:text-[#0b263d] text-white backdrop-blur-md border border-white/20 flex items-center justify-center transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Next image">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>