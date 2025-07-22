<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AproposPage;


class AproposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       AproposPage::firstOrCreate(['name' => 'Apropos-page'], [
            'hero_section' => true,
            'qui_sommes_nous_section' => true,
            'nos_valeurs_section' => true,
            'notre_histoire_section' => true,
            'notre_equipe_section' => true,
            'cta_section' => true,
        ]);
    }
}
