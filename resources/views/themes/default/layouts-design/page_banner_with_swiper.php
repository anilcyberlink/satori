<section class="group relative h-[60vh] overflow-hidden sm:h-[70vh] lg:h-[80vh] no-print" aria-labelledby="package-title">
    <div class="swiper hero-image-swiper absolute inset-0 z-10 h-full w-full">
        <div class="swiper-wrapper h-full">
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=85" alt="Everest Base Camp Trekking" width="1920" height="700" fetchpriority="high" decoding="async" class="h-full w-full object-cover object-center">
            </div>
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1920&q=85" alt="Himalayan trekking" width="1920" height="700" decoding="async" class="h-full w-full object-cover object-center">
            </div>
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1920&q=85" alt="Nepal Himalayas" width="1920" height="700" decoding="async" class="h-full w-full object-cover object-center">
            </div>
            <div class="swiper-slide !h-full !w-full">
                <img src="https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=1920&q=85" alt="Mountain trekking in Nepal" width="1920" height="700" decoding="async" class="h-full w-full object-cover object-center">
            </div>
        </div>
    </div>
    <button type="button" class="hero-swiper-prev pointer-events-auto absolute left-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white opacity-100 transition-opacity duration-200 hover:bg-[#061d30]/90 sm:left-5 sm:opacity-0 sm:group-hover:opacity-100 md:left-8 lg:left-16" aria-label="Previous image">
        <i class="fa-solid fa-caret-left pointer-events-none text-xl"></i>
    </button>
    <button type="button" class="hero-swiper-next pointer-events-auto absolute right-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white opacity-100 transition-opacity duration-200 hover:bg-[#061d30]/90 sm:right-5 sm:opacity-0 sm:group-hover:opacity-100 md:right-8 lg:right-16" aria-label="Next image">
        <i class="fa-solid fa-caret-right pointer-events-none text-xl"></i>
    </button>
    <div class="absolute inset-x-0 bottom-0 z-30 px-4 pb-4 sm:px-8 sm:pb-5 lg:px-12 lg:pb-6 xl:px-16">
        <div class="mx-auto max-w-8xl">
            <div class="mb-3 flex justify-end lg:mb-4">
                <nav aria-label="Breadcrumb" class="w-fit max-w-full">
                    <ol class="flex w-fit max-w-full shrink-0 items-center gap-2 overflow-hidden rounded-md bg-[var(--text-primary)] px-3 py-2 text-sm font-medium capitalize whitespace-nowrap text-white backdrop-blur-sm md:px-4 md:text-[16px] lg:text-[17px]">
                        <li class="shrink-0">
                            <a href="index.php" class="transition-colors hover:text-[#39b8e8]">
                                Home
                            </a>
                        </li>
                        <?php if (isset($nav1)) { ?>
                            <li aria-hidden="true" class="shrink-0 text-white/50">
                                /
                            </li>
                            <li class="min-w-0 truncate">
                                <a href="destination.php" class="transition-colors hover:text-[#39b8e8]">
                                    <?= ucwords(strtolower($nav1)); ?>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (isset($nav2)) { ?>
                            <li aria-hidden="true" class="shrink-0 text-white/50">
                                /
                            </li>
                            <li class="min-w-0 truncate text-white" aria-current="page">
                                <?= ucwords(strtolower($nav2)); ?>
                            </li>
                        <?php } ?>
                    </ol>
                </nav>
            </div>
            <div class="relative z-20 w-full">
                <div class="relative w-full overflow-visible border border-white/60 bg-white/[0.84] p-0 md:px-6 md:py-4 shadow-[0_8px_30px_rgba(6,29,48,0.12)] backdrop-blur-[2px]">
                    <div class="flex flex-col items-stretch justify-between gap-0 md:flex-row md:items-center md:gap-6">
                        <div class="lg:border-l-8 lg:border-[var(--teal-brand)] p-4 sm:p-5 md:p-0 md:px-4 md:pr-[245px]">
                            <div class="w-full">
                                <h1 id="package-title" class="min-w-0 text-[27px] font-semibold uppercase leading-[1.05] tracking-tight text-[#087da9] sm:text-[34px] lg:text-[40px]">
                                    <?= $page_title ?>
                                </h1>

                                <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                                    <div class="mt-2 flex items-center gap-2.5 sm:mt-2.5">
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
                            </div>

                            <?php if (isset($page_desc)) { ?>
                                <div class="mt-1 sm:mt-1.5">
                                    <p class="max-w-5xl text-xs font-medium leading-relaxed text-black sm:text-sm md:text-[17px]">
                                        <?= $page_desc ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>

                        <a href="./join-a-group.php" class="hero-explore-btn shrink-0 md:w-auto justify-center md:justify-start md:absolute md:right-[-0px] md:top-1/2 md:-translate-y-1/2" aria-label="Explore Mera Peak Climbing">
                            <span class="hero-explore-icon" aria-hidden="true">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                            <span>VIEW DETAILS</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>