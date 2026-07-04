<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab2Seeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat/Update Bab 2 dengan judul baru
        Chapter::updateOrCreate(
            ['sequence' => 2],
            [
                'title' => 'Visualisasi dan Pengelompokan Data',
                'description' => 'Menerapkan konsep visualisasi grafik dan memahami cara kerja algoritma pengelompokan data.',
                'is_active' => true,
            ]
        );

        // 2. Panggil file anak sesuai sub-bab baru secara berurutan
        $this->call([
            Bab2_01_VisualisasiDataSeeder::class,       // Sub-bab 1 (Visualisasi / 3D Chart)
            Bab2_02_PengelompokanDataSeeder::class,      // Sub-bab 2 (Konsep K-Means Clustering)
            Bab2_06_KuisAkhirSeeder::class,              // Evaluasi Bab 2
        ]);
    }
}