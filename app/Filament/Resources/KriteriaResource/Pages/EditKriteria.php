<?php

namespace App\Filament\Resources\KriteriaResource\Pages;

use App\Filament\Resources\KriteriaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKriteria extends EditRecord
{
    protected static string $resource = KriteriaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
