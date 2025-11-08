<x-layouts.app :title="__('Jadwal')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Jadwal Praktik Dokter</h2>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <!-- Filter Button -->
            <div class="mb-6">
                <button class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    Filter
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Nama</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Dokter</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Jadwal</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-4 text-sm text-gray-900">dr. Gio</td>
                            <td class="py-4 px-4 text-sm text-gray-700">Dokter Umum</td>
                            <td class="py-4 px-4 text-sm text-gray-700">Senin-Kamis, 09.00 - 17.00</td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-red-700 bg-red-50">
                                    Offline
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="p-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-4 text-sm text-gray-900">dr. Hitler</td>
                            <td class="py-4 px-4 text-sm text-gray-700">Dokter Gigi</td>
                            <td class="py-4 px-4 text-sm text-gray-700">Rabu-Jumat, 09.00 - 17.00</td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-green-700 bg-green-50">
                                    Online
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="p-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-4 text-sm text-gray-900">dr. Adolf</td>
                            <td class="py-4 px-4 text-sm text-gray-700">Dokter Gigi</td>
                            <td class="py-4 px-4 text-sm text-gray-700">Rabu-Jumat, 09.00 - 17.00</td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-green-700 bg-green-50">
                                    Online
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <button class="p-2 text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
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