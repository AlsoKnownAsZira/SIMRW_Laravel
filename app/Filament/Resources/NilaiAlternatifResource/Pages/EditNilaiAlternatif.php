<?php

namespace App\Filament\Resources\NilaiAlternatifResource\Pages;

use App\Filament\Resources\NilaiAlternatifResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNilaiAlternatif extends EditRecord
{
    protected static string $resource = NilaiAlternatifResource::class;

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
