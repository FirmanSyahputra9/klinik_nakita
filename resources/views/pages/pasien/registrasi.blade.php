<x-layouts.app :title="__('Registrasi')">
    <div class="flex-1 space-y-6 p-4 md:p-6">

        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Registrasi</h2>
        </div>

        <!-- Form Card -->
        <div class="card bg-white dark:bg-gray-800 rounded-lg shadow p-4 md:p-6">

            <form action="{{ route('registrasi.store') }}" method="POST">
                @csrf

                <div class="card grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="card block text-sm font-medium text-gray-700 dark:text-gray-100 mb-1">
                            Nama Lengkap (Autofill sesuai Registrasi Pasien)
                        </label>
                        <input type="text" name="name"
                            value="{{ old('name', $pasien->pasien->name ?? '') }}"
                            class="card w-full px-4 py-2 border border-gray-300 rounded-lg
                                      focus:outline-none focus:ring-2 focus:ring-blue-500
                                      dark:bg-gray-800 dark:border-gray-600"
                            readonly>
                    </div>

                    <!-- Nomor Rekam Medis -->
                    <div>
                        <label class="card block text-sm font-medium text-gray-700 dark:text-gray-100 mb-1">
                            Nomor Rekam Medis (Autofill)
                        </label>
                        <input type="text" name="nomor_rm"
                            value="{{ old('nomor_rm', $pasien->pasien->no_rm ?? '') }}"
                            class="card w-full px-4 py-2 border border-gray-300 rounded-lg
                                      focus:outline-none focus:ring-2 focus:ring-blue-500
                                      dark:bg-gray-800 dark:border-gray-600"
                            readonly>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="card block text-sm font-medium text-gray-700 dark:text-gray-100 mb-1">
                            Nomor Telepon (Autofill)
                        </label>
                        <input type="tel" name="no_telepon"
                            value="{{ old('no_telepon', $pasien->pasien->phone ?? '') }}"
                            class="card w-full px-4 py-2 border border-gray-300 rounded-lg
                                      focus:outline-none focus:ring-2 focus:ring-blue-500
                                      dark:bg-gray-800 dark:border-gray-600"
                            readonly>
                    </div>

                    <!-- Info Poliklinik & Dokter -->
                    <div class="w-full card ">
                        <label class="card block text-sm font-medium text-gray-700 dark:text-gray-100 mb-1">&nbsp;</label>

                        <div class="card bg-gray-100 dark:bg-gray-900 p-4 rounded-lg text-sm border border-gray-200">
                            <input type="number" name="dokter_id" value="{{ $dokter->id }}" hidden>

                            <p class="card font-semibold text-gray-900 dark:text-gray-100">
                                Poliklinik: Poli Gigi (tergantung dokter)
                            </p>
                            <p class="card text-gray-700 dark:text-gray-400">Dokter: {{ $dokter->name }}</p>

                            <p class="card text-gray-700 dark:text-gray-100 font-semibold mt-2">Jadwal Praktik:</p>
                            @foreach ($groupedJadwals ?? [] as $jadwalGroup)
                            @php
                            $hariTampil =
                            $jadwalGroup['hari_mulai'] === $jadwalGroup['hari_selesai']
                            ? $jadwalGroup['hari_mulai']
                            : $jadwalGroup['hari_mulai'] . ' – ' . $jadwalGroup['hari_selesai'];
                            @endphp

                            <p class="card text-gray-700 dark:text-gray-400">
                                {{ $hariTampil }}, {{ $jadwalGroup['mulai'] }} - {{ $jadwalGroup['selesai'] }}
                            </p>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tanggal Berobat -->
                    <div x-data="{
                        tanggal: '{{ old('tanggal_kunjungan') }}' || '{{ now()->format('Y-m-d') }}',
                        jam: '{{ old('jam_berobat', now()->format('H:i')) }}',
                        today: '{{ now()->format('Y-m-d') }}',
                        nowTime() {
                            return new Date().toISOString().slice(11, 16);
                        }
                    }"
                        x-effect="
                            if (tanggal === today && jam < nowTime()) {
                                jam = nowTime();
                            }
                         ">
                        <div>
                            <label class="card block text-sm font-medium text-gray-700 dark:text-gray-100 mb-1">
                                Tanggal Kunjungan
                            </label>
                            <input type="date" name="tanggal_kunjungan" x-model="tanggal"
                                value="{{ old('tanggal_kunjungan') }}"
                                min="{{ now()->format('Y-m-d') }}"
                                class="card w-full px-4 py-2 border border-gray-300 rounded-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-500
                                          dark:bg-gray-800 dark:border-gray-600"
                                required>
                        </div>

                    </div>

                    <!-- Keluhan -->
                    <div x-data="{ keluhan: '{{ old('keluhan') }}', max: 255 }" class="md:col-span-2">

                        <div class="flex justify-between items-center mb-1">
                            <label class="card block text-sm font-medium text-gray-700 dark:text-gray-100">
                                Keluhan
                            </label>

                            <span class="text-xs"
                                :class="keluhan.length >= max ? 'text-red-600' : 'text-gray-400'">
                                <span x-text="keluhan.length"></span>/<span x-text="max"></span>
                            </span>
                        </div>

                        <textarea name="keluhan" rows="4" x-model="keluhan" maxlength="255"
                            placeholder="Tuliskan keluhan Anda..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                         focus:outline-none focus:ring-2 focus:ring-blue-500
                                         dark:bg-gray-800 dark:border-gray-600"
                            required></textarea>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="card flex flex-col sm:flex-row justify-end gap-3 mt-6">

                    <button type="button"
                        onclick="window.history.back()"
                        class="card w-full sm:w-auto px-6 py-2 border border-gray-300 text-gray-700 dark:text-gray-100
                                   rounded-lg hover:bg-gray-50 transition">
                        Batal
                    </button>

                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2 bg-blue-600 dark:bg-gray-950 text-white rounded-lg
                                   hover:bg-blue-700 dark:hover:bg-gray-700 dark:hover:border transition">
                        Daftar
                    </button>

                </div>

            </form>
        </div>
    </div>
</x-layouts.app>