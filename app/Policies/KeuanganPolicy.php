<?php

namespace App\Policies;

use App\Models\Keuangan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KeuanganPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Keuangan $keuangan): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Keuangan $keuangan): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Keuangan $keuangan): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Keuangan $keuangan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Keuangan $keuangan): bool
    {
        //
    }
}
