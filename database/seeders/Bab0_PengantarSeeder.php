<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Material;

class Bab0_PengantarSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Bab Pengantar (Sequence 0 agar selalu berada di urutan teratas)
        $chapter = Chapter::firstOrCreate(
            ['sequence' => 0],
            [
                'title' => 'Pengantar Data',
                'description' => 'Peta konsep pembelajaran dan apersepsi mengapa Pengolahan, Visualisasi, dan Clustering Data sangat penting di era modern.',
                'is_active' => true
            ]
        );

        // 2. Konten Peta Konsep & Apersepsi Terbaru
        $content = <<<'EOT'
        <div class="space-y-12 text-[#1d1d1f] font-sans">

            <!-- SEKSI 1: PETA KONSEP PEMBELAJARAN -->
            <div>
                <h3 class="text-2xl md:text-3xl font-bold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    Peta Konsep Pembelajaran
                </h3>
                
                <div class="bg-[#f5f5f7] p-6 md:p-8 rounded-2xl border border-[#e0e0e0] shadow-sm">
                    <p class="text-[#555555] mb-6 text-sm text-center md:text-left leading-relaxed">
                        Berikut adalah alur perjalanan pembelajaran yang akan kamu pelajari dalam modul interaktif ini:
                    </p>
                    
                    <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] overflow-x-auto custom-scrollbar">
                        <div class="min-w-[768px] flex items-stretch justify-between gap-6 py-2">
                            
                            <!-- Header Modul Utama -->
                            <div class="flex-shrink-0 bg-[#0066cc]/10 border border-[#0066cc]/30 text-[#0066cc] font-bold p-6 rounded-xl text-center shadow-sm w-52 flex flex-col justify-center items-center">
                                <div class="text-[11px] uppercase tracking-wider text-[#0066cc] font-bold mb-2">Modul Pembelajaran</div>
                                <div class="text-base font-bold text-[#1d1d1f]">Visualisasi & Clustering Data</div>
                            </div>

                            <div class="w-8 h-[2px] bg-[#e0e0e0] self-center flex-shrink-0"></div>

                            <!-- Daftar Bab & Sub-Bab -->
                            <div class="flex flex-col gap-5 flex-1">
                                
                                <!-- Bab 1 -->
                                <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 flex items-center gap-4 hover:border-[#0066cc]/50 transition-colors">
                                    <div class="w-48 flex-shrink-0 bg-[#0066cc]/10 border border-[#0066cc]/20 text-[#0066cc] font-bold p-3 rounded-lg text-xs text-center">
                                        Bab 1: Konsep Dasar Data
                                    </div>
                                    <div class="w-4 h-[2px] bg-[#e0e0e0] flex-shrink-0"></div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 flex-1">
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-[#0066cc] shrink-0"></span>
                                            <span class="font-medium">1. Definisi Konsep Data</span>
                                        </div>
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-[#0066cc] shrink-0"></span>
                                            <span class="font-medium">2. Klasifikasi Bentuk Data</span>
                                        </div>
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-[#0066cc] shrink-0"></span>
                                            <span class="font-medium">3. Kesalahan Penafsiran Data</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bab 2 -->
                                <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 flex items-center gap-4 hover:border-emerald-500/50 transition-colors">
                                    <div class="w-48 flex-shrink-0 bg-emerald-500/10 border border-emerald-500/20 text-emerald-700 font-bold p-3 rounded-lg text-xs text-center">
                                        Bab 2: Visualisasi Data
                                    </div>
                                    <div class="w-4 h-[2px] bg-[#e0e0e0] flex-shrink-0"></div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 flex-1">
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                                            <span class="font-medium">1. Konsep Visualisasi</span>
                                        </div>
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                                            <span class="font-medium">2. Jenis-Jenis Grafik</span>
                                        </div>
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0"></span>
                                            <span class="font-medium">3. Etika & Penyajian</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bab 3 -->
                                <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 flex items-center gap-4 hover:border-amber-500/50 transition-colors">
                                    <div class="w-48 flex-shrink-0 bg-amber-500/10 border border-amber-500/20 text-amber-700 font-bold p-3 rounded-lg text-xs text-center">
                                        Bab 3: Pengelompokan Data (Clustering)
                                    </div>
                                    <div class="w-4 h-[2px] bg-[#e0e0e0] flex-shrink-0"></div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 flex-1">
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></span>
                                            <span class="font-medium">1. Unsupervised Learning</span>
                                        </div>
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></span>
                                            <span class="font-medium">2. Algoritma K-Means</span>
                                        </div>
                                        <div class="bg-white border border-[#e0e0e0] px-3 py-2 rounded-lg text-xs text-[#333333] flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-amber-500 shrink-0"></span>
                                            <span class="font-medium">3. Evaluasi & Elbow</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI 2: APERSEPSI -->
            <div class="relative mt-12">
                <h3 class="text-2xl md:text-3xl font-bold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                    Apersepsi: Dunia di Balik Layar
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="bg-[#fafafc] p-6 md:p-8 rounded-2xl border border-[#e0e0e0] flex flex-col justify-between shadow-sm">
                        <div>
                            <p class="text-[#333333] leading-relaxed text-base mb-6">
                                Pernahkah kamu merasa smartphone seolah bisa membaca pikiranmu? Misalnya, video yang muncul di FYP <strong>TikTok</strong> atau rekomendasi lagu di <strong>Spotify</strong> secara ajaib sangat pas dengan seleramu, padahal kamu tidak pernah mengetikkan kata kunci pencarian tersebut.
                            </p>
                            <div class="p-5 bg-[#0066cc]/10 border-l-4 border-[#0066cc] rounded-r-xl mb-6">
                                <p class="text-[#1d1d1f] font-medium text-lg">
                                    Rahasianya adalah <span class="text-[#0066cc] uppercase tracking-wider text-xl ml-1 font-bold">Data</span>.
                                </p>
                            </div>
                        </div>
                        
                        <div class="rounded-xl overflow-hidden border border-[#e0e0e0]">
                            <img src="/images/materi/ilustrasi-sosmed.png" alt="Ilustrasi Spotify dan TikTok" class="w-full h-auto object-cover opacity-95 hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    <div class="bg-[#fafafc] p-6 md:p-8 rounded-2xl border border-[#e0e0e0] flex flex-col justify-between shadow-sm">
                        <div>
                            <p class="text-[#333333] text-base leading-relaxed mb-6">
                                Setiap kali kamu menggunakan aplikasi, sistem secara diam-diam bertindak sebagai detektif yang mencatat data perilakumu (seperti durasi menonton atau tombol <em>like</em> yang ditekan). Agar data jutaan pengguna ini bisa dipahami oleh mesin, sistem melakukan langkah-langkah cerdas di belakang layar:
                            </p>
                            
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start gap-4 bg-white p-3.5 rounded-xl border border-[#e0e0e0]">
                                    <span class="flex items-center justify-center w-7 h-7 bg-[#0066cc]/10 rounded-full text-[#0066cc] text-sm font-bold shrink-0">1</span>
                                    <p class="text-sm text-[#333333]">
                                        <strong class="text-[#1d1d1f] font-semibold">Konsep & Pengolahan Data:</strong> Memahami fakta mentah, jenis data, serta memastikan kualitas data sebelum diproses (Bab 1).
                                    </p>
                                </li>
                                <li class="flex items-start gap-4 bg-white p-3.5 rounded-xl border border-[#e0e0e0]">
                                    <span class="flex items-center justify-center w-7 h-7 bg-emerald-500/10 rounded-full text-emerald-600 text-sm font-bold shrink-0">2</span>
                                    <p class="text-sm text-[#333333]">
                                        <strong class="text-[#1d1d1f] font-semibold">Visualisasi Data:</strong> Mengubah angka dan log aktivitas menjadi grafik visual agar pola kebiasaan terlihat dengan cepat (Bab 2).
                                    </p>
                                </li>
                                <li class="flex items-start gap-4 bg-white p-3.5 rounded-xl border border-[#e0e0e0]">
                                    <span class="flex items-center justify-center w-7 h-7 bg-amber-500/10 rounded-full text-amber-600 text-sm font-bold shrink-0">3</span>
                                    <p class="text-sm text-[#333333]">
                                        <strong class="text-[#1d1d1f] font-semibold">Clustering (Pengelompokan):</strong> Algoritma AI mengelompokkan profil pengguna yang mirip untuk memberikan rekomendasi yang presisi (Bab 3).
                                    </p>
                                </li>
                            </ul>
                        </div>

                        <div class="pt-5 border-t border-[#e0e0e0] text-center">
                            <p class="text-sm text-[#7a7a7a] italic leading-relaxed">
                                "Di modul ini, kita akan membongkar rahasia dapur tersebut! Daripada hanya menjadi penikmat teknologi, mari pelajari cara kerja cerdas di baliknya secara ilmiah."
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        EOT;

        // 3. Simpan / Perbarui ke tabel Materials
        Material::updateOrCreate(
            ['slug' => 'pengantar-dan-apersepsi'], 
            [
                'chapter_id' => $chapter->id,
                'title' => 'Peta Konsep & Apersepsi',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 0, 
                'content' => $content
            ]
        );
        
        $this->command->info('Bab 0: Pengantar dan Apersepsi berhasil ditambahkan!');
    }
}