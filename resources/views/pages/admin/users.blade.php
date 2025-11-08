<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>
<x-layouts.app :title="__('Pengguna')">
    <div class="bg-white rounded-lg shadow p-4 w-80 mb-6 border border-blue-200">
        <div class="flex items-center space-x-4 bg-pink-50 p-4 rounded-lg">
            <div class="bg-blue-100 p-3 rounded-lg">
                <i class="fas fa-bed text-blue-500 text-2xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Pasien</p>
                <p class="text-xl font-semibold text-gray-500">1220</p>
            </div>
        </div>
        <div class="mt-4 text-sm text-gray-600">
            <p>Total pasien : 21</p>
            <p>30 Hari Terakhir : 231</p>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-left border-collapse">
            <thead class="bg-pink-50">
                <tr>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">No. RM</th>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">Nama Pasien</th>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">NIK</th>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">L/P</th>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">Umur</th>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">No. Telepon</th>
                    <th class="py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 text-gray-500">RM-2024-001</td>
                    <td class="py-2 px-4 text-gray-500">Budi Santoso</td>
                    <td class="py-2 px-4 text-gray-500">3174012345670001</td>
                    <td class="py-2 px-4 text-gray-500">L</td>
                    <td class="py-2 px-4 text-gray-500">39 Tahun</td>
                    <td class="py-2 px-4 text-gray-500">0812-3456-7890</td>
                    <td class="py-2 px-4 text-gray-500 hover:text-gray-800 cursor-pointer">
                        <i class="fas fa-eye"></i>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 text-gray-500">RM-2024-001</td>
                    <td class="py-2 px-4 text-gray-500">Budi Santoso</td>
                    <td class="py-2 px-4 text-gray-500">3174012345670001</td>
                    <td class="py-2 px-4 text-gray-500">L</td>
                    <td class="py-2 px-4 text-gray-500">39 Tahun</td>
                    <td class="py-2 px-4 text-gray-500">0812-3456-7890</td>
                    <td class="py-2 px-4 text-gray-500 hover:text-gray-800 cursor-pointer">
                        <i class="fas fa-eye"></i>
                    </td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 text-gray-500">RM-2024-001</td>
                    <td class="py-2 px-4 text-gray-500">Budi Santoso</td>
                    <td class="py-2 px-4 text-gray-500">3174012345670001</td>
                    <td class="py-2 px-4 text-gray-500">L</td>
                    <td class="py-2 px-4 text-gray-500">39 Tahun</td>
                    <td class="py-2 px-4 text-gray-500">0812-3456-7890</td>
                    <td class="py-2 px-4 text-gray-500 hover:text-gray-800 cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layouts.app>
