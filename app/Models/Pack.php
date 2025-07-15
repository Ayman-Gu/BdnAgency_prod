<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pack extends Model
{
    protected $fillable = ['service_id', 'pack_type_id', 'price', 'active'];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function packType()
    {
        return $this->belongsTo(PackType::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
