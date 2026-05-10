<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_SimulasiJarakSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ini Bab 3
        $chapter = Chapter::where('sequence', 3)->first();
        if (!$chapter) return;

        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-xl border border-blue-100 dark:border-blue-800">
                    <h3 class="text-xl font-bold text-blue-700 dark:text-blue-300 mb-2">🎯 Misi Eksperimen: Mengukur Ruang</h3>
                    <p class="mb-2 text-justify">
                        Dalam Clustering, komputer menentukan kemiripan data berdasarkan <strong>JARAK</strong>. Semakin dekat jaraknya, semakin mirip datanya.
                    </p>
                    <p class="mb-4 text-justify">
                        Kita menggunakan rumus <strong>Euclidean Distance</strong> (Jarak Garis Lurus) untuk menghitungnya di ruang 3 Dimensi.
                    </p>
                    
                    <div class="bg-gray-800 text-green-400 p-5 rounded-lg text-lg border-l-4 border-blue-500 font-mono flex items-center justify-center overflow-x-auto shadow-inner">
                        <span class="mr-2">d =</span>
                        <span class="text-3xl font-light">√</span>
                        <span class="border-t border-green-400 pt-1 ml-1">
                            (x<sub>2</sub> - x<sub>1</sub>)<sup>2</sup> + 
                            (y<sub>2</sub> - y<sub>1</sub>)<sup>2</sup> + 
                            (z<sub>2</sub> - z<sub>1</sub>)<sup>2</sup>
                        </span>
                    </div>

                    <p class="mt-5 text-sm text-gray-600 dark:text-gray-400 bg-white dark:bg-gray-800 p-3 rounded border border-gray-200 dark:border-gray-700">
                        <strong>Tugasmu:</strong> Geser slider koordinat Titik A (Merah) dan Titik B (Biru) di bawah. Perhatikan bagaimana garis penghubung dan hasil perhitungan jarak berubah secara real-time!
                    </p>
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-jarak-euclidean'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Euclidean Distance',
                'type' => 'simulation_3d',
                'sequence' => 4, // Letakkan setelah Konsep Clustering
                'min_level' => 9,
                'content' => $content
            ]
        );
    }
}