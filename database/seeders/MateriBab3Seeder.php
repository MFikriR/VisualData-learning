<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab3Seeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT BAB 2
        Chapter::updateOrCreate(
            ['sequence' => 3], 
            [
                'title' => 'Pengelompokan Data (Clustering)', // Sesuai Gambar
                'description' => 'Memahami konsep dasar Clustering, Jarak, dan Algoritma K-Means.',
                'is_active' => true,
            ]
        );

        // 2. PANGGIL FILE ANAK-ANAK
        $this->call([
            Bab3_01_KonsepClusteringSeeder::class,
            Bab3_SimulasiKonsepClusteringSeeder::class,
            Bab3_04_SimulasiClusteringSeeder::class,
            Bab3_02_PeranJarakSeeder::class,
            Bab3_SimulasiJarakSeeder::class,
            Bab3_03_AlgoritmaKMeansSeeder::class,
            Bab3_05_KuisAkhirSeeder::class,
        ]);
    }
}