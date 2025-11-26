<x-layouts.app :title="__('Dashboard')">
    <main class=" flex gap-6 p-6">


        <!-- LEFT SIDEBAR -->
        <section class="flex-1 space-y-6">
            <!-- Welcome Message -->
            <header>
                <h2 class="text-2xl font-semibold text-gray-800">Halo, {{ Auth::check()? Auth::user()->username : '' }}👋</h2>
                <p class="text-gray-500 text-sm">Bagaimana kabar hari ini?</p>
            </header>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <article class="bg-white rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-700">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-1 5H6a2 2 0 01-2-2V7a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Cek Jadwal</p>
                        <p class="text-sm text-gray-500">Lihat jadwal konsultasi dan janji temu Anda.</p>
                    </div>
                    <a href="{{ route('jadwaldokter.index') }}" class="text-blue-600 font-medium text-sm hover:underline mt-1">Lihat Jadwal →</a>
                </article>

                <article class="bg-white rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-700">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c.778 0 1.469-.297 2-.781M12 8c-.778 0-1.469-.297-2-.781M12 8v8m0 0c.778 0 1.469.297 2 .781M12 16c-.778 0-1.469.297-2 .781M8 5h8a2 2 0 012 2v12l-6-3-6 3V7a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Riwayat Medis</p>
                        <p class="text-sm text-gray-500">Lihat rekam medis lengkap termasuk diagnosis dan resep.</p>
                    </div>
                    <a href="{{ route('riwayat.index') }}" class="text-purple-600 font-medium text-sm hover:underline mt-1">Lihat Riwayat →</a>
                </article>

                <article class="bg-white rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-green-700">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-6m6 6V7m4-3H5a2 2 0 00-2 2v14l4-2 5 3 5-3 4 2V6a2 2 0 00-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-800">Hasil Laboratorium</p>
                        <p class="text-sm text-gray-500">Akses hasil pemeriksaan Lab Anda kapan saja.</p>
                    </div>
                    <a href="{{ route('hasil.index') }}" class="text-green-600 font-medium text-sm hover:underline mt-1">Lihat Hasil Lab →</a>
                </article>
            </div>

            <!-- Nomor Registrasi -->
            @if ($antrian_registrasi)
            <section class="bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-lg mb-4 text-gray-800">Nomor Registrasi</h3>
                @foreach ($antrian_registrasi as $ar)
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div class="bg-pink-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Nomor Antrian Registrasi</p>
                        <p class="text-2xl font-bold text-pink-600">{{ $ar->appointment_code }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $ar->create_at }}</p>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Dokter Pilihan</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $ar->nama_dokter }}</p>
                    </div>
                    <div class="bg-green-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Antrian pada tanggal {{ $ar->tanggal_kunjungan }}</p>
                        <p class="text-2xl font-bold text-green-600">{{ $ar->antrian_registrasi }}</p>
                    </div>
                </div>
                @endforeach
            </section>
            @endif

            <!-- Nomor Antrian Pasien -->
            @if ($janjinow)
            <section class="bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-lg mb-4 text-gray-800">Nomor Antrian Anda</h3>
                @foreach ($janjinow as $item)
                <div class="mb-4">
                    <span>dokter : {{ $item->dokter->name }}</span>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-pink-50 rounded-lg p-4 text-center shadow">
                            <p class="text-xs text-gray-500">Nomor Antrian</p>
                            <p class="text-xl font-bold text-pink-600">{{ $item->kode_antrian }}</p>
                            <p class="text-xs text-gray-400 mt-1">Dokter Aktif
                                {{ $item->registrasi->hari_kunjungan }} di {{ $item->jadwal_dokter_now->awal_aktif }}
                            </p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4 text-center shadow">
                            <p class="text-xs text-gray-500">Antrian Sekarang</p>
                            <p class="text-2xl font-bold text-blue-600 mt-4">{{ $item->antrian_sekarang }}</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4 text-center shadow">
                            <p class="text-xs text-gray-500">Sisa Antrian</p>
                            <p class="text-2xl font-bold text-green-600 mt-4">{{ $item->sisa_antrian }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </section>
            @endif


        </section>

        <!-- RIGHT SIDEBAR -->
        <aside class="w-72 bg-white rounded-3xl p-6 shadow space-y-6">
            <!-- Profile -->
            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-gray-300 mb-3"></div>
                <p class="font-semibold text-gray-800 text-lg">{{ $user->pasien->name }}</p>
                <p class="font-semibold text-gray-700 text-sm">{{ $user->pasien->no_rm }}</p>
            </div>

            <!-- Health Stats -->
            <div class="grid grid-cols-2 text-center text-sm text-white gap-4">
                <div class="p-2 bg-white">
                    <p class="font-medium text-gray-800">Gol. Darah</p>
                    <p class="text-gray-800 font-semibold">{{ $user->pasien->gol_darah }}</p>
                </div>
                <div class="p-2 bg-whit">
                    <p class="font-medium text-gray-800">Usia</p>
                    <p class="font-semibold text-gray-800">{{ $user->pasien->umur }}</p>
                </div>
            </div>

            <!-- Health Notes -->
            <a href="{{ route('riwayat.index') }}"
                class="w-full bg-slate-50 hover:bg-sky-200 transition py-2 rounded-4xl flex items-center justify-center text-sm font-medium text-gray-800 shadow">
                <span>Riwayat</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13 5l7 7-7 7M5 12h14" />
                </svg>
            </a>
        </aside>

    </main>

    <!-- Resep Obat - Full Width -->
    <section class="bg-white rounded-xl shadow overflow-hidden mx-6 mb-6">
        <!-- Header -->
        <header class="bg-gradient-to-r from-sky-100 to-sky-200 p-4">
            <h3 class="font-bold text-lg text-gray-900">Resep Obat</h3>
            <div class="flex items-center gap-4 mt-2 text-sm text-gray-700">
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>10 Januari 2024</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>3 Hari</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Dr. Bagas</span>
                </div>
            </div>
        </header>

        <!-- Content -->
        <article class="bg-gray-50 rounded-lg p-4">

            <div class="flex items-start gap-3 mb-3">
                <div class="w-10 h-10 bg-sky-100 rounded-lg flex items-center justify-center text-xl">
                    💊
                </div>
                <div>
                    <h5 class="font-semibold text-gray-900">Doxycycline 100 mg</h5>
                    <p class="text-sm text-gray-600">10 Kapsul • Dosis: 100 mg</p>
                </div>
            </div>
            <dl class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <dt class="text-gray-600">Frekuensi:</dt>
                    <dd class="font-medium text-gray-900">1 x 1 Tablet</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-600">Waktu Konsumsi:</dt>
                    <dd class="font-medium text-gray-900">Pagi setelah makan</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-600">Harga:</dt>
                    <dd class="font-medium text-gray-900">Rp 25.000</dd>
                </div>
            </dl>

        </article>
    </section>
</x-layouts.app>
