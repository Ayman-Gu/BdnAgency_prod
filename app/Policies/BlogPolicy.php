<?php

namespace App\Policies;

use App\Models\User;

class BlogPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('blog.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('blog.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('blog.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('blog.delete');
    }

    public function manageCategories(User $user)
    {
        return $user->hasPermissionTo('blog.category.manage');
    }
}
