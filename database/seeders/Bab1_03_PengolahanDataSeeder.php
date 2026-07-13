<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;
class Bab1_03_PengolahanDataSeeder extends Seeder
{
    public function run(): void
    {
        $chapterId = Chapter::where('sequence', 1)->value('id');
        if (!$chapterId) {
            $this->command->info('Bab 1 belum dibuat! Pastikan ChapterSeeder sudah dijalankan.');
            return;
        }
        $content = <<<'EOT'
            <div id="areaMateriPelajaran" class="space-y-12 text-[#1d1d1f] font-sans transition-all duration-1000 relative z-10 pb-20">
                <div class="mb-12 bg-[#f5f5f7] border-l-4 border-[#0066cc] p-6 md:p-8 rounded-r-xl">
                    <h3 class="text-xl md:text-2xl font-semibold text-[#1d1d1f] mb-5">
                        Tujuan Pembelajaran
                    </h3>
                    <ul class="space-y-4 text-[#1d1d1f]">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                            <p class="leading-relaxed">Peserta didik mampu memahami tahapan <strong>pengolahan data</strong>, melakukan <strong>pembersihan data (data cleaning)</strong>, serta menerapkan analisis data sederhana menggunakan <strong>spreadsheet</strong>.</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        A. Mendefinisikan Permasalahan
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="text-[#333333]">Sebelum mengumpulkan data, kita harus mengetahui terlebih dahulu masalah atau pertanyaan yang ingin dijawab. Tanpa tujuan yang jelas, data yang dikumpulkan bisa menjadi tidak relevan dan sulit digunakan untuk menghasilkan informasi yang bermanfaat.</p>
                        <p class="text-[#333333]">Sebagai contoh, seorang guru ingin mengetahui apakah hasil belajar siswa sudah baik. Untuk menjawab pertanyaan tersebut, guru perlu mengumpulkan data nilai siswa, bukan data tinggi badan atau warna kesukaan siswa.</p>
                        <p class="text-[#333333]">Oleh karena itu, langkah pertama dalam pengolahan data adalah mendefinisikan permasalahan yang ingin diselesaikan.</p>
                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8 mt-6">
                            <img src="/images/mendefinisikan-permasalahan.png" alt="Siklus Mendefinisikan Permasalahan" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar mendefinisikan-permasalahan.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 17. Mendefinisikan Permasalahan</p>
                        </div>
                        <p class="text-[#333333]">Gambar 17 menunjukkan bahwa proses pengolahan data diawali dengan mengidentifikasi permasalahan yang ingin diselesaikan. Permasalahan tersebut kemudian diterjemahkan menjadi pertanyaan, sehingga dapat ditentukan data yang perlu dikumpulkan dan dianalisis.</p>
                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8 mt-6">
                            <img src="/images/hubungan-masalah-data.png" alt="Hubungan Permasalahan dan Data yang Dibutuhkan" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar hubungan-masalah-data.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 18. Hubungan Permasalahan dan Data yang Dibutuhkan</p>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        B. Pengumpulan Data
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="text-[#333333]">Setelah permasalahan berhasil ditentukan, langkah berikutnya adalah mengumpulkan data yang relevan. Data dikumpulkan untuk membantu menjawab pertanyaan atau menyelesaikan permasalahan yang telah ditetapkan sebelumnya.</p>
                        <p class="text-[#333333]">Tanpa data, keputusan sering kali dibuat berdasarkan dugaan atau asumsi. Sebaliknya, dengan data yang cukup dan sesuai, keputusan dapat diambil berdasarkan fakta yang lebih objektif.</p>
                        
                        <div class="bg-[#f5f5f7] p-6 rounded-xl border-l-4 border-[#0066cc] my-8">
                            <h4 class="font-semibold text-[#1d1d1f] mb-3 text-xl">Manfaat Pengumpulan Data</h4>
                            <ul class="list-disc pl-6 space-y-2 text-sm text-[#333333]">
                                <li>Membantu menjawab permasalahan yang telah ditentukan.</li>
                                <li>Menghasilkan informasi yang lebih akurat.</li>
                                <li>Mendukung pengambilan keputusan berdasarkan fakta.</li>
                                <li>Menjadi dasar untuk proses analisis dan visualisasi data.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        C. Teknik Pengumpulan Data
                    </h3>
                    <p class="text-lg leading-relaxed mb-6 text-[#333333]">Setelah mengetahui berbagai sumber data seperti data terbuka, data terpercaya, dan data legal, langkah berikutnya adalah memahami bagaimana data tersebut dikumpulkan. Proses memperoleh data dapat dilakukan melalui berbagai teknik.</p>
                    
                    <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8">
                        <img src="/images/teknik-pengumpulan-data.png" alt="Teknik Pengumpulan Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar teknik-pengumpulan-data.png di folder public/images/</div>';">
                        <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar Teknik Pengumpulan Data</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-2">1. Observasi</h4>
                            <p class="text-sm text-[#7a7a7a] leading-relaxed">Mengamati objek atau peristiwa secara langsung. Cocok untuk menghitung jumlah kendaraan atau pengunjung.</p>
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-2">2. Survei / Kuesioner</h4>
                            <p class="text-sm text-[#7a7a7a] leading-relaxed">Memberikan pertanyaan kepada responden. Cepat dan menjangkau banyak orang (misal lewat Google Forms).</p>
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-2">3. Wawancara</h4>
                            <p class="text-sm text-[#7a7a7a] leading-relaxed">Tanya jawab langsung dengan narasumber. Menghasilkan informasi yang sangat mendalam.</p>
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-2">4. Dokumentasi</h4>
                            <p class="text-sm text-[#7a7a7a] leading-relaxed">Menggunakan data yang sudah tersedia sebelumnya seperti absensi, laporan penjualan, atau rekam medis.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        D. Pembersihan Data (Data Cleaning)
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="font-semibold text-xl text-[#0066cc]">Mengapa data perlu dibersihkan?</p>
                        <p class="text-[#333333]">Sebelum dianalisis atau divisualisasikan, data perlu diperiksa terlebih dahulu. Data yang tidak lengkap, berulang, atau mengandung kesalahan dapat menyebabkan hasil analisis menjadi kurang akurat.</p>
                        <p class="text-[#333333]">Bayangkan seorang guru ingin menghitung rata-rata nilai siswa. Jika ada nama siswa yang tercatat dua kali atau ada nilai yang kosong, hasil perhitungan dapat menjadi tidak tepat. Proses memperbaiki dan merapikan data ini disebut pembersihan data (data cleaning).</p>
                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-10 mt-6">
                            <img src="/images/alur-data-cleaning.png" alt="Alur Data Cleaning" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar alur-data-cleaning.png di folder public/images/</div>';">
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="text-lg font-semibold text-[#1d1d1f] mb-2">1. Data Duplikat</h4>
                            <p class="text-sm text-[#7a7a7a]">Data yang tercatat lebih dari satu kali. Dampaknya, jumlah data menjadi tidak akurat dan perhitungan nilai rata-rata kelas berubah.</p>
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="text-lg font-semibold text-[#1d1d1f] mb-2">2. Data Kosong (Missing Value)</h4>
                            <p class="text-sm text-[#7a7a7a]">Data yang belum terisi (blank). Dampaknya fungsi perhitungan otomatis gagal atau analisis menjadi kurang lengkap.</p>
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mb-12">
                            <h4 class="text-lg font-semibold text-[#1d1d1f] mb-2">3. Kesalahan Penulisan (Typo)</h4>
                            <p class="text-sm text-[#7a7a7a]">Kesalahan ketik atau ketidakseragaman format (Misal: Jakarta vs JAKARTA vs Jakrta). Komputer akan mengidentifikasi ketiganya sebagai kota yang berbeda.</p>
                        </div>
                    </div>
                    <div style="background:#fafafc; border:1px solid #e0e0e0;" class="p-6 md:p-8 rounded-2xl mt-8 mb-12 relative overflow-hidden">
                        <div class="text-center mb-6">
                            <h4 style="color:#1d1d1f !important;" class="text-2xl font-semibold mb-2">Aktivitas Interaktif: Menjadi Data Cleaner</h4>
                            <p style="color:#7a7a7a !important;" class="text-sm font-medium">Bantu kantin sekolah membersihkan data penjualan yang kotor ini. Tekan tombol aksi untuk memperbaikinya!</p>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                            <div style="background:#ffffff; border:1px solid #e0e0e0;" class="rounded-xl overflow-hidden">
                                <table class="w-full text-sm text-left">
                                    <thead style="background:#f5f5f7; color:#1d1d1f !important; border-bottom:1px solid #e0e0e0;">
                                        <tr><th class="p-3 font-semibold">Produk</th><th class="p-3 text-center font-semibold">Jumlah (Porsi)</th></tr>
                                    </thead>
                                    <tbody id="dirty-table" class="font-mono">
                                        <tr style="background:#ffffff; border-bottom:1px solid #e0e0e0;">
                                            <td class="p-3 font-medium" style="color:#1d1d1f !important;">Bakso</td>
                                            <td class="p-3 text-center" style="color:#1d1d1f !important;">30</td>
                                        </tr>
                                        <tr id="row-empty" style="background:#ffffff; border-bottom:1px solid #e0e0e0;">
                                            <td class="p-3" style="color:#1d1d1f !important;">Mie Ayam</td>
                                            <td class="p-3 text-center font-semibold animate-pulse" style="color:#ff453a !important;">???</td>
                                        </tr>
                                        <tr id="row-dup" style="background:#ffffff; border-bottom:1px solid #e0e0e0;">
                                            <td class="p-3" style="color:#7a7a7a !important;">Bakso</td>
                                            <td class="p-3 text-center" style="color:#7a7a7a !important;">30</td>
                                        </tr>
                                        <tr id="row-typo" style="background:#ffffff;">
                                            <td class="p-3 line-through" style="color:#7a7a7a !important;">Baksoo</td>
                                            <td class="p-3 text-center" style="color:#7a7a7a !important;">25</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="space-y-4">
                                <button id="btn-fix-empty" onclick="cleanData('empty', this)" style="background:#ffffff !important; border:1px solid #e0e0e0 !important;" class="w-full p-4 font-medium rounded-full transition-colors flex items-center justify-between cursor-pointer">
                                    <span style="color:#1d1d1f !important;">Isi Data Kosong (Mie Ayam: 20)</span>
                                    <span style="color:#0066cc !important;" class="text-sm">Tulis</span>
                                </button>
                                <button id="btn-fix-dup" onclick="cleanData('dup', this)" style="background:#ffffff !important; border:1px solid #e0e0e0 !important;" class="w-full p-4 font-medium rounded-full transition-colors flex items-center justify-between cursor-pointer">
                                    <span style="color:#1d1d1f !important;">Hapus Baris Duplikat</span>
                                    <span style="color:#ff453a !important;" class="text-sm">Hapus</span>
                                </button>
                                <button id="btn-fix-typo" onclick="cleanData('typo', this)" style="background:#ffffff !important; border:1px solid #e0e0e0 !important;" class="w-full p-4 font-medium rounded-full transition-colors flex items-center justify-between cursor-pointer">
                                    <span style="color:#1d1d1f !important;">Perbaiki Salah Ketik (Baksoo)</span>
                                    <span style="color:#0066cc !important;" class="text-sm">Perbaiki</span>
                                </button>
                                <div id="clean-success" style="background:rgba(0,102,204,0.05); border:1px solid rgba(0,102,204,0.2);" class="hidden mt-6 p-5 rounded-xl text-center animate-fade-in">
                                    <p style="color:#1d1d1f !important;" class="font-semibold">Data Berhasil Dibersihkan</p>
                                    <p style="color:#7a7a7a !important;" class="text-xs mt-1">Sekarang data sudah valid, rapi, dan siap untuk dianalisis lebih lanjut.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        let cleanProgress = 0;
                        function cleanData(type, btnEl) {
                            btnEl.disabled = true;
                            btnEl.className = "w-full p-4 font-medium rounded-full flex items-center justify-between cursor-not-allowed";
                            btnEl.setAttribute('style', 'background:#f5f5f7 !important; border:1px solid #e0e0e0 !important; opacity:1 !important;');
                            btnEl.innerHTML = `
                                <span style="color:#7a7a7a !important;">Selesai Diperbaiki</span>
                                <span style="color:#7a7a7a !important; font-size:12px;">Sukses</span>
                            `;
                            const rowDup = document.getElementById('row-dup');
                            const rowTypo = document.getElementById('row-typo');
                            if (type === 'empty') {
                                document.getElementById('row-empty').innerHTML = `
                                    <td class="p-3" style="background:rgba(0,102,204,0.05); color:#0066cc !important;">Mie Ayam</td>
                                    <td class="p-3 text-center font-semibold" style="background:rgba(0,102,204,0.05); color:#0066cc !important;">20</td>
                                `;
                            } else if (type === 'dup') {
                                rowDup.style.display = 'none';
                            } else if (type === 'typo') {
                                rowTypo.innerHTML = `
                                    <td class="p-3 font-semibold" style="background:rgba(0,102,204,0.05); color:#0066cc !important;">Bakso</td>
                                    <td class="p-3 text-center" style="background:rgba(0,102,204,0.05); color:#0066cc !important;">25</td>
                                `;
                            }
                            cleanProgress++;
                            if (cleanProgress === 3) {
                                document.getElementById('clean-success').classList.remove('hidden');
                                setTimeout(() => {
                                    document.getElementById('dirty-table').innerHTML = `
                                        <tr style="background:rgba(0,102,204,0.05);">
                                            <td class="p-3 font-semibold" style="color:#0066cc !important;">Bakso (Total)</td>
                                            <td class="p-3 text-center font-semibold" style="color:#0066cc !important;">55</td>
                                        </tr>
                                        <tr style="background:#ffffff;">
                                            <td class="p-3" style="color:#1d1d1f !important;">Mie Ayam</td>
                                            <td class="p-3 text-center" style="color:#1d1d1f !important;">20</td>
                                        </tr>
                                    `;
                                }, 1500);
                            }
                        }
                    </script>
                </div>
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        E. Penyimpanan Data dengan Spreadsheet
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="text-[#333333]">Spreadsheet adalah aplikasi yang digunakan untuk menyimpan, mengatur, menghitung, dan mengolah data dalam bentuk tabel. Beberapa aplikasi yang sering digunakan antara lain <strong>Microsoft Excel</strong>, <strong>Google Sheets</strong>, dan <strong>LibreOffice Calc</strong>.</p>
                        <p class="text-[#333333]">Spreadsheet banyak digunakan karena memudahkan pengguna dalam mengelola data secara terstruktur.</p>
                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8 mt-6">
                            <img src="/images/ui-spreadsheet.png" alt="Tampilan Antarmuka Spreadsheet" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar ui-spreadsheet.png di folder public/images/</div>';">
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-2xl mb-4">Baris dan Kolom</h4>
                            <p class="mb-4 text-sm text-[#7a7a7a]">Data pada spreadsheet disusun dalam format terstruktur:</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] text-lg mb-2 border-b border-[#e0e0e0] pb-2">Baris (Row)</h5>
                                    <p class="text-sm text-[#7a7a7a] mb-3">Baris tersusun secara horizontal dan diidentifikasi dengan penomoran angka.</p>
                                    <div class="font-mono text-sm bg-[#f5f5f7] p-3 rounded text-center text-[#1d1d1f] border border-[#e0e0e0]">
                                        <div class="border-b border-[#e0e0e0] py-1">1</div>
                                        <div class="border-b border-[#e0e0e0] py-1">2</div>
                                        <div class="border-b border-[#e0e0e0] py-1">3</div>
                                        <div class="py-1">4</div>
                                    </div>
                                </div>
                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] text-lg mb-2 border-b border-[#e0e0e0] pb-2">Kolom (Column)</h5>
                                    <p class="text-sm text-[#7a7a7a] mb-3">Kolom tersusun secara vertikal dan diidentifikasi dengan susunan huruf alfabet.</p>
                                    <div class="font-mono text-sm bg-[#f5f5f7] p-3 rounded flex justify-between text-[#1d1d1f] border border-[#e0e0e0]">
                                        <div class="px-2 border-r border-[#e0e0e0] w-full text-center">A</div>
                                        <div class="px-2 border-r border-[#e0e0e0] w-full text-center">B</div>
                                        <div class="px-2 border-r border-[#e0e0e0] w-full text-center">C</div>
                                        <div class="px-2 w-full text-center">D</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-xl border border-[#e0e0e0]">
                                <h5 class="font-semibold text-[#1d1d1f] text-lg mb-2">Sel (Cell)</h5>
                                <p class="text-sm text-[#333333]">Pertemuan antara koordinat baris dan kolom disebut sel. Contoh: Sel <strong>B3</strong> berarti bidang tersebut terletak di <strong>Kolom B, Baris 3</strong>.</p>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="font-semibold text-[#1d1d1f] text-2xl mb-4">Memasukkan Data</h4>
                            <p class="text-[#333333]">Data dapat dimasukkan dengan memilih koordinat sel kemudian mengetik informasi yang diperlukan. Setiap data ditempatkan pada posisi sel yang sesuai agar mudah dibaca dan diolah komputer.</p>
                            
                            <div class="mt-8">
                                <h4 class="font-semibold text-[#1d1d1f] text-2xl mb-4">Menyimpan Data</h4>
                                <p class="mb-4 text-sm text-[#7a7a7a]">Setelah data selesai dimasukkan, berkas perlu disimpan. Beberapa format penyimpanan tabel yang umum digunakan:</p>
                                
                                <div class="overflow-x-auto bg-white rounded-xl border border-[#e0e0e0] mb-6">
                                    <table class="w-full text-left border-collapse text-sm">
                                        <thead>
                                            <tr class="bg-[#f5f5f7] text-[#1d1d1f] border-b border-[#e0e0e0]">
                                                <th class="p-4 font-semibold border-r border-[#e0e0e0]">Format</th>
                                                <th class="p-4 font-semibold">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-[#333333] divide-y divide-[#e0e0e0]">
                                            <tr class="bg-[#fafafc]">
                                                <td class="p-4 font-semibold border-r border-[#e0e0e0]">.xlsx</td>
                                                <td class="p-4">Format standar dokumen Microsoft Excel</td>
                                            </tr>
                                            <tr class="bg-white">
                                                <td class="p-4 font-semibold border-r border-[#e0e0e0]">.ods</td>
                                                <td class="p-4">Format OpenDocument Spreadsheet untuk LibreOffice Calc</td>
                                            </tr>
                                            <tr class="bg-[#fafafc]">
                                                <td class="p-4 font-semibold border-r border-[#e0e0e0]">.csv</td>
                                                <td class="p-4">Data teks berbasis tabel nilai yang dipisahkan tanda koma (Comma Separated Values)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="text-[#333333]">Menyimpan data secara teratur membantu mencegah resiko kehilangan berkas penting and memudahkan proses manajemen berkas di kemudian hari.</p>
                            </div>
                        </div>
                        <div class="mt-8">
                            <h4 class="font-semibold text-[#1d1d1f] text-2xl mb-4">Contoh Tabel Data Siswa</h4>
                            <p class="mb-4 text-sm text-[#7a7a7a]">Berikut contoh visual data catatan administrasi siswa yang disimpan menggunakan spreadsheet.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-6">
                                <img src="/images/contoh-tabel-siswa.png" alt="Contoh Tabel Data Siswa" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar contoh-tabel-siswa.png di folder public/images/</div>';">
                            </div>
                            
                            <p class="font-semibold mb-2 text-[#1d1d1f]">Data terstruktur seperti ini dapat digunakan untuk:</p>
                            <ul class="list-disc pl-6 space-y-1 text-sm text-[#333333]">
                                <li>Menghitung rata-rata akumulasi nilai kelas</li>
                                <li>Membuat diagram grafik informatif</li>
                                <li>Mencari nilai tertinggi and terendah siswa</li>
                                <li>Mengelompokkan kriteria entitas siswa</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        F. Analisis Data Sederhana
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed mb-8">
                        <p class="text-[#333333]">Data yang telah dikumpulkan, dibersihkan, dan disimpan belum memberikan informasi yang bermakna jika tidak dianalisis. Analisis data membantu kita menemukan informasi yang berguna untuk memahami suatu kondisi dan mendukung pengambilan keputusan.</p>
                        <p class="text-[#333333]">Sebagai contoh, data nilai siswa dapat dianalisis untuk mengetahui rata-rata kelas, nilai tertinggi, dan nilai terendah.</p>
                        
                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8 mt-6">
                            <img src="/images/proses-analisis-data.png" alt="Proses Analisis Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar proses-analisis-data.png di folder public/images/</div>';">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h4 class="font-semibold text-[#1d1d1f] text-xl mb-2">Menghitung Jumlah (Count)</h4>
                                <p class="text-sm text-[#7a7a7a] mb-3">Menghitung jumlah digunakan untuk mengetahui banyaknya record data atau baris objek dalam suatu kumpulan data.</p>
                                <div class="bg-white p-3 rounded-lg text-xs text-[#7a7a7a] border border-[#e0e0e0]">
                                    <strong>Manfaat Utama:</strong><br>
                                    - Mengetahui kuantitas total data yang dimiliki.<br>
                                    - Menjadi landasan dasar operasional rumus matematika lainnya.
                                </div>
                            </div>
                            
                            <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                <h4 class="font-semibold text-[#1d1d1f] text-xl mb-2">Menghitung Rata-rata (Average)</h4>
                                <p class="text-sm text-[#7a7a7a] mb-3">Rata-rata digunakan untuk mengetahui tolak ukur nilai umum (mean) dari suatu kumpulan objek angka.</p>
                                <div class="bg-white p-3 rounded-lg text-xs text-[#7a7a7a] border border-[#e0e0e0]">
                                    <strong>Contoh Logika Perhitungan:</strong><br>
                                    (80 + 90 + 85) ÷ 3 = 85<br>
                                    Maka rata-rata performa nilai siswa di atas adalah 85.
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6 mb-12">
                            <h4 class="font-semibold text-[#1d1d1f] text-xl mb-2">Menentukan Nilai Terbesar dan Terkecil</h4>
                            <p class="text-sm text-[#7a7a7a] mb-3">Dalam analisis statistika data, kita sering perlu melacak batas ambang nilai tertinggi (MAX) dan nilai terendah (MIN).</p>
                            <div class="bg-white p-3 rounded-lg text-xs text-[#7a7a7a] border border-[#e0e0e0]">
                                <strong>Manfaat Utama:</strong><br>
                                - Memetakan pencapaian prestasi tertinggi kelompok data.<br>
                                - Menemukan metrik nilai terkecil yang memerlukan evaluasi khusus.
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#fafafc] p-6 md:p-8 rounded-2xl border border-[#e0e0e0] mt-8 mb-12 relative">
                        <div class="text-center mb-8">
                            <h4 class="text-2xl font-semibold text-[#1d1d1f] mb-2">Aktivitas Sederhana: Mini Spreadsheet</h4>
                            <p class="text-sm text-[#7a7a7a] font-medium">Lengkapi data yang masih kosong! Ketikkan angka nilai ujian pada kolom sel yang tersedia untuk kalkulasi otomatis.</p>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                            <div class="bg-white rounded-xl border border-[#e0e0e0] overflow-hidden font-sans">
                                <div class="bg-[#f5f5f7] border-b border-[#e0e0e0] p-3 flex items-center gap-2 text-[#7a7a7a] text-xs">
                                    <span class="px-2 py-0.5 bg-white border border-[#e0e0e0] rounded text-[#0066cc] font-semibold">fx</span>
                                    <span class="italic">Pilih kolom sel input di bawah untuk memperbarui data...</span>
                                </div>
                                <table class="w-full text-sm text-left border-collapse">
                                    <thead class="bg-[#fafafc] text-[#7a7a7a] font-medium border-b border-[#e0e0e0]">
                                        <tr>
                                            <th class="p-2 w-12 text-center border-r border-[#e0e0e0]"></th>
                                            <th class="p-2 text-center border-r border-[#e0e0e0] w-1/2">A</th>
                                            <th class="p-2 text-center w-1/2">B</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-[#1d1d1f] divide-y divide-[#e0e0e0]">
                                        <tr class="bg-[#fafafc]">
                                            <td class="p-2 text-center border-r border-[#e0e0e0] text-[#7a7a7a]">1</td>
                                            <td class="p-2 border-r border-[#e0e0e0] font-medium text-center">Nama</td>
                                            <td class="p-2 font-medium text-center">Nilai</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center border-r border-[#e0e0e0] text-[#7a7a7a]">2</td>
                                            <td class="p-2 border-r border-[#e0e0e0] text-center">Andi</td>
                                            <td class="p-1"><input type="number" class="nilai-input w-full p-2 rounded-lg text-center outline-none transition-all duration-200" style="background-color:#ffffff !important; color:#1d1d1f !important; border:1px solid #e0e0e0 !important;" value="80"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center border-r border-[#e0e0e0] text-[#7a7a7a]">3</td>
                                            <td class="p-2 border-r border-[#e0e0e0] text-center">Budi</td>
                                            <td class="p-1"><input type="number" class="nilai-input w-full p-2 rounded-lg text-center outline-none transition-all duration-200" style="background-color:#fff8f0 !important; color:#1d1d1f !important; border:1px dashed #f0a860 !important;" placeholder="Ketik..."></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center border-r border-[#e0e0e0] text-[#7a7a7a]">4</td>
                                            <td class="p-2 border-r border-[#e0e0e0] text-center">Citra</td>
                                            <td class="p-1"><input type="number" class="nilai-input w-full p-2 rounded-lg text-center outline-none transition-all duration-200" style="background-color:#ffffff !important; color:#1d1d1f !important; border:1px solid #e0e0e0 !important;" value="85"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center border-r border-[#e0e0e0] text-[#7a7a7a]">5</td>
                                            <td class="p-2 border-r border-[#e0e0e0] text-center">Deni</td>
                                            <td class="p-1"><input type="number" class="nilai-input w-full p-2 rounded-lg text-center outline-none transition-all duration-200" style="background-color:#fff8f0 !important; color:#1d1d1f !important; border:1px dashed #f0a860 !important;" placeholder="Ketik..."></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center border-r border-[#e0e0e0] text-[#7a7a7a]">6</td>
                                            <td class="p-2 border-r border-[#e0e0e0] text-center">Eka</td>
                                            <td class="p-1"><input type="number" class="nilai-input w-full p-2 rounded-lg text-center outline-none transition-all duration-200" style="background-color:#fff8f0 !important; color:#1d1d1f !important; border:1px dashed #f0a860 !important;" placeholder="Ketik..."></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="p-3 bg-[#f5f5f7] border-t border-[#e0e0e0] flex items-center gap-2 text-[10px] text-[#7a7a7a]">
                                    <span class="w-3 h-3 rounded border border-dashed" style="border-color:#f0a860; background:#fff8f0;"></span>
                                    <span>Sel dengan garis putus-putus oranye = data belum lengkap</span>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0] flex items-center justify-between">
                                    <div>
                                        <p class="text-[10px] text-[#7a7a7a] font-semibold uppercase tracking-widest">Fungsi COUNT</p>
                                        <h5 class="text-base font-semibold text-[#1d1d1f]">Jumlah Siswa Terisi</h5>
                                    </div>
                                    <div class="text-2xl font-semibold text-[#1d1d1f] transition-all duration-300" id="res-count" style="color:#1d1d1f !important;">2</div>
                                </div>
                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0] flex items-center justify-between">
                                    <div>
                                        <p class="text-[10px] text-[#7a7a7a] font-semibold uppercase tracking-widest">Fungsi AVERAGE</p>
                                        <h5 class="text-base font-semibold text-[#1d1d1f]">Rata-Rata Nilai</h5>
                                    </div>
                                    <div class="text-2xl font-semibold transition-all duration-300" id="res-avg" style="color:#0066cc !important;">82.5</div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="p-4 rounded-xl text-center transition-all duration-300" style="background:rgba(0,102,204,0.05); border:1px solid rgba(0,102,204,0.15);">
                                        <p class="text-[10px] font-semibold uppercase tracking-widest mb-1" style="color:#7a7a7a !important;">Fungsi MAX</p>
                                        <h5 class="text-xs font-semibold mb-1" style="color:#1d1d1f !important;">Tertinggi</h5>
                                        <div class="text-xl font-semibold" id="res-max" style="color:#0066cc !important;">85</div>
                                    </div>
                                    <div class="p-4 rounded-xl text-center transition-all duration-300" style="background:rgba(255,69,58,0.05); border:1px solid rgba(255,69,58,0.15);">
                                        <p class="text-[10px] font-semibold uppercase tracking-widest mb-1" style="color:#7a7a7a !important;">Fungsi MIN</p>
                                        <h5 class="text-xs font-semibold mb-1" style="color:#1d1d1f !important;">Terendah</h5>
                                        <div class="text-xl font-semibold" id="res-min" style="color:#ff453a !important;">80</div>
                                    </div>
                                </div>
                                <div id="res-conclusion" class="mt-4 p-4 bg-white rounded-xl border border-[#e0e0e0] text-sm leading-relaxed font-medium transition-all duration-300" style="color:#1d1d1f !important;">
                                    <strong>Kesimpulan Analisis:</strong> Berdasarkan <span id="txt-count" class="font-semibold" style="color:#0066cc !important;">2</span> data siswa yang masuk, rata-rata kelas adalah <span id="txt-avg" class="font-semibold" style="color:#0066cc !important;">82.5</span>. Nilai tertinggi saat ini adalah <span id="txt-max" class="font-semibold" style="color:#0066cc !important;">85</span>, dan terendah <span id="txt-min" class="font-semibold" style="color:#ff453a !important;">80</span>. Isi data siswa yang kosong untuk melihat kesimpulan akhirnya.
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                    (function() {
                        const inputs = document.querySelectorAll('.nilai-input');

                        function flashUpdate(el) {
                            if (!el) return;
                            el.style.transform = 'scale(1.08)';
                            setTimeout(() => { el.style.transform = 'scale(1)'; }, 150);
                        }

                        // Helper aman: cek elemen ada sebelum diubah, kalau tidak ada beri peringatan di console
                        // tapi TIDAK menghentikan seluruh fungsi (beda dengan versi lama yang crash total)
                        function safeSetText(id, value) {
                            const el = document.getElementById(id);
                            if (!el) {
                                console.warn('[Mini Spreadsheet] Elemen dengan id="' + id + '" tidak ditemukan di halaman.');
                                return null;
                            }
                            el.innerText = value;
                            return el;
                        }

                        function safeSetHTML(id, html) {
                            const el = document.getElementById(id);
                            if (!el) {
                                console.warn('[Mini Spreadsheet] Elemen dengan id="' + id + '" tidak ditemukan di halaman.');
                                return null;
                            }
                            el.innerHTML = html;
                            return el;
                        }

                        function calcSpreadsheet() {
                            let validValues = [];
                            let sum = 0;

                            inputs.forEach(input => {
                                let val = parseFloat(input.value);
                                if (!isNaN(val)) {
                                    validValues.push(val);
                                    sum += val;
                                    input.style.setProperty('background-color', '#ffffff', 'important');
                                    input.style.setProperty('border', '1px solid #e0e0e0', 'important');
                                } else {
                                    input.style.setProperty('background-color', '#fff8f0', 'important');
                                    input.style.setProperty('border', '1px dashed #f0a860', 'important');
                                }
                            });

                            const count = validValues.length;

                            // Setiap update sekarang independen satu sama lain.
                            // Kalau satu id hilang, yang lain tetap lanjut jalan (tidak saling menjatuhkan).
                            const elCount = safeSetText('res-count', count);
                            safeSetText('txt-count', count);
                            flashUpdate(elCount);

                            if (count > 0) {
                                const avg = (sum / count).toFixed(1);
                                const max = Math.max(...validValues);
                                const min = Math.min(...validValues);
                                const cleanAvg = avg.replace('.0', '');

                                const elAvg = safeSetText('res-avg', cleanAvg);
                                const elMax = safeSetText('res-max', max);
                                const elMin = safeSetText('res-min', min);
                                flashUpdate(elAvg);
                                flashUpdate(elMax);
                                flashUpdate(elMin);

                                safeSetText('txt-avg', cleanAvg);
                                safeSetText('txt-max', max);
                                safeSetText('txt-min', min);

                                if (count === inputs.length) {
                                    safeSetHTML('res-conclusion', `<strong>Kesimpulan Akhir:</strong> Seluruh data telah masuk! Secara umum hasil belajar siswa cukup baik dengan rata-rata nilai <span class="font-semibold" style="color:#0066cc !important;">${cleanAvg}</span>. Nilai tertinggi adalah <span class="font-semibold" style="color:#0066cc !important;">${max}</span>, sedangkan nilai yang perlu mendapat perhatian (terendah) adalah <span class="font-semibold" style="color:#ff453a !important;">${min}</span>.`);
                                } else {
                                    safeSetHTML('res-conclusion', `<strong>Kesimpulan Analisis:</strong> Berdasarkan <span class="font-semibold" style="color:#0066cc !important;">${count}</span> data siswa yang masuk, rata-rata kelas adalah <span class="font-semibold" style="color:#0066cc !important;">${cleanAvg}</span>. Nilai tertinggi saat ini adalah <span class="font-semibold" style="color:#0066cc !important;">${max}</span>, dan terendah <span class="font-semibold" style="color:#ff453a !important;">${min}</span>. Isi data siswa yang kosong untuk melihat kesimpulan akhirnya.`);
                                }
                            } else {
                                safeSetText('res-avg', '0');
                                safeSetText('res-max', '-');
                                safeSetText('res-min', '-');
                                safeSetHTML('res-conclusion', `<strong>Kesimpulan Analisis:</strong> Belum ada data siswa yang masuk. Silakan isi nilai pada tabel di sebelah kiri untuk melihat hasil kalkulasi.`);
                            }
                        }

                        // Pasang listener lewat JS (bukan atribut inline oninput),
                        // supaya tetap berfungsi meski atribut event inline pada <input> difilter/di-strip oleh sanitizer HTML
                        inputs.forEach(input => {
                            input.addEventListener('input', calcSpreadsheet);
                        });

                        // Hitung sekali di awal supaya tampilan sinkron dengan nilai default
                        calcSpreadsheet();
                    })();
                    </script>
                    
                    <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                        <h4 class="font-semibold text-[#1d1d1f] mb-2 text-xl">Menarik Kesimpulan dari Data</h4>
                        <p class="text-base text-[#333333] leading-relaxed">
                            Analisis sederhana seperti menghitung jumlah, rata-rata, nilai tertinggi, dan nilai terendah sangat membantu kita memahami sekumpulan data dengan lebih baik. Namun, bayangkan jika kamu memiliki data 1.000 siswa. Tentu akan memusingkan jika hanya melihat deretan angka di spreadsheet, bukan?
                        </p>
                        <p class="text-base text-[#333333] leading-relaxed mt-4 font-medium">
                            Itulah mengapa informasi akan jauh lebih mudah dipahami secara instan jika disajikan dalam bentuk <strong>visual grafik</strong>. Pada bab berikutnya, bersiaplah untuk mempelajari teknik Visualisasi Data!
                        </p>
                    </div>
                </div>
            </div>
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Langkah pertama yang paling krusial sebelum mulai mengumpulkan data menurut siklus pengolahan data adalah...."
                    data-opt-a="Mendefinisikan permasalahan dan menentukan pertanyaan."
                    data-opt-b="Membuka aplikasi spreadsheet seperti Excel."
                    data-opt-c="Melakukan data cleaning."
                    data-opt-d="Membuat grafik visualisasi."
                    data-opt-e="Mencari nilai rata-rata."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Jika sebuah sekolah ingin mengetahui makanan apa yang paling banyak disukai siswa di kantin, teknik pengumpulan data manakah yang paling cepat dan tepat untuk menjangkau banyak siswa?"
                    data-opt-a="Observasi diam-diam."
                    data-opt-b="Wawancara satu per satu ke ratusan siswa."
                    data-opt-c="Survei atau kuesioner (misal via Google Forms)."
                    data-opt-d="Membaca buku perpustakaan."
                    data-opt-e="Menebak secara acak."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Terdapat data nama kota di database: 'Jakarta', 'JAKARTA', dan 'jakarta'. Komputer akan menganggap ketiganya sebagai entitas yang berbeda. Proses merapikan dan menyeragamkan data ini disebut dengan istilah...."
                    data-opt-a="Data Entry"
                    data-opt-b="Data Cleaning (Pembersihan Data)"
                    data-opt-c="Data Science"
                    data-opt-d="Data Mining"
                    data-opt-e="Data Storage"
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pada aplikasi spreadsheet seperti Excel atau Google Sheets, pertemuan vertikal dan horizontal yang bernama 'B3' disebut sebagai...."
                    data-opt-a="Baris (Row)"
                    data-opt-b="Kolom (Column)"
                    data-opt-c="Sel (Cell)"
                    data-opt-d="Sheet (Lembar Kerja)"
                    data-opt-e="Formula"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Guru ingin mengetahui siapakah siswa yang mendapat nilai paling kecil dalam ulangan matematika. Fungsi atau rumus (formula) analisis sederhana apa yang harus digunakan?"
                    data-opt-a="AVERAGE (Rata-rata)"
                    data-opt-b="COUNT (Jumlah Data)"
                    data-opt-c="MAX (Nilai Tertinggi)"
                    data-opt-d="MIN (Nilai Terendah)"
                    data-opt-e="SUM (Total Penjumlahan)"
                    data-answer="D">
                </div>
            </div>
EOT;
        Material::updateOrCreate(
            ['slug' => 'pengolahan-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Pengolahan & Pembersihan Data',
                'type' => 'text',
                'sequence' => 3,
                'min_level' => 0, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1 Sub 3: Pengolahan Data (FULL PDF + Spreadsheet Lab) berhasil disinkronisasi!');
    }
}