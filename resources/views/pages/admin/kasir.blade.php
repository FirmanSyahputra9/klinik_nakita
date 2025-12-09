<x-layouts.app :title="__('Kasir')">

    <div class="p-6" x-data="{
        showView: false,
        viewData: {},

        openView(data) {
            this.viewData = data;
            this.showView = true;
        },

        showConfirm: false,
        confirmType: '',
        confirmId: null,

        openConfirm(type, id) {
            this.confirmType = type;
            this.confirmId = id;
            this.showConfirm = true;
        },

        showPendapatan: false,
    }" x-cloak>

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-3 mb-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Kasir</h1>

            <button @click="showPendapatan = true"
                class="px-4 py-2 bg-green-600 dark:bg-gray-800 text-white rounded-lg shadow hover:bg-green-700 dark:hover:bg-gray-900 transition w-full md:w-auto text-center">
                Lihat Pendapatan
            </button>
        </div>


        <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">

            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-100 mb-4">Daftar Transaksi</h3>

            <!-- TABEL DESKTOP -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden text-center">
                    <thead class="dark:border">
                        <tr class="bg-blue-50 text-gray-700 dark:text-white dark:bg-gray-600">
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Pasien</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($kasir as $item)
                            <tr class="dark:text-gray-300 dark:border dark:hover:bg-gray-700 dark:hover:text-white">
                                <td class="px-4 py-2">{{ $item->antrian->tanggal ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $item->total_harga ?? '-' }}</td>

                                <td class="px-4 py-2">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            {{ $item->status ? 'text-green-700 bg-green-100 dark:bg-gray-300 dark:text-gray-900' : 'text-red-700 bg-red-100 dark:bg-gray-300 dark:text-gray-900' }}">
                                        {{ $item->status ? 'Lunas' : 'Belum Lunas' }}
                                    </span>
                                </td>

                                <td class="px-4 py-2">{{ $item->nama_pasien ?? '-' }}</td>

                                <td class="px-4 py-2 flex justify-center">
                                    @php
                                        $viewData = [
                                            'id' => $item->id,
                                            'tanggal' => $item->antrian->tanggal ?? '-',
                                            'jumlah' => $item->total_harga ?? '-',
                                            'obat' =>
                                                $item->antrian->resep->obat->nama .
                                                ' x ' .
                                                $item->antrian->resep->kuantitas .
                                                ' ' .
                                                $item->antrian->resep->obat->satuan,
                                            'harga_obat' => $item->harga_resep?? '-',
                                            'status' => $item->status ? 'Lunas' : 'Belum Lunas',
                                            'pasien' => $item->nama_pasien ?? '-',
                                            'biaya_layanan' => 0,
                                        ];
                                    @endphp

                                    <button
                                        class="text-blue-600 hover:text-blue-800 dark:text-white dark:hover:text-gray-200"
                                        @click="openView(@js($viewData))">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-400">
                                    Belum ada data transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- CARD VIEW MOBILE -->
            <div class="md:hidden space-y-4">
                @forelse ($kasir as $item)
                    @php
                        $viewDataMobile = [
                            'id' => $item->id,
                            'tanggal' => $item->antrian->tanggal ?? '-',
                            'jumlah' => $item->total_harga ?? '-',
                            'obat' =>
                                $item->antrian->resep->obat->nama .
                                ' x ' .
                                $item->antrian->resep->kuantitas .
                                ' ' .
                                $item->antrian->resep->obat->satuan,
                            'harga_obat' => $item->harga_resep??'-',
                            'status' => $item->status ? 'Lunas' : 'Belum Lunas',
                            'pasien' => $item->nama_pasien ?? '-',
                            'biaya_layanan' => 0,
                        ];
                    @endphp

                    <div
                        class="border border-gray-300 dark:border-gray-700 rounded-lg p-4 bg-white dark:bg-gray-800 shadow">

                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-semibold">{{ $item->antrian->tanggal ?? '-' }}</span>

                            <span
                                class="text-xs px-2 py-1 rounded-full
                                    {{ $item->status ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ $item->status ? 'Lunas' : 'Belum Lunas' }}
                            </span>
                        </div>

                        <p class="text-sm"><strong>Pasien:</strong> {{ $item->nama_pasien ?? '-' }}</p>
                        <p class="text-sm"><strong>Total:</strong> {{ $item->total_harga ?? '-' }}</p>
                        <p class="text-sm mb-3"><strong>Obat:</strong> {{ $viewDataMobile['obat'] }}</p>
                        <p class="text-sm mb-3"><strong>Harga Obat:></strong> {{ $viewDataMobile['harga_obat'] }}</p>

                        <button @click="openView(@js($viewDataMobile))"
                            class="w-full bg-blue-500 text-white rounded-lg py-2 mt-2 text-sm hover:bg-blue-600">
                            Detail Transaksi
                        </button>
                    </div>

                @empty
                    <p class="text-center py-6 text-gray-400">Belum ada data transaksi</p>
                @endforelse
            </div>

        </div>



        <!-- MODAL VIEW -->
        <div x-show="showView" x-transition.opacity
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">

            <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-2xl shadow-xl p-6" x-transition.scale>

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">🧾 Struk Pembayaran</h2>
                    <button @click="showView = false" class="text-gray-500 hover:text-red-500 transition">✕</button>
                </div>

                <div class="border-t border-gray-200 pt-4 space-y-3">
                    <template
                        x-for="item in [
                        ['Tanggal', viewData.tanggal],
                        ['Jumlah', viewData.jumlah],
                        ['Obat', viewData.obat],
                        ['Harga Obat', viewData.harga_obat],
                        ['Pasien', viewData.pasien]
                    ]">
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-100" x-text="item[0]"></span>
                            <span class="text-gray-800 dark:text-gray-100" x-text="item[1]"></span>
                        </div>
                    </template>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600 dark:text-gray-100">Status</span>

                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold"
                            :class="{
                                'bg-green-100 dark:bg-gray-300 text-green-700 dark:text-gray-900': viewData
                                    .status === 'Lunas',
                                'bg-red-100 dark:bg-gray-300 text-red-700 dark:text-gray-900': viewData
                                    .status !== 'Lunas'
                            }"
                            x-text="viewData.status">
                        </span>
                    </div>

                    <div class="flex justify-between mt-4">
                        @if ($item->status == '0')
                            <span class="font-medium text-gray-600 dark:text-gray-100">Biaya Layanan</span>
                            <input type="number" min="0" class="border rounded-lg px-2 py-1 w-28 text-right"
                                x-model="viewData.biaya_layanan">
                        @else
                            <span class="font-medium text-gray-600 dark:text-gray-100">Biaya Layanan</span>
                            <span class="text-gray-800 dark:text-gray-100">{{ $item->harga_layanan }}</span>
                        @endif
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button @click="showView = false"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 text-gray-800">
                        Tutup
                    </button>

                    @if (!empty($item->id) && $item->status == '0')
                        <form x-bind:action="'{{ route('kasir.konfirmasi', $item->id) }}'" method="POST">
                            @csrf

                            <input type="hidden" name="biaya_layanan" x-model="viewData.biaya_layanan" required>

                            <button type="submit" :disabled="!viewData.biaya_layanan || viewData.biaya_layanan <= 0"
                                :class="{
                                    'bg-blue-500 hover:bg-blue-600 text-white': viewData.biaya_layanan > 0,
                                    'bg-gray-300 text-gray-500 cursor-not-allowed': !viewData.biaya_layanan || viewData
                                        .biaya_layanan <= 0
                                }"
                                class="px-4 py-2 rounded-lg">
                                Konfirmasi Pembayaran
                            </button>
                        </form>
                    @else
                        <button disabled class="px-4 py-2 bg-gray-300 rounded-lg text-gray-500 cursor-not-allowed">
                            Konfirmasi Pembayaran
                        </button>
                    @endif
                </div>

            </div>
        </div>


        <!-- MODAL PENDAPATAN -->
        <div x-show="showPendapatan" x-transition.opacity
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">

            <div class="bg-white dark:bg-gray-800 w-full max-w-lg rounded-2xl shadow-xl p-6" x-transition.scale>

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">💰 Pendapatan Klinik</h2>

                    <button class="text-gray-500 hover:text-red-500" @click="showPendapatan = false">✕</button>
                </div>

                <div class="space-y-4 text-gray-700 dark:text-gray-100">
                    <div class="flex justify-between"><span>Pendapatan Hari Ini</span> <span
                            class="font-semibold">{{ $pendapatanHariIni }}</span></div>

                    <div class="flex justify-between"><span>Pendapatan Minggu Ini</span> <span
                            class="font-semibold">{{ $pendapatanMingguIni }}</span></div>

                    <div class="flex justify-between"><span>Pendapatan Bulan Ini</span> <span
                            class="font-semibold">{{ $pendapatanBulanIni }}</span></div>

                    <div class="flex justify-between"><span>Total Transaksi</span> <span
                            class="font-semibold">{{ $totalTransaksi }}</span></div>

                    <div class="flex justify-between"><span>Total Obat Terjual</span> <span
                            class="font-semibold">{{ $totalObatTerjual }}</span></div>
                </div>

                <div class="mt-6 text-right">
                    <button @click="showPendapatan = false"
                        class="px-4 py-2 bg-gray-300 dark:text-gray-900 rounded-lg hover:bg-gray-400">
                        Tutup
                    </button>
                </div>

            </div>
        </div>

    </div>

</x-layouts.app>
