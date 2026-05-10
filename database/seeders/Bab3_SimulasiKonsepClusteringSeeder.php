<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_SimulasiKonsepClusteringSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ini Bab 3
        $chapter = Chapter::where('sequence', 3)->first();
        if (!$chapter) return;

        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-xl border border-purple-100 dark:border-purple-800">
                    <h3 class="text-xl font-bold text-purple-700 dark:text-purple-300 mb-2">🎯 Konsep Dasar: Unsupervised Learning</h3>
                    <p class="mb-2">
                        Bayangkan kamu masuk ke sebuah pesta di mana kamu tidak mengenal siapa pun. Apa yang akan terjadi secara alami?
                    </p>
                    <p class="mb-2">
                        Orang-orang akan mulai berkumpul berdasarkan <strong>kemiripan</strong> mereka. Mungkin yang suka bola akan ngobrol bareng, yang suka musik kumpul bareng, dan yang suka makan akan ada di dekat meja prasmanan.
                    </p>
                    <p class="mb-4">
                        Inilah inti dari <strong>Clustering</strong>: Komputer mencari pola kemiripan data tanpa diberi label sebelumnya.
                    </p>
                    <div class="bg-gray-800 text-gray-300 p-3 rounded-lg text-sm border-l-4 border-purple-500">
                        <strong>Misi Eksperimen:</strong><br>
                        Klik tombol <strong>"✨ Kelompokkan (Clustering)"</strong> dan perhatikan bagaimana data yang berantakan (Chaos) secara otomatis mencari "teman" yang warnanya sama.
                    </div>
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'simulasi-3d-konsep-clustering'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi 3D: Magic of Clustering',
                'type' => 'simulation_3d',
                'sequence' => 2, // Letakkan di paling awal Bab 2
                'min_level' => 8,
                'content' => $content
            ]
        );
    }
}