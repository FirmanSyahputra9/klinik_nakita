<x-layouts.app :title="__('Kasir')">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Kasir</h1>

            <a href="{{ route('kasir.create') }}" 
                class="bg-blue-500 rounded-sm p-2 text-white">
                Tambah
            </a>
        </div>

        <!-- Daftar Transaksi -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Transaksi</h3>

            <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Pasien</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    <!-- Contoh Data 1 -->
                    <tr>
                        <td class="px-4 py-2">15 Januari 2025</td>
                        <td class="px-4 py-2">Rp 150.000</td>
                        <td class="px-4 py-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-green-700 bg-green-50">
                                Lunas
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <button class="text-blue-600 hover:text-blue-800">Joseph Stalin</button>
                        </td>
                        <td class="px-4 py-2 flex items-center gap-3">

                            <!-- View Icon -->
                            <button class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                    <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                                </svg>
                            </button>

                            <!-- Check Icon -->
                            <button class="text-green-600 hover:text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </button>

                            <!-- X Icon -->
                            <button class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Contoh Data 2 -->
                    <tr>
                        <td class="px-4 py-2">20 Januari 2025</td>
                        <td class="px-4 py-2">Rp 200.000</td>
                        <td class="px-4 py-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium text-red-700 bg-red-50">
                                Belum Lunas
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <button class="text-blue-600 hover:text-blue-800">Adolf Hitler</button>
                        </td>
                        <td class="px-4 py-2 flex items-center gap-3">

                            <!-- View Icon -->
                            <button class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                    <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                                </svg>
                            </button>

                            <!-- Check Icon -->
                            <button class="text-green-600 hover:text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </button>

                            <!-- X Icon -->
                            <button class="text-red-600 hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
