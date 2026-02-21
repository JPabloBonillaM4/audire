<!DOCTYPE html>
<html lang="es" dir="ltr" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        {{-- Title --}}
        <title>{{ $seo['title'] ?? config('app.name', 'Audire Audiología') }}</title>

        {{-- SEO Meta Tags --}}
        <meta name="description" content="{{ $seo['description'] ?? 'Audire Audiología: especialistas en salud auditiva, diagnóstico y rehabilitación. Auxiliares auditivos, audiometrías y más.' }}">
        <meta name="keywords" content="{{ $seo['keywords'] ?? 'audiología, auxiliares auditivos, salud auditiva' }}">
        <meta name="author" content="Audire Audiología">
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="googlebot" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">

        {{-- Hreflang --}}
        <link rel="alternate" hreflang="es-MX" href="{{ url()->current() }}">
        <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

        {{-- Open Graph / Facebook --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $seo['title'] ?? config('app.name', 'Audire Audiología') }}">
        <meta property="og:description" content="{{ $seo['description'] ?? 'Audire Audiología: especialistas en salud auditiva.' }}">
        <meta property="og:image" content="{{ asset('img/logos/audire_ico2.png') }}">
        <meta property="og:image:alt" content="Audire Audiología - Logo">
        <meta property="og:locale" content="es_MX">
        <meta property="og:site_name" content="Audire Audiología">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.name', 'Audire Audiología') }}">
        <meta name="twitter:description" content="{{ $seo['description'] ?? 'Audire Audiología: especialistas en salud auditiva.' }}">
        <meta name="twitter:image" content="{{ asset('img/logos/audire_ico2.png') }}">

        {{-- Theme Color --}}
        <meta name="theme-color" content="#1a56db">
        <meta name="msapplication-TileColor" content="#1a56db">

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ asset('img/logos/audire_ico2.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('img/logos/audire_ico2.png') }}">

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">

        {{-- Preload critical assets --}}
        <link rel="preload" as="image" href="{{ asset('img/logos/audire_ico2.png') }}">

        {{-- JSON-LD Structured Data - LocalBusiness --}}
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "MedicalBusiness",
            "name": "Audire Audiología",
            "description": "{{ $seo['description'] ?? 'Especialistas en diagnóstico, tratamiento y rehabilitación auditiva.' }}",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('img/logos/audire_ico2.png') }}",
            "image": "{{ asset('img/logos/audire_ico2.png') }}",
            "telephone": "",
            "priceRange": "$$",
            "medicalSpecialty": "Audiología",
            "availableService": [
                {
                    "@type": "MedicalProcedure",
                    "name": "Audiometría tonal liminar",
                    "description": "Estudio para evaluar la capacidad auditiva mediante tonos puros."
                },
                {
                    "@type": "MedicalProcedure",
                    "name": "Tamiz auditivo neonatal",
                    "description": "Prueba de detección temprana de problemas auditivos en recién nacidos."
                },
                {
                    "@type": "MedicalProcedure",
                    "name": "Adaptación de auxiliares auditivos",
                    "description": "Proceso personalizado de selección y ajuste de auxiliares auditivos."
                },
                {
                    "@type": "MedicalProcedure",
                    "name": "Potenciales evocados auditivos",
                    "description": "Estudio electrofisiológico para evaluar la vía auditiva."
                }
            ],
            "sameAs": []
        }
        </script>

        {{-- JSON-LD BreadcrumbList --}}
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Inicio",
                    "item": "{{ url('/') }}"
                }
                @if(request()->path() !== '/')
                ,{
                    "@type": "ListItem",
                    "position": 2,
                    "name": "{{ ucfirst(str_replace('-', ' ', request()->segment(1))) }}",
                    "item": "{{ url()->current() }}"
                }
                @endif
            ]
        }
        </script>

        {{-- JSON-LD WebSite with SearchAction --}}
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Audire Audiología",
            "url": "{{ url('/') }}",
            "description": "Especialistas en salud auditiva, diagnóstico y rehabilitación auditiva.",
            "inLanguage": "es-MX"
        }
        </script>

        {{-- Styles / Scripts --}}
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="antialiased">