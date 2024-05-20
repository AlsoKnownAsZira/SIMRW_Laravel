<?php

namespace App\Filament\Resources\DataAduanResource\Pages;

use App\Filament\Resources\DataAduanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataAduans extends ListRecords
{
    protected static string $resource = DataAduanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
