<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User registered')
            ->body('The User has been created successfully.');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $authUser = Auth::user();

        if ($authUser->hasRole('RT1')) {
            $data['role'] = 'RT1';
            $data['role'] = 'Warga';
        } elseif ($authUser->hasRole('RT2')) {
            $data['role'] = 'RT2';
            $data['role'] = 'Warga2';
        }


        return $data;
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $user = static::getModel()::create($data);

        if (isset($data['role'])) {
            $user->assignRole($data['role']);
        }

        return $user;
    }
}
