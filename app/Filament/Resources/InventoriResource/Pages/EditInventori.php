<?php

namespace App\Filament\Resources\InventoriResource\Pages;

use App\Filament\Resources\InventoriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInventori extends EditRecord
{
    protected static string $resource = InventoriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
