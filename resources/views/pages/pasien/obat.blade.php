<x-layouts.app :title="__('Obat')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Resep dan Obat</h2>
            <p class="text-gray-500 text-sm mt-1">Pantau Resep dan Obat Anda</p>
        </div>


        <!-- Resep Card -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-green-200 to-green-300 p-4">
                <div class="flex items-start gap-4">
                    <!-- Icon -->
                    <div class="w-12 h-12 bg-white/50 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Info -->
                    <div class="flex-1">
                        <h3 class="font-bold text-xl text-gray-900">Malaria</h3>
                        <div class="flex items-center gap-4 mt-2 text-sm text-gray-700">
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
                                <span>Dr. Hitler</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h4 class="font-semibold text-lg mb-4">Daftar Obat</h4>
                
                <!-- Obat Item -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <!-- Obat Header -->
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900">Doxycycline 100 mg</h5>
                            <p class="text-sm text-gray-600">10 Kapsul (ini kuantitas)</p>
                            <p class="text-sm text-gray-600">100 mg (ini dosis)</p>
                        </div>
                    </div>

                    <!-- Detail Grid -->
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Frekuensi:</p>
                            <p class="text-sm text-gray-600">1 x 1 Tablet</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Waktu Konsumsi:</p>
                            <p class="text-sm text-gray-600">Siang hari setelah makan</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Harga:</p>
                            <p class="text-sm text-gray-600">Satu Miliar</p>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>

        <!-- Resep Card 2 (Example with different data) -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="bg-gradient-to-r from-blue-200 to-blue-300 p-4">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-white/50 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="font-bold text-xl text-gray-900">Hipertensi</h3>
                        <div class="flex items-center gap-4 mt-2 text-sm text-gray-700">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>20 Lal 1900 BC</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>14.00</span>
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
            </div>

            <div class="p-6">
                <h4 class="font-semibold text-lg mb-4">Daftar Obat</h4>
                
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-900">Amlodipin 5 mg</h5>
                            <p class="text-sm text-gray-600">30 Tablet (kuantitas)</p>
                            <p class="text-sm text-gray-600">5 mg (dosis)</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Frekuensi:</p>
                            <p class="text-sm text-gray-600">1 x 1 Tablet</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Waktu Konsumsi:</p>
                            <p class="text-sm text-gray-600">Pagi hari setelah makan</p>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Harga:</p>
                            <p class="text-sm text-gray-600">Setara Korupsi Pertamina</p>
                        </div>
                    </div>

                    

                    
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>