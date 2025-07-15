<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Home;

class HomeSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
       Home::firstOrCreate(['name' => 'home'], [
            'hero_section' => true,
            'about_section' => true,
            'features_section' => true,
            'cta_section' => true,
            'services_section' => true,
            'portfolio_section' => true,
            'testimonials_section' => true,
            'pricing_section' => true,
            'faq_section' => true,
            'team_section' => true,
            'recentposts_section' => true,
            'contact_section' => true,
        ]);
    }
}
