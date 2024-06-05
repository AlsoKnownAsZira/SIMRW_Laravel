<?php

namespace App\Filament\Resources\NilaiAlternatifResource\Pages;

use App\Filament\Resources\NilaiAlternatifResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNilaiAlternatif extends CreateRecord
{
    protected static string $resource = NilaiAlternatifResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
