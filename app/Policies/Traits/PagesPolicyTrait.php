<?php
// app/Policies/Traits/PagesPolicyTrait.php
namespace App\Policies\Traits;

use App\Models\User;

trait PagesPolicyTrait
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('pages.read');
    }


     public function manageDisplaySections(User $user)
    {
        return $user->hasPermissionTo('pages.managedisplaysections');
    }
}
