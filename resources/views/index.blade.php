<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | {{ config('app.name', 'Laravel') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite('resources/css/app.css')

    <style>

    @font-face {
        font-family: 'Poppins';
        src: url('/font/Poppins/Poppins-Regular.ttf') format('truetype');
        font-weight: 400;
    }

    @font-face {
        font-family: 'Poppins';
        src: url('/font/Poppins/Poppins-Medium.ttf') format('truetype');
        font-weight: 500;
    }

    @font-face {
        font-family: 'Poppins';
        src: url('/font/Poppins/Poppins-Bold.ttf') format('truetype');
        font-weight: 700;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    </style>
    
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col items-center justify-center p-6 lg:p-8 transition-colors duration-300">

    {{-- Header / Navbar --}}
    @if (Route::has('login'))
        <header class="absolute top-6 right-6">
            <nav class="flex items-center gap-3">
                @auth
                    <a href="{{ Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin' ? route('dashboard') : (Auth::user()->role === 'doctor' ? route('dashboarddokter') : route('dashboarduser')) }}"
                        class="px-5 py-2 rounded-md text-sm font-medium bg-[#1b1b18] text-white dark:bg-[#EDEDEC] dark:text-[#0a0a0a] hover:opacity-90 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 rounded-md text-sm font-medium border border-[#1b1b18]/20 dark:border-[#EDEDEC]/30 hover:bg-[#1b1b18] hover:text-white dark:hover:bg-[#EDEDEC] dark:hover:text-[#0a0a0a] transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-2 rounded-md text-sm font-medium bg-[#1b1b18] text-white dark:bg-[#EDEDEC] dark:text-[#0a0a0a] hover:opacity-90 transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        </header>
    @endif

    {{-- Main Section --}}
    <main class="flex flex-col lg:flex-row items-center w-full max-w-5xl gap-10 mt-20 lg:mt-0">
        {{-- Left Content --}}
        <div class="flex-1 text-center lg:text-left space-y-6">
            <h1 class="text-4xl lg:text-5xl font-semibold leading-tight">
                Selamat Datang di <span class="text-[#f53003] dark:text-[#FF4433]"> Klinik Nakita</span>
            </h1>
            <p class="text-[#6b6a67] dark:text-[#A1A09A] text-lg max-w-lg mx-auto lg:mx-0">
                Melayani Dari Hati
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin' ? route('dashboard') : (Auth::user()->role === 'doctor' ? route('dashboarddokter') : route('dashboarduser')) }}"
                            class="px-6 py-3 bg-[#1b1b18] text-white dark:bg-[#EDEDEC] dark:text-[#0a0a0a] rounded-md font-medium hover:opacity-90 transition">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-[#f53003] text-white rounded-md font-medium hover:bg-[#d92800] transition">
                            Masuk Sekarang
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-6 py-3 border border-[#f53003] text-[#f53003] dark:text-[#FF4433] dark:border-[#FF4433] rounded-md font-medium hover:bg-[#f53003] hover:text-white transition">
                                Daftar Akun
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        {{-- Right Illustration --}}
        <div class="flex-1">
            <div
                class="w-full h-[320px] lg:h-[420px] bg-gradient-to-tr from-[#fff2f2] to-[#fde8e8] dark:from-[#1D0002] dark:to-[#2b0005] rounded-2xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 opacity-80 dark:opacity-60" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 20l9-16H3l9 16z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="mt-16 text-sm text-[#706f6c] dark:text-[#A1A09A] text-center">
        © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>

</body>

</html>
