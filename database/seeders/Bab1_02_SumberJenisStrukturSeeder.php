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
            <div id="areaMateriPelajaran" class="space-y-12 text-[#1d1d1f] font-sans transition-all duration-1000 relative z-10 pb-20">

                <div class="mb-12 bg-[#f5f5f7] border-l-4 border-[#0066cc] p-6 md:p-8 rounded-r-xl">
                    <h3 class="text-xl md:text-2xl font-semibold text-[#1d1d1f] mb-5">
                        Tujuan Pembelajaran
                    </h3>
                    <ul class="space-y-4 text-[#1d1d1f]">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                            <p class="leading-relaxed">Peserta didik mampu mengidentifikasi <strong>sumber data</strong>, membedakan <strong>jenis-jenis data</strong>, serta memahami <strong>struktur data</strong> dalam kehidupan sehari-hari.</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        2.1. Sumber Data
                    </h3>
                    <div class="space-y-6 text-lg leading-relaxed">
                        <p class="font-semibold text-xl text-[#0066cc]">Apa Itu Sumber Data?</p>
                        <p class="text-[#333333]">Data tidak muncul begitu saja. Data diperoleh dari berbagai sumber yang dapat digunakan untuk menjawab suatu permasalahan atau kebutuhan analisis. Dalam kehidupan sehari-hari, data dapat berasal dari hasil pengamatan, survei, sensor, dokumen, maupun berbagai layanan digital yang digunakan oleh masyarakat.</p>
                        <p class="text-[#333333]">Sebelum menggunakan data untuk analisis, visualisasi, atau kecerdasan buatan, kita perlu memastikan bahwa sumber data tersebut terbuka, terpercaya, dan diperoleh secara legal.</p>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-8">
                            <h4 class="text-xl font-semibold text-[#1d1d1f] mb-4">2.1.1. Sumber Data Terbuka (Open Data)</h4>
                            <p class="mb-6 text-sm text-[#7a7a7a]">Sumber data terbuka adalah data yang dapat diakses, digunakan, dan dibagikan oleh masyarakat secara bebas tanpa melanggar aturan yang berlaku.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-4">
                                <img src="/images/sumber-data-terbuka.jpg" alt="Contoh Sumber Data Terbuka" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar sumber-data-terbuka.jpg di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 11. Contoh Sumber Data Terbuka</p>
                            </div>
                            <p class="text-sm text-[#333333] leading-relaxed">Data terbuka memungkinkan masyarakat, peneliti, maupun pelajar memanfaatkan data untuk berbagai keperluan analisis dan pembelajaran. Dengan memanfaatkan sumber data terbuka, proses pengumpulan data menjadi lebih mudah dan transparan.</p>
                        </div>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6">
                            <h4 class="text-xl font-semibold text-[#1d1d1f] mb-4">2.1.2. Sumber Data Terpercaya</h4>
                            <p class="mb-6 text-sm text-[#7a7a7a]">Sumber data terpercaya adalah data yang berasal dari lembaga atau pihak yang memiliki kredibilitas dan dapat dipertanggungjawabkan.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-4">
                                <img src="/images/sumber-data-terpercaya.jpg" alt="Contoh Sumber Data Terpercaya" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar sumber-data-terpercaya.jpg di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 12. Contoh Sumber Data Terpercaya</p>
                            </div>
                            <p class="text-sm text-[#333333] leading-relaxed">Menggunakan data dari sumber terpercaya membantu menghasilkan informasi dan keputusan yang lebih akurat. Oleh karena itu, penting untuk memeriksa asal dan kredibilitas sumber data sebelum digunakan dalam analisis maupun pengambilan keputusan.</p>
                        </div>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6">
                            <h4 class="text-xl font-semibold text-[#1d1d1f] mb-4">2.1.3. Sumber Data Legal</h4>
                            <p class="mb-6 text-sm text-[#7a7a7a]">Sumber data legal adalah data yang diperoleh sesuai dengan aturan, izin, dan ketentuan yang berlaku.</p>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-4">
                                <img src="/images/sumber-data-legal.jpg" alt="Contoh Sumber Data Legal" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar sumber-data-legal.jpg di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 13. Contoh Sumber Data Legal</p>
                            </div>
                            <p class="text-sm text-[#333333] leading-relaxed">Sebaliknya, mengambil, menggunakan, atau menyebarkan data pribadi tanpa izin merupakan tindakan yang tidak legal dan tidak etis. Oleh karena itu, setiap penggunaan data harus memperhatikan hak privasi dan aturan yang berlaku.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        2.2. Jenis Data
                    </h3>
                    
                    <div class="space-y-6 text-lg leading-relaxed">
                        <h4 class="text-xl font-semibold text-[#0066cc]">2.2.1. Mengapa Harus Membedakan Jenis Data?</h4>
                        <p class="text-[#333333]">Sebelum melakukan analisis atau visualisasi data, kita perlu memahami jenis data yang digunakan. Setiap jenis data memiliki karakteristik yang berbeda sehingga memerlukan cara pengolahan, analisis, dan visualisasi yang berbeda pula.</p>
                        <p class="text-[#333333]">Sebagai contoh, data berupa warna baju tidak dapat dihitung rata-ratanya seperti data nilai ujian. Sebaliknya, data nilai ujian dapat dihitung, dibandingkan, dan divisualisasikan menggunakan grafik tertentu.</p>
                        <p class="text-[#333333]">Jika jenis data tidak dikenali dengan benar, hasil analisis maupun visualisasi dapat menjadi tidak tepat dan menyesatkan.</p>

                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center my-8">
                            <img src="/images/mengapa-bedakan-data.png" alt="Mengapa Harus Membedakan Jenis Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar mengapa-bedakan-data.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 14. Mengapa Harus Membedakan Jenis Data?</p>
                        </div>

                        <div class="bg-[#f5f5f7] border-l-4 border-[#ff453a] p-6 rounded-r-xl mt-6">
                            <h4 class="font-semibold text-[#ff453a] mb-2">Dampak Kesalahan Mengenali Jenis Data:</h4>
                            <ul class="list-disc pl-6 space-y-1 text-[#1d1d1f] text-sm">
                                <li>Informasi menjadi menyesatkan.</li>
                                <li>Analisis sistem tidak sesuai.</li>
                                <li>Visualisasi tidak tepat.</li>
                            </ul>
                        </div>

                        <p class="mt-8 text-[#333333]">Untuk memahami berbagai jenis data yang digunakan dalam analisis dan visualisasi, perhatikan klasifikasi (taksonomi) data berikut. Secara umum, data dapat dikelompokkan menjadi dua kategori utama, yaitu data kualitatif dan data kuantitatif.</p>

                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center my-8">
                            <img src="/images/taksonomi-data.png" alt="Peta Taksonomi Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar taksonomi-data.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 15. Taksonomi Data</p>
                        </div>

                        <h4 class="text-xl font-semibold text-[#0066cc] mt-12 border-b border-[#e0e0e0] pb-2">2.2.2. Data Kualitatif</h4>
                        <p class="mb-6 text-[#333333]">Data kualitatif adalah data yang berupa kategori, label, atau karakteristik tertentu dan tidak digunakan untuk operasi perhitungan matematika secara langsung. Data kualitatif dibagi menjadi dua jenis, yaitu data nominal dan data ordinal.</p>

                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-10">
                            <img src="/images/jenis-data-kualitatif.png" alt="Jenis Data Kualitatif" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar jenis-data-kualitatif.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 15. Jenis Data Kualitatif</p>
                        </div>

                        <div class="bg-[#fafafc] p-6 md:p-8 rounded-2xl border border-[#e0e0e0] mb-12 relative overflow-hidden">
                            <div class="text-center mb-6 border-b border-[#e0e0e0] pb-4">
                                <h4 class="text-2xl font-semibold text-[#1d1d1f] mb-1">Simulasi Interaktif: Memilih Data Nominal</h4>
                                <p class="text-sm text-[#7a7a7a] font-medium">Klik dan pilih opsi pada kategori di bawah ini. Perhatikan bahwa setiap pilihan diwakili oleh sebuah angka!</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] mb-3 text-sm flex items-center gap-2">Jenis Kelamin</h5>
                                    <div class="space-y-2" id="sim-kelamin"></div>
                                </div>

                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] mb-3 text-sm flex items-center gap-2">Agama</h5>
                                    <div class="space-y-2" id="sim-agama"></div>
                                </div>

                                <div class="bg-white p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] mb-3 text-sm flex items-center gap-2">Golongan Darah</h5>
                                    <div class="space-y-2" id="sim-darah"></div>
                                </div>
                            </div>

                            <div id="nominal-feedback" class="hidden mt-6 bg-[#0066cc]/5 p-5 rounded-xl border border-[#0066cc]/20 text-sm md:text-base leading-relaxed animate-fade-in relative" style="color: #1d1d1f !important;">
                                <div class="absolute -top-3 left-6 bg-[#f5f5f7] font-semibold px-3 py-0.5 rounded-full text-xs border border-[#e0e0e0]" style="color: #1d1d1f !important;">Insight Data</div>
                                Meskipun kamu memilih angka <strong id="nominal-selected-angka" class="text-[#0066cc] text-lg mx-1" style="color: #0066cc !important;"></strong> untuk mewakili <strong id="nominal-selected-val" class="text-[#0066cc] text-lg mx-1" style="color: #0066cc !important;"></strong>, angka tersebut <strong class="text-[#0066cc] border-b border-[#0066cc] border-dashed pb-0.5" style="color: #0066cc !important;">TIDAK BISA dihitung secara matematika</strong>. Angka 2 tidak lebih tinggi atau lebih besar dari angka 1. Angka tersebut murni hanya digunakan sistem komputer sebagai "Label" atau "Simbol". Inilah inti dari <strong>Data Kualitatif Nominal!</strong>
                            </div>
                            
                            <script>
                                // Kumpulan data tombol pilihan
                                const nominalDataset = {
                                    kelamin: ['Laki-laki', 'Perempuan'],
                                    agama: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'],
                                    darah: ['Golongan A', 'Golongan B', 'Golongan AB', 'Golongan O']
                                };

                                // Otomatisasi pembuatan elemen tombol saat halaman dimuat
                                Object.keys(nominalDataset).forEach(kategori => {
                                    const container = document.getElementById(`sim-${kategori}`);
                                    if (!container) return;
                                    const isKecil = kategori === 'agama';

                                    nominalDataset[kategori].forEach((nilai, index) => {
                                        const angka = index + 1;
                                        const btn = document.createElement('button');
                                        
                                        btn.className = `w-full text-left rounded-xl border border-[#e0e0e0] font-medium hover:bg-[#f5f5f7] transition-all flex items-center gap-3 cursor-pointer ${isKecil ? 'py-1.5 px-3 text-sm' : 'py-2 px-4'}`;
                                        btn.style.setProperty('color', '#1d1d1f', 'important');
                                        btn.style.setProperty('background-color', '#ffffff', 'important');
                                        btn.onclick = function() { pilihNominal(kategori, this, nilai, angka); };
                                        
                                        const span = document.createElement('span');
                                        span.className = `rounded-full flex items-center justify-center font-semibold flex-shrink-0 ${isKecil ? 'w-5 h-5 text-[10px]' : 'w-6 h-6 text-xs'}`;
                                        span.style.setProperty('color', '#1d1d1f', 'important');
                                        span.style.setProperty('background-color', '#f5f5f7', 'important');
                                        span.innerText = angka;
                                        
                                        btn.appendChild(span);
                                        btn.appendChild(document.createTextNode(` ${nilai}`));
                                        container.appendChild(btn);
                                    });
                                });

                                // Logika interaksi pilihan tombol nominal
                                function pilihNominal(kategori, btnEl, nilai, angka) {
                                    let buttons = document.querySelectorAll('#sim-' + kategori + ' button');
                                    let isKecil = kategori === 'agama';

                                    buttons.forEach(b => {
                                        b.className = "w-full text-left rounded-xl border border-[#e0e0e0] font-medium hover:bg-[#f5f5f7] transition-all flex items-center gap-3 " + (isKecil ? "py-1.5 px-3 text-sm" : "py-2 px-4");
                                        b.style.setProperty('color', '#1d1d1f', 'important');
                                        b.style.setProperty('background-color', '#ffffff', 'important');
                                        
                                        b.firstChild.className = "rounded-full flex items-center justify-center font-semibold flex-shrink-0 " + (isKecil ? "w-5 h-5 text-[10px]" : "w-6 h-6 text-xs");
                                        b.firstChild.style.setProperty('color', '#1d1d1f', 'important');
                                        b.firstChild.style.setProperty('background-color', '#f5f5f7', 'important');
                                    });
                                    
                                    btnEl.className = "w-full text-left rounded-xl border border-[#0066cc] font-medium transition-all flex items-center gap-3 transform scale-[1.01] " + (isKecil ? "py-1.5 px-3 text-sm" : "py-2 px-4");
                                    btnEl.style.setProperty('color', '#ffffff', 'important');
                                    btnEl.style.setProperty('background-color', '#0066cc', 'important');
                                    
                                    btnEl.firstChild.className = "rounded-full flex items-center justify-center font-semibold flex-shrink-0 " + (isKecil ? "w-5 h-5 text-[10px]" : "w-6 h-6 text-xs");
                                    btnEl.firstChild.style.setProperty('color', '#0066cc', 'important');
                                    btnEl.firstChild.style.setProperty('background-color', '#ffffff', 'important');
                                    
                                    document.getElementById('nominal-feedback').classList.remove('hidden');
                                    document.getElementById('nominal-selected-val').innerText = nilai;
                                    document.getElementById('nominal-selected-angka').innerText = angka;
                                }
                            </script>
                        </div>

                        <div class="bg-[#fafafc] p-6 md:p-8 rounded-2xl border border-[#e0e0e0] mt-8 mb-12 relative overflow-hidden">
                            <div class="text-center mb-8">
                                <h4 class="text-2xl font-semibold text-[#1d1d1f] mb-2">Lab Mini: Generator Kartu Pelajar</h4>
                                <p class="text-sm text-[#7a7a7a] font-medium">Ketikkan data identitas pelajarmu di bawah ini. Mari kita lihat bagaimana komputer membaca tipe datanya secara otomatis!</p>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 relative z-10">
                                <div class="space-y-4 bg-white p-6 rounded-xl border border-[#e0e0e0]">
                                    <div>
                                        <label class="block font-semibold text-[#1d1d1f] text-sm mb-1.5">Nama Lengkap Siswa</label>
                                        <input type="text" id="input-nama" oninput="updateKartuPelajar()" class="w-full p-3 rounded-xl outline-none focus:ring-1 focus:ring-[#0066cc] focus:border-[#0066cc] transition-all" style="background-color: #ffffff !important; color: #1d1d1f !important; border: 1px solid #e0e0e0 !important;" placeholder="Contoh: Muhammad Fikri">
                                    </div>

                                    <div>
                                        <label class="block font-semibold text-[#1d1d1f] text-sm mb-1.5">NISN (Nomor Induk Siswa Nasional)</label>
                                        <input type="number" id="input-nisn" oninput="updateKartuPelajar()" class="w-full p-3 rounded-xl outline-none focus:ring-1 focus:ring-[#0066cc] focus:border-[#0066cc] transition-all font-mono" style="background-color: #ffffff !important; color: #1d1d1f !important; border: 1px solid #e0e0e0 !important;" placeholder="Contoh: 0081234567">
                                    </div>

                                    <div>
                                        <label class="block font-semibold text-[#1d1d1f] text-sm mb-1.5">Tempat, Tanggal Lahir</label>
                                        <input type="text" id="input-ttl" oninput="updateKartuPelajar()" class="w-full p-3 rounded-xl outline-none focus:ring-1 focus:ring-[#0066cc] focus:border-[#0066cc] transition-all" style="background-color: #ffffff !important; color: #1d1d1f !important; border: 1px solid #e0e0e0 !important;" placeholder="Contoh: Banjarmasin, 28 November 2007">
                                    </div>

                                    <div>
                                        <label class="block font-semibold text-[#1d1d1f] text-sm mb-1.5">Alamat Tempat Tinggal</label>
                                        <textarea id="input-alamat" oninput="updateKartuPelajar()" rows="2" class="w-full p-3 rounded-xl outline-none focus:ring-1 focus:ring-[#0066cc] focus:border-[#0066cc] transition-all resize-none font-sans" style="background-color: #ffffff !important; color: #1d1d1f !important; border: 1px solid #e0e0e0 !important;" placeholder="Contoh: Jl. Brigjen Hasan Basri, Banjarmasin"></textarea>
                                    </div>
                                </div>

                                <div class="flex flex-col h-full justify-between">
                                    <div class="relative flex-1 rounded-2xl flex flex-col min-h-[280px] overflow-hidden shadow-lg" style="background: linear-gradient(160deg, #0b2a5b 0%, #123a7a 55%, #0b2a5b 100%) !important; border: 1px solid #0a2148 !important; color: #ffffff !important;">
                                        
                                        <!-- Aksen garis merah-putih ala kartu identitas -->
                                        <div class="h-2 w-full flex">
                                            <div class="flex-1" style="background:#d81e2c;"></div>
                                            <div class="flex-1" style="background:#ffffff;"></div>
                                        </div>

                                        <!-- Watermark lingkaran dekoratif -->
                                        <div class="absolute -right-10 -top-10 w-40 h-40 rounded-full opacity-10" style="background:#ffffff;"></div>
                                        <div class="absolute -right-6 bottom-4 w-24 h-24 rounded-full opacity-10" style="background:#ffffff;"></div>

                                        <div class="relative z-10 p-5 md:p-6 flex-1 flex flex-col">
                                            <div class="flex items-center gap-3 border-b border-white/20 pb-3 mb-4">
                                                <div class="w-11 h-11 bg-white/15 rounded-full flex items-center justify-center text-white text-base font-bold border border-white/30">ID</div>
                                                <div>
                                                    <h5 class="font-bold text-sm md:text-base tracking-widest leading-none text-white uppercase">Kartu Pelajar</h5>
                                                    <span class="text-[9px] text-white/70 tracking-widest uppercase font-mono font-medium">Model Data Kualitatif Nominal</span>
                                                </div>
                                            </div>

                                            <div class="flex gap-4 flex-1">
                                                <!-- Placeholder foto -->
                                                <div class="w-16 h-20 md:w-20 md:h-24 flex-shrink-0 rounded-md bg-white/10 border border-white/25 flex items-center justify-center overflow-hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white/40" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 8 1.34 8 4v2H4v-2c0-2.66 5.3-4 8-4zm0-2a4 4 0 100-8 4 4 0 000 8z"/></svg>
                                                </div>

                                                <div class="space-y-2.5 font-sans text-xs md:text-sm text-white flex-1 min-w-0">
                                                    <div class="flex items-start"><span class="w-16 md:w-20 text-white/60 flex-shrink-0 font-medium">Nama</span> <span class="mr-2 text-white/60">:</span> <span id="card-nama" class="font-semibold text-white/70 italic break-words">Belum diisi...</span></div>
                                                    <div class="flex items-start"><span class="w-16 md:w-20 text-white/60 flex-shrink-0 font-medium">NISN</span> <span class="mr-2 text-white/60">:</span> <span id="card-nisn" class="font-semibold text-white/70 italic font-mono break-words">Belum diisi...</span></div>
                                                    <div class="flex items-start"><span class="w-16 md:w-20 text-white/60 flex-shrink-0 font-medium">TTL</span> <span class="mr-2 text-white/60">:</span> <span id="card-ttl" class="font-semibold text-white/70 italic break-words">Belum diisi...</span></div>
                                                    <div class="flex items-start"><span class="w-16 md:w-20 text-white/60 flex-shrink-0 font-medium">Alamat</span> <span class="mr-2 text-white/60">:</span> <span id="card-alamat" class="font-semibold text-white/70 italic leading-tight break-words">Belum diisi...</span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Strip bawah ala magnetic/hologram -->
                                        <div class="h-3 w-full mt-auto" style="background: linear-gradient(90deg, rgba(255,255,255,0.25), rgba(255,255,255,0.05), rgba(255,255,255,0.25));"></div>
                                    </div>
                                    
                                    <button id="btn-analyze-id" onclick="analyzeIdCard()" disabled class="mt-4 w-full py-3.5 bg-[#e0e0e0] text-[#7a7a7a] font-medium rounded-full opacity-50 cursor-not-allowed transition-all uppercase tracking-widest text-sm flex items-center justify-center gap-2 border-none">
                                        Analisis Struktur Data Kartu
                                    </button>
                                </div>
                            </div>

                            <div id="id-analysis-result" class="hidden mt-8 p-6 bg-white rounded-xl border border-[#e0e0e0]">
                                <h5 class="text-lg font-semibold text-[#1d1d1f] mb-3 border-b border-[#e0e0e0] pb-2 flex items-center gap-2">Hasil Eksplorasi Data Identitas</h5>
                                <p class="text-[#7a7a7a] font-medium mb-4 text-sm leading-relaxed">Hebat! Meskipun kartu di atas memuat kombinasi huruf, simbol tanda baca, hingga barisan nomor, seluruh informasi tersebut dikelompokkan komputer ke dalam **Data Kualitatif (Nominal)**. Berikut rincian ilmiahnya:</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0]">
                                        <div class="font-semibold text-[#1d1d1f] mb-1.5 text-sm">Nama & Alamat</div>
                                        <p class="text-[11px] text-[#7a7a7a] font-medium leading-relaxed">Berbentuk label tekstual deskriptif. Data ini murni digunakan untuk mengidentifikasi profil seseorang dan lokasi geografis rumah tanpa adanya tingkatan derajat hierarki matematika.</p>
                                    </div>
                                    <div class="bg-[#0066cc]/5 p-4 rounded-xl border border-[#0066cc]/10">
                                        <div class="font-semibold text-[#0066cc] mb-1.5 text-sm">Fakta Unik Kode NISN</div>
                                        <p class="text-[11px] text-[#333333] font-medium leading-relaxed"><strong>Sangat Penting!</strong> Walaupun NISN berisi barisan angka, ini bukan data kuantitatif. Komputer mencatatnya sebagai nominal karena nilainya tidak dapat dihitung (tidak logis jika kamu menjumlahkan nilai NISN milik dua orang siswa).</p>
                                    </div>
                                    <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0]">
                                        <div class="font-semibold text-[#1d1d1f] mb-1.5 text-sm">Tempat & Tanggal Lahir</div>
                                        <p class="text-[11px] text-[#7a7a7a] font-medium leading-relaxed">Bagian kota bertindak sebagai kategori lokasi (nominal), sedangkan tanggal lahir bertindak sebagai penanda waktu (date descriptor) untuk melengkapi validitas identitas resmi.</p>
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

                                document.getElementById('card-nama').innerText = nama || 'Belum diisi...';
                                document.getElementById('card-nisn').innerText = nisn || 'Belum diisi...';
                                document.getElementById('card-ttl').innerText = ttl || 'Belum diisi...';
                                document.getElementById('card-alamat').innerText = alamat || 'Belum diisi...';

                                toggleFieldStyle('card-nama', nama);
                                toggleFieldStyle('card-nisn', nisn);
                                toggleFieldStyle('card-ttl', ttl);
                                toggleFieldStyle('card-alamat', alamat);

                                const analyzeBtn = document.getElementById('btn-analyze-id');
                                if (nama && nisn && ttl && alamat) {
                                    analyzeBtn.disabled = false;
                                    analyzeBtn.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-[#e0e0e0]', 'text-[#7a7a7a]');
                                    analyzeBtn.className = "mt-4 w-full py-3.5 bg-[#0066cc] text-white font-medium rounded-full hover:bg-[#0071e3] transition-colors uppercase tracking-widest text-sm flex items-center justify-center gap-2 cursor-pointer border-none";
                                } else {
                                    analyzeBtn.disabled = true;
                                    analyzeBtn.className = "mt-4 w-full py-3.5 bg-[#e0e0e0] text-[#7a7a7a] font-medium rounded-full opacity-50 cursor-not-allowed transition-all uppercase tracking-widest text-sm flex items-center justify-center gap-2 border-none";
                                    document.getElementById('id-analysis-result').classList.add('hidden');
                                }
                            }

                            function toggleFieldStyle(id, hasValue) {
                                const el = document.getElementById(id);
                                if(hasValue) {
                                    el.className = "font-semibold text-white break-words";
                                } else {
                                    el.className = "animate-pulse text-white/60 italic font-normal break-words";
                                }
                            }

                            function analyzeIdCard() {
                                const resultBox = document.getElementById('id-analysis-result');
                                resultBox.classList.remove('hidden');
                                resultBox.classList.add('animate-fade-in');
                                
                                const analyzeBtn = document.getElementById('btn-analyze-id');
                                analyzeBtn.innerHTML = "Komputer Selesai Menganalisis";
                                analyzeBtn.className = "mt-4 w-full py-3.5 bg-[#f5f5f7] text-[#7a7a7a] font-medium rounded-full border border-[#e0e0e0] text-sm flex items-center justify-center gap-2";
                                analyzeBtn.disabled = true;
                                
                                setTimeout(() => {
                                    resultBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }, 150);
                            }
                        </script>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6">
                            <h5 class="text-xl font-semibold text-[#1d1d1f] mb-3">2.2.3. Data Nominal</h5>
                            <p class="mb-4 text-sm text-[#333333]">Data nominal adalah data berupa kategori atau label yang tidak memiliki urutan maupun tingkatan tertentu. Setiap kategori memiliki kedudukan yang sama.</p>
                            <p class="font-semibold mb-2 text-sm text-[#0066cc]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6 text-sm text-[#333333]">
                                <li>Jenis kelamin: Laki-laki, Perempuan</li>
                                <li>Warna baju: Merah, Biru, Hijau</li>
                                <li>Status kelulusan: Lulus, Tidak Lulus</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mt-4">
                                <img src="/images/data-nominal.png" alt="Data Nominal" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar data-nominal.png di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 16. Data Nominal</p>
                            </div>
                        </div>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6">
                            <h5 class="text-xl font-semibold text-[#1d1d1f] mb-3">2.2.4. Data Ordinal</h5>
                            <p class="mb-4 text-sm text-[#333333]">Data ordinal adalah data kategori yang memiliki urutan atau tingkatan tertentu, tetapi selisih antar tingkatannya tidak dapat diukur secara pasti.</p>
                            <p class="font-semibold mb-2 text-sm text-[#0066cc]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6 text-sm text-[#333333]">
                                <li>Tingkat pendidikan: SD → SMP → SMA</li>
                                <li>Rating produk: Bintang 1 → Bintang 3 → Bintang 5</li>
                                <li>Kepuasan pelanggan: Buruk → Sedang → Baik</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mt-4">
                                <img src="/images/data-ordinal.png" alt="Data Ordinal" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar data-ordinal.png di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 17. Data Ordinal</p>
                            </div>
                        </div>

                        <h4 class="text-xl font-semibold text-[#0066cc] mt-12 border-b border-[#e0e0e0] pb-2">2.2.5. Data Kuantitatif</h4>
                        <p class="mb-6 text-[#333333]">Data kuantitatif adalah data berupa angka yang diperoleh dari hasil menghitung atau mengukur suatu objek maupun kejadian. Data kuantitatif dibagi menjadi dua jenis, yaitu data diskrit dan data kontinu.</p>

                        <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8">
                            <img src="/images/jenis-data-kuantitatif.png" alt="Jenis Data Kuantitatif" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar jenis-data-kuantitatif.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 18. Data Kuantitatif</p>
                        </div>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6">
                            <h5 class="text-xl font-semibold text-[#1d1d1f] mb-3">2.2.6. Data Diskrit</h5>
                            <p class="mb-4 text-sm text-[#333333]">Data diskrit adalah data hasil menghitung yang nilainya berupa bilangan bulat dan tidak dapat berbentuk pecahan.</p>
                            <p class="font-semibold mb-2 text-sm text-[#0066cc]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6 text-sm text-[#333333]">
                                <li>Jumlah buku: 15</li>
                                <li>Jumlah siswa dalam kelas: 28</li>
                                <li>Jumlah kendaraan di tempat parkir: 15</li>
                                <li>Jumlah gol dalam pertandingan: 3</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mt-4">
                                <img src="/images/data-diskrit.png" alt="Data Diskrit" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar data-diskrit.png di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 19. Data Diskrit</p>
                            </div>
                        </div>

                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mt-6">
                            <h5 class="text-xl font-semibold text-[#1d1d1f] mb-3">2.2.7. Data Kontinu</h5>
                            <p class="mb-4 text-sm text-[#333333]">Data kontinu adalah data hasil pengukuran yang nilainya dapat berupa pecahan atau desimal dan memiliki rentang nilai yang berkelanjutan.</p>
                            <p class="font-semibold mb-2 text-sm text-[#0066cc]">Contoh:</p>
                            <ul class="list-disc pl-6 space-y-1 mb-6 text-sm text-[#333333]">
                                <li>Tinggi badan: 170,5 cm</li>
                                <li>Berat badan: 55,3 kg</li>
                                <li>Suhu udara: 30,7°C</li>
                                <li>Kecepatan kendaraan: 85,3 km/jam</li>
                            </ul>
                            
                            <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mt-4">
                                <img src="/images/data-kontinu.png" alt="Data Kontinu" class="w-full max-w-3xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar data-kontinu.png di folder public/images/</div>';">
                                <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 20. Data Kontinu</p>
                            </div>
                        </div>

                        <h4 class="text-xl font-semibold text-[#0066cc] mt-12 mb-4">2.2.8. Ringkasan Jenis Data</h4>
                        <p class="mb-6 text-sm text-[#333333]">Tabel berikut merangkum karakteristik utama dari setiap jenis data yang telah dipelajari.</p>
                        
                        <div class="overflow-x-auto bg-white rounded-xl border border-[#e0e0e0] mb-10">
                            <table class="w-full text-left border-collapse text-sm">
                                <thead>
                                    <tr class="bg-[#f5f5f7] text-[#1d1d1f] border-b border-[#e0e0e0]">
                                        <th class="p-4 font-semibold border-r border-[#e0e0e0]">Jenis Data</th>
                                        <th class="p-4 font-semibold border-r border-[#e0e0e0]">Karakteristik</th>
                                        <th class="p-4 font-semibold">Contoh</th>
                                    </tr>
                                </thead>
                                <tbody class="text-[#333333] divide-y divide-[#e0e0e0]">
                                    <tr class="bg-[#fafafc]">
                                        <td class="p-4 font-medium border-r border-[#e0e0e0]">Nominal</td>
                                        <td class="p-4 border-r border-[#e0e0e0]">Kategori tanpa urutan</td>
                                        <td class="p-4">Warna baju</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="p-4 font-medium border-r border-[#e0e0e0]">Ordinal</td>
                                        <td class="p-4 border-r border-[#e0e0e0]">Kategori berurutan</td>
                                        <td class="p-4">Tingkat pendidikan</td>
                                    </tr>
                                    <tr class="bg-[#fafafc]">
                                        <td class="p-4 font-medium border-r border-[#e0e0e0]">Diskrit</td>
                                        <td class="p-4 border-r border-[#e0e0e0]">Hasil menghitung</td>
                                        <td class="p-4">Jumlah siswa</td>
                                    </tr>
                                    <tr class="bg-white">
                                        <td class="p-4 font-medium border-r border-[#e0e0e0]">Kontinu</td>
                                        <td class="p-4 border-r border-[#e0e0e0]">Hasil mengukur</td>
                                        <td class="p-4">Tingkat tinggi badan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 class="text-xl font-semibold text-[#0066cc] mt-8 mb-4">Hubungan Jenis Data dengan Visualisasi</h4>
                        <p class="mb-6 text-[#333333]">Setelah memahami berbagai jenis data, langkah berikutnya adalah memilih bentuk visualisasi yang sesuai. Setiap jenis data memiliki karakteristik yang berbeda sehingga memerlukan visualisasi yang berbeda pula.</p>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-8">
                            <img src="/images/data-visualisasi.png" alt="Hubungan Data dan Visualisasi" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar data-visualisasi.png di folder public/images/</div>';">
                        </div>

                        <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0] mb-12">
                            <h5 class="font-semibold text-[#1d1d1f] text-lg mb-4">Tips Pemilihan Visualisasi</h5>
                            <ul class="space-y-4 text-sm text-[#333333]">
                                <li class="flex gap-3"><span class="text-[#0066cc] font-semibold mt-0.5">1.</span> <div><strong>Kenali jenis data:</strong> Pastikan Anda mengetahui apakah data bersifat nominal, ordinal, diskrit, atau kontinu.</div></li>
                                <li class="flex gap-3"><span class="text-[#0066cc] font-semibold mt-0.5">2.</span> <div><strong>Pilih visualisasi yang tepat:</strong> Gunakan diagram batang (Bar Chart) untuk data kategori (nominal, ordinal, diskrit) dan Histogram untuk data kontinu.</div></li>
                                <li class="flex gap-3"><span class="text-[#0066cc] font-semibold mt-0.5">3.</span> <div><strong>Sesuaikan dengan tujuan analisis:</strong> Pilih visualisasi yang paling efektif untuk menyampaikan informasi utama.</div></li>
                                <li class="flex gap-3"><span class="text-[#0066cc] font-semibold mt-0.5">4.</span> <div><strong>Perhatikan keterbacaan:</strong> Pastikan visualisasi mudah dipahami, memiliki penamaan label yang jelas, dan skala yang proporsional.</div></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-2xl md:text-3xl font-semibold text-[#1d1d1f] border-b border-[#e0e0e0] pb-4 mb-6">
                        3. Struktur Data
                    </h3>
                    <p class="text-lg text-[#333333] leading-relaxed mb-6">
                        Sebelum digunakan untuk analisis atau visualisasi, data perlu disusun dalam suatu struktur yang dapat dipahami oleh komputer. Struktur data yang berbeda memerlukan cara penyimpanan dan pengolahan yang berbeda pula. Secara umum, struktur data dapat dibedakan menjadi data terstruktur, semi terstruktur, dan tidak terstruktur.
                    </p>

                    <div class="bg-[#fafafc] p-4 rounded-xl border border-[#e0e0e0] text-center mb-8">
                        <img src="/images/jenis-struktur-data.png" alt="Jenis Struktur Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar jenis-struktur-data.png di folder public/images/</div>';">
                        <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 12. Jenis Struktur Data</p>
                    </div>

                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mb-8">
                        <h4 class="text-xl font-semibold text-[#1d1d1f] mb-3">3.1. Data Terstruktur (Structured Data)</h4>
                        <p class="mb-4 text-sm text-[#333333]">Data terstruktur adalah data yang disimpan dalam format yang terorganisasi dan memiliki susunan yang tetap, biasanya dalam bentuk tabel (memiliki baris dan kolom).</p>
                        <ul class="list-disc pl-6 space-y-1 mb-4 text-xs text-[#7a7a7a]">
                            <li>Sangat mudah dicari dan dianalisis oleh perangkat komputer.</li>
                            <li>Cocok disimpan dalam Spreadsheet (Excel/Google Sheets) atau Basis Data (SQL).</li>
                        </ul>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center">
                            <img src="/images/contoh-data-terstruktur.png" alt="Contoh Data Terstruktur" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar contoh-data-terstruktur.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 13. Contoh dalam kehidupan sehari-hari data Terstruktur</p>
                        </div>
                    </div>

                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mb-8">
                        <h4 class="text-xl font-semibold text-[#1d1d1f] mb-3">3.2. Data Semi Terstruktur (Semi-Structured Data)</h4>
                        <p class="mb-4 text-sm text-[#333333]">Data semi terstruktur adalah data yang memiliki sebagian struktur, tetapi tidak seketat data terstruktur (tidak berupa tabel kaku).</p>
                        <ul class="list-disc pl-6 space-y-1 mb-4 text-xs text-[#7a7a7a]">
                            <li>Memiliki penanda (label atau tag khusus) untuk memisahkan setiap elemen data.</li>
                            <li>Karakteristik strukturnya bersifat fleksibel.</li>
                            <li>Banyak digunakan pada manajemen aplikasi web dan pertukaran data antarsistem.</li>
                        </ul>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center">
                            <img src="/images/contoh-data-semi-terstruktur.png" alt="Contoh Data Semi Terstruktur" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar contoh-data-semi-terstruktur.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 14. Contoh Data Semi Terstruktur</p>
                        </div>
                    </div>

                    <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] mb-8">
                        <h4 class="text-xl font-semibold text-[#1d1d1f] mb-3">3.3. Data Tidak Terstruktur (Unstructured Data)</h4>
                        <p class="mb-4 text-sm text-[#333333]">Data tidak terstruktur adalah data yang tidak memiliki format atau susunan yang tetap. Faktanya, sebagian besar data di dunia maya berwujud seperti ini.</p>
                        <ul class="list-disc pl-6 space-y-1 mb-4 text-xs text-[#7a7a7a]">
                            <li>Tidak memiliki komponen tabel atau format baku kaku.</li>
                            <li>Sangat sulit dianalisis secara langsung oleh arsitektur komputer tradisional.</li>
                            <li>Memerlukan pengolahan tambahan (seringkali menggunakan AI/Machine Learning) untuk dipahami maknanya.</li>
                        </ul>
                        
                        <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center">
                            <img src="/images/contoh-data-tidak-terstruktur.png" alt="Contoh Data Tidak Terstruktur" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar contoh-data-tidak-terstruktur.png di folder public/images/</div>';">
                            <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 15. Data Tidak Terstruktur</p>
                        </div>
                    </div>

                    <h4 class="text-xl font-semibold text-[#1d1d1f] mt-12 mb-4">3.4. Perbandingan Struktur Data</h4>
                    <div class="overflow-x-auto bg-white rounded-xl border border-[#e0e0e0] mb-6"></div>

                    <div class="bg-white p-4 rounded-xl border border-[#e0e0e0] text-center mb-8 mt-6">
                        <img src="/images/perbandingan-struktur-data.png" alt="Perbandingan Struktur Data" class="w-full max-w-4xl mx-auto rounded-lg" onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'bg-[#f5f5f7] text-[#0066cc] p-10 rounded-lg border border-dashed border-[#e0e0e0]\'>Letakkan gambar perbandingan-struktur-data.png di folder public/images/</div>';">
                        <p class="text-sm text-[#7a7a7a] italic mt-3">Gambar 16. Perbandingan Struktur Data</p>
                    </div>

                    <p class="text-lg text-[#333333] leading-relaxed">
                        Struktur data menentukan bagaimana data disimpan, diakses, dan diolah oleh komputer. Data terstruktur umumnya lebih mudah dianalisis, sedangkan data semi terstruktur dan tidak terstruktur sering memerlukan proses tambahan (seperti AI) sebelum dapat digunakan secara maksimal.
                    </p>

                    <div class="bg-[#f5f5f7] p-6 rounded-xl border-l-4 border-[#0066cc] mt-10 mb-4">
                        <h4 class="text-xl font-semibold text-[#0066cc] mb-3">
                            Gunakan Data Secara Bertanggung Jawab
                        </h4>
                        <div class="space-y-3 text-[#333333] text-sm leading-relaxed">
                            <p>Saat menggunakan data, kita perlu memastikan bahwa data diperoleh dari sumber yang legal, terpercaya, dan tidak melanggar privasi orang lain.</p>
                            <p>Contohnya, data pribadi seperti nomor telepon, alamat rumah, atau alamat email <span class="text-[#ff453a] bg-[#ff453a]/10 px-1.5 py-0.5 rounded font-medium">tidak boleh disebarkan tanpa izin pemiliknya resmi</span>.</p>
                            <p>Penggunaan data yang bertanggung jawab membantu menjaga keamanan, etika, dan integritas penuh dalam manajemen pengolahan data.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-semibold text-center mb-4 text-[#1d1d1f]">Lab AI: Ekstraktor Data</h3>
                    <p class="text-center text-[#7a7a7a] mb-8 max-w-2xl mx-auto text-sm">
                        Sistem AI dapat membaca <strong>data tidak terstruktur (teks percakapan bebas)</strong> dan mengubahnya secara otomatis menjadi <strong>data terstruktur (tabel)</strong>. Mari kita simulasikan!
                    </p>
                    <div class="flex flex-col md:flex-row gap-4 bg-[#fafafc] p-6 rounded-2xl border border-[#e0e0e0]">
                        <div class="flex-1 bg-white p-5 rounded-xl border border-[#e0e0e0] flex flex-col">
                            <div class="flex justify-between items-center mb-4 border-b border-[#e0e0e0] pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-[#1d1d1f] font-semibold tracking-wider text-xs">Chat_Guru.txt</span>
                                </div>
                                <span class="bg-[#f5f5f7] text-[#7a7a7a] px-2 py-0.5 rounded text-[10px] font-semibold border border-[#e0e0e0]">Unstructured</span>
                            </div>
                            
                            <div class="text-[#333333] space-y-3 flex-1 text-sm leading-relaxed font-medium">
                                <p class="bg-[#f5f5f7] p-2 rounded">"Si Budi nilainya 90 tuh, dia anak kelas 10A."</p>
                                <p class="bg-[#f5f5f7] p-2 rounded">"Kalo Siti sih dapat 85, dia sekelas sama Budi di 10A."</p>
                                <p class="bg-[#f5f5f7] p-2 rounded">"Waduh, Anton nilainya cuma 70, padahal dia anak 10B."</p>
                            </div>
                            
                            <button onclick="structureData()" id="btnProcess" class="mt-6 w-full py-3.5 bg-[#0066cc] hover:bg-[#0071e3] text-white rounded-full font-medium text-base transition-colors flex items-center justify-center gap-2 group active:scale-95 border-none cursor-pointer">
                                <span>Ekstrak ke Tabel</span>
                                <span class="group-hover:translate-x-1 transition-transform">→</span>
                            </button>
                        </div>
                        <div class="flex-1 bg-[#1c1c1e] p-5 rounded-xl border border-white/5 relative min-h-[300px] flex flex-col">
                            <div class="flex justify-between items-center mb-4 border-b border-white/10 pb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-white font-semibold tracking-wider text-xs">Database_Siswa.csv</span>
                                </div>
                                <span class="bg-white/10 text-[#cccccc] px-2 py-0.5 rounded border border-white/10 text-[10px] font-semibold">Structured</span>
                            </div>
                            
                            <div id="resultArea" class="flex-1 flex items-center justify-center text-[#cccccc]">
                                <div class="text-center">
                                    <p class="animate-pulse text-sm font-mono">&lt; Menunggu AI memproses teks... &gt;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    /* JAVASCRIPT AI EXTRACTOR LAB */
                    function structureData() {
                        const resultDiv = document.getElementById('resultArea');
                        const btn = document.getElementById('btnProcess');
                        
                        // State: PROCESSING
                        btn.disabled = true;
                        btn.innerHTML = 'Memproses...';
                        btn.className = "mt-6 w-full py-3.5 rounded-full font-medium text-base flex items-center justify-center gap-2 cursor-not-allowed border-none";
                        btn.style.backgroundColor = "#0066cc";
                        btn.style.color = "#ffffff";
                        btn.style.opacity = "0.7";

                        resultDiv.innerHTML = `
                            <div class="flex flex-col items-center gap-3 w-full">
                                <div class="w-full bg-white/10 rounded-full h-1.5 mb-2 overflow-hidden">
                                <div class="bg-[#2997ff] h-1.5 rounded-full w-full animate-[loading_1.5s_ease-in-out_1]"></div>
                                </div>
                                <div class="text-[#cccccc] text-xs font-mono text-left w-full space-y-1">
                                    <p class="animate-pulse">> Analyzing natural language...</p>
                                    <p class="animate-pulse" style="animation-delay: 0.3s">> Extracting Entities (Name, Score, Class)...</p>
                                    <p class="animate-pulse" style="animation-delay: 0.6s">> Formatting to tabular rows...</p>
                                </div>
                            </div>
                        `;

                        setTimeout(() => {
                            resultDiv.innerHTML = `
                                <div class="w-full bg-[#272729] border border-white/10 rounded-lg overflow-hidden animate-fade-in">
                                    <table class="w-full text-xs md:text-sm text-left border-collapse">
                                        <thead class="bg-white/5 text-[#cccccc] font-semibold tracking-widest text-[10px] border-b border-white/10">
                                            <tr>
                                                <th class="py-3 px-4 border-r border-white/5">NAMA</th>
                                                <th class="py-3 px-4 text-center border-r border-white/5">KELAS</th>
                                                <th class="py-3 px-4 text-right">NILAI</th>
                                            </tr>
                                        </thead>
                                        <tbody class="font-mono text-white divide-y divide-white/5">
                                            <tr class="hover:bg-white/5 transition-colors animate-slide-in" style="animation-delay: 0.1s">
                                                <td class="py-3 px-4 font-medium border-r border-white/5">Budi</td>
                                                <td class="py-3 px-4 text-center border-r border-white/5">10A</td>
                                                <td class="py-3 px-4 text-right font-medium text-[#2997ff]">90</td>
                                            </tr>
                                            <tr class="hover:bg-white/5 transition-colors animate-slide-in" style="animation-delay: 0.3s">
                                                <td class="py-3 px-4 font-medium border-r border-white/5">Siti</td>
                                                <td class="py-3 px-4 text-center border-r border-white/5">10A</td>
                                                <td class="py-3 px-4 text-right font-medium text-[#2997ff]">85</td>
                                            </tr>
                                            <tr class="hover:bg-white/5 transition-colors animate-slide-in" style="animation-delay: 0.5s">
                                                <td class="py-3 px-4 font-medium border-r border-white/5">Anton</td>
                                                <td class="py-3 px-4 text-center border-r border-white/5">10B</td>
                                                <td class="py-3 px-4 text-right font-medium text-[#ff453a]">70</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4 text-[10px] text-white flex items-center justify-center gap-1 font-semibold tracking-widest uppercase bg-white/5 py-1 rounded border border-white/10">
                                    Extraction Successful
                                </div>
                            `;

                            // State: DONE
                            btn.disabled = false;
                            btn.innerHTML = 'Sudah Rapi';
                            btn.className = "mt-6 w-full py-3.5 rounded-full font-medium text-base flex items-center justify-center gap-2 border cursor-default";
                            btn.style.backgroundColor = "#2c2c2e";
                            btn.style.color = "#ffffff";
                            btn.style.borderColor = "rgba(255,255,255,0.15)";
                            btn.style.opacity = "1";
                        }, 1500);
                    }
                </script>

                <style>
                    @keyframes slide-in {
                        from { opacity: 0; transform: translateX(-10px); }
                        to { opacity: 1; transform: translateX(0); }
                    }
                    @keyframes loading {
                        0% { width: 0%; }
                        50% { width: 70%; }
                        100% { width: 100%; }
                    }
                    .animate-slide-in {
                        animation: slide-in 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
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
                    data-question="“Jumlah gol dalam sebuah pertandingan sepak bola adalah 3 gol”. Pernyataan tersebut merupakan contoh dari jenis data...."
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