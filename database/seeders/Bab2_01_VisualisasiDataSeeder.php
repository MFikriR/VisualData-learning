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
            <div id="areaMateriPelajaran" class="space-y-12 font-sans transition-all duration-1000 relative z-10 pb-20" style="color: #1d1d1f !important;">

                <div class="mb-12 bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl">
                    <h3 class="text-xl md:text-2xl font-semibold mb-4 tracking-tight" style="color: #1d1d1f !important;">
                        Tujuan Pembelajaran Bab 2
                    </h3>
                    <p class="mb-4 font-medium text-sm md:text-base" style="color: #7a7a7a !important;">Setelah mempelajari bab ini, kamu diharapkan mampu:</p>
                    <ul class="space-y-3 text-sm md:text-base font-medium" style="color: #333333 !important;">
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#0066cc] font-semibold">1.</span>
                            <p>Memahami pentingnya visualisasi data dan memilih jenis grafik yang tepat.</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#0066cc] font-semibold">2.</span>
                            <p>Menganalisis distribusi data tunggal melalui Diagram Batang, Histogram, dan Box Plot.</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#0066cc] font-semibold">3.</span>
                            <p>Mendeteksi keberadaan data aneh atau ekstrem (Outlier) pada kumpulan data.</p>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#0066cc] font-semibold">4.</span>
                            <p>Membaca hubungan korelasi antar dua variabel memanfaatkan media Scatter Plot.</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        A. Mengapa Data Perlu Divisualisasikan?
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed font-medium" style="color: #333333 !important;">
                        <p>Pada Bab 1, kita telah mempelajari bagaimana data dikumpulkan, dibersihkan dari duplikat, hingga dianalisis menggunakan rumus spreadsheet. Namun, data yang sudah rapi tersebut sering kali masih disajikan dalam bentuk tabel angka yang kaku. Data yang disajikan dalam bentuk tabel berkali-kali terbukti sulit dipahami, terutama jika volume datanya sangat masif.</p>
                        <p>Oleh karena itu, di sinilah kita memerlukan <strong>Visualisasi Data</strong>. Visualisasi data adalah sebuah proses menyajikan sekumpulan data ke dalam format visual atau grafis—seperti diagram batang, grafik lingkaran, peta, atau gambar—sehingga pola rahasia, perbandingan, tren, dan pencilan (<em>outlier</em>) yang penting di dalamnya bisa langsung ditangkap oleh mata secara instan.</p>
                    </div>

                    <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-8 relative overflow-hidden">
                        <h4 class="text-xl font-semibold mb-2 tracking-tight" style="color: #1d1d1f !important;">
                            Aktivitas Pemantik: Tantangan Detektif Data
                        </h4>
                        <p class="text-sm leading-relaxed mb-6 font-medium" style="color: #7a7a7a !important;">
                            Sebelum kita membahas teori lebih jauh, mari kita uji seberapa cepat otakmu memproses informasi. Kantin sekolah mengumpulkan data acak dari puluhan transaksi penjualan. Tugasmu: <strong>Temukan menu makanan apa yang paling tidak laku (penjualan paling sedikit)!</strong>
                        </p>

                        <div class="bg-white p-6 rounded-xl border border-[#e0e0e0] text-center">
                            
                            <div id="pemantik-start-zone" class="py-6">
                                <p class="text-xs mb-4 font-sans font-medium" style="color: #7a7a7a !important;">Waktu akan dihitung secara real-time saat kamu menekan tombol di bawah.</p>
                                <button type="button" onclick="startPemantikChallenge()" class="px-6 py-2.5 font-medium rounded-full text-sm transition-colors border-none cursor-pointer shadow-sm" style="color: #ffffff !important; background-color: #0066cc !important;">
                                    Mulai Tantangan Waktu
                                </button>
                            </div>

                            <div id="pemantik-quiz-zone" class="hidden space-y-6">
                                <div class="flex justify-between items-center bg-[#fafafc] px-4 py-2 rounded-xl text-xs font-mono font-semibold border border-[#e0e0e0]" style="color: #1d1d1f !important;">
                                    <span>WAKTU BERJALAN: <span id="pemantik-timer" class="font-bold" style="color: #ff453a !important;">0.0</span> detik</span>
                                    <span class="animate-pulse font-bold" style="color: #ff453a !important;">● LIVE TEST</span>
                                </div>
                                
                                <p class="text-xs font-semibold text-left bg-[#f5f5f7] p-3 rounded-lg border-l-4 border-[#0066cc]" style="color: #333333 !important;">Cari makanan dengan angka penjualan TERKECIL pada tabel di bawah ini secepat mungkin!</p>
                                
                                <div class="overflow-x-auto rounded-xl border border-[#e0e0e0]">
                                    <table class="w-full text-xs font-mono text-center divide-y divide-[#e0e0e0]">
                                        <thead class="bg-[#f5f5f7] font-semibold" style="color: #7a7a7a !important;">
                                            <tr>
                                                <th class="p-2 border-r border-[#e0e0e0]">Menu</th><th class="p-2 border-r border-[#e0e0e0]">Terjual</th>
                                                <th class="p-2 border-r border-[#e0e0e0]">Menu</th><th class="p-2 border-r border-[#e0e0e0]">Terjual</th>
                                                <th class="p-2 border-r border-[#e0e0e0]">Menu</th><th class="p-2">Terjual</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#e0e0e0] font-semibold" style="color: #1d1d1f !important;">
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Bakso A</td><td class="p-2 border-r border-[#e0e0e0]">45</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Mie Goreng</td><td class="p-2 border-r border-[#e0e0e0]">38</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Soto Ayam</td><td class="p-2">24</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Nasi Bakar</td><td class="p-2 border-r border-[#e0e0e0]">52</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Batagor</td><td class="p-2 border-r border-[#e0e0e0]">19</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Gado-Gado</td><td class="p-2">31</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Siomay</td><td class="p-2 border-r border-[#e0e0e0]">42</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Mie Ayam B</td><td class="p-2 border-r border-[#e0e0e0]">29</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Ayam Geprek</td><td class="p-2">61</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Sate Ayam</td><td class="p-2 border-r border-[#e0e0e0]">33</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Nasi Kuning</td><td class="p-2 border-r border-[#e0e0e0]">14</td>
                                                <td class="p-2 text-left font-sans bg-[#f5f5f7]">Kwetiau</td><td class="p-2">27</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Proteksi Warna Tombol Pilihan Jawaban Dari Efek White-Wash Global -->
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-2">
                                    <button type="button" onclick="submitPemantikAnswer(false)" class="p-3 font-semibold rounded-xl text-xs transition-colors cursor-pointer border border-[#e0e0e0]" style="color: #1d1d1f !important; background-color: #f5f5f7 !important;">Soto Ayam</button>
                                    <button type="button" onclick="submitPemantikAnswer(false)" class="p-3 font-semibold rounded-xl text-xs transition-colors cursor-pointer border border-[#e0e0e0]" style="color: #1d1d1f !important; background-color: #f5f5f7 !important;">Batagor</button>
                                    <button type="button" onclick="submitPemantikAnswer(true)" class="p-3 font-semibold rounded-xl text-xs transition-colors cursor-pointer border border-[#0066cc]" style="color: #0066cc !important; background-color: #f5f5f7 !important;">Nasi Kuning</button>
                                    <button type="button" onclick="submitPemantikAnswer(false)" class="p-3 font-semibold rounded-xl text-xs transition-colors cursor-pointer border border-[#e0e0e0]" style="color: #1d1d1f !important; background-color: #f5f5f7 !important;">Kwetiau</button>
                                </div>
                            </div>

                            <div id="pemantik-result-zone" class="hidden p-5 bg-[#fafafc] rounded-xl border border-[#e0e0e0] animate-fade-in text-left">
                                <h5 class="font-semibold text-lg mb-1" style="color: #1d1d1f !important;">Jawabanmu Tepat: Nasi Kuning!</h5>
                                <p class="text-sm mb-4" style="color: #7a7a7a !important;">Kamu membutuhkan waktu <span id="pemantik-final-time" class="font-mono font-bold" style="color: #ff453a !important;">0.0</span> detik untuk menyisir angka-angka di atas.</p>
                                
                                <div class="border-t border-[#e0e0e0] pt-3 space-y-2 text-xs md:text-sm leading-relaxed font-medium" style="color: #333333 !important;">
                                    <p><strong>Refleksi Pemantik:</strong> Mengapa mata kita butuh waktu beberapa detik untuk menemukan angka 14? Karena di dalam sebuah tabel, kita dipaksa membaca sel baris secara berurutan.</p>
                                    <p>Sekarang, coba perhatikan grafik interaktif di bawah ini. Hanya dalam kedipan mata, otakmu langsung tahu mana menu yang paling rendah peminatnya tanpa harus mengeja angka!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e0e0e0] my-8">
                        <div class="text-center mb-6">
                            <h4 class="text-xl font-semibold mb-1 tracking-tight" style="color: #1d1d1f !important;">Lab Mandiri: Live Grafik Kantin</h4>
                            <p class="text-xs font-medium" style="color: #7a7a7a !important;">Sebagai perbandingan, ubah nilai porsi terjual pada tabel putih di bawah, lalu amati bagaimana panjang grafik di sebelahnya merespon secara instan!</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            <div class="bg-[#fafafc] rounded-xl border border-[#e0e0e0] p-4">
                                <table class="w-full text-sm text-center border-collapse">
                                    <thead class="bg-[#f5f5f7] font-semibold border-b border-[#e0e0e0]" style="color: #7a7a7a !important;">
                                        <tr>
                                            <th class="p-2.5 text-left pl-4">Produk</th>
                                            <th class="p-2.5">Jumlah Terjual</th>
                                        </tr>
                                    </thead>
                                    <tbody class="font-mono font-semibold divide-y divide-[#e0e0e0]">
                                        <tr>
                                            <td class="p-3 text-left font-sans" style="color: #333333 !important;">Bakso</td>
                                            <td class="p-1"><input type="number" id="kantin-bakso" value="50" oninput="updateKantinChart()" class="w-20 p-1.5 border border-[#e0e0e0] rounded-lg bg-white text-center focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-left font-sans" style="color: #333333 !important;">Mie Ayam</td>
                                            <td class="p-1"><input type="number" id="kantin-mie" value="30" oninput="updateKantinChart()" class="w-20 p-1.5 border border-[#e0e0e0] rounded-lg bg-white text-center focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-left font-sans" style="color: #333333 !important;">Soto</td>
                                            <td class="p-1"><input type="number" id="kantin-soto" value="20" oninput="updateKantinChart()" class="w-20 p-1.5 border border-[#e0e0e0] rounded-lg bg-white text-center focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 text-left font-sans" style="color: #333333 !important;">Nasi Goreng</td>
                                            <td class="p-1"><input type="number" id="kantin-nasgor" value="40" oninput="updateKantinChart()" class="w-20 p-1.5 border border-[#e0e0e0] rounded-lg bg-white text-center focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0] space-y-4 font-sans text-xs md:text-sm font-semibold" style="color: #1d1d1f !important;">
                                <div>
                                    <div class="flex justify-between mb-1"><span>Bakso</span><span id="lbl-bakso" class="font-mono text-[#0066cc]">50</span></div>
                                    <div class="w-full bg-[#f5f5f7] h-4 rounded-full overflow-hidden"><div id="bar-bakso" class="bg-[#0066cc] h-full rounded-full transition-all duration-300" style="width: 50%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1"><span>Mie Ayam</span><span id="lbl-mie" class="font-mono text-[#0066cc]">30</span></div>
                                    <div class="w-full bg-[#f5f5f7] h-4 rounded-full overflow-hidden"><div id="bar-mie" class="bg-[#0066cc]/80 h-full rounded-full transition-all duration-300" style="width: 30%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1"><span>Soto</span><span id="lbl-soto" class="font-mono text-[#0066cc]">20</span></div>
                                    <div class="w-full bg-[#f5f5f7] h-4 rounded-full overflow-hidden"><div id="bar-soto" class="bg-[#0066cc]/60 h-full rounded-full transition-all duration-300" style="width: 20%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1"><span>Nasi Goreng</span><span id="lbl-nasgor" class="font-mono text-[#0066cc]">40</span></div>
                                    <div class="w-full bg-[#f5f5f7] h-4 rounded-full overflow-hidden"><div id="bar-nasgor" class="bg-[#0066cc]/40 h-full rounded-full transition-all duration-300" style="width: 40%"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-8 mt-6">
                        <img src="/images/visualisasi-data-kantin.png" alt="Visualisasi Data Kantin" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] font-medium text-sm\'>Letakkan gambar visualisasi-data-kantin.png di folder public/images/</div>';">
                        <p class="text-sm text-[#000000] italic mt-3 font-medium">Gambar 1. Visualisasi data membantu menyajikan informasi sehingga lebih mudah dipahami dibandingkan hanya melihat tabel data.</p>
                    </div>

                    <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-6">
                        <h4 class="font-semibold text-xl mb-4 tracking-tight" style="color: #1d1d1f !important;">Manfaat Visualisasi Data</h4>
                        <p class="text-sm mb-4 font-medium" style="color: #7a7a7a !important;">Visualisasi data memiliki beberapa manfaat penting dalam tata kelola informasi, antara lain:</p>
                        <ul class="list-decimal pl-6 space-y-3 text-sm md:text-base font-medium" style="color: #333333 !important;">
                            <li><strong style="color: #1d1d1f !important;">Mempermudah memahami data dalam jumlah besar:</strong> Mampu merangkum ribuan baris data kaku ke dalam format satu halaman gambar grafik yang informatif.</li>
                            <li><strong style="color: #1d1d1f !important;">Memudahkan perbandingan antar data:</strong> Membantu mata membandingkan porsi tinggi rendah nilai antar entitas secara cepat tanpa membaca angka satu per satu.</li>
                            <li><strong style="color: #1d1d1f !important;">Membantu menemukan pola, tren, dan hubungan data:</strong> Memetakan arah pergerakan data dari waktu ke waktu, misalnya mendeteksi grafik penjualan yang cenderung naik atau turun berkelanjutan.</li>
                            <li><strong style="color: #1d1d1f !important;">Mempermudah penyampaian informasi kepada orang lain:</strong> Menyajikan data dengan bahasa visual yang menarik sehingga mudah dimengerti bahkan oleh masyarakat umum yang awam matematika.</li>
                            <li><strong style="color: #1d1d1f !important;">Mendukung pengambilan keputusan (Decision Making):</strong> Menyajikan fakta grafis yang akurat dan objektif sebagai fondasi kokoh bagi para pemimpin untuk menentukan kebijakan strategis.</li>
                        </ul>
                    </div>

                    <div class="mt-12 mb-8">
                        <h4 class="font-semibold text-2xl mb-4 border-b border-[#e0e0e0] pb-2 tracking-tight" style="color: #ffffff !important;">Contoh dalam Kehidupan Sehari-hari</h4>
                        <p class="text-base md:text-lg font-medium leading-relaxed mb-6" style="color: #ffffff !important;">Visualisasi data tidak hanya digunakan oleh ilmuwan di laboratorium, melainkan sering digunakan dalam berbagai bidang di kehidupan kita sehari-hari, misalnya:</p>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-6">
                            <img src="/images/contoh-visualisasi-sehari-hari.jpg" alt="Contoh Visualisasi Data dalam Kehidupan Sehari-hari" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] font-medium text-sm\'>Letakkan gambar contoh-visualisasi-sehari-hari.jpg di folder public/images/</div>';">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-semibold mb-2 text-base" style="color: #1d1d1f !important;">Aplikasi Cuaca</h5>
                                <p class="text-sm font-medium leading-relaxed" style="color: #7a7a7a !important;">Menampilkan grafik naik-turunnya prakiraan suhu dan curah hujan harian agar kita bisa bersiap membawa payung.</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-semibold mb-2 text-base" style="color: #1d1d1f !important;">Toko Online</h5>
                                <p class="text-sm font-medium leading-relaxed" style="color: #7a7a7a !important;">Menampilkan <em>dashboard</em> grafik barang apa saja yang paling banyak terjual bulan ini bagi para penjual (<em>seller</em>).</p>
                            </div>
                            <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-semibold mb-2 text-base" style="color: #1d1d1f !important;">Pelacak Kesehatan</h5>
                                <p class="text-sm font-medium leading-relaxed" style="color: #7a7a7a !important;"><em>Smartwatch</em> atau aplikasi HP yang menyajikan grafik jumlah langkah kaki, detak jantung, dan kualitas tidur kita.</p>
                            </div>
                        </div>

                        <div class="p-6 rounded-2xl font-medium text-base md:text-lg leading-relaxed text-center shadow-none" style="color: #ffffff !important; background-color: #0066cc !important;">
                            Tanpa visualisasi, data dalam jumlah besar akan lebih sulit dipahami. Visualisasi data membantu mengubah kumpulan angka menjadi informasi yang lebih mudah dipahami oleh manusia. Manusia lebih cepat memahami informasi dalam bentuk visual dibandingkan deretan angka pada tabel.
                        </div>
                    </div>

                </div>

                <script>
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
                            Swal.fire({
                                title: 'Jawaban Kurang Tepat',
                                text: 'Coba teliti lagi angka penjualan terkecil di tabel!',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                                confirmButtonColor: '#0066cc',
                                background: '#ffffff',
                                color: '#1d1d1f'
                            });
                            return;
                        }
                        
                        clearInterval(pemantikInterval);
                        let finalTime = ((performance.now() - pemantikStartTime) / 1000).toFixed(1);
                        
                        document.getElementById('pemantik-quiz-zone').classList.add('hidden');
                        document.getElementById('pemantik-result-zone').classList.remove('hidden');
                        document.getElementById('pemantik-final-time').innerText = finalTime;
                    }

                    function updateKantinChart() {
                        const bakso = Math.max(0, parseInt(document.getElementById('kantin-bakso').value) || 0);
                        const mie = Math.max(0, parseInt(document.getElementById('kantin-mie').value) || 0);
                        const soto = Math.max(0, parseInt(document.getElementById('kantin-soto').value) || 0);
                        const nasgor = Math.max(0, parseInt(document.getElementById('kantin-nasgor').value) || 0);

                        const maxVal = Math.max(bakso, mie, soto, nasgor, 1);

                        document.getElementById('lbl-bakso').innerText = bakso;
                        document.getElementById('lbl-mie').innerText = mie;
                        document.getElementById('lbl-soto').innerText = soto;
                        document.getElementById('lbl-nasgor').innerText = nasgor;

                        document.getElementById('bar-bakso').style.width = (bakso / maxVal * 100) + "%";
                        document.getElementById('bar-mie').style.width = (mie / maxVal * 100) + "%";
                        document.getElementById('bar-soto').style.width = (soto / maxVal * 100) + "%";
                        document.getElementById('bar-nasgor').style.width = (nasgor / maxVal * 100) + "%";
                    }
                </script>
            
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        B. Diagram Batang (Bar Chart)
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-[#333333] font-medium">
                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Apa Itu Diagram Batang?</h4>
                            <p><strong>Diagram batang (Bar Chart)</strong> adalah salah satu bentuk visualisasi data yang menggunakan batang berbentuk persegi panjang untuk membandingkan nilai antar kategori.</p>
                            <p class="mt-3">Panjang atau tinggi batang menunjukkan besar kecilnya suatu nilai. Semakin tinggi batang, semakin besar nilai yang dimiliki kategori tersebut. Diagram batang merupakan jenis visualisasi yang paling sering digunakan karena sangat mudah dibaca dan dipahami oleh siapa saja.</p>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Kapan Diagram Batang Digunakan?</h4>
                            <p>Diagram batang sangat tepat digunakan ketika kita ingin <strong>membandingkan jumlah atau nilai dari beberapa kategori yang berbeda</strong> (misalnya membandingkan data kualitatif nominal/ordinal).</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/kapan-diagram-batang-digunakan.png" alt="Contoh Penggunaan Diagram Batang" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar kapan-diagram-batang-digunakan.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Contoh Diagram Batang dan Cara Membacanya</h4>
                        <p class="mb-4 text-sm md:text-base text-[#7a7a7a]">Perhatikan data penjualan kantin berikut (Sama seperti kasus di bagian A sebelumnya).</p>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-6">
                            <div class="text-center mb-6">
                                <h4 class="text-xl md:text-2xl font-semibold mb-1 tracking-tight" style="color: #1d1d1f !important;">Lab Data: D3.js Visualisasi Data Kantin</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Unggah file CSV berisi data penjualan kantin untuk melihat bagaimana mesin D3.js membangun grafik secara otomatis!</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                                
                                <div class="md:col-span-4 space-y-4">
                                    <div class="bg-white rounded-xl border border-[#e0e0e0] p-4 text-xs md:text-sm font-medium">
                                        <h5 class="font-semibold mb-2 border-b border-[#e0e0e0] pb-1" style="color: #1d1d1f !important;">Panduan CSV:</h5>
                                        <p class="mb-2 leading-relaxed" style="color: #7a7a7a !important;">Buat file di Notepad atau Spreadsheet, beri nama <code>kantin.csv</code>, dan isi dengan format persis seperti ini:</p>
                                        <div class="bg-[#f5f5f7] p-2 rounded border border-[#e0e0e0] font-mono text-xs text-[#1d1d1f] text-left">
                                            Produk,Terjual<br>
                                            Bakso,50<br>
                                            Mie Ayam,30<br>
                                            Soto,20<br>
                                            Nasi Goreng,40
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-xl border-2 border-dashed border-[#0066cc]/30 p-4 text-center hover:bg-[#fafafc] transition-colors cursor-pointer relative group">
                                        <input type="file" id="csvFileInput" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleCSVUpload(event)">
                                        <p class="font-semibold text-[#0066cc] text-sm">Klik / Drag file CSV di sini</p>
                                        <p class="text-[10px] text-[#7a7a7a] mt-1 font-medium">Hanya menerima format .csv</p>
                                    </div>
                                    
                                    <button type="button" onclick="resetD3Chart()" class="w-full py-2 bg-[#000000] hover:bg-[#e0e0e0] text-[#000000] font-medium rounded-xl text-xs transition-colors border border-[#e0e0e0] cursor-pointer">
                                        Reset Kanvas
                                    </button>
                                </div>

                                <div class="md:col-span-8 bg-white p-2 rounded-xl border border-[#e0e0e0] flex flex-col items-center justify-center min-h-[300px] relative overflow-hidden">
                                    
                                    <div id="d3-placeholder" class="text-center absolute inset-0 flex flex-col items-center justify-center z-10 bg-white/90 backdrop-blur-sm transition-opacity duration-500">
                                        <p class="text-sm font-semibold text-[#7a7a7a]">Kanvas D3.js Menunggu Data CSV...</p>
                                    </div>

                                    <div id="d3-chart-container" class="w-full overflow-x-auto flex justify-center py-4"></div>
                                    
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-2xl border border-[#e0e0e0] mt-8">
                                <p class="font-semibold mb-3" style="color: #1d1d1f !important;">Berdasarkan diagram tersebut dapat diketahui secara instan bahwa:</p>
                                <ul class="list-disc pl-6 space-y-2 text-sm md:text-base font-medium" style="color: #333333 !important;">
                                    <li><strong style="color: #1d1d1f !important;">Bakso</strong> memiliki jumlah penjualan tertinggi, yaitu 50 porsi.</li>
                                    <li><strong style="color: #1d1d1f !important;">Soto</strong> memiliki jumlah penjualan terendah, yaitu 20 porsi.</li>
                                    <li><strong style="color: #1d1d1f !important;">Nasi Goreng</strong> terjual lebih banyak dibandingkan Mie Ayam.</li>
                                    <li>Perbedaan jumlah penjualan antar produk dapat terlihat dengan sangat cepat melalui tinggi batang.</li>
                                </ul>
                                <p class="mt-4 font-semibold p-3 bg-[#f5f5f7] rounded-lg border-l-4 border-[#0066cc]" style="color: #1d1d1f !important;">With diagram batang, kita tidak perlu membandingkan dan mengeja angka satu per satu seperti pada tabel.</p>
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
                                    .attr("class", "font-sans font-semibold text-xs")
                                    .style("fill", "#1d1d1f");

                                const maxVal = d3.max(data, d => d.Terjual);
                                const y = d3.scaleLinear()
                                  .domain([0, maxVal * 1.2]) 
                                  .range([ height, 0]);
                                
                                svg.append("g")
                                  .call(d3.axisLeft(y).ticks(5))
                                  .selectAll("text")
                                    .attr("class", "font-mono text-xs")
                                    .style("fill", "#7a7a7a");

                                svg.selectAll(".domain").attr("stroke", "#e0e0e0");
                                svg.selectAll(".tick line").attr("stroke", "#e0e0e0");

                                svg.selectAll("mybar")
                                  .data(data)
                                  .join("rect")
                                    .attr("x", d => x(d.Produk))
                                    .attr("width", x.bandwidth())
                                    .attr("fill", "#0066cc")
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
                                    .attr("class", "font-mono font-semibold text-xs")
                                    .style("fill", "#1d1d1f")
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
                            <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Bagian-Bagian Diagram Batang</h4>
                            <p class="mb-4">Agar dapat membaca grafik dengan benar, kita harus memahami anatomi atau bagian-bagian yang menyusun sebuah diagram batang.</p>
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-6">
                                <img src="/images/bagian-diagram-batang.png" alt="Bagian-Bagian Diagram Batang" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar bagian-diagram-batang.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-10 relative overflow-hidden">
                            <div class="text-center mb-6 relative z-10">
                                <h4 class="text-xl md:text-2xl font-semibold mb-1 tracking-tight" style="color: #1d1d1f !important;">Aktivitas Interaktif: Analisis Data Kelas</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Buat file <code>kelas.csv</code> sesuai panduan, unggah ke mesin D3.js, dan jawab ketiga pertanyaan di bawahnya berdasarkan grafik yang terbentuk!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start relative z-10">
                                
                                <div class="bg-white rounded-xl border border-[#e0e0e0] p-5 flex flex-col items-center">
                                    <h5 class="text-center font-semibold mb-3 border-b border-[#e0e0e0] pb-2 w-full" style="color: #1d1d1f !important;">UNGGAH DATA CSV KELAS</h5>
                                    
                                    <div class="w-full text-xs text-[#1d1d1f] mb-3 bg-[#f5f5f7] p-2 rounded border border-[#e0e0e0] text-center font-mono font-semibold">
                                        Kelas,Siswa<br>X-A,30<br>X-B,35<br>X-C,28<br>X-D,32
                                    </div>

                                    <div class="w-full bg-white rounded-xl border-2 border-dashed border-[#0066cc]/30 p-3 text-center hover:bg-[#fafafc] transition-colors cursor-pointer relative group mb-4">
                                        <input type="file" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleClassCSVUpload(event)">
                                        <p class="font-semibold text-[#0066cc] text-xs">Upload <code>kelas.csv</code> di sini</p>
                                    </div>

                                    <h5 class="text-center font-semibold mb-2 border-b border-[#e0e0e0] pb-2 w-full" style="color: #1d1d1f !important;">HASIL RENDER D3.JS</h5>
                                    
                                    <div id="d3-class-container" class="w-full relative min-h-[150px] flex items-center justify-center bg-[#f5f5f7] rounded-xl border border-[#e0e0e0]">
                                        <div id="class-placeholder" class="text-[#7a7a7a] font-semibold text-xs animate-pulse">Menunggu upload...</div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-2xl border border-[#e0e0e0] relative">
                                    
                                    <div id="quiz-locker" class="absolute inset-0 z-20 bg-white/90 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center transition-all duration-500">
                                        <span class="font-semibold text-[#7a7a7a] text-xs md:text-sm text-center px-4">Kuis terkunci. Silakan upload grafik D3.js terlebih dahulu!</span>
                                    </div>

                                    <div id="quiz-q1" class="space-y-3 mb-6 relative z-10">
                                        <p class="font-semibold text-[#1d1d1f] text-sm md:text-base">1. Kelas manakah yang memiliki jumlah siswa terbanyak?</p>
                                        <div class="flex gap-2">
                                            <button type="button" onclick="ansQ1(this, false)" class="btn-q1 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">X-A</button>
                                            <button type="button" onclick="ansQ1(this, true)" class="btn-q1 px-4 py-2 bg-[#f5f5f7] border border-[#0066cc] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #0066cc !important;">X-B</button>
                                            <button type="button" onclick="ansQ1(this, false)" class="btn-q1 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">X-C</button>
                                        </div>
                                    </div>

                                    <div id="quiz-q2" class="space-y-3 mb-6 opacity-40 pointer-events-none transition-all duration-500 relative z-10">
                                        <p class="font-semibold text-[#1d1d1f] text-sm md:text-base">2. Kelas manakah yang memiliki jumlah siswa paling sedikit?</p>
                                        <div class="flex gap-2">
                                            <button type="button" onclick="ansQ2(this, false)" class="btn-q2 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">X-A</button>
                                            <button type="button" onclick="ansQ2(this, true)" class="btn-q2 px-4 py-2 bg-[#f5f5f7] border border-[#0066cc] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #0066cc !important;">X-C</button>
                                            <button type="button" onclick="ansQ2(this, false)" class="btn-q2 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">X-D</button>
                                        </div>
                                    </div>

                                    <div id="quiz-q3" class="space-y-3 mb-6 opacity-40 pointer-events-none transition-all duration-500 relative z-10">
                                        <p class="font-semibold text-[#1d1d1f] text-sm md:text-base">3. Berapa selisih jumlah siswa antara kelas terbesar dan terkecil?</p>
                                        <div class="flex gap-2">
                                            <button type="button" onclick="ansQ3(this, false)" class="btn-q3 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">5 Siswa</button>
                                            <button type="button" onclick="ansQ3(this, true)" class="btn-q3 px-4 py-2 bg-[#f5f5f7] border border-[#0066cc] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #0066cc !important;">7 Siswa</button>
                                            <button type="button" onclick="ansQ3(this, false)" class="btn-q3 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">12 Siswa</button>
                                        </div>
                                    </div>

                                    <div id="quiz-success" class="hidden mt-4 bg-[#fafafc] border border-emerald-200 p-4 rounded-xl text-left animate-fade-in relative z-10">
                                        <h5 class="font-semibold text-base mb-1" style="color: #1d1d1f !important;">Luar Biasa!</h5>
                                        <p class="text-xs font-medium" style="color: #7a7a7a !important;">Diagram batang sangat cocok digunakan untuk membandingkan nilai antar kategori sehingga informasi dapat dipahami dengan cepat tanpa menghitung manual di tabel.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function ansQ1(btn, isCorrect) {
                                if(!isCorrect) {
                                    Swal.fire({
                                        title: 'Jawaban Kurang Tepat',
                                        text: 'Coba perhatikan lagi batang grafik mana yang paling panjang menjuntai.',
                                        icon: 'error',
                                        confirmButtonText: 'Coba Lagi',
                                        confirmButtonColor: '#0066cc',
                                        background: '#ffffff',
                                        color: '#1d1d1f'
                                    });
                                    return;
                                }
                                document.querySelectorAll('.btn-q1').forEach(b => { 
                                    b.disabled = true; 
                                    b.className = "px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-medium text-[#7a7a7a] text-xs opacity-50 cursor-not-allowed"; 
                                });
                                btn.className = "px-4 py-2 bg-[#0066cc] text-white rounded-lg font-semibold text-xs border-none";
                                document.getElementById('quiz-q2').classList.remove('opacity-40', 'pointer-events-none');
                            }
                            
                            function ansQ2(btn, isCorrect) {
                                if(!isCorrect) {
                                    Swal.fire({
                                        title: 'Jawaban Kurang Tepat',
                                        text: 'Cari batang yang ukurannya paling pendek atau kecil.',
                                        icon: 'error',
                                        confirmButtonText: 'Coba Lagi',
                                        confirmButtonColor: '#0066cc',
                                        background: '#ffffff',
                                        color: '#1d1d1f'
                                    });
                                    return;
                                }
                                document.querySelectorAll('.btn-q2').forEach(b => { 
                                    b.disabled = true; 
                                    b.className = "px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-medium text-[#7a7a7a] text-xs opacity-50 cursor-not-allowed"; 
                                });
                                btn.className = "px-4 py-2 bg-[#0066cc] text-white rounded-lg font-semibold text-xs border-none";
                                document.getElementById('quiz-q3').classList.remove('opacity-40', 'pointer-events-none');
                            }
                            
                            function ansQ3(btn, isCorrect) {
                                if(!isCorrect) {
                                    Swal.fire({
                                        title: 'Jawaban Kurang Tepat',
                                        text: 'Kelas terbanyak = X-B (35). Kelas terkecil = X-C (28). Berapa selisihnya (35 dikurang 28)?',
                                        icon: 'error',
                                        confirmButtonText: 'Coba Lagi',
                                        confirmButtonColor: '#0066cc',
                                        background: '#ffffff',
                                        color: '#1d1d1f'
                                    });
                                    return;
                                }
                                document.querySelectorAll('.btn-q3').forEach(b => { 
                                    b.disabled = true; 
                                    b.className = "px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-medium text-[#7a7a7a] text-xs opacity-50 cursor-not-allowed"; 
                                });
                                btn.className = "px-4 py-2 bg-[#0066cc] text-white rounded-lg font-semibold text-xs border-none";
                                document.getElementById('quiz-success').classList.remove('hidden');
                            }

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
                                
                                document.getElementById('quiz-locker').style.opacity = '0';
                                setTimeout(() => document.getElementById('quiz-locker').classList.add('hidden'), 500);
                            }

                            function drawClassD3BarChart(data) {
                                d3.select("#d3-class-container").selectAll("*").remove();

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
                                    .attr("class", "font-sans font-semibold text-xs")
                                    .style("fill", "#1d1d1f");

                                const maxVal = d3.max(data, d => d.Siswa);
                                const x = d3.scaleLinear()
                                  .domain([0, maxVal * 1.2]) 
                                  .range([ 0, width]);

                                svg.selectAll(".domain").attr("stroke", "none");
                                svg.selectAll(".tick line").attr("stroke", "none");
                                svg.selectAll(".tick text").attr("dx", "-5");

                                svg.selectAll("mybar")
                                  .data(data)
                                  .join("rect")
                                    .attr("x", x(0))
                                    .attr("y", d => y(d.Kelas))
                                    .attr("height", y.bandwidth())
                                    .attr("fill", "#0066cc")
                                    .attr("rx", 3)
                                    .attr("width", 0)
                                  .transition()
                                  .duration(1000)
                                  .delay((d,i) => i * 200)
                                    .attr("width", d => x(d.Siswa));

                                svg.selectAll("mytext")
                                  .data(data)
                                  .join("text")
                                    .attr("y", d => y(d.Kelas) + y.bandwidth()/2 + 4)
                                    .attr("x", x(0)) 
                                    .text(d => d.Siswa)
                                    .attr("class", "font-mono font-semibold text-[10px]")
                                    .style("fill", "#1d1d1f")
                                    .style("opacity", 0)
                                  .transition()
                                  .duration(1000)
                                  .delay((d,i) => i * 200)
                                    .attr("x", d => x(d.Siswa) + 5)
                                    .style("opacity", 1);
                            }
                        </script>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-[#e0e0e0] my-8 text-center max-w-2xl mx-auto shadow-none">
                        <h4 class="font-semibold text-lg mb-2" style="color: #1d1d1f !important;">Mini Refleksi</h4>
                        <p class="font-medium text-sm md:text-base" style="color: #333333 !important;">
                            Mengapa diagram batang lebih mudah digunakan untuk membandingkan jumlah penjualan produk dibandingkan hanya melihat tabel data?
                        </p>
                        <p class="text-xs mt-3 italic font-medium" style="color: #7a7a7a !important;">Renungkan jawabannya dan diskusikan bersama teman sebangkumu!</p>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        C. Histogram
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-[#333333] font-medium">
                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Apa Itu Histogram?</h4>
                            <p><strong>Histogram</strong> adalah jenis visualisasi data yang digunakan untuk menunjukkan sebaran (distribusi) data numerik ke dalam beberapa kelompok nilai (interval).</p>
                            <p class="mt-3">Sekilas histogram terlihat mirip dengan diagram batang. Namun, histogram digunakan untuk data berupa angka yang berurutan, seperti nilai ujian, tinggi badan, atau umur.</p>
                            <p class="mt-3 bg-[#f5f5f7] p-4 rounded-xl border-l-4 border-[#0066cc] font-medium" style="color: #1d1d1f !important;">Pada histogram, batang-batang saling menempel karena setiap batang mewakili rentang nilai yang berdekatan.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Perbedaan Diagram Batang dan Histogram</h4>
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/perbedaan-batang-histogram.png" alt="Tabel Perbedaan Diagram Batang dan Histogram" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar perbedaan-batang-histogram.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Kapan Histogram Digunakan?</h4>
                            <p class="mb-3 text-[#7a7a7a] text-sm md:text-base">Histogram digunakan ketika kita ingin mengetahui:</p>
                            <ul class="list-disc pl-6 space-y-1.5 font-medium mb-4" style="color: #333333 !important;">
                                <li>Sebaran data.</li>
                                <li>Rentang nilai yang paling banyak muncul.</li>
                                <li>Apakah data terkumpul pada nilai tertentu.</li>
                                <li>Apakah terdapat nilai yang sangat rendah atau sangat tinggi.</li>
                            </ul>
                            
                            <p class="font-semibold mb-2" style="color: #ffffff !important;">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1.5 font-medium mb-6" style="color: #333333 !important;">
                                <li>Nilai ujian siswa.</li>
                                <li>Tinggi badan siswa.</li>
                                <li>Lama penggunaan internet per hari.</li>
                                <li>Umur pengunjung perpustakaan.</li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Contoh Histogram</h4>
                            <p class="text-[#7a7a7a] text-sm md:text-base">Perhatikan data nilai matematika berikut:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/contoh-tabel-nilai-matematika.png" alt="Tabel Nilai Matematika" class="w-full max-w-sm mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar contoh-tabel-nilai-matematika.png di folder public/images/</div>';">
                            </div>

                            <p>Data tersebut dapat dikelompokkan menjadi beberapa rentang nilai. Visualisasi histogram akan menunjukkan bagaimana nilai siswa tersebar pada setiap rentang nilai.</p>

                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/contoh-histogram-nilai.png" alt="Visualisasi Histogram Nilai Matematika" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar contoh-histogram-nilai.png di folder public/images/</div>';">
                            </div>

                            <h4 class="font-semibold text-xl mt-8 mb-2" style="color: #ffffff !important;">Cara Membaca Histogram</h4>
                            <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 rounded-2xl mb-6 text-base font-medium">
                                <h5 class="font-semibold mb-3" style="color: #1d1d1f !important;">Berdasarkan histogram tersebut dapat diketahui bahwa:</h5>
                                <ul class="list-disc pl-6 space-y-2" style="color: #333333 !important;">
                                    <li>Sebagian besar siswa memperoleh nilai antara 60 hingga 89.</li>
                                    <li>Hanya sedikit siswa yang memperoleh nilai di bawah 60.</li>
                                    <li>Hanya sedikit siswa yang memperoleh nilai di atas 90.</li>
                                    <li>Data nilai cenderung terkumpul pada rentang Tengah.</li>
                                </ul>
                                <p class="mt-4 font-semibold p-3 bg-[#f5f5f7] rounded-lg border-l-4 border-[#0066cc]" style="color: #1d1d1f !important;">Histogram membantu melihat pola distribusi data yang sulit terlihat jika hanya menggunakan tabel.</p>
                            </div>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-10 relative">
                            
                            <div class="text-center mb-8 border-b border-[#e0e0e0] pb-6">
                                <h4 class="text-xl md:text-2xl font-semibold mb-2" style="color: #1d1d1f !important;">Aktivitas Interaktif 1: Mengamati Sebaran Nilai</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Siswa mengunggah file CSV yang berisi nilai siswa (Contoh format: <code>Nama,Nilai</code>), kemudian memilih menu Histogram pada aplikasi web.</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                                
                                <div class="lg:col-span-4 space-y-6">
                                    <div class="w-full bg-white rounded-xl border-2 border-dashed border-[#0066cc]/30 p-5 text-center hover:bg-[#fafafc] transition-colors cursor-pointer relative group">
                                        <input type="file" id="histCsvInput" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleHistD3Upload(event)">
                                        <p class="font-semibold text-[#0066cc] text-sm mb-1">Unggah CSV Nilai</p>
                                        <p class="text-[10px] text-[#7a7a7a] font-mono font-medium">Contoh: Andi,85</p>
                                    </div>

                                    <div id="hist-activity-2" class="bg-white rounded-xl p-5 border border-[#e0e0e0] space-y-4 opacity-40 pointer-events-none transition-all duration-500">
                                        <h5 class="font-semibold border-b border-[#e0e0e0] pb-2 text-sm" style="color: #1d1d1f !important;">Aktivitas 2: Mengubah Jumlah Interval</h5>
                                        <p class="text-xs font-medium mb-2" style="color: #7a7a7a !important;">Ubahlah jumlah interval histogram, lalu amati bentuk yang dihasilkan!</p>
                                        <div class="flex flex-col gap-2">
                                            <button type="button" onclick="updateD3HistogramBins(5)" id="btn-bin-5" class="py-2 bg-[#0066cc] text-white font-medium rounded-lg text-xs transition-colors border-none cursor-pointer">5 Interval</button>
                                            <button type="button" onclick="updateD3HistogramBins(8)" id="btn-bin-8" class="py-2 bg-[#f5f5f7] border border-[#e0e0e0] text-[#1d1d1f] font-medium rounded-lg text-xs hover:bg-[#e0e0e0] transition-colors cursor-pointer">8 Interval</button>
                                            <button type="button" onclick="updateD3HistogramBins(10)" id="btn-bin-10" class="py-2 bg-[#f5f5f7] border border-[#e0e0e0] text-[#1d1d1f] font-medium rounded-lg text-xs hover:bg-[#e0e0e0] transition-colors cursor-pointer">10 Interval</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-8 space-y-6">
                                    <div class="bg-white p-2 rounded-2xl border border-[#e0e0e0] flex flex-col items-center justify-center min-h-[300px] relative overflow-hidden">
                                        <div id="d3-hist-placeholder" class="absolute inset-0 flex flex-col items-center justify-center bg-white/90 z-10 transition-opacity duration-500">
                                            <p class="text-xs font-semibold text-[#7a7a7a]">Menunggu data CSV...</p>
                                        </div>
                                        <div id="d3-histogram-container" class="w-full flex justify-center py-4"></div>
                                    </div>

                                    <div id="hist-quiz-panel" class="bg-[#fafafc] border border-[#e0e0e0] p-5 rounded-2xl opacity-40 pointer-events-none transition-all duration-500 relative">
                                        <h5 class="font-semibold mb-4 text-sm" style="color: #1d1d1f !important;">Tugas Analisis:</h5>
                                        <div class="space-y-4 text-sm">
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">1. Rentang nilai manakah yang memiliki jumlah siswa terbanyak?</p>
                                                <input type="text" id="ans-h1" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]" placeholder="Ketik jawabanmu...">
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">2. Apakah nilai siswa lebih banyak terkumpul pada rentang rendah, sedang, atau tinggi?</p>
                                                <select id="ans-h2" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]">
                                                    <option value="">Pilih...</option>
                                                    <option value="rendah">Rendah</option>
                                                    <option value="sedang">Sedang</option>
                                                    <option value="tinggi">Tinggi</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">3. Apa kesimpulan yang dapat diperoleh dari histogram tersebut?</p>
                                                <textarea id="ans-h3" rows="2" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]" placeholder="Ketik kesimpulan..."></textarea>
                                            </div>
                                            <button type="button" onclick="cekJawabanHist()" class="w-full py-2 bg-[#0066cc] hover:bg-[#0071e3] text-white font-medium rounded-lg text-xs transition-colors border-none cursor-pointer">Cek Jawaban</button>
                                        </div>

                                        <div id="hist-feedback" class="hidden mt-4 p-4 bg-[#fafafc] border border-emerald-200 rounded-xl text-xs leading-relaxed" style="color: #333333 !important;">
                                            <strong style="color: #1d1d1f !important;">Umpan Balik Sistem:</strong> Jawabanmu telah direkam. Histogram membuktikan bahwa data numerik tersebar dalam beberapa rentang nilai, bukan untuk membandingkan kategori seperti diagram batang! Bentuk histogram juga akan semakin detail (batang makin banyak/sempit) saat interval dinaikkan dari 5 ke 10.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-4 rounded-xl font-semibold border-l-4 border-[#0066cc] text-sm mb-8" style="color: #1d1d1f !important;">
                            Catatan: Histogram digunakan untuk melihat bagaimana data numerik tersebar dalam beberapa rentang nilai, bukan untuk membandingkan kategori seperti pada diagram batang.
                        </div>

                        <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e0e0e0] text-center max-w-3xl mx-auto my-12 relative overflow-hidden shadow-none">
                            <h4 class="font-semibold text-xl mb-4" style="color: #1d1d1f !important;">Mini Refleksi</h4>
                            <p class="font-medium text-base mb-4 leading-relaxed" style="color: #333333 !important;">
                                Perhatikan diagram batang dan histogram yang menampilkan data berbeda. Tuliskan <strong>satu perbedaan utama</strong> antara diagram batang dan histogram berdasarkan fungsi penggunaannya!
                            </p>
                            <p class="text-xs italic font-medium" style="color: #7a7a7a !important;">Diskusikan refleksimu di kelas.</p>
                        </div>

                        <p class="text-base md:text-lg leading-relaxed bg-[#f5f5f7] p-4 rounded-lg border border-[#e0e0e0] font-medium" style="color: #333333 !important;">
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
                                    
                                    document.getElementById('hist-activity-2').classList.remove('opacity-40', 'pointer-events-none');
                                    document.getElementById('hist-quiz-panel').classList.remove('opacity-40', 'pointer-events-none');

                                    drawD3RealHistogram();
                                } else {
                                    Swal.fire({
                                        title: 'Gagal Memuat Berkas',
                                        text: 'Pastikan format CSV sesuai pedoman (Nama, Nilai)',
                                        icon: 'error',
                                        confirmButtonText: 'Lanjutkan',
                                        confirmButtonColor: '#0066cc',
                                        background: '#ffffff',
                                        color: '#1d1d1f'
                                    });
                                }
                            };
                            reader.readAsText(file);
                        }

                        function updateD3HistogramBins(bins) {
                            currentBinCount = bins;
                            
                            [5, 8, 10].forEach(b => {
                                let btn = document.getElementById(`btn-bin-${b}`);
                                btn.className = "py-2 bg-[#f5f5f7] border border-[#e0e0e0] text-[#1d1d1f] font-medium rounded-lg text-xs hover:bg-[#e0e0e0] transition-colors cursor-pointer";
                            });
                            document.getElementById(`btn-bin-${bins}`).className = "py-2 bg-[#0066cc] text-white font-medium rounded-lg text-xs transition-colors border-none cursor-pointer";

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

                            const maxVal = d3.max(histDataRaw) > 100 ? d3.max(histDataRaw) : 100;
                            const x = d3.scaleLinear()
                                .domain([0, maxVal])
                                .range([0, width]);
                                
                            svg.append("g")
                                .attr("transform", `translate(0,${height})`)
                                .call(d3.axisBottom(x))
                                .selectAll("text")
                                    .attr("class", "font-mono text-xs")
                                    .style("fill", "#7a7a7a");

                            const histogram = d3.bin()
                                .value(d => d)
                                .domain(x.domain())
                                .thresholds(x.ticks(currentBinCount));

                            const bins = histogram(histDataRaw);

                            const y = d3.scaleLinear()
                                .range([height, 0]);
                            y.domain([0, d3.max(bins, function(d) { return d.length; }) + 1]); 

                            svg.append("g")
                                .call(d3.axisLeft(y).ticks(5))
                                .selectAll("text")
                                    .attr("class", "font-mono text-xs")
                                    .style("fill", "#7a7a7a");

                            svg.selectAll(".domain").attr("stroke", "#e0e0e0");
                            svg.selectAll(".tick line").attr("stroke", "#e0e0e0");

                            svg.selectAll("rect")
                                .data(bins)
                                .join("rect")
                                    .attr("x", 1)
                                    .attr("transform", function(d) { return `translate(${x(d.x0)}, ${y(d.length)})`; })
                                    .attr("width", function(d) { return Math.max(0, x(d.x1) - x(d.x0) - 1); }) 
                                    .attr("height", function(d) { return height - y(d.length); })
                                    .style("fill", "#0066cc")
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
                                Swal.fire({
                                    title: 'Kuis Belum Selesai',
                                    text: 'Silakan pilih opsi jawaban untuk pertanyaan nomor 2 terlebih dahulu!',
                                    icon: 'warning',
                                    confirmButtonText: 'Paham',
                                    confirmButtonColor: '#0066cc',
                                    background: '#ffffff',
                                    color: '#1d1d1f'
                                });
                            }
                        }
                    </script>
                </div>

                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        D. Box Plot & Deteksi Outlier
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-[#333333] font-medium">
                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Apa Itu Box Plot?</h4>
                            <p><strong>Box Plot (Diagram Kotak Garis)</strong> adalah jenis visualisasi data yang digunakan untuk menampilkan ringkasan sebaran data dalam satu gambar yang sederhana.</p>
                            <p class="mt-2" style="color: #7a7a7a !important;">Box Plot dapat membantu kita mengetahui:</p>
                            <ul class="list-disc pl-6 space-y-1 my-2" style="color: #333333 !important;">
                                <li>Nilai terkecil (minimum)</li>
                                <li>Nilai terbesar (maksimum)</li>
                                <li>Nilai tengah (median)</li>
                                <li>Sebaran data</li>
                                <li>Data yang menyimpang (<em>outlier</em>)</li>
                            </ul>
                            <p>Karena dapat menyajikan banyak informasi dalam satu gambar, Box Plot sering digunakan untuk menganalisis distribusi data dengan cepat.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Mengapa Menggunakan Box Plot?</h4>
                            <p class="text-[#7a7a7a] text-sm md:text-base">Perhatikan data nilai berikut:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-4 max-w-sm mx-auto font-mono text-sm font-semibold text-[#1d1d1f]">
                                <div class="grid grid-cols-1 border border-[#e0e0e0] rounded-lg overflow-hidden">
                                    <div class="bg-[#f5f5f7] p-2 border-b border-[#e0e0e0] font-sans font-semibold text-[#7a7a7a]">Nilai</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">60</div>
                                    <div class="p-2 border-b border-[#e0e0e0] bg-[#fafafc]">65</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">70</div>
                                    <div class="p-2 border-b border-[#e0e0e0] bg-[#fafafc]">75</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">80</div>
                                    <div class="p-2 border-b border-[#e0e0e0] bg-[#fafafc]">85</div>
                                    <div class="p-2">90</div>
                                </div>
                            </div>
                            
                            <p>Dari tabel tersebut kita dapat mengetahui nilai siswa. Namun, untuk mengetahui posisi nilai tengah dan sebaran data secara keseluruhan, diperlukan visualisasi yang lebih ringkas. Salah satu visualisasi yang dapat digunakan untuk merangkum informasi tersebut adalah Box Plot.</p>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Bagian-Bagian Box Plot</h4>
                            <p class="mb-4">Box Plot terdiri atas beberapa bagian penting:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-6">
                                <img src="/images/bagian-box-plot.png" alt="Bagian-Bagian Diagram Box Plot" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar bagian-box-plot.png di folder public/images/</div>';">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm font-medium">
                                <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0]">
                                    <strong class="text-[#000000] text-base block mb-1">1. Nilai Minimum</strong>
                                    <span style="color: #000000 !important;">Nilai terkecil dalam kumpulan data.</span>
                                </div>
                                <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0]">
                                    <strong class="text-[#000000] text-base block mb-1">2. Kuartil Bawah (Q1)</strong>
                                    <span style="color: #000000 !important;">Batas 25% data terbawah.</span>
                                </div>
                                <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0]">
                                    <strong class="text-[#000000] text-base block mb-1">3. Median (Q2)</strong>
                                    <span style="color: #000000 !important;">Nilai tengah data.</span>
                                </div>
                                <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0]">
                                    <strong class="text-[#000000] text-base block mb-1">4. Kuartil Atas (Q3)</strong>
                                    <span style="color: #000000 !important;">Batas 75% data.</span>
                                </div>
                                <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] md:col-span-2 text-center">
                                    <strong class="text-[#000000] text-base block mb-1">5. Nilai Maksimum</strong>
                                    <span style="color: #000000 !important;">Nilai terbesar dalam kumpulan data.</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Contoh Diagram Box Plot dan Cara Membacanya</h4>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-6">
                                <img src="/images/contoh-box-plot-baca.png" alt="Contoh Membaca Diagram Box Plot" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar contoh-box-plot-baca.png di folder public/images/</div>';">
                            </div>

                            <p class="font-semibold mb-2" style="color: #ffffff !important;">Informasi yang dapat diperoleh:</p>
                            <ul class="list-disc pl-6 space-y-1 font-medium mb-4" style="color: #333333 !important;">
                                <li>Median menunjukkan nilai tengah data.</li>
                                <li>Kotak menunjukkan sebagian besar data berada.</li>
                                <li>Garis kiri dan kanan menunjukkan rentang data.</li>
                                <li>Data yang jauh dari kelompok utama dapat terlihat sebagai outlier.</li>
                            </ul>
                            <div class="p-5 rounded-xl border-l-4 border-[#0066cc] bg-[#f5f5f7] text-sm font-semibold" style="color: #1d1d1f !important;">
                                Dengan melihat Box Plot, kita dapat memahami distribusi data tanpa harus membaca seluruh data satu per satu. Box Plot dapat merangkum banyak informasi tentang data hanya dalam satu gambar sederhana.
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4 border-b border-[#e0e0e0] pb-2" style="color: #ffffff !important;">Mengenal Outlier</h4>
                            <p class="mb-4"><strong>Outlier</strong> adalah data yang nilainya sangat berbeda dibandingkan sebagian besar data lainnya.</p>
                            
                            <p class="font-semibold mb-2" style="color: #ffffff !important;">Contoh Tabel Nilai:</p>
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-4 max-w-[150px] font-mono text-sm font-semibold text-[#1d1d1f]">
                                <div class="grid grid-cols-1 border border-[#e0e0e0] rounded-lg overflow-hidden">
                                    <div class="bg-[#f5f5f7] p-2 border-b border-[#e0e0e0] font-sans text-[#7a7a7a]">Nilai</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">70</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">72</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">75</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">78</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">80</div>
                                    <div class="p-2 border-b border-[#e0e0e0]">82</div>
                                    <div class="p-2 bg-red-50 text-[#ff453a] font-bold">150</div>
                                </div>
                            </div>
                            <p>Nilai <strong>150</strong> jauh lebih besar dibandingkan nilai lainnya sehingga dapat dianggap sebagai outlier.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/visualisasi-outlier.png" alt="Visualisasi Titik Outlier pada Grafik" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar visualisasi-outlier.png di folder public/images/</div>';">
                            </div>

                            <h5 class="font-semibold text-lg mt-6 mb-2" style="color: #ffffff !important;">Mengapa Outlier Penting?</h5>
                            <p class="mb-2 text-[#7a7a7a] text-sm md:text-base">Outlier dapat memberikan informasi penting, misalnya:</p>
                            <ul class="list-disc pl-6 space-y-1 font-medium mb-4" style="color: #333333 !important;">
                                <li>Kesalahan pencatatan data.</li>
                                <li>Data yang sangat unik.</li>
                                <li>Kondisi khusus yang perlu diperhatikan.</li>
                            </ul>
                            <div class="p-4 bg-[#f5f5f7] rounded-xl border border-[#e0e0e0] text-sm font-semibold" style="color: #1d1d1f !important;">
                                Karena itu, outlier tidak selalu harus dihapus. Kita perlu memahami penyebab kemunculannya terlebih dahulu.
                            </div>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-10 relative overflow-hidden">
                            <div class="text-center mb-6 relative z-10 border-b border-[#e0e0e0] pb-4">
                                <h4 class="text-xl md:text-2xl font-semibold mb-1" style="color: #1d1d1f !important;">Aktivitas Interaktif: Menemukan Outlier</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Buat file <code>outlier.csv</code> sesuai panduan di bawah, unggah ke aplikasi web, dan perhatikan Box Plot yang terbentuk secara otomatis!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                                
                                <div class="lg:col-span-6 bg-white rounded-xl border border-[#e0e0e0] p-5 flex flex-col items-center">
                                    <h5 class="text-center font-semibold mb-3 border-b border-[#e0e0e0] pb-2 w-full text-xs" style="color: #1d1d1f !important;">FORMAT CSV (Contoh Modul)</h5>
                                    <div class="w-full text-xs text-[#1d1d1f] mb-3 bg-[#f5f5f7] p-2 rounded border border-[#e0e0e0] text-center font-mono font-semibold leading-tight">
                                        Nama,Nilai<br>Andi,75<br>Budi,80<br>Citra,78<br>Deni,82<br><span class="text-[#ff453a] animate-pulse font-bold">Eka,150</span>
                                    </div>

                                    <div class="w-full bg-white rounded-xl border-2 border-dashed border-[#0066cc]/30 p-3 text-center hover:bg-[#fafafc] transition-colors cursor-pointer relative group mb-6">
                                        <input type="file" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleBoxplotCSVUpload(event)">
                                        <p class="font-semibold text-[#0066cc] text-xs">Unggah File CSV</p>
                                    </div>

                                    <h5 class="text-center font-semibold mb-2 border-b border-[#e0e0e0] pb-2 w-full text-xs" style="color: #1d1d1f !important;">HASIL BOX PLOT D3.JS</h5>
                                    
                                    <div id="d3-boxplot-container" class="w-full relative min-h-[160px] flex items-center justify-center bg-[#f5f5f7] rounded-xl border border-[#e0e0e0] overflow-hidden">
                                        <div id="boxplot-placeholder" class="text-[#7a7a7a] font-semibold text-xs animate-pulse text-center px-4 transition-opacity duration-500">
                                            Menunggu unggahan data CSV...<br><span class="text-[10px] font-medium opacity-70">Aplikasi web akan menampilkan Box Plot secara otomatis</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6 bg-white p-6 rounded-2xl border border-[#e0e0e0] relative min-h-[350px]">
                                    
                                    <div id="box-quiz-locker" class="absolute inset-0 z-20 bg-white/95 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center transition-all duration-500">
                                        <span class="font-semibold text-[#7a7a7a] text-xs md:text-sm text-center px-4">Tugas Terkunci. Unggah file CSV yang mengandung data Eka (150) untuk membuka pertanyaan!</span>
                                    </div>

                                    <h5 class="font-semibold border-b border-[#e0e0e0] pb-2 mb-4" style="color: #1d1d1f !important;">📋 Lembar Tugas Box Plot:</h5>
                                    <div class="space-y-4 text-sm font-medium relative z-10">
                                        <div>
                                            <p class="mb-1 text-xs" style="color: #333333 !important;">1. Nilai manakah yang tampak berbeda dari data lainnya?</p>
                                            <div class="flex flex-wrap gap-2">
                                                <button type="button" onclick="ansBoxQ1(this, false)" class="btn-bq1 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">Nilai 75</button>
                                                <button type="button" onclick="ansBoxQ1(this, false)" class="btn-bq1 px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">Nilai 82</button>
                                                <button type="button" onclick="ansBoxQ1(this, true)" class="btn-bq1 px-4 py-2 bg-[#f5f5f7] border border-[#0066cc] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #0066cc !important;">Nilai 150</button>
                                            </div>
                                        </div>

                                        <div id="box-q2" class="opacity-30 pointer-events-none transition-all duration-500">
                                            <p class="mb-1 text-xs" style="color: #333333 !important;">2. Mengapa nilai tersebut dapat dianggap sebagai outlier?</p>
                                            <select id="ans-bq2" onchange="ansBoxQ2()" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs outline-none focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] text-[#1d1d1f] font-semibold">
                                                <option value="">Pilih alasan yang tepat...</option>
                                                <option value="a">Karena nilainya ganjil</option>
                                                <option value="b">Karena nilainya sangat menyimpang/berbeda jauh dari mayoritas data lainnya</option>
                                                <option value="c">Karena nilainya paling akurat</option>
                                            </select>
                                        </div>

                                        <div id="box-q3" class="opacity-30 pointer-events-none transition-all duration-500">
                                            <p class="mb-1 text-xs" style="color: #333333 !important;">3. Apakah outlier selalu berarti data salah?</p>
                                            <div class="flex flex-col gap-2">
                                                <button type="button" onclick="ansBoxQ3(this, true)" class="btn-bq3 w-full py-2 bg-[#f5f5f7] border border-[#0066cc] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #0066cc !important;">Tidak selalu (Bisa jadi kondisi unik)</button>
                                                <button type="button" onclick="ansBoxQ3(this, false)" class="btn-bq3 w-full py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-semibold hover:bg-[#e0e0e0] transition-colors text-xs cursor-pointer" style="color: #1d1d1f !important;">Ya, selalu salah</button>
                                            </div>
                                        </div>

                                        <div id="box-quiz-success" class="hidden mt-4 bg-[#fafafc] border border-emerald-200 p-4 rounded-xl text-xs font-medium animate-fade-in leading-relaxed" style="color: #333333 !important;">
                                            <strong style="color: #1d1d1f !important;">Analisis Tepat!</strong> Box Plot membantu menampilkan nilai tengah, sebaran data, dan <em>outlier</em> dalam satu visualisasi yang ringkas. Titik terpisah di ujung kanan adalah angka 150 karena menyimpang terlalu jauh dari kotak utama data kelas!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e0e0e0] text-center max-w-3xl mx-auto my-12 relative overflow-hidden shadow-none">
                            <h4 class="font-semibold text-xl mb-4" style="color: #1d1d1f !important;">Mini Refleksi</h4>
                            <p class="font-medium text-base mb-4 leading-relaxed" style="color: #333333 !important;">
                                Perhatikan sebuah Box Plot yang memiliki satu titik jauh di luar kotak. Tuliskan informasi apa yang dapat disimpulkan dari keberadaan titik tersebut.
                            </p>
                            
                            <div class="text-sm bg-[#f5f5f7] p-4 rounded-xl text-left border border-[#e0e0e0] leading-relaxed font-medium mt-6" style="color: #333333 !important;">
                                Box Plot membantu kita memahami sebaran data dalam satu variabel. Namun, Box Plot belum dapat menunjukkan hubungan antara dua variabel yang berbeda. Untuk melihat apakah dua variabel saling berhubungan, kita dapat menggunakan visualisasi lain yang disebut <strong>Scatter Plot</strong>.
                            </div>
                        </div>
                    </div>

                <script src="https://d3js.org/d3.v7.min.js"></script>
                <script>
                    function ansBoxQ1(btn, isCorrect) {
                        if(!isCorrect) {
                            Swal.fire({
                                title: 'Jawaban Kurang Tepat',
                                text: 'Angka itu masih berdekatan dengan kelompok. Cari angka yang abnormal (paling ujung)!',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                                confirmButtonColor: '#0066cc',
                                background: '#ffffff',
                                color: '#1d1d1f'
                            });
                            return;
                        }
                        document.querySelectorAll('.btn-bq1').forEach(b => { 
                            b.disabled = true; 
                            b.className = "px-4 py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-medium text-[#7a7a7a] text-xs opacity-50 cursor-not-allowed"; 
                        });
                        btn.className = "px-4 py-2 bg-[#0066cc] text-white rounded-lg font-semibold text-xs border-none";
                        document.getElementById('box-q2').classList.remove('opacity-30', 'pointer-events-none');
                    }

                    function ansBoxQ2() {
                        if(document.getElementById('ans-bq2').value === 'b') {
                            document.getElementById('box-q3').classList.remove('opacity-30', 'pointer-events-none');
                        } else {
                            Swal.fire({
                                title: 'Jawaban Kurang Tepat',
                                text: 'Ingat definisi awal Outlier!',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                                confirmButtonColor: '#0066cc',
                                background: '#ffffff',
                                color: '#1d1d1f'
                            });
                            document.getElementById('ans-bq2').value = '';
                        }
                    }

                    function ansBoxQ3(btn, isCorrect) {
                        if(!isCorrect) {
                            Swal.fire({
                                title: 'Jawaban Kurang Tepat',
                                text: 'Ingat materi di atas, Outlier kadang menandakan kejadian langka yang nyata, bukan selalu salah input.',
                                icon: 'error',
                                confirmButtonText: 'Coba Lagi',
                                confirmButtonColor: '#0066cc',
                                background: '#ffffff',
                                color: '#1d1d1f'
                            });
                            return;
                        }
                        document.querySelectorAll('.btn-bq3').forEach(b => { 
                            b.disabled = true; 
                            b.className = "w-full py-2 bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg font-medium text-[#7a7a7a] text-xs opacity-50 cursor-not-allowed"; 
                        });
                        btn.className = "w-full py-2 bg-[#0066cc] text-white rounded-lg font-semibold text-xs border-none";
                        document.getElementById('box-quiz-success').classList.remove('hidden');
                    }

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
                                document.getElementById('boxplot-placeholder').style.opacity = '0';
                                setTimeout(() => document.getElementById('boxplot-placeholder').classList.add('hidden'), 300);
                                
                                let hasOutlier = rawValues.some(v => v >= 150);
                                if(hasOutlier) {
                                    document.getElementById('box-quiz-locker').style.opacity = '0';
                                    setTimeout(() => document.getElementById('box-quiz-locker').classList.add('hidden'), 500);
                                }

                                drawD3BoxPlot(rawValues);
                            } else {
                                Swal.fire({
                                    title: 'Data Tidak Valid',
                                    text: 'Pastikan baris ke-2 dst berformat: Nama, Angka (misal: Eka,150)',
                                    icon: 'error',
                                    confirmButtonText: 'Paham',
                                    confirmButtonColor: '#0066cc',
                                    background: '#ffffff',
                                    color: '#1d1d1f'
                                });
                            }
                        };
                        reader.readAsText(file);
                    }

                    function drawD3BoxPlot(dataArray) {
                        d3.select("#d3-boxplot-container").selectAll("*").remove();

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

                        let sortedData = dataArray.sort(d3.ascending);
                        let q1 = d3.quantile(sortedData, .25);
                        let median = d3.quantile(sortedData, .5);
                        let q3 = d3.quantile(sortedData, .75);
                        let interQuantileRange = q3 - q1;
                        let dataMin = d3.min(sortedData);
                        let dataMax = d3.max(sortedData);
                        
                        let lowerBound = q1 - 1.5 * interQuantileRange;
                        let upperBound = q3 + 1.5 * interQuantileRange;

                        let whiskerMin = Math.max(dataMin, lowerBound);
                        let whiskerMax = Math.min(dataMax, upperBound);

                        const x = d3.scaleLinear()
                          .domain([Math.min(dataMin, 0) - 10, dataMax + 20])
                          .range([0, width]);
                          
                        svg.append("g")
                          .attr("transform", `translate(0,${height})`)
                          .call(d3.axisBottom(x).ticks(6))
                          .selectAll("text")
                            .attr("class", "font-mono text-[10px] font-semibold")
                            .style("fill", "#7a7a7a");

                        svg.selectAll(".domain").attr("stroke", "#e0e0e0");
                        svg.selectAll(".tick line").attr("stroke", "#e0e0e0");

                        svg.append("line")
                          .attr("x1", x(whiskerMin))
                          .attr("x2", x(whiskerMin))
                          .attr("y1", height/2)
                          .attr("y2", height/2)
                          .attr("stroke", "#0066cc")
                          .attr("stroke-width", 2)
                          .transition()
                          .duration(1000)
                          .attr("x2", x(whiskerMax));

                        svg.append("rect")
                          .attr("x", x(q1))
                          .attr("y", height/2 - 20)
                          .attr("height", 40)
                          .attr("stroke", "#0066cc")
                          .attr("stroke-width", 2)
                          .style("fill", "#fafafc")
                          .attr("width", 0)
                          .transition()
                          .duration(1000)
                          .attr("width", x(q3) - x(q1));

                        svg.append("line")
                          .attr("x1", x(median))
                          .attr("x2", x(median))
                          .attr("y1", height/2 - 20)
                          .attr("y2", height/2 + 20)
                          .attr("stroke", "#0066cc")
                          .attr("stroke-width", 3)
                          .style("opacity", 0)
                          .transition()
                          .delay(500)
                          .duration(500)
                          .style("opacity", 1);

                        let outliers = sortedData.filter(d => d < lowerBound || d > upperBound);
                        
                        svg.selectAll("outlierDots")
                          .data(outliers)
                          .join("circle")
                            .attr("cx", d => x(d))
                            .attr("cy", height/2)
                            .attr("r", 0)
                            .style("fill", "#ff453a")
                            .attr("stroke", "white")
                            .attr("stroke-width", 1.5)
                          .transition()
                          .delay(1000)
                          .duration(500)
                            .attr("r", 6);
                    }
                </script>
            

                <div class="mt-20 pb-10 font-sans" style="color: #ffffff !important;">
                    <h3 class="text-2xl md:text-3xl font-semibold mb-6 border-b border-[#e0e0e0] pb-4 tracking-tight" style="color: #ffffff !important;">
                        E. Scatter Plot (Diagram Pencar)
                    </h3>
                    
                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-[#333333] font-medium">
                        <div>
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Apa Itu Scatter Plot?</h4>
                            <p><strong>Scatter Plot (Diagram Pencar)</strong> adalah jenis visualisasi data yang digunakan untuk melihat hubungan antara dua variabel numerik.</p>
                            <p class="mt-2" style="color: #7a7a7a !important;">Pada Scatter Plot, setiap data ditampilkan sebagai sebuah titik pada bidang grafik. Posisi titik ditentukan oleh dua nilai yang dimiliki data tersebut (koordinat X dan Y). Scatter Plot membantu kita mengetahui apakah terdapat hubungan atau pola tertentu antara dua variabel.</p>
                        </div>

                        <div class="mt-6">
                            <h4 class="font-semibold text-xl mb-2" style="color: #ffffff !important;">Kapan Scatter Plot Digunakan?</h4>
                            <div class="bg-[#f5f5f7] p-4 rounded-xl border-l-4 border-[#0066cc] font-semibold" style="color: #1d1d1f !important;">
                                Scatter Plot digunakan ketika kita ingin mengetahui hubungan antara <strong>dua data numerik</strong>.
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4" style="color: #ffffff !important;">Contoh Scatter Plot</h4>
                            <p class="text-[#7a7a7a] text-sm md:text-base">Perhatikan data berikut.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-4 max-w-md mx-auto">
                                <img src="/images/scatter-tabel-belajar.png" alt="Tabel Jam Belajar dan Nilai" class="w-full rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-6 rounded-lg border border-dashed border-[#e0e0e0] text-xs font-medium\'>Letakkan gambar scatter-tabel-belajar.png di folder public/images/</div>';">
                            </div>
                            
                            <p>Data tersebut dapat ditampilkan dalam bentuk Scatter Plot.</p>

                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/scatter-visual-belajar.png" alt="Visualisasi Scatter Plot Jam Belajar" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-xs font-medium\'>Letakkan gambar scatter-visual-belajar.png di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3 font-medium">Contoh hubungan antara jam belajar dan nilai ujian.</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-3" style="color: #ffffff !important;">Cara Membaca Scatter Plot</h4>
                            <div class="bg-white p-6 rounded-2xl border border-[#e0e0e0] text-base font-medium">
                                <p class="font-semibold mb-3" style="color: #1d1d1f !important;">Berdasarkan Scatter Plot tersebut dapat diketahui bahwa:</p>
                                <ul class="list-disc pl-6 space-y-2 mb-4" style="color: #000000 !important;">
                                    <li>Semakin lama waktu belajar, nilai ujian cenderung meningkat.</li>
                                    <li>Titik-titik membentuk pola yang bergerak ke atas.</li>
                                    <li>Hal ini menunjukkan adanya hubungan antara jam belajar dan nilai ujian.</li>
                                </ul>
                                <p class="p-3 rounded-lg border border-[#e0e0e0] bg-[#f5f5f7]" style="color: #1d1d1f !important;">Scatter Plot membantu kita menemukan pola yang sulit terlihat jika hanya melihat tabel data.</p>
                                <p class="mt-4 text-[#000000] text-sm md:text-base">Hubungan antara dua variabel pada Scatter Plot sering disebut <strong>korelasi</strong>. Korelasi menunjukkan apakah perubahan pada satu variabel berkaitan dengan perubahan pada variabel lainnya.</p>
                            </div>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-6">
                            <div class="text-center mb-6">
                                <h4 class="text-xl md:text-2xl font-semibold mb-1 tracking-tight" style="color: #1d1d1f !important;">Lab Korelasi: Matriks Titik Pencar</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Pilih jenis korelasi di bawah ini untuk melihat contoh visualisasi pola persebaran titik-titik koordinatnya!</p>
                            </div>

                            <div class="flex flex-wrap justify-center gap-2 mb-8 relative z-10">
                                <button type="button" onclick="changeScatterPattern('positif')" id="btn-s-pos" class="px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#0066cc] text-white border-none cursor-pointer">Korelasi Positif</button>
                                <button type="button" onclick="changeScatterPattern('negatif')" id="btn-s-neg" class="px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#f5f5f7] text-[#1d1d1f] border border-[#e0e0e0] cursor-pointer">Korelasi Negatif</button>
                                <button type="button" onclick="changeScatterPattern('acak')" id="btn-s-aca" class="px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#f5f5f7] text-[#1d1d1f] border border-[#e0e0e0] cursor-pointer">Tidak Ada Hubungan</button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-6 items-center">
                                
                                <div class="md:col-span-2 relative h-64 pr-4">
                                    <div class="w-full h-full pl-10 pb-8 pr-1 pt-1 flex items-center justify-center relative">
                                        <div class="absolute left-0 top-[calc(50%-16px)] -translate-y-1/2 -rotate-90 origin-center text-[10px] font-semibold tracking-widest uppercase whitespace-nowrap z-0" style="color: #7a7a7a !important;">SUMBU Y</div>
                                        <div class="absolute bottom-0 left-[calc(50%+16px)] -translate-x-1/2 text-[10px] font-semibold tracking-widest uppercase z-0" style="color: #7a7a7a !important;">SUMBU X</div>

                                        <div class="w-full h-full bg-white rounded-tr-xl border-l-4 border-b-4 border-t border-r border-l-[#1d1d1f] border-b-[#1d1d1f] border-t-[#e0e0e0] border-r-[#e0e0e0] relative">
                                            <div class="absolute -top-[14px] -left-[9px] text-[#1d1d1f] text-lg leading-none select-none">▲</div>
                                            <div class="absolute -right-[14px] -bottom-[9px] text-[#1d1d1f] text-lg leading-none select-none">▶</div>
                                            <div id="scatter-canvas" class="absolute inset-0 w-full h-full overflow-hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0] text-xs md:text-sm font-medium leading-relaxed relative z-10" id="scatter-desc">
                                    <strong class="flex items-center gap-2 mb-1" style="color: #1d1d1f !important;">Korelasi Positif:</strong>
                                    <span style="color: #7a7a7a !important;">Jika variabel X naik, maka variabel Y ikut naik. Titik-titik membentuk pola bergerak miring ke kanan atas. (Contoh: Jam Belajar vs Nilai Ujian).</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h4 class="font-semibold text-xl mb-4 border-b border-[#e0e0e0] pb-2" style="color: #ffffff !important;">Scatter Plot dan Outlier</h4>
                            <p class="mb-4">Scatter Plot juga dapat membantu menemukan data yang berbeda dari sebagian besar data lainnya (Outlier). Perhatikan contoh berikut:</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center my-6">
                                <img src="/images/scatter-outlier.png" alt="Scatter Plot Outlier" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#fafafc] text-[#7a7a7a] p-10 rounded-lg border border-dashed border-[#e0e0e0] text-sm font-medium\'>Letakkan gambar scatter-outlier.png di folder public/images/</div>';">
                            </div>
                        </div>

                        <div class="bg-[#fafafc] border border-[#e0e0e0] p-6 md:p-8 rounded-2xl my-10 relative overflow-hidden">
                            <div class="text-center mb-6 border-b border-[#e0e0e0] pb-4">
                                <h4 class="text-xl md:text-2xl font-semibold mb-1" style="color: #1d1d1f !important;">Aktivitas Interaktif: Analisis & Manipulasi Titik</h4>
                                <p class="text-xs font-medium" style="color: #7a7a7a !important;">Unggah file CSV, analisis hubungannya, lalu ubah data secara langsung untuk melihat efek pergerakan titik koordinatnya!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
                                
                                <div class="lg:col-span-5 space-y-6">
                                    <div class="bg-white rounded-xl border border-[#e0e0e0] p-5 flex flex-col items-center">
                                        <h5 class="text-center font-semibold mb-3 border-b border-[#e0e0e0] pb-2 w-full text-xs" style="color: #1d1d1f !important;">Aktivitas 1: Unggah CSV</h5>
                                        <div class="w-full text-xs text-[#1d1d1f] mb-3 bg-[#f5f5f7] p-2 rounded border border-[#e0e0e0] text-center font-mono font-semibold leading-tight">
                                            Nama,Jam,Nilai<br>Andi,1,60<br>Budi,2,65<br>Citra,3,75<br>Deni,4,80<br>Eka,5,90
                                        </div>

                                        <div class="w-full bg-white rounded-xl border-2 border-dashed border-[#0066cc]/30 p-3 text-center hover:bg-[#fafafc] transition-colors cursor-pointer relative group">
                                            <input type="file" accept=".csv" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="handleScatterCSVUpload(event)">
                                            <p class="font-semibold text-[#0066cc] text-xs">Pilih / Seret File CSV</p>
                                        </div>
                                    </div>

                                    <div id="scatter-editor-panel" class="bg-white rounded-xl border border-[#e0e0e0] p-5 opacity-40 pointer-events-none transition-all duration-500">
                                        <h5 class="text-center font-semibold mb-2 border-b border-[#e0e0e0] pb-2 text-sm" style="color: #1d1d1f !important;">Aktivitas 2: Ubah Data (Live Edit)</h5>
                                        <p class="text-[10px] text-[#7a7a7a] mb-3 text-center font-medium">Ubah Nilai Eka dari 90 menjadi 50, dan amati pergerakan titik pada grafik!</p>
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-xs text-center border-collapse">
                                                <thead class="bg-[#f5f5f7] text-[#7a7a7a] font-semibold border-b border-[#e0e0e0]">
                                                    <tr><th class="p-2">Nama</th><th class="p-2">Jam</th><th class="p-2">Nilai</th></tr>
                                                </thead>
                                                <tbody id="scatter-editor-tbody" class="divide-y divide-[#e0e0e0] font-semibold text-[#1d1d1f]">
                                                    <tr><td colspan="3" class="p-4 text-[#7a7a7a] italic font-medium">Menunggu CSV...</td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-7 space-y-6">
                                    <div class="bg-white p-3 rounded-xl border border-[#e0e0e0] flex flex-col items-center justify-center min-h-[250px] relative overflow-hidden">
                                        <div id="scatter-placeholder" class="text-[#7a7a7a] font-semibold text-xs animate-pulse text-center px-4 absolute z-10 transition-opacity duration-500">
                                            Menyiapkan Bidang Kartesius...<br><span class="text-[10px] font-medium opacity-70">Sistem menunggu unggahan data CSV</span>
                                        </div>
                                        <div id="d3-scatter-container" class="w-full flex justify-center py-2"></div>
                                    </div>

                                    <div id="scatter-quiz-panel" class="bg-white p-5 rounded-2xl border border-[#e0e0e0] relative">
                                        <div id="scatter-quiz-locker" class="absolute inset-0 z-20 bg-white/95 backdrop-blur-sm rounded-2xl flex flex-col items-center justify-center transition-all duration-500">
                                            <span class="font-semibold text-[#7a7a7a] text-xs md:text-sm text-center px-4">Selesaikan Aktivitas (Unggah & Edit Data) untuk membuka pertanyaan!</span>
                                        </div>

                                        <div class="space-y-4 text-sm font-medium relative z-10 h-64 overflow-y-auto pr-2 custom-scrollbar">
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">1. Apakah terdapat hubungan antara jam belajar dan nilai ujian?</p>
                                                <select id="ans-s1" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs outline-none focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] font-semibold text-[#1d1d1f]">
                                                    <option value="">Pilih...</option><option value="ya">Ya, terdapat hubungan</option><option value="tidak">Tidak ada hubungan</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">2. Hubungan tersebut termasuk positif atau negatif?</p>
                                                <select id="ans-s2" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs outline-none focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] font-semibold text-[#1d1d1f]">
                                                    <option value="">Pilih...</option><option value="positif">Positif (Naik ke kanan)</option><option value="negatif">Negatif (Turun ke kanan)</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">3. Apa kesimpulan yang dapat diperoleh dari grafik tersebut?</p>
                                                <input type="text" id="ans-s3" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]" placeholder="Ketik kesimpulan...">
                                            </div>
                                            <div class="pt-2 border-t border-[#e0e0e0]">
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">4. Setelah data diubah, apakah pola hubungan masih terlihat jelas?</p>
                                                <select id="ans-s4" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs outline-none focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] font-semibold text-[#1d1d1f]">
                                                    <option value="">Pilih...</option><option value="tidak">Pola menjadi berantakan / ada pencilan</option><option value="ya">Pola tetap lurus sempurna</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-semibold mb-1 text-xs" style="color: #333333 !important;">5. Mengapa perubahan satu data dapat memengaruhi bentuk visualisasi?</p>
                                                <input type="text" id="ans-s5" class="w-full p-2 bg-white border border-[#e0e0e0] rounded-lg text-xs focus:border-[#0066cc] focus:ring-1 focus:ring-[#0066cc] outline-none font-semibold text-[#1d1d1f]" placeholder="Ketik alasan...">
                                            </div>
                                            
                                            <button type="button" onclick="cekJawabanScatter()" class="w-full py-2 bg-[#0066cc] hover:bg-[#0071e3] text-white font-medium rounded-lg text-xs transition-colors border-none cursor-pointer">Cek Umpan Balik</button>
                                            
                                            <div id="scatter-quiz-success" class="hidden mt-2 bg-[#fafafc] border border-emerald-200 p-4 rounded-xl text-xs leading-relaxed" style="color: #333333 !important;">
                                                <strong style="color: #1d1d1f !important;">Umpan Balik Otomatis:</strong> Ya, pada data awal terdapat hubungan positif. Namun saat satu data diubah secara ekstrem, pola garis lurus menjadi terganggu karena munculnya outlier. Ini membuktikan Scatter Plot sangat sensitif dalam mendeteksi anomali hubungan data.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 space-y-6">
                            <div class="bg-[#f5f5f7] border border-[#e0e0e0] p-4 rounded-xl font-semibold border-l-4 border-[#0066cc]" style="color: #1d1d1f !important;">
                                <h4 class="font-semibold text-lg mb-1" style="color: #1d1d1f !important;">Fakta Penting</h4>
                                <p class="text-sm font-medium text-[#7a7a7a]">Scatter Plot digunakan untuk melihat hubungan antara dua variabel numerik dan membantu menemukan pola yang mungkin tidak terlihat pada tabel data.</p>
                            </div>

                            <div class="bg-white p-6 md:p-8 rounded-2xl border border-[#e0e0e0] text-center max-w-3xl mx-auto relative overflow-hidden shadow-none">
                                <h4 class="font-semibold text-xl mb-3" style="color: #1d1d1f !important;">Mini Refleksi</h4>
                                <p class="font-medium text-sm md:text-base leading-relaxed mb-2" style="color: #333333 !important;">
                                    Perhatikan sebuah Scatter Plot yang menunjukkan hubungan antara jam belajar dan nilai ujian. Berdasarkan pola titik-titik pada Scatter Plot, jelaskan apakah kedua variabel memiliki hubungan positif, hubungan negatif, atau tidak memiliki hubungan yang jelas.
                                </p>
                                <p class="text-xs italic font-medium" style="color: #7a7a7a !important;">Diskusikan refleksimu di kelas.</p>
                            </div>
                        </div>

                        <!-- Kotak Penghubung Materi Selanjutnya Menuju Klasterisasi Data (Premium Apple Solid Blue) -->
                        <div class="mt-16 bg-[#0066cc] text-white p-8 rounded-3xl shadow-none relative overflow-hidden">
                            <h3 class="text-2xl font-semibold mb-4" style="color: #ffffff !important;">Penghubung ke Pengelompokan Data</h3>
                            <p class="text-base md:text-lg leading-relaxed font-medium" style="color: #ffffff !important;">
                                Pada Scatter Plot, setiap data ditampilkan sebagai sebuah titik. Ketika jumlah data semakin banyak, titik-titik pada Scatter Plot sering kali membentuk kelompok secara alami. Kelompok tersebut menunjukkan bahwa beberapa data memiliki karakteristik yang mirip. <strong>Proses menemukan kelompok data yang memiliki kemiripan inilah yang disebut clustering (pengelompokan data).</strong>
                            </p>
                            <p class="mt-4 text-sm font-medium opacity-80" style="color: #ffffff !important;">Ini akan menjadi pondasi kita untuk materi selanjutnya: Algoritma K-Means!</p>
                        </div>

                    </div>
                </div>

                <script src="https://d3js.org/d3.v7.min.js"></script>
                <script>
                    function changeScatterPattern(mode) {
                        const canvas = document.getElementById('scatter-canvas');
                        const desc = document.getElementById('scatter-desc');
                        canvas.innerHTML = '';
                        
                        ['pos', 'neg', 'aca'].forEach(m => {
                            document.getElementById(`btn-s-${m}`).className = "px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#f5f5f7] text-[#1d1d1f] border border-[#e0e0e0] cursor-pointer";
                        });

                        const totalDots = 25;

                        if (mode === 'positif') {
                            document.getElementById('btn-s-pos').className = "px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#0066cc] text-white border-none cursor-pointer shadow-sm";
                            desc.innerHTML = `<strong class="flex items-center gap-2 mb-1" style="color: #1d1d1f !important;">Korelasi Positif:</strong><span style="color: #7a7a7a !important; font-weight: 500;">Jika variabel X naik, maka variabel Y ikut naik. Titik-titik membentuk pola bergerak miring ke kanan atas.</span>`;
                            
                            for (let i = 0; i < totalDots; i++) {
                                let percentX = (i / totalDots) * 95 + (Math.random() * 5);
                                let percentY = 95 - ((i / totalDots) * 90) + (Math.random() * 10 - 5);
                                createDot(percentX, percentY);
                            }
                        } else if (mode === 'negatif') {
                            document.getElementById('btn-s-neg').className = "px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#0066cc] text-white border-none cursor-pointer shadow-sm";
                            desc.innerHTML = `<strong class="flex items-center gap-2 mb-1" style="color: #1d1d1f !important;">Korelasi Negatif:</strong><span style="color: #7a7a7a !important; font-weight: 500;">Jika variabel X naik, maka variabel Y justru turun. Titik-titik membentuk pola bergerak miring ke kanan bawah.</span>`;
                            
                            for (let i = 0; i < totalDots; i++) {
                                let percentX = (i / totalDots) * 95 + (Math.random() * 5);
                                let percentY = ((i / totalDots) * 90) + (Math.random() * 10 - 5);
                                createDot(percentX, percentY);
                            }
                        } else if (mode === 'acak') {
                            document.getElementById('btn-s-aca').className = "px-3 py-1.5 rounded-xl font-semibold text-xs transition-colors bg-[#0066cc] text-white border-none cursor-pointer shadow-sm";
                            desc.innerHTML = `<strong class="flex items-center gap-2 mb-1" style="color: #1d1d1f !important;">Tidak Ada Hubungan:</strong><span style="color: #7a7a7a !important; font-weight: 500;">Titik-titik menyebar berantakan secara acak. Menandakan tidak ada hubungan logis antar variabel.</span>`;
                            
                            for (let i = 0; i < totalDots; i++) {
                                createDot(Math.random() * 95, Math.random() * 95);
                            }
                        }
                    }

                    function createDot(xPercent, yPercent) {
                        const finalX = Math.max(0, Math.min(95, xPercent));
                        const finalY = Math.max(0, Math.min(95, yPercent));

                        const dot = document.createElement('div');
                        dot.className = "absolute w-3 h-3 bg-[#0066cc] rounded-full shadow-sm transition-all duration-700 hover:scale-150 cursor-pointer";
                        
                        dot.style.left = finalX + "%"; 
                        dot.style.top = finalY + "%"; 
                        
                        document.getElementById('scatter-canvas').appendChild(dot);
                    }

                    setTimeout(() => changeScatterPattern('positif'), 500);

                    let scatterDataset = [];
                    
                    function handleScatterCSVUpload(event) {
                        const file = event.target.files[0];
                        if (!file) return;

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const rows = e.target.result.trim().split('\n');
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
                                
                                document.getElementById('scatter-editor-panel').classList.remove('opacity-40', 'pointer-events-none');
                                document.getElementById('scatter-quiz-locker').style.opacity = '0';
                                setTimeout(() => document.getElementById('scatter-quiz-locker').classList.add('hidden'), 500);

                                renderScatterTableEditor();
                                drawD3ScatterPlot();
                            } else {
                                Swal.fire({
                                    title: 'Berkas Tidak Sesuai',
                                    text: 'Pastikan struktur data CSV memiliki 3 kolom: Nama, Jam, Nilai',
                                    icon: 'error',
                                    confirmButtonText: 'Periksa Kembali',
                                    confirmButtonColor: '#0066cc',
                                    background: '#ffffff',
                                    color: '#1d1d1f'
                                });
                            }
                        };
                        reader.readAsText(file);
                    }

                    function renderScatterTableEditor() {
                        const tbody = document.getElementById('scatter-editor-tbody');
                        tbody.innerHTML = '';
                        scatterDataset.forEach((data, index) => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td class="p-2 font-semibold text-[#333333]">${data.nama}</td>
                                <td class="p-2"><input type="number" value="${data.jam}" onchange="updateScatterData(${index}, 'jam', this.value)" class="w-12 border border-[#e0e0e0] p-1 text-center rounded-lg focus:border-[#0066cc] outline-none font-semibold text-[#1d1d1f] bg-white"></td>
                                <td class="p-2"><input type="number" value="${data.nilai}" onchange="updateScatterData(${index}, 'nilai', this.value)" class="w-14 border border-[#e0e0e0] p-1 text-center rounded-lg focus:border-[#0066cc] outline-none font-semibold text-[#1d1d1f] bg-white"></td>
                            `;
                            tbody.appendChild(tr);
                        });
                    }

                    function updateScatterData(index, key, newValue) {
                        scatterDataset[index][key] = parseFloat(newValue) || 0;
                        drawD3ScatterPlot();
                    }

                    function drawD3ScatterPlot() {
                        const container = d3.select("#d3-scatter-container");
                        let svg = container.select("svg");
                        let g;

                        const containerWidth = document.getElementById("d3-scatter-container").clientWidth || 300;
                        const margin = {top: 20, right: 30, bottom: 40, left: 40},
                              width = containerWidth - margin.left - margin.right,
                              height = 200 - margin.top - margin.bottom;

                        const x = d3.scaleLinear().domain([0, 10]).range([0, width]);
                        const y = d3.scaleLinear().domain([0, 110]).range([height, 0]);

                        if(svg.empty()) {
                            svg = container.append("svg")
                                .attr("width", width + margin.left + margin.right)
                                .attr("height", height + margin.top + margin.bottom);
                            
                            g = svg.append("g")
                                .attr("transform", `translate(${margin.left},${margin.top})`);
                            
                            g.append("g")
                                .attr("transform", `translate(0,${height})`)
                                .call(d3.axisBottom(x).ticks(5))
                                .selectAll("text").attr("class", "font-mono text-[10px]").style("fill", "#7a7a7a");
                                
                            g.append("g")
                                .call(d3.axisLeft(y).ticks(5))
                                .selectAll("text").attr("class", "font-mono text-[10px]").style("fill", "#7a7a7a");
                                
                            g.append("text")
                                .attr("text-anchor", "end")
                                .attr("x", width)
                                .attr("y", height + 30)
                                .text("Jam Belajar")
                                .attr("class", "text-[10px] font-semibold")
                                .style("fill", "#7a7a7a");
                                
                            g.append("text")
                                .attr("text-anchor", "end")
                                .attr("transform", "rotate(-90)")
                                .attr("y", -30)
                                .attr("x", 0)
                                .text("Nilai Ujian")
                                .attr("class", "text-[10px] font-semibold")
                                .style("fill", "#7a7a7a");

                            svg.selectAll(".domain").attr("stroke", "#e0e0e0");
                            svg.selectAll(".tick line").attr("stroke", "#e0e0e0");
                        } else {
                            g = svg.select("g");
                        }

                        const dots = g.selectAll(".dot")
                            .data(scatterDataset, d => d.id);

                        dots.transition()
                            .value(d => d)
                            .duration(1000)
                            .attr("cx", d => x(d.jam))
                            .attr("cy", d => y(d.nilai));

                        dots.enter()
                            .append("circle")
                            .attr("class", "dot")
                            .attr("cx", x(0))
                            .attr("cy", y(0))
                            .attr("r", 6)
                            .style("fill", "#0066cc")
                            .style("opacity", 0.8)
                            .attr("stroke", "white")
                            .attr("stroke-width", 1.5)
                            .on("mouseover", function() { d3.select(this).attr("r", 9).style("fill", "#ff453a"); })
                            .on("mouseout", function() { d3.select(this).attr("r", 6).style("fill", "#0066cc"); })
                            .transition()
                            .duration(1000)
                            .attr("cx", d => x(d.jam))
                            .attr("cy", d => y(d.nilai));

                        dots.exit().remove();
                    }

                    function cekJawabanScatter() {
                        const ans1 = document.getElementById('ans-s1').value;
                        const ans2 = document.getElementById('ans-s2').value;
                        const ans4 = document.getElementById('ans-s4').value;
                        
                        if(ans1 && ans2 && ans4) {
                            document.getElementById('scatter-quiz-success').classList.remove('hidden');
                        } else {
                            Swal.fire({
                                title: 'Evaluasi Belum Lengkap',
                                text: 'Mohon lengkapi seluruh pilihan ganda pada instruksi A1 & A2 terlebih dahulu!',
                                icon: 'warning',
                                confirmButtonText: 'Kembali',
                                confirmButtonColor: '#0066cc',
                                background: '#ffffff',
                                color: '#1d1d1f'
                            });
                        }
                    }
                </script>
            </div>

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