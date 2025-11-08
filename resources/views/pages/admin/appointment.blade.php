<x-layouts.app :title="__('Appointment')">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Jadwal dan Appointment</h1>
            <p class="text-gray-500">Kelola jadwal dokter dan appointment pasien</p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="text-right">
                <p class="text-sm text-gray-500">Total Hari Ini</p>
                <p class="font-bold text-lg">24 Pasien</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Confirmed</p>
                <p class="font-bold text-lg">15 Pasien</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Checked-in</p>
                <p class="font-bold text-lg">5 Pasien</p>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="flex justify-between items-center mb-4">
        <p class="text-gray-600 font-medium">Jum'at, 20 Desember 2024</p>
        <button class="px-4 py-2 border rounded hover:bg-gray-100">Filter</button>
    </div>

    <!-- Jadwal List -->
    <div class="space-y-4 overflow-y-auto max-h-[500px] pr-2">
        <!-- Card Jadwal -->
        <div class="bg-pink-50 p-4 rounded shadow">
            <div class="flex justify-between items-center">
                <p class="font-semibold">08:00</p>
                <span class="text-purple-500 text-sm">Confirmed</span>
            </div>
            <p class="font-bold">Budi Santoso</p>
            <p class="text-gray-500">Konsultasi - Dr. Hitler</p>
            <p class="text-gray-400 text-sm">Kontrol Tekanan Darah</p>
            <div class="text-gray-500 text-sm mt-1">RM-2024-001 | 0812-3456-7890 | 60 Menit</div>
        </div>

        <div class="bg-pink-50 p-4 rounded shadow">
            <div class="flex justify-between items-center">
                <p class="font-semibold">09:00</p>
                <span class="text-green-500 text-sm">Checked-in</span>
            </div>
            <p class="font-bold">Rudi Hermawan</p>
            <p class="text-gray-500">Pemeriksaan Rutin - Dr. Hitler</p>
            <p class="text-gray-400 text-sm">Follow Up Diabetes</p>
            <div class="text-gray-500 text-sm mt-1">RM-2024-001 | 0812-3456-7890 | 30 Menit</div>
        </div>

        <div class="bg-pink-50 p-4 rounded shadow">
            <div class="flex justify-between items-center">
                <p class="font-semibold">09:30</p>
                <span class="text-green-500 text-sm">Checked-in</span>
            </div>
            <p class="font-bold">Budi Santoso</p>
            <p class="text-gray-500">Pemeriksaan Rutin - Dr. Hitler</p>
            <p class="text-gray-400 text-sm">Kontrol Tekanan Darah</p>
            <div class="text-gray-500 text-sm mt-1">RM-2024-001 | 0812-3456-7890</div>
        </div>
    </div>
    </div>
</x-layouts.app>
