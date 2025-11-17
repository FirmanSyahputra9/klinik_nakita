<x-layouts.app :title="__('Kasir')">

    <div class="p-6"
        x-data="{
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
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Pasien</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    <!-- Contoh Data 1 -->
                    <tr>
                        <td class="px-4 py-2">15 Januari 2025</td>
                        <td class="px-4 py-2">50326</td>
                        <td class="px-4 py-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            text-green-700 bg-green-50">Lunas</span>
                        </td>
                        <td class="px-4 py-2">Yazid Nasution</td>
                        <td class="px-4 py-2 flex items-center gap-3">

                            <!-- VIEW -->
                            <button class="text-blue-600 hover:text-blue-800"
                                x-on:click="openView({
                                id: 1,
                                tanggal: '15 Januari 2025',
                                jumlah: '50326',
                                obat: 'Paracetamol',
                                kuantitas: '20 mg',
                                status: 'Lunas',
                                pasien: 'Yazid Nasution'
                            })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                    <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                                </svg>
                            </button>

                            <!-- KONFIRM LUNAS -->
                            <button class="text-green-600 hover:text-green-800"
                                x-on:click="openConfirm('lunas', 1)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </button>

                            <!-- KONFIRM BELUM LUNAS -->
                            <button class="text-red-600 hover:text-red-800"
                                x-on:click="openConfirm('belum', 1)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                        </td>
                    </tr>

                    <!-- Contoh Data 2 -->
                    <tr>
                        <td class="px-4 py-2">20 Januari 2025</td>
                        <td class="px-4 py-2">200000</td>
                        <td class="px-4 py-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            text-red-700 bg-red-50">Belum Lunas</span>
                        </td>
                        <td class="px-4 py-2">Firman Syahputra</td>
                        <td class="px-4 py-2 flex items-center gap-3">

                            <!-- VIEW -->
                            <button class="text-blue-600 hover:text-blue-800"
                                x-on:click="openView({
                                id: 2,
                                tanggal: '20 Januari 2025',
                                jumlah: 200000,
                                status: 'Belum Lunas',
                                pasien: 'Firman Syahputra'
                            })">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                    <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                                </svg>
                            </button>

                            <!-- KONFIRM LUNAS -->
                            <button class="text-green-600 hover:text-green-800"
                                x-on:click="openConfirm('lunas', 2)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </button>

                            <!-- KONFIRM BELUM LUNAS -->
                            <button class="text-red-600 hover:text-red-800"
                                x-on:click="openConfirm('belum', 2)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ================= MODAL VIEW STRUK ================ -->
        <div x-show="showView"
            x-transition
            class="fixed inset-0 bg-black/40 flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-lg w-full max-w-md">

                <h2 class="text-xl font-bold mb-4">Struk Pembayaran</h2>

                <p><b>Tanggal:</b> <span x-text="viewData.tanggal"></span></p>
                <p><b>Jumlah:</b> Rp <span x-text="viewData.jumlah"></span></p>
                <p><b>Obat:</b> <span x-text="viewData.obat"></span></p>
                <p><b>Kuantitas:</b> Rp <span x-text="viewData.kuantitas"></span></p>
                <p><b>Status:</b> <span x-text="viewData.status"></span></p>
                <p><b>Pasien:</b> <span x-text="viewData.pasien"></span></p>

                <div class="flex justify-end mt-6">
                    <button class="px-4 py-2 bg-gray-300 rounded"
                        x-on:click="showView = false">Tutup</button>
                </div>
            </div>
        </div>

        <!-- ================= MODAL KONFIRMASI ================= -->
        <div x-show="showConfirm"
            x-transition
            class="fixed inset-0 bg-black/40 flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-lg w-full max-w-sm">

                <h2 class="text-lg font-semibold mb-4">
                    <span x-text="confirmType === 'lunas' ? 'Konfirmasi Lunas?' : 'Konfirmasi Belum Lunas?'"></span>
                </h2>

                <form method="POST"
                    :action="confirmType === 'lunas' 
                    ? '/kasir/' + confirmId + '/lunas' 
                    : '/kasir/' + confirmId + '/belum-lunas'">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button"
                            class="px-4 py-2 bg-gray-300 rounded"
                            x-on:click="showConfirm = false">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded">
                            Konfirmasi
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</x-layouts.app>