<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_02_JenisDataSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 1)->value('id');

        if (!$chapterId) {
            $this->command->info('Bab 1 belum dibuat!');
            return;
        }

        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">
            
                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none">
                            <span class="text-yellow-400 animate-pulse">●</span> JENIS DATA
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/Jd-B7-mAfCo?rel=0&modestbranding=1" 
                                title="Apa itu Data?" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-indigo-900 to-blue-900 p-8 rounded-3xl border-l-8 border-yellow-400 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 text-9xl opacity-10">🔪</div>
                    
                    <h3 class="text-3xl md:text-4xl font-black text-white text-outline-bold mb-4 relative z-10 py-2" style="line-height: 1.6;">
                        🤔 Mengapa Harus Membedakan Jenis Data?
                    </h3>
                    
                    <p class="text-lg leading-relaxed text-gray-200 relative z-10 font-medium">
                        Sama seperti memasak: Kamu tidak akan memotong daging menggunakan sendok, kan? 
                        Begitu juga dengan data. <strong class="text-yellow-300">Jenis data yang berbeda membutuhkan alat (visualisasi & algoritma) yang berbeda pula.</strong>
                    </p>
                    <ul class="list-disc pl-6 mt-4 space-y-2 text-md text-gray-300 relative z-10">
                        <li>Salah mengenali jenis data = <strong>Informasi menyesatkan (Misleading)</strong>.</li>
                        <li>AI akan error jika kamu memasukkan "Warna Mobil" ke dalam rumus matematika rata-rata.</li>
                    </ul>
                </div>

                <div class="mt-12 bg-[#0f1115] p-8 rounded-3xl border-2 border-gray-700 shadow-2xl">
                    <h3 class="text-3xl font-black text-center mb-8 text-white text-outline">🗺️ Peta Taksonomi Data</h3>
                    
                    <div class="flex flex-col items-center">
                        <div class="bg-gradient-to-b from-gray-700 to-gray-900 text-white px-10 py-4 rounded-xl font-black text-xl shadow-[0_5px_0px_#374151] border border-gray-500 z-10">
                            SEMUA DATA
                        </div>
                        
                        <div class="h-8 w-1 bg-gray-500"></div>
                        <div class="w-full max-w-3xl h-1 bg-gray-500 relative">
                            <div class="absolute left-0 top-0 h-8 w-1 bg-gray-500"></div> 
                            <div class="absolute right-0 top-0 h-8 w-1 bg-gray-500"></div> 
                        </div>

                        <div class="flex justify-between w-full max-w-[50rem] mt-8 gap-4 md:gap-8">
                            
                            <div class="flex-1 flex flex-col items-center w-1/2">
                                <div class="bg-gradient-to-b from-pink-500 to-pink-700 text-white px-4 py-3 rounded-xl font-bold text-center w-full shadow-[0_5px_0px_#be185d] border border-pink-400">
                                    <span class="text-lg">KUALITATIF</span><br>
                                    <span class="text-xs text-pink-200 font-normal tracking-wider uppercase">(Kategorikal / Label)</span>
                                </div>
                                <div class="h-6 w-1 bg-pink-500/50"></div>
                                <div class="w-[80%] h-1 bg-pink-500/50 relative">
                                    <div class="absolute left-0 top-0 h-6 w-1 bg-pink-500/50"></div> <div class="absolute right-0 top-0 h-6 w-1 bg-pink-500/50"></div>
                                </div>
                                
                                <div class="flex gap-2 md:gap-4 w-[90%] mt-6 justify-center">
                                    <div class="bg-[#1e293b] border-2 border-pink-500/50 p-3 rounded-lg text-center w-1/2 shadow-lg">
                                        <strong class="text-pink-400 block mb-1">Nominal</strong>
                                        <span class="text-[10px] text-gray-400">Tanpa Urutan</span>
                                    </div>
                                    <div class="bg-[#1e293b] border-2 border-pink-500/50 p-3 rounded-lg text-center w-1/2 shadow-lg">
                                        <strong class="text-pink-400 block mb-1">Ordinal</strong>
                                        <span class="text-[10px] text-gray-400">Ada Urutan</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-1 flex flex-col items-center w-1/2">
                                <div class="bg-gradient-to-b from-blue-500 to-blue-700 text-white px-4 py-3 rounded-xl font-bold text-center w-full shadow-[0_5px_0px_#1d4ed8] border border-blue-400">
                                    <span class="text-lg">KUANTITATIF</span><br>
                                    <span class="text-xs text-blue-200 font-normal tracking-wider uppercase">(Numerik / Angka)</span>
                                </div>
                                <div class="h-6 w-1 bg-blue-500/50"></div>
                                <div class="w-[80%] h-1 bg-blue-500/50 relative">
                                    <div class="absolute left-0 top-0 h-6 w-1 bg-blue-500/50"></div> <div class="absolute right-0 top-0 h-6 w-1 bg-blue-500/50"></div>
                                </div>
                                
                                <div class="flex gap-2 md:gap-4 w-[90%] mt-6 justify-center">
                                    <div class="bg-[#1e293b] border-2 border-blue-500/50 p-3 rounded-lg text-center w-1/2 shadow-lg">
                                        <strong class="text-blue-400 block mb-1">Diskrit</strong>
                                        <span class="text-[10px] text-gray-400">Hasil Hitung</span>
                                    </div>
                                    <div class="bg-[#1e293b] border-2 border-blue-500/50 p-3 rounded-lg text-center w-1/2 shadow-lg">
                                        <strong class="text-blue-400 block mb-1">Kontinu</strong>
                                        <span class="text-[10px] text-gray-400">Hasil Ukur</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <h3 class="text-3xl font-black text-white text-outline mb-6">Penjelasan Detail & Contoh</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-[#2a1223] to-[#1a0b16] p-6 rounded-2xl border border-pink-900 shadow-lg hover:border-pink-500 transition-colors group">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center text-xl shadow-lg">🏷️</div>
                                    <h4 class="text-2xl font-bold text-pink-400">1. Data Nominal</h4>
                                </div>
                                <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                                    Data berupa kategori atau label murni. <strong class="text-pink-300">Tidak ada tingkatan</strong> atau urutan yang lebih baik di antara label-label tersebut.
                                </p>
                                <div class="bg-black/50 p-4 rounded-xl border border-pink-900/50">
                                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-bold">Contoh dalam AI/Sistem:</p>
                                    <ul class="space-y-2 text-sm text-pink-200">
                                        <li>🔹 <strong>Jenis Kelamin:</strong> Pria, Wanita</li>
                                        <li>🔹 <strong>Warna Baju:</strong> Merah, Biru, Hijau</li>
                                        <li>🔹 <strong>Status Kelulusan:</strong> Lulus, Tidak Lulus</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="bg-gradient-to-br from-[#2a1223] to-[#1a0b16] p-6 rounded-2xl border border-pink-900 shadow-lg hover:border-pink-500 transition-colors group">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center text-xl shadow-lg">🥇</div>
                                    <h4 class="text-2xl font-bold text-pink-400">2. Data Ordinal</h4>
                                </div>
                                <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                                    Mirip nominal, tapi bedanya <strong class="text-pink-300">memiliki tingkatan / urutan / ranking</strong> yang logis (mana yang lebih tinggi/rendah).
                                </p>
                                <div class="bg-black/50 p-4 rounded-xl border border-pink-900/50">
                                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-bold">Contoh dalam AI/Sistem:</p>
                                    <ul class="space-y-2 text-sm text-pink-200">
                                        <li>🔹 <strong>Tingkat Pendidikan:</strong> SD ➜ SMP ➜ SMA</li>
                                        <li>🔹 <strong>Rating Produk:</strong> ⭐ ➜ ⭐⭐⭐ ➜ ⭐⭐⭐⭐⭐</li>
                                        <li>🔹 <strong>Kepuasan Pelanggan:</strong> Buruk ➜ Sedang ➜ Baik</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-[#0c1b33] to-[#060d1a] p-6 rounded-2xl border border-blue-900 shadow-lg hover:border-blue-500 transition-colors group">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-xl shadow-lg">🔢</div>
                                    <h4 class="text-2xl font-bold text-blue-400">3. Data Diskrit</h4>
                                </div>
                                <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                                    Data numerik berupa angka bulat yang didapat dari hasil <strong class="text-blue-300">MENGHITUNG / MENCACAH</strong>. Tidak mungkin berbentuk pecahan/desimal.
                                </p>
                                <div class="bg-black/50 p-4 rounded-xl border border-blue-900/50">
                                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-bold">Contoh dalam AI/Sistem:</p>
                                    <ul class="space-y-2 text-sm text-blue-200">
                                        <li>🔹 <strong>Jumlah Pengunjung Website:</strong> 150 orang <em class="text-gray-500 text-[10px]">(Tidak mungkin 150.5 orang)</em></li>
                                        <li>🔹 <strong>Jumlah Mobil Terjual:</strong> 5 Unit</li>
                                        <li>🔹 <strong>Jumlah Gol Pertandingan:</strong> 3 Gol</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="bg-gradient-to-br from-[#0c1b33] to-[#060d1a] p-6 rounded-2xl border border-blue-900 shadow-lg hover:border-blue-500 transition-colors group">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-xl shadow-lg">📏</div>
                                    <h4 class="text-2xl font-bold text-blue-400">4. Data Kontinu</h4>
                                </div>
                                <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                                    Data numerik yang didapat dari hasil <strong class="text-blue-300">MENGUKUR</strong>. Bisa berbentuk angka desimal atau pecahan dan memiliki rentang yang tak terbatas.
                                </p>
                                <div class="bg-black/50 p-4 rounded-xl border border-blue-900/50">
                                    <p class="text-xs text-gray-400 uppercase tracking-widest mb-2 font-bold">Contoh dalam AI/Sistem:</p>
                                    <ul class="space-y-2 text-sm text-blue-200">
                                        <li>🔹 <strong>Tinggi Badan:</strong> 170.5 cm, 170.52 cm...</li>
                                        <li>🔹 <strong>Suhu Udara IoT:</strong> 36.2°C</li>
                                        <li>🔹 <strong>Kecepatan Kendaraan:</strong> 85.3 km/jam</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-gradient-to-r from-yellow-900/40 to-orange-900/40 p-6 rounded-2xl border border-yellow-500/50 flex gap-6 items-center mt-10 shadow-lg">
                    <div class="text-6xl drop-shadow-[0_0_15px_rgba(250,204,21,0.8)] animate-pulse">💡</div>
                    <div>
                        <h5 class="font-black text-xl text-yellow-400 mb-2">Tips Rahasia Data Scientist</h5>
                        <p class="text-gray-200 leading-relaxed">
                            Buku <em>Fundamentals of Data Handling</em> menyarankan aturan emas ini: <br>
                            Gunakan <strong class="text-white bg-indigo-600/50 px-2 rounded">Diagram Batang (Bar Chart)</strong> untuk melihat data Kategori (Nominal/Ordinal/Diskrit), dan gunakan <strong class="text-white bg-green-600/50 px-2 rounded">Histogram</strong> untuk melihat sebaran data Kontinu (Rentang Nilai).
                        </p>
                    </div>
                </div>

                <div class="mt-16 mb-16">
                    <h3 class="text-3xl font-black text-center mb-8 text-white text-outline">🎮 Uji Cepat: Data Sorter</h3>
                    
                    <div class="bg-[#161b22] border border-gray-600 rounded-3xl p-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] max-w-3xl mx-auto relative overflow-hidden">
                        
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500"></div>

                        <div class="text-center mb-8">
                            <div class="inline-block bg-gray-800 text-gray-300 px-4 py-1 rounded-full text-xs font-bold tracking-widest mb-4 border border-gray-600">
                                DATA KE-<span id="qIdx" class="text-white">1</span> DARI 5
                            </div>
                            <div id="questionBox" class="text-2xl md:text-3xl font-black text-white py-10 px-6 bg-black rounded-2xl border-2 border-dashed border-gray-600 shadow-inner">
                                Loading...
                            </div>
                        </div>

                        <div id="feedback" class="text-center h-10 mb-6 font-bold text-lg transition-all duration-300"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="btnGroup">
                            <button onclick="checkAnswer('nominal')" class="group relative bg-pink-900/30 hover:bg-pink-600 text-pink-300 hover:text-white p-4 rounded-xl border border-pink-700 hover:border-pink-400 font-bold transition-all text-left flex justify-between items-center">
                                <span>Nominal</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">🏷️</span>
                            </button>
                            <button onclick="checkAnswer('ordinal')" class="group relative bg-purple-900/30 hover:bg-purple-600 text-purple-300 hover:text-white p-4 rounded-xl border border-purple-700 hover:border-purple-400 font-bold transition-all text-left flex justify-between items-center">
                                <span>Ordinal</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">🥇</span>
                            </button>
                            <button onclick="checkAnswer('diskrit')" class="group relative bg-blue-900/30 hover:bg-blue-600 text-blue-300 hover:text-white p-4 rounded-xl border border-blue-700 hover:border-blue-400 font-bold transition-all text-left flex justify-between items-center">
                                <span>Diskrit</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">🔢</span>
                            </button>
                            <button onclick="checkAnswer('kontinu')" class="group relative bg-emerald-900/30 hover:bg-emerald-600 text-emerald-300 hover:text-white p-4 rounded-xl border border-emerald-700 hover:border-emerald-400 font-bold transition-all text-left flex justify-between items-center">
                                <span>Kontinu</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">📏</span>
                            </button>
                        </div>

                        <div id="resetBtn" class="hidden mt-8 text-center">
                            <button onclick="resetGame()" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-black px-8 py-4 rounded-full hover:shadow-[0_0_20px_rgba(79,70,229,0.6)] hover:scale-105 transition-all flex items-center justify-center gap-2 mx-auto">
                                <span>🔄</span> MAIN LAGI
                            </button>
                        </div>

                    </div>
                </div>

                <script>
                    const questions = [
                        { text: "Warna Mobil (Merah, Hitam, Putih)", type: "nominal", reason: "Hanya label warna, tidak ada urutan yang lebih tinggi/rendah." },
                        { text: "Tinggi Badan Siswa (165.5 cm)", type: "kontinu", reason: "Hasil pengukuran, bisa berupa desimal (pecahan)." },
                        { text: "Jumlah Gol dalam Pertandingan (3 Gol)", type: "diskrit", reason: "Angka bulat hasil menghitung (tidak mungkin 3.5 gol)." },
                        { text: "Kepuasan Pelanggan (Puas, Netral, Kecewa)", type: "ordinal", reason: "Kategori yang memiliki tingkatan/urutan yang jelas." },
                        { text: "Suhu Ruangan IoT (24.8°C)", type: "kontinu", reason: "Hasil pengukuran sensor suhu, angka kontinu." }
                    ];

                    let currentQ = 0;
                    let score = 0;

                    function loadQuestion() {
                        const qBox = document.getElementById('questionBox');
                        
                        qBox.style.opacity = 0;
                        qBox.style.transform = 'scale(0.95)';
                        
                        setTimeout(() => {
                            if (currentQ < questions.length) {
                                qBox.innerText = questions[currentQ].text;
                                document.getElementById('qIdx').innerText = currentQ + 1;
                                document.getElementById('feedback').innerHTML = "";
                                
                                qBox.style.opacity = 1;
                                qBox.style.transform = 'scale(1)';
                                
                                document.querySelectorAll('#btnGroup button').forEach(btn => btn.disabled = false);
                            } else {
                                qBox.innerHTML = `
                                    <div class="text-4xl mb-4">🏆</div>
                                    <span class='text-green-400'>Mission Complete!</span><br>
                                    <span class="text-gray-400 text-xl font-normal">Skor Ketepatan: \${score} dari 5</span>
                                `;
                                qBox.style.opacity = 1;
                                qBox.style.transform = 'scale(1)';
                                document.getElementById('btnGroup').classList.add('hidden');
                                document.getElementById('resetBtn').classList.remove('hidden');
                                document.getElementById('feedback').innerHTML = "";
                            }
                        }, 300);
                    }

                    function checkAnswer(userChoice) {
                        const correctType = questions[currentQ].type;
                        const feedbackEl = document.getElementById('feedback');
                        
                        document.querySelectorAll('#btnGroup button').forEach(btn => btn.disabled = true);

                        if (userChoice === correctType) {
                            score++;
                            feedbackEl.innerHTML = `<span class="text-green-400 drop-shadow-[0_0_8px_rgba(74,222,128,0.8)]">✅ Tepat Sekali!</span> <span class="text-gray-300 text-sm font-normal block mt-1">\${questions[currentQ].reason}</span>`;
                        } else {
                            feedbackEl.innerHTML = `<span class="text-red-500 drop-shadow-[0_0_8px_rgba(239,68,68,0.8)]">❌ Ups, Salah!</span> <span class="text-gray-300 text-sm font-normal block mt-1">Jawaban yang tepat adalah <strong class="text-white uppercase">\${correctType}</strong>. \${questions[currentQ].reason}</span>`;
                        }

                        currentQ++;
                        setTimeout(loadQuestion, 3500); 
                    }

                    function resetGame() {
                        currentQ = 0;
                        score = 0;
                        document.getElementById('btnGroup').classList.remove('hidden');
                        document.getElementById('resetBtn').classList.add('hidden');
                        loadQuestion();
                    }

                    setTimeout(loadQuestion, 500);
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
                    data-question="Mengapa kita perlu membedakan jenis-jenis data sebelum mengolahnya?"
                    data-opt-a="Agar data terlihat lebih rapi di dalam database."
                    data-opt-b="Karena jenis data yang berbeda membutuhkan alat visualisasi dan algoritma yang berbeda."
                    data-opt-c="Untuk mengurangi kapasitas penyimpanan komputer."
                    data-opt-d="Karena AI hanya bisa membaca data dalam bentuk angka."
                    data-opt-e="Agar tabel data bisa terhapus secara otomatis setelah dianalisis."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Apa perbedaan utama antara Data Kualitatif Nominal dan Ordinal?"
                    data-opt-a="Nominal berbentuk angka, sedangkan Ordinal berbentuk teks."
                    data-opt-b="Nominal tidak memiliki urutan atau tingkatan, sedangkan Ordinal memiliki tingkatan yang logis."
                    data-opt-c="Nominal didapat dari hasil mengukur, sedangkan Ordinal dari hasil menghitung."
                    data-opt-d="Tidak ada bedanya, keduanya adalah hal yang sama."
                    data-opt-e="Nominal digunakan untuk perhitungan matematika kompleks, sedangkan Ordinal hanya untuk teks."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="'Jumlah gol dalam sebuah pertandingan sepak bola adalah 3 gol'. Berdasarkan materi, ini termasuk jenis data apa?"
                    data-opt-a="Kuantitatif Diskrit, karena didapat dari hasil menghitung/mencacah angka bulat."
                    data-opt-b="Kuantitatif Kontinu, karena angkanya bisa berbentuk desimal."
                    data-opt-c="Kualitatif Nominal, karena hanya berupa label."
                    data-opt-d="Kualitatif Ordinal, karena menunjukkan peringkat tim."
                    data-opt-e="Data Campuran, karena menggabungkan teks ('gol') dan angka ('3')."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Data yang didapat dari hasil MENGUKUR dan nilainya bisa berbentuk pecahan atau desimal (seperti Tinggi Badan 170.5 cm) disebut:"
                    data-opt-a="Data Nominal"
                    data-opt-b="Data Ordinal"
                    data-opt-c="Data Diskrit"
                    data-opt-d="Data Kontinu"
                    data-opt-e="Data Sekunder"
                    data-answer="D">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Menurut 'Tips Rahasia Data Scientist' di materi, jenis visualisasi apa yang paling cocok digunakan untuk melihat sebaran Data Kontinu?"
                    data-opt-a="Diagram Lingkaran (Pie Chart)"
                    data-opt-b="Tabel Excel biasa"
                    data-opt-c="Histogram"
                    data-opt-d="Diagram Batang (Bar Chart)"
                    data-opt-e="Diagram Venn (Venn Diagram)"
                    data-answer="C">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'jenis-jenis-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Jenis-Jenis Data',
                'type' => 'text',
                'sequence' => 2,
                'min_level' => 0, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1: Jenis Data berhasil diperbarui!');
    }
}