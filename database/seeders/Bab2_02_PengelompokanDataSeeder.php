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
            <div id="areaMateriPelajaran" class="space-y-12 text-[#0d530e] font-sans transition-all duration-1000 relative z-10 pb-20">

                <div class="mb-10 text-center">
                    <h2 class="text-4xl font-black text-[#306d29] mb-4">2. Pengelompokan Data</h2>
                    <p class="text-lg text-gray-600 font-medium max-w-2xl mx-auto">Memahami bagaimana komputer menemukan pola tersembunyi dan mengelompokkan data yang memiliki kemiripan.</p>
                </div>

                <div>
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        A. Pengertian Clustering
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Mengapa Data Perlu Dikelompokkan?</h4>
                            <p>Bayangkan kamu memiliki daftar ratusan siswa dari berbagai kelas. Jika seluruh data dicampur menjadi satu, akan sulit menemukan pola tertentu. Oleh karena itu, data sering dikelompokkan berdasarkan karakteristik yang mirip agar lebih mudah dipahami dan dianalisis.</p>
                            <p class="mt-2 font-bold text-[#306d29]">Dalam dunia data, proses mengelompokkan data yang memiliki kemiripan disebut <em>clustering</em>.</p>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Apa Itu Clustering?</h4>
                            <p><strong>Clustering</strong> adalah proses mengelompokkan data ke dalam beberapa kelompok (cluster) berdasarkan kemiripan karakteristik yang dimiliki.</p>
                            <p class="mt-2">Data yang memiliki karakteristik mirip akan ditempatkan dalam kelompok yang sama, sedangkan data yang berbeda akan ditempatkan pada kelompok yang berbeda. Tujuan clustering adalah membantu menemukan pola atau kelompok alami yang tersembunyi di dalam data.</p>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4">Contoh Sederhana</h4>
                            <p class="mb-4">Perhatikan data nilai berikut.</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                                <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center font-mono text-sm font-bold text-gray-700">
                                    <h5 class="text-[#306d29] mb-2 font-sans border-b pb-2">Tabel Data Awal</h5>
                                    <div class="grid grid-cols-2 border border-gray-200">
                                        <div class="bg-[#306d29] text-white p-2 border-b border-r">Nama</div>
                                        <div class="bg-[#306d29] text-white p-2 border-b">Nilai</div>
                                        <div class="p-2 border-b border-r">Andi</div><div class="p-2 border-b text-green-600">90</div>
                                        <div class="p-2 border-b border-r bg-gray-50">Budi</div><div class="p-2 border-b bg-gray-50 text-green-600">88</div>
                                        <div class="p-2 border-b border-r">Citra</div><div class="p-2 border-b text-green-600">85</div>
                                        <div class="p-2 border-b border-r bg-gray-50">Deni</div><div class="p-2 border-b bg-gray-50 text-red-500">60</div>
                                        <div class="p-2 border-b border-r">Eka</div><div class="p-2 border-b text-red-500">58</div>
                                        <div class="p-2 border-r bg-gray-50">Fani</div><div class="p-2 bg-gray-50 text-red-500">55</div>
                                    </div>
                                </div>

                                <div class="bg-[#fbf5dd] p-5 rounded-xl border border-[#306d29]/20 shadow-sm space-y-4">
                                    <p class="font-sans font-bold text-[#0d530e] mb-2">Data tersebut dapat dikelompokkan menjadi:</p>
                                    
                                    <div class="bg-white p-3 rounded-lg border-l-4 border-green-500 shadow-sm">
                                        <strong class="text-green-700 block mb-1">Kelompok Nilai Tinggi (Di atas 80)</strong>
                                        <ul class="list-disc pl-5 text-sm font-medium text-gray-600">
                                            <li>Andi (90)</li><li>Budi (88)</li><li>Citra (85)</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="bg-white p-3 rounded-lg border-l-4 border-red-500 shadow-sm">
                                        <strong class="text-red-700 block mb-1">Kelompok Nilai Rendah (Di bawah 70)</strong>
                                        <ul class="list-disc pl-5 text-sm font-medium text-gray-600">
                                            <li>Deni (60)</li><li>Eka (58)</li><li>Fani (55)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 bg-[#306d29]/10 p-4 rounded-xl border-l-4 border-[#306d29] text-base font-medium">
                                <p>Inilah contoh sederhana clustering.</p>
                                <p class="mt-1"><strong>Catatan Penting:</strong> Clustering tidak memerlukan label kelompok sejak awal. Sistem komputer akan secara otomatis mencari dan membentuk kelompok berdasarkan kemiripan data yang ditemukan.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        B. Contoh Clustering dalam Kehidupan Sehari-hari
                    </h3>
                    <p class="text-lg leading-relaxed mb-6">Tanpa disadari, kita sering melakukan pengelompokan dalam kehidupan sehari-hari.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white p-5 rounded-2xl border border-[#e7e1b1] shadow-sm">
                            <h4 class="font-bold text-[#306d29] text-lg mb-2 flex items-center gap-2"><span>📚</span> 1. Mengelompokkan Buku di Perpustakaan</h4>
                            <p class="text-sm text-gray-600 mb-2">Buku dapat dikelompokkan berdasarkan:</p>
                            <ul class="list-disc pl-5 text-sm font-medium text-[#0d530e]">
                                <li>Mata pelajaran</li><li>Penulis</li><li>Tahun terbit</li>
                            </ul>
                            <p class="text-sm text-gray-600 mt-2">Sehingga lebih mudah dicari oleh pengunjung.</p>
                        </div>

                        <div class="bg-white p-5 rounded-2xl border border-[#e7e1b1] shadow-sm">
                            <h4 class="font-bold text-[#306d29] text-lg mb-2 flex items-center gap-2"><span>🎓</span> 2. Mengelompokkan Siswa Berdasarkan Nilai</h4>
                            <p class="text-sm text-gray-600 mb-2">Guru dapat mengelompokkan siswa menjadi:</p>
                            <ul class="list-disc pl-5 text-sm font-medium text-[#0d530e]">
                                <li>Nilai tinggi</li><li>Nilai sedang</li><li>Nilai rendah</li>
                            </ul>
                            <p class="text-sm text-gray-600 mt-2">Untuk membantu menyesuaikan proses pembelajaran.</p>
                        </div>

                        <div class="bg-white p-5 rounded-2xl border border-[#e7e1b1] shadow-sm">
                            <h4 class="font-bold text-[#306d29] text-lg mb-2 flex items-center gap-2"><span>🎵</span> 3. Rekomendasi Film atau Musik</h4>
                            <p class="text-sm text-[#0d530e] leading-relaxed">
                                Layanan seperti Spotify atau YouTube mengelompokkan pengguna yang memiliki kebiasaan menonton/mendengarkan serupa sehingga dapat memberikan rekomendasi yang lebih akurat dan sesuai selera.
                            </p>
                        </div>

                        <div class="bg-white p-5 rounded-2xl border border-[#e7e1b1] shadow-sm">
                            <h4 class="font-bold text-[#306d29] text-lg mb-2 flex items-center gap-2"><span>🛒</span> 4. Pengelompokan Produk Toko Online</h4>
                            <p class="text-sm text-gray-600 mb-2">Toko online dapat mengelompokkan pelanggan berdasarkan pola belanja mereka. Misalnya:</p>
                            <ul class="list-disc pl-5 text-sm font-medium text-[#0d530e]">
                                <li>Pelanggan yang sering membeli buku.</li>
                                <li>Pelanggan yang sering membeli elektronik.</li>
                                <li>Pelanggan yang sering membeli pakaian.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-[#fbf5dd] p-6 md:p-8 rounded-3xl border-2 border-dashed border-[#306d29]/40 shadow-sm my-10 relative overflow-hidden">
                        <div class="absolute -right-8 -top-8 text-7xl opacity-10 rotate-12 select-none">🎯</div>
                        <h4 class="text-xl font-black text-[#0d530e] mb-2 flex items-center gap-2">
                            <span>🚀</span> Aktivitas Pemantik
                        </h4>
                        <p class="text-sm text-[#306d29] leading-relaxed mb-6 font-medium">
                            Perhatikan daftar hobi siswa di bawah ini. Menurutmu, bagaimana cara mengelompokkan data tersebut secara logis? <strong>Klik pada baris data untuk memasukkannya ke dalam kelompok yang sesuai!</strong>
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl shadow-inner border border-gray-200 overflow-hidden">
                                <table class="w-full text-sm text-center">
                                    <thead class="bg-[#306d29] text-white">
                                        <tr><th class="p-2">Nama</th><th class="p-2">Hobi</th><th class="p-2">Aksi</th></tr>
                                    </thead>
                                    <tbody id="pemantik-source-body" class="divide-y divide-gray-100 font-bold text-gray-700">
                                        <tr id="row-andi"><td class="p-2">Andi</td><td class="p-2 text-blue-600">Sepak Bola</td><td class="p-2"><button onclick="groupPemantik('Andi', 'Sepak Bola', 'row-andi')" class="px-3 py-1 bg-gray-100 hover:bg-[#306d29] hover:text-white rounded text-xs transition-all">Kelompokkan</button></td></tr>
                                        <tr id="row-budi"><td class="p-2">Budi</td><td class="p-2 text-blue-600">Sepak Bola</td><td class="p-2"><button onclick="groupPemantik('Budi', 'Sepak Bola', 'row-budi')" class="px-3 py-1 bg-gray-100 hover:bg-[#306d29] hover:text-white rounded text-xs transition-all">Kelompokkan</button></td></tr>
                                        <tr id="row-citra"><td class="p-2">Citra</td><td class="p-2 text-amber-600">Membaca</td><td class="p-2"><button onclick="groupPemantik('Citra', 'Membaca', 'row-citra')" class="px-3 py-1 bg-gray-100 hover:bg-[#306d29] hover:text-white rounded text-xs transition-all">Kelompokkan</button></td></tr>
                                        <tr id="row-deni"><td class="p-2">Deni</td><td class="p-2 text-amber-600">Membaca</td><td class="p-2"><button onclick="groupPemantik('Deni', 'Membaca', 'row-deni')" class="px-3 py-1 bg-gray-100 hover:bg-[#306d29] hover:text-white rounded text-xs transition-all">Kelompokkan</button></td></tr>
                                        <tr id="row-eka"><td class="p-2">Eka</td><td class="p-2 text-purple-600">Musik</td><td class="p-2"><button onclick="groupPemantik('Eka', 'Musik', 'row-eka')" class="px-3 py-1 bg-gray-100 hover:bg-[#306d29] hover:text-white rounded text-xs transition-all">Kelompokkan</button></td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="space-y-3">
                                <div class="bg-white p-3 rounded-xl border border-blue-200 shadow-sm min-h-[70px]">
                                    <h5 class="text-xs font-bold text-blue-700 mb-2 border-b border-blue-100 pb-1">⚽ Kelompok Olahraga</h5>
                                    <div id="group-bola" class="flex flex-wrap gap-2"></div>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-amber-200 shadow-sm min-h-[70px]">
                                    <h5 class="text-xs font-bold text-amber-700 mb-2 border-b border-amber-100 pb-1">📚 Kelompok Literasi</h5>
                                    <div id="group-baca" class="flex flex-wrap gap-2"></div>
                                </div>
                                <div class="bg-white p-3 rounded-xl border border-purple-200 shadow-sm min-h-[70px]">
                                    <h5 class="text-xs font-bold text-purple-700 mb-2 border-b border-purple-100 pb-1">🎵 Kelompok Seni</h5>
                                    <div id="group-musik" class="flex flex-wrap gap-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        let pemantikCount = 0;
                        function groupPemantik(nama, hobi, rowId) {
                            document.getElementById(rowId).classList.add('hidden');
                            let badge = document.createElement('span');
                            badge.className = "px-2 py-1 text-xs font-bold text-white rounded shadow-sm animate-fade-in";
                            badge.innerText = nama;
                            
                            if(hobi === 'Sepak Bola') {
                                badge.classList.add('bg-blue-500');
                                document.getElementById('group-bola').appendChild(badge);
                            } else if(hobi === 'Membaca') {
                                badge.classList.add('bg-amber-500');
                                document.getElementById('group-baca').appendChild(badge);
                            } else {
                                badge.classList.add('bg-purple-500');
                                document.getElementById('group-musik').appendChild(badge);
                            }

                            pemantikCount++;
                            if(pemantikCount === 5) {
                                setTimeout(() => alert("🎉 Luar Biasa! Kamu baru saja melakukan proses 'Clustering' secara manual berdasarkan kemiripan atribut (Hobi)."), 300);
                            }
                        }
                    </script>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        C. Konsep Kemiripan Data
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <h4 class="font-bold text-[#306d29] text-xl">Bagaimana Komputer Menentukan Kelompok?</h4>
                        <p>Manusia dapat melihat kemiripan dengan mudah menggunakan logika akal sehat. Misalnya, kita tahu bahwa nilai <strong>90 dan 92 itu mirip</strong> (keduanya tinggi), sedangkan nilai <strong>90 dan 20 itu tidak mirip</strong>.</p>
                        
                        <p>Namun, komputer membutuhkan cara yang lebih matematis dan terukur. Komputer biasanya membandingkan <strong class="text-amber-600">jarak antar data</strong>.</p>
                        <div class="bg-white p-5 rounded-2xl border-l-4 border-amber-500 shadow-sm font-bold text-[#0d530e] text-center max-w-lg mx-auto my-6">
                            <p>📏 Semakin dekat jaraknya = semakin mirip datanya.</p>
                            <p class="mt-2">🛣️ Semakin jauh jaraknya = semakin berbeda datanya.</p>
                        </div>

                        <h4 class="font-bold text-[#306d29] text-xl mt-8 mb-2">Contoh Kemiripan Data</h4>
                        <p>Misalkan terdapat data nilai satu variabel dari 4 siswa berikut:</p>
                        
                        <div class="bg-[#fbf5dd] p-6 rounded-3xl border border-[#306d29]/20 shadow-md my-6 flex flex-col md:flex-row items-center gap-6">
                            <div class="bg-white p-4 rounded-xl shadow-inner border border-gray-200">
                                <table class="w-full text-sm font-mono text-center">
                                    <thead><tr class="bg-gray-100 text-gray-600"><th>Nama</th><th>Nilai</th></tr></thead>
                                    <tbody class="font-bold">
                                        <tr><td class="p-1">Andi</td><td class="text-green-600 p-1">80</td></tr>
                                        <tr><td class="p-1">Budi</td><td class="text-green-600 p-1">82</td></tr>
                                        <tr><td class="p-1">Citra</td><td class="text-green-600 p-1">84</td></tr>
                                        <tr><td class="p-1">Deni</td><td class="text-red-500 p-1">55</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex-1">
                                <h5 class="text-sm font-bold text-[#306d29] mb-3">Visualisasi Kemiripan:</h5>
                                <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-center">
                                    <img src="/images/visualisasi-kemiripan.png" alt="Visualisasi Kemiripan Jarak 1D" class="w-full mx-auto rounded" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-gray-100 p-4 rounded border-2 border-dashed text-xs\'>Letakkan visualisasi-kemiripan.png di folder public/images/</div>';">
                                </div>
                                <p class="text-xs text-gray-600 font-medium mt-3 leading-relaxed">Nilai Andi, Budi, dan Citra relatif berdekatan sehingga dianggap mirip. Sementara nilai Deni cukup jauh sehingga kemungkinan masuk kelompok berbeda.</p>
                            </div>
                        </div>

                        <div class="bg-[#306d29] text-[#fbf5dd] p-5 rounded-2xl shadow-lg flex items-start gap-4 mt-8">
                            <span class="text-3xl">📌</span>
                            <div>
                                <strong class="text-lg text-white block mb-1">Fakta Penting</strong>
                                <p class="font-medium text-sm">Dalam <em>clustering</em>, data yang jaraknya berdekatan dianggap memiliki kemiripan yang lebih tinggi dibandingkan data yang letaknya berjauhan dalam ruang grafik.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        D. Mengenal K-Means Clustering
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <div class="mb-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Apa Itu K-Means?</h4>
                            <p><strong>K-Means</strong> adalah salah satu algoritma <em>clustering</em> yang paling populer digunakan untuk membagi sekumpulan data ke dalam beberapa kelompok berdasarkan kemiripan karakteristiknya.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/konsep-kmeans.jpg" alt="Konsep K-Means Clustering" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29] text-sm\'>Letakkan gambar konsep-kmeans.jpg di folder public/images/</div>';">
                            </div>

                            <div class="bg-[#fbf5dd] p-5 rounded-xl border border-[#e7e1b1] mt-4 shadow-sm inline-block">
                                <p class="font-bold text-[#0d530e] mb-2">Huruf "K" menunjukkan jumlah kelompok yang ingin dibentuk.</p>
                                <ul class="list-disc pl-6 text-sm font-medium text-gray-700 space-y-1">
                                    <li><strong>K = 2</strong> berarti data akan dibagi menjadi dua kelompok.</li>
                                    <li><strong>K = 3</strong> berarti data akan dibagi menjadi tiga kelompok.</li>
                                </ul>
                            </div>
                        </div>

                        <h4 class="font-bold text-[#306d29] text-xl mb-4 mt-10">Cara Kerja K-Means Secara Sederhana</h4>
                        
                        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm text-center mb-8">
                            <img src="/images/cara-kerja-kmeans.jpg" alt="Bagan Cara Kerja K-Means Langkah 1-5" class="w-full max-w-3xl mx-auto rounded" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-gray-100 p-8 rounded border-2 border-dashed text-xs\'>Letakkan gambar cara-kerja-kmeans.jpg di folder public/images/</div>';">
                        </div>

                        <div class="mb-8 mt-10">
                            <h4 class="font-bold text-[#306d29] text-xl mb-3">Mengapa K-Means Digunakan?</h4>
                            <p class="mb-2">K-Means sangat diandalkan dalam ilmu data karena membantu:</p>
                            <ul class="list-disc pl-6 space-y-1.5 text-[#0d530e] font-medium">
                                <li>Mengelompokkan data secara otomatis.</li>
                                <li>Menemukan pola yang tersembunyi.</li>
                                <li>Mempermudah analisis data.</li>
                                <li>Membantu pengambilan keputusan.</li>
                            </ul>
                        </div>

                        <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-2xl my-12 relative overflow-hidden">
                            <div class="text-center mb-6 relative z-10 border-b border-[#306d29]/20 pb-4">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-1">🤖 Aktivitas Interaktif: Menjadi Sistem Clustering</h4>
                                <p class="text-sm text-[#306d29] font-medium">Jalankan peranmu sebagai Algoritma K-Means tanpa harus menghitung rumus rumit!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                                
                                <div class="lg:col-span-4 space-y-4">
                                    <div class="bg-white rounded-xl shadow-inner border border-gray-200 p-5">
                                        <h5 class="font-bold text-[#0d530e] mb-3 text-sm">📋 Tugas Siswa:</h5>
                                        <ol class="list-decimal pl-4 space-y-2 text-xs font-bold text-gray-600">
                                            <li>Tentukan jumlah kelompok (K).</li>
                                            <li><span class="text-amber-600">Klik kanvas grafik</span> untuk meletakkan titik Centroid awal.</li>
                                            <li>Klik tombol proses untuk mengamati bagaimana data membentuk kelompok.</li>
                                            <li>Bandingkan hasil ketika K = 2 dan K = 3.</li>
                                        </ol>
                                    </div>

                                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 space-y-3">
                                        <div>
                                            <p class="text-xs font-bold text-[#306d29] mb-1">1. Pilih Jumlah Kelompok (K):</p>
                                            <div class="flex gap-2">
                                                <button onclick="setKMeansK(2)" id="btn-k-2" class="flex-1 py-2 bg-[#306d29] text-white font-bold rounded shadow text-xs">K = 2</button>
                                                <button onclick="setKMeansK(3)" id="btn-k-3" class="flex-1 py-2 bg-gray-100 text-gray-600 font-bold rounded border hover:bg-gray-200 text-xs">K = 3</button>
                                            </div>
                                        </div>

                                        <div class="pt-2 border-t border-gray-100">
                                            <p class="text-xs font-bold text-[#306d29] mb-2">Status Centroid: <span id="centroid-status" class="text-red-500 font-mono">0 / 2 Diletakkan</span></p>
                                            <p class="text-[10px] text-gray-500 italic leading-tight mb-3">Klik area putih pada grafik di sebelah kanan untuk meletakkan titik inti (Centroid) secara acak.</p>
                                            
                                            <button id="btn-run-kmeans" onclick="stepKMeans()" disabled class="w-full py-3 bg-gray-300 text-gray-500 font-black rounded-lg shadow-sm transition-all text-xs cursor-not-allowed">
                                                Langkah K-Means Terkunci
                                            </button>
                                            <button onclick="resetKMeans()" class="w-full mt-2 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 font-bold rounded text-[10px] transition-all">
                                                Reset Ulang Kanvas
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-8 bg-white p-2 rounded-2xl border border-gray-200 shadow-inner flex flex-col items-center justify-center min-h-[300px] relative">
                                    <div id="kmeans-canvas" class="w-full h-full min-h-[300px] cursor-crosshair"></div>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-xs font-bold text-[#306d29] bg-white/50 inline-block px-4 py-2 rounded-full border border-[#306d29]/20 shadow-sm">Melalui aktivitas ini siswa dapat memahami cara kerja K-Means tanpa harus menghitung rumus yang rumit.</p>
                            </div>
                        </div>

                        <div class="mt-16 bg-gradient-to-br from-[#306d29] to-[#0d530e] text-[#fbf5dd] p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                            <div class="absolute -right-5 -bottom-10 text-9xl opacity-10">🚀</div>
                            <h3 class="text-2xl font-black mb-3 flex items-center gap-2"><span>🌉</span> Penghubung ke Studi Kasus</h3>
                            <p class="text-base leading-relaxed font-medium">
                                Pada materi berikutnya, kita akan menggunakan <strong>aplikasi web interaktif</strong> untuk melakukan visualisasi data dan mencoba proses clustering secara langsung menggunakan algoritma K-Means. Dengan demikian, konsep yang telah dipelajari dapat diamati dan dipraktikkan secara nyata.
                            </p>
                        </div>

                    </div>
                </div>

                <script src="https://d3js.org/d3.v7.min.js"></script>
                <script>
                    let kmeans_k = 2;
                    let kmeans_centroids = [];
                    let kmeans_step = 0; 
                    let kmeans_points = [];
                    let kmeans_svg, kmeans_x, kmeans_y;
                    const kmeans_colors = ["#ef4444", "#3b82f6", "#eab308"]; 

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
                            .style("background", "#f8fafc")
                            .style("border-radius", "0.75rem")
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
                            .style("fill", "#94a3b8") 
                            .attr("stroke", "white")
                            .merge(dots)
                            .transition().duration(500)
                            .style("fill", d => d.cluster === -1 ? "#94a3b8" : kmeans_colors[d.cluster]);
                    }

                    function drawKMeansCentroids() {
                        const cents = kmeans_svg.selectAll(".centroid-point").data(kmeans_centroids);
                        
                        cents.enter().append("polygon")
                            .attr("class", "centroid-point")
                            .attr("points", "0,-10 8,8 -8,8") 
                            .style("stroke", "black")
                            .style("stroke-width", 2)
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
                            statusTxt.classList.replace("text-red-500", "text-green-600");
                            let btn = document.getElementById("btn-run-kmeans");
                            btn.disabled = false;
                            btn.className = "w-full py-3 bg-amber-500 hover:bg-amber-600 text-white font-black rounded-lg shadow-md transition-all text-xs cursor-pointer animate-pulse";
                            btn.innerText = "Langkah 1: Hitung Jarak & Kelompokkan!";
                            kmeans_step = 1;
                        }
                    }

                    function setKMeansK(val) {
                        kmeans_k = val;
                        document.getElementById("btn-k-2").className = "flex-1 py-2 bg-gray-100 text-gray-600 font-bold rounded border hover:bg-gray-200 text-xs transition-all";
                        document.getElementById("btn-k-3").className = "flex-1 py-2 bg-gray-100 text-gray-600 font-bold rounded border hover:bg-gray-200 text-xs transition-all";
                        document.getElementById(`btn-k-${val}`).className = "flex-1 py-2 bg-[#306d29] text-white font-bold rounded shadow text-xs transition-all";
                        resetKMeans();
                    }

                    function resetKMeans() {
                        kmeans_centroids = [];
                        kmeans_points.forEach(p => p.cluster = -1); 
                        kmeans_step = 0;
                        
                        let statusTxt = document.getElementById("centroid-status");
                        statusTxt.classList.replace("text-green-600", "text-red-500");
                        statusTxt.innerText = `0 / ${kmeans_k} Diletakkan`;
                        
                        let btn = document.getElementById("btn-run-kmeans");
                        btn.disabled = true;
                        btn.className = "w-full py-3 bg-gray-300 text-gray-500 font-black rounded-lg shadow-sm transition-all text-xs cursor-not-allowed";
                        btn.innerText = "Langkah K-Means Terkunci";

                        kmeans_svg.selectAll(".centroid-point").remove();
                        drawKMeansPoints();
                    }

                    function stepKMeans() {
                        const btn = document.getElementById("btn-run-kmeans");
                        btn.classList.remove("animate-pulse");

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
                            btn.classList.replace("bg-amber-500", "bg-blue-500");
                            btn.classList.replace("hover:bg-amber-600", "hover:bg-blue-600");
                            
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
                            btn.classList.replace("bg-blue-500", "bg-amber-500");
                            btn.classList.replace("hover:bg-blue-600", "hover:bg-amber-600");
                        }
                    }

                    setTimeout(() => {
                        initKMeansData();
                        setupKMeansCanvas();
                    }, 500);
                </script>
            </div>

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
                'min_level' => 5, // Disesuaikan dengan level di sistemmu
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 2 Sub-bab 2: Pengelompokan Data sukses disinkronkan!');
    }
}