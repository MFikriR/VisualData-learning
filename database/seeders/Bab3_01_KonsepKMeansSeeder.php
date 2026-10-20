<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_01_KonsepKMeansSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 3)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 3 belum dibuat! Pastikan ChapterSeeder sudah dikonfigurasi untuk Bab 3.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::whereIn('slug', ['konsep-kmeans', 'konsep-pengelompokan-data'])->delete();

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
                        <p class="leading-relaxed">Menjelaskan konsep dasar pengelompokan data (clustering) dalam pembelajaran tanpa pengawasan (unsupervised learning).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menerapkan tahapan prosedural algoritma K-Means pada dataset numerik sederhana.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Mengevaluasi kriteria penentuan jumlah klaster (K) dan pembaruan titik centroid pada algoritma K-Means.</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Dasar Pengelompokan Data & Algoritma K-Means -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Pengelompokan Data & Unsupervised Learning
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi Clustering & Unsupervised Learning -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi Clustering dan Unsupervised Learning</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Pengelompokan Data (<em>Clustering</em>) adalah salah satu teknik utama dalam penambangan data (<em>data mining</em>) dan pembelajaran mesin (<em>machine learning</em>) yang bertujuan untuk membagi sekumpulan objek data ke dalam beberapa kelompok (<em>cluster</em>) berdasarkan tingkat kemiripan (<em>similarity</em>) karakteristiknya.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-base mb-2">1. Homogenitas Internal</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">
                                    Objek-objek data yang berada di dalam satu klaster yang sama memiliki tingkat kemiripan yang sangat tinggi (jarak antar-data dekat).
                                </p>
                            </div>
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-base mb-2">2. Heterogenitas Eksternal</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">
                                    Objek-objek data yang berada di antara klaster yang berbeda memiliki tingkat perbedaan yang sangat tinggi (jarak antar-klaster jauh).
                                </p>
                            </div>
                        </div>

                        <p class="text-xs text-[#333333] leading-relaxed">
                            <em>Clustering</em> tergolong sebagai metode <strong>Pembelajaran Tanpa Pengawasan (Unsupervised Learning)</strong>. Algoritma komputer bekerja mengolah data mentah tanpa bimbingan label kelas atau kunci jawaban (<em>unlabeled data</em>) untuk menemukan struktur atau pola tersembunyi secara otomatis.
                        </p>
                    </div>

                    <!-- Sub 1.2: Perbedaan Klasifikasi vs Klasterisasi -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Perbedaan Klasifikasi (Supervised) vs Klasterisasi (Unsupervised)</h4>
                        <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-[#1d1d1f]">
                                    <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                        <tr>
                                            <th class="px-4 py-3 font-semibold w-1/4">Parameter</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Klasifikasi (Supervised Learning)</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Klasterisasi (Unsupervised Learning)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#e0e0e0]">
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Label Data Target</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Menggunakan data berlabel (memiliki kunci jawaban, misal: "Spam" / "Bukan Spam").</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Menggunakan data tanpa label (hanya berupa atribut/fitur mentah tanpa target akhir).</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Proses Pembelajaran</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Dilatih menggunakan bimbingan data historis berlabel untuk mempelajari pola input-output.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Komputer mengeksplorasi dan menemukan pola kelompok sendiri berdasarkan derajat kemiripan fitur.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Tujuan Utama</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Memprediksi kategori atau nilai target dari data baru yang belum pernah dilihat.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Mengelompokkan data yang mirip ke dalam segmen/kelompok yang bermakna.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Contoh Algoritma</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Decision Tree, K-NN, Naive Bayes, Linear Regression.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">K-Means, Hierarchical Clustering, DBSCAN, Fuzzy C-Means.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Contoh Aplikasi</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Filter spam email, prediksi kelulusan siswa, pengenalan wajah.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Segmentasi pelanggan e-commerce, pengelompokan gen biologi.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.3 & 1.4: Definisi K-Means & Komponen Utama -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Definisi Algoritma K-Means & Komponen Utama</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Algoritma K-Means adalah salah satu algoritma klasterisasi partisional berbasis jarak yang paling populer dan efisien. Algoritma ini membagi N objek data ke dalam K kelompok terpisah (non-overlapping), di mana setiap objek dimasukkan ke klaster dengan titik pusat (<em>centroid</em>) terdekat.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. Jumlah Klaster (K)</strong>
                                Parameter masukan angka bulat positif yang ditentukan pengguna di awal untuk menetapkan berapa banyak kelompok yang dibentuk (misal: K = 2 atau K = 3).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. Titik Pusat (Centroid)</strong>
                                Titik pusat geometris dari suatu klaster. Nilai koordinat centroid dihitung dari nilai rata-rata (mean) seluruh fitur anggota klaster.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. Jarak Euclidean</strong>
                                Metrik pengukuran jarak lurus antar titik data pada bidang koordinat berdimensi-n:
                                <p class="font-mono text-[#0066cc] font-bold text-[11px] mt-2">d(x, y) = √[ Σ (xᵢ - yᵢ)² ]</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.5: Tahapan Prosedural Kerja K-Means -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.5 Tahapan Prosedural Kerja Algoritma K-Means</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-white rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="font-bold text-[#0066cc] text-xs">Langkah 1 & 2</span>
                                <h5 class="font-bold text-[#1d1d1f] text-sm my-1">Inisialisasi K & Centroid</h5>
                                <p class="text-slate-600">Menentukan jumlah klaster (K) dan memilih K buah titik acak dari dataset untuk dijadikan pusat klaster awal (<em>initial centroids</em>).</p>
                            </div>

                            <div class="p-4 bg-white rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="font-bold text-[#0066cc] text-xs">Langkah 3 & 4</span>
                                <h5 class="font-bold text-[#1d1d1f] text-sm my-1">Hitung Jarak & Alokasi</h5>
                                <p class="text-slate-600">Menghitung jarak Euclidean setiap datum ke seluruh centroid, lalu memasukkan datum ke klaster dengan jarak centroid terdekat (paling minimum).</p>
                            </div>

                            <div class="p-4 bg-white rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="font-bold text-[#0066cc] text-xs">Langkah 5 & 6</span>
                                <h5 class="font-bold text-[#1d1d1f] text-sm my-1">Update Centroid & Iterasi</h5>
                                <p class="text-slate-600">Menghitung koordinat centroid baru dari rata-rata (mean) anggota klaster, lalu mengulang iterasi hingga <strong>konvergen</strong> (tidak ada data berpindah).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Contoh Kasus & Simulasi Perhitungan Manual Iterasi 1 -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Simulasi Perhitungan Manual Iterasi 1 Algoritma K-Means
                </h3>

                <p class="text-[#333333] leading-relaxed mb-6">
                    Berikut adalah contoh dataset nilai akademik dari 6 orang siswa dengan dua atribut numerik: X = Nilai Tugas Mandiri dan Y = Nilai Ujian Akhir (skala 0–100):
                </p>

                <!-- Tabel Dataset Sederhana -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm mb-8">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.1: Dataset Nilai Akademik Siswa (6 Sampel)</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-2.5 font-semibold">ID Siswa</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Nama Siswa</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Nilai Tugas (X)</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Nilai Ujian (Y)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr><td class="px-4 py-2 font-mono">S1</td><td class="px-4 py-2 border-l border-[#e0e0e0]">Adit</td><td class="px-4 py-2 border-l border-[#e0e0e0]">80</td><td class="px-4 py-2 border-l border-[#e0e0e0]">85</td></tr>
                                <tr><td class="px-4 py-2 font-mono">S2</td><td class="px-4 py-2 border-l border-[#e0e0e0]">Bima</td><td class="px-4 py-2 border-l border-[#e0e0e0]">20</td><td class="px-4 py-2 border-l border-[#e0e0e0]">30</td></tr>
                                <tr><td class="px-4 py-2 font-mono">S3</td><td class="px-4 py-2 border-l border-[#e0e0e0]">Citra</td><td class="px-4 py-2 border-l border-[#e0e0e0]">85</td><td class="px-4 py-2 border-l border-[#e0e0e0]">90</td></tr>
                                <tr><td class="px-4 py-2 font-mono">S4</td><td class="px-4 py-2 border-l border-[#e0e0e0]">Dina</td><td class="px-4 py-2 border-l border-[#e0e0e0]">30</td><td class="px-4 py-2 border-l border-[#e0e0e0]">25</td></tr>
                                <tr><td class="px-4 py-2 font-mono">S5</td><td class="px-4 py-2 border-l border-[#e0e0e0]">Eko</td><td class="px-4 py-2 border-l border-[#e0e0e0]">75</td><td class="px-4 py-2 border-l border-[#e0e0e0]">80</td></tr>
                                <tr><td class="px-4 py-2 font-mono">S6</td><td class="px-4 py-2 border-l border-[#e0e0e0]">Fani</td><td class="px-4 py-2 border-l border-[#e0e0e0]">25</td><td class="px-4 py-2 border-l border-[#e0e0e0]">35</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Langkah-langkah Perhitungan Iterasi 1 -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#fafafc] p-4 rounded-lg border border-[#e0e0e0] text-xs space-y-1">
                        <strong class="text-sm font-bold text-[#0066cc] block">Inisialisasi Parameter Awal</strong>
                        <p>• Tentukan K = 2 klaster.</p>
                        <p>• Ambil Centroid 1 (C₁) acak = S1 (80, 85)</p>
                        <p>• Ambil Centroid 2 (C₂) acak = S2 (20, 30)</p>
                    </div>

                    <!-- Tabel Ringkasan Matriks Iterasi 1 -->
                    <div>
                        <h5 class="text-xs font-bold text-[#1d1d1f] mb-3 uppercase">Matriks Ringkasan Perhitungan Jarak & Alokasi Iterasi 1</h5>
                        <div class="overflow-x-auto border border-[#e0e0e0] rounded-lg">
                            <table class="w-full text-left text-xs text-[#1d1d1f]">
                                <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                    <tr>
                                        <th class="px-3 py-2 font-semibold">ID Siswa</th>
                                        <th class="px-3 py-2 font-semibold border-l border-[#e0e0e0]">Nilai X</th>
                                        <th class="px-3 py-2 font-semibold border-l border-[#e0e0e0]">Nilai Y</th>
                                        <th class="px-3 py-2 font-semibold border-l border-[#e0e0e0]">Jarak ke C₁ (80, 85)</th>
                                        <th class="px-3 py-2 font-semibold border-l border-[#e0e0e0]">Jarak ke C₂ (20, 30)</th>
                                        <th class="px-3 py-2 font-semibold border-l border-[#e0e0e0]">Klaster Terpilih</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e0e0e0]">
                                    <tr class="bg-blue-50/40"><td class="px-3 py-2 font-mono">S1 (Adit)</td><td class="px-3 py-2 border-l border-[#e0e0e0]">80</td><td class="px-3 py-2 border-l border-[#e0e0e0]">85</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">0,00</td><td class="px-3 py-2 border-l border-[#e0e0e0]">81,39</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">Klaster 1</td></tr>
                                    <tr class="bg-emerald-50/40"><td class="px-3 py-2 font-mono">S2 (Bima)</td><td class="px-3 py-2 border-l border-[#e0e0e0]">20</td><td class="px-3 py-2 border-l border-[#e0e0e0]">30</td><td class="px-3 py-2 border-l border-[#e0e0e0]">81,39</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-emerald-700">0,00</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-emerald-700">Klaster 2</td></tr>
                                    <tr class="bg-blue-50/40"><td class="px-3 py-2 font-mono">S3 (Citra)</td><td class="px-3 py-2 border-l border-[#e0e0e0]">85</td><td class="px-3 py-2 border-l border-[#e0e0e0]">90</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">7,07</td><td class="px-3 py-2 border-l border-[#e0e0e0]">88,46</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">Klaster 1</td></tr>
                                    <tr class="bg-emerald-50/40"><td class="px-3 py-2 font-mono">S4 (Dina)</td><td class="px-3 py-2 border-l border-[#e0e0e0]">30</td><td class="px-3 py-2 border-l border-[#e0e0e0]">25</td><td class="px-3 py-2 border-l border-[#e0e0e0]">78,10</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-emerald-700">11,18</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-emerald-700">Klaster 2</td></tr>
                                    <tr class="bg-blue-50/40"><td class="px-3 py-2 font-mono">S5 (Eko)</td><td class="px-3 py-2 border-l border-[#e0e0e0]">75</td><td class="px-3 py-2 border-l border-[#e0e0e0]">80</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">7,07</td><td class="px-3 py-2 border-l border-[#e0e0e0]">74,33</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">Klaster 1</td></tr>
                                    <tr class="bg-emerald-50/40"><td class="px-3 py-2 font-mono">S6 (Fani)</td><td class="px-3 py-2 border-l border-[#e0e0e0]">25</td><td class="px-3 py-2 border-l border-[#e0e0e0]">35</td><td class="px-3 py-2 border-l border-[#e0e0e0]">74,33</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-emerald-700">7,07</td><td class="px-3 py-2 border-l border-[#e0e0e0] font-bold text-emerald-700">Klaster 2</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pembaruan Centroid Baru -->
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0] text-xs space-y-2">
                        <strong class="text-sm font-bold text-[#1d1d1f] block">Pembaruan Posisi Centroid Baru (C_baru)</strong>
                        <p>• <strong>Centroid Baru Klaster 1 (C₁'):</strong> X = (80 + 85 + 75)/3 = <strong>80</strong>; Y = (85 + 90 + 80)/3 = <strong>85</strong> ➔ <strong>C₁' = (80, 85)</strong></p>
                        <p>• <strong>Centroid Baru Klaster 2 (C₂'):</strong> X = (20 + 30 + 25)/3 = <strong>25</strong>; Y = (30 + 25 + 35)/3 = <strong>30</strong> ➔ <strong>C₂' = (25, 30)</strong></p>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Studi Kasus Terbimbing -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Studi Kasus Terbimbing: Program Pendampingan Bimbingan Konseling
                </h3>

                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0] text-xs space-y-2">
                        <h5 class="text-sm font-bold text-[#1d1d1f]">Skenario Guru Bimbingan Konseling (BK)</h5>
                        <p>Pengelompokan 4 siswa ke K = 2 kelompok pendampingan berdasarkan: X = Durasi Belajar (Jam/Minggu) dan Y = Kehadiran Kelas (%):</p>
                        <p>• Galih (2, 70), Ratna (8, 95), Roy (3, 75), Shinta (9, 90).</p>
                        <p>• Centroid Awal: C₁ = Galih (2, 70) dan C₂ = Shinta (9, 90).</p>
                    </div>

                    <div class="space-y-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 1: Hitung Jarak Euclidean Roy (3, 75) ke C₁ dan C₂</strong>
                            <p class="mb-2">Tentukan Roy masuk ke klaster yang mana!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• d(Roy, C₁) = √[ (3-2)² + (75-70)² ] = √[ 1 + 25 ] = √26 ≈ <strong>5,10</strong></p>
                                <p>• d(Roy, C₂) = √[ (3-9)² + (75-90)² ] = √[ 36 + 225 ] = √261 ≈ <strong>16,16</strong></p>
                                <p>• <strong>Alokasi:</strong> d(Roy, C₁) = 5,10 < d(Roy, C₂) = 16,16 ➔ Roy masuk ke <strong>Klaster 1</strong>.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 2: Pembaruan Centroid Baru</strong>
                            <p class="mb-2">Jika Klaster 1 = {Galih(2, 70), Roy(3, 75)} dan Klaster 2 = {Ratna(8, 95), Shinta(9, 90)}, hitung centroid barunya!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>C₁':</strong> X = (2+3)/2 = 2,5; Y = (70+75)/2 = 72,5 ➔ <strong>C₁' = (2,5; 72,5)</strong></p>
                                <p>• <strong>C₂':</strong> X = (8+9)/2 = 8,5; Y = (95+90)/2 = 92,5 ➔ <strong>C₂' = (8,5; 92,5)</strong></p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 3: Analisis Kualitatif & Tindakan BK</strong>
                            <p class="mb-2">Bagaimanakah interpretasi kualitatif dan rekomendasi kebijakan untuk kedua kelompok?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Klaster 1 (2.5; 72.5):</strong> Kelompok belajar & presensi sedang. Tindakan BK: Program pendampingan motivasi belajar intensif.</p>
                                <p>• <strong>Klaster 2 (8.5; 92.5):</strong> Kelompok belajar & presensi tinggi. Tindakan BK: Program pengayaan / pembinaan tutor sebaya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 1 (Bab 3)
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Clustering (Unsupervised):</strong> Mengelompokkan data tanpa label berdasarkan kemiripan fitur (homogenitas internal tinggi & heterogenitas eksternal tinggi).</li>
                    <li>• <strong>Algoritma K-Means:</strong> Algoritma berbasis jarak Euclidean yang membagi data ke K kelompok berdasarkan centroid terdekat.</li>
                    <li>• <strong>6 Langkah K-Means:</strong> (1) Tentukan K, (2) Pilih Centroid Awal, (3) Hitung Jarak Euclidean, (4) Alokasi Klaster Terdekat, (5) Update Centroid Baru (Rata-rata/Mean), (6) Cek Konvergensi.</li>
                    <li>• <strong>Kondisi Konvergen:</strong> Iterasi dihentikan apabila posisi centroid sudah stabil dan tidak ada objek data yang berpindah klaster.</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Manakah pernyataan berikut yang paling tepat menjelaskan prinsip kerja algoritma clustering sebagai bagian dari Unsupervised Learning dalam Data Mining?"
                    data-opt-a="Algoritma melatih model menggunakan data berlabel kunci jawaban untuk memprediksi harga rumah di masa depan."
                    data-opt-b="Algoritma mengelompokkan data tanpa label berdasarkan tingkat kemiripan karakteristik, di mana data dalam satu klaster memiliki homogenitas internal tinggi."
                    data-opt-c="Algoritma menghitung nilai regresi linier antara dua variabel terikat untuk menemukan garis best-fit."
                    data-opt-d="Algoritma menggunakan sistem hadiah dan hukuman (reward and punishment) untuk melatih robot berjalan."
                    data-opt-e="Algoritma menghapus seluruh data pencilan (outlier) sebelum menentukan kelas target."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Seorang analis data ingin mengelompokkan ribuan pelanggan toko e-commerce berdasarkan pola transaksi belanja tanpa mengetahui kategori awal pelanggan tersebut. Alasan utama mengapa algoritma K-Means dikategori sebagai pembelajaran tanpa pengawasan (unsupervised learning) untuk tugas tersebut adalah...."
                    data-opt-a="Karena algoritma K-Means memerlukan data pelatihan yang memiliki label target kelas biner."
                    data-opt-b="Karena K-Means secara mandiri menemukan struktur kelompok tersembunyi berdasarkan kedekatan jarak tanpa bimbingan label kelas awal."
                    data-opt-c="Karena K-Means selalu menghasilkan pohon keputusan (decision tree) sebagai output analisisnya."
                    data-opt-d="Karena K-Means bekerja dengan cara menghitung matriks korelasi Pearson antara dua sumbu."
                    data-opt-e="Karena jumlah kelompok K harus diubah menjadi variabel kualitatif nominal."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Diberikan satu titik data baru P(4, 7) dan dua titik centroid pusat klaster: Centroid A(1, 3) dan Centroid B(7, 11). Berdasarkan aturan penugasan klaster K-Means menggunakan Jarak Euclidean, keputusan pengalokasian titik P yang benar adalah...."
                    data-opt-a="Titik P dialokasikan ke Klaster A karena d(P, A) = 4,00 lebih kecil daripada d(P, B) = 5,00."
                    data-opt-b="Titik P dialokasikan ke Klaster B karena d(P, B) = 3,00 lebih kecil daripada d(P, A) = 5,00."
                    data-opt-c="Titik P dapat dialokasikan ke Klaster A atau B secara seimbang karena jarak Euclidean dari P ke Centroid A bernilai 5,00 dan jarak ke Centroid B juga bernilai 5,00 (d(P, A) = d(P, B) = 5,00)."
                    data-opt-d="Titik P dialokasikan ke Klaster A karena titik A memiliki koordinat bernilai negatif."
                    data-opt-e="Titik P dialokasikan ke Klaster B karena titik B memiliki nilai koordinat yang paling besar."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Satu klaster pada iterasi pertama beranggotakan 3 titik data koordinat berikut: A(2, 4), B(4, 6), dan C(6, 8). Koordinat Centroid Baru (Cbaru) hasil pembaruan untuk iterasi berikutnya adalah...."
                    data-opt-a="(3, 5)"
                    data-opt-b="(4, 6)"
                    data-opt-c="(6, 9)"
                    data-opt-d="(12, 18)"
                    data-opt-e="(2, 6)"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam mengevaluasi kriteria penghentian iterasi (konvergensi) pada algoritma K-Means, proses perulangan hitungan jarak dan pembaruan centroid WAJIB dihentikan apabila kondisi berikut terpenuhi, yaitu...."
                    data-opt-a="Nilai rata-rata dari seluruh dataset telah mencapai angka 100."
                    data-opt-b="Seluruh titik centroid berpindah posisi sejauh mungkin dari posisi awal."
                    data-opt-c="Tidak ada lagi objek data yang berpindah keanggotaan klaster dan posisi centroid sudah stabil (perubahan posisi mendekati nol)."
                    data-opt-d="Jumlah iterasi telah mencapai tepat angka 1.000 kali perulangan tanpa melihat posisi data."
                    data-opt-e="Semua data numerik diubah menjadi data kualitatif ordinal."
                    data-answer="C">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'konsep-kmeans'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Konsep Pengelompokan Data & Algoritma K-Means',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 3 Sub 1: Konsep Pengelompokan Data & Algoritma K-Means berhasil diperbarui!');
    }
}