<?php

namespace App\Policies;

use App\Models\User;

class FaqPolicy
{
    
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('faq.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('faq.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('faq.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('faq.delete');
    }

}
