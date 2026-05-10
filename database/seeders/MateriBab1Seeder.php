<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab1Seeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT BAB 1 (PENGENALAN DATA)
        Chapter::updateOrCreate(
            ['sequence' => 1], // Urutan ke-1
            [
                'title' => 'Pengenalan Data',
                'description' => 'Memahami definisi, jenis, dan struktur data sebagai fondasi AI.',
                'is_active' => true,
            ]
        );

        // 2. PANGGIL FILE ANAK-ANAK (MATERI BARU)
        $this->call([
            Bab1_01_ApaItuDataSeeder::class,
            Bab1_02_JenisDataSeeder::class,
            Bab1_SimulasiJenisDataSeeder::class, // Simulasi Pabrik
            Bab1_03_StrukturDataSeeder::class,
            Bab1_04_PersiapanLabelingSeeder::class,
            Bab1_SimulasiLabelingSeeder::class,  // Simulasi AI Training
            Bab1_KuisAkhirSeeder::class,
        ]);
    }
}