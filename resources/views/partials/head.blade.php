<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


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

@fluxAppearance
