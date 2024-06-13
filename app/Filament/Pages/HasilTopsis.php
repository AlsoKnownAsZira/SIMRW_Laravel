<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\TopsisService;
use App\Models\Kriteria;

class HasilTopsis extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationGroup = 'Bantuan Sosial';

    protected static string $view = 'filament.pages.hasil-topsis';

    public function getHasil()
    {
        $topsisService = new TopsisService();
        return $topsisService->hitung();
    }

    public function getKriterias()
    {
        return Kriteria::all();
    }
}
