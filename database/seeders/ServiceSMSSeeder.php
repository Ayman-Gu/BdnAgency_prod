<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceSms;

class ServiceSMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       ServiceSms::firstOrCreate(['name' => 'service-sms'], [
            'hero_section' => true,
            'features_section' => true,
            'commerce_section' => true,
            'technology_section' => true,
            'cta_section' => true,
            'pricing_section' => true,
        ]);
    }
}
