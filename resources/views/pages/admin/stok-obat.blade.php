<x-layouts.app :title="__('Stok')">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Stok Obat</h1>

        <a href="{{ route('obat.create') }}"
           class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Obat
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
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
                            <a href="{{ route('obat.edit', $obat->id) }}"
                               class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus obat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    <i class="fa-solid fa-trash"></i>
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

</x-layouts.app>
