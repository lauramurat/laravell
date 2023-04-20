<?php

namespace App\Policies;

use App\Models\Opinion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class OpinionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Opinion $opinion)
    {

    }

    public function create(User $user)
    {

    }

    public function edit(User $user, Opinion $opinion)
    {
        return ($user->id == $opinion->user_id) || ($user->role->name == 'admin') || ($user->role->name == 'moderator');
    }

    public function delete(User $user, Opinion $opinion)
    {
        return  ($user->id == $opinion->user_id) || ($user->role->name == 'admin') || ($user->role->name == 'moderator');
    }

    public function restore(User $user, Opinion $opinion)
    {

    }

    public function forceDelete(User $user, Opinion $opinion)
    {

    }
}
