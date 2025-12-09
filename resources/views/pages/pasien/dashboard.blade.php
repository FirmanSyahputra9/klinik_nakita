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
                <article
                    class="card bg-white dark:bg-gray-900 rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 bg-blue-100 dark:bg-gray-400 rounded-lg flex items-center justify-center text-blue-700 dark:text-gray-800">
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
                        class="text-blue-600 dark:text-gray-400 font-medium text-sm hover:underline mt-auto">Lihat
                        Jadwal →</a>
                </article>

                <!-- Card 2 -->
                <article
                    class="card bg-white dark:bg-gray-900 rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 bg-purple-100 dark:bg-gray-400 rounded-lg flex items-center justify-center text-purple-700 dark:text-gray-800">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c.778 0 1.469-.297 2-.781M12 8c-.778 0-1.469-.297-2-.781M12 8v8m0 0c.778 0 1.469.297 2 .781M12 16c-.778 0-1.469.297-2 .781M8 5h8a2 2 0 012 2v12l-6-3-6 3V7a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="card text-lg font-semibold text-gray-800 dark:text-gray-100">Riwayat Medis</p>
                        <p class="card text-sm text-gray-500">Lihat rekam medis lengkap termasuk diagnosis dan resep.
                        </p>
                    </div>
                    <a href="{{ route('riwayat.index') }}"
                        class="text-purple-600 dark:text-gray-400 font-medium text-sm hover:underline mt-auto">Lihat
                        Riwayat →</a>
                </article>

                <!-- Card 3 -->
                <article
                    class="card bg-white dark:bg-gray-900 rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12  dark:bg-gray-400 rounded-lg flex items-center justify-center text-green-700 dark:text-gray-800">
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
                        class="text-green-600 dark:text-gray-400 font-medium text-sm hover:underline mt-auto">Lihat
                        Hasil Lab →</a>
                </article>
            </div>

            <!-- Nomor Registrasi -->
            @if ($antrian_registrasi)
            <section class="card bg-white dark:bg-gray-800 rounded-xl shadow p-6 whitespace-nowrap">
                <h3 class="card font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">Nomor Registrasi</h3>
                @foreach ($antrian_registrasi ?? [] as $ar)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="bg-pink-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow">
                        <p class="card text-sm text-gray-500 dark:text-gray-300">Nomor Antrian Registrasi</p>
                        <p class="card text-sm font-bold text-pink-600 dark:text-gray-100">
                            {{ $ar->appointment_code }}
                        </p>
                        <p class="card text-sm text-gray-400 dark:text-gray-300 mt-1">{{ $ar->create_at }}</p>
                    </div>
                    <div class="bg-blue-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow">
                        <p class="card text-sm text-gray-500 dark:text-gray-300">Dokter Pilihan</p>
                        <p class="card text-2xl font-bold text-blue-600 dark:text-gray-100">
                            {{ $ar->nama_dokter }}
                        </p>
                    </div>
                    <div class="bg-green-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow">
                        <p class="card text-sm text-gray-500 dark:text-gray-300">Antrian pada tanggal
                            {{ $ar->tanggal_kunjungan }}
                        </p>
                        <p class="card text-2xl font-bold text-green-600 dark:text-gray-100">
                            {{ $ar->antrian_registrasi }}
                        </p>
                    </div>
                </div>
                @endforeach
            </section>
            @endif

            <!-- Nomor Antrian Pasien -->
            @if ($janjinow)
            <section class="card bg-white dark:bg-gray-800 rounded-xl shadow p-6 whitespace-nowrap">
                <h3 class="font-semibold text-lg mb-3 text-gray-800 dark:text-gray-100 card">Nomor Antrian Anda</h3>
                @foreach ($janjinow ?? [] as $item)
                <div class="mb-4">
                    <span class="block text-sm mb-2">Dokter : {{ $item->dokter->name ?? '' }}</span>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div
                            class="card bg-pink-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow border border-gray-200 text-center">
                            <p class="card text-xs text-gray-500 dark:text-gray-300">Nomor Antrian</p>
                            <p class="card text-sm font-bold text-pink-600 dark:text-gray-100">
                                {{ $item->kode_antrian }}
                            </p>
                            <p class="card text-xs text-gray-400 mt-1">
                                Dokter Aktif {{ $item->registrasi->hari_kunjungan }}<br>
                                {{ $item->jadwal_dokter_now->awal_aktif ?? '' }}
                            </p>
                        </div>
                        <div
                            class="card bg-blue-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow border border-gray-200">
                            <p class="card text-xs text-gray-500 dark:text-gray-300">Antrian Sekarang</p>
                            <p class="card text-2xl font-bold text-blue-600 dark:text-gray-100 mt-4">
                                {{ $item->antrian_sekarang }}
                            </p>
                        </div>
                        <div
                            class="card bg-green-50 dark:bg-gray-900 rounded-lg p-4 text-center shadow border border-gray-200">
                            <p class="card text-xs text-gray-500 dark:text-gray-300">Sisa Antrian</p>
                            <p class="card text-2xl font-bold text-green-600 dark:text-gray-100 mt-4">
                                {{ $item->sisa_antrian }}
                            </p>
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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 12h14" />
                </svg>
            </a>

        </aside>
    </main>

    <!-- Resep Obat -->
    <section class="card bg-white dark:bg-gray-900 rounded-xl shadow overflow-hidden mx-4 md:mx-6 mb-6">


        <!-- Resep Card -->
        @if ($obat)


        <div class="card bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <!-- Header Card -->
            <div class="card p-4 dark:bg-gray-900">

                <div class="card  flex flex-col sm:flex-row items-start sm:items-center gap-4">

                    <!-- Icon -->
                    <div
                        class="card w-12 h-12 bg-white/50 dark:bg-gray-400  rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-blue-500 dark:text-gray-900" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <!-- Info -->
                    <div class="flex-1">
                        <h3 class="card font-bold text-xl text-gray-900 dark:text-gray-100">
                            {{ $obat->data_pemeriksaan->diagnosa ?? '-' }}
                        </h3>

                        <div
                            class="card flex flex-wrap items-center gap-4 mt-2 text-sm text-gray-700 dark:text-gray-100">

                            <div class="card flex items-center gap-1 ">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap=" round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $obat->registrasi->tanggal_kunjungan ?? '' }}</span>
                            </div>

                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $obat->created_at ?? '0' }}</span>
                            </div>

                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ $obat->dokter->name ?? '' }}</span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <!-- Content -->
            <div class="p-6">

                <h4 class="font-semibold text-lg mb-4">Daftar Obat</h4>
                <!-- Obat Item -->
                <div class="card border border-gray-200 rounded-lg p-4 mb-4">

                    <!-- Obat Header -->
                    <div class="card flex items-start gap-3 mb-4">

                        <div
                            class="card w-10 h-10 bg-blue-50 dark:bg-gray-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="card w-6 h-6 text-blue-600 dark:text-gray-900" fill="none"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>

                        <div class="flex-1">
                            <h5 class="card font-semibold text-gray-900 dark:text-gray-100">
                                {{ $resep->obat->nama ?? '-' }}
                            </h5>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">
                                {{ $resep->kuantitas ?? '-' }}
                                {{ $resep->obat->satuan ?? '-' }}
                            </p>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">{{ $resep->dosis ?? '' }}
                                {{ $resep->obat->satuan ?? '-' }}
                            </p>
                        </div>

                    </div>

                    <!-- Detail Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">

                        <div>
                            <p class="card text-sm font-semibold text-gray-700 dark:text-gray-100 mb-1">
                                Frekuensi:</p>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">
                                {{ $resep->frekuensi ?? '' }} {{ $resep->obat->satuan ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="card text-sm font-semibold text-gray-700 dark:text-gray-100 mb-1">Waktu
                                Konsumsi:</p>

                            @php
                            $colorMap = [
                            'Pagi' => 'text-amber-600 dark:text-gray-100',
                            'Siang' => 'text-blue-600 dark:text-gray-100',
                            'Sore' => 'text-orange-600 dark:text-gray-100',
                            'Malam' => 'text-indigo-600 dark:text-gray-100',
                            ];
                            @endphp

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {!! collect(explode(',', $resep->waktu_konsumsi ?? '-'))->map(fn($i) => "[<span class='" . ($colorMap[$i] ?? ' text-gray-600') . "'>$i</span>]" )->implode(' ') !!}
                            </p>

                        </div>

                        <div>
                            <p class="card text-sm font-semibold text-gray-700 dark:text-gray-100 mb-1">Harga:
                            </p>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">
                                {{ $resep->obat->harga ?? '' }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        @else
        <p class="p-4 text-gray-500 dark:text-gray-400">Belum ada resep obat.</p>
        @endif
    </section>
</x-layouts.app>