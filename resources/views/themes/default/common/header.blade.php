<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary SEO Meta Tags -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:image" content="@yield('thumbnail', asset('theme-assets/cbrlink.png'))">
    <meta property="og:image:alt" content="@yield('og_image_alt', 'Satori Adventures')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="{{ $setting->site_name }}">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('meta_description')">
    <meta name="twitter:image" content="@yield('thumbnail', asset('theme-assets/cbrlink.png'))">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- External Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme-assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/webp" href="{{ asset('theme-assets/img/logo/favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme-assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme-assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('theme-assets/favicon/site.webmanifest') }}">

    <!-- Tailwind CSS -->
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

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme-assets/css/styles.css') }}">

    {{-- GLOBAL ORGANIZATION SCHEMA --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "TravelAgency",
        "name": "Satori Advanture",
        "url": "https://",
        "logo": "{{ asset('theme-assets/cbrlink.png') }}",
        "image": "{{ asset('theme-assets/cbrlink.png') }}",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Kathmandu",
            "addressCountry": "NP"
        }
    }
    </script>
    <!-- Page Specific Schema -->
    @yield('schema')
</head>

<body class="bg-white text-slate-800 antialiased selection:bg-[var(--primary)] selection:text-white">
    <!-- Top Info Bar -->
    @include('themes.default.layouts.topbar')
    <!-- Main Navigation Bar with Mega Menus -->
    @include('themes.default.layouts.navbar')
    <!-- Search Modal Overlay -->
    @include('themes.default.layouts.searchbar')
