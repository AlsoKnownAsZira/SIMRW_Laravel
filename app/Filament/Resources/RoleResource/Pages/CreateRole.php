<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

//    protected function getCreatedNotification(): ?Notification
//    {
//        return Notification::make()
//            ->success()
//            ->title('Role registered')
//            ->body('The Role has been created successfully.');
//    }
}
