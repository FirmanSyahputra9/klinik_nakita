<x-layouts.app :title="__('Data Dokter')">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Data Dokter</h1>

        <a href="#"
           class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Dokter
        </a>
    </div>

    <!-- Search -->
    <div class="mb-4">
        <input type="text" placeholder="Cari nama atau spesialisasi..."
               class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3">Nama Lengkap</th>
                    <th class="px-4 py-3">Spesialisasi</th>
                    <th class="px-4 py-3">No. Telepon</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Dibuat Pada</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <!-- Dummy data 1 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">dr. Ahmad Siregar</td>
                    <td class="px-4 py-3">Spesialis Penyakit Dalam</td>
                    <td class="px-4 py-3">0812-3456-7890</td>
                    <td class="px-4 py-3">ahmad@example.com</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-green-100 text-green-700">Aktif</span>
                    </td>
                    <td class="px-4 py-3 text-center">09 Nov 2025</td>
                    <td class="px-4 py-3 text-center flex justify-center gap-2">
                        <a href="#" class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <button class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Dummy data 2 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">dr. Rina Oktaviani</td>
                    <td class="px-4 py-3">Spesialis Anak</td>
                    <td class="px-4 py-3">0813-9876-5432</td>
                    <td class="px-4 py-3">rina@example.com</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-red-100 text-red-700">Nonaktif</span>
                    </td>
                    <td class="px-4 py-3 text-center">05 Nov 2025</td>
                    <td class="px-4 py-3 text-center flex justify-center gap-2">
                        <a href="#" class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <button class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Dummy data 3 -->
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">dr. Bayu Pratama</td>
                    <td class="px-4 py-3">Spesialis Bedah Umum</td>
                    <td class="px-4 py-3">0821-4567-1122</td>
                    <td class="px-4 py-3">bayu@example.com</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded text-xs font-semibold bg-green-100 text-green-700">Aktif</span>
                    </td>
                    <td class="px-4 py-3 text-center">01 Nov 2025</td>
                    <td class="px-4 py-3 text-center flex justify-center gap-2">
                        <a href="#" class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <button class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</x-layouts.app>
