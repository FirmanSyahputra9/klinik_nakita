<x-layouts.app :title="__('Hasil Lab')">
    <div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Hasil Pemeriksaan Laboratorium</h1>

    
    {{-- Hasil Pemeriksaan --}}
    <div class="bg-white p-6 rounded-xl shadow-md">

        {{-- Hematologi --}}
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Hematologi</h3>
            <h3 class="text-sm  text-gray-700 mb-2">20 Desember 2024</h3>
            <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Pemeriksaan</th>
                        <th class="px-4 py-2 text-left">Hasil</th>
                        <th class="px-4 py-2 text-left">Satuan</th>
                        <th class="px-4 py-2 text-left">Nilai Normal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-2">Hemoglobin (Hb)</td>
                        <td class="px-4 py-2">13.5</td>
                        <td class="px-4 py-2">g/dL</td>
                        <td class="px-4 py-2 text-gray-500">12 - 16</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Leukosit</td>
                        <td class="px-4 py-2">7.8</td>
                        <td class="px-4 py-2">10³/µL</td>
                        <td class="px-4 py-2 text-gray-500">4 - 10</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Trombosit</td>
                        <td class="px-4 py-2">250</td>
                        <td class="px-4 py-2">10³/µL</td>
                        <td class="px-4 py-2 text-gray-500">150 - 400</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Kimia Darah --}}
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Kimia Darah</h3>
            <h3 class="text-sm  text-gray-700 mb-2">20 Desember 2024</h3>
            <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Pemeriksaan</th>
                        <th class="px-4 py-2 text-left">Hasil</th>
                        <th class="px-4 py-2 text-left">Satuan</th>
                        <th class="px-4 py-2 text-left">Nilai Normal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-2">Glukosa</td>
                        <td class="px-4 py-2">108</td>
                        <td class="px-4 py-2">mg/dL</td>
                        <td class="px-4 py-2 text-gray-500">70 - 140</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Kolesterol</td>
                        <td class="px-4 py-2">180</td>
                        <td class="px-4 py-2">mg/dL</td>
                        <td class="px-4 py-2 text-gray-500">&lt; 200</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Catatan --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Dokter</h3>
            <div class="border border-gray-200 rounded-lg p-3 text-gray-700 bg-gray-50">
                Hasil pemeriksaan dalam batas normal. Disarankan menjaga pola makan dan kontrol rutin.
            </div>
        </div>
    </div>
</div>

    @push('scripts')
    <script>
        function toggleLabDetail(id) {
            const detail = document.getElementById('lab-detail-' + id);
            const chevron = document.getElementById('chevron-lab-' + id);
            
            if (detail.classList.contains('hidden')) {
                detail.classList.remove('hidden');
                chevron.classList.remove('rotate-180');
            } else {
                detail.classList.add('hidden');
                chevron.classList.add('rotate-180');
            }
        }
    </script>
    @endpush
</x-layouts.app>