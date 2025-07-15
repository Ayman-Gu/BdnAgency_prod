<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceBdd extends Model
{
    protected $table = 'servicebdd_page';

    protected $fillable = [
        'name',
        'hero_section',
        'features_section',
        'benefits_section',
        'use_cases_section',
        'testimonials_section',
        'cta_section',
        'pricing_section',
    ];
}
