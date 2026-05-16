<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_03_StrukturDataSeeder extends Seeder
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
                            <span class="text-yellow-400 animate-pulse">●</span> BENTUK DATA
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full opacity-80 group-hover:opacity-100 transition-opacity" 
                                src="https://www.youtube.com/embed/VZfc7x2CYkE?rel=0&modestbranding=1" 
                                title="Struktur Data" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h3 class="text-4xl md:text-5xl font-black text-white text-outline-bold mb-4" style="line-height: 1.6;">
                        📦 Kotak Rapi vs Tumpukan Gudang
                    </h3>
                    <p class="text-lg text-gray-300 font-medium max-w-2xl mx-auto">
                        Di dunia digital, cara kita menyimpan data sama pentingnya dengan data itu sendiri. Bayangkan kamarmu saat ini...
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    <div class="bg-gradient-to-b from-blue-900 to-blue-950 p-8 rounded-3xl border-2 border-blue-500 shadow-[0_10px_30px_rgba(59,130,246,0.3)] hover:-translate-y-2 transition-transform relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl group-hover:bg-blue-400/40 transition-colors"></div>
                        <div class="text-6xl mb-4 relative z-10 drop-shadow-lg group-hover:scale-110 transition-transform">🗄️</div>
                        <h4 class="text-2xl font-black text-blue-300 mb-3 relative z-10 text-outline-sm">Terstruktur (Rapi)</h4>
                        <p class="text-gray-300 leading-relaxed relative z-10">
                            Bajumu dilipat rapi di dalam lemari laci. Kaos di laci atas, celana di laci bawah. Sangat <strong>mudah dicari</strong> dan dikelompokkan, kan?
                        </p>
                    </div>

                    <div class="bg-gradient-to-b from-orange-900 to-red-950 p-8 rounded-3xl border-2 border-orange-500 shadow-[0_10px_30px_rgba(249,115,22,0.3)] hover:-translate-y-2 transition-transform relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-orange-500/20 rounded-full blur-3xl group-hover:bg-orange-400/40 transition-colors"></div>
                        <div class="text-6xl mb-4 relative z-10 drop-shadow-lg group-hover:scale-110 transition-transform">🗑️</div>
                        <h4 class="text-2xl font-black text-orange-300 mb-3 relative z-10 text-outline-sm">Tidak Terstruktur (Berantakan)</h4>
                        <p class="text-gray-300 leading-relaxed relative z-10">
                            Tumpukan mainan, foto, kertas, dan kabel berserakan di lantai. Kamu mungkin tahu itu barang apa, tapi <strong>komputer akan pusing</strong> melihatnya!
                        </p>
                    </div>
                </div>

                <div class="bg-[#1e293b] p-8 rounded-3xl border border-gray-600 shadow-2xl mt-12 relative overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                        
                        <div class="relative z-10">
                            <div class="inline-block bg-blue-500/20 border border-blue-400 text-blue-300 px-3 py-1 rounded-full text-xs font-bold mb-4 tracking-widest">FORMAT: SQL / EXCEL / CSV</div>
                            <h4 class="text-3xl font-black text-white mb-4 text-outline">1. Data Terstruktur (Structured Data)</h4>
                            
                            <p class="text-gray-300 leading-relaxed mb-4 text-lg">
                                Ini adalah data kesukaan komputer! Data disusun dalam format <strong class="text-white bg-blue-600/50 px-2 py-0.5 rounded">Baris (Rows)</strong> dan <strong class="text-white bg-blue-600/50 px-2 py-0.5 rounded">Kolom (Columns)</strong> yang sangat kaku dan disiplin.
                            </p>
                            
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-center gap-3"><span class="text-green-400 text-xl">✅</span> <strong>Sangat mudah dicari (Searchable).</strong></li>
                                <li class="flex items-center gap-3"><span class="text-green-400 text-xl">✅</span> <strong>Format konsisten</strong> (Kolom 'Umur' pasti berisi Angka, tidak boleh teks).</li>
                                <li class="flex items-center gap-3"><span class="text-green-400 text-xl">✅</span> <strong>Sempurna untuk Machine Learning dasar.</strong></li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-900 p-5 rounded-2xl border-2 border-gray-700 shadow-[0_0_30px_rgba(59,130,246,0.15)] relative z-10 transform lg:rotate-2 hover:rotate-0 transition-transform">
                            <div class="flex items-center justify-between mb-4 border-b border-gray-700 pb-3">
                                <div class="flex gap-2">
                                    <div class="w-3 h-3 rounded-full bg-red-500"></div><div class="w-3 h-3 rounded-full bg-yellow-500"></div><div class="w-3 h-3 rounded-full bg-green-500"></div>
                                </div>
                                <span class="text-xs text-gray-400 font-mono tracking-widest">students_data.csv</span>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left">
                                    <thead class="bg-blue-900/50 text-blue-200 uppercase text-xs font-black">
                                        <tr>
                                            <th class="p-3 rounded-tl-lg">ID</th><th class="p-3">NAMA</th><th class="p-3">USIA</th><th class="p-3 rounded-tr-lg">NILAI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800 text-gray-300 font-mono">
                                        <tr class="hover:bg-gray-800 transition-colors"><td class="p-3 text-blue-400">001</td><td class="p-3">Aolia</td><td class="p-3 text-yellow-400">16</td><td class="p-3 text-green-400 font-bold">85</td></tr>
                                        <tr class="hover:bg-gray-800 transition-colors"><td class="p-3 text-blue-400">002</td><td class="p-3">Budi</td><td class="p-3 text-yellow-400">17</td><td class="p-3 text-green-400 font-bold">90</td></tr>
                                        <tr class="hover:bg-gray-800 transition-colors"><td class="p-3 text-blue-400">003</td><td class="p-3">Citra</td><td class="p-3 text-yellow-400">16</td><td class="p-3 text-green-400 font-bold">88</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-[#1e293b] p-8 rounded-3xl border border-gray-600 shadow-2xl mt-8 relative overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                        
                        <div class="order-2 lg:order-1 bg-gray-900 min-h-[250px] p-5 rounded-2xl border-2 border-gray-700 shadow-inner relative z-10 flex items-center justify-center overflow-hidden">
                            <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#fb923c 1px, transparent 1px); background-size: 20px 20px;"></div>
                            
                            <div class="absolute top-4 left-4 transform -rotate-12 bg-white p-2 shadow-lg rounded w-24 hover:rotate-0 transition-transform cursor-pointer border border-gray-200">
                                <div class="h-16 bg-gradient-to-br from-blue-300 to-purple-300 rounded mb-2 flex items-center justify-center text-2xl">🌅</div>
                                <div class="h-2 w-16 bg-gray-300 rounded"></div>
                            </div>
                            
                            <div class="absolute bottom-6 right-6 transform rotate-6 bg-yellow-100 p-3 shadow-lg rounded w-36 hover:-rotate-0 transition-transform cursor-pointer border border-yellow-300 text-black">
                                <p class="text-[10px] leading-tight font-bold font-mono">"Tolong buatkan saya laporan bulan ini ya..."</p>
                                <div class="mt-2 text-xs flex justify-end">🎙️ .mp3</div>
                            </div>
                            
                            <div class="absolute top-10 right-12 transform rotate-12 bg-green-100 p-3 shadow-lg rounded w-32 text-black hover:-rotate-6 transition-transform cursor-pointer border border-green-300">
                                <div class="text-xs font-bold mb-1">WhatsApp</div>
                                <p class="text-[9px] leading-tight">Bro, besok jadi futsal jam 7 malam kan?</p>
                            </div>

                            <div class="absolute bottom-10 left-10 text-5xl opacity-50 blur-[2px]">📄</div>
                            
                            <div class="bg-black/60 backdrop-blur-sm px-4 py-2 rounded-full border border-orange-500/50 text-orange-400 font-bold text-sm z-20 shadow-[0_0_15px_rgba(249,115,22,0.4)]">
                                80% Data di Dunia 🌍
                            </div>
                        </div>

                        <div class="order-1 lg:order-2 relative z-10">
                            <div class="inline-block bg-orange-500/20 border border-orange-400 text-orange-300 px-3 py-1 rounded-full text-xs font-bold mb-4 tracking-widest">FORMAT: GAMBAR / AUDIO / TEKS BEBAS</div>
                            <h4 class="text-3xl font-black text-white mb-4 text-outline">2. Data Tidak Terstruktur (Unstructured)</h4>
                            
                            <p class="text-gray-300 leading-relaxed mb-4 text-lg">
                                Ini adalah wujud asli data di kehidupan nyata. Bebas, liar, dan tidak punya format baku (kolom/baris).
                            </p>
                            <p class="text-gray-400 leading-relaxed mb-4 text-sm">
                                Bagaimana cara AI menghitung "Rata-rata dari sebuah Foto Kucing"? Susah, kan? Di sinilah kita butuh algoritma AI canggih (seperti Deep Learning) untuk mengekstrak makna dari ketidakberaturan ini.
                            </p>
                            
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-start gap-3"><span class="text-orange-400 text-xl mt-1">⚠️</span> <span><strong>Sulit diproses</strong> oleh komputer tradisional.</span></li>
                                <li class="flex items-start gap-3"><span class="text-green-400 text-xl mt-1">💡</span> <span>Kaya akan <strong>informasi tersembunyi</strong> (emosi suara, konteks gambar).</span></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>

                <div class="bg-gradient-to-r from-gray-900 to-black p-6 rounded-2xl border-l-4 border-teal-500 flex flex-col md:flex-row gap-6 items-center mt-10 shadow-lg">
                    <div class="text-6xl drop-shadow-[0_0_15px_rgba(20,184,166,0.6)]">🔗</div>
                    <div class="flex-1">
                        <h5 class="font-black text-xl text-teal-400 mb-2">Ada Jalan Tengah: Semi-Structured Data</h5>
                        <p class="text-gray-300 leading-relaxed text-sm mb-3">
                            Kadang data tidak serapi tabel Excel, tapi tetap punya struktur atau pola tertentu (menggunakan <em>tags</em> atau <em>keys</em>). Format yang paling sering digunakan programmer adalah <strong>JSON</strong> atau <strong>XML</strong>.
                        </p>
                        <div class="bg-[#1e1e1e] p-3 rounded-xl border border-gray-700 font-mono text-xs overflow-x-auto shadow-inner">
                            <span class="text-purple-400">{</span><br>
                            &nbsp;&nbsp;<span class="text-blue-300">"nama"</span><span class="text-gray-300">:</span> <span class="text-green-400">"Budi"</span><span class="text-gray-300">,</span><br>
                            &nbsp;&nbsp;<span class="text-blue-300">"usia"</span><span class="text-gray-300">:</span> <span class="text-orange-400">17</span><span class="text-gray-300">,</span><br>
                            &nbsp;&nbsp;<span class="text-blue-300">"hobi"</span><span class="text-gray-300">:</span> <span class="text-yellow-400">["Bola", "Game AI"]</span><br>
                            <span class="text-purple-400">}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-4 text-white text-outline" style="line-height: 1.5;">🛠️ Lab AI: Ekstraktor Data</h3>
                    <p class="text-center text-gray-400 mb-8 max-w-2xl mx-auto">
                        AI yang canggih (seperti ChatGPT) bisa membaca <strong class="text-orange-400">teks berantakan</strong> dan mengubahnya menjadi <strong class="text-blue-400">tabel yang rapi</strong>. Mari kita simulasikan!
                    </p>

                    <div class="flex flex-col md:flex-row gap-4 bg-[#0d1117] p-6 rounded-3xl shadow-2xl font-mono text-sm border border-gray-700 relative">
                        
                        <div class="flex-1 bg-[#161b22] p-5 rounded-2xl border border-gray-600 shadow-inner flex flex-col">
                            <div class="flex justify-between items-center mb-4 border-b border-gray-700 pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">📝</span>
                                    <span class="text-orange-400 font-bold uppercase tracking-widest text-xs">Chat_Log.txt</span>
                                </div>
                                <span class="bg-gray-700 text-gray-300 px-2 py-0.5 rounded text-[10px]">Unstructured</span>
                            </div>
                            
                            <div class="text-gray-300 space-y-3 opacity-90 flex-1 text-sm md:text-base leading-relaxed">
                                <p class="bg-gray-800/50 p-2 rounded border border-gray-700">"Si Budi nilainya 90 tuh, dia anak kelas 10A."</p>
                                <p class="bg-gray-800/50 p-2 rounded border border-gray-700">"Kalo Siti sih dapat 85, dia sekelas sama Budi di 10A."</p>
                                <p class="bg-gray-800/50 p-2 rounded border border-gray-700">"Waduh, Anton nilainya cuma 70, padahal dia anak 10B."</p>
                            </div>
                            
                            <button onclick="structureData()" id="btnProcess" class="mt-6 w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white rounded-xl font-black text-lg transition-all shadow-[0_0_15px_rgba(79,70,229,0.5)] flex items-center justify-center gap-2 group transform active:scale-95">
                                <span>⚡</span> EKSTRAK KE TABEL
                                <span class="group-hover:translate-x-1 transition-transform">→</span>
                            </button>
                        </div>

                        <div class="flex-1 bg-[#050505] p-5 rounded-2xl border-2 border-gray-800 relative min-h-[300px] flex flex-col">
                            <div class="flex justify-between items-center mb-4 border-b border-gray-800 pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">📊</span>
                                    <span class="text-blue-500 font-bold uppercase tracking-widest text-xs">Database_Siswa.csv</span>
                                </div>
                                <span class="bg-blue-900/50 text-blue-300 px-2 py-0.5 rounded border border-blue-700 text-[10px]">Structured</span>
                            </div>
                            
                            <div id="resultArea" class="flex-1 flex items-center justify-center text-gray-500">
                                <div class="text-center">
                                    <div class="text-4xl mb-2 opacity-30">🤖</div>
                                    <p class="animate-pulse">&lt; Menunggu perintah ekstraksi... &gt;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function structureData() {
                        const resultDiv = document.getElementById('resultArea');
                        const btn = document.getElementById('btnProcess');
                        
                        btn.disabled = true;
                        btn.innerHTML = '<span class="animate-spin">🔄</span> MEMPROSES...';
                        btn.classList.add('opacity-70', 'cursor-not-allowed');

                        resultDiv.innerHTML = `
                            <div class="flex flex-col items-center gap-3 w-full">
                                <div class="w-full bg-gray-800 rounded-full h-1.5 mb-2 overflow-hidden">
                                  <div class="bg-indigo-500 h-1.5 rounded-full w-full animate-[loading_1.5s_ease-in-out_1]"></div>
                                </div>
                                <div class="text-indigo-400 text-xs font-mono text-left w-full space-y-1">
                                    <p class="animate-pulse">> Analyzing natural language...</p>
                                    <p class="animate-pulse" style="animation-delay: 0.3s">> Extracting Entities (Name, Score, Class)...</p>
                                    <p class="animate-pulse" style="animation-delay: 0.6s">> Formatting to tabular rows...</p>
                                </div>
                            </div>
                        `;

                        setTimeout(() => {
                            resultDiv.innerHTML = `
                                <div class="w-full bg-blue-950/20 border border-blue-900/50 rounded-lg overflow-hidden animate-fade-in">
                                    <table class="w-full text-xs md:text-sm text-left border-collapse">
                                        <thead class="bg-blue-900/50 text-blue-300 font-black tracking-widest text-[10px]">
                                            <tr>
                                                <th class="py-3 px-4">NAMA</th>
                                                <th class="py-3 px-4 text-center">KELAS</th>
                                                <th class="py-3 px-4 text-right">NILAI</th>
                                            </tr>
                                        </thead>
                                        <tbody class="font-mono text-gray-300 divide-y divide-gray-800">
                                            <tr class="hover:bg-gray-800/50 transition-colors animate-slide-in" style="animation-delay: 0.1s">
                                                <td class="py-3 px-4 text-green-400">Budi</td>
                                                <td class="py-3 px-4 text-center text-yellow-300">10A</td>
                                                <td class="py-3 px-4 text-right text-white font-bold">90</td>
                                            </tr>
                                            <tr class="hover:bg-gray-800/50 transition-colors animate-slide-in" style="animation-delay: 0.3s">
                                                <td class="py-3 px-4 text-green-400">Siti</td>
                                                <td class="py-3 px-4 text-center text-yellow-300">10A</td>
                                                <td class="py-3 px-4 text-right text-white font-bold">85</td>
                                            </tr>
                                            <tr class="hover:bg-gray-800/50 transition-colors animate-slide-in" style="animation-delay: 0.5s">
                                                <td class="py-3 px-4 text-green-400">Anton</td>
                                                <td class="py-3 px-4 text-center text-yellow-300">10B</td>
                                                <td class="py-3 px-4 text-right text-white font-bold">70</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4 text-[10px] text-green-400 flex items-center justify-center gap-1 font-bold tracking-widest uppercase bg-green-900/20 py-1 rounded">
                                    <span class="text-sm">✨</span> Extraction Successful!
                                </div>
                            `;

                            btn.disabled = false;
                            btn.innerHTML = '<span>✅</span> SUDAH RAPI!';
                            btn.classList.remove('from-indigo-600', 'to-purple-600');
                            btn.classList.add('from-green-600', 'to-teal-600');
                        }, 1500);
                    }
                </script>

                <style>
                    @keyframes slide-in {
                        from { opacity: 0; transform: translateX(-20px); }
                        to { opacity: 1; transform: translateX(0); }
                    }
                    @keyframes loading {
                        0% { width: 0%; }
                        50% { width: 70%; }
                        100% { width: 100%; }
                    }
                    .animate-slide-in {
                        animation: slide-in 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
                        opacity: 0;
                    }
                </style>
                
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
                    data-question="Karakteristik utama dari “Data Terstruktur” (Structured Data) adalah...."
                    data-opt-a="Berupa file audio dan video berukuran besar."
                    data-opt-b="Tersusun rapi dalam format baris dan kolom yang konsisten (seperti Excel/SQL)."
                    data-opt-c="Memiliki emosi tersembunyi yang bisa dideteksi oleh manusia."
                    data-opt-d="Data yang dikumpulkan dari chat WhatsApp."
                    data-opt-e="Hanya berisi sekumpulan teks panjang tanpa spasi atau tanda baca."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Contoh dari “Data Tidak Terstruktur” (Unstructured Data) adalah...."
                    data-opt-a="Tabel absen siswa di Excel"
                    data-opt-b="Data transaksi pembeli di minimarket"
                    data-opt-c="Rekaman suara dan gambar pemandangan"
                    data-opt-d="Data JSON yang memiliki tag nama dan umur"
                    data-opt-e="Daftar nilai rapor harian dengan format .csv"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Format data yang menjadi “jalan tengah” karena tidak memiliki kolom dan baris yang kaku, tetapi memiliki tag (keys) pola tertentu adalah...."
                    data-opt-a="Data Terstruktur (SQL)"
                    data-opt-b="Semi-Structured Data (JSON / XML)"
                    data-opt-c="Data Mentah (Raw Text)"
                    data-opt-d="Data Biner Komputer"
                    data-opt-e="Format Grafik Gambar (JPEG/PNG)"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Alasan komputer “pusing” dan kesulitan memproses Data Tidak Terstruktur menurut materi di atas adalah...."
                    data-opt-a="Karena komputer belum di-install Excel."
                    data-opt-b="Karena ukurannya terlalu besar untuk masuk flashdisk."
                    data-opt-c="Karena bebas, liar, dan tidak punya format baku (baris/kolom) sehingga maknanya sulit dihitung langsung."
                    data-opt-d="Karena manusia menyembunyikannya."
                    data-opt-e="Karena sistem operasi tidak bisa membaca teks selain bahasa Inggris."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Fungsi AI pada percobaan “Lab AI: Ekstraktor Data” saat diberikan teks berantakan (Chat_Log.txt) adalah...."
                    data-opt-a="Membacakan teksnya keras-keras."
                    data-opt-b="Mengekstrak informasi di dalamnya dan mengubahnya menjadi tabel Data Terstruktur yang rapi."
                    data-opt-c="Menghapus file tersebut karena tidak bisa dibaca."
                    data-opt-d="Mengubah teks tersebut menjadi format gambar (JPEG)."
                    data-opt-e="Mengirimkan pesan tersebut ke kontak lain secara otomatis."
                    data-answer="B">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'struktur-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Struktur Data: Kotak vs Tumpukan',
                'type' => 'text',
                'sequence' => 4,
                'min_level' => 1,
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1: Struktur Data berhasil diperbarui (Super Gamified Multi-Quiz)!');
    }
}