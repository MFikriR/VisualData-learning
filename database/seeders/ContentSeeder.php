<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            Bab0_PengantarSeeder::class, 
            MateriBab1Seeder::class,
            MateriBab2Seeder::class,
            MateriBab3Seeder::class,
            UjiKompetensiAkhirSeeder::class
        ]);
    }
}