<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceNewsletter extends Model
{
    protected $table = 'servicenewsletter_page';

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
