<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_04_SimulasiClusteringSeeder extends Seeder
{
    public function run()
    {
        // Cari Bab 3
        $chapter = Chapter::where('sequence', 3)->first();
        if (!$chapter) return;

        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-xl border border-green-100 dark:border-green-800">
                    <h3 class="text-xl font-bold text-green-700 dark:text-green-300 mb-2">🎯 Misi Eksperimen</h3>
                    <p class="mb-2">
                        Bagaimana komputer bisa mengelompokkan data secara otomatis? Mari kita simulasikan algoritma <strong>K-Means</strong>.
                    </p>
                    <ul class="list-decimal pl-5 text-sm space-y-1">
                        <li><strong>Inisialisasi:</strong> Komputer menaruh 3 titik pusat (Centroid) secara acak.</li>
                        <li><strong>Assignment (E-Step):</strong> Setiap data memilih centroid terdekat dan bergabung menjadi satu kelompok (berubah warna).</li>
                        <li><strong>Update (M-Step):</strong> Centroid berpindah ke titik rata-rata (pusat massa) dari kelompok barunya.</li>
                        <li>Ulangi langkah 2 & 3 sampai posisi centroid tidak berubah lagi (Konvergen).</li>
                    </ul>
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-kmeans'], // Slug Baru yang Lebih Jelas
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Algoritma K-Means',
                'type' => 'simulation_3d',
                'sequence' => 6, // Sesuaikan urutan di Bab 2
                'min_level' => 10,
                'content' => $content
            ]
        );
    }
}