<div id="reviewModal" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-[#06111c]/80 p-4 backdrop-blur-sm" aria-hidden="true">
    <div id="reviewModalContent" class="relative max-h-[92vh] w-full max-w-3xl rounded-xl bg-white shadow-2xl">
        <!-- CLOSE -->
        <button type="button" id="closeReviewModal" aria-label="Close review" class="absolute right-4 top-4 z-50 flex h-9 w-9 items-center justify-center rounded-full bg-white text-slate-500 shadow-md transition-all duration-300 hover:rotate-90 hover:bg-slate-100 hover:text-slate-800">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <!-- PREVIOUS REVIEW -->
        <button type="button" id="reviewModalPrev" aria-label="Previous review" class="review-modal-nav review-modal-prev absolute -left-5 top-1/2 z-50 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white text-slate-700 shadow-lg transition-all hover:bg-slate-100 hover:text-[var(--teal-brand)] disabled:cursor-not-allowed disabled:opacity-40">
            <i class="fa-solid fa-chevron-left text-sm"></i>
        </button>
        <!-- NEXT REVIEW -->
        <button type="button" id="reviewModalNext" aria-label="Next review" class="review-modal-nav review-modal-next absolute -right-5 top-1/2 z-50 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white text-slate-700 shadow-lg transition-all hover:bg-slate-100 hover:text-[var(--teal-brand)] disabled:cursor-not-allowed disabled:opacity-40">
            <i class="fa-solid fa-chevron-right text-sm"></i>
        </button>
        <!-- REVIEW SWIPER -->
        <div id="reviewModalSwiper" class="swiper h-full max-h-[92vh]">
            <div id="reviewModalSwiperWrapper" class="swiper-wrapper">
                <!-- Slides are generated dynamically -->
            </div>
        </div>
    </div>
</div>
<!-- REVIEW IMAGE LIGHTBOX -->
<div id="reviewImageLightbox" class="fixed inset-0 z-[10000] hidden items-center justify-center bg-[#06111c]/90 p-4 backdrop-blur-sm" aria-hidden="true">
    <!-- CLOSE -->
    <button type="button" id="closeReviewImageLightbox" aria-label="Close image" class="absolute right-4 top-4 z-30 flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-500 shadow-md transition-all duration-300 hover:rotate-90 hover:bg-slate-100 hover:text-slate-800">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <!-- PREVIOUS IMAGE -->
    <button type="button" id="reviewImagePrev" aria-label="Previous image" class="absolute left-3 top-1/2 z-30 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white text-slate-700 shadow-lg transition-all hover:bg-slate-100 disabled:cursor-not-allowed disabled:opacity-40 sm:left-6">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <!-- IMAGE -->
    <div id="reviewImageLightboxContent" class="relative flex max-h-[92vh] max-w-[92vw] items-center justify-center">
        <img id="reviewLightboxImage" src="" alt="" class="max-h-[92vh] max-w-[92vw] rounded-lg object-contain shadow-2xl">
    </div>
    <!-- NEXT IMAGE -->
    <button type="button" id="reviewImageNext" aria-label="Next image" class="absolute right-3 top-1/2 z-30 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white text-slate-700 shadow-lg transition-all hover:bg-slate-100 disabled:cursor-not-allowed disabled:opacity-40 sm:right-6">
        <i class="fa-solid fa-chevron-right"></i>
    </button>
    <!-- COUNTER -->
    <div id="reviewImageCounter" class="absolute bottom-5 left-1/2 z-30 -translate-x-1/2 rounded-full bg-black/60 px-4 py-2 text-sm font-medium text-white"></div>
</div>