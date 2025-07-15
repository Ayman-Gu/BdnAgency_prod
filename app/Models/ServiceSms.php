<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSms extends Model
{
    protected $table = 'servicesms_page';

    protected $fillable = [
        'name',
        'hero_section',
        'features_section',
        'commerce_section',
        'technology_section',
        'cta_section',
        'pricing_section',
    ];
}
