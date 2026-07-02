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
                'title' => 'Pengantar Data',
                'description' => 'Peta konsep pembelajaran dan apersepsi mengapa Visualisasi Data sangat penting di era modern.',
                'is_active' => true
            ]
        );

        // 2. Konten Peta Konsep & Apersepsi (Gaya Desain Premium Berbasis Karakteristik Apple)
        $content = <<<EOT
            <div class="space-y-12 text-[#cccccc] font-sans">

                <div>
                    <h3 class="text-3xl font-semibold text-white mb-6">
                        Peta Konsep Pembelajaran
                    </h3>
                    <div class="bg-[#272729] p-6 rounded-3xl border border-white/10 text-center">
                        <p class="text-[#7a7a7a] mb-6 text-sm">Berikut adalah alur perjalanan yang akan kamu pelajari dalam modul interaktif ini:</p>
                        <div class="relative rounded-2xl overflow-hidden border border-white/10 group">
                            <img src="/images/materi/PetaKonsep.png" alt="Peta Konsep Data Science" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 border border-transparent group-hover:border-[#2997ff]/30 transition-colors rounded-2xl pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                <div class="relative mt-16 pb-12">
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-32 bg-[#2997ff]/5 blur-[80px] rounded-full pointer-events-none"></div>
                    
                    <h3 class="text-3xl font-semibold text-white mb-6 relative z-10">
                        Apersepsi: Dunia di Balik Layar
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10">
                        
                        <div class="bg-[#2a2a2c] p-8 rounded-3xl border border-white/10 flex flex-col justify-between transition-colors duration-300">
                            <div>
                                <p class="text-[#cccccc] leading-relaxed text-lg mb-6">
                                    Pernahkah kamu merasa gawai (<em>smartphone</em>) seolah bisa membaca pikiranmu? Misalnya, video yang muncul di FYP <strong>TikTok</strong> atau rekomendasi "Discover Weekly" di <strong>Spotify</strong> secara ajaib sangat pas dengan seleramu saat itu, padahal kamu tidak mengetikkan kata kunci pencarian apa pun.
                                </p>
                                <div class="p-5 bg-[#2997ff]/10 border-l-4 border-[#2997ff] rounded-r-xl mb-6">
                                    <p class="text-white font-medium text-lg">
                                        Rahasianya bukanlah sihir, melainkan <span class="text-[#2997ff] uppercase tracking-wider text-xl ml-1 font-semibold">Data</span>.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="rounded-xl overflow-hidden border border-white/5">
                                <img src="/images/materi/ilustrasi-sosmed.png" alt="Ilustrasi Spotify dan TikTok" class="w-full h-auto object-cover opacity-90 hover:opacity-100 transition-opacity">
                            </div>
                        </div>

                        <div class="bg-[#252527] p-8 rounded-3xl border border-white/10 flex flex-col justify-between">
                            <div>
                                <p class="text-white text-base leading-relaxed mb-6">
                                    Setiap kali kamu menggunakan aplikasi, sistem secara diam-diam bertindak sebagai detektif yang mencatat data perilakumu (seperti durasi menonton atau tombol <em>like</em> yang ditekan). Agar data jutaan pengguna yang berantakan ini bisa dipahami oleh mesin, sistem melakukan dua langkah cerdas di belakang layar:
                                </p>
                                
                                <ul class="space-y-4 mb-6">
                                    <li class="flex items-start gap-4">
                                        <span class="mt-1 flex items-center justify-center w-6 h-6 bg-[#2997ff]/20 rounded-full text-[#2997ff] text-sm font-semibold shrink-0">1</span>
                                        <p class="text-sm text-[#cccccc]">
                                            <strong class="text-white font-medium">Visualisasi Data:</strong> Mengubah baris data kebiasaanmu menjadi grafik visual agar polanya terlihat jelas.
                                        </p>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <span class="mt-1 flex items-center justify-center w-6 h-6 bg-[#2997ff]/20 rounded-full text-[#2997ff] text-sm font-semibold shrink-0">2</span>
                                        <p class="text-sm text-[#cccccc]">
                                            <strong class="text-white font-medium">Clustering (Pengelompokan):</strong> Algoritma AI mengelompokkan profilmu dengan pengguna lain yang memiliki pola serupa, sehingga tahu tren di "sirkel" seleramu.
                                        </p>
                                    </li>
                                </ul>
                            </div>

                            <div class="rounded-xl overflow-hidden border border-white/5 mb-6">
                                <img src="/images/materi/detektifAlgoritma.png" alt="Ilustrasi Visualisasi dan Clustering" class="w-full h-48 object-cover opacity-90 hover:opacity-100 hover:scale-102 transition-all duration-500">
                            </div>

                            <div class="pt-5 border-t border-white/10 text-center">
                                <p class="text-sm text-[#7a7a7a] italic leading-relaxed">
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