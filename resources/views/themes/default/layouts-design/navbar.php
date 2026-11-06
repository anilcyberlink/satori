<nav class="bg-white sticky top-0 z-[999]" aria-label="Main Navigation">
    <div class="w-full max-w-[1600px] mx-auto px-5 sm:px-8 lg:px-10 xl:px-12 2xl:px-16">
        <div class="flex items-center h-24">
            <!-- Brand Logo -->
            <a href="index.php" class="flex items-center group">
                <img src="{{ asset('theme-assets/img/logo/logo.webp') }}" alt="SATzORI ADVENTURES" loading="lazy" class="h-24 w-auto object-contain">
            </a>
            <!-- Desktop Navigation Links -->
            <div class="hidden lg:flex items-center gap-1.5 xl:gap-2 text-lg font-medium uppercase tracking-wider text-[var(--text-primary)] flex-1 justify-center">
                <!-- HOME -->
                <a href="index.php" class="nav-link text-[var(--teal-brand)] font-semibold py-2">
                    HOME
                </a>
                <span class="text-[#607382]">
                    |
                </span>
                <!-- COMPANY MEGA MENU TRIGGER -->
                <div class="relative py-7">
                    <button data-mega-target="company" class="nav-link flex items-center gap-1 py-2 uppercase hover:text-[var(--primary)]">
                        COMPANY
                    </button>
                    <!-- COMPANY MEGA MENU CONTAINER -->
                    <div data-mega-menu="company" class="mega-menu-container fixed left-0 right-0 max-w-8xl mx-auto px-12 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden mega-menu-content">
                            <div class="p-6">
                                <div class="grid grid-cols-5 gap-2">
                                    <a href="./about.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        About Us
                                    </a>
                                    <a href="./client-reviews.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Client Review
                                    </a>
                                    <a href="./gallery.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Gallery
                                    </a>
                                    <a href="./team.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Team Member
                                    </a>
                                    <a href="./terms-conditions.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Terms & Conditions
                                    </a>
                                    <a href="./why-us.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Why Us
                                    </a>
                                    <a href="./legal-document.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Legal Document
                                    </a>
                                    <a href="./faq.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Faqs
                                    </a>
                                    <a href="./message-from-us.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        Message From Us
                                    </a>
                                    <a href="./blogs.php" class="flex items-center gap-2.5 p-2 rounded-lg hover:bg-slate-50 capitalize text-[var(--text-primary)] hover:text-[var(--primary)] font-meduim text-lg transition-all">
                                        <svg class="w-4 h-4 text-[var(--primary)]" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2L7.75 10 2 18h20L14 6z" />
                                        </svg>
                                        News & Events
                                    </a>
                                </div>
                            </div>
                            <?php include __DIR__ . '/features_banner.php'; ?>
                        </div>
                    </div>
                </div>
                <span class="text-[#607382]">
                    |
                </span>
                <!-- DESTINATION MEGA MENU TRIGGER -->
                <div class="relative py-7">
                    <button data-mega-target="destination" class="nav-link flex items-center gap-1 py-2 uppercase hover:text-[var(--primary)]">
                        DESTINATION
                    </button>
                    <!-- DESTINATION MEGA MENU CONTAINER -->
                    <div data-mega-menu="destination" class="mega-menu-container fixed left-0 right-0 max-w-8xl mx-auto px-12 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden mega-menu-content">
                            <div class="flex min-h-[300px]">
                                <!-- Left Vertical Tabs -->
                                <div class="w-1/4 bg-white border-r border-slate-200 py-3">
                                    <button data-tab-group="dest" data-tab-target="nepal" class="tab-btn active w-full text-left px-6 py-2.5 flex items-center justify-between font-medium text-[19px] text-[var(--text-primary)]">
                                        NEPAL
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="dest" data-tab-target="india" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        INDIA
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="dest" data-tab-target="pakistan" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        PAKISTAN
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="dest" data-tab-target="tibet" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        TIBET
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="dest" data-tab-target="bhutan" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        BHUTAN
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Right Content Panels -->
                                <div class="w-3/4 p-6 flex flex-col justify-between">
                                    <!-- NEPAL CONTENT -->
                                    <div data-content-group="dest" data-content-id="nepal" class="space-y-6">
                                        <div class="grid grid-cols-3 gap-y-4 gap-x-6 capitalize">
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Trekking In Nepal
                                            </a>
                                            <a href="8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Educational Tour & Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Jungle Safari In Nepal
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Peak Climbing In Nepal
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Helicopter Tour In Nepal
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Tour In Nepal
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Mountain Expedition In Nepal
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Mountain Biking In Nepal
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Adventure Sport In Nepal
                                            </a>
                                        </div>
                                    </div>
                                    <!-- INDIA CONTENT -->
                                    <div data-content-group="dest" data-content-id="india" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-4 gap-x-6 capitalize">
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Ladakh Trekking
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Garhwal Expedition
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Sikkim Tour
                                            </a>
                                        </div>
                                    </div>
                                    <!-- PAKISTAN CONTENT -->
                                    <div data-content-group="dest" data-content-id="pakistan" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-4 gap-x-6 capitalize">
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                K2 Base Camp Trek
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Nanga Parbat Expedition
                                            </a>
                                        </div>
                                    </div>
                                    <!-- TIBET CONTENT -->
                                    <div data-content-group="dest" data-content-id="tibet" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-4 gap-x-6 capitalize">
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Mount Kailash Yatra
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Lhasa City Tour
                                            </a>
                                        </div>
                                    </div>
                                    <!-- BHUTAN CONTENT -->
                                    <div data-content-group="dest" data-content-id="bhutan" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-4 gap-x-6 capitalize">
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Tiger's Nest Trek
                                            </a>
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Cultural Bhutan Tour
                                            </a>
                                        </div>
                                    </div>
                                    <!-- EXPLORE ALL BUTTON -->
                                    <div class="pt-6">
                                        <a href="./nepal.php" class="btn-join-group hidden sm:inline-flex">
                                            <span>EXPLORE ALL</span>
                                            <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php include __DIR__ . '/features_banner.php'; ?>
                        </div>
                    </div>
                </div>
                <span class="text-[#607382]">
                    |
                </span>
                <!-- TREKKING MEGA MENU TRIGGER -->
                <div class="relative py-7">
                    <button data-mega-target="trekking" class="nav-link flex items-center gap-1 py-2 uppercase hover:text-[var(--primary)]">
                        TREKKING
                    </button>
                    <!-- TREKKING MEGA MENU CONTAINER -->
                    <div data-mega-menu="trekking" class="mega-menu-container fixed left-0 right-0 max-w-8xl mx-auto px-12 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden mega-menu-content">
                            <div class="flex min-h-[340px]">
                                <!-- Left Side Tabs -->
                                <div class="w-1/4 bg-white border-r border-slate-200 py-3">
                                    <button data-tab-group="trek" data-tab-target="annapurna" class="tab-btn active w-full text-left px-6 py-3.5 flex items-center justify-between font-medium text-[19px] text-[var(--text-primary)]">
                                        ANNAPURNA REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="trek" data-tab-target="everest" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        EVEREST REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="trek" data-tab-target="makalu" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        MAKALU REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="trek" data-tab-target="dolpa" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        DOLPA REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="trek" data-tab-target="mustang" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        MUSTANG REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="trek" data-tab-target="langtang" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        LANGTANG REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="trek" data-tab-target="kanchunja" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        KANCHUNJA REGION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Right Content Panels -->
                                <div class="w-3/4 p-6 flex flex-col justify-between">
                                    <div data-content-group="trek" data-content-id="annapurna" class="space-y-6">
                                        <div class="grid grid-cols-3 gap-y-3.5 gap-x-6 capitalize">
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Annapurna Base Camp Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Annapurna Circuit Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Annapurna Sanctuary Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Annapurna Biking Tou
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Ghandruk Loop Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Toannapurna Circuit Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Dhaulagiri Circuit Trekking
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Ghorepani Poon Hill Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Siklis And Ghale Gaun
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Panchase Hill Trekking
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Annapurna Khopra Danda Trek
                                            </a>
                                        </div>
                                    </div>
                                    <div data-content-group="trek" data-content-id="everest" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-3.5 gap-x-6 capitalize">
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Everest Base Camp Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Gokyo Lakes Trek
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right">
                                                    </i>
                                                </span>
                                                Everest Three Passes Trek
                                            </a>
                                        </div>
                                    </div>
                                    <div data-content-group="trek" data-content-id="makalu" class="hidden">
                                        <a href="./package-details.php" class="flex items-center gap-2 text-[19px] capitalize font-medium text-black hover:text-[var(--primary)]">
                                            <span class="text-[var(--teal-brand)] font-bold">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                            Makalu Region Treks & Expeditions
                                        </a>
                                    </div>
                                    <div data-content-group="trek" data-content-id="dolpa" class="hidden">
                                        <a href="./package-details.php" class="flex items-center gap-2 text-[19px] capitalize font-medium text-black hover:text-[var(--primary)]">
                                            <span class="text-[var(--teal-brand)] font-bold">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                            Upper & Lower Dolpa Circuit Treks
                                        </a>
                                    </div>
                                    <div data-content-group="trek" data-content-id="mustang" class="hidden">
                                        <a href="./package-details.php" class="flex items-center gap-2 text-[19px] capitalize font-medium text-black hover:text-[var(--primary)]">
                                            <span class="text-[var(--teal-brand)] font-bold">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                            Upper Mustang Restricted Area Trek
                                        </a>
                                    </div>
                                    <div data-content-group="trek" data-content-id="langtang" class="hidden">
                                        <a href="./package-details.php" class="flex items-center gap-2 text-[19px] capitalize font-medium text-black hover:text-[var(--primary)]">
                                            <span class="text-[var(--teal-brand)] font-bold">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                            Langtang Valley & Gosaikunda Lakes Trek
                                        </a>
                                    </div>
                                    <div data-content-group="trek" data-content-id="kanchunja" class="hidden">
                                        <a href="./package-details.php" class="flex items-center gap-2 text-[19px] capitalize font-medium text-black hover:text-[var(--primary)]">
                                            <span class="text-[var(--teal-brand)] font-bold">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                            Kanchenjunga North & South Base Camp
                                        </a>
                                    </div>
                                    <!-- EXPLORE ALL BUTTON -->
                                    <div class="pt-6">
                                        <a href="./8000-region.php" class="btn-join-group hidden sm:inline-flex">
                                            <span> EXPLORE ALL </span>
                                            <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php include __DIR__ . '/features_banner.php'; ?>
                        </div>
                    </div>
                </div>
                <span class="text-[#607382]">
                    |
                </span>
                <!-- CLIMBING MEGA MENU TRIGGER -->
                <div class="relative py-7">
                    <button data-mega-target="climbing" class="nav-link flex items-center gap-1 py-2 uppercase hover:text-[var(--primary)]">
                        CLIMBING
                    </button>
                    <!-- CLIMBING MEGA MENU CONTAINER -->
                    <div data-mega-menu="climbing" class="mega-menu-container fixed left-0 right-0 max-w-8xl mx-auto px-12 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden mega-menu-content">
                            <div class="flex min-h-[300px]">
                                <!-- Left Side Tabs -->
                                <div class="w-1/4 bg-white border-r border-slate-200 py-3">
                                    <button data-tab-group="climb" data-tab-target="8000m" class="tab-btn active w-full text-left px-6 py-3.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        8000M EXPEDITION
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="climb" data-tab-target="7000m" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        7000M PEAKS
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="climb" data-tab-target="6000m" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        6000M PEAK CLIMBING
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <button data-tab-group="climb" data-tab-target="multiple" class="tab-btn w-full text-left px-6 py-2.5 flex items-center justify-between font-normal text-[19px] text-[var(--text-primary)]">
                                        MULTIPLE PEAK CLIMB
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                                <!-- Right Content Panels -->
                                <div class="w-3/4 p-6 flex flex-col justify-between">
                                    <div data-content-group="climb" data-content-id="8000m" class="space-y-6">
                                        <div class="grid grid-cols-3 gap-y-3.5 gap-x-6 capitalize">
                                            <a href="./8000-region.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Everest Expedition South
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Everest Expedition North
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Kanchenjunga Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Makalu Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Lhotse Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Annapurna Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Manaslu Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Dhaulagiri Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Shishapangma Expedition
                                            </a>
                                        </div>
                                    </div>
                                    <div data-content-group="climb" data-content-id="7000m" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-3.5 gap-x-6 capitalize">
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Baruntse Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Pumori Expedition
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Himlung Himal Expedition
                                            </a>
                                        </div>
                                    </div>
                                    <div data-content-group="climb" data-content-id="6000m" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-3.5 gap-x-6 capitalize">
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Mera Peak Climbing
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Island Peak Climbing
                                            </a>
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Lobuche East Peak
                                            </a>
                                        </div>
                                    </div>
                                    <div data-content-group="climb" data-content-id="multiple" class="hidden space-y-6">
                                        <div class="grid grid-cols-3 gap-y-3.5 gap-x-6 capitalize">
                                            <a href="./package-details.php" class="flex items-center gap-2 text-[19px] font-medium text-black hover:text-[var(--primary)]">
                                                <span class="text-[var(--teal-brand)] font-bold">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </span>
                                                Mera & Island Peak Combo
                                            </a>
                                        </div>
                                    </div>
                                    <!-- EXPLORE ALL BUTTON -->
                                    <div class="pt-6">
                                        <a href="./8000-region.php" class="btn-join-group hidden sm:inline-flex">
                                            <span> EXPLORE ALL </span>
                                            <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php include __DIR__ . '/features_banner.php'; ?>
                        </div>
                    </div>
                </div>
                <!-- <span class="text-[#607382]">
                    |
                </span>
                <a href="./equipment.php" class="nav-link py-2 uppercase hover:text-[var(--primary)]">
                    EQUIPMENT
                </a>
                <span class="text-[#607382]">
                    |
                </span>
                <a href="./contact.php" class="nav-link py-2 uppercase hover:text-[var(--primary)]">
                    CONTACT
                </a> -->
            </div>
            <!-- Right Navbar CTA & Icons -->
            <div class="flex items-center gap-2 xl:gap-2 shrink-0 ml-4">
                <a href="./customize-your-trip.php" class="btn-customize-trip-group hidden sm:inline-flex">
                        Customize Your Trip
                </a>
                <a href="./join-a-group.php" class="btn-join-group hidden sm:inline-flex">
                    <span>
                        JOIN A GROUP
                    </span>
                    <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
                <!-- Search Button Trigger -->
                <button data-search-toggle class="p-2 hover:text-slate-700 text-[var(--primary)] transition-colors rounded-full hover:bg-slate-100" aria-label="Open Search">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Language Switcher -->
                <div class="relative" id="language-container">
                    <!-- Language Trigger -->
                    <button id="language-toggle" type="button" class="flex items-center gap-1.5 hover:text-slate-700 text-black cursor-pointer font-normal text-[17px] uppercase pl-3 border-l border-slate-200 transition-colors" aria-expanded="false" aria-haspopup="true">
                        <!-- Globe Icon -->
                        <svg class="w-7 h-7 text-[var(--primary)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V7a2 2 0 00-2-2h-1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>
                            EN
                        </span>
                        <!-- <i id="language-arrow" class="fa-solid fa-chevron-down text-xs ml-0.5 transition-transform duration-200"></i> -->
                    </button>
                    <!-- Language Dropdown -->
                    <div id="language-dropdown" class="hidden absolute right-0 top-full mt-3 w-24 bg-white rounded-xl border border-slate-200 shadow-xl overflow-hidden z-50">
                        <!-- English -->
                        <a href="#" class="flex items-center justify-between px-2 py-2 text-sm font-normal text-black hover:bg-slate-50 hover:text-[var(--primary)] transition-colors">
                            <span>
                                ENGLISH
                            </span>
                            <i class="fa-solid fa-check text-[var(--primary)] text-xs"></i>
                        </a>
                        <!-- Divider -->
                        <div class="mx-3 border-t border-slate-100">
                        </div>
                        <!-- French -->
                        <a href="#" class="block px-2 py-2 text-sm font-normal text-black hover:bg-slate-50 hover:text-[var(--primary)] transition-colors">
                            FRANCE
                        </a>
                        <!-- Divider -->
                        <div class="mx-3 border-t border-slate-100">
                        </div>
                        <!-- German -->
                        <a href="#" class="block px-2 py-2 text-sm font-normal text-black hover:bg-slate-50 hover:text-[var(--primary)] transition-colors">
                            GERMAN
                        </a>
                        <!-- Divider -->
                        <div class="mx-3 border-t border-slate-100">
                        </div>
                        <!-- italian -->
                        <a href="#" class="block px-2 py-2 text-sm font-normal text-black hover:bg-slate-50 hover:text-[var(--primary)] transition-colors">
                            ITALIAN
                        </a>
                        <!-- Divider -->
                        <div class="mx-3 border-t border-slate-100">
                        </div>
                        <!-- spanish -->
                        <a href="#" class="block px-2 py-2 text-sm font-normal text-black hover:bg-slate-50 hover:text-[var(--primary)] transition-colors">
                            SPANISH
                        </a>
                    </div>
                </div>
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle" class="lg:hidden p-2 text-[var(--text-primary)] hover:bg-slate-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
<!-- MOBILE NAVIGATION DRAWER -->
<div id="mobile-menu-drawer" class="hidden fixed inset-0 z-[1000] bg-slate-900/60 backdrop-blur-sm lg:hidden">
    <div class="flex h-full w-[88%] max-w-md flex-col bg-white shadow-2xl">
        <!-- MOBILE MENU HEADER -->
        <div class="flex items-center justify-between border-b border-slate-200 px-5">
            <a href="index.php" class="flex flex-1 min-w-0 items-center lg:ml-0">
                <!-- make here width auto i.e w-auto to keep the image in it's original aspect ratio but as per the client request it is made w-full for now -->
                <img src="assets/img/logo/logo.webp" alt="SATORI ADVENTURES" class="h-18 w-full max-w-full">
            </a>
            <button id="mobile-menu-close" type="button" class="ml-4 flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-[#607382] transition-transform duration-300 hover:rotate-90 hover:bg-slate-100 hover:text-[var(--text-primary)]" aria-label="Close menu">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        <!-- MOBILE MENU CONTENT -->
        <div class="flex-1 overflow-y-auto px-5 py-5">
            <div class="space-y-1">
                <!-- HOME -->
                <a href="index.php" class="flex items-center justify-between border-b border-slate-100 py-4 text-base font-semibold uppercase tracking-wide text-[var(--primary)]">
                    <span>
                        HOME
                    </span>
                    <i class="fa-solid fa-house text-sm"></i>
                </a>
                <!-- COMPANY  -->
                <div class="mobile-nav-accordion border-b border-slate-100">
                    <button type="button" class="mobile-nav-accordion-toggle flex w-full items-center justify-between py-4 text-base font-semibold uppercase tracking-wide text-[var(--text-primary)]">
                        <span>
                            COMPANY
                        </span>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-nav-accordion-content hidden pb-3">
                        <div class="space-y-1 rounded-xl bg-slate-50 p-2">
                            <a href="./about.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                About Us
                            </a>
                            <a href="./client-reviews.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Client Review
                            </a>
                            <a href="./gallery.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Gallery
                            </a>
                            <a href="./team.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Team Member
                            </a>
                            <a href="./terms-conditions.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Terms & Conditions
                            </a>
                            <a href="./why-us.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Why Us
                            </a>
                            <a href="./legal-document.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Legal Document
                            </a>
                            <a href="./faq.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                FAQs
                            </a>
                            <a href="./message-from-us.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                Message From Us
                            </a>
                            <a href="./blogs.php" class="mobile-nav-sub-link">
                                <i class="fa-solid fa-arrow-right"></i>
                                News & Events
                            </a>
                        </div>
                    </div>
                </div>
                <!-- DESTINATION -->
                <div class="mobile-nav-accordion border-b border-slate-100">
                    <button type="button" class="mobile-nav-accordion-toggle flex w-full items-center justify-between py-4 text-base font-semibold uppercase tracking-wide text-[var(--text-primary)]">
                        <span>
                            DESTINATION
                        </span>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-nav-accordion-content hidden pb-3">
                        <div class="space-y-1 rounded-xl bg-slate-50 p-2">
                            <!-- NEPAL -->
                            <div class="mobile-nav-nested-accordion">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        NEPAL
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Trekking In Nepal
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Educational Tour & Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Jungle Safari In Nepal
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Peak Climbing In Nepal
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Helicopter Tour In Nepal
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Tour In Nepal
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Mountain Expedition In Nepal
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Mountain Biking In Nepal
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Adventure Sport In Nepal
                                    </a>
                                    <a href="./nepal.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span> EXPLORE ALL </span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- INDIA -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        INDIA
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Ladakh Trekking
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Garhwal Expedition
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Sikkim Tour
                                    </a>
                                    <a href="./nepal.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- PAKISTAN -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        PAKISTAN
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        K2 Base Camp Trek
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Nanga Parbat Expedition
                                    </a>
                                    <a href="./nepal.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- TIBET -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        TIBET
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Mount Kailash Yatra
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Lhasa City Tour
                                    </a>
                                    <a href="./nepal.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- BHUTAN -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        BHUTAN
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Tiger's Nest Trek
                                    </a>
                                    <a href="./8000-region.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Cultural Bhutan Tour
                                    </a>
                                    <a href="./nepal.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TREKKING -->
                <div class="mobile-nav-accordion border-b border-slate-100">
                    <button type="button" class="mobile-nav-accordion-toggle flex w-full items-center justify-between py-4 text-base font-semibold uppercase tracking-wide text-[var(--text-primary)]">
                        <span>
                            TREKKING
                        </span>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-nav-accordion-content hidden pb-3">
                        <div class="space-y-1 rounded-xl bg-slate-50 p-2">
                            <!-- ANNAPURNA -->
                            <div class="mobile-nav-nested-accordion">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        ANNAPURNA REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Base Camp Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Circuit Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Sanctuary Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Biking Tour
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Ghandruk Loop Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Circuit Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Dhaulagiri Circuit Trekking
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Ghorepani Poon Hill Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Siklis And Ghale Gaun
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Panchase Hill Trekking
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Khopra Danda Trek
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- EVEREST -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        EVEREST REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Everest Base Camp Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Gokyo Lakes Trek
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Everest Three Passes Trek
                                    </a>
                                    <a href="./8000-region.php" class="mt-2 flex items-center justify-center gap-2 rounded-full bg-[var(--primary)] px-4 py-3 text-xs font-black uppercase text-white">
                                        EXPLORE ALL
                                        <i class="fa-solid fa-arrow-right text-[16px]"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- MAKALU -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        MAKALU REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Makalu Region Treks & Expeditions
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- DOLPA -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        DOLPA REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Upper & Lower Dolpa Circuit Treks
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- MUSTANG -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        MUSTANG REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Upper Mustang Restricted Area Trek
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- LANGTANG -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        LANGTANG REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Langtang Valley & Gosaikunda Lakes Trek
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- KANCHUNJA -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        KANCHUNJA REGION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Kanchenjunga North & South Base Camp
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CLIMBING -->
                <div class="mobile-nav-accordion border-b border-slate-100">
                    <button type="button" class="mobile-nav-accordion-toggle flex w-full items-center justify-between py-4 text-base font-semibold uppercase tracking-wide text-[var(--text-primary)]">
                        <span>
                            CLIMBING
                        </span>
                        <i class="fa-solid fa-chevron-down text-sm transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-nav-accordion-content hidden pb-3">
                        <div class="space-y-1 rounded-xl bg-slate-50 p-2">
                            <!-- 8000M -->
                            <div class="mobile-nav-nested-accordion">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        8000M EXPEDITION
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Everest Expedition South
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Everest Expedition North
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Kanchenjunga Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Makalu Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Lhotse Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Annapurna Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Manaslu Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Dhaulagiri Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Shishapangma Expedition
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- 7000M -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        7000M PEAKS
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Baruntse Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Pumori Expedition
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Himlung Himal Expedition
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- 6000M -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        6000M PEAK CLIMBING
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Mera Peak Climbing
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Island Peak Climbing
                                    </a>
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Lobuche East Peak
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <!-- MULTIPLE PEAK -->
                            <div class="mobile-nav-nested-accordion border-t border-slate-200">
                                <button type="button" class="mobile-nav-nested-toggle flex w-full items-center justify-between rounded-lg px-3 py-3 text-left text-[17px] font-semibold uppercase text-slate-800">
                                    <span>
                                        MULTIPLE PEAK CLIMB
                                    </span>
                                    <i class="fa-solid fa-chevron-down text-[16px] transition-transform duration-300"></i>
                                </button>
                                <div class="mobile-nav-nested-content hidden px-2 pb-2">
                                    <a href="./package-details.php" class="mobile-nav-sub-link">
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Mera & Island Peak Combo
                                    </a>
                                    <a href="./8000-region.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                                        <span>EXPLORE ALL</span>
                                        <span class="w-5 h-5 rounded-full border border-white/40 flex items-center justify-center text-[16px]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EQUIPMENT -->
                <a href="./equipment.php" class="flex items-center justify-between border-b border-slate-100 py-4 text-base font-semibold uppercase tracking-wide text-[var(--text-primary)]">
                    <span>
                        EQUIPMENT
                    </span>
                    <i class="fa-solid fa-arrow-right text-base"></i>
                </a>
                <!-- CONTACT  -->
                <a href="./contact.php" class="flex items-center justify-between border-b border-slate-100 py-4 text-base font-semibold uppercase tracking-wide text-[var(--text-primary)]">
                    <span>
                        CONTACT
                    </span>
                    <i class="fa-solid fa-arrow-right text-base"></i>
                </a>
                <!-- MOBILE SUPPORT + SOCIAL -->
                <div class="mt-5 rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <!-- SUPPORT -->
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[var(--primary)]/10 text-[var(--primary)]">
                                <i class="fa-solid fa-headset text-sm"></i>
                            </span>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                                    Need Assistance?
                                </p>
                                <p class="mt-0.5 text-sm font-semibold text-[var(--text-primary)]">
                                    24hrs Support
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- PHONE -->
                    <a href="tel:+9779851031006"
                        class="mt-3 flex items-center gap-2 border-t border-slate-200 pt-3 text-sm font-medium text-slate-700 transition hover:text-[var(--primary)]">
                        <i class="fa-solid fa-phone text-xs text-[var(--primary)]"></i>
                        <span>+977 9851031006</span>
                    </a>
                    <!-- SOCIAL -->
                    <div class="mt-4 flex items-center justify-between border-t border-slate-200 pt-3">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                            Follow Us
                        </span>
                        <div class="flex items-center gap-2">
                            <a href="#"
                                aria-label="Facebook"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[var(--primary)] shadow-sm ring-1 ring-slate-200 transition hover:bg-[var(--primary)] hover:text-white">
                                <i class="fa-brands fa-facebook-f text-sm"></i>
                            </a>
                            <a href="#"
                                aria-label="LinkedIn"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[var(--primary)] shadow-sm ring-1 ring-slate-200 transition hover:bg-[var(--primary)] hover:text-white">
                                <i class="fa-brands fa-linkedin-in text-sm"></i>
                            </a>
                            <a href="#"
                                aria-label="YouTube"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[var(--primary)] shadow-sm ring-1 ring-slate-200 transition hover:bg-red-600 hover:text-white">
                                <i class="fa-brands fa-youtube text-sm"></i>
                            </a>
                            <a href="#"
                                aria-label="Instagram"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-[var(--primary)] shadow-sm ring-1 ring-slate-200 transition hover:bg-pink-600 hover:text-white">
                                <i class="fa-brands fa-instagram text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  MOBILE CTA -->
        <div class="border-t border-slate-200 bg-white p-5">
            <a href="./join-a-group.php" class="btn-join-group flex w-full items-center justify-center gap-3">
                <span>
                    JOIN A GROUP
                </span>
                <span class="flex h-5 w-5 items-center justify-center rounded-full border border-white/40 text-[16px]">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
            </a>
        </div>
    </div>
</div>
