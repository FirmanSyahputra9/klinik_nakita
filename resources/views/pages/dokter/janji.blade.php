<x-layouts.app :title="__('Janji')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Janji Temu</h1>

            </div>

        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <!-- Filter Section -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Daftar Janji Temu</h2>

                <div class="flex items-center gap-3">
                    <!-- Date Filter -->
                    <input type="date" value="2024-01-15"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />

                    <!-- Status Filter -->
                    <select
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Selesai</option>
                        <option>Dibatalkan</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Tanggal</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Waktu</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Pasien</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Keluhan</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($janji as $item)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4">
                                    <span
                                        class="text-sm font-medium text-gray-900">{{ $item->tanggal_kunjungan }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <span class="text-sm font-medium text-gray-900">{{ $item->jam_berobat }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $item->pasiens->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $item->pasiens->phone }}</p>
                                    </div>
                                </td>

                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-700">{{ $item->keluhan }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $item->status == 0 ? 'bg-blue-600' : 'bg-green-600' }}">
                                        {{ $item->status == 0 ? 'Menunggu' : 'Terkonfirmasi' }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            Konfirmasi
                                        </button>
                                        <button
                                            class="px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">
                                            Batalkan
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Empty State (jika tidak ada data) -->
            <!-- <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-sm">Tidak ada janji temu untuk tanggal ini</p>
            </div> -->
        </div>
    </div>
</x-layouts.app>
