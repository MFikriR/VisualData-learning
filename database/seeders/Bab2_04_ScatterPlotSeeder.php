<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_04_ScatterPlotSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 2 belum dibuat! Pastikan ChapterSeeder sudah dikonfigurasi untuk Bab 2.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::whereIn('slug', ['diagram-sebar', 'scatter-plot'])->delete();

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
                        <p class="leading-relaxed">Mengidentifikasi komponen variabel independen dan variabel dependen pada Diagram Sebar (Scatter Plot).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menganalisis pola korelasi (positif, negatif, atau tidak ada korelasi) antara dua variabel numerik pada Diagram Sebar (Scatter Plot).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Mengevaluasi keberadaan outlier dan garis tren (line of best fit) untuk penarikan kesimpulan pada Diagram Sebar (Scatter Plot).</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Dasar & Anatomi Diagram Sebar -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Dasar & Anatomi Diagram Sebar (Scatter Plot)
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi dan Fungsi Utama -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi Diagram Sebar dan Fungsi Utamanya</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Diagram Sebar (dikenal secara luas sebagai <em>Scatter Plot</em> atau <em>Scatter Diagram</em>) adalah bentuk grafik visualisasi data yang menampilkan nilai-nilai dari pasangan dua variabel kuantitatif sebagai sekumpulan titik koordinat (x, y) pada bidang Kartesius.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">1. Visualisasi Hubungan Bivariat</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Menampilkan pola hubungan, kecenderungan, dan korelasi antara dua variabel kuantitatif secara intuitif.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">2. Mendeteksi Arah dan Bentuk Tren</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Membantu melihat apakah tren data berbentuk linear (garis lurus) atau non-linear, serta arah korelasi (positif/negatif).</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">3. Mendeteksi Outlier & Pemodelan</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Mengidentifikasi titik ekstrem menyimpang serta memfasilitasi pembuatan garis regresi (<em>line of best fit</em>).</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.2: Jenis Data -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Jenis Data yang Sesuai</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Scatter Plot dirancang khusus untuk <strong>Data Bivariat Numerikal Kuantitatif</strong>, yaitu pasangan angka kuantitatif (X, Y) yang diukur dari entitas atau subjek yang sama.
                        </p>
                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm text-xs text-[#333333]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-2">• Contoh Pasangan Data Bivariat yang Sesuai:</strong>
                            <ul class="list-disc list-inside space-y-1 pl-2">
                                <li>Durasi Waktu Belajar (Jam) vs Nilai Hasil Ujian (0–100).</li>
                                <li>Tinggi Badan (cm) vs Berat Badan (kg).</li>
                                <li>Usia Seseorang (Tahun) vs Tingkat Metabolisme atau Tekanan Darah Sistolik.</li>
                                <li>Jumlah Jam Penggunaan Media Sosial (Jam/Hari) vs Nilai Rapor Siswa.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sub 1.3: Anatomi Komponen Utama -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Anatomi Komponen Utama Diagram Sebar</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. Sumbu Horizontal / Sumbu X (Variabel Independen / Predictor)</strong>
                                Variabel bebas yang bertindak sebagai pemprediksi atau variabel yang memengaruhi variabel lain.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. Sumbu Vertikal / Sumbu Y (Variabel Dependen / Response)</strong>
                                Variabel terikat yang nilainya dipengaruhi oleh variabel independen atau variabel yang ingin diprediksi.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. Titik-Titik Data (Coordinates (x, y))</strong>
                                Setiap simbol titik memetakan nilai x pada sumbu horizontal dan nilai y pada sumbu vertikal.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">4. Garis Tren / Regresi (Line of Best Fit)</strong>
                                Garis lurus model hubungan linear terbaik untuk mengestimasi nilai Y berdasarkan X (persamaan: ŷ = a + bx).
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.4: Pola-Pola Korelasi -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.4 Pola-Pola Korelasi pada Diagram Sebar</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">1. Korelasi Positif</h5>
                                <p class="text-xs text-[#333333] mb-2">Sebaran titik bergerak naik dari kiri bawah ke kanan atas.</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Makna: X meningkat ➔ Y ikut meningkat</span>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">2. Korelasi Negatif</h5>
                                <p class="text-xs text-[#333333] mb-2">Sebaran titik bergerak turun dari kiri atas ke kanan bawah.</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Makna: X meningkat ➔ Y justru menurun</span>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">3. Tidak Ada Korelasi</h5>
                                <p class="text-xs text-[#333333] mb-2">Titik-titik data tersebar secara acak tanpa pola garis lurus.</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Makna: Perubahan X tidak memengaruhi Y</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.5 & 1.6: Kekuatan, Outlier, & Peringatan Etika -->
                    <div class="mt-10 space-y-6">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.5 Kekuatan Korelasi, Outlier, & Peringatan Etika</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm text-xs space-y-2">
                                <h5 class="text-sm font-bold text-[#1d1d1f]">Koefisien Korelasi Pearson (r)</h5>
                                <p>• Berada pada rentang <strong>-1,0 ≤ r ≤ +1,0</strong>.</p>
                                <p>• <strong>r → +1,0:</strong> Korelasi positif kuat (titik rapat mengumpul di garis best-fit).</p>
                                <p>• <strong>r → -1,0:</strong> Korelasi negatif kuat.</p>
                                <p>• <strong>r = 0:</strong> Tidak ada hubungan korelasi linear.</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm text-xs space-y-2">
                                <h5 class="text-sm font-bold text-[#1d1d1f]">Pengaruh Outlier terhadap Garis Tren</h5>
                                <p>Titik pencilan ekstrem yang menyimpang jauh dapat "menarik" posisi garis <em>best-fit</em> sehingga melenceng dari kemiringan aslinya atau memunculkan korelasi palsu (<em>spurious correlation</em>).</p>
                            </div>
                        </div>

                        <div class="p-4 bg-amber-50 border-l-4 border-amber-500 rounded-r-xl text-amber-900 text-xs leading-relaxed">
                            <strong>Peringatan Etika Data (Correlation ≠ Causation):</strong> Dua variabel yang memiliki korelasi kuat <strong>TIDAK OTOMATIS</strong> membuktikan adanya hubungan sebab-akibat (kausalitas). Korelasi hanya menunjukkan kecenderungan perubahan beriringan secara statistik. Kausalitas memerlukan eksperimen terkontrol atau landasan teori mendalam.
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Contoh Tabel Data Bivariat & Analisis -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Contoh Tabel Data Bivariat & Analisis Scatter Plot
                </h3>

                <p class="text-[#333333] leading-relaxed mb-6">
                    Berikut adalah contoh data observasi 8 siswa mengenai Durasi Belajar Mandiri harian (Jam) sebagai Variabel X dan Nilai Ujian Matematika (0–100) sebagai Variabel Y:
                </p>

                <!-- Tabel Data Bivariat -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm mb-6">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.1: Data Durasi Belajar (X) vs Nilai Ujian Matematika (Y)</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Nama Siswa</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Durasi Belajar (Jam - X)</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nilai Ujian (0–100 - Y)</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Keterangan Tren</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr><td class="px-4 py-2.5">Adit</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">1,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">62</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr><td class="px-4 py-2.5">Bima</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">2,0</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">68</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr><td class="px-4 py-2.5">Citra</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">3,0</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">75</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr><td class="px-4 py-2.5">Dina</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">4,0</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">80</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr><td class="px-4 py-2.5">Eko</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">5,0</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">85</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr><td class="px-4 py-2.5">Fani</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">6,0</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">88</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr><td class="px-4 py-2.5">Gilang</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">7,0</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">95</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">Pola Linear Positif</td></tr>
                                <tr class="bg-rose-50/50"><td class="px-4 py-2.5 font-bold text-rose-700">Hana</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-bold text-rose-700">2,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-bold text-rose-700">40</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] text-rose-700 font-bold">Outlier (Pencilan Ekstrem)</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-[#fafafc] border-t border-[#e0e0e0] text-xs text-[#333333] space-y-1">
                        <p><strong>Analisis Visual:</strong></p>
                        <p>• Majoritas titik bergerak naik dari kiri bawah ke kanan atas (Korelasi Positif Linear Kuat).</p>
                        <p>• Titik Hana (2,5 jam, nilai 40) berada di luar jalur rapat kelompok data lainnya sehingga teridentifikasi sebagai <strong>Outlier</strong>.</p>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Studi Kasus Terbimbing -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Studi Kasus Terbimbing: Penggunaan Media Sosial vs Nilai Rapor
                </h3>

                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0] text-xs space-y-2">
                        <h5 class="text-sm font-bold text-[#1d1d1f]">Skenario Studi Kasus Guru BK</h5>
                        <p>Pendataan 10 siswa kelas XI mengenai Waktu Media Sosial (Jam/Hari) vs Nilai Rata-rata Rapor:</p>
                        <p>• Adit (1.0j, 92), Bima (1.5j, 88), Citra (2.0j, 85), Dina (3.0j, 80), Eko (4.0j, 76), Fani (5.0j, 72), Gilang (6.0j, 68), Hana (7.0j, 62), Indah (8.0j, 58), dan <strong>Joko (8.5j, 90)</strong>.</p>
                    </div>

                    <div class="space-y-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 1: Mengidentifikasi Variabel Independen & Dependen</strong>
                            <p class="mb-2">Identifikasilah variabel mana yang bertindak sebagai Variabel X dan Y serta berikan alasan peletakkannya!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Sumbu X (Variabel Independen):</strong> Waktu Penggunaan Media Sosial (Jam/Hari), bertindak sebagai variabel bebas yang memengaruhi.</p>
                                <p>• <strong>Sumbu Y (Variabel Dependen):</strong> Nilai Rata-rata Rapor Siswa, bertindak sebagai variabel terikat/respon yang diukur.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 2: Menganalisis Pola Korelasi</strong>
                            <p class="mb-2">Analisislah pola korelasi dari Adit hingga Indah pada grafik di atas dan jelaskan makna praktisnya!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Pola Korelasi:</strong> Korelasi Negatif Linear Kuat (titik rapat turun dari kiri atas ke kanan bawah).</p>
                                <p>• <strong>Makna Praktis:</strong> Semakin lama durasi penggunaan media sosial per hari, semakin rendah nilai rata-rata rapor siswa tersebut.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 3: Evaluasi Outlier, Garis Tren, & Causation</strong>
                            <p class="mb-2">Evaluasilah titik Joko (8.5 jam, Nilai 90)! Apakah ini outlier, dampaknya ke garis tren, dan apakah terbukti kausalitas?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Evaluasi Outlier:</strong> Ya, Joko adalah Outlier karena nilainya sangat tinggi (90) meskipun durasi media sosialnya lama (8.5 jam).</p>
                                <p>• <strong>Dampak garis tren:</strong> Kehadiran Joko akan menarik garis <em>best-fit</em> menjadi kurang curam (memperlemah korelasi negatif secara palsu).</p>
                                <p>• <strong>Kausalitas:</strong> Grafik <strong>TIDAK BISA</strong> membuktikan media sosial sebagai penyebab tunggal (Correlation ≠ Causation). Penurunan nilai bisa dipicu faktor lain seperti manajemen waktu atau metode belajar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 4 (Bab 2)
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Scatter Plot:</strong> Menampilkan pasangan data bivariat numerik (X, Y) sebagai titik koordinat untuk melihat pola hubungan.</li>
                    <li>• <strong>Komponen Sumbu:</strong> Sumbu X = Variabel Independen/Bebas, Sumbu Y = Variabel Dependen/Terikat.</li>
                    <li>• <strong>Pola Korelasi:</strong> Positif (X naik, Y naik), Negatif (X naik, Y turun), dan Tidak Ada Korelasi (titik tersebar acak).</li>
                    <li>• <strong>Line of Best Fit & Outlier:</strong> Garis regresi linear untuk prediksi; titik outlier harus dievaluasi karena dapat mendistorsi kemiringan garis.</li>
                    <li>• <strong>Prinsip Utama:</strong> Korelasi tidak sama dengan Kausalitas (Correlation ≠ Causation).</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Seorang peneliti ingin membuat Diagram Sebar untuk memprediksi tingkat konsumsi bahan bakar kendaraan berdasarkan jarak tempuh perjalanan. Peletakan komponen sumbu koordinat yang benar sesuai kaidah penyajian data bivariat adalah...."
                    data-opt-a="Jarak tempuh diletakkan pada Sumbu Y sebagai variabel independen, dan konsumsi bahan bakar diletakkan pada Sumbu X sebagai variabel dependen."
                    data-opt-b="Jarak tempuh diletakkan pada Sumbu X sebagai variabel independen (predictor), dan konsumsi bahan bakar diletakkan pada Sumbu Y sebagai variabel dependen (response)."
                    data-opt-c="Kedua variabel diletakkan bersamaan pada Sumbu X tanpa menggunakan Sumbu Y."
                    data-opt-d="Konsumsi bahan bakar diletakkan pada Sumbu X sebagai variabel bebas, dan jarak tempuh pada Sumbu Y sebagai variabel terikat."
                    data-opt-e="Sumbu X dan Sumbu Y hanya boleh memuat variabel kategorikal nominal."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Perhatikan komponen-komponen Scatter Plot berikut: (1) Sumbu Horizontal (Sumbu X) memuat variabel bebas, (2) Sumbu Vertikal (Sumbu Y) memuat variabel terikat, (3) Setiap titik mewakili pasangan koordinat (x, y), (4) Garis Best-fit wajib melewati seluruh titik data tanpa terkecuali. Pernyataan yang BENAR mengenai anatomi Diagram Sebar ditunjukkan oleh nomor...."
                    data-opt-a="1, 2, dan 3"
                    data-opt-b="1 dan 3 saja"
                    data-opt-c="2 dan 4 saja"
                    data-opt-d="4 saja"
                    data-opt-e="1, 2, 3, dan 4"
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah riset menunjukkan bahwa semakin tinggi suhu udara harian (dalam °C), maka jumlah penjualan es krim di sebuah taman rekreasi juga semakin meningkat secara signifikan dengan sebaran titik-titik data mengumpul rapat membentuk pola garis lurus menaik. Analisis pola korelasi yang paling tepat untuk fenomena tersebut adalah...."
                    data-opt-a="Korelasi Negatif Kuat"
                    data-opt-b="Korelasi Positif Kuat Linear"
                    data-opt-c="Tidak Ada Korelasi"
                    data-opt-d="Korelasi Kurva Non-Linear Negatif"
                    data-opt-e="Korelasi Sempurna Bernilai r = -1,0"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Di dalam sebuah Scatter Plot yang menunjukkan hubungan antara tingkat ketidakhadiran siswa dengan nilai ujian, terdapat satu titik data siswa yang berada sangat jauh di atas garis tren umum (memiliki nilai ujian sangat tinggi meskipun tingkat ketidakhadirannya sangat tinggi). Evaluasi tindakan dan interpretasi terbaik terhadap titik data tersebut adalah...."
                    data-opt-a="Membuat titik data tersebut dibuang secara langsung tanpa dicatat dalam laporan."
                    data-opt-b="Mengidentifikasi titik tersebut sebagai outlier dan menganalisis alasannya secara khusus, karena outlier dapat memengaruhi keakuratan kemiringan garis best-fit."
                    data-opt-c="Mengubah seluruh skala sumbu X agar titik tersebut sejajar dengan titik lainnya."
                    data-opt-d="Menyimpulkan bahwa membolos sekolah secara otomatis meningkatkan nilai ujian seluruh siswa."
                    data-opt-e="Memindahkan titik data tersebut ke titik asal koordinat (0,0)."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dua variabel numerik (Jumlah Penjualan Sepatu Lari dan Jumlah Penjualan Es Krim di suatu kota) memiliki nilai koefisien korelasi positif yang sangat tinggi (r = 0,89). Seorang analis menyimpulkan bahwa 'Pembelian sepatu lari secara langsung menyebabkan masyarakat menjadi haus dan membeli es krim.' Evaluasi kritis yang paling tepat terhadap kesimpulan analis tersebut adalah...."
                    data-opt-a="Kesimpulan analis sangat tepat karena nilai r = 0,89 sudah membuktikan hubungan sebab-akibat secara mutlak."
                    data-opt-b="Kesimpulan analis keliru karena korelasi tinggi tidak otomatis menyiratkan hubungan sebab-akibat (Correlation ≠ Causation); kenaikan kedua penjualan kemungkinan besar dipengaruhi oleh variabel ketiga (seperti cuaca cerah di musim panas)."
                    data-opt-c="Kesimpulan analis salah karena nilai r = 0,89 menandakan tidak ada korelasi antar variabel."
                    data-opt-d="Kesimpulan analis tepat karena data penjualan merupakan data bivariat kategorikal."
                    data-opt-e="Kesimpulan analis salah karena korelasi hanya berlaku untuk data deret waktu (time-series)."
                    data-answer="B">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'diagram-sebar'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Diagram Sebar (Scatter Plot)',
                'type' => 'text',
                'sequence' => 4,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 2 Sub 4: Diagram Sebar (Scatter Plot) berhasil diperbarui!');
    }
}