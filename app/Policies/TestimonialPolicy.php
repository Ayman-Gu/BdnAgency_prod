<?php

namespace App\Policies;

use App\Models\User;

class TestimonialPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('testimonials.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('testimonials.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('testimonials.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('testimonials.delete');
    }
}
