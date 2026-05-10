<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Material;

class Bab0_PengantarSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Bab Pengantar (Sequence 0 agar selalu di atas Bab 1)
        $chapter = Chapter::firstOrCreate(
            ['sequence' => 0],
            [
                'title' => 'Pengantar Data Science',
                'description' => 'Peta konsep pembelajaran dan apersepsi mengapa Data Science sangat penting di era modern.',
                'is_active' => true
            ]
        );

        // 2. Konten Peta Konsep & Apersepsi (TOMBOL BIRU TELAH DIHAPUS)
        $content = <<<EOT
            <div class="space-y-12 text-slate-200 font-sans">

                <!-- Bagian Peta Konsep -->
                <div>
                    <h3 class="text-3xl font-black text-white mb-6 flex items-center gap-3">
                        <span class="p-2 bg-blue-600/20 rounded-lg text-blue-400">🗺️</span> Peta Konsep Pembelajaran
                    </h3>
                    <div class="bg-slate-800/50 p-6 rounded-3xl border border-slate-700 shadow-xl text-center">
                        <p class="text-slate-400 mb-6 text-sm">Berikut adalah alur perjalanan yang akan kamu pelajari dalam modul interaktif ini:</p>
                        <div class="relative rounded-2xl overflow-hidden border-2 border-slate-600 group">
                            <img src="/images/materi/PetaKonsep.png" alt="Peta Konsep Data Science" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 border-4 border-transparent group-hover:border-blue-500/50 transition-colors rounded-2xl pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Apersepsi -->
                <div class="relative mt-16 pb-12">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-32 bg-indigo-600/20 blur-[100px] rounded-full pointer-events-none"></div>
                    
                    <h3 class="text-3xl font-black text-white mb-6 flex items-center gap-3 relative z-10">
                        <span class="p-2 bg-indigo-600/20 rounded-lg text-indigo-400">💡</span> Apersepsi: Dunia di Balik Layar
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                        
                        <!-- Kolom Kiri: Pengantar Fenomena & Gambar -->
                        <div class="bg-gradient-to-br from-slate-800 to-slate-900 p-8 rounded-3xl border border-slate-700 shadow-2xl flex flex-col justify-between transform hover:-translate-y-2 transition-transform duration-300">
                            <div>
                                <div class="text-5xl mb-6 animate-bounce">📱</div>
                                <p class="text-slate-300 leading-relaxed text-lg mb-6">
                                    Pernahkah kamu merasa gawai (<em>smartphone</em>) seolah bisa membaca pikiranmu? Misalnya, video yang muncul di FYP <strong>TikTok</strong> atau rekomendasi "Discover Weekly" di <strong>Spotify</strong> secara ajaib sangat pas dengan seleramu saat itu, padahal kamu tidak mengetikkan kata kunci pencarian apa pun.
                                </p>
                                <div class="p-5 bg-indigo-500/10 border-l-4 border-indigo-500 rounded-r-xl mb-6">
                                    <p class="text-indigo-300 font-bold text-lg">
                                        Rahasianya bukanlah sihir, melainkan <span class="text-yellow-400 uppercase tracking-wider text-xl ml-1">Data</span>.
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Gambar Spotify & TikTok dimasukkan ke sini agar susunannya sama dengan Word -->
                            <div class="rounded-xl overflow-hidden border border-slate-600">
                                <!-- Ganti path src ini dengan lokasi gambar gabungan Spotify dan TikTok milikmu -->
                                <img src="/images/materi/ilustrasi-sosmed.png" alt="Ilustrasi Spotify dan TikTok" class="w-full h-auto object-cover opacity-90 hover:opacity-100 transition-opacity">
                            </div>
                        </div>

                        <!-- Kolom Kanan: Penjelasan Teknis, Gambar Baru & Penutup -->
                        <div class="bg-gradient-to-br from-indigo-900/80 to-purple-900/80 p-8 rounded-3xl border border-indigo-500/30 shadow-[0_0_30px_rgba(79,70,229,0.2)] flex flex-col justify-between">
                            <div>
                                <p class="text-white text-base leading-relaxed mb-6">
                                    Setiap kali kamu menggunakan aplikasi, sistem secara diam-diam bertindak sebagai detektif yang mencatat data perilakumu (seperti durasi menonton atau tombol <em>like</em> yang ditekan). Agar data jutaan pengguna yang berantakan ini bisa dipahami oleh mesin, sistem melakukan dua langkah cerdas di belakang layar:
                                </p>
                                
                                <ul class="space-y-4 mb-6">
                                    <li class="flex items-start gap-4">
                                        <span class="mt-1 flex items-center justify-center w-6 h-6 bg-blue-500/30 rounded-full text-blue-300 text-sm font-bold shrink-0">1</span>
                                        <p class="text-sm text-slate-200">
                                            <strong class="text-white">Visualisasi Data:</strong> Mengubah baris data kebiasaanmu menjadi grafik visual agar polanya terlihat jelas.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <span class="mt-1 flex items-center justify-center w-6 h-6 bg-purple-500/30 rounded-full text-purple-300 text-sm font-bold shrink-0">2</span>
                                        <p class="text-sm text-slate-200">
                                            <strong class="text-white">Clustering (Pengelompokan):</strong> Algoritma AI mengelompokkan profilmu dengan pengguna lain yang memiliki pola serupa, sehingga tahu tren di "sirkel" seleramu.
                                        </p>
                                    </li>
                                </ul>
                            </div>

                            <!-- Gambar Baru: Detektif Algoritma -->
                            <div class="rounded-xl overflow-hidden border border-indigo-500/50 mb-6 shadow-inner">
                                <img src="/images/materi/detektifAlgoritma.png" alt="Ilustrasi Visualisasi dan Clustering" class="w-full h-48 object-cover opacity-90 hover:opacity-100 hover:scale-105 transition-all duration-500">
                            </div>

                            <!-- Teks Penutup -->
                            <div class="pt-5 border-t border-white/10 text-center">
                                <p class="text-sm text-indigo-200 italic leading-relaxed">
                                    "Di modul ini, kita akan membongkar rahasia dapur tersebut! Daripada hanya menjadi penikmat teknologi, mari pelajari cara kerja cerdas di baliknya secara ilmiah."
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
EOT;

        // 3. Masukkan ke tabel Materials
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