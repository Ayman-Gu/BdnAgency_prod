<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    
    protected $table = 'home_page';

    protected $fillable = [
        'name',
        'hero_section',
        'about_section',
        'features_section',
        'cta_section',
        'services_section',
        'portfolio_section',
        'testimonials_section',
        'pricing_section',
        'faq_section',
        'team_section',
        'recentposts_section',
        'contact_section',
    ];
}
