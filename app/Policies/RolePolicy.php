<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('roles.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('roles.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('roles.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('roles.delete');
    }
}
