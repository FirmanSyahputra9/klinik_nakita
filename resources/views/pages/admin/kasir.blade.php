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
    }">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Kasir</h1>

            <a href="{{ route('kasir.create') }}" class="bg-blue-500 rounded-sm p-2 text-white">
                Tambah
            </a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Daftar Transaksi</h3>

            <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
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

                    <!-- Contoh Data 1 -->
                    @foreach ($kasir as $item)
                        <tr>
                            <td class="px-4 py-2">{{ $item->antrian->tanggal }}</td>
                            <td class="px-4 py-2">{{ $item->total_harga }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            {{ $item->status ? 'text-green-700 bg-green-50' : 'text-red-700 bg-red-50' }}">{{ $item->status ? 'Lunas' : 'Belum Lunas' }}</span>
                            </td>
                            <td class="px-4 py-2">{{ $item->nama_pasien }}</td>
                            <td class="px-4 py-2 flex items-center gap-3">

                                <!-- VIEW -->
                                @php
                                    $viewData = [
                                        'id' => $item->id,
                                        'tanggal' => $item->antrian->tanggal,
                                        'jumlah' => $item->total_harga,
                                        'obat' => $item->antrian->resep->obat->nama ?? '-',
                                        'kuantitas' => $item->antrian->resep->kuantitas ?? '-',
                                        'status' => $item->status ? 'Lunas' : 'Belum Lunas',
                                        'pasien' => $item->nama_pasien,
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


                                {{-- <form action="{{ route('kasir.konfirmasi', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="text-green-600 hover:text-green-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        <!-- =============== MODAL VIEW STRUK (CANTIK) =============== -->
        <div x-show="showView" x-transition.opacity
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 z-50">

            <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6" x-transition.scale>

                <!-- HEADER -->
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">🧾 Struk Pembayaran</h2>

                    <button class="text-gray-500 hover:text-red-500 transition" @click="showView = false">
                        ✕
                    </button>
                </div>

                <div class="border-t border-gray-200 pt-4 space-y-3">

                    <!-- ITEM -->
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Tanggal</span>
                        <span class="text-gray-800" x-text="viewData.tanggal"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Jumlah</span>
                        <span class="text-gray-800">Rp <span x-text="viewData.jumlah"></span></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Obat</span>
                        <span class="text-gray-800" x-text="viewData.obat"></span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">Kuantitas</span>
                        <span class="text-gray-800" x-text="viewData.kuantitas"></span>
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

                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex justify-end gap-3 mt-6">

                    <button class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg"
                        @click="showView = false">
                        Tutup
                    </button>
                    <form action="{{ route('kasir.konfirmasi', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="text-green-600 hover:text-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <div x-show="showConfirm" x-transition class="fixed inset-0 bg-black/40 flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-lg w-full max-w-sm">

                <h2 class="text-lg font-semibold mb-4">
                    <span x-text="confirmType === 'lunas' ? 'Konfirmasi Lunas?' : 'Konfirmasi Belum Lunas?'"></span>
                </h2>

                <form method="POST"
                    :action="confirmType === 'lunas'
                        ?
                        '/kasir/' + confirmId + '/lunas' :
                        '/kasir/' + confirmId + '/belum-lunas'">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" class="px-4 py-2 bg-gray-300 rounded"
                            x-on:click="showConfirm = false">
                            Batal
                        </button>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Konfirmasi
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</x-layouts.app>
