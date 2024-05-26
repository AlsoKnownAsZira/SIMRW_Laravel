<?php

namespace App\Filament\Resources\InventoriResource\Pages;

use App\Filament\Resources\InventoriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInventoris extends ListRecords
{
    protected static string $resource = InventoriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
