<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_infos';

    protected $fillable = [
        'address', 'phone', 'email', 'is_active'
    ];
}
