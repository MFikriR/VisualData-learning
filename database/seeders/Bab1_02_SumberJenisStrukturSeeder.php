<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_02_SumberJenisStrukturSeeder extends Seeder
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
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-[#fbf5dd] text-[#306d29] font-bold rounded-full flex items-center justify-center text-sm border border-[#306d29]/30">2</span>
                            <p class="leading-relaxed">Peserta didik mampu mengidentifikasi <strong>sumber data</strong>, membedakan <strong>jenis-jenis data</strong>, serta memahami <strong>struktur data</strong> dalam kehidupan sehari-hari.</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        2.1. Sumber Data
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="font-bold text-xl text-[#306d29]">Apa Itu Sumber Data?</p>
                        <p>Data tidak muncul begitu saja. Data diperoleh dari berbagai sumber yang dapat digunakan untuk menjawab suatu permasalahan atau kebutuhan analisis. Dalam kehidupan sehari-hari, data dapat berasal dari hasil pengamatan, survei, sensor, dokumen, maupun berbagai layanan digital yang digunakan oleh masyarakat.</p>
                        <p>Sebelum menggunakan data untuk analisis, visualisasi, atau kecerdasan buatan, kita perlu memastikan bahwa sumber data tersebut terbuka, terpercaya, dan diperoleh secara legal.</p>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-8">
                            <h4 class="text-2xl font-bold text-[#306d29] mb-4">2.1.1. Sumber Data Terbuka (Open Data)</h4>
                            <p class="mb-6">Sumber data terbuka adalah data yang dapat diakses, digunakan, dan dibagikan oleh masyarakat secara bebas tanpa melanggar aturan yang berlaku.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-4">
                                <img src="/images/sumber-data-terbuka.jpg" alt="Contoh Sumber Data Terbuka" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar sumber-data-terbuka.jpg di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 11. Contoh Sumber Data Terbuka</p>
                            </div>
                            <p>Data terbuka memungkinkan masyarakat, peneliti, maupun pelajar memanfaatkan data untuk berbagai keperluan analisis dan pembelajaran. Dengan memanfaatkan sumber data terbuka, proses pengumpulan data menjadi lebih mudah dan transparan.</p>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6">
                            <h4 class="text-2xl font-bold text-[#306d29] mb-4">2.1.2. Sumber Data Terpercaya</h4>
                            <p class="mb-6">Sumber data terpercaya adalah data yang berasal dari lembaga atau pihak yang memiliki kredibilitas dan dapat dipertanggungjawabkan.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-4">
                                <img src="/images/sumber-data-terpercaya.jpg" alt="Contoh Sumber Data Terpercaya" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar sumber-data-terpercaya.jpg di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 12. Contoh Sumber Data Terpercaya</p>
                            </div>
                            <p>Menggunakan data dari sumber terpercaya membantu menghasilkan informasi dan keputusan yang lebih akurat. Oleh karena itu, penting untuk memeriksa asal dan kredibilitas sumber data sebelum digunakan dalam analisis maupun pengambilan keputusan.</p>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6">
                            <h4 class="text-2xl font-bold text-[#306d29] mb-4">2.1.3. Sumber Data Legal</h4>
                            <p class="mb-6">Sumber data legal adalah data yang diperoleh sesuai dengan aturan, izin, dan ketentuan yang berlaku.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-4">
                                <img src="/images/sumber-data-legal.jpg" alt="Contoh Sumber Data Legal" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar sumber-data-legal.jpg di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 13. Contoh Sumber Data Legal</p>
                            </div>
                            <p>Sebaliknya, mengambil, menggunakan, atau menyebarkan data pribadi tanpa izin merupakan tindakan yang tidak legal dan tidak etis. Oleh karena itu, setiap penggunaan data harus memperhatikan hak privasi dan aturan yang berlaku.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        2.2. Jenis Data
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <h4 class="text-2xl font-bold text-[#306d29]">2.2.1. Mengapa Harus Membedakan Jenis Data?</h4>
                        <p>Sebelum melakukan analisis atau visualisasi data, kita perlu memahami jenis data yang digunakan. Setiap jenis data memiliki karakteristik yang berbeda sehingga memerlukan cara pengolahan, analisis, dan visualisasi yang berbeda pula.</p>
                        <p>Sebagai contoh, data berupa warna baju tidak dapat dihitung rata-ratanya seperti data nilai ujian. Sebaliknya, data nilai ujian dapat dihitung, dibandingkan, dan divisualisasikan menggunakan grafik tertentu.</p>
                        <p>Jika jenis data tidak dikenali dengan benar, hasil analisis maupun visualisasi dapat menjadi tidak tepat dan menyesatkan.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-8">
                            <img src="/images/mengapa-bedakan-data.png" alt="Mengapa Harus Membedakan Jenis Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar mengapa-bedakan-data.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 14. Mengapa Harus Membedakan Jenis Data?</p>
                        </div>

                        <div class="bg-[#e7e1b1] border-l-4 border-red-500 p-6 rounded-r-xl mt-6 shadow-sm">
                            <h4 class="font-bold text-red-700 mb-2">Dampak Kesalahan Mengenali Jenis Data:</h4>
                            <ul class="list-disc pl-6 space-y-1 text-[#0d530e]">
                                <li>Informasi menjadi menyesatkan.</li>
                                <li>Analisis sistem tidak sesuai.</li>
                                <li>Visualisasi tidak tepat.</li>
                            </ul>
                        </div>

                        <p class="mt-8">Untuk memahami berbagai jenis data yang digunakan dalam analisis dan visualisasi, perhatikan klasifikasi (taksonomi) data berikut. Secara umum, data dapat dikelompokkan menjadi dua kategori utama, yaitu data kualitatif dan data kuantitatif.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center my-8">
                            <img src="/images/taksonomi-data.png" alt="Peta Taksonomi Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar taksonomi-data.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 15. Taksonomi Data</p>
                        </div>

                        <h4 class="text-2xl font-bold text-[#306d29] mt-12 border-b border-[#306d29]/20 pb-2">2.2.2. Data Kualitatif</h4>
                        <p class="mb-6">Data kualitatif adalah data yang berupa kategori, label, atau karakteristik tertentu dan tidak digunakan untuk operasi perhitungan matematika secara langsung. Data kualitatif dibagi menjadi dua jenis, yaitu data nominal dan data ordinal.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-10">
                            <img src="/images/jenis-data-kualitatif.png" alt="Jenis Data Kualitatif" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar jenis-data-kualitatif.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 15. Jenis Data Kualitatif</p>
                        </div>

                        <h4 class="text-2xl font-bold text-[#306d29] mt-12 border-b border-[#306d29]/20 pb-2">2.2.2. Data Kualitatif</h4>
                        <p class="mb-6">Data kualitatif adalah data yang berupa kategori, label, atau karakteristik tertentu dan tidak digunakan untuk operasi perhitungan matematika secara langsung. Data kualitatif dibagi menjadi dua jenis, yaitu data nominal dan data ordinal.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-10">
                            <img src="/images/jenis-data-kualitatif.png" alt="Jenis Data Kualitatif" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar jenis-data-kualitatif.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 15. Jenis Data Kualitatif</p>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 md:p-8 rounded-3xl border-2 border-dashed border-[#306d29]/40 shadow-sm mb-12 relative overflow-hidden">
                            <div class="text-center mb-6 relative z-10 border-b border-[#306d29]/10 pb-4">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-1">Simulasi Interaktif: Memilih Data Nominal</h4>
                                <p class="text-sm text-[#306d29] font-medium">Klik dan pilih opsi pada kategori di bawah ini. Perhatikan bahwa setiap pilihan diwakili oleh sebuah angka!</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                                <div class="bg-white p-5 rounded-2xl border border-[#306d29]/20 shadow-sm">
                                    <h5 class="font-bold text-[#0d530e] mb-3 text-sm flex items-center gap-2"><span>👫</span> Jenis Kelamin</h5>
                                    <div class="space-y-2" id="sim-kelamin">
                                        <button onclick="pilihNominal('kelamin', this, 'Laki-laki', 1)" class="w-full text-left py-2 px-4 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3"><span class="w-6 h-6 rounded-full bg-[#306d29]/20 flex items-center justify-center text-xs font-black">1</span> Laki-laki</button>
                                        <button onclick="pilihNominal('kelamin', this, 'Perempuan', 2)" class="w-full text-left py-2 px-4 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3"><span class="w-6 h-6 rounded-full bg-[#306d29]/20 flex items-center justify-center text-xs font-black">2</span> Perempuan</button>
                                    </div>
                                </div>

                                <div class="bg-white p-5 rounded-2xl border border-[#306d29]/20 shadow-sm">
                                    <h5 class="font-bold text-[#0d530e] mb-3 text-sm flex items-center gap-2"><span>🕌</span> Agama</h5>
                                    <div class="space-y-2" id="sim-agama">
                                        <button onclick="pilihNominal('agama', this, 'Islam', 1)" class="w-full text-left py-1.5 px-3 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3 text-sm"><span class="w-5 h-5 rounded-full bg-[#306d29]/20 flex items-center justify-center text-[10px] font-black flex-shrink-0">1</span> Islam</button>
                                        <button onclick="pilihNominal('agama', this, 'Kristen', 2)" class="w-full text-left py-1.5 px-3 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3 text-sm"><span class="w-5 h-5 rounded-full bg-[#306d29]/20 flex items-center justify-center text-[10px] font-black flex-shrink-0">2</span> Kristen</button>
                                        <button onclick="pilihNominal('agama', this, 'Katolik', 3)" class="w-full text-left py-1.5 px-3 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3 text-sm"><span class="w-5 h-5 rounded-full bg-[#306d29]/20 flex items-center justify-center text-[10px] font-black flex-shrink-0">3</span> Katolik</button>
                                        <button onclick="pilihNominal('agama', this, 'Hindu', 4)" class="w-full text-left py-1.5 px-3 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3 text-sm"><span class="w-5 h-5 rounded-full bg-[#306d29]/20 flex items-center justify-center text-[10px] font-black flex-shrink-0">4</span> Hindu</button>
                                        <button onclick="pilihNominal('agama', this, 'Buddha', 5)" class="w-full text-left py-1.5 px-3 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3 text-sm"><span class="w-5 h-5 rounded-full bg-[#306d29]/20 flex items-center justify-center text-[10px] font-black flex-shrink-0">5</span> Buddha</button>
                                    </div>
                                </div>

                                <div class="bg-white p-5 rounded-2xl border border-[#306d29]/20 shadow-sm">
                                    <h5 class="font-bold text-[#0d530e] mb-3 text-sm flex items-center gap-2"><span>🩸</span> Golongan Darah</h5>
                                    <div class="space-y-2" id="sim-darah">
                                        <button onclick="pilihNominal('darah', this, 'Golongan A', 1)" class="w-full text-left py-2 px-4 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3"><span class="w-6 h-6 rounded-full bg-[#306d29]/20 flex items-center justify-center text-xs font-black">1</span> Golongan A</button>
                                        <button onclick="pilihNominal('darah', this, 'Golongan B', 2)" class="w-full text-left py-2 px-4 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3"><span class="w-6 h-6 rounded-full bg-[#306d29]/20 flex items-center justify-center text-xs font-black">2</span> Golongan B</button>
                                        <button onclick="pilihNominal('darah', this, 'Golongan AB', 3)" class="w-full text-left py-2 px-4 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3"><span class="w-6 h-6 rounded-full bg-[#306d29]/20 flex items-center justify-center text-xs font-black">3</span> Golongan AB</button>
                                        <button onclick="pilihNominal('darah', this, 'Golongan O', 4)" class="w-full text-left py-2 px-4 rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3"><span class="w-6 h-6 rounded-full bg-[#306d29]/20 flex items-center justify-center text-xs font-black">4</span> Golongan O</button>
                                    </div>
                                </div>
                            </div>

                            <div id="nominal-feedback" class="hidden mt-6 bg-[#306d29] text-[#fbf5dd] p-5 rounded-2xl shadow-lg border border-[#0d530e] text-sm md:text-base leading-relaxed animate-fade-in relative">
                                <div class="absolute -top-3 left-6 bg-[#e7e1b1] text-[#0d530e] font-black px-3 py-1 rounded-full text-xs shadow-md">Insight Data!</div>
                                Meskipun kamu memilih angka <strong id="nominal-selected-angka" class="text-amber-300 text-lg mx-1"></strong> untuk mewakili <strong id="nominal-selected-val" class="text-amber-300 text-lg mx-1"></strong>, angka tersebut <strong class="text-amber-300 border-b border-amber-300 border-dashed pb-0.5">TIDAK BISA dihitung secara matematika</strong>. Angka 2 tidak lebih tinggi atau lebih besar dari angka 1. Angka tersebut murni hanya digunakan sistem komputer sebagai "Label" atau "Simbol". Inilah inti dari <strong>Data Kualitatif Nominal!</strong>
                            </div>
                            
                            <script>
                                function pilihNominal(kategori, btnEl, nilai, angka) {
                                    // 1. Reset warna semua tombol di kategori yang sama
                                    let buttons = document.querySelectorAll('#sim-' + kategori + ' button');
                                    let isKecil = kategori === 'agama'; // khusus agama paddingnya lebih kecil

                                    buttons.forEach(b => {
                                        b.className = "w-full text-left rounded-xl border border-[#306d29]/30 text-[#306d29] font-bold hover:bg-[#306d29]/10 transition-all flex items-center gap-3 " + (isKecil ? "py-1.5 px-3 text-sm" : "py-2 px-4");
                                        b.firstChild.className = "rounded-full bg-[#306d29]/20 flex items-center justify-center font-black flex-shrink-0 " + (isKecil ? "w-5 h-5 text-[10px]" : "w-6 h-6 text-xs");
                                    });
                                    
                                    // 2. Set warna menyala pada tombol yang diklik
                                    btnEl.className = "w-full text-left rounded-xl border border-[#0d530e] bg-[#306d29] text-[#fbf5dd] font-bold shadow-md transition-all flex items-center gap-3 transform scale-[1.02] " + (isKecil ? "py-1.5 px-3 text-sm" : "py-2 px-4");
                                    btnEl.firstChild.className = "rounded-full bg-[#fbf5dd] text-[#0d530e] flex items-center justify-center font-black shadow-sm flex-shrink-0 " + (isKecil ? "w-5 h-5 text-[10px]" : "w-6 h-6 text-xs");
                                    
                                    // 3. Tampilkan pesan feedback beserta angka dan nilai yang dipilih
                                    document.getElementById('nominal-feedback').classList.remove('hidden');
                                    document.getElementById('nominal-selected-val').innerText = nilai;
                                    document.getElementById('nominal-selected-angka').innerText = angka;
                                }
                            </script>
                        </div>

                        <div class="bg-[#e7e1b1] p-6 md:p-8 rounded-3xl border border-[#306d29]/30 shadow-lg mt-8 mb-12 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-[#306d29]/5 rounded-full blur-3xl pointer-events-none"></div>
                            
                            <div class="text-center mb-8 relative z-10">
                                <h4 class="text-2xl font-black text-[#0d530e] mb-2">Lab Mini: Generator Kartu Pelajar</h4>
                                <p class="text-sm text-[#306d29] font-medium">Ketikkan data identitas pelajarmu di bawah ini. Mari kita lihat bagaimana komputer membaca tipe datanya secara otomatis!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 relative z-10">
                                <div class="space-y-4 bg-[#fbf5dd] p-6 rounded-2xl border border-[#306d29]/20 shadow-sm">
                                    <div>
                                        <label class="block font-bold text-[#0d530e] text-sm mb-1.5">Nama Lengkap Siswa</label>
                                        <input type="text" id="input-nama" oninput="updateKartuPelajar()" class="w-full p-3 bg-[#e7e1b1]/40 border border-[#306d29]/30 text-[#0d530e] font-semibold rounded-xl outline-none focus:ring-2 focus:ring-[#306d29] transition-all" placeholder="Contoh: Muhammad Fikri">
                                    </div>

                                    <div>
                                        <label class="block font-bold text-[#0d530e] text-sm mb-1.5">NISN (Nomor Induk Siswa Nasional)</label>
                                        <input type="number" id="input-nisn" oninput="updateKartuPelajar()" class="w-full p-3 bg-[#e7e1b1]/40 border border-[#306d29]/30 text-[#0d530e] font-semibold rounded-xl outline-none focus:ring-2 focus:ring-[#306d29] transition-all font-mono" placeholder="Contoh: 0081234567">
                                    </div>

                                    <div>
                                        <label class="block font-bold text-[#0d530e] text-sm mb-1.5">Tempat, Tanggal Lahir</label>
                                        <input type="text" id="input-ttl" oninput="updateKartuPelajar()" class="w-full p-3 bg-[#e7e1b1]/40 border border-[#306d29]/30 text-[#0d530e] font-semibold rounded-xl outline-none focus:ring-2 focus:ring-[#306d29] transition-all" placeholder="Contoh: Banjarmasin, 28 November 2007">
                                    </div>

                                    <div>
                                        <label class="block font-bold text-[#0d530e] text-sm mb-1.5">Alamat Tempat Tinggal</label>
                                        <textarea id="input-alamat" oninput="updateKartuPelajar()" rows="2" class="w-full p-3 bg-[#e7e1b1]/40 border border-[#306d29]/30 text-[#0d530e] font-semibold rounded-xl outline-none focus:ring-2 focus:ring-[#306d29] transition-all resize-none shadow-inner" placeholder="Contoh: Jl. Brigjen Hasan Basri, Banjarmasin"></textarea>
                                    </div>
                                </div>

                                <div class="flex flex-col h-full justify-between">
                                    <div class="relative flex-1 bg-gradient-to-br from-[#306d29] to-[#0d530e] p-6 rounded-2xl shadow-xl overflow-hidden text-[#fbf5dd] border border-[#e7e1b1]/20 flex flex-col justify-center min-h-[260px]">
                                        <div class="absolute top-4 right-4 opacity-10 text-8xl select-none">🏫</div>
                                        <div class="relative z-10">
                                            <div class="flex items-center gap-3 border-b border-[#e7e1b1]/30 pb-3 mb-5">
                                                <div class="w-11 h-11 bg-[#fbf5dd] rounded-xl flex items-center justify-center text-[#306d29] text-xl font-black shadow-md">ID</div>
                                                <div>
                                                    <h5 class="font-black text-base tracking-widest leading-none">KARTU PELAJAR</h5>
                                                    <span class="text-[9px] text-[#e7e1b1] tracking-widest uppercase font-mono">MODEL DATA KUALITATIF NOMINAL</span>
                                                </div>
                                            </div>
                                            <div class="space-y-3 font-sans text-xs md:text-sm">
                                                <div class="flex items-start"><span class="w-20 opacity-75 flex-shrink-0 font-medium">Nama</span> <span class="mr-2">:</span> <span id="card-nama" class="font-bold text-[#e7e1b1] italic">Belum diisi...</span></div>
                                                <div class="flex items-start"><span class="w-20 opacity-75 flex-shrink-0 font-medium">NISN</span> <span class="mr-2">:</span> <span id="card-nisn" class="font-bold text-[#e7e1b1] italic font-mono">Belum diisi...</span></div>
                                                <div class="flex items-start"><span class="w-20 opacity-75 flex-shrink-0 font-medium">TTL</span> <span class="mr-2">:</span> <span id="card-ttl" class="font-bold text-[#e7e1b1] italic">Belum diisi...</span></div>
                                                <div class="flex items-start"><span class="w-20 opacity-75 flex-shrink-0 font-medium">Alamat</span> <span class="mr-2">:</span> <span id="card-alamat" class="font-bold text-[#e7e1b1] italic leading-tight">Belum diisi...</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button id="btn-analyze-id" onclick="analyzeIdCard()" disabled class="mt-4 w-full py-4 bg-[#0d530e] border border-[#306d29] text-[#e7e1b1] font-black rounded-2xl opacity-50 cursor-not-allowed transition-all uppercase tracking-widest shadow-lg flex items-center justify-center gap-2">
                                        <span class="text-xl"></span> Analisis Struktur Data Kartu
                                    </button>
                                </div>
                            </div>

                            <div id="id-analysis-result" class="hidden mt-8 p-6 bg-[#fbf5dd] rounded-2xl border-2 border-[#306d29] shadow-inner">
                                <h5 class="text-xl font-black text-[#0d530e] mb-3 border-b border-[#306d29]/20 pb-2 flex items-center gap-2"><span>📊</span> Hasil Eksplorasi Data Identitas</h5>
                                <p class="text-[#306d29] font-medium mb-4 text-sm leading-relaxed">Hebat! Meskipun kartu di atas memuat kombinasi huruf, simbol tanda baca, hingga barisan nomor, seluruh informasi tersebut dikelompokkan komputer ke dalam **Data Kualitatif (Nominal)**. Berikut rincian ilmiahnya:</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="bg-[#e7e1b1] p-4 rounded-xl border border-[#306d29]/30 shadow-sm">
                                        <div class="font-black text-[#0d530e] mb-1.5 text-sm flex items-center gap-1.5"><span>👤</span> Nama & Alamat</div>
                                        <p class="text-[11px] text-[#306d29] font-medium leading-relaxed">Berbentuk label tekstual deskriptif. Data ini murni digunakan untuk mengidentifikasi profil seseorang dan lokasi geografis rumah tanpa adanya tingkatan derajat hierarki matematika.</p>
                                    </div>
                                    <div class="bg-[#306d29]/10 p-4 rounded-xl border border-[#306d29]/40 shadow-sm">
                                        <div class="font-black text-[#306d29] mb-1.5 text-sm flex items-center gap-1.5"><span>💡</span> Fakta Unik Kode NISN</div>
                                        <p class="text-[11px] text-[#0d530e] font-medium leading-relaxed"><strong>Sangat Penting!</strong> Walaupun NISN berisi barisan angka, ini **bukan data kuantitatif**. Komputer mencatatnya sebagai nominal karena nilainya tidak dapat dihitung (tidak logis jika kamu menjumlahkan nilai NISN milik dua orang siswa).</p>
                                    </div>
                                    <div class="bg-[#e7e1b1] p-4 rounded-xl border border-[#306d29]/30 shadow-sm">
                                        <div class="font-black text-[#0d530e] mb-1.5 text-sm flex items-center gap-1.5"><span>📍</span> Tempat & Tanggal Lahir</div>
                                        <p class="text-[11px] text-[#306d29] font-medium leading-relaxed">Bagian kota bertindak sebagai kategori lokasi (nominal), sedangkan tanggal lahir bertindak sebagai *date descriptor* (penanda waktu) untuk melengkapi validitas identitas resmi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function updateKartuPelajar() {
                                const nama = document.getElementById('input-nama').value.trim();
                                const nisn = document.getElementById('input-nisn').value.trim();
                                const ttl = document.getElementById('input-ttl').value.trim();
                                const alamat = document.getElementById('input-alamat').value.trim();

                                // Update Tampilan Teks di Kartu Preview
                                document.getElementById('card-nama').innerText = nama || 'Belum diisi...';
                                document.getElementById('card-nisn').innerText = nisn || 'Belum diisi...';
                                document.getElementById('card-ttl').innerText = ttl || 'Belum diisi...';
                                document.getElementById('card-alamat').innerText = alamat || 'Belum diisi...';

                                // Mengubah style CSS secara dinamis
                                toggleFieldStyle('card-nama', nama);
                                toggleFieldStyle('card-nisn', nisn);
                                toggleFieldStyle('card-ttl', ttl);
                                toggleFieldStyle('card-alamat', alamat);

                                // Mengunci atau membuka Tombol Analisis Utama
                                const analyzeBtn = document.getElementById('btn-analyze-id');
                                if (nama && nisn && ttl && alamat) {
                                    analyzeBtn.disabled = false;
                                    // Hapus efek redup
                                    analyzeBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-[#0d530e]', 'text-[#e7e1b1]');
                                    // Tambahkan efek menyala (Hijau ke Hijau Gelap saat di-hover agar teks tetap kontras)
                                    analyzeBtn.classList.add('bg-[#306d29]', 'text-[#fbf5dd]', 'hover:bg-[#0d530e]', 'hover:-translate-y-1', 'shadow-[0_0_20px_rgba(48,109,41,0.5)]');
                                } else {
                                    analyzeBtn.disabled = true;
                                    // Kembalikan efek redup
                                    analyzeBtn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-[#0d530e]', 'text-[#e7e1b1]');
                                    analyzeBtn.classList.remove('bg-[#306d29]', 'text-[#fbf5dd]', 'hover:bg-[#0d530e]', 'hover:-translate-y-1', 'shadow-[0_0_20px_rgba(48,109,41,0.5)]');
                                    document.getElementById('id-analysis-result').classList.add('hidden');
                                }
                            }

                            function toggleFieldStyle(id, hasValue) {
                                const el = document.getElementById(id);
                                if(hasValue) {
                                    el.classList.remove('animate-pulse', 'text-[#e7e1b1]', 'italic');
                                    el.classList.add('text-white');
                                } else {
                                    el.classList.add('animate-pulse', 'text-[#e7e1b1]', 'italic');
                                    el.classList.remove('text-white');
                                }
                            }

                            function analyzeIdCard() {
                                const resultBox = document.getElementById('id-analysis-result');
                                resultBox.classList.remove('hidden');
                                resultBox.classList.add('animate-fade-in');
                                
                                const analyzeBtn = document.getElementById('btn-analyze-id');
                                analyzeBtn.innerHTML = "<span>✅</span> Komputer Selesai Menganalisis!";
                                
                                // Ubah tombol menjadi warna krem mati setelah ditekan
                                analyzeBtn.classList.remove('bg-[#306d29]', 'text-[#fbf5dd]', 'hover:bg-[#0d530e]', 'hover:-translate-y-1', 'shadow-[0_0_20px_rgba(48,109,41,0.5)]');
                                analyzeBtn.classList.add('bg-[#e7e1b1]', 'text-[#306d29]');
                                analyzeBtn.disabled = true;
                                
                                setTimeout(() => {
                                    resultBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }, 150);
                            }
                        </script>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6">
                            <h5 class="text-xl font-bold text-[#0d530e] mb-3">2.2.3. Data Nominal</h5>
                            <p class="mb-4">Data nominal adalah data berupa kategori atau label yang tidak memiliki urutan maupun tingkatan tertentu. Setiap kategori memiliki kedudukan yang sama.</p>
                            <p class="font-bold mb-2 text-[#306d29]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6">
                                <li>Jenis kelamin: Laki-laki, Perempuan</li>
                                <li>Warna baju: Merah, Biru, Hijau</li>
                                <li>Status kelulusan: Lulus, Tidak Lulus</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mt-4">
                                <img src="/images/data-nominal.png" alt="Data Nominal" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar data-nominal.png di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 16. Data Nominal</p>
                            </div>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6">
                            <h5 class="text-xl font-bold text-[#0d530e] mb-3">2.2.4. Data Ordinal</h5>
                            <p class="mb-4">Data ordinal adalah data kategori yang memiliki urutan atau tingkatan tertentu, tetapi selisih antar tingkatannya tidak dapat diukur secara pasti.</p>
                            <p class="font-bold mb-2 text-[#306d29]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6">
                                <li>Tingkat pendidikan: SD → SMP → SMA</li>
                                <li>Rating produk: ⭐ → ⭐⭐⭐ → ⭐⭐⭐⭐⭐</li>
                                <li>Kepuasan pelanggan: Buruk → Sedang → Baik</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mt-4">
                                <img src="/images/data-ordinal.png" alt="Data Ordinal" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar data-ordinal.png di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 17. Data Ordinal</p>
                            </div>
                        </div>

                        <h4 class="text-2xl font-bold text-[#306d29] mt-12 border-b border-[#306d29]/20 pb-2">2.2.5. Data Kuantitatif</h4>
                        <p class="mb-6">Data kuantitatif adalah data berupa angka yang diperoleh dari hasil menghitung atau mengukur suatu objek maupun kejadian. Data kuantitatif dibagi menjadi dua jenis, yaitu data diskrit dan data kontinu.</p>

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8">
                            <img src="/images/jenis-data-kuantitatif.png" alt="Jenis Data Kuantitatif" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar jenis-data-kuantitatif.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 18. Data Kuantitatif</p>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6">
                            <h5 class="text-xl font-bold text-[#0d530e] mb-3">2.2.6. Data Diskrit</h5>
                            <p class="mb-4">Data diskrit adalah data hasil menghitung yang nilainya berupa bilangan bulat dan tidak dapat berbentuk pecahan.</p>
                            <p class="font-bold mb-2 text-[#306d29]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6">
                                <li>Jumlah buku: 15</li>
                                <li>Jumlah siswa dalam kelas: 28</li>
                                <li>Jumlah kendaraan di tempat parkir: 15</li>
                                <li>Jumlah gol dalam pertandingan: 3</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mt-4">
                                <img src="/images/data-diskrit.png" alt="Data Diskrit" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar data-diskrit.png di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 19. Data Diskrit</p>
                            </div>
                        </div>

                        <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mt-6">
                            <h5 class="text-xl font-bold text-[#0d530e] mb-3">2.2.7. Data Kontinu</h5>
                            <p class="mb-4">Data kontinu adalah data hasil pengukuran yang nilainya dapat berupa pecahan atau desimal dan memiliki rentang nilai yang berkelanjutan.</p>
                            <p class="font-bold mb-2 text-[#306d29]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6">
                                <li>Tinggi badan: 170,5 cm</li>
                                <li>Berat badan: 55,3 kg</li>
                                <li>Suhu udara: 30,7°C</li>
                                <li>Kecepatan kendaraan: 85,3 km/jam</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mt-4">
                                <img src="/images/data-kontinu.png" alt="Data Kontinu" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar data-kontinu.png di folder public/images/</div>';">
                                <p class="text-sm text-[#306d29] italic mt-3">Gambar 20. Data Kontinu</p>
                            </div>
                        </div>

                        <h4 class="text-2xl font-bold text-[#306d29] mt-12 mb-4">2.2.8. Ringkasan Jenis Data</h4>
                        <p class="mb-6">Tabel berikut merangkum karakteristik utama dari setiap jenis data yang telah dipelajari.</p>
                        
                        <div class="overflow-x-auto bg-white rounded-xl border border-[#e7e1b1] shadow-sm mb-10">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-[#306d29] text-[#fbf5dd]">
                                        <th class="p-4 border border-[#e7e1b1]">Jenis Data</th>
                                        <th class="p-4 border border-[#e7e1b1]">Karakteristik</th>
                                        <th class="p-4 border border-[#e7e1b1]">Contoh</th>
                                    </tr>
                                </thead>
                                <tbody class="text-[#0d530e]">
                                    <tr class="bg-[#fbf5dd]">
                                        <td class="p-4 border border-[#e7e1b1] font-bold">Nominal</td>
                                        <td class="p-4 border border-[#e7e1b1]">Kategori tanpa urutan</td>
                                        <td class="p-4 border border-[#e7e1b1]">Warna baju</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="p-4 border border-[#e7e1b1] font-bold">Ordinal</td>
                                        <td class="p-4 border border-[#e7e1b1]">Kategori berurutan</td>
                                        <td class="p-4 border border-[#e7e1b1]">Tingkat pendidikan</td>
                                    </tr>
                                    <tr class="bg-[#fbf5dd]">
                                        <td class="p-4 border border-[#e7e1b1] font-bold">Diskrit</td>
                                        <td class="p-4 border border-[#e7e1b1]">Hasil menghitung</td>
                                        <td class="p-4 border border-[#e7e1b1]">Jumlah siswa</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="p-4 border border-[#e7e1b1] font-bold">Kontinu</td>
                                        <td class="p-4 border border-[#e7e1b1]">Hasil mengukur</td>
                                        <td class="p-4 border border-[#e7e1b1]">Tinggi badan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 class="text-2xl font-bold text-[#306d29] mt-8 mb-4">Hubungan Jenis Data dengan Visualisasi</h4>
                        <p class="mb-6">Setelah memahami berbagai jenis data, langkah berikutnya adalah memilih bentuk visualisasi yang sesuai. Setiap jenis data memiliki karakteristik yang berbeda sehingga memerlukan visualisasi yang berbeda pula.</p>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8">
                            <img src="/images/data-visualisasi.png" alt="Hubungan Data dan Visualisasi" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar data-visualisasi.png di folder public/images/</div>';">
                        </div>

                        <div class="bg-[#e7e1b1] p-6 rounded-2xl border border-[#306d29]/30 shadow-sm mb-12">
                            <h5 class="font-bold text-[#306d29] text-xl mb-4 flex items-center gap-2"><span>💡</span> Tips Pemilihan Visualisasi</h5>
                            <ul class="space-y-4">
                                <li class="flex gap-3"><span class="text-[#306d29] font-bold mt-1">1.</span> <div><strong>Kenali jenis data:</strong> Pastikan Anda mengetahui apakah data bersifat nominal, ordinal, diskrit, atau kontinu.</div></li>
                                <li class="flex gap-3"><span class="text-[#306d29] font-bold mt-1">2.</span> <div><strong>Pilih visualisasi yang tepat:</strong> Gunakan diagram batang (Bar Chart) untuk data kategori (nominal, ordinal, diskrit) dan Histogram untuk data kontinu.</div></li>
                                <li class="flex gap-3"><span class="text-[#306d29] font-bold mt-1">3.</span> <div><strong>Sesuaikan dengan tujuan analisis:</strong> Pilih visualisasi yang paling efektif untuk menyampaikan informasi.</div></li>
                                <li class="flex gap-3"><span class="text-[#306d29] font-bold mt-1">4.</span> <div><strong>Perhatikan keterbacaan:</strong> Pastikan visualisasi mudah dipahami, memiliki label yang jelas, dan skala yang sesuai.</div></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-8 mb-16 bg-[#fbf5dd] border-2 border-[#306d29]/30 rounded-3xl p-8 shadow-xl max-w-3xl mx-auto relative overflow-hidden">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-black mb-2 text-[#0d530e]">Uji Cepat: Data Sorter</h3>
                        <p class="text-sm text-[#306d29] mb-4">Uji pemahamanmu tentang jenis-jenis data di atas!</p>
                        <div class="inline-block bg-[#e7e1b1] text-[#306d29] px-4 py-1 rounded-full text-xs font-bold tracking-widest mb-4 border border-[#306d29]/20">
                            DATA KE-<span id="qIdx">1</span> DARI 5
                        </div>
                        <div id="questionBox" class="text-2xl md:text-3xl font-black text-[#0d530e] py-10 px-6 bg-[#e7e1b1] rounded-2xl border-2 border-dashed border-[#306d29] shadow-inner transition-all duration-300">
                            Loading...
                        </div>
                    </div>

                    <div id="feedback" class="text-center h-10 mb-6 font-bold text-lg transition-all duration-300"></div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="btnGroup">
                        <button onclick="checkAnswer('nominal')" class="group relative bg-[#e7e1b1] hover:bg-[#306d29] text-[#306d29] hover:text-[#fbf5dd] p-4 rounded-xl border border-[#306d29]/40 font-bold transition-all text-left flex justify-between items-center shadow-sm">
                            <span>Nominal</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">🏷️</span>
                        </button>
                        <button onclick="checkAnswer('ordinal')" class="group relative bg-[#e7e1b1] hover:bg-[#306d29] text-[#306d29] hover:text-[#fbf5dd] p-4 rounded-xl border border-[#306d29]/40 font-bold transition-all text-left flex justify-between items-center shadow-sm">
                            <span>Ordinal</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">🥇</span>
                        </button>
                        <button onclick="checkAnswer('diskrit')" class="group relative bg-[#e7e1b1] hover:bg-[#306d29] text-[#306d29] hover:text-[#fbf5dd] p-4 rounded-xl border border-[#306d29]/40 font-bold transition-all text-left flex justify-between items-center shadow-sm">
                            <span>Diskrit</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">🔢</span>
                        </button>
                        <button onclick="checkAnswer('kontinu')" class="group relative bg-[#e7e1b1] hover:bg-[#306d29] text-[#306d29] hover:text-[#fbf5dd] p-4 rounded-xl border border-[#306d29]/40 font-bold transition-all text-left flex justify-between items-center shadow-sm">
                            <span>Kontinu</span> <span class="text-2xl opacity-50 group-hover:scale-125 transition-transform">📏</span>
                        </button>
                    </div>

                    <div id="resetBtn" class="hidden mt-8 text-center">
                        <button onclick="resetGame()" class="bg-[#306d29] text-[#fbf5dd] font-black px-8 py-4 rounded-full hover:bg-[#0d530e] hover:scale-105 transition-all flex items-center justify-center gap-2 mx-auto shadow-lg shadow-[#306d29]/30">
                            <span>🔄</span> MAIN LAGI
                        </button>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl md:text-4xl font-black text-[#0d530e] border-b border-[#306d29]/30 pb-4 mb-6">
                        3. Struktur Data
                    </h3>
                    <p class="text-lg text-[#0d530e] leading-relaxed mb-6">
                        Sebelum digunakan untuk analisis atau visualisasi, data perlu disusun dalam suatu struktur yang dapat dipahami oleh komputer. Struktur data yang berbeda memerlukan cara penyimpanan dan pengolahan yang berbeda pula. Secara umum, struktur data dapat dibedakan menjadi data terstruktur, semi terstruktur, dan tidak terstruktur.
                    </p>

                    <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8">
                        <img src="/images/jenis-struktur-data.png" alt="Jenis Struktur Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar jenis-struktur-data.png di folder public/images/</div>';">
                        <p class="text-sm text-[#306d29] italic mt-3">Gambar 12. Jenis Struktur Data</p>
                    </div>

                    <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-8">
                        <h4 class="text-2xl font-bold text-[#306d29] mb-3">3.1. Data Terstruktur (Structured Data)</h4>
                        <p class="mb-4">Data terstruktur adalah data yang disimpan dalam format yang terorganisasi dan memiliki susunan yang tetap, biasanya dalam bentuk tabel (memiliki baris dan kolom).</p>
                        <ul class="list-disc pl-6 space-y-1 mb-4 text-[#0d530e]">
                            <li>Sangat mudah dicari dan dianalisis oleh komputer.</li>
                            <li>Cocok disimpan dalam Spreadsheet (Excel/Google Sheets) atau Basis Data (SQL).</li>
                        </ul>
                        
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center">
                            <img src="/images/contoh-data-terstruktur.png" alt="Contoh Data Terstruktur" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-data-terstruktur.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 13. Contoh dalam kehidupan sehari-hari data Terstruktur</p>
                        </div>
                    </div>

                    <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-8">
                        <h4 class="text-2xl font-bold text-[#306d29] mb-3">3.2. Data Semi Terstruktur (Semi-Structured Data)</h4>
                        <p class="mb-4">Data semi terstruktur adalah data yang memiliki sebagian struktur, tetapi tidak seketat data terstruktur (tidak berupa tabel kaku).</p>
                        <ul class="list-disc pl-6 space-y-1 mb-4 text-[#0d530e]">
                            <li>Memiliki penanda (label atau tag) untuk memisahkan elemen data.</li>
                            <li>Strukturnya fleksibel.</li>
                            <li>Banyak digunakan pada aplikasi web dan pertukaran data antarsistem.</li>
                        </ul>
                        

                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center">
                            <img src="/images/contoh-data-semi-terstruktur.png" alt="Contoh Data Semi Terstruktur" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-data-semi-terstruktur.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 14. Contoh Data Semi Terstruktur</p>
                        </div>
                    </div>

                    <div class="bg-[#fbf5dd] p-6 rounded-2xl border border-[#e7e1b1] shadow-sm mb-8">
                        <h4 class="text-2xl font-bold text-[#306d29] mb-3">3.3. Data Tidak Terstruktur (Unstructured Data)</h4>
                        <p class="mb-4">Data tidak terstruktur adalah data yang tidak memiliki format atau susunan yang tetap. Faktanya, sebagian besar data di dunia maya berwujud seperti ini.</p>
                        <ul class="list-disc pl-6 space-y-1 mb-4 text-[#0d530e]">
                            <li>Tidak memiliki tabel atau format baku.</li>
                            <li>Sangat sulit dianalisis secara langsung oleh komputer tradisional.</li>
                            <li>Memerlukan pengolahan tambahan (seringkali menggunakan AI/Machine Learning) untuk dipahami.</li>
                        </ul>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center">
                            <img src="/images/contoh-data-tidak-terstruktur.png" alt="Contoh Data Tidak Terstruktur" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar contoh-data-tidak-terstruktur.png di folder public/images/</div>';">
                            <p class="text-sm text-[#306d29] italic mt-3">Gambar 15. Data Tidak Terstruktur</p>
                        </div>
                    </div>

                    <h4 class="text-2xl font-bold text-[#306d29] mt-12 mb-4">3.4. Perbandingan Struktur Data</h4>
                    <div class="overflow-x-auto bg-white rounded-xl border border-[#e7e1b1] shadow-sm mb-6">
                    </div>

                    <div class="bg-white p-4 rounded-xl border border-[#e7e1b1] shadow-sm text-center mb-8 mt-6">
                        <img src="/images/perbandingan-struktur-data.png" alt="Perbandingan Struktur Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#e7e1b1] text-[#306d29] p-10 rounded-lg border-2 border-dashed border-[#306d29]\'>Letakkan gambar perbandingan-struktur-data.png di folder public/images/</div>';">
                        <p class="text-sm text-[#306d29] italic mt-3">Gambar 16. Perbandingan Struktur Data</p>
                    </div>

                    <p class="text-lg text-[#0d530e] leading-relaxed">
                        Struktur data menentukan bagaimana data disimpan, diakses, dan diolah oleh komputer. Data terstruktur umumnya lebih mudah dianalisis, sedangkan data semi terstruktur dan tidak terstruktur sering memerlukan proses tambahan (seperti AI) sebelum dapat digunakan.
                    </p>

                    <div class="bg-[#e7e1b1] p-6 rounded-2xl border-l-8 border-[#306d29] shadow-sm mt-10 mb-4">
                        <h4 class="text-2xl font-black text-[#306d29] mb-3 flex items-center gap-2">
                            <span>🛡️</span> Gunakan Data Secara Bertanggung Jawab
                        </h4>
                        <div class="space-y-3 text-[#0d530e] leading-relaxed">
                            <p>
                                Saat menggunakan data, kita perlu memastikan bahwa data diperoleh dari sumber yang legal, terpercaya, dan tidak melanggar privasi orang lain.
                            </p>
                            <p>
                                Contohnya, data pribadi seperti nomor telepon, alamat rumah, atau alamat email <strong class="text-red-600 bg-red-100 px-1 rounded">tidak boleh disebarkan tanpa izin pemiliknya</strong>.
                            </p>
                            <p>
                                Penggunaan data yang bertanggung jawab membantu menjaga keamanan dan kepercayaan dalam pengolahan data.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-black text-center mb-4 text-[#0d530e]">Lab AI: Ekstraktor Data</h3>
                    <p class="text-center text-[#306d29] mb-8 max-w-2xl mx-auto">
                        AI yang canggih bisa membaca <strong>data tidak terstruktur (teks chat berantakan)</strong> dan mengubahnya menjadi <strong>data terstruktur (tabel)</strong>. Mari kita simulasikan!
                    </p>

                    <div class="flex flex-col md:flex-row gap-4 bg-[#e7e1b1] p-6 rounded-3xl shadow-lg border border-[#306d29]/20">
                        <div class="flex-1 bg-[#fbf5dd] p-5 rounded-2xl border border-[#306d29]/20 shadow-inner flex flex-col">
                            <div class="flex justify-between items-center mb-4 border-b border-[#306d29]/20 pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">📝</span>
                                    <span class="text-[#306d29] font-bold uppercase tracking-widest text-xs">Chat_Guru.txt</span>
                                </div>
                                <span class="bg-[#306d29]/10 text-[#306d29] px-2 py-0.5 rounded text-[10px] font-bold border border-[#306d29]/20">Unstructured</span>
                            </div>
                            
                            <div class="text-[#0d530e] space-y-3 flex-1 text-sm leading-relaxed font-medium">
                                <p class="bg-[#e7e1b1] p-2 rounded">"Si Budi nilainya 90 tuh, dia anak kelas 10A."</p>
                                <p class="bg-[#e7e1b1] p-2 rounded">"Kalo Siti sih dapat 85, dia sekelas sama Budi di 10A."</p>
                                <p class="bg-[#e7e1b1] p-2 rounded">"Waduh, Anton nilainya cuma 70, padahal dia anak 10B."</p>
                            </div>
                            
                            <button onclick="structureData()" id="btnProcess" class="mt-6 w-full py-4 bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] rounded-xl font-black text-lg transition-all shadow-md flex items-center justify-center gap-2 group active:scale-95">
                                <span></span> EKSTRAK KE TABEL
                                <span class="group-hover:translate-x-1 transition-transform">→</span>
                            </button>
                        </div>

                        <div class="flex-1 bg-[#306d29] p-5 rounded-2xl border-2 border-[#0d530e] relative min-h-[300px] flex flex-col shadow-inner">
                            <div class="flex justify-between items-center mb-4 border-b border-[#e7e1b1]/30 pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">📊</span>
                                    <span class="text-[#fbf5dd] font-bold uppercase tracking-widest text-xs">Database_Siswa.csv</span>
                                </div>
                                <span class="bg-[#fbf5dd]/20 text-[#fbf5dd] px-2 py-0.5 rounded border border-[#fbf5dd]/30 text-[10px] font-bold">Structured</span>
                            </div>
                            
                            <div id="resultArea" class="flex-1 flex items-center justify-center text-[#e7e1b1]">
                                <div class="text-center">
                                    <div class="text-4xl mb-2 opacity-50">🤖</div>
                                    <p class="animate-pulse">&lt; Menunggu AI memproses teks... &gt;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* JAVASCRIPT DATA SORTER GAME */
                    const questions = [
                        { text: "Warna Mobil (Merah, Hitam, Putih)", type: "nominal", reason: "Hanya label warna, tidak ada urutan yang lebih tinggi/rendah." },
                        { text: "Tinggi Badan Siswa (165.5 cm)", type: "kontinu", reason: "Hasil pengukuran, bisa berupa desimal (pecahan)." },
                        { text: "Jumlah Gol dalam Pertandingan (3 Gol)", type: "diskrit", reason: "Angka bulat hasil menghitung (tidak mungkin 3.5 gol)." },
                        { text: "Tingkat Kepuasan (Puas, Netral, Kecewa)", type: "ordinal", reason: "Kategori yang memiliki tingkatan/urutan yang jelas." },
                        { text: "Suhu Ruangan Sensor IoT (24.8°C)", type: "kontinu", reason: "Hasil pengukuran sensor suhu, angka kontinu." }
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
                                    <span class='text-[#306d29]'>Misi Selesai!</span><br>
                                    <span class="text-[#0d530e] text-xl font-normal">Skor Ketepatan: ${score} dari 5</span>
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
                            feedbackEl.innerHTML = `<span class="text-[#306d29] drop-shadow-sm">✅ Tepat Sekali!</span> <span class="text-[#0d530e] text-sm font-normal block mt-1">${questions[currentQ].reason}</span>`;
                        } else {
                            feedbackEl.innerHTML = `<span class="text-red-600 drop-shadow-sm">❌ Ups, Salah!</span> <span class="text-[#0d530e] text-sm font-normal block mt-1">Jawaban yang tepat adalah <strong class="uppercase">${correctType}</strong>. ${questions[currentQ].reason}</span>`;
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

                    /* JAVASCRIPT AI EXTRACTOR LAB */
                    function structureData() {
                        const resultDiv = document.getElementById('resultArea');
                        const btn = document.getElementById('btnProcess');
                        
                        btn.disabled = true;
                        btn.innerHTML = '<span class="animate-spin">🔄</span> MEMPROSES...';
                        btn.classList.add('opacity-70', 'cursor-not-allowed');

                        resultDiv.innerHTML = `
                            <div class="flex flex-col items-center gap-3 w-full">
                                <div class="w-full bg-[#0d530e] rounded-full h-1.5 mb-2 overflow-hidden">
                                  <div class="bg-[#fbf5dd] h-1.5 rounded-full w-full animate-[loading_1.5s_ease-in-out_1]"></div>
                                </div>
                                <div class="text-[#fbf5dd] text-xs font-mono text-left w-full space-y-1">
                                    <p class="animate-pulse">> Analyzing natural language...</p>
                                    <p class="animate-pulse" style="animation-delay: 0.3s">> Extracting Entities (Name, Score, Class)...</p>
                                    <p class="animate-pulse" style="animation-delay: 0.6s">> Formatting to tabular rows...</p>
                                </div>
                            </div>
                        `;

                        setTimeout(() => {
                            resultDiv.innerHTML = `
                                <div class="w-full bg-[#fbf5dd] border border-[#e7e1b1] rounded-lg overflow-hidden animate-fade-in shadow-lg">
                                    <table class="w-full text-xs md:text-sm text-left border-collapse">
                                        <thead class="bg-[#e7e1b1] text-[#306d29] font-black tracking-widest text-[10px]">
                                            <tr>
                                                <th class="py-3 px-4 border border-[#e7e1b1]">NAMA</th>
                                                <th class="py-3 px-4 text-center border border-[#e7e1b1]">KELAS</th>
                                                <th class="py-3 px-4 text-right border border-[#e7e1b1]">NILAI</th>
                                            </tr>
                                        </thead>
                                        <tbody class="font-mono text-[#0d530e]">
                                            <tr class="hover:bg-[#e7e1b1]/50 transition-colors animate-slide-in" style="animation-delay: 0.1s">
                                                <td class="py-3 px-4 font-bold border border-[#e7e1b1]">Budi</td>
                                                <td class="py-3 px-4 text-center border border-[#e7e1b1]">10A</td>
                                                <td class="py-3 px-4 text-right font-bold text-[#306d29] border border-[#e7e1b1]">90</td>
                                            </tr>
                                            <tr class="hover:bg-[#e7e1b1]/50 transition-colors animate-slide-in" style="animation-delay: 0.3s">
                                                <td class="py-3 px-4 font-bold border border-[#e7e1b1]">Siti</td>
                                                <td class="py-3 px-4 text-center border border-[#e7e1b1]">10A</td>
                                                <td class="py-3 px-4 text-right font-bold text-[#306d29] border border-[#e7e1b1]">85</td>
                                            </tr>
                                            <tr class="hover:bg-[#e7e1b1]/50 transition-colors animate-slide-in" style="animation-delay: 0.5s">
                                                <td class="py-3 px-4 font-bold border border-[#e7e1b1]">Anton</td>
                                                <td class="py-3 px-4 text-center border border-[#e7e1b1]">10B</td>
                                                <td class="py-3 px-4 text-right font-bold text-red-600 border border-[#e7e1b1]">70</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4 text-[10px] text-[#fbf5dd] flex items-center justify-center gap-1 font-bold tracking-widest uppercase bg-[#0d530e]/50 py-1 rounded">
                                    <span class="text-sm">✨</span> Extraction Successful!
                                </div>
                            `;

                            btn.disabled = false;
                            btn.innerHTML = '<span>✅</span> SUDAH RAPI!';
                            btn.classList.replace('bg-[#306d29]', 'bg-[#e7e1b1]');
                            btn.classList.replace('text-[#fbf5dd]', 'text-[#306d29]');
                            btn.classList.add('border', 'border-[#306d29]');
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
            </div>

            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Berdasarkan modul, data yang dapat diakses, digunakan, dan dibagikan secara bebas oleh masyarakat tanpa melanggar aturan disebut sebagai data...."
                    data-opt-a="Data Terpercaya"
                    data-opt-b="Data Legal"
                    data-opt-c="Data Terbuka (Open Data)"
                    data-opt-d="Data Tidak Terstruktur"
                    data-opt-e="Data Pribadi"
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Apa perbedaan utama antara Data Kualitatif Nominal dan Ordinal menurut materi di atas?"
                    data-opt-a="Nominal berbentuk angka, sedangkan Ordinal berbentuk teks."
                    data-opt-b="Nominal tidak memiliki urutan atau tingkatan, sedangkan Ordinal memiliki tingkatan yang logis."
                    data-opt-c="Nominal didapat dari hasil mengukur, sedangkan Ordinal dari hasil menghitung."
                    data-opt-d="Tidak ada bedanya, keduanya adalah hal yang sama."
                    data-opt-e="Nominal digunakan untuk perhitungan matematika, sedangkan Ordinal untuk label warna."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pernyataan: “Jumlah gol dalam sebuah pertandingan sepak bola adalah 3 gol”. Pernyataan tersebut merupakan contoh dari jenis data...."
                    data-opt-a="Kuantitatif Diskrit, karena didapat dari hasil menghitung bulat."
                    data-opt-b="Kuantitatif Kontinu, karena angkanya bisa berbentuk pecahan."
                    data-opt-c="Kualitatif Nominal, karena hanya berupa label."
                    data-opt-d="Kualitatif Ordinal, karena menunjukkan peringkat tim pemenang."
                    data-opt-e="Data Terbuka, karena pertandingan tersebut ditayangkan di televisi."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Manakah dari pilihan di bawah ini yang merupakan karakteristik utama dari “Data Terstruktur” (Structured Data)?"
                    data-opt-a="Berupa file audio dan rekaman video yang berukuran besar."
                    data-opt-b="Tersusun rapi dalam format baris dan kolom yang konsisten (seperti file Excel)."
                    data-opt-c="Sangat sulit dianalisis oleh komputer sehingga memerlukan kecerdasan buatan."
                    data-opt-d="Data yang dikumpulkan secara acak dari chat WhatsApp."
                    data-opt-e="Memiliki penanda (tag) untuk memisahkan data, seperti file JSON."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Dalam materi, disebutkan bahwa 80% data di dunia berwujud Data Tidak Terstruktur. Contoh dari Data Tidak Terstruktur dan penerapannya dalam AI yang paling tepat adalah...."
                    data-opt-a="Tabel absen siswa yang digunakan AI untuk menghitung nilai."
                    data-opt-b="Data penjualan minimarket bulanan untuk memprediksi keuntungan."
                    data-opt-c="Rekaman suara yang digunakan AI untuk mengubah ucapan menjadi teks (Speech to Text)."
                    data-opt-d="Data file JSON yang berisi informasi umur pengguna."
                    data-opt-e="Daftar nama penduduk desa dalam file berformat .csv."
                    data-answer="C">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'sumber-jenis-struktur-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Sumber, Jenis, & Struktur Data',
                'type' => 'text',
                'sequence' => 2,
                'min_level' => 0, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1 Sub 2: Sumber, Jenis & Struktur Data (FULL PDF VER) berhasil disinkronisasi!');
    }
}