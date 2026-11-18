<div id="trip-results" class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-7 lg:grid-cols-3 lg:gap-8 xl:gap-10"
    data-tour-grid>
    @forelse($trips as $trip)
        <div
            class="group w-full min-w-0 overflow-hidden rounded-[10px] border border-slate-200 bg-white shadow-md transition-all duration-300 hover:shadow-xl">
            <a href="{{ route('trip.tripdetail', $trip->uri) }}" class="block">
                <div class="relative aspect-[1.78/1] w-full overflow-hidden">
                    <img src="{{ $trip->thumbnail ? asset('uploads/thumbnails/' . $trip->thumbnail) : asset('themes-assets/thumbnail.jpg') }}"
                        alt="{{ $trip->trip_title }}"
                        class="block h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
                <div class="space-y-[0.55cqw] p-[clamp(10px,1.7cqw,26px)]">
                    <h3
                        class="break-words text-[clamp(14px,8.3cqw,24px)] font-semibold uppercase leading-tight text-[var(--teal-brand)]">
                        {{ $trip->trip_title }}
                    </h3>
                    <div class="text-[clamp(11px,5.65cqw,17px)] font-semibold leading-[1.35] text-black">
                        <div class="flex min-w-0 items-center justify-between gap-[1.2cqw]">
                            <div class="flex min-w-0 flex-1 items-center gap-[0.8cqw]">
                                <span class="shrink-0 text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-mountain"></i>
                                </span>
                                <span class="min-w-0 break-words">{{ $trip->max_altitude }}m</span>
                            </div>
                            <div class="flex shrink-0 items-center gap-[0.2cqw] text-[clamp(10px,4.7cqw,14px)] text-amber-500"
                                aria-label="4 out of 5 stars">
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
                                <span class="whitespace-nowrap">{{ $trip->duration }} Days</span>
                            </div>
                            <div class="flex min-w-0 items-center gap-[0.35cqw] whitespace-nowrap">
                                <span
                                    class="font-bold text-[var(--primary-dark)] line-through decoration-[var(--text-red)]">$
                                    {{ $trip->starting_price }}</span>
                                <span>
                                    <span class="text-[var(--text-red)]">${{ $trip->price }}</span>
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
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="col-span-full w-full py-8 text-center">
            No trips available.
        </div>
    @endforelse
</div>

{!! $trips->links('themes.default.common.pagination') !!}
