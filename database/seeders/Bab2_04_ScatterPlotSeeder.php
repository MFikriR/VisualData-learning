<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_04_ScatterPlotSeeder extends Seeder
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
                                src="https://www.youtube.com/embed/F7PCC2V5pck?rel=0&modestbranding=1" 
                                title="Video Pengantar Scatter Plot" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas sebelum mempelajari materi!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-blue-950 p-8 rounded-3xl border border-blue-500 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 text-9xl opacity-10 pointer-events-none">🌌</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-4 relative z-10" style="line-height: 1.5;">
                        A. Definisi dan Kegunaan
                    </h3>
                    
                    <div class="relative z-10 space-y-6">
                        
                        <div>
                            <p class="text-lg leading-relaxed text-gray-200 font-medium mb-4">
                                Jika kamu ingin tahu <em class="text-blue-300">"Apakah ada hubungannya antara jumlah jam belajar dengan nilai ujian yang didapat?"</em>, maka senjata terbaikmu adalah <strong>Scatter Plot</strong> (Diagram Pencar).
                            </p>
                            <p class="text-base text-gray-300 leading-relaxed mb-4">
                                Scatter Plot adalah grafik yang menggunakan titik-titik koordinat Cartesian untuk menampilkan nilai dari <strong>dua variabel numerik</strong> secara bersamaan.
                            </p>
                        </div>

                        <div class="bg-black/40 p-5 md:p-6 rounded-2xl border border-gray-600 backdrop-blur-sm shadow-inner">
                            <h4 class="text-white font-bold mb-3 border-b border-gray-700 pb-2 flex items-center gap-2">
                                <span>🎯</span> Cara Kerja Radar
                            </h4>
                            <ul class="text-sm text-gray-300 space-y-4">
                                <li class="flex gap-3">
                                    <span class="text-blue-400 font-black mt-0.5">X</span>
                                    <div>
                                        <strong class="text-white">Sumbu X (Horizontal):</strong> Menampilkan Variabel 1 (Misal: <em>Jam Belajar</em>).
                                    </div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-blue-400 font-black mt-0.5">Y</span>
                                    <div>
                                        <strong class="text-white">Sumbu Y (Vertikal):</strong> Menampilkan Variabel 2 (Misal: <em>Nilai Ujian</em>).
                                    </div>
                                </li>
                                <li class="flex gap-3 bg-blue-900/30 p-2 rounded border border-blue-500/30">
                                    <span class="text-pink-400 text-lg leading-none">📍</span>
                                    <div>
                                        <strong class="text-pink-300">Setiap Titik (Dot) = Satu Data (Satu Siswa)</strong>. Posisinya ditentukan oleh pertemuan nilai X dan Y dari siswa tersebut.
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div class="bg-[#1e293b] p-5 rounded-2xl border-l-4 border-blue-400 shadow-md">
                                <h4 class="text-blue-300 font-bold mb-2 uppercase tracking-widest text-xs">Fungsi Utama</h4>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    Digunakan untuk melihat <strong>hubungan (korelasi)</strong> antara dua variabel. Tujuannya untuk menjawab: <em>"Apakah perubahan pada variabel X memengaruhi variabel Y?"</em>
                                </p>
                            </div>
                            
                            <div class="bg-[#1e293b] p-5 rounded-2xl border-l-4 border-purple-400 shadow-md">
                                <h4 class="text-purple-300 font-bold mb-2 uppercase tracking-widest text-xs">Contoh Penggunaan AI</h4>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    Sebelum membuat model Kecerdasan Buatan (AI) untuk prediksi harga rumah, <em>Data Scientist</em> menggunakan Scatter Plot untuk melihat hubungan antara <strong>"Luas Tanah" (X)</strong> dengan <strong>"Harga Rumah" (Y)</strong>.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-4 text-white text-outline" style="line-height: 1.5;">B. Membaca Arah Bintang (Korelasi)</h3>
                    <p class="text-center text-gray-400 mb-10 max-w-3xl mx-auto">
                        Saat melihat Scatter Plot, mata seorang <em>Data Scientist</em> tidak melihat titik satu per satu, melainkan mencari "Arah Awan" titik-titik tersebut. Arah ini disebut Korelasi.
                    </p>

                    <div class="bg-[#1e293b] p-6 md:p-8 rounded-3xl border border-gray-700 shadow-2xl relative overflow-hidden">
                        
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-2 mb-8 bg-black/30 p-2 rounded-2xl border border-gray-700">
                            <button onclick="setPlotPattern('positif')" id="btn-positif" class="flex-1 text-center py-3 px-4 rounded-xl font-black text-sm transition-all active:scale-95 flex items-center justify-center gap-2 bg-green-950 text-green-300 border border-green-700 shadow-[0_0_10px_rgba(34,197,94,0.3)]">
                                <span class="text-xl">📈</span> Positif
                            </button>
                            <button onclick="setPlotPattern('negatif')" id="btn-negatif" class="flex-1 text-center py-3 px-4 rounded-xl font-black text-sm transition-all active:scale-95 flex items-center justify-center gap-2 bg-gray-800 text-gray-400 border border-gray-700 opacity-60 hover:opacity-100">
                                <span class="text-xl">📉</span> Negatif
                            </button>
                            <button onclick="setPlotPattern('nihil')" id="btn-nihil" class="flex-1 text-center py-3 px-4 rounded-xl font-black text-sm transition-all active:scale-95 flex items-center justify-center gap-2 bg-gray-800 text-gray-400 border border-gray-700 opacity-60 hover:opacity-100">
                                <span class="text-xl">🎲</span> Nihil
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                            
                            <div class="md:col-span-2 h-64 bg-black/40 rounded-2xl border-2 border-gray-700 relative overflow-hidden p-4">
                                <div class="absolute inset-0 border-b-2 border-l-2 border-gray-600 m-4 z-0 opacity-40"></div>
                                
                                <div id="scatter-points-container" class="absolute inset-4 z-10">
                                </div>

                                <div id="slope-line" class="absolute h-0.5 w-[140%] z-20 origin-bottom-left transition-all duration-500 opacity-0 bg-green-400"></div>
                            </div>

                            <div id="plot-description" class="bg-[#0f172a] p-6 rounded-2xl border border-gray-700 h-full flex flex-col justify-center">
                                <p id="plot-phrase" class="text-sm text-green-300 font-bold mb-3 border-l-4 border-green-500 pl-3">"X Naik, Y Ikut Naik"</p>
                                <div class="text-xs text-gray-300 p-3 rounded-lg border border-gray-600 shadow-inner h-full flex flex-col justify-center">
                                    <strong class="text-white block mb-1">Contoh:</strong>
                                    <span id="plot-example">Jam Belajar vs Nilai Ujian. Semakin lama belajar, nilainya cenderung membaik.</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    const scatterData = {
                        positif: {
                            color: 'green',
                            phrase: '"X Naik, Y Ikut Naik"',
                            example: 'Jam Belajar vs Nilai Ujian. Semakin lama belajar, nilainya cenderung membaik.',
                            points: [ [10,10],[15,20],[20,15],[25,30],[30,40],[35,30],[40,45],[45,55],[50,50],[55,65] ],
                            rotate: '-30deg',
                            bottom: '0',
                        },
                        negatif: {
                            color: 'red',
                            phrase: '"X Naik, Y Malah Turun"',
                            example: 'Usia Mobil vs Harga Jual. Semakin tua mobilnya, harganya makin jatuh.',
                            points: [ [10,65],[15,55],[20,50],[25,45],[30,40],[35,35],[40,25],[45,30],[50,20],[55,10] ],
                            rotate: '30deg',
                            top: '0',
                        },
                        nihil: {
                            color: 'gray',
                            phrase: '"Menyebar Secara Acak"',
                            example: 'Ukuran Sepatu vs Nilai IQ. Tidak ada hubungannya sama sekali.',
                            points: [ [10,35],[15,10],[20,45],[25,5],[30,60],[35,15],[40,55],[45,20],[50,40],[55,5] ],
                        }
                    };

                    function setPlotPattern(pattern) {
                        // 1. Update Tombol
                        const patterns = ['positif', 'negatif', 'nihil'];
                        patterns.forEach(function(p) {
                            const btn = document.getElementById('btn-' + p);
                            if(p === pattern) {
                                let shadowColor = 'rgba(';
                                if(p === 'nihil') shadowColor += '156,163,175';
                                else if(p === 'positif') shadowColor += '34,197,94';
                                else shadowColor += '239,68,68';
                                shadowColor += ',0.3)';

                                btn.className = 'flex-1 text-center py-3 px-4 rounded-xl font-black text-sm transition-all active:scale-95 flex items-center justify-center gap-2 bg-' + scatterData[p].color + '-950 text-' + scatterData[p].color + '-300 border border-' + scatterData[p].color + '-700 shadow-[0_0_10px_' + shadowColor + ']';
                                btn.removeAttribute('disabled');
                            } else {
                                btn.className = "flex-1 text-center py-3 px-4 rounded-xl font-black text-sm transition-all active:scale-95 flex items-center justify-center gap-2 bg-gray-800 text-gray-400 border border-gray-700 opacity-60 hover:opacity-100";
                            }
                        });

                        // 2. Update Titik-Titik
                        const container = document.getElementById('scatter-points-container');
                        container.innerHTML = '';
                        
                        const config = scatterData[pattern];
                        config.points.forEach(function(point) {
                            const dot = document.createElement('div');
                            
                            let dotShadow = '#ef4444'; // default red
                            if(pattern === 'nihil') dotShadow = '#f97316';
                            else if(pattern === 'positif') dotShadow = '#22c55e';
                            
                            const dotColor = (pattern === 'nihil' ? 'orange' : config.color);
                            
                            dot.className = 'absolute w-2.5 h-2.5 bg-' + dotColor + '-500 rounded-full shadow-[0_0_8px_' + dotShadow + '] transition-all duration-500 ease-out';
                            dot.style.left = (point[0] * 1.6) + '%';
                            dot.style.bottom = (point[1] * 1.4) + '%';
                            container.appendChild(dot);
                        });

                        // 3. Update Garis Slope
                        const slope = document.getElementById('slope-line');
                        if(pattern !== 'nihil') {
                            let slopeShadow = pattern === 'positif' ? '#22c55e' : '#ef4444';
                            slope.className = 'absolute h-0.5 w-[140%] z-20 origin-bottom-left transition-all duration-500 opacity-100 bg-' + config.color + '-400 shadow-[0_0_10px_' + slopeShadow + ']';
                            slope.style.transform = 'rotate(' + config.rotate + ')';
                            if(config.bottom) slope.style.bottom = config.bottom; else slope.style.bottom = 'auto';
                            if(config.top) slope.style.top = config.top; else slope.style.top = 'auto';
                        } else {
                            slope.className = "opacity-0";
                        }

                        // 4. Update Teks Deskripsi
                        document.getElementById('plot-phrase').innerText = config.phrase;
                        document.getElementById('plot-phrase').className = 'text-sm text-' + config.color + '-300 font-bold mb-3 border-l-4 border-' + config.color + '-500 pl-3';
                        document.getElementById('plot-example').innerText = config.example;
                    }

                    // Inisialisasi awal saat halaman dimuat
                    document.addEventListener('DOMContentLoaded', function() {
                        setPlotPattern('positif');
                    });
                </script>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-4 text-white text-outline" style="line-height: 1.5;">C. Simulator Kekuatan Korelasi (r)</h3>
                    <p class="text-center text-gray-300 mb-8 max-w-3xl mx-auto text-sm leading-relaxed">
                        Ilmuwan data tidak hanya menebak korelasi dari gambar, mereka mengukurnya dengan angka pasti menggunakan rumus <strong>Koefisien Korelasi Pearson (r)</strong>. Nilai <em>r</em> selalu berada di rentang <strong>-1 hingga +1</strong>. Mari kita buktikan, coba geser slider di bawah ini!
                    </p>

                    <div class="bg-[#0a0c10] border-2 border-gray-800 rounded-3xl p-6 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] max-w-4xl mx-auto flex flex-col md:flex-row gap-10 items-center mb-10">
                        
                        <div class="w-full md:w-1/2 flex flex-col gap-6">
                            <div class="bg-gray-900 p-6 rounded-2xl border border-gray-700 text-center shadow-inner">
                                <span class="text-xs text-gray-500 uppercase tracking-widest font-bold block mb-2">Nilai Korelasi (r)</span>
                                <div class="text-6xl font-black font-mono transition-colors duration-300" id="rValueDisplay">0.00</div>
                                <div class="text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-black/50" id="rLabelDisplay">ACAK / NIHIL</div>
                            </div>
                            
                            <div class="px-2">
                                <input type="range" id="rSlider" min="-100" max="100" value="0" oninput="updateScatterSim()" class="w-full h-3 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-500">
                                <div class="flex justify-between text-[10px] md:text-xs text-gray-500 font-bold mt-3 px-1">
                                    <span>-1 (Negatif Sempurna)</span>
                                    <span>0 (Acak)</span>
                                    <span>+1 (Positif Sempurna)</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2">
                            <div class="aspect-square bg-[#161b22] rounded-2xl border-b-4 border-l-4 border-gray-600 relative overflow-hidden shadow-inner" id="scatterCanvas">
                            </div>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto">
                        <div class="bg-[#1e293b] rounded-2xl border border-gray-700 overflow-hidden shadow-lg mb-6">
                            <div class="bg-gray-800/80 px-6 py-4 border-b border-gray-700">
                                <h4 class="font-bold text-white flex items-center gap-2"><span>📊</span> Tabel Interpretasi Nilai Pearson (r)</h4>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-300">
                                    <thead class="text-xs uppercase bg-black/30 text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Nilai (r)</th>
                                            <th scope="col" class="px-6 py-4">Interpretasi</th>
                                            <th scope="col" class="px-6 py-4">Bentuk Grafik</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-700">
                                        <tr class="hover:bg-gray-800/30">
                                            <td class="px-6 py-4 font-mono font-bold text-green-400">+1</td>
                                            <td class="px-6 py-4 font-bold">Korelasi Positif Sempurna</td>
                                            <td class="px-6 py-4">Titik membentuk garis lurus menanjak yang rapi.</td>
                                        </tr>
                                        <tr class="hover:bg-gray-800/30">
                                            <td class="px-6 py-4 font-mono font-bold text-green-300">+0.7 s.d +0.9</td>
                                            <td class="px-6 py-4 font-bold">Korelasi Positif Kuat</td>
                                            <td class="px-6 py-4">Titik menanjak tapi agak menyebar sedikit.</td>
                                        </tr>
                                        <tr class="hover:bg-gray-800/30 bg-black/20">
                                            <td class="px-6 py-4 font-mono font-bold text-gray-400">0</td>
                                            <td class="px-6 py-4 font-bold">Tidak Ada Korelasi</td>
                                            <td class="px-6 py-4">Titik menyebar acak (seperti awan).</td>
                                        </tr>
                                        <tr class="hover:bg-gray-800/30">
                                            <td class="px-6 py-4 font-mono font-bold text-red-300">-0.7 s.d -0.9</td>
                                            <td class="px-6 py-4 font-bold">Korelasi Negatif Kuat</td>
                                            <td class="px-6 py-4">Titik menurun tapi agak menyebar sedikit.</td>
                                        </tr>
                                        <tr class="hover:bg-gray-800/30">
                                            <td class="px-6 py-4 font-mono font-bold text-red-400">-1</td>
                                            <td class="px-6 py-4 font-bold">Korelasi Negatif Sempurna</td>
                                            <td class="px-6 py-4">Titik membentuk garis lurus menurun yang rapi.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="bg-yellow-900/20 border border-yellow-600/50 rounded-xl p-5 flex gap-4 items-start shadow-md">
                            <span class="text-3xl">⚠️</span>
                            <div>
                                <strong class="text-yellow-500 block mb-1 text-lg">Catatan Penting Data Scientist:</strong>
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    Scatter plot membantu kita menghindari kesimpulan yang salah. Terkadang angka korelasinya tinggi, tapi setelah dilihat bentuk grafiknya ternyata <strong>melengkung (non-linear)</strong>, bukan garis lurus. Selalu pastikan memvisualisasikan data sebelum mengambil kesimpulan dari angkanya!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const canvas = document.getElementById('scatterCanvas');
                    const numPoints = 50;
                    let points = [];
                    let baseNoise = [];

                    for (let i = 0; i < numPoints; i++) {
                        let dot = document.createElement('div');
                        dot.className = "absolute w-2 h-2 rounded-full transition-all duration-75 ease-linear";
                        canvas.appendChild(dot);
                        points.push(dot);
                        baseNoise.push(Math.random() - 0.5);
                    }

                    function updateScatterSim() {
                        let sliderVal = parseInt(document.getElementById('rSlider').value);
                        let r = sliderVal / 100; 
                        
                        let rDisp = document.getElementById('rValueDisplay');
                        let rLbl = document.getElementById('rLabelDisplay');
                        
                        let sign = (r > 0) ? "+" : "";
                        rDisp.innerText = sign + r.toFixed(2);
                        
                        if (r === 1) { 
                            rDisp.className = "text-6xl font-black font-mono text-green-500"; 
                            rLbl.innerText = "POSITIF SEMPURNA"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-green-900/40 text-green-400 border border-green-500/50"; 
                        } else if (r > 0.7) { 
                            rDisp.className = "text-6xl font-black font-mono text-green-400"; 
                            rLbl.innerText = "POSITIF KUAT"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-green-900/30 text-green-400"; 
                        } else if (r > 0.3) { 
                            rDisp.className = "text-6xl font-black font-mono text-green-200"; 
                            rLbl.innerText = "POSITIF LEMAH"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-green-900/20 text-green-300"; 
                        } else if (r === -1) { 
                            rDisp.className = "text-6xl font-black font-mono text-red-500"; 
                            rLbl.innerText = "NEGATIF SEMPURNA"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-red-900/40 text-red-400 border border-red-500/50"; 
                        } else if (r < -0.7) { 
                            rDisp.className = "text-6xl font-black font-mono text-red-400"; 
                            rLbl.innerText = "NEGATIF KUAT"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-red-900/30 text-red-400"; 
                        } else if (r < -0.3) { 
                            rDisp.className = "text-6xl font-black font-mono text-red-200"; 
                            rLbl.innerText = "NEGATIF LEMAH"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-red-900/20 text-red-300"; 
                        } else { 
                            rDisp.className = "text-6xl font-black font-mono text-gray-400"; 
                            rLbl.innerText = "ACAK / NIHIL"; rLbl.className = "text-sm font-bold mt-3 tracking-widest px-4 py-2 rounded-lg inline-block bg-gray-800 text-gray-400 border border-gray-600"; 
                        }

                        points.forEach((dot, index) => {
                            let x = 5 + (index * (90 / numPoints)); 
                            
                            let noiseLevel = 1 - Math.abs(r); 
                            let noise = baseNoise[index] * 100 * noiseLevel; 

                            let y;
                            if (r >= 0) {
                                let yTrend = 95 - (x * 0.9); 
                                y = yTrend * Math.abs(r) + 50 * (1 - Math.abs(r)) + noise; 
                            } else {
                                let yTrend = 5 + (x * 0.9);
                                y = yTrend * Math.abs(r) + 50 * (1 - Math.abs(r)) + noise;
                            }
                            
                            if(y < 5) y = 5; if(y > 95) y = 95;

                            if(r > 0.5) dot.className = "absolute w-2 h-2 rounded-full bg-green-400 shadow-[0_0_8px_#4ade80] transition-all duration-75 ease-linear";
                            else if(r < -0.5) dot.className = "absolute w-2 h-2 rounded-full bg-red-400 shadow-[0_0_8px_#f87171] transition-all duration-75 ease-linear";
                            else dot.className = "absolute w-2 h-2 rounded-full bg-gray-400 shadow-[0_0_8px_#9ca3af] transition-all duration-75 ease-linear";

                            dot.style.left = x + "%";
                            dot.style.top = y + "%";
                        });
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(updateScatterSim, 100);
                    });
                </script>
                
                <div class="mt-16">
                    <h3 class="text-3xl font-black text-indigo-400 mb-6 text-outline-sm flex items-center gap-3">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(79,70,229,0.8)]">🎯</span>
                        D. Deteksi Outlier pada Scatter Plot
                    </h3>

                    <div class="bg-[#0f1115] p-6 md:p-8 rounded-3xl border-2 border-gray-700 shadow-2xl mb-10">
                        <p class="text-gray-300 leading-relaxed mb-6 text-lg">
                            Selain untuk mencari korelasi, <em>Scatter Plot</em> adalah senjata yang sangat ampuh untuk mendeteksi <strong>outlier</strong> dalam dua dimensi sekaligus. <em>Outlier</em> akan terlihat sebagai titik yang letaknya sangat jauh terasing dari kerumunan awan titik lainnya.
                        </p>

                        <div class="flex flex-col xl:flex-row gap-8 items-center mb-8">
                            <div class="w-full xl:w-1/2 bg-[#1e293b] p-5 rounded-2xl border-l-4 border-red-500 shadow-md">
                                <h4 class="text-red-400 font-bold mb-2 uppercase tracking-widest text-xs flex items-center gap-2">
                                    <span class="text-lg">🕵️</span> Studi Kasus: Jam Belajar vs Nilai Ujian
                                </h4>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    Misalnya, dalam data "Jam Belajar" vs "Nilai Ujian", mayoritas siswa yang rajin belajar mendapatkan nilai tinggi. Tapi, tiba-tiba ada satu titik yang jam belajarnya <strong>baru 2 jam/minggu</strong>, tapi nilainya nyaris sempurna <strong>95</strong> (mungkin dia jenius... atau menyontek!). 
                                    <br><br>
                                    Dalam <em>Scatter Plot</em>, titik anomali ini akan langsung ketahuan karena posisinya <strong>terlihat menyendiri di sudut kiri atas grafik</strong>, terpisah jauh dari "Kerumunan Data Normal".
                                </p>
                            </div>
                            
                            <div class="relative flex flex-col items-start gap-4 w-full xl:w-1/2 bg-[#e2e8f0] p-6 rounded-xl border border-gray-600 shadow-inner group">
                                <div class="bg-red-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-md">
                                    Visualisasi Outlier 2D
                                </div>

                                <img src="/images/materi/scatter_belajar_nilai.jpg" alt="Scatter Plot Deteksi Outlier Nilai" class="rounded max-w-full h-auto object-contain drop-shadow-md transition-transform duration-300 group-hover:scale-[1.02]" onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400/1e293b/fca5a5?text=Gambar+Visualisasi+Outlier';">
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-indigo-950 to-black p-6 md:p-8 rounded-3xl border border-indigo-500/50 shadow-[0_15px_40px_rgba(79,70,229,0.2)] relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 text-9xl opacity-5 pointer-events-none">📡</div>
                        
                        <h4 class="text-2xl font-black text-indigo-300 mb-2">Mini-Lab: Radar Anomali Kelas</h4>
                        <p class="text-sm text-gray-400 mb-8">
                            Mari kita uji sistem radarnya! Masukkan data simulasi siswa baru di bawah ini. Apakah nilainya wajar dan membaur dengan kerumunan, atau terdeteksi sebagai anomali (outlier)?
                        </p>

                        <div class="flex flex-col md:flex-row gap-8 items-center">
                            
                            <div class="w-full md:w-1/3 space-y-4 bg-black/40 p-5 rounded-2xl border border-gray-700 backdrop-blur-sm z-10">
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">Jam Belajar (1-20 Jam/Minggu)</label>
                                    <input type="number" id="inputX" min="1" max="20" class="w-full bg-gray-900 border border-gray-600 rounded-lg p-3 text-white font-mono focus:border-indigo-500 outline-none" placeholder="Misal: 5">
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase tracking-widest block mb-1">Nilai Ujian (0-100)</label>
                                    <input type="number" id="inputY" min="0" max="100" class="w-full bg-gray-900 border border-gray-600 rounded-lg p-3 text-white font-mono focus:border-indigo-500 outline-none" placeholder="Misal: 80">
                                </div>
                                <button onclick="plotNewData()" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-lg transition-transform active:scale-95 flex justify-center items-center gap-2 mt-4">
                                    <span>➕</span> PLOT DATA SISWA
                                </button>

                                <div id="radarResult" class="hidden mt-4 p-4 rounded-xl border text-center font-bold text-sm transition-all">
                                </div>
                            </div>

                            <div class="w-full md:w-2/3 h-80 bg-[#f8fafc] rounded-xl border-4 border-gray-300 relative shadow-inner p-4 z-10">
                                
                                <span class="absolute top-1/2 left-2 transform -translate-y-1/2 -rotate-90 text-[10px] font-bold text-gray-500 origin-center tracking-widest uppercase whitespace-nowrap">Nilai Ujian &rarr;</span>
                                <span class="absolute bottom-1 left-1/2 transform -translate-x-1/2 text-[10px] font-bold text-gray-500 tracking-widest uppercase whitespace-nowrap">Jam Belajar (Minggu) &rarr;</span>

                                <div class="absolute top-8 bottom-10 left-3 w-8 flex flex-col justify-between items-end text-[10px] font-mono text-gray-500 font-bold z-0 pointer-events-none">
                                    <span class="-translate-y-1/2">100</span>
                                    <span class="-translate-y-1/2">75</span>
                                    <span class="-translate-y-1/2">50</span>
                                    <span class="-translate-y-1/2">25</span>
                                    <span class="translate-y-1/2">0</span>
                                </div>

                                <div class="absolute bottom-5 left-14 right-8 flex justify-between text-[10px] font-mono text-gray-500 font-bold z-0 pointer-events-none">
                                    <span class="-ml-1">0</span>
                                    <span>5</span>
                                    <span>10</span>
                                    <span>15</span>
                                    <span class="-mr-2">20</span>
                                </div>

                                <div class="absolute top-8 bottom-10 left-14 right-8 border-b-2 border-l-2 border-gray-400 opacity-50 z-0 flex flex-col justify-between">
                                    <div class="w-full border-t border-dashed border-gray-400 h-0"></div>
                                    <div class="w-full border-t border-dashed border-gray-300 h-0"></div>
                                    <div class="w-full border-t border-dashed border-gray-300 h-0"></div>
                                    <div class="w-full border-t border-dashed border-gray-300 h-0"></div>
                                    <div class="w-full h-0"></div>
                                </div>
                                
                                <div id="radarCanvas" class="absolute top-8 bottom-10 left-14 right-8 z-10">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <script>
                    const radarCanvas = document.getElementById('radarCanvas');
                    const maxX = 20; 
                    const maxY = 100; 
                    
                    const normalPoints = [
                        [2, 35], [3, 42], [4, 45], [5, 48], [5, 52], [6, 50], [7, 58], [8, 55], 
                        [9, 62], [10, 65], [10, 60], [11, 70], [12, 72], [13, 75], [14, 78], [15, 82], 
                        [16, 85], [18, 92], [3, 38], [6, 55], [8, 62], [11, 68], [14, 80], [17, 88], [19, 95]
                    ];

                    function drawBasePoints() {
                        radarCanvas.innerHTML = ''; 
                        normalPoints.forEach(function(pt) {
                            let dot = document.createElement('div');
                            // Menambahkan -ml-[6px] -mb-[6px] agar titik jatuh persis di tengah koordinat
                            dot.className = 'absolute w-3 h-3 bg-blue-600 rounded-full shadow-sm opacity-80 -ml-[6px] -mb-[6px]';
                            dot.style.left = (pt[0] / maxX * 100) + '%';
                            dot.style.bottom = (pt[1] / maxY * 100) + '%';
                            radarCanvas.appendChild(dot);
                        });
                    }

                    function plotNewData() {
                        let x = parseFloat(document.getElementById('inputX').value);
                        let y = parseFloat(document.getElementById('inputY').value);
                        let resBox = document.getElementById('radarResult');

                        if (isNaN(x) || isNaN(y) || x < 0 || y < 0) {
                            resBox.className = "mt-4 p-3 rounded-xl border border-yellow-500 bg-yellow-900/30 text-yellow-400 text-center font-bold text-xs animate-pulse";
                            resBox.innerText = "⚠️ Masukkan angka yang valid!";
                            resBox.classList.remove('hidden');
                            return;
                        }

                        if(x > maxX) x = maxX;
                        if(y > maxY) y = maxY;

                        drawBasePoints(); 

                        let newDot = document.createElement('div');
                        
                        let expectedMin = (x * 3.5) + 15;
                        let expectedMax = (x * 3.5) + 45;
                        
                        let isOutlier = false;
                        if (y > expectedMax || y < expectedMin) {
                            isOutlier = true;
                        }

                        if (x <= 4 && y >= 85) isOutlier = true; 
                        if (x >= 15 && y <= 40) isOutlier = true; 

                        if (isOutlier) {
                            // Menambahkan -ml-[8px] -mb-[8px] untuk titik ukuran 16px (w-4 h-4)
                            newDot.className = 'absolute w-4 h-4 bg-red-500 rounded-full border-2 border-white shadow-[0_0_15px_rgba(239,68,68,1)] z-20 animate-bounce -ml-[8px] -mb-[8px]';
                            resBox.className = "mt-4 p-3 rounded-xl border border-red-500 bg-red-900/30 text-red-400 text-center font-bold text-sm shadow-inner";
                            resBox.innerHTML = "🚨 OUTLIER TERDETEKSI!<br><span class='text-xs font-normal text-gray-300'>Data siswa sangat tidak wajar.</span>";
                        } else {
                            newDot.className = 'absolute w-4 h-4 bg-green-500 rounded-full border-2 border-white shadow-[0_0_15px_rgba(34,197,94,1)] z-20 animate-pulse -ml-[8px] -mb-[8px]';
                            resBox.className = "mt-4 p-3 rounded-xl border border-green-500 bg-green-900/30 text-green-400 text-center font-bold text-sm shadow-inner";
                            resBox.innerHTML = "✅ DATA NORMAL<br><span class='text-xs font-normal text-gray-300'>Nilai wajar sesuai jam belajar.</span>";
                        }

                        newDot.style.left = (x / maxX * 100) + '%';
                        newDot.style.bottom = (y / maxY * 100) + '%';
                        radarCanvas.appendChild(newDot);
                        resBox.classList.remove('hidden');
                    }

                    document.addEventListener('DOMContentLoaded', drawBasePoints);
                </script>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-indigo-400 mb-6 text-outline-sm flex items-center gap-3">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(79,70,229,0.8)]">🧠</span>
                        E. Praktikum Web: Pengenalan Clustering (Pengelompokan)
                    </h3>
                    <p class="text-gray-300 mb-8 leading-relaxed text-base">
                        Dalam analisis data modern, <em>Scatter Plot</em> adalah pondasi utama dari ilmu <em>Machine Learning</em>. Mari kita praktikkan alur kerja (<em>workflow</em>) sebuah AI saat membaca dan mengelompokkan kebiasaan siswa menggunakan simulator di bawah ini:
                    </p>

                    <div class="bg-[#0f172a] rounded-3xl border border-gray-700 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex flex-col md:flex-row relative select-none min-h-[500px]">
                        
                        <div class="w-full md:w-1/3 bg-gradient-to-b from-gray-800 to-[#1e293b] border-r border-gray-700 p-6 flex flex-col z-20">
                            <div class="uppercase tracking-widest text-[10px] text-blue-400 font-bold mb-4 drop-shadow-md">Tugas Praktikum</div>
                            
                            <div id="simInstruction" class="text-white font-bold text-lg mb-8 leading-snug animate-pulse drop-shadow-md border-l-4 border-blue-500 pl-4 py-1">
                                1. Klik tombol <span class="text-blue-400">Muat Data</span> di bawah untuk memasukkan dataset data_siswa.csv.
                            </div>

                            <div class="uppercase tracking-widest text-[10px] text-blue-400 font-bold mb-3 drop-shadow-md">Langkah Simulasi</div>
                            <div class="flex flex-col gap-3">
                                <button id="btnSimFile" onclick="simAddFile()" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white py-3 px-4 rounded-xl font-bold text-sm shadow-[0_0_15px_rgba(59,130,246,0.4)] active:scale-95 transition-all flex items-center gap-3 border border-blue-400/50">
                                    <span class="text-xl">📁</span> 1. Muat Data
                                </button>
                                <button id="btnSimConnect" onclick="simConnectNodes()" disabled class="bg-gray-800 text-gray-500 py-3 px-4 rounded-xl font-bold text-sm flex items-center gap-3 border border-gray-700 transition-all opacity-50 cursor-not-allowed">
                                    <span class="text-xl">🔗</span> 2. Sambungkan Node
                                </button>
                                <button id="btnSimScatter" onclick="simOpenResult()" disabled class="bg-gray-800 text-gray-500 py-3 px-4 rounded-xl font-bold text-sm flex items-center gap-3 border border-gray-700 transition-all opacity-50 cursor-not-allowed">
                                    <span class="text-xl">🌌</span> 3. Analisis Visual
                                </button>
                            </div>
                        </div>

                        <div class="w-full md:w-2/3 relative bg-[radial-gradient(#374151_1px,transparent_1px)] [background-size:20px_20px] bg-[#0b0f19] overflow-hidden flex items-center justify-center p-8">
                            
                            <div class="relative w-full max-w-[400px] h-[100px] flex items-center justify-between">
                                
                                <div id="nodeSimFile" class="absolute left-0 z-10 bg-gray-800 text-white font-bold py-4 px-6 rounded-2xl shadow-xl border border-gray-600 flex flex-col items-center gap-1 scale-0 transition-transform duration-500">
                                    <div class="flex items-center gap-2"><span class="text-2xl">📁</span> <span class="tracking-wide">File</span></div>
                                    <div class="text-[10px] text-blue-400 text-center font-mono mt-1 bg-black/50 px-2 py-0.5 rounded">data_siswa.csv</div>
                                </div>

                                <div id="nodeSimLine" class="absolute left-[120px] right-[140px] h-2 bg-gray-700 rounded-full transition-all duration-500 opacity-0 z-0"></div>

                                <div id="nodeSimScatter" class="absolute right-0 z-10 bg-gray-800 text-white font-bold py-4 px-6 rounded-2xl shadow-xl border border-gray-600 flex flex-col items-center gap-1 scale-0 transition-transform duration-500">
                                    <div class="flex items-center gap-2"><span class="text-2xl">🌌</span> <span class="tracking-wide">Scatter Plot</span></div>
                                    <div id="simScatterHint" class="text-[9px] text-green-400 text-center font-bold mt-1 bg-green-900/30 px-2 py-0.5 rounded hidden animate-pulse border border-green-500/30">Siap Diakses!</div>
                                </div>

                            </div>
                        </div>
                        
                        <div id="simModal" class="absolute inset-0 bg-black/90 backdrop-blur-md z-50 hidden flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-500">
            
                            <div class="bg-gray-900 p-0 rounded-3xl w-full max-w-5xl max-h-[90vh] overflow-y-auto shadow-2xl transform scale-95 transition-transform duration-500 flex flex-col border border-gray-700" id="simModalContent">
                                
                                <div class="bg-black/50 flex justify-between items-center px-6 py-4 border-b border-gray-700 sticky top-0 z-20">
                                    <h4 class="font-bold text-white flex items-center gap-3 text-lg"><span class="text-2xl">🌌</span> Analisis Visual: Data Kebiasaan Siswa</h4>
                                    <button onclick="simReset()" class="text-gray-500 hover:text-red-500 text-2xl font-black leading-none transition-colors">&times;</button>
                                </div>
                                
                                <div class="flex flex-col md:flex-row h-full">
                                    
                                    <div class="w-full md:w-1/3 bg-gray-800/50 border-r border-gray-700 p-5 flex flex-col gap-4">
                                        <div>
                                            <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block mb-2">Sumbu X (Horizontal):</label>
                                            <div class="w-full border border-gray-600 p-3 rounded-lg text-sm text-gray-300 font-mono bg-black/40">Waktu Main Game (Jam)</div>
                                        </div>
                                        <div>
                                            <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block mb-2">Sumbu Y (Vertikal):</label>
                                            <div class="w-full border border-gray-600 p-3 rounded-lg text-sm text-gray-300 font-mono bg-black/40">Rata-rata Nilai Ujian</div>
                                        </div>
                                        
                                        <div class="mt-auto bg-gradient-to-br from-indigo-900/40 to-blue-900/40 border border-blue-500/30 p-4 rounded-2xl shadow-inner relative overflow-hidden">
                                            <div class="absolute -right-4 -top-4 text-5xl opacity-10">🤖</div>
                                            <h5 class="text-sm font-black text-blue-400 mb-2">Langkah 4: Misi Keajaiban AI</h5>
                                            <label class="flex items-start gap-3 cursor-pointer group">
                                                <input type="checkbox" id="checkColor" onchange="simToggleColor()" class="mt-1 w-5 h-5 text-blue-600 rounded bg-gray-900 border-gray-600 focus:ring-blue-500 focus:ring-2 cursor-pointer shrink-0">
                                                <div>
                                                    <span class="text-sm font-bold text-white group-hover:text-blue-300 transition-colors block mb-1">Warnai Berdasarkan Gaya Belajar</span>
                                                    <p class="text-[10px] text-gray-400 leading-relaxed">Centang ini untuk melihat bagaimana AI memisahkan titik abu-abu menjadi 3 kelompok (Cluster) gaya belajar!</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="w-full md:w-2/3 p-5 md:p-8 relative flex flex-col items-center justify-center bg-[#0b0f19]">
                                        
                                        <div class="relative w-full h-[320px] bg-gray-900/80 rounded-xl border border-gray-700 shadow-inner mb-6">
                                            
                                            <span class="absolute top-1/2 left-2 transform -translate-y-1/2 -rotate-90 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Nilai Ujian &rarr;</span>
                                            <span class="absolute bottom-1 left-1/2 transform -translate-x-1/2 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Waktu Main Game (Jam) &rarr;</span>

                                            <div class="absolute top-6 bottom-10 left-6 w-6 flex flex-col justify-between items-end text-[10px] font-mono text-gray-400">
                                                <span class="-translate-y-1/2">100</span>
                                                <span class="-translate-y-1/2">75</span>
                                                <span class="-translate-y-1/2">50</span>
                                                <span class="-translate-y-1/2">25</span>
                                                <span class="translate-y-1/2">0</span>
                                            </div>

                                            <div class="absolute bottom-5 left-16 right-8 flex justify-between text-[10px] font-mono text-gray-400">
                                                <span class="-ml-1">0</span>
                                                <span>10</span>
                                                <span>20</span>
                                                <span>30</span>
                                                <span class="-mr-2">40</span>
                                            </div>

                                            <div class="absolute top-6 bottom-10 left-16 right-8 border-b-2 border-l-2 border-gray-500">
                                                <div class="absolute inset-0 flex flex-col justify-between opacity-20 pointer-events-none">
                                                    <div class="border-t border-dashed border-gray-400 w-full h-0"></div>
                                                    <div class="border-t border-dashed border-gray-400 w-full h-0"></div>
                                                    <div class="border-t border-dashed border-gray-400 w-full h-0"></div>
                                                    <div class="border-t border-dashed border-gray-400 w-full h-0"></div>
                                                </div>

                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 85%; left: 12%;" data-color="bg-blue-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 92%; left: 18%;" data-color="bg-blue-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 78%; left: 22%;" data-color="bg-blue-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 88%; left: 8%;" data-color="bg-blue-500"></div>

                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 50%; left: 45%;" data-color="bg-green-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 58%; left: 52%;" data-color="bg-green-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 42%; left: 48%;" data-color="bg-green-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 55%; left: 58%;" data-color="bg-green-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 45%; left: 62%;" data-color="bg-green-500"></div>

                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 25%; left: 82%;" data-color="bg-red-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 18%; left: 78%;" data-color="bg-red-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 30%; left: 88%;" data-color="bg-red-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 12%; left: 95%;" data-color="bg-red-500"></div>
                                                <div class="sim-dot absolute w-4 h-4 rounded-full shadow-md bg-gray-500 transition-all duration-700 ease-in-out -ml-[8px] -mb-[8px]" style="bottom: 20%; left: 90%;" data-color="bg-red-500"></div>
                                            </div>
                                        </div>
                                        
                                        <div id="simSuccessMsg" class="hidden w-full bg-green-900/30 border border-green-500/50 p-4 rounded-2xl text-center animate-fade-in shadow-lg shrink-0">
                                            <strong class="text-green-400 text-sm block mb-1">🎉 Aha! Cluster Terbentuk Secara Alami!</strong>
                                            <p class="text-xs text-gray-300">Sistem AI membedakan siswa menjadi 3 kelompok: <strong>Fokus Akademik</strong> (Biru), <strong>Seimbang</strong> (Hijau), dan <strong>Gamer</strong> (Merah). Inilah cikal bakal algoritma <em>Clustering</em>!</p>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="bg-gray-800 px-6 py-4 border-t border-gray-700 flex justify-end sticky bottom-0 z-20">
                                    <button onclick="simReset()" class="bg-gray-600 hover:bg-gray-500 text-white font-bold py-2.5 px-8 rounded-xl shadow transition-colors text-sm">
                                        Selesai & Tutup Praktikum
                                    </button>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    let simStep = 1;

                    function simAddFile() {
                        if(simStep !== 1) return;
                        
                        document.getElementById('nodeSimFile').classList.replace('scale-0', 'scale-100');
                        document.getElementById('nodeSimFile').classList.replace('bg-gray-800', 'bg-blue-900');
                        document.getElementById('nodeSimFile').classList.replace('border-gray-600', 'border-blue-500');
                        
                        let btnFile = document.getElementById('btnSimFile');
                        btnFile.className = "bg-gray-800 text-gray-500 py-3 px-4 rounded-xl font-bold text-sm flex items-center gap-3 border border-gray-700 opacity-50 cursor-not-allowed";
                        
                        let btnConnect = document.getElementById('btnSimConnect');
                        btnConnect.className = "bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white py-3 px-4 rounded-xl font-bold text-sm shadow-[0_0_15px_rgba(59,130,246,0.4)] active:scale-95 transition-all flex items-center gap-3 border border-blue-400/50 cursor-pointer";
                        btnConnect.removeAttribute('disabled');

                        document.getElementById('simInstruction').innerHTML = '2. Bagus! Data dimuat. Klik <span class="text-blue-400">Sambungkan Node</span> untuk memunculkan grafik.';
                        simStep = 2;
                    }

                    function simConnectNodes() {
                        if(simStep !== 2) return;
                        
                        document.getElementById('nodeSimScatter').classList.replace('scale-0', 'scale-100');
                        
                        let line = document.getElementById('nodeSimLine');
                        line.classList.remove('opacity-0');
                        line.classList.add('opacity-100', 'bg-blue-500', 'shadow-[0_0_10px_rgba(59,130,246,0.8)]');

                        let btnConnect = document.getElementById('btnSimConnect');
                        btnConnect.className = "bg-gray-800 text-gray-500 py-3 px-4 rounded-xl font-bold text-sm flex items-center gap-3 border border-gray-700 opacity-50 cursor-not-allowed";

                        let btnScatter = document.getElementById('btnSimScatter');
                        btnScatter.className = "bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white py-3 px-4 rounded-xl font-bold text-sm shadow-[0_0_15px_rgba(59,130,246,0.4)] active:scale-95 transition-all flex items-center gap-3 border border-blue-400/50 cursor-pointer";
                        btnScatter.removeAttribute('disabled');

                        document.getElementById('simInstruction').innerHTML = '3. Terhubung! Klik <span class="text-green-400">Analisis Visual</span> untuk membuka panel Scatter Plot.';
                        simStep = 3;
                    }

                    function simOpenResult() {
                        if(simStep !== 3) return;
                        
                        let modal = document.getElementById('simModal');
                        let modalContent = document.getElementById('simModalContent');
                        
                        // Reset checkbox
                        document.getElementById('checkColor').checked = false;
                        document.querySelectorAll('.sim-dot').forEach(function(el) {
                            el.className = "sim-dot absolute w-3 h-3 rounded-full shadow-md bg-gray-400 transition-all duration-700 ease-in-out";
                            el.style.transform = "scale(1)";
                        });
                        document.getElementById('simSuccessMsg').classList.add('hidden');
                        
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        setTimeout(function() {
                            modal.classList.remove('opacity-0');
                            modal.classList.add('opacity-100');
                            modalContent.classList.replace('scale-95', 'scale-100');
                        }, 50);

                        document.getElementById('simInstruction').innerHTML = '<span class="text-green-400">🎉 Misi Terakhir!</span> Centang kotak Pewarnaan di dalam panel grafik untuk melihat keajaiban Pengelompokan.';
                        simStep = 4;
                    }
                    
                    function simToggleColor() {
                        let isChecked = document.getElementById('checkColor').checked;
                        let dots = document.querySelectorAll('.sim-dot');
                        let msg = document.getElementById('simSuccessMsg');
                        
                        if(isChecked) {
                            dots.forEach(function(el) {
                                // PERBAIKAN: Hapus warna abu-abu DULU secara eksplisit
                                el.classList.remove('bg-gray-500', 'bg-gray-400'); 
                                
                                // Baru tambahkan warna dari data-color (Biru, Hijau, Merah)
                                el.classList.add(el.getAttribute('data-color'));
                                
                                el.style.transform = "scale(1.3)"; // Membesar agar dramatis
                                el.classList.add('shadow-[0_0_12px_currentColor]', 'z-10'); // Tambah efek cahaya & z-index
                            });
                            msg.classList.remove('hidden');
                        } else {
                            dots.forEach(function(el) {
                                // Saat tidak dicentang, hapus warna warninya
                                el.classList.remove('bg-blue-500', 'bg-green-500', 'bg-red-500', 'shadow-[0_0_12px_currentColor]', 'z-10');
                                
                                // Kembalikan ke warna awal abu-abu
                                el.classList.add('bg-gray-500');
                                
                                el.style.transform = "scale(1)";
                            });
                            msg.classList.add('hidden');
                        }
                    }

                    function simReset() {
                        let modal = document.getElementById('simModal');
                        modal.classList.add('opacity-0');
                        
                        setTimeout(function() {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                        }, 500);
                        
                        // Reset UI
                        document.getElementById('nodeSimFile').className = "absolute left-0 z-10 bg-gray-800 text-white font-bold py-4 px-6 rounded-2xl shadow-xl border border-gray-600 flex flex-col items-center gap-1 scale-0 transition-transform duration-500";
                        document.getElementById('nodeSimScatter').className = "absolute right-0 z-10 bg-gray-800 text-white font-bold py-4 px-6 rounded-2xl shadow-xl border border-gray-600 flex flex-col items-center gap-1 scale-0 transition-transform duration-500";
                        
                        let line = document.getElementById('nodeSimLine');
                        line.className = "absolute left-[120px] right-[140px] h-2 bg-gray-700 rounded-full transition-all duration-500 opacity-0 z-0";

                        let btnFile = document.getElementById('btnSimFile');
                        btnFile.className = "bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white py-3 px-4 rounded-xl font-bold text-sm shadow-[0_0_15px_rgba(59,130,246,0.4)] active:scale-95 transition-all flex items-center gap-3 border border-blue-400/50 cursor-pointer";
                        btnFile.removeAttribute('disabled');
                        
                        let btnConnect = document.getElementById('btnSimConnect');
                        btnConnect.className = "bg-gray-800 text-gray-500 py-3 px-4 rounded-xl font-bold text-sm flex items-center gap-3 border border-gray-700 transition-all opacity-50 cursor-not-allowed";
                        btnConnect.setAttribute('disabled', 'true');

                        let btnScatter = document.getElementById('btnSimScatter');
                        btnScatter.className = "bg-gray-800 text-gray-500 py-3 px-4 rounded-xl font-bold text-sm flex items-center gap-3 border border-gray-700 transition-all opacity-50 cursor-not-allowed";
                        btnScatter.setAttribute('disabled', 'true');

                        document.getElementById('simInstruction').innerHTML = '1. Klik tombol <span class="text-blue-400">Muat Data</span> di bawah untuk memasukkan dataset data_siswa.csv.';
                        simStep = 1;
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
                    data-question="Fungsi utama dari grafik Scatter Plot (Diagram Pencar) adalah..."
                    data-opt-a="Menampilkan persentase atau proporsi dari suatu total (part-to-whole)."
                    data-opt-b="Mendeteksi nilai outlier pada data kategori."
                    data-opt-c="Menemukan hubungan atau korelasi antara dua variabel numerik (angka)."
                    data-opt-d="Membuat grafik animasi 3D."
                    data-opt-e="Menunjukkan urutan kejadian atau tren berdasarkan pergerakan waktu."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada grafik Scatter Plot, jika titik-titik bergerak ke arah 'X Naik, Y ikut Naik' (membentuk garis menanjak dari kiri bawah ke kanan atas), maka hubungan ini disebut..."
                    data-opt-a="Korelasi Negatif"
                    data-opt-b="Korelasi Positif"
                    data-opt-c="Korelasi Nihil (Acak)"
                    data-opt-d="Outlier"
                    data-opt-e="Korelasi Konstan"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Hubungan antara 'Usia Mobil' (X) dan 'Harga Jual Mobil' (Y) biasanya memiliki arah korelasi..."
                    data-opt-a="Korelasi Positif Sempurna (+1)"
                    data-opt-b="Korelasi Negatif, karena semakin tua mobil, harganya semakin turun."
                    data-opt-c="Korelasi Nihil, karena usia mobil tidak memengaruhi harga."
                    data-opt-d="Membentuk pola huruf U"
                    data-opt-e="Korelasi Konstan, karena harga mobil selalu stabil setiap tahun."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Jika hasil pengukuran Pearson Correlation (r) menunjukkan angka yang mendekati 0 (nol), apa arti dari angka tersebut?"
                    data-opt-a="Data tersebut sangat berhubungan kuat."
                    data-opt-b="Tidak ada korelasi antar variabel (titik menyebar secara acak)."
                    data-opt-c="Ada korelasi negatif yang kuat."
                    data-opt-d="Komputer mengalami error perhitungan."
                    data-opt-e="Terdapat korelasi positif sempurna antara kedua variabel."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan Praktikum DataViz Studio yang telah disimulasikan, bagaimana cara kita bisa melihat pengelompokan (Clustering) dari berbagai spesies bunga di dalam Scatter Plot?"
                    data-opt-a="Dengan mengubah skala sumbu X dan Y."
                    data-opt-b="Dengan menarik garis manual di antara titik-titik."
                    data-opt-c="Dengan mencentang fitur 'Warnai Berdasarkan Spesies' untuk memunculkan warna pada titik."
                    data-opt-d="Dengan menghapus data outlier."
                    data-opt-e="Dengan mengubah tipe grafik dari Scatter Plot menjadi Diagram Lingkaran."
                    data-answer="C">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'scatter-plot-korelasi'],
            [
                'chapter_id' => $chapterId,
                'title' => 'Scatter Plot & Korelasi',
                'type' => 'text',
                'sequence' => 7,
                'min_level' => 7,
                'content' => $content,
            ]
        );

        $this->command->info('Materi Scatter Plot berhasil diperbarui dengan Multi-Quiz!');
    }
}