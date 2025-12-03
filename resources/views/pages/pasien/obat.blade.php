<x-layouts.app :title="__('Obat')">
    <div class="flex-1 space-y-6 p-4 md:p-6 max-w-5xl mx-auto">

        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Resep dan Obat</h2>
            <p class="text-gray-500 text-sm mt-1">Pantau Resep dan Obat Anda</p>
        </div>

        @foreach ($obat?? [] as $item)

        <!-- Resep Card -->
        <div class="card bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">

            <!-- Header Card -->
            <div class="card p-4 dark:bg-gray-900">

                <div class="card  flex flex-col sm:flex-row items-start sm:items-center gap-4">

                    <!-- Icon -->
                    <div class="card w-12 h-12 bg-white/50 dark:bg-gray-400  rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-blue-500 dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <!-- Info -->
                    <div class="flex-1">
                        <h3 class="card font-bold text-xl text-gray-900 dark:text-gray-100">
                            {{ $item->data_pemeriksaan->diagnosa ?? '-' }}
                        </h3>

                        <div class="card flex flex-wrap items-center gap-4 mt-2 text-sm text-gray-700 dark:text-gray-100">

                            <div class="card flex items-center gap-1 ">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap=" round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $item->registrasi->tanggal_kunjungan ?? '' }}</span>
                            </div>

                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $item->created_at ?? '0' }}</span>
                            </div>

                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ $item->dokter->name ?? '' }}</span>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <!-- Content -->
            <div class="p-6">

                <h4 class="font-semibold text-lg mb-4">Daftar Obat</h4>

                @foreach ($resep ?? [] as $resep)

                <!-- Obat Item -->
                <div class="card border border-gray-200 rounded-lg p-4 mb-4">

                    <!-- Obat Header -->
                    <div class="card flex items-start gap-3 mb-4">

                        <div class="card w-10 h-10 bg-blue-50 dark:bg-gray-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="card w-6 h-6 text-blue-600 dark:text-gray-900" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>

                        <div class="flex-1">
                            <h5 class="card font-semibold text-gray-900 dark:text-gray-100">{{ $resep->obat->nama ?? '-' }}</h5>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">{{ $resep->kuantitas ?? '-' }}
                                {{ $resep->obat->satuan ?? '-' }}
                            </p>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">{{ $resep->dosis ?? '' }}
                                {{ $resep->obat->satuan ?? '-' }}
                            </p>
                        </div>

                    </div>

                    <!-- Detail Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">

                        <div>
                            <p class="card text-sm font-semibold text-gray-700 dark:text-gray-100 mb-1">Frekuensi:</p>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">
                                {{ $resep->frekuensi ?? '' }} {{ $resep->obat->satuan ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="card text-sm font-semibold text-gray-700 dark:text-gray-100 mb-1">Waktu Konsumsi:</p>

                            @php
                            $colorMap = [
                            'Pagi' => 'text-amber-600 dark:text-gray-100',
                            'Siang' => 'text-blue-600 dark:text-gray-100',
                            'Sore' => 'text-orange-600 dark:text-gray-100',
                            'Malam' => 'text-indigo-600 dark:text-gray-100',
                            ];
                            @endphp

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {!! collect(explode(',', $resep->waktu_konsumsi ?? '-'))
                                ->map(fn($i) => "[<span class='" . ($colorMap[$i] ?? ' text-gray-600') . "'>$i</span>]" )
                                    ->implode(' ') !!}
                            </p>

                        </div>

                        <div>
                            <p class="card text-sm font-semibold text-gray-700 dark:text-gray-100 mb-1">Harga:</p>
                            <p class="card text-sm text-gray-600 dark:text-gray-400">{{ $resep->obat->harga ?? '' }}</p>
                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        @endforeach

    </div>
</x-layouts.app>