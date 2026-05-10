<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_SimulasiBatangSeeder extends Seeder
{
    public function run()
    {
        // 1. Cari Bab 2
        $chapter = Chapter::where('sequence', 2)->first();
        if (!$chapter) return;

        // 2. Konten Teks Pendukung (Instruksi)
        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-indigo-50 dark:bg-indigo-900/20 p-6 rounded-xl border border-indigo-100 dark:border-indigo-800">
                    <h3 class="text-xl font-bold text-indigo-700 dark:text-indigo-300 mb-2">🎯 Misi Eksperimen</h3>
                    <p>
                        Di laboratorium virtual ini, kamu akan melihat bagaimana <strong>Diagram Batang 3D</strong> terbentuk dari data angka.
                        Tugasmu adalah mengubah nilai variabel A, B, dan C menggunakan slider di atas, lalu perhatikan bagaimana tinggi batang berubah secara real-time.
                    </p>
                    <ul class="list-disc pl-5 mt-2 text-sm">
                        <li>Perhatikan bahwa <strong>Lebar</strong> batang tetap sama.</li>
                        <li>Hanya <strong>Tinggi</strong> batang yang berubah sesuai nilai (Frekuensi).</li>
                    </ul>
                </div>
            </div>
EOT;

        // 3. Simpan Materi Baru (Sequence urutan 2, setelah materi konsep)
        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-diagram-batang'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Diagram Batang',
                'type' => 'simulation_3d', // Tipe khusus 3D
                'sequence' => 2, // Kita taruh di urutan ke-2 (setelah Konsep)
                'min_level' => 4,
                'content' => $content
            ]
        );
        
        $this->command->info('Simulasi 3D Diagram Batang berhasil dibuat!');
    }
}