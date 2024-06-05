<?php

namespace App\Filament\Resources\NilaiAlternatifResource\Pages;

use App\Filament\Resources\NilaiAlternatifResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNilaiAlternatifs extends ListRecords
{
    protected static string $resource = NilaiAlternatifResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
