<?php

namespace App\Filament\Resources\KriteriaResource\Pages;

use App\Filament\Resources\KriteriaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKriterias extends ListRecords
{
    protected static string $resource = KriteriaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
