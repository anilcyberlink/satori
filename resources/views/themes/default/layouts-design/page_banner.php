<section class="relative h-[220px] sm:h-[260px] lg:h-[285px] overflow-hidden" aria-labelledby="about-page-title">
    <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=85" alt="Satori Adventures trekking team in the Himalayas" width="1920" height="600" fetchpriority="high" decoding="async" class="absolute inset-0 w-full h-full object-cover object-center">
    <div class="absolute inset-0 bg-gradient-to-t from-[#071c2d]/95 via-[#071c2d]/45 to-[#071c2d]/10" aria-hidden="true"></div>
    <div class="relative z-10 h-full max-w-8xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 flex items-end pb-6 sm:pb-8 lg:pb-10">
        <div class="w-full flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 sm:gap-6">
            <!-- Page Title & Description -->
            <div class="min-w-0 max-w-6xl">
                <h1 id="about-page-title" class="text-white text-2xl sm:text-3xl md:text-4xl lg:text-[54px] font-bold uppercase tracking-tight leading-none break-words"><?php echo $page_title ?></h1>
                <p class="mt-2 text-white text-xs sm:text-sm md:text-[15px] lg:text-[17px] font-semibold capitalize tracking-wide leading-snug break-words" style="color:white !important;"><?php echo $page_desc ?></p>
            </div>
            <!-- Breadcrumb -->
            <nav aria-label="Breadcrumb" class="flex shrink-0 items-center gap-2 bg-[var(--text-primary)] text-sm md:text-[16px] lg:text-[17px] capitalize font-medium text-white backdrop-blur-sm px-3 sm:px-4 py-2 rounded-md whitespace-nowrap max-w-fit overflow-hidden">
                <a href="index.php" class="transition-colors hover:text-white/80 shrink-0">
                    Home
                </a>
                <span class="shrink-0">/</span>
                <span class="hover:text-white/80 truncate">
                    <?php echo ucwords(strtolower($page_title)); ?>
                </span>
            </nav>
        </div>
    </div>
</section>