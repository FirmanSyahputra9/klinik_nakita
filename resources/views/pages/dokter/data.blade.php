<x-layouts.app :title="__('Data')">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-2">Data Pasien</h1>
        <p class="text-gray-600 mb-6">Selamat Datang, dr. Aditya Hutagalung</p>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">Data Pasien</h2>
                <input type="text" placeholder="Cari Pasien..."
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring focus:ring-blue-200" />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-separate border-spacing-y-2">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm">
                            <th class="text-left px-4 py-2">Nama</th>
                            <th class="text-left px-4 py-2">Umur</th>
                            <th class="text-left px-4 py-2">Jenis Kelamin</th>
                            <th class="text-left px-4 py-2">No. Rekam Medis</th>
                            <th class="text-left px-4 py-2">Terakhir Berkunjung</th>
                            <th class="text-left px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800">
                        <tr class="bg-white hover:bg-gray-50 rounded-lg shadow-sm">
                            <td class="px-4 py-3">
                                <div class="font-semibold">Siti Nurhaliza</div>
                                <div class="text-gray-500 text-xs">0812-3456-7890</div>
                            </td>
                            <td class="px-4 py-3">45 Tahun</td>
                            <td class="px-4 py-3">Perempuan</td>
                            <td class="px-4 py-3">RM-001234</td>
                            <td class="px-4 py-3">12 Jan 2024</td>
                            <td class="px-4 py-3">
                                <a href="{{ url('/dokter/data/detail') }}"
                                    class="text-blue-600 font-medium hover:underline">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
