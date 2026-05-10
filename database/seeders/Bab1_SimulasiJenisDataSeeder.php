<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_SimulasiJenisDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Cari Bab 1
        $chapter = Chapter::where('sequence', 1)->first();
        if (!$chapter) return;

        // 2. Konten Teks Pendukung (Instruksi)
        $content = <<<EOT
            <div class="space-y-4 text-gray-800 dark:text-gray-200">
                <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-xl border border-blue-100 dark:border-blue-800">
                    <h3 class="text-xl font-bold text-blue-700 dark:text-blue-300 mb-2">🏭 Misi: Pabrik Pemilah Data</h3>
                    <p>
                        Selamat datang di <strong>Data Sorting Factory</strong>! Mesin AI kita kebingungan membedakan jenis-jenis data yang masuk.
                    </p>
                    <p class="mt-2">
                        Tugasmu adalah membantu mesin tersebut dengan cara:
                    </p>
                    <ul class="list-disc pl-5 mt-2 text-sm">
                        <li><strong>Drag & Drop</strong> (Tarik dan Lepas) paket data yang muncul ke dalam keranjang yang sesuai.</li>
                        <li>Ikuti <strong>Tutorial</strong> di awal untuk memahami cara kerjanya.</li>
                        <li>Hati-hati! Salah memasukkan jenis data akan membuat mesin <em>Error</em>.</li>
                    </ul>
                </div>
            </div>
EOT;

        // 3. Simpan Materi Baru
        // Pastikan sistem kamu me-load view 'jenis_data.blade.php' jika type-nya 'simulation_jenis_data'
        Material::updateOrCreate(
            ['slug' => 'simulasi-jenis-data'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Simulasi: Pabrik Pemilah Data',
                'type' => 'simulation_jenis_data', // Tipe khusus untuk memanggil view yang sesuai
                'sequence' => 3, // Ditaruh setelah materi persiapan labeling
                'min_level' => 2,
                'content' => $content
            ]
        );
        
        $this->command->info('Simulasi Jenis Data berhasil dibuat!');
    }
}