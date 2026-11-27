@extends('themes.default.common.master')
@section('title', $data->meta_title ? $data->meta_title : $data->trip_title)
@section('meta_keyword', $data->meta_key)
@section('meta_description', $data->meta_description)
@section('thumbnail', url('uploads/thumbnails/'.$data->thumbnail))
@section('content')

<main id="main-content" class="bg-white">
    <div id="package-print-header" class="print-only">
        <div class="print-header-top">
            <div class="print-logo-box">
                <img src="assets/img/logo/logo.webp" alt="SATORI ADVENTURES" class="print-logo">
                <div class="print-company-info">
                    <strong>SATORI ADVENTURES PVT. LTD.</strong>
                    <span>P. O. Box-21378, Naya Bazaar, Kathmandu, Nepal</span>
                    <span>Govt. Regd. No: 140946/072/073 | Tourism Lic. No: 2043</span>
                    <span>Tel: +977-1-4965127, +977-1-4951250 | info@satoriadventure.com</span>
                </div>
            </div>

            <div class="print-header-meta">
                <div class="print-header-date">
                    <span class="print-date-label">Date: </span>
                    <span id="print-date"><?= date('M d, Y') ?></span>
                </div>
                <div class="print-header-web">
                    <span>www.satori-adventures.com</span>
                </div>
            </div>
        </div>

        <div class="print-header-line"></div>
        <div class="print-package-heading">
            <h1 id="print-package-title">EVEREST BASE CAMP TREKKING</h1>
            <p>Official Package Information & Itinerary</p>
        </div>
    </div>
    <!-- HERO -->
    {{-- @include('themes.default.layouts.page_banner_with_swiper') --}}

    <!-- PACKAGE NAVIGATION -->
    <div id="package-navigation-placeholder" class="hidden h-11" aria-hidden="true">
    </div>
    <nav id="package-navigation" class="relative z-30 border-b border-slate-200 bg-[#06243a] shadow-md" aria-label="Package sections">
        <div class="mx-auto max-w-8xl overflow-x-auto px-5 sm:px-8 lg:px-12 xl:px-16">
            <div class="flex min-w-max items-center">
                <a href="#trip-facts" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-list-check">
                    </i>
                    TRIP FACTS
                </a>
                <a href="#overview" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-mountain">
                    </i>
                    OVERVIEW
                </a>
                <a href="#route" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-map">
                    </i>
                    MAP
                </a>
                <a href="#itinerary" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-list">
                    </i>
                    ITINERARY
                </a>
                <a href="#costs" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-wallet">
                    </i>
                    COSTS
                </a>
                <a href="#gallery" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-image">
                    </i>
                    GALLERY
                </a>
                <a href="#departure" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-plane-departure"></i>
                    DEPARTURE DATE
                </a>
                <a href="#faq" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-circle-question">
                    </i>
                    FAQ
                </a>
                <a href="#reviews" class="package-nav-link flex h-11 items-center gap-2 border-b-2 border-transparent px-4 text-lg font-regular uppercase tracking-wide text-white transition hover:bg-white/10 hover:border-[var(--teal-border)] sm:px-4 sm:text-[19px]">
                    <i class="fa-solid fa-star"></i>
                    REVIEW
                </a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="package-print-content mx-auto max-w-8xl px-5 py-8 sm:px-8 sm:py-10 lg:px-12 xl:px-16">
        <div class="grid grid-cols-1 items-start gap-10 lg:grid-cols-[minmax(0,1fr)_381px] xl:grid-cols-[minmax(0,1fr)_400px]">
            <!-- LEFT CONTENT -->
            <div class="min-w-0">

                <!-- INTRODUCTION QUOTE -->
                <div class="relative min-h-[174px] overflow-hidden rounded-lg bg-[var(--text-primary)] px-6 py-5 shadow-[0_12px_6px_-3px_rgba(0,111,162,0.35)] sm:px-8 sm:py-6">
                    <!-- Left image -->
                    <img src="{{asset('theme-assets/img/background/package-details-quote.webp')}}" alt="" aria-hidden="true" class="absolute left-0 top-1/2 -translate-y-1/2 -scale-x-100 -scale-y-100 object-cover">
                    <!-- Right image -->
                    <img src="{{asset('theme-assets/img/background/package-details-quote.webp')}}" alt="" aria-hidden="true" class="absolute right-1 top-1/2 -translate-y-1/2 object-cover sm:right-1">
                    <!-- Quote icon -->
                    <div class="absolute right-3 top-3 text-white sm:right-5 sm:top-4" aria-hidden="true">
                        <i class="fa-solid fa-quote-right text-3xl sm:text-4xl"></i>
                    </div>
                    <!-- Quote text -->
                    <p class="absolute left-4 top-1/2 max-w-4xl -translate-y-1/2 pr-8 text-left text-sm font-medium leading-6 text-white sm:left-6 sm:pr-10 sm:text-lg sm:leading-7 lg:left-8 lg:pr-12">
                        {{$data->sub_title}}
                    </p>
                </div>

                <!-- TRIP FACTS -->
                <section id="trip-facts" class="relative scroll-mt-20 overflow-hidden pt-8" aria-labelledby="trip-facts-title">
                    <!-- Background Image -->
                    <div class="absolute inset-x-0 top-16 bottom-0 z-0 bg-[url('{{asset("theme-assets/img/background/mountain-bg.webp")}}')]] bg-auto sm:bg-cover bg-center bg-no-repeat" aria-hidden="true"></div>
                    <!-- Optional dark/white overlay for better text readability -->
                    <div class="absolute inset-0 z-0 bg-white/10" aria-hidden="true"></div>
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Heading -->
                        <div class="mb-5 flex items-center gap-3">
                            <span class="h-7 w-2 shrink-0 bg-[var(--text-primary)] sm:h-8" aria-hidden="true"></span>
                            <h2 id="trip-facts-title" class="shrink-0 text-3xl font-bold uppercase leading-none tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                                TRIP FACTS
                            </h2>
                            <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center text-[var(--text-primary)]" aria-hidden="true">
                                <i class="fa-solid fa-mountain text-[22px]"></i>
                            </span>
                        </div>

                        <!-- Trip Facts -->
                        <div class="grid grid-cols-2 gap-x-6 gap-y-5 sm:grid-cols-3 lg:grid-cols-3">
                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-location-dot text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Location</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->location }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-gauge-simple-high text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Grade</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ grade_message_trek($data->trip_grade)}}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-mountain text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Max Elevation</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->max_altitude }}M</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-calendar-days text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Starts At</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->start_date }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-location-dot text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Ends At</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->end_date }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-route text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Climbing Route</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->route }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-utensils text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Meals</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->meals }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-clock text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Trip Length</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->duration }} Days</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-people-group text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Culture</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->culture }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-person-hiking text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Activity</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->walking_per_day }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-people-group text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Group Size</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->group_size }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="flex shrink-0 items-center justify-center text-[var(--teal-brand)]">
                                    <i class="fa-solid fa-plane text-3xl sm:text-4xl"></i>
                                </span>
                                <div class="min-w-0">
                                    <h3 class="text-base font-bold capitalize tracking-wide text-[var(--teal-brand)] sm:text-[17px]">Transportation</h3>
                                    <p class="mt-0.5 text-base font-semibold capitalize text-[#535353] sm:text-[17px]">{{ $data->peak_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="block my-4 overflow-hidden rounded-[6px] border border-slate-200 bg-white shadow-sm sm:hidden no-print">
                    <!-- Header -->
                    <div class="flex items-center gap-3 bg-[var(--figma-blue)] px-4 py-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-white/15 text-white">
                            <i class="fa-solid fa-person-hiking text-lg"></i>
                        </span>

                        <h2 class="text-lg font-medium uppercase tracking-[0.08em] text-white sm:text-xl">
                            LATEST UPCOMING DEPARTURE
                        </h2>
                    </div>
                    <!-- Content -->
                    <div class="bg-[#eef5f7] px-4 py-3">
                        <div class="flex items-start justify-between gap-4">
                            <!-- Price -->
                            <div>
                                <p class="text-base font-bold uppercase leading-tight text-[#111] sm:text-lg">
                                    STARTING PRICE
                                </p>
                                <div class="mt-0.5 flex items-baseline gap-2">
                                    <strong class="text-2xl font-bold leading-none text-[var(--teal-brand)] sm:text-[26px]">
                                        US $37500
                                    </strong>
                                    <span class="text-xs font-bold uppercase text-[#575757] sm:text-sm">
                                        PER PERSON
                                    </span>
                                </div>
                            </div>
                            <!-- Duration -->
                            <div class="flex flex-col items-end justify-end self-end">
                                <span class="mb-1 flex h-5 w-5 items-center justify-center text-[#17354a]">
                                    <i class="fa-solid fa-square-check text-base"></i>
                                </span>
                                <span class="text-sm font-bold uppercase leading-none text-[#111] sm:text-base">
                                    44 DAYS
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="grid grid-cols-2 gap-2 px-0 pt-2 no-print">
                        <a href="book-your-trip.php" class="inline-flex h-11 items-center justify-center rounded-[6px] bg-[#06243a] text-sm font-medium uppercase text-white transition-colors duration-300 hover:bg-[var(--figma-blue)] sm:text-base">
                            BOOK NOW
                        </a>
                        <a href="contact.php" class="inline-flex h-11 items-center justify-center rounded-[6px] bg-[var(--teal-brand)] text-sm font-medium uppercase text-white transition-colors duration-300 hover:bg-[var(--figma-blue)] sm:text-base">
                            MAKE AN INQUIRY
                        </a>
                    </div>
                </section>

                <!-- OVERVIEW -->
                <section id="overview" class="scroll-mt-2 pt-9" aria-labelledby="overview-title">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="h-8 w-2 shrink-0 bg-[var(--text-primary)]" aria-hidden="true">
                        </span>
                        <h2 id="overview-title" class="shrink-0 text-3xl font-bold uppercase leading-none tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                            OVERVIEW
                        </h2>
                        <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center text-[var(--text-primary)]" aria-hidden="true">
                            <i class="fa-solid fa-mountain text-[22px]"></i>
                        </span>
                    </div>
                    <article class="rounded-[5px] bg-[#F2F8FA] p-5 sm:p-6">
                        <!-- Visible content -->
                        <div class="space-y-4">
                            <p class="text-base font-regular text-justify text-black sm:text-[17px]">
                                {!! $data->trip_content !!}
                        </div>
                        <!-- Hidden content -->
                        <div id="overview-more-content" class="grid grid-rows-[0fr] opacity-0 transition-all duration-500 ease-in-out">
                            <div class="min-h-0 overflow-hidden">
                                <div class="space-y-4 pt-4">
                                    <p class="text-base font-regular text-justify text-black sm:text-[17px]">
                                        Satori Adventures knows the surefire way to charge you with overwhelming emotions when being in Nepal. How do you feel about trekking in the Himalayas and facing the challenge of human endurance? We offer a trip that will remember for its unique magnificence, dazzling perspectives, and extreme thrill of your abilities.
                                    </p>
                                    <p class="text-base font-regular text-justify text-black sm:text-[17px]">
                                        Our Everest Expedition is carefully designed to provide climbers with the necessary preparation, acclimatization and expedition support throughout the journey. Our experienced team works closely with every climber to ensure that the expedition remains organized, safe and professionally managed.
                                    </p>
                                    <p class="text-base font-regular text-justify text-black sm:text-[17px]">
                                        From Kathmandu to the Everest Base Camp and onward to the summit, every stage of the expedition is planned with attention to logistics, accommodation, transportation, climbing support and the changing conditions of the Himalayan environment.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Read More Button -->
                        <button type="button" id="overview-read-more" class="mt-5 flex h-9 w-full items-center justify-center gap-2 rounded-lg border border-[var(--teal-brand)] bg-[#d7ebf3] text-lg font-normal uppercase tracking-wide text-[var(--text-primary)] transition hover:bg-[#c4e3ed] focus:outline-none focus:ring-2 focus:ring-[var(--teal-brand)]/30 sm:text-xl" aria-expanded="false" aria-controls="overview-more-content">
                            <span id="overview-read-more-text">
                                READ MORE
                            </span>
                            <i id="overview-read-more-icon" class="fa-solid fa-chevron-down text-xl transition-transform duration-300" aria-hidden="true">
                            </i>
                        </button>
                    </article>
                </section>

                <!-- ROUTE -->
                <section id="route" class="scroll-mt-20 pt-9" aria-labelledby="route-title">
                    <div class="mb-5 flex items-center gap-3">
                        <span class="h-7 w-2 shrink-0 bg-[var(--text-primary)]" aria-hidden="true"></span>
                        <h2 id="route-title" class="inline-flex shrink-0 text-3xl font-bold uppercase leading-none tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                            ROUTE
                            <span class="hidden lg:block xl:block">
                                &nbsp;YOU SEE ON THE TRIP
                            </span>
                        </h2>
                        <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center text-[var(--text-primary)]" aria-hidden="true">
                            <i class="fa-solid fa-mountain text-[22px]"></i>
                        </span>
                    </div>
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <figure>
                            <div class="overflow-hidden rounded-[4px] border border-slate-200 bg-white">
                                <a href="{{$data->trip_chart ? asset('uploads/original/' . $data->trip_chart) : asset('theme-assets/img/packages/everest-route-map.webp')}}" target="_blank">
                                    <img src="{{asset('theme-assets/img/packages/everest-route-map.webp')}}" alt="{{ $data->tripmap_alt }}" width="1000" height="600" loading="lazy" decoding="async" class="h-[220px] w-full object-cover sm:h-[242px]">
                                </a>
                            </div>
                            <figcaption class="mt-2 text-center text-3xl font-bold uppercase text-[var(--teal-brand)]">
                                ROUTE MAP
                            </figcaption>
                        </figure>
                        <figure>
                            <div class="overflow-hidden rounded-[4px] border border-slate-200 bg-white">
                                <a href="{{$data->trip_altitude_map ? asset('uploads/original/' . $data->trip_altitude_map) : asset('theme-assets/img/packages/everest-altitude-map.webp')}}" target="_blank">
                                    <img src="{{asset('theme-assets/img/packages/everest-altitude-map.webp')}}" alt="{{ $data->tripmap_alt }}" width="1000" height="600" loading="lazy" decoding="async" class="h-[220px] w-full object-contain sm:h-[242px]">
                                </a>
                            </div>
                            <figcaption class="mt-2 text-center text-3xl font-bold uppercase text-[var(--teal-brand)]">
                                ALTITUDE MAP
                            </figcaption>
                        </figure>
                    </div>
                </section>

                <div class="print-itinerary-page-break" aria-hidden="true"></div>

                <!-- ITINERARY -->
                <section id="itinerary" class="scroll-mt-20 pt-9" aria-labelledby="itinerary-title">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="h-7 w-2 shrink-0 bg-[var(--text-primary)]" aria-hidden="true"></span>
                        <h2 id="itinerary-title" class="shrink-0 text-3xl font-bold capitalize leading-none tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                            ITINERARY
                        </h2>
                        <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
                        <!-- EXPAND ALL -->
                        <button type="button" id="itinerary-expand-all" class="inline-flex h-9 shrink-0 items-center justify-center rounded-[9px] bg-[var(--text-primary)] px-4 text-sm font-semibold text-white transition-all duration-200 hover:bg-[var(--teal-brand)] focus:outline-none focus:ring-2 focus:ring-[var(--teal-brand)] focus:ring-offset-2 sm:px-5 no-print" aria-expanded="false" aria-label="Expand all itinerary days">
                            <span id="itinerary-expand-all-text">+ Expand All</span>
                        </button>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center text-[var(--text-primary)]" aria-hidden="true">
                            <i class="fa-solid fa-mountain text-[22px]"></i>
                        </span>
                    </div>

                    <!-- ITINERARY & SEASON SELECTORS -->
                    <div class="mb-4 flex w-full flex-col gap-4 lg:flex-row lg:items-center lg:justify-between lg:gap-6">
                        <!-- ITINERARY TABS -->
                        <div id="itinerary-tabs" class="flex w-full min-w-0 items-center gap-1.5 overflow-x-auto rounded-[10px] bg-[#2D628F] p-2 sm:w-fit sm:gap-2 sm:px-[10px] sm:py-[10px]" role="tablist" aria-label="Itinerary versions"></div>
                        <!-- SEASON TABS -->
                        <div class="flex w-full shrink-0 items-center justify-center gap-2 sm:justify-start sm:gap-3 lg:w-fit" role="tablist" aria-label="Season selection">
                            <!-- SUMMER -->
                            <button type="button" id="season-tab-summer" class="season-tab flex h-[62px] w-[77px] shrink-0 flex-col items-center justify-center rounded-[9px] bg-[#2D628F] text-white transition-all duration-200" data-season="summer" role="tab" aria-selected="true">
                                <svg class="mb-1 h-[24px] w-[24px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <circle cx="12" cy="12" r="4.5" fill="currentColor" />
                                    <path d="M12 2V5M12 19V22M22 12H19M5 12H2M19.07 4.93L16.95 7.05M7.05 16.95L4.93 19.07M19.07 19.07L16.95 16.95M7.05 7.05L4.93 4.93" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                                <span class="text-[11px] font-medium uppercase leading-none tracking-wide">
                                    SUMMER
                                </span>
                            </button>

                            <!-- WINTER -->
                            <button type="button" id="season-tab-winter" class="season-tab flex h-[62px] w-[77px] shrink-0 flex-col items-center justify-center rounded-[9px] bg-[#F1F7FA] text-[var(--figma-blue)] transition-all duration-200" data-season="winter" role="tab" aria-selected="false">
                                <i class="fa-solid fa-snowflake text-[24px]"></i>
                                <span class="text-[11px] font-medium uppercase leading-none tracking-wide">
                                    WINTER
                                </span>
                            </button>

                            <!-- AUTUMN -->
                            <button type="button" id="season-tab-autumn" class="season-tab flex h-[62px] w-[77px] shrink-0 flex-col items-center justify-center rounded-[9px] bg-[#F1F7FA] text-[var(--figma-blue)] transition-all duration-200" data-season="autumn" role="tab" aria-selected="false">
                                <i class="fa-solid fa-leaf mb-1 text-[23px]" aria-hidden="true"></i>
                                <span class="text-[11px] font-medium uppercase leading-none tracking-wide">
                                    AUTUMN
                                </span>
                            </button>
                        </div>
                    </div>

                    <?php
                    /* ITINERARY DATA
                    | Structure:
                    | season
                    |   -> itinerary number
                    |       -> itinerary days */
                    $itineraries = [
                        /* SUMMER- 3 itineraries */
                        'summer' => [
                            1 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '20 March',
                                    'title' => 'Arrival In Kathmandu Airport And Transfer To Hotel',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '21 March',
                                    'title' => 'Preparation And Briefing In Kathmandu',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '22 March',
                                    'title' => 'Drive To Syabrubesi (1460m/4790ft, 9hrs)',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '23 March',
                                    'title' => 'Drive To Chinese Base Camp (4800m/15750ft, 2hrs)',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '24 March',
                                    'title' => 'Trek To Middle Camp (5900m/17388ft, 6hrs)',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                                [
                                    'day' => 'Day 06',
                                    'date' => '25 March',
                                    'title' => 'Trek To Advance Base Camp (5700m/18700ft, 7hrs)',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                                [
                                    'day' => 'Day 07',
                                    'date' => '26 March',
                                    'title' => 'Free Day And Farewell Dinner In Kathmandu',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2000m / 20ft · 6 km / 2-3 hrs'
                                ],
                            ],

                            2 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '20 March',
                                    'title' => 'Arrival In Kathmandu And Transfer To Hotel',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Airport Transfer'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '21 March',
                                    'title' => 'Kathmandu Sightseeing And Expedition Preparation',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast · Hotel · 1400m · Sightseeing / Briefing'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '22 March',
                                    'title' => 'Fly From Kathmandu To Lukla And Trek To Phakding',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2610m · 8 km / 3-4 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '23 March',
                                    'title' => 'Trek From Phakding To Namche Bazaar',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 3440m · 10-12 km / 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '24 March',
                                    'title' => 'Acclimatization Day At Namche Bazaar',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 3440m · Acclimatization'
                                ],
                                [
                                    'day' => 'Day 06',
                                    'date' => '25 March',
                                    'title' => 'Trek From Namche Bazaar To Tengboche',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 3860m · 10 km / 5 hrs'
                                ],
                                [
                                    'day' => 'Day 07',
                                    'date' => '26 March',
                                    'title' => 'Trek From Tengboche To Dingboche',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 4410m · 11 km / 5-6 hrs'
                                ],
                            ],

                            3 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '20 March',
                                    'title' => 'Arrival In Kathmandu And Expedition Orientation',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Orientation'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '21 March',
                                    'title' => 'Expedition Briefing And Equipment Preparation',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast · Hotel · 1400m · Equipment Check'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '22 March',
                                    'title' => 'Drive From Kathmandu To Base Camp',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2600m · 6-7 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '23 March',
                                    'title' => 'Trek To High Camp',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 4500m · 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '24 March',
                                    'title' => 'Acclimatization And Climbing Practice',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5000m · Training'
                                ],
                                [
                                    'day' => 'Day 06',
                                    'date' => '25 March',
                                    'title' => 'Summit Preparation And Final Equipment Check',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5500m · Preparation'
                                ],
                                [
                                    'day' => 'Day 07',
                                    'date' => '26 March',
                                    'title' => 'Summit Attempt And Return To Camp',
                                    'description' => 'Upon arrival at Tribhuvan International Airport in Kathmandu, you will be welcomed by our representative and transferred to your hotel. Kathmandu, the capital city of Nepal, sits at an elevation of approximately 1,350 meters (4,429 feet) above sea level. After checking in, you can rest and relax at the hotel or explore the nearby surroundings at your own pace. The day is kept easy to allow you to recover from your journey and prepare for the upcoming adventure.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · High Altitude · Summit Day'
                                ],
                            ],
                        ],

                        /* WINTER- 2 itineraries */
                        'winter' => [
                            1 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '10 December',
                                    'title' => 'Winter Arrival In Kathmandu And Hotel Transfer',
                                    'description' => 'Winter season arrival and transfer to hotel.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Airport Transfer'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '11 December',
                                    'title' => 'Winter Expedition Preparation And Briefing',
                                    'description' => 'Expedition briefing and winter equipment preparation.',
                                    'details' => 'Breakfast · Hotel · 1400m · Equipment Check'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '12 December',
                                    'title' => 'Drive To Winter Base Camp',
                                    'description' => 'Drive toward the base camp and prepare for high altitude.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2600m · 6-7 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '13 December',
                                    'title' => 'Trek To High Camp',
                                    'description' => 'Continue trekking toward the high camp.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 4500m · 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '14 December',
                                    'title' => 'Winter Acclimatization Day',
                                    'description' => 'Acclimatization and preparation for colder conditions.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5000m · Acclimatization'
                                ],
                                [
                                    'day' => 'Day 06',
                                    'date' => '15 December',
                                    'title' => 'Winter Summit Preparation',
                                    'description' => 'Final preparation before the summit attempt.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5500m · Preparation'
                                ],
                            ],

                            2 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '10 December',
                                    'title' => 'Winter Arrival And Expedition Orientation',
                                    'description' => 'Arrival in Kathmandu and winter expedition orientation.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Orientation'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '11 December',
                                    'title' => 'Equipment Preparation And Safety Briefing',
                                    'description' => 'Winter equipment inspection and safety briefing.',
                                    'details' => 'Breakfast · Hotel · 1400m · Equipment Check'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '12 December',
                                    'title' => 'Journey To Base Camp',
                                    'description' => 'Travel toward the winter base camp.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2600m · 6-7 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '13 December',
                                    'title' => 'Trek To High Camp',
                                    'description' => 'Trek through winter terrain toward high camp.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 4500m · 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '14 December',
                                    'title' => 'Acclimatization And Winter Climbing Practice',
                                    'description' => 'Acclimatization and climbing practice.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5000m · Training'
                                ],
                            ],
                        ],

                        /* AUTUMN - 3 itineraries - Replace these with your actual Autumn plans. */
                        'autumn' => [
                            1 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '15 September',
                                    'title' => 'Arrival In Kathmandu And Autumn Expedition Briefing',
                                    'description' => 'Arrival in Kathmandu and transfer to hotel.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Orientation'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '16 September',
                                    'title' => 'Expedition Preparation And Equipment Check',
                                    'description' => 'Prepare equipment and complete expedition briefing.',
                                    'details' => 'Breakfast · Hotel · 1400m · Equipment Check'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '17 September',
                                    'title' => 'Drive To Base Camp',
                                    'description' => 'Drive toward the autumn base camp.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2600m · 6-7 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '18 September',
                                    'title' => 'Trek To High Camp',
                                    'description' => 'Trek toward high camp through autumn terrain.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 4500m · 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '19 September',
                                    'title' => 'Acclimatization Day',
                                    'description' => 'Acclimatization and preparation for higher altitude.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5000m · Acclimatization'
                                ],
                            ],

                            2 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '15 September',
                                    'title' => 'Autumn Arrival In Kathmandu',
                                    'description' => 'Arrival and transfer to hotel.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Airport Transfer'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '16 September',
                                    'title' => 'Kathmandu Sightseeing And Preparation',
                                    'description' => 'Sightseeing and expedition preparation.',
                                    'details' => 'Breakfast · Hotel · 1400m · Sightseeing / Briefing'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '17 September',
                                    'title' => 'Fly To Lukla And Trek To Phakding',
                                    'description' => 'Flight to Lukla followed by trek to Phakding.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2610m · 8 km / 3-4 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '18 September',
                                    'title' => 'Trek To Namche Bazaar',
                                    'description' => 'Trek through the autumn mountain trail.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 3440m · 10-12 km / 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '19 September',
                                    'title' => 'Acclimatization At Namche Bazaar',
                                    'description' => 'Rest and acclimatization.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 3440m · Acclimatization'
                                ],
                            ],

                            3 => [
                                [
                                    'day' => 'Day 01',
                                    'date' => '15 September',
                                    'title' => 'Autumn Expedition Arrival And Orientation',
                                    'description' => 'Arrival in Kathmandu and expedition orientation.',
                                    'details' => 'Breakfast, Lunch, Dinner · Hotel · 1400m · Orientation'
                                ],
                                [
                                    'day' => 'Day 02',
                                    'date' => '16 September',
                                    'title' => 'Briefing And Equipment Preparation',
                                    'description' => 'Complete expedition briefing and equipment preparation.',
                                    'details' => 'Breakfast · Hotel · 1400m · Equipment Check'
                                ],
                                [
                                    'day' => 'Day 03',
                                    'date' => '17 September',
                                    'title' => 'Drive To Base Camp',
                                    'description' => 'Travel toward the autumn base camp.',
                                    'details' => 'Breakfast, Lunch, Dinner · Lodge · 2600m · 6-7 hrs'
                                ],
                                [
                                    'day' => 'Day 04',
                                    'date' => '18 September',
                                    'title' => 'Trek To High Camp',
                                    'description' => 'Trek through the autumn mountain route.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 4500m · 5-6 hrs'
                                ],
                                [
                                    'day' => 'Day 05',
                                    'date' => '19 September',
                                    'title' => 'Acclimatization And Climbing Practice',
                                    'description' => 'Acclimatization and climbing practice.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5000m · Training'
                                ],
                                [
                                    'day' => 'Day 06',
                                    'date' => '20 September',
                                    'title' => 'Summit Preparation',
                                    'description' => 'Final summit preparation and equipment inspection.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · 5500m · Preparation'
                                ],
                                [
                                    'day' => 'Day 07',
                                    'date' => '21 September',
                                    'title' => 'Summit Attempt And Return',
                                    'description' => 'Summit attempt followed by return to camp.',
                                    'details' => 'Breakfast, Lunch, Dinner · Camp · High Altitude · Summit Day'
                                ],
                            ],
                        ],
                    ];
                    ?>

                    <!-- ITINERARY PANELS -->
                    <?php foreach ($itineraries as $season => $seasonItineraries): ?>
                        <div class="season-panel <?= $season !== 'summer' ? 'hidden' : '' ?>" data-season-panel="<?= $season ?>">
                            <?php foreach ($seasonItineraries as $itineraryNumber => $itineraryItems): ?>
                                <div id="<?= $season ?>-itinerary-panel-<?= $itineraryNumber ?>" class="itinerary-panel <?= $itineraryNumber !== 1 ? 'hidden' : '' ?>" data-itinerary-panel="<?= $itineraryNumber ?>" role="tabpanel">
                                    <div class="overflow-hidden rounded-[5px] border border-slate-200 bg-white shadow-sm">
                                        <!-- TABLE HEADER -->
                                        <!-- <div class="grid grid-cols-[55px_95px_minmax(0,1fr)] gap-4 bg-[var(--header)] px-3 py-3 text-lg font-medium uppercase tracking-wide text-white sm:grid-cols-[65px_105px_minmax(0,1fr)] sm:px-4 sm:text-xl">
                                            <span>DAY</span>
                                            <span>DATE</span>
                                            <span>DESCRIPTION</span>
                                        </div> -->
                                        <!-- ITINERARY TABLE HEADER  -->
                                        <div class="relative grid grid-cols-[55px_95px_minmax(0,1fr)] gap-4 bg-[var(--header)] px-3 py-3 text-lg font-medium uppercase tracking-wide text-white sm:grid-cols-[65px_105px_minmax(0,1fr)] sm:px-4 sm:text-xl">
                                            <span>DAY</span>
                                            <span>DATE</span>
                                            <span class="text-center">Description</span>
                                            <!-- Print-only itinerary name -->
                                            <span class="print-itinerary-name">
                                                ITINERARY <?= htmlspecialchars((string) $itineraryNumber) ?>
                                            </span>
                                        </div>

                                        <!-- TABLE ROWS -->
                                        <?php foreach ($itineraryItems as $index => $item): ?>
                                            <?php
                                            $details = array_map('trim', explode('·', $item['details']));
                                            $isOpen = $index === 0;
                                            ?>

                                            <div class="itinerary-item border-t border-[#d6e8ee] bg-white">
                                                <!-- MAIN ROW -->
                                                <div class="grid grid-cols-[105px_minmax(0,1fr)] items-center gap-4 bg-[#f8fbfc] px-4 py-3.5 text-[var(--text-primary)] sm:grid-cols-[100px_140px_minmax(0,1fr)] sm:px-5 sm:py-4">
                                                    <!-- DAY + DATE -->
                                                    <div class="flex min-w-0 flex-col gap-1 sm:contents">
                                                        <!-- DAY -->
                                                        <div class="text-[15px] font-semibold sm:text-[17px]">
                                                            <?= htmlspecialchars($item['day']) ?>
                                                        </div>
                                                        <!-- DATE -->
                                                        <div class="text-[14px] font-semibold text-slate-600 sm:text-[17px] sm:text-[var(--text-primary)]">
                                                            <?= htmlspecialchars($item['date']) ?>
                                                        </div>
                                                    </div>

                                                    <!-- TITLE + ARROW -->
                                                    <button type="button" class="itinerary-toggle flex min-w-0 w-full items-center justify-between gap-3 text-left sm:gap-4" aria-expanded="<?= $isOpen ? 'true' : 'false' ?>">
                                                        <span class="min-w-0 text-[15px] font-medium leading-snug text-[var(--text-primary)] sm:text-[17px]">
                                                            <?= htmlspecialchars($item['title']) ?>
                                                        </span>
                                                        <i class="itinerary-arrow fa-solid fa-chevron-down shrink-0 text-sm text-[var(--teal-brand)] transition-transform duration-500 ease-in-out <?= $isOpen ? 'rotate-180' : '' ?>" aria-hidden="true"></i>
                                                    </button>
                                                </div>

                                                <!-- EXPANDED DETAILS -->
                                                <div class="itinerary-details overflow-hidden opacity-0 transition-[max-height,opacity] duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]" style="<?= $isOpen ? 'max-height:1000px;opacity:1;' : 'max-height:0;opacity:0;' ?>">
                                                    <div class="mx-4 mb-4 overflow-hidden border border-[#c7dfe8] bg-[#f4f9fb] sm:mx-5">
                                                        <!-- META INFORMATION -->
                                                        <div class="grid grid-cols-[1.4fr_1fr] border-b border-[#c7dfe8] bg-[#e5f2f7] sm:grid-cols-[1.35fr_0.9fr_0.9fr_0.85fr]">
                                                            <?php if (isset($details[0]) && $details[0] !== ''): ?>
                                                                <div class="flex min-w-0 items-center justify-center gap-1.5 border-r border-b border-[#a9cbd8] px-2 py-2.5 text-[13px] font-medium text-[var(--text-primary)] sm:border-b-0 sm:px-4 sm:text-base sm:gap-2">
                                                                    <i class="fa-solid fa-utensils shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                                                                    <span class="whitespace-nowrap">
                                                                        <?= htmlspecialchars($details[0]) ?>
                                                                    </span>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if (isset($details[1]) && $details[1] !== ''): ?>
                                                                <div class="flex min-w-0 items-center justify-center gap-1.5 border-b border-[#a9cbd8] px-2 py-2.5 text-[13px] font-medium text-[var(--text-primary)] sm:border-b-0 sm:px-4 sm:border-r sm:text-base sm:gap-2">
                                                                    <i class="fa-solid fa-hotel shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                                                                    <span class="whitespace-nowrap">
                                                                        <?= htmlspecialchars($details[1]) ?>
                                                                    </span>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if (isset($details[2]) && $details[2] !== ''): ?>
                                                                <div class="flex min-w-0 items-center justify-center gap-1.5 border-r border-[#a9cbd8] px-2 py-2.5 text-[13px] font-medium text-[var(--text-primary)] sm:px-4 sm:text-base sm:gap-2">
                                                                    <i class="fa-solid fa-mountain shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                                                                    <span class="whitespace-nowrap">
                                                                        <?= htmlspecialchars($details[2]) ?>
                                                                    </span>
                                                                </div>
                                                            <?php endif; ?>

                                                            <?php if (isset($details[3]) && $details[3] !== ''): ?>
                                                                <div class="flex min-w-0 items-center justify-center gap-1.5 px-2 py-2.5 text-[13px] font-medium text-[var(--text-primary)] sm:px-4 sm:text-base sm:gap-2">
                                                                    <i class="fa-solid fa-person-walking shrink-0 text-[var(--teal-brand)]" aria-hidden="true"></i>
                                                                    <span class="whitespace-nowrap">
                                                                        <?= htmlspecialchars($details[3]) ?>
                                                                    </span>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <!-- DESCRIPTION -->
                                                        <?php if (!empty($item['description'])): ?>
                                                            <div class="px-4 py-4 sm:px-5 sm:py-4">
                                                                <p class="text-[15px] font-normal leading-7 text-slate-700 sm:text-[16px]">
                                                                    <?= htmlspecialchars($item['description']) ?>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </section>

                <!-- PACKAGE OPTIONS -->
                <section id="package-options" class="scroll-mt-20 pt-9" aria-labelledby="package-options-title">
                    <div class="mb-2 flex items-center gap-3">
                        <span class="h-7 w-2 shrink-0 bg-[var(--text-primary)]" aria-hidden="true">
                        </span>
                        <h2 id="package-options-title" class="shrink-0 text-3xl font-bold uppercase leading-none tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                            PACKAGE OPTIONS
                        </h2>
                        <span class="h-px flex-1 bg-slate-300" aria-hidden="true">
                        </span>
                        <span class="flex h-7 w-7 shrink-0 items-center justify-center text-[var(--text-primary)]" aria-hidden="true">
                            <i class="fa-solid fa-mountain text-[24px]"></i>
                        </span>
                    </div>
                    <p class="mb-4 text-base font-normal text-black sm:text-[17px]">
                        Select your level of support for the summit.
                    </p>

                    <!-- PACKAGE SERVICE TABS -->
                    <div class="mb-5 flex w-fit max-w-full shrink-0 items-center gap-2 overflow-x-auto rounded-[10px] bg-[#2D628F] p-[6px]" role="tablist" aria-label="Package service options">
                        <!-- FULL BOARD -->
                        <button type="button" id="package-tab-full-board" class="package-service-tab flex h-[42px] shrink-0 items-center justify-center rounded-[9px] bg-[var(--blog-blue-bg)] px-5 text-[15px] font-medium capitalize leading-none tracking-wide text-white transition-all duration-200 sm:px-6 sm:text-[17px]" data-package-service="full-board" role="tab" aria-selected="true" aria-controls="package-panel-full-board">
                            Full Board Service
                        </button>

                        <!-- BASE CAMP -->
                        <button type="button" id="package-tab-base-camp" class="package-service-tab flex h-[42px] shrink-0 items-center justify-center rounded-[9px] bg-transparent px-5 text-[15px] font-medium capitalize leading-none tracking-wide text-white transition-all duration-200 sm:px-6 sm:text-[17px]" data-package-service="base-camp" role="tab" aria-selected="false" aria-controls="package-panel-base-camp">
                            Base Camp Service
                        </button>
                    </div>

                    <!-- FULL BOARD SERVICE -->
                    <div id="package-panel-full-board" class="package-service-panel" data-package-panel="full-board" role="tabpanel" aria-labelledby="package-tab-full-board">
                        <div class="rounded-[5px] bg-[#edf5f8] p-5 shadow-sm ring-1 ring-slate-200 sm:p-6">
                            <!-- PRICE HEADER -->
                            <div id="costs" class="flex flex-col gap-4 border-b border-slate-300 pb-4 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-xl font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-[22px]">
                                        CURRENT EXCLUSIVE RATE
                                    </p>
                                    <div class="mt-1 flex flex-wrap items-end gap-2">
                                        <span class="text-2xl text-black font-medium line-through sm:text-3xl">
                                            ${{$full_board_services->price_1}}
                                        </span>
                                        <strong class="text-2xl font-medium text-[var(--teal-brand)] sm:text-3xl">
                                            ${{$full_board_services->price_2}}
                                        </strong>
                                        <span class="mb-1 text-base font-normal capitalize text-[#464646] sm:text-[17px]">
                                            <span class="text-[var(--primary-dark)]"> Per Person</span>
                                        </span>
                                    </div>
                                </div>
                                <!-- ACTIONS -->
                                <div class="flex flex-wrap gap-2 no-print">
                                    <a href="./book-your-trip.php" class="inline-flex h-9 items-center justify-center rounded-lg bg-[var(--text-primary)] px-4 text-lg font-medium capitalize tracking-wide text-white transition hover:bg-[var(--figma-blue)] sm:text-[19px]">
                                        Book Full Board
                                    </a>
                                    <a href="#departure" id="check-dates" class="package-check-date inline-flex h-9 items-center justify-center rounded-lg bg-[var(--teal-brand)] px-4 text-lg font-medium capitalize tracking-wide text-white transition hover:bg-[var(--figma-blue)] sm:text-[19px]" data-service="FULL BOARD SERVICE">
                                        Check Dates
                                    </a>
                                </div>
                            </div>
                            <!-- INTRODUCTION -->
                            <div class="space-y-3">
                                <p class="mt-4 text-base leading-[1.8] text-black sm:text-[17px]">
                                    {{ $full_board_services->description }}
                                </p>
                            </div>
                            <!-- PACKAGE DETAILS -->
                            <div class="mt-5 border-t border-slate-400 pt-5">
                                <h3 class="text-2xl font-bold uppercase text-[var(--text-primary)] sm:text-[25px]">
                                    PACKAGE DETAILS
                                </h3>
                                <p class="font-normal text-base text-black sm:text-[17px]">
                                    A comprehensive breakdown of expedition logistics and services.
                                </p>
                                <!-- INCLUDED -->
                                <div class="mt-5">
                                    <h4 class="flex items-center gap-2 text-lg font-semibold uppercase text-[var(--package-green)] sm:text-xl  after:ml-2 after:h-px after:flex-1 after:bg-slate-400">
                                        <span class="flex shrink-0 items-center gap-1.5">
                                            <i class="fa-solid fa-circle-check"></i>
                                            EXPEDITION PACKAGE INCLUDES
                                        </span>
                                    </h4>
                                    <div class="mt-4 space-y-4">
                                        @foreach ($fullBoardIncludes as $item)
                                            <div>
                                                <h5 class="text-base font-semibold uppercase text-[var(--package-green)] sm:text-[17px]">
                                                    {{$loop->iteration}}. {{ $item->title }}
                                                </h5>
                                                <p class="mt-1.5 text-base leading-[1.75] text-black sm:text-[17px]">
                                                    @foreach($item->details as $detail)
                                                        ✓ {{ $detail }}<br>
                                                    @endforeach
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- EXCLUDED -->
                                <div class="pt-5">
                                    <h4 class="flex items-center gap-2 text-lg font-semibold uppercase text-[var(--package-red)] sm:text-xl  after:ml-2 after:h-px after:flex-1 after:bg-slate-400">
                                        <span class="flex shrink-0 items-center gap-1.5">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                            EXPEDITION PACKAGE EXCLUDES
                                        </span>
                                    </h4>
                                    <div class="mt-4 space-y-4">
                                        @foreach($fullBoardExcludes as $item)
                                            <div>
                                                <h5 class="text-base font-semibold uppercase text-[var(--package-red)] sm:text-[17px]">
                                                    {{$loop->iteration}}. {{ $item->title }}
                                                </h5>
                                                <p class="mt-1.5 text-base leading-[1.75] text-black sm:text-[17px]">
                                                    @foreach($item->details as $detail)
                                                        ✕ {{ $detail }}<br>
                                                    @endforeach
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BASE CAMP SERVICE -->
                    <div id="package-panel-base-camp" class="package-service-panel hidden" data-package-panel="base-camp" role="tabpanel" aria-labelledby="package-tab-base-camp">
                        <div class="rounded-[5px] bg-[#edf5f8] p-5 shadow-sm ring-1 ring-slate-200 sm:p-6">
                            <!-- PRICE HEADER -->
                            <div class="flex flex-col gap-4 border-b border-slate-300 pb-4 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-xl font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-[22px]">
                                        CURRENT EXCLUSIVE RATE
                                    </p>

                                    <div class="mt-1 flex flex-wrap items-end gap-2">
                                        <span class="text-2xl font-medium text-black line-through sm:text-3xl">
                                            ${{$base_camp_services->price_1}}
                                        </span>

                                        <strong class="text-2xl font-medium text-[var(--teal-brand)] sm:text-3xl">
                                            ${{$base_camp_services->price_2}}
                                        </strong>
                                        <span class="mb-1 text-base font-normal text-[var(--teal-brand)] sm:text-[17px]">
                                            <span class="text-[var(--primary-dark)]">
                                                Per Person
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <!-- ACTIONS -->
                                <div class="flex flex-wrap gap-2 no-print">
                                    <a href="book-your-trip.php" class="inline-flex h-9 items-center justify-center rounded-lg bg-[var(--text-primary)] px-4 text-lg font-medium tracking-wide text-white transition hover:bg-[var(--figma-blue)] sm:text-[19px]">
                                        Book Base Camp
                                    </a>

                                    <a href="#departure" id="check-dates" class="package-check-date inline-flex h-9 items-center justify-center rounded-lg bg-[var(--teal-brand)] px-4 text-lg font-medium capitalize tracking-wide text-white transition hover:bg-[var(--figma-blue)] sm:text-[19px]" data-service="FULL BOARD SERVICE">
                                        Check Dates
                                    </a>
                                </div>
                            </div>

                            <!-- INTRODUCTION -->
                            <div class="space-y-3">
                                <p class="mt-4 text-base leading-[1.8] text-black sm:text-[17px]">
                                    {{ $base_camp_services->description }}
                                </p>
                            </div>

                            <!-- PACKAGE DETAILS -->
                            <div class="mt-5 border-t border-[#C7C5C5] pt-5">
                                <h3 class="text-2xl font-bold uppercase text-[var(--text-primary)] sm:text-[25px]">
                                    PACKAGE DETAILS
                                </h3>
                                <p class="mt-1 font-normal text-base text-black sm:text-[17px]">
                                    A comprehensive breakdown of base camp logistics and services.
                                </p>
                                <!-- INCLUDED -->
                                <div class="mt-5">
                                    <h4 class="text-lg font-semibold uppercase text-[var(--package-green)] sm:text-xl">
                                        <i class="fa-solid fa-circle-check mr-1"></i>
                                        BASE CAMP PACKAGE INCLUDES
                                    </h4>

                                    <div class="mt-4 space-y-4">
                                        @foreach($baseCampIncludes as $item)
                                            <div>
                                                <h5 class="text-base font-semibold uppercase text-[var(--package-green)] sm:text-[17px]">
                                                    {{$loop->iteration}}. {{ $item->title }}
                                                </h5>
                                                <p class="mt-1.5 text-base leading-[1.75] text-black sm:text-[17px]">
                                                    @foreach($item->details as $detail)
                                                        ✓ {{ $detail }}<br>
                                                    @endforeach
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- EXCLUDED -->
                                <div class="mt-6 border-t border-slate-300 pt-5">
                                    <h4 class="text-lg font-semibold uppercase text-[var(--package-red)] sm:text-xl">
                                        <i class="fa-solid fa-circle-xmark mr-1"></i>
                                        BASE CAMP PACKAGE EXCLUDES
                                    </h4>

                                    <div class="mt-4 space-y-4">
                                        @foreach($baseCampExcludes as $item)
                                            <div>
                                                <h5 class="text-base font-semibold uppercase text-[var(--package-red)] sm:text-[17px]">
                                                    {{$loop->iteration}}. {{ $item->title }}
                                                </h5>

                                                <p class="mt-1.5 text-base leading-[1.75] text-black sm:text-[17px]">
                                                    @foreach($item->details as $detail)
                                                        ✕ {{ $detail }}<br>
                                                    @endforeach
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <!-- RIGHT SIDEBAR -->
            <!-- <aside class="space-y-5 lg:sticky lg:top-16"> -->
            <aside class="space-y-5">
                <!-- UPCOMING DEPARTURE -->
                <!-- <section class="overflow-hidden rounded-[6px] border border-slate-200 bg-white shadow-sm"> -->
                <section class="hidden overflow-hidden rounded-[6px] border border-slate-200 bg-white shadow-sm sm:block no-print">
                    <!-- Header -->
                    <div class="flex items-center gap-3 bg-[var(--figma-blue)] px-4 py-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-white/15 text-white">
                            <i class="fa-solid fa-person-hiking text-lg"></i>
                        </span>

                        <h2 class="text-lg font-medium uppercase tracking-[0.08em] text-white sm:text-xl">
                            LATEST UPCOMING DEPARTURE
                        </h2>
                    </div>
                    <!-- Content -->
                    <div class="bg-[#eef5f7] px-4 py-3">
                        <div class="flex items-start justify-between gap-4">
                            <!-- Price -->
                            <div>
                                <p class="text-base font-bold uppercase leading-tight text-[#111] sm:text-lg">
                                    STARTING PRICE
                                </p>
                                <div class="mt-0.5 flex items-baseline gap-2">
                                    <strong class="text-2xl font-bold leading-none text-[var(--teal-brand)] sm:text-[26px]">
                                        US $37500
                                    </strong>
                                    <span class="text-xs font-bold uppercase text-[#575757] sm:text-sm">
                                        PER PERSON
                                    </span>
                                </div>
                            </div>
                            <!-- Duration -->
                            <div class="flex flex-col items-end justify-end self-end">
                                <span class="mb-1 flex h-5 w-5 items-center justify-center text-[#17354a]">
                                    <i class="fa-solid fa-square-check text-base"></i>
                                </span>
                                <span class="text-sm font-bold uppercase leading-none text-[#111] sm:text-base">
                                    44 DAYS
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="grid grid-cols-2 gap-2 px-0 pt-2 no-print">
                        <a href="book-your-trip.php" class="inline-flex h-11 items-center justify-center rounded-[6px] bg-[#06243a] text-sm font-medium uppercase text-white transition-colors duration-300 hover:bg-[var(--figma-blue)] sm:text-base">
                            BOOK NOW
                        </a>
                        <a href="contact.php" class="inline-flex h-11 items-center justify-center rounded-[6px] bg-[var(--teal-brand)] text-sm font-medium uppercase text-white transition-colors duration-300 hover:bg-[var(--figma-blue)] sm:text-base">
                            MAKE AN INQUIRY
                        </a>
                    </div>
                </section>

                <!--  CLIMBING ROUTE -->
                <section class="overflow-hidden rounded-lg border border-slate-200 bg-[#f5f9fb] shadow-sm no-print">
                    <!-- Header -->
                    <div class="flex items-center gap-4 bg-[var(--header)] px-5 py-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[7px] bg-[var(--teal-brand)] text-white">
                            <i class="fa-solid fa-person-hiking text-lg"></i>
                        </span>

                        <h2 class="text-xl font-medium uppercase tracking-[0.08em] text-white">
                            CLIMBING ROUTE
                        </h2>
                    </div>

                    <!-- Links -->
                    <div class="space-y-3 px-3 py-5">
                        <a  class="flex min-h-[45px] items-center gap-4 border-r-[4px] border-r-[var(--teal-brand)] bg-white px-4 py-2.5 text-lg font-medium text-[var(--text-primary)] transition-colors duration-200 hover:bg-[#edf5f8]">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[var(--figma-blue)] text-white">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                            <span>
                                Trekking Peak Permit
                            </span>
                        </a>
                        <a  class="flex min-h-[45px] items-center gap-4 border-r-[4px] border-r-[var(--teal-brand)] bg-white px-4 py-2.5 text-lg font-medium text-[var(--text-primary)] transition-colors duration-200 hover:bg-[#edf5f8]">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[var(--figma-blue)] text-white">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                            <span>
                                Climbing Permit Fee
                            </span>
                        </a>
                        <a  class="flex min-h-[45px] items-center gap-4 border-r-[4px] border-r-[var(--teal-brand)] bg-white px-4 py-2.5 text-lg font-medium text-[var(--text-primary)] transition-colors duration-200 hover:bg-[#edf5f8]">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[var(--figma-blue)] text-white">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                            <span>
                                Garbage Deposit And Refund
                            </span>
                        </a>
                    </div>
                </section>

                <!-- EXPEDITION HIGHLIGHT -->
                <section class="overflow-hidden rounded-lg border border-slate-200 bg-[#f5f9fb] shadow-sm">
                    <!-- Header -->
                    <div class="flex items-center gap-4 bg-[var(--figma-blue)] px-5 py-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[7px] bg-[var(--teal-brand)] text-white">
                            <i class="fa-solid fa-person-hiking text-lg"></i>
                        </span>

                        <h2 class="text-xl font-medium uppercase tracking-[0.08em] text-white">
                            EXPEDITION HIGHLIGHT
                        </h2>
                    </div>

                    <!-- Highlights -->
                    <div class="px-3 py-1">
                        @foreach ($highlights as $highlight)
                            <a class="flex items-start gap-3 border-b border-slate-200 px-1 py-3.5 text-lg font-medium leading-[1.55] text-[var(--text-primary)] transition-colors duration-200 last:border-b-0 hover:bg-white">
                                <i class="fa-solid fa-caret-right mt-1 shrink-0 text-smm text-[var(--text-primary)]"></i>
                                <span>
                                    {{$highlight->title}}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </section>

                <!-- PAST EXPEDITIONS -->
                <section class="overflow-hidden rounded-lg border border-slate-200 bg-[#f5f9fb] shadow-sm no-print">
                    <!-- Header -->
                    <div class="flex items-center gap-4 bg-[var(--header)] px-5 py-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[7px] bg-[var(--teal-brand)] text-white">
                            <i class="fa-solid fa-person-hiking text-lg"></i>
                        </span>
                        <h2 class="text-xl font-medium uppercase tracking-[0.08em] text-white">
                            PAST EXPEDITIONS
                        </h2>
                    </div>
                    <!-- Links -->
                    <div class="space-y-3 px-3 py-5">
                        <?php for ($year = 2016; $year >= 2010; $year--): ?>
                            <a href="./package-details.php" class="flex min-h-[45px] items-center gap-4 border-r-[4px] border-r-[var(--teal-brand)] bg-white px-4 py-2.5 text-lg font-medium text-[var(--text-primary)] transition-colors duration-200 hover:bg-[#edf5f8]">
                                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[var(--figma-blue)] text-white">
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </span>

                                <span>
                                    Everest South
                                    <?= $year ?>
                                </span>
                            </a>
                        <?php endfor; ?>
                    </div>
                </section>

                <!-- HISTORICAL MILESTONES -->
                <section class="overflow-hidden rounded-lg border border-slate-200 bg-[#f5f9fb] shadow-sm">
                    <div class="flex items-center gap-4 bg-[var(--header)] px-5 py-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[7px] bg-[var(--teal-brand)] text-white">
                            <i class="fa-solid fa-person-hiking text-lg"></i>
                        </span>

                        <h2 class="text-xl font-medium uppercase tracking-[0.08em] text-white">
                            HISTORICAL MILESTONES
                        </h2>
                    </div>

                    <div class="space-y-2 px-3 py-3">
                        @foreach($milestones as $milestone)
                            <div class="milestone-item overflow-hidden border-b-2 border-white">
                                <button type="button" class="milestone-trigger flex min-h-[48px] w-full items-center gap-4 border-r-[4px] border-r-[var(--teal-brand)] bg-white px-4 py-2 text-left text-lg font-medium text-[var(--text-primary)] transition-all duration-300 hover:bg-[#edf5f8]" aria-expanded="false" aria-controls="">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#3987b8] text-sm font-medium text-white">
                                        {{ $loop->iteration }}
                                    </span>

                                    <span class="flex-1">
                                        {{ $milestone->title }}
                                    </span>

                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center transition-all duration-300">
                                        <i class="milestone-icon fa-solid fa-chevron-down text-sm text-[var(--text-primary)] transition-transform duration-300"></i>
                                    </span>
                                </button>

                                <div id="" class="milestone-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-in-out" aria-hidden="true">
                                    <div class="min-h-0 overflow-hidden">
                                        <div class="border-t border-slate-300 bg-white px-4 py-4">
                                            <div>
                                                <p class="text-[15px] leading-6 text-black text-justify font-medium">
                                                    {!! $milestone->content !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </section>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const items = document.querySelectorAll('.milestone-item');

                        items.forEach(item => {
                            const trigger = item.querySelector('.milestone-trigger');
                            const content = item.querySelector('.milestone-content');
                            const icon = item.querySelector('.milestone-icon');

                            trigger.addEventListener('click', function() {
                                const isOpen = trigger.getAttribute('aria-expanded') === 'true';

                                items.forEach(otherItem => {
                                    const otherTrigger = otherItem.querySelector('.milestone-trigger');
                                    const otherContent = otherItem.querySelector('.milestone-content');
                                    const otherIcon = otherItem.querySelector('.milestone-icon');

                                    otherTrigger.setAttribute('aria-expanded', 'false');
                                    otherContent.classList.remove('grid-rows-[1fr]');
                                    otherContent.classList.add('grid-rows-[0fr]');
                                    otherContent.setAttribute('aria-hidden', 'true');
                                    otherIcon.classList.remove('rotate-180');
                                });

                                if (!isOpen) {
                                    trigger.setAttribute('aria-expanded', 'true');
                                    content.classList.remove('grid-rows-[0fr]');
                                    content.classList.add('grid-rows-[1fr]');
                                    content.setAttribute('aria-hidden', 'false');
                                    icon.classList.add('rotate-180');
                                }
                            });
                        });
                    });
                </script>

                <!-- ASK AN EXPERT -->
                <section class="relative overflow-hidden rounded-[7px] text-white shadow-sm no-print">
                    <a href="https://wa.me/9779851031006" class="block w-full">
                        <img src="{{ asset('theme-assets/img/background/ask-an-expert.webp') }}" alt="Ask an Adventure Consultant" class="block w-full h-auto">
                    </a>
                </section>

                <!-- Print + Download PDF -->
                <div class="grid grid-cols-2 gap-2 no-print">
                    <!-- Print -->
                    <button type="button" id="print-package-page" class="flex h-10 w-full items-center justify-center gap-1.5 sm:gap-2 px-2 rounded-[4px] border border-[var(--teal-brand)] bg-white text-xs sm:text-[13px] xl:text-sm font-semibold uppercase tracking-tight text-[var(--teal-brand)] transition hover:bg-[#edf5f8] whitespace-nowrap">
                        <i class="fa-solid fa-print text-[15px] sm:text-[17px] shrink-0"></i>
                        <span>PRINT THIS PAGE</span>
                    </button>

                    <a href="./assets/documents/legal/document-01.pdf" download class="flex h-10 w-full items-center justify-center gap-1.5 sm:gap-2 px-2 rounded-[4px] border border-[var(--teal-brand)] bg-white text-xs sm:text-[13px] xl:text-sm font-semibold uppercase tracking-tight text-[var(--teal-brand)] transition hover:bg-[#edf5f8] whitespace-nowrap">
                        <i class="fa-solid fa-download text-[15px] sm:text-[17px] shrink-0"></i>
                        <span>DOWNLOAD PDF</span>
                    </a>
                </div>
            </aside>
        </div>

        <!-- GALLERY -->
        <section id="gallery" class="scroll-mt-20 pt-9 no-print" aria-labelledby="gallery-title">
            <div class="mb-4 flex items-center gap-4">
                <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
                <h2 id="gallery-title" class="shrink-0 text-center text-2xl font-bold uppercase tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                    CAPTURED BY TRAVELLERS
                </h2>
                <span class="h-px flex-1 bg-slate-300" aria-hidden="true"></span>
            </div>
            <div class="relative">
                <div class="swiper package-gallery-swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($photo_videos as $image)
                            <div class="swiper-slide">
                                <a href="{{ $image->thumbnail ? asset('uploads/original/' . $image->thumbnail) : asset('theme-assets/default.jpg') }}" class="package-gallery-item group relative block overflow-hidden rounded-[3px]">
                                    <img src="{{ $image->thumbnail ? asset('uploads/original/' . $image->thumbnail) : asset('theme-assets/default.jpg') }}" alt="{{ $image->title }}" width="800" height="600" loading="lazy" decoding="async" class="h-[180px] w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 sm:h-[220px] lg:h-[260px]">

                                    <span class="absolute inset-0 flex items-center justify-center bg-[#06243a]/0 text-white opacity-0 transition-all duration-300 group-hover:bg-[#06243a]/35 group-hover:opacity-100">
                                        <span class="flex h-11 w-11 items-center justify-center rounded-full border border-white/70 bg-white/10 backdrop-blur-sm">
                                            <i class="fa-solid fa-expand text-sm"></i>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Previous -->
                <button type="button" class="package-gallery-prev absolute left-0 top-1/2 z-10 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-lg border border-[var(--teal-brand)] text-[var(--teal-brand)] shadow-lg transition-all duration-300 bg-white hover:bg-[#06243a]/60 focus:outline-none focus:ring-2 focus:ring-white/70 sm:-left-4" aria-label="Previous gallery image"><i class="fa-solid fa-chevron-left text-sm"></i></button>
                <!-- Next -->
                <button type="button" class="package-gallery-next absolute right-2 top-1/2 z-10 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-lg border border-[var(--teal-brand)] text-[var(--teal-brand)] shadow-lg transition-all duration-300 bg-white hover:bg-[#06243a]/60 focus:outline-none focus:ring-2 focus:ring-white/70 sm:-right-4" aria-label="Next gallery image"><i class="fa-solid fa-chevron-right text-sm"></i></button>
            </div>
        </section>

        <!--FIXED DEPARTURES + FAQ -->
        <div class="grid grid-cols-1 gap-7 pt-9 xl:grid-cols-[minmax(0,1.3fr)_minmax(0,1fr)] xl:items-stretch">
            <!-- FIXED DEPARTURES -->
            <section id="departure" class="flex h-full min-w-0 flex-col scroll-mt-20 pt-9" aria-labelledby="departure-title">
                <!-- SECTION HEADING -->
                <div class="mb-4 flex min-w-0 items-center gap-3">
                    <span class="h-7 w-2 shrink-0 bg-[var(--text-primary)]" aria-hidden="true"></span>
                    <h2 id="departure-title" class="min-w-0 text-[24px] font-bold uppercase tracking-tight text-[var(--text-primary)] sm:text-[26px]">
                        FIXED DEPARTURES
                    </h2>
                </div>
                <!-- FIXED DEPARTURES TABLE -->
                <div class="min-w-0 flex-1 overflow-hidden rounded-[4px] border border-slate-200">
                    <!-- DESKTOP HEADER -->
                    <div class="hidden grid-cols-[minmax(0,1fr)_minmax(130px,160px)_minmax(90px,100px)_minmax(100px,120px)] items-center bg-faq-box px-4 py-2.5 text-lg font-normal uppercase text-white xl:grid 2xl:px-5">
                        <span class="min-w-0">
                            DATES
                        </span>
                        <span class="min-w-0">
                            PRICE
                        </span>
                        <span class="min-w-0">
                            STATUS
                        </span>
                        <span></span>
                    </div>
                    @foreach ($schedules as $schedule)
                        <!-- DEPARTURE ROW -->
                        <div class="grid grid-cols-1 gap-3 border-t border-white bg-[#e1edf1] px-3 py-3.5 text-[17px] font-medium text-[var(--text-primary)] odd:bg-white sm:px-5 sm:py-4 xl:grid-cols-[minmax(0,1fr)_minmax(130px,150px)_minmax(10px,110px)_minmax(110px,120px)] xl:items-center xl:gap-0 xl:py-2.5 xl:text-lg">
                            <!-- DATE -->
                            <div class="flex min-w-0 items-center justify-between gap-2 xl:block">
                                <span class="shrink-0 text-lg font-medium uppercase text-black xl:hidden">
                                    DATE
                                </span>
                                <span class="min-w-0 whitespace-nowrap text-right xl:text-left">
                                    {{$schedule->start_date}} - {{$schedule->end_date}}
                                </span>
                            </div>
                            <!-- PRICE -->
                            <div class="flex min-w-0 items-center justify-between gap-4 xl:justify-start xl:gap-2">
                                <span class="shrink-0 text-lg font-medium uppercase text-black xl:hidden">
                                    PRICE
                                </span>
                                <div class="flex min-w-0 items-center gap-2 whitespace-nowrap">
                                    <span class="line-through decoration-[#913E0A] decoration-2">
                                        ${{$schedule->price}}
                                    </span>
                                    <strong class="font-medium text-[#913E0A]">
                                        ${{$schedule->discount_price}}
                                    </strong>
                                </div>
                            </div>
                            <!-- STATUS -->
                            <div class="flex min-w-0 items-center justify-between gap-4 xl:block">
                                <span class="shrink-0 text-lg font-medium uppercase text-black xl:hidden">
                                    STATUS
                                </span>
                                @if(strtolower(trim($schedule->availability ?? '')) === 'available')
                                    <span class="whitespace-nowrap font-medium text-[#4D8964]">
                                        AVAILABLE
                                    </span>
                                @else
                                    <span class="whitespace-nowrap font-medium text-[#ea0a0a]">
                                        CLOSED
                                    </span>
                                @endif
                            </div>
                            <!-- BOOK NOW -->
                            <div class="flex min-w-0 justify-end pt-1 xl:justify-start xl:pt-0 no-print">
                                <a href="" class="inline-flex h-8 w-fit max-w-full shrink-0 items-center gap-2 bg-[#0785B5] px-4 text-sm font-medium uppercase text-white transition duration-300 hover:bg-[#066f96] sm:h-9 sm:px-3">
                                    <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-white text-[#0785B5]">
                                        <i class="fa-solid fa-chevron-right text-sm"></i>
                                    </span>
                                    <span class="whitespace-nowrap">
                                        BOOK NOW
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- PACKAGE FAQ -->
            <section id="faq" class="flex h-full min-w-0 scroll-mt-20 flex-col pt-9" aria-labelledby="package-faq-title">
                <!-- FAQ HEADING -->
                <div class="mb-4 flex min-w-0 items-center justify-between gap-4">
                    <div class="flex min-w-0 items-center gap-3">
                        <span class="h-7 w-2 shrink-0 bg-[var(--text-primary)]" aria-hidden="true"></span>
                        <h2 id="package-faq-title" class="min-w-0 text-[24px] font-bold uppercase tracking-tight text-[var(--text-primary)] sm:text-[26px]">
                            FAQ
                        </h2>
                    </div>

                    <a href="faq.php" class="inline-flex shrink-0 items-center gap-2 whitespace-nowrap border-b-2 border-slate-200 pb-1 text-base font-semibold uppercase text-black transition hover:text-black/80 sm:text-[17px] no-print">
                        VIEW MORE
                        <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#28639a] text-white">
                            <i class="fa-solid fa-arrow-right text-[11px]"></i>
                        </span>
                    </a>
                </div>

                <!-- FAQ LIST -->
                <div id="package-faq-list" class="flex min-h-0 flex-1 flex-col">
                    @foreach ($faqs as $faq)
                        @php
                            $faqId = 'package-faq-' . $loop->iteration;
                        @endphp
                        <!-- FAQ ITEM -->
                        <article class="package-faq-item min-w-0 overflow-hidden border-b border-slate-400 shadow-sm transition-all duration-300">
                            <!-- QUESTION -->
                            <button
                                type="button"
                                class="package-faq-btn flex min-h-[48px] w-full min-w-0 items-center gap-3 px-4 py-3.5 text-left transition hover:bg-[#c9e4ee] focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[var(--teal-brand)]/30 sm:px-5"
                                aria-expanded="false"
                                aria-controls="{{ $faqId }}">

                                <!-- NUMBER -->
                                <span class="shrink-0 rounded-lg bg-[var(--teal-brand)] p-1 text-base font-normal tracking-wide text-white sm:text-lg">
                                    {{$loop->iteration}}
                                </span>
                                <!-- QUESTION -->
                                <span class="min-w-0 flex-1 break-words text-base font-semibold leading-relaxed tracking-wide text-[var(--text-primary)] sm:text-lg lg:text-lg">
                                    {{ $faq->title }}
                                </span>
                                <!-- ICON -->
                                <span
                                    class="package-faq-icon flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-[var(--text-primary)] transition-transform duration-300"
                                    aria-hidden="true">
                                    <i class="fa-solid fa-chevron-down text-base"></i>
                                </span>
                            </button>
                            <!-- ANSWER -->
                            <div id="{{ $faqId }}"
                                class="package-faq-answer grid grid-rows-[0fr] opacity-0 transition-all duration-300"
                                role="region">
                                <div class="min-h-0 overflow-hidden">
                                    <div class="border-t border-white/70 px-4 pb-5 pt-4 sm:px-5">
                                        <p class="text-sm font-normal leading-[1.85] text-black sm:text-[15px] lg:text-base text-justify">
                                            {{ $faq->content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </div>

        <!-- REVIEWS -->
        <section id="travellers-stories" class="scroll-mt-20 pt-9 no-print" aria-labelledby="reviews-title">
            <div class="mb-5 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="h-7 w-2 bg-[var(--text-primary)]" aria-hidden="true">
                    </span>
                    <h2 id="reviews-title" class="text-3xl font-bold uppercase tracking-tight text-[var(--text-primary)] sm:text-[33px]">
                        TRAVELLERS STORIES
                    </h2>
                </div>
                <!-- Navigation -->
                <div class="flex shrink-0 gap-1.5">
                    <button type="button" class="review-prev flex h-[38px] w-[38px] items-center justify-center rounded-lg border border-[#8ab9ca] bg-white text-[var(--teal-brand)] shadow-sm transition-all duration-200 hover:bg-[var(--figma-blue)] hover:text-white focus:outline-none focus:ring-2 focus:ring-[var(--teal-brand)]/30 disabled:cursor-not-allowed disabled:opacity-40" aria-label="Previous traveller story">
                        <i class="fa-solid fa-chevron-left text-base" aria-hidden="true">
                        </i>
                    </button>
                    <button type="button" class="review-next flex h-[38px] w-[38px] items-center justify-center rounded-lg border border-[#8ab9ca] bg-white text-[var(--teal-brand)] shadow-sm transition-all duration-200 hover:bg-[var(--figma-blue)] hover:text-white focus:outline-none focus:ring-2 focus:ring-[var(--teal-brand)]/30 disabled:cursor-not-allowed disabled:opacity-40" aria-label="Next traveller story">
                        <i class="fa-solid fa-chevron-right text-base" aria-hidden="true">
                        </i>
                    </button>
                </div>
            </div>
            <!-- SWIPER -->
            <div id="reviews" class="relative overflow-hidden">
                <div class="swiper travellers-stories-swiper">
                    <div class="swiper-wrapper">
                        <!-- Review 1 -->
                        <div class="swiper-slide h-auto">
                            <article class="h-full rounded-[5px] border border-slate-200 bg-white p-4 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md sm:p-5  flex flex-col justify-between space-y-4 flex flex-col justify-between space-y-4 flex flex-col justify-between space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#d7ebf3] text-[var(--figma-blue)]">
                                        <i class="fa-solid fa-user text-3xl" aria-hidden="true"></i>
                                    </span>
                                    <div class="min-w-0">
                                        <h3 class="truncate text-2xl font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-[25px]">
                                            JONAS TOMSON
                                        </h3>
                                        <div class="mt-1 flex gap-0.5 text-amber-500" aria-label="5 out of 5 stars">
                                            <i class="fa-solid fa-star text-base" aria-hidden="true">
                                            </i>
                                            <i class="fa-solid fa-star text-base" aria-hidden="true">
                                            </i>
                                            <i class="fa-solid fa-star text-base" aria-hidden="true">
                                            </i>
                                            <i class="fa-solid fa-star text-base" aria-hidden="true">
                                            </i>
                                            <i class="fa-solid fa-star text-base" aria-hidden="true">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 text-base leading-[1.75] text-black font-normal sm:text-[17px]">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                                <div class="mt-4 grid grid-cols-2 gap-2">
                                    <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=85" alt="Traveller experience in Nepal" width="400" height="260" loading="lazy" decoding="async" class="h-[75px] w-full rounded-[3px] object-cover sm:h-[65px]">
                                    <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=84" alt="Traveller trekking in the Himalayas" width="400" height="260" loading="lazy" decoding="async" class="h-[75px] w-full rounded-[3px] object-cover sm:h-[65px]">
                                    <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=85" alt="Traveller experience in Nepal" width="400" height="260" loading="lazy" decoding="async" class="h-[75px] w-full rounded-[3px] object-cover sm:h-[65px]">
                                    <img src="https://images.unsplash.com/photo-1518002054494-3a6f94352e9d?auto=format&fit=crop&w=1920&q=84" alt="Traveller trekking in the Himalayas" width="400" height="260" loading="lazy" decoding="async" class="h-[75px] w-full rounded-[3px] object-cover sm:h-[65px]">
                                </div>
                                <button
                                    type="button"
                                    class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                    data-reviewer="JONAS TOMSON"
                                    data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                    data-rating="4"
                                    data-platform="Google"
                                    data-date="March 18, 2026"
                                    data-review="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet."
                                    data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                    Read full review
                                </button>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <!-- WRITE REVIEW -->
            <div class="mt-5 flex justify-center">
                <button type="button" id="open-review-modal" class="btn-join-group">
                    WRITE REVIEW
                    <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                        <i class="fa-solid fa-arrow-right">
                        </i>
                    </span>
                </button>
            </div>
        </section>
    </div>

    <!-- RELATED PACKAGES -->
    <section id="related-packages" class="relative overflow-hidden bg-[#d7ebf3] py-10 sm:py-12 lg:py-14 no-print" aria-labelledby="related-packages-title">
        <!-- TOP DECORATIVE DESIGN -->
        <div class="pointer-events-none absolute -top-1 left-0 right-0 z-10 h-[10px] sm:h-[18px] lg:h-[28px]" aria-hidden="true">
            <img src="{{ asset('theme-assets/img/background/decorative-design.webp') }}"
                class="absolute bottom-0 left-0 h-full w-full object-cover object-bottom">
        </div>

        <div class="mx-auto w-full max-w-8xl px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16">
            <!-- SECTION HEADER -->
            <div class="mb-8 mt-8 flex flex-col gap-5 sm:mb-10 sm:mt-10 md:flex-row md:items-end md:justify-between md:gap-6">
                <div class="border-l-[6px] border-[var(--text-primary)] pl-4 sm:border-l-8 sm:pl-5">
                    <h2
                        id="related-packages-title"
                        class="text-2xl font-black uppercase leading-tight tracking-tight text-[var(--region-dark)] sm:text-3xl md:text-4xl lg:text-[40px]">
                        Related Packages
                    </h2>
                    <p class="mt-2 max-w-2xl text-sm font-normal leading-relaxed text-black sm:text-base md:text-[17px]">
                        Perfect for climbers seeking group adventure, shared costs &amp; guided support
                    </p>
                </div>
            </div>

            <!-- TOUR GRID -->
            @if(count($similar_trips) > 0)
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-7 lg:grid-cols-3" data-tour-grid>
                    {{-- card --}}
                    @foreach ($similar_trips as $row)
                        <div class="group w-full min-w-0 overflow-hidden rounded-[10px] border border-slate-200 bg-white shadow-md transition-all duration-300 hover:shadow-xl">
                            <a href="{{ route('trip.tripdetail', $row->uri) }}" class="block">
                                <div class="relative aspect-[1.78/1] w-full overflow-hidden">
                                    <img src="{{$row->thumbnail ? asset('uploads/thumbnails/' . $row->thumbnail) :  asset('theme-assets/default.jpg') }}" alt="{{ $row->trip_title }}" class="block h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                </div>
                                <div class="space-y-[0.55cqw] p-[clamp(10px,1.7cqw,26px)]">
                                    <h3 class="break-words text-[clamp(14px,8.3cqw,24px)] font-semibold uppercase leading-tight text-[var(--teal-brand)]">
                                        {{ $row->trip_title }}
                                    </h3>
                                    <div class="text-[clamp(11px,5.65cqw,17px)] font-semibold leading-[1.35] text-black">
                                        <div class="flex min-w-0 items-center justify-between gap-[1.2cqw]">
                                            <div class="flex min-w-0 flex-1 items-center gap-[0.8cqw]">
                                                <span class="shrink-0 text-[var(--teal-brand)]">
                                                    <i class="fa-solid fa-mountain"></i>
                                                </span>
                                                <span class="min-w-0 break-words">{{ $row->max_altitude }}</span>
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
                                                <span class="whitespace-nowrap">{{ $row->duration }}  Days</span>
                                            </div>
                                            <div class="flex min-w-0 items-center gap-[0.35cqw] whitespace-nowrap">
                                                <span class="font-bold text-[var(--primary-dark)] line-through decoration-[var(--text-red)]">${{ $row->starting_price }}</span>
                                                <span>
                                                    <span class="text-[var(--text-red)]">{{ $row->starting_price }}</span>
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
                                            <span class="w-fit max-w-full shrink-0 whitespace-nowrap rounded-[0.55cqw] bg-[var(--green)] px-[1.25cqw] py-[0.45cqw] text-center text-[clamp(9px,5cqw,15px)] font-normal leading-none text-white">
                                                Confirmed: 4 | Remaining: 2
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- EMPTY CATEGORY STATE -->
                <div class="flex min-h-[260px] w-full flex-col items-center justify-center rounded-xl border border-dashed border-slate-300 bg-white/70 px-5 py-6 sm:py-8 md:py-10 lg:py-12 text-center shadow-sm">
                    <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-[var(--teal-brand)]">
                        <i class="fa-solid fa-mountain-sun text-xl" aria-hidden="true">
                        </i>
                    </div>
                    <h3 class="text-lg font-bold uppercase text-[var(--region-dark)] sm:text-xl">
                        No Packages Available
                    </h3>
                    <p class="mt-2 max-w-md text-sm leading-relaxed text-slate-600 sm:text-base">
                        There are currently no related packages available in this category. Please check back soon for new adventures.
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="bg-white px-4 py-6 sm:px-6 sm:py-8 md:px-8 lg:px-10 lg:py-10 xl:px-12 no-print">
        <div class="mx-auto w-full max-w-[1536px]">
            <div class="relative overflow-hidden rounded-lg px-5 py-7 sm:px-7 sm:py-8 md:px-8 md:py-9 lg:px-10 lg:py-10 xl:px-12 xl:py-10">
                <!-- Background Image -->
                <img src="{{ asset('theme-assets/img/background/ready-to-start-your-adventure.webp')}}" alt="ready-to-start-your-adventure" aria-hidden="true" class="absolute inset-0 h-full w-full object-cover">
                <!-- Blue Linear Gradient -->
                <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(0,111,162,0.98)_0%,rgba(0,111,162,0.90)_22%,rgba(0,111,162,0.65)_38%,rgba(0,111,162,0.25)_55%,rgba(0,111,162,0)_75%)]"></div>
                <!-- Content -->
                <div class="relative z-10 flex flex-col gap-6 py-6 sm:py-7 md:py-8 lg:flex-row lg:items-center lg:justify-between lg:gap-8 xl:py-10">
                    <!-- Text Content -->
                    <div class="min-w-0 flex-1">
                        <h2 class="text-[clamp(1.75rem,3.2vw,2.375rem)] font-bold uppercase leading-[1.1] tracking-tight text-white">READY TO START YOUR ADVENTURE?</h2>
                        <p class="mt-2 text-sm font-normal leading-relaxed text-white sm:text-base md:text-[17px]">Join the ranks of modern explorers. Secure your spot today.</p>
                    </div>
                    <!-- Buttons -->
                    <div class="flex w-full flex-col gap-2 sm:flex-row sm:flex-wrap lg:w-auto lg:flex-shrink-0">
                        <a href="plan-your-trip.php" class="inline-flex h-12 w-full shrink-0 items-center justify-center whitespace-nowrap rounded-lg bg-[var(--text-primary)] px-5 text-base font-normal uppercase text-white transition duration-300 hover:opacity-90 sm:w-auto">Plan Your Trip</a>
                        <a href="contact.php" class="inline-flex h-12 w-full shrink-0 items-center justify-center whitespace-nowrap rounded-lg border border-[var(--teal-brand)] bg-white px-5 text-base font-normal uppercase text-[var(--teal-brand)] transition duration-300 hover:bg-[var(--teal-brand)] hover:text-white sm:w-auto">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- model to write the review -->
    <div id="review-modal" class="fixed inset-0 z-[100] hidden overflow-y-auto bg-[#061d30]/75 px-4 py-6 backdrop-blur-sm sm:px-6 sm:py-10" role="dialog" aria-modal="true" aria-labelledby="review-modal-title" aria-hidden="true">
        <div class="flex min-h-full items-center justify-center">
            <div id="review-modal-panel" class="relative w-full max-w-3xl overflow-hidden rounded-[8px] bg-white shadow-2xl">
                <!-- MODAL HEADER -->
                <div class="relative overflow-hidden bg-[var(--primary-dark)] px-5 py-5 sm:px-7 sm:py-6">
                    <!-- <div class="absolute -right-12 -top-12 h-32 w-32 rounded-full bg-white/5" aria-hidden="true">
                    </div>
                    <div class="absolute -bottom-16 -left-10 h-32 w-32 rounded-full bg-[var(--teal-brand)]/20" aria-hidden="true">
                    </div> -->
                    <div class="relative flex items-start justify-between gap-5">
                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-white/10 text-[#69c4dc]">
                                    <i class="fa-solid fa-comment-dots text-sm" aria-hidden="true">
                                    </i>
                                </span>
                                <span class="text-base font-bold uppercase tracking-[0.16em] text-[#8dd8eb] sm:text-base">
                                    SATORI ADVENTURES
                                </span>
                            </div>
                            <h2 id="review-modal-title" class="text-[21px] font-black uppercase leading-tight tracking-tight text-white sm:text-[25px]">
                                SHARE YOUR EXPERIENCE
                            </h2>
                            <!-- <p class="mt-1.5 max-w-xl text-base leading-[1.6] text-white/70 sm:text-base">
                                Tell us about your Himalayan adventure and help future travellers discover the Satori experience.
                            </p> -->
                        </div>
                        <!-- CLOSE -->
                        <button type="button" id="close-review-modal" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10 text-white transition-transform duration-300 hover:rotate-90 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/30" aria-label="Close review form">
                            <i class="fa-solid fa-xmark text-[13px]" aria-hidden="true">
                            </i>
                        </button>
                    </div>
                </div>

                <form id="traveller-review-form" action="#" method="POST" enctype="multipart/form-data" class="max-h-[calc(100vh-190px)] overflow-y-auto">
                    <!--  PERSONAL INFORMATION -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <div class="mb-4">
                            <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                                PERSONAL INFORMATION
                            </h3>
                            <p class="mt-1 text-base text-slate-500 sm:text-base">
                                Tell us a little about yourself.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- FULL NAME -->
                            <div>
                                <label for="review-name" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Full Name
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input id="review-name" name="name" type="text" required maxlength="100" autocomplete="name" placeholder="Enter your full name" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                            <!-- EMAIL -->
                            <div>
                                <label for="review-email" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Email Address
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input id="review-email" name="email" type="email" required maxlength="150" autocomplete="email" placeholder="you@example.com" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                            <!-- COUNTRY -->
                            <div>
                                <label for="review-country" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Country / Nationality
                                </label>
                                <input id="review-country" name="country" type="text" maxlength="80" autocomplete="country-name" placeholder="e.g. United Kingdom" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                            <!-- TRAVEL DATE -->
                            <div>
                                <label for="review-travel-date" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Travel Date
                                </label>
                                <input id="review-travel-date" name="travel_date" type="date" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                        </div>
                    </div>
                    <!-- TRIP INFORMATION  -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <div class="mb-4">
                            <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                                TRIP INFORMATION
                            </h3>
                            <p class="mt-1 text-base text-slate-500 sm:text-base">
                                Help us connect your story with the right adventure.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- TREK -->
                            <div>
                                <label for="review-trip" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Trek / Expedition
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input id="review-trip" name="trip" type="text" required maxlength="150" placeholder="e.g. Everest Base Camp Trek" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                            <!-- TRAVEL TYPE -->
                            <div>
                                <label for="review-travel-type" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Travel Type
                                </label>
                                <div class="relative">
                                    <select id="review-travel-type" name="travel_type" class="h-10 w-full appearance-none rounded-[4px] border border-slate-200 bg-slate-50 px-3 pr-9 text-sm text-slate-700 outline-none transition focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                                        <option value="">
                                            Select travel type
                                        </option>
                                        <option value="trekking">
                                            Trekking
                                        </option>
                                        <option value="expedition">
                                            Peak / Mountain Expedition
                                        </option>
                                        <option value="climbing">
                                            Peak Climbing
                                        </option>
                                        <option value="tour">
                                            Cultural / Adventure Tour
                                        </option>
                                        <option value="expedition-tour">
                                            Expedition & Tour
                                        </option>
                                    </select>
                                    <i class="fa-solid fa-chevron-down pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-base text-slate-500" aria-hidden="true">
                                    </i>
                                </div>
                            </div>
                            <!-- EXPERIENCE TITLE -->
                            <div class="sm:col-span-2">
                                <label for="review-title" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Experience Title
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input id="review-title" name="title" type="text" required maxlength="150" placeholder="Give your experience a short title" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                        </div>
                    </div>
                    <!--  RATING -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                                    YOUR RATING
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </h3>
                                <p class="mt-1 text-base text-slate-500 sm:text-base">
                                    How would you rate your overall experience?
                                </p>
                            </div>
                            <div class="flex items-center gap-1" id="review-rating">
                                <input type="hidden" name="rating" id="review-rating-value" value="0">
                                <button type="button" class="review-star flex h-8 w-8 items-center justify-center text-slate-300 transition hover:scale-110" data-rating="1" aria-label="1 star">
                                    <i class="fa-solid fa-star text-base">
                                    </i>
                                </button>
                                <button type="button" class="review-star flex h-8 w-8 items-center justify-center text-slate-300 transition hover:scale-110" data-rating="2" aria-label="2 stars">
                                    <i class="fa-solid fa-star text-base">
                                    </i>
                                </button>
                                <button type="button" class="review-star flex h-8 w-8 items-center justify-center text-slate-300 transition hover:scale-110" data-rating="3" aria-label="3 stars">
                                    <i class="fa-solid fa-star text-base">
                                    </i>
                                </button>
                                <button type="button" class="review-star flex h-8 w-8 items-center justify-center text-slate-300 transition hover:scale-110" data-rating="4" aria-label="4 stars">
                                    <i class="fa-solid fa-star text-base">
                                    </i>
                                </button>
                                <button type="button" class="review-star flex h-8 w-8 items-center justify-center text-slate-300 transition hover:scale-110" data-rating="5" aria-label="5 stars">
                                    <i class="fa-solid fa-star text-base">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- EXPERIENCE -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <div class="mb-4">
                            <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                                YOUR EXPERIENCE
                            </h3>
                        </div>
                        <!-- REVIEW -->
                        <div>
                            <label for="review-message" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                Your Review
                                <span class="text-red-500">
                                    *
                                </span>
                            </label>
                            <textarea id="review-message" name="message" rows="5" required maxlength="3000" placeholder="Tell us about your journey, the guides, service, highlights and what made your experience memorable..." class="w-full resize-y rounded-[4px] border border-slate-200 bg-slate-50 px-3 py-3 text-sm leading-[1.7] text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                                                                                                        </textarea>
                            <div class="mt-1 flex justify-end">
                                <span id="review-character-count" class="text-base text-slate-400">
                                    0 / 3000
                                </span>
                            </div>
                        </div>
                        <!-- HIGHLIGHT -->
                        <div class="mt-4">
                            <label for="review-highlight" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                What Did You Like Most?
                            </label>
                            <input id="review-highlight" name="highlight" type="text" maxlength="250" placeholder="e.g. Our guide, organization, scenery, hospitality..." class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                        </div>
                    </div>
                    <!--  SERVICE EXPERIENCE -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <div class="mb-4">
                            <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                                SERVICE EXPERIENCE
                            </h3>
                            <p class="mt-1 text-base text-slate-500 sm:text-base">
                                Optional ratings that help us improve and understand your experience.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <!-- GUIDE -->
                            <div>
                                <label for="review-guide-rating" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Guide & Staff
                                </label>
                                <select id="review-guide-rating" name="guide_rating" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-base text-slate-700 outline-none transition focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                                    <option value="">
                                        Not rated
                                    </option>
                                    <option value="5">
                                        Excellent
                                    </option>
                                    <option value="4">
                                        Very Good
                                    </option>
                                    <option value="3">
                                        Good
                                    </option>
                                    <option value="2">
                                        Fair
                                    </option>
                                    <option value="1">
                                        Poor
                                    </option>
                                </select>
                            </div>
                            <!-- ACCOMMODATION -->
                            <div>
                                <label for="review-accommodation-rating" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Accommodation
                                </label>
                                <select id="review-accommodation-rating" name="accommodation_rating" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-base text-slate-700 outline-none transition focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                                    <option value="">
                                        Not rated
                                    </option>
                                    <option value="5">
                                        Excellent
                                    </option>
                                    <option value="4">
                                        Very Good
                                    </option>
                                    <option value="3">
                                        Good
                                    </option>
                                    <option value="2">
                                        Fair
                                    </option>
                                    <option value="1">
                                        Poor
                                    </option>
                                </select>
                            </div>
                            <!-- SAFETY -->
                            <div>
                                <label for="review-safety-rating" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Safety & Organization
                                </label>
                                <select id="review-safety-rating" name="safety_rating" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-base text-slate-700 outline-none transition focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                                    <option value="">
                                        Not rated
                                    </option>
                                    <option value="5">
                                        Excellent
                                    </option>
                                    <option value="4">
                                        Very Good
                                    </option>
                                    <option value="3">
                                        Good
                                    </option>
                                    <option value="2">
                                        Fair
                                    </option>
                                    <option value="1">
                                        Poor
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- RECOMMENDATION -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                            WOULD YOU RECOMMEND US?
                            <span class="text-red-500">
                                *
                            </span>
                        </h3>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="recommend" value="yes" required class="peer sr-only">
                                <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-base font-bold uppercase text-slate-600 transition peer-checked:border-[var(--figma-blue)] peer-checked:bg-[var(--figma-blue)] peer-checked:text-white">
                                    <i class="fa-solid fa-thumbs-up text-base" aria-hidden="true">
                                    </i>
                                    YES, DEFINITELY
                                </span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="recommend" value="maybe" class="peer sr-only">
                                <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-base font-bold uppercase text-slate-600 transition peer-checked:border-[var(--figma-blue)] peer-checked:bg-[var(--figma-blue)] peer-checked:text-white">
                                    MAYBE
                                </span>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="recommend" value="no" class="peer sr-only">
                                <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-base font-bold uppercase text-slate-600 transition peer-checked:border-[var(--figma-blue)] peer-checked:bg-[var(--figma-blue)] peer-checked:text-white">
                                    NO
                                </span>
                            </label>
                        </div>
                    </div>
                    <!-- PROFILE & PHOTOS -->
                    <div class="border-b border-slate-200 px-5 py-5 sm:px-7 sm:py-6">
                        <div class="mb-4">
                            <h3 class="text-[13px] font-black uppercase tracking-wide text-[var(--figma-navy)] sm:text-[14px]">
                                PROFILE & PHOTOS
                            </h3>
                            <p class="mt-1 text-base text-slate-500 sm:text-base">
                                Add a photo to make your testimonial more personal.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- PROFILE PHOTO -->
                            <div>
                                <label for="review-profile-photo" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Profile Photo
                                </label>
                                <input id="review-profile-photo" name="profile_photo" type="file" accept="image/jpeg,image/png,image/webp" class="block w-full rounded-[4px] border border-slate-200 bg-slate-50 text-base text-slate-600 file:mr-3 file:border-0 file:bg-[#d7ebf3] file:px-3 file:py-2.5 file:text-base file:font-bold file:uppercase file:text-[var(--figma-navy)]">
                                <p class="mt-1 text-base text-slate-400">
                                    JPG, PNG or WEBP · Recommended: square image
                                </p>
                            </div>
                            <!-- TRAVEL PHOTOS -->
                            <div>
                                <label for="review-photos" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Travel Photos
                                </label>
                                <input id="review-photos" name="photos[]" type="file" multiple accept="image/jpeg,image/png,image/webp" class="block w-full rounded-[4px] border border-slate-200 bg-slate-50 text-base text-slate-600 file:mr-3 file:border-0 file:bg-[#d7ebf3] file:px-3 file:py-2.5 file:text-base file:font-bold file:uppercase file:text-[var(--figma-navy)]">
                                <p class="mt-1 text-base text-slate-400">
                                    You can upload multiple trekking or expedition photos.
                                </p>
                            </div>
                            <!-- SOCIAL -->
                            <div class="sm:col-span-2">
                                <label for="review-social" class="mb-1.5 block text-base font-bold uppercase tracking-wide text-[var(--figma-navy)]">
                                    Social / Profile URL
                                </label>
                                <input id="review-social" name="social_url" type="url" maxlength="300" placeholder="https://instagram.com/yourprofile" class="h-10 w-full rounded-[4px] border border-slate-200 bg-slate-50 px-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[var(--teal-brand)] focus:bg-white focus:ring-2 focus:ring-[var(--teal-brand)]/10">
                            </div>
                        </div>
                    </div>
                    <!-- CONSENT -->
                    <div class="bg-[#f5f9fb] px-5 py-5 sm:px-7 sm:py-6">
                        <label class="flex cursor-pointer items-start gap-3">
                            <input type="checkbox" name="publish_consent" value="1" required class="mt-0.5 h-4 w-4 shrink-0 accent-[var(--figma-blue)]">
                            <span class="text-base leading-[1.65] text-slate-600 sm:text-base">
                                I give Satori Adventures permission to publish my review, name, country and submitted photographs on its website and promotional channels.
                                <span class="font-bold text-red-500">
                                    *
                                </span>
                            </span>
                        </label>
                        <label class="mt-3 flex cursor-pointer items-start gap-3">
                            <input type="checkbox" name="contact_consent" value="1" class="mt-0.5 h-4 w-4 shrink-0 accent-[var(--figma-blue)]">
                            <span class="text-base leading-[1.65] text-slate-600 sm:text-base">
                                Satori Adventures may contact me regarding my submitted review if clarification is required.
                            </span>
                        </label>
                        <!-- FORM ACTIONS -->
                        <div class="mt-5 flex flex-col-reverse gap-2 sm:flex-row sm:justify-end">
                            <button type="button" id="cancel-review-modal" class="inline-flex h-10 items-center justify-center rounded-[4px] border border-slate-300 bg-white px-6 text-base font-bold uppercase tracking-wide text-slate-600 transition hover:bg-slate-50">
                                CANCEL
                            </button>
                            <button type="submit" class="inline-flex h-10 items-center justify-center gap-2 rounded-[4px] bg-[#06243a] px-7 text-base font-bold uppercase tracking-wide text-white shadow-sm transition hover:bg-[var(--figma-blue)] hover:shadow-md">
                                SUBMIT REVIEW
                                <i class="fa-solid fa-paper-plane text-base" aria-hidden="true">
                                </i>
                            </button>
                        </div>
                        <p class="mt-3 text-center text-base text-slate-400">
                            Your review may be reviewed by our team before publication.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<div id="package-print-footer" class="print-only">
    <div class="print-footer-line"></div>
    <div class="print-footer-content">
        <div class="print-footer-brand-wrap">
            <img src="assets/img/logo/logo.webp" alt="SATORI ADVENTURES" class="print-footer-logo">
            <div class="print-footer-brand">
                <strong>SATORI ADVENTURES PVT. LTD.</strong>
                <p>P. O. Box-21378, Naya Bazaar, Kathmandu, Nepal</p>
                <span>Govt. Regd. No: 140946/072/073 | Tourism Lic. No: 2043</span>
            </div>
        </div>
        <div class="print-footer-contacts">
            <span><strong>Tel:</strong> +977-1-4965127 | +977-1-4951250</span>
            <span><strong>WhatsApp/Cell:</strong> +977-9851031006</span>
            <span><strong>Email:</strong> info@satoriadventure.com</span>
            <span><strong>Web:</strong> www.satori-adventures.com</span>
        </div>
    </div>
</div>
@include('themes.default.layouts.review_modal')

@stop
@section('schema')

@endsection
