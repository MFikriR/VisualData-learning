<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_02_PengelompokanDataSeeder extends Seeder
{
    public function run(): void
    {
        // Cari Bab 2 berdasarkan urutan (sequence 2)
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 2 belum dibuat! Pastikan ChapterSeeder untuk Bab 2 sudah dijalankan.');
            return;
        }

        $content = <<<'EOT'
            <div id="areaMateriPelajaran" class="space-y-12 font-sans transition-all duration-1000 relative z-10 pb-20" style="color: #1d1d1f !important;">

                <!-- Header Judul Bab Pokok Materi -->
                <div class="mb-10 text-center">
                    <h2 class="text-3xl md:text-4xl font-semibold mb-4 tracking-tight" style="color: #ffffff !important;">2. Pengelompokan Data</h2>
                    <p class="text-base md:text-lg font-medium max-w-2xl mx-auto" style="color: #7a7a7a !important;">Memahami bagaimana komputer menemukan pola tersembunyi dan mengelompokkan data yang memiliki kemiripan.</p>
                </div>

                <div>
                    <div class="space-y-6 text-base md:text-lg leading-relaxed font-medium" style="color: #333333 !important;">
                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Mengapa Data Perlu Dikelompokkan?</h4>
                            <p>Bayangkan kamu memiliki daftar ratusan siswa dari berbagai kelas. Jika seluruh data dicampur menjadi satu, akan sulit menemukan pola tertentu. Oleh karena itu, data sering dikelompokkan berdasarkan karakteristik yang mirip agar lebih mudah dipahami dan dianalisis.</p>
                            <p class="mt-3 font-semibold text-[#0066cc]">Dalam dunia data, proses mengelompokkan data yang memiliki kemiripan disebut <em>clustering</em>.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Apa Itu Clustering?</h4>
                            <p><strong>Clustering</strong> adalah proses mengelompokkan data ke dalam beberapa kelompok (cluster) berdasarkan kemiripan karakteristik yang dimiliki.</p>
                            <p class="mt-2 text-sm md:text-base" style="color: #7a7a7a !important;">Data yang memiliki karakteristik mirip akan ditempatkan dalam kelompok yang sama, sedangkan data yang berbeda akan ditempatkan pada kelompok yang berbeda. Tujuan clustering adalah membantu menemukan pola atau kelompok alami yang tersembunyi di dalam data.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Contoh Sederhana</h4>
                            <p class="mb-4 text-sm md:text-base text-[#7a7a7a]">Perhatikan data nilai berikut.</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                                <div class="bg-white p-4 rounded-2xl border border-[#e0e0e0]">
                                    <h5 class="mb-3 font-semibold border-b border-[#e0e0e0] pb-2 text-sm" style="color: #1d1d1f !important;">Tabel Data Awal</h5>
                                    <div class="grid grid-cols-2 border border-[#e0e0e0] rounded-lg overflow-hidden text-center text-xs md:text-sm">
                                        <div class="bg-[#f5f5f7] p-2.5 border-b border-r border-[#e0e0e0] text-[#7a7a7a] font-semibold">Nama</div>
                                        <div class="bg-[#f5f5f7] p-2.5 border-b border-[#e0e0e0] text-[#7a7a7a] font-semibold">Nilai</div>
                                        <div class="p-2 border-b border-r border-[#e0e0e0]">Andi</div><div class="p-2 border-b border-[#e0e0e0] font-mono font-bold text-emerald-600">90</div>
                                        <div class="p-2 border-b border-r border-[#e0e0e0] bg-[#fafafc]">Budi</div><div class="p-2 border-b border-[#e0e0e0] bg-[#fafafc] font-mono font-bold text-emerald-600">88</div>
                                        <div class="p-2 border-b border-r border-[#e0e0e0]">Citra</div><div class="p-2 border-b border-[#e0e0e0] font-mono font-bold text-emerald-600">85</div>
                                        <div class="p-2 border-b border-r border-[#e0e0e0] bg-[#fafafc]">Deni</div><div class="p-2 border-b border-[#e0e0e0] bg-[#fafafc] font-mono font-bold text-[#ff453a]">60</div>
                                        <div class="p-2 border-b border-r border-[#e0e0e0]">Eka</div><div class="p-2 border-b border-[#e0e0e0] font-mono font-bold text-[#ff453a]">58</div>
                                        <div class="p-2 border-r border-[#e0e0e0] bg-[#fafafc]">Fani</div><div class="p-2 bg-[#fafafc] font-mono font-bold text-[#ff453a]">55</div>
                                    </div>
                                </div>

                                <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-2xl space-y-4">
                                    <p class="font-semibold text-xs md:text-sm mb-2" style="color: #1d1d1f !important;">Data tersebut dapat dikelompokkan menjadi:</p>
                                    
                                    <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] border-l-4 border-l-emerald-500">
                                        <strong class="text-emerald-600 block mb-1 text-sm font-semibold">Kelompok Nilai Tinggi (Di atas 80)</strong>
                                        <ul class="list-disc pl-5 text-xs md:text-sm font-medium text-[#7a7a7a]">
                                            <li>Andi (90)</li><li>Budi (88)</li><li>Citra (85)</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] border-l-4 border-l-[#ff453a]">
                                        <strong class="text-[#ff453a] block mb-1 text-sm font-semibold">Kelompok Nilai Rendah (Di bawah 70)</strong>
                                        <ul class="list-disc pl-5 text-xs md:text-sm font-medium text-[#7a7a7a]">
                                            <li>Deni (60)</li><li>Eka (58)</li><li>Fani (55)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 bg-[#f5f5f7] p-4 rounded-xl border border-[#e0e0e0] border-l-4 border-l-[#0066cc] text-sm md:text-base font-medium">
                                <p style="color: #1d1d1f !important;"><strong>Catatan Penting:</strong> Clustering tidak memerlukan label kelompok sejak awal. Sistem komputer akan secara otomatis mencari dan membentuk kelompok berdasarkan kemiripan data yang ditemukan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian B: Studi Kasus Real Sehari-hari -->
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        B. Contoh Clustering dalam Kehidupan Sehari-hari
                    </h3>
                    <p class="text-base md:text-lg font-medium leading-relaxed mb-6" style="color: #ffffff !important;">Tanpa disadari, kita sering melakukan pengelompokan dalam kehidupan sehari-hari.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-2xl">
                            <h4 class="font-semibold text-base md:text-lg mb-2" style="color: #1d1d1f !important;">1. Mengelompokkan Buku di Perpustakaan</h4>
                            <p class="text-xs md:text-sm text-[#7a7a7a] mb-2 font-medium">Buku dapat dikelompokkan berdasarkan:</p>
                            <ul class="list-disc pl-5 text-xs md:text-sm font-semibold" style="color: #333333 !important;">
                                <li>Mata pelajaran</li><li>Penulis</li><li>Tahun terbit</li>
                            </ul>
                            <p class="text-xs text-[#7a7a7a] mt-2 font-medium">Sehingga lebih mudah dicari oleh pengunjung.</p>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-2xl">
                            <h4 class="font-semibold text-base md:text-lg mb-2" style="color: #1d1d1f !important;">2. Mengelompokkan Siswa Berdasarkan Nilai</h4>
                            <p class="text-xs md:text-sm text-[#7a7a7a] mb-2 font-medium">Guru dapat mengelompokkan siswa menjadi:</p>
                            <ul class="list-disc pl-5 text-xs md:text-sm font-semibold" style="color: #333333 !important;">
                                <li>Nilai tinggi</li><li>Nilai sedang</li><li>Nilai rendah</li>
                            </ul>
                            <p class="text-xs text-[#7a7a7a] mt-2 font-medium">Untuk membantu menyesuaikan proses pembelajaran.</p>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-2xl">
                            <h4 class="font-semibold text-base md:text-lg mb-2" style="color: #1d1d1f !important;">3. Rekomendasi Film atau Musik</h4>
                            <p class="text-xs md:text-sm font-medium leading-relaxed" style="color: #7a7a7a !important;">
                                Layanan seperti Spotify atau YouTube mengelompokkan pengguna yang memiliki kebiasaan menonton/mendengarkan serupa sehingga dapat memberikan rekomendasi yang lebih akurat dan sesuai selera.
                            </p>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-2xl">
                            <h4 class="font-semibold text-base md:text-lg mb-2" style="color: #1d1d1f !important;">4. Pengelompokan Produk Toko Online</h4>
                            <p class="text-xs md:text-sm text-[#7a7a7a] mb-2 font-medium">Toko online dapat mengelompokkan pelanggan berdasarkan pola belanja mereka. Misalnya:</p>
                            <ul class="list-disc pl-5 text-xs md:text-sm font-semibold" style="color: #333333 !important;">
                                <li>Pelanggan yang sering membeli buku.</li>
                                <li>Pelanggan yang sering membeli elektronik.</li>
                                <li>Pelanggan yang sering membeli pakaian.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Aktivitas Pemantik Interaktif Game Kelompok Hobi -->
                    <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-10 relative overflow-hidden">
                        <h4 class="text-xl font-semibold mb-2 tracking-tight" style="color: #1d1d1f !important;">
                            Aktivitas Pemantik
                        </h4>
                        <p class="text-sm leading-relaxed mb-6 font-medium" style="color: #7a7a7a !important;">
                            Perhatikan daftar hobi siswa di bawah ini. Menurutmu, bagaimana cara mengelompokkan data tersebut secara logis? Klik pada baris data untuk memasukkannya ke dalam kelompok yang sesuai!
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl border border-[#e0e0e0] overflow-hidden">
                                <table class="w-full text-xs md:text-sm text-center">
                                    <thead class="bg-[#f5f5f7] text-[#7a7a7a] font-semibold border-b border-[#e0e0e0]">
                                        <tr><th class="p-2.5">Nama</th><th class="p-2.5">Hobi</th><th class="p-2.5">Aksi</th></tr>
                                    </thead>
                                    <tbody id="pemantik-source-body" class="divide-y divide-[#e0e0e0] font-semibold text-[#1d1d1f]">
                                        <tr id="row-andi"><td class="p-2">Andi</td><td class="p-2 text-[#0066cc]">Sepak Bola</td><td class="p-2"><button type="button" onclick="groupPemantik('Andi', 'Sepak Bola', 'row-andi')" class="px-3 py-1.5 bg-[#f5f5f7] border border-[#e0e0e0] hover:bg-[#e0e0e0] text-[#1d1d1f] rounded-lg text-xs transition-colors font-medium cursor-pointer">Kelompokkan</button></td></tr>
                                        <tr id="row-budi"><td class="p-2">Budi</td><td class="p-2 text-[#0066cc]">Sepak Bola</td><td class="p-2"><button type="button" onclick="groupPemantik('Budi', 'Sepak Bola', 'row-budi')" class="px-3 py-1.5 bg-[#f5f5f7] border border-[#e0e0e0] hover:bg-[#e0e0e0] text-[#1d1d1f] rounded-lg text-xs transition-colors font-medium cursor-pointer">Kelompokkan</button></td></tr>
                                        <tr id="row-citra"><td class="p-2">Citra</td><td class="p-2 text-orange-500">Membaca</td><td class="p-2"><button type="button" onclick="groupPemantik('Citra', 'Membaca', 'row-citra')" class="px-3 py-1.5 bg-[#f5f5f7] border border-[#e0e0e0] hover:bg-[#e0e0e0] text-[#1d1d1f] rounded-lg text-xs transition-colors font-medium cursor-pointer">Kelompokkan</button></td></tr>
                                        <tr id="row-deni"><td class="p-2">Deni</td><td class="p-2 text-orange-500">Membaca</td><td class="p-2"><button type="button" onclick="groupPemantik('Deni', 'Membaca', 'row-deni')" class="px-3 py-1.5 bg-[#f5f5f7] border border-[#e0e0e0] hover:bg-[#e0e0e0] text-[#1d1d1f] rounded-lg text-xs transition-colors font-medium cursor-pointer">Kelompokkan</button></td></tr>
                                        <tr id="row-eka"><td class="p-2">Eka</td><td class="p-2 text-purple-500">Musik</td><td class="p-2"><button type="button" onclick="groupPemantik('Eka', 'Musik', 'row-eka')" class="px-3 py-1.5 bg-[#f5f5f7] border border-[#e0e0e0] hover:bg-[#e0e0e0] text-[#1d1d1f] rounded-lg text-xs transition-colors font-medium cursor-pointer">Kelompokkan</button></td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="space-y-3 font-semibold">
                                <div class="bg-white p-3 rounded-xl border border-[#e0e0e0] border-l-4 border-l-[#0066cc] min-h-[70px]">
                                    <h5 class="text-xs font-semibold text-[#0066cc] mb-2 border-b border-[#f5f5f7] pb-1">Kelompok Olahraga</h5>
                                    <div id="group-bola" class="flex flex-wrap gap-2"></div>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-[#e0e0e0] border-l-4 border-l-orange-500 min-h-[70px]">
                                    <h5 class="text-xs font-semibold text-orange-600 mb-2 border-b border-[#f5f5f7] pb-1">Kelompok Literasi</h5>
                                    <div id="group-baca" class="flex flex-wrap gap-2"></div>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-[#e0e0e0] border-l-4 border-l-purple-500 min-h-[70px]">
                                    <h5 class="text-xs font-semibold text-purple-600 mb-2 border-b border-[#f5f5f7] pb-1">Kelompok Seni</h5>
                                    <div id="group-musik" class="flex flex-wrap gap-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian C: Dasar Pengambilan Logika Jarak -->
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        C. Konsep Kemiripan Data
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed font-medium" style="color: #333333 !important;">
                        <h4 class="font-semibold text-xl" style="color: #ffffff !important;">Bagaimana Komputer Menentukan Kelompok?</h4>
                        <p>Manusia dapat melihat kemiripan dengan mudah menggunakan logika akal sehat. Misalnya, kita tahu bahwa nilai <strong>90 dan 92 itu mirip</strong> (keduanya tinggi), sedangkan nilai <strong>90 dan 20 itu tidak mirip</strong>.</p>
                        
                        <p>Namun, komputer membutuhkan cara yang lebih matematis dan terukur. Komputer biasanya membandingkan <strong>jarak antar data</strong>.</p>
                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-xl font-semibold text-center max-w-lg mx-auto my-6" style="color: #1d1d1f !important;">
                            <p>Semakin dekat jaraknya = semakin mirip datanya.</p>
                            <p class="mt-2 text-[#7a7a7a]">Semakin jauh jaraknya = semakin berbeda datanya.</p>
                        </div>

                        <h4 class="font-semibold text-xl mt-8 mb-2" style="color: #ffffff !important;">Contoh Kemiripan Data</h4>
                        <p class="text-[#7a7a7a] text-sm md:text-base">Misalkan terdapat data nilai satu variabel dari 4 siswa berikut:</p>
                        
                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 rounded-2xl my-6 flex flex-col md:flex-row items-center gap-6">
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0]">
                                <table class="w-full text-xs md:text-sm font-mono text-center">
                                    <thead class="bg-[#f5f5f7] text-[#7a7a7a] font-semibold"><tr><th class="p-1">Nama</th><th class="p-1">Nilai</th></tr></thead>
                                    <tbody class="font-semibold text-[#1d1d1f]">
                                        <tr><td class="p-1.5">Andi</td><td class="text-emerald-600 p-1.5 font-bold">80</td></tr>
                                        <tr><td class="p-1.5">Budi</td><td class="text-emerald-600 p-1.5 font-bold">82</td></tr>
                                        <tr><td class="p-1.5">Citra</td><td class="text-emerald-600 p-1.5 font-bold">84</td></tr>
                                        <tr><td class="p-1.5">Deni</td><td class="text-[#ff453a] p-1.5 font-bold">55</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex-1">
                                <h5 class="text-sm font-semibold mb-3" style="color: #1d1d1f !important;">Visualisasi Kemiripan:</h5>
                                <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center">
                                    <img src="/images/visualisasi-kemiripan.png" alt="Visualisasi Kemiripan Jarak 1D" class="w-full mx-auto rounded" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-4 rounded border border-dashed border-[#e0e0e0] text-xs font-medium\'>Letakkan visualisasi-kemiripan.png di folder public/images/</div>';">
                                </div>
                                <p class="text-xs text-[#7a7a7a] font-medium mt-3 leading-relaxed">Nilai Andi, Budi, dan Citra relatif berdekatan sehingga dianggap mirip. Sementara nilai Deni cukup jauh sehingga kemungkinan masuk kelompok berbeda.</p>
                            </div>
                        </div>

                        <div class="p-5 rounded-2xl bg-[#0066cc] text-white font-medium text-sm md:text-base shadow-none">
                            <strong class="text-white block mb-1 text-base font-semibold">Fakta Penting</strong>
                            <p class="opacity-90">Dalam <em>clustering</em>, data yang jaraknya berdekatan dianggap memiliki kemiripan yang lebih tinggi dibandingkan data yang letaknya berjauhan dalam ruang grafik.</p>
                        </div>
                    </div>
                </div>

                <!-- Bagian D: Algoritma Inti K-Means -->
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        D. Mengenal K-Means Clustering
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-[#333333] font-medium">
                        <div class="mb-8">
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Apa Itu K-Means?</h4>
                            <p><strong>K-Means</strong> adalah salah satu algoritma <em>clustering</em> yang paling populer digunakan untuk membagi sekumpulan data ke dalam beberapa kelompok berdasarkan kemiripan karakteristiknya.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/konsep-kmeans.jpg" alt="Konsep K-Means Clustering" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar konsep-kmeans.jpg di folder public/images/</div>';">
                            </div>

                            <div class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-xl mt-4 inline-block text-sm md:text-base">
                                <p class="font-semibold mb-2" style="color: #1d1d1f !important;">Huruf "K" menunjukkan jumlah kelompok yang ingin dibentuk.</p>
                                <ul class="list-disc pl-6 font-medium text-[#7a7a7a] space-y-1">
                                    <li><strong>K = 2</strong> berarti data akan dibagi menjadi dua kelompok.</li>
                                    <li><strong>K = 3</strong> berarti data akan dibagi menjadi tiga kelompok.</li>
                                </ul>
                            </div>
                        </div>

                        <h4 class="font-semibold text-xl mb-4 mt-10" style="color: #ffffff !important;">Cara Kerja K-Means Secara Sederhana</h4>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-8">
                            <img src="/images/cara-kerja-kmeans.jpg" alt="Bagan Cara Kerja K-Means Langkah 1-5" class="w-full max-w-3xl mx-auto rounded" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-8 rounded border border-dashed border-[#e0e0e0] text-xs font-medium\'>Letakkan gambar cara-kerja-kmeans.jpg di folder public/images/</div>';">
                        </div>

                        <div class="mb-8 mt-10">
                            <h4 class="font-semibold text-xl mb-3" style="color: #ffffff !important;">Mengapa K-Means Digunakan?</h4>
                            <p class="mb-2 text-[#7a7a7a] text-sm md:text-base">K-Means sangat diandalkan dalam ilmu data karena membantu:</p>
                            <ul class="list-disc pl-6 space-y-1.5 font-medium" style="color: #333333 !important;">
                                <li>Mengelompokkan data secara otomatis.</li>
                                <li>Menemukan pola yang tersembunyi.</li>
                                <li>Mempermudah analisis data.</li>
                                <li>Membantu pengambilan keputusan.</li>
                            </ul>
                        </div>

                        <!-- Sandbox Canvas Eksperimen K-Means D3 (Apple UI Flat Redesign) -->
                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-12 relative overflow-hidden">
                            <div class="text-center mb-6 border-b border-[#e0e0e0] pb-4">
                                <h4 class="text-xl md:text-2xl font-semibold mb-1" style="color: #1d1d1f !important;">Aktivitas Interaktif: Menjadi Sistem Clustering</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Jalankan peranmu sebagai Algoritma K-Means tanpa harus menghitung rumus rumit!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                                
                                <div class="lg:col-span-4 space-y-4">
                                    <div class="bg-white rounded-xl border border-[#e0e0e0] p-5">
                                        <h5 class="font-semibold mb-3 text-xs md:text-sm" style="color: #1d1d1f !important;">Tugas Siswa:</h5>
                                        <ol class="list-decimal pl-4 space-y-2 text-xs font-medium text-[#7a7a7a]">
                                            <li>Tentukan jumlah kelompok (K).</li>
                                            <li><span class="text-[#0066cc] font-semibold">Klik kanvas grafik</span> untuk meletakkan titik Centroid awal.</li>
                                            <li>Klik tombol proses untuk mengamati bagaimana data membentuk kelompok.</li>
                                            <li>Bandingkan hasil ketika K = 2 dan K = 3.</li>
                                        </ol>
                                    </div>

                                    <div class="bg-white rounded-xl border border-[#e0e0e0] p-4 space-y-3 text-xs md:text-sm">
                                        <div>
                                            <p class="font-semibold mb-2" style="color: #7a7a7a !important;">1. Pilih Jumlah Kelompok (K):</p>
                                            <div class="flex gap-2">
                                                <button type="button" onclick="setKMeansK(2)" id="btn-k-2" class="flex-1 py-2 bg-[#0066cc] text-white font-medium rounded-lg text-xs transition-colors border-none cursor-pointer">K = 2</button>
                                                <button type="button" onclick="setKMeansK(3)" id="btn-k-3" class="flex-1 py-2 bg-[#f5f5f7] border border-[#e0e0e0] text-[#1d1d1f] font-medium rounded-lg text-xs hover:bg-[#e0e0e0] transition-colors cursor-pointer">K = 3</button>
                                            </div>
                                        </div>

                                        <div class="pt-2 border-t border-[#e0e0e0]">
                                            <p class="font-semibold mb-2" style="color: #1d1d1f !important;">Status Centroid: <span id="centroid-status" class="text-[#ff453a] font-mono font-bold">0 / 2 Diletakkan</span></p>
                                            <p class="text-[10px] text-[#7a7a7a] font-medium leading-tight mb-3">Klik area abu-abu pada grafik di sebelah kanan untuk meletakkan titik inti (Centroid) secara acak.</p>
                                            
                                            <button type="button" id="btn-run-kmeans" onclick="stepKMeans()" disabled class="w-full py-3 bg-[#e0e0e0] text-[#000000] font-semibold rounded-lg border-none text-xs cursor-not-allowed transition-colors">
                                                Langkah K-Means Terkunci
                                            </button>
                                            <button type="button" onclick="resetKMeans()" class="w-full mt-2 py-2 bg-[#f5f5f7] hover:bg-[#e0e0e0] text-[#000000] border border-[#e0e0e0] font-semibold rounded-lg text-[11px] transition-colors cursor-pointer">
                                                Reset Ulang Kanvas
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-8 bg-[#f5f5f7] p-2 rounded-2xl border border-[#e0e0e0] flex flex-col items-center justify-center min-h-[300px] relative overflow-hidden">
                                    <div id="kmeans-canvas" class="w-full h-full min-h-[300px] cursor-crosshair"></div>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-xs font-semibold px-4 py-2 rounded-full inline-block" style="color: #7a7a7a !important;">Melalui aktivitas ini siswa dapat memahami cara kerja K-Means tanpa harus menghitung rumus yang rumit.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JAVASCRIPT SIMULATOR K-MEANS INTERNAL ENGINE -->
                <script>
                    let kmeans_k = 2;
                    let kmeans_centroids = [];
                    let kmeans_step = 0; 
                    let kmeans_points = [];
                    let kmeans_svg, kmeans_x, kmeans_y;
                    
                    /* Mengganti palet warna usang ke warna penanda resmi Apple */
                    const kmeans_colors = ["#0066cc", "#ff453a", "#ff9500"]; 

                    function groupPemantik(nama, hobi, rowId) {
                        document.getElementById(rowId).classList.add('hidden');
                        let badge = document.createElement('span');
                        badge.className = "px-2.5 py-1 text-xs font-semibold text-white rounded-md animate-fade-in";
                        badge.innerText = nama;
                        
                        if(hobi === 'Sepak Bola') {
                            badge.style.backgroundColor = "#0066cc";
                            document.getElementById('group-bola').appendChild(badge);
                        } else if(hobi === 'Membaca') {
                            badge.style.backgroundColor = "#ff9500";
                            document.getElementById('group-baca').appendChild(badge);
                        } else {
                            badge.style.backgroundColor = "#purple-token";
                            badge.classList.add('bg-purple-500');
                            document.getElementById('group-musik').appendChild(badge);
                        }

                        pemantikCount++;
                        if(pemantikCount === 5) {
                            setTimeout(() => {
                                Swal.fire({
                                    title: 'Proses Berhasil',
                                    text: "Luar Biasa! Kamu baru saja melakukan proses 'Clustering' secara manual berdasarkan kemiripan atribut (Hobi).",
                                    icon: 'success',
                                    confirmButtonText: 'Lanjutkan',
                                    confirmButtonColor: '#0066cc',
                                    background: '#ffffff',
                                    color: '#1d1d1f'
                                });
                            }, 300);
                        }
                    }

                    function initKMeansData() {
                        kmeans_points = [];
                        for(let i=0; i<15; i++) kmeans_points.push({id: i, x: 20 + Math.random()*20, y: 20 + Math.random()*20, cluster: -1});
                        for(let i=0; i<15; i++) kmeans_points.push({id: i+15, x: 70 + Math.random()*20, y: 70 + Math.random()*20, cluster: -1});
                        for(let i=0; i<15; i++) kmeans_points.push({id: i+30, x: 70 + Math.random()*20, y: 20 + Math.random()*20, cluster: -1});
                    }

                    function setupKMeansCanvas() {
                        const container = document.getElementById("kmeans-canvas");
                        container.innerHTML = "";
                        const width = container.clientWidth || 500;
                        const height = 300;

                        kmeans_svg = d3.select("#kmeans-canvas").append("svg")
                            .attr("width", "100%")
                            .attr("height", height)
                            .style("background", "#fafafc")
                            .style("border-radius", "1rem")
                            .on("click", handleCanvasClick);

                        kmeans_x = d3.scaleLinear().domain([0, 100]).range([20, width - 20]);
                        kmeans_y = d3.scaleLinear().domain([0, 100]).range([height - 20, 20]);

                        drawKMeansPoints();
                    }

                    function drawKMeansPoints() {
                        const dots = kmeans_svg.selectAll(".data-point").data(kmeans_points, d => d.id);
                        
                        dots.enter().append("circle")
                            .attr("class", "data-point")
                            .attr("r", 5)
                            .attr("cx", d => kmeans_x(d.x))
                            .attr("cy", d => kmeans_y(d.y))
                            .style("fill", "#7a7a7a") 
                            .attr("stroke", "white")
                            .attr("stroke-width", 1.5)
                            .merge(dots)
                            .transition().duration(500)
                            .style("fill", d => d.cluster === -1 ? "#7a7a7a" : kmeans_colors[d.cluster]);
                    }

                    function drawKMeansCentroids() {
                        const cents = kmeans_svg.selectAll(".centroid-point").data(kmeans_centroids);
                        
                        cents.enter().append("polygon")
                            .attr("class", "centroid-point")
                            .attr("points", "0,-10 8,8 -8,8") 
                            .style("stroke", "#ffffff")
                            .style("stroke-width", 1.5)
                            .merge(cents)
                            .transition().duration(800)
                            .attr("transform", (d, i) => `translate(${kmeans_x(d.x)},${kmeans_y(d.y)})`)
                            .style("fill", (d, i) => kmeans_colors[i]);
                    }

                    function handleCanvasClick(event) {
                        if (kmeans_centroids.length >= kmeans_k) return; 
                        
                        const coords = d3.pointer(event);
                        const dataX = kmeans_x.invert(coords[0]);
                        const dataY = kmeans_y.invert(coords[1]);

                        kmeans_centroids.push({x: dataX, y: dataY});
                        drawKMeansCentroids();

                        let statusTxt = document.getElementById("centroid-status");
                        statusTxt.innerText = `${kmeans_centroids.length} / ${kmeans_k} Diletakkan`;
                        
                        if(kmeans_centroids.length === kmeans_k) {
                            statusTxt.className = "text-emerald-600 font-mono font-bold";
                            let btn = document.getElementById("btn-run-kmeans");
                            btn.disabled = false;
                            btn.className = "w-full py-3 bg-[#0066cc] hover:bg-[#0071e3] text-white font-semibold rounded-lg border-none text-xs cursor-pointer";
                            btn.innerText = "Langkah 1: Hitung Jarak & Kelompokkan!";
                            kmeans_step = 1;
                        }
                    }

                    function setKMeansK(val) {
                        kmeans_k = val;
                        document.getElementById("btn-k-2").className = "flex-1 py-2 bg-[#f5f5f7] border border-[#e0e0e0] text-[#1d1d1f] font-medium rounded-lg text-xs hover:bg-[#e0e0e0] transition-colors cursor-pointer";
                        document.getElementById("btn-k-3").className = "flex-1 py-2 bg-[#f5f5f7] border border-[#e0e0e0] text-[#1d1d1f] font-medium rounded-lg text-xs hover:bg-[#e0e0e0] transition-colors cursor-pointer";
                        document.getElementById(`btn-k-${val}`).className = "flex-1 py-2 bg-[#0066cc] text-white font-medium rounded-lg text-xs transition-colors border-none cursor-pointer";
                        resetKMeans();
                    }

                    function resetKMeans() {
                        kmeans_centroids = [];
                        kmeans_points.forEach(p => p.cluster = -1); 
                        kmeans_step = 0;
                        
                        let statusTxt = document.getElementById("centroid-status");
                        statusTxt.className = "text-[#ff453a] font-mono font-bold";
                        statusTxt.innerText = `0 / ${kmeans_k} Diletakkan`;
                        
                        let btn = document.getElementById("btn-run-kmeans");
                        btn.disabled = true;
                        btn.className = "w-full py-3 bg-[#e0e0e0] text-[#7a7a7a] font-semibold rounded-lg border-none text-xs cursor-not-allowed";
                        btn.innerText = "Langkah K-Means Terkunci";

                        kmeans_svg.selectAll(".centroid-point").remove();
                        drawKMeansPoints();
                    }

                    function stepKMeans() {
                        const btn = document.getElementById("btn-run-kmeans");

                        if(kmeans_step === 1) {
                            kmeans_points.forEach(p => {
                                let minDist = Infinity;
                                let bestCluster = -1;
                                kmeans_centroids.forEach((c, i) => {
                                    let dist = Math.sqrt(Math.pow(p.x - c.x, 2) + Math.pow(p.y - c.y, 2));
                                    if(dist < minDist) { minDist = dist; bestCluster = i; }
                                });
                                p.cluster = bestCluster;
                            });
                            drawKMeansPoints();
                            
                            kmeans_step = 2;
                            btn.innerText = "Langkah 2: Pindahkan Centroid ke Tengah";
                            btn.style.backgroundColor = "#10b981";
                            
                        } else if(kmeans_step === 2) {
                            for(let i=0; i<kmeans_k; i++) {
                                let assignedPoints = kmeans_points.filter(p => p.cluster === i);
                                if(assignedPoints.length > 0) {
                                    let sumX = 0, sumY = 0;
                                    assignedPoints.forEach(p => { sumX += p.x; sumY += p.y; });
                                    kmeans_centroids[i].x = sumX / assignedPoints.length;
                                    kmeans_centroids[i].y = sumY / assignedPoints.length;
                                }
                            }
                            drawKMeansCentroids();

                            kmeans_step = 1; 
                            btn.innerText = "Ulangi: Evaluasi Jarak & Kelompokkan";
                            btn.style.backgroundColor = "#0066cc";
                        }
                    }

                    setTimeout(() => {
                        pemantikCount = 0;
                        initKMeansData();
                        setupKMeansCanvas();
                    }, 500);
                </script>
            </div>

            <!-- Blok Data Kuis Formatif (Tetap Utuh untuk JavaScript Engine Player) -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Dalam dunia data, proses mengelompokkan data ke dalam beberapa kelompok berdasarkan kemiripan karakteristik yang dimilikinya disebut dengan istilah...."
                    data-opt-a="Visualisasi Data"
                    data-opt-b="Normalisasi Data"
                    data-opt-c="Clustering"
                    data-opt-d="Deteksi Outlier"
                    data-opt-e="Aturan Sturges"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berikut ini yang BUKAN merupakan contoh penerapan clustering dalam kehidupan sehari-hari berdasarkan materi di atas adalah...."
                    data-opt-a="Mengelompokkan buku di perpustakaan berdasarkan genre atau penulis."
                    data-opt-b="Rekomendasi film atau musik otomatis di aplikasi Spotify dan YouTube."
                    data-opt-c="Menghitung total pendapatan harian dari kasir kantin sekolah."
                    data-opt-d="Pengelompokan pelanggan toko online berdasarkan pola belanja mereka."
                    data-opt-e="Mengelompokkan siswa di kelas berdasarkan rentang nilai tinggi, sedang, dan rendah."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berbeda dengan manusia yang menggunakan akal sehat, bagaimana cara komputer menentukan tingkat kemiripan antar data secara matematis?"
                    data-opt-a="Dengan mengubah warna grafik menjadi lebih terang atau gelap."
                    data-opt-b="Dengan menghitung nilai Kuartil Atas (Q3) dan Kuartil Bawah (Q1) terlebih dahulu."
                    data-opt-c="Dengan mengabaikan semua data yang bernilai ekstrem (outlier)."
                    data-opt-d="Dengan membandingkan jarak antar data; semakin dekat jaraknya, semakin mirip datanya."
                    data-opt-e="Dengan mengukur panjang dan tinggi batang pada sebuah histogram."
                    data-answer="D">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada algoritma K-Means Clustering, apa makna sebenarnya dari huruf 'K' tersebut?"
                    data-opt-a="Konstanta nilai tengah dalam sebuah himpunan data."
                    data-opt-b="Jumlah maksimal outlier yang diizinkan masuk ke dalam sistem."
                    data-opt-c="Jumlah kelompok (cluster) yang ingin dibentuk oleh pengguna."
                    data-opt-d="Total baris keseluruhan data CSV yang dimasukkan ke dalam aplikasi."
                    data-opt-e="Kecepatan algoritma komputer dalam melakukan proses iterasi."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan 5 langkah cara kerja algoritma K-Means, kapan proses pergeseran kelompok data ini akan dinyatakan selesai atau berhenti?"
                    data-opt-a="Ketika posisi titik inti (centroid) dan anggota kelompoknya sudah stabil dan tidak bergeser atau berubah lagi."
                    data-opt-b="Ketika semua data pada tabel sudah berhasil diubah menjadi format Scatter Plot."
                    data-opt-c="Ketika timer hitung mundur dari sistem analisis komputer habis."
                    data-opt-d="Hanya ketika pengguna menekan tombol reset pada aplikasi web."
                    data-opt-e="Ketika komputer mendeteksi adanya data pencilan (outlier) yang tidak bisa dikelompokkan."
                    data-answer="A">
                </div>
            </div>
EOT;

        // Simpan ke database material
        Material::updateOrCreate(
            ['slug' => 'pengelompokan-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Pengelompokan Data',
                'type' => 'text',
                'sequence' => 2,
                'min_level' => 5,
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 2 Sub-bab 2: Pengelompokan Data sukses disinkronkan!');
    }
}