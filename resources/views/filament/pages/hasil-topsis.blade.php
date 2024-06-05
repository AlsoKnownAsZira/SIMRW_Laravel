<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Hasil Perhitungan TOPSIS</h2>

    <!-- Matriks Normalisasi -->
    <h3 class="text-lg font-bold mt-4 mb-2">Matriks Normalisasi</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Alternatif</th>
                    @foreach ($this->getKriterias() as $kriteria)
                        <th class="border border-gray-300 px-4 py-2">{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getHasil()['matriks_normalisasi'] as $alternatifId => $nilaiKriteria)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ \App\Models\Alternatif::find($alternatifId)->nama }}</td>
                        @foreach ($nilaiKriteria as $nilai)
                            <td class="border border-gray-300 px-4 py-2">{{ $nilai }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Matriks Terbobot -->
    <h3 class="text-lg font-bold mt-4 mb-2">Matriks Terbobot</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Alternatif</th>
                    @foreach ($this->getKriterias() as $kriteria)
                        <th class="border border-gray-300 px-4 py-2">{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getHasil()['matriks_terbobot'] as $alternatifId => $nilaiKriteria)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ \App\Models\Alternatif::find($alternatifId)->nama }}</td>
                        @foreach ($nilaiKriteria as $nilai)
                            <td class="border border-gray-300 px-4 py-2">{{ $nilai }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Solusi Ideal -->
    <h3 class="text-lg font-bold mt-4 mb-2">Solusi Ideal</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Kriteria</th>
                    <th class="border border-gray-300 px-4 py-2">Ideal Positif</th>
                    <th class="border border-gray-300 px-4 py-2">Ideal Negatif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getKriterias() as $kriteria)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $kriteria->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $this->getHasil()['ideal_positif'][$kriteria->id] }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $this->getHasil()['ideal_negatif'][$kriteria->id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Jarak ke Solusi Ideal -->
    <h3 class="text-lg font-bold mt-4 mb-2">Jarak ke Solusi Ideal</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Alternatif</th>
                    <th class="border border-gray-300 px-4 py-2">Jarak Positif</th>
                    <th class="border border-gray-300 px-4 py-2">Jarak Negatif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getHasil()['jarak_positif'] as $alternatifId => $jarakPositif)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ \App\Models\Alternatif::find($alternatifId)->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $jarakPositif }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $this->getHasil()['jarak_negatif'][$alternatifId] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Nilai Preferensi dan Rangking -->
    <h3 class="text-lg font-bold mt-4 mb-2">Nilai Preferensi dan Rangking</h3>
    <form action="{{ route('filament.topsis.cetakPdf') }}" method="post">
        @csrf
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Alternatif</th>
                        <th class="border border-gray-300 px-4 py-2">Nilai Preferensi</th>
                        <th class="border border-gray-300 px-4 py-2">Rangking</th>
                        <th class="border border-gray-300 px-4 py-2">Pilih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getHasil()['preferensi'] as $alternatifId => $hasil)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ \App\Models\Alternatif::find($alternatifId)->nama }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $hasil['nilai'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $hasil['ranking'] }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <input type="checkbox" name="cetak[]" value="{{ $alternatifId }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Cetak
        </button>
    </form>
</x-filament::page>
