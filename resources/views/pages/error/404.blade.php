<div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 flex flex-col items-center justify-center px-6 py-10 relative overflow-hidden">

    {{-- Floating blurred circles --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-64 h-64 bg-blue-200 rounded-full opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-200 rounded-full opacity-20 blur-3xl animate-pulse"></div>
    </div>

    {{-- Title --}}
    <div class="text-center relative z-10">
        <div class="relative inline-block">
            <h1 class="text-9xl font-extrabold bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent tracking-widest animate-pulse">
                404
            </h1>
            <div class="absolute -top-4 -right-4 text-4xl animate-bounce">🔍</div>
        </div>

        <p class="text-2xl md:text-3xl font-semibold text-gray-800 mt-8">
            Oops! Halaman yang kamu cari tidak ditemukan.
        </p>
        <p class="text-gray-600 mt-3 text-lg">
            Mungkin halaman sudah dipindahkan atau linknya salah.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/"
                class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 font-semibold">
                🏠 Kembali ke Beranda
            </a>

            <button onclick="history.back()"
                class="px-8 py-4 bg-white text-gray-700 rounded-xl hover:bg-gray-50 transition-all shadow-md hover:shadow-lg border-2 border-gray-200 font-semibold">
                ← Halaman Sebelumnya
            </button>
        </div>
    </div>

    {{-- Astronaut --}}
    <div class="mt-12 relative z-10">
        @include('pages.error.astronaut')
    </div>

</div>