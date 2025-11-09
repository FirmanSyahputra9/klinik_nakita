<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 bg-white rounded-2xl shadow p-8">
        <!-- Header -->
        <div class="flex items-center space-x-4 mb-6">
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-gray-500 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold">{{ $pasien['nama'] }}</h2>
                    <p class="text-sm text-gray-600">
                        {{ $pasien['jenis_kelamin'] }}, {{ $pasien['usia'] }} Tahun &nbsp;•&nbsp; Gol. Darah {{ $pasien['gol_darah'] }}
                    </p>
                    <p class="text-sm text-gray-700 mt-1">
                        <span class="font-semibold">No. Telepon:</span> {{ $pasien['no_telepon'] }}<br>
                        <span class="font-semibold">Email:</span> {{ $pasien['email'] }}
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Navigasi (sementara statis) -->
        <div class="flex space-x-8 text-sm border-b mb-6">
            <button class="border-b-2 border-indigo-600 pb-2 font-medium text-indigo-600">Informasi Pribadi</button>
            <button class="text-gray-500 hover:text-indigo-600">Riwayat Kunjungan</button>
            <button class="text-gray-500 hover:text-indigo-600">Resep dan Obat</button>
            <button class="text-gray-500 hover:text-indigo-600">Hasil Lab</button>
            <button class="text-gray-500 hover:text-indigo-600">Pembayaran</button>
        </div>

        <!-- Informasi Pribadi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Data Pribadi -->
            <div>
                <h3 class="font-semibold mb-2 text-gray-800">Data Pribadi</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">NIK:</span> {{ $pasien['nik'] }}</p>
                    <p><span class="font-medium">Tanggal Lahir:</span> {{ $pasien['tanggal_lahir'] }}</p>
                    <p><span class="font-medium">Jenis Kelamin:</span> {{ $pasien['jenis_kelamin'] }}</p>
                    <p><span class="font-medium">Tanggal Registrasi:</span> (Kapan dia Registrasi)</p>
                </div>
            </div>

            <!-- Kontak & Alamat -->
            <div>
                <h3 class="font-semibold mb-2 text-gray-800">Kontak & Alamat</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">No. Telepon:</span> {{ $pasien['no_telepon'] }}</p>
                    <p><span class="font-medium">Email:</span> {{ $pasien['email'] }}</p>
                    <p><span class="font-medium">Alamat:</span> {{ $pasien['alamat'] }}</p>
                </div>
            </div>

            <!-- Kontak Darurat -->
            <div>
                <h3 class="font-semibold mb-2 text-gray-800">Kontak Darurat</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">Nama:</span> {{ $pasien['kontak_darurat']['nama'] }}</p>
                    <p><span class="font-medium">Hubungan:</span> {{ $pasien['kontak_darurat']['hubungan'] }}</p>
                    <p><span class="font-medium">No. Telepon:</span> {{ $pasien['kontak_darurat']['no_telepon'] }}</p>
                </div>
            </div>

            <!-- Informasi Medis -->
            <div>
                <h3 class="font-semibold mb-2 text-gray-800">Informasi Medis</h3>
                <div class="bg-gray-50 rounded-lg p-3 flex flex-wrap gap-2">
                    @foreach ($pasien['riwayat_penyakit'] as $penyakit)
                        <span class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">{{ $penyakit }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Tombol Edit -->
        <div class="mt-8 text-right">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">
                <i class="fas fa-edit mr-1"></i> Edit Data
            </button>
        </div>
    </div>
</x-app-layout>
