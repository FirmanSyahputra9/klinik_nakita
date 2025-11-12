<x-layouts.app :title="__('Appointment')">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Jadwal dan Appointment</h1>
            <p class="text-gray-500">Kelola jadwal dokter dan appointment pasien</p>
        </div>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Waktu</th>
                    <th class="px-4 py-2 text-left">Nama Pasien</th>
                    <th class="px-4 py-2 text-left">Dokter</th>
                    <th class="px-4 py-2 text-left">Jenis Layanan</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-center">
                        <div class="flex justify-between text-sm font-semibold">
                            <div class="flex-1 text-center">Konfirmasi</div>
                            <div class="flex-1 text-center">Check-in</div>
                            <div class="flex-1 text-center">Selesai</div>
                            <div class="flex-1 text-center">Batalkan</div>
                        </div>
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 text-gray-700">
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">08:00</td>
                    <td class="px-4 py-2 font-semibold">Budi Santoso</td>
                    <td class="px-4 py-2">Dr. Hitler</td>
                    <td class="px-4 py-2">Konsultasi</td>
                    <td class="px-4 py-2">
                        <span class="text-yellow-600 bg-yellow-100 px-2 py-1 rounded text-sm">Pending</span>
                    </td>

                    <!-- Tombol aksi -->
                    <td class="px-4 py-2">
                        <div class="flex justify-between gap-2">
                            <div class="flex-1">
                                <button class="w-full bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-xs">Konfirmasi</button>
                            </div>
                            <div class="flex-1">
                                <button class="w-full bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 text-xs">Check-in</button>
                            </div>
                            <div class="flex-1">
                                <button class="w-full bg-indigo-500 text-white px-2 py-1 rounded hover:bg-indigo-600 text-xs">Selesai</button>
                            </div>
                            <div class="flex-1">
                                <button class="w-full bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Batalkan</button>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">09:00</td>
                    <td class="px-4 py-2 font-semibold">Rudi Hermawan</td>
                    <td class="px-4 py-2">Dr. Hitler</td>
                    <td class="px-4 py-2">Pemeriksaan Rutin</td>
                    <td class="px-4 py-2">
                        <span class="text-green-600 bg-green-100 px-2 py-1 rounded text-sm">Checked-in</span>
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex justify-between gap-2">
                            <div class="flex-1">
                                <button class="w-full bg-gray-400 text-white px-2 py-1 rounded text-xs cursor-not-allowed">Konfirmasi</button>
                            </div>
                            <div class="flex-1">
                                <button class="w-full bg-gray-400 text-white px-2 py-1 rounded text-xs cursor-not-allowed">Check-in</button>
                            </div>
                            <div class="flex-1">
                                <button class="w-full bg-indigo-500 text-white px-2 py-1 rounded hover:bg-indigo-600 text-xs">Selesai</button>
                            </div>
                            <div class="flex-1">
                                <button class="w-full bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">Batalkan</button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layouts.app>
