<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_03_AlgoritmaKMeansSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cari ID Bab 3
        $chapterId = Chapter::where('sequence', 3)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 3 belum dibuat! Jalankan MateriBab2Seeder dulu.');
            return;
        }

        // 2. Konten Materi Lengkap (Algoritma K-Means)
        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">
                
                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none transition-opacity group-hover:opacity-0">
                            <span class="text-red-500 animate-pulse">●</span> INTRO
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/GoTZy0kCazw?rel=0&modestbranding=1" 
                                title="Video Pengantar Algoritma K-Means" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas sebelum kita merakit algoritmanya!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-blue-900 p-6 md:p-8 rounded-3xl border border-indigo-500 shadow-xl relative overflow-hidden mb-12">
                    <div class="absolute -right-10 -bottom-10 text-[10rem] opacity-5 pointer-events-none">⚙️</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-6 relative z-10" style="line-height: 1.5;">
                        A. Definisi dan Filosofi Nama K-Means
                    </h3>
                    
                    <div class="relative z-10 space-y-6 text-gray-200 leading-relaxed text-base text-justify">
                        <p>
                            <strong>K-Means</strong> adalah algoritma <em>clustering</em> (pengelompokan) yang paling legendaris, cepat, dan populer di seluruh dunia. Algoritma ini membagi data ke dalam kelompok-kelompok yang tidak saling tumpang tindih (<em>Partitional Clustering</em>).
                        </p>

                        <div class="bg-black/30 p-6 md:p-8 rounded-2xl border border-white/10 backdrop-blur-sm mt-6 shadow-inner">
                            <h4 class="text-xl font-bold text-yellow-400 mb-5 border-b border-gray-600/50 pb-3 flex items-center gap-3">
                                <span class="text-2xl drop-shadow-md">💡</span> Mengapa Dinamakan K-Means?
                            </h4>
                            <p class="text-sm text-gray-300 mb-6">Filosofi namanya sangat sederhana, terdiri dari dua komponen utama:</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="bg-blue-950/60 p-5 rounded-xl border border-blue-500/40 flex items-start gap-4 shadow-lg hover:shadow-blue-900/50 transition-all duration-300">
                                    <div class="text-5xl font-black text-blue-400 drop-shadow-[0_0_8px_rgba(96,165,250,0.6)]">K</div>
                                    <div>
                                        <strong class="text-white block mb-1 text-lg">Jumlah Kelompok</strong>
                                        <p class="text-sm text-gray-400 leading-relaxed">Konstanta angka yang mewakili berapa banyak klaster yang ingin kita bentuk. <br><span class="italic text-blue-300 text-xs">(Misal: Jika kita set K=3, berarti kita meminta AI untuk membuat 3 kelompok).</span></p>
                                    </div>
                                </div>
                                
                                <div class="bg-purple-950/60 p-5 rounded-xl border border-purple-500/40 flex items-start gap-4 shadow-lg hover:shadow-purple-900/50 transition-all duration-300">
                                    <div class="text-4xl font-black text-purple-400 tracking-tighter drop-shadow-[0_0_8px_rgba(192,132,252,0.6)] mt-1">Means</div>
                                    <div>
                                        <strong class="text-white block mb-1 text-lg">Rata-rata (Average)</strong>
                                        <p class="text-sm text-gray-400 leading-relaxed">Merujuk pada cara algoritma ini mencari titik pusat (Centroid) baru, yaitu dengan selalu menghitung nilai rata-rata (mean) dari semua anggota kelompok tersebut.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute right-0 top-0 text-[10rem] opacity-5 pointer-events-none">📖</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-6 text-center">B. Cara Kerja Algoritma (5 Langkah K-Means)</h3>
                    <p class="text-center text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed">
                        Berikut adalah alur kerja mendetail dari algoritma K-Means yang membagi data ke dalam kelompok-kelompok berdasarkan kedekatan jaraknya:
                    </p>

                    <div class="max-w-3xl mx-auto relative z-10 mb-16">
                        <div class="relative border-l-4 border-indigo-500 ml-6 md:ml-10 space-y-10 pb-4">
                            
                            <div class="relative pl-8 md:pl-12">
                                <div class="absolute -left-[22px] md:-left-[28px] bg-indigo-500 w-10 h-10 md:w-14 md:h-14 rounded-full flex items-center justify-center text-white font-black text-lg md:text-2xl border-4 border-[#0d1117] shadow-[0_0_10px_#6366f1]">1</div>
                                <h4 class="text-xl md:text-2xl font-black text-indigo-400 mb-2">Inisialisasi</h4>
                                <div class="bg-[#161b22] p-5 rounded-2xl border border-gray-700 shadow-md">
                                    <ul class="list-disc pl-5 text-gray-300 space-y-1 text-sm md:text-base leading-relaxed">
                                        <li>Manusia menentukan nilai <strong>K</strong> (jumlah kelompok).</li>
                                        <li>Komputer menyebar <strong>Centroid</strong> awal secara acak (<em>random</em>) ke dalam kerumunan data.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="relative pl-8 md:pl-12">
                                <div class="absolute -left-[22px] md:-left-[28px] bg-blue-500 w-10 h-10 md:w-14 md:h-14 rounded-full flex items-center justify-center text-white font-black text-lg md:text-2xl border-4 border-[#0d1117] shadow-[0_0_10px_#3b82f6]">2</div>
                                <h4 class="text-xl md:text-2xl font-black text-blue-400 mb-2">Penugasan (Assignment)</h4>
                                <div class="bg-[#161b22] p-5 rounded-2xl border border-gray-700 shadow-md space-y-2 text-sm md:text-base leading-relaxed">
                                    <p class="text-gray-300">Menggunakan rumus jarak (biasanya <em>Euclidean</em>), komputer menghitung jarak setiap titik data ke semua Centroid.</p>
                                    <div class="bg-blue-900/40 p-3 rounded-xl border-l-4 border-blue-500 text-blue-200 shadow-inner">
                                        <em>Aturan: Setiap data akan diwarnai dan masuk ke kelompok Centroid yang jaraknya paling dekat dengannya.</em>
                                    </div>
                                </div>
                            </div>

                            <div class="relative pl-8 md:pl-12">
                                <div class="absolute -left-[22px] md:-left-[28px] bg-purple-500 w-10 h-10 md:w-14 md:h-14 rounded-full flex items-center justify-center text-white font-black text-lg md:text-2xl border-4 border-[#0d1117] shadow-[0_0_10px_#a855f7]">3</div>
                                <h4 class="text-xl md:text-2xl font-black text-purple-400 mb-2">Update Centroid</h4>
                                <div class="bg-[#161b22] p-5 rounded-2xl border border-gray-700 shadow-md">
                                    <ul class="list-disc pl-5 text-gray-300 space-y-1 text-sm md:text-base leading-relaxed">
                                        <li>Setelah semua data dikelompokkan, posisi Centroid awal menjadi tidak akurat (tidak berada di tengah).</li>
                                        <li>Komputer menghitung <strong>rata-rata (Mean)</strong> posisi semua anggota di setiap kelompok, lalu <strong>menggeser Centroid</strong> ke titik tengah tersebut.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="relative pl-8 md:pl-12">
                                <div class="absolute -left-[22px] md:-left-[28px] bg-orange-500 w-10 h-10 md:w-14 md:h-14 rounded-full flex items-center justify-center text-white font-black text-lg md:text-2xl border-4 border-[#0d1117] shadow-[0_0_10px_#f97316]">4</div>
                                <h4 class="text-xl md:text-2xl font-black text-orange-400 mb-2">Iterasi (Looping)</h4>
                                <div class="bg-[#161b22] p-5 rounded-2xl border border-gray-700 shadow-md text-sm md:text-base leading-relaxed">
                                    <p class="text-gray-300">Karena Centroid baru saja bergeser, jarak data ke Centroid pasti berubah. Maka, algoritma mengulangi kembali <strong>Langkah 2</strong> dan <strong>Langkah 3</strong>. Data mungkin akan berpindah-pindah geng (klaster).</p>
                                </div>
                            </div>

                            <div class="relative pl-8 md:pl-12">
                                <div class="absolute -left-[22px] md:-left-[28px] bg-green-500 w-10 h-10 md:w-14 md:h-14 rounded-full flex items-center justify-center text-white font-black text-lg md:text-2xl border-4 border-[#0d1117] shadow-[0_0_10px_#22c55e]">5</div>
                                <h4 class="text-xl md:text-2xl font-black text-green-400 mb-2">Konvergensi (Selesai!)</h4>
                                <div class="bg-[#161b22] p-5 rounded-2xl border border-gray-700 shadow-md text-sm md:text-base leading-relaxed">
                                    <p class="text-gray-300">Perulangan akan terus terjadi sampai posisi Centroid <strong>sudah tidak berubah lagi</strong> (stabil) atau tidak ada satupun data yang pindah kelompok. Jika sudah begini, Klasterisasi dinyatakan selesai (Konvergen).</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="bg-[#0f172a] p-8 md:p-12 rounded-3xl border border-gray-700 shadow-inner relative flex flex-col items-center">
                        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: linear-gradient(#4b5563 1px, transparent 1px), linear-gradient(90deg, #4b5563 1px, transparent 1px); background-size: 30px 30px;"></div>

                        <h3 class="text-2xl md:text-3xl font-black text-white mb-10 text-center tracking-wide relative z-10">
                            <span class="text-blue-500">⚙️ Diagram Alur</span> Algoritma K-Means
                        </h3>

                        <div class="relative flex flex-col items-center w-full max-w-lg z-10">

                            <div class="bg-gradient-to-r from-gray-800 to-gray-700 border-2 border-gray-500 text-white font-bold tracking-widest uppercase px-10 py-3 rounded-full shadow-[0_0_15px_rgba(107,114,128,0.5)] z-10">
                                Mulai
                            </div>

                            <svg class="w-6 h-8 text-gray-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>

                            <div class="bg-blue-900/40 border-l-4 border-blue-500 text-blue-100 px-6 py-4 rounded-xl w-full text-center shadow-lg backdrop-blur-sm z-10">
                                <strong class="block text-blue-400 mb-1 tracking-wider text-sm">TAHAP 1: INISIALISASI</strong>
                                Tentukan jumlah kelompok (K) & <br>Sebar Centroid awal secara acak
                            </div>

                            <svg class="w-6 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>

                            <div id="loop-target" class="w-full relative flex flex-col items-center">
                                
                                <div class="bg-purple-900/40 border-l-4 border-purple-500 text-purple-100 px-6 py-4 rounded-xl w-full text-center shadow-lg backdrop-blur-sm z-10 relative">
                                    <div class="hidden md:block absolute top-1/2 -left-[43px] w-3 h-3 rounded-full border-2 border-orange-500 bg-[#0f172a] transform -translate-y-1/2 z-20"></div>
                                    <strong class="block text-purple-400 mb-1 tracking-wider text-sm">TAHAP 2: PENUGASAN (ASSIGNMENT)</strong>
                                    Hitung jarak tiap data ke Centroid & <br>Kelompokkan data ke Centroid terdekat
                                </div>

                                <svg class="w-6 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>

                                <div class="bg-pink-900/40 border-l-4 border-pink-500 text-pink-100 px-6 py-4 rounded-xl w-full text-center shadow-lg backdrop-blur-sm z-10">
                                    <strong class="block text-pink-400 mb-1 tracking-wider text-sm">TAHAP 3: UPDATE CENTROID</strong>
                                    Hitung rata-rata posisi anggota & <br>Geser Centroid ke titik rata-rata tersebut
                                </div>

                                <svg class="w-6 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>

                                <div class="bg-orange-900/40 border-2 border-orange-500 text-orange-100 px-6 py-5 rounded-tl-3xl rounded-br-3xl w-11/12 text-center shadow-[0_0_20px_rgba(249,115,22,0.2)] backdrop-blur-sm relative z-10">
                                    <div class="hidden md:block absolute top-1/2 -left-[30px] w-3 h-3 rounded-full border-2 border-orange-500 bg-[#0f172a] transform -translate-y-1/2 z-20"></div>
                                    <strong class="block text-orange-400 mb-1 tracking-wider text-sm uppercase">Cek Kondisi (Iterasi)</strong>
                                    Apakah posisi Centroid bergeser?<br>Atau ada anggota pindah kelompok?
                                </div>

                                <div class="hidden md:block absolute top-[44px] bottom-[68px] -left-10 w-10 border-l-2 border-t-2 border-b-2 border-dashed border-orange-500 rounded-l-xl z-0">
                                    <div class="absolute top-1/2 -left-10 transform -translate-y-1/2 -rotate-90 text-orange-400 font-bold tracking-widest text-[10px] bg-[#0f172a] px-2">
                                        YA (ULANGI)
                                    </div>
                                    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2">
                                        <svg class="w-4 h-4 text-orange-500 rotate-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                                    </div>
                                </div>

                                <div class="md:hidden w-full text-center text-orange-400 text-xs font-bold mt-2 mb-2">
                                    &uarr; Jika YA, kembali ke Tahap 2 &uarr;
                                </div>
                            </div>

                            <div class="relative w-full flex flex-col items-center">
                                <div class="absolute top-1/2 left-1/2 transform translate-x-2 -translate-y-1/2 bg-[#0f172a] px-2 text-green-400 font-bold text-xs">TIDAK</div>
                                <svg class="w-6 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            <div class="bg-gradient-to-r from-teal-600 to-green-600 border-2 border-green-400 text-white font-bold tracking-widest uppercase px-10 py-3 rounded-full shadow-[0_0_20px_rgba(52,211,153,0.6)] z-10 relative overflow-hidden">
                                <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                                Selesai (Konvergen)
                            </div>

                        </div>
                    </div>
                    </div>

                <div class="mt-16 bg-gradient-to-br from-[#0d1117] to-[#161b22] p-6 md:p-8 rounded-3xl border border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute right-0 top-0 text-[10rem] opacity-5 pointer-events-none">🧮</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-6 relative z-10">C. Lab Simulasi: Data Garis Lurus (1D)</h3>
                    <p class="text-gray-400 mb-8 max-w-3xl text-sm leading-relaxed relative z-10">
                        Membaca teori saja tentu tidak cukup. Mari kita amati proses iterasi algoritma ini secara nyata! Kita memiliki data nilai siswa: <strong class="text-white bg-gray-800 px-2 py-0.5 rounded shadow-inner">2, 3, 4, 10, 12, 20, 25, 30</strong>. Kita ingin membaginya menjadi <strong>K=2</strong> kelompok.
                    </p>

                    <div id="aiTutor" class="relative z-10 bg-indigo-900/40 border-2 border-indigo-500/50 rounded-2xl p-6 mb-8 shadow-[0_0_20px_rgba(99,102,241,0.15)] transition-all duration-500 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex items-start gap-4 w-full md:w-2/3">
                            <div class="text-5xl drop-shadow-md animate-bounce-slow shrink-0" id="aiAvatar">🤖</div>
                            <div>
                                <h4 class="font-black text-indigo-300 tracking-widest uppercase text-xs mb-2">Instruktur AI</h4>
                                <p id="aiMessage" class="text-white text-sm md:text-base leading-relaxed font-medium min-h-[48px]">
                                    Sistem siap. Tugas pertamamu adalah inisialisasi! Geser <em>slider</em> di bawah untuk menaruh letak awal Centroid 1 dan 2 sesukamu. Jika sudah yakin, kunci posisinya!
                                </p>
                            </div>
                        </div>
                        <button id="btnAction" onclick="nextLangkah()" class="shrink-0 w-full md:w-1/3 bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-500 hover:to-blue-500 text-white font-black px-6 py-4 rounded-xl shadow-lg transform active:scale-95 transition-all text-sm">
                            🔒 Langkah 1: Kunci Posisi
                        </button>
                    </div>

                    <div id="sliderControl" class="bg-black/40 p-5 rounded-2xl border border-gray-700 mb-6 relative z-10 transition-all duration-500 opacity-100">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-1">
                                <label class="text-xs font-bold text-pink-400 uppercase tracking-widest flex justify-between mb-2">
                                    <span>Posisi Awal Centroid 1</span> <span id="valC1" class="text-white bg-pink-900/50 px-2 py-0.5 rounded">15</span>
                                </label>
                                <input type="range" id="slideC1" min="0" max="30" value="15" oninput="liveUpdateCentroid()" class="w-full accent-pink-500 cursor-grab active:cursor-grabbing">
                            </div>
                            <div class="flex-1">
                                <label class="text-xs font-bold text-teal-400 uppercase tracking-widest flex justify-between mb-2">
                                    <span>Posisi Awal Centroid 2</span> <span id="valC2" class="text-white bg-teal-900/50 px-2 py-0.5 rounded">16</span>
                                </label>
                                <input type="range" id="slideC2" min="0" max="30" value="16" oninput="liveUpdateCentroid()" class="w-full accent-teal-500 cursor-grab active:cursor-grabbing">
                            </div>
                        </div>
                    </div>

                    <div id="gridCanvas" class="bg-[#050505] rounded-2xl border border-gray-800 p-6 pt-16 pb-12 relative shadow-inner overflow-hidden">
                        <div class="relative h-20 border-b-2 border-gray-600 flex items-end w-[90%] mx-auto">
                            
                            <div class="absolute w-full flex justify-between text-[10px] text-gray-600 bottom-[-24px] font-mono font-bold">
                                <span>0</span><span>5</span><span>10</span><span>15</span><span>20</span><span>25</span><span>30</span>
                            </div>

                            <div id="sd_2" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="2"><span class="absolute -top-6 text-xs font-bold text-gray-300">2</span></div>
                            <div id="sd_3" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="3"><span class="absolute -top-6 text-xs font-bold text-gray-300">3</span></div>
                            <div id="sd_4" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="4"><span class="absolute -top-6 text-xs font-bold text-gray-300">4</span></div>
                            <div id="sd_10" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="10"><span class="absolute -top-6 text-xs font-bold text-gray-300">10</span></div>
                            <div id="sd_12" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="12"><span class="absolute -top-6 text-xs font-bold text-gray-300">12</span></div>
                            <div id="sd_20" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="20"><span class="absolute -top-6 text-xs font-bold text-gray-300">20</span></div>
                            <div id="sd_25" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="25"><span class="absolute -top-6 text-xs font-bold text-gray-300">25</span></div>
                            <div id="sd_30" class="data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-md" data-val="30"><span class="absolute -top-6 text-xs font-bold text-gray-300">30</span></div>

                            <div id="sc_1" class="absolute w-8 h-8 bg-pink-500 text-white flex items-center justify-center text-xs font-black rounded-lg border-2 border-white shadow-[0_0_15px_#ec4899] transform -translate-x-1/2 bottom-[18px] transition-all duration-700 z-20">C1</div>
                            <div id="sc_2" class="absolute w-8 h-8 bg-teal-500 text-white flex items-center justify-center text-xs font-black rounded-lg border-2 border-white shadow-[0_0_15px_#14b8a6] transform -translate-x-1/2 bottom-[18px] transition-all duration-700 z-20">C2</div>
                        </div>
                    </div>

                    <div class="mt-8 bg-black/60 rounded-xl border border-gray-700 p-4 min-h-[120px] font-mono text-xs md:text-sm text-gray-400 shadow-inner relative z-10 overflow-y-auto max-h-[200px]" id="simLog">
                        <span class="text-green-500">> [SISTEM] Modul K-Means 1D siap. Silakan geser slider untuk Inisialisasi...</span><br>
                    </div>
                </div>

                <style>
                    .animate-bounce-slow { animation: bounce 3s infinite; }
                </style>

                <script>
                    const dataPoints = [2, 3, 4, 10, 12, 20, 25, 30];
                    const MAX_VAL = 30;
                    
                    // State Variables
                    let currentStep = 0; 
                    let posC1 = 15;
                    let posC2 = 16;
                    let prevPosC1 = -1;
                    let prevPosC2 = -1;
                    let iterationCount = 0;

                    function setPos(id, val) {
                        let pct = (val / MAX_VAL) * 100;
                        document.getElementById(id).style.left = pct + "%";
                    }

                    // Inisialisasi Posisi Titik Data saat dimuat
                    dataPoints.forEach(val => { setPos("sd_" + val, val); });

                    function liveUpdateCentroid() {
                        if(currentStep > 0) return; // Kunci slider jika sudah mulai
                        posC1 = parseFloat(document.getElementById('slideC1').value);
                        posC2 = parseFloat(document.getElementById('slideC2').value);
                        
                        document.getElementById('valC1').innerText = posC1;
                        document.getElementById('valC2').innerText = posC2;
                        
                        setPos('sc_1', posC1);
                        setPos('sc_2', posC2);
                    }

                    // Panggil sekali saat load agar sejajar dengan slider awal
                    liveUpdateCentroid();

                    function writeLog(text, colorClass = "text-gray-300") {
                        const log = document.getElementById('simLog');
                        log.innerHTML += "<br><span class='" + colorClass + "'>" + text + "</span>";
                        log.scrollTop = log.scrollHeight;
                    }

                    function changeTutor(message, buttonText, boxColorClass, btnColorClass) {
                        document.getElementById('aiMessage').innerHTML = message;
                        const btn = document.getElementById('btnAction');
                        btn.innerHTML = buttonText;
                        btn.className = "shrink-0 w-full md:w-1/3 text-white font-black px-6 py-4 rounded-xl shadow-lg transform active:scale-95 transition-all text-sm " + btnColorClass;
                        
                        const tutorBox = document.getElementById('aiTutor');
                        tutorBox.className = "relative z-10 border-2 rounded-2xl p-6 mb-8 shadow-lg transition-all duration-500 flex flex-col md:flex-row items-center justify-between gap-6 " + boxColorClass;
                    }

                    function nextLangkah() {
                        // TAHAP 1: KUNCI INISIALISASI
                        if (currentStep === 0) {
                            document.getElementById('sliderControl').classList.replace('opacity-100', 'opacity-30');
                            document.getElementById('slideC1').disabled = true;
                            document.getElementById('slideC2').disabled = true;

                            // PERBAIKAN: Menggunakan tanda '+' untuk menyambung teks dan variabel
                            writeLog("> [LANGKAH 1] Centroid dikunci pada posisi C1=" + posC1 + " dan C2=" + posC2 + ".", "text-yellow-400");

                            changeTutor(
                                "Posisi awal dikunci! Sekarang, klik tombol untuk menghitung jarak Euclidean. Sistem akan mewarnai siswa sesuai dengan warna Centroid terdekatnya.", 
                                "📏 Langkah 2: Hitung & Kelompokkan",
                                "bg-blue-900/40 border-blue-500/50 shadow-[0_0_20px_rgba(59,130,246,0.15)]",
                                "bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500"
                            );
                            currentStep = 1;
                        }
                        // TAHAP 2: HITUNG JARAK & KELOMPOKKAN (ASSIGNMENT)
                        else if (currentStep === 1) {
                            iterationCount++;
                            // PERBAIKAN: Menggunakan tanda '+'
                            writeLog("> --- ITERASI KE-" + iterationCount + " ---", "text-white font-bold");
                            writeLog("> [LANGKAH 2] Menghitung jarak setiap titik ke C1 dan C2...", "text-blue-400");
                            
                            let group1 = [];
                            let group2 = [];

                            dataPoints.forEach(val => {
                                let dist1 = Math.abs(val - posC1);
                                let dist2 = Math.abs(val - posC2);
                                let el = document.getElementById("sd_" + val);

                                if (dist1 <= dist2) {
                                    group1.push(val);
                                    el.className = "data-dot absolute w-5 h-5 bg-pink-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-[0_0_10px_#ec4899]";
                                    el.firstChild.className = "absolute -top-6 text-xs font-black text-pink-300";
                                } else {
                                    group2.push(val);
                                    el.className = "data-dot absolute w-5 h-5 bg-teal-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-700 z-10 flex justify-center shadow-[0_0_10px_#14b8a6]";
                                    el.firstChild.className = "absolute -top-6 text-xs font-black text-teal-300";
                                }
                            });

                            // PERBAIKAN: Menggunakan tanda '+'
                            writeLog("> Anggota C1 (Pink): {" + group1.join(', ') + "}");
                            writeLog("> Anggota C2 (Teal): {" + group2.join(', ') + "}");

                            document.getElementById('gridCanvas').setAttribute('data-g1', JSON.stringify(group1));
                            document.getElementById('gridCanvas').setAttribute('data-g2', JSON.stringify(group2));

                            changeTutor(
                                "Siswa sudah terkelompok! Tapi lihat, letak Centroid jadi tidak pas di tengah kerumunan anggotanya. Kita harus menghitung Rata-rata (Mean) anggota dan menggeser Centroid ke situ.", 
                                "📐 Langkah 3: Hitung Rata-Rata",
                                "bg-purple-900/40 border-purple-500/50 shadow-[0_0_20px_rgba(168,85,247,0.15)]",
                                "bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500"
                            );
                            currentStep = 2;
                        }
                        // TAHAP 3: UPDATE CENTROID
                        else if (currentStep === 2) {
                            let g1 = JSON.parse(document.getElementById('gridCanvas').getAttribute('data-g1') || "[]");
                            let g2 = JSON.parse(document.getElementById('gridCanvas').getAttribute('data-g2') || "[]");

                            prevPosC1 = posC1;
                            prevPosC2 = posC2;

                            if (g1.length > 0) {
                                let sum = g1.reduce((a, b) => a + b, 0);
                                posC1 = parseFloat((sum / g1.length).toFixed(2));
                            }
                            if (g2.length > 0) {
                                let sum = g2.reduce((a, b) => a + b, 0);
                                posC2 = parseFloat((sum / g2.length).toFixed(2));
                            }

                            setPos('sc_1', posC1);
                            setPos('sc_2', posC2);

                            writeLog("> [LANGKAH 3] Menghitung rata-rata (Mean) anggota...", "text-purple-400");
                            
                            // PERBAIKAN: Menggunakan tanda '+'
                            writeLog("> Posisi C1 baru = " + posC1);
                            writeLog("> Posisi C2 baru = " + posC2);

                            if (posC1 === prevPosC1 && posC2 === prevPosC2) {
                                changeTutor(
                                    "🎉 KONVERGENSI TERCAPAI! Karena posisi Centroid tidak bergeser lagi dari posisi sebelumnya, maka pengelompokan dinyatakan selesai dan stabil.", 
                                    "🔄 Ulangi Praktikum",
                                    "bg-green-900/40 border-green-500/50 shadow-[0_0_20px_rgba(34,197,94,0.15)]",
                                    "bg-gray-700 hover:bg-gray-600 border border-gray-500"
                                );
                                writeLog("> [STATUS] KONVERGEN! Algoritma berhenti.", "text-green-400 font-bold");
                                currentStep = 3; 
                            } else {
                                changeTutor(
                                    "Centroid telah bergeser! Karena bergeser, jarak data ke Centroid pasti ikut berubah. Sistem harus melakukan ITERASI (mengulang kembali ke Langkah 2).", 
                                    "🔄 Iterasi: Kelompokkan Ulang",
                                    "bg-orange-900/40 border-orange-500/50 shadow-[0_0_20px_rgba(249,115,22,0.15)]",
                                    "bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-500 hover:to-red-500"
                                );
                                currentStep = 1; 
                            }
                        }
                        // RESET
                        else if (currentStep === 3) {
                            currentStep = 0;
                            iterationCount = 0;
                            posC1 = 15;
                            posC2 = 16;
                            
                            document.getElementById('slideC1').value = 15;
                            document.getElementById('slideC2').value = 16;
                            document.getElementById('valC1').innerText = 15;
                            document.getElementById('valC2').innerText = 16;
                            
                            document.getElementById('sliderControl').classList.replace('opacity-30', 'opacity-100');
                            document.getElementById('slideC1').disabled = false;
                            document.getElementById('slideC2').disabled = false;

                            document.getElementById('simLog').innerHTML = "<span class='text-green-500'>> [SISTEM] Praktikum di-reset. Silakan tentukan posisi awal yang baru...</span><br>";
                            
                            liveUpdateCentroid();

                            document.querySelectorAll('.data-dot').forEach(el => {
                                let val = el.getAttribute('data-val');
                                el.className = "data-dot absolute w-5 h-5 bg-gray-500 rounded-full border-2 border-white transform -translate-x-1/2 bottom-[-11px] transition-all duration-500 z-10 flex justify-center shadow-md";
                                el.firstChild.className = "absolute -top-6 text-xs font-bold text-gray-300";
                            });

                            changeTutor(
                                "Sistem di-reset. Mari bereksperimen! Coba taruh Centroid awal di posisi yang sangat berjauhan (misal: 0 dan 30), lalu perhatikan apakah algoritmanya akan konvergen lebih cepat atau lebih lambat?", 
                                "🔒 Langkah 1: Kunci Posisi",
                                "bg-indigo-900/40 border-indigo-500/50 shadow-[0_0_20px_rgba(99,102,241,0.15)]",
                                "bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-500 hover:to-blue-500"
                            );
                        }
                    }
                </script>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute right-0 top-0 text-[10rem] opacity-5 pointer-events-none">🦾</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-6 text-center relative z-10">D. Metode Elbow (Mencari K Terbaik)</h3>
                    
                    <p class="text-center text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed relative z-10">
                        Tantangan terbesar K-Means adalah: "Bagaimana kita tahu nilai K (jumlah klaster) yang paling pas?". Data Scientist menggunakan trik cerdik yang disebut <strong>Metode Elbow</strong> (Mencari Titik Siku).
                    </p>

                    <div class="bg-[#1e293b] rounded-2xl border border-gray-600 shadow-xl p-6 md:p-8 flex flex-col md:flex-row gap-8 items-stretch relative z-10">
                        
                        <div class="w-full md:w-1/2 flex flex-col justify-center">
                            <h4 class="text-xl font-bold text-blue-400 mb-4 border-b border-gray-700 pb-2 flex items-center gap-2">
                                <span class="text-2xl">💡</span> Logika Sederhana:
                            </h4>
                            <ol class="list-decimal pl-5 text-gray-300 space-y-3 text-sm md:text-base">
                                <li>Jalankan algoritma K-Means mulai dari K=1, lalu catat nilai <strong>Inertia</strong> (Skor Total Error/Jarak)-nya.</li>
                                <li>Ulangi lagi untuk K=2, K=3, K=4, K=5.</li>
                                <li>Semakin banyak klaster (K), nilai error pasti akan selalu turun drastis.</li>
                                <li class="bg-indigo-950/50 p-4 rounded-xl border-2 border-indigo-500/50 mt-4 text-indigo-100 shadow-inner">
                                    <strong class="text-white">🚀 Kunci:</strong> Cari titik di mana grafik mulai melandai (tidak turun drastis lagi), membentuk sudut tajam seperti <strong>"Siku Tangan"</strong>. Titik itulah jumlah Klaster (K) yang paling optimal!
                                </li>
                            </ol>
                        </div>

                        <div class="w-full md:w-1/2 flex flex-col bg-black/50 p-5 rounded-2xl border-2 border-gray-700 shadow-inner overflow-hidden">
                            <span class="text-[10px] text-gray-500 font-mono tracking-widest uppercase block mb-6 border-b border-gray-700 pb-1 w-full text-center">Simulator Grafik Elbow</span>
                            
                            <div class="relative w-full aspect-[2/1] border-l-2 border-b-2 border-gray-500 pb-2 pl-2 mb-4">
                                <span class="absolute -left-12 top-1/2 transform -translate-y-1/2 -rotate-90 text-[10px] font-bold text-gray-500 tracking-wider">Inertia (Error)</span>
                                <span class="absolute -bottom-7 left-1/2 transform -translate-x-1/2 text-[10px] font-bold text-gray-500 tracking-wider">Jumlah Klaster (K)</span>
                                
                                <svg class="absolute inset-0 w-full h-full z-0 pointer-events-none" xmlns="http://www.w3.org/2000/svg">
                                    <polyline id="elbowLine" points="" fill="none" stroke="#3b82f6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="transition-all duration-500" />
                                </svg>

                                <div id="ep_1" class="absolute w-3 h-3 bg-blue-400 border border-white rounded-full transition-all duration-300 opacity-0 z-10 transform -translate-x-1/2 translate-y-1/2" style="left: 10%; bottom: 85%;"></div> 
                                <div id="ep_2" class="absolute w-3 h-3 bg-blue-400 border border-white rounded-full transition-all duration-300 opacity-0 z-10 transform -translate-x-1/2 translate-y-1/2" style="left: 30%; bottom: 50%;"></div> 
                                
                                <div id="ep_3" class="absolute w-6 h-6 bg-yellow-400 border-2 border-white rounded-full shadow-[0_0_20px_#facc15] z-20 flex items-center justify-center transition-all duration-300 opacity-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%; bottom: 25%;"></div> 
                                
                                <div id="ep_4" class="absolute w-3 h-3 bg-blue-400 border border-white rounded-full transition-all duration-300 opacity-0 z-10 transform -translate-x-1/2 translate-y-1/2" style="left: 70%; bottom: 15%;"></div> 
                                <div id="ep_5" class="absolute w-3 h-3 bg-blue-400 border border-white rounded-full transition-all duration-300 opacity-0 z-10 transform -translate-x-1/2 translate-y-1/2" style="left: 90%; bottom: 10%;"></div> 
                                
                                <div id="elbowLabel" class="absolute text-yellow-300 font-black text-xs opacity-0 transition-all duration-700 bg-black/80 px-2 py-1 rounded z-30" style="left: 54%; bottom: 35%;">
                                    &larr; Titik Siku (K=3)
                                </div>
                            </div>

                            <div class="bg-gray-900/80 border border-gray-700 rounded-lg p-3 mb-4 flex items-center justify-between shadow-inner">
                                <span class="text-xs text-gray-400 font-mono">Skor Inertia Saat Ini:</span>
                                <span id="inertiaValue" class="text-xl font-black font-mono text-red-400 tracking-wider">Menunggu...</span>
                            </div>

                            <div class="flex gap-2 w-full flex-wrap justify-center mt-auto">
                                <button id="btnK1" onclick="drawElbow(1)" class="flex-1 min-w-[50px] bg-gray-800 hover:bg-gray-700 text-blue-300 font-black py-2 rounded-lg border border-gray-600 active:scale-95 transition-all text-sm shadow-md">K=1</button>
                                <button id="btnK2" onclick="drawElbow(2)" class="flex-1 min-w-[50px] bg-gray-800 hover:bg-gray-700 text-blue-300 font-black py-2 rounded-lg border border-gray-600 active:scale-95 transition-all text-sm shadow-md">K=2</button>
                                <button id="btnK3" onclick="drawElbow(3)" class="flex-1 min-w-[50px] bg-gray-800 hover:bg-gray-700 text-yellow-500 font-black py-2 rounded-lg border border-yellow-700/50 active:scale-95 transition-all text-sm shadow-md relative overflow-hidden group">
                                    <span class="relative z-10">K=3</span>
                                    <div class="absolute inset-0 bg-yellow-500/10 group-hover:bg-yellow-500/20 transition-all"></div>
                                </button>
                                <button id="btnK4" onclick="drawElbow(4)" class="flex-1 min-w-[50px] bg-gray-800 hover:bg-gray-700 text-blue-300 font-black py-2 rounded-lg border border-gray-600 active:scale-95 transition-all text-sm shadow-md">K=4</button>
                                <button id="btnK5" onclick="drawElbow(5)" class="flex-1 min-w-[50px] bg-gray-800 hover:bg-gray-700 text-blue-300 font-black py-2 rounded-lg border border-gray-600 active:scale-95 transition-all text-sm shadow-md">K=5</button>
                                <button onclick="resetElbow()" class="bg-red-900/50 hover:bg-red-800 text-red-200 font-bold px-4 py-2 rounded-lg border border-red-700/50 active:scale-95 transition-all text-xs w-full mt-2">Reset Grafik</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const pointsData = {
                        1: {l: 10, b: 85},
                        2: {l: 30, b: 50},
                        3: {l: 50, b: 25},
                        4: {l: 70, b: 15},
                        5: {l: 90, b: 10}
                    };

                    const inertiaData = {
                        1: "845.200",
                        2: "412.550",
                        3: "150.300", 
                        4: "120.100", 
                        5: "105.050"  
                    };

                    function calculateSVGPoints(activeK) {
                        let pts = [];
                        for(let i=1; i<=activeK; i++){
                            let xPos = pointsData[i].l; 
                            let yPos = 100 - pointsData[i].b; 
                            pts.push(xPos + "%," + yPos + "%");
                        }
                        return pts.join(" ");
                    }

                    function drawElbow(k) {
                        const polyline = document.getElementById('elbowLine');
                        const pointsString = calculateSVGPoints(k);
                        polyline.setAttribute('points', pointsString);
                        
                        for(let i=1; i<=5; i++){
                            const pt = document.getElementById('ep_' + i);
                            const btn = document.getElementById('btnK' + i);
                            
                            if(i <= k){
                                pt.classList.replace('opacity-0', 'opacity-100');
                                if(i !== 3) btn.classList.add('bg-blue-900/40'); 
                            } else {
                                pt.classList.replace('opacity-100', 'opacity-0');
                                if(i !== 3) btn.classList.remove('bg-blue-900/40');
                            }
                        }

                        const inertiaLabel = document.getElementById('inertiaValue');
                        inertiaLabel.innerText = inertiaData[k];
                        
                        if(k < 3) {
                            inertiaLabel.className = "text-2xl font-black font-mono text-red-400 tracking-wider transition-all";
                        } else if (k === 3) {
                            inertiaLabel.className = "text-3xl font-black font-mono text-yellow-400 tracking-wider transition-all scale-110 drop-shadow-[0_0_8px_#facc15]";
                        } else {
                            inertiaLabel.className = "text-xl font-black font-mono text-green-400 tracking-wider transition-all";
                        }

                        if(k >= 3){
                            document.getElementById('elbowLabel').classList.replace('opacity-0', 'opacity-100');
                            document.getElementById('ep_3').classList.add('animate-pulse');
                            document.getElementById('btnK3').classList.add('bg-yellow-600');
                        } else {
                            document.getElementById('elbowLabel').classList.replace('opacity-100', 'opacity-0');
                            document.getElementById('ep_3').classList.remove('animate-pulse');
                            document.getElementById('btnK3').classList.remove('bg-yellow-600');
                        }
                    }

                    function resetElbow() {
                        document.getElementById('elbowLine').setAttribute('points', '');
                        document.getElementById('elbowLabel').classList.replace('opacity-100', 'opacity-0');
                        document.getElementById('ep_3').classList.remove('animate-pulse');
                        document.getElementById('btnK3').classList.remove('bg-yellow-600');
                        
                        document.getElementById('inertiaValue').innerText = "Menunggu...";
                        document.getElementById('inertiaValue').className = "text-xl font-black font-mono text-gray-500 tracking-wider transition-all";

                        for(let i=1; i<=5; i++){
                            document.getElementById('ep_' + i).classList.replace('opacity-100', 'opacity-0');
                            if(i !== 3) document.getElementById('btnK' + i).classList.remove('bg-blue-900/40');
                        }
                    }
                </script>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute -left-10 -bottom-10 text-[10rem] opacity-5 pointer-events-none">⚖️</div>
                    
                    <h3 class="text-3xl font-black text-center mb-6 text-white text-outline" style="line-height: 1.5;">E. Evaluasi Algoritma</h3>
                    
                    <p class="text-center text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed relative z-10">
                        Sebagai seorang calon <em>Data Scientist</em>, kamu harus tahu <strong>kapan menggunakan</strong> algoritma K-Means dan <strong>kapan harus menghindarinya</strong>. Berikut adalah rangkuman kelebihan dan kelemahannya:
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 relative z-10">
                        
                        <div class="bg-gradient-to-b from-green-900/40 to-[#0f1115] p-6 rounded-3xl border border-green-500/50 shadow-xl transition-all duration-300 hover:shadow-[0_0_20px_rgba(34,197,94,0.2)]">
                            <div class="flex items-center gap-3 mb-6 border-b border-green-500/30 pb-3">
                                <span class="text-4xl">🌟</span>
                                <h4 class="text-2xl font-black text-green-400">Kelebihan</h4>
                            </div>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4 bg-black/40 p-4 rounded-xl border border-green-500/20 shadow-inner">
                                    <span class="text-green-500 font-black mt-1 text-xl">🚀</span>
                                    <div>
                                        <strong class="text-white block mb-1">Sangat Cepat & Efisien</strong>
                                        <p class="text-sm text-gray-400 leading-relaxed">Waktu komputasinya linear. Sangat tangguh untuk memproses <em>dataset</em> berskala raksasa (jutaan baris data) dalam waktu singkat.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-4 bg-black/40 p-4 rounded-xl border border-green-500/20 shadow-inner">
                                    <span class="text-green-500 font-black mt-1 text-xl">🧠</span>
                                    <div>
                                        <strong class="text-white block mb-1">Sederhana & Mudah Dipahami</strong>
                                        <p class="text-sm text-gray-400 leading-relaxed">Prinsip kerjanya (rata-rata dan jarak) sangat logis dan mudah diinterpretasikan oleh manusia.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-b from-red-900/40 to-[#0f1115] p-6 rounded-3xl border border-red-500/50 shadow-xl transition-all duration-300 hover:shadow-[0_0_20px_rgba(239,68,68,0.2)]">
                            <div class="flex items-center gap-3 mb-6 border-b border-red-500/30 pb-3">
                                <span class="text-4xl">⚠️</span>
                                <h4 class="text-2xl font-black text-red-400">Kelemahan</h4>
                            </div>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-4 bg-black/40 p-4 rounded-xl border border-red-500/20 shadow-inner">
                                    <span class="text-red-500 font-black mt-1 text-xl">❓</span>
                                    <div>
                                        <strong class="text-white block mb-1">Manusia Harus Menebak (K)</strong>
                                        <p class="text-sm text-gray-400 leading-relaxed">Algoritma ini manja karena tidak bisa mencari tahu jumlah kelompoknya sendiri secara otomatis. Kita harus repot menggunakan Metode <em>Elbow</em> terlebih dahulu.</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-4 bg-black/40 p-4 rounded-xl border border-red-500/20 shadow-inner">
                                    <span class="text-red-500 font-black mt-1 text-xl">🧲</span>
                                    <div>
                                        <strong class="text-white block mb-1">Sensitif Terhadap Outlier</strong>
                                        <p class="text-sm text-gray-400 leading-relaxed">Satu data yang sangat menyimpang atau nyeleneh (misal: ada nilai 1.000 di antara nilai puluhan) bisa menyeret <em>Centroid</em> pergi terlalu jauh dan merusak hasil seluruh klaster.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>

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
                    data-question="Pada nama algoritma 'K-Means', apa maksud dari huruf 'K'?"
                    data-opt-a="Koordinat (Coordinate), yaitu titik lokasi data di grafik."
                    data-opt-b="Konvergensi (Convergence), yaitu saat algoritma sudah selesai."
                    data-opt-c="Konstanta angka yang mewakili berapa banyak jumlah kelompok (klaster) yang ingin kita buat."
                    data-opt-d="Knowledge (Pengetahuan), yaitu seberapa cerdas AI tersebut."
                    data-opt-e="Korelasi (Correlation), yaitu tingkat hubungan antar variabel dalam data."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam algoritma K-Means, bagaimana cara sistem memindahkan posisi Centroid (titik pusat) pada langkah 'Update Centroid'?"
                    data-opt-a="Centroid dipindahkan ke titik data yang paling dekat dengannya."
                    data-opt-b="Menghitung nilai rata-rata (mean) dari semua anggota di klaster tersebut, lalu Centroid digeser ke titik rata-rata itu."
                    data-opt-c="Memindahkan centroid ke data Outlier."
                    data-opt-d="Centroid dipilih secara acak lagi."
                    data-opt-e="Menghitung jarak dari titik nol (0,0) grafik dan membaginya sesuai jumlah klaster."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Kapan proses perulangan (Iterasi) pada algoritma K-Means akan dinyatakan berhenti atau selesai (Konvergen)?"
                    data-opt-a="Saat posisi Centroid sudah tidak berubah/bergeser lagi dan tidak ada data yang pindah kelompok."
                    data-opt-b="Setelah proses iterasi dilakukan tepat 100 kali."
                    data-opt-c="Saat semua data bergabung menjadi satu klaster besar."
                    data-opt-d="Saat komputer kehabisan memori RAM."
                    data-opt-e="Saat nilai Inertia mencapai angka nol mutlak (0)."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Karena K-Means tidak bisa mencari tahu sendiri berapa jumlah kelompok (K) yang pas, para Data Scientist menggunakan sebuah teknik visual dengan melihat grafik yang melandai. Apa nama teknik ini?"
                    data-opt-a="Metode Histogram"
                    data-opt-b="Aturan Sturges"
                    data-opt-c="Metode Elbow (Siku Tangan)"
                    data-opt-d="Metode Pearson Correlation"
                    data-opt-e="Metode Jarak Euclidean (Euclidean Method)"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan bagian Evaluasi Algoritma, apa salah satu kelemahan terbesar dari algoritma K-Means?"
                    data-opt-a="Sangat lambat jika memproses jutaan baris data."
                    data-opt-b="Rumusnya terlalu rumit untuk dipahami manusia."
                    data-opt-c="Sangat sensitif terhadap data pencilan (Outlier) karena satu data ekstrem bisa menyeret Centroid terlalu jauh."
                    data-opt-d="Hanya bisa memproses data yang memiliki label/kunci jawaban (Supervised Learning)."
                    data-opt-e="Algoritma ini hanya mampu membagi data maksimal menjadi 3 kelompok (K=3) saja."
                    data-answer="C">
                </div>
            </div>
EOT;

        // 3. Simpan ke Database
        Material::updateOrCreate(
            ['slug' => 'algoritma-k-means'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Algoritma K-Means',
                'type' => 'text', 
                'sequence' => 5, // Sesuaikan urutannya
                'min_level' => 10,
                'content' => $content
            ]
        );
        
        $this->command->info('Materi K-Means berhasil diperbarui dengan Multi-Quiz!');
    }
}