<section class="group relative h-[60vh] overflow-hidden sm:h-[70vh] lg:h-[80vh] no-print" aria-labelledby="package-title">
    <div class="swiper hero-image-swiper absolute inset-0 z-10 h-full w-full">
        <div class="swiper-wrapper h-full">
            <!-- SLIDE 1 -->
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=85" alt="Everest Base Camp Trekking" width="1920" height="700" fetchpriority="high" decoding="async" class="h-full w-full object-cover object-center">
            </div>
            <!-- SLIDE 2 -->
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1920&q=85" alt="Himalayan trekking" width="1920" height="700" decoding="async" class="h-full w-full object-cover object-center">
            </div>
            <!-- SLIDE 3 -->
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1920&q=85" alt="Nepal Himalayas" width="1920" height="700" decoding="async" class="h-full w-full object-cover object-center">
            </div>
            <!-- SLIDE 4 -->
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=1920&q=85" alt="Mountain trekking in Nepal" width="1920" height="700" decoding="async" class="h-full w-full object-cover object-center">
            </div>
        </div>
    </div>
    <!-- PREVIOUS -->
    <!-- <button type="button" class="hero-swiper-prev pointer-events-auto absolute left-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white transition hover:bg-[#061d30]/90 sm:left-5 md:left-8 lg:left-16" aria-label="Previous image"> -->
       <button type="button" class="hero-swiper-prev pointer-events-auto absolute left-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white opacity-100 transition-opacity duration-200 hover:bg-[#061d30]/90 sm:left-5 sm:opacity-0 sm:group-hover:opacity-100 md:left-8 lg:left-16" aria-label="Previous image">
    <i class="fa-solid fa-caret-left pointer-events-none text-xl"></i>
    </button>
    <!-- NEXT -->
    <!-- <button type="button" class="hero-swiper-next pointer-events-auto absolute right-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white transition hover:bg-[#061d30]/90 sm:right-5 md:right-8 lg:right-16" aria-label="Next image"> -->
    <button type="button" class="hero-swiper-next pointer-events-auto absolute right-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white opacity-100 transition-opacity duration-200 hover:bg-[#061d30]/90 sm:right-5 sm:opacity-0 sm:group-hover:opacity-100 md:right-8 lg:right-16" aria-label="Next image">  
    <i class="fa-solid fa-caret-right pointer-events-none text-xl"></i>
    </button>
    <!-- HERO CONTENT PANEL -->
    <div class="relative z-20 mx-auto flex h-full max-w-8xl items-end px-4 pb-4 sm:px-8 sm:pb-5 lg:px-12 lg:pb-6 xl:px-16">
        <div class="relative w-full overflow-hidden border border-white/60 bg-white/[0.84] shadow-[0_8px_30px_rgba(6,29,48,0.12)] backdrop-blur-[2px]">
            <!-- BRAND ACCENT -->
            <div class="absolute inset-y-0 left-0 w-1 bg-[var(--teal-brand)]" aria-hidden="true"></div>
            <!-- CONTENT -->
            <div class="px-5 py-2 pl-6 sm:px-7 sm:py-3 sm:pl-8 lg:px-8 lg:py-4 lg:pl-9">
                <!-- TITLE -->
                <div class="flex w-full items-center gap-3 sm:gap-4">
                    <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                        <!-- <span class="hidden h-px w-12 shrink-0 bg-[#1d4168]/45 sm:block sm:w-16 lg:w-20" aria-hidden="true"></span> -->
                    <?php } ?>
                    <h1 id="package-title" class="min-w-0 text-[27px] font-semibold uppercase leading-[1.05] tracking-tight text-[#087da9] sm:text-[34px] lg:text-[40px]">
                        <?= $page_title ?>
                    </h1>
                    <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                        <!-- <span class="hidden h-px flex-1 bg-[#1d4168]/30 sm:block" aria-hidden="true"></span> -->
                    <?php } ?>
                </div>
                <!-- DESCRIPTION -->
                <?php if (isset($page_desc)) { ?>
                    <div class="mt-1 sm:mt-1.5">
                        <p class="text-xs sm:text-sm md:text-[17px] text-black font-medium leading-relaxed max-w-5xl">
                            <?= $page_desc ?>
                        </p>
                    </div>
                <?php } ?>
                <!-- META ROW -->
                <div class="mt-2 flex flex-col gap-3 border-t border-[#1d4168]/15 pt-2 sm:mt-2 sm:flex-row sm:items-center sm:justify-between sm:gap-5 sm:pt-2">
                    <!-- RATING -->
                    <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                        <div class="flex items-center gap-2.5">
                            <div class="flex shrink-0 items-center gap-0.5 text-amber-500" aria-label="5 star rating">
                                <i class="fa-solid fa-star text-sm sm:text-base"></i>
                                <i class="fa-solid fa-star text-sm sm:text-base"></i>
                                <i class="fa-solid fa-star text-sm sm:text-base"></i>
                                <i class="fa-solid fa-star text-sm sm:text-base"></i>
                                <i class="fa-solid fa-star text-sm sm:text-base"></i>
                            </div>
                            <span class="text-sm font-semibold tracking-wide text-[var(--text-primary)] sm:text-base">
                                1,789 Reviews
                            </span>
                        </div>
                    <?php } ?>
                    <!-- BREADCRUMB -->
                    <nav aria-label="Breadcrumb" class="w-fit">
                        <!-- <ol class="flex flex-wrap items-center gap-1.5 rounded-[3px] bg-[#1d4168] px-2.5 py-1 text-xs font-medium capitalize tracking-wide text-white sm:gap-2 sm:px-3 sm:text-sm"> -->
                            <ol class="flex shrink-0 items-center gap-2 bg-[var(--text-primary)] text-sm md:text-[16px] lg:text-[17px] capitalize font-medium text-white backdrop-blur-sm px-3 sm:px-4 py-2 rounded-md whitespace-nowrap max-w-fit overflow-hidden">
                            <li>
                                <a href="index.php" class="transition-colors hover:text-[#39b8e8]">Home</a>
                            </li>
                            <?php if (isset($nav1)) { ?>
                                <li aria-hidden="true" class="text-white/50">/</li>
                                <li>
                                    <a href="destination.php" class="transition-colors hover:text-[#39b8e8]">
                                        <?= ucwords(strtolower($nav1)); ?>
                                    </a>
                                </li>
                            <?php }
                            if (isset($nav2)) { ?>
                                <li aria-hidden="true" class="text-white/50">/</li>
                                <li class="text-white" aria-current="page">
                                    <?= ucwords(strtolower($nav2)); ?>
                                </li>
                            <?php } ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>