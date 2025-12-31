<x-layouts.app :title="__('Dashboard Lab')">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Dashboard Laboratorium
        </h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
            Ringkasan aktivitas pemeriksaan laboratorium
        </p>
    </div>

    <!-- SUMMARY CARDS            -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Pemeriksaan Masuk -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Pemeriksaan Masuk
            </p>
            <p class="text-3xl font-bold text-blue-600 mt-2">
                12
            </p>
            <p class="text-xs text-gray-400 mt-1">
                Hari ini
            </p>
        </div>

        <!-- Pending -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Menunggu Hasil
            </p>
            <p class="text-3xl font-bold text-yellow-500 mt-2">
                5
            </p>
            <p class="text-xs text-gray-400 mt-1">
                Belum diproses
            </p>
        </div>

        <!-- Selesai -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Selesai Diperiksa
            </p>
            <p class="text-3xl font-bold text-green-600 mt-2">
                7
            </p>
            <p class="text-xs text-gray-400 mt-1">
                Hari ini
            </p>
        </div>

        <!-- Terlambat -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Terlambat
            </p>
            <p class="text-3xl font-bold text-red-600 mt-2">
                1
            </p>
            <p class="text-xs text-gray-400 mt-1">
                Perlu perhatian
            </p>
        </div>

    </div>


    <!-- DAFTAR PEMERIKSAAN MASUK -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
            Pemeriksaan Masuk
        </h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Pasien</th>
                        <th class="px-4 py-3 border">Pemeriksaan</th>
                        <th class="px-4 py-3 border">Tanggal</th>
                        <th class="px-4 py-3 border">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- DUMMY DATA -->
                    <tr class="border">
                        <td class="px-4 py-3 border">1</td>
                        <td class="px-4 py-3 border">Ahmad Fauzi</td>
                        <td class="px-4 py-3 border">Hemoglobin</td>
                        <td class="px-4 py-3 border">2025-01-12</td>
                        <td class="px-4 py-3 border">
                            <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-700">
                                Pending
                            </span>
                        </td>
                    </tr>

                    <tr class="border">
                        <td class="px-4 py-3 border">2</td>
                        <td class="px-4 py-3 border">Siti Aisyah</td>
                        <td class="px-4 py-3 border">Gula Darah</td>
                        <td class="px-4 py-3 border">2025-01-12</td>
                        <td class="px-4 py-3 border">
                            <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-700">
                                Selesai
                            </span>
                        </td>
                    </tr>

                    <tr class="border">
                        <td class="px-4 py-3 border">3</td>
                        <td class="px-4 py-3 border">Budi Santoso</td>
                        <td class="px-4 py-3 border">Kolesterol</td>
                        <td class="px-4 py-3 border">2025-01-11</td>
                        <td class="px-4 py-3 border">
                            <span class="px-2 py-1 rounded text-xs bg-red-100 text-red-700">
                                Terlambat
                            </span>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

    <!-- INFO / CATATAN           -->
    <div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow p-6 text-sm text-gray-500 dark:text-gray-400">
        <p>
            Modul laboratorium berfungsi untuk memproses pemeriksaan penunjang medis.
            Dokter hanya dapat melihat hasil yang telah diverifikasi oleh petugas laboratorium.
        </p>
    </div>

</x-layouts.app>