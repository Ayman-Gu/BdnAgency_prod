<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = ['name'];

    public function packs(): HasMany
    {
        return $this->hasMany(Pack::class);
    }
}
