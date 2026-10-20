<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_03_BoxPlotSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 2 belum dibuat! Pastikan ChapterSeeder sudah dikonfigurasi untuk Bab 2.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::whereIn('slug', ['diagram-kotak', 'box-plot'])->delete();

        $content = <<<'EOT'
        <div id="areaMateriPelajaran" class="space-y-12 text-[#1d1d1f] font-sans transition-all duration-1000 relative z-10 pb-20">

            <!-- Block Tujuan Pembelajaran -->
            <div class="mb-12 bg-[#f5f5f7] border-l-4 border-[#0066cc] p-6 md:p-8 rounded-r-xl shadow-sm">
                <h3 class="text-xl md:text-2xl font-semibold text-[#1d1d1f] mb-5">
                    Tujuan Pembelajaran
                </h3>
                <ul class="space-y-4 text-[#1d1d1f]">
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">1</span>
                        <p class="leading-relaxed">Mengidentifikasi komponen ringkasan lima angka (five-number summary) pada Diagram Kotak (Box Plot).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menerapkan perhitungan batas pencilan (outlier) menggunakan Jangkauan Interkuartil (IQR) pada Diagram Kotak (Box Plot).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Mengevaluasi bentuk sebaran data (skewness) melalui tampilan visual Diagram Kotak (Box Plot).</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Dasar & Anatomi Diagram Kotak -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Dasar & Anatomi Diagram Kotak (Box Plot)
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi dan Fungsi Utama -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi Diagram Kotak dan Fungsi Utamanya</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Diagram Kotak (dikenal secara luas sebagai <em>Box Plot</em> atau <em>Box-and-Whisker Plot</em>) adalah bentuk visualisasi grafik data kuantitatif yang menggambarkan ringkasan statistik deskriptif dari sebaran data melalui lima ukuran utama (<em>five-number summary</em>), serta menampilkan keberadaan nilai pencilan (<em>outliers</em>).
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">1. Menampilkan Ringkasan Statistik</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Menyajikan lima ukuran angka statistik secara simultan dan ringkas dalam satu tampilan visual.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">2. Menggambarkan Pemusatan & Penyebaran</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Memperlihatkan titik pusat data (Median) serta tingkat keragaman/penyebaran data (IQR) secara transparan.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">3. Mendeteksi Pencilan (Outlier)</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Mengidentifikasi nilai-nilai data ekstrem yang berada di luar batas toleransi normal secara cepat.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">4. Membandingkan Kelompok Data</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Memudahkan perbandingan distribusi antara dua atau lebih kelompok data secara berdampingan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.2: Jenis Data yang Sesuai -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Jenis Data yang Sesuai</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Box Plot khusus dirancang untuk memvisualisasikan <strong>Data Numerikal Kuantitatif</strong> (skala interval dan rasio), baik yang bersifat diskrit (hasil perhitungan) maupun kontinu (hasil pengukuran).
                        </p>
                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm text-xs text-[#333333]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-2">• Contoh Data yang Sesuai:</strong>
                            <ul class="list-disc list-inside space-y-1 pl-2">
                                <li>Nilai hasil ujian siswa (skala 0–100).</li>
                                <li>Kecepatan unduh internet (Mbps).</li>
                                <li>Durasi/lama waktu belajar siswa harian (menit).</li>
                                <li>Konsumsi energi listrik bulanan (kWh) atau suhu harian (°C).</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sub 1.3: Anatomi Five-Number Summary -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Anatomi Komponen Utama (Five-Number Summary)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. Nilai Minimum (x<sub>min</sub>)</strong>
                                Nilai data terkecil di dalam kumpulan data yang masih berada di dalam batas pagar bawah (bukan pencilan).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. Kuartil Bawah / Pertama (Q<sub>1</sub>)</strong>
                                Nilai yang membatasi 25% data terendah (persentil ke-25).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. Median / Kuartil Tengah (Q<sub>2</sub>)</strong>
                                Nilai tengah yang membagi kumpulan data terurut menjadi dua bagian sama besar (50% bawah, 50% atas).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">4. Kuartil Atas / Ketiga (Q<sub>3</sub>)</strong>
                                Nilai yang membatasi 75% data terendah atau 25% data tertinggi (persentil ke-75).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">5. Nilai Maksimum (x<sub>maks</sub>)</strong>
                                Nilai data terbesar di dalam kumpulan data yang masih berada di dalam batas pagar atas (bukan pencilan).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">6. Kotak / Box (IQR) & Whiskers</strong>
                                Kotak membentang dari Q<sub>1</sub> ke Q<sub>3</sub> (tempat 50% data tengah mengumpul). Garis <em>whisker</em> menjulur ke x<sub>min</sub> dan x<sub>maks</sub>.
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.4: Konsep Pencilan & Rumus Pagar -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.4 Konsep Pencilan (Outlier) & Rumus Pagar</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Pencilan (<em>Outlier</em>) adalah nilai data ekstrem yang letaknya sangat jauh menyimpang dari mayoritas kelompok data lainnya. Batas pagar (<em>fences</em>) dihitung berdasarkan Jangkauan Interkuartil (IQR = Q<sub>3</sub> - Q<sub>1</sub>):
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <h5 class="text-sm font-bold text-[#1d1d1f] mb-2">Batas Bawah Pagar (Lower Fence)</h5>
                                <p class="font-mono text-[#0066cc] font-bold text-sm mb-2">Batas Bawah = Q<sub>1</sub> - (1,5 × IQR)</p>
                                <p class="text-xs text-slate-600">Setiap datum yang nilainya lebih kecil dari Batas Bawah dikategorikan sebagai <strong>Pencilan Bawah</strong>.</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <h5 class="text-sm font-bold text-[#1d1d1f] mb-2">Batas Atas Pagar (Upper Fence)</h5>
                                <p class="font-mono text-[#0066cc] font-bold text-sm mb-2">Batas Atas = Q<sub>3</sub> + (1,5 × IQR)</p>
                                <p class="text-xs text-slate-600">Setiap datum yang nilainya lebih besar dari Batas Atas dikategorikan sebagai <strong>Pencilan Atas</strong>.</p>
                            </div>
                        </div>
                        <p class="text-xs text-[#333333] mt-3">
                            <em>Penanda Pencilan:</em> Dinyatakan sebagai simbol terpisah berupa titik (•), bintang (*), atau silang (×) di luar batas garis bisai (whisker).
                        </p>
                    </div>

                    <!-- Sub 1.5: Bentuk Sebaran Data (Skewness) -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.5 Bentuk Sebaran Data (Skewness) dari Box Plot</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-2">1. Simetris (Normal)</h5>
                                <ul class="text-xs text-[#333333] space-y-1.5 leading-relaxed">
                                    <li>• Garis Median (Q<sub>2</sub>) berada tepat di pertengahan kotak.</li>
                                    <li>• Panjang garis bisai (whisker) kiri dan kanan seimbang.</li>
                                    <li>• Jarak (Q<sub>2</sub> - Q<sub>1</sub>) ≈ (Q<sub>3</sub> - Q<sub>2</sub>).</li>
                                </ul>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-2">2. Miring Kanan (Positif)</h5>
                                <ul class="text-xs text-[#333333] space-y-1.5 leading-relaxed">
                                    <li>• Garis Median (Q<sub>2</sub>) cenderung bergeser ke kiri/bawah kotak.</li>
                                    <li>• Garis bisai kanan/atas lebih panjang.</li>
                                    <li>• Terdapat pencilan di sebelah kanan/atas.</li>
                                </ul>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-2">3. Miring Kiri (Negatif)</h5>
                                <ul class="text-xs text-[#333333] space-y-1.5 leading-relaxed">
                                    <li>• Garis Median (Q<sub>2</sub>) cenderung bergeser ke kanan/atas kotak.</li>
                                    <li>• Garis bisai kiri/bawah lebih panjang.</li>
                                    <li>• Terdapat pencilan di sebelah kiri/bawah.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Contoh Tabel Ringkasan Statistik & Visualisasi -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Contoh Tabel Ringkasan Statistik & Analisis Box Plot
                </h3>

                <p class="text-[#333333] leading-relaxed mb-6">
                    Berikut adalah contoh ringkasan statistik hasil ujian kecepatan mengetik (<em>words per minute / wpm</em>) dari 20 siswa:
                </p>

                <!-- Tabel Ringkasan Statistik WPM -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm mb-6">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.1: Ringkasan Ukuran Statistik Kecepatan Mengetik (WPM)</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Ukuran Statistik</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nilai WPM</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Keterangan Komponen</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr><td class="px-4 py-2.5">Minimum Non-Outlier</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-medium">50</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">x<sub>min</sub> (Ujung Whisker Bawah)</td></tr>
                                <tr><td class="px-4 py-2.5">Kuartil Pertama (Q<sub>1</sub>)</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-medium">65</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Batas Bawah 25% Data</td></tr>
                                <tr class="bg-blue-50/50"><td class="px-4 py-2.5 font-bold text-[#0066cc]">Median (Q<sub>2</sub>)</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-bold text-[#0066cc]">75</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Nilai Tengah (50% Data)</td></tr>
                                <tr><td class="px-4 py-2.5">Kuartil Ketiga (Q<sub>3</sub>)</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-medium">85</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Batas Atas 75% Data</td></tr>
                                <tr><td class="px-4 py-2.5">Maksimum Non-Outlier</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-medium">95</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">x<sub>maks</sub> (Ujung Whisker Atas)</td></tr>
                                <tr><td class="px-4 py-2.5">Jangkauan Interkuartil (IQR)</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-bold">20</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Selisih Q<sub>3</sub> - Q<sub>1</sub> (85 - 65)</td></tr>
                                <tr><td class="px-4 py-2.5">Batas Pagar Bawah</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">35</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Q<sub>1</sub> - (1,5 × IQR) = 65 - 30</td></tr>
                                <tr><td class="px-4 py-2.5">Batas Pagar Atas</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">115</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Q<sub>3</sub> + (1,5 × IQR) = 85 + 30</td></tr>
                                <tr class="bg-rose-50/50"><td class="px-4 py-2.5 font-bold text-rose-700">Data Pencilan (Outlier)</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-bold text-rose-700">120</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] text-rose-700">Nilai > 115 (Pencilan Atas Ekstrem)</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-[#fafafc] border-t border-[#e0e0e0] text-xs text-[#333333] space-y-1">
                        <p><strong>Keterangan Visual Box Plot:</strong></p>
                        <p>• Lebar Kotak (IQR) = 85 - 65 = <strong>20</strong>.</p>
                        <p>• Posisi Median (75) berada tepat di tengah kotak (simetris antara 65 dan 85).</p>
                        <p>• Nilai 120 digambarkan sebagai titik terpisah (•) di luar batas pagar atas (115) karena terbukti secara matematis sebagai pencilan (outlier).</p>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Studi Kasus Terbimbing & Perbandingan Kelas -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Studi Kasus Terbimbing: Perbandingan Hasil Ujian Dua Kelas
                </h3>

                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0] text-xs space-y-2">
                        <h5 class="text-sm font-bold text-[#1d1d1f]">Skenario Perbandingan Hasil Ujian Semester Matematika</h5>
                        <p>• <strong>Kelas XI-1:</strong> x<sub>min</sub> = 60, Q<sub>1</sub> = 70, Median (Q<sub>2</sub>) = 80, Q<sub>3</sub> = 85, x<sub>maks</sub> = 95. (Tanpa outlier).</p>
                        <p>• <strong>Kelas XI-2:</strong> x<sub>min</sub> = 40, Q<sub>1</sub> = 55, Median (Q<sub>2</sub>) = 65, Q<sub>3</sub> = 80, x<sub>maks</sub> = 90. Terdapat 1 pencilan bawah bernilai <strong>15</strong>.</p>
                    </div>

                    <div class="space-y-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 1: Mengidentifikasi Five-Number Summary & IQR</strong>
                            <p class="mb-2">Identifikasilah nilai Median (Q<sub>2</sub>) dan IQR masing-masing kelas, serta tentukan kelas mana yang lebih konsisten!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Kelas XI-1:</strong> Median = 80, IQR = 85 - 70 = <strong>15</strong>.</p>
                                <p>• <strong>Kelas XI-2:</strong> Median = 65, IQR = 80 - 55 = <strong>25</strong>.</p>
                                <p>• <strong>Evaluasi Konsistensi:</strong> Kelas XI-1 jauh lebih konsisten karena Median lebih tinggi (80 vs 65) dan rentang kotak IQR lebih sempit (15 vs 25), bermakna 50% nilai siswa mengumpul lebih rapat di sekitar median.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 2: Menerapkan Perhitungan Outlier Matematis</strong>
                            <p class="mb-2">Tunjukkan secara matematis menggunakan rumus Batas Bawah Pagar bahwa nilai 15 pada Kelas XI-2 adalah pencilan!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• IQR Kelas XI-2 = 80 - 55 = 25.</p>
                                <p>• Batas Bawah Pagar = Q<sub>1</sub> - (1,5 × IQR) = 55 - (1,5 × 25) = 55 - 37,5 = <strong>17,5</strong>.</p>
                                <p>• <strong>Kesimpulan:</strong> Karena nilai siswa (15) < Batas Bawah Pagar (17,5), maka angka 15 terbukti secara matematis merupakan <strong>Lower Outlier (Pencilan Bawah)</strong>.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 3: Mengevaluasi Skewness & Keputusan Pembelajaran</strong>
                            <p class="mb-2">Evaluasilah bentuk sebaran data (skewness) Kelas XI-2 dan tentukan rekomendasi tindakan untuk guru!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Evaluasi Sebaran:</strong> Posisi Median (65) lebih dekat ke Q<sub>1</sub> (55) daripada Q<sub>3</sub> (80), whisker kanan memanjang, dan ada pencilan rendah (15). Distribusi bersifat <strong>Miring Kanan (Right-Skewed)</strong>.</p>
                                <p>• <strong>Rekomendasi Guru:</strong> Perlu bimbingan remedial khusus untuk kelompok siswa bernilai rendah, terutama siswa pencilan bernilai 15.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 3 (Bab 2)
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Five-Number Summary:</strong> Nilai Minimum (x<sub>min</sub>), Kuartil 1 (Q<sub>1</sub>), Median (Q<sub>2</sub>), Kuartil 3 (Q<sub>3</sub>), dan Nilai Maksimum (x<sub>maks</sub>).</li>
                    <li>• <strong>Jangkauan Interkuartil (IQR):</strong> IQR = Q<sub>3</sub> - Q<sub>1</sub>, merepresentasikan penyebaran 50% data bagian tengah.</li>
                    <li>• <strong>Rumus Pagar Pencilan:</strong> Lower Fence = Q<sub>1</sub> - 1,5(IQR); Upper Fence = Q<sub>3</sub> + 1,5(IQR). Outlier digambarkan sebagai titik terpisah.</li>
                    <li>• <strong>Skewness dari Box Plot:</strong> Pergeseran posisi garis Median di dalam kotak serta perbedaan panjang whisker menunjukkan kemiringan sebaran (simetris, miring kanan, atau miring kiri).</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Perhatikan data durasi pengisian daya baterai telepon genggam (dalam menit) berikut: Minimum = 68, Q1 = 70, Median = 72, Q3 = 76, Maksimum = 80. Komponen ringkasan lima angka yang tepat untuk Kuartil Bawah (Q1), Median (Q2), dan Jangkauan Interkuartil (IQR) secara berturut-turut adalah...."
                    data-opt-a="68 menit, 72 menit, dan 12 menit"
                    data-opt-b="70 menit, 72 menit, dan 6 menit"
                    data-opt-c="70 menit, 76 menit, dan 80 menit"
                    data-opt-d="68 menit, 70 menit, dan 76 menit"
                    data-opt-e="72 menit, 76 menit, dan 10 menit"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Seorang analis data mengamati grafik Box Plot dan menemukan bahwa panjang kotak (box) mencakup rentang dari angka 40 hingga 60. Makna statistik yang paling tepat dari panjang kotak tersebut adalah...."
                    data-opt-a="Kotak tersebut mewakili seluruh 100% data sampel yang diteliti."
                    data-opt-b="Kotak tersebut menunjukkan rentang 50% data bagian tengah yang berada di antara Q1 dan Q3."
                    data-opt-c="Kotak tersebut mewakili 25% data terendah dari distribusi populasi."
                    data-opt-d="Kotak tersebut hanya memuat nilai rata-rata (mean) dan nilai maksimum."
                    data-opt-e="Kotak tersebut menunjukkan daerah yang pasti bebas dari kesalahan input data."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Hasil pencatatan konsumsi listrik bulanan (dalam kWh) dari beberapa rumah tangga memiliki nilai Kuartil Pertama (Q1) = 310 kWh dan Kuartil Ketiga (Q3) = 330 kWh. Salah satu rumah tangga mencatatkan penggunaan listrik sebesar 750 kWh. Berdasarkan rumus pagar pencilan, evaluasi perhitungan yang benar mengenai angka 750 kWh adalah...."
                    data-opt-a="Angka 750 kWh bukan pencilan karena batas atas pagar adalah 800 kWh."
                    data-opt-b="Angka 750 kWh merupakan pencilan atas karena IQR = 20 kWh dan Batas Atas Pagar adalah 360 kWh (di mana 750 > 360)."
                    data-opt-c="Angka 750 kWh merupakan pencilan bawah karena nilainya lebih besar dari median."
                    data-opt-d="Angka 750 kWh bukan pencilan karena masih terhubung oleh garis whisker."
                    data-opt-e="Angka 750 kWh merupakan nilai rata-rata kuadrat dari seluruh sampel."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah grafik Box Plot menunjukkan posisi garis Median (Q2) berada sangat rapat dengan garis Kuartil Ketiga (Q3), sementara garis whisker sebelah kiri membentang sangat panjang ke arah nilai rendah. Bentuk sebaran data (skewness) dan interpretasi statistik yang paling tepat dari grafik tersebut adalah...."
                    data-opt-a="Distribusi simetris normal, di mana nilai mean sama dengan median."
                    data-opt-b="Distribusi miring kanan (positively skewed), di mana mayoritas data bernilai rendah."
                    data-opt-c="Distribusi miring kiri (negatively skewed), di mana mayoritas data mengumpul di nilai tinggi namun terdapat ekor sebaran nilai rendah di sebelah kiri."
                    data-opt-d="Distribusi bimodal, di mana terdapat dua puncak populasi terpisah."
                    data-opt-e="Distribusi seragam, di mana seluruh data memiliki frekuensi yang persis sama."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dua model kecerdasan buatan (Model A dan Model B) diuji waktu pelatihannya (dalam jam). Model A memiliki Median = 5,2 jam, IQR = 0,3 jam, tanpa pencilan. Model B memiliki Median = 4,8 jam, IQR = 1,8 jam, terdapat 2 pencilan atas. Evaluasi keputusan yang paling tepat jika industri membutuhkan model dengan waktu pelatihan yang paling stabil dan konsisten adalah...."
                    data-opt-a="Memilih Model B karena nilai mediannya lebih rendah."
                    data-opt-b="Memilih Model A karena nilai IQR jauh lebih kecil (0,3 jam), yang menandakan variabilitas sebaran waktu pelatihan Model A jauh lebih konsisten dan seragam dibanding Model B."
                    data-opt-c="Memilih Model B karena memiliki 2 pencilan atas yang menguntungkan."
                    data-opt-d="Memilih kedua model karena keduanya memiliki skala sumbu Y yang sama."
                    data-opt-e="Menolak kedua model karena tidak menggunakan grafik diagram garis."
                    data-answer="B">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'diagram-kotak'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Diagram Kotak (Box Plot)',
                'type' => 'text',
                'sequence' => 3,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 2 Sub 3: Diagram Kotak (Box Plot) berhasil diperbarui!');
    }
}