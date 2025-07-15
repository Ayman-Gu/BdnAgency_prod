<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceVisionnaire;

class ServiceVisionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ServiceVisionnaire::firstOrCreate(['name' => 'service-visionnaire'], [
            'hero_section' => true,
            'features_section' => true,
            'benefits_section' => true,
            'examples_section' => true,
            'cta_section' => true,
            'pricing_section' => true,
        ]);
    } //

}
