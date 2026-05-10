<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_01_KonsepClusteringSeeder extends Seeder
{
    public function run(): void
    {
        $chapterId = Chapter::where('sequence', 3)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 3 belum dibuat! Jalankan MateriBab2Seeder dulu.');
            return;
        }

        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">

                <div class="mb-12 bg-gradient-to-r from-emerald-900/40 to-slate-900/40 border-l-4 border-emerald-500 p-6 md:p-8 rounded-r-2xl shadow-[0_5px_20px_rgba(16,185,129,0.15)] relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-8xl opacity-10 rotate-12">🎯</div>
                    <h3 class="text-xl md:text-2xl font-black text-emerald-400 mb-5 flex items-center gap-3">
                        <span class="p-2 bg-emerald-500/20 rounded-lg text-emerald-300 shadow-inner">🎯</span> 
                        Tujuan Pembelajaran Bab 3
                    </h3>
                    <ul class="space-y-4 text-gray-200">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">1</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>mengoperasikan media web tutorial interaktif</strong> dengan menyusun alur dasar (menginput, membaca, dan mengolah data) untuk menemukan pola atau struktur tersembunyi pada data tanpa label sebagai fondasi dalam pengambilan keputusan.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">2</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>menerapkan algoritma K-Means Clustering</strong> untuk mengelompokkan data berdasarkan kemiripan (jarak matematis) melalui proses simulasi iterasi centroid hingga stabil (konvergen), guna menghasilkan prediksi pengelompokan yang efektif dan efisien.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">3</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>mengevaluasi jumlah klaster (K) yang paling optimal</strong> menggunakan panduan visual dari Metode Elbow (berdasarkan perhitungan nilai Inertia/SSE) sehingga menghasilkan model pengelompokan yang rasional dan optimal.</p>
                        </li>
                    </ul>
                </div>

                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none transition-opacity group-hover:opacity-0">
                            <span class="text-red-500 animate-pulse">●</span> INTRO
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/UBMXAQ8K454?rel=0&modestbranding=1" 
                                title="Video Pengantar Clustering" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas sebelum mulai menjelajah, ya!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-purple-900 p-6 md:p-8 rounded-3xl border border-purple-500 shadow-xl relative overflow-hidden mb-12">
                    <div class="absolute -right-10 -bottom-10 text-[10rem] opacity-5 pointer-events-none">🧩</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-6 relative z-10" style="line-height: 1.5;">
                        A. Apa itu Clustering?
                    </h3>
                    
                    <div class="relative z-10 space-y-6">
                        
                        <div class="space-y-4">
                            <p class="text-lg leading-relaxed text-gray-200 font-medium">
                                <em>Clustering</em> (pengelompokan) adalah teknik paling utama dalam <strong class="text-yellow-300">Unsupervised Learning</strong> (pembelajaran mesin tanpa supervisi). 
                            </p>
                            <p class="text-base text-gray-300 leading-relaxed">
                                Dalam teknik ini, komputer diminta untuk mengelompokkan titik-titik data yang memiliki karakteristik serupa ke dalam satu wilayah atau grup yang sama <strong class="text-white">tanpa diberi tahu "kunci jawaban"</strong> sebelumnya.
                            </p>
                            <p class="text-base text-gray-300 leading-relaxed">
                                Berbeda dengan analisis data biasa, <em>clustering</em> berfokus pada <strong>Pengenalan Pola (Pattern Recognition)</strong>. Prinsip kerja utamanya bertumpu pada dua hal:
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-black/30 p-5 md:p-6 rounded-2xl border border-white/10 backdrop-blur-sm shadow-inner">
                                <h4 class="text-green-400 font-bold mb-3 flex items-center gap-3 text-lg border-b border-gray-700/50 pb-2">
                                    <span class="text-2xl drop-shadow">🫂</span> 1. Kemiripan Internal
                                </h4>
                                <span class="text-[10px] text-green-500/80 font-mono tracking-widest uppercase block mb-2">(Intraclass Similarity)</span>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    Memaksimalkan kemiripan data di dalam satu kelompok yang sama. <em>Artinya, anggota di dalam satu kelompok harus semirip mungkin.</em>
                                </p>
                            </div>
                            
                            <div class="bg-black/30 p-5 md:p-6 rounded-2xl border border-white/10 backdrop-blur-sm shadow-inner">
                                <h4 class="text-red-400 font-bold mb-3 flex items-center gap-3 text-lg border-b border-gray-700/50 pb-2">
                                    <span class="text-2xl drop-shadow">🙅‍♂️</span> 2. Perbedaan Antar-Kelompok
                                </h4>
                                <span class="text-[10px] text-red-500/80 font-mono tracking-widest uppercase block mb-2">(Interclass Dissimilarity)</span>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    Memaksimalkan perbedaan antara kelompok yang satu dengan kelompok yang lain. <em>Artinya, batas antara Kelompok A dan Kelompok B harus sejelas mungkin (sangat berbeda).</em>
                                </p>
                            </div>
                        </div>

                        <div class="mt-10 flex flex-col items-center justify-center bg-white/5 p-4 rounded-2xl border border-purple-500/30 backdrop-blur-sm">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-3">Bagan Proses Pengenalan Pola</span>
                            <img src="/images/materi/Gambar17_KonsepKlustering.png" alt="Konsep Dasar Clustering Unsupervised Learning" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.5)] border-2 border-gray-800 max-w-full h-auto w-full md:w-4/5 lg:w-3/4 transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Konsep+Clustering';">
                        </div>
                        
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-8 text-white text-outline" style="line-height: 1.5;">B. Perbedaan: Supervised vs Unsupervised Learning</h3>
                    <p class="text-center text-gray-300 mb-10 max-w-4xl mx-auto leading-relaxed">
                        Agar lebih mudah dipahami, mari kita bandingkan <em>Unsupervised Learning</em> dengan metode AI standar yang biasa disebut <em>Supervised Learning</em>.
                    </p>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 mb-12">
                        
                        <div class="bg-[#1e293b] p-6 md:p-8 rounded-3xl border-t-8 border-t-blue-500 shadow-2xl relative flex flex-col h-full">
                            <div class="absolute top-6 right-6 text-4xl opacity-30">👨‍🏫</div>
                            <h4 class="text-2xl font-black text-blue-400 mb-2">Supervised Learning</h4>
                            <p class="text-xs text-blue-300 font-bold mb-6 uppercase tracking-widest bg-blue-900/30 inline-block px-3 py-1 rounded-full border border-blue-500/30">
                                (Klasifikasi: Belajar dengan Kunci Jawaban)
                            </p>
                            
                            <ul class="space-y-6 text-sm text-gray-300 flex-1">
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-blue-400">🏷️</span> Data Input:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        <strong>Berlabel (Punya kunci jawaban).</strong><br>
                                        <span class="italic text-gray-400">Contoh: Foto kucing sudah diberi nama file "Kucing".</span>
                                    </div>
                                </li>
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-blue-400">⚙️</span> Cara Kerja:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        <strong>Komputer "diajari" oleh manusia.</strong><br>
                                        <span class="italic text-gray-400">"Ini apel, ini jeruk. Sekarang tebak, foto baru ini buah apa?"</span>
                                    </div>
                                </li>
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-blue-400">🎯</span> Tujuan Akhir:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        Memprediksi hasil atau kebenaran untuk data baru.
                                    </div>
                                </li>
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-blue-400">🤖</span> Contoh AI:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        Filter Spam Email, Deteksi Wajah (Face Unlock).
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-[#1e293b] p-6 md:p-8 rounded-3xl border-t-8 border-t-purple-500 shadow-2xl relative transform lg:scale-105 border border-purple-900/50 z-10 flex flex-col h-full">
                            <div class="absolute top-6 right-6 text-4xl opacity-30">🕵️‍♂️</div>
                            <h4 class="text-2xl font-black text-purple-400 mb-2">Unsupervised Learning</h4>
                            <p class="text-xs text-purple-300 font-bold mb-6 uppercase tracking-widest bg-purple-900/30 inline-block px-3 py-1 rounded-full border border-purple-500/30">
                                (Clustering: Mencari Pola Sendiri)
                            </p>
                            
                            <ul class="space-y-6 text-sm text-gray-300 flex-1">
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-purple-400">❓</span> Data Input:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        <strong>Tanpa Label (Data mentah).</strong><br>
                                        <span class="italic text-gray-400">Contoh: Ribuan foto hewan campuran tanpa nama.</span>
                                    </div>
                                </li>
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-purple-400">⚙️</span> Cara Kerja:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        <strong>Komputer "belajar mandiri" mencari pola.</strong><br>
                                        <span class="italic text-gray-400">"Saya tidak tahu ini buah apa, tapi benda A dan B sama-sama bulat merah, jadi saya jadikan mereka satu kelompok."</span>
                                    </div>
                                </li>
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-purple-400">🔍</span> Tujuan Akhir:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        Menemukan struktur atau pola tersembunyi (Pengelompokan).
                                    </div>
                                </li>
                                <li>
                                    <strong class="text-white block mb-1 flex items-center gap-2"><span class="text-purple-400">🤖</span> Contoh AI:</strong>
                                    <div class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                        Segmentasi Pelanggan Toko, Sistem Rekomendasi Netflix.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex justify-center bg-white/5 p-4 rounded-2xl border border-gray-600 backdrop-blur-sm shadow-inner max-w-5xl mx-auto">
                        <img src="/images/materi/image_28c0ea.jpg" alt="Ilustrasi Perbedaan Supervised vs Unsupervised Learning" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.3)] border-2 border-gray-800 max-w-full h-auto w-full transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Perbandingan+Supervised+vs+Unsupervised';">
                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute -left-10 -top-10 text-9xl opacity-5 pointer-events-none">🌍</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-4 text-center">C. Analogi di Dunia Nyata</h3>
                    <p class="text-center text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed">
                        Untuk membayangkan seberapa hebat algoritma ini bekerja di kehidupan nyata, perhatikan dua skenario berikut:
                    </p>

                    <div class="flex justify-center mb-10 bg-white/5 p-4 rounded-2xl border border-gray-600 backdrop-blur-sm shadow-inner max-w-5xl mx-auto">
                        <img src="/images/materi/image_28d822.jpg" alt="Ilustrasi Analogi Clustering: Toko Baju dan Perpustakaan" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.3)] border-2 border-gray-800 max-w-full h-auto w-full transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Analogi+Dunia+Nyata';">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                        
                        <div class="bg-gradient-to-b from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-t-4 border-t-blue-500 shadow-lg hover:-translate-y-2 transition-transform duration-300">
                            <div class="flex flex-col mb-4 border-b border-gray-700 pb-4">
                                <span class="text-blue-400 font-bold text-xs uppercase tracking-widest mb-1">1. Manajer Toko Baju</span>
                                <div class="flex items-center gap-3">
                                    <div class="text-4xl drop-shadow-md">🛍️</div>
                                    <h5 class="font-black text-xl text-white">Segmentasi Pelanggan</h5>
                                </div>
                            </div>
                            <p class="text-sm text-gray-300 leading-relaxed mb-6 text-justify">
                                Bayangkan kamu memiliki data ribuan transaksi toko, tapi tidak tahu siapa saja pembelinya. Dengan <em>clustering</em>, AI bisa menemukan pola perilaku belanja secara otomatis dan memecah pelanggan menjadi 3 geng:
                            </p>
                            <ul class="space-y-4 text-sm text-gray-300">
                                <li class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-blue-300 block mb-1 text-base flex items-center gap-2"><span>👑</span> Klaster 1 ("Sultan")</strong> 
                                    Kelompok yang sering belanja barang mahal dan jarang menggunakan diskon.
                                </li>
                                <li class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-blue-300 block mb-1 text-base flex items-center gap-2"><span>🏃</span> Klaster 2 ("Pemburu Promo")</strong> 
                                    Kelompok yang hanya muncul saat tanggal kembar (12.12) dan selalu memakai voucer gratis ongkir.
                                </li>
                                <li class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-blue-300 block mb-1 text-base flex items-center gap-2"><span>👀</span> Klaster 3 ("Window Shopper")</strong> 
                                    Kelompok yang sering memasukkan barang ke keranjang (<em>cart</em>) tapi jarang melakukan <em>checkout</em>.
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-b from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-t-4 border-t-purple-500 shadow-lg hover:-translate-y-2 transition-transform duration-300">
                            <div class="flex flex-col mb-4 border-b border-gray-700 pb-4">
                                <span class="text-purple-400 font-bold text-xs uppercase tracking-widest mb-1">2. Pustakawan</span>
                                <div class="flex items-center gap-3">
                                    <div class="text-4xl drop-shadow-md">📚</div>
                                    <h5 class="font-black text-xl text-white">Pengelompokan Buku</h5>
                                </div>
                            </div>
                            <p class="text-sm text-gray-300 leading-relaxed mb-6 text-justify">
                                Bayangkan ribuan buku baru datang ke perpustakaan tanpa label genre. Komputer akan membaca teks sinopsis buku tersebut dan secara otomatis menumpuk buku yang memiliki karakteristik serupa:
                            </p>
                            <ul class="space-y-4 text-sm text-gray-300">
                                <li class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-purple-300 block mb-1 text-base flex items-center gap-2"><span>🐉</span> Klaster Fantasi</strong> 
                                    Buku yang sering memunculkan kata kunci: <em>"Naga", "Penyihir", "Pedang", dan "Kerajaan"</em> akan ditumpuk di satu rak.
                                </li>
                                <li class="bg-black/30 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-purple-300 block mb-1 text-base flex items-center gap-2"><span>🚀</span> Klaster Fiksi Ilmiah (Sci-Fi)</strong> 
                                    Sementara buku dengan kata kunci: <em>"Robot", "Masa Depan", "Laser", dan "Luar Angkasa"</em> akan diletakkan di rak yang berbeda.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 text-[10rem] opacity-5 pointer-events-none">📖</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-4 text-center">D. Terminologi Penting (Enrichment)</h3>
                    <p class="text-center text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed">
                        Sebelum kita mulai mempraktikkan simulasi di aplikasi web, ada beberapa "bahasa gaul" algoritma <em>K-Means Clustering</em> yang wajib kamu pahami:
                    </p>

                    <div class="flex justify-center mb-12 bg-white/5 p-4 md:p-6 rounded-2xl border border-indigo-500/30 backdrop-blur-sm shadow-inner max-w-5xl mx-auto relative">
                        <div class="absolute -top-3 left-6 bg-indigo-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-md">
                            Peta Konsep Visual
                        </div>
                        <img src="/images/materi/image_2a2da1.jpg" alt="Infografis Terminologi K-Means Clustering" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.4)] border-2 border-gray-800 max-w-full h-auto w-full transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/900x400/1e293b/a5b4fc?text=Gambar+Infografis+Terminologi';">
                    </div>

                    <div class="space-y-8 relative z-10 max-w-4xl mx-auto">
                        
                        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-l-4 border-l-orange-500 shadow-lg relative">
                            <div class="absolute top-4 right-4 text-4xl opacity-20">📍</div>
                            <h4 class="text-xl font-bold text-orange-400 mb-4 border-b border-gray-700 pb-2">1. Cluster & Centroid</h4>
                            <ul class="space-y-4 text-sm text-gray-300">
                                <li>
                                    <strong class="text-white text-base">Cluster (Klaster):</strong> 
                                    Sebuah kelompok data. Anggota dalam satu klaster dijamin memiliki tingkat kemiripan yang tinggi satu sama lain.
                                </li>
                                <li>
                                    <strong class="text-white text-base">Centroid (Titik Pusat):</strong> 
                                    Ini adalah titik pusat gravitasi atau "ketua kelas" dari sebuah klaster. Dalam K-Means, nilai <em>centroid</em> dihitung dari titik rata-rata (<em>mean</em>) posisi seluruh anggota di dalam klaster tersebut. <em>Centroid</em> inilah yang akan terus bergerak mencari posisi paling stabil.
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-l-4 border-l-green-500 shadow-lg relative">
                            <div class="absolute top-4 right-4 text-4xl opacity-20">🧬</div>
                            <h4 class="text-xl font-bold text-green-400 mb-4 border-b border-gray-700 pb-2">2. Fitur (Feature / Attribute)</h4>
                            <p class="text-sm text-gray-300 leading-relaxed mb-3">
                                Variabel atau dimensi yang dijadikan dasar oleh komputer untuk melakukan pengelompokan.
                            </p>
                            <div class="bg-black/30 p-3 rounded-lg border border-gray-700 text-sm text-gray-400 italic">
                                <strong>Contoh:</strong> Jika kita ingin mengelompokkan data siswa, fiturnya bisa berupa angka "Tinggi Badan" dan "Berat Badan" (Berarti kita menggunakan data 2 Dimensi).
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-l-4 border-l-red-500 shadow-lg relative">
                            <div class="absolute top-4 right-4 text-4xl opacity-20">📏</div>
                            <h4 class="text-xl font-bold text-red-400 mb-4 border-b border-gray-700 pb-2">3. Inertia (Jarak Kedekatan)</h4>
                            <p class="text-sm text-gray-300 leading-relaxed mb-4 text-justify">
                                Inertia (atau <em>Within-Cluster Sum of Squares</em>) adalah "skor rapor" untuk menilai seberapa bagus klaster yang dibentuk oleh AI. <em>Inertia</em> mengukur total jarak antara setiap titik data dengan <em>centroid</em>-nya masing-masing.
                            </p>
                            <ul class="space-y-3 text-sm text-gray-300">
                                <li class="flex items-start gap-3 bg-black/20 p-3 rounded-lg border border-green-900/30">
                                    <span class="text-green-500 mt-0.5">🟢</span>
                                    <div>
                                        <strong class="text-white">Makin Kecil Inertia = Makin Bagus.</strong> Artinya data berkumpul sangat rapat memeluk <em>centroid</em>-nya (klasternya padat dan solid).
                                    </div>
                                </li>
                                <li class="flex items-start gap-3 bg-black/20 p-3 rounded-lg border border-red-900/30">
                                    <span class="text-red-500 mt-0.5">🔴</span>
                                    <div>
                                        <strong class="text-white">Makin Besar Inertia = Makin Buruk.</strong> Artinya data tersebar berjauhan dari pusatnya (klasternya terlalu menyebar atau berantakan).
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-l-4 border-l-purple-500 shadow-lg relative">
                            <div class="absolute top-4 right-4 text-4xl opacity-20">🔄</div>
                            <h4 class="text-xl font-bold text-purple-400 mb-4 border-b border-gray-700 pb-2">4. Iterasi & Konvergensi</h4>
                            <ul class="space-y-5 text-sm text-gray-300">
                                <li>
                                    <strong class="text-white text-base block mb-1">Iterasi (Iteration):</strong> 
                                    Satu putaran kerja algoritma. <em>K-Means</em> tidak langsung pintar dalam satu kedipan mata; ia bekerja secara berulang-ulang. Satu iterasi terdiri dari: <em>(1) Menarik anggota terdekat &rarr; (2) Menghitung ulang rata-rata &rarr; (3) Menggeser posisi Centroid.</em>
                                </li>
                                <li>
                                    <strong class="text-white text-base block mb-1">Konvergensi (Convergence):</strong> 
                                    Titik akhir atau garis finis di mana AI berhenti bekerja. Konvergensi tercapai ketika posisi <em>centroid</em> sudah "mentok" dan tidak berubah/bergeser lagi meskipun iterasi diteruskan. Ini menandakan bahwa pengelompokan data sudah final!
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="mt-16 bg-gradient-to-br from-[#0f1115] to-[#1e1b4b] p-6 md:p-10 rounded-3xl border-2 border-indigo-500/50 shadow-[0_20px_50px_rgba(79,70,229,0.2)] relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 text-[10rem] opacity-5 pointer-events-none">🎮</div>
                    
                    <h3 class="text-3xl font-black text-indigo-400 mb-4 text-outline-sm flex items-center gap-3 relative z-10">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(79,70,229,0.8)]">🕹️</span>
                        E. Simulator Algoritma K-Means
                    </h3>
                    <p class="text-gray-300 mb-10 leading-relaxed text-base relative z-10">
                        Bagaimana wujud <strong>Iterasi</strong> (pengulangan) dan <strong>Konvergensi</strong> (kestabilan) di mata komputer? Tekan tombol navigasi di bawah secara berurutan untuk melihat AI memisahkan data siswa menjadi klaster!
                    </p>

                    <div class="flex flex-col xl:flex-row gap-8 relative z-10">
                        
                        <div class="w-full xl:w-1/3 bg-black/60 p-6 rounded-2xl border border-indigo-500/30 flex flex-col justify-center shadow-inner backdrop-blur-sm">
                            <div class="text-center mb-6">
                                <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest block mb-2">Status Pekerjaan AI</span>
                                <div id="simStatus" class="font-mono text-xl font-black text-gray-400 bg-gray-900 py-3 rounded-xl border border-gray-700 shadow-inner transition-colors duration-300">
                                    Menunggu Perintah...
                                </div>
                            </div>
                            
                            <div class="space-y-3 flex-1 flex flex-col justify-center">
                                <button onclick="simRunStep(1)" id="simBtn1" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-[0_0_15px_rgba(79,70,229,0.5)] transition-transform active:scale-95 flex items-center justify-between px-5">
                                    <span>1. Taruh Centroid Awal</span> <span class="opacity-100">▶</span>
                                </button>
                                <button onclick="simRunStep(2)" id="simBtn2" disabled class="w-full bg-gray-800 text-gray-600 font-bold py-3.5 rounded-xl transition-all cursor-not-allowed flex items-center justify-between px-5 border border-gray-700">
                                    <span>2. Tarik Anggota (Jarak)</span> <span></span>
                                </button>
                                <button onclick="simRunStep(3)" id="simBtn3" disabled class="w-full bg-gray-800 text-gray-600 font-bold py-3.5 rounded-xl transition-all cursor-not-allowed flex items-center justify-between px-5 border border-gray-700">
                                    <span>3. Geser Posisi Centroid</span> <span></span>
                                </button>
                                <button onclick="simRunStep(4)" id="simBtn4" disabled class="w-full bg-gray-800 text-gray-600 font-bold py-3.5 rounded-xl transition-all cursor-not-allowed flex items-center justify-between px-5 border border-gray-700">
                                    <span>4. Konvergensi!</span> <span></span>
                                </button>
                            </div>

                            <div id="simExplanation" class="mt-6 p-4 bg-indigo-950/40 border border-indigo-500/30 rounded-xl text-sm text-gray-300 min-h-[90px] flex items-center justify-center text-center italic transition-all duration-300 shadow-inner">
                                Tekan tombol Langkah 1 untuk memulai simulasi.
                            </div>
                            
                            <button onclick="simResetLab()" class="mt-6 text-xs text-indigo-400 hover:text-indigo-300 font-bold uppercase tracking-widest text-center w-full bg-indigo-900/20 py-3 rounded-lg border border-indigo-500/20 transition-colors">
                                🔄 Ulangi Simulasi
                            </button>
                        </div>

                        <div class="w-full xl:w-2/3">
                            <div class="aspect-video bg-[#0f172a] rounded-2xl border-4 border-gray-700 relative overflow-hidden shadow-2xl flex items-center justify-center bg-[radial-gradient(#374151_1px,transparent_1px)] [background-size:20px_20px]">
                                
                                <span class="absolute top-1/2 left-2 transform -translate-y-1/2 -rotate-90 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Nilai Ujian &rarr;</span>
                                <span class="absolute bottom-2 left-1/2 transform -translate-x-1/2 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Jam Belajar &rarr;</span>
                                <div class="absolute inset-x-8 bottom-8 border-b-2 border-gray-600 opacity-50 z-0"></div>
                                <div class="absolute inset-y-8 left-8 border-l-2 border-gray-600 opacity-50 z-0"></div>

                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 75%; left: 20%;" data-target="group1"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 85%; left: 35%;" data-target="group1"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 65%; left: 28%;" data-target="group1"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 80%; left: 15%;" data-target="group1"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 70%; left: 25%;" data-target="group1"></div>
                                
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 30%; left: 75%;" data-target="group2"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 45%; left: 85%;" data-target="group2"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 20%; left: 70%;" data-target="group2"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 35%; left: 88%;" data-target="group2"></div>
                                <div class="kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 transition-all duration-700 shadow-md z-10" style="bottom: 25%; left: 65%;" data-target="group2"></div>

                                <div id="markerC1" class="absolute w-8 h-8 bg-pink-500 text-white flex items-center justify-center text-[10px] font-black rounded-full border-2 border-white shadow-[0_0_25px_#ec4899] transition-all duration-1000 opacity-0 scale-0 z-20" style="bottom: 50%; left: 50%;">C1</div>
                                
                                <div id="markerC2" class="absolute w-8 h-8 bg-teal-400 text-white flex items-center justify-center text-[10px] font-black rounded-full border-2 border-white shadow-[0_0_25px_#2dd4bf] transition-all duration-1000 opacity-0 scale-0 z-20" style="bottom: 60%; left: 40%;">C2</div>

                                <div id="kmeanOverlayMsg" class="absolute inset-0 bg-black/80 flex flex-col items-center justify-center opacity-0 transition-opacity duration-500 pointer-events-none z-30 backdrop-blur-sm">
                                    <div class="text-7xl mb-4 drop-shadow-[0_0_20px_rgba(34,197,94,0.8)]">✅</div>
                                    <div class="text-2xl md:text-3xl font-black tracking-widest text-green-400 drop-shadow-md text-center">KONVERGENSI TERCAPAI</div>
                                    <p class="text-gray-300 mt-2 text-sm text-center px-4">Posisi Centroid sudah stabil di tengah kerumunan. Pengelompokan gaya belajar selesai!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    function updateBtnState(activeId) {
                        for(let i=1; i<=4; i++) {
                            let btn = document.getElementById('simBtn' + i);
                            btn.className = "w-full bg-gray-800 text-gray-600 font-bold py-3.5 rounded-xl transition-all cursor-not-allowed flex items-center justify-between px-5 border border-gray-700";
                            btn.disabled = true;
                            btn.querySelector('span:last-child').innerText = '';
                        }
                        if(activeId) {
                            let activeBtn = document.getElementById(activeId);
                            activeBtn.className = "w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-[0_0_15px_rgba(79,70,229,0.5)] transition-transform active:scale-95 flex items-center justify-between px-5 border border-indigo-400";
                            activeBtn.disabled = false;
                            activeBtn.querySelector('span:last-child').innerText = '▶';
                        }
                    }

                    function simRunStep(step) {
                        const statusBox = document.getElementById('simStatus');
                        const explanationBox = document.getElementById('simExplanation');
                        const c1 = document.getElementById('markerC1');
                        const c2 = document.getElementById('markerC2');
                        const d1 = document.querySelectorAll('.kmeans-dot[data-target="group1"]');
                        const d2 = document.querySelectorAll('.kmeans-dot[data-target="group2"]');

                        if(step === 1) {
                            statusBox.innerText = "Inisialisasi Acak";
                            statusBox.className = "font-mono text-xl font-black text-orange-400 bg-orange-950/80 py-3 rounded-xl border border-orange-500/50 shadow-inner transition-colors duration-300";
                            explanationBox.innerHTML = "Komputer secara acak menjatuhkan dua titik pusat (Centroid 1 & 2) ke dalam grafik. Posisinya saat ini pasti meleset.";
                            
                            c1.style.opacity = '1'; c1.style.transform = 'scale(1) translate(-50%, 50%)';
                            c2.style.opacity = '1'; c2.style.transform = 'scale(1) translate(-50%, 50%)';

                            updateBtnState('simBtn2');
                        }
                        else if(step === 2) {
                            statusBox.innerText = "Hitung Jarak";
                            statusBox.className = "font-mono text-xl font-black text-blue-400 bg-blue-950/80 py-3 rounded-xl border border-blue-500/50 shadow-inner transition-colors duration-300";
                            explanationBox.innerHTML = "Setiap data siswa (titik abu-abu) menghitung jaraknya ke Centroid terdekat, lalu mengubah warnanya sesuai Centroid tersebut.";
                            
                            d1.forEach(function(d) { 
                                d.className = "kmeans-dot absolute w-4 h-4 rounded-full bg-pink-500 border-2 border-transparent shadow-[0_0_15px_#f472b6] transition-all duration-700 z-10"; 
                            });
                            d2.forEach(function(d) { 
                                d.className = "kmeans-dot absolute w-4 h-4 rounded-full bg-teal-400 border-2 border-transparent shadow-[0_0_15px_#2dd4bf] transition-all duration-700 z-10"; 
                            });

                            updateBtnState('simBtn3');
                        }
                        else if(step === 3) {
                            statusBox.innerText = "Geser Posisi";
                            statusBox.className = "font-mono text-xl font-black text-purple-400 bg-purple-950/80 py-3 rounded-xl border border-purple-500/50 shadow-inner transition-colors duration-300";
                            explanationBox.innerHTML = "Centroid menghitung nilai rata-rata dari semua anggotanya, lalu bergerak pindah persis ke tengah-tengah kerumunan barunya.";
                            
                            // Pindahkan Centroid ke tengah kerumunan yang benar
                            c1.style.bottom = "75%"; c1.style.left = "24.6%";
                            c2.style.bottom = "31%"; c2.style.left = "76.6%";

                            updateBtnState('simBtn4');
                        }
                        else if(step === 4) {
                            statusBox.innerText = "KONVERGENSI!";
                            statusBox.className = "font-mono text-xl font-black text-green-400 bg-green-950/80 py-3 rounded-xl border border-green-500/50 shadow-inner animate-pulse transition-colors duration-300";
                            explanationBox.innerHTML = "Posisi Centroid sudah stabil (tidak akan bergeser lagi). Algoritma selesai! Data berhasil dikelompokkan.";
                            
                            updateBtnState(null); 
                            
                            const overlay = document.getElementById('kmeanOverlayMsg');
                            overlay.style.opacity = '1';
                        }
                    }

                    function simResetLab() {
                        const statusBox = document.getElementById('simStatus');
                        const explanationBox = document.getElementById('simExplanation');
                        
                        statusBox.innerText = "Menunggu Perintah...";
                        statusBox.className = "font-mono text-xl font-black text-gray-400 bg-gray-900 py-3 rounded-xl border border-gray-700 shadow-inner transition-colors duration-300";
                        explanationBox.innerHTML = "Tekan tombol Langkah 1 untuk memulai simulasi.";

                        document.querySelectorAll('.kmeans-dot').forEach(function(d) {
                            d.className = "kmeans-dot absolute w-4 h-4 rounded-full bg-gray-500 border-2 border-transparent transition-all duration-700 shadow-md z-10";
                        });

                        const c1 = document.getElementById('markerC1');
                        const c2 = document.getElementById('markerC2');
                        c1.style.opacity = '0'; c1.style.transform = 'scale(0) translate(-50%, 50%)';
                        c2.style.opacity = '0'; c2.style.transform = 'scale(0) translate(-50%, 50%)';
                        
                        setTimeout(function() {
                            // Kembalikan ke posisi "acak yang salah" untuk awal simulasi berikutnya
                            c1.style.bottom = "50%"; c1.style.left = "50%";
                            c2.style.bottom = "60%"; c2.style.left = "40%";
                        }, 500);

                        document.getElementById('kmeanOverlayMsg').style.opacity = '0';
                        
                        updateBtnState('simBtn1');
                    }
                </script>

                <script>
                    document.addEventListener('click', function(e) {
                        let textTombol = e.target.innerText || '';
                        let isKuisButton = textTombol.toLowerCase().includes('uji pemahaman') || 
                                           textTombol.toLowerCase().includes('mulai kuis') || 
                                           textTombol.toLowerCase().includes('kerjakan kuis');
                                           
                        if (isKuisButton || e.target.closest('.tombol-mulai-kuis')) {
                            let areaMateri = document.getElementById('areaMateriPelajaran');
                            if(areaMateri) {
                                areaMateri.classList.add('blur-md', 'pointer-events-none', 'opacity-30', 'select-none');
                            }
                            
                            let aiTool = document.getElementById('floating-tools-container'); 
                            if(aiTool) { aiTool.style.display = 'none'; }
                        }
                        
                        let isResetButton = textTombol.toLowerCase().includes('ulangi') || 
                                            textTombol.toLowerCase().includes('coba lagi') || 
                                            textTombol.toLowerCase().includes('selesai');
                                            
                        if (isResetButton) {
                            let areaMateri = document.getElementById('areaMateriPelajaran');
                            if(areaMateri) {
                                areaMateri.classList.remove('blur-md', 'pointer-events-none', 'opacity-30', 'select-none');
                            }
                            
                            let aiTool = document.getElementById('floating-tools-container'); 
                            if(aiTool) { aiTool.style.display = 'flex'; }
                        }
                    });
                </script>

            </div>

            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Apa perbedaan utama antara 'Supervised Learning' dengan 'Unsupervised Learning' (seperti algoritma Clustering)?"
                    data-opt-a="Supervised Learning menggunakan data mentah tanpa label, sedangkan Unsupervised Learning menggunakan data yang sudah ada Kunci Jawabannya."
                    data-opt-b="Supervised Learning diajari dengan Kunci Jawaban (label), sedangkan Unsupervised mencari pola sendiri dari data mentah yang tidak berlabel."
                    data-opt-c="Supervised Learning dilakukan oleh robot, Unsupervised oleh manusia."
                    data-opt-d="Keduanya tidak ada bedanya, hanya beda istilah."
                    data-opt-e="Supervised Learning hanya digunakan untuk data gambar, sedangkan Unsupervised khusus untuk data teks."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam aturan Clustering yang baik, apa yang dimaksud dengan prinsip 'Intraclass Similarity'?"
                    data-opt-a="Jarak antar klaster yang satu dengan yang lain harus sejauh mungkin."
                    data-opt-b="Anggota di dalam kelompok (klaster) yang sama harus dibuat semirip dan sedekat mungkin."
                    data-opt-c="Semua data harus dihapus jika tidak mirip."
                    data-opt-d="Jumlah anggota di setiap klaster harus selalu sama rata."
                    data-opt-e="Semua klaster yang terbentuk harus memiliki bentuk visual yang sama persis satu sama lain."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Menurut 'Kamus K-Means', apa sebutan untuk titik pusat gravitasi yang mewakili letak rata-rata sebuah klaster?"
                    data-opt-a="Iterasi"
                    data-opt-b="Inertia"
                    data-opt-c="Centroid"
                    data-opt-d="Fitur"
                    data-opt-e="Euclidean"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Skor/rapor untuk menilai kepadatan sebuah klaster disebut 'Inertia'. Pernyataan manakah yang paling tepat tentang Inertia?"
                    data-opt-a="Semakin besar angka Inertia, maka kualitas klaster semakin bagus."
                    data-opt-b="Semakin kecil angka Inertia, maka kualitas klaster semakin bagus karena menandakan data sangat padat dan dekat dengan Centroid-nya."
                    data-opt-c="Inertia tidak berguna dalam Clustering."
                    data-opt-d="Inertia harus selalu bernilai nol sejak awal."
                    data-opt-e="Inertia adalah nilai rata-rata dari seluruh titik data sebelum algoritma K-Means dijalankan."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada percobaan 'Simulator Algoritma K-Means', proses pencarian Centroid akan terus diulang (Looping/Iterasi) sampai letak Centroid sudah stabil dan tidak bergeser lagi. Keadaan 'Garis Finish' ini disebut dengan istilah..."
                    data-opt-a="Konvergensi"
                    data-opt-b="Segmentasi"
                    data-opt-c="Dissimilarity"
                    data-opt-d="Outlier"
                    data-opt-e="Normalisasi"
                    data-answer="A">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'konsep-clustering-terminologi'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Konsep Clustering & Terminologi',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 8, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Konsep Clustering berhasil diperbarui dengan Tujuan Pembelajaran dan Multi-Quiz!');
    }
}