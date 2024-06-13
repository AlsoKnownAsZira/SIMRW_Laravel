<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Tabel Nilai Alternatif</h2>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nama Alternatif</th>
                    @foreach ($this->getKriterias() as $kriteria)
                        <th class="border border-gray-300 px-4 py-2">{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($this->getAlternatifs() as $alternatif)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $alternatif->nama }}</td>
                        @foreach ($this->getKriterias() as $kriteria)
                            <td class="border border-gray-300 px-4 py-2">{{ $this->getNilai($alternatif->id, $kriteria->id) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
