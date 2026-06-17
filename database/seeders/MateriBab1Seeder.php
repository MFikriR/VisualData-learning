<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class MateriBab1Seeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat/Update Bab 1 dengan judul baru
        Chapter::updateOrCreate(
            ['sequence' => 1],
            [
                'title' => 'Data dan Pengolahannya',
                'description' => 'Memahami definisi, sumber, jenis, struktur, pengolahan, hingga etika data.',
                'is_active' => true,
            ]
        );

        // 2. Panggil file anak sesuai sub-bab baru secara berurutan
        $this->call([
            Bab1_01_ApaItuDataSeeder::class,             // Sub-bab 1 (Definisi & Konsep)
            Bab1_02_SumberJenisStrukturSeeder::class,   // Sub-bab 2 (Gabungan Sumber, Jenis & Struktur)
            Bab1_03_PengolahanDataSeeder::class,        // Sub-bab 3 (Proses Pengolahan & Siklus AI)
            Bab1_KuisAkhirSeeder::class,                // Evaluasi Bab 1
        ]);
    }
}