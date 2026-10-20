<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_02_PengolahanDataSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 1)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 1 belum dibuat! Pastikan ChapterSeeder / MateriBab1Seeder sudah dijalankan.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::where('slug', 'pengolahan-data')->delete();

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
                        <p class="leading-relaxed">Menjelaskan tahapan pemeriksaan dan pembersihan data.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                        <p class="leading-relaxed">Menerapkan teknik pengelompokan, pengurutan, dan perhitungan data.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                        <p class="leading-relaxed">Menyajikan hasil pengolahan data.</p>
                    </li>
                </ul>
            </div>

            <!-- SEKSI 1: Menjelaskan Tahapan Pemeriksaan dan Pembersihan Data -->
            <div>
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    1. Tahapan Pemeriksaan dan Pembersihan Data (Data Cleaning)
                </h3>

                <div class="space-y-8">
                    <!-- Sub 1.1: Memeriksa Data -->
                    <div>
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Memeriksa Data</h4>
                        <p class="text-[#333333] leading-relaxed mb-4">
                            Sebelum data mentah diolah atau dianalisis untuk pengambilan keputusan, langkah paling awal yang wajib dilakukan adalah pemeriksaan data. Data mentah yang baru saja dikumpulkan dari lapangan, formulir digital, atau sensor sering kali masih berada dalam kondisi data kotor (<em>dirty data</em>). Data kotor dapat berisi nilai yang tidak logis, salah input, format tidak seragam, atau informasi yang hilang.
                        </p>
                        
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] space-y-3">
                            <h5 class="font-semibold text-[#1d1d1f] text-base mb-2">Tujuan Utama Pemeriksaan Data:</h5>
                            <ul class="list-disc list-inside space-y-2 text-sm text-[#333333] leading-relaxed">
                                <li><strong>Memastikan Akurasi dan Validitas:</strong> Menguji apakah data yang tercatat sudah sesuai dengan kondisi nyata di lapangan dan memenuhi batasan yang ditetapkan.</li>
                                <li><strong>Memeriksa Kelengkapan Data:</strong> Memastikan tidak ada atribut atau variabel penting yang dikosongkan.</li>
                                <li><strong>Menerapkan Prinsip Garbage In, Garbage Out (GIGO):</strong> Prinsip ini menegaskan bahwa jika data yang dimasukkan ke dalam sistem pemrosesan berstatus kotor atau salah (<em>garbage in</em>), maka hasil analisis maupun prediksi yang dihasilkan dipastikan salah dan menyesatkan (<em>garbage out</em>).</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sub 1.2: Membersihkan Data -->
                    <div class="mt-10">
                        <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Membersihkan Data (Data Cleaning)</h4>
                        <p class="text-[#333333] leading-relaxed mb-6">
                            Pembersihan data (<em>data cleaning</em> atau <em>data wrangling</em>) adalah tahap kritis dalam siklus analisis data yang melibatkan kegiatan mendeteksi, mengoreksi, atau menghapus kesalahan, ketidakkonsistenan, duplikasi, dan pencilan (<em>outliers</em>) pada dataset.
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Langkah 1</span>
                                <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Menangani Data Kosong / Hilang (Missing Values)</h5>
                                <p class="text-xs text-[#7a7a7a] mb-3"><strong>Penyebab:</strong> Responden mengosongkan jawaban, kegagalan sistem pencatatan, atau berkas rusak.</p>
                                <div class="space-y-2 text-xs text-[#333333]">
                                    <p><strong>• Penghapusan (Deletion):</strong> Membuang baris atau kolom yang mengandung nilai hilang jika jumlah data hilang sangat sedikit atau sebaliknya sangat dominan.</p>
                                    <p><strong>• Imputasi Nilai (Imputation):</strong> Mengisi nilai yang hilang menggunakan estimasi nilai statistik tertentu, seperti rata-rata (<em>mean</em>) atau nilai tengah (<em>median</em>).</p>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Langkah 2</span>
                                <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Menangani Data Duplikat (Handling Duplicates)</h5>
                                <p class="text-xs text-[#7a7a7a] mb-3"><strong>Penyebab:</strong> Penekanan tombol kirim berulang kali oleh pengguna, penggabungan data dari beberapa sumber, atau kesalahan sistem.</p>
                                <div class="text-xs text-[#333333]">
                                    <p><strong>• Penanganan:</strong> Mengidentifikasi baris data yang memiliki entitas dan nilai atribut identik, kemudian menghapus duplikasi tersebut agar tidak membiaskan perhitungan statistik (seperti frekuensi membengkak secara tidak akurat).</p>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Langkah 3</span>
                                <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Memperbaiki Kesalahan Ketik & Format (Formatting & Typos)</h5>
                                <p class="text-xs text-[#7a7a7a] mb-3"><strong>Penyebab:</strong> Kesalahan penulisan manual (<em>human error</em>) atau perbedaan standar pencatatan.</p>
                                <div class="space-y-2 text-xs text-[#333333]">
                                    <p><strong>• Standarisasi Format:</strong> Menyelaraskan penulisan tanggal (contoh: DD/MM/YYYY), huruf kapital, serta satuan pengukuran.</p>
                                    <p><strong>• Koreksi Teks (Typos):</strong> Memperbaiki kesalahan penulisan kata (contoh: menyelaraskan "Sma", "SMA", "sma1" menjadi standar tunggal "SMA").</p>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] shadow-sm">
                                <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Langkah 4</span>
                                <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Menangani Data Menyimpang (Handling Outliers)</h5>
                                <p class="text-xs text-[#7a7a7a] mb-3"><strong>Pengertian:</strong> Nilai data ekstrem yang berada sangat jauh di luar pola umum atau rentang mayoritas data lainnya.</p>
                                <div class="text-xs text-[#333333]">
                                    <p><strong>• Penanganan:</strong> Dideteksi menggunakan grafik (box plot/scatter plot) dan metode statistik. Jika terbukti kesalahan input (misal nilai ujian tertulis 800 pada skala 0–100), data harus dikoreksi atau dihapus (<em>trimming</em>).</p>
                                </div>
                            </div>
                        </div>

                        <!-- Contoh Kasus Sebelum vs Sesudah Data Cleaning -->
                        <div class="mt-8 space-y-6">
                            <h5 class="text-lg font-bold text-[#1d1d1f]">Studi Kasus Skenario Sekolah: Data Pendaftaran Ekstrakurikuler</h5>
                            
                            <!-- Tabel Sebelum -->
                            <div class="bg-white border border-red-200 rounded-xl overflow-hidden shadow-sm">
                                <div class="bg-red-50 py-3 px-5 border-b border-red-200">
                                    <h6 class="text-xs font-bold text-red-900 uppercase">Tabel 2.1a: Data Mentah (Sebelum Data Cleaning)</h6>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-xs text-[#1d1d1f]">
                                        <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                            <tr>
                                                <th class="px-4 py-3 font-semibold">No</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nama Siswa</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Kelas</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Tanggal Lahir</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nilai Seleksi</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Status</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] text-red-700">Permasalahan Data</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#e0e0e0]">
                                            <tr>
                                                <td class="px-4 py-3">1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Andi Pratama</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">12/05/2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">85</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-emerald-600 font-medium">Data Normal</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">2</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Budi Santoso</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">2008-06-15</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] font-bold text-red-600">900</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-red-600">Outlier (Nilai > 100) & Format tanggal beda</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">3</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Andi Pratama</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">12/05/2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">85</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-red-600">Data Duplikat (Sama persis dengan No 1)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">4</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Citra Dewi</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-2</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-red-600 font-bold">-</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">78</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-red-600">Missing Value (Tanggal Lahir Kosong)</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">5</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Doni kurniawan</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">x-2</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">01-11-2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">82</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-red-600">Format tidak konsisten & typo kapital</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tabel Sesudah -->
                            <div class="bg-white border border-emerald-200 rounded-xl overflow-hidden shadow-sm">
                                <div class="bg-emerald-50 py-3 px-5 border-b border-emerald-200">
                                    <h6 class="text-xs font-bold text-emerald-900 uppercase">Tabel 2.1b: Data Bersih (Setelah Data Cleaning)</h6>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-xs text-[#1d1d1f]">
                                        <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                            <tr>
                                                <th class="px-4 py-3 font-semibold">No</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nama Siswa</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Kelas</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Tanggal Lahir</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nilai Seleksi</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Status</th>
                                                <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] text-emerald-800">Tindakan Pembersihan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#e0e0e0]">
                                            <tr>
                                                <td class="px-4 py-3">1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Andi Pratama</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">12/05/2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">85</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-slate-500">-</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">2</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Budi Santoso</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-1</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">15/06/2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] font-bold text-emerald-700">90</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-emerald-800">Menghapus angka 0 berlebih (Outlier) & menyelaraskan format tanggal.</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">3</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Citra Dewi</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-2</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] font-bold text-emerald-700">01/01/2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">78</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-emerald-800">Imputasi nilai tanggal standar / penelusuran ulang berkas.</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">4</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Doni Kurniawan</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">X-2</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">01/11/2008</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">82</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0]">Lulus</td>
                                                <td class="px-4 py-3 border-l border-[#e0e0e0] text-emerald-800">Merapikan huruf kapital pada nama, kelas, dan status.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 bg-slate-50 border-t border-[#e0e0e0] text-[11px] text-slate-600">
                                    <em>Catatan: Data duplikat "Andi Pratama" pada baris ke-3 tabel mentah telah berhasil dihapus.</em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: Menerapkan Teknik Pengelompokan, Pengurutan, dan Perhitungan Data -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    2. Teknik Pengelompokan, Pengurutan, dan Perhitungan Data
                </h3>
                <p class="text-[#333333] leading-relaxed mb-6">
                    Setelah data berada dalam kondisi bersih dan konsisten, langkah selanjutnya adalah melakukan pemrosesan data menggunakan teknik pengelompokan, pengurutan, dan perhitungan statistik (agregasi).
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                        <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Teknik 1</span>
                        <h4 class="text-xl font-bold text-[#1d1d1f] my-2">Mengelompokkan (Grouping)</h4>
                        <p class="text-xs text-[#333333] leading-relaxed">
                            Mengategorikan baris data berdasarkan nilai kolom tertentu (misal: mengelompokkan siswa berdasarkan "Kelas" atau "Jenis Ekstrakurikuler") guna menyederhanakan dataset kompleks.
                        </p>
                    </div>

                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                        <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Teknik 2</span>
                        <h4 class="text-xl font-bold text-[#1d1d1f] my-2">Mengurutkan (Sorting)</h4>
                        <p class="text-xs text-[#333333] leading-relaxed mb-2">
                            Menata ulang urutan data berdasarkan satu atau beberapa kolom:
                        </p>
                        <ul class="text-xs text-[#333333] space-y-1">
                            <li>• <strong>Ascending:</strong> Terkecil ke terbesar (0➔9, A➔Z).</li>
                            <li>• <strong>Descending:</strong> Terbesar ke terkecil (9➔0, Z➔A).</li>
                        </ul>
                    </div>

                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                        <span class="text-xs font-bold text-[#0066cc] uppercase tracking-wider">Teknik 3</span>
                        <h4 class="text-xl font-bold text-[#1d1d1f] my-2">Menghitung (Aggregation)</h4>
                        <p class="text-xs text-[#333333] leading-relaxed">
                            Merangkum sekumpulan nilai numerik menjadi satu nilai statistik yang mewakili keseluruhan kelompok (SUM, AVERAGE, MEDIAN, Count, dan Persentase).
                        </p>
                    </div>
                </div>

                <!-- Fungsi Agregasi -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl p-6 shadow-sm mb-10">
                    <h4 class="text-xl font-bold text-[#1d1d1f] mb-4">Fungsi Perhitungan Statistik Utama (Agregasi)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-[#333333]">
                        <div class="p-4 bg-[#f5f5f7] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">1. SUM (Total)</strong>
                            Menjumlahkan seluruh nilai numerik dalam suatu variabel.
                        </div>
                        <div class="p-4 bg-[#f5f5f7] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">2. AVERAGE / Mean (Rata-rata)</strong>
                            Total nilai (SUM) dibagi dengan banyaknya data (n).
                        </div>
                        <div class="p-4 bg-[#f5f5f7] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">3. MEDIAN (Nilai Tengah)</strong>
                            Nilai di posisi tengah setelah data diurutkan secara <em>ascending</em>.
                        </div>
                        <div class="p-4 bg-[#f5f5f7] rounded-lg border border-[#e0e0e0]">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">4. Frekuensi (Count)</strong>
                            Menhitung jumlah cacah kemunculan data/entitas.
                        </div>
                        <div class="p-4 bg-[#f5f5f7] rounded-lg border border-[#e0e0e0] md:col-span-2">
                            <strong class="text-sm font-bold text-[#1d1d1f] block mb-1">5. Persentase (Percentage)</strong>
                            Rasio proporsi suatu kelompok dibandingkan dengan keseluruhan data dikalikan 100%.
                        </div>
                    </div>
                </div>

                <!-- Contoh Tabel Agregasi Kantin -->
                <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm">
                    <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0]">
                        <h5 class="text-xs font-bold text-[#1d1d1f] uppercase">Tabel 2.2: Contoh Hasil Pengolahan (Grouping, Sorting Descending, dan Agregasi Kantin Kejujuran)</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-[#1d1d1f]">
                            <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">Kategori Makanan</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Nama Produk</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Harga Satuan (Rp)</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Jumlah Terjual</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Total Penjualan (SUM)</th>
                                    <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0]">Persentase (%)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#e0e0e0]">
                                <tr>
                                    <td class="px-4 py-3">Makanan Berat</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">Nasi Goreng</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">10.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">50 Porsi</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0] font-medium">Rp 500.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">40,0%</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">Makanan Berat</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">Mie Ayam</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">8.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">35 Porsi</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0] font-medium">Rp 280.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">22,4%</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">Camilan</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">Roti Bakar</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">5.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">40 Porsi</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0] font-medium">Rp 200.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">16,0%</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">Camilan</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">Keripik Pisang</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">3.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">45 Porsi</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0] font-medium">Rp 135.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">10,8%</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">Minuman</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">Es Teh Manis</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">3.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">45 Porsi</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0] font-medium">Rp 135.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">10,8%</td>
                                </tr>
                                <tr class="bg-blue-50 font-bold border-t-2 border-[#0066cc]">
                                    <td class="px-4 py-3" colspan="2">TOTAL AGREGASI</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">5 Jenis Produk</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">215 Porsi</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">Rp 1.250.000</td>
                                    <td class="px-4 py-3 border-l border-[#e0e0e0]">100,0%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-[#fafafc] border-t border-[#e0e0e0] text-xs text-[#333333] space-y-1">
                        <p><strong>Hasil Perhitungan Agregasi Tambahan:</strong></p>
                        <p>• <strong>Rata-rata (AVERAGE) Penjualan per Produk:</strong> Rp 1.250.000 / 5 = <strong>Rp 250.000</strong></p>
                        <p>• <strong>Nilai Tengah (MEDIAN) Penjualan Produk:</strong> <strong>Rp 200.000</strong> (Nilai posisi ke-3 setelah data diurutkan: 135rb, 135rb, [200rb], 280rb, 500rb).</p>
                    </div>
                </div>
            </div>

            <!-- SEKSI 3: Menyajikan Hasil Pengolahan Data -->
            <div class="mt-20">
                <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    3. Menyajikan Hasil Pengolahan Data (Data Presentation)
                </h3>
                <p class="text-[#333333] leading-relaxed mb-6">
                    Menyajikan data (<em>data presentation</em>) adalah tahap akhir pengolahan data yang bertujuan untuk menyatukan dan menyampaikan wawasan hasil analisis kepada pembaca secara jelas, komunikatif, dan menarik.
                </p>

                <!-- Sub 3.1: Tabel Ringkasan vs Diagram -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                        <h4 class="text-xl font-bold text-[#1d1d1f] mb-2">1. Tabel Ringkasan (Summary Table)</h4>
                        <p class="text-xs text-[#333333] leading-relaxed mb-3">
                            Format penyajian data terstruktur menggunakan susunan baris dan kolom yang memuat nilai-nilai angka hasil agregasi statistik.
                        </p>
                        <p class="text-xs font-semibold text-[#0066cc]">Kelebihan: Menyajikan angka yang presisi, pasti, rinci, dan memungkinkan pembaca melihat nilai persis dari setiap variabel.</p>
                    </div>

                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                        <h4 class="text-xl font-bold text-[#1d1d1f] mb-2">2. Diagram / Grafik (Charts & Graphs)</h4>
                        <p class="text-xs text-[#333333] leading-relaxed mb-3">
                            Representasi visual dari data angka yang diubah menjadi bentuk geometris (seperti batang, garis, lingkaran, atau titik).
                        </p>
                        <p class="text-xs font-semibold text-[#0066cc]">Kelebihan: Mempercepat pemahaman pembaca terhadap pola, tren perkembangan, dan perbandingan antar kategori secara komunikatif.</p>
                    </div>
                </div>

                <!-- Sub 3.2: Kapan Menggunakan Tabel vs Grafik -->
                <div class="mb-10">
                    <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">Panduan Pemilihan: Tabel Ringkasan vs Grafik</h4>
                    <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden shadow-sm">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs text-[#1d1d1f]">
                                <thead class="bg-[#fafafc] border-b border-[#e0e0e0]">
                                    <tr>
                                        <th class="px-4 py-3 font-semibold w-1/4">Kriteria Pemilihan</th>
                                        <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Gunakan Tabel Ringkasan Jika...</th>
                                        <th class="px-4 py-3 font-semibold border-l border-[#e0e0e0] w-3/8">Gunakan Grafik / Diagram Jika...</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e0e0e0]">
                                    <tr>
                                        <td class="px-4 py-3 font-semibold">Tujuan Utama</td>
                                        <td class="px-4 py-3 border-l border-[#e0e0e0]">Pembaca membutuhkan angka pasti, detail rinci, dan presisi tinggi dari setiap data.</td>
                                        <td class="px-4 py-3 border-l border-[#e0e0e0]">Pembaca ingin melihat pola, tren, atau perbandingan visual secara cepat.</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 font-semibold">Kompleksitas Data</td>
                                        <td class="px-4 py-3 border-l border-[#e0e0e0]">Ingin membandingkan beberapa variabel dengan satuan yang berbeda sekaligus secara berdampingan.</td>
                                        <td class="px-4 py-3 border-l border-[#e0e0e0]">Ingin menunjukkan hubungan sederhana antara 1 atau 2 variabel utama secara intuitif.</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 font-semibold">Target Pembaca</td>
                                        <td class="px-4 py-3 border-l border-[#e0e0e0]">Pembaca ahli, peneliti, atau manajer yang memerlukan rincian nilai untuk analisis mendalam.</td>
                                        <td class="px-4 py-3 border-l border-[#e0e0e0]">Masyarakat umum, siswa, atau pemangku kepentingan yang membutuhkan ringkasan wawasan cepat.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Sub 3.3: Matriks Jenis Grafik -->
                <div>
                    <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">Matriks Panduan Pemilihan Jenis Grafik</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-[#333333]">
                        <div class="p-5 bg-[#fafafc] rounded-xl border border-[#e0e0e0]">
                            <h5 class="text-base font-bold text-[#1d1d1f] mb-1">Diagram Batang (Bar Chart)</h5>
                            <p class="mb-2"><strong>Fungsi:</strong> Membandingkan nilai numerik atau frekuensi antar kategori yang berbeda.</p>
                            <p class="text-slate-600"><strong>Penggunaan Terbaik:</strong> Membandingkan besaran data kategorikal secara sejajar (contoh: jumlah siswa antar kelas).</p>
                        </div>

                        <div class="p-5 bg-[#fafafc] rounded-xl border border-[#e0e0e0]">
                            <h5 class="text-base font-bold text-[#1d1d1f] mb-1">Diagram Garis (Line Chart)</h5>
                            <p class="mb-2"><strong>Fungsi:</strong> Menampilkan perkembangan atau perubahan data berlanjut dari waktu ke waktu (time-series).</p>
                            <p class="text-slate-600"><strong>Penggunaan Terbaik:</strong> Data kronologis (contoh: tren pendaftaran siswa 10 tahun terakhir atau pergerakan nilai).</p>
                        </div>

                        <div class="p-5 bg-[#fafafc] rounded-xl border border-[#e0e0e0]">
                            <h5 class="text-base font-bold text-[#1d1d1f] mb-1">Diagram Lingkaran (Pie Chart)</h5>
                            <p class="mb-2"><strong>Fungsi:</strong> Menunjukkan proporsi atau persentase kontribusi tiap bagian terhadap keseluruhan (100%).</p>
                            <p class="text-slate-600"><strong>Penggunaan Terbaik:</strong> Pembagian persentase terhadap total (contoh: alokasi pengeluaran uang saku bulanan).</p>
                        </div>

                        <div class="p-5 bg-[#fafafc] rounded-xl border border-[#e0e0e0]">
                            <h5 class="text-base font-bold text-[#1d1d1f] mb-1">Grafik Pencar (Scatter Plot)</h5>
                            <p class="mb-2"><strong>Fungsi:</strong> Menunjukkan pola hubungan atau korelasi antara dua variabel kuantitatif/numerik.</p>
                            <p class="text-slate-600"><strong>Penggunaan Terbaik:</strong> Menganalisis hubungan variabel X dan Y (contoh: hubungan tinggi badan vs berat badan).</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rangkuman Ringkas Sub-Bab 2 -->
            <div class="mt-16 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6 md:p-8">
                <h4 class="text-lg font-bold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">
                    Rangkuman Ringkas Sub-Bab 2
                </h4>
                <ul class="space-y-3 text-xs text-[#333333] leading-relaxed">
                    <li>• <strong>Pemeriksaan Data & GIGO:</strong> Data mentah harus diperiksa akurasi dan validitasnya. Prinsip <em>Garbage In, Garbage Out</em> (GIGO) menegaskan bahwa data kotor menghasilkan keputusan yang salah.</li>
                    <li>• <strong>4 Langkah Data Cleaning:</strong> Penanganan <em>Missing Values</em> (imputasi/penghapusan), <em>Duplikasi</em> (penghapusan ganda), <em>Format & Typos</em> (standarisasi), serta <em>Outliers</em> (koreksi data ekstrem).</li>
                    <li>• <strong>Teknik Pemrosesan Data:</strong> <em>Grouping</em> (pengategorian), <em>Sorting</em> (pengurutan ascending/descending), dan <em>Agregasi</em> (SUM, AVERAGE, MEDIAN, Count, Persentase).</li>
                    <li>• <strong>Penyajian Data:</strong> Gunakan <em>Tabel Ringkasan</em> jika membutuhkan presisi angka rinci, dan gunakan <em>Grafik/Diagram</em> jika ingin memahami pola, tren, atau perbandingan secara visual.</li>
                </ul>
            </div>

            <!-- Mini Quiz / Soal Latihan Pilihan Ganda (HOTS) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Seorang staf TU sekolah mengunduh file spreadsheet formulir pendaftaran ulang siswa. Saat diperiksa, ditemukan beberapa permasalahan: (1) Kolom Nomor HP Orang Tua milik beberapa siswa kosong, (2) Nama siswa Rizky Febrian tercatat sebanyak dua kali dengan seluruh data atribut yang sama persis, dan (3) Pada kolom Tinggi Badan, salah satu siswa tertulis 1650 cm (seharusnya 165 cm). Urutan langkah data cleaning yang paling tepat untuk menangani ketiga permasalahan tersebut secara berturut-turut adalah...."
                    data-opt-a="Imputasi nilai rata-rata, penghapusan baris duplikat, dan koreksi pencilan (outlier)."
                    data-opt-b="Penghapusan seluruh kolom, standarisasi huruf kapital, dan pemotongan sumbu Y."
                    data-opt-c="Pemutakhiran database, penambahan variabel, dan pengubahan ke diagram garis."
                    data-opt-d="Pengurutan data descending, grouping kelas, dan kalkulasi SUM."
                    data-opt-e="Standarisasi format tanggal, penyaringan data (filtering), dan imputasi median."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam siklus Data Science, terdapat istilah populer Garbage In, Garbage Out (GIGO). Jika seorang analis data melewatkan tahap Data Cleaning dan langsung menganalisis data mentah yang mengandung banyak kesalahan ketik, data kosong, serta data duplikat, dampak paling berbahaya terhadap hasil analisis adalah...."
                    data-opt-a="Proses perhitungan algoritma komputer menjadi 10 kali lebih cepat."
                    data-opt-b="Hasil analisis dan visualisasi yang dihasilkan menjadi bias, tidak akurat, dan mengarahkan pada pengambilan keputusan yang salah."
                    data-opt-c="Data secara otomatis berubah menjadi data terstruktur tanpa perlu format Excel."
                    data-opt-d="Nilai rata-rata (mean) dan nilai tengah (median) otomatis berada pada titik nol."
                    data-opt-e="Grafik yang dihasilkan secara otomatis berubah menjadi 3D Pie Chart."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Data nilai hasil tes simulasi OSK Komputer 5 siswa adalah sebagai berikut: 60, 85, 70, 95, 70. Guru Informatika ingin menentukan siswa yang berada tepat di posisi nilai tengah (median) untuk diberikan penghargaan. Langkah prosedural dan hasil perhitungan median yang benar adalah...."
                    data-opt-a="Menjumlahkan seluruh nilai lalu dibagi 5, sehingga median bernilai 76."
                    data-opt-b="Langsung mengambil angka yang berada di posisi ketiga sebelum diurutkan, yaitu 70."
                    data-opt-c="Mengurutkan data secara ascending menjadi 60, 70, 70, 85, 95, lalu mengambil nilai posisi tengah ke-3, yaitu 70."
                    data-opt-d="Mengelompokkan data berdasarkan nilai tertinggi, sehingga median bernilai 95."
                    data-opt-e="Menghitung selisih nilai terbesar dan terkecil, sehingga median bernilai 35."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pengelola perpustakaan sekolah ingin mengetahui proporsi persentase peminjaman buku berdasarkan kategori (Komik, Novel, Pelajaran, Ensiklopedia) selama satu semester. Dari total 1.000 transaksi peminjaman, kategori Buku Pelajaran dipinjam sebanyak 450 kali. Teknik agregasi dan perhitungan rasio persentase yang tepat untuk kategori Buku Pelajaran adalah...."
                    data-opt-a="AVERAGE = 1.000 / 450 x 100% = 222%"
                    data-opt-b="PERSENTASE = (450 / 1.000) x 100% = 45%"
                    data-opt-c="SUM = 1.000 + 450 = 1.450%"
                    data-opt-d="MEDIAN = (1.000 - 450) / 2 = 275%"
                    data-opt-e="FREKUENSI = 450 x 1.000 = 450.000%"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Kepala Sekolah meminta Laporan Perkembangan Jumlah Siswa Baru yang mendaftar di SMA Merdeka selama 10 tahun terakhir (tahun 2015 hingga 2024) untuk melihat tren kenaikan atau penurunan pendaftar secara cepat saat rapat dinas. Bentuk penyajian data yang paling efektif dan tepat sesuai dengan tujuan tersebut adalah...."
                    data-opt-a="Tabel Distribusi Frekuensi Kualitatif tanpa angka total."
                    data-opt-b="Diagram Lingkaran (Pie Chart) dengan 10 potongan warna acak."
                    data-opt-c="Diagram Garis (Line Chart) karena sangat efektif menampilkan tren perubahan data berlanjut dari waktu ke waktu (time-series)."
                    data-opt-d="Grafik Pencar (Scatter Plot) tiga dimensi."
                    data-opt-e="Teks narasi panjang tanpa tabel maupun grafik."
                    data-answer="C">
                </div>
            </div>

        </div>
        EOT;

        Material::updateOrCreate(
            ['slug' => 'pengolahan-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Pemeriksaan dan Pengolahan Data',
                'type' => 'text',
                'sequence' => 2,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 1 Sub 2: Pemeriksaan dan Pengolahan Data berhasil diperbarui!');
    }
}