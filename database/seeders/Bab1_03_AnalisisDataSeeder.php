<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_03_AnalisisDataSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 1)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 1 belum dibuat! Pastikan ChapterSeeder / MateriBab1Seeder sudah dijalankan.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::where('slug', 'analisis-data-deskriptif')->delete();
        Material::where('slug', 'analisis-data')->delete();

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
                        <p class="leading-relaxed">Menjelaskan konsep analisis data deskriptif dan komponen ukuran pemusatan data (central tendency).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Membandingkan penggunaan ukuran pemusatan dan ukuran penyebaran data (variability/dispersion).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Menarik kesimpulan dan wawasan (insights) yang objektif berdasarkan hasil analisis data.</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Analisis Data Deskriptif & Ukuran Pemusatan Data -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Analisis Data Deskriptif & Ukuran Pemusatan Data
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi Analisis Data Deskriptif</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Statistika Deskriptif atau Analisis Data Deskriptif adalah metode analisis statistik yang bertujuan untuk mengumpulkan, mengolah, merangkum, dan menyajikan karakteristik utama dari suatu kumpulan data mentah secara sistematis tanpa bertujuan untuk menarik kesimpulan generalisasi atau inferensi terhadap populasi yang lebih luas.
                        </p>
                        <p class="text-[#333333] leading-relaxed">
                            Melalui analisis deskriptif, kumpulan angka mentah yang banyak dan rumit dirangkum menjadi nilai-nilai statistik ringkas (seperti rata-rata, nilai tengah, nilai terbanyak, dan jangkauan penyebaran) serta ditampilkan dalam bentuk tabel atau grafik agar mudah dipahami oleh pengambil keputusan.
                        </p>
                    </div>

                    <!-- Sub 1.2: Komponen Ukuran Pemusatan Data -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Komponen Ukuran Pemusatan Data (Central Tendency)</h4>
                        <p class="text-[#333333] leading-relaxed mb-6">
                            Ukuran pemusatan data adalah nilai tunggal yang mewakili titik pusat atau kecenderungan memusat dari sekelompok data. Nilai ini memberikan gambaran tentang nilai tipikal atau umum dari distribusi data tersebut.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Mean -->
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Komponen 1</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-2">Mean (Rata-rata Hitung)</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed mb-3">
                                        Nilai rata-rata aritmatika dari sekumpulan data kuantitatif yang diperoleh dengan cara menjumlahkan seluruh nilai data kemudian membaginya dengan banyaknya nilai data.
                                    </p>
                                    <div class="bg-[#f5f5f7] p-3 rounded-lg border border-[#e0e0e0] text-center my-3">
                                        <span class="font-mono text-sm font-bold text-[#0066cc]">\bar{x} = \frac{\sum x}{n}</span>
                                        <p class="text-[11px] text-slate-500 mt-1">Keterangan: \bar{x} = Mean, \sum x = Jumlah nilai, n = Banyak data</p>
                                    </div>
                                </div>
                                <div class="space-y-2 text-xs border-t border-[#e0e0e0] pt-3 mt-2">
                                    <p><strong class="text-emerald-700">Kelebihan:</strong> Memperhitungkan seluruh nilai data secara rinci.</p>
                                    <p><strong class="text-red-700">Kelemahan:</strong> Sangat sensitif dan mudah terdistorsi oleh nilai ekstrem (outlier).</p>
                                </div>
                            </div>

                            <!-- Median -->
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Komponen 2</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-2">Median (Nilai Tengah)</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed mb-3">
                                        Nilai data yang berada tepat di tengah-tengah kumpulan data yang telah diurutkan (<em>sorted</em>) dari nilai terkecil hingga terbesar.
                                    </p>
                                    <div class="bg-[#f5f5f7] p-3 rounded-lg border border-[#e0e0e0] text-center my-3">
                                        <span class="font-semibold text-xs text-[#1d1d1f]">Membagi Data: 50% Bawah | 50% Atas</span>
                                    </div>
                                </div>
                                <div class="space-y-2 text-xs border-t border-[#e0e0e0] pt-3 mt-2">
                                    <p><strong class="text-emerald-700">Karakteristik Utama:</strong> Resistan (robust) atau tidak sensitif terhadap nilai pencilan (outlier).</p>
                                </div>
                            </div>

                            <!-- Modus -->
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Komponen 3</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-2">Modus (Sering Muncul)</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed mb-3">
                                        Nilai datum atau kategori yang muncul dengan frekuensi terbesar dalam kumpulan data.
                                    </p>
                                    <div class="bg-[#f5f5f7] p-3 rounded-lg border border-[#e0e0e0] text-center my-3">
                                        <span class="font-semibold text-xs text-[#1d1d1f]">Frekuensi Terbanyak</span>
                                    </div>
                                </div>
                                <div class="space-y-2 text-xs border-t border-[#e0e0e0] pt-3 mt-2">
                                    <p><strong class="text-emerald-700">Keunggulan:</strong> Satu-satunya ukuran pemusatan untuk data kualitatif/kategorikal (nominal).</p>
                                    <p><strong class="text-slate-600">Variasi:</strong> Unimodal (1), Bimodal (2), Multimodal (>2), atau tanpa modus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Membandingkan Ukuran Pemusatan & Penyebaran Data -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Membandingkan Ukuran Pemusatan & Penyebaran Data (Variability)
                </h3>

                <div class="space-y-8">
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">2.1 Konsep Ukuran Penyebaran Data (Variability / Dispersion)</h4>
                        <p class="text-[#333333] leading-relaxed mb-6">
                            Dua kelompok data dapat memiliki nilai rata-rata (mean) yang persis sama, namun tingkat keragaman datanya bisa sangat jauh berbeda. Oleh karena itu, kita memerlukan Ukuran Penyebaran Data untuk mengukur seberapa jauh nilai-nilai data menyebar atau menyimpang dari titik pusatnya.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Range -->
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Metode 1</span>
                                <h5 class="text-lg font-bold text-[#1d1d1f] my-2">Jangkauan / Range (R)</h5>
                                <p class="text-xs text-[#333333] leading-relaxed mb-3">
                                    Ukuran variasi paling sederhana yang dihitung dari selisih antara nilai data maksimum (x<sub>maks</sub>) dan nilai data minimum (x<sub>min</sub>).
                                </p>
                                <div class="bg-white p-3 rounded-lg border border-[#e0e0e0] text-center mb-3">
                                    <span class="font-mono text-sm font-bold text-[#0066cc]">R = x<sub>maks</sub> - x<sub>min</sub></span>
                                </div>
                                <p class="text-xs text-slate-600">
                                    <strong>Karakteristik:</strong> Mudah dan cepat dihitung, namun hanya memperhitungkan dua nilai ekstrem dan mengabaikan variasi di antaranya.
                                </p>
                            </div>

                            <!-- IQR -->
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Metode 2</span>
                                <h5 class="text-lg font-bold text-[#1d1d1f] my-2">Kuartil & Jangkauan Interkuartil (IQR)</h5>
                                <p class="text-xs text-[#333333] leading-relaxed mb-2">
                                    <strong>Kuartil (Q<sub>1</sub>, Q<sub>2</sub>, Q<sub>3</sub>):</strong> Membagi data terurut menjadi 4 bagian sama besar (25% tiap bagian). Q<sub>1</sub> = Kuartil Bawah, Q<sub>2</sub> = Median, Q<sub>3</sub> = Kuartil Atas.
                                </p>
                                <div class="bg-white p-3 rounded-lg border border-[#e0e0e0] text-center mb-3">
                                    <span class="font-mono text-sm font-bold text-[#0066cc]">IQR = Q<sub>3</sub> - Q<sub>1</sub></span>
                                </div>
                                <p class="text-xs text-slate-600">
                                    <strong>Karakteristik Utama:</strong> Mengukur penyebaran 50% data tengah. IQR sangat stabil dan tahan terhadap nilai pencilan (outlier) ekstrem.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Kapan Menggunakan Mean vs Median -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">2.2 Kapan Menggunakan Mean vs Median vs Modus?</h4>
                        <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-[#1d1d1f]">
                                    <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                        <tr>
                                            <th class="px-4 py-3 font-semibold w-1/3">Kondisi Dataset</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-1/4">Ukuran Pemusatan Terbaik</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-5/12">Alasan / Pertimbangan Utama</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#e0e0e0]">
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Data Simetris & Normal (Tanpa Outlier)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0] font-bold text-[#0066cc]">Mean (Rata-rata)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Memperhitungkan seluruh nilai datum secara akurat karena tidak ada angka ekstrem yang mengganggu.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Data Miring / Skewed (Ada Outlier Ekstrem)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0] font-bold text-emerald-700">Median (Nilai Tengah)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Resistan (robust) terhadap angka ekstrem; tidak akan terdistorsi oleh satu atau dua nilai yang sangat tinggi/rendah.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Data Kategorikal / Nominal (Kata/Label)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0] font-bold text-purple-700">Modus (Sering Muncul)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Menunjukkan kategori yang paling mendominasi (satu-satunya pilihan untuk data kualitatif non-angka).</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Menarik Kesimpulan & Wawasan (Insights) -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Menarik Kesimpulan & Wawasan (Insights) dari Hasil Analisis
                </h3>
                <p class="text-[#333333] leading-relaxed mb-6">
                    Proses analisis data tidak berhenti pada angka statistik saja. Tujuan utamanya adalah menerjemahkan angka ringkasan menjadi Wawasan (Insight) dan Keputusan/Tindakan Nyata.
                </p>

                <!-- Alur Analisis -->
                <div class="bg-[#f5f5f7] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8">
                    <p class="text-xs font-bold text-[#1d1d1f] tracking-wide">
                        Data Mentah &rarr; Pengolahan & Agregasi &rarr; Angka Statistik &rarr; Wawasan (Insight) &rarr; Aksi / Keputusan
                    </p>
                </div>

                <!-- Studi Kasus Nyata Sekolah -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div>
                        <h4 class="text-lg font-bold text-[#1d1d1f] mb-1">Studi Kasus Nyata di Sekolah: Analisis Nilai Ulangan Matematika</h4>
                        <p class="text-xs text-slate-600">
                            Dataset Nilai Ujian 10 Siswa Kelas XI-A: <strong>40, 45, 80, 82, 85, 85, 88, 90, 92, 95</strong> (KKM Sekolah = 75).
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Step 1 -->
                        <div class="bg-[#fafafc] p-4 rounded-lg border border-[#e0e0e0]">
                            <span class="text-[11px] font-bold text-[#0066cc] uppercase">Langkah 1</span>
                            <h5 class="text-sm font-bold text-[#1d1d1f] my-1">Perhitungan Statistik Deskriptif</h5>
                            <ul class="text-xs text-[#333333] space-y-1">
                                <li>• <strong>Mean (\bar{x}):</strong> 78,2</li>
                                <li>• <strong>Median (Q<sub>2</sub>):</strong> 85</li>
                                <li>• <strong>Modus:</strong> 85 (muncul 2x)</li>
                                <li>• <strong>Range (R):</strong> 95 - 40 = 55</li>
                                <li>• <strong>IQR:</strong> Q<sub>3</sub> (90) - Q<sub>1</sub> (80) = 10</li>
                            </ul>
                        </div>

                        <!-- Step 2 -->
                        <div class="bg-[#fafafc] p-4 rounded-lg border border-[#e0e0e0]">
                            <span class="text-[11px] font-bold text-[#0066cc] uppercase">Langkah 2</span>
                            <h5 class="text-sm font-bold text-[#1d1d1f] my-1">Penafsiran & Wawasan (Insight)</h5>
                            <ul class="text-xs text-[#333333] space-y-1.5 leading-relaxed">
                                <li>• Rata-rata (78,2) di atas KKM (75) memberi kesan kelas baik-baik saja.</li>
                                <li>• Namun, Mean (78,2) jauh di bawah Median (85) menunjukkan sebaran miring ke kiri akibat outlier nilai 40 dan 45.</li>
                                <li>• Faktanya, 80% siswa memiliki nilai mengelompok rapat di rentang 80–95.</li>
                            </ul>
                        </div>

                        <!-- Step 3 -->
                        <div class="bg-[#fafafc] p-4 rounded-lg border border-[#e0e0e0]">
                            <span class="text-[11px] font-bold text-[#0066cc] uppercase">Langkah 3</span>
                            <h5 class="text-sm font-bold text-[#1d1d1f] my-1">Keputusan & Rekomendasi Kebijakan</h5>
                            <ul class="text-xs text-[#333333] space-y-1.5 leading-relaxed">
                                <li>• <strong>Bukan Remedial Klasikal:</strong> Seluruh kelas tidak perlu diulang karena 80% siswa sudah sangat paham.</li>
                                <li>• <strong>Intervensi Khusus:</strong> Bimbingan personal diberikan khusus kepada 2 siswa yang mendapat nilai 40 dan 45.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas Sub-Bab 3 -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 3
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Analisis Data Deskriptif:</strong> Metode merangkum dan menggambarkan karakteristik data mentah tanpa melakukan generalisasi populasi luas.</li>
                    <li>• <strong>Ukuran Pemusatan Data (Central Tendency):</strong> Mean (rata-rata, sensitif outlier), Median (nilai tengah, tahan outlier), Modus (sering muncul, untuk kategorikal).</li>
                    <li>• <strong>Ukuran Penyebaran Data (Dispersion):</strong> Range (selisih maks-min) dan IQR (Q<sub>3</sub> - Q<sub>1</sub>, mengukur 50% data tengah, tahan outlier).</li>
                    <li>• <strong>Pemilihan Ukuran:</strong> Gunakan Mean untuk data simetris/normal, Median untuk data miring/outlier, dan Modus untuk data kategorikal.</li>
                    <li>• <strong>Penerjemahan Data:</strong> Angka statistik harus diterjemahkan menjadi wawasan (insight) dan aksi nyata, bukan sekadar kalkulasi angka.</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Hasil rekapitulasi ukuran sepatu 10 pemain tim basket sekolah adalah sebagai berikut: 39, 40, 40, 41, 41, 41, 42, 42, 43, 44. Pihak sekolah ingin memesan sepatu seragam dan perlu mengetahui ukuran yang paling banyak dibutuhkan oleh pemain. Ukuran pemusatan data yang paling tepat digunakan adalah...."
                    data-opt-a="Mean"
                    data-opt-b="Median"
                    data-opt-c="Modus"
                    data-opt-d="Range"
                    data-opt-e="Jangkauan Interkuartil (IQR)"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Perhatikan nilai ujian tes logika dari 7 siswa berikut: 60, 65, 70, 72, 75, 78, 98. Jika nilai 98 dikategorikan sebagai pencilan (outlier), manakah pernyataan yang paling tepat mengenai hubungan antara nilai Mean dan Median pada dataset tersebut?"
                    data-opt-a="Nilai Mean dan Median akan bernilai persis sama."
                    data-opt-b="Nilai Mean terdorong naik lebih tinggi daripada nilai Median karena sensitif terhadap pencilan 98."
                    data-opt-c="Nilai Median menjadi tidak dapat dihitung karena ada pencilan."
                    data-opt-d="Nilai Mean lebih kecil daripada nilai Median."
                    data-opt-e="Nilai Modus otomatis bernilai sama dengan pencilan 98."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Diberikan sekumpulan data nilai simulasi coding terurut sebagai berikut: 50, 60, 65, 70, 75, 80, 85, 90, 95. Nilai Kuartil Bawah (Q1), Kuartil Atas (Q3), dan Jangkauan Interkuartil (IQR) dari data tersebut berturut-turut adalah...."
                    data-opt-a="Q1 = 62,5; Q3 = 87,5; IQR = 25"
                    data-opt-b="Q1 = 60; Q3 = 90; IQR = 30"
                    data-opt-c="Q1 = 65; Q3 = 85; IQR = 20"
                    data-opt-d="Q1 = 50; Q3 = 95; IQR = 45"
                    data-opt-e="Q1 = 70; Q3 = 70; IQR = 0"
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah perusahaan startup teknologi mendata gaji 10 karyawannya. Sembilan staf memiliki gaji di rentang Rp 4 juta – Rp 6 juta, sedangkan 1 orang Direktur Utama memiliki gaji Rp 150 juta. Jika perusahaan ingin menyajikan gambaran umum gaji karyawan yang paling representative dan jujur kepada calon pelamar, ukuran statistik yang sebaiknya digunakan adalah...."
                    data-opt-a="Mean, karena mencerminkan total keseluruhan anggaran gaji perusahaan."
                    data-opt-b="Range, karena memperlihatkan selisih gaji tertinggi dan terendah."
                    data-opt-c="Median, karena tidak terdistorsi oleh pencilan gaji ekstrem milik Direktur Utama."
                    data-opt-d="Modus, karena semua staf harus memiliki nilai gaji yang sama persis."
                    data-opt-e="Standard Deviasi Maksimum."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Guru Informatika menganalisis data kehadiran dan nilai akhir 35 siswa. Ditemukan bahwa nilai rata-rata kelas adalah 82 (Median = 84). Namun, 3 siswa memiliki angka ketidakhadiran lebih dari 40% dan nilai mereka di bawah 50. Wawasan (insight) dan keputusan pedagogis yang paling tepat berdasarkan data tersebut adalah...."
                    data-opt-a="Mengulang seluruh materi pembelajaran dari Bab 1 untuk seluruh 35 siswa."
                    data-opt-b="Menurunkan nilai KKM sekolah agar 3 siswa tersebut dapat lulus secara otomatis."
                    data-opt-c="Performa kelas secara umum sudah sangat baik; masalah utama berada pada keterikatan (engagement) 3 siswa tertentu sehingga diperlukan konseling dan bimbingan kehadiran intensif."
                    data-opt-d="Menghapus data 3 siswa tersebut dari database agar nilai rata-rata kelas meningkat menjadi sempurna."
                    data-opt-e="Mengubah semua nilai siswa menjadi data kategorikal nominal tanpa analisis lanjutan."
                    data-answer="C">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'analisis-data-deskriptif'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Analisis Data Deskriptif',
                'type' => 'text',
                'sequence' => 3,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 1 Sub 3: Analisis Data Deskriptif berhasil diperbarui!');
    }
}