<div class="topbar-bg text-[17px] py-2 px-4 sm:px-6 md:px-8 lg:px-16 xl:px-20 font-normal tracking-wide border-b border-slate-800">
    <div class="max-w-8xl mx-auto flex flex-col lg:flex-row justify-between items-center gap-2 lg:gap-4">

        <!-- LEFT DETAILS -->
        <div class="w-full lg:w-auto flex flex-nowrap items-center justify-center lg:justify-start gap-2 sm:gap-4 text-slate-300">
            <!-- Registration Number -->
            <span class="flex items-center gap-1.5 sm:gap-2 hover:text-sky-300 text-white transition-colors whitespace-nowrap text-xs sm:text-base">
                <i class="fa-solid fa-circle-user text-sky-400 text-xs sm:text-2xl flex-shrink-0 leading-none"></i>
                <span>
                    Regd. No:
                    {{ $setting->reg_no }}
                </span>
            </span>
            <!-- Separator -->
            <span class="text-slate-600 text-xs sm:text-base">|</span>
            <!-- Tourism License -->
            <span class="flex items-center gap-1.5 sm:gap-2 hover:text-sky-300 text-white transition-colors whitespace-nowrap text-xs sm:text-base">
                <i class="fa-solid fa-id-card text-sky-400 text-xs sm:text-2xl flex-shrink-0 leading-none"></i>
                <span>
                    Tourism License:
                    {{ $setting->license_no }}
                </span>
            </span>
        </div>

        <!-- Middle DETAILS - Hidden on Mobile -->
        <div class="hidden sm:flex w-full lg:w-auto flex-wrap items-center justify-center lg:justify-end gap-3 sm:gap-5 text-slate-300">
            <span class="flex items-center gap-2 hover:text-sky-300 transition-colors text-white whitespace-nowrap">
                <i class="fa-solid fa-clock text-base sm:text-2xl text-sky-400 flex-shrink-0 leading-none"></i>
                <span>24hrs Support</span>
            </span>
            <a class="flex items-center gap-2 hover:text-sky-300 transition-colors text-white whitespace-nowrap">
                <i class="fa-brands fa-whatsapp text-base sm:text-2xl text-sky-400 flex-shrink-0 leading-none"></i>
                <span>{{ $setting->fax }}</span>
            </a>
        </div>

        <!-- SOCIAL ICONS - Hidden on Mobile -->
        <div class="hidden sm:flex w-full lg:w-auto flex-wrap items-center justify-center lg:justify-end gap-3 sm:gap-5 text-slate-300">
            <div class="flex items-center gap-2.5 lg:ml-2 lg:border-l lg:border-slate-700 lg:pl-4">
                <a href="{{ $setting->facebook_link }}" aria-label="Facebook" class="w-7 h-7 p-1 rounded-full bg-white hover:bg-primary flex items-center justify-center transition-all text-sky-600" target="_blank">
                    <i class="fa-brands fa-facebook-f text-base sm:text-lg flex-shrink-0 leading-none"></i>
                </a>
                <a href="{{ $setting->linkedin_link }}" aria-label="LinkedIn" class="w-7 h-7 p-1 rounded-full bg-white hover:bg-sky-500 flex items-center justify-center transition-all text-sky-600" target="_blank">
                    <i class="fa-brands fa-linkedin-in text-base sm:text-lg flex-shrink-0 leading-none"></i>
                </a>
                <a href="{{ $setting->youtube_link }}" aria-label="YouTube" class="w-7 h-7 p-1 rounded-full bg-white hover:bg-red-600 flex items-center justify-center transition-all text-sky-600" target="_blank">
                    <i class="fa-brands fa-youtube text-base sm:text-lg flex-shrink-0 leading-none"></i>
                </a>
                <a href="{{ $setting->instagram_link }}" aria-label="Instagram" class="w-7 h-7 p-1 rounded-full bg-white hover:bg-pink-600 flex items-center justify-center transition-all text-sky-600" target="_blank">
                    <i class="fa-brands fa-instagram text-base sm:text-lg flex-shrink-0 leading-none"></i>
                </a>
            </div>
        </div>
    </div>
</div>
