<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_SimulasiScatterSeeder extends Seeder
{
    public function run()
    {
        $chapter = Chapter::where('sequence', 2)->first();
        if (!$chapter) return;

        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-indigo-50 dark:bg-indigo-900/20 p-6 rounded-xl border border-indigo-100 dark:border-indigo-800">
                    <h3 class="text-xl font-bold text-indigo-700 dark:text-indigo-300 mb-2">🎯 Misi Eksperimen</h3>
                    <p class="mb-2">
                        <strong>Scatter Plot</strong> (Diagram Pencar) digunakan untuk melihat hubungan (korelasi) antara dua variabel: <strong>Sumbu X</strong> (Horizontal) dan <strong>Sumbu Y</strong> (Vertikal).
                    </p>
                    <ul class="list-disc pl-5 text-sm space-y-1">
                        <li><strong>Korelasi Positif:</strong> Saat X naik, Y ikut naik (Grafik menanjak).</li>
                        <li><strong>Korelasi Negatif:</strong> Saat X naik, Y malah turun (Grafik menurun).</li>
                        <li><strong>Tidak Ada Korelasi:</strong> Titik-titik menyebar acak tanpa pola.</li>
                    </ul>
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-scatterplot-correlation'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Korelasi Scatter Plot',
                'type' => 'simulation_3d',
                'sequence' => 8, // Urutan ke-5 (Setelah Box Plot)
                'min_level' => 7,
                'content' => $content
            ]
        );
    }
}