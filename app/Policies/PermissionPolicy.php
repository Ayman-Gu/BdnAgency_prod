<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('permissions.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('permissions.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('permissions.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('permissions.delete');
    }   
}
