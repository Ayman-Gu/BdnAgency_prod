<?php

namespace App\Policies;

use App\Models\User;

class ServiceNewsletterPolicy
{
     public function viewAny(User $user)
    {
        return $user->hasPermissionTo('pages.read');
    }

    public function manageDisplaysections(User $user)
    {
        return $user->hasPermissionTo('pages.managedisplaysections');
    }
}
