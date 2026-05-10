<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_SimulasiLabelingSeeder extends Seeder
{
    public function run()
    {
        // 1. Cari Bab 1
        $chapter = Chapter::where('sequence', 1)->first();
        if (!$chapter) return;

        // 2. Konten Teks Pendukung (Instruksi)
        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-xl border border-purple-100 dark:border-purple-800">
                    <h3 class="text-xl font-bold text-purple-700 dark:text-purple-300 mb-2">🤖 Misi: Melatih Otak AI</h3>
                    <p>
                        Ingat konsep <strong>"Anak Kecil Belajar"</strong>?.
                    </p>
                    <p class="mt-2">
                        Di simulasi ini, kamu berperan sebagai <strong>"Guru"</strong>. Sebuah AI baru saja "lahir" dan dia belum tahu apa-apa.
                        Tugasmu adalah memberinya makan berupa <strong>Data Gambar</strong> dan memberitahunya: <em>"Ini gambar apa?"</em>.
                    </p>
                    <ul class="list-disc pl-5 mt-2 text-sm">
                        <li>AI ini butuh <strong>Akurasi 100%</strong> untuk bisa lulus.</li>
                        <li>Setiap label yang <strong>Benar</strong> akan menaikkan kecerdasannya.</li>
                        <li>Setiap label yang <strong>Salah</strong> (Data Kotor) akan membuatnya bingung dan menurunkan skor.</li>
                    </ul>
                </div>
            </div>
EOT;

        // 3. Simpan Materi Baru
        // Kita gunakan tipe 'simulation_labeling' agar sistem memanggil view khusus yang akan kita buat di bawah
        Material::updateOrCreate(
            ['slug' => 'simulasi-labeling-ai'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi: Training AI (Teachable Machine)',
                'type' => 'simulation_labeling', // Pastikan kamu membuat view untuk tipe ini
                'sequence' => 6, // Urutan terakhir di materi Bab 1
                'min_level' => 3,
                'content' => $content
            ]
        );
        
        $this->command->info('Simulasi Labeling AI berhasil dibuat!');
    }
}