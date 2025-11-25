<x-layouts.app :title="__('Dashboard')">
    <div class="flex gap-6 p-6">

        <!-- LEFT CONTENT -->
        <div class="flex-1 space-y-6">

            <!-- Greeting -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Halo, Test_User 👋</h2>
                <p class="text-gray-500 text-sm">Bagaimana kabar hari ini?</p>
            </div>

            <!-- QUICK ACTIONS (New Improved Cards) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- CEK JADWAL -->
                <div class="bg-white rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
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

                    <a href="#" class="text-blue-600 font-medium text-sm hover:underline mt-1">Lihat Jadwal →</a>
                </div>

                <!-- RIWAYAT MEDIS -->
                <div class="bg-white rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
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

                    <a href="#" class="text-purple-600 font-medium text-sm hover:underline mt-1">Lihat Riwayat →</a>
                </div>

                <!-- HASIL LAB -->
                <div class="bg-white rounded-xl shadow-md p-5 flex flex-col gap-3 border border-gray-100 hover:shadow-lg transition">
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

                    <a href="#" class="text-green-600 font-medium text-sm hover:underline mt-1">Lihat Hasil Lab →</a>
                </div>

            </div>


            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-lg mb-4 text-gray-800">Nomor Registrasi</h3>
                @if ($antrian_registrasi)
                @foreach ($antrian_registrasi as $ar)
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <!-- Nomor Antrian -->
                    <div class="bg-pink-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Nomor Antrian Registrasi</p>
                        <p class="text-2xl font-bold text-pink-600">{{ $ar->appointment_code }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $ar->create_at }}</p>
                    </div>

                    <!-- Antrian Sekarang -->
                    <div class="bg-blue-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Dokter Pilihan</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $ar->nama_dokter }}</p>
                    </div>

                    <!-- Sisa Antrian -->
                    <div class="bg-green-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Antrian pada tanggal {{ $ar->tanggal_kunjungan }}</p>
                        <p class="text-2xl font-bold text-green-600">{{ $ar->antrian_registrasi }}</p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>

            <!-- Nomor Antrian Pasien -->
            @if ($janjinow)
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-lg mb-4 text-gray-800">Nomor Antrian Anda</h3>
                @foreach ($janjinow as $item)
                <div class="mb-4">
                    <span>dokter : {{ $item->dokter->name }}</span>

                    <div class="grid grid-cols-3 gap-4">
                        <!-- Nomor Antrian -->
                        <div class="bg-pink-50 rounded-lg p-4 text-center shadow">
                            <p class="text-xs text-gray-500">Nomor Antrian</p>
                            <p class="text-xl font-bold text-pink-600">{{ $item->kode_antrian }}</p>
                            <p class="text-xs text-gray-400 mt-1">Dokter Aktif
                                {{ $item->registrasi->hari_kunjungan }} di {{ $item->jadwal_dokter_now->awal_aktif }}
                            </p>
                        </div>

                        <!-- Antrian Sekarang -->
                        <div class="bg-blue-50 rounded-lg p-4 text-center shadow">
                            <p class="text-xs text-gray-500">Antrian Sekarang</p>
                            <p class="text-2xl font-bold text-blue-600 mt-4">{{ $item->antrian_sekarang }}</p>
                        </div>

                        <!-- Sisa Antrian -->
                        <div class="bg-green-50 rounded-lg p-4 text-center shadow">
                            <p class="text-xs text-gray-500">Sisa Antrian</p>
                            <p class="text-2xl font-bold text-green-600 mt-4">{{ $item->sisa_antrian }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- RESEP OBAT -->
            <div class="bg-white rounded-xl shadow overflow-hidden mt-6">

                <!-- Header -->
                <div class="bg-gradient-to-r from-green-200 to-green-300 p-4">
                    <div class="flex items-start gap-4">

                        <!-- Icon -->
                        <div class="w-12 h-12 bg-white/50 rounded-lg flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>

                        <!-- Title & Info -->
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900">Resep Obat</h3>
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
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h4 class="font-semibold text-lg mb-4">Daftar Obat</h4>

                    <!-- Obat Item -->
                    <div class="border border-gray-200 rounded-lg p-4">

                        <div class="flex items-start gap-3 mb-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>

                            <div>
                                <h5 class="font-semibold text-gray-900">Doxycycline 100 mg</h5>
                                <p class="text-sm text-gray-600">10 Kapsul</p>
                                <p class="text-sm text-gray-600">Dosis: 100 mg</p>
                            </div>
                        </div>

                        <!-- Detail Grid -->
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-1">Frekuensi:</p>
                                <p class="text-sm text-gray-600">1 x 1 Tablet</p>
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-1">Waktu Konsumsi:</p>
                                <p class="text-sm text-gray-600">Pagi setelah makan</p>
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-gray-700 mb-1">Harga:</p>
                                <p class="text-sm text-gray-600">Rp 25.000</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




            <!-- Jadwal Janji Temu -->
            {{-- <div class="bg-white rounded-xl shadow p-4">
                <h3 class="font-semibold mb-3 text-gray-800">Janji Temu Mendatang</h3>

                <div class="p-4 bg-pink-50 rounded-xl flex items-center justify-between shadow-sm">

                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gray-300 rounded-full"></div>

                        <div>
                            <p class="font-semibold text-gray-800">Kontrol 1</p>
                            <p class="text-gray-500 text-sm">
                                Dr. Nabila Huwaida ·
                                10 November 2025 ·
                                15.00 - 19.00 WIB
                            </p>
                        </div>
                    </div>

                    <div class="w-7 h-7 flex items-center justify-center bg-gray-200 rounded-full text-xs">
                        2
                    </div>
                </div>
            </div> --}}

        </div>

        <!-- RIGHT SIDEBAR -->
        <aside class="w-72 bg-white rounded-xl p-6 shadow space-y-6">

            <!-- Profile -->
            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-gray-300 mb-3"></div>
                <p class="font-semibold text-gray-800 text-lg">{{ $user->pasien->name }}</p>
            </div>

            <!-- Health Stats -->
            <div class="grid grid-cols-3 text-center text-sm text-gray-600 gap-4">

                <div class="p-2 bg-gray-50 rounded-lg shadow-sm">
                    <p class="font-medium text-gray-800">Gol. Darah</p>
                    <p class="text-red-500 font-semibold">{{ $user->pasien->gol_darah }}</p>
                </div>

                <div class="p-2 bg-gray-50 rounded-lg shadow-sm">
                    <p class="font-medium text-gray-800">No. Rekam Medis</p>
                    <p class="font-semibold text-gray-700">{{ $user->pasien->no_rm }}</p>
                </div>

                <div class="p-2 bg-gray-50 rounded-lg shadow-sm">
                    <p class="font-medium text-gray-800">Usia</p>
                    <p class="font-semibold text-gray-700">{{ $user->pasien->umur }}</p>
                </div>

            </div>


            <!-- Health Notes -->
            <button
                class="w-full bg-pink-100 hover:bg-pink-200 transition py-2 rounded-lg flex items-center justify-center text-sm font-medium text-gray-800 shadow">
                <span class="text-lg mr-2">📄</span>
                Catatan Kesehatan
            </button>

        </aside>

    </div>
</x-layouts.app>