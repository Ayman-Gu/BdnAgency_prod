<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceEmailing extends Model
{
    protected $table = 'serviceemailing_page';

    protected $fillable = [
        'name',
        'hero_section',
        'features_section',
        'emailMarketing_section',
        'automation_section',
        'cta_section',
        'services_section',
        'pricing_section',
    ];
}
