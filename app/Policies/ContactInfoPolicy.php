<?php

namespace App\Policies;

use App\Models\User;

class ContactInfoPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('contacts.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('contacts.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('contacts.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('contacts.delete');
    }
}
