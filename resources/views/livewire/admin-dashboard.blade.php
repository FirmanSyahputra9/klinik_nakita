<div class="p-6 space-y-10">

    <!-- TOP CARDS (Stats) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card Template -->
        @php
        $cardBase = 'rounded-xl shadow p-5 border bg-white dark:bg-gray-900 border-gray-200 dark:border-gray-700 space-y-3';
        $titleBase = 'font-bold text-lg text-gray-800 dark:text-gray-100';
        $valueBase = 'text-gray-500 text-sm dark:text-gray-300';
        @endphp

        <!-- Total Pasien -->
        <div class="{{ $cardBase }}">
            <div class="flex items-center gap-3">
                <div class="bg-blue-200 dark:bg-gray-700 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-gray-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 12a4 4 0 100-8 4 4 0 000 8z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 20a6 6 0 1112 0H6z" />
                    </svg>
                </div>

                <div>
                    <h2 class="{{ $titleBase }}">Akun Pasien</h2>
                    <p class="{{ $valueBase }}">{{ $totalPengguna ?? '0' }}</p>
                </div>
            </div>

            <div class="{{ $valueBase }}">
                <p>Pasien Hari Ini: {{ $penggunaHariIni ?? '0' }}</p>
                <p>30 Hari Terakhir: {{ $penggunaBaru ?? '0' }}</p>
            </div>
        </div>

        <!-- Total Dokter -->
        <div class="{{ $cardBase }} bg-pink-50 dark:bg-gray-800">
            <div class="flex items-center gap-3">
                <div class="bg-pink-200 dark:bg-gray-700 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 dark:text-gray-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422A12.083 12.083 0 0121 14.094M12 14v7.5" />
                    </svg>
                </div>

                <div>
                    <h2 class="{{ $titleBase }}">Total Dokter</h2>
                    <p class="{{ $valueBase }}">{{ $totalDokter ?? '0' }}</p>
                </div>
            </div>

            <div class="{{ $valueBase }}">
                <p>Spesialis: {{ $dokterSpesialis ?? '0' }}</p>
                <p>Umum: {{ $dokterUmum ?? '0' }}</p>
            </div>
        </div>

        <!-- Total Janji -->
        <div class="{{ $cardBase }}">
            <div class="flex items-center gap-3">
                <div class="bg-blue-100 dark:bg-gray-700 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-gray-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3M16 7V3M3 11h18M5 11v10h14V11" />
                    </svg>
                </div>

                <div>
                    <h2 class="{{ $titleBase }}">Total Janji</h2>
                    <p class="{{ $valueBase }}">{{ $totalJanji ?? '0' }}</p>
                </div>
            </div>

            <div class="{{ $valueBase }}">
                <p>Registrasi Hari Ini: {{ $totalJanjiHariIni ?? '0' }}</p>
                <p>30 Hari Terakhir: {{ $totalJanjiBaru ?? '0' }}</p>
            </div>
        </div>

        <!-- Stok Obat -->
        <div class="{{ $cardBase }} bg-pink-50 dark:bg-gray-800">
            <div class="flex items-center gap-3">
                <div class="bg-pink-100 dark:bg-gray-900 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 dark:text-gray-100" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 16v6m3-3H9" />
                    </svg>
                </div>

                <div>
                    <h2 class="{{ $titleBase }}">Stok Obat</h2>
                    <p class="{{ $valueBase }}">Total: {{ $totalObat ?? '0' }}</p>
                    <p class="{{ $valueBase }}">Sedikit: {{ $obatSisaSedikit ?? '0' }}</p>
                    <p class="{{ $valueBase }}">Habis: {{ $obatHabis ?? '0' }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- MAIN LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT SIDE -->
        <div class="space-y-10 lg:col-span-2">

            <!-- Appointment Short Table -->
            <div class="rounded-xl shadow p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                @livewire('appointment-short')
            </div>

            <!-- Dokter Aktif -->
            <div class="rounded-xl shadow p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                @livewire('pages.short.dokter-aktif')
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="rounded-xl shadow p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 flex flex-col items-center space-y-8">

            <!-- Clock -->
            <div class="w-full text-center">
                <h2 class="font-bold text-lg text-gray-800 dark:text-white mb-3">Jam Sekarang</h2>

                <div class="flex items-center justify-center gap-2 bg-blue-200 dark:bg-gray-900 p-3 rounded-lg border shadow-inner">
                    <div id="h"
                        class="px-4 py-2 bg-white dark:bg-gray-300 rounded-md shadow text-3xl font-bold text-blue-700 dark:text-gray-900 min-w-[70px] text-center">
                        00
                    </div>

                    <span class="text-3xl font-bold text-blue-700 dark:text-gray-100">:</span>

                    <div id="m"
                        class="px-4 py-2 bg-white dark:bg-gray-300 rounded-md shadow text-3xl font-bold text-blue-700 dark:text-gray-900 min-w-[70px] text-center">
                        00
                    </div>

                    <span class="text-3xl font-bold text-blue-700 dark:text-gray-100">:</span>

                    <div id="s"
                        class="px-4 py-2 bg-white dark:bg-gray-300 rounded-md shadow text-3xl font-bold text-blue-700 dark:text-gray-900 min-w-[70px] text-center">
                        00
                    </div>
                </div>
            </div>

            <script>
                setInterval(() => {
                    const now = new Date();
                    document.getElementById('h').textContent = String(now.getHours()).padStart(2, '0');
                    document.getElementById('m').textContent = String(now.getMinutes()).padStart(2, '0');
                    document.getElementById('s').textContent = String(now.getSeconds()).padStart(2, '0');
                }, 1000);
            </script>

            <!-- Quick Links -->
            <div class="w-full space-y-4">

                <a href="{{ route('users.index') }}"
                    class="block rounded-xl p-4 bg-blue-100 dark:bg-gray-700 hover:bg-blue-200 dark:hover:bg-gray-600 transition shadow">
                    <h3 class="font-semibold text-blue-900 dark:text-white">Lihat User</h3>
                    <p class="text-sm text-blue-700 dark:text-gray-200 mt-1">Kelola Data Pasien</p>
                </a>

                <a href="{{ route('kasir.index') }}"
                    class="block rounded-xl p-4 bg-pink-100 dark:bg-gray-700 hover:bg-pink-200 dark:hover:bg-gray-600 transition shadow">
                    <h3 class="font-semibold text-pink-900 dark:text-white">Cek Riwayat Pembayaran</h3>
                    <p class="text-sm text-pink-700 dark:text-gray-200 mt-1">Pantau transaksi dan pembayaran pasien.</p>
                </a>

                <a href="{{ route('stok-obat.index') }}"
                    class="block rounded-xl p-4 bg-yellow-100 dark:bg-gray-700 hover:bg-yellow-200 dark:hover:bg-gray-600 transition shadow">
                    <h3 class="font-semibold text-yellow-900 dark:text-white">Cek Stok Obat</h3>
                    <p class="text-sm text-yellow-700 dark:text-gray-200 mt-1">Lihat jumlah stok obat dan status ketersediaan.</p>
                </a>

            </div>

        </div>

    </div>

</div>