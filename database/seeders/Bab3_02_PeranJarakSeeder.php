<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab3_02_PeranJarakSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cari ID Bab 3
        $chapterId = Chapter::where('sequence', 3)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 3 belum dibuat! Jalankan MateriBab2Seeder dulu.');
            return;
        }

        // 2. Konten Materi Lengkap (Peran Jarak)
        $content = <<<EOT
            <div id="areaMateriPelajaran" class="space-y-12 text-gray-800 dark:text-gray-100 font-sans transition-all duration-1000 relative z-10">
                
                <div class="mb-10">
                    <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-[0_10px_20px_rgba(0,0,0,0.5)] border-4 border-indigo-500 bg-black aspect-video group">
                        <div class="absolute top-4 left-4 z-10 bg-black/80 backdrop-blur-md text-white text-xs font-bold px-4 py-2 rounded-full border border-indigo-400/50 flex items-center gap-2 pointer-events-none transition-opacity group-hover:opacity-0">
                            <span class="text-red-500 animate-pulse">●</span> INTRO
                        </div>
                        
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/vBTwKO3p_AU?rel=0&modestbranding=1" 
                                title="Video Pengantar Peran Jarak" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas sebelum menyelami matematika di baliknya!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-blue-900 to-indigo-950 p-6 md:p-8 rounded-3xl border border-indigo-500 shadow-xl relative overflow-hidden mb-12">
                    <div class="absolute -right-10 -bottom-10 text-[10rem] opacity-5 pointer-events-none">🤖</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-6 relative z-10" style="line-height: 1.5;">
                        A. Bagaimana Komputer "Melihat" Kemiripan?
                    </h3>
                    
                    <div class="relative z-10 space-y-5 text-gray-200 leading-relaxed text-base text-justify">
                        
                        <div class="flex justify-center mb-6 bg-white/5 p-4 rounded-2xl border border-indigo-500/30 backdrop-blur-sm shadow-inner max-w-5xl mx-auto">
                            <img src="/images/materi/image_fa53e4.png" alt="Ilustrasi Manusia vs Komputer Melihat Data" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.4)] border-2 border-gray-800 max-w-full h-auto w-full transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Ilustrasi+Manusia+vs+Komputer';">
                        </div>

                        <p>
                            Manusia bisa dengan mudah melihat dua buah apel dan secara insting berkata, <em>"Mereka ini mirip"</em>. Tapi ingat, komputer itu pada dasarnya <strong>buta bentuk</strong> dan <strong>buta warna</strong>. Ia tidak bisa "melihat" apel.
                        </p>
                        <p>
                            Komputer hanya memahami alam semesta melalui satu bahasa universal: <strong>Jarak Matematika (Distance)</strong>. Dalam algoritma <em>Clustering</em> (seperti K-Means), "kemiripan" diterjemahkan langsung menjadi jarak koordinat:
                        </p>

                        <div class="bg-black/30 p-6 rounded-2xl border border-white/10 backdrop-blur-sm mt-6 shadow-inner">
                            <h4 class="text-lg font-bold text-white mb-4 flex items-center gap-3">
                                <span class="text-2xl drop-shadow-md">📏</span> 
                                Prinsip Matematika dalam Clustering
                            </h4>
                            <div class="space-y-4 text-gray-300">
                                
                                <p class="font-medium text-white p-4 rounded-xl bg-indigo-950/80 border border-indigo-400/50 shadow-md">
                                    Intinya: Komputer melihat <strong>kemiripan (<em>Similarity</em>)</strong> berdasarkan kedekatan <strong>Jarak Matematika</strong>.
                                </p>
                                
                                <ul class="text-sm space-y-3 pl-2 mt-4">
                                    <li class="flex items-center gap-3 bg-black/20 p-2 rounded-lg border border-green-900/30">
                                        <span class="text-green-400 text-lg">🟢</span> 
                                        <div>
                                            <strong>Jarak Kecil (Dekat):</strong> Komputer menganggap datanya Sangat Mirip (Satu Kelompok).
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 bg-black/20 p-2 rounded-lg border border-red-900/30">
                                        <span class="text-red-400 text-lg">🔴</span> 
                                        <div>
                                            <strong>Jarak Besar (Jauh):</strong> Komputer menganggap datanya Sangat Berbeda (Beda Kelompok).
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-white/5 rounded-xl border border-white/10 flex items-start gap-4">
                            <span class="text-3xl mt-1">🧑‍🤝‍🧑</span>
                            <p class="text-sm text-gray-300 leading-relaxed">
                                <strong class="text-blue-300">ANALOGI KELAS:</strong> Bayangkan suasana di dalam kelas. Kamu cenderung akan menarik kursi dan duduk berdekatan dengan anggota geng atau teman akrabmu. <em>Jarak fisik</em> kalian yang dekat menandakan adanya "kedekatan hubungan". Algoritma AI menggunakan logika yang sama persis untuk membuat klaster!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-gray-700 shadow-2xl relative overflow-hidden">
                    <div class="absolute -left-10 -top-10 text-[10rem] opacity-5 pointer-events-none">📖</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-4 text-center">B. Dua Cara Utama Mengukur Jarak</h3>
                    <p class="text-center text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed">
                        Dalam algoritma *Clustering*, jarak matematika (*distance metric*) sangatlah penting. Mari kita pelajari dua metode yang paling umum digunakan:
                    </p>

                    <div class="space-y-10 relative z-10 max-w-4xl mx-auto">
                        
                        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-l-4 border-l-teal-500 shadow-lg relative">
                            <div class="absolute top-4 right-4 text-4xl opacity-20">📐</div>
                            <h4 class="text-xl font-bold text-teal-400 mb-4 border-b border-gray-700 pb-2">1. Euclidean Distance</h4>
                            <div class="space-y-4 text-sm text-gray-300 leading-relaxed mb-6">
                                <p>
                                    Ini adalah metode paling populer dan paling sering digunakan. Diadaptasi langsung dari <strong>Teorema Pythagoras</strong>. Jarak diukur dengan menarik garis benang lurus terpendek dari Titik A ke Titik B.
                                </p>
                                <p class="text-gray-400 font-bold tracking-widest uppercase text-xs p-1 px-2 rounded-lg bg-teal-950/50 inline-block border border-teal-500/30">"Jarak Garis Lurus" / "Burung Terbang"</p>
                            </div>
                            
                            <div class="flex flex-col items-center justify-center bg-black/50 p-4 rounded-xl border border-teal-500/30 font-mono text-center text-sm text-teal-300 mb-6 overflow-x-auto">
                                <span class="text-[10px] text-teal-500/80 font-mono tracking-widest uppercase block mb-3 border-b border-teal-500/20 pb-1">Bagan Koordinat & Teorema Pythagoras</span>
                                <img src="/images/materi/image_fc1dc7.jpg" alt="Ilustrasi Bagan Koordinat Euclidean Distance" class="rounded-lg shadow-inner max-w-full h-auto w-full md:w-4/5 lg:w-3/4" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Koordinat+Euclidean';">
                            </div>

                            <p class="text-xs text-gray-500">
                                <strong>Kapan dipakai?</strong> Sangat baik digunakan ketika data kamu adalah angka berkelanjutan (*continuous*) seperti suhu, gaji, tinggi badan, atau skor uji.
                            </p>
                        </div>

                        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-6 md:p-8 rounded-2xl border-l-4 border-l-orange-500 shadow-lg relative">
                            <div class="absolute top-4 right-4 text-4xl opacity-20">🚕</div>
                            <h4 class="text-xl font-bold text-orange-400 mb-4 border-b border-gray-700 pb-2">2. Manhattan Distance</h4>
                            <div class="space-y-4 text-sm text-gray-300 leading-relaxed mb-6">
                                <p>
                                    Metode ini mengukur jarak berdasarkan selisih nilai koordinat. Bayangkan kamu adalah supir taksi di kota New York yang gedungnya berbentuk kotak (blok). Kamu tidak bisa menembus gedung (garis lurus), kamu harus belok kiri-kanan mengikuti jalanan.
                                </p>
                                <p class="text-gray-400 font-bold tracking-widest uppercase text-xs p-1 px-2 rounded-lg bg-orange-950/50 inline-block border border-orange-500/30">"Jarak Kota" / "Taksi New York"</p>
                            </div>
                            
                            <div class="flex flex-col items-center justify-center bg-black/50 p-4 rounded-xl border border-orange-500/30 font-mono text-center text-sm text-orange-300 mb-6 overflow-x-auto">
                                <span class="text-[10px] text-orange-500/80 font-mono tracking-widest uppercase block mb-3 border-b border-orange-500/20 pb-1">Bagan Koordinat & Nilai Mutlak</span>
                                <img src="/images/materi/image_fc1de2.jpg" alt="Ilustrasi Bagan Koordinat Manhattan Distance" class="rounded-lg shadow-inner max-w-full h-auto w-full md:w-4/5 lg:w-3/4" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Koordinat+Manhattan';">
                            </div>

                            <p class="text-xs text-gray-500">
                                <strong>Kapan dipakai?</strong> Sangat berguna ketika data kamu memiliki banyak *outlier* (pencilan) atau data yang berdimensi tinggi.
                            </p>
                        </div>

                        <div class="mt-12 flex justify-center bg-white/5 p-4 rounded-2xl border border-gray-600 backdrop-blur-sm shadow-inner max-w-5xl mx-auto relative overflow-hidden">
                            <div class="absolute -top-3 left-6 bg-gray-700 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-md border border-gray-600">
                                Ringkasan Visual
                            </div>
                            <img src="/images/materi/image_fc1da1.jpg" alt="Infografis Ringkasan Perbandingan Dua Cara Mengukur Jarak" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.3)] border-2 border-gray-800 max-w-full h-auto w-full transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Ringkasan+Perbandingan';">
                        </div>
                        
                    </div>
                </div>

                <div class="mt-16 bg-gradient-to-br from-[#0f1115] to-[#1e1b4b] p-6 md:p-10 rounded-3xl border-2 border-teal-500/50 shadow-[0_20px_50px_rgba(20,184,166,0.2)] relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 text-[10rem] opacity-5 pointer-events-none">🎮</div>
                    
                    <h3 class="text-3xl font-black text-teal-400 mb-4 text-outline-sm flex items-center gap-3 relative z-10">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(20,184,166,0.8)]">🕹️</span>
                        C. Praktikum Web: Simulator Jarak (Distance)
                    </h3>
                    
                    <div class="relative z-10 mb-8 space-y-4">
                        <p class="text-gray-300 leading-relaxed text-base">
                            Mari kita buktikan perbedaan kedua rumus jarak (Euclidean vs Manhattan)! Ikuti instruksi dari <strong>Asisten Praktikum AI</strong> di bawah ini untuk menyelesaikan misi pembuktiannya.
                        </p>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-8 items-start relative z-10">
                        
                        <div class="w-full lg:w-1/2 space-y-6">
                            
                            <div id="tutorBox" class="bg-indigo-900/60 border-2 border-indigo-400 p-5 rounded-2xl shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-all duration-500 backdrop-blur-sm relative overflow-hidden">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-3xl drop-shadow-md" id="tutorIcon">👩‍🏫</span>
                                    <h4 class="font-black text-indigo-300 tracking-widest uppercase text-xs" id="tutorTitle">Misi Asisten Praktikum</h4>
                                </div>
                                <div id="tutorMsg" class="text-sm text-white font-medium leading-relaxed animate-pulse">
                                    <strong>Misi 1 (Jalur Lurus):</strong> Buat Titik Biru dan Merah sejajar mendatar! Geser <em>slider</em> <strong class="text-red-300">Posisi Y₂</strong> agar nilainya persis sama dengan <strong class="text-blue-300">Posisi Y₁</strong>.
                                </div>
                            </div>
                            
                            <div class="bg-black/60 p-5 rounded-2xl border border-blue-500/30 shadow-inner backdrop-blur-sm">
                                <h4 class="text-blue-400 font-bold mb-3 flex items-center gap-2"><div class="w-4 h-4 rounded-full bg-blue-500 shadow-[0_0_10px_#3b82f6]"></div>Titik A (Biru)</h4>
                                <div class="space-y-5">
                                    <div>
                                        <div class="flex justify-between text-xs text-gray-400 mb-2 font-bold tracking-widest uppercase"><label>Posisi X₁ (Horizontal)</label><span id="valAx" class="font-mono text-white text-sm bg-blue-900/50 px-2 py-0.5 rounded">2</span></div>
                                        <input type="range" id="slideAx" min="0" max="10" value="2" oninput="updateDistanceSim()" class="w-full accent-blue-500 cursor-grab active:cursor-grabbing">
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-xs text-gray-400 mb-2 font-bold tracking-widest uppercase"><label>Posisi Y₁ (Vertikal)</label><span id="valAy" class="font-mono text-white text-sm bg-blue-900/50 px-2 py-0.5 rounded">2</span></div>
                                        <input type="range" id="slideAy" min="0" max="10" value="2" oninput="updateDistanceSim()" class="w-full accent-blue-500 cursor-grab active:cursor-grabbing">
                                    </div>
                                </div>
                            </div>

                            <div class="bg-black/60 p-5 rounded-2xl border border-red-500/30 shadow-inner backdrop-blur-sm">
                                <h4 class="text-red-400 font-bold mb-3 flex items-center gap-2"><div class="w-4 h-4 rounded-full bg-red-500 shadow-[0_0_10px_#ef4444]"></div>Titik B (Merah)</h4>
                                <div class="space-y-5">
                                    <div>
                                        <div class="flex justify-between text-xs text-gray-400 mb-2 font-bold tracking-widest uppercase"><label>Posisi X₂ (Horizontal)</label><span id="valBx" class="font-mono text-white text-sm bg-red-900/50 px-2 py-0.5 rounded">8</span></div>
                                        <input type="range" id="slideBx" min="0" max="10" value="8" oninput="updateDistanceSim()" class="w-full accent-red-500 cursor-grab active:cursor-grabbing">
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-xs text-gray-400 mb-2 font-bold tracking-widest uppercase"><label>Posisi Y₂ (Vertikal)</label><span id="valBy" class="font-mono text-white text-sm bg-red-900/50 px-2 py-0.5 rounded">7</span></div>
                                        <input type="range" id="slideBy" min="0" max="10" value="7" oninput="updateDistanceSim()" class="w-full accent-red-500 cursor-grab active:cursor-grabbing">
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="flex-1 bg-teal-950/40 p-4 rounded-xl border border-teal-500/50 text-center shadow-[0_0_15px_rgba(20,184,166,0.1)]">
                                    <div class="text-[10px] text-teal-400 font-bold uppercase tracking-widest mb-1">Jalur Potong Kompas (Euclidean)</div>
                                    <div id="resEuc" class="text-3xl font-black font-mono text-white drop-shadow-md transition-all duration-300">7.81</div>
                                </div>
                                <div class="flex-1 bg-orange-950/40 p-4 rounded-xl border border-orange-500/50 text-center shadow-[0_0_15px_rgba(249,115,22,0.1)]">
                                    <div class="text-[10px] text-orange-400 font-bold uppercase tracking-widest mb-1">Jalur Taksi Belok (Manhattan)</div>
                                    <div id="resMan" class="text-3xl font-black font-mono text-white drop-shadow-md transition-all duration-300">11.00</div>
                                </div>
                            </div>

                        </div>

                        <div class="w-full lg:w-1/2 flex justify-center sticky top-6">
                            <div class="w-full max-w-[400px] aspect-square bg-[#0b0f19] rounded-2xl border-4 border-gray-700 relative overflow-hidden shadow-2xl" id="gridCanvas">
                                <div class="absolute inset-0 opacity-30 pointer-events-none" style="background-image: linear-gradient(#4b5563 1px, transparent 1px), linear-gradient(90deg, #4b5563 1px, transparent 1px); background-size: 10% 10%;"></div>
                                
                                <div id="lineManX" class="absolute bg-orange-500/80 transition-all duration-300 h-1.5 shadow-[0_0_5px_#f97316]"></div>
                                <div id="lineManY" class="absolute bg-orange-500/80 transition-all duration-300 w-1.5 shadow-[0_0_5px_#f97316]"></div>

                                <div id="lineEuc" class="absolute bg-teal-400 origin-left transition-all duration-300 h-1.5 shadow-[0_0_10px_#2dd4bf] z-10"></div>

                                <div id="dotA" class="absolute w-6 h-6 bg-blue-500 rounded-full transform -translate-x-1/2 -translate-y-1/2 shadow-[0_0_15px_#3b82f6] border-2 border-white transition-all duration-300 z-20 flex items-center justify-center text-[10px] font-black text-white">A</div>
                                <div id="dotB" class="absolute w-6 h-6 bg-red-500 rounded-full transform -translate-x-1/2 -translate-y-1/2 shadow-[0_0_15px_#ef4444] border-2 border-white transition-all duration-300 z-20 flex items-center justify-center text-[10px] font-black text-white">B</div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    let tutorStep = 1;

                    function startMission2() {
                        tutorStep = 2;
                        let tutorBox = document.getElementById('tutorBox');
                        let tutorMsg = document.getElementById('tutorMsg');
                        let tutorTitle = document.getElementById('tutorTitle');
                        let tutorIcon = document.getElementById('tutorIcon');
                        
                        tutorBox.className = "bg-indigo-900/60 border-2 border-indigo-400 p-5 rounded-2xl shadow-[0_0_15px_rgba(99,102,241,0.3)] transition-all duration-500 backdrop-blur-sm relative overflow-hidden";
                        tutorTitle.innerText = "Misi Asisten Praktikum";
                        tutorTitle.className = "font-black text-indigo-300 tracking-widest uppercase text-xs";
                        tutorIcon.innerText = "👩‍🏫";
                        
                        tutorMsg.innerHTML = "<strong>Misi 2 (Jalur Miring):</strong> Sekarang buat rutenya miring (diagonal)! Geser <em>slider</em> Titik Merah agar letaknya <strong>tidak sejajar sama sekali</strong> dengan Titik Biru.";
                        tutorMsg.classList.add('animate-pulse');
                        
                        // Reset warna kotak hasil
                        document.getElementById('resEuc').classList.remove('text-green-400', 'scale-110');
                        document.getElementById('resMan').classList.remove('text-green-400', 'scale-110');
                    }

                    function updateDistanceSim() {
                        let ax = parseInt(document.getElementById('slideAx').value);
                        let ay = parseInt(document.getElementById('slideAy').value);
                        let bx = parseInt(document.getElementById('slideBx').value);
                        let by = parseInt(document.getElementById('slideBy').value);

                        document.getElementById('valAx').innerText = ax;
                        document.getElementById('valAy').innerText = ay;
                        document.getElementById('valBx').innerText = bx;
                        document.getElementById('valBy').innerText = by;

                        let euc = Math.sqrt(Math.pow((bx - ax), 2) + Math.pow((by - ay), 2));
                        let man = Math.abs(bx - ax) + Math.abs(by - ay);

                        let elEuc = document.getElementById('resEuc');
                        let elMan = document.getElementById('resMan');
                        elEuc.innerText = euc.toFixed(2);
                        elMan.innerText = man.toFixed(2);

                        let tutorBox = document.getElementById('tutorBox');
                        let tutorMsg = document.getElementById('tutorMsg');
                        let tutorTitle = document.getElementById('tutorTitle');
                        let tutorIcon = document.getElementById('tutorIcon');

                        // LOGIKA MISI 1 (Lurus Horizontal atau Vertikal)
                        if (tutorStep === 1 && ((ay === by && ax !== bx) || (ax === bx && ay !== by))) {
                            tutorBox.className = "bg-green-900/60 border-2 border-green-400 p-5 rounded-2xl shadow-[0_0_15px_rgba(74,222,128,0.3)] transition-all duration-500 backdrop-blur-sm relative overflow-hidden";
                            tutorTitle.innerText = "Misi 1 Berhasil!";
                            tutorTitle.className = "font-black text-green-300 tracking-widest uppercase text-xs";
                            tutorIcon.innerText = "✅";
                            
                            tutorMsg.innerHTML = "<strong>Tepat Sekali!</strong> Saat jalurnya mendatar lurus, tidak ada bedanya mau potong kompas atau lewat jalan biasa. Angka Euclidean dan Manhattan <strong>SAMA BESAR</strong>.<br><button onclick='startMission2()' class='mt-4 bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-xl shadow-lg active:scale-95 transition-transform flex items-center gap-2'>Lanjut Misi 2 <span class='text-lg'>🚀</span></button>";
                            tutorMsg.classList.remove('animate-pulse');
                            
                            elEuc.classList.add('text-green-400', 'scale-110');
                            elMan.classList.add('text-green-400', 'scale-110');
                            tutorStep = 1.5; // Kunci agar tidak render berulang
                        } 
                        // LOGIKA MISI 2 (Diagonal/Miring)
                        else if (tutorStep === 2 && ax !== bx && ay !== by && euc > 3) {
                            tutorBox.className = "bg-blue-900/60 border-2 border-blue-400 p-5 rounded-2xl shadow-[0_0_15px_rgba(59,130,246,0.3)] transition-all duration-500 backdrop-blur-sm relative overflow-hidden";
                            tutorTitle.innerText = "Praktikum Selesai!";
                            tutorTitle.className = "font-black text-blue-300 tracking-widest uppercase text-xs";
                            tutorIcon.innerText = "🎉";
                            
                            tutorMsg.innerHTML = "<strong>Sempurna!</strong> Perhatikan kotak hasil. Karena rute <em>Manhattan</em> (oren) harus belok membentuk siku-siku seperti taksi, jarak tempuhnya <strong>pasti lebih jauh/besar</strong> dibandingkan rute <em>Euclidean</em> (biru) yang motong kompas miring! <br><br><span class='text-xs text-blue-300 italic'>Silakan bereksplorasi bebas sekarang.</span>";
                            tutorMsg.classList.remove('animate-pulse');
                            
                            tutorStep = 3; // Misi selesai
                        }

                        // Gambar Grafik Garis
                        let pxA = ax * 10; let pyA = 100 - (ay * 10); 
                        let pxB = bx * 10; let pyB = 100 - (by * 10);

                        document.getElementById('dotA').style.left = pxA + "%";
                        document.getElementById('dotA').style.top = pyA + "%";
                        document.getElementById('dotB').style.left = pxB + "%";
                        document.getElementById('dotB').style.top = pyB + "%";

                        let lineManX = document.getElementById('lineManX');
                        let lineManY = document.getElementById('lineManY');
                        
                        lineManX.style.left = Math.min(pxA, pxB) + "%";
                        lineManX.style.top = pyA + "%"; 
                        lineManX.style.width = Math.abs(pxB - pxA) + "%";
                        
                        lineManY.style.left = pxB + "%"; 
                        lineManY.style.top = Math.min(pyA, pyB) + "%";
                        lineManY.style.height = Math.abs(pyB - pyA) + "%";

                        let lineEuc = document.getElementById('lineEuc');
                        let eucPixelLength = euc * 10;
                        let angleRad = Math.atan2((pyB - pyA), (pxB - pxA)); 
                        let angleDeg = angleRad * (180 / Math.PI);

                        lineEuc.style.left = pxA + "%";
                        lineEuc.style.top = pyA + "%";
                        lineEuc.style.width = eucPixelLength + "%"; 
                        lineEuc.style.transform = "rotate(" + angleDeg + "deg)";
                    }

                    setTimeout(updateDistanceSim, 200);
                    window.addEventListener('resize', updateDistanceSim); 
                </script>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-red-900/50 shadow-2xl relative overflow-hidden">
                    <div class="absolute right-0 top-0 text-[10rem] opacity-5 pointer-events-none">💣</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-6">D. Jebakan Skala: Kenapa Wajib Normalisasi?</h3>
                    
                    <div class="relative z-10 space-y-6 text-gray-300 leading-relaxed">
                        <p>
                            Salah satu <strong>kesalahan paling fatal</strong> yang sering dilakukan oleh pemula saat membuat AI adalah langsung memasukkan "data mentah" ke dalam algoritma untuk dihitung jaraknya. Mari kita lihat mengapa ini sangat berbahaya melalui studi kasus berikut.
                        </p>

                        <div class="flex justify-center my-8 bg-white/5 p-4 rounded-2xl border border-red-500/30 backdrop-blur-sm shadow-inner max-w-5xl mx-auto">
                            <img src="/images/materi/image_fd7f5c.jpg" alt="Ilustrasi Jebakan Skala dan Solusi Normalisasi" class="rounded-xl shadow-[0_0_20px_rgba(0,0,0,0.4)] border-2 border-gray-800 max-w-full h-auto w-full transition-transform hover:scale-[1.01] duration-300" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x400/1e293b/a5b4fc?text=Gambar+Ilustrasi+Jebakan+Skala';">
                        </div>

                        <div class="bg-[#161b22] border border-gray-700 rounded-2xl p-6 shadow-lg">
                            <h4 class="text-xl font-bold text-red-400 mb-4 border-b border-gray-700 pb-2 flex items-center gap-2">
                                <span class="text-2xl">⚠️</span> Studi Kasus: Mengelompokkan Karyawan
                            </h4>
                            
                            <p class="mb-4 text-sm">Kita ingin mengelompokkan karyawan berdasarkan "Usia" dan "Gaji":</p>
                            
                            <ul class="space-y-3 font-mono text-sm text-gray-400 mb-6 bg-black/40 p-4 rounded-xl border border-gray-800">
                                <li><strong class="text-white">Karyawan A:</strong> Usia = 30 tahun | Gaji = Rp 5.000.000</li>
                                <li><strong class="text-white">Karyawan B:</strong> Usia = 50 tahun <span class="text-xs text-red-500 font-sans">(Beda 20 thn!)</span> | Gaji = Rp 5.200.000</li>
                            </ul>

                            <div class="bg-red-950/20 p-5 rounded-xl border border-red-500/30">
                                <p class="text-sm text-gray-300 mb-3">Mari kita hitung selisih jaraknya:</p>
                                <ul class="space-y-2 font-mono text-sm mb-4">
                                    <li class="flex items-center gap-2"><span>Δ (Delta) Usia (50 - 30) =</span> <span class="text-orange-400 font-bold">20</span></li>
                                    <li class="flex items-center gap-2"><span>Δ (Delta) Gaji (5.2jt - 5jt) =</span> <span class="text-red-400 font-bold">200.000</span></li>
                                </ul>
                                
                                <div class="p-4 bg-red-900/40 rounded-lg border border-red-500 text-sm text-red-200 shadow-inner">
                                    <strong class="text-lg text-white">💥 BOOM!</strong> Saat dimasukkan ke dalam rumus jarak, angka <strong class="text-white bg-red-800 px-1 rounded">200.000</strong> akan "memakan habis" angka <strong class="text-white bg-orange-800 px-1 rounded">20</strong>. 
                                </div>
                            </div>

                            <p class="mt-6 text-sm text-justify">
                                Akibatnya, komputer akan menganggap bahwa perbedaan gaji Rp200.000 itu "jauh lebih dahsyat" daripada perbedaan usia 20 tahun (padahal beda usia 20 tahun itu sangat signifikan!). Hasil klastering akan hancur berantakan dan bias total hanya karena fitur "Gaji" memiliki banyak angka nol.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-6 md:p-10 rounded-3xl border-2 border-green-900/50 shadow-2xl relative overflow-hidden">
                    <div class="absolute -left-10 -top-10 text-[10rem] opacity-5 pointer-events-none">⚖️</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline mb-6 relative z-10">E. Solusi: Normalisasi (Scaling)</h3>
                    
                    <div class="relative z-10 space-y-6">
                        <p class="text-gray-300 leading-relaxed text-justify">
                            Untuk mencegah fitur dengan angka besar "menjajah" fitur dengan angka kecil, kita wajib melakukan <strong>Normalisasi (Scaling)</strong>. Sebelum algoritma <em>K-Means</em> dijalankan, semua data harus diubah dan dipaksa masuk ke dalam rentang skala yang persis sama. 
                        </p>

                        <div class="bg-[#161b22] border border-gray-700 rounded-2xl p-6 shadow-lg mt-8">
                            <h4 class="text-xl font-bold text-green-400 mb-4 border-b border-gray-700 pb-2 flex items-center gap-2">
                                <span class="text-2xl">✨</span> Praktikum Interaktif: Kekuatan Normalisasi
                            </h4>
                            <p class="text-sm text-gray-400 mb-6">
                                Cobalah ubah angka Usia dan Gaji di bawah ini sesukamu! Perhatikan selisih jarak kasarnya. Lalu, tekan tombol Normalisasi untuk melihat bagaimana komputer menjinakkannya ke rentang 0-1.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
                                
                                <div class="bg-black/50 p-5 rounded-xl border border-gray-700 flex flex-col items-center relative transition-all duration-500" id="panelA">
                                    <div class="text-4xl mb-2">👨‍💼</div>
                                    <div class="font-bold text-white mb-4">Karyawan A</div>
                                    <div class="w-full space-y-3 font-mono text-sm">
                                        <div class="flex justify-between items-center p-2 rounded bg-gray-800 border border-transparent transition-all duration-300" id="boxUsiaA">
                                            <span class="text-gray-400">Usia:</span>
                                            <div class="flex items-center gap-2">
                                                <input type="number" id="inpUsiaA" value="30" oninput="hitungJarakMentah()" class="bg-gray-900 border border-gray-600 text-white rounded px-2 py-1.5 w-20 text-right font-bold focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                                                <span class="text-gray-500 text-xs w-6">thn</span>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center p-2 rounded bg-gray-800 border border-transparent transition-all duration-300" id="boxGajiA">
                                            <span class="text-gray-400">Gaji:</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-gray-500 text-xs">Rp</span>
                                                <input type="number" id="inpGajiA" value="5000000" oninput="hitungJarakMentah()" step="100000" class="bg-gray-900 border border-gray-600 text-white rounded px-2 py-1.5 w-28 text-right font-bold focus:ring-2 focus:ring-red-500 transition-all duration-300">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-black/50 p-5 rounded-xl border border-gray-700 flex flex-col items-center relative transition-all duration-500" id="panelB">
                                    <div class="text-4xl mb-2">👩‍💼</div>
                                    <div class="font-bold text-white mb-4">Karyawan B</div>
                                    <div class="w-full space-y-3 font-mono text-sm">
                                        <div class="flex justify-between items-center p-2 rounded bg-gray-800 border border-transparent transition-all duration-300" id="boxUsiaB">
                                            <span class="text-gray-400">Usia:</span>
                                            <div class="flex items-center gap-2">
                                                <input type="number" id="inpUsiaB" value="50" oninput="hitungJarakMentah()" class="bg-gray-900 border border-gray-600 text-white rounded px-2 py-1.5 w-20 text-right font-bold focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                                                <span class="text-gray-500 text-xs w-6">thn</span>
                                            </div>
                                        </div>
                                        <div class="flex justify-between items-center p-2 rounded bg-gray-800 border border-transparent transition-all duration-300" id="boxGajiB">
                                            <span class="text-gray-400">Gaji:</span>
                                            <div class="flex items-center gap-2">
                                                <span class="text-gray-500 text-xs">Rp</span>
                                                <input type="number" id="inpGajiB" value="5200000" oninput="hitungJarakMentah()" step="100000" class="bg-gray-900 border border-gray-600 text-white rounded px-2 py-1.5 w-28 text-right font-bold focus:ring-2 focus:ring-red-500 transition-all duration-300">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex flex-col items-center bg-gray-900 p-5 rounded-xl border border-gray-700 relative overflow-hidden">
                                    <div id="labelJarak" class="text-sm text-gray-400 mb-1 transition-colors">Jarak Euclidean (Data Mentah):</div>
                                    <div id="jarakHasil" class="text-3xl font-black font-mono text-red-500 mb-6 transition-all duration-500 drop-shadow-md">~ 200.001</div>
                                    
                                    <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                                        <button onclick="jalankanNormalisasi()" id="btnNorm" class="bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-500 hover:to-teal-500 text-white font-bold py-3 px-8 rounded-xl shadow-[0_0_15px_rgba(20,184,166,0.4)] active:scale-95 transition-all flex items-center justify-center gap-2">
                                            <span class="text-xl">⚙️</span> Lakukan Normalisasi
                                        </button>
                                        
                                        <button onclick="resetNormalisasi()" id="btnReset" class="hidden bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-8 rounded-xl shadow-md active:scale-95 transition-all flex items-center justify-center gap-2">
                                            <span class="text-xl">🔄</span> Ulangi
                                        </button>
                                    </div>

                                    <div id="pesanSukses" class="hidden mt-6 text-sm text-green-400 font-medium text-center animate-fade-in border border-green-500/30 bg-green-950/30 p-4 rounded-lg">
                                        <strong>Sukses!</strong> Data di atas baru saja diproses menggunakan rumus <em>Min-Max Scaler</em>. Sekarang jaraknya mengecil secara dramatis. Perbedaan Usia dan Gaji kini memiliki bobot pengaruh yang adil di mata AI!
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    const MIN_USIA = 23.333333, MAX_USIA = 56.666666; 
                    const MIN_GAJI = 4400000, MAX_GAJI = 6400000; 

                    function formatRupiah(angka) {
                        return new Intl.NumberFormat('id-ID').format(angka);
                    }

                    function hitungJarakMentah() {
                        let uA = parseFloat(document.getElementById('inpUsiaA').value) || 0;
                        let gA = parseFloat(document.getElementById('inpGajiA').value) || 0;
                        let uB = parseFloat(document.getElementById('inpUsiaB').value) || 0;
                        let gB = parseFloat(document.getElementById('inpGajiB').value) || 0;

                        let jarak = Math.sqrt(Math.pow(uB - uA, 2) + Math.pow(gB - gA, 2));
                        
                        document.getElementById('jarakHasil').innerText = "~ " + formatRupiah(Math.round(jarak));
                        document.getElementById('jarakHasil').className = "text-3xl font-black font-mono text-red-500 mb-6 transition-all duration-500 drop-shadow-md";
                        document.getElementById('labelJarak').innerText = "Jarak Euclidean (Data Mentah):";
                    }

                    setTimeout(hitungJarakMentah, 200);

                    function ubahUIInput(id, nilaiBaru) {
                        let inp = document.getElementById(id);
                        inp.setAttribute('data-ori', inp.value); 
                        inp.value = nilaiBaru;
                        inp.disabled = true;
                        inp.className = "bg-green-900/50 border-2 border-green-400 text-green-300 rounded px-2 py-1.5 w-28 text-center font-black transition-all duration-500 shadow-[0_0_10px_rgba(74,222,128,0.3)]";
                    }

                    function kembalikanUIInput(id) {
                        let inp = document.getElementById(id);
                        inp.value = inp.getAttribute('data-ori'); 
                        inp.disabled = false;
                        
                        let wClass = id.includes('Usia') ? 'w-20' : 'w-28';
                        inp.className = "bg-gray-900 border border-gray-600 text-white rounded px-2 py-1.5 " + wClass + " text-right font-bold focus:ring-2 focus:ring-blue-500 transition-all duration-300";
                    }

                    function jalankanNormalisasi() {
                        document.getElementById('btnNorm').classList.add('hidden');
                        
                        let uA = parseFloat(document.getElementById('inpUsiaA').value) || 0;
                        let gA = parseFloat(document.getElementById('inpGajiA').value) || 0;
                        let uB = parseFloat(document.getElementById('inpUsiaB').value) || 0;
                        let gB = parseFloat(document.getElementById('inpGajiB').value) || 0;

                        let norm_uA = ((uA - MIN_USIA) / (MAX_USIA - MIN_USIA)).toFixed(1);
                        let norm_gA = ((gA - MIN_GAJI) / (MAX_GAJI - MIN_GAJI)).toFixed(1);
                        let norm_uB = ((uB - MIN_USIA) / (MAX_USIA - MIN_USIA)).toFixed(1);
                        let norm_gB = ((gB - MIN_GAJI) / (MAX_GAJI - MIN_GAJI)).toFixed(1);

                        if(uA !== 30) norm_uA = ((uA - MIN_USIA) / (MAX_USIA - MIN_USIA)).toFixed(3);
                        if(uB !== 50) norm_uB = ((uB - MIN_USIA) / (MAX_USIA - MIN_USIA)).toFixed(3);
                        if(gA !== 5000000) norm_gA = ((gA - MIN_GAJI) / (MAX_GAJI - MIN_GAJI)).toFixed(3);
                        if(gB !== 5200000) norm_gB = ((gB - MIN_GAJI) / (MAX_GAJI - MIN_GAJI)).toFixed(3);

                        ubahUIInput('inpUsiaA', norm_uA);
                        ubahUIInput('inpGajiA', norm_gA);
                        ubahUIInput('inpUsiaB', norm_uB);
                        ubahUIInput('inpGajiB', norm_gB);

                        ['boxUsiaA', 'boxGajiA', 'boxUsiaB', 'boxGajiB'].forEach(id => {
                            document.getElementById(id).classList.replace('border-transparent', 'border-green-500/50');
                            document.getElementById(id).classList.replace('bg-gray-800', 'bg-green-950/20');
                        });

                        let jarakBaru = Math.sqrt(Math.pow(norm_uB - norm_uA, 2) + Math.pow(norm_gB - norm_gA, 2)).toFixed(3);
                        
                        const resJarak = document.getElementById('jarakHasil');
                        resJarak.innerText = jarakBaru;
                        resJarak.className = "text-4xl font-black font-mono text-green-400 mb-6 transition-all duration-700 scale-110 drop-shadow-[0_0_15px_rgba(74,222,128,0.8)]";
                        document.getElementById('labelJarak').innerText = "Jarak Euclidean (Setelah Normalisasi):";
                        document.getElementById('labelJarak').classList.add('text-green-400');

                        document.getElementById('pesanSukses').classList.remove('hidden');
                        document.getElementById('btnReset').classList.remove('hidden');
                    }

                    function resetNormalisasi() {
                        document.getElementById('pesanSukses').classList.add('hidden');
                        document.getElementById('btnReset').classList.add('hidden');
                        document.getElementById('btnNorm').classList.remove('hidden');

                        kembalikanUIInput('inpUsiaA');
                        kembalikanUIInput('inpGajiA');
                        kembalikanUIInput('inpUsiaB');
                        kembalikanUIInput('inpGajiB');

                        ['boxUsiaA', 'boxGajiA', 'boxUsiaB', 'boxGajiB'].forEach(id => {
                            document.getElementById(id).classList.replace('border-green-500/50', 'border-transparent');
                            document.getElementById(id).classList.replace('bg-green-950/20', 'bg-gray-800');
                        });

                        document.getElementById('labelJarak').classList.remove('text-green-400');
                        hitungJarakMentah();
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
                    data-question="Bagaimana cara algoritma K-Means (komputer) mengukur tingkat 'kemiripan' antar dua buah data?"
                    data-opt-a="Dengan membandingkan warna datanya."
                    data-opt-b="Dengan menerjemahkan kemiripan menjadi 'Jarak Matematika' (Distance). Jarak kecil berarti data sangat mirip."
                    data-opt-c="Dengan membaca teks deskripsi pada data."
                    data-opt-d="Dengan menjumlahkan semua angka pada dataset."
                    data-opt-e="Dengan menghitung jumlah huruf dari masing-masing label data."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Rumus jarak manakah yang bekerja dengan cara menarik 'garis lurus terpendek' (seperti burung terbang) dari titik A ke titik B, yang diadaptasi dari Teorema Pythagoras?"
                    data-opt-a="Manhattan Distance"
                    data-opt-b="Cosine Similarity"
                    data-opt-c="Euclidean Distance"
                    data-opt-d="Chebyshev Distance"
                    data-opt-e="Minkowski Distance"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan materi, apa keunggulan utama dari metode Manhattan Distance (Jarak Taksi New York)?"
                    data-opt-a="Sangat kebal terhadap data 'Pencilan' (Outlier) dan bagus untuk data berdimensi banyak."
                    data-opt-b="Perhitungannya jauh lebih cepat 100x lipat dari komputer biasa."
                    data-opt-c="Bisa melintasi gedung (menarik garis lurus) dalam perhitungannya."
                    data-opt-d="Hanya bisa digunakan untuk data berupa gambar visual."
                    data-opt-e="Menghitung kemiripan berdasarkan sudut kemiringan antar dua titik data."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada studi kasus karyawan, mengapa perbedaan Gaji Rp200.000 bisa merusak pengelompokan yang melibatkan Usia (selisih 20 tahun)?"
                    data-opt-a="Karena AI tidak bisa memproses mata uang Rupiah."
                    data-opt-b="Karena umur manusia maksimal hanya 100 tahun."
                    data-opt-c="Karena angka 200.000 memiliki nilai yang jauh lebih besar dan mendominasi angka 20 di dalam rumus jarak matematika."
                    data-opt-d="Karena perbedaan usia 20 tahun tidak penting bagi perusahaan."
                    data-opt-e="Karena variabel Gaji biasanya diletakkan pada sumbu Y yang nilainya tidak dihitung oleh algoritma."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Apa solusi (jalan keluar) agar fitur berskala besar (seperti gaji) tidak 'menjajah' fitur berskala kecil (seperti usia) saat dihitung oleh algoritma AI?"
                    data-opt-a="Menghapus fitur Gaji dan hanya menggunakan fitur Usia."
                    data-opt-b="Membulatkan angka Gaji menjadi puluhan ribu."
                    data-opt-c="Melakukan proses Scaling (Normalisasi) agar semua fitur diubah ke rentang yang sama (contoh: di antara 0 hingga 1)."
                    data-opt-d="Membeli komputer dengan prosesor yang lebih mahal."
                    data-opt-e="Mengubah data usia menjadi satuan detik agar nilai angkanya setara dengan ratusan ribu gaji."
                    data-answer="C">
                </div>
            </div>
EOT;

        // 3. Simpan ke Database
        Material::updateOrCreate(
            ['slug' => 'peran-jarak-distance'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Peran Jarak & Normalisasi',
                'type' => 'text', 
                'sequence' => 3, 
                'min_level' => 9,
                'content' => $content
            ]
        );

        $this->command->info('Materi Peran Jarak berhasil diperbarui dengan Multi-Quiz (5 Soal)!');
    }
}