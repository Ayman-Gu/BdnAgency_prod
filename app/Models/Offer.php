<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = ['pack_id', 'name', 'active'];

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }

}
