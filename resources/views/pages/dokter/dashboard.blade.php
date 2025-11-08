<x-layouts.app :title="__('Dashboard')">
    <!-- Stats -->
    <div class="grid grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500 mb-1">Pasien Hari Ini</p>
            <h2 class="text-3xl font-bold text-gray-500">12</h2>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500 mb-1">Konsultasi Selesai</p>
            <h2 class="text-3xl font-bold text-gray-500">8</h2>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500 mb-1">Menunggu</p>
            <h2 class="text-3xl font-bold text-gray-500">4</h2>
        </div>
        <div class="bg-white p-6 rounded-xl shadow">
            <p class="text-sm text-gray-500 mb-1">Pesan Baru</p>
            <h2 class="text-3xl font-bold text-gray-500">3</h2>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">
        <!-- Janji Temu -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-semibold mb-4 text-gray-500">Janji Temu Berikutnya</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-500">Siti Nurhaliza</p>
                        <p class="text-sm text-gray-500">Kontrol Rutin</p>
                    </div>
                    <div class="text-right text-sm">09:00<br>Hari Ini</div>
                </div>
                <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-500">Siti Nurhaliza</p>
                        <p class="text-sm text-gray-500">Kontrol Rutin</p>
                    </div>
                    <div class="text-right text-sm">09:00<br>Hari Ini</div>
                </div>
                <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-500">Siti Nurhaliza</p>
                        <p class="text-sm text-gray-500">Kontrol Rutin</p>
                    </div>
                    <div class="text-right text-sm">09:00<br>Hari Ini</div>
                </div>
            </div>
        </div>

        <!-- Notifikasi -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-semibold mb-4 text-gray-500">Notifikasi Terbaru</h3>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start space-x-2">
                    <span class="text-red-500 mt-1">●</span>
                    <div>
                        <p class="text-gray-500">Hasil lab Ahmad Rizki sudah keluar</p>
                        <p class="text-gray-500 text-xs">5 menit yang lalu</p>
                    </div>
                </li>
                <li class="flex items-start space-x-2">
                    <span class="text-red-500 mt-1">●</span>
                    <div>
                        <p class="text-gray-500">Pasien baru: Linda Sari mendaftar</p>
                        <p class="text-gray-500 text-xs">15 menit yang lalu</p>
                    </div>
                </li>
                <li class="flex items-start space-x-2">
                    <span class="text-red-500 mt-1">●</span>
                    <div>
                        <p class="text-gray-500">Resep untuk Tono Wijaya telah dikirim</p>
                        <p class="text-gray-500 text-xs">30 menit yang lalu</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</x-layouts.app>
