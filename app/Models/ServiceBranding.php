<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceBranding extends Model
{
   protected $table = 'servicebranding_page';

    protected $fillable = [
        'name',
        'hero_section',
        'features_section',
        'benefits_section',
        'examples_section',
        'cta_section',
        'pricing_section',
    ];
}
