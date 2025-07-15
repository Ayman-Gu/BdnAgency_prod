<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pack_types')->insert([
            ['name' => 'Start'],
            ['name' => 'Avancé'],
            ['name' => 'Expert'],
            ['name' => 'Sur Mesure'],
        ]);
    }
}
