<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\serviceBdd;

class ServiceBddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        serviceBdd::firstOrCreate(['name' => 'service-bdd'], [
            'hero_section' => true,
            'features_section' => true,
            'benefits_section' => true,
            'use_cases_section' => true,
            'testimonials_section' => true,
            'cta_section' => true,
            'pricing_section' => true,
        ]);
    }
}
