@extends('themes.default.common.master')
@section('title', $data->title)
@section('meta_keyword', $data->meta_key)
@section('meta_description', $data->meta_description)
@section('content')

    <main id="main-content" class="bg-white" aria-label="Nepal Travel and Adventure">
        <!-- 01. NEPAL HERO -->
        <section class="group relative h-[60vh] overflow-hidden sm:h-[70vh] lg:h-[80vh] no-print"
            aria-labelledby="package-title">
            <div class="swiper hero-image-swiper absolute inset-0 z-10 h-full w-full">
                <div class="swiper-wrapper h-full">
                    @forelse($data->multiBanners as $banner)
                        <div class="swiper-slide !h-full !w-full">
                            <img src="{{ asset('uploads/original/' . $banner->image) }}" alt="{{ $data->title }}"
                                width="1920" height="700" @if ($loop->first) fetchpriority="high" @endif
                                decoding="async" class="h-full w-full object-cover object-center">
                        </div>
                    @empty
                        <div class="swiper-slide !h-full !w-full">
                            <img src="{{ asset('uploads/original/' . $data->banner) }}" alt="{{ $data->title }}"
                                width="1920" height="700" fetchpriority="high" decoding="async"
                                class="h-full w-full object-cover object-center">
                        </div>
                    @endforelse
                </div>
            </div>
            <button type="button"
                class="hero-swiper-prev pointer-events-auto absolute left-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white opacity-100 transition-opacity duration-200 hover:bg-[#061d30]/90 sm:left-5 sm:opacity-0 sm:group-hover:opacity-100 md:left-8 lg:left-16"
                aria-label="Previous image">
                <i class="fa-solid fa-caret-left pointer-events-none text-xl"></i>
            </button>
            <button type="button"
                class="hero-swiper-next pointer-events-auto absolute right-3 top-1/2 z-50 flex h-9 w-9 -translate-y-1/2 cursor-pointer select-none items-center justify-center rounded-full bg-[#061d30] text-white opacity-100 transition-opacity duration-200 hover:bg-[#061d30]/90 sm:right-5 sm:opacity-0 sm:group-hover:opacity-100 md:right-8 lg:right-16"
                aria-label="Next image">
                <i class="fa-solid fa-caret-right pointer-events-none text-xl"></i>
            </button>

            <div class="absolute inset-x-0 bottom-0 z-30 px-4 pb-4 sm:px-8 sm:pb-5 lg:px-12 lg:pb-6 xl:px-16">
                <div class="mx-auto max-w-8xl">
                    <div class="mb-3 flex justify-end lg:mb-4">
                        <nav aria-label="Breadcrumb" class="w-fit max-w-full">
                            <ol
                                class="flex w-fit max-w-full shrink-0 items-center gap-2 overflow-hidden rounded-md bg-[var(--text-primary)] px-3 py-2 text-sm font-medium capitalize whitespace-nowrap text-white backdrop-blur-sm md:px-4 md:text-[16px] lg:text-[17px]">
                                <li class="shrink-0">
                                    <a href="{{ url('/') }}" class="transition-colors hover:text-[#39b8e8]">
                                        Home
                                    </a>
                                </li>
                                <li aria-hidden="true" class="shrink-0 text-white/50">
                                    /
                                </li>
                                <li class="min-w-0 truncate">
                                    <a class="transition-colors hover:text-[#39b8e8]">
                                        Trekking
                                    </a>
                                </li>
                                <li aria-hidden="true" class="shrink-0 text-white/50">
                                    /
                                </li>
                                <li class="min-w-0 truncate text-white" aria-current="page">
                                    {{ $data->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="relative z-20 w-full">
                        <div
                            class="relative w-full overflow-visible border border-white/60 bg-white/[0.84] p-0 md:px-6 md:py-4 shadow-[0_8px_30px_rgba(6,29,48,0.12)] backdrop-blur-[2px]">
                            <div
                                class="flex flex-col items-stretch justify-between gap-0 md:flex-row md:items-center md:gap-6">
                                <div
                                    class="lg:border-l-8 lg:border-[var(--teal-brand)] p-4 sm:p-5 md:p-0 md:px-4 md:pr-[245px]">
                                    <div class="w-full">
                                        <h1 id="package-title"
                                            class="min-w-0 text-[27px] font-semibold uppercase leading-[1.05] tracking-tight text-[#087da9] sm:text-[34px] lg:text-[40px]">
                                            {{ $data->title }}
                                        </h1>
                                    </div>

                                    <div class="mt-1 sm:mt-1.5">
                                        <p
                                            class="max-w-5xl text-xs font-medium leading-relaxed text-black sm:text-sm md:text-[17px]">
                                            {{ $data->sub_title }}
                                        </p>
                                    </div>
                                </div>

                                <a class="hero-explore-btn shrink-0 md:w-auto justify-center md:justify-start md:absolute md:right-[-0px] md:top-1/2 md:-translate-y-1/2"
                                    aria-label="{{ $data->title }}">
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

        <!-- 02. NEPAL OVERVIEW -->
        <section class="relative bg-white py-12 overflow-hidden" aria-labelledby="nepal-overview-title">
            <!-- Mountain Background -->
            <div class="absolute inset-x-0 top-0 bottom-0 scale-x-[-1] bg-[url('./assets/img/background/8000-mountain-bg.webp')] bg-cover bg-no-repeat bg-[position:center_-30px]"
                aria-hidden="true"></div>
            <div class="relative max-w-8xl items-end px-5 pb-7 sm:px-8 sm:pb-10 lg:px-12 xl:px-16">
                <div
                    class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] xl:grid-cols-[minmax(0,1fr)_350px] gap-10 lg:gap-14 items-start">
                    <!-- LEFT: OVERVIEW -->
                    <article class="relative overflow-visible">
                        <!-- Heading -->
                        <div class="relative z-10">
                            <div class="flex items-start gap-3 mb-5">
                                <span class="h-10 w-2 shrink-0 bg-[var(--teal-brand)]" aria-hidden="true"> </span>
                                <h2 id="nepal-overview-title"
                                    class="pt-1 font-bold uppercase leading-none tracking-tight text-[var(--text-primary)] text-3xl sm:text-4xl lg:text-[39px]">
                                    Overview
                                </h2>
                            </div>
                            <div
                                class="max-w-5xl space-y-4 text-justify text-sm leading-5 text-black font-normal sm:text-base sm:leading-7 lg:text-lg">
                                <p>
                                    {!! $data->content !!}
                                </p>
                            </div>
                        </div>
                    </article>

                    <!-- RIGHT: OTHER DESTINATIONS -->
                    <aside class="w-full overflow-hidden rounded-[10px] border border-slate-200 z-10 bg-[#E2E2E2]"
                        aria-labelledby="other-destinations-title">
                        <div class="rounded-t-sm bg-[var(--header)] px-4 py-3">
                            <h2 id="other-destinations-title"
                                class="text-center text-xl font-medium uppercase tracking-[0.08em] text-white">
                                OTHER {{ $data->activity_parent }}
                            </h2>
                        </div>
                        <nav aria-label="Other destinations" class="bg-[#E2E2E2]">
                            @foreach ($related as $row)
                                <a href="{{ route('trekking-list', $row->uri) }}" aria-current="page"
                                    class="group flex items-center justify-between border-b-2 border-slate-200 bg-white px-4 py-3 text-lg font-medium text-[var(--text-primary)] transition-all duration-200 hover:bg-[#f5f9fb] hover:text-[var(--teal-brand)]">
                                    <span class="flex items-center gap-2">
                                        <span class="flex h-4 w-4 items-center justify-center text-[var(--text-primary)]">
                                            <i class="fa-solid fa-caret-right text-sm" aria-hidden="true"></i>
                                        </span>
                                        {{ $row->title }}
                                    </span>
                                    <i class="fa-solid fa-chevron-right text-sm text-slate-300"></i>
                                </a>
                            @endforeach
                        </nav>
                    </aside>
                </div>
            </div>
        </section>
        <!-- 03. NEPAL ADVENTURE CATEGORIES -->
        <section class="relative overflow-hidden bg-[#D4E8F0]">
            <div class="pointer-events-none absolute -top-1 left-0 right-0 z-10 h-[10px] sm:h-[20px] lg:h-[30px]"
                aria-hidden="true">
                <img src="{{ asset('theme-assets/img/background/decorative-design.webp') }}"
                    class="absolute bottom-0 left-0 h-full w-full object-cover object-bottom">
            </div>
            <div class="mx-auto w-full max-w-8xl px-4 py-10 sm:px-6 sm:py-12 md:px-8 lg:px-12 lg:py-14 xl:px-16">
                <div class="my-8 flex flex-col gap-5 sm:my-10 md:flex-row md:items-end md:justify-between md:gap-6">
                    <div class="flex min-w-0 items-start gap-3 sm:gap-4">
                        <div class="min-w-0 border-l-8 border-[var(--teal-brand)] pl-3">
                            <h2
                                class="text-2xl font-black uppercase leading-tight tracking-tight text-[var(--region-dark)] sm:text-3xl md:text-4xl">
                                Packages</h2>
                            <p
                                class="max-w-2xl text-sm font-normal leading-relaxed text-black sm:text-base md:text-[17px]">
                                {{ $data->sub_title }}</p>
                        </div>
                    </div>
                    <div class="w-full sm:w-auto">
                        <label for="tour-sort" class="sr-only">Sort Everest Region tours</label>
                        <div class="relative w-full sm:w-40">
                            <select id="tour-sort" aria-label="Sort tours"
                                class="block h-11 w-full appearance-none rounded-full border-0 bg-white px-4 pr-10 text-sm font-semibold text-black shadow-sm outline-none focus:ring-2 focus:ring-[var(--figma-blue)]/20 sm:h-10 sm:text-base">
                                <option value="featured" {{ $sort == 'featured' ? 'selected' : '' }}>SORT BY</option>
                                <option value="price-low" {{ $sort == 'price-low' ? 'selected' : '' }}>Price: Low to High
                                </option>
                                <option value="price-high" {{ $sort == 'price-high' ? 'selected' : '' }}>Price: High to
                                    Low</option>
                                <option value="name" {{ $sort == 'name' ? 'selected' : '' }}>Name: A to Z</option>
                            </select>
                            <i class="fa-solid fa-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-sm text-[var(--teal-brand)]"
                                aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                @include('themes.default.layouts.trip-results', ['trips' => $trips])
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resultsContainer = document.getElementById('trip-results');
            const sortSelect = document.getElementById('tour-sort');

            if (!resultsContainer || !sortSelect) return;

            async function loadTrips(url, updateHistory = true) {
                resultsContainer.style.opacity = '0.5';
                resultsContainer.style.pointerEvents = 'none';

                try {
                    const response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) throw new Error('Failed to load trips');

                    const html = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newResults = doc.querySelector('#trip-results');

                    if (!newResults) throw new Error('Trip results not found');

                    resultsContainer.innerHTML = newResults.innerHTML;

                    if (updateHistory) {
                        window.history.pushState({}, '', url);
                    }

                    resultsContainer.style.opacity = '1';
                    resultsContainer.style.pointerEvents = 'auto';

                } catch (error) {
                    console.error(error);
                    resultsContainer.style.opacity = '1';
                    resultsContainer.style.pointerEvents = 'auto';
                }
            }

            // Sorting
            sortSelect.addEventListener('change', function() {
                const url = new URL(window.location.href);
                url.searchParams.set('sort', this.value);
                url.searchParams.delete('page');

                loadTrips(url.toString());
            });

            // Pagination (delegated event, works after AJAX replacement)
            resultsContainer.addEventListener('click', function(e) {
                const link = e.target.closest('nav[aria-label="pagination"] a');

                if (!link || !link.href) return;

                e.preventDefault();
                loadTrips(link.href);
            });

            // Browser Back / Forward
            window.addEventListener('popstate', function() {
                const url = new URL(window.location.href);
                const sort = url.searchParams.get('sort') || 'featured';

                sortSelect.value = sort;
                loadTrips(url.toString(), false);
            });
        });
    </script>


@stop
@section('schema')
    <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@type": "TouristTrip",
        "name": "{{ $data->title }}",
        "description": "{{ strip_tags($data->content) }}",
        "url": "{{ url()->current() }}",
        "provider": {
            "@type": "TravelAgency",
            "name": "Satori"
        }
        }
    </script>
@endsection
