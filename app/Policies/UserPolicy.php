<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role->name == 'admin';
    }

    public function view(User $user, User $model)
    {
        return $user->role->name == 'admin';
    }

    public function create(User $user)
    {

    }

    public function update(User $user, User $model)
    {

    }

    public function delete(User $user, User $model)
    {

    }

    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
