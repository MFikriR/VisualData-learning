<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_03_BoxPlotSeeder extends Seeder
{
    public function run(): void
    {
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->info('Bab 2 belum dibuat! Jalankan ContentSeeder dulu.');
            return;
        }

        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">
                
                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none transition-opacity group-hover:opacity-0">
                            <span class="text-red-500 animate-pulse">●</span> INTRO
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/QQnqEM0iQlI?rel=0&modestbranding=1" 
                                title="Video Pengantar Box Plot" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas untuk memahami dasar-dasar Box Plot!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-purple-900 p-8 rounded-3xl border border-purple-500 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 text-9xl opacity-10">📦</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-4 relative z-10" style="line-height: 1.5;">
                        A. Apa itu Box Plot?
                    </h3>
                    
                    <p class="text-lg leading-relaxed text-gray-200 relative z-10 font-medium mb-6">
                        <strong>Box Plot</strong> (atau grafik Kotak-Garis) adalah senjata andalan para Ilmuwan Data untuk melihat ringkasan statistik dari kumpulan data hanya dalam satu lirikan mata. Grafik ini menampilkan kondisi data melalui <strong>"Statistik Lima Serangkai"</strong>.
                    </p>

                    <div class="bg-black/40 p-5 rounded-2xl border-l-4 border-yellow-400 backdrop-blur-sm relative z-10 flex items-start gap-4 mb-4">
                        <div class="text-4xl shrink-0 mt-1">💡</div>
                        <div>
                            <h4 class="text-yellow-400 font-bold mb-2 text-lg">Perbedaan Fungsi & Analogi</h4>
                            <p class="text-sm text-gray-200 leading-relaxed mb-3">
                                Bayangkan kamu ingin membandingkan nilai ulangan Matematika antara kelas XI-A, XI-B, dan XI-C. Jika <strong>Histogram</strong> melihat detail sebaran nilai di satu kelas, maka <strong>Box Plot</strong> bisa membandingkan ketiga kelas itu sekaligus dalam sekejap!
                            </p>
                            <p class="text-sm text-gray-200 leading-relaxed">
                                Kamu akan langsung tahu kelas mana yang lebih pintar, mana yang nilainya bervariasi, dan apakah ada "murid ajaib" yang nilainya <em>nyeleneh</em> sendiri (terlalu tinggi/rendah). Murid yang nilainya berbeda jauh inilah yang disebut sebagai radar pendeteksi <strong>Pencilan (<em>Outlier</em>)</strong>.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-8 rounded-3xl border-2 border-gray-700 shadow-2xl">
                    <h3 class="text-3xl font-black text-white text-outline mb-6">B. Anatomi Box Plot (Statistik Lima Serangkai)</h3>
                    <p class="text-gray-300 leading-relaxed mb-8">
                        Sebuah <em>Box Plot</em> merangkum seluruh data menjadi 5 titik utama yang disebut Statistik Lima Serangkai. Mari kita bedah komponen-komponen utamanya:
                    </p>
                    
                    
                    <div class="flex justify-center mb-10 bg-[#e2e8f0] p-4 md:p-8 rounded-2xl border border-gray-600 shadow-[inset_0_0_20px_rgba(0,0,0,0.2)] relative">
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-md">
                            Visualisasi Diagram
                        </div>
                        <img src="/images/materi/image_b07c81.jpg" alt="Anatomi Detail Box Plot" class="rounded max-w-full md:max-w-2xl h-auto object-contain drop-shadow-xl" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x450/1e293b/a5b4fc?text=Gambar+Anatomi+Box+Plot+(Kuartil,+Median)';">
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        
                        <div class="bg-[#1e293b] p-6 rounded-2xl border-t-4 border-t-blue-500 shadow-lg relative flex flex-col h-full">
                            <div class="absolute top-4 right-4 text-3xl opacity-20">📦</div>
                            <h4 class="font-bold text-xl text-blue-400 mb-4 border-b border-gray-700 pb-2">Kotak (The Box)</h4>
                            <p class="text-sm text-gray-300 mb-5 leading-relaxed">
                                Bagian tengah grafik yang mewakili <strong>50% data pusat</strong>.
                            </p>
                            
                            <ul class="text-sm text-gray-300 space-y-4 flex-1">
                                <li class="bg-gray-800/50 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-blue-300 block mb-1">Q1 (Kuartil Bawah/Pertama)</strong>
                                    Batas kiri/bawah kotak. Menunjukkan titik di mana 25% data terendah berada.
                                </li>
                                <li class="bg-gray-800/50 p-3 rounded-lg border border-gray-700">
                                    <strong class="text-blue-300 block mb-1">Q3 (Kuartil Atas/Ketiga)</strong>
                                    Batas kanan/atas kotak. Menunjukkan titik di mana 75% data berada.
                                </li>
                                <li class="bg-blue-900/20 p-3 rounded-lg border border-blue-500/30">
                                    <strong class="text-blue-400 block mb-1">Garis Tengah (Median / Q2)</strong>
                                    Garis di dalam kotak. Ini adalah nilai tengah yang membagi data menjadi dua bagian sama besar (50% kiri, 50% kanan). 
                                    <br>
                                    <span class="inline-block mt-2 text-xs italic text-blue-200 bg-blue-900/50 px-2 py-1 rounded border border-blue-500/50">
                                        Catatan: Median lebih kebal terhadap data ekstrem dibandingkan Rata-rata (Mean).
                                    </span>
                                </li>
                            </ul>
                        </div>

                        
                        <div class="bg-[#1e293b] p-6 rounded-2xl border-t-4 border-t-purple-500 shadow-lg relative flex flex-col h-full">
                            <div class="absolute top-4 right-4 text-3xl opacity-20">➖</div>
                            <h4 class="font-bold text-xl text-purple-400 mb-4 border-b border-gray-700 pb-2">Kumis & Jangkauan</h4>
                            
                            <ul class="text-sm text-gray-300 space-y-4 flex-1">
                                <li class="bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                                    <strong class="text-purple-300 block text-base mb-1">Kumis (Whiskers)</strong>
                                    <p class="leading-relaxed">
                                        Garis yang memanjang dari kotak ke ujung-ujung data. Menunjukkan rentang data yang <strong>masih dianggap "normal"</strong> (bukan <em>outlier</em>).
                                    </p>
                                </li>
                                
                                <li class="bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                                    <strong class="text-purple-300 block text-base mb-1">Jangkauan Interkuartil (IQR)</strong>
                                    <p class="leading-relaxed mb-3">
                                        Selisih panjang antara Q3 dan Q1. IQR menunjukkan seberapa "lebar" atau bervariasinya data di bagian tengah.
                                    </p>
                                    <div class="bg-black/50 py-2 px-3 rounded border border-purple-500/30 font-mono text-purple-200 font-bold text-center text-lg">
                                        Rumus: IQR = Q3 - Q1
                                    </div>
                                </li>
                                
                                <li class="bg-red-900/20 p-4 rounded-lg border border-red-500/30">
                                    <strong class="text-red-400 block text-base mb-1">Outlier (Data Pencilan)</strong>
                                    <p class="text-red-200/80 leading-relaxed">
                                        Titik-titik terpisah di luar garis kumis. Merupakan data "aneh" atau ekstrem yang jatuh di luar batas rentang normal.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-6 text-white text-outline" style="line-height: 1.5;">C. Deteksi Data Pencilan (Outlier)</h3>
                    
                    <div class="max-w-4xl mx-auto space-y-6 text-gray-300 leading-relaxed mb-10 text-justify">
                        <p>
                            Salah satu fungsi terpenting <em>Box Plot</em> dalam Data Science adalah mendeteksi <strong>outlier</strong> (data yang nilainya sangat menyimpang atau jauh berbeda dari kelompok data lainnya). Outlier bisa terjadi karena kesalahan ketik (<em>typo</em>) saat input data, atau memang karena adanya fenomena unik yang nyata.
                        </p>
                        <p>
                            Secara statistik, sebuah titik data resmi dianggap sebagai outlier jika nilainya berada di luar pagar batas (<em>fences</em>) berikut:
                        </p>
                    </div>

                    <div class="bg-gradient-to-r from-red-900/80 to-orange-900/80 p-6 md:p-8 rounded-3xl border border-red-500/50 shadow-2xl relative overflow-hidden max-w-5xl mx-auto">
                        <div class="absolute right-0 bottom-0 text-[10rem] md:text-[15rem] opacity-5 -translate-y-10 translate-x-10 pointer-events-none">👽</div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start relative z-10">
                            
                            
                            <div class="bg-[#1e293b] p-6 rounded-2xl border border-gray-700 shadow-xl h-full flex flex-col">
                                <h4 class="text-xl font-bold text-red-400 mb-4 text-center border-b border-gray-700 pb-3">Rumus Pagar Batas (Fences)</h4>
                                
                                <table class="w-full text-left text-sm text-gray-300 border-collapse mb-6">
                                    <thead>
                                        <tr>
                                            <th class="border-b-2 border-gray-600 pb-2 px-2 text-white">Batas</th>
                                            <th class="border-b-2 border-gray-600 pb-2 px-2 text-white">Rumus</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-700">
                                        <tr class="hover:bg-gray-800/50 transition-colors">
                                            <td class="py-3 px-2 font-bold text-orange-300">Pagar Bawah <br><span class="text-xs text-gray-500 font-normal italic">(Lower Fence)</span></td>
                                            <td class="py-3 px-2 font-mono text-red-400 bg-black/30 rounded font-bold">Q1 - (1.5 × IQR)</td>
                                        </tr>
                                        <tr class="hover:bg-gray-800/50 transition-colors">
                                            <td class="py-3 px-2 font-bold text-orange-300">Pagar Atas <br><span class="text-xs text-gray-500 font-normal italic">(Upper Fence)</span></td>
                                            <td class="py-3 px-2 font-mono text-red-400 bg-black/30 rounded font-bold">Q3 + (1.5 × IQR)</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="space-y-3 text-sm mt-auto">
                                    <div class="bg-red-950/40 p-3 rounded-lg border border-red-500/30">
                                        <strong class="text-red-300">Outlier Bawah:</strong> Jika Data &lt; Pagar Bawah
                                    </div>
                                    <div class="bg-red-950/40 p-3 rounded-lg border border-red-500/30">
                                        <strong class="text-red-300">Outlier Atas:</strong> Jika Data &gt; Pagar Atas
                                    </div>
                                </div>
                            </div>

                            
                            <div class="h-full flex flex-col justify-center">
                                <div class="bg-[#e2e8f0] p-3 rounded-xl border border-gray-500 shadow-inner relative group">
                                    <div class="absolute top-2 left-2 bg-red-600 text-white text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-widest shadow-md z-10">
                                        Visualisasi Pagar
                                    </div>
                                    <img src="/images/materi/image_b1efed.jpg" alt="Visualisasi Deteksi Outlier dengan Box Plot" class="rounded max-w-full h-auto object-contain w-full transition-transform duration-300 group-hover:scale-[1.02]" onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400/1e293b/fca5a5?text=Gambar+Visualisasi+Outlier';">
                                </div>
                                <p class="text-sm text-gray-300 mt-5 italic text-center bg-black/40 p-3 rounded-lg border border-gray-700">
                                    Dalam grafik, outlier biasanya digambarkan sebagai <strong>titik-titik terpisah berwarna (merah/hitam)</strong> yang jatuh jauh di luar garis kumis (<em>whiskers</em>).
                                </p>
                            </div>

                        </div>

                        
                        <div class="mt-8 bg-black/60 p-6 rounded-2xl border border-orange-500/30 relative z-10">
                            <h4 class="text-lg font-bold text-yellow-400 mb-3 flex items-center gap-2">
                                <span>🎯</span> Misi Detektif: Simulasi Pencari Outlier
                            </h4>
                            <p class="text-sm text-gray-300 mb-3 leading-relaxed">
                                Diketahui data nilai ujian memiliki <strong>Q1 = 50</strong> dan <strong>Q3 = 80</strong> (IQR = 30).<br>
                                Batas wajar telah ditentukan: <strong>Pagar Bawah = 5</strong> dan <strong>Pagar Atas = 125</strong>.
                            </p>
                            
                            <div class="bg-gray-800/60 rounded-lg p-3 border border-gray-700 mb-5">
                                <p class="text-xs text-yellow-300 font-bold mb-1 uppercase tracking-wider">Misi Kamu:</p>
                                <p class="text-xs text-gray-400">Ketikkan angka acak untuk mencoba menemukan 3 tipe siswa ini: <strong>(1) Nilai Normal</strong>, <strong>(2) Outlier Bawah</strong> (anjlok parah), dan <strong>(3) Outlier Atas</strong> (tinggi tak masuk akal).</p>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-4 items-stretch">
                                <input type="number" id="testOutlierInput" placeholder="Ketik tebakan angka..." class="w-full sm:w-1/3 bg-gray-900 border border-gray-600 rounded-xl px-4 py-3 text-white font-mono text-center focus:border-orange-500 outline-none transition-colors">
                                
                                <button onclick="checkOutlierStatus()" class="w-full sm:w-1/3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-500 hover:to-red-500 text-white font-bold py-3 rounded-xl transition-all active:scale-95 shadow-lg shadow-orange-500/20">
                                    Deteksi Sekarang!
                                </button>
                                
                                <div id="outlierResultBox" class="w-full sm:w-1/3 bg-gray-800 rounded-xl p-3 text-center border border-gray-700 flex flex-col justify-center transition-colors duration-300">
                                    <span class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Hasil Deteksi:</span>
                                    <span id="outlierResultText" class="font-bold text-sm text-gray-500">- - -</span>
                                </div>
                            </div>
                        </div>

                        <script>
                            function checkOutlierStatus() {
                                let input = document.getElementById('testOutlierInput').value;
                                let resultText = document.getElementById('outlierResultText');
                                let resultBox = document.getElementById('outlierResultBox');

                                if (input === '') {
                                    resultText.innerText = "Masukkan angka!";
                                    resultText.className = "font-bold text-sm text-yellow-500 animate-pulse";
                                    resultBox.className = "w-full sm:w-1/3 bg-gray-800 rounded-xl p-3 text-center border border-yellow-500/50 flex flex-col justify-center transition-colors duration-300";
                                    return;
                                }

                                let value = parseFloat(input);

                                // Pagar Bawah = 5, Pagar Atas = 125
                                if (value < 5) {
                                    resultText.innerHTML = "🚨 OUTLIER BAWAH!";
                                    resultText.className = "font-black text-sm text-red-400 animate-pulse tracking-wide";
                                    resultBox.className = "w-full sm:w-1/3 bg-red-900/40 rounded-xl p-3 text-center border border-red-500 shadow-[0_0_15px_rgba(239,68,68,0.3)] flex flex-col justify-center transition-all duration-300";
                                } else if (value > 125) {
                                    resultText.innerHTML = "🚨 OUTLIER ATAS!";
                                    resultText.className = "font-black text-sm text-red-400 animate-pulse tracking-wide";
                                    resultBox.className = "w-full sm:w-1/3 bg-red-900/40 rounded-xl p-3 text-center border border-red-500 shadow-[0_0_15px_rgba(239,68,68,0.3)] flex flex-col justify-center transition-all duration-300";
                                } else {
                                    resultText.innerHTML = "✅ NILAI NORMAL";
                                    resultText.className = "font-black text-sm text-green-400 tracking-wide";
                                    resultBox.className = "w-full sm:w-1/3 bg-green-900/40 rounded-xl p-3 text-center border border-green-500 shadow-[0_0_15px_rgba(34,197,94,0.3)] flex flex-col justify-center transition-all duration-300";
                                }
                            }
                        </script>

                    </div>
                </div>

                <script>
                    function checkOutlierStatus() {
                        const inputVal = document.getElementById('testOutlierInput').value;
                        const resultText = document.getElementById('outlierResultText');
                        const resultBox = document.getElementById('outlierResultBox');

                        if (inputVal === '') {
                            resultText.innerText = "Masukkan angka!";
                            resultText.className = "font-bold text-sm text-yellow-500";
                            return;
                        }

                        const num = parseFloat(inputVal);
                        const lowerFence = 5;
                        const upperFence = 125;

                        // Reset styling
                        resultBox.classList.remove('border-emerald-500', 'border-red-500', 'bg-emerald-900/30', 'bg-red-900/30');

                        if (num < lowerFence) {
                            resultText.innerText = "🚨 OUTLIER BAWAH!";
                            resultText.className = "font-bold text-sm text-red-400 animate-pulse";
                            resultBox.classList.add('border-red-500', 'bg-red-900/30');
                        } else if (num > upperFence) {
                            resultText.innerText = "🚨 OUTLIER ATAS!";
                            resultText.className = "font-bold text-sm text-red-400 animate-pulse";
                            resultBox.classList.add('border-red-500', 'bg-red-900/30');
                        } else {
                            resultText.innerText = "✅ DATA NORMAL";
                            resultText.className = "font-bold text-sm text-emerald-400";
                            resultBox.classList.add('border-emerald-500', 'bg-emerald-900/30');
                        }
                    }
                </script>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-6 text-white text-outline" style="line-height: 1.5;">D. Memahami Alur Perhitungan Outlier</h3>
                    
                    <div class="max-w-4xl mx-auto space-y-6 text-gray-300 leading-relaxed mb-10 text-justify">
                        <p>
                            Mari kita pelajari bagaimana sistem Kecerdasan Buatan (AI) mengenali nilai yang tidak wajar melalui rumus matematika sederhana. Perhatikan contoh kumpulan data Nilai Ujian sebuah kelas yang sudah diurutkan dari terkecil ke terbesar berikut ini:
                        </p>
                        <div class="bg-[#1e293b] p-4 rounded-xl border border-gray-600 shadow-inner text-center font-mono text-xl text-blue-400 font-bold tracking-widest">
                            40, 60, 65, 70, 75, 80, 85, 90, 100, 150
                        </div>
                    </div>

                    <div class="flex justify-center mb-10 bg-[#e2e8f0] p-4 md:p-6 rounded-2xl border border-blue-500/50 shadow-[0_10px_30px_rgba(59,130,246,0.2)] relative">
                        <div class="absolute -top-3 left-6 bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-md">
                            Alur Perhitungan
                        </div>
                        <img src="/images/materi/image_b2529f.jpg" alt="Alur Perhitungan Manual Deteksi Outlier" class="rounded max-w-full h-auto object-contain drop-shadow-lg" onerror="this.onerror=null; this.src='https://via.placeholder.com/900x450/1e293b/a5b4fc?text=Gambar+Infografis+Langkah+Hitung+Outlier';">
                    </div>

                    <div class="bg-[#0f1115] p-6 md:p-8 rounded-3xl border-2 border-gray-700 shadow-2xl mb-12 relative overflow-hidden">
                        <div class="absolute right-0 top-0 w-32 h-32 bg-blue-600/10 blur-[50px] rounded-full pointer-events-none"></div>
                        
                        <div class="flex items-center justify-between border-b border-gray-700 pb-4 mb-6">
                            <h4 class="text-xl font-bold text-white flex items-center gap-2">
                                <span>📝</span> Pengecekan Data
                            </h4>
                            <span class="bg-blue-900/50 text-blue-400 text-[10px] px-3 py-1 rounded-full font-bold tracking-widest border border-blue-500/30 uppercase">
                                Misi Wajib
                            </span>
                        </div>
                        
                        <p class="text-gray-400 text-sm mb-6 leading-relaxed">
                            Berdasarkan infografis di atas, cobalah ketikkan hasil nilainya di kotak berikut. <strong class="text-yellow-400">Selesaikan misi ini dengan benar untuk membuka kunci Kalkulator Uji Data di bawah!</strong>
                        </p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                <label class="block text-xs text-blue-300 font-bold mb-2">1. Nilai Q1 (Kuartil Bawah)</label>
                                <input type="number" id="ansQ1" step="any" class="w-full bg-black border border-gray-600 rounded-lg p-2 text-white text-center font-mono focus:border-blue-500 outline-none transition-colors" placeholder="Hasil Q1...">
                            </div>
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                <label class="block text-xs text-blue-300 font-bold mb-2">2. Nilai Q2 (Median)</label>
                                <input type="number" id="ansQ2" step="any" class="w-full bg-black border border-gray-600 rounded-lg p-2 text-white text-center font-mono focus:border-blue-500 outline-none transition-colors" placeholder="Hasil Median...">
                            </div>
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                <label class="block text-xs text-blue-300 font-bold mb-2">3. Nilai Q3 (Kuartil Atas)</label>
                                <input type="number" id="ansQ3" step="any" class="w-full bg-black border border-gray-600 rounded-lg p-2 text-white text-center font-mono focus:border-blue-500 outline-none transition-colors" placeholder="Hasil Q3...">
                            </div>
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                <label class="block text-xs text-blue-300 font-bold mb-2">4. Nilai IQR (Q3 - Q1)</label>
                                <input type="number" id="ansIQR" step="any" class="w-full bg-black border border-gray-600 rounded-lg p-2 text-white text-center font-mono focus:border-blue-500 outline-none transition-colors" placeholder="Hasil IQR...">
                            </div>
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                <label class="block text-xs text-orange-400 font-bold mb-2">5. Batas Pagar Bawah</label>
                                <input type="number" id="ansPB" step="any" class="w-full bg-black border border-gray-600 rounded-lg p-2 text-white text-center font-mono focus:border-orange-500 outline-none transition-colors" placeholder="Q1 - (1.5 × IQR)">
                            </div>
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700">
                                <label class="block text-xs text-red-400 font-bold mb-2">6. Batas Pagar Atas</label>
                                <input type="number" id="ansPA" step="any" class="w-full bg-black border border-gray-600 rounded-lg p-2 text-white text-center font-mono focus:border-red-500 outline-none transition-colors" placeholder="Q3 + (1.5 × IQR)">
                            </div>
                        </div>

                        <button onclick="cekLatihanTerbimbing()" class="w-full py-3.5 bg-blue-600 hover:bg-blue-500 text-white font-black rounded-xl shadow-lg transition-transform active:scale-95 flex justify-center items-center gap-2">
                            <span>✅</span> CEK DATA & BUKA KUNCI ALAT
                        </button>
                        
                        <div id="feedbackLatihan" class="hidden mt-4 p-4 rounded-xl text-center font-bold text-sm border"></div>
                    </div>


                    <div id="kalkulatorSection" class="mt-16 bg-gradient-to-b from-[#161b22] to-black border border-gray-700 rounded-3xl p-6 md:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] max-w-4xl mx-auto relative overflow-hidden transition-all duration-1000 blur-sm grayscale opacity-60 pointer-events-none">
                        
                        <div id="lockOverlay" class="absolute inset-0 z-50 flex flex-col items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-500">
                            <div class="text-7xl mb-4 drop-shadow-2xl">🔒</div>
                            <h4 class="text-white font-black text-2xl tracking-widest uppercase mb-2">Akses Terkunci</h4>
                            <p class="text-gray-300 text-sm bg-black/50 px-4 py-2 rounded-full border border-gray-600">Jawab Latihan Terbimbing di atas untuk membuka fitur ini.</p>
                        </div>

                        <div class="absolute -left-10 -top-10 text-9xl opacity-5 pointer-events-none">🧮</div>
                        
                        <h3 class="text-2xl font-bold text-center mb-6 text-indigo-300">🛠️ Lab Interaktif: Kalkulator Uji Data</h3>
                        
                        <div class="bg-indigo-900/30 border border-indigo-500/30 rounded-xl p-5 mb-8 max-w-2xl mx-auto shadow-inner">
                            <h4 class="text-indigo-400 font-bold mb-2 flex items-center gap-2 uppercase tracking-widest text-xs">
                                <span>🎯</span> Misi Praktikum Kamu:
                            </h4>
                            <p class="text-sm text-gray-300 mb-3 leading-relaxed">
                                Berdasarkan perhitungan manual sebelumnya, masukkan berbagai angka untuk menyelesaikan pengujian ini:
                            </p>
                            <ul class="text-sm text-gray-400 space-y-2 ml-1">
                                <li class="flex items-start gap-2"><span class="text-green-400 mt-0.5">✅</span> <strong>Uji Nilai Normal</strong> (di antara 27.5 s/d 127.5).</li>
                                <li class="flex items-start gap-2"><span class="text-orange-400 mt-0.5">⚠️</span> <strong>Uji Outlier Bawah</strong> (kurang dari 27.5).</li>
                                <li class="flex items-start gap-2"><span class="text-red-400 mt-0.5">🚨</span> <strong>Uji Outlier Atas</strong> (lebih dari 127.5).</li>
                            </ul>
                        </div>

                        <div class="flex justify-around items-center bg-gray-900/80 p-4 rounded-xl border border-gray-800 mb-8 shadow-inner backdrop-blur-sm">
                            <div class="text-center"><span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">Batas Bawah</span><span class="font-mono font-bold text-lg text-orange-400">27.5</span></div>
                            <div class="text-center px-4 border-l border-r border-gray-800"><span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">Median</span><span class="font-mono font-bold text-lg text-white">77.5</span></div>
                            <div class="text-center"><span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">Batas Atas</span><span class="font-mono font-bold text-lg text-red-400">127.5</span></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-end relative z-10">
                            <div class="bg-gray-800/50 p-5 rounded-2xl border border-gray-600 shadow-lg">
                                <h4 class="font-bold text-indigo-400 mb-4 border-b border-gray-700 pb-2 text-xs uppercase tracking-widest">Sistem Uji Data</h4>
                                <label class="text-xs text-gray-300 block mb-2">Ketik Nilai Ujian (Angka):</label>
                                <input type="number" id="inputUji" class="w-full bg-black border-2 border-indigo-500/50 focus:border-indigo-400 text-white font-mono text-2xl rounded-xl p-4 outline-none text-center mb-4 transition-colors" placeholder="misal: 150">
                                
                                <button onclick="cekUjiOutlier()" class="w-full py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-black rounded-xl shadow-lg transition-transform active:scale-95 flex justify-center items-center gap-2">
                                    <span>🔍</span> DETEKSI SEKARANG
                                </button>
                            </div>

                            <div id="hasilUjiBox" class="bg-black/80 p-6 rounded-2xl border border-gray-700 text-center h-full flex flex-col justify-center min-h-[220px] transition-colors duration-300 shadow-inner">
                                <div class="text-5xl mb-3 opacity-20 animate-pulse">⚙️</div>
                                <p class="text-gray-500 font-mono text-sm">Menunggu input nilai ujian...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // FUNGSI UNTUK MENGECEK LATIHAN TERBIMBING (UNLOCK)
                    function cekLatihanTerbimbing() {
                        let q1 = parseFloat(document.getElementById('ansQ1').value);
                        let q2 = parseFloat(document.getElementById('ansQ2').value);
                        let q3 = parseFloat(document.getElementById('ansQ3').value);
                        let iqr = parseFloat(document.getElementById('ansIQR').value);
                        let pb = parseFloat(document.getElementById('ansPB').value);
                        let pa = parseFloat(document.getElementById('ansPA').value);
                        
                        let feedback = document.getElementById('feedbackLatihan');
                        feedback.classList.remove('hidden');

                        // Cek kebenaran jawaban berdasarkan infografis
                        if(q1 === 65 && q2 === 77.5 && q3 === 90 && iqr === 25 && pb === 27.5 && pa === 127.5) {
                            feedback.className = "mt-4 p-4 rounded-xl text-center font-bold text-sm border bg-green-900/30 border-green-500 text-green-400 animate-fade-in";
                            feedback.innerHTML = "🎉 Luar Biasa! Semua perhitunganmu tepat. Akses Kalkulator telah dibuka!";
                            
                            // Animasi Membuka Kunci
                            let kalkulator = document.getElementById('kalkulatorSection');
                            let lock = document.getElementById('lockOverlay');
                            
                            lock.style.opacity = '0';
                            setTimeout(() => { lock.style.display = 'none'; }, 500);
                            
                            kalkulator.classList.remove('blur-sm', 'grayscale', 'opacity-60', 'pointer-events-none');
                            kalkulator.classList.add('shadow-[0_0_40px_rgba(79,70,229,0.4)]', 'border-indigo-500');
                            
                            // Scroll otomatis ke alat yang terbuka
                            setTimeout(() => { kalkulator.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 600);
                            
                        } else {
                            feedback.className = "mt-4 p-4 rounded-xl text-center font-bold text-sm border bg-red-900/30 border-red-500 text-red-400 animate-[shake_0.5s_ease-in-out]";
                            feedback.innerHTML = "❌ Ups! Ada perhitungan yang masih kurang tepat. Cek kembali panduan infografis di atas ya.";
                        }
                    }

                    // FUNGSI KALKULATOR UJI OUTLIER 
                    function cekUjiOutlier() {
                        const lowerFence = 27.5;
                        const upperFence = 127.5;
                        let inputEl = document.getElementById("inputUji");
                        let val = parseFloat(inputEl.value);
                        let resultDiv = document.getElementById("hasilUjiBox");

                        if (isNaN(val)) {
                            inputEl.classList.add('animate-[shake_0.5s_ease-in-out]', 'border-red-500');
                            setTimeout(() => inputEl.classList.remove('animate-[shake_0.5s_ease-in-out]', 'border-red-500'), 500);
                            return;
                        }

                        resultDiv.innerHTML = '<div class="flex flex-col items-center justify-center h-full gap-3 text-indigo-400"><svg class="animate-spin h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg><span class="text-[10px] font-mono uppercase tracking-widest">Menganalisis...</span></div>';
                        resultDiv.className = "bg-gray-900 p-6 rounded-2xl border border-gray-700 text-center h-full flex flex-col justify-center min-h-[220px]";

                        setTimeout(() => {
                            if (val > upperFence) {
                                resultDiv.innerHTML = '<div class="text-6xl mb-3 drop-shadow-[0_0_15px_rgba(239,68,68,0.8)]">🚨</div><h4 class="font-black text-2xl text-red-500 mb-2">OUTLIER ATAS</h4><p class="text-sm text-gray-300">Nilai <strong class="text-white font-mono bg-red-900/50 px-1 rounded">' + val + '</strong> melebihi batas atas wajar (' + upperFence + ').</p>';
                                resultDiv.className = "bg-red-950/20 p-6 rounded-2xl border-2 border-red-500/50 text-center h-full flex flex-col justify-center min-h-[220px] animate-fade-in shadow-[inset_0_0_50px_rgba(239,68,68,0.1)]";
                            } 
                            else if (val < lowerFence) {
                                resultDiv.innerHTML = '<div class="text-6xl mb-3 drop-shadow-[0_0_15px_rgba(249,115,22,0.8)]">⚠️</div><h4 class="font-black text-2xl text-orange-500 mb-2">OUTLIER BAWAH</h4><p class="text-sm text-gray-300">Nilai <strong class="text-white font-mono bg-orange-900/50 px-1 rounded">' + val + '</strong> jatuh di bawah batas minimal (' + lowerFence + ').</p>';
                                resultDiv.className = "bg-orange-950/20 p-6 rounded-2xl border-2 border-orange-500/50 text-center h-full flex flex-col justify-center min-h-[220px] animate-fade-in shadow-[inset_0_0_50px_rgba(249,115,22,0.1)]";
                            } 
                            else {
                                resultDiv.innerHTML = '<div class="text-6xl mb-3 drop-shadow-[0_0_15px_rgba(34,197,94,0.8)]">✅</div><h4 class="font-black text-2xl text-green-400 mb-2">NORMAL</h4><p class="text-sm text-gray-300">Nilai <strong class="text-white font-mono bg-green-900/50 px-1 rounded">' + val + '</strong> wajar. <br>(Berada di antara ' + lowerFence + ' s/d ' + upperFence + ').</p>';
                                resultDiv.className = "bg-green-950/20 p-6 rounded-2xl border-2 border-green-500/50 text-center h-full flex flex-col justify-center min-h-[220px] animate-fade-in shadow-[inset_0_0_50px_rgba(34,197,94,0.1)]";
                            }
                        }, 800);
                    }
                </script>

                <style>
                    @keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 50% { transform: translateX(5px); } 75% { transform: translateX(-5px); } }
                    .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
                    @keyframes fadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
                </style>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-indigo-400 mb-4 text-outline-sm flex items-center gap-3">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(79,70,229,0.8)]">💻</span>
                        E. DataViz Studio: Praktikum Membangun Workflow Box Plot
                    </h3>
                    <p class="text-gray-300 mb-10 leading-relaxed text-base">
                        Sekarang mari kita ciptakan Box Plot secara instan melalui sistem workflow. Ikuti panel panduan di bawah ini untuk menghubungkan <em>Dataset</em> ke dalam komponen <em>Box Plot</em>!
                    </p>

                    
                    <div class="bg-[#0f172a] rounded-3xl border border-gray-700 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex flex-col xl:flex-row">
                        
                        
                        <div class="w-full xl:w-1/3 bg-gradient-to-b from-gray-800 to-[#1e293b] border-r border-gray-700 flex flex-col">
                            <div class="p-5 border-b border-gray-700 flex items-center justify-between bg-black/20">
                                <h4 class="font-black text-white flex items-center gap-2">
                                    <span class="text-indigo-400">⚙️</span> Control Panel
                                </h4>
                            </div>

                            <div class="p-6 space-y-6 overflow-y-auto custom-scrollbar flex-1">
                                
                                <div>
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-200 mb-2">
                                        <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">1</span>
                                        Data Mentah (CSV)
                                    </label>
                                    <p class="text-[10px] text-gray-400 mb-2">Gunakan data nilai ujian sebelumnya.</p>
                                    <textarea id="boxDataInput" rows="3" class="w-full bg-black/50 border border-gray-600 rounded-lg p-3 text-xs text-indigo-300 font-mono focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none resize-none transition-all">40, 60, 65, 70, 75, 80, 85, 90, 100, 150</textarea>
                                </div>

                                
                                <div>
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-200 mb-2">
                                        <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">2</span>
                                        Pilih Mode Visualisasi
                                    </label>
                                    <select id="labChartType" class="w-full bg-black/50 border border-gray-600 rounded-lg p-2.5 text-sm text-white focus:border-indigo-500 outline-none appearance-none cursor-pointer">
                                        <option value="boxplot">📦 Box Plot (Deteksi Outlier)</option>
                                    </select>
                                </div>

                                
                                <div class="pt-4 border-t border-gray-700">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-200 mb-3">
                                        <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">3</span>
                                        Render Grafik
                                    </label>
                                    <button onclick="generateBoxPlotLab()" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-black py-3.5 rounded-xl shadow-[0_0_15px_rgba(79,70,229,0.5)] transition-all active:scale-95 flex justify-center items-center gap-2 group">
                                        <span class="group-hover:animate-spin">⚙️</span> GENERATE BOX PLOT
                                    </button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="w-full xl:w-2/3 bg-[radial-gradient(#27272a_1px,transparent_1px)] [background-size:20px_20px] bg-[#0f172a] p-6 md:p-8 flex flex-col relative min-h-[500px]">
                            
                            <div id="boxEmptyState" class="absolute inset-0 flex flex-col items-center justify-center text-center opacity-50 z-0">
                                <span class="text-6xl mb-4">📈</span>
                                <p class="text-gray-400 font-medium">Canvas masih kosong.</p>
                                <p class="text-xs text-gray-500 mt-1">Klik Generate di panel kiri untuk memuat grafik.</p>
                            </div>

                            <div id="boxOutputArea" class="hidden opacity-0 transition-opacity duration-700 z-10 flex flex-col h-full">
                                
                                <h4 class="text-xl font-bold text-white mb-6 border-b border-gray-700 pb-2">Visualisasi Outlier</h4>
                                
                                <div class="bg-gray-800/50 rounded-xl border border-gray-600 p-6 flex flex-col justify-center relative h-48 mb-8 shadow-inner">
                                    <div class="relative w-full h-16 flex items-center">
                                        
                                        <div id="whiskerLine" class="absolute h-0.5 bg-gray-400 z-0 transition-all duration-1000"></div>
                                        
                                        <div id="whiskerLeft" class="absolute w-0.5 h-6 bg-gray-400 z-10 transition-all duration-1000"></div>
                                        <div id="whiskerRight" class="absolute w-0.5 h-6 bg-gray-400 z-10 transition-all duration-1000"></div>

                                        <div id="mainBox" class="absolute h-12 bg-blue-500/80 border-2 border-blue-400 z-20 flex items-center shadow-lg transition-all duration-1000">
                                            <div id="medianLine" class="absolute w-1 h-full bg-yellow-400 transition-all duration-1000"></div>
                                        </div>

                                        <div id="outlierDotsContainer" class="absolute inset-0 z-30 pointer-events-none"></div>

                                    </div>
                                    
                                    <div class="w-full border-t border-gray-600 mt-6 pt-2 flex justify-between text-xs font-mono text-gray-500">
                                        <span id="axisMin">0</span>
                                        <span id="axisMax">200</span>
                                    </div>
                                </div>

                                <div>
                                    <h5 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                                        <span class="bg-indigo-600 text-white text-xs w-6 h-6 flex items-center justify-center rounded-full shadow">4</span>
                                        Verifikasi Panel Statistik
                                    </h5>
                                    <p class="text-sm text-gray-400 mb-4 leading-relaxed">
                                        Bandingkan angka-angka yang dihasilkan oleh sistem web di bawah ini dengan hasil coret-coretan manual kita di Sub-bab D.
                                    </p>
                                    
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                        <div class="bg-gray-800 p-3 rounded-lg border border-gray-700 text-center">
                                            <span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">Q1</span>
                                            <span id="statQ1" class="font-mono font-bold text-lg text-blue-400">-</span>
                                        </div>
                                        <div class="bg-gray-800 p-3 rounded-lg border border-gray-700 text-center">
                                            <span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">Median</span>
                                            <span id="statMed" class="font-mono font-bold text-lg text-white">-</span>
                                        </div>
                                        <div class="bg-gray-800 p-3 rounded-lg border border-gray-700 text-center">
                                            <span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">Q3</span>
                                            <span id="statQ3" class="font-mono font-bold text-lg text-blue-400">-</span>
                                        </div>
                                        <div class="bg-gray-800 p-3 rounded-lg border border-gray-700 text-center">
                                            <span class="block text-[10px] text-gray-500 font-bold uppercase mb-1">IQR</span>
                                            <span id="statIQR" class="font-mono font-bold text-lg text-purple-400">-</span>
                                        </div>
                                    </div>

                                    <div class="bg-blue-900/20 p-5 rounded-xl border-l-4 border-blue-500">
                                        <h4 class="text-blue-400 font-black flex items-center gap-2 mb-2"><span>🎯</span> KESIMPULAN:</h4>
                                        <p class="text-sm text-gray-300 leading-relaxed">
                                            Sistem secara akurat menghitung nilai Q1 (<span id="concQ1"></span>), Median (<span id="concMed"></span>), Q3 (<span id="concQ3"></span>), IQR (<span id="concIQR"></span>), hingga Batas Atas (<span id="concUpper"></span>) persis sama dengan perhitungan manusia. Sistem juga dengan cerdas melabeli angka <strong class="text-red-400" id="concOutlier"></strong> pada baris peringatan <em>Outlier</em>!
                                        </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Fungsi bantuan Statistik
                    function getMedian(arr) {
                        const mid = Math.floor(arr.length / 2);
                        return arr.length % 2 !== 0 ? arr[mid] : (arr[mid - 1] + arr[mid]) / 2;
                    }

                    function generateBoxPlotLab() {
                        const rawInput = document.getElementById('boxDataInput').value;
                        let data = rawInput.split(',').map(num => parseFloat(num.trim())).filter(num => !isNaN(num));
                        
                        if (data.length < 4) {
                            alert("Masukkan minimal 4 angka yang dipisahkan dengan koma!");
                            return;
                        }

                        // 1. Urutkan Data
                        data.sort((a, b) => a - b);

                        // 2. Hitung Statistik (Sesuai cara manual)
                        const midIndex = Math.floor(data.length / 2);
                        let leftHalf, rightHalf;
                        
                        if (data.length % 2 === 0) {
                            leftHalf = data.slice(0, midIndex);
                            rightHalf = data.slice(midIndex);
                        } else {
                            leftHalf = data.slice(0, midIndex);
                            rightHalf = data.slice(midIndex + 1);
                        }

                        const q1 = getMedian(leftHalf);
                        const median = getMedian(data);
                        const q3 = getMedian(rightHalf);
                        const iqr = q3 - q1;

                        const lowerFence = q1 - (1.5 * iqr);
                        const upperFence = q3 + (1.5 * iqr);

                        // 3. Cari Outlier & Batas Kumis
                        let normalData = [];
                        let outliers = [];

                        data.forEach(val => {
                            if (val < lowerFence || val > upperFence) {
                                outliers.push(val);
                            } else {
                                normalData.push(val);
                            }
                        });

                        // Batas kumis diambil dari data terkecil dan terbesar yang MASIH NORMAL
                        const whiskerMin = Math.min(...normalData);
                        const whiskerMax = Math.max(...normalData);

                        // 4. Update Tampilan UI Statistik (Menghindari error PHP backtick)
                        document.getElementById('statQ1').innerText = q1;
                        document.getElementById('statMed').innerText = median;
                        document.getElementById('statQ3').innerText = q3;
                        document.getElementById('statIQR').innerText = iqr;

                        document.getElementById('concQ1').innerText = q1;
                        document.getElementById('concMed').innerText = median;
                        document.getElementById('concQ3').innerText = q3;
                        document.getElementById('concIQR').innerText = iqr;
                        document.getElementById('concUpper').innerText = upperFence;
                        document.getElementById('concOutlier').innerText = outliers.length > 0 ? outliers.join(', ') : 'Tidak ada';

                        // 5. Update Animasi Canvas Visual
                        document.getElementById('boxEmptyState').classList.add('hidden');
                        const outputArea = document.getElementById('boxOutputArea');
                        outputArea.classList.remove('hidden');
                        setTimeout(() => outputArea.classList.remove('opacity-0'), 50);

                        // Skala Sumbu X (Berikan sedikit margin agar muat)
                        const axisMin = Math.min(...data) - 10;
                        const axisMax = Math.max(...data) + 10;
                        const range = axisMax - axisMin;

                        document.getElementById('axisMin').innerText = axisMin;
                        document.getElementById('axisMax').innerText = axisMax;

                        // Fungsi hitung persentase posisi
                        const getPos = (val) => ((val - axisMin) / range) * 100;

                        // Render Komponen CSS
                        document.getElementById('whiskerLine').style.left = getPos(whiskerMin) + '%';
                        document.getElementById('whiskerLine').style.width = (getPos(whiskerMax) - getPos(whiskerMin)) + '%';
                        
                        document.getElementById('whiskerLeft').style.left = getPos(whiskerMin) + '%';
                        document.getElementById('whiskerRight').style.left = getPos(whiskerMax) + '%';

                        const mainBox = document.getElementById('mainBox');
                        mainBox.style.left = getPos(q1) + '%';
                        mainBox.style.width = (getPos(q3) - getPos(q1)) + '%';

                        // Posisi median relatif terhadap kotak
                        const medianPosRel = ((median - q1) / iqr) * 100;
                        document.getElementById('medianLine').style.left = medianPosRel + '%';

                        // Render Titik Outliers (Aman dari PHP error)
                        const dotsContainer = document.getElementById('outlierDotsContainer');
                        dotsContainer.innerHTML = ''; // Bersihkan titik lama
                        
                        outliers.forEach(outVal => {
                            let dot = document.createElement('div');
                            dot.className = 'absolute w-3 h-3 bg-red-500 rounded-full border border-white shadow-[0_0_10px_rgba(239,68,68,0.8)] top-1/2 transform -translate-y-1/2 -translate-x-1/2 animate-bounce cursor-help pointer-events-auto group';
                            dot.style.left = getPos(outVal) + '%';
                            
                            let tooltip = document.createElement('div');
                            tooltip.className = 'absolute -top-8 left-1/2 transform -translate-x-1/2 bg-red-900 text-white text-[10px] font-bold px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap border border-red-400';
                            tooltip.innerText = 'Outlier: ' + outVal;
                            
                            dot.appendChild(tooltip);
                            dotsContainer.appendChild(dot);
                        });
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
                    data-question="Perbedaan fungsi yang paling menonjol antara Histogram dan Box Plot berdasarkan materi di atas adalah...."
                    data-opt-a="Histogram untuk mendeteksi outlier, sedangkan Box Plot untuk melihat rata-rata kelas."
                    data-opt-b="Histogram untuk membandingkan antar kelompok, sedangkan Box Plot untuk melihat bentuk distribusi."
                    data-opt-c="Histogram digunakan untuk melihat bentuk sebaran data, sedangkan Box Plot sangat ampuh untuk membandingkan kelompok secara cepat sekaligus mendeteksi Outlier."
                    data-opt-d="Keduanya memiliki fungsi yang persis sama, hanya bentuknya yang berbeda."
                    data-opt-e="Histogram hanya bisa digunakan untuk data teks, sedangkan Box Plot khusus untuk angka."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Bagian kotak (The Box) dalam “Anatomi Statistik Lima Serangkai” merepresentasikan...."
                    data-opt-a="Mewakili 100% dari seluruh rentang data."
                    data-opt-b="Mewakili 50% data yang berada persis di tengah-tengah rentang."
                    data-opt-c="Mewakili 25% data terendah saja."
                    data-opt-d="Mewakili nilai Outlier."
                    data-opt-e="Mewakili 75% data teratas dari keseluruhan distribusi."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Arti garis yang memanjang ke luar (kiri dan kanan) dari kotak pada Box Plot yang disebut “Kumis” (Whiskers) adalah...."
                    data-opt-a="Menandakan batas nilai data yang masih dianggap 'normal'."
                    data-opt-b="Menunjukkan bahwa data tersebut adalah Outlier."
                    data-opt-c="Menunjukkan jumlah total (frekuensi) data."
                    data-opt-d="Menandakan kesalahan perhitungan dari komputer."
                    data-opt-e="Menunjukkan nilai rata-rata (mean) dari keseluruhan kelompok data."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Nilai batas Pagar Bawah (Lower Fence) untuk data dengan Q1 = 50 dan IQR = 20 berdasarkan rumus Pagar Bawah adalah...."
                    data-opt-a="30"
                    data-opt-b="80"
                    data-opt-c="20"
                    data-opt-d="-10"
                    data-opt-e="0"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Elemen yang mendeteksi dan melabeli titik 150 secara otomatis berdasarkan hasil uji pada panel “Verifikasi Panel Statistik” di DataViz Studio adalah...."
                    data-opt-a="Sistem mendeteksinya sebagai Median."
                    data-opt-b="Sistem mendeteksinya sebagai nilai batas Q3."
                    data-opt-c="Sistem melabelinya sebagai titik data biasa karena berada dalam batas IQR."
                    data-opt-d="Sistem mendeteksinya dan melabelinya sebagai Outlier."
                    data-opt-e="Sistem mengabaikan angka 150 karena terjadi error saat plotting."
                    data-answer="D">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'box-plot-outlier'],
            [
                'chapter_id' => $chapterId,
                'title' => 'Box Plot & Deteksi Outlier',
                'type' => 'text',
                'sequence' => 5, 
                'min_level' => 6,
                'content' => $content,
            ]
        );
        
        $this->command->info('Materi Box Plot berhasil diperbarui dengan Multi-Quiz!');
    }
}