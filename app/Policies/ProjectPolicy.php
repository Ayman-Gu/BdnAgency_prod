<?php

namespace App\Policies;

use App\Models\User;

class ProjectPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('projects.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('projects.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('projects.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('projects.delete');
    }

    public function manageCategories(User $user)
    {
        return $user->hasPermissionTo('projects.managecategories');
    }
}
