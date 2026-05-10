<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_SimulasiBoxPlotSeeder extends Seeder
{
    public function run()
    {
        $chapter = Chapter::where('sequence', 2)->first();
        if (!$chapter) return;

        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-xl border border-purple-100 dark:border-purple-800">
                    <h3 class="text-xl font-bold text-purple-700 dark:text-purple-300 mb-2">🎯 Misi Eksperimen</h3>
                    <p class="mb-2">
                        Box Plot adalah cara ringkas menyajikan statistik 5 serangkai (Minimum, Q1, Median, Q3, Maksimum).
                    </p>
                    <ul class="list-disc pl-5 text-sm space-y-1">
                        <li><strong>Bola-bola Kecil:</strong> Merepresentasikan data individu.</li>
                        <li><strong>Kotak Ungu (Box):</strong> Area Interquartile Range (IQR). 50% data berada di sini.</li>
                        <li><strong>Garis Tengah:</strong> Median (Nilai Tengah).</li>
                        <li><strong>Bola Merah Melayang:</strong> Outlier (Pencilan), data yang terlalu jauh dari kelompoknya.</li>
                    </ul>
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-boxplot'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Anatomi Box Plot',
                'type' => 'simulation_3d',
                'sequence' => 6, // Urutan ke-4
                'min_level' => 6,
                'content' => $content
            ]
        );
    }
}