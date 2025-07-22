<?php

namespace App\Policies;

use App\Models\User;

class ServiceBrandingPolicy
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

