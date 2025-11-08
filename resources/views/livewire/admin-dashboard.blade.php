<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Pasien -->
        <div class="bg-white rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Total Pasien</h2>
                    <p class="text-gray-500 text-sm">1220</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Total pasien: 21</p>
                <p>30 Hari Terakhir: 231</p>
            </div>
        </div>

        <!-- Total Dokter -->
        <div class="bg-pink-100 rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-pink-200 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422A12.083 12.083 0 0121 14.094M12 14v7.5" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Total Dokter</h2>
                    <p class="text-gray-500 text-sm">21</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Spesialis: 21</p>
                <p>Umum: 21</p>
            </div>
        </div>

        <!-- Total Janji -->
        <div class="bg-white rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3M16 7V3M3 11h18M5 11v10h14V11" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Total Janji</h2>
                    <p class="text-gray-500 text-sm">1220</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Registrasi Hari Ini: 21</p>
                <p>Last 30 days: 231</p>
            </div>
        </div>

        <!-- Stok Obat -->
        <div class="bg-pink-100 rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-pink-200 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16v6m3-3H9" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Stok Obat</h2>
                    <p class="text-gray-500 text-sm">67</p>
                </div>
            </div>
        </div>
        <!-- Total Janji -->
        <div class="bg-white rounded-xl shadow p-4 border border-gray-200">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-full mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3M16 7V3M3 11h18M5 11v10h14V11" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Total Pengguna</h2>
                    <p class="text-gray-500 text-sm">{{ $totalPengguna }}</p>
                </div>
            </div>
            <div class="text-gray-500 text-sm">
                <p>Registrasi Hari Ini: {{ $penggunaHariIni }}</p>
                <p>Last 30 days: {{ $penggunabaru }}</p>
            </div>
        </div>

    </div>
</div>
