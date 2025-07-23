<?php

namespace App\Policies;

use App\Models\User;

class TeamPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('teams.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('teams.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('teams.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('teams.delete');
    }
}
