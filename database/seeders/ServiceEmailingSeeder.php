<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceEmailing;

class ServiceEmailingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ServiceEmailing::firstOrCreate(['name' => 'service-emailing'],
        [
            'hero_section' => true,
            'features_section' => true,
            'emailMarketing_section' => true,
            'automation_section' => true,
            'cta_section' => true,
            'services_section' => true,
            'pricing_section' => true,
        ]);
    }
}
