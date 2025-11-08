<x-layouts.app :title="__('Hasil Lab')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Hasil Lab</h2>
            <p class="text-gray-500 text-sm mt-1">Pantau hasil pemeriksaan laboratorium Anda</p>
        </div>

        <!-- List Hasil Lab -->
        <div class="space-y-4">
            <!-- Item 1 - Profil Lipid -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <button class="w-full bg-gradient-to-r from-green-100 to-green-200 p-4" onclick="toggleLabDetail(1)">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start gap-4">
                            <!-- Icon -->
                            <div class="w-10 h-10 bg-white/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                            
                            <!-- Info -->
                            <div class="text-left">
                                <h3 class="font-semibold text-lg text-gray-900">Profil Lipid</h3>
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
                                        <span>Dr. Gio</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Chevron -->
                        <svg class="w-6 h-6 text-gray-700 transform transition-transform" id="chevron-lab-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                        </svg>
                    </div>
                </button>
                
                <!-- Detail Table (Shown by default) -->
                <div id="lab-detail-1" class="p-6 bg-white">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Parameter</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Hasil</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Satuan</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Nilai Normal</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-100">
                                    <td class="py-3 px-2 text-sm text-gray-900">Kolestrol Total</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">180</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">mg/dl</td>
                                    <td class="py-3 px-2 text-sm text-gray-600"><200</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-yellow-700 bg-yellow-100">
                                            Sedikit Tinggi
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="py-3 px-2 text-sm text-gray-900">HDL Kolestrol</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">55</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">mg/dl</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">>40</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-green-700 bg-green-100">
                                            Normal
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="py-3 px-2 text-sm text-gray-900">LDL Kolestrol</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">110</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">mg/dl</td>
                                    <td class="py-3 px-2 text-sm text-gray-600"><100</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-yellow-700 bg-yellow-100">
                                            Sedikit Tinggi
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-2 text-sm text-gray-900">Trigliserida</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">140</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">mg/dl</td>
                                    <td class="py-3 px-2 text-sm text-gray-600"><150</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-green-700 bg-green-100">
                                            Normal
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Download Button -->
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center gap-2 px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download Hasil PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Item 2 - Darah Lengkap -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <button class="w-full bg-gradient-to-r from-blue-100 to-blue-200 p-4" onclick="toggleLabDetail(2)">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-white/50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            </div>
                            
                            <div class="text-left">
                                <h3 class="font-semibold text-lg text-gray-900">Darah Lengkap</h3>
                                <div class="flex items-center gap-4 mt-2 text-sm text-gray-700">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>15 Lal 1900 BC</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>10.00</span>
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
                        
                        <svg class="w-6 h-6 text-gray-700 transform transition-transform rotate-180" id="chevron-lab-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                        </svg>
                    </div>
                </button>
                
                <div id="lab-detail-2" class="hidden p-6 bg-white">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Parameter</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Hasil</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Satuan</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Nilai Normal</th>
                                    <th class="text-left py-3 px-2 text-sm font-semibold text-gray-600">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-100">
                                    <td class="py-3 px-2 text-sm text-gray-900">Hemoglobin</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">14.5</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">g/dL</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">12-16</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-green-700 bg-green-100">
                                            Normal
                                        </span>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-100">
                                    <td class="py-3 px-2 text-sm text-gray-900">Leukosit</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">7500</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">/µL</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">4000-10000</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-green-700 bg-green-100">
                                            Normal
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-2 text-sm text-gray-900">Trombosit</td>
                                    <td class="py-3 px-2 text-sm font-semibold text-gray-900">250000</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">/µL</td>
                                    <td class="py-3 px-2 text-sm text-gray-600">150000-400000</td>
                                    <td class="py-3 px-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-green-700 bg-green-100">
                                            Normal
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center gap-2 px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download Hasil PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleLabDetail(id) {
            const detail = document.getElementById('lab-detail-' + id);
            const chevron = document.getElementById('chevron-lab-' + id);
            
            if (detail.classList.contains('hidden')) {
                detail.classList.remove('hidden');
                chevron.classList.remove('rotate-180');
            } else {
                detail.classList.add('hidden');
                chevron.classList.add('rotate-180');
            }
        }
    </script>
    @endpush
</x-layouts.app>