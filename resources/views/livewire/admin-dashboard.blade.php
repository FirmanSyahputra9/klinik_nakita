<div class="p-6">

    <!-- TOP CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
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
                <p>Spesialis: 10</p>
                <p>Umum: 11</p>
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
                <p>30 Hari Terakhir: 231</p>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 16v6m3-3H9" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-gray-800 font-bold text-lg">Stok Obat</h2>
                    <p class="text-gray-500 text-sm">67</p>
                </div>
            </div>
        </div>

    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT SIDE (APPOINTMENTS + OBAT) -->
        <div class="lg:col-span-2 space-y-10">

            <!-- TABLE APPOINTMENTS -->
            <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Daftar Janji (Appointments)</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full border-separate border-spacing-y-3 text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-2 text-left">Kode</th>
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Nama Pasien</th>
                                <th class="px-4 py-2 text-left">Dokter</th>
                                <th class="px-4 py-2 text-left">Keluhan</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-gray-700">

                            <tr class="bg-white shadow rounded-lg hover:bg-gray-50">
                                <td class="px-4 py-2">AP-001</td>
                                <td class="px-4 py-2">12 Jan 2024</td>
                                <td class="px-4 py-2">Yazid Nasution</td>
                                <td class="px-4 py-2">dr. Aditya</td>
                                <td class="px-4 py-2">Demam</td>
                                <td class="px-4 py-2">Menunggu</td>
                                <td class="px-4 py-2 text-center">
                                    <button class="p-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Detail</button>
                                </td>
                            </tr>

                            <tr class="bg-white shadow rounded-lg hover:bg-gray-50">
                                <td class="px-4 py-2">AP-002</td>
                                <td class="px-4 py-2">13 Jan 2024</td>
                                <td class="px-4 py-2">Rafi Saputra</td>
                                <td class="px-4 py-2">dr. Maya</td>
                                <td class="px-4 py-2">Batuk</td>
                                <td class="px-4 py-2">Selesai</td>
                                <td class="px-4 py-2 text-center">
                                    <button class="p-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Detail</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TABLE STOK OBAT -->
            <div class="bg-white rounded-xl shadow p-6 border border-gray-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Stok Obat</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full border-separate border-spacing-y-3 text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-4 py-3">Kode</th>
                                <th class="px-4 py-3">Nama Obat</th>
                                <th class="px-4 py-3">Stok</th>
                                <th class="px-4 py-3">Satuan</th>
                                <th class="px-4 py-3">Harga Beli</th>
                                <th class="px-4 py-3">Harga Jual</th>
                                <th class="px-4 py-3">Kadaluwarsa</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr class="bg-white shadow rounded-lg hover:bg-gray-50">
                                <td class="px-4 py-3">OB-001</td>
                                <td class="px-4 py-3">Paracetamol</td>
                                <td class="px-4 py-3">120</td>
                                <td class="px-4 py-3">Tablet</td>
                                <td class="px-4 py-3">Rp 1.500</td>
                                <td class="px-4 py-3">Rp 3.000</td>
                                <td class="px-4 py-3">12/2025</td>
                                <td class="px-4 py-3 text-center">
                                    <button class="p-2 bg-green-600 text-white rounded hover:bg-green-700">Edit</button>
                                </td>
                            </tr>

                            <tr class="bg-white shadow rounded-lg hover:bg-gray-50">
                                <td class="px-4 py-3">OB-002</td>
                                <td class="px-4 py-3">Amoxicillin</td>
                                <td class="px-4 py-3">200</td>
                                <td class="px-4 py-3">Kapsul</td>
                                <td class="px-4 py-3">Rp 2.000</td>
                                <td class="px-4 py-3">Rp 4.000</td>
                                <td class="px-4 py-3">08/2024</td>
                                <td class="px-4 py-3 text-center">
                                    <button class="p-2 bg-green-600 text-white rounded hover:bg-green-700">Edit</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE CLOCK -->
        <div class="bg-white rounded-xl shadow p-4 border border-gray-200 flex flex-col items-center justify-start self-start">


            <h2 class="text-lg font-bold text-gray-800 mb-3">Jam Sekarang</h2>

            <!-- Digital Clock Box -->
            <div class="flex items-center gap-2 bg-gradient-to-br from-blue-100 to-blue-200 p-3 rounded-lg shadow-inner">

                <div id="h"
                    class="px-4 py-2 bg-white rounded-md shadow text-3xl font-bold text-blue-700 min-w-[70px] text-center">
                    00
                </div>

                <span class="text-3xl font-bold text-blue-700 pb-1">:</span>

                <div id="m"
                    class="px-4 py-2 bg-white rounded-md shadow text-3xl font-bold text-blue-700 min-w-[70px] text-center">
                    00
                </div>

                <span class="text-3xl font-bold text-blue-700 pb-1">:</span>

                <div id="s"
                    class="px-4 py-2 bg-white rounded-md shadow text-3xl font-bold text-blue-700 min-w-[70px] text-center">
                    00
                </div>
            </div>

            <script>
                setInterval(() => {
                    const now = new Date();

                    document.getElementById('h').textContent =
                        String(now.getHours()).padStart(2, '0');
                    document.getElementById('m').textContent =
                        String(now.getMinutes()).padStart(2, '0');
                    document.getElementById('s').textContent =
                        String(now.getSeconds()).padStart(2, '0');
                }, 1000);
            </script>

        </div>


    </div>

</div>