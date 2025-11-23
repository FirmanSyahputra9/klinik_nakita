<x-layouts.app :title="__('Riwayat Tindakan Pasien')">

    <div class="p-6">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Riwayat Tindakan Pasien</h1>
            <p class="text-gray-600">Lihat semua riwayat tindakan & pemeriksaan pasien.</p>
        </div>

        <!-- Patient Info Card -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8 flex items-center gap-6">
            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-3xl font-bold">
                N
            </div>

            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Nabila</h2>
                <p class="text-gray-500 text-sm">RM-00-001 • Perempuan • 45 Tahun</p>
                <p class="text-gray-500 text-sm mt-1">Alamat: Jalan Setia Luhur No. 138</p>
            </div>
        </div>

        <!-- Riwayat Tables -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Riwayat Tindakan</h2>

                <input
                    type="text"
                    placeholder="Cari Riwayat..."
                    class="border border-gray-300 rounded-lg px-3 py-2 w-64 text-sm focus:ring focus:ring-blue-200" />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-separate border-spacing-y-3">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm">
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Dokter</th>
                            <th class="px-4 py-2 text-left">Keluhan</th>
                            <th class="px-4 py-2 text-left">Diagnosis</th>
                            <th class="px-4 py-2 text-left">Tindakan</th>
                            <th class="px-4 py-2 text-left">Catatan</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="text-sm text-gray-700">

                        <!-- ROW 1 -->
                        <tr class="bg-white rounded-lg shadow-sm hover:bg-gray-50">
                            <td class="px-4 py-3">02 Jan 2024</td>
                            <td class="px-4 py-3">dr. Aditya Hutagalung</td>
                            <td class="px-4 py-3">Sakit kepala berat</td>
                            <td class="px-4 py-3">Migrain</td>
                            <td class="px-4 py-3">Pemberian obat analgesik</td>
                            <td class="px-4 py-3">Pasien diobservasi 30 menit</td>

                            <td class="px-4 py-3 flex gap-2">
                                <!-- Lihat -->
                                <button class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
                                    </svg>
                                </button>

                                <!-- PDF -->
                                <button class="p-2 bg-green-600 hover:bg-green-700 text-white rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 9V2h12v7M6 18h12v4H6v-4zm0 0H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- ROW 2 -->
                        <tr class="bg-white rounded-lg shadow-sm hover:bg-gray-50">
                            <td class="px-4 py-3">12 Des 2023</td>
                            <td class="px-4 py-3">dr. Aditya Hutagalung</td>
                            <td class="px-4 py-3">Demam 3 hari</td>
                            <td class="px-4 py-3">Infeksi virus</td>
                            <td class="px-4 py-3">Pemeriksaan darah & obat penurun panas</td>
                            <td class="px-4 py-3">Disarankan istirahat cukup</td>

                            <td class="px-4 py-3 flex gap-2">
                                <button class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
                                    </svg>
                                </button>

                                <button class="p-2 bg-green-600 hover:bg-green-700 text-white rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 9V2h12v7M6 18h12v4H6v-4zm0 0H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</x-layouts.app>