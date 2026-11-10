<!DOCTYPE html>
<html lang="es-MX" dir="ltr" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="es-MX">

        {{-- Title --}}
        <title>{{ $seo['title'] ?? config('app.name', 'Audire Audiología') }}</title>

        {{-- SEO Meta Tags --}}
        <meta name="description" content="{{ $seo['description'] ?? 'Audire Audiología: especialistas en salud auditiva, diagnóstico y rehabilitación. Auxiliares auditivos, audiometrías y más.' }}">
        <meta name="keywords" content="{{ $seo['keywords'] ?? 'audiología, auxiliares auditivos, salud auditiva' }}">
        <meta name="author" content="Audire Audiología">
        <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="googlebot" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">

        {{-- Geo Meta Tags --}}
        <meta name="geo.region" content="MX-CMX">
        <meta name="geo.placename" content="Ciudad de México">
        <meta name="geo.position" content="19.4904;-99.1286">
        <meta name="ICBM" content="19.4904, -99.1286">

        {{-- Hreflang --}}
        <link rel="alternate" hreflang="es-MX" href="{{ url()->current() }}">
        <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

        {{-- Open Graph / Facebook --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $seo['title'] ?? config('app.name', 'Audire Audiología') }}">
        <meta property="og:description" content="{{ $seo['description'] ?? 'Audire Audiología: especialistas en salud auditiva.' }}">
        <meta property="og:image" content="{{ asset('img/logos/audire_ico2.png') }}">
        <meta property="og:image:width" content="512">
        <meta property="og:image:height" content="512">
        <meta property="og:image:alt" content="Audire Audiología - Especialistas en Salud Auditiva">
        <meta property="og:locale" content="es_MX">
        <meta property="og:site_name" content="Audire Audiología">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] ?? config('app.name', 'Audire Audiología') }}">
        <meta name="twitter:description" content="{{ $seo['description'] ?? 'Audire Audiología: especialistas en salud auditiva.' }}">
        <meta name="twitter:image" content="{{ asset('img/logos/audire_ico2.png') }}">
        <meta name="twitter:image:alt" content="Audire Audiología - Especialistas en Salud Auditiva">

        {{-- Theme Color --}}
        <meta name="theme-color" content="#00B3A4">
        <meta name="msapplication-TileColor" content="#00B3A4">

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ asset('img/logos/audire_ico2.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('img/logos/audire_ico2.png') }}">

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        {{-- DNS Prefetch for external resources --}}
        <link rel="dns-prefetch" href="https://fonts.bunny.net">
        <link rel="dns-prefetch" href="https://fonts.googleapis.com">
        <link rel="dns-prefetch" href="https://www.google.com">

        {{-- Google Fonts: Raleway --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap">

        {{-- Google reCAPTCHA v2 --}}
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        {{-- Preload critical assets --}}
        <link rel="preload" as="image" href="{{ asset('img/logos/audire_ico2.png') }}">

        {{-- Styles / Scripts --}}
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        {{-- JSON-LD Structured Data --}}
        @php
            $ldMedical = [
                '@context' => 'https://schema.org',
                '@type' => 'MedicalBusiness',
                'name' => 'Audire Audiología',
                'description' => $seo['description'] ?? 'Especialistas en diagnóstico, tratamiento y rehabilitación auditiva.',
                'url' => url('/'),
                'logo' => asset('img/logos/audire_ico2.png'),
                'image' => asset('img/logos/audire_ico2.png'),
                'telephone' => '+52 55 1162 1285',
                'priceRange' => '$$',
                'currenciesAccepted' => 'MXN',
                'paymentAccepted' => 'Efectivo, Tarjeta de crédito, Tarjeta de débito, Transferencia',
                'medicalSpecialty' => 'Audiología',
                'areaServed' => [
                    '@type' => 'City',
                    'name' => 'Ciudad de México',
                ],
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Av. Lindavista 251, 2do Piso',
                    'addressLocality' => 'Ciudad de México',
                    'addressRegion' => 'CDMX',
                    'postalCode' => '07300',
                    'addressCountry' => 'MX',
                ],
                'geo' => [
                    '@type' => 'GeoCoordinates',
                    'latitude' => 19.4904,
                    'longitude' => -99.1286,
                ],
                'openingHoursSpecification' => [
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                        'opens' => '09:00',
                        'closes' => '18:00',
                    ],
                    [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => 'Saturday',
                        'opens' => '09:00',
                        'closes' => '14:00',
                    ],
                ],
                'availableService' => [
                    [
                        '@type' => 'MedicalProcedure',
                        'name' => 'Audiometría tonal liminar',
                        'description' => 'Estudio para evaluar la capacidad auditiva mediante tonos puros.',
                    ],
                    [
                        '@type' => 'MedicalProcedure',
                        'name' => 'Tamiz auditivo neonatal',
                        'description' => 'Prueba de detección temprana de problemas auditivos en recién nacidos.',
                    ],
                    [
                        '@type' => 'MedicalProcedure',
                        'name' => 'Adaptación de auxiliares auditivos',
                        'description' => 'Proceso personalizado de selección y ajuste de auxiliares auditivos.',
                    ],
                    [
                        '@type' => 'MedicalProcedure',
                        'name' => 'Potenciales evocados auditivos',
                        'description' => 'Estudio electrofisiológico para evaluar la vía auditiva.',
                    ],
                    [
                        '@type' => 'MedicalProcedure',
                        'name' => 'Impedanciometría',
                        'description' => 'Evaluación de la función del oído medio para detectar problemas de conducción del sonido.',
                    ],
                    [
                        '@type' => 'MedicalProcedure',
                        'name' => 'Emisiones otoacústicas',
                        'description' => 'Prueba objetiva que evalúa la función de las células ciliadas externas del oído interno.',
                    ],
                ],
                'sameAs' => [],
            ];

            $ldBreadcrumb = [
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => array_values(array_filter([
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Inicio',
                        'item' => url('/'),
                    ],
                    request()->path() !== '/' ? [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => ucfirst(str_replace('-', ' ', request()->segment(1))),
                        'item' => url()->current(),
                    ] : null,
                ])),
            ];

            $ldWebsite = [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => 'Audire Audiología',
                'url' => url('/'),
                'description' => 'Especialistas en salud auditiva, diagnóstico y rehabilitación auditiva en Ciudad de México.',
                'inLanguage' => 'es-MX',
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => 'Audire Audiología',
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => asset('img/logos/audire_ico2.png'),
                    ],
                ],
            ];
        @endphp
        <script type="application/ld+json">{!! json_encode($ldMedical, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

        {{-- JSON-LD BreadcrumbList --}}
        <script type="application/ld+json">{!! json_encode($ldBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

        {{-- JSON-LD WebSite --}}
        <script type="application/ld+json">{!! json_encode($ldWebsite, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>

        {{-- Page-specific structured data --}}
        @stack('structured-data')
    </head>
    <body class="antialiased">