<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_01_DiagramBatangSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 2)->value('id');

        if (!$chapterId) {
            $this->command->info('Bab 2 belum dibuat!');
            return;
        }

        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">

                <div class="mb-12 bg-gradient-to-r from-emerald-900/40 to-slate-900/40 border-l-4 border-emerald-500 p-6 md:p-8 rounded-r-2xl shadow-[0_5px_20px_rgba(16,185,129,0.15)] relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-8xl opacity-10 rotate-12">🎯</div>
                    <h3 class="text-xl md:text-2xl font-black text-emerald-400 mb-5 flex items-center gap-3">
                        <span class="p-2 bg-emerald-500/20 rounded-lg text-emerald-300 shadow-inner">🎯</span> 
                        Tujuan Pembelajaran Bab 2
                    </h3>
                    <ul class="space-y-4 text-gray-200">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">1</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>menganalisis fungsi dan membedakan kegunaan berbagai jenis visualisasi data</strong> (Bar Chart, Histogram, Box Plot, dan Scatter Plot) berdasarkan karakteristik datanya (kategorikal atau numerik) agar proses penyajian informasi menjadi lebih efektif dan efisien.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">2</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>membuat serta menginterpretasikan representasi visual data yang akurat</strong> untuk mengungkap distribusi, pola, tren, korelasi (hubungan), maupun pencilan (outlier) dari suatu himpunan data, sebagai landasan objektif dalam pengambilan keputusan dan prediksi yang optimal.</p>
                        </li>
                    </ul>
                </div>

                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none transition-opacity group-hover:opacity-0">
                            <span class="text-red-500 animate-pulse">●</span> PENGANTAR VISUALISASI
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/Kmp3sZ2tqJw?rel=0&modestbranding=1" 
                                title="Video Pengantar Diagram Batang" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas sebelum mulai menyelami materi!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-blue-900 p-8 rounded-3xl border border-indigo-500 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 text-9xl opacity-10">📊</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-4 relative z-10">
                        a. Definisi dan Konsep Dasar
                    </h3>
                    
                    <p class="text-lg leading-relaxed text-gray-200 relative z-10 font-medium mb-6">
                        <strong>Diagram Batang</strong> (<em>Bar Chart</em>) adalah metode visualisasi klasik yang memetakan <strong class="text-yellow-300">Data Kategori</strong> ke dalam bentuk batang persegi panjang. Panjang batang tersebut merepresentasikan jumlah atau frekuensi data.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                        <div class="bg-black/30 p-5 rounded-2xl border border-white/10 backdrop-blur-sm">
                            <h4 class="text-yellow-400 font-bold mb-2 flex items-center gap-2"><span>📏</span> Mapping Visual</h4>
                            <p class="text-sm text-gray-300 leading-relaxed">
                                Menurut buku <em>Fundamentals of Data Handling</em>, otak kita sangat cepat membandingkan <strong>panjang (length)</strong>. Diagram batang memanfaatkan hal ini untuk memudahkan kita melihat kategori mana yang terbesar atau terkecil.
                            </p>
                        </div>
                        <div class="bg-black/30 p-5 rounded-2xl border border-white/10 backdrop-blur-sm">
                            <h4 class="text-yellow-400 font-bold mb-2 flex items-center gap-2"><span>🪟</span> Kunci Perbedaan</h4>
                            <p class="text-sm text-gray-300 leading-relaxed">
                                Selalu ada <strong>celah (gap)</strong> antar batang. Celah ini menandakan bahwa datanya bersifat Kualitatif/Diskret (terpisah). Contoh: Kategori "Apel" jelas terpisah dari "Jeruk".
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 bg-[#0f1115] p-8 rounded-3xl border-2 border-gray-700 shadow-2xl">
                    <h3 class="text-3xl font-black text-center mb-8 text-white text-outline">b. Anatomi Diagram Batang</h3>
                    
                    <div class="flex flex-col lg:flex-row gap-8 items-center">
                        <div class="w-full lg:w-1/2 bg-gray-800 p-4 rounded-xl border border-gray-600 shadow-inner relative">
                            <div class="absolute top-2 left-2 flex gap-1">
                                <div class="w-2 h-2 rounded-full bg-red-500"></div><div class="w-2 h-2 rounded-full bg-yellow-500"></div><div class="w-2 h-2 rounded-full bg-green-500"></div>
                            </div>
                            <img src="/images/materi/bar_anatomi.png" alt="Anatomi Diagram Batang" class="rounded mt-4 w-full h-auto object-cover" onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400/1e293b/a5b4fc?text=Gambar+Anatomi+Diagram+Batang';">
                        </div>

                        <div class="w-full lg:w-1/2 space-y-4">
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex gap-4 items-start">
                                <div class="bg-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold shrink-0">X</div>
                                <div>
                                    <strong class="text-indigo-300 block text-lg">Sumbu Kategori (X-Axis)</strong>
                                    <p class="text-sm text-gray-400">Tempat menaruh label grup atau kategori data. (Misal: Nama Kelas, Jenis Buah, Merek HP).</p>
                                </div>
                            </div>
                            
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex gap-4 items-start">
                                <div class="bg-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold shrink-0">Y</div>
                                <div>
                                    <strong class="text-indigo-300 block text-lg">Sumbu Nilai (Y-Axis)</strong>
                                    <p class="text-sm text-gray-400">Skala angka yang menunjukkan kuantitas (jumlah/frekuensi) dari setiap kategori.</p>
                                </div>
                            </div>
                            
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex gap-4 items-start">
                                <div class="bg-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold shrink-0">📊</div>
                                <div>
                                    <strong class="text-indigo-300 block text-lg">Batang (The Bars)</strong>
                                    <p class="text-sm text-gray-400">Elemen visual utamanya. <em>Aturan: Lebar setiap batang harus sama</em> agar perbandingan panjangnya adil di mata audiens.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-red-900/80 to-orange-900/80 p-6 rounded-2xl border-l-8 border-red-500 mt-8 shadow-lg">
                        <h4 class="font-black text-xl text-red-400 mb-2 flex items-center gap-2">
                            <span>🚨</span> Aturan Emas: The Principle of Proportional Ink
                        </h4>
                        <p class="text-gray-200 leading-relaxed text-sm">
                            Sumbu nilai (Y-Axis) pada diagram batang <strong>WAJIB DIMULAI DARI ANGKA 0 (NOL)</strong>. Jika grafik dimulai dari angka lain (misal 50), batang yang mewakili nilai 60 akan terlihat dua kali lipat lebih besar dari batang bernilai 55. Ini adalah bentuk <strong>Manipulasi Visual (Visual Lie)</strong> yang melanggar etika penyajian data!
                        </p>
                    </div>
                </div>

                <div class="mt-12">
                    <h3 class="text-3xl font-black text-white text-outline mb-6 text-center">c. Kapan Menggunakan Variasi yang Berbeda?</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-[#1e293b] p-6 rounded-2xl border border-gray-600 shadow-xl hover:-translate-y-2 transition-transform group text-center">
                            <div class="h-32 flex items-end justify-center gap-2 mb-4 border-b border-gray-600 pb-2">
                                <div class="w-8 bg-blue-500 h-16 rounded-t group-hover:h-20 transition-all"></div>
                                <div class="w-8 bg-indigo-500 h-24 rounded-t group-hover:h-28 transition-all"></div>
                                <div class="w-8 bg-purple-500 h-12 rounded-t group-hover:h-16 transition-all"></div>
                            </div>
                            <h4 class="font-bold text-xl text-white mb-2">Vertikal (Column Chart)</h4>
                            <p class="text-sm text-gray-400">
                                Bentuk paling standar. Sangat cocok digunakan jika jumlah kategori sedikit (kurang dari 7) dan label teks kategorinya pendek.
                            </p>
                        </div>

                        <div class="bg-[#1e293b] p-6 rounded-2xl border border-gray-600 shadow-xl hover:-translate-y-2 transition-transform group text-center">
                            <div class="h-32 flex flex-col justify-center gap-2 mb-4 border-l border-gray-600 pl-2">
                                <div class="h-6 bg-teal-500 w-16 rounded-r group-hover:w-20 transition-all"></div>
                                <div class="h-6 bg-emerald-500 w-24 rounded-r group-hover:w-28 transition-all"></div>
                                <div class="h-6 bg-green-500 w-12 rounded-r group-hover:w-16 transition-all"></div>
                            </div>
                            <h4 class="font-bold text-xl text-white mb-2">Horizontal (Bar Chart)</h4>
                            <p class="text-sm text-gray-400">
                                <strong>Wajib digunakan</strong> jika nama label kategori sangat panjang (seperti judul film) atau jumlah kategorinya sangat banyak agar teks tidak bertumpuk.
                            </p>
                        </div>

                        <div class="bg-[#1e293b] p-6 rounded-2xl border border-gray-600 shadow-xl hover:-translate-y-2 transition-transform group text-center">
                            <div class="h-32 flex items-end justify-center gap-4 mb-4 border-b border-gray-600 pb-2">
                                <div class="w-10 flex flex-col justify-end">
                                    <div class="w-full bg-yellow-400 h-8"></div>
                                    <div class="w-full bg-orange-500 h-12 rounded-t"></div>
                                </div>
                                <div class="w-10 flex flex-col justify-end">
                                    <div class="w-full bg-yellow-400 h-12"></div>
                                    <div class="w-full bg-orange-500 h-8 rounded-t"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-xl text-white mb-2">Bertumpuk (Stacked Bar)</h4>
                            <p class="text-sm text-gray-400">
                                Digunakan untuk melihat komposisi (Part-to-Whole). Memperlihatkan total keseluruhan sekaligus membaginya ke dalam sub-kategori.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-[#1a1525] to-[#0f0c16] p-8 rounded-3xl border border-indigo-900/50 shadow-[0_15px_40px_rgba(79,70,229,0.15)] mt-12 relative overflow-hidden">
                    <h3 class="text-3xl font-black text-indigo-400 mb-2 text-outline-sm flex items-center gap-3">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(79,70,229,0.8)]">✨</span>
                        d. DataViz Studio: Visualizer Interaktif
                    </h3>
                    <p class="text-gray-400 mb-6 text-sm">
                        Mari kita coba menganalisis data <strong class="text-white">Ekstrakurikuler SMA</strong>. Ikuti instruksi di layar untuk membangun <em>Workflow</em> pertamamu. Tanpa koding, cukup klik dan sambungkan di dalam studio visualisasi kita!
                    </p>

                    <div class="bg-[#242424] rounded-2xl border border-gray-700 flex flex-col md:flex-row overflow-hidden shadow-inner h-[480px] relative select-none">
                        
                        <div class="w-full md:w-1/3 bg-gradient-to-b from-gray-800 to-gray-900 border-r border-gray-700 p-6 flex flex-col z-20">
                            <div class="uppercase tracking-widest text-[10px] text-blue-300 font-bold mb-4 drop-shadow-md">Tugas Saat Ini</div>
                            
                            <div id="simInstruction" class="text-white font-bold text-lg mb-6 leading-snug animate-pulse drop-shadow-md">
                                1. Klik komponen <span class="text-blue-400">File Data</span> di bawah untuk memuat data <span class="text-yellow-300">data_ekskul.csv</span>.
                            </div>

                            <div class="uppercase tracking-widest text-[10px] text-blue-300 font-bold mb-3 drop-shadow-md">Toolbox (Komponen)</div>
                            <div class="flex flex-col gap-3">
                                <button id="btnSimFile" onclick="simAddFile()" class="bg-white hover:bg-gray-100 text-black py-2 px-4 rounded-full font-bold text-sm shadow-[0_4px_0px_#cbd5e1] active:shadow-none active:translate-y-1 transition-all flex items-center justify-start gap-3 border-2 border-gray-300">
                                    <span class="text-xl">📁</span> File Data
                                </button>
                                <button id="btnSimBar" onclick="simAddBar()" disabled class="bg-gray-600 text-gray-400 py-2 px-4 rounded-full font-bold text-sm flex items-center justify-start gap-3 border-2 border-gray-700 transition-all opacity-50 cursor-not-allowed">
                                    <span class="text-xl">📊</span> Grafik Batang
                                </button>
                            </div>
                        </div>

                        <div class="w-full md:w-2/3 relative bg-[radial-gradient(#374151_1px,transparent_1px)] [background-size:20px_20px] bg-[#1a1a1a] overflow-hidden flex items-center justify-center p-8">
                            
                            <div class="relative w-full max-w-[400px] h-[100px] flex items-center">
                                
                                <div id="nodeFile" class="absolute left-0 z-10 bg-white text-black font-bold py-3 px-6 rounded-full shadow-lg border-2 border-gray-300 flex-col items-center gap-1 scale-0 transition-transform duration-300">
                                    <div class="flex items-center gap-2"><span class="text-xl">📁</span> File Data</div>
                                    <div class="text-[10px] text-blue-600 text-center font-bold mt-1">data_ekskul.csv</div>
                                </div>

                                <div id="nodeLine" onclick="simConnect()" class="absolute left-[130px] right-[130px] h-3 bg-gray-700 rounded-full cursor-pointer hover:bg-indigo-400 border border-gray-600 transition-all duration-300 opacity-0 flex items-center justify-center group z-0">
                                    <span id="lineHint" class="text-[8px] bg-black text-indigo-300 px-2 rounded-full absolute -top-5 opacity-0 group-hover:opacity-100 transition-opacity">Klik Sambungkan</span>
                                </div>

                                <div id="nodeBar" onclick="simOpenResult()" class="absolute right-0 z-10 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold py-3 px-6 rounded-full shadow-lg border-2 border-blue-400 flex-col items-center gap-1 scale-0 transition-transform duration-300 cursor-default">
                                    <div class="flex items-center gap-2"><span class="text-xl">📊</span> Grafik Batang</div>
                                    <div id="barHint" class="text-[9px] text-white/80 text-center font-normal mt-1 hidden animate-pulse">Klik Ganda!</div>
                                </div>

                            </div>
                        </div>
                        
                        <div id="simModal" class="absolute inset-0 bg-black/80 backdrop-blur-sm z-50 hidden flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-500">
                            <div class="bg-white p-5 md:p-6 rounded-2xl w-full max-w-md shadow-2xl transform scale-95 transition-transform duration-500 flex flex-col" id="simModalContent">
                                
                                <div class="flex justify-between items-center border-b border-gray-200 pb-2 mb-2">
                                    <h4 class="font-bold text-gray-800 flex items-center gap-2 text-sm md:text-base"><span>📊</span> Peminat Ekstrakurikuler</h4>
                                    <button onclick="simReset()" class="text-gray-400 hover:text-red-500 text-xl font-black">✖</button>
                                </div>
                                
                                <div class="relative w-full h-40 mt-4 mb-4">
                                    
                                    <div class="absolute inset-0 flex flex-col justify-between pb-5 z-0 pointer-events-none">
                                        <div class="border-t-2 border-dashed border-gray-200 w-full opacity-50"></div>
                                        <div class="border-t-2 border-dashed border-gray-200 w-full opacity-50"></div>
                                        <div class="border-t-2 border-dashed border-gray-200 w-full opacity-50"></div>
                                        <div class="border-t-2 border-gray-400 w-full"></div> 
                                    </div>

                                    <div class="absolute inset-0 flex items-end justify-around pb-5 z-10 px-2">
                                        <div class="relative flex flex-col items-center justify-end w-1/4 h-full group">
                                            <div class="absolute -top-7 bg-blue-100 text-blue-700 text-[10px] font-black px-1.5 py-0.5 rounded shadow opacity-0 group-hover:opacity-100 transition-opacity z-20 whitespace-nowrap pointer-events-none border border-blue-300">45</div>
                                            <div class="w-full max-w-[35px] bg-blue-500 hover:bg-blue-400 rounded-t-sm shadow-md transition-colors cursor-pointer border border-blue-600" style="height: 90%;"></div>
                                        </div>
                                        
                                        <div class="relative flex flex-col items-center justify-end w-1/4 h-full group">
                                            <div class="absolute -top-7 bg-green-100 text-green-700 text-[10px] font-black px-1.5 py-0.5 rounded shadow opacity-0 group-hover:opacity-100 transition-opacity z-20 whitespace-nowrap pointer-events-none border border-green-300">30</div>
                                            <div class="w-full max-w-[35px] bg-green-500 hover:bg-green-400 rounded-t-sm shadow-md transition-colors cursor-pointer border border-green-600" style="height: 60%;"></div>
                                        </div>
                                        
                                        <div class="relative flex flex-col items-center justify-end w-1/4 h-full group">
                                            <div class="absolute -top-7 bg-orange-100 text-orange-700 text-[10px] font-black px-1.5 py-0.5 rounded shadow opacity-0 group-hover:opacity-100 transition-opacity z-20 whitespace-nowrap pointer-events-none border border-orange-300">25</div>
                                            <div class="w-full max-w-[35px] bg-orange-400 hover:bg-orange-300 rounded-t-sm shadow-md transition-colors cursor-pointer border border-orange-500" style="height: 50%;"></div>
                                        </div>
                                        
                                        <div class="relative flex flex-col items-center justify-end w-1/4 h-full group">
                                            <div class="absolute -top-7 bg-purple-100 text-purple-700 text-[10px] font-black px-1.5 py-0.5 rounded shadow opacity-0 group-hover:opacity-100 transition-opacity z-20 whitespace-nowrap pointer-events-none border border-purple-300">35</div>
                                            <div class="w-full max-w-[35px] bg-purple-500 hover:bg-purple-400 rounded-t-sm shadow-md transition-colors cursor-pointer border border-purple-600" style="height: 70%;"></div>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-0 inset-x-0 h-5 flex items-center justify-around px-2 z-10">
                                        <div class="w-1/4 text-center text-[10px] font-bold text-gray-700">Futsal</div>
                                        <div class="w-1/4 text-center text-[10px] font-bold text-gray-700">Pramuka</div>
                                        <div class="w-1/4 text-center text-[10px] font-bold text-gray-700">Basket</div>
                                        <div class="w-1/4 text-center text-[10px] font-bold text-gray-700">PMR</div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-blue-900 to-indigo-900 border border-blue-400 p-3 rounded-xl text-xs text-white mb-4 shadow-lg flex items-start gap-2">
                                    <span class="text-yellow-400 text-base leading-none mt-0.5">💡</span>
                                    <p class="leading-relaxed">
                                        <strong class="text-yellow-400">Insight:</strong> Futsal memiliki peminat terbanyak (Modus).
                                    </p>
                                </div>

                                <button onclick="simReset()" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2.5 rounded-xl shadow-lg transition-transform hover:-translate-y-1 text-sm">
                                    Misi Selesai! Tutup Grafik ✅
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    let simStep = 1;

                    function simAddFile() {
                        if(simStep !== 1) return;
                        
                        document.getElementById('nodeFile').classList.remove('scale-0');
                        document.getElementById('nodeFile').classList.add('scale-100');
                        
                        let btnFile = document.getElementById('btnSimFile');
                        btnFile.classList.add('bg-gray-600', 'text-gray-400', 'border-gray-700', 'opacity-50', 'cursor-not-allowed', 'shadow-none');
                        btnFile.classList.remove('bg-white', 'text-black', 'border-gray-300', 'shadow-[0_4px_0px_#cbd5e1]', 'active:translate-y-1');
                        
                        let btnBar = document.getElementById('btnSimBar');
                        btnBar.classList.remove('bg-gray-600', 'text-gray-400', 'border-gray-700', 'opacity-50', 'cursor-not-allowed', 'disabled');
                        btnBar.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-indigo-600', 'text-white', 'border-blue-400', 'shadow-[0_4px_0px_#3730a3]', 'active:shadow-none', 'active:translate-y-1', 'cursor-pointer');
                        btnBar.removeAttribute('disabled');

                        document.getElementById('simInstruction').innerHTML = '2. Mantap! Data sudah dimuat. Sekarang tambahkan komponen <span class="text-blue-400">Grafik Batang</span>.';
                        simStep = 2;
                    }

                    function simAddBar() {
                        if(simStep !== 2) return;
                        
                        document.getElementById('nodeBar').classList.remove('scale-0');
                        document.getElementById('nodeBar').classList.add('scale-100');
                        
                        let btnBar = document.getElementById('btnSimBar');
                        btnBar.classList.add('bg-gray-600', 'text-gray-400', 'border-gray-700', 'opacity-50', 'cursor-not-allowed', 'shadow-none');
                        btnBar.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-indigo-600', 'text-white', 'border-blue-400', 'shadow-[0_4px_0px_#3730a3]', 'active:translate-y-1');

                        let line = document.getElementById('nodeLine');
                        line.classList.remove('opacity-0');
                        line.classList.add('opacity-100', 'animate-pulse');

                        document.getElementById('simInstruction').innerHTML = '3. Sambungkan datanya! <span class="text-indigo-300">Klik garis abu-abu</span> di tengah untuk mengalirkan data ke grafik.';
                        simStep = 3;
                    }

                    function simConnect() {
                        if(simStep !== 3) return;
                        
                        let line = document.getElementById('nodeLine');
                        line.classList.remove('bg-gray-700', 'animate-pulse');
                        line.classList.add('bg-gradient-to-r', 'from-gray-300', 'to-indigo-500', 'shadow-[0_0_10px_rgba(99,102,241,0.8)]');
                        document.getElementById('lineHint').classList.add('hidden');

                        let nodeBar = document.getElementById('nodeBar');
                        nodeBar.classList.remove('cursor-default');
                        nodeBar.classList.add('cursor-pointer', 'hover:scale-105', 'ring-4', 'ring-white/50');
                        document.getElementById('barHint').classList.remove('hidden');

                        document.getElementById('simInstruction').innerHTML = '4. Data terhubung! <span class="text-green-400">Klik komponen Grafik Batang</span> untuk melihat hasilnya.';
                        simStep = 4;
                    }

                    function simOpenResult() {
                        if(simStep !== 4) return;
                        
                        let modal = document.getElementById('simModal');
                        let modalContent = document.getElementById('simModalContent');
                        
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        setTimeout(() => {
                            modal.classList.remove('opacity-0');
                            modal.classList.add('opacity-100');
                            modalContent.classList.remove('scale-95');
                            modalContent.classList.add('scale-100');
                        }, 50);

                        document.getElementById('simInstruction').innerHTML = '<span class="text-green-400">🎉 Luar Biasa!</span> Kamu berhasil memproses data menjadi visualisasi.';
                        simStep = 5;
                    }

                    function simReset() {
                        let modal = document.getElementById('simModal');
                        modal.classList.add('opacity-0');
                        
                        setTimeout(() => {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                        }, 500);
                        
                        document.getElementById('nodeFile').classList.replace('scale-100', 'scale-0');
                        
                        let nodeBar = document.getElementById('nodeBar');
                        nodeBar.classList.replace('scale-100', 'scale-0');
                        nodeBar.classList.remove('cursor-pointer', 'hover:scale-105', 'ring-4', 'ring-white/50');
                        document.getElementById('barHint').classList.add('hidden');

                        let line = document.getElementById('nodeLine');
                        line.classList.remove('opacity-100', 'bg-gradient-to-r', 'from-gray-300', 'to-indigo-500', 'shadow-[0_0_10px_rgba(99,102,241,0.8)]');
                        line.classList.add('opacity-0', 'bg-gray-700');
                        document.getElementById('lineHint').classList.remove('hidden');

                        let btnFile = document.getElementById('btnSimFile');
                        btnFile.className = "bg-white hover:bg-gray-100 text-black py-2 px-4 rounded-full font-bold text-sm shadow-[0_4px_0px_#cbd5e1] active:shadow-none active:translate-y-1 transition-all flex items-center justify-start gap-3 border-2 border-gray-300";
                        
                        let btnBar = document.getElementById('btnSimBar');
                        btnBar.className = "bg-gray-600 text-gray-400 py-2 px-4 rounded-full font-bold text-sm flex items-center justify-start gap-3 border-2 border-gray-700 transition-all opacity-50 cursor-not-allowed";
                        btnBar.setAttribute('disabled', 'true');

                        document.getElementById('simInstruction').innerHTML = '1. Klik komponen <span class="text-blue-400">File Data</span> di bawah untuk memuat data <span class="text-yellow-300">data_ekskul.csv</span>.';
                        simStep = 1;
                    }
                </script>

                <div class="mt-16 mb-16">
                    <h3 class="text-3xl font-black text-center mb-4 text-white text-outline" style="line-height: 1.5;">💻 Simulasi: Sales Dashboard</h3>
                    <p class="text-center text-gray-400 mb-8 max-w-2xl mx-auto">
                        Ubah angka penjualan (dalam ribuan) di panel kontrol, dan perhatikan bagaimana batang merespons secara otomatis. Bisakah matamu menangkap <strong>Modus (Nilai Tertinggi)</strong> tanpa membaca angkanya?
                    </p>

                    <div class="bg-[#161b22] border border-gray-700 rounded-3xl p-6 shadow-[0_20px_50px_rgba(0,0,0,0.5)] max-w-4xl mx-auto flex flex-col md:flex-row gap-8">
                        
                        <div class="w-full md:w-1/3 bg-gray-900 p-5 rounded-2xl border border-gray-800 flex flex-col justify-center">
                            <h4 class="text-indigo-400 font-bold mb-4 border-b border-gray-800 pb-2 uppercase tracking-widest text-sm">Control Panel</h4>
                            
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-xs mb-1 text-gray-400"><label>Samsung</label> <span id="valDispA" class="font-mono text-blue-400">1200</span></div>
                                    <input type="range" id="valA" min="100" max="2000" value="1200" oninput="updateBar()" class="w-full accent-blue-500">
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs mb-1 text-gray-400"><label>iPhone</label> <span id="valDispB" class="font-mono text-purple-400">1150</span></div>
                                    <input type="range" id="valB" min="100" max="2000" value="1150" oninput="updateBar()" class="w-full accent-purple-500">
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs mb-1 text-gray-400"><label>Xiaomi</label> <span id="valDispC" class="font-mono text-orange-400">800</span></div>
                                    <input type="range" id="valC" min="100" max="2000" value="800" oninput="updateBar()" class="w-full accent-orange-500">
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs mb-1 text-gray-400"><label>Oppo</label> <span id="valDispD" class="font-mono text-green-400">400</span></div>
                                    <input type="range" id="valD" min="100" max="2000" value="400" oninput="updateBar()" class="w-full accent-green-500">
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-2/3 bg-[#0a0c10] rounded-2xl p-6 relative border border-gray-800 shadow-inner flex flex-col">
                            <div class="text-center mb-8">
                                <h4 class="font-bold text-white text-lg">Total Penjualan Smartphone Q1</h4>
                                <p class="text-xs text-gray-500">Nilai dalam ribuan unit</p>
                            </div>
                            
                            <div class="absolute inset-x-6 top-24 bottom-10 flex flex-col justify-between z-0">
                                <div class="w-full border-t border-gray-800 border-dashed"></div>
                                <div class="w-full border-t border-gray-800 border-dashed"></div>
                                <div class="w-full border-t border-gray-800 border-dashed"></div>
                                <div class="w-full border-t border-gray-600"></div> 
                            </div>

                            <div class="flex-1 flex items-end justify-around relative z-10 px-4 h-[250px]">
                                
                                <div class="flex flex-col items-center justify-end w-1/5 h-full group">
                                    <div id="barA" class="w-full bg-gradient-to-t from-blue-900 to-blue-500 rounded-t-sm shadow-[0_0_15px_rgba(59,130,246,0.5)] transition-all duration-[400ms] ease-out relative group-hover:brightness-125" style="height: 60%;">
                                        <span id="labelA" class="absolute -top-7 left-1/2 transform -translate-x-1/2 text-xs font-mono font-bold text-white bg-black/50 px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">1200</span>
                                    </div>
                                    <span class="mt-3 text-xs font-bold text-gray-400">Samsung</span>
                                </div>
                                
                                <div class="flex flex-col items-center justify-end w-1/5 h-full group">
                                    <div id="barB" class="w-full bg-gradient-to-t from-purple-900 to-purple-500 rounded-t-sm shadow-[0_0_15px_rgba(168,85,247,0.5)] transition-all duration-[400ms] ease-out relative group-hover:brightness-125" style="height: 57.5%;">
                                        <span id="labelB" class="absolute -top-7 left-1/2 transform -translate-x-1/2 text-xs font-mono font-bold text-white bg-black/50 px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">1150</span>
                                    </div>
                                    <span class="mt-3 text-xs font-bold text-gray-400">iPhone</span>
                                </div>
                                
                                <div class="flex flex-col items-center justify-end w-1/5 h-full group">
                                    <div id="barC" class="w-full bg-gradient-to-t from-orange-900 to-orange-400 rounded-t-sm shadow-[0_0_15px_rgba(249,115,22,0.5)] transition-all duration-[400ms] ease-out relative group-hover:brightness-125" style="height: 40%;">
                                        <span id="labelC" class="absolute -top-7 left-1/2 transform -translate-x-1/2 text-xs font-mono font-bold text-white bg-black/50 px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">800</span>
                                    </div>
                                    <span class="mt-3 text-xs font-bold text-gray-400">Xiaomi</span>
                                </div>
                                
                                <div class="flex flex-col items-center justify-end w-1/5 h-full group">
                                    <div id="barD" class="w-full bg-gradient-to-t from-green-900 to-green-400 rounded-t-sm shadow-[0_0_15px_rgba(34,197,94,0.5)] transition-all duration-[400ms] ease-out relative group-hover:brightness-125" style="height: 20%;">
                                        <span id="labelD" class="absolute -top-7 left-1/2 transform -translate-x-1/2 text-xs font-mono font-bold text-white bg-black/50 px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">400</span>
                                    </div>
                                    <span class="mt-3 text-xs font-bold text-gray-400">Oppo</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function updateBar() {
                        let a = parseInt(document.getElementById("valA").value);
                        let b = parseInt(document.getElementById("valB").value);
                        let c = parseInt(document.getElementById("valC").value);
                        let d = parseInt(document.getElementById("valD").value);
                        
                        document.getElementById("valDispA").innerText = a;
                        document.getElementById("valDispB").innerText = b;
                        document.getElementById("valDispC").innerText = c;
                        document.getElementById("valDispD").innerText = d;

                        let maxLimit = 2000;

                        document.getElementById("barA").style.height = (a / maxLimit * 100) + "%";
                        document.getElementById("barB").style.height = (b / maxLimit * 100) + "%";
                        document.getElementById("barC").style.height = (c / maxLimit * 100) + "%";
                        document.getElementById("barD").style.height = (d / maxLimit * 100) + "%";

                        document.getElementById("labelA").innerText = a;
                        document.getElementById("labelB").innerText = b;
                        document.getElementById("labelC").innerText = c;
                        document.getElementById("labelD").innerText = d;
                    }
                    
                    document.addEventListener("DOMContentLoaded", function() {
                        updateBar();
                    });
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
                    data-question="Menurut buku 'Fundamentals of Data Handling' yang dikutip pada materi, bagian mana dari visualisasi yang paling mudah dan cepat dibandingkan oleh mata/otak manusia?"
                    data-opt-a="Luas area objek"
                    data-opt-b="Volume ruang 3D"
                    data-opt-c="Panjang (Length) dari sebuah elemen"
                    data-opt-d="Perubahan warna dari terang ke gelap"
                    data-opt-e="Bentuk (Shape) dari sebuah simbol"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada diagram batang yang disajikan dengan benar, mengapa SELALU ada celah (gap) di antara batang-batangnya?"
                    data-opt-a="Untuk menunjukkan bahwa datanya bersifat kuantitatif/kontinu."
                    data-opt-b="Agar grafik terlihat lebih menarik dan estetis."
                    data-opt-c="Untuk menandakan bahwa data yang disajikan bersifat Kualitatif/Diskret (terpisah satu sama lain)."
                    data-opt-d="Untuk menghemat tinta jika grafiknya di-print."
                    data-opt-e="Agar judul kategori di sumbu X memiliki ruang untuk ditulis memanjang."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Apa nama 'Aturan Emas' (Golden Rule) visualisasi yang mewajibkan sumbu nilai (Y-Axis) pada diagram batang harus dimulai dari angka 0 (nol) agar tidak memanipulasi persepsi pembaca?"
                    data-opt-a="The Principle of Data Cleaning"
                    data-opt-b="The Law of Categorical Bar"
                    data-opt-c="The Stacked Bar Theorem"
                    data-opt-d="The Principle of Proportional Ink"
                    data-opt-e="The Rule of Zero Baseline Visualization"
                    data-answer="D">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Jika kamu memiliki data dengan jumlah kategori yang sangat banyak (misal: 30 Provinsi) ATAU teks nama kategorinya sangat panjang (misal: Judul Buku), variasi diagram batang mana yang WAJIB digunakan agar teks labelnya tidak bertumpuk dan mudah dibaca?"
                    data-opt-a="Diagram Batang Vertikal (Column Chart)"
                    data-opt-b="Diagram Batang Horizontal (Bar Chart)"
                    data-opt-c="Diagram Batang Bertumpuk (Stacked Bar)"
                    data-opt-d="Diagram Lingkaran (Pie Chart)"
                    data-opt-e="Diagram Garis (Line Chart)"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan simulasi DataViz Studio interaktif di atas, apa langkah terakhir yang harus dilakukan untuk memunculkan visualisasi grafik dari data .csv?"
                    data-opt-a="Mengetik kode Python untuk plotting grafik."
                    data-opt-b="Mengklik ganda (double-click) pada komponen/node Grafik Batang setelah data dihubungkan."
                    data-opt-c="Mengunggah (upload) manual file Excel ke layar komputer."
                    data-opt-d="Meminta AI Chatbot untuk menggambarkannya."
                    data-opt-e="Menyambungkan node File ke node Internet."
                    data-answer="B">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'konsep-diagram-batang'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Konsep Diagram Batang',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 4,
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Diagram Batang berhasil diperbarui dengan Tujuan Pembelajaran dan Multi-Quiz!');
    }
}