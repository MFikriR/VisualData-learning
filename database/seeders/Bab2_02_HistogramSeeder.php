<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_02_HistogramSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 2 belum dibuat! Pastikan ChapterSeeder sudah dikonfigurasi untuk Bab 2.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::where('slug', 'histogram')->delete();

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
                        <p class="leading-relaxed">Membedakan karakteristik Histogram dan Diagram Batang berdasarkan jenis data serta struktur komponennya.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menganalisis pembentukan interval kelas (binning) pada distribusi data numerik kontinu.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Mengevaluasi bentuk-bentuk distribusi data berdasarkan tampilan visual Histogram.</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Dasar & Perbedaan Histogram vs Diagram Batang -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Dasar & Perbedaan Histogram vs Diagram Batang
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi dan Fungsi Utama -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi Histogram dan Fungsi Utamanya</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Histogram adalah bentuk grafik visualisasi data berupa persegi panjang (batang) berkesinambungan yang saling berimpit tanpa celah/gap, digunakan untuk menggambarkan distribusi frekuensi dari kumpulan data numerik kontinu yang telah dikelompokkan ke dalam interval-interval kelas (<em>bins</em>).
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-base mb-2">1. Menampilkan Distribusi dan Sebaran Data</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">
                                    Menggambarkan bagaimana data kuantitatif tersebar di sepanjang rentang nilainya (apakah mengumpul di tengah, miring ke salah satu sisi, atau memiliki beberapa puncak).
                                </p>
                            </div>
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-base mb-2">2. Mendeteksi Pola, Tren, dan Outlier</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">
                                    Membantu mengidentifikasi pemusatan data, variabilitas, serta keberadaan nilai pencilan (<em>outlier</em>) ekstrem yang berada jauh di luar pola mayoritas data.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.2: Jenis Data -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Jenis Data yang Sesuai</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Histogram dirancang khusus untuk menyajikan <strong>Data Numerikal Kontinu</strong> (skala interval dan rasio) yang dikelompokkan dalam rentang angka tertentu (<em>bins/classes</em>).
                        </p>
                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm text-xs text-[#333333]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-2">• Contoh Data Kontinu:</strong>
                            <ul class="list-disc list-inside space-y-1 pl-2">
                                <li>Nilai hasil ujian siswa (skala 0–100).</li>
                                <li>Tinggi badan siswa (cm) atau berat badan (kg).</li>
                                <li>Waktu tempuh perjalanan menuju sekolah (menit).</li>
                                <li>Suhu udara harian (°C) atau kadar hemoglobin.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sub 1.3: Perbedaan Histogram vs Bar Chart -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Perbedaan Mendasar: Histogram vs Diagram Batang</h4>
                        <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-[#1d1d1f]">
                                    <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                        <tr>
                                            <th class="px-4 py-3 font-semibold w-1/4">Parameter</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Histogram</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Diagram Batang (Bar Chart)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#e0e0e0]">
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Jenis Data (Sumbu X)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Data Numerik Kontinu (dibagi ke interval/bins).</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Data Kategorikal (Nominal / Ordinal) berupa label kualitatif.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Jarak Antar Batang (Gap)</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Batang saling berimpit (tanpa celah/gap) karena data bersambung.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Memiliki celah/gap pemisah karena tiap kategori terpisah.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Lebar & Luas Batang</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Lebar mewakili panjang interval kelas. Luas area sebanding dengan total data.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Lebar selalu sama/seragam hanya sebagai penampung visual label.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Fungsi Utama</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Memahami pola distribusi frekuensi dan bentuk sebaran data.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Membandingkan besaran nilai atau frekuensi antar kategori.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.4: Anatomi Utama Histogram -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.4 Anatomi Utama Histogram</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. Judul Grafik (Chart Title)</strong>
                                Menerangkan topik atau variabel kontinu yang divisualisasikan.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. Sumbu X (Bins / Interval)</strong>
                                Memuat batas-batas interval kelas angka kontinu atau tepi kelas.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. Sumbu Y (Frekuensi)</strong>
                                Menyatakan banyaknya pencatatan datum (f) pada tiap interval.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">4. Batang Berimpit</strong>
                                Persegi panjang sejajar yang batangnya menempel tanpa celah.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0] md:col-span-2">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">5. Lebar Batang (Bin Width / Panjang Kelas)</strong>
                                Jarak antara tepi bawah dan tepi atas dari suatu interval kelas.
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.5: Pembentukan Interval Kelas (Binning) -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.5 Pembentukan Interval Kelas (Binning)</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            <em>Binning</em> adalah proses membagi rentang seluruh nilai data numerik kontinu menjadi beberapa selang/interval kelas yang saling berdampingan dan tidak tumpang tindih.
                        </p>
                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm space-y-4 text-xs text-[#333333]">
                            <div>
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. Menentukan Jangkauan (R):</strong>
                                <p>R = x<sub>maks</sub> - x<sub>min</sub></p>
                            </div>
                            <div>
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. Menentukan Banyak Kelas (K) - Aturan Sturges:</strong>
                                <p class="font-mono text-[#0066cc] font-bold text-sm">K = 1 + 3,322 \log_{10}(N)</p>
                                <p class="text-slate-500 mt-0.5">(Keterangan: N = total banyaknya data)</p>
                            </div>
                            <div>
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. Menentukan Lebar Interval Kelas / Bin Width (i):</strong>
                                <p>i = Range (R) / Banyak Kelas (K)</p>
                            </div>
                            <div>
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">4. Menentukan Tepi Kelas (Class Boundaries):</strong>
                                <p>• Tepi Bawah = Batas Bawah - 0,5 (untuk data bulat)</p>
                                <p>• Tepi Atas = Batas Atas + 0,5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.6: Bentuk-Bentuk Distribusi Histogram -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.6 Bentuk-Bentuk Distribusi Histogram</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">1. Simetris / Kurva Lonceng (Normal)</h5>
                                <p class="text-xs text-[#333333] mb-2">Batang tertinggi di tengah, menyebar seimbang ke kiri dan kanan.</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Nilai: Mean ≈ Median ≈ Modus (berhimpit)</span>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">2. Miring Kanan (Right-Skewed / Positively Skewed)</h5>
                                <p class="text-xs text-[#333333] mb-2">Data mengumpul di kiri (nilai rendah), ekor memanjang ke kanan (nilai tinggi).</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Nilai: Modus < Median < Mean</span>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">3. Miring Kiri (Left-Skewed / Negatively Skewed)</h5>
                                <p class="text-xs text-[#333333] mb-2">Data mengumpul di kanan (nilai tinggi), ekor memanjang ke kiri (nilai rendah).</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Nilai: Mean < Median < Modus</span>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-1">4. Dua Puncak (Bimodal Distribution)</h5>
                                <p class="text-xs text-[#333333] mb-2">Memiliki dua puncak tinggi yang terpisah oleh lembah.</p>
                                <span class="text-xs font-semibold text-[#0066cc] bg-white p-2 rounded border border-[#e0e0e0] block">Makna: Terdapat 2 subpopulasi berbeda dalam dataset.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Contoh Tabel Distribusi Frekuensi & Struktur Data -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Contoh Tabel Distribusi Frekuensi
                </h3>

                <p class="text-[#333333] leading-relaxed mb-6">
                    Berikut adalah data hasil pengelompokan nilai ujian akhir Matematika dari 50 siswa kelas XI yang telah dibentuk ke dalam interval Bins (lebar kelas = 10):
                </p>

                <!-- Tabel Distribusi Frekuensi -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm mb-6">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.1: Distribusi Frekuensi Nilai Ujian Matematika (50 Siswa)</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Interval Bins</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Tepi Bawah</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Tepi Atas</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Frekuensi Siswa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr><td class="px-4 py-2.5">51 – 60</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">50,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">60,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">3</td></tr>
                                <tr><td class="px-4 py-2.5">61 – 70</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">60,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">70,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">8</td></tr>
                                <tr class="bg-blue-50/50 font-medium"><td class="px-4 py-2.5">71 – 80</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">70,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">80,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0] font-bold text-[#0066cc]">22 (Puncak)</td></tr>
                                <tr><td class="px-4 py-2.5">81 – 90</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">80,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">90,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">12</td></tr>
                                <tr><td class="px-4 py-2.5">91 – 100</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">90,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">100,5</td><td class="px-4 py-2.5 border-l border-[#e0e0e0]">5</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-[#fafafc] border-t border-[#e0e0e0] text-xs text-[#333333]">
                        <strong>Analisis Visual:</strong> Grafik menunjukkan bentuk Simetris / Kurva Lonceng (Normal) di mana puncak data berada di interval 71–80 (22 siswa), dan frekuensi meluruh secara seimbang ke arah kiri (51–60) dan kanan (91–100).
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Studi Kasus Terbimbing & Diskusi Reflektif -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Studi Kasus Terbimbing & Diskusi Reflektif
                </h3>

                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0]">
                        <h5 class="text-sm font-bold text-[#1d1d1f] mb-1">Skenario Waktu Tempuh Lari 1.000 Meter</h5>
                        <p class="text-xs text-slate-600">
                            Pengukuran waktu tempuh lari 1.000m (60 siswa kelas X): 4.0–4.9 menit (25 siswa), 5.0–5.9 menit (18 siswa), 6.0–6.9 menit (12 siswa), dan 7.0–7.9 menit (5 siswa).
                        </p>
                    </div>

                    <div class="space-y-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 1: Menganalisis Bentuk Distribusi & Kemiringan</strong>
                            <p class="mb-2">Berdasarkan data di atas, tentukan bentuk distribusi datanya dan jelaskan makna fisisnya!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700">
                                <strong>Pembahasan:</strong> Distribusi berbentuk <strong>Miring Kanan (Right-Skewed)</strong>. Puncak frekuensi berada di sebelah kiri (interval cepat 4.0–4.9 menit = 25 siswa), sedangkan ekor grafik memanjang ke kanan (7.0–7.9 menit). Ini menunjukkan mayoritas siswa memiliki kebugaran fisik yang baik (lari cepat).
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 2: Membandingkan Posisi Mean, Median, dan Modus</strong>
                            <p class="mb-2">Bagaimanakah urutan posisi antara nilai Mean, Median, dan Modus pada grafik di atas?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700">
                                <strong>Pembahasan:</strong> Urutan posisinya adalah <strong>Modus < Median < Mean</strong>. Nilai Mean (rata-rata) tertarik ke kanan (menjadi paling besar) karena sangat sensitif terhadap nilai siswa yang larinya sangat lambat (7.0–7.9 menit sebagai outlier).
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 3: Pembedaan Histogram vs Diagram Batang</strong>
                            <p class="mb-2">Mengapa data waktu tempuh lari disajikan menggunakan Histogram dengan batang berimpit?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700">
                                <strong>Pembahasan:</strong> Karena waktu tempuh adalah variabel <strong>numerik kontinu</strong> (angka mengalir berkesinambungan). Batang berimpit tanpa celah menandakan kontinuitas antar-interval kelas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 2 (Bab 2)
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Histogram:</strong> Digunakan khusus untuk data numerik kontinu, batangnya saling berimpit tanpa celah (gap).</li>
                    <li>• <strong>Aturan Sturges (Binning):</strong> K = 1 + 3,322 \log_{10}(N) untuk menentukan jumlah interval kelas ideal.</li>
                    <li>• <strong>Bentuk Distribusi:</strong> Simetris (Mean ≈ Median ≈ Modus), Miring Kanan (Modus < Median < Mean), Miring Kiri (Mean < Median < Modus), Bimodal (2 puncak / 2 subpopulasi).</li>
                    <li>• <strong>Beda dengan Bar Chart:</strong> Bar Chart untuk data kategorikal terpisah (bercelah), sedangkan Histogram untuk data kontinu berurutan (berimpit).</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Seorang siswa menyusun laporan analisis data tinggi badan siswa kelas X. Saat membuat grafik, ia bingung menentukan apakah akan menggunakan Histogram atau Diagram Batang (Bar Chart). Alasan metodologis yang paling tepat untuk memilih Histogram adalah...."
                    data-opt-a="Karena tinggi badan merupakan data kategorikal nominal yang membutuhkan batang berwarna-warni."
                    data-opt-b="Karena tinggi badan merupakan data numerik kontinu yang dikelompokkan dalam interval angka, sehingga batangnya harus dibuat berimpit tanpa celah/gap."
                    data-opt-c="Karena diagram batang hanya boleh digunakan jika jumlah data kurang dari 10."
                    data-opt-d="Karena histogram selalu menghasilkan grafik berbentuk lingkaran persentase."
                    data-opt-e="Karena histogram tidak memerlukan sumbu koordinat horizontal maupun vertikal."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Perhatikan dua pernyataan berikut mengenai anatomi visualisasi data: (I) Pada Diagram Batang, celah/gap antar-batang menandakan bahwa kategori data bersifat diskrit dan terpisah. (II) Pada Histogram, lebar setiap batang (bin width) menyatakan panjang interval kelas, dan luas batang sebanding dengan frekuensi data. Evaluasi yang benar terhadap kedua pernyataan di atas adalah...."
                    data-opt-a="Pernyataan I salah, Pernyataan II benar."
                    data-opt-b="Pernyataan I benar, Pernyataan II salah."
                    data-opt-c="Kedua pernyataan (I dan II) bernilai BENAR dan saling menjelaskan konsep perbedaan grafik."
                    data-opt-d="Kedua pernyataan (I dan II) bernilai SALAH."
                    data-opt-e="Pernyataan I berlaku untuk data kontinu, Pernyataan II berlaku untuk data kualitatif."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Seorang peneliti data mengumpulkan 100 data numerik kontinu berupa kadar gula darah pasien. Jika ia ingin menentukan jumlah interval kelas (bins) menggunakan Aturan Sturges (di mana K = 1 + 3,322 log10(N) dan nilai log10(100) = 2), maka jumlah interval kelas (K) yang ideal untuk membuat histogram tersebut adalah...."
                    data-opt-a="5 kelas"
                    data-opt-b="7 kelas (dibulatkan dari 7,64)"
                    data-opt-c="10 kelas"
                    data-opt-d="12 kelas"
                    data-opt-e="15 kelas"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Hasil ulangan harian pelajaran Kimia yang sangat sulit menunjukkan bentuk histogram Miring Kiri (Left-Skewed / Negatively Skewed). Karakteristik grafik dan hubungan nilai statistik pemusatan yang benar untuk hasil ulangan tersebut adalah...."
                    data-opt-a="Puncak data berada di sebelah kiri, ekor grafik memanjang ke kanan, dan Mean > Modus."
                    data-opt-b="Sebagian besar siswa mendapatkan nilai tinggi (data mengumpul di kanan), ekor grafik memanjang ke kiri (nilai rendah), dan nilai Mean < Median < Modus."
                    data-opt-c="Tinggi batang di sisi kiri dan kanan seimbang, sehingga nilai Mean = Median."
                    data-opt-d="Grafik memiliki dua puncak sama tinggi yang membagi kelas menjadi dua subpopulasi."
                    data-opt-e="Nilai mean, median, dan modus berada di luar rentang sumbu X."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah histogram yang menggambarkan data usia peserta pelatihan kerja menunjukkan dua puncak (Bimodal Distribution) yang terpisah pada kelompok usia 18–22 tahun dan kelompok usia 45–50 tahun. Wawasan (insight) analitis yang paling tepat dari tampilan grafik tersebut adalah...."
                    data-opt-a="Terjadi kesalahan input data (Garbage In, Garbage Out) saat proses pembuatan histogram."
                    data-opt-b="Terdapat dua kelompok populasi yang berbeda mendasar di dalam dataset (misal: lulusan baru SMA dan pekerja senior yang mendaftar ulang), sehingga data tidak boleh digabung dalam satu analisis rata-rata tunggal."
                    data-opt-c="Seluruh peserta pelatihan memiliki usia yang seragam dan terdistribusi secara normal."
                    data-opt-d="Data usia peserta merupakan data kategorikal nominal berskala ordinal."
                    data-opt-e="Skala sumbu Y wajib dipotong (truncated) agar grafik menjadi satu puncak."
                    data-answer="B">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'histogram'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Histogram',
                'type' => 'text',
                'sequence' => 2,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 2 Sub 2: Histogram berhasil diperbarui!');
    }
}