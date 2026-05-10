<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_04_PersiapanLabelingSeeder extends Seeder
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
                                src="https://www.youtube.com/embed/hULdMAQFyBk?rel=0&modestbranding=1" 
                                title="Struktur Data" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-red-900 to-red-950 p-8 rounded-3xl border-2 border-red-500 shadow-[0_10px_30px_rgba(239,68,68,0.3)] relative overflow-hidden">
                    <div class="absolute -right-5 -top-5 text-9xl opacity-20">🗑️</div>
                    
                    <h3 class="text-3xl md:text-4xl font-black text-white text-outline-bold mb-4 relative z-10" style="line-height: 1.5;">
                        ⚠️ Garbage In, Garbage Out
                    </h3>
                    
                    <p class="text-lg leading-relaxed text-gray-200 relative z-10 font-medium mb-4">
                        Dalam dunia Data dan Kecerdasan Buatan (AI), ada satu hukum mutlak: 
                        <strong class="text-red-400 bg-red-950/50 px-2 rounded font-black text-xl">"Sampah Masuk, Sampah Keluar"</strong>.
                    </p>
                    
                    <div class="bg-black/40 backdrop-blur-sm p-5 rounded-2xl border border-red-500/30 relative z-10 text-gray-300 leading-relaxed">
                        <p>
                            Jika kamu memberi AI data yang buruk (seperti gambar buram, angka salah, atau label tertukar), maka AI akan belajar dari kesalahan itu dan menjadi "bodoh" saat memprediksi. 
                        </p>
                        <p class="mt-2 text-red-300 font-bold">
                            Itulah mengapa sebelum data digunakan, kita WAJIB melakukan 2 Tahap: Cleaning & Labeling.
                        </p>
                    </div>
                </div>

                <div class="bg-[#1e293b] p-8 rounded-3xl border border-gray-600 shadow-xl relative mt-12">
                    <div class="absolute top-4 right-6 text-6xl opacity-20 animate-pulse">🧹</div>
                    
                    <h4 class="text-3xl font-black text-blue-400 mb-6 text-outline">1. Tahap Membersihkan (Data Cleaning)</h4>
                    <p class="leading-relaxed mb-6 text-gray-300 text-lg">
                        Data dari dunia nyata (hasil survey, sensor, dll) jarang sekali yang langsung rapi. Kita harus "mencucinya" dulu. Berikut 3 musuh utama data kotor:
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gradient-to-b from-gray-800 to-gray-900 p-5 rounded-2xl border-t-4 border-t-yellow-500 shadow-lg hover:-translate-y-2 transition-transform">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="text-3xl">👯‍♂️</span>
                                <h5 class="font-bold text-yellow-400 text-lg">Data Duplikat</h5>
                            </div>
                            <p class="text-sm text-gray-400 leading-relaxed">
                                Data yang sama tercatat berulang kali. Ini sangat berbahaya karena bisa membuat AI <strong>bias (berat sebelah)</strong> terhadap data tersebut.
                            </p>
                            <div class="mt-3 bg-black p-2 rounded text-xs font-mono text-gray-500">
                                Budi, 17, Lulus<br>
                                <span class="text-red-500 line-through">Budi, 17, Lulus</span> (Hapus)
                            </div>
                        </div>

                        <div class="bg-gradient-to-b from-gray-800 to-gray-900 p-5 rounded-2xl border-t-4 border-t-red-500 shadow-lg hover:-translate-y-2 transition-transform">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="text-3xl">🕳️</span>
                                <h5 class="font-bold text-red-400 text-lg">Missing Values</h5>
                            </div>
                            <p class="text-sm text-gray-400 leading-relaxed">
                                Data yang kosong, hilang, atau tidak diisi. Harus dihapus barisnya, atau diisi dengan nilai rata-rata (imputasi).
                            </p>
                            <div class="mt-3 bg-black p-2 rounded text-xs font-mono text-gray-500">
                                Siti, 16, Lulus<br>
                                Anton, <span class="text-red-500 font-bold border border-red-500 px-1">NULL</span>, Gagal
                            </div>
                        </div>

                        <div class="bg-gradient-to-b from-gray-800 to-gray-900 p-5 rounded-2xl border-t-4 border-t-purple-500 shadow-lg hover:-translate-y-2 transition-transform">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="text-3xl">👽</span>
                                <h5 class="font-bold text-purple-400 text-lg">Outlier (Pencilan)</h5>
                            </div>
                            <p class="text-sm text-gray-400 leading-relaxed">
                                Data yang nilainya sangat aneh atau jauh dari kewajaran. Sering terjadi karena salah ketik (typo).
                            </p>
                            <div class="mt-3 bg-black p-2 rounded text-xs font-mono text-gray-500">
                                Umur: 15, 16, 17<br>
                                Umur: <span class="text-red-500 font-bold">160</span> (Tidak Wajar)
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#1e293b] p-8 rounded-3xl border border-gray-600 shadow-xl relative mt-12 overflow-hidden">
                    <div class="absolute -right-10 top-10 text-9xl opacity-10">🏷️</div>
                    
                    <h4 class="text-3xl font-black text-green-400 mb-4 text-outline">2. Tahap Memberi Nama (Data Labeling)</h4>
                    
                    <div class="bg-green-900/30 p-5 rounded-2xl border border-green-500/50 mb-6 flex flex-col md:flex-row gap-6 items-center">
                        <div class="text-5xl bg-green-800 p-3 rounded-full border-2 border-green-400 shrink-0">👶</div>
                        <div>
                            <h5 class="font-bold text-xl text-green-300 mb-2">Ingat Analogi Anak Kecil?</h5>
                            <p class="text-gray-300 leading-relaxed">
                                Saat anak kecil melihat gambar hewan untuk pertama kalinya, ia butuh "Guru" (orang tua) untuk memberi tahu: <em>"Ini Kucing"</em>. <br>
                                Proses manusia memberikan <strong>"Kunci Jawaban"</strong> kepada data agar komputer bisa belajar itulah yang disebut <strong>Labeling</strong>.
                            </p>
                        </div>
                    </div>

                    
                    <!-- Grid Contoh Labeling (Diperbarui) -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                        
                        <!-- Card Kucing -->
                        <div class="bg-black/50 rounded-xl overflow-hidden border border-gray-600 shadow-md group hover:border-green-500 transition-colors">
                            <!-- Perbaikan: Menggunakan aspect-square agar kotak menjadi persegi sempurna -->
                            <div class="aspect-square bg-white overflow-hidden relative flex items-center justify-center">
                                <!-- Perbaikan: Mengubah object-cover menjadi object-contain agar gambar tidak terpotong sama sekali -->
                                <img src="/images/materi/label-kucing.jpg" alt="Kucing" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="p-3 bg-gray-900 text-center border-t border-gray-700">
                                <span class="text-xs font-bold bg-green-500/20 text-green-400 border border-green-500 px-3 py-1 rounded-full uppercase tracking-widest">Kucing</span>
                            </div>
                        </div>
                        
                        <!-- Card Anjing -->
                        <div class="bg-black/50 rounded-xl overflow-hidden border border-gray-600 shadow-md group hover:border-red-500 transition-colors">
                            <div class="aspect-square bg-white overflow-hidden relative flex items-center justify-center">
                                <img src="/images/materi/label-anjing.jpg" alt="Anjing" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="p-3 bg-gray-900 text-center border-t border-gray-700">
                                <span class="text-xs font-bold bg-red-500/20 text-red-400 border border-red-500 px-3 py-1 rounded-full uppercase tracking-widest">Anjing</span>
                            </div>
                        </div>
                        
                        <!-- Card Apel -->
                        <div class="bg-black/50 rounded-xl overflow-hidden border border-gray-600 shadow-md group hover:border-yellow-500 transition-colors">
                            <div class="aspect-square bg-white overflow-hidden relative flex items-center justify-center">
                                <img src="/images/materi/label-apel.jpg" alt="Apel" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="p-3 bg-gray-900 text-center border-t border-gray-700">
                                <span class="text-xs font-bold bg-yellow-500/20 text-yellow-400 border border-yellow-500 px-3 py-1 rounded-full uppercase tracking-widest">Apel</span>
                            </div>
                        </div>
                        
                        <!-- Card Pisang -->
                        <div class="bg-black/50 rounded-xl overflow-hidden border border-gray-600 shadow-md group hover:border-yellow-500 transition-colors">
                            <div class="aspect-square bg-white overflow-hidden relative flex items-center justify-center">
                                <img src="/images/materi/label-pisang.jpg" alt="Pisang" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="p-3 bg-gray-900 text-center border-t border-gray-700">
                                <span class="text-xs font-bold bg-yellow-500/20 text-yellow-400 border border-yellow-500 px-3 py-1 rounded-full uppercase tracking-widest">Pisang</span>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="mt-16 mb-8">
                    <h3 class="text-3xl font-black text-center mb-4 text-white text-outline" style="line-height: 1.5;">🛠️ Praktikum: Menjadi Annotator</h3>
                    
                    <!-- Bagian teks penjelasan yang sudah ditambahkan definisi Annotator -->
                    <p class="text-center text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Di dunia nyata, teknologi AI yang canggih tidak pintar dengan sendirinya. Ada jutaan gambar yang harus dilabeli satu per satu oleh manusia secara manual agar AI bisa cerdas. Pekerja yang bertugas memberikan label pada data ini disebut sebagai <strong class="text-indigo-400 text-lg">Annotator</strong>.
                        <br><br>
                        Sekarang giliranmu merasakan menjadi seorang Annotator! Selesaikan misi di bawah ini. Hati-hati, jangan sampai salah memberi label, ya!
                    </p>

                    <div class="bg-[#0d1117] border border-gray-700 rounded-3xl p-6 md:p-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)] max-w-md mx-auto relative">
                        
                        <div class="flex justify-between items-center mb-6 border-b border-gray-700 pb-3">
                            <div class="text-indigo-400 font-mono text-sm font-bold tracking-widest">Simulator Pelabelan</div>
                            <div class="bg-gray-800 px-3 py-1 rounded text-xs text-gray-400 font-mono">
                                TASK: <span id="progressText" class="text-white">0/5</span>
                            </div>
                        </div>

                        <!-- Area Gambar Utama Praktikum -->
                        <div class="aspect-square bg-white border-2 border-dashed border-gray-600 rounded-2xl mb-8 relative overflow-hidden group shadow-inner flex items-center justify-center">
                            
                            <img id="itemDisplay" src="/images/materi/lab-tanya.jpg" alt="Tebak Gambar" class="w-full h-full object-contain p-4 transition-transform duration-300 group-hover:scale-110 drop-shadow-2xl">
                            
                            <div class="absolute inset-0 w-full h-full bg-gradient-to-b from-transparent via-indigo-500/10 to-transparent animate-[scan_2s_linear_infinite] pointer-events-none"></div>

                            <div id="statusLabel" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 transition-opacity font-black text-xl px-6 py-2 rounded-xl backdrop-blur-md shadow-2xl z-20 text-white">
                                Status
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <button onclick="labelItem('buah')" class="py-4 bg-gray-800 hover:bg-yellow-600 text-gray-300 hover:text-white rounded-xl font-bold transition-all border border-gray-600 hover:border-yellow-400 hover:shadow-[0_0_15px_rgba(202,138,4,0.5)]">
                                🍎 BUAH
                            </button>
                            <button onclick="labelItem('kendaraan')" class="py-4 bg-gray-800 hover:bg-blue-600 text-gray-300 hover:text-white rounded-xl font-bold transition-all border border-gray-600 hover:border-blue-400 hover:shadow-[0_0_15px_rgba(37,99,235,0.5)]">
                                🚗 KENDARAAN
                            </button>
                            <button onclick="labelItem('hewan')" class="py-4 bg-gray-800 hover:bg-pink-600 text-gray-300 hover:text-white rounded-xl font-bold transition-all border border-gray-600 hover:border-pink-400 hover:shadow-[0_0_15px_rgba(219,39,119,0.5)]">
                                🐱 HEWAN
                            </button>
                            <button onclick="labelItem('elektronik')" class="py-4 bg-gray-800 hover:bg-teal-600 text-gray-300 hover:text-white rounded-xl font-bold transition-all border border-gray-600 hover:border-teal-400 hover:shadow-[0_0_15px_rgba(13,148,136,0.5)]">
                                💻 ELEKTRONIK
                            </button>
                        </div>

                        <div class="mt-8 text-center hidden" id="resetLabContainer">
                            <button onclick="resetLab()" class="text-indigo-400 hover:text-indigo-300 font-bold uppercase tracking-widest text-sm hover:underline flex items-center justify-center gap-2 w-full">
                                <span>🔄</span> MULAI ULANG TRAINING
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-yellow-900/50 to-orange-900/50 p-6 rounded-2xl border-l-4 border-yellow-500 mt-10 mb-16 shadow-lg flex gap-4 items-start">
                    <div class="text-4xl">⚖️</div>
                    <div>
                        <h5 class="font-black text-xl text-yellow-400 mb-1 text-outline-sm">Etika Pengumpulan Data</h5>
                        <p class="text-sm text-gray-200 leading-relaxed font-medium">
                            Saat mengumpulkan data (foto wajah, suara, chat) untuk melatih AI, <strong>JAGA PRIVASI</strong> dan selalu <strong>MINTA IZIN</strong>. Jangan sembarangan menggunakan data pribadi orang lain tanpa persetujuan, karena itu melanggar hukum!
                        </p>
                    </div>
                </div>

                <style>
                    @keyframes scan {
                        0% { transform: translateY(-100%); }
                        100% { transform: translateY(100%); }
                    }
                </style>

                <script>
                    const dataset = [
                        { src: "/images/materi/lab-buah.jpg", type: "buah" },
                        { src: "/images/materi/lab-kendaraan.jpg", type: "kendaraan" },
                        { src: "/images/materi/lab-hewan.jpg", type: "hewan" },
                        { src: "/images/materi/lab-elektronik.jpg", type: "elektronik" },
                        { src: "/images/materi/lab-kendaraan2.jpg", type: "kendaraan" }
                    ];
                    
                    let currentIndex = 0;
                    let correctCount = 0;

                    function showItem() {
                        const display = document.getElementById('itemDisplay');
                        display.style.opacity = 0;
                        display.style.transform = 'scale(0.8)';
                        
                        setTimeout(() => {
                            if (currentIndex < dataset.length) {
                                display.src = dataset[currentIndex].src;
                                
                                // PERBAIKAN 1: Menambahkan backslash (\) sebelum $
                                document.getElementById('progressText').innerText = `\${currentIndex + 1}/\${dataset.length}`;
                                
                                display.style.opacity = 1;
                                display.style.transform = 'scale(1)';
                                
                                const btns = document.querySelectorAll('.grid button');
                                btns.forEach(b => b.disabled = false);
                            } else {
                                display.src = "/images/materi/lab-tanya.jpg";
                                display.style.opacity = 1;
                                display.style.transform = 'scale(1)';
                                
                                const feedback = document.getElementById('statusLabel');
                                
                                // PERBAIKAN 2: Menambahkan backslash (\) sebelum $
                                feedback.innerHTML = `🏆 LATIHAN SELESAI!<br><span class="text-lg">Skor: \${correctCount}/5</span>`;
                                
                                feedback.className = "absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-100 transition-opacity font-black text-2xl text-center px-8 py-4 rounded-2xl backdrop-blur-md shadow-[0_0_40px_rgba(37,99,235,0.8)] z-20 bg-blue-600/90 text-white border-2 border-blue-400";
                                
                                document.getElementById('progressText').innerText = "DONE";
                                document.getElementById('resetLabContainer').classList.remove('hidden');
                                
                                const btns = document.querySelectorAll('.grid button');
                                btns.forEach(b => b.disabled = true);
                            }
                        }, 200);
                    }

                    function labelItem(userLabel) {
                        if (currentIndex >= dataset.length) return;

                        const correctType = dataset[currentIndex].type;
                        const feedback = document.getElementById('statusLabel');
                        
                        const btns = document.querySelectorAll('.grid button');
                        btns.forEach(b => b.disabled = true);

                        if (userLabel === correctType) {
                            feedback.innerText = "✅ BENAR";
                            feedback.className = "absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-100 transition-opacity font-black text-3xl px-6 py-3 rounded-2xl backdrop-blur-md shadow-[0_0_30px_rgba(34,197,94,0.8)] z-20 bg-green-600/90 text-white border-2 border-green-400";
                            correctCount++;
                        } else {
                            feedback.innerText = "❌ SALAH";
                            feedback.className = "absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-100 transition-opacity font-black text-3xl px-6 py-3 rounded-2xl backdrop-blur-md shadow-[0_0_30px_rgba(239,68,68,0.8)] z-20 bg-red-600/90 text-white border-2 border-red-400";
                        }

                        setTimeout(() => {
                            feedback.classList.remove('opacity-100');
                            feedback.classList.add('opacity-0');
                            currentIndex++;
                            showItem();
                        }, 1000);
                    }

                    function resetLab() {
                        currentIndex = 0;
                        correctCount = 0;
                        document.getElementById('resetLabContainer').classList.add('hidden');
                        document.getElementById('statusLabel').classList.remove('opacity-100');
                        document.getElementById('statusLabel').classList.add('opacity-0');
                        document.getElementById('itemDisplay').src = "/images/materi/lab-tanya.jpg";
                        showItem();
                    }

                    setTimeout(showItem, 500);
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
                    data-question="Berdasarkan prinsip 'Garbage In, Garbage Out', apa yang akan terjadi jika kita melatih AI menggunakan data yang berisi kesalahan dan duplikat?"
                    data-opt-a="AI akan otomatis membersihkan data tersebut."
                    data-opt-b="AI akan menjadi bias dan menghasilkan prediksi (output) yang keliru (bodoh)."
                    data-opt-c="Kecepatan komputer akan meningkat."
                    data-opt-d="Data akan otomatis terhapus."
                    data-opt-e="AI akan menolak untuk memproses data tersebut sepenuhnya."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam tahap Data Cleaning, jika terdapat baris data yang kosong atau tidak diisi sama sekali, jenis 'musuh data' apakah itu?"
                    data-opt-a="Data Duplikat"
                    data-opt-b="Outlier (Pencilan)"
                    data-opt-c="Missing Values"
                    data-opt-d="Data Ordinal"
                    data-opt-e="Inconsistent Format"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Data usia yang bernilai '160 tahun' di antara sekumpulan data usia belasan tahun merupakan contoh dari..."
                    data-opt-a="Missing Values"
                    data-opt-b="Data Duplikat"
                    data-opt-c="Outlier (Pencilan)"
                    data-opt-d="Data Kualitatif"
                    data-opt-e="Data Terstruktur"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Apa tujuan utama dari tahapan Data Labeling dalam mempersiapkan Data untuk AI?"
                    data-opt-a="Untuk menghapus data-data ganda agar ukuran file menjadi lebih kecil."
                    data-opt-b="Untuk mengubah semua format teks menjadi angka agar bisa dibaca komputer."
                    data-opt-c="Untuk memberikan 'kunci jawaban' pada data agar AI bisa mengenali pola belajar."
                    data-opt-d="Untuk mempublikasikan data ke internet secara bebas."
                    data-opt-e="Untuk mewarnai sel data agar terlihat lebih menarik saat dipresentasikan."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Apa prinsip etika paling utama yang harus dijaga saat seorang Data Scientist mengumpulkan data dari orang lain?"
                    data-opt-a="Harus menyebarkan data tersebut secara gratis."
                    data-opt-b="Menjaga privasi dan selalu meminta izin dari pemilik data."
                    data-opt-c="Mengubah data tersebut agar sesuai dengan hasil yang diinginkan."
                    data-opt-d="Memastikan data berjumlah lebih dari 1 juta baris."
                    data-opt-e="Memastikan nama asli pemilik data selalu dicantumkan di laporan publik."
                    data-answer="B">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'persiapan-labeling'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Persiapan Data: Cleaning & Labeling',
                'type' => 'text',
                'sequence' => 5, 
                'min_level' => 1, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1: Persiapan Labeling berhasil diperbarui dengan Multi-Quiz!');
    }
}