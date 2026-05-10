<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_01_ApaItuDataSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 1)->value('id');

        if (!$chapterId) {
            $this->command->info('Bab 1 belum dibuat! Pastikan ChapterSeeder sudah dijalankan.');
            return;
        }

        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">

                <div class="mb-12 bg-gradient-to-r from-emerald-900/40 to-slate-900/40 border-l-4 border-emerald-500 p-6 md:p-8 rounded-r-2xl shadow-[0_5px_20px_rgba(16,185,129,0.15)] relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 text-8xl opacity-10 rotate-12">🎯</div>
                    <h3 class="text-xl md:text-2xl font-black text-emerald-400 mb-5 flex items-center gap-3">
                        <span class="p-2 bg-emerald-500/20 rounded-lg text-emerald-300 shadow-inner">🎯</span> 
                        Tujuan Pembelajaran Bab 1
                    </h3>
                    <ul class="space-y-4 text-gray-200">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">1</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>menjelaskan konsep dasar data, membedakan jenis-jenis data</strong> (kualitatif dan kuantitatif), serta mengklasifikasikan struktur data sebagai fondasi pemahaman sebelum memanfaatkan sumber data untuk pengolahan informasi.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-emerald-500/20 text-emerald-400 font-bold rounded-full flex items-center justify-center text-sm border border-emerald-500/30">2</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>menerapkan proses persiapan data</strong> (data preparation) yang mencakup pembersihan data (data cleaning dari duplikasi, missing values, dan outlier) serta pelabelan data (data labeling) pada himpunan data sederhana agar siap diolah untuk keperluan prediksi dan pengambilan keputusan yang efektif oleh sistem/AI.</p>
                        </li>
                    </ul>
                </div>

                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none">
                            <span class="text-yellow-400 animate-pulse">●</span> KONSEP DASAR
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/KuwikrIys5M?rel=0&modestbranding=1" 
                                title="Apa itu Data?" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Simak video ilustrasi singkat tentang data di dunia digital.
                    </p>
                </div>

                <div>
                    <h3 class="text-4xl md:text-5xl font-black text-yellow-400 text-outline-bold mb-6 flex items-center gap-3">
                        1. Apa Itu Data?
                    </h3>
                    
                    <div class="space-y-6">
                        <p class="text-lg md:text-xl leading-relaxed text-gray-200">
                             <strong class="text-yellow-300 text-outline-sm">Data</strong> adalah kumpulan fakta, angka, hasil pengukuran, atau deskripsi dari suatu kejadian yang <em class="text-pink-300">belum diolah</em>. Di dunia digital, data bisa berwujud apa saja: mulai dari teks, angka, foto, hingga rekaman suara.
                        </p>
                        
                        <p class="text-lg leading-relaxed text-gray-200">
                            Coba perhatikan tumpukan teks di bawah ini:
                        </p>
                        
                        <div class="bg-[#0f1115] border-2 border-gray-600 p-6 md:p-8 rounded-2xl shadow-xl relative overflow-hidden flex flex-col justify-center max-w-4xl mx-auto">
                            <div class="absolute top-0 right-0 bg-yellow-500 text-black text-xs font-black px-4 py-1 rounded-bl-xl tracking-wider">RAW DATA</div>
                            
                            <div class="mt-4 p-4 md:p-6 bg-black rounded-lg border border-gray-700">
                                <code class="text-sm md:text-base font-mono text-green-400 break-all leading-relaxed">
                                    > 010101, 34.5, "Budi", 1200, JPG, NULL, "Lulus", 404 Error, 90%, TRUE...
                                </code>
                            </div>
                            
                            <p class="mt-6 text-center text-base font-bold text-gray-400 italic">
                                "Tanpa konteks, data hanyalah tumpukan karakter yang membingungkan."
                            </p>
                        </div>

                        <div class="bg-indigo-900/40 backdrop-blur-md border-l-4 border-yellow-400 p-6 rounded-r-2xl shadow-md mt-6">
                            <h4 class="text-xl font-bold text-yellow-300 mb-3 flex items-center gap-2"><span>💡</span> FAKTA PENTING:</h4>
                            <p class="text-gray-200 leading-relaxed text-base md:text-lg">
                                Angka <strong>34.5</strong> di atas tidak memiliki makna jika kita tidak tahu konteksnya. Apakah itu suhu badan orang sakit? Atau harga barang dalam dolar? Ketika data mentah tersebut diolah dan diberi konteks, barulah ia berubah menjadi sebuah <strong>Informasi</strong>.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-red-600 to-orange-500 p-6 md:p-8 rounded-3xl border-4 border-white shadow-[0_10px_20px_rgba(239,68,68,0.4)] relative overflow-hidden mt-12">
                    <div class="absolute -right-10 -top-10 text-9xl opacity-20">🔥</div>

                    <h3 class="text-3xl font-black text-white text-outline-bold mb-6 relative z-10 flex items-center gap-3">
                        <span>📚</span> Data adalah "Bahan Bakar"
                    </h3>
                    
                    <div class="flex flex-col md:flex-row gap-8 items-center relative z-10">
                        <div class="w-28 h-28 flex-shrink-0 bg-white rounded-full flex items-center justify-center text-6xl shadow-2xl border-4 border-yellow-300 animate-bounce">
                            ⛽
                        </div>
                        <div class="text-white text-lg drop-shadow-md">
                            <p class="leading-relaxed mb-4 font-medium">
                                Bayangkan sebuah mobil balap super canggih (ini ibarat <strong class="text-yellow-300 text-outline-sm text-xl">Kecerdasan Buatan / AI</strong>). Sehebat apapun mesinnya, mobil itu <strong>tidak akan bergerak</strong> jika tangki bensinnya kosong!
                            </p>
                            <div class="bg-black/20 p-4 rounded-xl border border-white/20 backdrop-blur-sm">
                                <p class="leading-relaxed font-bold">
                                    Sama seperti AI. Tanpa adanya data, AI ibarat "otak tanpa pengalaman". Ia tidak bisa belajar, tidak bisa mengenali pola, dan tidak bisa membantu manusia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-purple-800 p-6 md:p-8 rounded-3xl border-4 border-indigo-400 shadow-[0_10px_30px_rgba(79,70,229,0.4)] relative overflow-hidden mt-12">
                    <div class="absolute -right-10 -bottom-10 text-9xl opacity-10">🧠</div>

                    <h3 class="text-3xl font-black text-white text-outline-bold mb-6 relative z-10 flex items-center gap-3">
                        <span>🤖</span> AI = Mesin Belajar
                    </h3>
                    
                    <div class="flex flex-col md:flex-row gap-8 items-stretch relative z-10">
                        
                        <!-- Kolom Kiri: Penjelasan & Contoh (Tetap Sama) -->
                        <div class="flex-1 text-white text-lg drop-shadow-md space-y-5 flex flex-col justify-center">
                            <p class="leading-relaxed font-medium">
                                Kecerdasan Buatan sebenarnya adalah sebuah <strong>Mesin Belajar</strong> (<em>Machine Learning</em>). 
                                Pengalaman bagi mesin tersebut adalah <strong>DATA</strong>. Makin banyak data diserap, AI akan semakin pintar! Mari kita lihat buktinya di kehidupan sehari-hari:
                            </p>
                            
                            <div class="space-y-4">
                                <div class="bg-black/30 p-4 rounded-xl border border-white/10 flex gap-4 items-center hover:bg-black/50 transition-colors">
                                    <div class="text-4xl">🎬</div>
                                    <div>
                                        <h5 class="font-bold text-yellow-300">Rekomendasi Tontonan</h5>
                                        <p class="text-sm text-gray-200">YouTube tahu persis video kesukaanmu karena AI <em>mempelajari</em> data riwayat tontonanmu sebelumnya.</p>
                                    </div>
                                </div>
                                <div class="bg-black/30 p-4 rounded-xl border border-white/10 flex gap-4 items-center hover:bg-black/50 transition-colors">
                                    <div class="text-4xl">🛡️</div>
                                    <div>
                                        <h5 class="font-bold text-green-400">Filter Spam Email</h5>
                                        <p class="text-sm text-gray-200">Emailmu otomatis membuang pesan penipuan karena sistemnya sudah <em>belajar</em> dari ribuan data email spam di masa lalu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan: Siklus Belajar AI (Telah Diperbarui menjadi Timeline) -->
                        <div class="w-full md:w-5/12 lg:w-1/3 flex flex-col">
                            <div class="bg-indigo-950/80 p-6 rounded-2xl border-2 border-indigo-400/50 border-dashed backdrop-blur-md w-full h-full flex flex-col justify-center shadow-inner">
                                <div class="text-sm text-indigo-300 font-bold tracking-widest mb-6 text-center">SIKLUS BELAJAR AI</div>
                                
                                <!-- Alur Timeline -->
                                <div class="relative z-10 space-y-6">
                                    
                                    <!-- Langkah 1 -->
                                    <div class="flex items-start gap-4 relative group">
                                        <!-- Garis Konektor -->
                                        <div class="absolute left-6 top-12 bottom-[-1.5rem] w-0.5 bg-gradient-to-b from-blue-500/50 to-purple-500/50"></div>
                                        
                                        <div class="w-12 h-12 shrink-0 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30 border border-white/20 relative z-10 group-hover:scale-110 transition-transform">
                                            <span class="text-xl">📊</span>
                                        </div>
                                        <div class="pt-1">
                                            <h5 class="text-white font-bold text-sm">1. Input Data</h5>
                                            <p class="text-slate-400 text-xs leading-relaxed mt-1">Sistem mengumpulkan data kebiasaanmu.</p>
                                        </div>
                                    </div>

                                    <!-- Langkah 2 -->
                                    <div class="flex items-start gap-4 relative group">
                                        <!-- Garis Konektor -->
                                        <div class="absolute left-6 top-12 bottom-[-1.5rem] w-0.5 bg-gradient-to-b from-purple-500/50 to-yellow-500/50"></div>
                                        
                                        <div class="w-12 h-12 shrink-0 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-500/30 border border-white/20 relative z-10 group-hover:scale-110 transition-transform">
                                            <span class="text-xl">🤖</span>
                                        </div>
                                        <div class="pt-1">
                                            <h5 class="text-white font-bold text-sm">2. AI Belajar</h5>
                                            <p class="text-slate-400 text-xs leading-relaxed mt-1">Memproses data & mencari pola (Clustering).</p>
                                        </div>
                                    </div>

                                    <!-- Langkah 3 -->
                                    <div class="flex items-start gap-4 relative group">
                                        <div class="w-12 h-12 shrink-0 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-yellow-500/30 border border-white/20 relative z-10 group-hover:scale-110 transition-transform">
                                            <span class="text-xl animate-pulse">💡</span>
                                        </div>
                                        <div class="pt-1">
                                            <h5 class="text-white font-bold text-sm">3. Keputusan Pintar</h5>
                                            <p class="text-slate-400 text-xs leading-relaxed mt-1">Memberikan rekomendasi yang akurat.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-white text-outline mb-4 flex items-center gap-3">
                        <span>💻</span> Percobaan: Ubah Data Jadi Informasi
                    </h3>
                    
                    <p class="text-gray-200 text-lg leading-relaxed mb-4">
                        Data mentah seringkali sulit dipahami oleh mata telanjang. Kita perlu mengolahnya agar menjadi <strong>Informasi</strong> yang berguna. Ayo kita coba langsung!
                    </p>
                    <p class="text-gray-200 text-lg leading-relaxed mb-6">
                        Coba olah angka-angka acak di bawah ini pada media pembelajaran web:
                    </p>

                    <div class="lab-container bg-[#1a1c23] border-2 border-indigo-500 rounded-2xl p-6 shadow-2xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-4">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="bg-indigo-600 text-white px-3 py-1 rounded border border-indigo-400 text-xs font-bold tracking-widest">INPUT</span>
                                    <h4 class="font-bold text-gray-200">Data Mentah (Nilai Ujian)</h4>
                                </div>
                                <p class="text-xs text-gray-400">Pisahkan dengan koma (contoh: 80, 90, 75)</p>
                                <textarea id="rawDataInput" rows="3" class="w-full p-4 bg-black border-2 border-gray-700 text-green-400 rounded-xl font-mono text-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-inner" placeholder="80, 70, 90...">80, 70, 90, 65, 85, 95, 60, 75</textarea>
                                
                                <button onclick="processData()" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-black text-lg rounded-xl shadow-[0_5px_0px_#4338ca] hover:shadow-[0_2px_0px_#4338ca] hover:translate-y-[3px] transition-all flex items-center justify-center gap-2">
                                    <span>⚙️</span> OLAH DATA SEKARANG
                                </button>
                            </div>

                            <div class="relative bg-black text-green-400 p-6 rounded-xl font-mono shadow-[inset_0_0_20px_rgba(0,0,0,1)] border-2 border-gray-700 h-full min-h-[200px] flex flex-col">
                                <div class="absolute top-0 right-0 bg-green-600 text-white text-xs font-bold px-4 py-1 rounded-bl-xl border-b border-l border-green-800">OUTPUT INFORMASI</div>
                                <div id="outputScreen" class="flex-1 flex flex-col justify-center space-y-3 mt-4">
                                    <p class="opacity-50 text-sm animate-pulse">// Menunggu input data...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mt-16 mb-16">
                    
                    <div class="bg-gradient-to-b from-[#1e293b]/95 to-[#0f172a]/95 backdrop-blur-xl p-8 rounded-3xl border border-gray-600 shadow-[0_10px_30px_rgba(0,0,0,0.5)] hover:shadow-[0_10px_40px_rgba(250,204,21,0.2)] hover:-translate-y-3 transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute -top-6 left-8 w-20 h-20 bg-yellow-400/20 rounded-full blur-2xl group-hover:bg-yellow-400/40 transition-colors"></div>
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-300 to-orange-500 rounded-2xl flex items-center justify-center text-4xl mb-6 shadow-lg transform -rotate-6 group-hover:rotate-0 transition-transform relative z-10 border-2 border-yellow-200">👶</div>
                        <h4 class="font-black text-2xl text-white mb-4 text-outline">Prosesnya Seperti Anak Kecil!</h4>
                        <p class="text-base text-gray-200 leading-relaxed font-medium">
                            Bagaimana seorang anak kecil tahu mana hewan yang bernama "Kucing"? Jawabannya: Karena dia melihat banyak <strong class="text-yellow-400 bg-yellow-900/40 px-2 py-0.5 rounded border border-yellow-500/30">data visual</strong> (gambar kucing) berulang kali dan diberi tahu labelnya oleh orang tuanya.
                        </p>
                    </div>

                    <div class="bg-gradient-to-b from-[#1e293b]/95 to-[#0f172a]/95 backdrop-blur-xl p-8 rounded-3xl border border-gray-600 shadow-[0_10px_30px_rgba(0,0,0,0.5)] hover:shadow-[0_10px_40px_rgba(168,85,247,0.2)] hover:-translate-y-3 transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute -top-6 left-8 w-20 h-20 bg-purple-500/20 rounded-full blur-2xl group-hover:bg-purple-500/40 transition-colors"></div>
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-indigo-600 rounded-2xl flex items-center justify-center text-4xl mb-6 shadow-lg transform -rotate-6 group-hover:rotate-0 transition-transform relative z-10 border-2 border-purple-200">🤖</div>
                        <h4 class="font-black text-2xl text-white mb-4 text-outline">AI Belajar Pola</h4>
                        <p class="text-base text-gray-200 leading-relaxed font-medium">
                            Komputer melakukan hal yang sama persis. Kita memberinya ribuan foto (Data), lalu komputer mencari pola persamaan di antaranya untuk belajar secara mandiri.
                        </p>
                    </div>

                    <div class="bg-gradient-to-b from-[#1e293b]/95 to-[#0f172a]/95 backdrop-blur-xl p-8 rounded-3xl border border-gray-600 shadow-[0_10px_30px_rgba(0,0,0,0.5)] hover:shadow-[0_10px_40px_rgba(34,197,94,0.2)] hover:-translate-y-3 transition-all duration-300 group relative overflow-hidden">
                        <div class="absolute -top-6 left-8 w-20 h-20 bg-green-500/20 rounded-full blur-2xl group-hover:bg-green-500/40 transition-colors"></div>
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl flex items-center justify-center text-4xl mb-6 shadow-lg transform -rotate-6 group-hover:rotate-0 transition-transform relative z-10 border-2 border-green-200">🎯</div>
                        <h4 class="font-black text-2xl text-white mb-4 text-outline">Keputusan Tepat</h4>
                        <p class="text-base text-gray-200 leading-relaxed font-medium">
                            Dengan data yang cukup dan berkualitas, kita tidak lagi menebak-nebak atau berasumsi, tapi bisa mengambil keputusan berdasarkan <strong class="text-green-400 bg-green-900/40 px-2 py-0.5 rounded border border-green-500/30">fakta dan bukti</strong> yang kuat serta akurat.
                        </p>
                    </div>

                </div>

                <script>
                    function processData() {
                        let inputStr = document.getElementById('rawDataInput').value;
                        let numbers = inputStr.split(',').map(n => parseFloat(n.trim())).filter(n => !isNaN(n));
                        let outputDiv = document.getElementById('outputScreen');

                        if (numbers.length === 0) {
                            outputDiv.innerHTML = '<p class="text-red-500 font-bold bg-red-900/30 p-2 rounded">❌ ERROR: Masukkan angka yang valid!</p>';
                            return;
                        }

                        let total = numbers.reduce((a, b) => a + b, 0);
                        let avg = (total / numbers.length).toFixed(1);
                        let maxVal = Math.max(...numbers);
                        let minVal = Math.min(...numbers);
                        let status = avg >= 75 ? "KELAS LULUS ✅" : "KELAS REMEDIAL ⚠️";
                        let statusColor = avg >= 75 ? "text-green-400 bg-green-900/30" : "text-yellow-400 bg-yellow-900/30";

                        outputDiv.innerHTML = '<div class="animate-pulse text-indigo-400">> Memproses ' + numbers.length + ' data...</div>';

                        setTimeout(() => {
                            outputDiv.innerHTML = 
                                '<div><span class="text-gray-500">></span> Total Data : <span class="text-white font-bold">' + numbers.length + ' Siswa</span></div>' +
                                '<div><span class="text-gray-500">></span> Rata-rata  : <span class="text-blue-400 font-black text-xl">' + avg + '</span></div>' +
                                '<div><span class="text-gray-500">></span> Tertinggi  : <span class="text-white">' + maxVal + '</span></div>' +
                                '<div><span class="text-gray-500">></span> Terendah   : <span class="text-white">' + minVal + '</span></div>' +
                                '<div class="mt-4 pt-3 border-t border-gray-700">' +
                                    '<span class="text-gray-500">></span> KESIMPULAN : <br>' +
                                    '<span class="' + statusColor + ' font-black text-lg px-2 py-1 rounded inline-block mt-1">' + status + '</span>' +
                                '</div>';
                        }, 800);
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
                    data-question="Berdasarkan bacaan di atas, apa definisi yang paling tepat tentang 'Data'?"
                    data-opt-a="Kumpulan fakta, angka, atau deskripsi yang belum diolah."
                    data-opt-b="Informasi yang sudah disajikan dalam bentuk grafik."
                    data-opt-c="Hasil dari sebuah keputusan pintar komputer."
                    data-opt-d="Komponen hardware (perangkat keras) dari sebuah komputer."
                    data-opt-e="Sebuah program aplikasi perangkat lunak untuk mengedit gambar."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam analogi materi ini, data diibaratkan sebagai apa bagi mesin Kecerdasan Buatan (AI)?"
                    data-opt-a="Sebagai setir kemudi"
                    data-opt-b="Sebagai bahan bakar"
                    data-opt-c="Sebagai ban penggerak"
                    data-opt-d="Sebagai rem otomatis"
                    data-opt-e="Sebagai kerangka besi pelindung"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Mengapa 'Raw Data' atau data mentah (seperti tulisan acak: 010101, 34.5, 'Budi') sangat sulit dipahami oleh manusia?"
                    data-opt-a="Karena harus dibaca menggunakan mikroskop khusus."
                    data-opt-b="Karena tidak memiliki konteks dan belum diolah menjadi informasi."
                    data-opt-c="Karena menggunakan bahasa pemrograman tingkat tinggi yang dirahasiakan."
                    data-opt-d="Karena data tersebut memiliki ukuran file yang terlalu besar."
                    data-opt-e="Karena ditulis murni menggunakan bahasa asing purba."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan 'Siklus Belajar AI' yang ada di materi, manakah urutan proses yang paling benar?"
                    data-opt-a="AI Belajar ➔ Keputusan Pintar ➔ Data"
                    data-opt-b="Keputusan Pintar ➔ Data ➔ AI Belajar"
                    data-opt-c="Data ➔ Keputusan Pintar ➔ AI Belajar"
                    data-opt-d="Data ➔ AI Belajar ➔ Keputusan Pintar"
                    data-opt-e="Keputusan Pintar ➔ AI Belajar ➔ Data"
                    data-answer="D">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Data bisa berwujud apa saja. Apa contoh dari wujud data berupa 'Visual' yang disebutkan dalam bacaan di atas?"
                    data-opt-a="Teks tweet dan nama jalan"
                    data-opt-b="Rekaman suara atau musik"
                    data-opt-c="Foto kucing dan rekaman CCTV"
                    data-opt-d="Angka nilai ujian mahasiswa"
                    data-opt-e="Dokumen laporan berformat PDF"
                    data-answer="C">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'apa-itu-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Apa Itu Data?',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 0, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1: Apa Itu Data berhasil disinkronisasi dengan Modul Ajar!');
    }
}