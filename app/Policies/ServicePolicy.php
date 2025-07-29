<?php

namespace App\Policies;

use App\Models\User;

class ServicePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('services.read');
    }
}
