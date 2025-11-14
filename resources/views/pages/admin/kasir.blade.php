<x-layouts.app :title="__('Kasir')">
    <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Kasir</h1>

        <!-- Daftar Transaksi -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Transaksi</h3>
            <button class="bg-blue-500 rounded-sm mb-5 p-2 text-white">Tambah</button>
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
                    </tr>
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
                        <td class="px-4 py-2">
                            <button class="text-green-700 hover:text-green-700"> Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>