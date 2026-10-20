<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab3Seeder extends Seeder
{
    public function run(): void
    {
        // Update/Create Chapter 3
        Chapter::updateOrCreate(
            ['sequence' => 3],
            [
                'title' => 'Pengelompokan Data (Clustering)',
                'description' => 'Memahami konsep Unsupervised Learning, algoritma K-Means, dan simulasi lab interaktif.',
                'is_active' => true,
            ]
        );

        $this->call([
            Bab3_01_KonsepKMeansSeeder::class,      // Sub-bab 1
            Bab3_02_SimulasiLabKMeansSeeder::class, // Sub-bab 2
            Bab3_KuisAkhirSeeder::class,            // Evaluasi 20 Soal Bab 3
        ]);
    }
}