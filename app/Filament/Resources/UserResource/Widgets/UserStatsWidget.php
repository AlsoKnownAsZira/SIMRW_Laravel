<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Carbon\Carbon;
use App\Models\Keuangan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\Money;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use BaseDashboard\Concerns\HasFiltersForm;
use Filament\Forms\Get;

class UserStatsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        // filter tangggal
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        // widget total
        $pemasukan = Keuangan::where('jenis', 'Masuk')->sum('nominal');
        $pengeluaran = Keuangan::where('jenis', 'Keluar')->sum('nominal');

        return [
            Card::make('Total Anggaran', $this->formatRupiah ($pemasukan - $pengeluaran)),
            Card::make('Total Pemasukan', $this->formatRupiah ($pemasukan)),
            Card::make('Total Pengeluaran', $this->formatRupiah ($pengeluaran)),
        ];
    }

    public function formatRupiah($amount)
    {
        return 'Rp' . number_format($amount, 2, ',', '.');
    }

}

