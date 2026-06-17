<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab2_01_VisualisasiDataSeeder extends Seeder
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

                <div class="mb-12 bg-[#e7e1b1] border-l-4 border-[#306d29] p-6 md:p-8 rounded-r-2xl shadow-lg relative overflow-hidden">
                    <h3 class="text-xl md:text-2xl font-black text-[#306d29] mb-4 flex items-center gap-2">
                        <span>🎯</span> Tujuan Pembelajaran Bab 2
                    </h3>
                    <p class="mb-4 font-medium">Setelah mempelajari bab ini, kamu diharapkan mampu:</p>
                    <ul class="space-y-3 text-[#0d530e] text-sm md:text-base">
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#306d29] font-bold">1.</span>
                            <p>Memahami pentingnya <strong>visualisasi data</strong> dan memilih jenis grafik yang tepat.</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#306d29] font-bold">2.</span>
                            <p>Menganalisis distribusi data tunggal melalui <strong>Diagram Batang</strong>, <strong>Histogram</strong>, dan <strong>Box Plot</strong>.</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#306d29] font-bold">3.</span>
                            <p>Mendeteksi keberadaan data aneh atau ekstrem <strong>(Outlier)</strong> pada kumpulan data.</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#306d29] font-bold">4.</span>
                            <p>Membaca hubungan korelasi antar dua variabel memanfaatkan media <strong>Scatter Plot</strong>.</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        A. Mengapa Data Perlu Divisualisasikan?
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p>Pada Bab 1, kita telah mempelajari bagaimana data dikumpulkan, dibersihkan dari duplikat, hingga dianalisis menggunakan rumus spreadsheet. Namun, data yang sudah rapi tersebut sering kali masih disajikan dalam bentuk tabel angka yang kaku. Data yang disajikan dalam bentuk tabel berkali-kali terbukti sulit dipahami, terutama jika volume datanya sangat masif.</p>
                        <p>Oleh karena itu, di sinilah kita memerlukan <strong>Visualisasi Data</strong>. Visualisasi data adalah sebuah proses menyajikan sekumpulan data ke dalam format visual atau grafis—seperti diagram batang, grafik lingkaran, peta, atau gambar—sehingga pola rahasia, perbandingan, tren, dan pencilan (<em>outlier</em>) yang penting di dalamnya bisa langsung ditangkap oleh mata secara instan.</p>
                    </div>

                    <div class="bg-[#fbf5dd] p-6 md:p-8 rounded-3xl border-2 border-dashed border-[#306d29]/40 shadow-sm my-8 relative overflow-hidden">
                        <div class="absolute -right-8 -top-8 text-7xl opacity-10 rotate-12 select-none">⚡</div>
                        <h4 class="text-xl font-black text-[#0d530e] mb-2 flex items-center gap-2">
                            <span>🚀</span> Aktivitas Pemantik: Tantangan Detektif Data
                        </h4>
                        <p class="text-sm text-[#306d29] leading-relaxed mb-6 font-medium">
                            Sebelum kita membahas teori lebih jauh, mari kita uji seberapa cepat otakmu memproses informasi. Kantin sekolah mengumpulkan data acak dari puluhan transaksi penjualan. Tugasmu: <strong>Temukan menu makanan apa yang paling tidak laku (penjualan paling sedikit)!</strong>
                        </p>

                        <div class="bg-white p-6 rounded-2xl border border-[#e7e1b1] shadow-inner text-center">
                            
                            <div id="pemantik-start-zone" class="py-6">
                                <p class="text-sm text-gray-500 mb-4 font-sans">Waktu akan dihitung secara real-time saat kamu menekan tombol di bawah.</p>
                                <button type="button" onclick="startPemantikChallenge()" class="px-8 py-3.5 bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] font-black rounded-xl text-base transition-all transform hover:-translate-y-0.5 shadow-md active:scale-95">
                                    ⏱️ MULAI TANTANGAN WAKTU
                                </button>
                            </div>

                            <div id="pemantik-quiz-zone" class="hidden space-y-6">
                                <div class="flex justify-between items-center bg-[#fbf5dd] px-4 py-2 rounded-xl text-xs font-mono font-bold text-[#306d29] border border-[#e7e1b1]">
                                    <span>⏱️ WAKTU BERJALAN: <span id="pemantik-timer" class="text-red-600">0.0</span> detik</span>
                                    <span class="animate-pulse text-red-600">● LIVE TEST</span>
                                </div>
                                
                                <p class="text-sm font-bold text-left text-gray-700 bg-gray-50 p-2 rounded border-l-4 border-amber-500">Cari makanan dengan angka penjualan TERKECIL pada tabel di bawah ini secepat mungkin!</p>
                                
                                <div class="overflow-x-auto rounded-xl border border-gray-200">
                                    <table class="w-full text-xs font-mono text-center divide-y divide-gray-100">
                                        <thead class="bg-gray-50 text-gray-500">
                                            <tr>
                                                <th class="p-2 border-r">Menu</th><th class="p-2 border-r">Terjual</th>
                                                <th class="p-2 border-r">Menu</th><th class="p-2 border-r">Terjual</th>
                                                <th class="p-2 border-r">Menu</th><th class="p-2">Terjual</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100 text-gray-700 font-bold">
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-gray-50">Bakso A</td><td class="p-2 border-r">45</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Mie Goreng</td><td class="p-2 border-r">38</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Soto Ayam</td><td class="p-2">24</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-gray-50">Nasi Bakar</td><td class="p-2 border-r">52</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Batagor</td><td class="p-2 border-r">19</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Gado-Gado</td><td class="p-2">31</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-gray-50">Siomay</td><td class="p-2 border-r">42</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Mie Ayam B</td><td class="p-2 border-r">29</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Ayam Geprek</td><td class="p-2">61</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-gray-50">Sate Ayam</td><td class="p-2 border-r">33</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Nasi Kuning</td><td class="p-2 border-r">14</td>
                                                <td class="p-2 text-left font-sans bg-gray-50">Kwetiau</td><td class="p-2">27</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-2">
                                    <button type="button" onclick="submitPemantikAnswer(false)" class="p-3 bg-gray-100 hover:bg-[#306d29] hover:text-white font-bold rounded-xl text-xs transition-all">Soto Ayam</button>
                                    <button type="button" onclick="submitPemantikAnswer(false)" class="p-3 bg-gray-100 hover:bg-[#306d29] hover:text-white font-bold rounded-xl text-xs transition-all">Batagor</button>
                                    <button type="button" onclick="submitPemantikAnswer(true)" class="p-3 bg-gray-100 hover:bg-[#306d29] hover:text-white font-bold rounded-xl text-xs transition-all border-2 border-dashed border-[#306d29]/40">Nasi Kuning</button>
                                    <button type="button" onclick="submitPemantikAnswer(false)" class="p-3 bg-gray-100 hover:bg-[#306d29] hover:text-white font-bold rounded-xl text-xs transition-all">Kwetiau</button>
                                </div>
                            </div>

                            <div id="pemantik-result-zone" class="hidden p-4 bg-green-50 rounded-xl border border-green-200 animate-fade-in text-left">
                                <h5 class="font-black text-lg text-[#0d530e] mb-1">🎉 Jawabanmu Tepat: Nasi Kuning!</h5>
                                <p class="text-sm text-[#306d29] mb-4">Kamu membutuhkan waktu <span id="pemantik-final-time" class="font-mono font-black text-red-600">0.0</span> detik untuk menyisir angka-angka di atas.</p>
                                
                                <div class="border-t border-[#306d29]/20 pt-3 space-y-2 text-xs md:text-sm text-[#0d530e] leading-relaxed">
                                    <p><strong>Refleksi Pemantik:</strong> Mengapa mata kita butuh waktu beberapa detik untuk menemukan angka 14? Karena di dalam sebuah tabel, kita dipaksa membaca sel baris secara berurutan.</p>
                                    <p>Sekarang, coba perhatikan grafik interaktif di bawah ini. Hanya dalam kedipan mata, otakmu langsung tahu mana menu yang paling rendah peminatnya tanpa harus mengeja angka!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-8">
                        <div class="text-center mb-6">
                            <h4 class="text-xl font-black text-[#0d530e] mb-1">🏪 Lab Mandiri: Live Grafik Kantin</h4>
                            <p class="text-xs text-[#306d29] font-medium">Sebagai perbandingan, ubah nilai porsi terjual pada tabel putih di bawah, lalu amati bagaimana panjang grafik di sebelahnya merespon secara instan!</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            <div class="bg-white rounded-xl shadow-inner border border-gray-200 p-4">
                                <table class="w-full text-sm text-center border-collapse">
                                    <thead class="bg-[#306d29] text-[#fbf5dd] font-bold">
                                        <tr>
                                            <th class="p-2.5 rounded-tl-lg text-left pl-4">Produk</th>
                                            <th class="p-2.5 rounded-tr-lg">Jumlah Terjual</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-[#0d530e] font-mono font-bold divide-y divide-gray-100">
                                        <tr>
                                            <td class="p-3 text-left font-sans">Bakso</td>
                                            <td class="p-1"><input type="number" id="kantin-bakso" value="50" oninput="updateKantinChart()" class="w-20 p-1.5 border border-gray-300 rounded text-center focus:border-[#306d29] outline-none"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-left font-sans">Mie Ayam</td>
                                            <td class="p-1"><input type="number" id="kantin-mie" value="30" oninput="updateKantinChart()" class="w-20 p-1.5 border border-gray-300 rounded text-center focus:border-[#306d29] outline-none"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-left font-sans">Soto</td>
                                            <td class="p-1"><input type="number" id="kantin-soto" value="20" oninput="updateKantinChart()" class="w-20 p-1.5 border border-gray-300 rounded text-center focus:border-[#306d29] outline-none"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-left font-sans">Nasi Goreng</td>
                                            <td class="p-1"><input type="number" id="kantin-nasgor" value="40" oninput="updateKantinChart()" class="w-20 p-1.5 border border-gray-300 rounded text-center focus:border-[#306d29] outline-none"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-md space-y-4 font-sans text-xs md:text-sm font-bold">
                                <div>
                                    <div class="flex justify-between mb-1"><span>Bakso</span><span id="lbl-bakso" class="font-mono text-[#306d29]">50</span></div>
                                    <div class="w-full bg-gray-100 h-4 rounded-full overflow-hidden"><div id="bar-bakso" class="bg-[#306d29] h-full rounded-full transition-all duration-300" style="width: 50%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1"><span>Mie Ayam</span><span id="lbl-mie" class="font-mono text-[#306d29]">30</span></div>
                                    <div class="w-full bg-gray-100 h-4 rounded-full overflow-hidden"><div id="bar-mie" class="bg-[#306d29]/80 h-full rounded-full transition-all duration-300" style="width: 30%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1"><span>Soto</span><span id="lbl-soto" class="font-mono text-[#306d29]">20</span></div>
                                    <div class="w-full bg-gray-100 h-4 rounded-full overflow-hidden"><div id="bar-soto" class="bg-[#306d29]/60 h-full rounded-full transition-all duration-300" style="width: 20%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1"><span>Nasi Goreng</span><span id="lbl-nasgor" class="font-mono text-[#306d29]">40</span></div>
                                    <div class="w-full bg-gray-100 h-4 rounded-full overflow-hidden"><div id="bar-nasgor" class="bg-[#306d29]/40 h-full rounded-full transition-all duration-300" style="width: 40%"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8 mt-6">
                        <img src="/images/visualisasi-data-kantin.png" alt="Visualisasi Data Kantin" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar visualisasi-data-kantin.png di folder public/images/</div>';">
                        <p class="text-sm text-[#306d29] italic mt-3">Gambar 1. Visualisasi data membantu menyajikan informasi sehingga lebih mudah dipahami dibandingkan hanya melihat tabel data.</p>
                    </div>

                    <div class="bg-[#fbf5dd] p-6 md:p-8 rounded-2xl border border-[#e7e1b1] shadow-sm my-6">
                        <h4 class="font-bold text-[#306d29] text-xl mb-4 flex items-center gap-2"><span>📋</span> Manfaat Visualisasi Data</h4>
                        <p class="text-sm mb-4 font-medium">Visualisasi data memiliki beberapa manfaat penting dalam tata kelola informasi, antara lain:</p>
                        <ul class="list-decimal pl-6 space-y-3 text-sm md:text-base font-medium">
                            <li><strong class="text-[#306d29]">Mempermudah memahami data dalam jumlah besar:</strong> Mampu merangkum ribuan baris data kaku ke dalam format satu halaman gambar grafik yang informatif.</li>
                            <li><strong class="text-[#306d29]">Memudahkan perbandingan antar data:</strong> Membantu mata membandingkan porsi tinggi rendah nilai antar entitas secara cepat tanpa membaca angka satu per satu.</li>
                            <li><strong class="text-[#306d29]">Membantu menemukan pola, tren, dan hubungan data:</strong> Memetakan arah pergerakan data dari waktu ke waktu, misalnya mendeteksi grafik penjualan yang cenderung naik atau turun berkelanjutan.</li>
                            <li><strong class="text-[#306d29]">Mempermudah penyampaian informasi kepada orang lain:</strong> Menyajikan data dengan bahasa visual yang menarik sehingga mudah dimengerti bahkan oleh masyarakat umum yang awam matematika.</li>
                            <li><strong class="text-[#306d29]">Mendukung pengambilan keputusan (Decision Making):</strong> Menyajikan fakta grafis yang akurat dan objektif sebagai fondasi kokoh bagi para pemimpin untuk menentukan kebijakan strategis.</li>
                        </ul>
                    </div>

                    <div class="mt-12 mb-8">
                        <h4 class="font-bold text-[#306d29] text-2xl mb-4 border-b border-[#306d29]/20 pb-2">Contoh dalam Kehidupan Sehari-hari</h4>
                        <p class="text-lg leading-relaxed mb-6">Visualisasi data tidak hanya digunakan oleh ilmuwan di laboratorium, melainkan sering digunakan dalam berbagai bidang di kehidupan kita sehari-hari, misalnya:</p>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-6">
                            <img src="/images/contoh-visualisasi-sehari-hari.jpg" alt="Contoh Visualisasi Data dalam Kehidupan Sehari-hari" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-visualisasi-sehari-hari.jpg di folder public/images/</div>';">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1] shadow-sm">
                                <h5 class="font-bold text-[#306d29] mb-2 flex items-center gap-2"><span>⛅</span> Aplikasi Cuaca</h5>
                                <p class="text-sm text-[#0d530e]">Menampilkan grafik naik-turunnya prakiraan suhu dan curah hujan harian agar kita bisa bersiap membawa payung.</p>
                            </div>
                            <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1] shadow-sm">
                                <h5 class="font-bold text-[#306d29] mb-2 flex items-center gap-2"><span>🛒</span> Toko Online</h5>
                                <p class="text-sm text-[#0d530e]">Menampilkan <em>dashboard</em> grafik barang apa saja yang paling banyak terjual bulan ini bagi para penjual (<em>seller</em>).</p>
                            </div>
                            <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1] shadow-sm">
                                <h5 class="font-bold text-[#306d29] mb-2 flex items-center gap-2"><span>⌚</span> Pelacak Kesehatan</h5>
                                <p class="text-sm text-[#0d530e]"><em>Smartwatch</em> atau aplikasi HP yang menyajikan grafik jumlah langkah kaki, detak jantung, dan kualitas tidur kita.</p>
                            </div>
                        </div>

                        <div class="bg-[#306d29] text-[#fbf5dd] p-6 rounded-2xl shadow-lg font-medium text-lg leading-relaxed text-center">
                            Tanpa visualisasi, data dalam jumlah besar akan lebih sulit dipahami. Visualisasi data membantu mengubah kumpulan angka menjadi informasi yang lebih mudah dipahami oleh manusia. Manusia lebih cepat memahami informasi dalam bentuk visual dibandingkan deretan angka pada tabel.
                        </div>
                    </div>

                </div>

                <script>
                    // 1. Script untuk Aktivitas Pemantik
                    let pemantikStartTime;
                    let pemantikInterval;

                    function startPemantikChallenge() {
                        document.getElementById('pemantik-start-zone').classList.add('hidden');
                        document.getElementById('pemantik-quiz-zone').classList.remove('hidden');
                        
                        pemantikStartTime = performance.now();
                        pemantikInterval = setInterval(() => {
                            let elapsed = ((performance.now() - pemantikStartTime) / 1000).toFixed(1);
                            document.getElementById('pemantik-timer').innerText = elapsed;
                        }, 100);
                    }

                    function submitPemantikAnswer(isCorrect) {
                        if(!isCorrect) {
                            alert('❌ Jawabanmu kurang tepat, coba teliti lagi angka penjualan terkecil di tabel!');
                            return;
                        }
                        
                        clearInterval(pemantikInterval);
                        let finalTime = ((performance.now() - pemantikStartTime) / 1000).toFixed(1);
                        
                        document.getElementById('pemantik-quiz-zone').classList.add('hidden');
                        document.getElementById('pemantik-result-zone').classList.remove('hidden');
                        document.getElementById('pemantik-final-time').innerText = finalTime;
                    }

                    // 2. Script untuk Live Grafik Kantin
                    function updateKantinChart() {
                        const bakso = Math.max(0, parseInt(document.getElementById('kantin-bakso').value) || 0);
                        const mie = Math.max(0, parseInt(document.getElementById('kantin-mie').value) || 0);
                        const soto = Math.max(0, parseInt(document.getElementById('kantin-soto').value) || 0);
                        const nasgor = Math.max(0, parseInt(document.getElementById('kantin-nasgor').value) || 0);

                        const maxVal = Math.max(bakso, mie, soto, nasgor, 1);

                        // Sinkronisasi teks label
                        document.getElementById('lbl-bakso').innerText = bakso;
                        document.getElementById('lbl-mie').innerText = mie;
                        document.getElementById('lbl-soto').innerText = soto;
                        document.getElementById('lbl-nasgor').innerText = nasgor;

                        // Perubahan lebar batang secara real-time
                        document.getElementById('bar-bakso').style.width = (bakso / maxVal * 100) + "%";
                        document.getElementById('bar-mie').style.width = (mie / maxVal * 100) + "%";
                        document.getElementById('bar-soto').style.width = (soto / maxVal * 100) + "%";
                        document.getElementById('bar-nasgor').style.width = (nasgor / maxVal * 100) + "%";
                    }
                </script>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        B. Diagram Batang (Bar Chart)
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Apa Itu Diagram Batang?</h4>
                            <p><strong>Diagram batang (Bar Chart)</strong> adalah salah satu bentuk visualisasi data yang menggunakan batang berbentuk persegi panjang untuk membandingkan nilai antar kategori.</p>
                            <p class="mt-3">Panjang atau tinggi batang menunjukkan besar kecilnya suatu nilai. Semakin tinggi batang, semakin besar nilai yang dimiliki kategori tersebut. Diagram batang merupakan jenis visualisasi yang paling sering digunakan karena sangat mudah dibaca dan dipahami oleh siapa saja.</p>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Kapan Diagram Batang Digunakan?</h4>
                            <p>Diagram batang sangat tepat digunakan ketika kita ingin <strong>membandingkan jumlah atau nilai dari beberapa kategori yang berbeda</strong> (misalnya membandingkan data kualitatif nominal/ordinal).</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/kapan-diagram-batang-digunakan.png" alt="Contoh Penggunaan Diagram Batang" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar kapan-diagram-batang-digunakan.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <h4 class="font-bold text-[#306d29] text-xl mb-4">Contoh Diagram Batang & Cara Membacanya</h4>
                            <p class="mb-4">Perhatikan data penjualan kantin berikut (Sama seperti kasus di bagian A sebelumnya).</p>

                            <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-6">
                                <div class="text-center mb-6">
                                    <h4 class="text-2xl font-black text-[#0d530e] mb-1">📊 Lab DataViz: D3.js Canteen Visualizer</h4>
                                    <p class="text-sm text-[#306d29]">Unggah file CSV berisi data penjualan kantin untuk melihat bagaimana mesin D3.js membangun grafik secara otomatis!</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                                    
                                    <div class="md:col-span-4 space-y-4">
                                        <div class="bg-white rounded-xl border border-gray-200 p-4 shadow-sm text-sm">
                                            <h5 class="font-bold text-[#306d29] mb-2 border-b pb-1">Panduan CSV:</h5>
                                            <p class="text-gray-600 mb-2 leading-relaxed">Buat file di Notepad atau Spreadsheet, beri nama <code>kantin.csv</code>, dan isi dengan format persis seperti ini:</p>
                                            <div class="bg-gray-100 p-2 rounded border font-mono text-xs text-gray-800">
                                                Produk,Terjual<br>
                                                Bakso,50<br>
                                                Mie Ayam,30<br>
                                                Soto,20<br>
                                                Nasi Goreng,40
                                            </div>
                                        </div>

                                        <div class="bg-white rounded-xl border-2 border-dashed border-[#306d29] p-4 text-center shadow-inner hover:bg-green-50 transition-all cursor-pointer relative group">
                                            <input type="file" id="csvFileInput" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleCSVUpload(event)">
                                            <div class="text-3xl mb-2 group-hover:scale-110 transition-transform">📁</div>
                                            <p class="font-bold text-[#306d29] text-sm">Klik / Drop file CSV di sini</p>
                                            <p class="text-[10px] text-gray-500 mt-1">Hanya menerima format .csv</p>
                                        </div>
                                        
                                        <button onclick="resetD3Chart()" class="w-full py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-xl text-xs transition-all border border-gray-300">
                                            🔄 Reset Kanvas
                                        </button>
                                    </div>

                                    <div class="md:col-span-8 bg-white p-2 rounded-xl border border-gray-200 shadow-inner flex flex-col items-center justify-center min-h-[300px] relative overflow-hidden">
                                        
                                        <div id="d3-placeholder" class="text-center absolute inset-0 flex flex-col items-center justify-center z-10 bg-white/90 backdrop-blur-sm transition-opacity duration-500">
                                            <div class="text-5xl opacity-20 mb-3 animate-pulse">📈</div>
                                            <p class="text-sm font-bold text-gray-400">Kanvas D3.js Menunggu Data CSV...</p>
                                        </div>

                                        <div id="d3-chart-container" class="w-full overflow-x-auto flex justify-center py-4"></div>
                                        
                                    </div>
                                </div>

                                <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-8">
                                    <p class="font-bold text-[#306d29] mb-3">Berdasarkan diagram tersebut dapat diketahui secara instan bahwa:</p>
                                    <ul class="list-disc pl-6 space-y-2 text-[#0d530e]">
                                        <li><strong>Bakso</strong> memiliki jumlah penjualan tertinggi, yaitu 50 porsi.</li>
                                        <li><strong>Soto</strong> memiliki jumlah penjualan terendah, yaitu 20 porsi.</li>
                                        <li><strong>Nasi Goreng</strong> terjual lebih banyak dibandingkan Mie Ayam.</li>
                                        <li>Perbedaan jumlah penjualan antar produk dapat terlihat dengan sangat cepat melalui tinggi batang.</li>
                                    </ul>
                                    <p class="mt-4 font-medium text-[#306d29] bg-[#e7e1b1]/50 p-3 rounded border-l-4 border-[#306d29]">Dengan diagram batang, kita tidak perlu membandingkan dan mengeja angka satu per satu seperti pada tabel.</p>
                                </div>
                            </div>

                        <script src="https://d3js.org/d3.v7.min.js"></script>
                        <script>
                            function handleCSVUpload(event) {
                                const file = event.target.files[0];
                                if (!file) return;

                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const csvData = e.target.result;
                                    processCSVAndDrawD3(csvData);
                                };
                                reader.readAsText(file);
                            }

                            function processCSVAndDrawD3(csvString) {
                                document.getElementById('d3-placeholder').style.opacity = '0';
                                setTimeout(() => document.getElementById('d3-placeholder').classList.add('hidden'), 500);

                                const rows = csvString.trim().split('\n');
                                const data = [];
                                
                                for (let i = 1; i < rows.length; i++) {
                                    const cols = rows[i].split(',');
                                    if(cols.length >= 2) {
                                        data.push({
                                            Produk: cols[0].trim(),
                                            Terjual: +cols[1].trim()
                                        });
                                    }
                                }

                                drawD3BarChart(data);
                            }

                            function drawD3BarChart(data) {
                                d3.select("#d3-chart-container").selectAll("*").remove();

                                const margin = {top: 30, right: 30, bottom: 40, left: 50},
                                      width = 460 - margin.left - margin.right,
                                      height = 300 - margin.top - margin.bottom;

                                const svg = d3.select("#d3-chart-container")
                                  .append("svg")
                                    .attr("width", width + margin.left + margin.right)
                                    .attr("height", height + margin.top + margin.bottom)
                                  .append("g")
                                    .attr("transform", `translate(${margin.left},${margin.top})`);

                                const x = d3.scaleBand()
                                  .range([ 0, width ])
                                  .domain(data.map(d => d.Produk))
                                  .padding(0.3);
                                
                                svg.append("g")
                                  .attr("transform", `translate(0,${height})`)
                                  .call(d3.axisBottom(x))
                                  .selectAll("text")
                                    .attr("class", "font-sans font-bold text-xs")
                                    .style("fill", "#0d530e");

                                const maxVal = d3.max(data, d => d.Terjual);
                                const y = d3.scaleLinear()
                                  .domain([0, maxVal * 1.2]) 
                                  .range([ height, 0]);
                                
                                svg.append("g")
                                  .call(d3.axisLeft(y).ticks(5))
                                  .selectAll("text")
                                    .attr("class", "font-mono text-xs")
                                    .style("fill", "#306d29");

                                svg.selectAll(".domain").attr("stroke", "#e7e1b1");
                                svg.selectAll(".tick line").attr("stroke", "#e7e1b1");

                                svg.selectAll("mybar")
                                  .data(data)
                                  .join("rect")
                                    .attr("x", d => x(d.Produk))
                                    .attr("width", x.bandwidth())
                                    .attr("fill", "#306d29")
                                    .attr("rx", 4) 
                                    .attr("y", d => y(0))
                                    .attr("height", 0)
                                  .transition()
                                  .duration(1000)
                                  .delay((d,i) => i * 150)
                                    .attr("y", d => y(d.Terjual))
                                    .attr("height", d => height - y(d.Terjual));

                                svg.selectAll("mytext")
                                  .data(data)
                                  .join("text")
                                    .attr("x", d => x(d.Produk) + x.bandwidth()/2)
                                    .attr("y", height) 
                                    .attr("text-anchor", "middle")
                                    .text(d => d.Terjual)
                                    .attr("class", "font-mono font-bold text-xs")
                                    .style("fill", "#0d530e")
                                    .style("opacity", 0)
                                  .transition()
                                  .duration(1000)
                                  .delay((d,i) => i * 150)
                                    .attr("y", d => y(d.Terjual) - 8)
                                    .style("opacity", 1);
                            }

                            function resetD3Chart() {
                                document.getElementById('csvFileInput').value = "";
                                d3.select("#d3-chart-container").selectAll("*").remove();
                                document.getElementById('d3-placeholder').classList.remove('hidden');
                                document.getElementById('d3-placeholder').style.opacity = '1';
                            }
                        </script>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4">Bagian-Bagian Diagram Batang</h4>
                            <p class="mb-4">Agar dapat membaca grafik dengan benar, kita harus memahami anatomi atau bagian-bagian yang menyusun sebuah diagram batang.</p>
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-6">
                                <img src="/images/bagian-diagram-batang.png" alt="Bagian-Bagian Diagram Batang" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar bagian-diagram-batang.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-10 relative overflow-hidden">
                            <div class="text-center mb-6 relative z-10">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-1">🎮 Aktivitas Interaktif: Analisis Data Kelas</h4>
                                <p class="text-sm text-[#306d29] font-medium">Buat file <code>kelas.csv</code> sesuai panduan, unggah ke mesin D3.js, dan jawab ketiga pertanyaan di bawahnya berdasarkan grafik yang terbentuk!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start relative z-10">
                                
                                <div class="bg-white rounded-2xl shadow-inner border border-gray-200 p-5 flex flex-col items-center">
                                    <h5 class="text-center font-black text-[#306d29] mb-3 border-b border-gray-200 pb-2 w-full">UNGGAH DATA CSV KELAS</h5>
                                    
                                    <div class="w-full text-xs text-gray-600 mb-3 bg-gray-50 p-2 rounded border border-gray-200 text-center font-mono">
                                        Kelas,Siswa<br>X-A,30<br>X-B,35<br>X-C,28<br>X-D,32
                                    </div>

                                    <div class="w-full bg-[#fbf5dd] rounded-xl border-2 border-dashed border-[#306d29] p-3 text-center shadow-inner hover:bg-green-50 transition-all cursor-pointer relative group mb-4">
                                        <input type="file" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleClassCSVUpload(event)">
                                        <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📁</div>
                                        <p class="font-bold text-[#306d29] text-xs">Upload <code>kelas.csv</code> di sini</p>
                                    </div>

                                    <h5 class="text-center font-black text-[#306d29] mb-2 border-b border-gray-200 pb-2 w-full">HASIL RENDER D3.JS</h5>
                                    
                                    <div id="d3-class-container" class="w-full relative min-h-[150px] flex items-center justify-center bg-gray-50 rounded-xl border border-gray-200">
                                        <div id="class-placeholder" class="text-gray-400 font-bold text-xs animate-pulse">Menunggu upload...</div>
                                    </div>
                                </div>

                                <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#306d29]/20 shadow-md relative">
                                    
                                    <div id="quiz-locker" class="absolute inset-0 z-20 bg-[#fbf5dd]/80 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center transition-all duration-500">
                                        <span class="text-4xl mb-2">🔒</span>
                                        <span class="font-bold text-[#0d530e] text-sm text-center px-4">Kuis terkunci.<br>Silakan upload grafik D3.js terlebih dahulu!</span>
                                    </div>

                                    <div id="quiz-q1" class="space-y-3 mb-6 relative z-10">
                                        <p class="font-bold text-[#0d530e]">1. Kelas manakah yang memiliki jumlah siswa terbanyak?</p>
                                        <div class="flex gap-2">
                                            <button onclick="ansQ1(this, false)" class="btn-q1 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">X-A</button>
                                            <button onclick="ansQ1(this, true)" class="btn-q1 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">X-B</button>
                                            <button onclick="ansQ1(this, false)" class="btn-q1 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">X-C</button>
                                        </div>
                                    </div>

                                    <div id="quiz-q2" class="space-y-3 mb-6 opacity-40 pointer-events-none transition-all duration-500 relative z-10">
                                        <p class="font-bold text-[#0d530e]">2. Kelas manakah yang memiliki jumlah siswa paling sedikit?</p>
                                        <div class="flex gap-2">
                                            <button onclick="ansQ2(this, false)" class="btn-q2 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">X-A</button>
                                            <button onclick="ansQ2(this, true)" class="btn-q2 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">X-C</button>
                                            <button onclick="ansQ2(this, false)" class="btn-q2 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">X-D</button>
                                        </div>
                                    </div>

                                    <div id="quiz-q3" class="space-y-3 mb-6 opacity-40 pointer-events-none transition-all duration-500 relative z-10">
                                        <p class="font-bold text-[#0d530e]">3. Berapa selisih jumlah siswa antara kelas terbesar dan terkecil?</p>
                                        <div class="flex gap-2">
                                            <button onclick="ansQ3(this, false)" class="btn-q3 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">5 Siswa</button>
                                            <button onclick="ansQ3(this, true)" class="btn-q3 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">7 Siswa</button>
                                            <button onclick="ansQ3(this, false)" class="btn-q3 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-sm">12 Siswa</button>
                                        </div>
                                    </div>

                                    <div id="quiz-success" class="hidden mt-4 bg-[#306d29] text-[#fbf5dd] p-4 rounded-xl text-center shadow-lg animate-fade-in relative z-10">
                                        <h5 class="font-black text-lg mb-1">✅ Luar Biasa!</h5>
                                        <p class="text-xs">Diagram batang sangat cocok digunakan untuk membandingkan nilai antar kategori sehingga informasi dapat dipahami dengan cepat tanpa menghitung manual di tabel.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border-l-4 border-amber-500 shadow-sm my-8 text-center max-w-2xl mx-auto">
                            <h4 class="font-black text-amber-600 text-lg mb-2">🤔 Mini Refleksi</h4>
                            <p class="text-[#0d530e] font-medium text-sm md:text-base">
                                Mengapa diagram batang lebih mudah digunakan untuk membandingkan jumlah penjualan produk dibandingkan hanya melihat tabel data?
                            </p>
                            <p class="text-xs text-gray-400 mt-3 italic">Renungkan jawabannya dan diskusikan bersama teman sebangkumu!</p>
                        </div>
                    </div>

                    <script>
                        // Fungsi Kuis
                        function ansQ1(btn, isCorrect) {
                            if(!isCorrect) { alert('❌ Salah. Coba perhatikan lagi batang grafik mana yang paling panjang menjuntai.'); return; }
                            document.querySelectorAll('.btn-q1').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-sm"; });
                            btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-sm shadow";
                            document.getElementById('quiz-q2').classList.remove('opacity-40', 'pointer-events-none');
                        }
                        function ansQ2(btn, isCorrect) {
                            if(!isCorrect) { alert('❌ Salah. Cari batang yang ukurannya paling pendek/kecil.'); return; }
                            document.querySelectorAll('.btn-q2').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-sm"; });
                            btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-sm shadow";
                            document.getElementById('quiz-q3').classList.remove('opacity-40', 'pointer-events-none');
                        }
                        function ansQ3(btn, isCorrect) {
                            if(!isCorrect) { alert('❌ Kurang tepat. Kelas terbanyak = X-B (35). Kelas terkecil = X-C (28). Berapa selisihnya (35 dikurang 28)?'); return; }
                            document.querySelectorAll('.btn-q3').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-sm"; });
                            btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-sm shadow";
                            document.getElementById('quiz-success').classList.remove('hidden');
                        }

                        // Fungsi D3.js Upload Khusus Kelas
                        function handleClassCSVUpload(event) {
                            const file = event.target.files[0];
                            if (!file) return;

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const csvData = e.target.result;
                                processClassCSVAndDrawD3(csvData);
                            };
                            reader.readAsText(file);
                        }

                        function processClassCSVAndDrawD3(csvString) {
                            document.getElementById('class-placeholder').style.opacity = '0';
                            setTimeout(() => document.getElementById('class-placeholder').classList.add('hidden'), 300);

                            const rows = csvString.trim().split('\n');
                            const data = [];
                            
                            for (let i = 1; i < rows.length; i++) {
                                const cols = rows[i].split(',');
                                if(cols.length >= 2) {
                                    data.push({
                                        Kelas: cols[0].trim(),
                                        Siswa: +cols[1].trim()
                                    });
                                }
                            }

                            drawClassD3BarChart(data);
                            
                            // Buka Kunci Kuis setelah grafik dirender!
                            document.getElementById('quiz-locker').style.opacity = '0';
                            setTimeout(() => document.getElementById('quiz-locker').classList.add('hidden'), 500);
                        }

                        function drawClassD3BarChart(data) {
                            d3.select("#d3-class-container").selectAll("*").remove();

                            // Konfigurasi Horizontal Bar Chart
                            const margin = {top: 20, right: 30, bottom: 20, left: 50},
                                  width = 300 - margin.left - margin.right,
                                  height = 200 - margin.top - margin.bottom;

                            const svg = d3.select("#d3-class-container")
                              .append("svg")
                                .attr("width", width + margin.left + margin.right)
                                .attr("height", height + margin.top + margin.bottom)
                              .append("g")
                                .attr("transform", `translate(${margin.left},${margin.top})`);

                            const y = d3.scaleBand()
                              .range([ 0, height ])
                              .domain(data.map(d => d.Kelas))
                              .padding(0.2);
                            
                            svg.append("g")
                              .call(d3.axisLeft(y))
                              .selectAll("text")
                                .attr("class", "font-sans font-bold text-xs")
                                .style("fill", "#0d530e");

                            const maxVal = d3.max(data, d => d.Siswa);
                            const x = d3.scaleLinear()
                              .domain([0, maxVal * 1.2]) 
                              .range([ 0, width]);

                            // Hilangkan border axis agar bersih
                            svg.selectAll(".domain").attr("stroke", "none");
                            svg.selectAll(".tick line").attr("stroke", "none");
                            svg.selectAll(".tick text").attr("dx", "-5");

                            // Render Batang Horizontal (Menyamping)
                            svg.selectAll("mybar")
                              .data(data)
                              .join("rect")
                                .attr("x", x(0))
                                .attr("y", d => y(d.Kelas))
                                .attr("height", y.bandwidth())
                                .attr("fill", "#306d29")
                                .attr("rx", 3)
                                .attr("width", 0) // Mulai dari 0 lebar
                              .transition()
                              .duration(1000)
                              .delay((d,i) => i * 200)
                                .attr("width", d => x(d.Siswa));

                            // Label Angka di ujung batang
                            svg.selectAll("mytext")
                              .data(data)
                              .join("text")
                                .attr("y", d => y(d.Kelas) + y.bandwidth()/2 + 4)
                                .attr("x", d => x(0)) 
                                .text(d => d.Siswa)
                                .attr("class", "font-mono font-bold text-[10px]")
                                .style("fill", "#306d29")
                                .style("opacity", 0)
                              .transition()
                              .duration(1000)
                              .delay((d,i) => i * 200)
                                .attr("x", d => x(d.Siswa) + 5)
                                .style("opacity", 1);
                        }
                    </script>
                        
                    </div>

                    <script>
                        function ansQ1(btn, isCorrect) {
                            if(!isCorrect) { alert('❌ Salah. Coba perhatikan lagi batang grafik mana yang paling panjang menjuntai ke kanan.'); return; }
                            document.querySelectorAll('.btn-q1').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-sm"; });
                            btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-sm shadow";
                            document.getElementById('quiz-q2').classList.remove('opacity-40', 'pointer-events-none');
                        }
                        function ansQ2(btn, isCorrect) {
                            if(!isCorrect) { alert('❌ Salah. Cari batang yang ukurannya paling pendek/kecil.'); return; }
                            document.querySelectorAll('.btn-q2').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-sm"; });
                            btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-sm shadow";
                            document.getElementById('quiz-q3').classList.remove('opacity-40', 'pointer-events-none');
                        }
                        function ansQ3(btn, isCorrect) {
                            if(!isCorrect) { alert('❌ Kurang tepat. Kelas terbanyak = X-B (35). Kelas terkecil = X-C (28). Berapa selisihnya (35 dikurang 28)?'); return; }
                            document.querySelectorAll('.btn-q3').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-sm"; });
                            btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-sm shadow";
                            document.getElementById('quiz-success').classList.remove('hidden');
                        }
                    </script>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        C. Histogram
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Apa Itu Histogram?</h4>
                            <p><strong>Histogram</strong> adalah jenis visualisasi data yang digunakan untuk menunjukkan sebaran (distribusi) data numerik ke dalam beberapa kelompok nilai (interval).</p>
                            <p class="mt-3">Sekilas histogram terlihat mirip dengan diagram batang. Namun, histogram digunakan untuk data berupa angka yang berurutan, seperti nilai ujian, tinggi badan, atau umur.</p>
                            <p class="mt-3 bg-[#fbf5dd] p-4 rounded-xl border-l-4 border-[#306d29] font-medium text-[#0d530e]">Pada histogram, batang-batang saling menempel karena setiap batang mewakili rentang nilai yang berdekatan.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4">Perbedaan Diagram Batang dan Histogram</h4>
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/perbedaan-batang-histogram.png" alt="Tabel Perbedaan Diagram Batang dan Histogram" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar perbedaan-batang-histogram.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Kapan Histogram Digunakan?</h4>
                            <p class="mb-3">Histogram digunakan ketika kita ingin mengetahui:</p>
                            <ul class="list-disc pl-6 space-y-1.5 text-[#0d530e] font-medium mb-4">
                                <li>Sebaran data.</li>
                                <li>Rentang nilai yang paling banyak muncul.</li>
                                <li>Apakah data terkumpul pada nilai tertentu.</li>
                                <li>Apakah terdapat nilai yang sangat rendah atau sangat tinggi.</li>
                            </ul>
                            
                            <p class="font-bold text-[#306d29] mb-2">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1.5 text-[#0d530e] font-medium mb-6">
                                <li>Nilai ujian siswa.</li>
                                <li>Tinggi badan siswa.</li>
                                <li>Lama penggunaan internet per hari.</li>
                                <li>Umur pengunjung perpustakaan.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Contoh Histogram</h4>
                            <p>Perhatikan data nilai matematika berikut:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/contoh-tabel-nilai-matematika.png" alt="Tabel Nilai Matematika" class="w-full max-w-sm mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-tabel-nilai-matematika.png di folder public/images/</div>';">
                            </div>

                            <p>Data tersebut dapat dikelompokkan menjadi beberapa rentang nilai. Visualisasi histogram akan menunjukkan bagaimana nilai siswa tersebar pada setiap rentang nilai.</p>

                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/contoh-histogram-nilai.png" alt="Visualisasi Histogram Nilai Matematika" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-histogram-nilai.png di folder public/images/</div>';">
                            </div>

                            <h4 class="font-bold text-[#306d29] text-xl mt-8 mb-2">Cara Membaca Histogram</h4>
                            <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-6 text-base font-medium">
                                <h5 class="font-bold text-[#306d29] mb-3">Berdasarkan histogram tersebut dapat diketahui bahwa:</h5>
                                <ul class="list-disc pl-6 space-y-2 text-[#0d530e]">
                                    <li>Sebagian besar siswa memperoleh nilai antara 60 hingga 89.</li>
                                    <li>Hanya sedikit siswa yang memperoleh nilai di bawah 60.</li>
                                    <li>Hanya sedikit siswa yang memperoleh nilai di atas 90.</li>
                                    <li>Data nilai cenderung terkumpul pada rentang Tengah.</li>
                                </ul>
                                <p class="mt-4 font-bold text-[#306d29] bg-[#e7e1b1]/50 p-3 rounded border-l-4 border-[#306d29]">Histogram membantu melihat pola distribusi data yang sulit terlihat jika hanya menggunakan tabel.</p>
                            </div>
                        </div>

                        <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-10 relative">
                            
                            <div class="text-center mb-8 border-b border-[#306d29]/20 pb-6">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-2">📊 Aktivitas Interaktif 1: Mengamati Sebaran Nilai</h4>
                                <p class="text-sm text-[#306d29]">Siswa mengunggah file CSV yang berisi nilai siswa (Contoh format: <code>Nama,Nilai</code>), kemudian memilih menu Histogram pada aplikasi web.</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                                
                                <div class="lg:col-span-4 space-y-6">
                                    <div class="bg-white rounded-2xl p-5 border-2 border-dashed border-[#306d29] text-center hover:bg-green-50 transition-all cursor-pointer relative group shadow-inner">
                                        <input type="file" id="histCsvInput" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleHistD3Upload(event)">
                                        <div class="text-4xl mb-2 group-hover:scale-110 transition-transform">📄</div>
                                        <p class="font-bold text-[#306d29] text-sm mb-1">Unggah CSV Nilai</p>
                                        <p class="text-[10px] text-gray-500 font-mono">Contoh: Andi,85</p>
                                    </div>

                                    <div id="hist-activity-2" class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm space-y-4 opacity-40 pointer-events-none transition-all duration-500">
                                        <h5 class="font-bold text-[#0d530e] border-b pb-2 text-sm">Aktivitas 2: Mengubah Jumlah Interval</h5>
                                        <p class="text-xs text-gray-600 mb-2">Ubahlah jumlah interval histogram, lalu amati bentuk yang dihasilkan!</p>
                                        <div class="flex flex-col gap-2">
                                            <button onclick="updateD3HistogramBins(5)" id="btn-bin-5" class="py-2 bg-[#306d29] text-white font-bold rounded-lg text-xs shadow transition-all">5 Interval</button>
                                            <button onclick="updateD3HistogramBins(8)" id="btn-bin-8" class="py-2 bg-gray-100 text-gray-600 font-bold rounded-lg text-xs border border-gray-300 hover:bg-gray-200 transition-all">8 Interval</button>
                                            <button onclick="updateD3HistogramBins(10)" id="btn-bin-10" class="py-2 bg-gray-100 text-gray-600 font-bold rounded-lg text-xs border border-gray-300 hover:bg-gray-200 transition-all">10 Interval</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-8 space-y-6">
                                    <div class="bg-white p-2 rounded-2xl border border-gray-200 shadow-inner flex flex-col items-center justify-center min-h-[300px] relative overflow-hidden">
                                        <div id="d3-hist-placeholder" class="absolute inset-0 flex flex-col items-center justify-center bg-white/90 z-10 transition-opacity duration-500">
                                            <div class="text-4xl opacity-30 mb-2 animate-bounce">📊</div>
                                            <p class="text-xs font-bold text-gray-400">Menunggu data CSV...</p>
                                        </div>
                                        <div id="d3-histogram-container" class="w-full flex justify-center"></div>
                                    </div>

                                    <div id="hist-quiz-panel" class="bg-[#fbf5dd] p-5 rounded-2xl border border-[#306d29]/20 shadow-sm opacity-40 pointer-events-none transition-all duration-500">
                                        <h5 class="font-black text-[#0d530e] mb-4 text-sm">📝 Tugas Analisis:</h5>
                                        <div class="space-y-4 text-sm">
                                            <div>
                                                <p class="font-bold text-[#306d29] mb-1 text-xs">1. Rentang nilai manakah yang memiliki jumlah siswa terbanyak?</p>
                                                <input type="text" id="ans-h1" class="w-full p-2 rounded border border-gray-300 text-xs focus:border-[#306d29] outline-none" placeholder="Ketik jawabanmu...">
                                            </div>
                                            <div>
                                                <p class="font-bold text-[#306d29] mb-1 text-xs">2. Apakah nilai siswa lebih banyak terkumpul pada rentang rendah, sedang, atau tinggi?</p>
                                                <select id="ans-h2" class="w-full p-2 rounded border border-gray-300 text-xs focus:border-[#306d29] outline-none">
                                                    <option value="">Pilih...</option>
                                                    <option value="rendah">Rendah</option>
                                                    <option value="sedang">Sedang</option>
                                                    <option value="tinggi">Tinggi</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-bold text-[#306d29] mb-1 text-xs">3. Apa kesimpulan yang dapat diperoleh dari histogram tersebut?</p>
                                                <textarea id="ans-h3" rows="2" class="w-full p-2 rounded border border-gray-300 text-xs focus:border-[#306d29] outline-none" placeholder="Ketik kesimpulan..."></textarea>
                                            </div>
                                            <button onclick="cekJawabanHist()" class="w-full py-2 bg-[#306d29] text-white font-bold rounded shadow hover:bg-[#0d530e]">Cek Jawaban</button>
                                        </div>

                                        <div id="hist-feedback" class="hidden mt-4 p-3 bg-green-100 border-l-4 border-green-600 text-green-800 text-xs leading-relaxed">
                                            <strong>Umpan Balik Sistem:</strong> Jawabanmu telah direkam. Histogram membuktikan bahwa data numerik tersebar dalam beberapa rentang nilai, bukan untuk membandingkan kategori seperti diagram batang! Bentuk histogram juga akan semakin detail (batang makin banyak/sempit) saat interval dinaikkan dari 5 ke 10.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="bg-[#fbf5dd] p-4 rounded-xl border-l-4 border-[#306d29] text-sm text-[#0d530e] font-bold mb-8">
                            📌 Catatan: Histogram digunakan untuk melihat bagaimana data numerik tersebar dalam beberapa rentang nilai, bukan untuk membandingkan kategori seperti pada diagram batang.
                        </div>

                        <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e7e1b1] shadow-lg text-center max-w-3xl mx-auto my-12 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-amber-400 to-[#306d29]"></div>
                            <h4 class="font-black text-amber-600 text-xl mb-4">💡 Mini Refleksi</h4>
                            <p class="text-[#0d530e] font-medium text-base mb-4 leading-relaxed">
                                Perhatikan diagram batang dan histogram yang menampilkan data berbeda. Tuliskan <strong>satu perbedaan utama</strong> antara diagram batang dan histogram berdasarkan fungsi penggunaannya!
                            </p>
                            <p class="text-xs text-gray-500 italic">Diskusikan refleksimu di kelas.</p>
                        </div>

                        <p class="text-lg leading-relaxed text-[#0d530e] mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            Histogram membantu kita melihat bagaimana data tersebar pada berbagai rentang nilai. Namun, histogram belum menunjukkan nilai tengah, kuartil, maupun pencilan (outlier) secara jelas. Untuk itu, kita dapat menggunakan visualisasi lain yang disebut <strong>Box Plot</strong>.
                        </p>
                    </div>

                    <script src="https://d3js.org/d3.v7.min.js"></script>
                    <script>
                        let histDataRaw = [];
                        let currentBinCount = 5;

                        function handleHistD3Upload(event) {
                            const file = event.target.files[0];
                            if (!file) return;

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const csvData = e.target.result;
                                const rows = csvData.trim().split('\n');
                                histDataRaw = [];
                                
                                for (let i = 1; i < rows.length; i++) {
                                    const cols = rows[i].split(',');
                                    if(cols.length >= 2) {
                                        let val = parseFloat(cols[1].trim());
                                        if(!isNaN(val)) histDataRaw.push(val);
                                    }
                                }

                                if(histDataRaw.length > 0) {
                                    document.getElementById('d3-hist-placeholder').style.opacity = '0';
                                    setTimeout(() => document.getElementById('d3-hist-placeholder').classList.add('hidden'), 500);
                                    
                                    // Buka Kunci Panel Aktivitas 2 & Kuis
                                    document.getElementById('hist-activity-2').classList.remove('opacity-40', 'pointer-events-none');
                                    document.getElementById('hist-quiz-panel').classList.remove('opacity-40', 'pointer-events-none');

                                    drawD3RealHistogram();
                                } else {
                                    alert("Gagal memuat angka. Pastikan format CSV sesuai (Nama,Nilai)");
                                }
                            };
                            reader.readAsText(file);
                        }

                        function updateD3HistogramBins(bins) {
                            currentBinCount = bins;
                            
                            // Styling Button Active State
                            [5, 8, 10].forEach(b => {
                                let btn = document.getElementById(`btn-bin-${b}`);
                                btn.className = "py-2 bg-gray-100 text-gray-600 font-bold rounded-lg text-xs border border-gray-300 hover:bg-gray-200 transition-all";
                            });
                            document.getElementById(`btn-bin-${bins}`).className = "py-2 bg-[#306d29] text-white font-bold rounded-lg text-xs shadow transition-all";

                            drawD3RealHistogram();
                        }

                        function drawD3RealHistogram() {
                            d3.select("#d3-histogram-container").selectAll("*").remove();

                            const margin = {top: 20, right: 20, bottom: 40, left: 40},
                                  width = 500 - margin.left - margin.right,
                                  height = 280 - margin.top - margin.bottom;

                            const svg = d3.select("#d3-histogram-container")
                              .append("svg")
                                .attr("width", width + margin.left + margin.right)
                                .attr("height", height + margin.top + margin.bottom)
                              .append("g")
                                .attr("transform", `translate(${margin.left},${margin.top})`);

                            // Sumbu X
                            const maxVal = d3.max(histDataRaw) > 100 ? d3.max(histDataRaw) : 100;
                            const x = d3.scaleLinear()
                                .domain([0, maxVal])
                                .range([0, width]);
                                
                            svg.append("g")
                                .attr("transform", `translate(0,${height})`)
                                .call(d3.axisBottom(x))
                                .selectAll("text")
                                    .attr("class", "font-mono text-xs fill-gray-700");

                            // D3 Histogram Generator
                            const histogram = d3.bin()
                                .value(d => d)
                                .domain(x.domain())
                                .thresholds(x.ticks(currentBinCount));

                            const bins = histogram(histDataRaw);

                            // Sumbu Y
                            const y = d3.scaleLinear()
                                .range([height, 0]);
                                y.domain([0, d3.max(bins, function(d) { return d.length; }) + 1]); 

                            svg.append("g")
                                .call(d3.axisLeft(y).ticks(5))
                                .selectAll("text")
                                    .attr("class", "font-mono text-xs fill-gray-700");

                            // Gambar Batang Berdempetan
                            svg.selectAll("rect")
                                .data(bins)
                                .join("rect")
                                    .attr("x", 1)
                                    .attr("transform", function(d) { return `translate(${x(d.x0)}, ${y(d.length)})`; })
                                    .attr("width", function(d) { return Math.max(0, x(d.x1) - x(d.x0) - 1); }) // -1 Untuk garis batas sangat tipis
                                    .attr("height", function(d) { return height - y(d.length); })
                                    .style("fill", "#306d29")
                                    .style("opacity", 0)
                                .transition()
                                .duration(800)
                                    .style("opacity", 1);
                        }

                        function cekJawabanHist() {
                            const q2 = document.getElementById('ans-h2').value;
                            if(q2 !== "") {
                                document.getElementById('hist-feedback').classList.remove('hidden');
                            } else {
                                alert("Pilih jawaban untuk pertanyaan nomor 2 terlebih dahulu!");
                            }
                        }
                    </script>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        D. Box Plot & Deteksi Outlier
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Apa Itu Box Plot?</h4>
                            <p><strong>Box Plot (Diagram Kotak Garis)</strong> adalah jenis visualisasi data yang digunakan untuk menampilkan ringkasan sebaran data dalam satu gambar yang sederhana.</p>
                            <p class="mt-2">Box Plot dapat membantu kita mengetahui:</p>
                            <ul class="list-disc pl-6 space-y-1 text-[#0d530e] font-medium my-2">
                                <li>Nilai terkecil (minimum)</li>
                                <li>Nilai terbesar (maksimum)</li>
                                <li>Nilai tengah (median)</li>
                                <li>Sebaran data</li>
                                <li>Data yang menyimpang (<em>outlier</em>)</li>
                            </ul>
                            <p>Karena dapat menyajikan banyak informasi dalam satu gambar, Box Plot sering digunakan untuk menganalisis distribusi data dengan cepat.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Mengapa Menggunakan Box Plot?</h4>
                            <p>Perhatikan data nilai berikut:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-4 max-w-sm mx-auto font-mono text-sm font-bold text-gray-700">
                                <div class="grid grid-cols-1 border border-gray-200">
                                    <div class="bg-gray-100 p-2 border-b">Nilai</div>
                                    <div class="p-2 border-b">60</div>
                                    <div class="p-2 border-b bg-gray-50">65</div>
                                    <div class="p-2 border-b">70</div>
                                    <div class="p-2 border-b bg-gray-50">75</div>
                                    <div class="p-2 border-b">80</div>
                                    <div class="p-2 border-b bg-gray-50">85</div>
                                    <div class="p-2">90</div>
                                </div>
                            </div>
                            
                            <p>Dari tabel tersebut kita dapat mengetahui nilai siswa. Namun, untuk mengetahui posisi nilai tengah dan sebaran data secara keseluruhan, diperlukan visualisasi yang lebih ringkas. Salah satu visualisasi yang dapat digunakan untuk merangkum informasi tersebut adalah Box Plot.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4">Bagian-Bagian Box Plot</h4>
                            <p class="mb-4">Box Plot terdiri atas beberapa bagian penting:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-6">
                                <img src="/images/bagian-box-plot.png" alt="Bagian-Bagian Diagram Box Plot" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar bagian-box-plot.png di folder public/images/</div>';">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm font-medium">
                                <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1]">
                                    <strong class="text-[#306d29] text-base block mb-1">1. Nilai Minimum</strong>
                                    Nilai terkecil dalam kumpulan data.
                                </div>
                                <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1]">
                                    <strong class="text-[#306d29] text-base block mb-1">2. Kuartil Bawah (Q1)</strong>
                                    Batas 25% data terbawah.
                                </div>
                                <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1]">
                                    <strong class="text-[#306d29] text-base block mb-1">3. Median (Q2)</strong>
                                    Nilai tengah data.
                                </div>
                                <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1]">
                                    <strong class="text-[#306d29] text-base block mb-1">4. Kuartil Atas (Q3)</strong>
                                    Batas 75% data.
                                </div>
                                <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1] md:col-span-2 text-center">
                                    <strong class="text-[#306d29] text-base block mb-1">5. Nilai Maksimum</strong>
                                    Nilai terbesar dalam kumpulan data.
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4">Contoh Diagram Box Plot & Cara Membacanya</h4>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-6">
                                <img src="/images/contoh-box-plot-baca.png" alt="Contoh Membaca Diagram Box Plot" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-box-plot-baca.png di folder public/images/</div>';">
                            </div>

                            <p class="font-bold text-[#306d29] mb-2">Informasi yang dapat diperoleh:</p>
                            <ul class="list-disc pl-6 space-y-1 text-[#0d530e] font-medium mb-4">
                                <li>Median menunjukkan nilai tengah data.</li>
                                <li>Kotak menunjukkan sebagian besar data berada.</li>
                                <li>Garis kiri dan kanan menunjukkan rentang data.</li>
                                <li>Data yang jauh dari kelompok utama dapat terlihat sebagai outlier.</li>
                            </ul>
                            <div class="bg-[#306d29]/10 p-5 rounded-xl border-l-4 border-[#306d29] text-sm text-[#0d530e] font-bold">
                                Dengan melihat Box Plot, kita dapat memahami distribusi data tanpa harus membaca seluruh data satu per satu. Box Plot dapat merangkum banyak informasi tentang data hanya dalam satu gambar sederhana.
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4 border-b border-[#306d29]/20 pb-2">Mengenal Outlier</h4>
                            <p class="mb-4"><strong>Outlier</strong> adalah data yang nilainya sangat berbeda dibandingkan sebagian besar data lainnya.</p>
                            
                            <p class="font-bold text-[#306d29] mb-2">Contoh Tabel Nilai:</p>
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-4 max-w-[150px] font-mono text-sm font-bold text-gray-700">
                                <div class="grid grid-cols-1 border border-gray-200">
                                    <div class="bg-gray-100 p-2 border-b">Nilai</div>
                                    <div class="p-2 border-b">70</div>
                                    <div class="p-2 border-b">72</div>
                                    <div class="p-2 border-b">75</div>
                                    <div class="p-2 border-b">78</div>
                                    <div class="p-2 border-b">80</div>
                                    <div class="p-2 border-b">82</div>
                                    <div class="p-2 bg-red-100 text-red-600">150</div>
                                </div>
                            </div>
                            <p>Nilai <strong>150</strong> jauh lebih besar dibandingkan nilai lainnya sehingga dapat dianggap sebagai outlier.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/visualisasi-outlier.png" alt="Visualisasi Titik Outlier pada Grafik" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar visualisasi-outlier.png di folder public/images/</div>';">
                            </div>

                            <h5 class="font-bold text-[#306d29] text-lg mt-6 mb-2">Mengapa Outlier Penting?</h5>
                            <p class="mb-2">Outlier dapat memberikan informasi penting, misalnya:</p>
                            <ul class="list-disc pl-6 space-y-1 text-[#0d530e] font-medium mb-4">
                                <li>Kesalahan pencatatan data.</li>
                                <li>Data yang sangat unik.</li>
                                <li>Kondisi khusus yang perlu diperhatikan.</li>
                            </ul>
                            <div class="bg-[#fbf5dd] p-4 rounded-xl border border-[#e7e1b1] text-sm text-[#0d530e] font-bold">
                                Karena itu, outlier tidak selalu harus dihapus. Kita perlu memahami penyebab kemunculannya terlebih dahulu.
                            </div>
                        </div>

                        <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-10 relative overflow-hidden">
                            <div class="text-center mb-6 relative z-10 border-b border-[#306d29]/20 pb-4">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-1">📦 Aktivitas Interaktif: Menemukan Outlier</h4>
                                <p class="text-sm text-[#306d29] font-medium">Buat file <code>outlier.csv</code> sesuai panduan di bawah, unggah ke aplikasi web, dan perhatikan Box Plot yang terbentuk secara otomatis!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                                
                                <div class="lg:col-span-6 bg-white rounded-2xl shadow-inner border border-gray-200 p-5 flex flex-col items-center">
                                    <h5 class="text-center font-black text-[#306d29] mb-3 border-b border-gray-200 pb-2 w-full text-sm">FORMAT CSV (Contoh Modul)</h5>
                                    <div class="w-full text-xs text-gray-600 mb-3 bg-gray-50 p-2 rounded border border-gray-200 text-center font-mono font-bold leading-tight">
                                        Nama,Nilai<br>Andi,75<br>Budi,80<br>Citra,78<br>Deni,82<br><span class="text-red-600 animate-pulse">Eka,150</span>
                                    </div>

                                    <div class="w-full bg-[#fbf5dd] rounded-xl border-2 border-dashed border-[#306d29] p-3 text-center shadow-inner hover:bg-green-50 transition-all cursor-pointer relative group mb-6">
                                        <input type="file" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleBoxplotCSVUpload(event)">
                                        <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📁</div>
                                        <p class="font-bold text-[#306d29] text-xs">Unggah File CSV</p>
                                    </div>

                                    <h5 class="text-center font-black text-[#306d29] mb-2 border-b border-gray-200 pb-2 w-full text-sm">HASIL BOX PLOT D3.JS</h5>
                                    
                                    <div id="d3-boxplot-container" class="w-full relative min-h-[160px] flex items-center justify-center bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                                        <div id="boxplot-placeholder" class="text-gray-400 font-bold text-xs animate-pulse text-center px-4 transition-opacity duration-500">
                                            Menunggu unggahan data CSV...<br><span class="text-[10px] font-normal opacity-70">Aplikasi web akan menampilkan Box Plot secara otomatis</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6 bg-[#fbf5dd] p-6 rounded-2xl border border-[#306d29]/20 shadow-md relative min-h-[350px]">
                                    
                                    <div id="box-quiz-locker" class="absolute inset-0 z-20 bg-[#fbf5dd]/90 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center transition-all duration-500">
                                        <span class="text-5xl mb-3">🔒</span>
                                        <span class="font-black text-[#0d530e] text-base text-center px-4">Tugas Terkunci</span>
                                        <span class="font-medium text-[#306d29] text-xs mt-1 text-center">Unggah file CSV yang mengandung data<br>Eka (150) untuk membuka pertanyaan!</span>
                                    </div>

                                    <h5 class="font-black text-[#0d530e] border-b pb-2 mb-4">📋 Lembar Tugas Box Plot:</h5>
                                    <div class="space-y-4 text-sm font-medium relative z-10">
                                        <div>
                                            <p class="text-[#306d29] font-bold mb-1 text-xs">1. Nilai manakah yang tampak berbeda dari data lainnya?</p>
                                            <div class="flex flex-wrap gap-2">
                                                <button onclick="ansBoxQ1(this, false)" class="btn-bq1 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-xs">Nilai 75</button>
                                                <button onclick="ansBoxQ1(this, false)" class="btn-bq1 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-xs">Nilai 82</button>
                                                <button onclick="ansBoxQ1(this, true)" class="btn-bq1 px-4 py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-xs border-dashed border-[#306d29]">Nilai 150</button>
                                            </div>
                                        </div>

                                        <div id="box-q2" class="opacity-30 pointer-events-none transition-all duration-500">
                                            <p class="text-[#306d29] font-bold mb-1 text-xs">2. Mengapa nilai tersebut dapat dianggap sebagai outlier?</p>
                                            <select id="ans-bq2" onchange="ansBoxQ2()" class="w-full p-2 rounded border border-gray-300 text-xs outline-none focus:border-[#306d29]">
                                                <option value="">Pilih alasan yang tepat...</option>
                                                <option value="a">Karena nilainya ganjil</option>
                                                <option value="b">Karena nilainya sangat menyimpang/berbeda jauh dari mayoritas data lainnya</option>
                                                <option value="c">Karena nilainya paling akurat</option>
                                            </select>
                                        </div>

                                        <div id="box-q3" class="opacity-30 pointer-events-none transition-all duration-500">
                                            <p class="text-[#306d29] font-bold mb-1 text-xs">3. Apakah outlier selalu berarti data salah?</p>
                                            <div class="flex flex-col gap-2">
                                                <button onclick="ansBoxQ3(this, true)" class="btn-bq3 w-full py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-xs border-dashed border-[#306d29]">Tidak selalu (Bisa jadi kondisi unik)</button>
                                                <button onclick="ansBoxQ3(this, false)" class="btn-bq3 w-full py-2 bg-white border border-gray-300 rounded font-bold hover:bg-gray-100 transition-all text-xs">Ya, selalu salah</button>
                                            </div>
                                        </div>

                                        <div id="box-quiz-success" class="hidden mt-4 bg-green-100 text-green-800 p-3 border-l-4 border-green-600 rounded-lg shadow-sm text-xs font-medium animate-fade-in leading-relaxed">
                                            ✅ <strong>Analisis Tepat!</strong> Box Plot membantu menampilkan nilai tengah, sebaran data, dan <em>outlier</em> dalam satu visualisasi yang ringkas. Titik terpisah di ujung kanan adalah angka 150 karena menyimpang terlalu jauh dari kotak utama data kelas!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e7e1b1] shadow-lg text-center max-w-3xl mx-auto my-12 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-400 to-[#306d29]"></div>
                            <h4 class="font-black text-amber-600 text-xl mb-4">💡 Mini Refleksi</h4>
                            <p class="text-[#0d530e] font-medium text-base mb-4 leading-relaxed">
                                Perhatikan sebuah Box Plot yang memiliki <strong>satu titik jauh di luar kotak</strong>. Tuliskan informasi apa yang dapat disimpulkan dari keberadaan titik tersebut.
                            </p>
                            
                            <div class="text-sm bg-gray-50 p-4 rounded text-left border border-gray-200 text-gray-700 leading-relaxed font-medium mt-6">
                                Box Plot membantu kita memahami sebaran data dalam satu variabel. Namun, Box Plot belum dapat menunjukkan hubungan antara dua variabel yang berbeda. Untuk melihat apakah dua variabel saling berhubungan, kita dapat menggunakan visualisasi lain yang disebut <strong>Scatter Plot</strong>.
                            </div>
                        </div>
                    </div>

                <script src="https://d3js.org/d3.v7.min.js"></script>
                <script>
                    // Kuis Logika Box Plot
                    function ansBoxQ1(btn, isCorrect) {
                        if(!isCorrect) { alert('❌ Angka itu masih berdekatan dengan kelompok. Cari angka yang abnormal (paling ujung)!'); return; }
                        document.querySelectorAll('.btn-bq1').forEach(b => { b.disabled = true; b.className = "px-4 py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-xs"; });
                        btn.className = "px-4 py-2 bg-[#306d29] text-white rounded font-bold text-xs shadow";
                        document.getElementById('box-q2').classList.remove('opacity-30', 'pointer-events-none');
                    }
                    function ansBoxQ2() {
                        if(document.getElementById('ans-bq2').value === 'b') {
                            document.getElementById('box-q3').classList.remove('opacity-30', 'pointer-events-none');
                        } else {
                            alert('❌ Kurang tepat. Ingat definisi awal Outlier!');
                            document.getElementById('ans-bq2').value = '';
                        }
                    }
                    function ansBoxQ3(btn, isCorrect) {
                        if(!isCorrect) { alert('❌ Ingat materi di atas, Outlier kadang menandakan kejadian langka yang nyata, bukan selalu salah input.'); return; }
                        document.querySelectorAll('.btn-bq3').forEach(b => { b.disabled = true; b.className = "w-full py-2 bg-gray-100 border border-gray-300 rounded font-bold text-gray-400 text-xs"; });
                        btn.className = "w-full py-2 bg-[#306d29] text-white rounded font-bold text-xs shadow";
                        document.getElementById('box-quiz-success').classList.remove('hidden');
                    }

                    // Mesin D3.js Box Plot
                    function handleBoxplotCSVUpload(event) {
                        const file = event.target.files[0];
                        if (!file) return;

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const csvData = e.target.result;
                            const rows = csvData.trim().split('\n');
                            let rawValues = [];
                            
                            for (let i = 1; i < rows.length; i++) {
                                const cols = rows[i].split(',');
                                if(cols.length >= 2) {
                                    let val = parseFloat(cols[1].trim());
                                    if(!isNaN(val)) rawValues.push(val);
                                }
                            }

                            if(rawValues.length > 0) {
                                // Sembunyikan pesan tunggu
                                document.getElementById('boxplot-placeholder').style.opacity = '0';
                                setTimeout(() => document.getElementById('boxplot-placeholder').classList.add('hidden'), 300);
                                
                                // Unlock Panel Kuis jika mendeteksi ada nilai >= 150 (Tugas tercapai)
                                let hasOutlier = rawValues.some(v => v >= 150);
                                if(hasOutlier) {
                                    document.getElementById('box-quiz-locker').style.opacity = '0';
                                    setTimeout(() => document.getElementById('box-quiz-locker').classList.add('hidden'), 500);
                                }

                                drawD3BoxPlot(rawValues);
                            } else {
                                alert("Data tidak valid. Pastikan baris ke-2 dst berformat: Nama,Angka (misal: Eka,150)");
                            }
                        };
                        reader.readAsText(file);
                    }

                    function drawD3BoxPlot(dataArray) {
                        // Bersihkan kanvas lama
                        d3.select("#d3-boxplot-container").selectAll("*").remove();

                        // Ambil lebar kontainer asli secara dinamis (Responsif)
                        const containerWidth = document.getElementById("d3-boxplot-container").clientWidth;
                        
                        const margin = {top: 20, right: 30, bottom: 40, left: 30},
                              width = containerWidth - margin.left - margin.right,
                              height = 160 - margin.top - margin.bottom;

                        const svg = d3.select("#d3-boxplot-container")
                          .append("svg")
                            .attr("width", width + margin.left + margin.right)
                            .attr("height", height + margin.top + margin.bottom)
                          .append("g")
                            .attr("transform", `translate(${margin.left},${margin.top})`);

                        // 1. Hitung Statistik Penting
                        let sortedData = dataArray.sort(d3.ascending);
                        let q1 = d3.quantile(sortedData, .25);
                        let median = d3.quantile(sortedData, .5);
                        let q3 = d3.quantile(sortedData, .75);
                        let interQuantileRange = q3 - q1;
                        let dataMin = d3.min(sortedData);
                        let dataMax = d3.max(sortedData);
                        
                        // Menentukan batas IQR
                        let lowerBound = q1 - 1.5 * interQuantileRange;
                        let upperBound = q3 + 1.5 * interQuantileRange;

                        // Tentukan nilai minimum dan maksimum yang akan DIGAMBAR pada garis whisker
                        let whiskerMin = Math.max(dataMin, lowerBound);
                        let whiskerMax = Math.min(dataMax, upperBound);

                        // 2. Buat Skala X Dinamis (Fix error kepotong)
                        // Skala akan membaca angka paling kecil sampai angka paling besar mutlak di data CSV (Termasuk 150)
                        const x = d3.scaleLinear()
                          .domain([Math.min(dataMin, 0) - 10, dataMax + 20]) // Tambah ruang di kanan-kiri
                          .range([0, width]);
                          
                        // Render Sumbu X
                        svg.append("g")
                          .attr("transform", `translate(0,${height})`)
                          .call(d3.axisBottom(x).ticks(6))
                          .selectAll("text").attr("class", "font-mono text-[10px] font-bold fill-[#0d530e]");

                        // 3. Render Garis Horizontal Utama (Whisker Line)
                        svg.append("line")
                          .attr("x1", x(whiskerMin))
                          .attr("x2", x(whiskerMin)) // Mulai dari titik nol animasi
                          .attr("y1", height/2)
                          .attr("y2", height/2)
                          .attr("stroke", "#306d29")
                          .attr("stroke-width", 2)
                          .transition()
                          .duration(1000)
                          .attr("x2", x(whiskerMax));

                        // 4. Render Kotak (Box) dari Q1 ke Q3
                        svg.append("rect")
                          .attr("x", x(q1))
                          .attr("y", height/2 - 20)
                          .attr("height", 40)
                          .attr("stroke", "#306d29")
                          .attr("stroke-width", 2)
                          .style("fill", "#e7e1b1")
                          .attr("width", 0) // Mulai dari lebar 0 animasi
                          .transition()
                          .duration(1000)
                          .attr("width", x(q3) - x(q1));

                        // 5. Render Garis Tengah (Median)
                        svg.append("line")
                          .attr("x1", x(median))
                          .attr("x2", x(median))
                          .attr("y1", height/2 - 20)
                          .attr("y2", height/2 + 20)
                          .attr("stroke", "#306d29")
                          .attr("stroke-width", 3)
                          .style("opacity", 0)
                          .transition()
                          .delay(500)
                          .duration(500)
                          .style("opacity", 1);

                        // 6. Plot Titik Outlier (Yang berada di luar upperBound/lowerBound)
                        let outliers = sortedData.filter(d => d < lowerBound || d > upperBound);
                        
                        svg.selectAll("outlierDots")
                          .data(outliers)
                          .join("circle")
                            .attr("cx", d => x(d))
                            .attr("cy", height/2)
                            .attr("r", 0) // Mulai dari radius 0
                            .style("fill", "#ef4444")
                            .attr("stroke", "white")
                            .attr("stroke-width", 1.5)
                            .attr("class", "animate-bounce")
                          .transition()
                          .delay(1000) // Muncul di akhir animasi
                          .duration(500)
                            .attr("r", 6); // Membesar jadi titik merah yang jelas
                    }
                </script>

                <div class="mt-20 pb-10">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        E. Scatter Plot (Diagram Pencar)
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <div>
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Apa Itu Scatter Plot?</h4>
                            <p><strong>Scatter Plot (Diagram Pencar)</strong> adalah jenis visualisasi data yang digunakan untuk melihat hubungan antara dua variabel numerik.</p>
                            <p class="mt-2">Pada Scatter Plot, setiap data ditampilkan sebagai sebuah titik pada bidang grafik. Posisi titik ditentukan oleh dua nilai yang dimiliki data tersebut (koordinat X dan Y). Scatter Plot membantu kita mengetahui apakah terdapat hubungan atau pola tertentu antara dua variabel.</p>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2">Kapan Scatter Plot Digunakan?</h4>
                            <div class="bg-[#fbf5dd] p-4 rounded-xl border-l-4 border-[#306d29] font-medium text-[#0d530e]">
                                Scatter Plot digunakan ketika kita ingin mengetahui hubungan antara <strong>dua data numerik</strong>.
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4">Contoh Scatter Plot</h4>
                            <p>Perhatikan data berikut.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-4 max-w-md mx-auto">
                                <img src="/images/scatter-tabel-belajar.png" alt="Tabel Jam Belajar dan Nilai" class="w-full rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-6 rounded-lg border-2 border-dashed border-[#306d29] text-sm\'>Letakkan gambar scatter-tabel-belajar.png di folder public/images/</div>';">
                            </div>
                            
                            <p>Data tersebut dapat ditampilkan dalam bentuk Scatter Plot.</p>

                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/scatter-visual-belajar.png" alt="Visualisasi Scatter Plot Jam Belajar" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29] text-sm\'>Letakkan gambar scatter-visual-belajar.png di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Contoh hubungan antara jam belajar dan nilai ujian.</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-xl mb-3">Cara Membaca Scatter Plot</h4>
                            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm text-base font-medium">
                                <p class="font-bold text-[#306d29] mb-3">Berdasarkan Scatter Plot tersebut dapat diketahui bahwa:</p>
                                <ul class="list-disc pl-6 space-y-2 text-[#0d530e] mb-4">
                                    <li>Semakin lama waktu belajar, nilai ujian cenderung meningkat.</li>
                                    <li>Titik-titik membentuk pola yang bergerak ke atas.</li>
                                    <li>Hal ini menunjukkan adanya hubungan antara jam belajar dan nilai ujian.</li>
                                </ul>
                                <p class="bg-[#fbf5dd] p-3 rounded-lg border border-[#e7e1b1] text-[#306d29]">Scatter Plot membantu kita menemukan pola yang sulit terlihat jika hanya melihat tabel data.</p>
                                <p class="mt-4 text-gray-700">Hubungan antara dua variabel pada Scatter Plot sering disebut <strong>korelasi</strong>. Korelasi menunjukkan apakah perubahan pada satu variabel berkaitan dengan perubahan pada variabel lainnya.</p>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4 border-b border-[#306d29]/20 pb-2">Jenis Hubungan pada Scatter Plot</h4>
                            
                            <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-6">
                                <div class="text-center mb-6">
                                    <h4 class="text-2xl font-black text-[#0d530e] mb-1">🌌 Lab Korelasi: Matriks Titik Pencar</h4>
                                    <p class="text-sm text-[#306d29]">Pilih jenis korelasi di bawah ini untuk melihat contoh visualisasi pola persebaran titik-titik koordinatnya!</p>
                                </div>

                                <div class="flex flex-wrap justify-center gap-2 mb-6">
                                    <button onclick="changeScatterPattern('positif')" id="btn-s-pos" class="px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#306d29] text-[#fbf5dd] shadow">📈 Korelasi Positif</button>
                                    <button onclick="changeScatterPattern('negatif')" id="btn-s-neg" class="px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#fbf5dd] text-[#306d29] border border-[#306d29]/20">📉 Korelasi Negatif</button>
                                    <button onclick="changeScatterPattern('acak')" id="btn-s-aca" class="px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#fbf5dd] text-[#306d29] border border-[#306d29]/20">🎲 Tidak Ada Hubungan</button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                                    <div class="md:col-span-2 bg-white rounded-2xl border border-gray-200 p-4 shadow-inner relative h-48 flex items-center justify-center overflow-hidden" id="scatter-canvas"></div>
                                    <div class="bg-[#fbf5dd] p-5 rounded-2xl border border-[#306d29]/20 text-xs md:text-sm font-medium leading-relaxed" id="scatter-desc">
                                        <strong>Korelasi Positif:</strong><br>
                                        <span class="text-gray-600">Jika variabel X naik, maka variabel Y ikut naik. Titik-titik membentuk pola bergerak ke atas.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h4 class="font-bold text-[#306d29] text-xl mb-4 border-b border-[#306d29]/20 pb-2">Scatter Plot dan Outlier</h4>
                            <p class="mb-4">Scatter Plot juga dapat membantu menemukan data yang berbeda dari sebagian besar data lainnya (Outlier). Perhatikan contoh berikut:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-6">
                                <img src="/images/scatter-outlier.png" alt="Scatter Plot Outlier" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29] text-sm\'>Letakkan gambar scatter-outlier.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl my-10 relative overflow-hidden">
                            <div class="text-center mb-6 border-b border-[#306d29]/20 pb-4">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-1">🎯 Aktivitas Interaktif 1 & 2: Analisis & Manipulasi Titik</h4>
                                <p class="text-sm text-[#306d29] font-medium">Unggah file CSV, analisis hubungannya, lalu ubah data secara langsung untuk melihat efek pergerakan titik koordinatnya!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                                
                                <div class="lg:col-span-5 space-y-6">
                                    <div class="bg-white rounded-2xl shadow-inner border border-gray-200 p-5 flex flex-col items-center">
                                        <h5 class="text-center font-black text-[#306d29] mb-3 border-b border-gray-200 pb-2 w-full text-sm">Aktivitas 1: Unggah CSV</h5>
                                        <div class="w-full text-xs text-gray-600 mb-3 bg-gray-50 p-2 rounded border border-gray-200 text-center font-mono font-bold leading-tight">
                                            Nama,Jam,Nilai<br>Andi,1,60<br>Budi,2,65<br>Citra,3,75<br>Deni,4,80<br>Eka,5,90
                                        </div>

                                        <div class="w-full bg-[#fbf5dd] rounded-xl border-2 border-dashed border-[#306d29] p-3 text-center shadow-inner hover:bg-green-50 transition-all cursor-pointer relative group">
                                            <input type="file" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleScatterCSVUpload(event)">
                                            <div class="text-2xl mb-1 group-hover:scale-110 transition-transform">📁</div>
                                            <p class="font-bold text-[#306d29] text-xs">Pilih/Seret File CSV</p>
                                        </div>
                                    </div>

                                    <div id="scatter-editor-panel" class="bg-white rounded-2xl shadow-inner border border-gray-200 p-5 opacity-40 pointer-events-none transition-all duration-500">
                                        <h5 class="text-center font-black text-[#306d29] mb-2 border-b border-gray-200 pb-2 text-sm">Aktivitas 2: Ubah Data (Live Edit)</h5>
                                        <p class="text-[10px] text-gray-500 mb-3 text-center">Ubah Nilai Eka dari 90 menjadi 50, dan amati pergerakan titik pada grafik!</p>
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-xs text-center border-collapse">
                                                <thead class="bg-[#306d29] text-white">
                                                    <tr><th class="p-2">Nama</th><th class="p-2">Jam</th><th class="p-2">Nilai</th></tr>
                                                </thead>
                                                <tbody id="scatter-editor-tbody" class="divide-y divide-gray-200">
                                                    <tr><td colspan="3" class="p-4 text-gray-400 italic">Menunggu CSV...</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-7 space-y-6">
                                    <div class="bg-white p-3 rounded-2xl border border-gray-200 shadow-inner flex flex-col items-center justify-center min-h-[250px] relative overflow-hidden">
                                        <div id="scatter-placeholder" class="text-gray-400 font-bold text-xs animate-pulse text-center px-4 absolute z-10 transition-opacity duration-500">
                                            Menyiapkan Bidang Kartesius...<br><span class="text-[10px] font-normal opacity-70">Sistem menunggu unggahan data CSV</span>
                                        </div>
                                        <div id="d3-scatter-container" class="w-full flex justify-center"></div>
                                    </div>

                                    <div class="bg-[#fbf5dd] p-5 rounded-2xl border border-[#306d29]/20 shadow-md relative">
                                        <div id="scatter-quiz-locker" class="absolute inset-0 z-20 bg-[#fbf5dd]/90 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center transition-all duration-500">
                                            <span class="text-4xl mb-2">🔒</span>
                                            <span class="font-black text-[#0d530e] text-sm text-center px-4">Selesaikan Aktivitas 1 & 2<br>(Unggah & Edit Data) untuk membuka pertanyaan!</span>
                                        </div>

                                        <div class="space-y-4 text-sm font-medium relative z-10 h-64 overflow-y-auto pr-2">
                                            <div>
                                                <p class="text-[#306d29] font-bold mb-1 text-xs">A1. Apakah terdapat hubungan antara jam belajar dan nilai ujian?</p>
                                                <select id="ans-s1" class="w-full p-2 bg-white rounded border border-gray-300 text-xs outline-none focus:border-[#306d29]">
                                                    <option value="">Pilih...</option><option value="ya">Ya, terdapat hubungan</option><option value="tidak">Tidak ada hubungan</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="text-[#306d29] font-bold mb-1 text-xs">A1. Hubungan tersebut termasuk positif atau negatif?</p>
                                                <select id="ans-s2" class="w-full p-2 bg-white rounded border border-gray-300 text-xs outline-none focus:border-[#306d29]">
                                                    <option value="">Pilih...</option><option value="positif">Positif (Naik ke kanan)</option><option value="negatif">Negatif (Turun ke kanan)</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="text-[#306d29] font-bold mb-1 text-xs">A1. Apa kesimpulan yang dapat diperoleh dari grafik tersebut?</p>
                                                <input type="text" id="ans-s3" class="w-full p-2 bg-white rounded border border-gray-300 text-xs outline-none focus:border-[#306d29]" placeholder="Ketik kesimpulan...">
                                            </div>
                                            <div class="pt-2 border-t border-gray-300">
                                                <p class="text-[#306d29] font-bold mb-1 text-xs">A2. Setelah data diubah, apakah pola hubungan masih terlihat jelas?</p>
                                                <select id="ans-s4" class="w-full p-2 bg-white rounded border border-gray-300 text-xs outline-none focus:border-[#306d29]">
                                                    <option value="">Pilih...</option><option value="tidak">Pola menjadi berantakan/ada pencilan</option><option value="ya">Pola tetap lurus sempurna</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="text-[#306d29] font-bold mb-1 text-xs">A2. Mengapa perubahan satu data dapat memengaruhi bentuk visualisasi?</p>
                                                <input type="text" id="ans-s5" class="w-full p-2 bg-white rounded border border-gray-300 text-xs outline-none focus:border-[#306d29]" placeholder="Ketik alasan...">
                                            </div>
                                            
                                            <button onclick="cekJawabanScatter()" class="w-full py-2 bg-[#306d29] text-white font-bold rounded shadow hover:bg-[#0d530e] text-xs">Cek Umpan Balik</button>
                                            
                                            <div id="scatter-quiz-success" class="hidden mt-2 bg-green-100 text-green-800 p-3 border-l-4 border-green-600 rounded-lg shadow-sm text-[11px] font-medium animate-fade-in">
                                                ✅ Umpan Balik Otomatis: Ya, pada data awal terdapat hubungan positif. Namun saat satu data diubah secara ekstrem, pola garis lurus menjadi terganggu karena munculnya outlier. Ini membuktikan Scatter Plot sangat sensitif dalam mendeteksi anomali hubungan data.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 space-y-6">
                            <div class="bg-[#fbf5dd] p-5 rounded-xl border-l-4 border-[#306d29] shadow-sm">
                                <h4 class="font-black text-[#0d530e] text-lg mb-1 flex items-center gap-2"><span>📌</span> Fakta Penting</h4>
                                <p class="text-sm font-medium text-[#306d29]">Scatter Plot digunakan untuk melihat hubungan antara dua variabel numerik dan membantu menemukan pola yang mungkin tidak terlihat pada tabel data.</p>
                            </div>

                            <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e7e1b1] shadow-lg text-center max-w-3xl mx-auto relative overflow-hidden">
                                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-[#306d29]"></div>
                                <h4 class="font-black text-amber-600 text-xl mb-3">💡 Mini Refleksi</h4>
                                <p class="text-[#0d530e] font-medium text-sm md:text-base leading-relaxed mb-2">
                                    Perhatikan sebuah Scatter Plot yang menunjukkan hubungan antara jam belajar dan nilai ujian. Berdasarkan pola titik-titik pada Scatter Plot, jelaskan apakah kedua variabel memiliki hubungan positif, hubungan negatif, atau tidak memiliki hubungan yang jelas.
                                </p>
                            </div>
                        </div>

                        <div class="mt-16 bg-[#306d29] text-[#fbf5dd] p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                            <div class="absolute -right-10 -bottom-10 text-9xl opacity-10">🔗</div>
                            <h3 class="text-2xl font-black mb-4 flex items-center gap-2"><span>🌉</span> Penghubung ke Clustering</h3>
                            <p class="text-lg leading-relaxed font-medium">
                                Pada Scatter Plot, setiap data ditampilkan sebagai sebuah titik. Ketika jumlah data semakin banyak, titik-titik pada Scatter Plot sering kali membentuk kelompok secara alami. Kelompok tersebut menunjukkan bahwa beberapa data memiliki karakteristik yang mirip. <strong class="text-amber-300">Proses menemukan kelompok data yang memiliki kemiripan inilah yang disebut clustering (pengelompokan data).</strong>
                            </p>
                            <p class="mt-4 text-sm text-[#e7e1b1]">Ini akan menjadi pondasi kita untuk materi selanjutnya: Algoritma K-Means!</p>
                        </div>

                    </div>
                </div>

                <script src="https://d3js.org/d3.v7.min.js"></script>
                <script>
                    // 1. Script Simulator Korelasi Lama
                    function changeScatterPattern(mode) {
                        const canvas = document.getElementById('scatter-canvas');
                        const desc = document.getElementById('scatter-desc');
                        canvas.innerHTML = '';
                        ['pos', 'neg', 'aca'].forEach(m => {
                            document.getElementById(`btn-s-${m}`).className = "px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#fbf5dd] text-[#306d29] border border-[#306d29]/20";
                        });

                        if(mode === 'positif') {
                            document.getElementById('btn-s-pos').className = "px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#306d29] text-[#fbf5dd] shadow";
                            desc.innerHTML = `<strong>📈 Korelasi Positif:</strong><br><span class="text-gray-600">Titik-titik naik miring ke kanan atas. Artinya jika X naik, Y ikut naik. (Contoh: Jam Belajar vs Nilai Ujian).</span>`;
                            for(let i=0; i<25; i++) createDot(i * 14 + (Math.random()*20), 150 - (i * 6) - (Math.random()*20));
                        } else if (mode === 'negatif') {
                            document.getElementById('btn-s-neg').className = "px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#306d29] text-[#fbf5dd] shadow";
                            desc.innerHTML = `<strong>📉 Korelasi Negatif:</strong><br><span class="text-gray-600">Titik-titik menurun ke kanan bawah. Jika X naik, Y justru turun. (Contoh: Jam Main Game vs Nilai Ujian).</span>`;
                            for(let i=0; i<25; i++) createDot(i * 14 + (Math.random()*20), (i * 6) + (Math.random()*20) + 10);
                        } else if (mode === 'acak') {
                            document.getElementById('btn-s-aca').className = "px-3 py-1.5 rounded-xl font-bold text-xs transition-all bg-[#306d29] text-[#fbf5dd] shadow";
                            desc.innerHTML = `<strong>🎲 Tidak Ada Hubungan:</strong><br><span class="text-gray-600">Titik-titik menyebar berantakan secara acak. Menandakan tidak ada hubungan logis antar variabel.</span>`;
                            for(let i=0; i<25; i++) createDot(Math.random() * 320 + 20, Math.random() * 140 + 20);
                        }
                    }
                    function createDot(x, y) {
                        const dot = document.createElement('div');
                        dot.className = "absolute w-3 h-3 bg-[#306d29] rounded-full shadow-sm transition-all duration-700 hover:scale-150";
                        dot.style.left = x + "px"; dot.style.top = y + "px";
                        document.getElementById('scatter-canvas').appendChild(dot);
                    }
                    setTimeout(() => changeScatterPattern('positif'), 500);

                    // 2. Script Mesin D3.js Scatter Plot (Aktivitas 1 & 2)
                    let scatterDataset = [];
                    
                    function handleScatterCSVUpload(event) {
                        const file = event.target.files[0];
                        if (!file) return;

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const rows = e.target.result.trim().split('\\n');
                            scatterDataset = [];
                            
                            for (let i = 1; i < rows.length; i++) {
                                const cols = rows[i].split(',');
                                if(cols.length >= 3) {
                                    scatterDataset.push({
                                        id: i,
                                        nama: cols[0].trim(),
                                        jam: parseFloat(cols[1].trim()),
                                        nilai: parseFloat(cols[2].trim())
                                    });
                                }
                            }

                            if(scatterDataset.length > 0) {
                                document.getElementById('scatter-placeholder').style.opacity = '0';
                                setTimeout(() => document.getElementById('scatter-placeholder').classList.add('hidden'), 300);
                                
                                // Unlock Panel Editor Data & Panel Kuis
                                document.getElementById('scatter-editor-panel').classList.remove('opacity-40', 'pointer-events-none');
                                document.getElementById('scatter-quiz-locker').style.opacity = '0';
                                setTimeout(() => document.getElementById('scatter-quiz-locker').classList.add('hidden'), 500);

                                renderScatterTableEditor();
                                drawD3ScatterPlot();
                            } else {
                                alert("Format CSV tidak sesuai. Pastikan ada 3 kolom: Nama,Jam,Nilai");
                            }
                        };
                        reader.readAsText(file);
                    }

                    // Fungsi Membuat Tabel HTML yang bisa diedit (Live Update)
                    function renderScatterTableEditor() {
                        const tbody = document.getElementById('scatter-editor-tbody');
                        tbody.innerHTML = '';
                        scatterDataset.forEach((data, index) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td class="p-2 font-bold text-gray-700">${data.nama}</td>
                                <td class="p-2"><input type="number" value="${data.jam}" onchange="updateScatterData(${index}, 'jam', this.value)" class="w-12 border p-1 text-center rounded focus:border-[#306d29] outline-none"></td>
                                <td class="p-2"><input type="number" value="${data.nilai}" onchange="updateScatterData(${index}, 'nilai', this.value)" class="w-14 border p-1 text-center rounded focus:border-[#306d29] outline-none"></td>
                            `;
                            tbody.appendChild(tr);
                        });
                    }

                    // Fungsi menangkap perubahan data dari input user (Aktivitas 2)
                    function updateScatterData(index, key, newValue) {
                        scatterDataset[index][key] = parseFloat(newValue) || 0;
                        drawD3ScatterPlot(); // Redraw D3 with transition!
                    }

                    function drawD3ScatterPlot() {
                        const container = d3.select("#d3-scatter-container");
                        // Hanya buat SVG sekali, jika sudah ada, cukup update data (untuk transisi)
                        let svg = container.select("svg");
                        let g;

                        const containerWidth = document.getElementById("d3-scatter-container").clientWidth || 300;
                        const margin = {top: 20, right: 30, bottom: 40, left: 40},
                              width = containerWidth - margin.left - margin.right,
                              height = 200 - margin.top - margin.bottom;

                        // Skala Tetap agar animasi titik terlihat jelas bergeser
                        const x = d3.scaleLinear().domain([0, 10]).range([0, width]);
                        const y = d3.scaleLinear().domain([0, 110]).range([height, 0]);

                        if(svg.empty()) {
                            svg = container.append("svg")
                                .attr("width", width + margin.left + margin.right)
                                .attr("height", height + margin.top + margin.bottom);
                            
                            g = svg.append("g")
                                .attr("transform", `translate(${margin.left},${margin.top})`);
                            
                            // Draw Axis
                            g.append("g")
                                .attr("transform", `translate(0,${height})`)
                                .call(d3.axisBottom(x).ticks(5))
                                .selectAll("text").attr("class", "font-mono text-[10px] font-bold fill-[#0d530e]");
                                
                            g.append("g")
                                .call(d3.axisLeft(y).ticks(5))
                                .selectAll("text").attr("class", "font-mono text-[10px] font-bold fill-[#0d530e]");
                                
                            // Axis Labels
                            g.append("text")
                                .attr("text-anchor", "end")
                                .attr("x", width)
                                .attr("y", height + 30)
                                .text("Jam Belajar")
                                .attr("class", "text-[10px] fill-gray-500 font-bold");
                                
                            g.append("text")
                                .attr("text-anchor", "end")
                                .attr("transform", "rotate(-90)")
                                .attr("y", -30)
                                .attr("x", 0)
                                .text("Nilai Ujian")
                                .attr("class", "text-[10px] fill-gray-500 font-bold");
                        } else {
                            g = svg.select("g");
                        }

                        // D3 Magic: Join, Update, Transition
                        const dots = g.selectAll(".dot")
                            .data(scatterDataset, d => d.id); // Tracker berdasar ID data

                        // UPDATE old elements
                        dots.transition()
                            .duration(1000)
                            .attr("cx", d => x(d.jam))
                            .attr("cy", d => y(d.nilai));

                        // ENTER new elements
                        dots.enter()
                            .append("circle")
                            .attr("class", "dot")
                            .attr("cx", x(0)) // Start dari bawah
                            .attr("cy", y(0))
                            .attr("r", 6)
                            .style("fill", "#306d29")
                            .style("opacity", 0.8)
                            .attr("stroke", "white")
                            .attr("stroke-width", 1.5)
                            .on("mouseover", function() { d3.select(this).attr("r", 10).style("fill", "#ef4444"); })
                            .on("mouseout", function() { d3.select(this).attr("r", 6).style("fill", "#306d29"); })
                            .transition()
                            .duration(1000)
                            .attr("cx", d => x(d.jam))
                            .attr("cy", d => y(d.nilai));

                        // Hapus yg tidak terpakai
                        dots.exit().remove();
                    }

                    function cekJawabanScatter() {
                        const ans1 = document.getElementById('ans-s1').value;
                        const ans2 = document.getElementById('ans-s2').value;
                        const ans4 = document.getElementById('ans-s4').value;
                        
                        if(ans1 && ans2 && ans4) {
                            document.getElementById('scatter-quiz-success').classList.remove('hidden');
                        } else {
                            alert("Mohon lengkapi pilihan ganda evaluasi A1 & A2 terlebih dahulu!");
                        }
                    }
                </script>

            </div>

            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Jenis grafik yang paling cocok digunakan jika kamu ingin membandingkan nilai penjualan antara Bakso, Mie Ayam, dan Soto menurut penjelasan materi adalah...."
                    data-opt-a="Diagram Lingkaran"
                    data-opt-b="Diagram Batang"
                    data-opt-c="Diagram Garis"
                    data-opt-d="Scatter Plot"
                    data-opt-e="Box Plot"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Perbedaan mendasar pada tampilan visual antara Diagram Batang dengan Histogram terletak pada...."
                    data-opt-a="Warna batang diagram batang selalu merah."
                    data-opt-b="Batang-batang pada Histogram digambar saling berdempetan tanpa celah jarak."
                    data-opt-c="Histogram tidak menggunakan sumbu X dan Y."
                    data-opt-d="Diagram batang hanya menampilkan data angka pecahan desimal."
                    data-opt-e="Histogram berbentuk lingkaran utuh yang dibagi menjadi beberapa porsi."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Aturan statistik yang digunakan untuk menentukan jumlah interval kelompok (bin) yang ideal pada materi Histogram disebut...."
                    data-opt-a="Aturan Pythagoras"
                    data-opt-b="Aturan Sturges"
                    data-opt-c="Teorema Bayes"
                    data-opt-d="Rumus Regresi"
                    data-opt-e="Kaidah Distribusi"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Di dalam Box Plot, apabila ditemukan sebuah data tunggal ekstrem yang posisinya meloncat sangat jauh di luar kelompok data utama, data tersebut dilabeli sebagai...."
                    data-opt-a="Median"
                    data-opt-b="Kuartil"
                    data-opt-c="Outlier (Pencilan)"
                    data-opt-d="Histogram"
                    data-opt-e="Interval Class"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Ketika melihat Scatter Plot yang menunjukkan bahwa semakin bertambahnya jam belajar seorang siswa menyebabkan nilai ujiannya ikut meningkat, maka bentuk hubungan data tersebut dinamakan...."
                    data-opt-a="Korelasi Negatif"
                    data-opt-b="Korelasi Acak"
                    data-opt-c="Korelasi Positif"
                    data-opt-d="Tidak Berkorelasi"
                    data-opt-e="Pencilan Statistik"
                    data-answer="C">
                </div>
            </div>
EOT;

        // Simpan atau update data ke database materi
        Material::updateOrCreate(
            ['slug' => 'visualisasi-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Konsep Visualisasi Data',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 4, // Melanjutkan level setelah kuis bab 1 selesai
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 2 Sub-bab 1: Visualisasi Data (Full Simulator Lab) sukses disinkronkan!');
    }
}