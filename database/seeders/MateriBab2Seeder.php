<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter; // Jangan lupa import ini

class MateriBab2Seeder extends Seeder
{
    public function run()
    {
        // 1. BUAT BAB-NYA DULU DI SINI
        // Agar saat file-file anak jalan, Bab 1 sudah tersedia
        Chapter::firstOrCreate(
            ['sequence' => 2],
            ['title' => 'Visualisasi Data']
        );

        // 2. Panggil file anak-anak (Materi & Kuis)
        $this->call([
            Bab2_01_DiagramBatangSeeder::class,
            Bab2_SimulasiBatangSeeder::class,
            Bab2_02_HistogramSeeder::class,
            Bab2_SimulasiHistogramSeeder::class,
            Bab2_03_BoxPlotSeeder::class,
            Bab2_SimulasiBoxPlotSeeder::class,
            Bab2_04_ScatterPlotSeeder::class,
            Bab2_SimulasiScatterSeeder::class,
            Bab2_06_KuisAkhirSeeder::class, 
        ]);
    }
}