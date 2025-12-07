<x-layouts.app :title="__('Dashboard')">
    <main class="flex flex-col lg:flex-row gap-6 p-4 md:p-6">

        <!-- LEFT SIDEBAR -->
        <section class="flex-1 space-y-6">

            <!-- Welcome Message -->
            <header>
                <h2 class="text-2xl font-semibold text-gray-400">
                    Halo, {{ Auth::check() ? Auth::user()->username : '' }} 👋
                </h2>
                <p class="text-gray-500 text-sm">Bagaimana kabar hari ini?</p>
            </header>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <article class="card bg-white dark:bg-gray-900 rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-gray-400 rounded-lg flex items-center justify-center text-blue-700 dark:text-gray-800">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-1 5H6a2 2 0 01-2-2V7a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="card text-lg font-semibold text-gray-800 dark:text-gray-100">Cek Jadwal</p>
                        <p class="card text-sm text-gray-500">Lihat jadwal konsultasi dan janji temu Anda.</p>
                    </div>
                    <a href="{{ route('jadwaldokter.index') }}"
                        class="text-blue-600 dark:text-gray-400 font-medium text-sm hover:underline mt-auto">Lihat Jadwal →</a>
                </article>

                <!-- Card 2 -->
                <article class="card bg-white dark:bg-gray-800 rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-gray-400 rounded-lg flex items-center justify-center text-purple-700 dark:text-gray-800">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c.778 0 1.469-.297 2-.781M12 8c-.778 0-1.469-.297-2-.781M12 8v8m0 0c.778 0 1.469.297 2 .781M12 16c-.778 0-1.469.297-2 .781M8 5h8a2 2 0 012 2v12l-6-3-6 3V7a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="card text-lg font-semibold text-gray-800 dark:text-gray-100">Riwayat Medis</p>
                        <p class="card text-sm text-gray-500">Lihat rekam medis lengkap termasuk diagnosis dan resep.</p>
                    </div>
                    <a href="{{ route('riwayat.index') }}"
                        class="text-purple-600 dark:text-gray-400 font-medium text-sm hover:underline mt-auto">Lihat Riwayat →</a>
                </article>

                <!-- Card 3 -->
                <article class="card bg-white dark:bg-gray-900 rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12  dark:bg-gray-400 rounded-lg flex items-center justify-center text-green-700 dark:text-gray-800">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-6m6 6V7m4-3H5a2 2 0 00-2 2v14l4-2 5 3 5-3 4 2V6a2 2 0 00-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="card text-lg font-semibold text-gray-800 dark:text-gray-100">Hasil Laboratorium</p>
                        <p class="card text-sm text-gray-500">Akses hasil pemeriksaan Lab kapan saja.</p>
                    </div>
                    <a href="{{ route('hasil.index') }}"
                        class="text-green-600 dark:text-gray-400 font-medium text-sm hover:underline mt-auto">Lihat Hasil Lab →</a>
                </article>
            </div>

            <!-- Nomor Registrasi -->
            @if ($antrian_registrasi)
            <section class="card bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                <h3 class="card font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">Nomor Registrasi</h3>
                @foreach ($antrian_registrasi ?? [] as $ar)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="bg-pink-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow">
                        <p class="card text-sm text-gray-500 dark:text-gray-300">Nomor Antrian Registrasi</p>
                        <p class="card text-2xl font-bold text-pink-600 dark:text-gray-100">{{ $ar->appointment_code }}</p>
                        <p class="card text-sm text-gray-400 dark:text-gray-300 mt-1">{{ $ar->create_at }}</p>
                    </div>
                    <div class="bg-blue-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow">
                        <p class="card text-sm text-gray-500 dark:text-gray-300">Dokter Pilihan</p>
                        <p class="card text-2xl font-bold text-blue-600 dark:text-gray-100">{{ $ar->nama_dokter }}</p>
                    </div>
                    <div class="bg-green-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow">
                        <p class="card text-sm text-gray-500 dark:text-gray-300">Antrian pada tanggal {{ $ar->tanggal_kunjungan }}</p>
                        <p class="card text-2xl font-bold text-green-600 dark:text-gray-100">{{ $ar->antrian_registrasi }}</p>
                    </div>
                </div>
                @endforeach
            </section>
            @endif

            <!-- Nomor Antrian Pasien -->
            @if ($janjinow)
            <section class="card bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                <h3 class="font-semibold text-lg mb-3 text-gray-800 dark:text-gray-100 card">Nomor Antrian Anda</h3>
                @foreach ($janjinow ?? [] as $item)
                <div class="mb-4">
                    <span class="block text-sm mb-2">Dokter : {{ $item->dokter->name?? '' }}</span>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="card bg-pink-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow border border-gray-200">
                            <p class="card text-xs text-gray-500 dark:text-gray-300">Nomor Antrian</p>
                            <p class="card text-xl font-bold text-pink-600 dark:text-gray-100">{{ $item->kode_antrian }}</p>
                            <p class="card text-xs text-gray-400 mt-1">
                                Dokter Aktif {{ $item->registrasi->hari_kunjungan }}<br>
                                {{ $item->jadwal_dokter_now->awal_aktif?? '' }}
                            </p>
                        </div>
                        <div class="card bg-blue-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow border border-gray-200">
                            <p class="card text-xs text-gray-500 dark:text-gray-300">Antrian Sekarang</p>
                            <p class="card text-2xl font-bold text-blue-600 dark:text-gray-100 mt-4">{{ $item->antrian_sekarang }}</p>
                        </div>
                        <div class="card bg-green-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow border border-gray-200">
                            <p class="card text-xs text-gray-500 dark:text-gray-300">Sisa Antrian</p>
                            <p class="card text-2xl font-bold text-green-600 dark:text-gray-100 mt-4">{{ $item->sisa_antrian }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
            @endif

        </section>

        <!-- RIGHT SIDEBAR -->
        <aside class="card w-full lg:w-72 bg-white dark:bg-gray-800 rounded-3xl p-6 shadow space-y-6">

            <!-- Profile -->
            <div class="card flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-gray-300 mb-3"></div>
                <p class="card font-semibold text-gray-800 dark:text-gray-100  text-lg">{{ $user->pasien->name }}</p>
                <p class="card font-semibold text-gray-700 dark:text-gray-500 text-sm">{{ $user->pasien->no_rm }}</p>
            </div>
            <!-- Health Stats -->
            <div class="card grid grid-cols-2 text-center text-sm gap-4">
                <div class="card p-2 bg-white dark:bg-gray-600 rounded-lg shadow">
                    <p class="card font-medium text-gray-800 dark:text-gray-100">Gol. Darah</p>
                    <p class="card text-gray-800 font-semibold dark:text-gray-100">{{ $user->pasien->gol_darah }}</p>
                </div>
                <div class="card p-2 bg-white dark:bg-gray-600 rounded-lg shadow">
                    <p class="card font-medium text-gray-800 dark:text-gray-100">Usia</p>
                    <p class="card font-semibold text-gray-800 dark:text-gray-100">{{ $user->pasien->umur }}</p>
                </div>
            </div>

            <!-- Health Notes -->
            <a href="{{ route('riwayat.index') }}"
                class="card w-full bg-slate-50 dark:bg-gray-600 hover:bg-sky-200 dark:hover:bg-gray-700 transition py-2 rounded-xl flex items-center justify-center text-sm font-medium text-gray-800 dark:text-gray-100 shadow dark:border">
                <span>Riwayat</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" class="w-5 h-5 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13 5l7 7-7 7M5 12h14" />
                </svg>
            </a>

        </aside>
    </main>

    <!-- Resep Obat -->
    <section class="card bg-white dark:bg-gray-900 rounded-xl shadow overflow-hidden mx-4 md:mx-6 mb-6">

        <!-- Header -->
        <header class="card bg-white dark:bg-gray-900 p-4 space-y-1">
            <h3 class="card font-bold text-lg text-gray-900 dark:text-gray-100">Resep Obat</h3>

            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-700 dark:text-gray-400 ">

                <div class="card flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>10 Januari 2024</span>
                </div>

                <div class="card flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>3 Hari</span>
                </div>

                <div class="card flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Dr. Bagas</span>
                </div>

            </div>
        </header>

        <!-- Content -->
        <article class="card bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
            <div class="card flex items-start gap-3 mb-3">
                <div class="w-10 h-10 bg-sky-100 dark:bg-gray-400 rounded-lg flex items-center justify-center text-xl">💊</div>

                <div>
                    <h5 class="card font-semibold text-gray-900 dark:text-gray-100">Doxycycline 100 mg</h5>
                    <p class="card text-sm text-gray-600 dark:text-gray-400">10 Kapsul • Dosis: 100 mg</p>
                </div>
            </div>

            <dl class="card space-y-2 text-sm">
                <div class="flex justify-between">
                    <dt class="text-gray-600 dark:text-gray-400 card">Frekuensi:</dt>
                    <dd class="font-medium text-gray-900 dark:text-gray-400 card">1 x 1 Tablet</dd>
                </div>

                <div class="flex justify-between">
                    <dt class="text-gray-600 dark:text-gray-400 card">Waktu Konsumsi:</dt>
                    <dd class="font-medium text-gray-900 dark:text-gray-400 card">Pagi setelah makan</dd>
                </div>

                <div class="flex justify-between">
                    <dt class="text-gray-600 dark:text-gray-400 card">Harga:</dt>
                    <dd class="font-medium text-gray-900 dark:text-gray-400 card">Rp 25.000</dd>
                </div>
            </dl>
        </article>
    </section>
</x-layouts.app>