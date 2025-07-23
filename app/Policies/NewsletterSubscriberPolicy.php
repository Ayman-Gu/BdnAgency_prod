<?php

namespace App\Policies;

use App\Models\User;

class NewsletterSubscriberPolicy
{

    public function read(User $user): bool
    {
        return $user->hasPermissionTo('newsletters.read');
    }


    public function export(User $user): bool
    {
        return $user->hasPermissionTo('newsletters.export');
    }

    public function deleteAll(User $user): bool
    {
        return $user->hasPermissionTo('newsletters.deleteAll');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermissionTo('newsletters.delete');
    }
}
