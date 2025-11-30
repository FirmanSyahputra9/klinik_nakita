<x-layouts.app :title="__('Kasir')">

    <div class="p-6" x-data="{
        // modal view
        showView: false,
        viewData: {},

        openView(data) {
            this.viewData = data;
            this.showView = true;
        },

        // modal konfirmasi
        showConfirm: false,
        confirmType: '',
        confirmId: null,

        openConfirm(type, id) {
            this.confirmType = type;
            this.confirmId = id;
            this.showConfirm = true;
        }
    }" x-cloak>

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Kasir</h1>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">

            <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Transaksi</h3>

            <!-- RATA TENGAH UNTUK SEMUA KOLUMN -->
            <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden text-center">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Pasien</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse ($kasir as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item->antrian->tanggal ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $item->total_harga ?? '-' }}</td>

                            <td class="px-4 py-2">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $item->status ? 'text-green-700 bg-green-50' : 'text-red-700 bg-red-50' }}">
                                    {{ $item->status ? 'Lunas' : 'Belum Lunas' }}
                                </span>
                            </td>

                            <td class="px-4 py-2">{{ $item->nama_pasien ?? '-' }}</td>

                            <td class="px-4 py-2 flex items-center justify-center gap-3">

                                @php
                                    $viewData = [
                                        'id' => $item->id ?? '-',
                                        'tanggal' => $item->antrian->tanggal ?? '-',
                                        'jumlah' => $item->total_harga ?? '-',
                                        'obat' =>
                                            $item->antrian->resep->obat->nama .
                                            ' x ' .
                                            $item->antrian->resep->kuantitas .
                                            ' ' .
                                            $item->antrian->resep->obat->satuan,
                                        'status' => $item->status ? 'Lunas' : 'Belum Lunas',
                                        'pasien' => $item->nama_pasien ?? '-',
                                        'biaya_layanan' => 0,
                                    ];

                                @endphp

                                <button class="text-blue-600 hover:text-blue-800"
                                    x-on:click="openView(@js($viewData))">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
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

        <!-- MODAL VIEW -->
        <div x-show="showView" x-transition.opacity
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">

            <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6" x-transition.scale>

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">🧾 Struk Pembayaran</h2>

                    <button class="text-gray-500 hover:text-red-500 transition" @click="showView = false">✕</button>
                </div>

                <div class="border-t border-gray-200 pt-4 space-y-3">

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Tanggal</span>
                        <span class="text-gray-800" x-text="viewData.tanggal"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Jumlah</span>
                        <span class="text-gray-800"> <span x-text="viewData.jumlah"></span></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Obat</span>
                        <span class="text-gray-800" x-text="viewData.obat"></span>
                    </div>



                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Status</span>
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold"
                            :class="{
                                'bg-green-100 text-green-700': viewData.status === 'Lunas',
                                'bg-red-100 text-red-700': viewData.status !== 'Lunas'
                            }"
                            x-text="viewData.status">
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Pasien</span>
                        <span class="text-gray-800" x-text="viewData.pasien"></span>
                    </div>
                    <div class="flex justify-between mt-4">
                        <span class="font-medium text-gray-600">Biaya Layanan</span>
                        <input type="number" min="0" class="border rounded-lg px-2 py-1 w-28 text-right"
                            x-model="viewData.biaya_layanan">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <button class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg"
                        @click="showView = false">
                        Tutup
                    </button>

                    @if (!empty($item->id) && $item->status == '0')
                        <form x-bind:action="'{{ route('kasir.konfirmasi', $item->id) }}'" method="POST">
                            @csrf

                            <input type="hidden" name="biaya_layanan" x-model="viewData.biaya_layanan" min="1"
                                required>

                            <button type="submit"
                                x-bind:disabled="!viewData.biaya_layanan || viewData.biaya_layanan <= 0"
                                :class="{
                                    'bg-blue-500 hover:bg-blue-600 text-white': viewData.biaya_layanan > 0,
                                    'bg-gray-300 text-gray-500 opacity-50 cursor-not-allowed': !viewData
                                        .biaya_layanan || viewData.biaya_layanan <= 0
                                }"
                                class="px-4 py-2 rounded-lg flex items-center gap-2 transition duration-150 ease-in-out">
                                Konfirmasi Pembayaran
                            </button>
                        </form>
                    @else
                        <button disabled
                            class="px-4 py-2 bg-gray-300 text-gray-500 rounded-lg opacity-50 cursor-not-allowed">
                            Konfirmasi Pembayaran
                        </button>
                    @endif
                </div>

            </div>
        </div>

    </div>

</x-layouts.app>
