<x-layouts.app :title="__('Dashboard')">
    <div class="flex gap-6 p-6">

        <!-- LEFT CONTENT -->
        <div class="flex-1 space-y-6">

            <!-- Greeting -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Halo, Test_User 👋</h2>
                <p class="text-gray-500 text-sm">Bagaimana kabar hari ini?</p>
            </div>

            <!-- Quick Cards -->
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-gradient-to-br from-pink-300 to-pink-400 rounded-xl h-28 shadow"></div>
                <div class="bg-gradient-to-br from-purple-300 to-purple-400 rounded-xl h-28 shadow"></div>
                <div class="bg-gradient-to-br from-blue-300 to-blue-400 rounded-xl h-28 shadow"></div>
            </div>

            <!-- Nomor Antrian Pasien -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="font-semibold text-lg mb-4 text-gray-800">Nomor Antrian Anda</h3>

                <div class="grid grid-cols-3 gap-4">

                    <!-- Nomor Antrian -->
                    <div class="bg-pink-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Nomor Antrian</p>
                        <p class="text-2xl font-bold text-pink-600">A-011</p>
                        <p class="text-xs text-gray-400 mt-1">2025-11-18 14:35</p>
                    </div>

                    <!-- Antrian Sekarang -->
                    <div class="bg-blue-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Antrian Sekarang</p>
                        <p class="text-2xl font-bold text-blue-600">A-009</p>
                    </div>

                    <!-- Sisa Antrian -->
                    <div class="bg-green-50 rounded-lg p-4 text-center shadow">
                        <p class="text-xs text-gray-500">Sisa Antrian</p>
                        <p class="text-2xl font-bold text-green-600">2</p>
                    </div>
                </div>
            </div>

            <!-- Jadwal Janji Temu -->
            <div class="bg-white rounded-xl shadow p-4">
                <h3 class="font-semibold mb-3 text-gray-800">Janji Temu Mendatang</h3>

                <div class="p-4 bg-pink-50 rounded-xl flex items-center justify-between shadow-sm">

                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gray-300 rounded-full"></div>

                        <div>
                            <p class="font-semibold text-gray-800">Kontrol 1</p>
                            <p class="text-gray-500 text-sm">
                                Dr. Nabila Huwaida ·
                                10 November 2025 ·
                                15.00 - 19.00 WIB
                            </p>
                        </div>
                    </div>

                    <div class="w-7 h-7 flex items-center justify-center bg-gray-200 rounded-full text-xs">
                        2
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <aside class="w-72 bg-white rounded-xl p-6 shadow space-y-6">

            <!-- Profile -->
            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-gray-300 mb-3"></div>
                <p class="font-semibold text-gray-800 text-lg">Test_User</p>
            </div>

            <!-- Health Stats -->
            <div class="grid grid-cols-3 text-center text-sm text-gray-600 gap-4">

                <div class="p-2 bg-gray-50 rounded-lg shadow-sm">
                    <p class="font-medium text-gray-800">Gol. Darah</p>
                    <p class="text-red-500 font-semibold">A</p>
                </div>

                <div class="p-2 bg-gray-50 rounded-lg shadow-sm">
                    <p class="font-medium text-gray-800">No. Rekam Medis</p>
                    <p class="font-semibold text-gray-700">RM001</p>
                </div>

                <div class="p-2 bg-gray-50 rounded-lg shadow-sm">
                    <p class="font-medium text-gray-800">Usia</p>
                    <p class="font-semibold text-gray-700">45 Tahun</p>
                </div>

            </div>


            <!-- Health Notes -->
            <button class="w-full bg-pink-100 hover:bg-pink-200 transition py-2 rounded-lg flex items-center justify-center text-sm font-medium text-gray-800 shadow">
                <span class="text-lg mr-2">📄</span>
                Catatan Kesehatan
            </button>

        </aside>

    </div>
</x-layouts.app>