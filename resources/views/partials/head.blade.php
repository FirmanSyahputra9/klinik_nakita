<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link rel="dns-prefetch" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">

<link rel="canonical" href="{{ url()->current() }}">

<meta name="description"
    content="{{ $description ?? 'Klinik Nakita – Klinik kesehatan terpercaya dengan layanan medis modern, profesional, dan ramah keluarga.' }}">

<meta name="keywords"
    content="{{ $keywords ?? 'klinik, klinik nakita, dokter, layanan kesehatan, konsultasi dokter, pengobatan, kesehatan ibu, kesehatan anak' }}">

<meta name="author" content="Klinik Nakita">
<meta name="copyright" content="Klinik Nakita">

<meta name="robots"
    content="{{ $robots ?? 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1' }}">
<meta name="googlebot" content="index, follow">
<meta name="bingbot" content="index, follow">

@php
    $ogImageUrl = $ogImage ?? url('storage/img/klinik.jpg');
@endphp

<meta property="og:title" content="{{ $title ?? config('app.name') }}">
<meta property="og:description"
    content="{{ $description ?? 'Klinik Nakita – Layanan medis lengkap dan terpercaya untuk keluarga Anda.' }}">
<meta property="og:image" content="{{ $ogImageUrl }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:site_name" content="Klinik Nakita">
<meta property="og:locale" content="id_ID">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title ?? config('app.name') }}">
<meta name="twitter:description"
    content="{{ $description ?? 'Klinik Nakita – Klinik kesehatan modern dan profesional.' }}">
<meta name="twitter:image" content="{{ $ogImageUrl }}">
<meta name="twitter:site" content="@kliniknakita">
<meta name="twitter:creator" content="@kliniknakita">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Permissions-Policy" content="interest-cohort=()">
<meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">

@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    @font-face {
        font-family: 'Poppins';
        src: url('/font/Poppins/Poppins-Regular.ttf') format('truetype');
        font-weight: 400;
        font-display: swap;
    }

    @font-face {
        font-family: 'Poppins';
        src: url('/font/Poppins/Poppins-Medium.ttf') format('truetype');
        font-weight: 500;
        font-display: swap;
    }

    @font-face {
        font-family: 'Poppins';
        src: url('/font/Poppins/Poppins-Bold.ttf') format('truetype');
        font-weight: 700;
        font-display: swap;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    [x-cloak] {
        display: none !important;
    }
</style>

<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'MedicalClinic',
    'name' => 'Klinik Nakita',
    'url' => url('/'),
    'image' => url('storage/img/klinik.jpg'),
    'description' => 'Klinik Nakita – Klinik kesehatan terpercaya dan modern.',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Jl. Contoh No. 123',
        'addressLocality' => 'Kota Anda',
        'addressRegion' => 'Indonesia',
        'postalCode' => '00000',
        'addressCountry' => 'ID',
    ],
    'telephone' => '+62-812-3456-7890',
    'openingHours' => 'Mo-Su 08:00-21:00',
    'medicalSpecialty' => [
        'GeneralPractice',
        'Pediatrics',
        'Obstetrics',
        'Dermatology'
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>

@fluxAppearance
