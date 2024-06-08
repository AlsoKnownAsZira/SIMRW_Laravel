<?php

namespace App\Policies;

use App\Models\User;
use App\Models\data_aduan;
use Illuminate\Auth\Access\Response;

class DataAduanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2') || $user->hasRole('Warga') || $user->hasRole('Warga2');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, data_aduan $dataAduan): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2') || $user->hasRole('Warga') || $user->hasRole('Warga2');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('Warga') || $user->hasRole('Warga2');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, data_aduan $dataAduan): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, data_aduan $dataAduan): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, data_aduan $dataAduan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, data_aduan $dataAduan): bool
    {
        //
    }
}
