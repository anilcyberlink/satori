 <section class="relative h-[60vh] overflow-hidden sm:h-[70vh] lg:h-[80vh] no-print" aria-labelledby="package-title">
     <!-- <section class="relative h-[520px] min-h-[520px] overflow-hidden sm:h-[560px] sm:min-h-[560px] md:h-[600px] md:min-h-[600px] lg:h-[650px] lg:min-h-[650px] xl:h-[700px] xl:min-h-[700px]" -->
     <!-- aria-labelledby="package-title"> -->
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
     <button type="button" class="hero-swiper-prev pointer-events-auto absolute left-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white transition hover:bg-[#061d30]/90 sm:left-5 md:left-8 lg:left-16" aria-label="Previous image">
         <i class="fa-solid fa-caret-left pointer-events-none text-xl"></i>
     </button>
     <button type="button" class="hero-swiper-next pointer-events-auto absolute right-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white transition hover:bg-[#061d30]/90 sm:right-5 md:right-8 lg:right-16" aria-label="Next image">
         <i class="fa-solid fa-caret-right pointer-events-none text-xl"></i>
     </button>
     <div class="pointer-events-none absolute inset-0 z-10 bg-gradient-to-r from-[#061d30]/85 via-[#061d30]/50 to-[#061d30]/20" aria-hidden="true"></div>
     <div class="pointer-events-none absolute inset-x-0 bottom-0 z-10 h-40 bg-gradient-to-t from-[#061d30]/75 to-transparent" aria-hidden="true"></div>
     <div class="relative z-20 mx-auto flex h-full max-w-8xl items-end px-5 pb-7 sm:px-8 sm:pb-10 lg:px-12 xl:px-16">
         <div class="relative w-full">
             <div class="flex w-full items-center gap-3 sm:gap-4">
                 <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                     <span class="hidden h-px w-16 shrink-0 bg-white/80 sm:block sm:w-20 lg:w-24" aria-hidden="true"></span>
                 <?php } ?>
                 <h1 id="package-title" class="min-w-0 text-[30px] font-semibold uppercase leading-none tracking-tight text-white sm:shrink-0 sm:whitespace-nowrap sm:text-[38px] lg:text-[48px]">
                     <?= $page_title ?>
                 </h1>
                 <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                     <span class="hidden h-px flex-1 bg-white/80 sm:block" aria-hidden="true"></span>
                 <?php } ?>
             </div>
             <?php if (isset($page_desc)) { ?>
                 <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                     <div class="flex flex-wrap items-center gap-3">
                         <p class="mt-2 text-white text-xs sm:text-sm md:text-[15px] lg:text-[17px] font-semibold uppercase tracking-wide leading-snug break-words"><?php echo $page_desc ?></p>
                     </div>
                 <?php } ?>
                 <?php if (isset($nav2) && $nav2 == "PACKAGE") { ?>
                     <div class="mt-4 flex flex-col gap-3 sm:mt-3 sm:flex-row sm:items-end sm:justify-between sm:gap-5">
                         <div class="flex flex-wrap items-center gap-3">
                             <div class="flex shrink-0 items-center gap-1 text-amber-500" aria-label="5 star rating">
                                 <i class="fa-solid fa-star text-lg"></i>
                                 <i class="fa-solid fa-star text-lg"></i>
                                 <i class="fa-solid fa-star text-lg"></i>
                                 <i class="fa-solid fa-star text-lg"></i>
                                 <i class="fa-solid fa-star text-lg"></i>
                             </div>
                             <span class="text-[22px] font-semibold text-white">
                                 (1,789 Reviews)
                             </span>
                         </div>
                     <?php } ?>
                     <nav aria-label="Breadcrumb" class="w-fit rounded-[4px] bg-[var(--text-primary)]">
                         <ol class="flex flex-wrap items-center gap-2 px-3 py-1 text-lg font-medium capitalize tracking-wide text-white sm:text-xl">
                             <li>
                                 <a href="index.php" class="transition hover:text-white">Home</a>
                             </li>
                             <?php if (isset($nav1)) { ?>
                                 <li aria-hidden="true">/</li>
                                 <li>
                                     <a href="destination.php" class="transition hover:text-white"><?= ucwords(strtolower($nav1)); ?></a>
                                 </li>
                             <?php } ?>
                             <?php if (isset($nav2)) { ?>
                                 <li aria-hidden="true">/</li>
                                 <li class="text-white" aria-current="page"><?= ucwords(strtolower($nav2)); ?></li>
                             <?php } ?>
                         </ol>
                     </nav>
                     </div>
                 </div>
         </div>
     </div>
 </section>