<?php

namespace App\Policies;

use App\Models\Inventori;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InventoriPolicy
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
    public function view(User $user, Inventori $inventori): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW') || $user->hasRole('RT1') || $user->hasRole('RT2');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inventori $inventori): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inventori $inventori): bool
    {
        return $user->hasRole('Admin') || $user->hasRole('RW');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inventori $inventori): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inventori $inventori): bool
    {
        //
    }
}
