<?php

namespace App\Filament\Resources\DataAduanResource\Pages;

use App\Filament\Resources\DataAduanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataAduan extends EditRecord
{
    protected static string $resource = DataAduanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
