<x-layouts.app :title="__('Registrasi')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Registrasi</h2>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('registrasi.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap (Autofill sesuai Registrasi Pasien)
                        </label>
                        <input 
                            type="text" 
                            name="nama_lengkap"
                            value="{{ old('nama_lengkap', $pasien->nama_lengkap ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            readonly
                        >
                    </div>

                    <!-- Nomor Rekam Medis -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Rekam Medis (Autofill)
                        </label>
                        <input 
                            type="text" 
                            name="nomor_rm"
                            value="{{ old('nomor_rm', $pasien->nomor_rm ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            readonly
                        >
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon (Autofill)
                        </label>
                        <input 
                            type="tel" 
                            name="no_telepon"
                            value="{{ old('no_telepon', $pasien->no_telepon ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            readonly
                        >
                    </div>

                    <!-- Info Poliklinik & Dokter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            &nbsp;
                        </label>
                        <div class="bg-gray-100 p-4 rounded-lg text-sm">
                            <p class="font-semibold text-gray-900">Poliklinik: Poli Gigi (tergantung dokter)</p>
                            <p class="text-gray-700">Dokter: dr. Hitler</p>
                            <p class="text-gray-700">Jadwal Praktik: Rabu-Jumat, 09.00-17.00</p>
                        </div>
                    </div>

                    <!-- Tanggal Kunjungan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Kunjungan
                        </label>
                        <input 
                            type="date" 
                            name="tanggal_kunjungan"
                            value="{{ old('tanggal_kunjungan') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>

                    <!-- Jam Berobat -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Berobat
                        </label>
                        <input 
                            type="time" 
                            name="jam_berobat"
                            value="{{ old('jam_berobat') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>

                    <!-- Keluhan -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Keluhan
                        </label>
                        <textarea 
                            name="keluhan"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Tuliskan keluhan Anda..."
                            required
                        >{{ old('keluhan') }}</textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 mt-6">
                    <button 
                        type="button"
                        onclick="window.history.back()"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition"
                    >
                        Batal
                    </button>
                    <button 
                        type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                    >
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>