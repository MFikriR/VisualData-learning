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
            <div id="areaMateriPelajaran" class="space-y-12 text-[#0d530e] font-sans transition-all duration-1000 relative z-10 pb-20">

                <div class="mb-12 bg-[#e7e1b1] border-l-4 border-[#306d29] p-6 md:p-8 rounded-r-2xl shadow-lg relative overflow-hidden">
                    <h3 class="text-xl md:text-2xl font-black text-[#306d29] mb-5">
                        Tujuan Pembelajaran
                    </h3>
                    <ul class="space-y-4 text-[#0d530e]">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-[#fbf5dd] text-[#306d29] font-bold rounded-full flex items-center justify-center text-sm border border-[#306d29]/30">3</span>
                            <p class="leading-relaxed">Peserta didik mampu memahami tahapan <strong>pengolahan data</strong>, melakukan <strong>pembersihan data (data cleaning)</strong>, serta menerapkan analisis data sederhana menggunakan <strong>spreadsheet</strong>.</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        A. Mendefinisikan Permasalahan
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p>Sebelum mengumpulkan data, kita harus mengetahui terlebih dahulu masalah atau pertanyaan yang ingin dijawab. Tanpa tujuan yang jelas, data yang dikumpulkan bisa menjadi tidak relevan dan sulit digunakan untuk menghasilkan informasi yang bermanfaat.</p>
                        <p>Sebagai contoh, seorang guru ingin mengetahui apakah hasil belajar siswa sudah baik. Untuk menjawab pertanyaan tersebut, guru perlu mengumpulkan data nilai siswa, bukan data tinggi badan atau warna kesukaan siswa.</p>
                        <p>Oleh karena itu, langkah pertama dalam pengolahan data adalah mendefinisikan permasalahan yang ingin diselesaikan.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8 mt-6">
                            <img src="/images/mendefinisikan-permasalahan.png" alt="Siklus Mendefinisikan Permasalahan" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar mendefinisikan-permasalahan.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 17. Mendefinisikan Permasalahan</p>
                        </div>

                        <p>Gambar 17 menunjukkan bahwa proses pengolahan data diawali dengan mengidentifikasi permasalahan yang ingin diselesaikan. Permasalahan tersebut kemudian diterjemahkan menjadi pertanyaan, sehingga dapat ditentukan data yang perlu dikumpulkan dan dianalisis.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8 mt-6">
                            <img src="/images/hubungan-masalah-data.png" alt="Hubungan Permasalahan dan Data yang Dibutuhkan" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar hubungan-masalah-data.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 18. Hubungan Permasalahan dan Data yang Dibutuhkan</p>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        B. Pengumpulan Data
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p>Setelah permasalahan berhasil ditentukan, langkah berikutnya adalah mengumpulkan data yang relevan. Data dikumpulkan untuk membantu menjawab pertanyaan atau menyelesaikan permasalahan yang telah ditetapkan sebelumnya.</p>
                        <p>Tanpa data, keputusan sering kali dibuat berdasarkan dugaan atau asumsi. Sebaliknya, dengan data yang cukup dan sesuai, keputusan dapat diambil berdasarkan fakta yang lebih objektif.</p>
                        
                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border-l-4 border-[#306d29] shadow-sm my-8">
                            <h4 class="font-bold text-[#306d29] mb-3 text-xl">🌟 Manfaat Pengumpulan Data</h4>
                            <ul class="list-disc pl-6 space-y-2 text-[#0d530e]">
                                <li>Membantu menjawab permasalahan yang telah ditentukan.</li>
                                <li>Menghasilkan informasi yang lebih akurat.</li>
                                <li>Mendukung pengambilan keputusan berdasarkan fakta.</li>
                                <li>Menjadi dasar untuk proses analisis dan visualisasi data.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/20 pb-2">
                        C. Teknik Pengumpulan Data
                    </h3>
                    <p class="text-lg leading-relaxed mb-6">Setelah mengetahui berbagai sumber data seperti data terbuka, data terpercaya, dan data legal, langkah berikutnya adalah memahami bagaimana data tersebut dikumpulkan. Proses memperoleh data dapat dilakukan melalui berbagai teknik.</p>
                    
                    <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8">
                        <img src="/images/teknik-pengumpulan-data.png" alt="Teknik Pengumpulan Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar teknik-pengumpulan-data.png di folder public/images/</div>';">
                        <p class="text-sm text-[#306d29] italic mt-3">Gambar Teknik Pengumpulan Data</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-[#e7e1b1] p-6 rounded-2xl shadow-sm border border-[#306d29]/20">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>👁️</span> 1. Observasi</h4>
                            <p class="text-sm text-[#0d530e]">Mengamati objek atau peristiwa secara langsung. Cocok untuk menghitung jumlah kendaraan atau pengunjung.</p>
                        </div>
                        <div class="bg-[#e7e1b1] p-6 rounded-2xl shadow-sm border border-[#306d29]/20">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>📝</span> 2. Survei / Kuesioner</h4>
                            <p class="text-sm text-[#0d530e]">Memberikan pertanyaan kepada responden. Cepat dan menjangkau banyak orang (misal lewat Google Forms).</p>
                        </div>
                        <div class="bg-[#e7e1b1] p-6 rounded-2xl shadow-sm border border-[#306d29]/20">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>🎤</span> 3. Wawancara</h4>
                            <p class="text-sm text-[#0d530e]">Tanya jawab langsung dengan narasumber. Menghasilkan informasi yang sangat mendalam.</p>
                        </div>
                        <div class="bg-[#e7e1b1] p-6 rounded-2xl shadow-sm border border-[#306d29]/20">
                            <h4 class="font-bold text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>📁</span> 4. Dokumentasi</h4>
                            <p class="text-sm text-[#0d530e]">Menggunakan data yang sudah tersedia sebelumnya seperti absensi, laporan penjualan, atau rekam medis.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        D. Pembersihan Data (Data Cleaning)
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="font-bold text-xl text-[#306d29]">Mengapa data perlu dibersihkan?</p>
                        <p>Sebelum dianalisis atau divisualisasikan, data perlu diperiksa terlebih dahulu. Data yang tidak lengkap, berulang, atau mengandung kesalahan dapat menyebabkan hasil analisis menjadi kurang akurat.</p>
                        <p>Bayangkan seorang guru ingin menghitung rata-rata nilai siswa. Jika ada nama siswa yang tercatat dua kali atau ada nilai yang kosong, hasil perhitungan dapat menjadi tidak tepat. Proses memperbaiki dan merapikan data ini disebut pembersihan data (<i>data cleaning</i>).</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-10 mt-6">
                            <img src="/images/alur-data-cleaning.png" alt="Alur Data Cleaning" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar alur-data-cleaning.png di folder public/images/</div>';">
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-6">
                            <h4 class="text-xl font-bold text-[#306d29] mb-2 flex items-center gap-2"><span></span> 1. Data Duplikat</h4>
                            <p class="text-sm mb-2">Data yang tercatat lebih dari satu kali. Dampaknya, jumlah data menjadi tidak akurat dan rata-rata berubah.</p>
                        </div>
                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-6">
                            <h4 class="text-xl font-bold text-[#306d29] mb-2 flex items-center gap-2"><span></span> 2. Data Kosong (Missing Value)</h4>
                            <p class="text-sm mb-2">Data yang belum terisi (blank). Dampaknya perhitungan gagal atau analisis kurang lengkap.</p>
                        </div>
                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-12">
                            <h4 class="text-xl font-bold text-[#306d29] mb-2 flex items-center gap-2"><span></span> 3. Kesalahan Penulisan (Typo)</h4>
                            <p class="text-sm mb-2">Kesalahan format (Misal: <i>Jakarta</i> vs <i>JAKARTA</i> vs <i>Jakrta</i>). Komputer akan menganggap ketiganya sebagai kota yang berbeda!</p>
                        </div>
                    </div>

                    <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl mt-8 mb-12 relative overflow-hidden">
                        <div class="text-center mb-6">
                            <h4 class="text-2xl font-black text-[#0d530e] mb-2">🧹 Aktivitas Interaktif: Menjadi Data Cleaner</h4>
                            <p class="text-sm text-[#306d29] font-medium">Bantu kantin sekolah membersihkan data penjualan yang kotor ini. Tekan tombol aksi untuk memperbaikinya!</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                            <div class="bg-white rounded-xl shadow-inner border-2 border-[#306d29]/30 overflow-hidden">
                                <table class="w-full text-sm text-left">
                                    <thead class="bg-[#306d29] text-[#fbf5dd]">
                                        <tr><th class="p-3">Produk</th><th class="p-3 text-center">Jumlah (Porsi)</th></tr>
                                    </thead>
                                    <tbody id="dirty-table" class="text-[#0d530e] font-mono divide-y divide-[#e7e1b1]">
                                        <tr class="bg-white"><td class="p-3">Bakso</td><td class="p-3 text-center">30</td></tr>
                                        <tr id="row-empty" class="bg-red-50"><td class="p-3">Mie Ayam</td><td class="p-3 text-center text-red-500 font-black animate-pulse">???</td></tr>
                                        <tr id="row-dup" class="bg-yellow-50"><td class="p-3 text-yellow-700">Bakso</td><td class="p-3 text-center text-yellow-700">30</td></tr>
                                        <tr id="row-typo" class="bg-orange-50"><td class="p-3 text-orange-600 line-through">Baksoo</td><td class="p-3 text-center text-orange-600">25</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="space-y-4">
                                <button id="btn-fix-empty" onclick="cleanData('empty', this)" class="w-full p-4 bg-[#fbf5dd] border-2 border-[#306d29] text-[#306d29] font-bold rounded-xl hover:bg-[#306d29] hover:text-[#fbf5dd] transition-all flex items-center justify-between group shadow-sm">
                                    <span>Isi Data Kosong (Mie Ayam: 20)</span> <span class="text-xl group-hover:scale-125 transition-transform">✍️</span>
                                </button>
                                <button id="btn-fix-dup" onclick="cleanData('dup', this)" class="w-full p-4 bg-[#fbf5dd] border-2 border-[#306d29] text-[#306d29] font-bold rounded-xl hover:bg-[#306d29] hover:text-[#fbf5dd] transition-all flex items-center justify-between group shadow-sm">
                                    <span>Hapus Baris Duplikat</span> <span class="text-xl group-hover:scale-125 transition-transform">🗑️</span>
                                </button>
                                <button id="btn-fix-typo" onclick="cleanData('typo', this)" class="w-full p-4 bg-[#fbf5dd] border-2 border-[#306d29] text-[#306d29] font-bold rounded-xl hover:bg-[#306d29] hover:text-[#fbf5dd] transition-all flex items-center justify-between group shadow-sm">
                                    <span>Perbaiki Salah Ketik (Baksoo)</span> <span class="text-xl group-hover:scale-125 transition-transform">🔧</span>
                                </button>

                                <div id="clean-success" class="hidden mt-6 bg-[#306d29] text-[#fbf5dd] p-4 rounded-xl text-center shadow-lg border border-[#0d530e] animate-fade-in">
                                    <div class="text-3xl mb-2">✨</div>
                                    <p class="font-black">Luar Biasa! Data Berhasil Dibersihkan.</p>
                                    <p class="text-xs mt-1 opacity-90">Sekarang data sudah siap untuk digabungkan dan dianalisis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        let cleanProgress = 0;
                        function cleanData(type, btnEl) {
                            btnEl.disabled = true;
                            btnEl.classList.remove('bg-[#fbf5dd]', 'text-[#306d29]', 'hover:bg-[#306d29]', 'hover:text-[#fbf5dd]');
                            btnEl.classList.add('bg-gray-300', 'text-gray-500', 'border-gray-400', 'cursor-not-allowed', 'opacity-50');
                            btnEl.innerHTML = `<span>Selesai Diperbaiki</span> <span>✅</span>`;
                            
                            const rowDup = document.getElementById('row-dup');
                            const rowTypo = document.getElementById('row-typo');

                            if(type === 'empty') {
                                document.getElementById('row-empty').innerHTML = `<td class="p-3 bg-green-50">Mie Ayam</td><td class="p-3 text-center bg-green-50 font-bold text-[#306d29]">20</td>`;
                            } else if (type === 'dup') {
                                rowDup.style.display = 'none';
                            } else if (type === 'typo') {
                                rowTypo.innerHTML = `<td class="p-3 bg-green-50 font-bold text-[#306d29]">Bakso</td><td class="p-3 text-center bg-green-50 text-[#306d29]">25</td>`;
                            }

                            cleanProgress++;
                            if(cleanProgress === 3) {
                                document.getElementById('clean-success').classList.remove('hidden');
                                setTimeout(() => {
                                    // Menggabungkan data Bakso
                                    document.getElementById('dirty-table').innerHTML = `
                                        <tr class="bg-green-100/50"><td class="p-3 font-black text-[#306d29]">Bakso (Total)</td><td class="p-3 text-center font-black text-[#306d29]">55</td></tr>
                                        <tr class="bg-white"><td class="p-3">Mie Ayam</td><td class="p-3 text-center">20</td></tr>
                                    `;
                                }, 1500);
                            }
                        }
                    </script>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        E. Penyimpanan Data dengan Spreadsheet
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p>Spreadsheet adalah aplikasi yang digunakan untuk menyimpan, mengatur, menghitung, dan mengolah data dalam bentuk tabel. Beberapa aplikasi yang sering digunakan antara lain <strong>Microsoft Excel</strong>, <strong>Google Sheets</strong>, dan <strong>LibreOffice Calc</strong>.</p>
                        <p>Spreadsheet banyak digunakan karena memudahkan pengguna dalam mengelola data secara terstruktur.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8 mt-6">
                            <img src="/images/ui-spreadsheet.png" alt="Tampilan Antarmuka Spreadsheet" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar ui-spreadsheet.png di folder public/images/</div>';">
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm">
                            <h4 class="font-bold text-[#306d29] text-2xl mb-4">Baris dan Kolom</h4>
                            <p class="mb-4">Data pada spreadsheet disusun dalam bentuk:</p>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="bg-white p-5 rounded-xl border border-[#e7e1b1]">
                                    <h5 class="font-black text-[#0d530e] text-lg mb-2 border-b border-[#0d530e]/10 pb-2">Baris (Row)</h5>
                                    <p class="text-sm text-[#0d530e] mb-3">Baris tersusun secara horizontal dan diberi nomor.</p>
                                    <div class="font-mono text-sm bg-gray-100 p-3 rounded text-center text-gray-600">
                                        <div class="border-b border-gray-300 py-1">1</div>
                                        <div class="border-b border-gray-300 py-1">2</div>
                                        <div class="border-b border-gray-300 py-1">3</div>
                                        <div class="py-1">4</div>
                                    </div>
                                </div>
                                <div class="bg-white p-5 rounded-xl border border-[#e7e1b1]">
                                    <h5 class="font-black text-[#0d530e] text-lg mb-2 border-b border-[#0d530e]/10 pb-2">Kolom (Column)</h5>
                                    <p class="text-sm text-[#0d530e] mb-3">Kolom tersusun secara vertikal dan diberi huruf.</p>
                                    <div class="font-mono text-sm bg-gray-100 p-3 rounded flex justify-between text-gray-600">
                                        <div class="px-2 border-r border-gray-300 w-full text-center">A</div>
                                        <div class="px-2 border-r border-gray-300 w-full text-center">B</div>
                                        <div class="px-2 border-r border-gray-300 w-full text-center">C</div>
                                        <div class="px-2 w-full text-center">D</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-[#e7e1b1] p-5 rounded-xl border border-[#306d29]/30">
                                <h5 class="font-black text-[#306d29] text-lg mb-2">Sel (Cell)</h5>
                                <p class="text-sm text-[#0d530e]">Pertemuan antara baris dan kolom disebut sel. Contoh: Sel <strong>B3</strong> berarti terletak di <strong>Kolom B, Baris 3</strong>.</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-2xl mb-4">Memasukkan Data</h4>
                            <p>Data dapat dimasukkan dengan memilih sel kemudian mengetik informasi yang diperlukan. Setiap data ditempatkan pada sel yang sesuai agar mudah dibaca dan diolah.</p>
                            
                            <div class="mt-8">
                                <h4 class="font-bold text-[#306d29] text-2xl mb-4">Menyimpan Data</h4>
                                <p class="mb-4">Setelah data dimasukkan, data perlu disimpan agar tidak hilang. Beberapa format penyimpanan yang umum digunakan:</p>
                                
                                <div class="overflow-x-auto bg-white rounded-xl border border-[#e7e1b1] shadow-sm mb-6">
                                    <table class="w-full text-left border-collapse">
                                        <thead>
                                            <tr class="bg-[#306d29] text-[#fbf5dd]">
                                                <th class="p-4 border border-[#e7e1b1] font-black">Format</th>
                                                <th class="p-4 border border-[#e7e1b1] font-black">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-[#0d530e]">
                                            <tr class="bg-[#fbf5dd]">
                                                <td class="p-4 border border-[#e7e1b1] font-bold">.xlsx</td>
                                                <td class="p-4 border border-[#e7e1b1]">Microsoft Excel</td>
                                            </tr>
                                            <tr class="bg-white">
                                                <td class="p-4 border border-[#e7e1b1] font-bold">.ods</td>
                                                <td class="p-4 border border-[#e7e1b1]">LibreOffice Calc</td>
                                            </tr>
                                            <tr class="bg-[#fbf5dd]">
                                                <td class="p-4 border border-[#e7e1b1] font-bold">.csv</td>
                                                <td class="p-4 border border-[#e7e1b1]">Data teks berbasis tabel (Comma Separated Values)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p>Menyimpan data secara teratur membantu mencegah kehilangan data dan memudahkan proses analisis di kemudian hari.</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h4 class="font-bold text-[#306d29] text-2xl mb-4">Contoh Tabel Data Siswa</h4>
                            <p class="mb-4">Berikut contoh data siswa yang disimpan menggunakan spreadsheet.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-6">
                                <img src="/images/contoh-tabel-siswa.png" alt="Contoh Tabel Data Siswa" class="w-full max-w-2xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-tabel-siswa.png di folder public/images/</div>';">
                            </div>
                            
                            <p class="font-bold mb-2">Data seperti ini dapat digunakan untuk:</p>
                            <ul class="list-disc pl-6 space-y-1 text-[#0d530e]">
                                <li>Menghitung rata-rata nilai</li>
                                <li>Membuat grafik</li>
                                <li>Mencari nilai tertinggi</li>
                                <li>Mengelompokkan data siswa</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        F. Analisis Data Sederhana
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed mb-8">
                        <p>Data yang telah dikumpulkan, dibersihkan, dan disimpan belum memberikan informasi yang bermakna jika tidak dianalisis. Analisis data membantu kita menemukan informasi yang berguna untuk memahami suatu kondisi dan mendukung pengambilan keputusan.</p>
                        <p>Sebagai contoh, data nilai siswa dapat dianalisis untuk mengetahui rata-rata kelas, nilai tertinggi, dan nilai terendah.</p>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8 mt-6">
                            <img src="/images/proses-analisis-data.png" alt="Proses Analisis Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar proses-analisis-data.png di folder public/images/</div>';">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                            <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm">
                                <h4 class="font-black text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>1️⃣</span> Menghitung Jumlah (Count)</h4>
                                <p class="text-sm text-[#0d530e] mb-3">Menghitung jumlah digunakan untuk mengetahui banyaknya data atau objek dalam suatu kumpulan data.</p>
                                <div class="bg-[#e7e1b1] p-3 rounded-lg text-sm text-[#0d530e]">
                                    <strong>Manfaat:</strong><br>
                                    - Mengetahui banyaknya data yang dimiliki.<br>
                                    - Menjadi dasar perhitungan lainnya.
                                </div>
                            </div>
                            
                            <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm">
                                <h4 class="font-black text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>2️⃣</span> Menghitung Rata-rata (Average)</h4>
                                <p class="text-sm text-[#0d530e] mb-3">Rata-rata digunakan untuk mengetahui nilai umum dari suatu kumpulan data.</p>
                                <div class="bg-[#e7e1b1] p-3 rounded-lg text-sm text-[#0d530e]">
                                    <strong>Contoh:</strong><br>
                                    (80 + 90 + 85) ÷ 3 = 85<br>
                                    Rata-rata nilai siswa adalah 85.
                                </div>
                            </div>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6 mb-12">
                            <h4 class="font-black text-[#306d29] text-xl mb-2 flex items-center gap-2"><span>3️⃣</span> Menentukan Nilai Terbesar dan Terkecil</h4>
                            <p class="text-sm text-[#0d530e] mb-3">Dalam analisis data, kita sering ingin mengetahui nilai tertinggi (MAX) dan nilai terendah (MIN).</p>
                            <div class="bg-[#e7e1b1] p-3 rounded-lg text-sm text-[#0d530e]">
                                <strong>Manfaat:</strong><br>
                                - Mengetahui pencapaian tertinggi.<br>
                                - Mengetahui nilai yang perlu mendapat perhatian.
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-xl mt-8 mb-12 relative">
                        <div class="text-center mb-8">
                            <h4 class="text-2xl font-black text-[#0d530e] mb-2">📊 Aktivitas Sederhana: Mini Spreadsheet</h4>
                            <p class="text-sm text-[#306d29] font-medium">Lengkapi data yang masih kosong! Ketikkan nilai ujian pada sel yang tersedia dan lihat komputer menghitungnya secara otomatis.</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                            
                            <div class="bg-white rounded-md shadow-lg border border-gray-300 overflow-hidden font-sans">
                                <div class="bg-gray-100 border-b border-gray-300 p-2 flex items-center gap-2 text-gray-500 text-xs">
                                    <span class="px-2 py-1 bg-white border border-gray-300 rounded text-[#306d29] font-bold">fx</span>
                                    <span class="italic text-gray-400">Pilih sel di bawah untuk mengisi data...</span>
                                </div>
                                <table class="w-full text-sm text-left border-collapse">
                                    <thead class="bg-gray-100 text-gray-600 font-normal">
                                        <tr>
                                            <th class="p-2 w-10 text-center border-r border-b border-gray-300"></th>
                                            <th class="p-2 text-center border-r border-b border-gray-300 w-1/2">A</th>
                                            <th class="p-2 text-center border-b border-gray-300 w-1/2">B</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-800">
                                        <tr>
                                            <td class="p-2 text-center bg-gray-100 border-r border-b border-gray-300 text-gray-500">1</td>
                                            <td class="p-2 border-r border-b border-gray-300 font-bold bg-gray-50 text-center">Nama</td>
                                            <td class="p-2 border-b border-gray-300 font-bold bg-gray-50 text-center">Nilai</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center bg-gray-100 border-r border-b border-gray-300 text-gray-500">2</td>
                                            <td class="p-2 border-r border-b border-gray-300 text-center">Andi</td>
                                            <td class="p-1 border-b border-gray-300"><input type="number" class="nilai-input w-full p-1 border-2 border-transparent focus:border-blue-500 outline-none text-center" oninput="calcSpreadsheet()" value="80"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center bg-gray-100 border-r border-b border-gray-300 text-gray-500">3</td>
                                            <td class="p-2 border-r border-b border-gray-300 text-center">Budi</td>
                                            <td class="p-1 border-b border-gray-300"><input type="number" class="nilai-input w-full p-1 border-2 border-transparent focus:border-blue-500 outline-none text-center bg-blue-50 placeholder-blue-300" oninput="calcSpreadsheet()" placeholder="?"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center bg-gray-100 border-r border-b border-gray-300 text-gray-500">4</td>
                                            <td class="p-2 border-r border-b border-gray-300 text-center">Citra</td>
                                            <td class="p-1 border-b border-gray-300"><input type="number" class="nilai-input w-full p-1 border-2 border-transparent focus:border-blue-500 outline-none text-center" oninput="calcSpreadsheet()" value="85"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center bg-gray-100 border-r border-b border-gray-300 text-gray-500">5</td>
                                            <td class="p-2 border-r border-b border-gray-300 text-center">Deni</td>
                                            <td class="p-1 border-b border-gray-300"><input type="number" class="nilai-input w-full p-1 border-2 border-transparent focus:border-blue-500 outline-none text-center bg-blue-50 placeholder-blue-300" oninput="calcSpreadsheet()" placeholder="?"></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 text-center bg-gray-100 border-r border-b border-gray-300 text-gray-500">6</td>
                                            <td class="p-2 border-r border-b border-gray-300 text-center">Eka</td>
                                            <td class="p-1 border-b border-gray-300"><input type="number" class="nilai-input w-full p-1 border-2 border-transparent focus:border-blue-500 outline-none text-center bg-blue-50 placeholder-blue-300" oninput="calcSpreadsheet()" placeholder="?"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="space-y-4">
                                <div class="bg-[#fbf5dd] p-5 rounded-2xl border-2 border-[#306d29]/30 shadow-sm flex items-center justify-between">
                                    <div><p class="text-xs text-[#306d29] font-bold uppercase tracking-widest">Fungsi COUNT</p><h5 class="text-lg font-black text-[#0d530e]">Jumlah Siswa Terisi</h5></div>
                                    <div class="text-3xl font-black text-[#306d29]" id="res-count">2</div>
                                </div>
                                <div class="bg-[#fbf5dd] p-5 rounded-2xl border-2 border-[#306d29]/30 shadow-sm flex items-center justify-between">
                                    <div><p class="text-xs text-[#306d29] font-bold uppercase tracking-widest">Fungsi AVERAGE</p><h5 class="text-lg font-black text-[#0d530e]">Rata-Rata Nilai</h5></div>
                                    <div class="text-3xl font-black text-[#306d29]" id="res-avg">82.5</div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-[#306d29] p-5 rounded-2xl shadow-md text-[#fbf5dd] text-center">
                                        <p class="text-[10px] font-bold uppercase tracking-widest opacity-80 mb-1">Fungsi MAX</p>
                                        <h5 class="text-sm font-black mb-1">Tertinggi</h5>
                                        <div class="text-2xl font-black" id="res-max">85</div>
                                    </div>
                                    <div class="bg-red-800 p-5 rounded-2xl shadow-md text-[#fbf5dd] text-center">
                                        <p class="text-[10px] font-bold uppercase tracking-widest opacity-80 mb-1">Fungsi MIN</p>
                                        <h5 class="text-sm font-black mb-1">Terendah</h5>
                                        <div class="text-2xl font-black" id="res-min">80</div>
                                    </div>
                                </div>
                                
                                <div id="res-conclusion" class="mt-4 p-4 bg-white rounded-xl border border-[#e7e1b1] text-sm text-[#0d530e] leading-relaxed shadow-sm font-medium">
                                    <strong>Kesimpulan AI:</strong> Berdasarkan <span id="txt-count" class="font-bold">2</span> data siswa yang masuk, rata-rata kelas adalah <span id="txt-avg" class="font-bold">82.5</span>. Nilai tertinggi saat ini adalah <span id="txt-max" class="font-bold text-[#306d29]">85</span>, dan terendah <span id="txt-min" class="font-bold text-red-600">80</span>. Isi data siswa yang kosong untuk melihat kesimpulan akhirnya!
                                </div>
                            </div>

                        </div>
                    </div>

                    <script>
                        function calcSpreadsheet() {
                            const inputs = document.querySelectorAll('.nilai-input');
                            let validValues = [];
                            let sum = 0;

                            inputs.forEach(input => {
                                let val = parseFloat(input.value);
                                if(!isNaN(val)) {
                                    validValues.push(val);
                                    sum += val;
                                }
                            });

                            let count = validValues.length;
                            document.getElementById('res-count').innerText = count;
                            document.getElementById('txt-count').innerText = count;

                            if(count > 0) {
                                let avg = (sum / count).toFixed(1);
                                let max = Math.max(...validValues);
                                let min = Math.min(...validValues);

                                let cleanAvg = avg.replace('.0', '');
                                document.getElementById('res-avg').innerText = cleanAvg;
                                document.getElementById('res-max').innerText = max;
                                document.getElementById('res-min').innerText = min;

                                document.getElementById('res-conclusion').classList.remove('hidden');
                                document.getElementById('txt-avg').innerText = cleanAvg;
                                document.getElementById('txt-max').innerText = max;
                                document.getElementById('txt-min').innerText = min;

                                // Jika semua (5 siswa) sudah diisi
                                if (count === 5) {
                                    document.getElementById('res-conclusion').innerHTML = `<strong>Kesimpulan Akhir:</strong> Seluruh data telah masuk! Secara umum hasil belajar siswa cukup baik dengan rata-rata nilai <span class="font-bold text-[#306d29]">${cleanAvg}</span>. Nilai tertinggi adalah <span class="font-bold text-[#306d29]">${max}</span>, sedangkan nilai yang perlu mendapat perhatian (terendah) adalah <span class="font-bold text-red-600">${min}</span>.`;
                                    document.getElementById('res-conclusion').classList.add('bg-green-50', 'border-green-200');
                                } else {
                                    document.getElementById('res-conclusion').innerHTML = `<strong>Kesimpulan AI:</strong> Berdasarkan <span class="font-bold">${count}</span> data siswa yang masuk, rata-rata kelas adalah <span class="font-bold">${cleanAvg}</span>. Nilai tertinggi saat ini adalah <span class="font-bold text-[#306d29]">${max}</span>, dan terendah <span class="font-bold text-red-600">${min}</span>. Isi data siswa yang kosong untuk melihat kesimpulan akhirnya!`;
                                    document.getElementById('res-conclusion').classList.remove('bg-green-50', 'border-green-200');
                                }

                            } else {
                                document.getElementById('res-avg').innerText = '0';
                                document.getElementById('res-max').innerText = '-';
                                document.getElementById('res-min').innerText = '-';
                                document.getElementById('res-conclusion').classList.add('hidden');
                            }
                        }
                    </script>
                    
                    <div class="bg-[#fbf5dd] p-6 rounded-xl border-l-4 border-[#306d29]">
                        <h4 class="font-bold text-[#306d29] mb-2 text-xl">💡 Menarik Kesimpulan dari Data</h4>
                        <p class="text-lg text-[#0d530e] leading-relaxed">
                            Analisis sederhana seperti menghitung jumlah, rata-rata, nilai tertinggi, dan nilai terendah sangat membantu kita memahami sekumpulan data dengan lebih baik. Namun, bayangkan jika kamu memiliki data 1.000 siswa. Tentu akan memusingkan jika hanya melihat deretan angka, bukan?
                        </p>
                        <p class="text-lg text-[#0d530e] leading-relaxed mt-4 font-medium">
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