<x-layouts.app :title="__('Tindakan Pasien')">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Data Pasien</h1>
        <p class="text-gray-600 mt-1">Selamat Datang, dr. Aditya Hutagalung</p>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Data Pasien</h2>

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button class="px-6 py-3 text-sm font-medium text-blue-600 border-b-2 border-blue-600">
                Pemeriksaan Lab
            </button>
            <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                Alergi
            </button>
            <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                Keluhan
            </button>
            <button class="px-6 py-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                Tindakan
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Left: Patient Card -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl p-6 text-white shadow-lg">
                    <div class="space-y-3">
                        <div>
                            <h3 class="text-2xl font-bold">RM-00-001</h3>
                            <p class="text-xl font-semibold mt-1">Nabila</p>
                        </div>
                        
                        <div class="space-y-2 text-sm pt-4 border-t border-green-500">
                            <p><span class="font-medium">Tgl Masuk:</span> 2 Jan 2024</p>
                            <p><span class="font-medium">NIK:</span> 12********</p>
                            <p><span class="font-medium">JK:</span> Perempuan</p>
                            <p><span class="font-medium">TTL:</span> -</p>
                            <p><span class="font-medium">Umur:</span> 45 Tahun</p>
                            <p><span class="font-medium">No. Telp:</span> 0812-3456-7890</p>
                            <p><span class="font-medium">Alamat:</span> Jalan Setia Luhur No. 138</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Lab Examination Form -->
            <div class="lg:col-span-2">
                <div class="space-y-6">
                    
                    <!-- Section Title -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Pemeriksaan Laboratorium</h3>
                        <p class="text-sm text-gray-600">Pilih Pemeriksaan</p>
                    </div>

                    <!-- Add Lab Examination Dropdown -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="text-gray-600">Tambah Pemeriksaan Lab</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Results Section -->
                    <div>
                        <h4 class="text-base font-semibold text-gray-800 mb-4">Hasil Pemeriksaan</h4>

                        <!-- Hematologi Section -->
                        <div class="space-y-4">
                            <h5 class="text-sm font-semibold text-gray-700">Hematologi</h5>
                            
                            <!-- Hemoglobin (Hb) -->
                            <div class="border border-gray-200 rounded-lg p-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Hemoglobin (Hb)
                                </label>
                                <div class="flex items-center gap-3">
                                    <input type="text" 
                                           placeholder="Tambah Pemeriksaan Lab"
                                           class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <span class="text-gray-600">g/dL</span>
                                    <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Nilai Normal : 12-16</p>
                            </div>
                        </div>

                        <!-- Catatan Section -->
                        <div class="mt-6">
                            <h5 class="text-sm font-semibold text-gray-700 mb-2">Catatan</h5>
                            <textarea rows="4" 
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Tambahkan catatan..."></textarea>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
            <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Batal
            </button>
            <button class="px-8 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Simpan Hasil
            </button>
            <button class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Riwayat
            </button>
        </div>

    </div>

</x-layouts.app>