<x-layouts.app :title="__('Stok')">

    <div
        x-data="{
        showEdit: false,
        id: '',
        kode: '',
        nama: '',
        stok: '',
        satuan: '',
        harga_beli: '',
        harga_jual: '',
        tgl: '',
        
        openEdit(obat) {
            this.showEdit = true;
            this.id = obat.id;
            this.kode = obat.kode;
            this.nama = obat.nama;
            this.stok = obat.stok;
            this.satuan = obat.satuan;
            this.harga_beli = obat.harga_beli;
            this.harga_jual = obat.harga_jual;
            this.tgl = obat.tanggal_kadaluwarsa;
        }
    }">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Stok Obat</h1>



            <a href="{{ route('stok-obat.create') }}"
                class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4" />
                </svg>
                Tambah Obat
            </a>
        </div>

        <!-- Search & Filter -->
        <div class="mb-4 flex flex-col sm:flex-row gap-3 justify-between items-start sm:items-center">

            <!-- Search -->
            <form method="GET" class="flex items-center gap-3 w-full sm:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari kode, nama, satuan..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <button type="submit" class="absolute right-3 top-2.5 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-4.35-4.35m0 0a7.5 7.5 0 1 0-10.607-10.607 7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>

                <!-- Filter Satuan -->
                <select name="satuan" onchange="this.form.submit()"
                    class="px-3 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Satuan</option>
                    @foreach($obats->pluck('satuan')->unique() as $s)
                        <option value="{{ $s }}" {{ request('satuan') == $s ? 'selected' : '' }}>
                            {{ ucfirst($s) }}
                        </option>
                    @endforeach
                </select>

                <!-- Filter Stok -->
                <select name="stok_filter" onchange="this.form.submit()"
                    class="px-3 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500">
                    <option value="">Semua Stok</option>
                    <option value="low" {{ request('stok_filter')=='low' ? 'selected' : '' }}>Stok Menipis (≤ 10)</option>
                    <option value="safe" {{ request('stok_filter')=='safe' ? 'selected' : '' }}>Stok Aman (> 10)</option>
                </select>
            </form>

        </div>


        <!-- Table -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-blue-50 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Kode</th>
                        <th class="px-4 py-3">Nama Obat</th>
                        <th class="px-4 py-3">Stok</th>
                        <th class="px-4 py-3">Satuan</th>
                        <th class="px-4 py-3">Harga Beli</th>
                        <th class="px-4 py-3">Harga Jual</th>
                        <th class="px-4 py-3">Kadaluwarsa</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($obats as $obat)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $obat->kode }}</td>
                        <td class="px-4 py-3">{{ $obat->nama }}</td>
                        <td class="px-4 py-3">{{ $obat->stok }}</td>
                        <td class="px-4 py-3">{{ $obat->satuan }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($obat->harga_beli, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($obat->harga_jual, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($obat->tanggal_kadaluwarsa)->format('d M Y') }}
                        </td>

                        <td class="px-4 py-3 text-center flex justify-center gap-2">

                            <!-- EDIT BUTTON -->
                            <button
                                class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition"
                                x-on:click="
                                openEdit({
                                    id: '{{ $obat->id }}',
                                    kode: '{{ $obat->kode }}',
                                    nama: '{{ $obat->nama }}',
                                    stok: '{{ $obat->stok }}',
                                    satuan: '{{ $obat->satuan }}',
                                    harga_beli: '{{ $obat->harga_beli }}',
                                    harga_jual: '{{ $obat->harga_jual }}',
                                    tanggal_kadaluwarsa: '{{ $obat->tanggal_kadaluwarsa }}'
                                })
                            ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 
                                    2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 
                                    0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>

                            <!-- DELETE BUTTON -->
                            <form action="{{ route('stok-obat.destroy', $obat->id) }}"
                                method="POST"
                                onsubmit="return confirm('Hapus obat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 
                                        1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 
                                        2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 
                                        0a48.108 48.108 0 0 0-3.478-.397m-12 
                                        .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 
                                        3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 
                                        51.964 0 0 0-3.32 0c-1.18.037-2.09 
                                        1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>

                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-400">
                            Tidak ada data obat
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $obats->links() }}
        </div>

        <!-- ============ EDIT MODAL ============ -->
        <div
            x-show="showEdit"
            x-transition
            class="fixed inset-0 bg-black/40 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg p-6 w-full max-w-lg">

                <h2 class="text-xl font-semibold mb-4">Edit Obat</h2>

                <form method="POST" :action="'/admin/stok-obat/' + id">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium">Kode</label>
                            <input type="text" class="w-full border rounded p-2"
                                x-model="kode" name="kode">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Nama</label>
                            <input type="text" class="w-full border rounded p-2"
                                x-model="nama" name="nama">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Stok</label>
                            <input type="number" class="w-full border rounded p-2"
                                x-model="stok" name="stok">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Satuan</label>
                            <input type="text" class="w-full border rounded p-2"
                                x-model="satuan" name="satuan">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Harga Beli</label>
                            <input type="number" class="w-full border rounded p-2"
                                x-model="harga_beli" name="harga_beli">
                        </div>

                        <div>
                            <label class="text-sm font-medium">Harga Jual</label>
                            <input type="number" class="w-full border rounded p-2"
                                x-model="harga_jual" name="harga_jual">
                        </div>

                        <div class="col-span-2">
                            <label class="text-sm font-medium">Tanggal Kadaluwarsa</label>
                            <input type="date" class="w-full border rounded p-2"
                                x-model="tgl" name="tanggal_kadaluwarsa">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 gap-2">
                        <button type="button"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
                            x-on:click="showEdit = false">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</x-layouts.app>