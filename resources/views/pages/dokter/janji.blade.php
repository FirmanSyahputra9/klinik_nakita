<x-layouts.app :title="__('Janji')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Janji Temu</h1>
                <p class="text-gray-600 mt-1">Selamat Datang, dr. Aditya Hutagalung</p>
            </div>
            
            <!-- Profile Badge -->
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="font-semibold text-gray-900">Nabila Huwaida</p>
                    <p class="text-sm text-gray-600">Dokter</p>
                </div>
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <!-- Filter Section -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Daftar Janji Temu</h2>
                
                <div class="flex items-center gap-3">
                    <!-- Date Filter -->
                    <input 
                        type="date" 
                        value="2024-01-15"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    
                    <!-- Status Filter -->
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                        <!-- Row 1 -->
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-4">
                                <span class="text-sm font-medium text-gray-900">9 Desember 2024</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm font-medium text-gray-900">09:00</span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Siti Nurhaliza</p>
                                    <p class="text-sm text-gray-600">0812-3456-7890</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm text-gray-700">Kontrol rutin diabetes</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    Menunggu
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    <button class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        Konfirmasi
                                    </button>
                                    <button class="px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">
                                        Batalkan
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-4">
                                <span class="text-sm font-medium text-gray-900">9 Desember 2024</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm font-medium text-gray-900">09.30</span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Jeffrey Epstein</p>
                                    <p class="text-sm text-gray-600">0813-4567-8901</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm text-gray-700">Sakit kepala dan demam</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Selesai
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    <button class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        Konfirmasi
                                    </button>
                                    <button class="px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">
                                        Batalkan
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="py-4 px-4">
                                <span class="text-sm font-medium text-gray-900">3 November 2024</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm font-medium text-gray-900">10:00</span>
                            </td>
                            <td class="py-4 px-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Jeffrey Epstein</p>
                                    <p class="text-sm text-gray-600">0813-4567-8901</p>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm text-gray-700">Pemeriksaan kesehatan rutin</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    Menunggu
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    <button class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                        Konfirmasi
                                    </button>
                                    <button class="px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition">
                                        Batalkan
                                    </button>
                                </div>
                            </td>
                        </tr>
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