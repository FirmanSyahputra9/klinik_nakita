<x-layouts.app :title="__('Detail Dokter')">
    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white rounded-2xl shadow p-6">

        <!-- HEADER -->
        <div class="flex items-start space-x-4 mb-6">
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-md text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold">Dr. Dummy Nama</h2>
                    <p class="text-gray-600 text-sm">Spesialis Anak • NIK: 123456789</p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- GRID DETAIL DOKTER -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Data Pribadi -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Data Pribadi</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">Nama Lengkap:</span> Dr. Dummy Nama</p>
                    <p><span class="font-medium">Spesialisasi:</span> Penyakit Dalam</p>
                    <p><span class="font-medium">NIK:</span> 1234567891011</p>
                    <p><span class="font-medium">Status:</span> Aktif</p>
                </div>
            </div>

            <!-- Kontak -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Kontak</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">Email:</span> dokterdummy@example.com</p>
                    <p><span class="font-medium">No. Telepon:</span> 0812-3456-7890</p>
                    <p><span class="font-medium">Alamat:</span> Jl. Contoh Jalan No. 10</p>
                </div>
            </div>
        </div>

        <!-- JADWAL PRAKTIK -->
        <div class="bg-gray-50 rounded-xl p-4 mt-6">
            <h3 class="font-semibold mb-4 text-gray-800">Jadwal Praktik</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Hari</th>
                            <th class="px-4 py-2 text-left">Aktif Mulai</th>
                            <th class="px-4 py-2 text-left">Aktif Selesai</th>
                            <th class="px-4 py-2 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        <tr>
                            <td class="px-4 py-2">Senin</td>
                            <td class="px-4 py-2">09:00</td>
                            <td class="px-4 py-2">17:00</td>
                            <td class="px-4 py-2">Praktik Umum</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">Rabu</td>
                            <td class="px-4 py-2">10:00</td>
                            <td class="px-4 py-2">14:00</td>
                            <td class="px-4 py-2">Kunjungan Homecare</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2">Jumat</td>
                            <td class="px-4 py-2">08:00</td>
                            <td class="px-4 py-2">12:00</td>
                            <td class="px-4 py-2">Operasi Minor</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts.app>