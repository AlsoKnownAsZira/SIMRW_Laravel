<?php

namespace App\Filament\Resources\SuratResource\Pages;

use App\Filament\Resources\SuratResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSurat extends CreateRecord
{
    protected static string $resource = SuratResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('News Letter')
            ->body('The Letter has been created successfully.');
    }
}
