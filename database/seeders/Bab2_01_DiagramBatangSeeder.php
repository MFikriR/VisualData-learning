<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_01_DiagramBatangSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 2 belum dibuat! Pastikan ChapterSeeder sudah dikonfigurasi untuk Bab 2.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::where('slug', 'diagram-batang')->delete();

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
                        <p class="leading-relaxed">Menjelaskan fungsi dan anatomi komponen Diagram Batang (Bar Chart).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menganalisis penggunaan Diagram Batang Vertikal (Column Chart) vs Horizontal (Horizontal Bar Chart).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Mengevaluasi keabsahan dan etika penyajian Diagram Batang (jujur vs menyesatkan).</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Konsep Dasar & Anatomi Diagram Batang -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Konsep Dasar & Anatomi Diagram Batang
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Definisi dan Fungsi Utama -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi dan Fungsi Utama</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Diagram Batang (<em>Bar Chart / Bar Graph</em>) adalah bentuk visualisasi data yang menyajikan data dalam bentuk batang-batang berbentuk persegi panjang, baik secara vertikal maupun horizontal, di mana tinggi atau panjang setiap batang berbanding lurus (proporsional) dengan nilai kuantitatif atau frekuensi data yang diwakilinya.
                        </p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-base mb-2">1. Membandingkan Nilai Antar Kategori</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">
                                    Memudahkan pembaca untuk membandingkan secara visual besaran nilai, jumlah, atau frekuensi antar beberapa kelompok/kategori data yang berbeda secara terpisah dan jelas.
                                </p>
                            </div>
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-bold text-[#1d1d1f] text-base mb-2">2. Menyoroti Nilai Tertinggi dan Terendah</h5>
                                <p class="text-xs text-[#333333] leading-relaxed">
                                    Memungkinkan pengambil keputusan melihat dengan cepat kategori mana yang paling dominan (batang tertinggi/terpanjang) dan mana yang paling sedikit (batang terpendek) tanpa harus membaca detail angka.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.2: Jenis Data yang Sesuai -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Jenis Data yang Sesuai</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Pemilihan jenis data yang tepat sangat menentukan keabsahan visualisasi. Diagram batang dirancang khusus untuk pasangan jenis data berikut:
                        </p>
                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm space-y-4 text-xs text-[#333333]">
                            <div>
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">• Data Kategorikal / Kualitatif (Sumbu Kategori)</strong>
                                <ul class="list-disc list-inside space-y-1 pl-2">
                                    <li><strong>Data Nominal:</strong> Kategori tanpa urutan/tingkatan tertentu (contoh: nama ekstrakurikuler, merek telepon, jenis olahraga).</li>
                                    <li><strong>Data Ordinal:</strong> Kategori yang memiliki hirarki atau urutan logis (contoh: tingkat kepuasan, jenjang kelas X, XI, XII).</li>
                                </ul>
                            </div>
                            <div>
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">• Data Numerikal / Kuantitatif (Sumbu Nilai/Tinggi Batang)</strong>
                                <p class="pl-2">Berupa data diskrit atau kontinu yang menyatakan frekuensi, jumlah siswa, total penjualan, atau nilai persentase yang menjadi ukuran panjang/tinggi batang.</p>
                            </div>
                            <div class="p-3 bg-amber-50 border-l-4 border-amber-500 rounded-r-lg text-amber-900">
                                <strong>Catatan Penting:</strong> Diagram batang tidak cocok untuk data numerik kontinu bersambung (seperti tren perubahan detik ke detik). Untuk distribusi interval kontinu, gunakan <strong>Histogram</strong>.
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.3: Anatomi Komponen Utama -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Anatomi Komponen Utama Diagram Batang</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-[#333333]">
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. Judul Diagram (Chart Title)</strong>
                                Terletak di bagian atas, menjelaskan topik atau informasi utama grafik secara singkat.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. Sumbu X (Horizontal Axis)</strong>
                                Pada diagram vertikal, sumbu X memuat nama-nama label kategori data.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. Sumbu Y (Vertical Axis)</strong>
                                Memuat skala angka pengukuran atau frekuensi.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">4. Batang (Bars)</strong>
                                Elemen visual persegi panjang sejajar. Tinggi/panjang batang menunjukkan besarnya nilai data.
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">5. Jarak Antar Batang (Gap / Spasi)</strong>
                                Celah pemisah konsisten antar-batang. Menandakan kategori data bersifat terpisah (diskrit).
                            </div>
                            <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                                <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">6. Label & Skala Sumbu</strong>
                                Keterangan nama sumbu dan tanda interval angka yang teratur (misal kelipatan 10, 20).
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.4: Vertikal vs Horizontal -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.4 Diagram Batang Vertikal vs Horizontal</h4>
                        <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs text-[#1d1d1f]">
                                    <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                        <tr>
                                            <th class="px-4 py-3 font-semibold w-1/4">Karakteristik</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Diagram Batang Vertikal (Column Chart)</th>
                                            <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Diagram Batang Horizontal (Horizontal Bar Chart)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#e0e0e0]">
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Arah Batang</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Menjulang vertikal dari bawah ke atas.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Memanjang horizontal dari kiri ke kanan.</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Sumbu Kategori</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Sumbu X (Horizontal).</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Sumbu Y (Vertikal).</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Sumbu Nilai</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Sumbu Y (Vertikal).</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Sumbu X (Horizontal).</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 font-semibold">Kondisi Terbaik</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Jumlah kategori sedikit (3–7) dan label singkat.</td>
                                            <td class="px-4 py-3 border-l border-[#e0e0e0]">Label kategori sangat panjang agar mudah dibaca mendatar tanpa miring.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Sub 1.5: Etika Visualisasi -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.5 Aturan Etika Visualisasi Jujur (Data Ethics)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-2">1. Keharusan Zero Baseline</h5>
                                <p class="text-xs text-[#333333] leading-relaxed mb-3">
                                    Sumbu pengukuran wajib dimulai dari angka 0 (<em>Principle of Proportional Ink</em>). Memotong sumbu Y (<em>Truncated Y-Axis</em>) dengan memulainya dari angka non-nol akan membesar-besarkan perbedaan visual secara manipulatif sehingga grafik menjadi menyesatkan.
                                </p>
                            </div>
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <h5 class="text-base font-bold text-[#1d1d1f] mb-2">2. Pengurutan Batang (Sorting Bars)</h5>
                                <p class="text-xs text-[#333333] leading-relaxed mb-3">
                                    Untuk data nominal, susunlah posisi batang berdasarkan nilainya, baik terbesar ke terkecil (<em>descending</em>) atau sebaliknya (<em>ascending</em>), agar memudahkan pembaca menganalisis hirarki data.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Contoh Kasus & Visualisasi Jujur vs Menyesatkan -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Perbandingan Visualisasi: Jujur vs Menyesatkan
                </h3>

                <!-- Tabel Data Sederhana -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm mb-8">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.1: Data Pendaftaran Ekstrakurikuler SMA Merdeka</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-2.5 font-semibold">Ekstrakurikuler</th>
                                    <th class="px-4 py-2.5 font-semibold border-l border-[#e0e0e0]">Jumlah Pendaftar</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr><td class="px-4 py-2">Pramuka</td><td class="px-4 py-2 border-l border-[#e0e0e0]">120</td></tr>
                                <tr><td class="px-4 py-2">Basket</td><td class="px-4 py-2 border-l border-[#e0e0e0]">95</td></tr>
                                <tr><td class="px-4 py-2">Paskibra</td><td class="px-4 py-2 border-l border-[#e0e0e0]">85</td></tr>
                                <tr><td class="px-4 py-2">PMR</td><td class="px-4 py-2 border-l border-[#e0e0e0]">60</td></tr>
                                <tr><td class="px-4 py-2">KIR</td><td class="px-4 py-2 border-l border-[#e0e0e0]">40</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Comparison Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-emerald-50/60 border border-emerald-200 rounded-xl p-6">
                        <h5 class="text-sm font-bold text-emerald-900 mb-2 uppercase">Visualisasi Jujur (Zero Baseline)</h5>
                        <ul class="text-xs text-emerald-800 space-y-2 leading-relaxed">
                            <li>• Sumbu Y dimulai dari angka 0.</li>
                            <li>• Perbandingan tinggi batang Pramuka (120) dan Paskibra (85) terlihat proporsional sesuai nilai data aslinya.</li>
                            <li>• Pembaca mendapat gambaran objektif mengenai rasio pendaftar.</li>
                        </ul>
                    </div>

                    <div class="bg-rose-50/60 border border-rose-200 rounded-xl p-6">
                        <h5 class="text-sm font-bold text-rose-900 mb-2 uppercase">Visualisasi Menyesatkan (Truncated Axis)</h5>
                        <ul class="text-xs text-rose-800 space-y-2 leading-relaxed">
                            <li>• Sumbu Y dipotong dan dimulai dari angka 75.</li>
                            <li>• Batang Pramuka terlihat 9 KALI LEBIH TINGGI daripada Paskibra secara visual.</li>
                            <li>• Membesar-besarkan selisih data secara manipulatif dan berpotensi memicu kesimpulan yang keliru.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Latihan Pemahaman & Studi Kasus Terbimbing -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Studi Kasus Terbimbing & Diskusi Reflektif
                </h3>

                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm space-y-6">
                    <div class="bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0]">
                        <h5 class="text-sm font-bold text-[#1d1d1f] mb-1">Skenario Survei Menu Kantin Favorit</h5>
                        <p class="text-xs text-slate-600">
                            Pengurus OSIS mendata menu makanan favorit siswa: Nasi Goreng (80 siswa) dan Mie Ayam (71 siswa).
                        </p>
                    </div>

                    <div class="space-y-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 1: Membaca Anatomi & Komponen</strong>
                            <p class="mb-2">Sebutkan variabel apa yang terletak pada Sumbu X dan Y, serta jelaskan fungsi dari spasi/gap antar-batang!</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700">
                                <strong>Pembahasan:</strong> Sumbu X memuat variabel kategorikal nominal ("Jenis Menu Makanan"). Sumbu Y memuat variabel numerik diskrit ("Jumlah Siswa"). Celah/gap antar-batang menandakan bahwa kategori data bersifat diskrit dan terpisah.
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 2: Evaluasi Vertikal vs Horizontal</strong>
                            <p class="mb-2">Jika ditambahkan 15 jenis menu baru dengan nama kategori yang sangat panjang, perubahan apa yang harus dilakukan?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700">
                                <strong>Pembahasan:</strong> Grafik diubah menjadi Diagram Batang Horizontal. Nama label kategori yang panjang diletakkan di Sumbu Y secara mendatar sehingga mudah dibaca tanpa tumpang tindih.
                            </div>
                        </div>

                        <div class="p-4 bg-[#fafafc] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#0066cc] block mb-1">Pertanyaan 3: Evaluasi Keabsahan Etika Visualisasi</strong>
                            <p class="mb-2">Jika sumbu Y dipotong dan dimulai dari angka 70 sehingga Nasi Goreng terlihat 10x lebih tinggi dari Mie Ayam, apakah tindakan ini dibenarkan?</p>
                            <div class="p-3 bg-white border border-[#e0e0e0] rounded text-slate-700">
                                <strong>Pembahasan:</strong> Tidak dibenarkan karena melanggar prinsip Zero Baseline dan Proportional Ink. Visualisasi yang dipotong menjadi menyesatkan (misleading) karena membesar-besarkan selisih kecil.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 1 (Bab 2)
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Fungsi Diagram Batang:</strong> Membandingkan nilai/frekuensi antar-kategori terpisah dan menyoroti nilai tertinggi/terpendek secara visual.</li>
                    <li>• <strong>Anatomi Komponen:</strong> Judul, Sumbu X, Sumbu Y, Batang, Gap pemisah (menandakan data diskrit), Skala, dan Label Sumbu.</li>
                    <li>• <strong>Vertikal vs Horizontal:</strong> Gunakan Batang Horizontal jika nama label kategori sangat panjang agar terbaca mendatar dengan rapi.</li>
                    <li>• <strong>Etika Visualisasi Jujur:</strong> Wajib menggunakan <em>Zero Baseline</em> (sumbu dimulai dari 0) dan mengurutkan batang (<em>sorting bars</em>) untuk analisis yang tepat.</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Seorang siswa kelas X ingin menyajikan data jumlah piala kejuaraan yang diperoleh sekolah berdasarkan 4 bidang ekstrakurikuler (Pramuka, Paskibra, PMR, dan Robotik). Manakah alasan yang paling tepat mengapa Diagram Batang merupakan jenis visualisasi yang paling sesuai untuk data tersebut?"
                    data-opt-a="Karena diagram batang digunakan untuk menunjukkan tren perubahan data berlanjut dari waktu ke waktu secara kronologis."
                    data-opt-b="Karena diagram batang sangat efektif untuk membandingkan besaran nilai atau frekuensi antar-kategori terpisah secara visual."
                    data-opt-c="Karena diagram batang mewakili data kontrol pecahan dalam sektor lingkaran bernilai total 100%."
                    data-opt-d="Karena diagram batang secara khusus dirancang untuk mengukur korelasi antara dua variabel numerik kontinu."
                    data-opt-e="Karena diagram batang tidak memerlukan adanya sumbu koordinat maupun skala angka."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Perhatikan komponen-komponen visualisasi data berikut: (1) Chart Title, (2) Grid Lines, (3) Zero Baseline, (4) Batang Berimpit Tanpa Spasi. Komponen anatomi yang WAJIB ada pada Diagram Batang standar agar data kategorikal terpisah dapat dibaca secara valid dan tidak tertukar dengan Histogram ditunjukkan oleh nomor...."
                    data-opt-a="1, 2, dan 3"
                    data-opt-b="1, 3, dan 4"
                    data-opt-c="2 dan 4 saja"
                    data-opt-d="4 saja"
                    data-opt-e="1, 2, 3, dan 4"
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Tim peneliti sekolah mengumpulkan data mengenai 'Sepuluh Faktor Utama Penyebab Siswa Terlambat Masuk Sekolah' di mana setiap nama faktor dituliskan dalam kalimat deskriptif yang cukup panjang. Berdasarkan prinsip efisiensi desain visualisasi data, bentuk diagram batang yang paling tepat digunakan beserta alasannya adalah...."
                    data-opt-a="Diagram Batang Vertikal (Column Chart), karena batang vertikal selalu lebih estetis untuk semua jenis data."
                    data-opt-b="Diagram Batang Horizontal (Horizontal Bar Chart), karena label kategori yang panjang dapat dibaca secara mendatar di Sumbu Y tanpa tumpang tindih."
                    data-opt-c="Diagram Lingkaran 3D, karena dapat menampung teks kalimat panjang di dalam irisan lingkaran."
                    data-opt-d="Diagram Garis (Line Chart), karena faktor penyebab terlambat merupakan data deret berkala (time series)."
                    data-opt-e="Diagram Batang Bertumpuk (Stacked Bar Chart) tanpa skala angka."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah surat kabar menampilkan grafik batang perbandingan tingkat kelulusan ujian dua sekolah. Pada grafik tersebut, batang Sekolah A terlihat 4 kali lebih tinggi daripada Sekolah B. Namun saat skala Sumbu Y diperiksa, ternyata Sumbu Y dipotong (truncated) dan dimulai dari angka 90%, di mana tingkat kelulusan Sekolah A adalah 94% dan Sekolah B adalah 91%. Evaluasi kritis yang paling tepat terhadap grafik berita tersebut adalah...."
                    data-opt-a="Grafik tersebut valid karena skala sumbu Y bebas dimulai dari angka berapa saja."
                    data-opt-b="Grafik tersebut menyesatkan (misleading) karena memotong sumbu Y melanggar Principle of Proportional Ink, sehingga membesar-besarkan selisih 3% seolah-olah terjadi perbedaan 4 kali lipat."
                    data-opt-c="Grafik tersebut salah karena seharusnya menggunakan diagram piktogram gambar manusia."
                    data-opt-d="Grafik tersebut sudah jujur karena angka persentase dituliskan di atas batang."
                    data-opt-e="Grafik tersebut tergolong sebagai histogram kontinu yang akurat."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Seorang desainer grafis diminta membuat visualisasi data penjualan 5 jenis produk buku di koperasi sekolah (Komik, Novel, Pelajaran, Kamus, Majalah). Agar diagram batang yang dihasilkan jujur, komunikatif, dan mudah dianalisis hierarkinya oleh pembeli, dua langkah etis yang wajib diterapkan desainer tersebut adalah...."
                    data-opt-a="Memulai skala Sumbu Y dari angka 0 (Zero Baseline) dan mengurutkan batang berdasarkan nilainya (Sorting Bars)."
                    data-opt-b="Memotong sumbu Y dari angka terendah penjualan dan memberi efek warna 3D yang ramai."
                    data-opt-c="Menghilangkan label sumbu dan mengubah warna setiap batang secara acak non-monotonik."
                    data-opt-d="Menghapus jarak/gap antar-batang dan menggabungkan semua data menjadi satu garis lurus."
                    data-opt-e="Mengubah skala sumbu Y menjadi skala non-linear yang tidak konsisten."
                    data-answer="A">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'diagram-batang'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Diagram Batang (Bar Chart)',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 2 Sub 1: Diagram Batang (Bar Chart) berhasil diperbarui!');
    }
}