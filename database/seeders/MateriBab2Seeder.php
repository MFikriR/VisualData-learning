<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab2Seeder extends Seeder
{
    public function run(): void
    {
        // Update/Create Chapter 2
        Chapter::updateOrCreate(
            ['sequence' => 2],
            [
                'title' => 'Visualisasi Data',
                'description' => 'Menyajikan data secara visual menggunakan Diagram Batang, Histogram, Box Plot, dan Scatter Plot secara etis.',
                'is_active' => true,
            ]
        );

        $this->call([
            Bab2_01_DiagramBatangSeeder::class,     // Sub-bab 1
            Bab2_02_HistogramSeeder::class,         // Sub-bab 2
            Bab2_03_BoxPlotSeeder::class,           // Sub-bab 3
            Bab2_04_ScatterPlotSeeder::class,       // Sub-bab 4
            Bab2_KuisAkhirSeeder::class,            // Evaluasi 20 Soal Bab 2
        ]);
    }
}