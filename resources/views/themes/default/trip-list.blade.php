@extends('themes.default.common.master')
@section('title', $data->title)
@section('meta_keyword', $data->meta_key)
@section('meta_description', $data->meta_description)
@section('content')

    <?php
        $pageTitle = 'Nepal Travel & Adventure | Trekking, Climbing & Tours | Satori Adventures';
        $page_title = $data->title;
        $nav1 = 'DESTINATION';
        $nav2 = $data->title;
        $page_desc = $data->brief;
    ?>

    <main id="main-content" class="bg-white" aria-label="Nepal Travel and Adventure">
        <!-- 01. NEPAL HERO -->
        @include('themes.default.layouts.page_banner_with_swiper')

        <!-- 02. NEPAL OVERVIEW -->
        <section class="relative bg-white overflow-hidden" aria-labelledby="nepal-overview-title">
            <div class="tour-nepal-flags-nepal-page"></div>
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16 py-20 sm:py-24 lg:py-28">
                <div
                    class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_320px] xl:grid-cols-[minmax(0,1fr)_350px] gap-10 lg:gap-14 items-start">
                    <!-- LEFT: OVERVIEW -->
                    <article>
                        <!-- Heading -->
                        <div class="flex items-start gap-3 mb-5">
                            <span class="h-10 w-2 shrink-0 bg-[var(--teal-brand)]" aria-hidden="true"></span>
                            <h2 id="nepal-overview-title"
                                class="pt-1 font-bold uppercase leading-none tracking-tight text-[var(--text-primary)] text-3xl sm:text-4xl lg:text-[39px]">
                                NEPAL OVERVIEW
                            </h2>
                        </div>
                        <div
                            class="max-w-5xl space-y-4 text-justify text-sm leading-5 text-black font-normal sm:text-base sm:leading-7 lg:text-lg">
                            <!-- Paragraph 1 -->
                            <p>
                                Nepal is a great travel destination offering scenic views of spectacular
                                mountains and spell-binding landscapes. With the moderate climatic
                                condition, Nepal attracts hundreds of thousands of visitors annually.
                                Also famous for Everest climbing and trekking, Nepal is now gaining a
                                reputation for breathtaking cultural adventures. This small Himalayan
                                nation, sandwiched between giant neighboring countries like China and
                                India, has been blessed by mother nature with unique cultural beauty.
                            </p>
                            <p>
                                Diversified flora and fauna, and a diversified group of people offering
                                their unique culture.
                            </p>
                            <p>
                                With these unique features, Nepal turns out to be one of the best travel
                                destinations in the world with cheaper prices but warm and welcoming
                                people who regard their guests as their god. The visitors visiting Nepal
                                will know that their travels are worth their money and time.
                            </p>
                        </div>
                    </article>
                    <!-- RIGHT: OTHER DESTINATIONS  -->
                    <aside class="w-full overflow-hidden rounded-[10px] border border-slate-200 bg-[#E2E2E2]"
                        aria-labelledby="other-destinations-title">
                        <!-- Header -->
                        <div class="rounded-t-sm bg-[var(--header)] px-4 py-3">
                            <h2 id="other-destinations-title"
                                class="text-center text-xl font-medium uppercase tracking-[0.08em] text-white">
                                OTHER DESTINATION
                            </h2>
                        </div>

                        <!-- Destination Links -->
                        <nav aria-label="Other destinations" class="bg-[#E2E2E2]">
                            <a href="nepal.php" aria-current="page"
                                class="group flex items-center justify-between border-b-2 border-slate-200 bg-white px-4 py-3 text-lg font-medium text-[var(--text-primary)] transition-all duration-200 hover:bg-[#f5f9fb] hover:text-[var(--teal-brand)]">
                                <span class="flex items-center gap-2">
                                    <span
                                        class="flex h-4 w-4 items-center justify-center text-[var(--text-primary)] transition-all duration-200 group-hover:text-[var(--teal-brand)]">
                                        <i class="fa-solid fa-caret-right text-sm" aria-hidden="true"></i>
                                    </span>
                                    Nepal
                                </span>
                                <i class="fa-solid fa-chevron-right text-sm text-slate-300 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:text-[var(--teal-brand)]"
                                    aria-hidden="true"></i>
                            </a>
                            <a href="india.php"
                                class="group flex items-center justify-between border-b-2 border-slate-200 bg-white px-4 py-3 text-lg font-medium text-[var(--text-primary)] transition-all duration-200 hover:bg-[#f5f9fb] hover:text-[var(--teal-brand)]">
                                <span class="flex items-center gap-2">
                                    <span
                                        class="flex h-4 w-4 items-center justify-center text-[var(--text-primary)] transition-all duration-200 group-hover:text-[var(--teal-brand)]">
                                        <i class="fa-solid fa-caret-right text-sm" aria-hidden="true"></i>
                                    </span>
                                    India
                                </span>
                                <i class="fa-solid fa-chevron-right text-sm text-slate-300 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:text-[var(--teal-brand)]"
                                    aria-hidden="true"></i>
                            </a>
                            <a href="tibet.php"
                                class="group flex items-center justify-between border-b-2 border-slate-200 bg-white px-4 py-3 text-lg font-medium text-[var(--text-primary)] transition-all duration-200 hover:bg-[#f5f9fb] hover:text-[var(--teal-brand)]">
                                <span class="flex items-center gap-2">
                                    <span
                                        class="flex h-4 w-4 items-center justify-center text-[var(--text-primary)] transition-all duration-200 group-hover:text-[var(--teal-brand)]">
                                        <i class="fa-solid fa-caret-right text-sm" aria-hidden="true"></i>
                                    </span>
                                    Tibet
                                </span>
                                <i class="fa-solid fa-chevron-right text-sm text-slate-300 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:text-[var(--teal-brand)]"
                                    aria-hidden="true"></i>
                            </a>
                            <a href="bhutan.php"
                                class="group flex items-center justify-between border-b-2 border-slate-200 bg-white px-4 py-3 text-lg font-medium text-[var(--text-primary)] transition-all duration-200 hover:bg-[#f5f9fb] hover:text-[var(--teal-brand)]">
                                <span class="flex items-center gap-2">
                                    <span
                                        class="flex h-4 w-4 items-center justify-center text-[var(--text-primary)] transition-all duration-200 group-hover:text-[var(--teal-brand)]">
                                        <i class="fa-solid fa-caret-right text-sm" aria-hidden="true"></i>
                                    </span>
                                    Bhutan
                                </span>
                                <i class="fa-solid fa-chevron-right text-sm text-slate-300 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:text-[var(--teal-brand)]"
                                    aria-hidden="true"></i>
                            </a>
                            <a href="pakistan.php"
                                class="group flex items-center justify-between bg-white px-4 py-3 text-lg font-medium text-[var(--text-primary)] transition-all duration-200 hover:bg-[#f5f9fb] hover:text-[var(--teal-brand)]">
                                <span class="flex items-center gap-2">
                                    <span
                                        class="flex h-4 w-4 items-center justify-center text-[var(--text-primary)] transition-all duration-200 group-hover:text-[var(--teal-brand)]">
                                        <i class="fa-solid fa-caret-right text-sm" aria-hidden="true"></i>
                                    </span>
                                    Pakistan
                                </span>
                                <i class="fa-solid fa-chevron-right text-sm text-slate-300 transition-transform duration-200 group-hover:translate-x-0.5 group-hover:text-[var(--teal-brand)]"
                                    aria-hidden="true"></i>
                            </a>
                        </nav>
                    </aside>
                </div>
            </div>

        </section>
        <!-- 03. NEPAL ADVENTURE CATEGORIES -->
        <section class="relative bg-[#d7ebf3] py-14 sm:py-16 lg:py-20 overflow-hidden"
            aria-labelledby="nepal-adventures-title">
            <!-- Bottom decorative transition -->
            <div class="absolute -top-1 left-0 right-0 z-10 h-[10px] sm:h-[20px] lg:h-[30px] pointer-events-none"
                aria-hidden="true">
                <img src="./assets/img/background/decorative-design.webp" alt="Decorative design"
                    class="absolute bottom-0 left-0 h-full w-full object-cover object-bottom">
            </div>
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16 pt-6">
                <h2 id="nepal-adventures-title" class="sr-only">
                    Nepal Adventure Activities and Tour Packages
                </h2>
                <!-- 4 COLUMN CARD GRID -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 lg:gap-4">
                    <!-- CARD 01 — EXPEDITION  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    PEAK CLIMBING
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 02 — TREKKING  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    TREKKING
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 03 — CLIMBING  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    CLIMBING
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 04 — HELICOPTER TOUR  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    HELICOPTER TOUR
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 05 — CULTURAL TOUR  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    CULTURAL TOUR
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 06 — BIKING  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    BIKING
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 07 — CLIMBING  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    CLIMBING
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                    <!-- CARD 08 — JUNGLE SAFARI  -->
                    <a href="expedition.php" aria-label="Explore Nepal Expedition packages"
                        class="group block overflow-hidden rounded-[10px] border-2 border-[#d1d5db] bg-white p-2.5 shadow-sm transition-all duration-300 hover:shadow-lg">
                        <!-- Image -->
                        <div class="relative h-[300px] overflow-hidden rounded-[4px] sm:h-[310px] md:h-[320px]">
                            <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                alt="Mountain expedition in Nepal" width="900" height="560" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                            <!-- Popular Badge -->
                            <span
                                class="absolute left-5 top-5 rounded-[7px] bg-white px-4 py-2 text-[13px] font-normal uppercase tracking-wide text-[var(--text-primary)] shadow-md">
                                POPULAR
                            </span>
                        </div>
                        <!-- Card Content -->
                        <div class="px-1.5 pb-2.5 pt-3">
                            <!-- Title with Lines -->
                            <div class="flex items-center gap-2">
                                <span class="w-[20px] shrink-0 h-px bg-[var(--primary)]"></span>
                                <h3
                                    class="shrink-0 text-[22px] font-semibold uppercase leading-none tracking-tight text-[var(--primary)] sm:text-[23px]">
                                    JUNGLE SAFARI
                                </h3>
                                <span class="h-px flex-1 bg-[var(--primary)]"></span>
                            </div>
                            <!-- Package Count -->
                            <div
                                class="mt-2 flex items-center gap-2 text-[18px] font-semibold uppercase text-[var(--primary)] sm:text-[19px]">
                                <span class="flex h-[20px] w-[20px] shrink-0 items-center justify-center">
                                    <i class="fa-solid fa-list translate-y-[-1px] text-[17px] leading-none"
                                        aria-hidden="true"></i>
                                </span>
                                <span class="leading-none">15 PACKAGES</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>

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
