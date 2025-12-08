<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col transition-colors duration-300">

    {{-- Header / Navbar --}}
    {{-- UBAH DISINI: --}}
    {{-- 1. 'fixed top-0 w-full z-50': Agar nempel di atas layar & di depan elemen lain --}}
    {{-- 2. 'bg-... backdrop-blur-md': Memberikan background & efek blur (kaca) --}}
    {{-- 3. 'border-b': Garis tipis pembatas di bawah header --}}
    @if (Route::has('login'))
        <header class="fixed top-0 left-0 right-0 z-50 w-full bg-[#FDFDFC]/80 dark:bg-[#0a0a0a]/80 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-800/50 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-end items-center">
                <nav class="flex items-center gap-3">
                    @auth
                        <a href="{{ Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin' ? route('dashboard') : (Auth::user()->role === 'doctor' ? route('dashboarddokter') : route('dashboarduser')) }}"
                            class="px-5 py-2 rounded-md text-sm font-medium bg-[#1b1b18] text-white dark:bg-[#EDEDEC] dark:text-[#0a0a0a] hover:opacity-90 transition shadow-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-5 py-2 rounded-md text-sm font-medium border border-[#1b1b18]/20 dark:border-[#EDEDEC]/30 hover:bg-[#1b1b18] hover:text-white dark:hover:bg-[#EDEDEC] dark:hover:text-[#0a0a0a] transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-5 py-2 rounded-md text-sm font-medium bg-[#1b1b18] text-white dark:bg-[#EDEDEC] dark:text-[#0a0a0a] hover:opacity-90 transition shadow-sm">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>
    @endif

    {{-- Main Section --}}
    {{-- UBAH DISINI: Tambahkan 'pt-24' (padding top) agar tulisan tidak ketutupan header yang fixed --}}
    <main class="flex-1 flex flex-col lg:flex-row items-center justify-center w-full max-w-5xl gap-10 px-6 mx-auto pt-24 lg:mt-0">
     
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
                            class="px-6 py-3 bg-[#1b1b18] text-white dark:bg-[#EDEDEC] dark:text-[#0a0a0a] rounded-md font-medium hover:opacity-90 transition shadow-md">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-[#f53003] text-white rounded-md font-medium hover:bg-[#d92800] transition shadow-md shadow-orange-500/20">
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
        <div class="flex-1 w-full lg:w-auto">
            <div class="w-full h-[320px] lg:h-[420px] bg-gradient-to-tr from-[#fff2f2] to-[#fde8e8] dark:from-[#1D0002] dark:to-[#2b0005] rounded-2xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 opacity-80 dark:opacity-60" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 20l9-16H3l9 16z" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </main>


    {{-- Footer --}}
    <footer class="w-full py-6 text-sm text-[#706f6c] dark:text-[#A1A09A] text-center bg-[#FDFDFC] dark:bg-[#0a0a0a]">
        <div class="flex justify-center mb-2">
            <a href="https://www.instagram.com/kliniknakita_setialuhur?igsh=djNnZDBmNjRuMWc3" target="_blank"
                class="flex items-center gap-2 text-[#f53003] dark:text-[#FF4433] hover:opacity-80 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7.5 3h9A4.5 4.5 0 0121 7.5v9a4.5 4.5 0 01-4.5 4.5h-9A4.5 4.5 0 013 16.5v-9A4.5 4.5 0 017.5 3zm9.75 3.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm-6.75 1.5a4.5 4.5 0 104.5 4.5 4.5 4.5 0 00-4.5-4.5z" />
                </svg>
                <span class="text-sm font-medium">Instagram</span>
            </a>
        </div>

        <p>© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
    </footer>

</body>
</html>
