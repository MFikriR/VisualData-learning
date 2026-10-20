<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab1Seeder extends Seeder
{
    public function run(): void
    {
        // Update/Create Chapter 1
        Chapter::updateOrCreate(
            ['sequence' => 1],
            [
                'title' => 'Pengenalan dan Pengolahan Data',
                'description' => 'Memahami konsep dasar data, jenis data, pembersihan data, hingga teknik analisis deskriptif.',
                'is_active' => true,
            ]
        );

        $this->call([
            Bab1_01_KonsepDasarDataSeeder::class,   // Sub-bab 1
            Bab1_02_PengolahanDataSeeder::class,    // Sub-bab 2
            Bab1_03_AnalisisDataSeeder::class,      // Sub-bab 3
            Bab1_KuisAkhirSeeder::class,            // Evaluasi Bab 1
        ]);
    }
}