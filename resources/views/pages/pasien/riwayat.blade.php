<x-layouts.app :title="__('Riwayat')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Riwayat Medis</h2>
            <p class="text-gray-500 text-sm mt-1">Lihat seluruh riwayat dan kunjungan pemeriksaan anda</p>
        </div>

        <!-- List Riwayat -->
        <div class="space-y-4">
            <!-- Item 1 - Kontrol Rutin -->
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4">
                <button class="w-full flex items-start justify-between" onclick="toggleDetail(1)">
                    <div class="flex items-start gap-4">
                        <!-- Icon -->
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        
                        <!-- Info -->
                        <div class="text-left">
                            <h3 class="font-semibold text-lg text-gray-900">Kontrol Rutin</h3>
                            <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>30 Lal 1900 BC</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>25.00</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Dr. Adolf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chevron -->
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" id="chevron-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                <!-- Detail (Hidden by default) -->
                <div id="detail-1" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out mt-4 pt-0 border-t border-gray-200 opacity-0">
                    <div class="grid grid-cols-2 gap-4 text-sm py-4">
                        <div>
                            <p class="text-gray-500">Diagnosa</p>
                            <p class="font-medium text-gray-500">Tekanan darah tinggi</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Resep Obat</p>
                            <p class="font-medium text-gray-500">Amlodipin 5mg, Captopril 25mg</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Catatan</p>
                            <p class="font-medium text-gray-500">Kontrol rutin tekanan darah, diet rendah garam</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Biaya</p>
                            <p class="font-medium text-green-600">Rp 150.000</p>
                        </div>
                    </div>
                </div>


            <!-- Item 2 - Pemeriksaan Lab -->
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4">
                <button class="w-full flex items-start justify-between" onclick="toggleDetail(2)">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        
                        <div class="text-left">
                            <h3 class="font-semibold text-lg text-gray-900">Pemeriksaan Lab</h3>
                            <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>25 Lal 1900 BC</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>13.00</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Dr. Gio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" id="chevron-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                <div id="detail-2" class="hidden mt-4 pt-4 border-t border-gray-200">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Jenis Pemeriksaan</p>
                            <p class="font-medium">Darah lengkap, Gula darah</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Hasil</p>
                            <p class="font-medium">Normal</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Catatan</p>
                            <p class="font-medium">Semua hasil dalam batas normal</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Biaya</p>
                            <p class="font-medium text-green-600">Rp 250.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 3 - Konsultasi -->
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4">
                <button class="w-full flex items-start justify-between" onclick="toggleDetail(3)">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        
                        <div class="text-left">
                            <h3 class="font-semibold text-lg text-gray-900">Konsultasi</h3>
                            <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>23 Lal 1900 BC</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>21.00</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Dr. Gio</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" id="chevron-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                <div id="detail-3" class="hidden mt-4 pt-4 border-t border-gray-200">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Keluhan</p>
                            <p class="font-medium">Sakit kepala berkepanjangan</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Diagnosa</p>
                            <p class="font-medium">Migrain</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Resep</p>
                            <p class="font-medium">Paracetamol 500mg</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Biaya</p>
                            <p class="font-medium text-green-600">Rp 100.000</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item 4 - Berobat -->
            <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4">
                <button class="w-full flex items-start justify-between" onclick="toggleDetail(4)">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        
                        <div class="text-left">
                            <h3 class="font-semibold text-lg text-gray-900">Berobat</h3>
                            <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>03 Lal 1900 BC</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>19.00</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Dr. Nabila</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <svg class="w-6 h-6 text-gray-400 transform transition-transform" id="chevron-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                
                <div id="detail-4" class="hidden mt-4 pt-4 border-t border-gray-200">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Keluhan</p>
                            <p class="font-medium">Demam dan batuk</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Diagnosa</p>
                            <p class="font-medium">ISPA</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Resep</p>
                            <p class="font-medium">Antibiotik, Obat batuk</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Biaya</p>
                            <p class="font-medium text-green-600">Rp 175.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleDetail(id) {
        const detail = document.getElementById('detail-' + id);
        const chevron = document.getElementById('chevron-' + id);

        if (detail.classList.contains('max-h-0')) {
            detail.classList.remove('max-h-0', 'opacity-0', 'pt-0');
            detail.classList.add('max-h-[500px]', 'opacity-100', 'pt-4');
            chevron.classList.add('rotate-180');
        } else {
            detail.classList.add('max-h-0', 'opacity-0', 'pt-0');
            detail.classList.remove('max-h-[500px]', 'opacity-100', 'pt-4');
            chevron.classList.remove('rotate-180');
        }
    }
    </script>
</x-layouts.app>