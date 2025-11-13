<x-layouts.app :title="__('Dashboard')">
    <!-- Left Content -->
    <div class="flex-1 space-y-6">
        <div>
            <h2 class="text-xl font-semibold">Halo, Test_User!</h2>
            <p class="text-gray-400 text-sm">Butuh sesuatu?</p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-pink-100 rounded-lg h-24"></div>
            <div class="bg-pink-200 rounded-lg h-24"></div>
            <div class="bg-pink-100 rounded-lg h-24"></div>
        </div>

        <!-- Janji Temu -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-semibold mb-2">Janji temu</h3>
            <div class="flex items-center justify-between p-3 bg-pink-50 rounded-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                    <div>
                        <p class="font-medium">Kontrol 1</p>
                        <p class="text-gray-400 text-sm">Dr. Nabila Huwaida · 10 November 2025 · 03.00 PM - 07.00 PM</p>
                    </div>
                </div>
                <div class="bg-gray-200 rounded-full w-6 h-6 flex items-center justify-center text-xs">2</div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <aside class="w-64 bg-white rounded-lg p-4 shadow space-y-4 mt-6">
        <div class="flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-gray-300 mb-2"></div>
            <p class="font-semibold">Test_User</p>
        </div>
        <div class="flex justify-between text-gray-500 text-sm">
            <div class="text-center">
                <p class="font-medium">G. Darah</p>
                <p class="text-red-500">X</p>
            </div>
            <div class="text-center">
                <p class="font-medium">Tinggi</p>
                <p>165cm</p>
            </div>
            <div class="text-center">
                <p class="font-medium">Berat</p>
                <p>52kg</p>
            </div>
        </div>
        <button class="w-full bg-pink-100 py-2 rounded-lg flex items-center justify-center text-sm font-medium">
            <span class="mr-2">📄</span> Catatan kesehatan
        </button>
    </aside>
</x-layouts.app>
