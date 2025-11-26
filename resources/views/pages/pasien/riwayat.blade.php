<x-layouts.app :title="__('Riwayat')">
    <div class="flex-1 space-y-6">
        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Riwayat Medis</h2>
            <p class="text-gray-500 text-sm mt-1">Lihat seluruh riwayat dan kunjungan pemeriksaan anda</p>
        </div>

        <!-- List Riwayat -->
        @foreach ($riwayat as $item)
            <div class="space-y-4">
                <!-- Item 1 - Kontrol Rutin -->
                <div class="bg-white rounded-lg shadow hover:shadow-md transition p-4">
                    <button class="w-full flex items-start justify-between" onclick="toggleDetail(1)">
                        <div class="flex items-start gap-4">
                            <!-- Icon -->
                            <div
                                class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>

                            <!-- Info -->
                            <div class="text-left">
                                <h3 class="font-semibold text-lg text-gray-900">Kontrol Rutin</h3>
                                <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>30 Lal 1900 BC</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>25.00</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>Dr. Adolf</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chevron -->
                        <svg class="w-6 h-6 text-gray-400 transform transition-transform" id="chevron-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Detail (Hidden by default) -->
                    <div id="detail-1"
                        class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out mt-4 pt-0 border-t border-gray-200 opacity-0">
                        <div class="grid grid-cols-2 gap-4 text-sm py-4">
                            <div>
                                <p class="text-gray-500">Jenis Tindakan</p>
                                <p class="font-medium text-gray-600">Pemantauan Kesehatan</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Keluhan Utama</p>
                                <p class="font-medium text-gray-500">Bengkak-bengkak kek</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Diagnosa</p>
                                <p class="font-medium text-gray-500">Tekanan darah tinggi</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Catatan</p>
                                <p class="font-medium text-gray-500">Kontrol rutin tekanan darah, diet rendah garam</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Alergi</p>
                                <p class="font-medium text-gray-600">-</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Reaksi</p>
                                <p class="font-medium text-gray-600">Bentol-bentol kayak kaki gajah</p>
                            </div>
                        </div>
                    </div>



                </div>
        @endforeach
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
