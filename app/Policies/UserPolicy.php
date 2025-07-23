<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('users.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('users.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('users.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('users.delete');
    }
}
