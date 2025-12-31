<x-layouts.app :title="__('Input Hasil Laboratorium')">

    <!-- HEADER                    -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            Input Hasil Pemeriksaan Laboratorium
        </h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
            Modul khusus petugas laboratorium untuk mengisi hasil pemeriksaan
        </p>
    </div>

    <!-- PILIH PASIEN (DUMMY SEARCH)                      -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 mb-8">

        <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
            Pilih Pasien
        </h3>

        <!-- 
            NOTE:
            - Input ini nantinya terhubung ke tabel registrasi/antrian
            - Ketik nama / no RM pasien
            - Jika cocok, tampilkan data pasien
        -->
        <label class="font-medium text-gray-700 dark:text-gray-100">
            Cari Pasien (Nama / No. RM)
        </label>

        <input list="listPasien"
            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
            placeholder="Ketik nama atau nomor rekam medis...">

        <!-- 
            NOTE:
            - Datalist ini nanti diisi dari data registrasi pasien
            - Sekarang masih dummy
        -->
        <datalist id="listPasien">
            <option value="RM001 - Ahmad Fauzi">
            <option value="RM002 - Siti Aisyah">
            <option value="RM003 - Budi Santoso">
        </datalist>

        <!-- INFO PASIEN (DUMMY) -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4 text-sm text-gray-600 dark:text-gray-300">
            <div>
                <span class="text-gray-500">Nama Pasien</span>
                <p class="font-medium">Ahmad Fauzi</p>
            </div>
            <div>
                <span class="text-gray-500">No. RM</span>
                <p class="font-medium">RM001</p>
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm text-gray-500">
                    Tanggal Kunjungan
                </label>

                <input
                    type="date"
                    class="border rounded px-3 py-2 text-sm text-gray-700
               focus:outline-none focus:ring-2 focus:ring-blue-500
               dark:bg-gray-700 dark:text-white dark:border-gray-600">
            </div>

        </div>

    </div>

    <!-- FORM INPUT HASIL LAB (DUMMY)                     -->
    <div class="relative border rounded-xl p-6 bg-white dark:bg-gray-800 shadow mb-10">



        <div class="relative z-10">

            <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
                Input Pemeriksaan Lab
                <span class="text-sm text-red-600 ml-2">(Modul Lab)</span>
            </h3>

            <!-- 
                NOTE:
                - Form ini nantinya submit ke controller LAB
                - Sekarang DUMMY (tidak ada action)
            -->
            <form>

                <!-- Pilih Jenis Pemeriksaan -->
                <label class="font-medium text-gray-700 dark:text-gray-100">
                    Nama Pemeriksaan
                </label>

                <input list="listPemeriksaan"
                    class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                    placeholder="Pilih jenis pemeriksaan...">

                <!-- 
                    NOTE:
                    - Datalist ini nanti diambil dari master pemeriksaan lab
                -->
                <datalist id="listPemeriksaan">
                    <option value="Hemoglobin">
                    <option value="Gula Darah">
                    <option value="Kolesterol">
                    <option value="Asam Urat">
                </datalist>

                <!-- Nilai Normal -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">

                    <div>
                        <label class="font-medium">Nilai Normal Min</label>
                        <input type="text"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Contoh: 12">
                    </div>

                    <div>
                        <label class="font-medium">Nilai Normal Max</label>
                        <input type="text"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                            placeholder="Contoh: 16">
                    </div>

                </div>

                <!-- Satuan -->
                <label class="font-medium mt-4 block">Satuan</label>
                <input list="listSatuan"
                    class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                    placeholder="Pilih satuan">

                <datalist id="listSatuan">
                    <option value="g/dL">
                    <option value="mg/dL">
                    <option value="mmol/L">
                    <option value="%">
                </datalist>

                <!-- Nilai Hasil -->
                <label class="font-medium mt-4 block">Nilai Hasil</label>
                <input type="text"
                    class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                    placeholder="Masukkan nilai hasil pemeriksaan">

                <!-- Catatan -->
                <label class="font-medium mt-4 block">Catatan Lab</label>
                <textarea rows="3"
                    class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                    placeholder="Catatan tambahan dari petugas lab"></textarea>

                <!-- Tombol -->
                <button type="button"
                    class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    Simpan Hasil
                </button>

            </form>

        </div>

    </div>

    <!-- TABEL RIWAYAT PEMERIKSAAN LAB (DUMMY)            -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

        <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
            Riwayat Pemeriksaan Laboratorium
        </h3>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 border">Pemeriksaan</th>
                        <th class="px-4 py-3 border">Nilai Normal</th>
                        <th class="px-4 py-3 border">Hasil</th>
                        <th class="px-4 py-3 border">Satuan</th>
                        <th class="px-4 py-3 border">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border">
                        <td class="px-4 py-3 border">Hemoglobin</td>
                        <td class="px-4 py-3 border">-</td>
                        <td class="px-4 py-3 border">11.5</td>
                        <td class="px-4 py-3 border">g/dL</td>
                        <td class="px-4 py-3 border">
                            <span class="text-xs px-2 py-1 rounded bg-red-100 text-red-700">
                                Rendah
                            </span>
                        </td>
                    </tr>

                    <tr class="border">
                        <td class="px-4 py-3 border">Gula Darah</td>
                        <td class="px-4 py-3 border">-</td>
                        <td class="px-4 py-3 border">98</td>
                        <td class="px-4 py-3 border">mg/dL</td>
                        <td class="px-4 py-3 border">
                            <span class="text-xs px-2 py-1 rounded bg-green-100 text-green-700">
                                Normal
                            </span>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

</x-layouts.app>