<?php

namespace App\Policies;

use App\Models\User;

class PdfFilePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('pdffiles.read');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('pdffiles.create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('pdffiles.update');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('pdffiles.delete');
    }
}
