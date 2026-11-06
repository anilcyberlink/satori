<?php
$nav1 = $nav1 ?? '';
?>
<div class="group w-full min-w-0 overflow-hidden rounded-[10px] border border-slate-200 bg-white shadow-md transition-all duration-300 hover:shadow-xl">
    <a href="./8000-region.php" class="block">
        <div class="relative aspect-[1.78/1] w-full overflow-hidden">
            <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80" alt="Ama Dablam Expedition" class="block h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
        </div>
        <div class="space-y-[0.55cqw] p-[clamp(10px,1.7cqw,26px)]">
            <h3 class="break-words text-[clamp(14px,8.3cqw,24px)] font-semibold uppercase leading-tight text-[var(--teal-brand)]">
                AMA DABLAM EXPEDITION
            </h3>
            <div class="text-[clamp(11px,5.65cqw,17px)] font-semibold leading-[1.35] text-black">
                <div class="flex min-w-0 items-center justify-between gap-[1.2cqw]">
                    <div class="flex min-w-0 flex-1 items-center gap-[0.8cqw]">
                        <span class="shrink-0 text-[var(--teal-brand)]">
                            <i class="fa-solid fa-mountain"></i>
                        </span>
                        <span class="min-w-0 break-words">(6,812m / 22,349ft)</span>
                    </div>
                    <div class="flex shrink-0 items-center gap-[0.2cqw] text-[clamp(10px,4.7cqw,14px)] text-amber-500" aria-label="4 out of 5 stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="mt-[0.4cqw] flex min-w-0 items-center justify-between gap-[1.5cqw]">
                    <div class="flex shrink-0 items-center gap-[0.8cqw]">
                        <span class="shrink-0 text-[var(--teal-brand)]">
                            <i class="fa-solid fa-stopwatch"></i>
                        </span>
                        <span class="whitespace-nowrap">49 Days</span>
                    </div>
                    <div class="flex min-w-0 items-center gap-[0.35cqw] whitespace-nowrap">
                        <span class="font-bold text-[var(--primary-dark)] line-through decoration-[var(--text-red)]">$ 7500</span>
                        <span>
                            <span class="text-[var(--text-red)]">6500</span>
                            <span class="text-[var(--primary-dark)]"> per person</span>
                        </span>
                    </div>
                </div>
                <div class="mt-[0.4cqw] flex min-w-0 items-center justify-between gap-[1.5cqw]">
                    <div class="flex min-w-0 items-center gap-[0.8cqw]">
                        <span class="shrink-0 text-[var(--teal-brand)]">
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                        <span class="whitespace-nowrap">2027-03-18</span>
                    </div>
                    <?php
                    if ($nav1 !=  "8000ERS") {
                    ?>
                        <span class="w-fit max-w-full shrink-0 whitespace-nowrap rounded-[0.55cqw] bg-[var(--green)] px-[1.25cqw] py-[0.45cqw] text-center text-[clamp(9px,5cqw,15px)] font-normal leading-none text-white">
                            Confirmed: 4 | Remaining: 2
                        </span>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </a>
</div>