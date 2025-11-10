<x-layouts.app :title="__('Detail Pasien')">
    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white rounded-2xl shadow p-4 sm:p-8">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-6 space-y-4 sm:space-y-0">
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800 self-start sm:self-auto">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-gray-500 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold">{{ $pasien->nama }}</h2>
                    <p class="text-sm text-gray-600">
                        {{ $pasien->jenis_kelamin }},
                        {{ $pasien->usia }} Tahun
                        &nbsp;•&nbsp; Gol. Darah {{ $pasien->gol_darah ?? '-' }}
                    </p>
                    <p class="text-sm text-gray-700 mt-1">
                        <span class="font-semibold">No. Telepon:</span> {{ $pasien->no_telepon }}<br>
                        <span class="font-semibold">Email:</span> {{ $pasien->email }}
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Navigasi -->
        <div class="flex flex-wrap gap-4 sm:space-x-8 text-sm border-b mb-6">
            <button class="border-b-2 border-indigo-600 pb-2 font-medium text-indigo-600">Informasi Pribadi</button>
            <button class="text-gray-500 hover:text-indigo-600">Riwayat Kunjungan</button>
            <button class="text-gray-500 hover:text-indigo-600">Resep dan Obat</button>
            <button class="text-gray-500 hover:text-indigo-600">Hasil Lab</button>
            <button class="text-gray-500 hover:text-indigo-600">Pembayaran</button>
        </div>

        <!-- Informasi Pribadi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

            <!-- Data Pribadi -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Data Pribadi</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">NIK:</span> {{ $pasien->nik }}</p>
                    <p><span class="font-medium">Tanggal Lahir:</span> {{ $pasien->tanggal_lahir }}</p>
                    <p><span class="font-medium">Jenis Kelamin:</span> {{ $pasien->jenis_kelamin }}</p>
                    <p><span class="font-medium">Tanggal Registrasi:</span> {{ $pasien->created_at?->format('d-m-Y') ?? '-' }}</p>
                </div>
            </div>

            <!-- Kontak & Alamat -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Kontak & Alamat</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">No. Telepon:</span> {{ $pasien->no_telepon }}</p>
                    <p><span class="font-medium">Email:</span> {{ $pasien->email }}</p>
                    <p><span class="font-medium">Alamat:</span> {{ $pasien->alamat }}</p>
                </div>
            </div>

            <!-- Kontak Darurat -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Kontak Darurat</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">Nama:</span> {{ $pasien->kontak_darurat_nama ?? '-' }}</p>
                    <p><span class="font-medium">Hubungan:</span> {{ $pasien->kontak_darurat_hubungan ?? '-' }}</p>
                    <p><span class="font-medium">No. Telepon:</span> {{ $pasien->kontak_darurat_no_telepon ?? '-' }}</p>
                </div>
            </div>

            <!-- Informasi Medis -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Informasi Medis</h3>
                <div class="bg-white rounded-lg p-3 flex flex-wrap gap-2 border border-gray-200">
                    @if (!empty($pasien->riwayat_penyakit) && count($pasien->riwayat_penyakit) > 0)
                        @foreach ($pasien->riwayat_penyakit as $penyakit)
                            <span class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">{{ $penyakit }}</span>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">Tidak ada riwayat penyakit</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tombol Edit -->
        <div class="mt-8 text-center sm:text-right">
            <a href="{{ route('pasien.edit', $pasien->id) }}"
                class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                <i class="fas fa-edit mr-2"></i> Edit Data
            </a>
        </div>
    </div>
</x-layouts.app>
