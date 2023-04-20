<?php

namespace App\Policies;

use App\Models\Cosmetic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CosmeticPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) //index
    {

    }


    public function view(User $user, Cosmetic $cosmetic) //show
    {

    }
    public function create(User $user) //store create
    {
       return ($user->role->name == 'admin' || $user->role->name == 'moderator');

    }

    public function edit(User $user, Cosmetic $cosmetic)
    {
        return ($user->id == $cosmetic->user_id) || ($user->role->name != 'user');
    }

    public function delete(User $user, Cosmetic $cosmetic)
    {
        return ($user->id == $cosmetic->user_id)  || ($user->role->name != 'user');
    }

    public function restore(User $user, Cosmetic $cosmetic)
    {

    }

    public function forceDelete(User $user, Cosmetic $cosmetic)
    {

    }
}
