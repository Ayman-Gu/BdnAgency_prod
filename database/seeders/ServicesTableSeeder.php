<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            ['name' => 'Location de Plateforme Emailing'],
            ['name' => 'Location de Plateforme SMS'],
            ['name' => 'Location de Bases de Données'],
            ['name' => 'Newsletter'],
            ['name' => 'Le Visionnaire'],
            ['name' => 'Branding & Identité Visuelle'],
        ]);
    }
}
