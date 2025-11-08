<x-layouts.app :title="__('Detail Pasien')">
    <div class="flex-1 space-y-6">
        <!-- Back Button -->
        <button onclick="window.history.back()" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali</span>
        </button>

        <!-- Header Pasien -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-start gap-4">
                    <!-- Avatar -->
                    <div class="w-20 h-20 bg-indigo-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    
                    <!-- Info Utama -->
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Budi Santoso</h1>
                        <div class="grid grid-cols-3 gap-6 text-sm">
                            <div>
                                <span class="text-gray-600">Laki-Laki, 39 Tahun</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Gol. Darah </span>
                                <span class="font-semibold text-red-600">A+</span>
                            </div>
                            <div>
                                <span class="text-gray-600">RM-2024-001</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-6 text-sm mt-3">
                            <div>
                                <span class="text-gray-600">No. Telepon: </span>
                                <span class="font-medium">081269042067</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Email: </span>
                                <span class="font-medium">BudiSantoso@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Button -->
                <button class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Data
                </button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-4 gap-4 pt-6 border-t border-gray-200">
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-600">15</div>
                    <div class="text-sm text-gray-600 mt-1">Total Kunjungan</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600">10 Des 2024</div>
                    <div class="text-sm text-gray-600 mt-1">Kunjungan Terakhir</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">2</div>
                    <div class="text-sm text-gray-600 mt-1">Resep</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-pink-600">Rp 3...</div>
                    <div class="text-sm text-gray-600 mt-1">Total Transaksi</div>
                </div>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="bg-white rounded-lg shadow">
            <div class="border-b border-gray-200">
                <nav class="flex overflow-x-auto">
                    <button class="px-6 py-3 border-b-2 border-blue-600 text-blue-600 font-semibold whitespace-nowrap">
                        Informasi Pribadi
                    </button>
                    <button class="px-6 py-3 text-gray-600 hover:text-gray-900 whitespace-nowrap">
                        Riwayat Kunjungan
                    </button>
                    <button class="px-6 py-3 text-gray-600 hover:text-gray-900 whitespace-nowrap">
                        Resep dan Obat
                    </button>
                    <button class="px-6 py-3 text-gray-600 hover:text-gray-900 whitespace-nowrap">
                        Hasil Lab
                    </button>
                    <button class="px-6 py-3 text-gray-600 hover:text-gray-900 whitespace-nowrap">
                        Pembayaran
                    </button>
                </nav>
            </div>

            <!-- Tab Content - Informasi Pribadi -->
            <div class="p-6">
                <div class="grid grid-cols-3 gap-6">
                    <!-- Column 1: Data Pribadi -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Pribadi</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-600">NIK</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">333333</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Lahir</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">9 Februari 2005 (20 Tahun)</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Jenis Kelamin</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">Laki-Laki</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Tanggal Registrasi</label>
                                    <p class="text-sm text-gray-500 mt-1">(Kapan dia Registrasi)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Kontak & Alamat -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Kontak & Alamat</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-600">No. Telepon</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">081269042067</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Email</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">BudiSantoso7@gmail.com</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Alamat Lengkap</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">Jl. Jenderal Sudirman</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3: Kontak Darurat & Info Medis -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Kontak Darurat</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-600">Nama</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">Mbergeh</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Hubungan</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">Abang Kandung</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">No. Telepon</label>
                                    <p class="text-sm font-medium text-gray-900 mt-1">0813-9876-5432</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Medis</h3>
                            
                            <div>
                                <label class="text-sm text-gray-600 mb-2 block">Riwayat Penyakit</label>
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-pink-100 text-pink-700">
                                        Hipertensi
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                        Diabetes Tipe 2
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>