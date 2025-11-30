<div class="p-6">

    <!-- TOP CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total Pasien -->
        <div class="bg-white rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Akun Pasien</h2>
                    <p class="text-gray-500 text-sm">{{ $totalPengguna?? '0' }}</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Pasien Hari Ini: {{ $penggunaHariIni?? '0' }}</p>
                <p>30 Hari Terakhir: {{ $penggunaBaru?? '0' }}</p>
            </div>
        </div>

        <!-- Total Dokter -->
        <div class="bg-pink-100 rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-pink-200 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422A12.083 12.083 0 0121 14.094M12 14v7.5" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Total Dokter</h2>
                    <p class="text-gray-500 text-sm">{{ $totalDokter?? '0' }}</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Spesialis: {{ $dokterSpesialis?? '0' }}</p>
                <p>Umum: {{ $dokterUmum?? '0' }}</p>
            </div>
        </div>

        <!-- Total Janji -->
        <div class="bg-white rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3M16 7V3M3 11h18M5 11v10h14V11" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Total Janji</h2>
                    <p class="text-gray-500 text-sm">{{ $totalJanji??'0' }}</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Registrasi Hari Ini: {{ $totalJanjiHariIni??'0' }}</p>
                <p>30 Hari Terakhir: {{ $totalJanjiBaru??'0' }}</p>
            </div>
        </div>

        <!-- Stok Obat -->
        <div class="bg-pink-100 rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-pink-200 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 16v6m3-3H9" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Stok Obat</h2>
                    <p class="text-gray-500 text-sm">Total: {{ $totalObat?? '0' }}</p>
                    <p class="text-gray-500 text-sm">Sedikit: {{ $obatSisaSedikit?? '0' }}</p>
                    <p class="text-gray-500 text-sm">Habis: {{ $obatHabis?? '0' }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT SIDE (APPOINTMENTS + OBAT) -->
        <div class="lg:col-span-2 space-y-10">

            <!-- TABLE APPOINTMENTS -->
            <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                @livewire('appointment-short')
            </div>

            <!-- Short Table: Dokter Aktif -->
            <div class="bg-white rounded-xl shadow p-6 border border-gray-200 mt-10">
                @livewire('pages.short.dokter-aktif')
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="bg-white rounded-xl shadow p-6 border border-gray-200 flex flex-col items-center justify-start self-start space-y-6">

            <!-- CLOCK -->
            <div class="w-full text-center">
                <h2 class="text-lg font-bold text-gray-800 mb-3">Jam Sekarang</h2>

                <div class="flex items-center gap-2 bg-gradient-to-br from-blue-100 to-blue-200 p-3 rounded-lg shadow-inner justify-center">
                    <div id="h"
                        class="px-4 py-2 bg-white rounded-md shadow text-3xl font-bold text-blue-700 min-w-[70px] text-center">
                        00
                    </div>

                    <span class="text-3xl font-bold text-blue-700 pb-1">:</span>

                    <div id="m"
                        class="px-4 py-2 bg-white rounded-md shadow text-3xl font-bold text-blue-700 min-w-[70px] text-center">
                        00
                    </div>

                    <span class="text-3xl font-bold text-blue-700 pb-1">:</span>

                    <div id="s"
                        class="px-4 py-2 bg-white rounded-md shadow text-3xl font-bold text-blue-700 min-w-[70px] text-center">
                        00
                    </div>
                </div>
            </div>

            <script>
                setInterval(() => {
                    const now = new Date();

                    document.getElementById('h').textContent =
                        String(now.getHours()).padStart(2, '0');
                    document.getElementById('m').textContent =
                        String(now.getMinutes()).padStart(2, '0');
                    document.getElementById('s').textContent =
                        String(now.getSeconds()).padStart(2, '0');
                }, 1000);
            </script>

            <!-- ACTION CARDS -->
            <div class="w-full space-y-4">

                <!-- Card 1 -->
                <a href="{{ route('users.index') }}"
                    class="block bg-blue-100 hover:bg-blue-200 transition rounded-xl p-4 shadow border border-blue-200">
                    <h3 class="text-blue-900 font-semibold text-md">Lihat User</h3>
                    <p class="hover:underline text-blue-700 text-sm mt-1">Kelola Data Pasien</p>
                </a>

                <!-- Card 2 -->
                <a href="{{ route('kasir.index') }}"
                    class="block bg-pink-100 hover:bg-pink-200 transition rounded-xl p-4 shadow border border-pink-200">
                    <h3 class="text-pink-900 font-semibold text-md">Cek Riwayat Pembayaran</h3>
                    <p class="hover:underline text-pink-700 text-sm mt-1">Pantau transaksi dan pembayaran pasien.</p>
                </a>

                <!-- Card 3 -->
                <a href="{{ route('stok-obat.index') }}"
                    class="block bg-yellow-100 hover:bg-yellow-200 transition rounded-xl p-4 shadow border border-yellow-200">
                    <h3 class="text-yellow-900 font-semibold text-md">Cek Stok Obat</h3>
                    <p class="hover:underline text-yellow-700 text-sm mt-1">Lihat jumlah stok obat dan status ketersediaan.</p>
                </a>

            </div>

        </div>



    </div>

</div>
