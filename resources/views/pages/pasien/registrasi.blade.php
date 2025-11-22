<x-layouts.app :title="__('Registrasi')">
    <div class="flex-1 space-y-6 ">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Registrasi</h2>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('registrasi.store') }}" method="POST" class="">
                @csrf

                <div class="grid grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap (Autofill sesuai Registrasi Pasien)
                        </label>
                        <input type="text" name="name" value="{{ old('name', $pasien->pasien->name ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                            readonly>
                    </div>

                    <!-- Nomor Rekam Medis -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Rekam Medis (Autofill)
                        </label>
                        <input type="text" name="nomor_rm"
                            value="{{ old('nomor_rm', $pasien->pasien->no_rm ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                            readonly>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon (Autofill)
                        </label>
                        <input type="tel" name="no_telepon"
                            value="{{ old('no_telepon', $pasien->pasien->phone ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                            readonly>
                    </div>

                    <!-- Info Poliklinik & Dokter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            &nbsp;
                        </label>
                        <div class="bg-gray-100 p-4 rounded-lg text-sm">
                            <input type="dokter_id" name="dokter_id" value="{{ $dokter->id }}" hidden>
                            <p class="font-semibold text-gray-900">Poliklinik: Poli Gigi (tergantung dokter)</p>
                            <p class="text-gray-700">Dokter: {{ $dokter->name }}</p>
                            <p class="text-gray-700">Jadwal Praktik:
                                @foreach ($groupedJadwals as $jadwalGroup)
                                    @php
                                        $hariTampil =
                                            $jadwalGroup['hari_mulai'] === $jadwalGroup['hari_selesai']
                                                ? $jadwalGroup['hari_mulai']
                                                : $jadwalGroup['hari_mulai'] . ' – ' . $jadwalGroup['hari_selesai'];
                                    @endphp
                                    <p class="text-gray-700">
                                        {{ $hariTampil }}, {{ $jadwalGroup['mulai'] }} - {{ $jadwalGroup['selesai'] }}
                                    </p>
                                @endforeach
                            </p>
                        </div>
                    </div>

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
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Kunjungan
                            </label>
                            <input type="date" name="tanggal_kunjungan" x-model="tanggal"
                                value="{{ old('tanggal_kunjungan') }}" min="{{ now()->format('Y-m-d') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                                required>
                        </div>

                        {{-- <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Jam Berobat
                            </label>
                            <input type="time" name="jam_berobat" x-model="jam" value="{{ old('jam_berobat') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                                required>
                        </div> --}}
                    </div>

                    <div x-data="{ keluhan: '{{ old('keluhan') }}', max: 255 }" class="w-full">

                        <div class="flex justify-between items-center mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Keluhan
                            </label>
                            <span class="text-xs" :class="keluhan.length >= max ? 'text-red-600' : 'text-zinc-500'">
                                <span x-text="keluhan.length"></span>/<span x-text="max"></span>
                            </span>
                        </div>

                        <textarea name="keluhan" rows="4" x-model="keluhan" maxlength="255"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                            placeholder="Tuliskan keluhan Anda..." required></textarea>

                    </div>


                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="window.history.back()"
                            class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Daftar
                        </button>
                    </div>
            </form>
        </div>
    </div>
</x-layouts.app>
