<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;

class ViewTable extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Bantuan Sosial';

    protected static string $view = 'filament.pages.view-alternatif-table';

    public function getAlternatifs()
    {
        return Alternatif::all();
    }

    public function getKriterias()
    {
        return Kriteria::all();
    }

    public function getNilai($alternatifId, $kriteriaId)
    {
        $nilai = NilaiAlternatif::where('alternatif_id', $alternatifId)
            ->where('kriteria_id', $kriteriaId)
            ->first();
        return $nilai ? $nilai->nilai : '-';
    }
}
