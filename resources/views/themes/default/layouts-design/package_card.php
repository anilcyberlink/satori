<article class="group flex h-full min-w-0 flex-col overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-black/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl z-10" data-tour-card data-category="<?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?>" data-price="<?php echo (int) $tour['price']; ?>" data-name="<?php echo htmlspecialchars(strtolower($tour['name']), ENT_QUOTES, 'UTF-8'); ?>">
    <!-- IMAGE -->
    <a href="./package-details.php">
        <div class="relative h-[256px] w-full shrink-0 overflow-hidden">
            <img src="<?php echo htmlspecialchars($tour['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($tour['alt'], ENT_QUOTES, 'UTF-8'); ?>" width="800" height="500" <?php echo $index < 3 ? 'loading="eager"' : 'loading="lazy"'; ?> decoding="async" class="block h-full w-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-[#071c2d]/95 via-[#071c2d]/35 to-transparent" aria-hidden="true"></div>
            <span class="absolute left-3 top-4 rounded-full bg-[var(--text-primary)] px-3 py-1 text-xs font-bold uppercase tracking-wider text-white shadow-sm sm:left-4 sm:top-5 sm:px-4 sm:text-sm">8000M</span>
            <span class="absolute right-3 top-4 flex items-center gap-1.5 rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-[var(--teal-brand)] shadow-sm sm:right-4 sm:top-5 sm:px-3 sm:text-[16px]" aria-label="Rated 4 out of 5">
                <i class="fa-solid fa-star text-xs text-amber-500 sm:text-[14px]" aria-hidden="true"></i>
                4.0
            </span>
            <div class="absolute inset-x-3 bottom-3 sm:inset-x-4 sm:bottom-4">
                <h3 class="line-clamp-2 text-xl font-semibold uppercase leading-tight tracking-tight text-white sm:text-[23px] lg:text-[25px]"><?php echo htmlspecialchars($tour['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <!-- <span class="mt-1 inline-flex items-center text-sm font-normal uppercase tracking-wide text-white sm:text-[17px]"><?php echo htmlspecialchars($tour['height'], ENT_QUOTES, 'UTF-8'); ?></span> -->
            </div>
        </div>
    </a>
    <!-- CARD BODY -->
    <div class="flex flex-1 flex-col bg-white p-4 sm:p-5">
        <!-- META -->
        <div class="flex flex-nowrap justify-between gap-2 pb-2 text-sm font-normal text-black sm:gap-3 sm:text-base lg:text-[17px]">
            <div class="flex min-w-0 items-center gap-1.5 sm:gap-2">
                <i class="fa-solid fa-mountain shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                <span class="truncate"><?php echo htmlspecialchars($tour['height'], ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="flex min-w-0 items-center gap-1.5 sm:gap-2">
                <i class="fa-solid fa-clock shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                <span class="truncate"><?php echo htmlspecialchars($tour['duration'], ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="flex min-w-0 items-center gap-1.5 sm:gap-2">
                <i class="fa-solid fa-calendar-days shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                <span class="truncate"><?php echo htmlspecialchars(date('M Y', strtotime($tour['date'])), ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
        </div>
        <!-- FOOTER -->
        <div class="mt-auto flex w-full flex-row items-center justify-between gap-3 pt-2">
            <div class="min-w-0 flex-1">
                <div class="flex items-baseline gap-2 whitespace-nowrap">
                    <strong class="shrink-0 text-2xl font-bold leading-none text-[var(--text-primary)]">
                        $<?php echo number_format($tour['price']); ?>
                    </strong>
                    <span class="shrink-0 text-xs font-semibold text-[var(--teal-brand)]">per person</span>
                </div>
            </div>
            <a href="./package-details.php" class="shrink-0">
                <span class="btn-join-group">
                    <span>View Details</span>
                    <span>
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </span>
                </span>
            </a>
        </div>
    </div>
</article>