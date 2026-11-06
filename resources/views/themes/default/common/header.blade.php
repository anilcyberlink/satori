<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary SEO Meta Tags -->
    <title>{{ $setting->site_name }}</title>
    <link rel="icon" type="image/webp" href="{{ asset('theme-assets/img/logo/favicon.webp') }}" sizes="any">
    <meta name="title" content="Satori Adventures - Premier Mountain Trekking & Peak Climbing in Nepal">
    <meta name="description"
        content="Satori Adventures is your expert mountain guide in the Himalayas. Book Mera Peak climbing, Everest Base Camp trek, 8000m expeditions & custom Nepal tours.">
    <meta name="keywords"
        content="Nepal Trekking, Mera Peak Climbing, Everest Base Camp, Himalayas Expedition, Satori Adventures, Mountain Biking Nepal, Annapurna Trek">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="author" content="Satori Adventures Pvt. Ltd.">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.satori-adventures.com/">
    <meta property="og:title" content="Satori Adventures - Premier Mountain Trekking & Peak Climbing">
    <meta property="og:description"
        content="Expert guided Himalayan expeditions, peak climbing, and trekking in Nepal, Tibet, Bhutan, India, and Pakistan.">
    <meta property="og:image"
        content="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: 'var(--primary)',
                        secondary: '#d71920',
                        lightbg: 'var(--light-bg)',
                        darktext: 'var(--figma-navy)',
                        bordercolor: '#d7dde5'
                    },
                    fontFamily: {
                        anek: ['Anek Tamil', 'sans-serif']
                    },
                    boxShadow: {
                        soft: '0 2px 15px rgba(0,0,0,.06)'
                    }
                }
            }
        }
    </script>
    <!-- External Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme-assets/css/styles.css') }}">
</head>

<body class="bg-white text-slate-800 antialiased selection:bg-[var(--primary)] selection:text-white">
    <!-- Top Info Bar -->
    @include('themes.default.layouts.topbar')
    <!-- Main Navigation Bar with Mega Menus -->
    @include('themes.default.layouts.navbar')
    <!-- Search Modal Overlay -->
    @include('themes.default.layouts.searchbar')
