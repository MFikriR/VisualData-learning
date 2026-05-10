<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_SimulasiHistogramSeeder extends Seeder
{
    public function run()
    {
        $chapter = Chapter::where('sequence', 2)->first();
        if (!$chapter) return;

        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-xl border border-blue-100 dark:border-blue-800">
                    <h3 class="text-xl font-bold text-blue-700 dark:text-blue-300 mb-2">🎯 Misi Eksperimen</h3>
                    <p class="mb-2">
                        Histogram digunakan untuk melihat <strong>Distribusi Data</strong>. Di sini kita memiliki data nilai ujian dari <strong>500 Siswa</strong>.
                    </p>
                    <ul class="list-disc pl-5 text-sm space-y-1">
                        <li><strong>Geser Slider "Jumlah Kelas":</strong> Lihat bagaimana bentuk grafik berubah drastis saat kamu mengubah jumlah pengelompokan data.</li>
                        <li><strong>Tombol Acak Data:</strong> Klik untuk menghasilkan data nilai ujian baru secara random.</li>
                        <li>Perhatikan bahwa batang-batang histogram <strong>saling menempel</strong> (tidak ada celah), berbeda dengan diagram batang.</li>
                    </ul>
                </div>
            </div>
EOT;

        // Sequence kita selipkan di antara Diagram Batang dan Histogram Konsep
        // Atau sesuaikan urutan sesuai keinginan Anda
        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-histogram'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Histogram & Distribusi',
                'type' => 'simulation_3d',
                'sequence' => 4, // Urutan ke-3
                'min_level' => 5,
                'content' => $content
            ]
        );
    }
}