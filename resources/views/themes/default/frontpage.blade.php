@extends('themes.default.common.master')
@section('title', $setting->site_name)
@section('meta_keyword', $setting->meta_key)
@section('meta_description', $setting->meta_description)
@section('content')

    <main>
        <section class="relative min-h-[80svh] md:min-h-[85vh] lg:min-h-[85vh] overflow-hidden bg-slate-900">
            <div id="hero-bg"
                class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-all duration-700 z-0 opacity-100"
                style="background-image: url('https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1920&q=80');">
            </div>
            <video id="hero-video" class="hidden absolute inset-0 w-full h-full object-cover z-0" autoplay muted loop
                playsinline>
                <source src="{{asset('theme-assets/video/hero-video.mp4')}}" type="video/mp4">
            </video>
            <div class="hero-top-vignette absolute top-0 left-0 right-0 h-56 z-10 pointer-events-none"></div>
            <div class="hero-bottom-vignette absolute bottom-0 left-0 right-0 h-80 z-10 pointer-events-none"></div>
            <div class="relative z-10"></div>
            <div class="absolute bottom-0 left-0 right-0 z-20 pb-4 sm:pb-6 lg:pb-8">
                <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-10 lg:px-16">
                    <div
                        class="w-full bg-white/95 backdrop-blur-md border border-white shadow-[0_15px_15px_-5px_rgba(0,0,0,0.20)]">
                        <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-0 md:gap-6">
                            <div class="space-y-1 flex-1 p-4 sm:p-5 md:p-4">
                                <span id="hero-tag"
                                    class="block text-[15px] sm:text-[18px] md:text-[20px] lg:text-[23px] font-semibold font-black uppercase tracking-wider text-[var(--figma-navy)]">TRENDING
                                    EXPEDITION</span>
                                <h1 id="hero-title"
                                    class="text-xl sm:text-2xl md:text-2xl lg:text-[34px] font-bold text-[var(--teal-brand)] leading-tight tracking-tight">
                                    MERA PEAK CLIMBING</h1>
                                <p id="hero-desc"
                                    class="text-xs sm:text-sm md:text-[17px] text-black font-medium leading-relaxed max-w-5xl">
                                    Mera Peak climbing is one of the more comfortable and quickest mountains for Peak
                                    climbing in Nepal.</p>
                            </div>
                            <a href="./join-a-group.php"
                                class="hero-explore-btn shrink-0 md:w-auto justify-center md:justify-start"
                                aria-label="Explore Mera Peak Climbing">
                                <span class="hero-explore-icon" aria-hidden="true">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </span>
                                <span>EXPLORE MORE</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  2. WELCOME TO SATORI ADVENTURES SECTION -->
        <section class="py-2 sm:py-4 md:py-6 lg:py-8 bg-white relative">
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="flex items-center gap-6 w-full lg:w-1/2">
                        <div class="hidden sm:block text-[20px] font-bold vertical-experience-text shrink-0 pr-4 py-2">
                            <span class="text-[var(--teal-brand)]">
                                SINCE 2010 -
                            </span>
                            <span class="text-[#222222]">
                                15 YEARS OF EXPERIENCE
                            </span>
                        </div>
                        <!-- Trust & Recognition Grid -->
                        <div class="grid grid-cols-3 sm:grid-cols-3 gap-x-3 gap-y-8 sm:gap-x-12 sm:gap-y-12 flex-1">
                            <!-- BEST PRICES -->
                            <div class="text-center">
                                <div
                                    class="h-[90px] sm:h-[120px] bg-[#EDEDED] rounded-[14px] flex items-center justify-center hover:bg-slate-200/70 transition-colors duration-300">
                                    <img src="assets/img/trust/best-price-guarantee.webp" alt="Best Price Guarantee"
                                        width="125" height="100" loading="lazy" decoding="async"
                                        class="w-[95px] h-[75px] object-contain sm:w-[125px] sm:h-[100px]">
                                </div>
                                <span
                                    class="block mt-3 text-[14px] leading-none font-semibold text-[--var(--primary)] uppercase tracking-tight">
                                    BEST
                                    <span class="text-[var(--teal-brand)]">PRICES</span>
                                </span>
                            </div>

                            <!-- EXPERT TEAM -->
                            <div class="text-center">
                                <div
                                    class="h-[90px] sm:h-[120px] bg-[#EDEDED] rounded-[14px] flex items-center justify-center hover:bg-slate-200/70 transition-colors duration-300">
                                    <img src="assets/img/trust/expert-travel-team.webp" alt="Expert Travel Team"
                                        width="125" height="100" loading="lazy" decoding="async"
                                        class="w-[95px] h-[75px] object-contain sm:w-[125px] sm:h-[100px]">
                                </div>
                                <span
                                    class="block mt-3 text-[14px] leading-none font-semibold text-[--var(--primary)] uppercase tracking-tight">
                                    EXPERT
                                    <span class="text-[var(--teal-brand)]">TEAM</span>
                                </span>
                            </div>

                            <!-- TRIPADVISOR -->
                            <div class="text-center">
                                <div
                                    class="h-[90px] sm:h-[120px] bg-[#EDEDED] rounded-[14px] flex items-center justify-center hover:bg-slate-200/70 transition-colors duration-300">
                                    <img src="assets/img/trust/tripadvisor-recommended.webp"
                                        alt="Recommended on Tripadvisor" width="125" height="100" loading="lazy"
                                        decoding="async" class="w-[95px] h-[75px] object-contain sm:w-[125px] sm:h-[100px]">
                                </div>
                                <span
                                    class="block mt-3 text-[14px] leading-none font-semibold text-[--var(--primary)] uppercase tracking-tight">
                                    RECOMMEND
                                    <span class="text-[var(--teal-brand)]">ON</span>
                                </span>
                            </div>

                            <!-- MEDIA COVERAGE -->
                            <div class="text-center">
                                <div
                                    class="h-[90px] sm:h-[120px] bg-[#EDEDED] rounded-[14px] flex items-center justify-center hover:bg-slate-200/70 transition-colors duration-300">
                                    <img src="assets/img/trust/media-coverage.webp" alt="Media Coverage" width="125"
                                        height="100" loading="lazy" decoding="async"
                                        class="w-[95px] h-[75px] object-contain sm:w-[125px] sm:h-[100px]">
                                </div>
                                <span
                                    class="block mt-3 text-[14px] leading-none font-semibold text-[--var(--primary)] uppercase tracking-tight">
                                    MEDIA
                                    <span class="text-[var(--teal-brand)]">COVERAGE</span>
                                </span>
                            </div>

                            <!-- CLIENT SATISFACTION -->
                            <div class="text-center">
                                <div
                                    class="h-[90px] sm:h-[120px] bg-[#EDEDED] rounded-[14px] flex items-center justify-center hover:bg-slate-200/70 transition-colors duration-300">
                                    <img src="assets/img/trust/client-satisfaction.webp" alt="Client Satisfaction"
                                        width="125" height="100" loading="lazy" decoding="async"
                                        class="w-[95px] h-[75px] object-contain sm:w-[125px] sm:h-[100px]">
                                </div>
                                <span
                                    class="block mt-3 text-[14px] leading-none font-semibold text-[--var(--primary)] uppercase tracking-tight">
                                    CLIENT
                                    <span class="text-[var(--teal-brand)]">SATISFACTION</span>
                                </span>
                            </div>

                            <!-- PETIT FUTÉ -->
                            <div class="text-center">
                                <div
                                    class="h-[90px] sm:h-[120px] bg-[#EDEDED] rounded-[14px] flex items-center justify-center hover:bg-slate-200/70 transition-colors duration-300">
                                    <img src="assets/img/trust/petit-fute-featured.webp" alt="Featured on Petit Futé"
                                        width="125" height="100" loading="lazy" decoding="async"
                                        class="w-[95px] h-[75px] object-contain sm:w-[125px] sm:h-[100px]">
                                </div>
                                <span
                                    class="block mt-3 text-[14px] leading-none font-semibold text-[--var(--primary)] uppercase tracking-tight">
                                    FEATURED
                                    <span class="text-[var(--teal-brand)]">ON</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 space-y-6">
                        <div class="space-y-1">
                            <h2 class="text-xl lg:text-[35px] font-black text-slate-900 uppercase">
                                WELCOME TO
                            </h2>
                            <h2
                                class="text-3xl lg:text-[42px] font-black text-[var(--teal-brand)] uppercase tracking-tight">
                                SATORI ADVENTURES
                            </h2>
                        </div>
                        <p class="text-black font-normal text-base md:text-base leading-relaxed text-justify">
                            Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking,
                            hiking and adventure holidays in Nepal, Tibet, Bhutan and Northern India. We offer innovative
                            adventures ranging from the life changing experience of the Everest Base Camp.
                        </p>
                        <p class="text-black font-normal text-base md:text-base leading-relaxed text-justify">
                            The word "Satori" in the Zen Buddhist tradition refers to a flash of sudden awareness, or
                            individual enlightenment and is considered a "first step" or embarkation towards nirvana. Satori
                            refers to a deep, abiding insight in which someone sees and understands the true nature of the
                            universe and of reality itself.
                        </p>
                        <div class="pt-1 pb-4">
                            <a href="./about.php" class="btn-view-more">
                                <span>VIEW MORE </span>
                                <span
                                    class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                    <i class="fa-solid fa-arrow-right">
                                    </i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 3. 8000M MOUNTAIN EXPEDITION SECTION -->
        <section class="expedition-8000">
            <!-- MOUNTAIN TRANSITION -->
            <div class="about-8000-mountain hidden md:block" aria-hidden="true">
                <img src="assets/img/background/mountain-bg.webp" alt="Decorative Mountain">
            </div>
            <!-- 8000M TOP WHITE AREA -->
            <div class="expedition-8000-top">
                <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                    <!-- SECTION HEADER -->
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
                        <div class="space-y-2 border-l-8 border-[var(--teal-brand)] pl-4">
                            <h2
                                class="text-2xl md:text-[42px] font-black text-[var(--teal-brand)] uppercase tracking-tight">
                                8000M MOUNTAIN EXPEDITION
                            </h2>
                            <p class="text-[17px] md:text-[17px] text-black font-normal">
                                Perfect for climbers seeking group adventure, shared costs & guided support
                            </p>
                        </div>
                        <a href="./8000-region.php" class="btn-join-group">
                            <span>
                                VIEW MORE
                            </span>
                            <span
                                class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>

                    <!-- FIRST 6 CARDS -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php for ($i = 0; $i < 6; $i++) {
                            @include('themes.default.layouts.expedition_card');
                        } ?>
                    </div>

                </div>
            </div>

            <!-- BLUE MOUNTAIN TRANSITION -->
            <div class="mountain-transition-7000">
                <div class="mountain-transition-bg"></div>
                <div class="relative z-10">
                    <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                        <!-- THIRD ROW OF 8000M CARDS -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <?php for ($i = 0; $i < 3; $i++) {
                                @include('themes.default.layouts.expedition_card');
                            } ?>
                        </div>
                        <!-- 7000M TITLE -->
                        <div class="seven-thousand-heading">
                            <h2>
                                7000M MOUNTAIN EXPEDITION
                            </h2>
                            <p>
                                Perfect for climbers seeking group adventure, shared costs & guided support
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 4. 7000M MOUNTAIN EXPEDITION -->
        <!-- WHITE CARD AREA BELOW WAVE -->
        <section class="expedition-7000-cards">
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- CHULU WEST CLIMBING -->
                    <?php for ($i = 0; $i < 6; $i++) {
                        @include('themes.default.layouts.expedition_card');
                    } ?>
                </div>
                <div class="flex justify-center pt-10">
                    <a href="./8000-region.php" class="btn-join-group">
                        <span class="uppercase">
                            VIEW MORE
                        </span>
                        <span
                            class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                            <i class="fa-solid fa-arrow-right">
                            </i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- MOUNTAIN TRANSITION -->

        <!-- 5. 6000M MOUNTAIN EXPEDITION SECTION -->
        <section class="relative bg-white py-6 sm:py-8 md:py-10 lg:py-12">
            <div class="mx-auto max-w-8xl px-5 sm:px-8 lg:px-12 xl:px-16">
                <!-- SECTION HEADER -->
                <div class="mb-12 flex flex-col justify-between gap-4 md:flex-row md:items-end">
                    <!-- Navigation Buttons -->
                    <div class="order-2 flex items-center gap-2 md:order-1 z-10">
                        <button type="button"
                            class="expedition-prev flex h-10 w-10 items-center justify-center rounded-xl border border-slate-300 bg-white text-lg font-bold text-slate-700 shadow-sm transition-all duration-300 hover:border-[var(--teal-brand)] hover:bg-slate-100 hover:text-[var(--teal-brand)] disabled:cursor-not-allowed disabled:opacity-40"
                            aria-label="Previous mountain expeditions">
                            <i class="fa-solid fa-chevron-left">
                            </i>
                        </button>
                        <button type="button"
                            class="expedition-next flex h-10 w-10 items-center justify-center rounded-xl border border-slate-300 bg-white text-lg font-bold text-slate-700 shadow-sm transition-all duration-300 hover:border-[var(--teal-brand)] hover:bg-slate-100 hover:text-[var(--teal-brand)] disabled:cursor-not-allowed disabled:opacity-40"
                            aria-label="Next mountain expeditions">
                            <i class="fa-solid fa-chevron-right">
                            </i>
                        </button>
                    </div>
                    <!-- Section Heading -->
                    <div class="order-1 space-y-1 border-r-8 border-[var(--brown-brand)] pr-4 text-right md:order-2">
                        <h2 class="text-2xl font-bold uppercase tracking-tight text-[var(--brown-brand)] md:text-[42px]">
                            6000M MOUNTAIN EXPEDITION
                        </h2>
                        <p class="text-[17px] font-normal text-[var(--brown-brand)] md:text-[17px]">
                            Perfect for climbers seeking group adventure, shared costs & guided support
                        </p>
                    </div>
                </div>
                <!-- SWIPER  -->
                <div class="swiper expedition-swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < 12; $i++) { ?>
                        <div class="swiper-slide h-auto">
                            @include('themes.default.layouts.expedition_card')
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- View More -->
                <div class="flex justify-center pt-10">
                    <a href="./8000-region.php" class="btn-join-group">
                        <span class="uppercase">
                            VIEW MORE
                        </span>
                        <span
                            class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                            <i class="fa-solid fa-arrow-right">
                            </i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- 6. TREKKING REGIONS SECTION (Clear Text-Only Overlays) -->
        <section class="py-8 text-white relative">
            <!-- <div class="absolute left-0 right-0 top-[80px] sm:top-[-220px] pointer-events-none -z-10">
                <img src="assets/img/background/trekking-in-nepal.webp" alt="TREKKING REGIONS" aria-hidden="true" width="1200" height="250" loading="lazy" decoding="async" class="w-full h-full object-cover object-center">
            </div> -->
            <div
                class="absolute left-0 right-0 top-[80px] sm:top-[-100px] md:top-[-150px] lg:top-[-220px] pointer-events-none -z-10">
                <img src="assets/img/background/trekking-in-nepal.webp" alt="TREKKING REGIONS" aria-hidden="true"
                    width="1200" height="250" loading="lazy" decoding="async"
                    class="w-full h-full object-cover object-center">
            </div>
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16 relative z-10">
                <div class="space-y-1 border-l-8 border-[var(--brown-brand)] pl-4 mb-28 sm:mb-44">
                    <h2 class="text-3xl md:text-[42px] font-bold text-[var(--brown-brand)] uppercase tracking-tight">
                        TREKKING REGIONS
                    </h2>
                    <p class="text-[17px] font-normal text-[var(--brown-brand)] md:text-[17px]">
                        Explore the Himalayan Adventures
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <!-- Left Tall Vertical Card -->
                    <div
                        class="lg:col-span-1 lg:row-span-2 min-h-[500px] rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80"
                                alt="Mount Everest region and Himalayan landscape in Nepal"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-8">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    EVEREST REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Dhaulagiri Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Dhaulagiri Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                alt="Dhaulagiri Region" width="800" height="500" loading="lazy" decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    DHAULAGIRI REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Makalu Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                alt="Himalayan Mountain Expedition" width="800" height="500" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    MAKALU REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Mustang Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80"
                                alt="Naya Kanga Peak Climbing" width="800" height="500" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    MUSTANG REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Langtang Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                alt="Himalayan Mountain Expedition" width="800" height="500" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    LANGTANG REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Dolpa Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                alt="Himalayan Mountain Expedition" width="800" height="500" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    DOLPA REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Manaslu Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                alt="Himalayan Mountain Expedition" width="800" height="500" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    MANASLU REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                    <!-- Dolpa Region -->
                    <div class="h-60 rounded-[10px] overflow-hidden relative group region-card">
                        <a href="./everest-region.php" aria-label="Explore the Everest Region trekking destinations">
                            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                alt="Himalayan Mountain Expedition" width="800" height="500" loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                            <div class="region-card-overlay absolute inset-0 flex items-end p-4">
                                <h3 class="text-2xl font-semibold uppercase text-white tracking-wider">
                                    DOLPA REGION
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- 7. FEATURED TREKS SECTION -->
        <section class="py-6 sm:py-8 md:py-10 lg:py-12 bg-white relative">
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center gap-4">
                        <svg class="w-9 h-9 text-[var(--primary)] fill-current" viewBox="0 0 24 24">
                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                        </svg>
                        <h2 class="text-3xl md:text-[42px] font-bold text-[var(--primary)] uppercase tracking-tight">
                            FEATURED TREKS
                        </h2>
                        <svg class="w-9 h-9 text-[var(--primary)] fill-current" viewBox="0 0 24 24">
                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                        </svg>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <?php for ($i = 0; $i < 3; $i++) {
                        @include('themes.default.layouts.expedition_card');
                    } ?>
                </div>
                <div class="flex justify-center pt-10">
                    <a href="./8000-region.php" class="btn-join-group">
                        <span class="uppercase">
                            VIEW MORE
                        </span>
                        <span
                            class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                            <i class="fa-solid fa-arrow-right">
                            </i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- 8. TOUR IN NEPAL SECTION -->
        <section class="py-16 relative overflow-hidden tour-nepal-section">
            <div class="absolute inset-0 -top-32 bg-cover bg-center pointer-events-none opacity-[0.4]"
                style="background-image: url('assets/img/background/tour-in-nepal-new.jpg');"></div>
            <!-- <div class="absolute inset-0 -top-32 bg-cover bg-center pointer-events-none opacity-[0.4]" style="background-image: url('assets/img/background/tour-in-nepal.webp');"></div> -->
            <!-- <div class="tour-nepal-flags"></div> -->
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16 relative z-10">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
                    <div class="hidden md:block">
                    </div>
                    <div class="flex items-center gap-6 self-end">
                        <div class="text-right">
                            <!-- Heading and Subtitle -->
                            <div class="space-y-1 border-r-8 border-[var(--brown-brand)] pr-4">
                                <h2
                                    class="text-3xl md:text-[42px] font-bold text-[var(--brown-brand)] uppercase tracking-tight">
                                    TOUR IN NEPAL
                                </h2>
                                <p class="text-[17px] font-normal text-[var(--brown-brand)] md:text-[17px]">
                                    Explore the Rich Cultural Experience
                                </p>
                            </div>
                            <!-- VIEW MORE Button - No Right Border -->
                            <a href="./nepal.php" class="btn-join-group mt-6">
                                <span class="uppercase">
                                    VIEW MORE
                                </span>
                                <span
                                    class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                    <i class="fa-solid fa-arrow-right">
                                    </i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <?php for ($i = 0; $i < 3; $i++) {
                        @include('themes.default.layouts.expedition_card');
                    } ?>
                </div>
            </div>
        </section>

        <!-- 9. WHAT OUR CLIENT SAYS SECTION -->
        <section class="py-16 bg-white relative">
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-12">
                    <div class="space-y-1 border-l-8 border-[var(--teal-brand)] pl-4">
                        <h2 class="text-3xl md:text-[42px] font-bold text-[var(--teal-brand)] uppercase tracking-tight">
                            WHAT OUR CLIENT SAYS
                        </h2>
                        <p class="text-[17px] md:text-[17px] text-black font-normal">
                            Real Experience With Real Adventures
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button type="button"
                            class="review-toggle w-[55px] h-[55px] rounded-md bg-sky-100 flex items-center justify-center hover:bg-sky-200/80 transition-colors"
                            data-review="google">
                            <svg class="w-6 h-6" viewBox="0 0 24 24">
                                <path fill="#4285F4"
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="#34A853"
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="#FBBC05"
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                                <path fill="#EA4335"
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                            </svg>
                        </button>
                        <button type="button"
                            class="review-toggle w-[55px] h-[55px] rounded-md bg-[#D9D9D9] flex items-center justify-center hover:bg-slate-200 transition-colors"
                            data-review="tripadvisor">
                            <img src="./assets/img/logo/icon-trip-advisor.webp" alt="Trip Advisor Icon" loading="lazy">
                        </button>
                    </div>
                </div>
                <div id="googleReviews" class="review-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Card 1 -->
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <!-- Same Google SVG -->
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-label="Google review">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC05"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                                </svg>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            JONAS TOMSON
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed line-clamp-3">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="4" data-platform="Google" data-date="March 18, 2026"
                                data-review="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                        <!-- Card 1 -->
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <!-- Same Google SVG -->
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-label="Google review">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC05"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                                </svg>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            JONAS TOMSON
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed line-clamp-3">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="4" data-platform="Google" data-date="March 18, 2026"
                                data-review="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                        <!-- Card 1 -->
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <!-- Same Google SVG -->
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-label="Google review">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC05"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                                </svg>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            JONAS TOMSON
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed line-clamp-3">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="4" data-platform="Google" data-date="March 18, 2026"
                                data-review="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                        <!-- Card 1 -->
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <!-- Same Google SVG -->
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-label="Google review">
                                    <path fill="#4285F4"
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                    <path fill="#34A853"
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                    <path fill="#FBBC05"
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                                    <path fill="#EA4335"
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                                </svg>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            JONAS TOMSON
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed line-clamp-3">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="4" data-platform="Google" data-date="March 18, 2026"
                                data-review="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                    </div>
                </div>
                <div id="tripadvisorReviews" class="review-content hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Card 2 -->
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor review"
                                    class="h-5 w-5 object-contain">
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            Alen Smith
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="5" data-platform="TripAdvisor" data-date="March 18, 2026"
                                data-review="Satori Adventures provided an excellent trekking experience. The team was professional, friendly and extremely helpful throughout the journey."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor review"
                                    class="h-5 w-5 object-contain">
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            Alen Smith
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="5" data-platform="TripAdvisor" data-date="March 18, 2026"
                                data-review="Satori Adventures provided an excellent trekking experience. The team was professional, friendly and extremely helpful throughout the journey."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor review"
                                    class="h-5 w-5 object-contain">
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            Alen Smith
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="5" data-platform="TripAdvisor" data-date="March 18, 2026"
                                data-review="Satori Adventures provided an excellent trekking experience. The team was professional, friendly and extremely helpful throughout the journey."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                        <div
                            class="relative bg-white rounded-[10px] p-6 border border-slate-200 shadow-md hover:shadow-xl transition-all space-y-4 flex flex-col justify-between z-20">
                            <div class="absolute right-3 top-3 z-10">
                                <img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor review"
                                    class="h-5 w-5 object-contain">
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-slate-300 shrink-0">
                                        <img class="rounded-full" src="https://i.pravatar.cc/150?img=12"
                                            alt=" Test user image" loading="lazy">
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-[25px] text-[var(--teal-brand)] uppercase">
                                            Alen Smith
                                        </h3>
                                        <div class="flex gap-1 text-amber-500 text-[13px]">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-[17px] text-black font-normal leading-relaxed">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 1" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 2" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 3" class="w-full h-[75px] object-cover rounded-md">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=300&q=80"
                                    alt="Memory 4" class="w-full h-[75px] object-cover rounded-md">
                            </div>
                            <button type="button"
                                class="review-details-btn mt-2 text-sm font-semibold text-[var(--teal-brand)] hover:underline"
                                data-reviewer="JONAS TOMSON" data-reviewer-image="https://i.pravatar.cc/150?img=12"
                                data-rating="5" data-platform="TripAdvisor" data-date="March 18, 2026"
                                data-review="Satori Adventures provided an excellent trekking experience. The team was professional, friendly and extremely helpful throughout the journey."
                                data-images='[
                                    "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=800&q=85",
                                    "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=85"
                                ]'>
                                Read full review
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center pt-10">
                    <a href="./client-reviews.php" class="btn-join-group">
                        <span class="uppercase">
                            VIEW MORE
                        </span>
                        <span
                            class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                            <i class="fa-solid fa-arrow-right">
                            </i>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        @include('themes.default.layouts.review_modal')
        <!-- 10. SATORI EXPERIENCE SECTION -->
        <section id="satori-experience" class="relative py-16">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="./assets/img/background/bg-tours.webp" alt="" class="w-full h-full object-cover">
                <!-- Screenshot-style white overlay -->
                <div class="absolute inset-0 opacity-0.3">
                </div>
            </div>
            <!-- Main Content -->
            <div class="relative z-10 max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                <div class="text-center max-w-4xl mx-auto mb-10 md:mb-12">
                    <h2
                        class="text-3xl sm:text-[#42px] md:text-[42px] font-bold text-[var(--teal-brand)] uppercase tracking-tight leading-none">
                        SATORI EXPERIENCE
                    </h2>
                    <!-- Subtitle -->
                    <p class="text-[17px] md:text-[17px] text-black font-normal">
                        Real Experience With Real Adventures
                    </p>
                    <div
                        class="mt-8 inline-flex flex-nowrap items-center justify-center gap-1 rounded-full p-1.5 text-sm font-semibold uppercase sm:gap-1.5 sm:text-sm md:text-sm lg:text-[16px]">
                        <button type="button"
                            class="experience-tab shrink-0 whitespace-nowrap bg-slate-200 px-2.5 py-2 sm:px-4 sm:py-2.5 md:px-5 md:py-2.5 lg:px-6 lg:py-3 active"
                            data-tab="experience">
                            SATORI EXPERIENCE
                        </button>
                        <button type="button"
                            class="experience-tab shrink-0 whitespace-nowrap bg-slate-200 px-2.5 py-2 sm:px-4 sm:py-2.5 md:px-5 md:py-2.5 lg:px-6 lg:py-3"
                            data-tab="diaries">
                            SUMMIT DIARIES
                        </button>
                        <button type="button"
                            class="experience-tab shrink-0 whitespace-nowrap bg-slate-200 px-2.5 py-2 sm:px-4 sm:py-2.5 md:px-5 md:py-2.5 lg:px-6 lg:py-3"
                            data-tab="gallery">
                            GALLERY
                        </button>
                    </div>
                    <!-- Description -->
                    <p class="mt-7 text-[19px] sm:text-[19px] text-black max-w-4xl mx-auto leading-relaxed font-medium">
                        Unfiltered views and emotions from the summits, shared by the climbers and Sherpas who made it
                        possible. And understands the true nature of the universe and of reality itself.
                    </p>
                </div>
                <!-- CONTENT CONTAINER  -->
                <div id="experienceContent">
                    <!--  SATORI EXPERIENCE -->
                    <div class="experience-panel" data-panel="experience">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                            <!-- VIDEO 1 -->
                            <div class="flex flex-col">
                                <button type="button" class="experience-card group"
                                    data-video="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                    data-title="Q&A EVEREST | LHOTSE Spring 2026">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden border border-slate-300 shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=900&q=85"
                                            alt="Q&A Everest Lhotse Spring 2026"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <!-- Dark overlay -->
                                        <div
                                            class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-colors duration-300">
                                        </div>
                                        <!-- Play Button -->
                                        <span class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white text-[var(--region-dark)] shadow-xl transition-transform duration-300 group-hover:scale-110">
                                                <i class="fa-solid fa-play text-sm ml-0.5">
                                                </i>
                                            </span>
                                        </span>
                                        <!-- Video Label -->
                                        <!-- <span class="absolute bottom-3 left-3 right-3 bg-[var(--region-dark)]/85 backdrop-blur-md rounded-md px-3 py-2 text-white text-[11px] sm:text-xs font-bold text-left">
                                              Q&A EVEREST | LHOTSE Spring 2026
                                         </span> -->
                                    </div>
                                </button>
                                <!-- TEXT BELOW CARD -->
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                            <!-- VIDEO 2 -->
                            <div class="flex flex-col">
                                <button type="button" class="experience-card group"
                                    data-video="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                    data-title="Climber Experience">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden border border-slate-300 shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=900&q=85"
                                            alt="Climber Experience"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div
                                            class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-colors duration-300">
                                        </div>
                                        <span class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white text-[var(--region-dark)] shadow-xl transition-transform duration-300 group-hover:scale-110">
                                                <i class="fa-solid fa-play text-sm ml-0.5">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                </button>
                                <!-- TEXT BELOW CARD -->
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                            <!-- VIDEO 3 -->
                            <div class="flex flex-col">
                                <button type="button" class="experience-card group"
                                    data-video="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                    data-title="Manaslu Expedition Experience">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden border border-slate-300 shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=85"
                                            alt="Manaslu Expedition Experience"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div
                                            class="absolute inset-0 bg-black/20 group-hover:bg-black/30 transition-colors duration-300">
                                        </div>
                                        <span class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white text-[var(--region-dark)] shadow-xl transition-transform duration-300 group-hover:scale-110">
                                                <i class="fa-solid fa-play text-sm ml-0.5">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                </button>
                                <!-- TEXT BELOW CARD -->
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SUMMIT DIARIES -->
                    <div class="experience-panel hidden" data-panel="diaries">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                            <div class="flex flex-col">
                                <button type="button" class="experience-card group"
                                    data-video="https://www.youtube.com/embed/dQw4w9WgXcQ"
                                    data-title="Everest Summit Diary">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden border border-slate-300 shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=85"
                                            alt="Everest Summit Diary"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black/20">
                                        </div>
                                        <span class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="flex items-center justify-center w-14 h-14 rounded-full bg-white text-[var(--region-dark)] shadow-xl group-hover:scale-110 transition-transform">
                                                <i class="fa-solid fa-play ml-0.5">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                </button>
                                <!-- TEXT BELOW CARD -->
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <button type="button" class="experience-card group"
                                    data-video="https://www.youtube.com/embed/dQw4w9WgXcQ" data-title="Life Above 8000M">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden border border-slate-300 shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=85"
                                            alt="Life Above 8000M"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black/20">
                                        </div>
                                        <span class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="flex items-center justify-center w-14 h-14 rounded-full bg-white text-[var(--region-dark)] shadow-xl group-hover:scale-110 transition-transform">
                                                <i class="fa-solid fa-play ml-0.5">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                </button>
                                <!-- TEXT BELOW CARD -->
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <button type="button" class="experience-card group"
                                    data-video="https://www.youtube.com/embed/dQw4w9WgXcQ" data-title="Sherpa Stories">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden border border-slate-300 shadow-lg">
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=900&q=85"
                                            alt="Sherpa Stories"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black/20">
                                        </div>
                                        <span class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="flex items-center justify-center w-14 h-14 rounded-full bg-white text-[var(--region-dark)] shadow-xl group-hover:scale-110 transition-transform">
                                                <i class="fa-solid fa-play ml-0.5">
                                                </i>
                                            </span>
                                        </span>
                                    </div>
                                </button>
                                <!-- TEXT BELOW CARD -->
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="experience-panel hidden" data-panel="gallery">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            <div class="flex flex-col">
                                <button type="button" class="gallery-card group" data-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1400&q=90" data-title="Himalayan Adventure">
                                    <div class="relative h-[198px] rounded-lg overflow-hidden shadow-lg border border-slate-300">
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=900&q=85" alt="Himalayan Adventure" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                </button>

                                <div class="mt-3 px-1 text-center">
                                    <h3 class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <button type="button" class="gallery-card group" data-image="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=1400&q=90" data-title="Mountain Expedition">
                                    <div class="relative h-[198px] rounded-lg overflow-hidden shadow-lg border border-slate-300">
                                        <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=900&q=85" alt="Mountain Expedition" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                </button>

                                <div class="mt-3 px-1 text-center">
                                    <h3 class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <button type="button" class="gallery-card group" data-image="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1400&q=90" data-title="Nepal Himalayas">
                                    <div class="relative h-[198px] rounded-lg overflow-hidden shadow-lg border border-slate-300">
                                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=85" alt="Nepal Himalayas" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                </button>

                                <div class="mt-3 px-1 text-center">
                                    <h3 class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="experience-panel hidden" data-panel="gallery">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            <!-- IMAGE 1 -->
                            <div class="flex flex-col">
                                <button type="button" class="gallery-card group" data-gallery-item
                                    data-gallery-group="experience-gallery"
                                    data-gallery-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1400&q=90"
                                    data-gallery-title="Q&A EVEREST | LHOTSE Spring 2026">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden shadow-lg border border-slate-300">
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=900&q=85"
                                            alt="Q&A EVEREST | LHOTSE Spring 2026"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                </button>
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>

                            <!-- IMAGE 2 -->
                            <div class="flex flex-col">
                                <button type="button" class="gallery-card group" data-gallery-item
                                    data-gallery-group="experience-gallery"
                                    data-gallery-image="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=1400&q=90"
                                    data-gallery-title="Q&A EVEREST | LHOTSE Spring 2026">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden shadow-lg border border-slate-300">
                                        <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=900&q=85"
                                            alt="Q&A EVEREST | LHOTSE Spring 2026"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                </button>
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>

                            <!-- IMAGE 3 -->
                            <div class="flex flex-col">
                                <button type="button" class="gallery-card group" data-gallery-item
                                    data-gallery-group="experience-gallery"
                                    data-gallery-image="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1400&q=90"
                                    data-gallery-title="Q&A EVEREST | LHOTSE Spring 2026">
                                    <div
                                        class="relative h-[198px] rounded-lg overflow-hidden shadow-lg border border-slate-300">
                                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=85"
                                            alt="Q&A EVEREST | LHOTSE Spring 2026"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    </div>
                                </button>
                                <div class="mt-3 px-1 text-center">
                                    <h3
                                        class="text-sm font-semibold uppercase tracking-wide text-[var(--teal-brand)] sm:text-base">
                                        Q&A EVEREST | LHOTSE Spring 2026
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center pt-10">
                    <a href="./gallery.php" class="btn-join-group">
                        <span class="uppercase">
                            VIEW MORE
                        </span>
                        <span
                            class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                            <i class="fa-solid fa-arrow-right">
                            </i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
        <!-- VIDEO MODAL  -->
        <div id="videoModal"
            class="fixed inset-0 z-[9999] hidden items-center justify-center bg-[#06111c]/80 backdrop-blur-sm p-4"
            aria-hidden="true">
            <div id="videoModalContent"
                class="relative w-full max-w-5xl bg-[var(--region-dark)] rounded-xl shadow-2xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-4 sm:px-6 py-3 border-b border-white/10">
                    <h3 id="videoModalTitle" class="text-sm sm:text-base font-bold text-white uppercase">
                        SATORI EXPERIENCE
                    </h3>
                    <button type="button" id="closeVideoModal"
                        class="w-8 h-8 rounded-full bg-white/10 hover:bg-white text-white hover:text-[var(--region-dark)] flex items-center justify-center transition-all duration-300 hover:rotate-90"
                        aria-label="Close video">
                        <i class="fa-solid fa-xmark">
                        </i>
                    </button>
                </div>
                <!-- Video -->
                <div class="relative aspect-video bg-black">
                    <iframe id="videoIframe" src="" title="Satori Experience Video"
                        class="absolute inset-0 w-full h-full"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
        <!--  IMAGE MODAL  -->

        @include('themes.default.layouts.gallery_image_model')
        <!-- 11. SATORI SUMMITS EVENTS SECTION -->
        <section class="py-6 sm:py-8 md:py-10 lg:py-12 bg-white relative overflow-hidden">
            <div class="max-w-8xl mx-auto px-5 sm:px-8 lg:px-12 xl:px-16">
                <!-- SECTION HEADER -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-12">
                    <!-- LEFT -->
                    <div class="space-y-1 border-l-8 border-[var(--teal-brand)] pl-4">
                        <h2
                            class="text-3xl md:text-[42px] font-black text-[var(--teal-brand)] uppercase tracking-tight leading-none">
                            SATORI SUMMITS EVENTS
                        </h2>
                        <p class="text-[17px] md:text-[17px] text-black font-normal">
                            Join Us To Know More About Us
                        </p>
                    </div>
                    <!-- VIEW MORE -->
                    <a href="./join-a-group.php" class="btn-join-group self-start md:self-auto">
                        <span>
                            VIEW MORE
                        </span>
                        <span
                            class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
                <!-- SWIPER -->
                <div class="swiper satori-events-swiper">
                    <div class="swiper-wrapper">
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- EVENT 1 -->
                        <div class="swiper-slide event-slide" data-event-title="EVEREST EXPEDITION ON 2026 EVENT"
                            data-event-date="2027-03-18" data-event-status="UPCOMING EVENT"
                            data-event-description="Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering, trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan"
                            data-event-image="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=90">
                            <div
                                class="relative flex h-[380px] cursor-pointer flex-col overflow-hidden rounded-[10px] border border-slate-200 bg-[#0B3853] shadow-xl">
                                <!-- IMAGE -->
                                <div class="relative h-[270px] shrink-0 overflow-hidden">
                                    <img src="./assets/img/background/submit-events.webp"
                                        alt="Everest Expedition on 2026 Event"
                                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    <!-- <div class="event-card-overlay absolute inset-0"></div> -->
                                    <!-- UPCOMING -->
                                    <div class="absolute left-6 top-5 z-10">
                                        <span
                                            class="rounded-md bg-white/90 px-3 py-1.5 text-[13px] font-normal uppercase text-slate-900 shadow-sm">
                                            UPCOMING
                                        </span>
                                    </div>
                                </div>
                                <!-- FOOTER -->
                                <div class="flex flex-1 flex-col justify-center bg-[#0B3853] px-6 py-3 text-white">
                                    <p class="flex items-center gap-1.5 text-[15px] font-normal">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        2027-03-18
                                    </p>
                                    <h3 class="mt-2 text-lg font-semibold uppercase leading-tight">
                                        EVEREST EXPEDITION ON 2026 EVENT
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PAGINATION -->
                    <div class="swiper-pagination satori-events-pagination">
                    </div>
                </div>
            </div>
        </section>
        <!-- SATORI EVENT DETAILS MODAL -->
        <div id="eventDetailsModal" class="event-modal rounded-md fixed inset-0 z-[9999] hidden" aria-hidden="true">
            <!-- Backdrop -->
            <div id="eventModalBackdrop" class="absolute inset-0 bg-[#071b2d]/75 backdrop-blur-sm">
            </div>
            <!-- Modal Wrapper -->
            <div class="relative z-10 flex min-h-full items-center justify-center p-4 sm:p-6 lg:p-8">
                <!-- Modal -->
                <div id="eventModalBox"
                    class="relative w-full max-w-4xl bg-white overflow-hidden rounded-md shadow-2xl opacity-0 scale-95 transition-all duration-300">
                    <!-- MODAL HEADER -->
                    <div class="relative flex items-center justify-center bg-[#0b2a43] px-12 py-5 sm:py-6">
                        <h2
                            class="text-xl sm:text-xl md:text-[22px] font-black text-white uppercase tracking-tight text-center">
                            SATORI ADVENTURES EVENTS
                        </h2>
                        <!-- Close -->
                        <button type="button" id="closeEventModal"
                            class="absolute right-4 sm:right-6 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-white/10 hover:bg-white text-white hover:text-[#0b2a43] flex items-center justify-center transition-all duration-300 hover:rotate-90"
                            aria-label="Close event details">
                            <i class="fa-solid fa-xmark">
                            </i>
                        </button>
                    </div>
                    <!-- MODAL BODY -->
                    <div class="p-6 sm:p-8 lg:p-10">
                        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-7 lg:gap-9 items-center">
                            <!-- EVENT IMAGE -->
                            <div class="w-full rounded-lg overflow-hidden bg-slate-100">
                                <img id="eventModalImage" src="" alt=""
                                    class="w-[315px] h-[193px] object-cover transition-opacity duration-300">
                            </div>
                            <!-- EVENT DETAILS -->
                            <div class="flex flex-col items-start justify-center">
                                <!-- Status -->
                                <span id="eventModalStatus"
                                    class="inline-flex items-center bg-[#3b82b6] text-white px-3 py-1.5 rounded-lg text-xs sm:text-sm font-medium uppercase">
                                    UPCOMING EVENT
                                </span>
                                <!-- Title -->
                                <h3 id="eventModalTitle"
                                    class="mt-2 text-xl sm:text-2xl lg:text-[22px] font-black font-semibold text-[#102f49] uppercase leading-tight">
                                    EVEREST EXPEDITION ON 2026 EVENT
                                </h3>
                                <!-- Date -->
                                <div class="flex items-center gap-3">
                                    <span class="text-[var(--teal-brand)] text-lg">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </span>
                                    <span id="eventModalDate" class="text-base sm:text-base text-slate-800 font-medium">
                                        2027-03-18
                                    </span>
                                </div>
                                <!-- Description -->
                                <p id="eventModalDescription"
                                    class="mt-4 text-base sm:text-base text-slate-900 leading-relaxed">
                                    Satori Adventures (P) Ltd specializes in guiding and logistics for mountaineering,
                                    trekking, hiking and adventure holidays in Nepal, Tibet, Bhutan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 12. LATEST NEWS & BLOGS + FAQ SECTION -->
        <section class="relative bg-blog-blue py-6 sm:py-8 md:py-10 lg:py-12 text-white sm:py-14 lg:py-16">
            <div class="mx-auto max-w-8xl px-5 sm:px-8 lg:px-12 xl:px-16">
                <!-- SECTION HEADER -->
                <div class="mx-auto mb-10 max-w-2xl space-y-2 text-center sm:mb-12 lg:mb-14">
                    <h2 class="text-3xl font-black uppercase tracking-tight text-white md:text-4xl">
                        LATEST NEWS & BLOGS
                    </h2>
                    <p class="text-base font-medium text-white md:text-[17px]">
                        Tips, Guides And Stories From Himalayas
                    </p>
                </div>
                <div
                    class="grid grid-cols-1 gap-8 md:grid-cols-[minmax(0,2fr)_minmax(0,1fr)] md:grid-rows-[auto_auto] md:gap-x-4 md:gap-y-8 lg:gap-x-6">
                    <!-- BLOG GROUP -->
                    <div class="contents">
                        <!-- BLOG CONTENT -->
                        <div class="order-1 min-w-0 md:row-start-1">
                            <div class="space-y-4 sm:space-y-5">
                                <!-- BLOG CARD 1 -->
                                <article
                                    class="flex min-w-0 flex-col gap-4 rounded-[10px] border border-white/20 bg-faq-box p-3 shadow-xl sm:flex-row sm:items-center sm:gap-5 sm:p-4">
                                    <!-- IMAGE -->
                                    <div
                                        class="relative h-32 w-full shrink-0 overflow-hidden rounded-xl sm:h-36 sm:w-40 md:h-36 md:w-40 lg:w-44">
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=400&q=80"
                                            alt="Rare High-Altitude Rescue In Dhaulagiri 2026" loading="lazy"
                                            decoding="async"
                                            class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                                        <span
                                            class="absolute left-2 top-2 rounded-[4px] bg-blog-blue px-2 py-0.5 text-[10px] font-black uppercase text-white sm:text-[11px]">
                                            TREKKING GUIDE
                                        </span>
                                    </div>
                                    <!-- CONTENT -->
                                    <div class="flex min-w-0 flex-1 flex-col">
                                        <h3 class="text-[17px] font-semibold leading-snug sm:text-[18px] lg:text-[20px]">
                                            Rare High-Altitude Rescue In Dhaulagiri 2026
                                        </h3>
                                        <p
                                            class="mt-2 line-clamp-3 text-[13px] font-normal leading-relaxed text-[#f1f1f2] sm:text-[14px]">
                                            Mountaineering in the Himalayas, compared to other mountain ranges, is widely
                                            regarded as one of the most challenging and hazardous pursuits in the world.
                                        </p>
                                        <div
                                            class="mt-auto flex flex-wrap items-center justify-between gap-x-3 gap-y-2 pt-3 text-[12px] font-normal text-[#f1f1f2] sm:text-[13px]">
                                            <span class="whitespace-nowrap">
                                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                                2027-03-18
                                            </span>
                                            <a href="./blog-details.php"
                                                class="whitespace-nowrap font-semibold text-white hover:underline">
                                                READ MORE
                                                <i class="fa-solid fa-circle-arrow-right ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                                <!-- BLOG CARD 2 -->
                                <article
                                    class="flex min-w-0 flex-col gap-4 rounded-[10px] border border-white/20 bg-faq-box p-3 shadow-xl sm:flex-row sm:items-center sm:gap-5 sm:p-4">
                                    <!-- IMAGE -->
                                    <div
                                        class="relative h-32 w-full shrink-0 overflow-hidden rounded-xl sm:h-36 sm:w-40 md:h-36 md:w-40 lg:w-44">
                                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=400&q=80"
                                            alt="Rare High-Altitude Rescue In Dhaulagiri 2026" loading="lazy"
                                            decoding="async"
                                            class="h-full w-full object-cover transition-transform duration-700 hover:scale-105">
                                        <span
                                            class="absolute left-2 top-2 rounded-[4px] bg-blog-blue px-2 py-0.5 text-[10px] font-black uppercase text-white sm:text-[11px]">
                                            TREKKING GUIDE
                                        </span>
                                    </div>
                                    <!-- CONTENT -->
                                    <div class="flex min-w-0 flex-1 flex-col">
                                        <h3 class="text-[17px] font-semibold leading-snug sm:text-[18px] lg:text-[20px]">
                                            The Everest 'Triple Crown' Journey Of Satori Adventures
                                        </h3>
                                        <p
                                            class="mt-2 line-clamp-3 text-[13px] font-normal leading-relaxed text-[#f1f1f2] sm:text-[14px]">
                                            Mountaineering in the Himalayas, compared to other mountain ranges, is widely
                                            regarded as one of the most challenging and hazardous pursuits in the world.
                                        </p>
                                        <div
                                            class="mt-auto flex flex-wrap items-center justify-between gap-x-3 gap-y-2 pt-3 text-[12px] font-normal text-[#f1f1f2] sm:text-[13px]">
                                            <span class="whitespace-nowrap">
                                                <i class="fa-solid fa-calendar-days mr-1">
                                                </i>
                                                2027-03-18
                                            </span>
                                            <a href="./blog-details.php"
                                                class="whitespace-nowrap font-semibold text-white hover:underline">
                                                READ MORE
                                                <i class="fa-solid fa-circle-arrow-right ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <!-- BLOG BUTTON -->
                        <div class="order-2 flex items-start md:row-start-2">
                            <a href="./blogs.php" class="btn-white-pill inline-flex max-w-full items-center">
                                <span>
                                    VIEW MORE
                                </span>
                                <span
                                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border-2 border-[#BFBFBF] bg-[var(--primary)] text-[17px] text-white">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                        <!-- FAQ PANEL -->
                        <div class="order-3 min-w-0 md:row-start-1">
                            <div
                                class="h-full min-w-0 rounded-[10px] border border-white/20 bg-faq-box p-4 shadow-xl sm:p-5 md:p-6 lg:p-7">
                                <!-- FAQ TITLE -->
                                <div class="border-b-2 border-white/60 pb-4">
                                    <h3 class="text-[18px] font-semibold leading-tight sm:text-[19px] lg:text-[20px]">
                                        Frequently Asked Questions
                                    </h3>
                                </div>
                                <!-- FAQ LIST -->
                                <div id="faqAccordion" class="mt-2">
                                    <!-- FAQ 1 -->
                                    <div class="faq-item border-b border-[#266F8B]">
                                        <button type="button"
                                            class="faq-trigger flex w-full min-w-0 items-center justify-between gap-3 py-4 text-left"
                                            aria-expanded="false">
                                            <span class="min-w-0">
                                                <span
                                                    class="mb-2 inline-block rounded-[4px] bg-blog-blue px-2 py-0.5 text-[10px] font-normal uppercase text-white sm:text-[11px]">
                                                    EXPEDITION
                                                </span>
                                                <span
                                                    class="block break-words text-[14px] font-semibold leading-snug sm:text-[15px] lg:text-[16px]">
                                                    What Is The Best Trekking Season?
                                                </span>
                                            </span>
                                            <i
                                                class="faq-icon fa-solid fa-chevron-down shrink-0 text-xs transition-transform duration-300"></i>
                                        </button>
                                        <div
                                            class="faq-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300">
                                            <div class="min-h-0 overflow-hidden">
                                                <p
                                                    class="pb-4 text-[12px] font-normal leading-relaxed text-[#f1f1f2] sm:text-[13px] lg:text-[14px]">
                                                    The best trekking seasons in Nepal are generally spring and autumn.
                                                    March to May and September to November offer stable weather, clear
                                                    mountain views, comfortable temperatures, and excellent trail
                                                    conditions.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FAQ 2 -->
                                    <div class="faq-item border-b border-[#266F8B]">
                                        <button type="button"
                                            class="faq-trigger flex w-full min-w-0 items-center justify-between gap-3 py-4 text-left"
                                            aria-expanded="false">
                                            <span class="min-w-0">
                                                <span
                                                    class="mb-2 inline-block rounded-[4px] bg-blog-blue px-2 py-0.5 text-[10px] font-normal uppercase text-white sm:text-[11px]">
                                                    EXPEDITION
                                                </span>
                                                <span
                                                    class="block break-words text-[14px] font-semibold leading-snug sm:text-[15px] lg:text-[16px]">
                                                    What Is Cost Of The Trip?
                                                </span>
                                            </span>
                                            <i
                                                class="faq-icon fa-solid fa-chevron-down shrink-0 text-xs transition-transform duration-300"></i>
                                        </button>
                                        <div
                                            class="faq-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300">
                                            <div class="min-h-0 overflow-hidden">
                                                <p
                                                    class="pb-4 text-[12px] font-normal leading-relaxed text-[#f1f1f2] sm:text-[13px] lg:text-[14px]">
                                                    The total cost depends on the destination, duration, permits,
                                                    accommodation, transportation, guides, meals, equipment, and level of
                                                    support required. Contact our team for the exact cost of your selected
                                                    trip.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FAQ 3 -->
                                    <div class="faq-item border-b border-[#266F8B]">
                                        <button type="button"
                                            class="faq-trigger flex w-full min-w-0 items-center justify-between gap-3 py-4 text-left"
                                            aria-expanded="false">
                                            <span class="min-w-0">
                                                <span
                                                    class="mb-2 inline-block rounded-[4px] bg-blog-blue px-2 py-0.5 text-[10px] font-normal uppercase text-white sm:text-[11px]">
                                                    EXPEDITION
                                                </span>
                                                <span
                                                    class="block break-words text-[14px] font-semibold leading-snug sm:text-[15px] lg:text-[16px]">
                                                    What Equipment Are Needed?
                                                </span>
                                            </span>
                                            <i
                                                class="faq-icon fa-solid fa-chevron-down shrink-0 text-xs transition-transform duration-300"></i>
                                        </button>
                                        <div
                                            class="faq-content grid grid-rows-[0fr] transition-[grid-template-rows] duration-300">
                                            <div class="min-h-0 overflow-hidden">
                                                <p
                                                    class="pb-4 text-[12px] font-normal leading-relaxed text-[#f1f1f2] sm:text-[13px] lg:text-[14px]">
                                                    Essential equipment includes suitable trekking clothing, trekking boots,
                                                    a sleeping bag, backpack, headlamp, water bottle, personal first-aid
                                                    supplies, sun protection, and equipment appropriate for the altitude and
                                                    season of the expedition.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ BUTTON -->
                        <div class="order-4 flex items-start md:row-start-2">
                            <a href="./faq.php" class="btn-white-pill inline-flex max-w-full items-center">
                                <span>
                                    VIEW MORE
                                </span>
                                <span
                                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border-2 border-[#BFBFBF] bg-[var(--primary)] text-[17px] text-white">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        const reviewToggleButtons = document.querySelectorAll('.review-toggle');
        const reviewContents = document.querySelectorAll('.review-content');

        reviewToggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                const type = button.dataset.review;

                reviewToggleButtons.forEach(btn => {
                    btn.classList.remove('bg-slate-400', 'text-white');
                    btn.classList.add('bg-slate-400', 'text-slate-600');
                });

                button.classList.remove('bg-slate-400', 'text-slate-600');
                button.classList.add('bg-slate-400', 'text-white');

                reviewContents.forEach(content => {
                    content.classList.add('hidden');
                });

                document.getElementById(`${type}Reviews`)?.classList.remove('hidden');
            });
        });

        //review model
        const reviewModal = document.getElementById('reviewModal');
        const closeReviewModal = document.getElementById('closeReviewModal');
        const reviewDetailsButtons = document.querySelectorAll('.review-details-btn');

        const googleLogo = `<svg
    class="h-7 w-7"
    viewBox="0 0 24 24"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    aria-label="Google review">
    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
    </svg>`;

        reviewDetailsButtons.forEach(button => {
            button.addEventListener('click', () => {
                const reviewer = button.dataset.reviewer;
                const reviewerImage = button.dataset.reviewerImage;
                const rating = Number(button.dataset.rating);
                const platform = button.dataset.platform;
                const date = button.dataset.date;
                const review = button.dataset.review;
                document.getElementById('modalReviewer').textContent = reviewer;
                document.getElementById('modalReviewerImage').src = reviewerImage;
                document.getElementById('modalReviewerImage').alt = reviewer;
                document.getElementById('modalPlatform').textContent = platform;
                document.getElementById('modalDate').textContent = date;
                document.getElementById('modalReview').textContent = review;
                const ratingContainer = document.getElementById('modalRating');
                ratingContainer.innerHTML = '';
                for (let i = 0; i < 5; i++) {
                    const star = document.createElement('i');
                    star.className = i < rating ? 'fa-solid fa-star' : 'fa-regular fa-star';
                    ratingContainer.appendChild(star);
                }
                const platformLogo = document.getElementById('modalPlatformLogo');
                if (platform.toLowerCase() === 'google') {
                    platformLogo.innerHTML = googleLogo;
                } else {
                    platformLogo.innerHTML =
                        `
                <img src="./assets/img/logo/icon-trip-advisor.webp" alt="TripAdvisor" class="h-8 w-auto object-contain">`;
                }
                const imagesContainer = document.getElementById('modalReviewImages');
                imagesContainer.innerHTML = '';
                let images = [];
                try {
                    images = JSON.parse(button.dataset.images || '[]');
                } catch (error) {
                    images = [];
                }
                images.forEach((image, index) => {
                    const imageWrapper = document.createElement('div');
                    imageWrapper.className =
                        'group relative aspect-[4/3] overflow-hidden rounded-lg bg-slate-100';
                    imageWrapper.innerHTML =
                        `
                <img src="${image}"  alt="Review image ${index + 1}"  loading="lazy" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">`;
                    imagesContainer.appendChild(imageWrapper);
                });
                reviewModal.classList.remove('hidden');
                reviewModal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            });
        });

        function closeReviewDetails() {
            reviewModal.classList.add('hidden');
            reviewModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }

        closeReviewModal.addEventListener('click', closeReviewDetails);
        reviewModal.addEventListener('click', event => {
            if (event.target === reviewModal) {
                closeReviewDetails();
            }
        });

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape') {
                closeReviewDetails();
            }
        });
    </script>


@stop
