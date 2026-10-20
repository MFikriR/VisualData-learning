<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_02_SimulasiLabKMeansSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 3)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 3 belum dibuat! Pastikan ChapterSeeder sudah dikonfigurasi untuk Bab 3.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::whereIn('slug', ['simulasi-lab-kmeans', 'simulasi-k-means'])->delete();

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
                        <p class="leading-relaxed">Menganalisis pengaruh parameter masukan dan pergerakan centroid pada simulasi interaktif K-Means.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menerapkan metode Elbow berdasarkan nilai Sum of Squared Errors (SSE) untuk menentukan jumlah klaster (K) optimal.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Mengevaluasi profil karakteristik klaster hasil simulasi untuk pengambilan keputusan.</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Lab Simulasi, Metrik SSE/WCSS & Metode Elbow -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Lab Simulasi, Metrik SSE & Metode Elbow
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi Lab Simulasi Interaktif -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Konsep Laboratorium Simulasi Interaktif K-Means</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Laboratorium Simulasi Interaktif K-Means adalah media atau alat bantu pembelajaran visual berbasis perangkat lunak (seperti Orange Data Mining, GeoGebra, atau laboratorium virtual web) yang digunakan untuk mengamati alur kerja algoritma K-Means secara langkah demi langkah (<em>step-by-step</em>).
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">1. Inisialisasi Centroid</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Titik pusat awal (K) yang dipilih secara acak menentukan arah pergerakan kelompok pada iterasi pertama.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">2. Pergerakan Centroid</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Koordinat centroid bergeser ke posisi rata-rata (mean) baru dari anggota kelompok pada tiap iterasi.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-sm mb-1">3. Kondisi Konvergen</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">Simulasi berhenti otomatis ketika garis batas wilayah klaster (<em>Voronoi tessellation</em>) tidak lagi berubah.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.2: Metrik WCSS / SSE -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Pengukuran Kualitas Klaster: WCSS / SSE</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Untuk menilai seberapa baik kualitas pengelompokan yang dihasilkan K-Means, digunakan metrik kuantitatif <strong>Within-Cluster Sum of Squares (WCSS)</strong> atau <strong>Sum of Squared Errors (SSE)</strong>:
                        </p>

                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm mb-4">
                            <p class="font-mono text-[#0066cc] font-bold text-sm text-center mb-2">
                                SSE (J) = Σᵢ₌₁ style="display:inline;" Σₓₖ ∈ Gᵢ d(xₖ, cᵢ)²
                            </p>
                            <p class="text-xs text-slate-500 text-center">Keterangan: K = jumlah klaster, cᵢ = centroid klaster ke-i, xₖ = objek data anggota, d = jarak Euclidean.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs text-[#333333]">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-emerald-800 block mb-1">✓ Semakin KECIL Nilai SSE (Mendekati 0)</strong>
                                <p>Sebaran data di dalam satu klaster berada sangat rapat dan dekat dengan centroid-nya. Menandakan <strong>homogenitas internal tinggi</strong> dan kualitas klaster sangat baik.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-rose-800 block mb-1">✕ Semakin BESAR Nilai SSE</strong>
                                <p>Sebaran data di dalam klaster sangat renggang dan bervariasi. Menandakan kualitas pengelompokan dianggap kurang baik.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.3: Metode Elbow -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Penentuan Jumlah Klaster (K) Optimal dengan Metode Elbow</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            <strong>Metode Elbow (Elbow Method)</strong> adalah teknik grafik eksploratif yang digunakan untuk menentukan nilai K optimal dengan memplot hubungan antara Jumlah Klaster K (Sumbu X) dengan Nilai SSE / Varians Data (Sumbu Y).
                        </p>
                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm text-xs text-[#333333] space-y-2">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">Langkah Kerja Metode Elbow:</strong>
                            <p>1. Jalankan simulasi K-Means berulang kali menggunakan variasi nilai K (K=1, K=2, K=3, dst.).</p>
                            <p>2. Catat total nilai SSE untuk setiap nilai K, lalu petakan ke dalam grafik garis.</p>
                            <p>3. Identifikasi <strong>"Titik Siku" (Elbow Point)</strong>: Amati titik sudut patahan pada grafik di mana penurunan nilai SSE mulai melambat secara drastis (sudah melandai). Angka K pada titik siku ditetapkan sebagai K paling optimal dan efisien.</p>
                        </div>
                    </div>

                    <!-- Sub 1.4: Profilisasi Klaster (Cluster Profiling) -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.4 Penerjemahan Hasil Klaster (Cluster Profiling & Interpretation)</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Profilisasi Klaster (<em>Cluster Profiling</em>) adalah tahap menerjemahkan angka koordinat centroid akhir menjadi wawasan deskriptif kualitatif yang bermakna bagi pengambil keputusan.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">Contoh Profil 1 (Segmen Aktif)</strong>
                                Centroid = (Belanja: Rp 8.267.000, Frekuensi: 12x) ➔ Diberi label kualitatif: <strong>"Pelanggan Utama / Sangat Aktif"</strong>.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">Contoh Profil 2 (Segmen Pasif)</strong>
                                Centroid = (Belanja: Rp 2.723.000, Frekuensi: 3x) ➔ Diberi label kualitatif: <strong>"Pelanggan Baru / Perlu Promosi"</strong>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Contoh Kasus & Grafik Metode Elbow -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Percobaan Laboratorium & Grafik Metode Elbow
                </h3>

                <p class="text-[#333333] leading-relaxed mb-6">
                    Berikut adalah data hasil percobaan simulasi K-Means laboratorium pada dataset perilaku belajar siswa menggunakan variasi nilai K=1 hingga K=5:
                </p>

                <!-- Tabel Penurunan SSE -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm mb-8">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.1: Nilai SSE Berdasarkan Jumlah Klaster K</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-2.5 font-semibold">Jumlah Klaster (K)</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Total Nilai SSE</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Penurunan SSE</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Persentase Penurunan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr><td class="px-4 py-2 font-semibold">K = 1</td><td class="px-4 py-2 border-l border-[#e0e0e0]">1.200</td><td class="px-4 py-2 border-l border-[#e0e0e0]">-</td><td class="px-4 py-2 border-l border-[#e0e0e0]">-</td></tr>
                                <tr><td class="px-4 py-2 font-semibold">K = 2</td><td class="px-4 py-2 border-l border-[#e0e0e0]">550</td><td class="px-4 py-2 border-l border-[#e0e0e0]">650</td><td class="px-4 py-2 border-l border-[#e0e0e0]">54,2%</td></tr>
                                <tr class="bg-blue-50/50"><td class="px-4 py-2 font-bold text-[#0066cc]">K = 3 (Elbow Point)</td><td class="px-4 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">180</td><td class="px-4 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">370</td><td class="px-4 py-2 border-l border-[#e0e0e0] font-bold text-[#0066cc]">67,3% (Siku Tajam)</td></tr>
                                <tr><td class="px-4 py-2 font-semibold">K = 4</td><td class="px-4 py-2 border-l border-[#e0e0e0]">140</td><td class="px-4 py-2 border-l border-[#e0e0e0]">40</td><td class="px-4 py-2 border-l border-[#e0e0e0]">22,2% (Melandai)</td></tr>
                                <tr><td class="px-4 py-2 font-semibold">K = 5</td><td class="px-4 py-2 border-l border-[#e0e0e0]">115</td><td class="px-4 py-2 border-l border-[#e0e0e0]">25</td><td class="px-4 py-2 border-l border-[#e0e0e0]">21,4% (Melandai)</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-[#fafafc] border-t border-[#e0e0e0] text-xs text-[#333333] space-y-1">
                        <p><strong>Analisis Visual Grafik Elbow:</strong></p>
                        <p>• Dari K=1 ke K=2 terjadi penurunan SSE sebesar 650 poin, dan dari K=2 ke K=3 sebesar 370 poin.</p>
                        <p>• Pada K=3, grafik membentuk "Siku / Patahan" tajam. Setelah K=3 (ke K=4 dan K=5), penurunan SSE melandai drastis (hanya turun 40 dan 25 poin).</p>
                        <p>• <strong>Kesimpulan:</strong> Jumlah klaster optimal yang dipilih adalah <strong>K = 3</strong>.</p>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Studi Kasus Terbimbing -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Studi Kasus Terbimbing: Profil Kebiasaan Membaca Digital Siswa
                </h3>

                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0] text-xs space-y-2">
                        <h5 class="text-sm font-bold text-[#1d1d1f]">Skenario Petugas Perpustakaan Digital (40 Siswa)</h5>
                        <p>Fitur: X = Jumlah Artikel Digital per Bulan, Y = Durasi Akses Perpustakaan (Jam/Bulan).</p>
                        <p>• <strong>Centroid 1 (C₁):</strong> (28 artikel, 32 jam) | Anggota = 10 siswa</p>
                        <p>• <strong>Centroid 2 (C₂):</strong> (14 artikel, 15 jam) | Anggota = 18 siswa</p>
                        <p>• <strong>Centroid 3 (C₃):</strong> (3 artikel, 4 jam) | Anggota = 12 siswa</p>
                    </div>

                    <div class="space-y-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 1: Pergerakan Centroid & Konvergensi</strong>
                            <p class="mb-2">Mengapa centroid terus bergeser hingga iterasi ke-3, dan apa indikator visual bahwa simulasi telah selesai?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Penyebab Bergeser:</strong> Centroid bergeser karena dihitung ulang dari rata-rata (mean) koordinat siswa yang baru saja teralokasi ke klaster tersebut.</p>
                                <p>• <strong>Indikator Selesai (Konvergen):</strong> Titik centroid tidak bergeser lagi dan keanggotaan 40 siswa tidak ada yang berpindah.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 2: Menerapkan Metode Elbow (Pembuktian K=3)</strong>
                            <p class="mb-2">Jika SSE K=1 (2400), K=2 (1100), K=3 (350), K=4 (300), dan K=5 (270), tunjukkan bahwa K=3 ideal!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• Penurunan SSE: K1→K2 = 1300; K2→K3 = 750; K3→K4 = 50; K4→K5 = 30.</p>
                                <p>• <strong>Penerapan Elbow:</strong> Patahan siku terjelas berada pada K=3, karena setelah K=3 penambahan klaster menjadi K=4 hanya menurunkan SSE sebesar 50 poin. Maka <strong>K=3 terbukti paling ideal</strong>.</p>
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 3: Profiling Klaster & Tindakan Keputusan Sekolah</strong>
                            <p class="mb-2">Berikan nama segmen kualitatif untuk C₁(28,32), C₂(14,15), C₃(3,4) dan rekomendasi program sekolah!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700 space-y-1">
                                <p>• <strong>Klaster 1 (28, 32):</strong> Segmen <em>"Pembaca Aktif / Literat Mandiri"</em> (10 siswa) ➔ Tindakan: Duta literasi sekolah & akses koleksi buku lanjutan.</p>
                                <p>• <strong>Klaster 2 (14, 15):</strong> Segmen <em>"Pembaca Moderat / Sedang"</em> (18 siswa) ➔ Tindakan: Rekomendasi judul buku populer secara berkala.</p>
                                <p>• <strong>Klaster 3 (3, 4):</strong> Segmen <em>"Pembaca Pasif / Perlu Pendampingan"</em> (12 siswa) ➔ Tindakan: Tantangan membaca berhadiah (reading challenge) & bimbingan khusus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 2 (Bab 3)
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Lab Simulasi K-Means:</strong> Memungkinkan pengamatan visual pergerakan centroid dan pembentukan garis batas klaster secara interaktif.</li>
                    <li>• <strong>SSE / WCSS:</strong> Metrik penilai kerapatan internal klaster. Semakin kecil nilai SSE, semakin homogen dan tinggi kualitas klaster.</li>
                    <li>• <strong>Metode Elbow:</strong> Teknik menentukan K optimal dengan mencari titik siku (elbow point) pada grafik hubungan K vs SSE.</li>
                    <li>• <strong>Cluster Profiling:</strong> Menerjemahkan angka koordinat centroid menjadi nama segmen kualitatif yang intuitif untuk dasar pengambilan keputusan.</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Dalam laboratorium simulasi interaktif K-Means, seorang siswa mengubah lokasi Centroid Awal secara acak pada dataset yang sama. Hasil simulasi menunjukkan bahwa jumlah iterasi hingga konvergen menjadi berbeda dari percobaan pertama. Analisis yang paling tepat mengenai pengaruh pemilihan centroid awal tersebut adalah...."
                    data-opt-a="K-Means selalu menghasilkan posisi centroid akhir yang persis sama tanpa terpengaruh oleh centroid awal."
                    data-opt-b="K-Means sensitif terhadap penentuan centroid awal, di mana centroid awal yang lebih dekat ke pusat kelompok asli akan mempercepat proses konvergensi (iterasi lebih sedikit)."
                    data-opt-c="Pemilihan centroid awal otomatis mengubah variabel kuantitatif menjadi data kategorikal nominal."
                    data-opt-d="Centroid awal yang berada jauh di luar dataset akan menghentikan algoritma secara paksa pada iterasi ke-0."
                    data-opt-e="Mengubah centroid awal otomatis menambah nilai K menjadi dua kali lipat."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada saat mengamati pergerakan visualisasi K-Means di layar simulasi, garis batas kelompok (cluster boundaries) berubah bentuk setelah nilai rata-rata (mean) anggota dihitung ulang. Mekanisme utama yang menyebabkan pergeseran tersebut adalah...."
                    data-opt-a="Pembagian seluruh koordinat data dengan angka nol."
                    data-opt-b="Pembaruan titik centroid baru berdasarkan rerata nilai fitur dari seluruh datum yang teralokasi pada klaster tersebut."
                    data-opt-c="Penghapusan data pencilan (outlier) dari bidang Kartesius secara otomatis."
                    data-opt-d="Perubahan metrik jarak dari Euclidean Distance menjadi grafik batang vertikal."
                    data-opt-e="Pengurutan data secara descending berdasarkan nilai terendah."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Seorang analis data mengevaluasi kualitas klasterisasi menggunakan grafik Metode Elbow dan mencatat nilai SSE sebagai berikut: K=1 (SSE=5.000); K=2 (SSE=2.100); K=3 (SSE=600); K=4 (SSE=520); K=5 (SSE=460). Berdasarkan penerapan Metode Elbow, jumlah klaster optimal (K) yang wajib dipilih beserta alasannya adalah...."
                    data-opt-a="K = 1, karena memiliki nilai SSE paling tinggi yang paling mewakili populasi."
                    data-opt-b="K = 3, karena terjadi penurunan nilai SSE yang sangat tajam hingga K=3, dan setelah K=3 penurunan SSE melambat drastis (membentuk titik siku)."
                    data-opt-c="K = 5, karena nilai SSE selalu paling kecil sehingga pasti terbaik tanpa mempertimbangkan kompleksitas."
                    data-opt-d="K = 2, karena nilai SSE dipotong (truncated) pada skala 2.100."
                    data-opt-e="K = 10, karena semakin banyak klaster maka nilai data otomatis terhapus."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Hasil simulasi K-Means pada data transaksi kantin sekolah menghasilkan 2 klaster dengan profil centroid akhir: Klaster A = Centroid (Frekuensi Beli: 22 kali/bulan, Rata-rata Belanja: Rp 25.000) dan Klaster B = Centroid (Frekuensi Beli: 4 kali/bulan, Rata-rata Belanja: Rp 5.000). Evaluasi penamaan label segmen profil klaster yang paling tepat dan logis adalah...."
                    data-opt-a="Klaster A = 'Siswa Jarang Belanja', Klaster B = 'Siswa Sangat Aktif Belanja'"
                    data-opt-b="Klaster A = 'Pelanggan Setia / Pengeluaran Tinggi', Klaster B = 'Pelanggan Jarang / Pengeluaran Rendah'"
                    data-opt-c="Klaster A = 'Siswa Perlu Remedial', Klaster B = 'Siswa Berprestasi'"
                    data-opt-d="Klaster A = 'Data Outlier Rendah', Klaster B = 'Data Outlier Tinggi'"
                    data-opt-e="Klaster A dan Klaster B keduanya merupakan kelompok data tidak terstruktur."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pihak sekolah ingin memberikan voucher diskon khusus makan sehat untuk kelompok siswa yang jarang berbelanja di kantin agar nutrisinya terjamin. Berdasarkan hasil klasterisasi pada soal sebelumnya, evaluasi keputusan yang paling tepat sasaran adalah...."
                    data-opt-a="Memberikan voucher diskon secara merata kepada anggota Klaster A."
                    data-opt-b="Memberikan voucher diskon khusus yang terfokus kepada siswa anggota Klaster B, karena profil centroid-nya menunjukkan frekuensi dan rata-rata belanja yang masih sangat rendah."
                    data-opt-c="Menghapus data siswa Klaster B dari sistem komputer sekolah."
                    data-opt-d="Menambah jumlah klaster menjadi K = 100 sebelum membagikan voucher."
                    data-opt-e="Memaksa siswa Klaster A untuk berpindah secara manual ke Klaster B."
                    data-answer="B">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'simulasi-lab-kmeans'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Simulasi & Analisis Cluster Data (Lab Interaktif K-Means)',
                'type' => 'text',
                'sequence' => 2,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 3 Sub 2: Simulasi & Analisis Cluster Data (Lab Interaktif K-Means) berhasil diperbarui!');
    }
}