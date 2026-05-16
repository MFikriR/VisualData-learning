<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_02_HistogramSeeder extends Seeder
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
                                src="https://www.youtube.com/embed/erRc0o5XRCc?rel=0&modestbranding=1" 
                                title="Video Pengantar Histogram" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-200 bg-black/40 backdrop-blur-sm inline-block px-4 py-1 rounded-full italic text-center mt-4 mx-auto block w-fit border border-white/10">
                        👆 Tonton video pengantar di atas untuk gambaran visual sebelum menyelami materi!
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-900 to-blue-900 p-8 rounded-3xl border border-indigo-500 shadow-xl relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 text-9xl opacity-10">📈</div>
                    
                    <h3 class="text-3xl font-black text-white text-outline-bold mb-4 relative z-10" style="line-height: 1.5;">
                        A. Apa itu Histogram?
                    </h3>
                    
                    <p class="text-lg leading-relaxed text-gray-200 relative z-10 font-medium mb-4">
                        Histogram adalah grafik yang digunakan untuk menampilkan <strong class="text-yellow-300">distribusi frekuensi</strong> dari data numerik (angka) yang bersifat kontinu. Sekilas memang terlihat mirip dengan Diagram Batang (<em>Bar Chart</em>), namun fungsinya sangat berbeda!
                    </p>
                    <p class="text-md leading-relaxed text-gray-300 relative z-10 mb-6">
                        Dalam *Data Science* dan AI, Histogram adalah senjata pertama (Langkah Exploratory Data Analysis) untuk melihat "Kesehatan Data".
                    </p>

                    <div class="bg-black/40 p-5 rounded-2xl border-l-4 border-indigo-400 backdrop-blur-sm relative z-10 flex items-start gap-4">
                        <div class="text-4xl">🔑</div>
                        <div>
                            <h4 class="text-indigo-300 font-bold mb-1">Kunci Pemahaman</h4>
                            <p class="text-sm text-gray-200 leading-relaxed">
                                Jika Diagram Batang menjawab <em>"Berapa banyak jumlah per kategori?"</em>, maka Histogram menjawab pertanyaan yang lebih dalam: <strong>"Bagaimana bentuk penyebaran data kita?"</strong>.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <h3 class="text-3xl font-black text-center mb-8 text-white text-outline" style="line-height: 1.5;">B. Jangan Sampai Tertukar!</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        
                        <div class="bg-[#1e293b] p-6 rounded-3xl border-t-8 border-t-blue-500 shadow-2xl relative">
                            <div class="absolute top-4 right-4 text-3xl opacity-50">📊</div>
                            <h4 class="text-2xl font-black text-blue-400 mb-4">Diagram Batang<br><span class="text-sm text-gray-400 font-normal">Bar Chart</span></h4>
                            
                            <ul class="space-y-4 text-sm text-gray-300">
                                <li class="flex items-start gap-3">
                                    <span class="text-blue-500 font-black">🏷️</span>
                                    <div><strong>Jenis Data:</strong> Kategorikal/Diskrit (Misal: Nama Buah, Merk HP, Kota).</div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-blue-500 font-black">🪟</span>
                                    <div><strong>Tampilan visual:</strong> Memiliki <strong>celah/spasi (gap)</strong> antar batang.</div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-blue-500 font-black">🔀</span>
                                    <div><strong>Urutan Batang:</strong> Bebas ditukar (Boleh Jeruk dulu, baru Apel).</div>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-[#1e293b] p-6 rounded-3xl border-t-8 border-t-purple-500 shadow-2xl relative transform md:scale-105 border border-purple-900/50 z-10">
                            <div class="absolute top-4 right-4 text-3xl opacity-50">📈</div>
                            <h4 class="text-2xl font-black text-purple-400 mb-4">Histogram<br><span class="text-sm text-gray-400 font-normal">Distribution Chart</span></h4>
                            
                            <ul class="space-y-4 text-sm text-gray-300">
                                <li class="flex items-start gap-3">
                                    <span class="text-purple-500 font-black">🔢</span>
                                    <div><strong>Jenis Data:</strong> Numerik Kontinu (Misal: Tinggi Badan, Umur, Gaji).</div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-purple-500 font-black">🧱</span>
                                    <div><strong>Tampilan visual:</strong> Batang <strong>saling berhimpit</strong> (menempel tanpa celah) untuk menunjukkan kontinuitas.</div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="text-purple-500 font-black">📏</span>
                                    <div><strong>Urutan Batang:</strong> <strong>TIDAK BISA ditukar</strong>. Sumbu X adalah garis bilangan yang harus urut.</div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="mt-16 bg-[#0f1115] p-8 rounded-3xl border-2 border-gray-700 shadow-2xl">
                    <h3 class="text-3xl font-black text-white text-outline mb-6">C. Anatomi Histogram & Konsep "Bin"</h3>
                    <p class="text-gray-300 leading-relaxed mb-8">
                        Untuk membuat Histogram, kita tidak bisa menggambar setiap angka satu per satu (bayangkan jika ada 1.000 data umur yang berbeda!). Kita harus memotong-motong jangkauan angka tersebut ke dalam "keranjang" yang disebut <strong>Bin (Interval Kelas)</strong>.
                    </p>
                    
                    <div class="flex flex-col lg:flex-row gap-8 items-start">
                        <!-- Kolom Kiri: Menampilkan 2 Gambar Baru -->
                        <div class="w-full lg:w-1/2 space-y-6">
                            
                            <!-- Gambar 1: Luas Area -->
                            <div class="bg-gray-800 p-4 rounded-xl border border-gray-600 shadow-inner relative flex flex-col items-center">
                                <div class="absolute top-3 left-3 flex gap-1.5">
                                    <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                                    <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                                    <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                                </div>
                                <img src="/images/materi/LuasArea.png" alt="Konsep Luas Area Histogram" class="rounded-lg mt-5 max-w-full h-auto object-contain border border-gray-700">
                                <p class="text-xs text-gray-400 mt-3 text-center italic">Konsep Luas Area pada Histogram</p>
                            </div>

                            <!-- Gambar 2: Aturan Sturges -->
                            <div class="bg-gray-800 p-4 rounded-xl border border-gray-600 shadow-inner relative flex flex-col items-center">
                                <div class="absolute top-3 left-3 flex gap-1.5">
                                    <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                                    <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                                    <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                                </div>
                                <img src="/images/materi/AturanStruges.png" alt="Aturan Sturges" class="rounded-lg mt-5 max-w-full h-auto object-contain border border-gray-700">
                                <p class="text-xs text-gray-400 mt-3 text-center italic">Menentukan Jumlah Bin dengan Aturan Sturges</p>
                            </div>

                        </div>

                        <!-- Kolom Kanan: Penjelasan Anatomi -->
                        <div class="w-full lg:w-1/2 space-y-4 sticky top-6">
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex gap-4 items-start">
                                <div class="bg-purple-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold shrink-0">X</div>
                                <div>
                                    <strong class="text-purple-300 block text-lg">Interval / Bin (Sumbu X)</strong>
                                    <p class="text-sm text-gray-400 mt-1">Rentang nilai data bersambung. Misal: Bin 1 [10-20], Bin 2 [20-30]. Angka 20 pada Bin 1 langsung menempel dengan Bin 2.</p>
                                </div>
                            </div>
                            
                            <div class="bg-gray-800/50 p-4 rounded-xl border border-gray-700 flex gap-4 items-start">
                                <div class="bg-purple-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold shrink-0">Y</div>
                                <div>
                                    <strong class="text-purple-300 block text-lg">Frekuensi (Sumbu Y)</strong>
                                    <p class="text-sm text-gray-400 mt-1">Jumlah data (orang/benda) yang masuk atau jatuh ke dalam rentang keranjang (bin) tersebut.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-center mb-4 text-white text-outline" style="line-height: 1.5;">D. "Bentuk" Data (Distribution Shapes)</h3>
                    <p class="text-center text-gray-400 mb-10 max-w-3xl mx-auto">
                        Dengan melihat bayangan Histogram, seorang Data Scientist bisa langsung menebak apakah data tersebut normal atau ada sesuatu yang aneh.
                    </p>

                    <div class="flex justify-center mb-8">
                        <img src="/images/materi/hist_shapes.png" alt="Bentuk Distribusi Data" class="rounded-2xl shadow-[0_0_30px_rgba(255,255,255,0.1)] border border-gray-700 max-w-full md:max-w-3xl h-auto" onerror="this.onerror=null; this.src='https://via.placeholder.com/800x300/111827/e2e8f0?text=Gambar+Bentuk+Histogram+(Normal,+Skewed)';">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-[#161b22] border-t-4 border-green-500 p-6 rounded-2xl shadow-lg relative group overflow-hidden">
                            <div class="absolute -right-4 -top-4 text-6xl opacity-10 group-hover:scale-110 transition-transform">🔔</div>
                            <h4 class="font-black text-green-400 text-xl mb-2">1. Distribusi Normal (Lonceng)</h4>
                            <p class="text-sm text-gray-400 leading-relaxed mb-3">
                                Bentuknya simetris seperti gunung. Mayoritas data berkumpul di tengah (rata-rata), dan semakin sedikit di ujung kiri/kanan.
                            </p>
                            <p class="text-xs bg-black/50 p-2 rounded border border-gray-700 text-gray-300">
                                <strong>Contoh:</strong> Tinggi badan manusia. Rata-rata 165cm banyak, yang 140cm atau 190cm sedikit.
                            </p>
                        </div>
                        
                        <div class="bg-[#161b22] border-t-4 border-yellow-500 p-6 rounded-2xl shadow-lg relative group overflow-hidden">
                            <div class="absolute -right-4 -top-4 text-6xl opacity-10 group-hover:scale-110 transition-transform">📉</div>
                            <h4 class="font-black text-yellow-400 text-xl mb-2">2. Skewed Right (Positif)</h4>
                            <p class="text-sm text-gray-400 leading-relaxed mb-3">
                                Ekor memanjang ke arah <strong>Kanan</strong>. Artinya mayoritas orang/data menumpuk di nilai yang <strong>Kecil (Kiri)</strong>.
                            </p>
                            <p class="text-xs bg-black/50 p-2 rounded border border-gray-700 text-gray-300">
                                <strong>Contoh:</strong> Gaji penduduk. Mayoritas UMR (kiri), sedikit sekali yang miliarder (ekor kanan).
                            </p>
                        </div>

                        <div class="bg-[#161b22] border-t-4 border-red-500 p-6 rounded-2xl shadow-lg relative group overflow-hidden">
                            <div class="absolute -right-4 -top-4 text-6xl opacity-10 group-hover:scale-110 transition-transform">📈</div>
                            <h4 class="font-black text-red-400 text-xl mb-2">3. Skewed Left (Negatif)</h4>
                            <p class="text-sm text-gray-400 leading-relaxed mb-3">
                                Ekor memanjang ke arah <strong>Kiri</strong>. Artinya mayoritas orang/data menumpuk di nilai yang <strong>Besar (Kanan)</strong>.
                            </p>
                            <p class="text-xs bg-black/50 p-2 rounded border border-gray-700 text-gray-300">
                                <strong>Contoh:</strong> Nilai ujian jika soalnya terlalu mudah (banyak yang dapat nilai 90-100).
                            </p>
                        </div>

                        <div class="bg-[#161b22] border-t-4 border-indigo-500 p-6 rounded-2xl shadow-lg relative group overflow-hidden">
                            <div class="absolute -right-4 -top-4 text-6xl opacity-10 group-hover:scale-110 transition-transform">🐪</div>
                            <h4 class="font-black text-indigo-400 text-xl mb-2">4. Bimodal (Dua Puncak)</h4>
                            <p class="text-sm text-gray-400 leading-relaxed mb-3">
                                Grafik seperti memiliki punggung unta (2 gunung). Ini indikasi ada dua kelompok data yang berbeda sifat namun tercampur.
                            </p>
                            <p class="text-xs bg-black/50 p-2 rounded border border-gray-700 text-gray-300">
                                <strong>Contoh:</strong> Grafik tinggi badan pria dan wanita dewasa jika digabung jadi satu.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-bold text-center mb-6">E. Pengayaan: Berapa Jumlah "Bin" yang Pas?</h3>
                    <p class="text-center text-gray-400 mb-8 max-w-2xl mx-auto text-sm">
                        Jika jumlah Bin terlalu sedikit, data terlihat kotak-kotak kaku. Jika Bin terlalu banyak, grafik jadi bergerigi dan pola tak terlihat. Ilmuwan menggunakan <strong>Aturan Sturges</strong> untuk menghitungnya.
                    </p>

                    <div class="bg-[#0d1117] border border-gray-700 rounded-3xl p-6 shadow-2xl max-w-2xl mx-auto relative overflow-hidden">
                        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
                        
                        <div class="flex flex-col md:flex-row items-center gap-8">
                            <div class="w-full md:w-1/2 bg-black p-6 rounded-2xl border border-gray-800 flex flex-col justify-center items-center h-full shadow-inner">
                                <span class="text-sm text-gray-500 font-bold mb-2 tracking-widest uppercase">Formula Sturges</span>
                                <div class="text-2xl font-mono text-purple-400 font-black">
                                    k = 1 + 3.3 log(n)
                                </div>
                                <p class="text-[10px] text-gray-500 mt-4 text-center">k = Jumlah Batang (Bin)<br>n = Total Jumlah Data</p>
                            </div>

                            <div class="w-full md:w-1/2 space-y-4">
                                <div>
                                    <label class="text-xs text-gray-400 font-bold block mb-2 uppercase tracking-wider">Masukkan Jumlah Data (n):</label>
                                    <input type="number" id="inputN" value="100" min="1" class="w-full bg-[#161b22] border-2 border-gray-600 focus:border-purple-500 text-white font-mono text-xl rounded-xl p-3 outline-none transition-colors text-center" placeholder="Misal: 100">
                                </div>
                                <button onclick="hitungSturges()" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-black py-3 rounded-xl shadow-lg transition-transform active:scale-95 flex justify-center items-center gap-2">
                                    <span>🧮</span> HITUNG BIN IDEAL
                                </button>

                                <!-- Menghapus class 'hidden' dan menggantinya dengan opacity-0 dan h-0 agar animasinya mulus -->
                                <div id="resultBox" class="opacity-0 h-0 overflow-hidden transition-all duration-500 ease-in-out bg-green-900/30 rounded-xl border border-green-500/50 text-center">
                                    <div class="p-4">
                                        <div class="text-xs text-green-300 font-bold uppercase tracking-widest mb-1">Hasil:</div>
                                        <div class="text-4xl font-black text-green-400">
                                            <span id="resultK" class="transition-transform duration-300 inline-block">0</span> <span class="text-xl">Batang</span>
                                        </div>
                                        <div class="text-[10px] font-mono text-green-500/80 mt-1">(Hasil logaritma dibulatkan)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function hitungSturges() {
                        let inputEl = document.getElementById("inputN");
                        let n = parseInt(inputEl.value);
                        
                        if (!n || n <= 0) {
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: "warning", 
                                    title: "Hmm, Data Tidak Valid", 
                                    text: "Jumlah data harus berupa angka positif ya!",
                                    background: "#1e1e24",
                                    color: "#fff",
                                    confirmButtonColor: "#8b5cf6"
                                });
                            } else {
                                alert("Jumlah data harus berupa angka positif ya!");
                            }
                            inputEl.classList.add('animate-[shake_0.5s_ease-in-out]');
                            setTimeout(() => inputEl.classList.remove('animate-[shake_0.5s_ease-in-out]'), 500);
                            return;
                        }

                        // Proses Matematika Sturges
                        let logN = Math.log10(n);
                        let k = 1 + (3.322 * logN); // 3.322 adalah konstanta standar Sturges yang lebih presisi
                        let kRounded = Math.round(k); // Math.round lebih akurat untuk membulatkan ke nilai terdekat

                        // Menampilkan Hasil dengan Animasi Transisi Halus
                        let resBox = document.getElementById("resultBox");
                        resBox.classList.remove("opacity-0", "h-0");
                        resBox.classList.add("opacity-100", "h-auto", "mt-4");
                        
                        let displayK = document.getElementById("resultK");
                        
                        // Efek angka membesar sesaat
                        setTimeout(() => {
                            displayK.innerText = kRounded;
                            displayK.classList.add('scale-125', 'text-white');
                            setTimeout(() => displayK.classList.remove('scale-125', 'text-white'), 300);
                        }, 150);
                    }
                </script>
                <style>
                    @keyframes shake {
                        0%, 100% { transform: translateX(0); }
                        25% { transform: translateX(-5px); }
                        50% { transform: translateX(5px); }
                        75% { transform: translateX(-5px); }
                    }
                    .animate-fade-in { animation: fadeIn 0.3s ease-in; }
                    @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
                </style>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-indigo-400 mb-4 text-outline-sm flex items-center gap-3">
                        <span class="text-4xl drop-shadow-[0_0_10px_rgba(79,70,229,0.8)]">💻</span>
                        F. DataViz Studio: Praktikum Membuat Histogram
                    </h3>
                    <p class="text-gray-300 mb-10 leading-relaxed text-base">
                        Sekarang saatnya kita melihat distribusi data secara nyata menggunakan studi kasus <strong>Nilai Ujian Siswa</strong>. Ikuti instruksi di layar untuk membangun <em>Workflow</em> pertamamu. Tanpa koding, cukup klik dan sambungkan di dalam studio visualisasi kita!
                    </p>

                    
                    <div class="bg-[#0f172a] rounded-3xl border border-gray-700 overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] flex flex-col xl:flex-row">
                        
                        
                        <div class="w-full xl:w-1/3 bg-gradient-to-b from-gray-800 to-[#1e293b] border-r border-gray-700 flex flex-col">
                            <div class="p-5 border-b border-gray-700 flex items-center justify-between bg-black/20">
                                <h4 class="font-black text-white flex items-center gap-2">
                                    <span class="text-indigo-400">⚙️</span> Control Panel
                                </h4>
                            </div>

                            <div class="p-6 space-y-6 overflow-y-auto custom-scrollbar">
                                
                                <div>
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-200 mb-2">
                                        <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">1</span>
                                        Data Mentah (CSV)
                                    </label>
                                    <p class="text-[10px] text-gray-400 mb-2">Masukkan nilai siswa dipisahkan dengan koma.</p>
                                    <textarea id="labDataInput" rows="3" class="w-full bg-black/50 border border-gray-600 rounded-lg p-3 text-xs text-indigo-300 font-mono focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none resize-none transition-all">42, 45, 51, 55, 58, 60, 61, 62, 62, 63, 64, 65, 65, 66, 67, 68, 68, 69, 69, 70, 70, 71, 71, 72, 72, 72, 73, 73, 74, 74, 74, 75, 75, 75, 75, 75, 76, 76, 76, 77, 77, 78, 78, 79, 79, 80, 80, 81, 81, 82, 83, 84, 85, 85, 86, 88, 90, 92, 95, 98</textarea>
                                </div>

                               
                                <div>
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-200 mb-2">
                                        <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">2</span>
                                        Pilih Mode Visualisasi
                                    </label>
                                    <select id="labChartType" class="w-full bg-black/50 border border-gray-600 rounded-lg p-2.5 text-sm text-white focus:border-indigo-500 outline-none appearance-none cursor-pointer">
                                        <option value="histogram">📈 Histogram (Distribusi)</option>
                                        <option value="bar" disabled>📊 Bar Chart (Kategorikal) - Tidak Cocok</option>
                                    </select>
                                </div>

                                
                                <div>
                                    <label class="flex items-center justify-between text-sm font-bold text-gray-200 mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">3</span>
                                            Atur Bin Width
                                        </div>
                                        <span id="labBinDisplay" class="bg-gray-900 text-indigo-400 font-mono px-2 py-0.5 rounded border border-gray-600 text-xs">5</span>
                                    </label>
                                    <input type="range" id="labBinSlider" min="1" max="20" value="5" class="w-full accent-indigo-500 cursor-pointer mt-1" oninput="document.getElementById('labBinDisplay').innerText = this.value; if(window.isChartGenerated) generateLabChart();">
                                    <div class="flex justify-between text-[9px] text-gray-500 mt-1 font-mono">
                                        <span>Rapat (1)</span>
                                        <span>Lebar (20)</span>
                                    </div>
                                </div>

                                
                                <div class="pt-4 border-t border-gray-700">
                                    <label class="flex items-center gap-2 text-sm font-bold text-gray-200 mb-3">
                                        <span class="bg-indigo-600 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">4</span>
                                        Render Grafik
                                    </label>
                                    <button onclick="generateLabChart()" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-black py-3.5 rounded-xl shadow-[0_0_15px_rgba(79,70,229,0.5)] transition-all active:scale-95 flex justify-center items-center gap-2 group">
                                        <span class="group-hover:animate-spin">⚙️</span> GENERATE HISTOGRAM
                                    </button>
                                </div>
                            </div>
                        </div>

                        
                        <div class="w-full xl:w-2/3 bg-[radial-gradient(#27272a_1px,transparent_1px)] [background-size:20px_20px] bg-[#0f172a] p-6 md:p-8 flex flex-col relative min-h-[400px]">
                            
                            
                            <div class="flex justify-between items-start mb-8">
                                <div>
                                    <h4 class="text-xl font-bold text-white mb-1">Canvas Output</h4>
                                    <p class="text-xs text-gray-400">Hasil visualisasi akan muncul di sini.</p>
                                </div>
                                <div id="labStatusBox" class="bg-gray-800/80 backdrop-blur border border-gray-600 rounded-lg p-2.5 flex items-center gap-3 hidden opacity-0 transition-opacity duration-500">
                                    <div class="text-[10px] uppercase text-gray-400 font-bold tracking-widest">Status Bentuk:</div>
                                    <div id="labStatusText" class="text-xs font-bold text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded">✨ Optimal</div>
                                </div>
                            </div>

                           
                            <div id="labEmptyState" class="flex-1 flex flex-col items-center justify-center text-center opacity-50">
                                <span class="text-6xl mb-4">📊</span>
                                <p class="text-gray-400 font-medium">Canvas masih kosong.</p>
                                <p class="text-xs text-gray-500 mt-1">Ikuti langkah 1-4 di panel kiri untuk mulai merender grafik.</p>
                            </div>

                            
                            <div id="labChartArea" class="flex-1 flex flex-col hidden opacity-0 transition-opacity duration-700 relative">
                                <div class="flex-1 flex items-end justify-center gap-[1px]" id="labBarsContainer">
                                    </div>
                                <div class="w-full h-px bg-gray-600 mt-1"></div>
                                <div class="text-center text-[10px] text-gray-500 font-mono mt-3 tracking-widest">
                                    SUMBU X: RENTANG NILAI (40 - 100)
                                </div>
                            </div>
                            
                            
                            <div id="labMisiRahasia" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-yellow-500/20 backdrop-blur-md border border-yellow-500/50 p-3 rounded-xl shadow-2xl hidden opacity-0 transition-all duration-700 translate-y-4">
                                <p class="text-xs text-yellow-300 font-bold flex items-center gap-2">
                                    <span></span>(Langkah 5): Coba ubah Bin Width di panel kiri sekarang!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <style>
                    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
                    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
                    .custom-scrollbar::-webkit-scrollbar-thumb { background: #475569; border-radius: 10px; }
                    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #64748b; }
                </style>

                
                <script>
                    window.isChartGenerated = false;

                    function generateLabChart() {
                        const rawInput = document.getElementById('labDataInput').value;
                        const dataArray = rawInput.split(',').map(num => parseFloat(num.trim())).filter(num => !isNaN(num));
                        
                        if (dataArray.length === 0) {
                            alert("Oops! Data mentah tidak valid. Pastikan formatnya angka yang dipisahkan koma.");
                            return;
                        }

                        window.isChartGenerated = true;

                        document.getElementById('labEmptyState').classList.add('hidden');
                        
                        const chartArea = document.getElementById('labChartArea');
                        chartArea.classList.remove('hidden');
                        setTimeout(() => chartArea.classList.remove('opacity-0'), 50);

                        const statusBox = document.getElementById('labStatusBox');
                        statusBox.classList.remove('hidden');
                        setTimeout(() => statusBox.classList.remove('opacity-0'), 50);

                        const misiBox = document.getElementById('labMisiRahasia');
                        misiBox.classList.remove('hidden');
                        setTimeout(() => {
                            misiBox.classList.remove('opacity-0', 'translate-y-4');
                        }, 1000);

                        const binWidth = parseInt(document.getElementById('labBinSlider').value);
                        
                        renderBars(dataArray, binWidth);
                    }

                    function renderBars(data, binWidth) {
                        const container = document.getElementById('labBarsContainer');
                        const statusText = document.getElementById('labStatusText');
                        container.innerHTML = '';

                        const minVal = Math.min(...data);
                        const maxVal = Math.max(...data);
                        
                        const startBin = Math.floor(minVal / 10) * 10; 
                        const endBin = Math.ceil(maxVal / 10) * 10;

                        if (binWidth <= 2) {
                            statusText.innerHTML = "⚠️ Terlalu Rapat";
                            statusText.className = "text-xs font-bold text-orange-400 bg-orange-400/10 px-2 py-1 rounded";
                        } else if (binWidth >= 12) {
                            statusText.innerHTML = "❌ Terlalu Lebar";
                            statusText.className = "text-xs font-bold text-red-400 bg-red-400/10 px-2 py-1 rounded";
                        } else {
                            statusText.innerHTML = "✨ Optimal";
                            statusText.className = "text-xs font-bold text-emerald-400 bg-emerald-400/10 px-2 py-1 rounded animate-pulse";
                        }

                        let bins = [];
                        for (let i = startBin; i <= endBin; i += binWidth) {
                            bins.push({ min: i, max: i + binWidth - 0.01, count: 0 });
                        }

                        data.forEach(val => {
                            for (let b of bins) {
                                if (val >= b.min && val <= b.max) { 
                                    b.count++; 
                                    break; 
                                }
                            }
                        });

                        let firstNonEmpty = bins.findIndex(b => b.count > 0);
                        let lastNonEmpty = bins.map(b => b.count > 0).lastIndexOf(true);
                        
                        firstNonEmpty = Math.max(0, firstNonEmpty - 1);
                        lastNonEmpty = Math.min(bins.length - 1, lastNonEmpty + 1);
                        bins = bins.slice(firstNonEmpty, lastNonEmpty + 1);

                        let maxCount = Math.max(...bins.map(b => b.count));
                        if(maxCount === 0) maxCount = 1; 

                        let htmlContent = '';
                        bins.forEach(b => {
                            let heightPercent = (b.count / maxCount) * 95; 
                            
                            let labelHtml = '';
                            if (b.count > 0) {
                                labelHtml = '<div class="absolute bottom-full mb-1 bg-white text-black text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-20 pointer-events-none drop-shadow-md">' + b.count + '</div>';
                            }

                            let rangeHtml = '<div class="absolute top-full mt-1 bg-black text-gray-400 text-[8px] font-mono px-1 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-10 pointer-events-none border border-gray-700">[' + Math.round(b.min) + '-' + Math.round(b.max) + ']</div>';
                            
                            htmlContent += '<div class="flex-1 flex flex-col justify-end items-center group relative h-full">' +
                                '<div class="w-full bg-indigo-500 hover:bg-indigo-400 border-t border-r border-indigo-300 transition-all duration-300 shadow-[0_0_10px_rgba(79,70,229,0.1)]" style="height: ' + heightPercent + '%;"></div>' +
                                labelHtml + rangeHtml +
                            '</div>';
                        });
                        
                        container.innerHTML = htmlContent;
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
                    data-question="Perbedaan paling mendasar antara Bar Chart (Diagram Batang) dan Histogram jika dilihat dari tampilan visual batangnya adalah...."
                    data-opt-a="Histogram memiliki celah antar batangnya, Bar Chart menempel."
                    data-opt-b="Batang pada Histogram saling berhimpit (menempel tanpa celah) untuk menunjukkan kontinuitas angka."
                    data-opt-c="Histogram menggunakan warna cerah, Bar Chart menggunakan warna gelap."
                    data-opt-d="Keduanya tidak memiliki perbedaan visual sama sekali."
                    data-opt-e="Histogram menggunakan garis (line), sedangkan Bar Chart menggunakan balok."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sumbu Y (vertikal) pada Histogram yang memiliki sumbu X berisi angka umur (10, 20, 30, dan seterusnya) menunjukkan...."
                    data-opt-a="Kategori atau nama orang."
                    data-opt-b="Jumlah atau frekuensi orang yang masuk ke dalam rentang umur tersebut."
                    data-opt-c="Rata-rata gaji orang tersebut."
                    data-opt-d="Batas waktu."
                    data-opt-e="Nilai persentase kumulatif dari seluruh data yang ada."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Bentuk grafik distribusi gaji penduduk suatu negara yang memiliki “ekor memanjang ke arah kanan” (mayoritas UMR di kiri, segelintir miliarder di kanan) disebut...."
                    data-opt-a="Distribusi Normal"
                    data-opt-b="Bimodal"
                    data-opt-c="Skewed Left (Negatif)"
                    data-opt-d="Skewed Right (Positif)"
                    data-opt-e="Uniform Distribution (Distribusi Seragam)"
                    data-answer="D">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Rumus yang digunakan ilmuwan untuk menghitung jumlah kotak (Bin) ideal dalam sebuah Histogram agar grafik tidak terlalu bergerigi atau terlalu kaku adalah...."
                    data-opt-a="Rumus Pythagoras"
                    data-opt-b="Aturan Sturges (k = 1 + 3.3 log n)"
                    data-opt-c="Teorema Bayes"
                    data-opt-d="Rumus Regresi Linear"
                    data-opt-e="Kaidah Frekuensi Relatif"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dampak pengaturan Lebar Batang (Bin Width) yang terlalu kecil atau rapat (misalnya 1 atau 2) pada bentuk Histogram adalah...."
                    data-opt-a="Grafik menghilang dari layar."
                    data-opt-b="Pola distribusi normal akan terlihat sangat sempurna."
                    data-opt-c="Grafik menjadi kotak raksasa yang menyembunyikan semua detail."
                    data-opt-d="Grafik menjadi sangat bergerigi, berduri, dan terlalu banyak noise."
                    data-opt-e="Warna batang grafik akan berubah menjadi merah."
                    data-answer="D">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'konsep-histogram'],
            [
                'chapter_id' => $chapterId,
                'title' => 'Konsep Histogram',
                'type' => 'text',
                'sequence' => 3, 
                'min_level' => 5,
                'content' => $content,
            ]
        );
        
        $this->command->info('Materi Histogram berhasil diperbarui dengan DataViz Studio & Multi-Quiz!');
    }
}