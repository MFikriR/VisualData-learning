<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_01_KonsepDasarDataSeeder extends Seeder
{
    public function run()
    {
        $chapterId = Chapter::where('sequence', 1)->value('id');

        if (!$chapterId) {
            $this->command->error('Bab 1 belum dibuat! Pastikan ChapterSeeder / MateriBab1Seeder sudah dijalankan.');
            return;
        }

        // Hapus slug lama jika ada agar tidak ganda di sidebar
        Material::where('slug', 'apa-itu-data')->delete();

        $content = <<<'EOT'
            <div id="areaMateriPelajaran" class="space-y-12 text-[#1d1d1f] font-sans transition-all duration-1000 relative z-10 pb-20">

                <!-- Block Tujuan Pembelajaran -->
                <div class="mb-12 bg-[#f5f5f7] border-l-4 border-[#0066cc] p-6 md:p-8 rounded-r-xl shadow-sm">
                    <h3 class="text-xl md:text-2xl font-semibold text-[#1d1d1f] mb-5">
                        Tujuan Pembelajaran
                    </h3>
                    <ul class="space-y-4 text-[#1d1d1f]">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">1</span>
                            <p class="leading-relaxed">Mendefinisikan konsep data secara tepat.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">2</span>
                            <p class="leading-relaxed">Mengklasifikasikan bentuk-bentuk data dalam kehidupan sehari-hari.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">3</span>
                            <p class="leading-relaxed">Menganalisis kesalahan penafsiran data pada berbagai contoh kasus.</p>
                        </li>
                    </ul>
                </div>

                <!-- SEKSI 1: Mendefinisikan Konsep Data -->
                <div>
                    <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        1. Mendefinisikan Konsep Data
                    </h3>
                    
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.1 Definisi Data</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] text-lg mb-2">Etimologi Kata</h5>
                                    <p class="text-[#333333] text-sm leading-relaxed">
                                        Istilah <strong>data</strong> berasal dari bahasa Latin, yaitu <em>datum</em>, yang berarti fakta atau keterangan yang benar dan nyata yang dikumpulkan untuk dijadikan dasar kajian atau analisis.
                                    </p>
                                </div>
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] text-lg mb-2">KBBI & Literatur Statistik</h5>
                                    <p class="text-[#333333] text-sm leading-relaxed">
                                        Data adalah keterangan yang benar dan nyata. Data merupakan satuan terkecil berupa angka, huruf, atau simbol yang menggambarkan nilai variabel sesuai kondisi lapangan.
                                    </p>
                                </div>
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-semibold text-[#1d1d1f] text-lg mb-2">Bidang Informatika</h5>
                                    <p class="text-[#333333] text-sm leading-relaxed">
                                        Data adalah fakta, angka, teks, gambar, suara, atau video digital yang disimpan dan diproses oleh komputer yang belum memiliki arti khusus sebelum diolah.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Sub 1.2: Perbedaan Data dan Informasi -->
                        <div class="mt-10">
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.2 Perbedaan Mendasar Antara Data dan Informasi</h4>
                            
                            <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden max-w-5xl mx-auto shadow-sm">
                                <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0] text-center">
                                    <h5 class="text-sm font-semibold text-[#1d1d1f]">Tabel Perbandingan Data vs Informasi </h5>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-sm text-[#1d1d1f]">
                                        <thead class="bg-[#fafafc] text-[#1d1d1f] border-b border-[#e0e0e0]">
                                            <tr>
                                                <th class="px-6 py-4 font-semibold w-1/4">Karakteristik</th>
                                                <th class="px-6 py-4 font-semibold border-l border-[#e0e0e0] w-3/8">Data </th>
                                                <th class="px-6 py-4 font-semibold border-l border-[#e0e0e0] w-3/8">Informasi </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-[#e0e0e0] bg-white">
                                            <tr class="hover:bg-[#f5f5f7] transition-colors">
                                                <td class="px-6 py-4 font-semibold text-[#1d1d1f]">Definisi</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Kumpulan angka, kata, atau gambar <strong>mentah</strong> yang belum diatur dan belum memiliki arti khusus.</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Data yang telah <strong>diatur, diolah, dan diberi konteks</strong> sehingga memiliki makna dan nilai guna.</td>
                                            </tr>
                                            <tr class="hover:bg-[#f5f5f7] transition-colors">
                                                <td class="px-6 py-4 font-semibold text-[#1d1d1f]">Status Pengolahan</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Merupakan masukan (<em>input</em>) mentah yang dimasukkan ke sistem.</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Merupakan keluaran (<em>output</em>) hasil pemrosesan atau analisis manusia.</td>
                                            </tr>
                                            <tr class="hover:bg-[#f5f5f7] transition-colors">
                                                <td class="px-6 py-4 font-semibold text-[#1d1d1f]">Sifat & Konteks</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Belum memiliki struktur dan belum dapat digunakan langsung mengambil keputusan.</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Akurat, kontekstual, dan siap digunakan untuk pengambilan keputusan.</td>
                                            </tr>
                                            <tr class="hover:bg-[#f5f5f7] transition-colors">
                                                <td class="px-6 py-4 font-semibold text-[#1d1d1f]">Contoh Konkret</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] font-mono text-[#0066cc] text-xs">Deretan angka: 160, 181 atau daftar nilai mentah: 75, 80, 90, 65, 85</td>
                                                <td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333] font-medium">"160 cm" sebagai tinggi badan siswa, atau "rata-rata nilai ujian matematika kelas adalah 77,5".</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Sub 1.3: Elemen Pembentuk Data -->
                        <div class="mt-10">
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">1.3 Elemen Pembentuk Data (Datum, Data, dan Dataset)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                                    <div class="text-[#0066cc] font-mono text-xs font-bold uppercase mb-1">Elemen Tunggal</div>
                                    <h5 class="text-xl font-bold text-[#1d1d1f] mb-2">Datum</h5>
                                    <p class="text-[#333333] text-sm leading-relaxed">Satuan atau elemen tunggal dari data (bentuk tunggal dari <em>data</em>).</p>
                                </div>
                                <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                                    <div class="text-[#0066cc] font-mono text-xs font-bold uppercase mb-1">Elemen Jamak</div>
                                    <h5 class="text-xl font-bold text-[#1d1d1f] mb-2">Data</h5>
                                    <p class="text-[#333333] text-sm leading-relaxed">Kumpulan dari dua atau lebih datum.</p>
                                </div>
                                <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                                    <div class="text-[#0066cc] font-mono text-xs font-bold uppercase mb-1">Tabel Terstruktur</div>
                                    <h5 class="text-xl font-bold text-[#1d1d1f] mb-2">Dataset</h5>
                                    <p class="text-[#333333] text-sm leading-relaxed">
                                        Sekumpulan data terorganisir dalam bentuk tabel yang terdiri dari <strong>Atribut/Feature</strong> (kolom), <strong>Instance/Sample</strong> (baris), dan <strong>Value</strong> (nilai terisi).
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WIDGET INTERAKTIF MINI-GAME (SUB 1.1 - 1.3) -->
                <div class="mt-12 bg-slate-50 border border-slate-200 rounded-2xl p-6 md:p-8 shadow-sm text-slate-800">
                    <!-- Header Game -->
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-200">
                        <div class="flex items-center gap-3">
                            <span class="bg-[#0066cc] text-white p-2.5 rounded-xl text-lg flex items-center justify-center shadow-sm">🧩</span>
                            <div>
                                <h4 class="text-xl font-bold !text-[#1d1d1f]" style="color: #1d1d1f !important;">
                                    Mini Game: Uji Pemahaman "Detektif Konsep"
                                </h4>
                                <p class="text-xs font-medium !text-[#4b5563] mt-1" style="color: #4b5563 !important;">
                                    Uji ingatan dan pemahamanmu dari Sub-bab 1.1, 1.2, dan 1.3 sebelum melangkah ke Seksi 2!
                                </p>
                            </div>
                        </div>
                        <span id="skorMiniGame" class="hidden md:inline-flex items-center gap-1 bg-blue-50 text-[#0066cc] font-bold text-xs px-3.5 py-1.5 rounded-full border border-blue-200 shadow-2xs">
                            Skor: <span id="valSkor">0</span> / 4
                        </span>
                    </div>

                    <!-- Petunjuk Bermain -->
                    <p class="text-xs text-slate-600 mb-6 font-medium leading-relaxed bg-white p-3.5 rounded-xl border border-slate-200/80 shadow-2xs">
                        📌 <strong class="text-slate-800">Cara Bermain:</strong> Pilih salah satu <strong class="text-[#0066cc]">Bukti Kasus</strong> di sebelah kiri, lalu klik <strong class="text-[#0066cc]">Kategori</strong> yang menurutmu paling tepat di sebelah kanan!
                    </p>

                    <!-- Area Game Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                        <!-- Kolom Kiri: Kartu Soal / Bukti -->
                        <div class="md:col-span-6 space-y-3">
                            <h5 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">1. Pilih Bukti Kasus:</h5>
                            
                            <button onclick="pilihKartuGame(1)" id="btnSoal1" class="w-full text-left p-4 bg-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-medium transition-all cursor-pointer shadow-2xs flex items-center justify-between group">
                                <span class="text-slate-700 group-hover:text-slate-900">A. Angka tunggal <strong class="text-slate-900">"36,6"</strong> tanpa keterangan satuan/nama.</span>
                                <span id="badgeSoal1" class="text-[11px] px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 font-semibold border border-slate-200 shrink-0 ml-2">Belum Dijawab</span>
                            </button>

                            <button onclick="pilihKartuGame(2)" id="btnSoal2" class="w-full text-left p-4 bg-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-medium transition-all cursor-pointer shadow-2xs flex items-center justify-between group">
                                <span class="text-slate-700 group-hover:text-slate-900">B. Deretan nilai mentah: <strong class="text-slate-900">75, 80, 90, 65, 85</strong>.</span>
                                <span id="badgeSoal2" class="text-[11px] px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 font-semibold border border-slate-200 shrink-0 ml-2">Belum Dijawab</span>
                            </button>

                            <button onclick="pilihKartuGame(3)" id="btnSoal3" class="w-full text-left p-4 bg-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-medium transition-all cursor-pointer shadow-2xs flex items-center justify-between group">
                                <span class="text-slate-700 group-hover:text-slate-900">C. Pernyataan: <strong class="text-slate-900">"Rata-rata nilai ujian matematika kelas adalah 77,5"</strong>.</span>
                                <span id="badgeSoal3" class="text-[11px] px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 font-semibold border border-slate-200 shrink-0 ml-2">Belum Dijawab</span>
                            </button>

                            <button onclick="pilihKartuGame(4)" id="btnSoal4" class="w-full text-left p-4 bg-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-medium transition-all cursor-pointer shadow-2xs flex items-center justify-between group">
                                <span class="text-slate-700 group-hover:text-slate-900">D. File Excel <strong class="text-slate-900">Data_Siswa.xlsx</strong> berisi 5 kolom atribut dan 30 baris data.</span>
                                <span id="badgeSoal4" class="text-[11px] px-2.5 py-1 rounded-md bg-slate-100 text-slate-600 font-semibold border border-slate-200 shrink-0 ml-2">Belum Dijawab</span>
                            </button>
                        </div>

                        <!-- Kolom Kanan: Pilihan Kategori Kunci -->
                        <div class="md:col-span-6 space-y-3">
                            <h5 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">2. Pasangkan ke Kategori:</h5>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <button onclick="jawabKategori('datum')" class="p-4 bg-white hover:bg-[#0066cc] hover:text-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-bold transition-all text-center cursor-pointer shadow-2xs flex flex-col items-center justify-center gap-1 group text-slate-800">
                                    <span class="text-xl mb-0.5">📌</span>
                                    <span class="group-hover:text-white">Datum</span>
                                    <span class="text-[10px] font-normal text-slate-500 group-hover:text-blue-100">(Elemen Tunggal)</span>
                                </button>

                                <button onclick="jawabKategori('data')" class="p-4 bg-white hover:bg-[#0066cc] hover:text-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-bold transition-all text-center cursor-pointer shadow-2xs flex flex-col items-center justify-center gap-1 group text-slate-800">
                                    <span class="text-xl mb-0.5">📊</span>
                                    <span class="group-hover:text-white">Data</span>
                                    <span class="text-[10px] font-normal text-slate-500 group-hover:text-blue-100">(Kumpulan Mentah)</span>
                                </button>

                                <button onclick="jawabKategori('informasi')" class="p-4 bg-white hover:bg-[#0066cc] hover:text-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-bold transition-all text-center cursor-pointer shadow-2xs flex flex-col items-center justify-center gap-1 group text-slate-800">
                                    <span class="text-xl mb-0.5">💡</span>
                                    <span class="group-hover:text-white">Informasi</span>
                                    <span class="text-[10px] font-normal text-slate-500 group-hover:text-blue-100">(Sudah Diberi Konteks)</span>
                                </button>

                                <button onclick="jawabKategori('dataset')" class="p-4 bg-white hover:bg-[#0066cc] hover:text-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-bold transition-all text-center cursor-pointer shadow-2xs flex flex-col items-center justify-center gap-1 group text-slate-800">
                                    <span class="text-xl mb-0.5">🗄️</span>
                                    <span class="group-hover:text-white">Dataset</span>
                                    <span class="text-[10px] font-normal text-slate-500 group-hover:text-blue-100">(Tabel Terstruktur)</span>
                                </button>
                            </div>

                            <!-- Feedback Box -->
                            <div id="boxFeedbackGame" class="mt-4 p-4 rounded-xl text-xs font-medium bg-slate-100 text-slate-700 border border-slate-200 min-h-[72px] flex items-center justify-center text-center shadow-2xs transition-all">
                                👈 Klik salah satu Bukti Kasus di sebelah kiri terlebih dahulu!
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SCRIPT JAVASCRIPT GAME -->
                <script>
                    let soalAktif = null;
                    let statusJawaban = { 1: false, 2: false, 3: false, 4: false };
                    const kunciJawaban = {
                        1: 'datum',
                        2: 'data',
                        3: 'informasi',
                        4: 'dataset'
                    };

                    function pilihKartuGame(id) {
                        soalAktif = id;
                        for (let i = 1; i <= 4; i++) {
                            let btn = document.getElementById('btnSoal' + i);
                            if (btn) {
                                if (i === id) {
                                    btn.className = 'w-full text-left p-4 bg-blue-50/80 border-2 border-[#0066cc] rounded-xl text-xs font-medium transition-all cursor-pointer shadow-xs flex items-center justify-between group';
                                } else {
                                    btn.className = 'w-full text-left p-4 bg-white border border-slate-200 hover:border-[#0066cc] rounded-xl text-xs font-medium transition-all cursor-pointer shadow-2xs flex items-center justify-between group';
                                }
                            }
                        }
                        let box = document.getElementById('boxFeedbackGame');
                        box.className = "mt-4 p-4 rounded-xl text-xs font-medium bg-blue-50 text-blue-900 border border-blue-200 text-center shadow-2xs";
                        box.innerHTML = `Bukti Kasus <strong>${String.fromCharCode(64 + id)}</strong> dipilih. Sekarang klik kategori di atas yang sesuai!`;
                    }

                    function jawabKategori(kategoriInput) {
                        let box = document.getElementById('boxFeedbackGame');
                        if (!soalAktif) {
                            box.className = "mt-4 p-4 rounded-xl text-xs font-medium bg-amber-50 text-amber-900 border border-amber-200 text-center shadow-2xs";
                            box.innerHTML = "⚠️ Pilih Bukti Kasus (A, B, C, atau D) di sebelah kiri dulu!";
                            return;
                        }

                        let badge = document.getElementById('badgeSoal' + soalAktif);
                        if (kategoriInput === kunciJawaban[soalAktif]) {
                            statusJawaban[soalAktif] = true;
                            badge.className = "text-[11px] px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-800 font-bold border border-emerald-300";
                            badge.innerText = "✅ Benar!";
                            
                            box.className = "mt-4 p-4 rounded-xl text-xs font-medium bg-emerald-50 text-emerald-900 border border-emerald-200 text-center shadow-2xs";
                            box.innerHTML = `🎯 <strong>Tepat Sekali!</strong> Bukti Kasus ${String.fromCharCode(64 + soalAktif)} adalah contoh dari <strong>${kategoriInput.toUpperCase()}</strong>.`;
                        } else {
                            statusJawaban[soalAktif] = false;
                            badge.className = "text-[11px] px-2.5 py-1 rounded-md bg-rose-100 text-rose-800 font-bold border border-rose-300";
                            badge.innerText = "❌ Coba Lagi";

                            box.className = "mt-4 p-4 rounded-xl text-xs font-medium bg-rose-50 text-rose-900 border border-rose-200 text-center shadow-2xs";
                            box.innerHTML = `❌ <strong>Kurang Tepat!</strong> Coba baca kembali definisi ${kategoriInput} dan pilih kategori lain untuk Bukti ${String.fromCharCode(64 + soalAktif)}.`;
                        }

                        let totalSkor = Object.values(statusJawaban).filter(v => v === true).length;
                        let valSkor = document.getElementById('valSkor');
                        if (valSkor) valSkor.innerText = totalSkor;

                        if (totalSkor === 4) {
                            box.className = "mt-4 p-4 rounded-xl text-xs font-semibold bg-emerald-600 text-white border border-emerald-700 text-center shadow-md";
                            box.innerHTML = "🎉 <strong>LUAR BIASA!</strong> Kamu berhasil memecahkan semua bukti kasus! Kamu siap lanjut ke Seksi 2!";
                        }
                    }
                </script>

                <!-- SEKSI 2: Mengklasifikasikan Bentuk-Bentuk Data -->
                <div class="mt-20">
                    <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        2. Mengklasifikasikan Bentuk-Bentuk Data
                    </h3>

                    <!-- Sub 2.1: Klasifikasi Berdasarkan Sifat -->
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">2.1 Klasifikasi Berdasarkan Sifat Data (Kategorikal vs Numerikal)</h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between mb-3">
                                            <h5 class="text-xl font-bold text-[#1d1d1f]">Data Kategorikal / Kualitatif</h5>
                                            <span class="bg-[#0066cc]/10 text-[#0066cc] text-xs font-semibold px-2.5 py-1 rounded-full">Non-Numerik</span>
                                        </div>
                                        <p class="text-sm text-[#333333] leading-relaxed mb-4">
                                            Data non-numerik berupa kata-kata, label, atau kategori yang menggambarkan karakteristik/kualitas objek. Data ini tidak dapat dioperasikan secara matematika.
                                        </p>
                                        <p class="text-xs font-medium text-[#7a7a7a] mb-2">Contoh: Jenis kelamin, agama, warna mata, jenis pekerjaan, hobi.</p>
                                    </div>

                                    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg mt-4">
                                        <h6 class="text-xs font-bold text-amber-900 mb-1">Pengecualian Penting Informatika:</h6>
                                        <p class="text-xs text-amber-800 leading-relaxed">
                                            Terdapat angka yang <strong>tetap dikategorikan sebagai Data Kategorikal</strong>, seperti nomor absen ("05") atau kode pos. Angka ini hanya berfungsi sebagai label dan tidak untuk dijumlahkan.
                                        </p>
                                    </div>
                                </div>

                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0] flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center justify-between mb-3">
                                            <h5 class="text-xl font-bold text-[#1d1d1f]">Data Numerikal / Kuantitatif</h5>
                                            <span class="bg-emerald-500/10 text-emerald-600 text-xs font-semibold px-2.5 py-1 rounded-full">Nilai Angka</span>
                                        </div>
                                        <p class="text-sm text-[#333333] leading-relaxed mb-4">
                                            Data yang dinyatakan dalam bentuk angka dari hasil perhitungan (pencacahan) atau pengukuran.
                                        </p>

                                        <div class="space-y-3 mt-4">
                                            <div class="bg-white p-3 rounded-lg border border-[#e0e0e0]">
                                                <h6 class="text-sm font-semibold text-[#1d1d1f]">1. Data Diskrit (Cacahan)</h6>
                                                <p class="text-xs text-[#7a7a7a]">Bilangan bulat hasil menghitung. Contoh: Jumlah siswa, jumlah gol, jumlah followers.</p>
                                            </div>
                                            <div class="bg-white p-3 rounded-lg border border-[#e0e0e0]">
                                                <h6 class="text-sm font-semibold text-[#1d1d1f]">2. Data Kontinu (Ukuran)</h6>
                                                <p class="text-xs text-[#7a7a7a]">Bilangan desimal dari hasil mengukur. Contoh: Tinggi badan (cm), suhu (°C), jarak (km).</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sub 2.2: Skala Pengukuran -->
                        <div class="mt-10">
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">2.2 Klasifikasi Berdasarkan Skala Pengukuran</h4>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="bg-[#f5f5f7] p-5 rounded-xl border border-[#e0e0e0]">
                                    <span class="text-xs font-bold text-[#0066cc]">SKALA 1</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Nominal</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Kategori murni tanpa tingkatan. <br><em>Contoh: Jenis kelamin, Agama, Suku.</em></p>
                                </div>
                                <div class="bg-[#f5f5f7] p-5 rounded-xl border border-[#e0e0e0]">
                                    <span class="text-xs font-bold text-[#0066cc]">SKALA 2</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Ordinal</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Kategori berjenjang/peringkat. <br><em>Contoh: SD < SMP < SMA, Juara 1, 2, 3.</em></p>
                                </div>
                                <div class="bg-[#f5f5f7] p-5 rounded-xl border border-[#e0e0e0]">
                                    <span class="text-xs font-bold text-[#0066cc]">SKALA 3</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Interval</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Angka dengan jarak sama, <strong>tanpa nol mutlak</strong>. <br><em>Contoh: Suhu (°C), Tahun kalender.</em></p>
                                </div>
                                <div class="bg-[#f5f5f7] p-5 rounded-xl border border-[#e0e0e0]">
                                    <span class="text-xs font-bold text-[#0066cc]">SKALA 4</span>
                                    <h5 class="text-lg font-bold text-[#1d1d1f] my-1">Rasio</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Angka dengan jarak sama & <strong>nol mutlak</strong>. <br><em>Contoh: Berat badan, Saldo, Nilai ujian.</em></p>
                                </div>
                            </div>
                        </div>

                        <!-- Sub 2.3: Bentuk dan Struktur Digital -->
                        <div class="mt-10">
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">2.3 Klasifikasi Berdasarkan Bentuk dan Struktur Digital</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="text-lg font-bold text-[#1d1d1f] mb-2">Terstruktur (Structured)</h5>
                                    <p class="text-sm text-[#333333] leading-relaxed mb-3">Format baku tabel berbaris & berkolom.</p>
                                    <span class="text-xs font-mono text-[#0066cc] bg-white px-2 py-1 rounded border border-[#e0e0e0] block">Contoh: File Excel .xlsx, Database SQL</span>
                                </div>
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="text-lg font-bold text-[#1d1d1f] mb-2">Semi-Terstruktur</h5>
                                    <p class="text-sm text-[#333333] leading-relaxed mb-3">Memiliki penanda (tag/label) terorganisir.</p>
                                    <span class="text-xs font-mono text-[#0066cc] bg-white px-2 py-1 rounded border border-[#e0e0e0] block">Contoh: File XML, JSON, Log Call Center</span>
                                </div>
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="text-lg font-bold text-[#1d1d1f] mb-2">Tidak Terstruktur</h5>
                                    <p class="text-sm text-[#333333] leading-relaxed mb-3">Data tanpa format struktur baku baris-kolom.</p>
                                    <span class="text-xs font-mono text-[#0066cc] bg-white px-2 py-1 rounded border border-[#e0e0e0] block">Contoh: Foto selfie, Video TikTok, Voice Note</span>
                                </div>
                            </div>
                        </div>

                        <!-- WIDGET INTERAKTIF 1: LAB KLASIFIKASI DATA INSTAN -->
                        <!-- WIDGET INTERAKTIF: SORTIR DATA (gaya kartu warna-warni, seret ke kategori) -->
                        <style>
                            #gsGame { --gs-ink: #1d1d1f; font-family: inherit; }
                            .gs-frame {
                                border-radius: 1.5rem;
                                padding: clamp(1rem, 3vw, 2rem);
                                background:
                                    linear-gradient(45deg, rgba(255,255,255,.10) 25%, transparent 25%, transparent 75%, rgba(255,255,255,.10) 75%) 0 0 / 90px 90px,
                                    linear-gradient(45deg, rgba(255,255,255,.10) 25%, transparent 25%, transparent 75%, rgba(255,255,255,.10) 75%) 45px 45px / 90px 90px,
                                    linear-gradient(160deg, #ffc233 0%, #ff9a1f 45%, #f26a1b 100%);
                                box-shadow: 0 10px 30px rgba(242,106,27,.35), inset 0 0 0 3px rgba(255,255,255,.35);
                            }
                            .gs-title { color: #fff; font-weight: 800; font-size: 1.25rem; text-shadow: 0 2px 0 rgba(150,60,0,.35); }
                            .gs-sub { color: #fff7e6; font-size: .8rem; margin-top: .15rem; }

                            .gs-pool {
                                margin-top: 1rem; padding: .8rem; min-height: 4.2rem;
                                display: flex; flex-wrap: wrap; gap: .6rem; justify-content: center; align-items: center;
                                background: #fff8ea; border: 3px solid #ffd27a; border-radius: 1rem;
                                box-shadow: inset 0 2px 6px rgba(150,80,0,.15);
                                transition: background .2s;
                            }
                            .gs-pool.gs-over { background: #fff1cc; }
                            .gs-pool:empty::after { content: "Semua kartu sudah ditempatkan. Tekan Periksa jawaban!"; color: #b86a00; font-size: .8rem; font-weight: 600; }

                            .gs-tile {
                                min-height: 2.75rem; padding: .55rem 1rem; border: 0; border-radius: .7rem;
                                color: #fff; font-weight: 800; font-size: .8rem; letter-spacing: .02em; text-transform: uppercase;
                                cursor: grab; user-select: none; text-align: center; line-height: 1.15;
                                box-shadow: 0 4px 0 rgba(0,0,0,.28), 0 6px 10px rgba(0,0,0,.18);
                                transition: transform .12s, box-shadow .12s, outline-color .12s;
                                outline: 3px solid transparent; outline-offset: 2px;
                            }
                            .gs-tile:hover { transform: translateY(-2px); }
                            .gs-tile:active { cursor: grabbing; transform: translateY(2px); box-shadow: 0 1px 0 rgba(0,0,0,.28); }
                            .gs-tile:focus-visible { outline-color: #fff; }
                            .gs-tile.gs-sel { outline-color: #fff; transform: translateY(-3px) scale(1.04); }
                            .gs-tile.gs-drag { opacity: .45; }
                            .gs-slot .gs-tile { width: 100%; height: 100%; }

                            .gs-zones { display: grid; grid-template-columns: 1fr; gap: 1.25rem; margin-top: 1.5rem; }
                            @media (min-width: 768px) { .gs-zones { grid-template-columns: 1fr 1fr; gap: 1.5rem; } }
                            .gs-zone { background: rgba(255,255,255,.18); border-radius: 1.1rem; padding: 1rem; }
                            .gs-zone h5 { text-align: center; font-weight: 800; font-size: 1.1rem; letter-spacing: .03em; color: #fff; text-shadow: 0 2px 0 rgba(150,60,0,.35); margin-bottom: .2rem; }
                            .gs-zone p { text-align: center; font-size: .7rem; color: #fff7e6; margin-bottom: .75rem; }

                            .gs-slots { display: grid; grid-template-columns: 1fr 1fr; gap: .6rem; }
                            .gs-slots .gs-slot:last-child { grid-column: 1 / -1; width: calc(50% - .3rem); justify-self: center; }
                            .gs-slot {
                                min-height: 2.9rem; border-radius: .7rem; background: rgba(255,226,170,.75);
                                border: 2px dashed rgba(184,106,0,.45); display: flex; align-items: stretch;
                                transition: background .15s, border-color .15s, transform .15s;
                            }
                            .gs-slot.gs-over { background: #fff3d6; border-color: #fff; transform: scale(1.04); }
                            .gs-slot.gs-full { border-color: transparent; background: transparent; }

                            .gs-tile.gs-ok { outline-color: #b7f5c4; box-shadow: 0 4px 0 #1b7a36, 0 0 0 4px #37d067; }
                            .gs-tile.gs-ok::after { content: " ✓"; }
                            .gs-tile.gs-bad { outline-color: #ffc9c9; animation: gs-shake .4s; box-shadow: 0 4px 0 #8f1d1d, 0 0 0 4px #ff4d4d; }
                            .gs-tile.gs-bad::after { content: " ✗"; }
                            @keyframes gs-shake { 25% { transform: translateX(-4px); } 75% { transform: translateX(4px); } }

                            .gs-bar { display: flex; flex-wrap: wrap; gap: .6rem; justify-content: center; margin-top: 1.25rem; }
                            .gs-btn {
                                padding: .7rem 1.4rem; border: 0; border-radius: .8rem; font-weight: 800; font-size: .85rem; cursor: pointer;
                                box-shadow: 0 4px 0 rgba(0,0,0,.25); transition: transform .12s, box-shadow .12s;
                            }
                            .gs-btn:active { transform: translateY(3px); box-shadow: 0 1px 0 rgba(0,0,0,.25); }
                            .gs-btn:focus-visible { outline: 3px solid #fff; outline-offset: 2px; }
                            .gs-btn-main { background: #0066cc; color: #fff; }
                            .gs-btn-ghost { background: #fff; color: #b84a00; }

                            .gs-result { margin-top: 1rem; background: #fff; border-radius: 1rem; padding: 1rem 1.2rem; color: #1d1d1f; font-size: .85rem; line-height: 1.5; box-shadow: 0 4px 0 rgba(0,0,0,.12); }
                            .gs-result strong.gs-head { display: block; font-size: 1rem; margin-bottom: .35rem; }
                            .gs-result ul { margin: .4rem 0 0; padding-left: 1.1rem; list-style: disc; font-size: .78rem; color: #333; }
                            .gs-result li { margin-bottom: .25rem; }
                            @media (prefers-reduced-motion: reduce) { .gs-tile, .gs-slot, .gs-btn { transition: none; animation: none !important; } }
                        </style>

                        <div id="gsGame" class="mt-12">
                            <div class="gs-frame">
                                <h4 class="gs-title">Sortir Data: Kategorikal atau Numerikal?</h4>
                                <p class="gs-sub">Seret setiap kartu ke kotak yang tepat. Di ponsel: ketuk kartu, lalu ketuk kotak kosongnya.</p>

                                <div id="gsPool" class="gs-pool" aria-label="Kartu data"></div>

                                <div class="gs-zones">
                                    <div class="gs-zone">
                                        <h5>KATEGORIKAL</h5>
                                        <p>Label atau kategori, tidak untuk dihitung</p>
                                        <div class="gs-slots" data-cat="kat"></div>
                                    </div>
                                    <div class="gs-zone">
                                        <h5>NUMERIKAL</h5>
                                        <p>Angka hasil menghitung atau mengukur</p>
                                        <div class="gs-slots" data-cat="num"></div>
                                    </div>
                                </div>

                                <div class="gs-bar">
                                    <button id="gsCheck" class="gs-btn gs-btn-main">Periksa jawaban</button>
                                    <button id="gsReset" class="gs-btn gs-btn-ghost">Acak ulang</button>
                                </div>

                                <div id="gsResult" class="gs-result" style="display:none" aria-live="polite"></div>
                            </div>
                        </div>

                        <script>
                        (function () {
                            var ITEMS = [
                                { t: 'Nomor absen "05"', c: 'kat', w: 'Angka ini hanya label dan tidak untuk dijumlahkan.' },
                                { t: 'Kode pos', c: 'kat', w: 'Berupa angka, tetapi fungsinya hanya penanda wilayah.' },
                                { t: 'Jenis kelamin', c: 'kat', w: 'Kategori berupa kata atau label.' },
                                { t: 'Warna mata', c: 'kat', w: 'Menggambarkan kualitas, bukan jumlah.' },
                                { t: 'Nomor HP', c: 'kat', w: 'Identitas, bukan nilai yang bisa dioperasikan secara matematika.' },
                                { t: 'Jumlah followers', c: 'num', w: 'Hasil menghitung, jadi numerikal diskrit.' },
                                { t: 'Tinggi badan', c: 'num', w: 'Hasil mengukur, jadi numerikal kontinu.' },
                                { t: 'Suhu tubuh', c: 'num', w: 'Hasil mengukur dalam °C, jadi numerikal kontinu.' },
                                { t: 'Jumlah gol', c: 'num', w: 'Hasil menghitung, jadi numerikal diskrit.' },
                                { t: 'Jarak rumah (km)', c: 'num', w: 'Hasil mengukur, jadi numerikal kontinu.' }
                            ];
                            var COLORS = ['#2f9e44', '#7048e8', '#e03131', '#1c7ed6', '#8d5524', '#1b3a6b', '#d6336c', '#0c8599'];
                            var $ = function (id) { return document.getElementById(id); };
                            var pool = $('gsPool'), result = $('gsResult');
                            var slotsKat = document.querySelector('#gsGame [data-cat="kat"]');
                            var slotsNum = document.querySelector('#gsGame [data-cat="num"]');
                            var selected = null, dragging = null;

                            function shuffle(a) {
                                a = a.slice();
                                for (var i = a.length - 1; i > 0; i--) {
                                    var j = Math.floor(Math.random() * (i + 1)), t = a[i]; a[i] = a[j]; a[j] = t;
                                }
                                return a;
                            }
                            function makeSlots(box) {
                                box.innerHTML = '';
                                for (var i = 0; i < 5; i++) {
                                    var s = document.createElement('div');
                                    s.className = 'gs-slot';
                                    bindSlot(s);
                                    box.appendChild(s);
                                }
                            }
                            function clearMarks(tile) { tile.classList.remove('gs-ok', 'gs-bad'); }
                            function refreshSlot(s) { s.classList.toggle('gs-full', !!s.firstElementChild); }

                            function toPool(tile) {
                                var old = tile.parentElement;
                                clearMarks(tile);
                                pool.appendChild(tile);
                                if (old && old.classList.contains('gs-slot')) refreshSlot(old);
                            }
                            function place(tile, slot) {
                                if (slot.firstElementChild && slot.firstElementChild !== tile) toPool(slot.firstElementChild);
                                var old = tile.parentElement;
                                clearMarks(tile);
                                slot.appendChild(tile);
                                refreshSlot(slot);
                                if (old && old.classList.contains('gs-slot')) refreshSlot(old);
                                unselect();
                                result.style.display = 'none';
                            }
                            function unselect() {
                                if (selected) selected.classList.remove('gs-sel');
                                selected = null;
                            }

                            function bindSlot(s) {
                                s.addEventListener('dragover', function (e) { e.preventDefault(); s.classList.add('gs-over'); });
                                s.addEventListener('dragleave', function () { s.classList.remove('gs-over'); });
                                s.addEventListener('drop', function (e) {
                                    e.preventDefault(); s.classList.remove('gs-over');
                                    if (dragging) place(dragging, s);
                                });
                                s.addEventListener('click', function (e) {
                                    if (e.target !== s) return;
                                    if (selected) place(selected, s);
                                });
                            }
                            pool.addEventListener('dragover', function (e) { e.preventDefault(); pool.classList.add('gs-over'); });
                            pool.addEventListener('dragleave', function () { pool.classList.remove('gs-over'); });
                            pool.addEventListener('drop', function (e) {
                                e.preventDefault(); pool.classList.remove('gs-over');
                                if (dragging) { toPool(dragging); result.style.display = 'none'; }
                            });

                            function makeTile(item, i) {
                                var b = document.createElement('button');
                                b.type = 'button';
                                b.className = 'gs-tile';
                                b.draggable = true;
                                b.textContent = item.t;
                                b.style.background = COLORS[i % COLORS.length];
                                b._item = item;
                                b.addEventListener('dragstart', function (e) {
                                    dragging = b; b.classList.add('gs-drag');
                                    e.dataTransfer.setData('text/plain', item.t);
                                    e.dataTransfer.effectAllowed = 'move';
                                });
                                b.addEventListener('dragend', function () { b.classList.remove('gs-drag'); dragging = null; });
                                b.addEventListener('click', function () {
                                    if (b.parentElement !== pool) { toPool(b); result.style.display = 'none'; return; }
                                    if (selected === b) { unselect(); return; }
                                    unselect(); selected = b; b.classList.add('gs-sel');
                                });
                                return b;
                            }

                            function start() {
                                unselect();
                                result.style.display = 'none';
                                pool.innerHTML = '';
                                makeSlots(slotsKat); makeSlots(slotsNum);
                                shuffle(ITEMS).forEach(function (it, i) { pool.appendChild(makeTile(it, i)); });
                            }

                            function check() {
                                var left = pool.querySelectorAll('.gs-tile').length;
                                if (left > 0) {
                                    result.innerHTML = '<strong class="gs-head">Belum selesai</strong>Masih ada ' + left + ' kartu yang belum ditempatkan.';
                                    result.style.display = 'block';
                                    return;
                                }
                                var ok = 0, wrong = [];
                                [[slotsKat, 'kat'], [slotsNum, 'num']].forEach(function (z) {
                                    z[0].querySelectorAll('.gs-tile').forEach(function (t) {
                                        clearMarks(t);
                                        if (t._item.c === z[1]) { ok++; t.classList.add('gs-ok'); }
                                        else { t.classList.add('gs-bad'); wrong.push(t._item); }
                                    });
                                });
                                var html;
                                if (!wrong.length) {
                                    html = '<strong class="gs-head">Sempurna! 10 dari 10 benar 🎉</strong>Kamu sudah paham bedanya data kategorikal dan numerikal, termasuk jebakan angka yang hanya berfungsi sebagai label.';
                                } else {
                                    html = '<strong class="gs-head">' + ok + ' dari ' + ITEMS.length + ' benar</strong>Kartu bertanda ✗ salah tempat. Ketuk kartunya untuk memindahkan, lalu periksa lagi.<ul>';
                                    wrong.forEach(function (w) {
                                        html += '<li><strong>' + w.t + '</strong> masuk ' + (w.c === 'kat' ? 'Kategorikal' : 'Numerikal') + '. ' + w.w + '</li>';
                                    });
                                    html += '</ul>';
                                }
                                result.innerHTML = html;
                                result.style.display = 'block';
                            }

                            $('gsCheck').addEventListener('click', check);
                            $('gsReset').addEventListener('click', start);
                            start();
                        })();
                        </script>

                    </div>
                </div>

                <!-- SEKSI 3: Menganalisis Kesalahan Penafsiran Data -->
                <div class="mt-20">
                    <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        3. Menganalisis Kesalahan Penafsiran Data
                    </h3>

                    <!-- Sub 3.1: Manipulasi Visualisasi -->
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">3.1 Manipulasi dan Visualisasi Data yang Menyesatkan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-bold text-[#1d1d1f] text-lg mb-2">1. Sumbu Y Terpotong (Truncated Axes)</h5>
                                    <p class="text-sm text-[#333333] leading-relaxed mb-3">
                                        Memulai skala sumbu Y dari angka non-nol (bukan 0) pada grafik batang. Hal ini membesar-besarkan perbedaan kecil secara visual sehingga grafik terlihat melonjak drastis secara palsu.
                                    </p>
                                </div>
                                <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-bold text-[#1d1d1f] text-lg mb-2">2. Efek Visual 3D Berlebihan</h5>
                                    <p class="text-sm text-[#333333] leading-relaxed mb-3">
                                        Menggunakan diagram 3D. Sudut pandang memutarbalikkan proporsi visual; potongan depan tampak jauh lebih besar daripada bagian belakang padahal angkanya sama.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- WIDGET INTERAKTIF 2: SLIDER BASELINE SUMBU Y -->
                        <div class="bg-white border-2 border-red-200 rounded-2xl p-6 md:p-8 shadow-sm">
                            <div class="mb-5 pb-4 border-b border-[#e0e0e0]">
                                <h4 class="text-lg font-bold text-[#1d1d1f]">Lab Interaktif 2: Eksperimen Grafik Menyesatkan</h4>
                                <p class="text-xs text-[#7a7a7a]">Data nilai kuis: Kuis 1 (88 poin) vs Kuis 2 (92 poin). Geser slider untuk mengubah awal sumbu Y dan lihat apa yang terjadi pada grafik.</p>
                            </div>

                            <!-- Kontrol slider -->
                            <div class="mb-5">
                                <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                                    <label for="sbRange" class="text-xs font-semibold text-[#1d1d1f]">Awal sumbu Y: <span id="sbVal" class="text-[#0066cc] text-sm">0</span></label>
                                    <div class="flex gap-2">
                                        <button id="sbPreset0" class="px-3 py-1.5 bg-[#0066cc] text-white text-xs font-semibold rounded-lg cursor-pointer transition-all">Mulai 0 (jujur)</button>
                                        <button id="sbPreset85" class="px-3 py-1.5 bg-[#e0e0e0] text-[#333333] text-xs font-semibold rounded-lg cursor-pointer transition-all">Mulai 85 (menyesatkan)</button>
                                    </div>
                                </div>
                                <input id="sbRange" type="range" min="0" max="87" step="1" value="0" class="w-full cursor-pointer accent-[#0066cc]">
                            </div>

                            <!-- Grafik -->
                            <div class="flex gap-3">
                                <div id="sbAxis" class="w-10 h-[220px] flex flex-col justify-between text-right text-[10px] font-semibold text-[#7a7a7a]"></div>
                                <div class="relative flex-1 h-[220px] bg-[#f5f5f7] rounded-xl border border-[#e0e0e0] overflow-hidden">
                                    <div class="absolute inset-0 grid grid-cols-2 gap-8 px-6">
                                        <div class="relative h-full">
                                            <span id="sbLabel1" class="absolute left-1/2 -translate-x-1/2 text-xs font-bold text-[#1d1d1f] whitespace-nowrap transition-all duration-300">88</span>
                                            <div id="sbBar1" class="absolute bottom-0 left-1/2 -translate-x-1/2 w-20 max-w-full bg-blue-500 rounded-t-lg transition-all duration-300"></div>
                                        </div>
                                        <div class="relative h-full">
                                            <span id="sbLabel2" class="absolute left-1/2 -translate-x-1/2 text-xs font-bold text-[#1d1d1f] whitespace-nowrap transition-all duration-300">92</span>
                                            <div id="sbBar2" class="absolute bottom-0 left-1/2 -translate-x-1/2 w-20 max-w-full bg-emerald-500 rounded-t-lg transition-all duration-300"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 mt-2">
                                <div class="w-10"></div>
                                <div class="flex-1 grid grid-cols-2 gap-8 px-6 text-center text-xs font-semibold text-[#7a7a7a]">
                                    <span>Kuis 1</span><span>Kuis 2</span>
                                </div>
                            </div>

                            <!-- Indikator -->
                            <div class="grid grid-cols-2 gap-3 mt-5">
                                <div class="bg-[#f5f5f7] border border-[#e0e0e0] rounded-xl p-3 text-center">
                                    <p class="text-[10px] font-semibold text-[#7a7a7a] uppercase tracking-wide">Kenaikan nilai sebenarnya</p>
                                    <p id="sbReal" class="text-xl font-bold text-emerald-600">4,5%</p>
                                </div>
                                <div class="bg-[#f5f5f7] border border-[#e0e0e0] rounded-xl p-3 text-center">
                                    <p class="text-[10px] font-semibold text-[#7a7a7a] uppercase tracking-wide">Kenaikan yang tampak di grafik</p>
                                    <p id="sbApparent" class="text-xl font-bold text-emerald-600">4,5%</p>
                                </div>
                            </div>

                            <p id="sbInfo" class="text-xs text-[#333333] mt-4 bg-blue-50 p-3 rounded-lg border border-blue-200 leading-relaxed"></p>
                        </div>

                        <!-- Sub 3.2: Kesalahan Logika -->
                        <div class="mt-8">
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">3.2 Kesalahan Logika: Korelasi vs Sebab-Akibat (Correlation vs Causation)</h4>
                            <div class="bg-[#f5f5f7] border-l-4 border-[#0066cc] p-6 rounded-r-xl">
                                <h5 class="font-bold text-[#1d1d1f] mb-2">Korelasi ≠ Sebab-Akibat</h5>
                                <p class="text-[#333333] leading-relaxed mb-3 text-sm">
                                    Adanya pola korelasi antara dua variabel tidak otomatis membuktikan bahwa variabel satu menyebabkan variabel lainnya (<em>causation</em>).
                                </p>
                                <p class="text-xs text-[#7a7a7a] bg-white p-3 rounded border border-[#e0e0e0]">
                                    <strong>Contoh Logika Terbalik:</strong> Mengaitkan pengguna HP dan penyakit kanker dengan kesimpulan konyol bahwa "kanker otak yang menyebabkan seseorang membeli HP", padahal yang diuji adalah sebaliknya.
                                </p>
                            </div>

                            <!-- WIDGET INTERAKTIF 3: DETEKTIF KORELASI -->
                            <div class="mt-6 bg-white border-2 border-[#0066cc]/30 rounded-2xl p-6 md:p-8 shadow-sm">
                                <div class="flex flex-wrap items-start justify-between gap-3 mb-4 pb-4 border-b border-[#e0e0e0]">
                                    <div>
                                        <h4 class="text-lg font-bold text-[#1d1d1f]">Lab Interaktif 3: Detektif Korelasi</h4>
                                        <p class="text-xs text-[#7a7a7a]">Dua grafik bergerak searah. Apa penjelasan yang paling masuk akal?</p>
                                    </div>
                                    <div class="text-xs font-semibold text-[#1d1d1f] bg-[#f5f5f7] border border-[#e0e0e0] rounded-lg px-3 py-1.5">
                                        Kasus <span id="krNo">1</span>/<span id="krTotal">4</span> &nbsp;|&nbsp; Skor <span id="krScore">0</span>
                                    </div>
                                </div>

                                <div id="krPlay">
                                    <p id="krTitle" class="text-sm font-bold text-[#1d1d1f] mb-2"></p>
                                    <div class="bg-[#f5f5f7] border border-[#e0e0e0] rounded-xl p-3">
                                        <svg id="krChart" viewBox="0 0 300 100" class="w-full h-36" role="img" aria-label="Grafik dua variabel"></svg>
                                        <div class="flex flex-wrap gap-4 text-[11px] font-semibold mt-1">
                                            <span class="text-[#0066cc]">&#9632; <span id="krLegA"></span></span>
                                            <span class="text-orange-500">&#9632; <span id="krLegB"></span></span>
                                        </div>
                                    </div>
                                    <p class="text-xs font-semibold text-[#333333] mt-4 mb-2">Penjelasan manakah yang paling tepat?</p>
                                    <div id="krOptions" class="grid grid-cols-1 sm:grid-cols-2 gap-2"></div>
                                    <div id="krFeedback" class="hidden mt-4 p-4 rounded-xl border-l-4 text-xs leading-relaxed" aria-live="polite">
                                        <p id="krVerdict" class="font-bold text-sm mb-1"></p>
                                        <p id="krExplain"></p>
                                        <button id="krNext" class="mt-3 px-4 py-2 bg-[#0066cc] text-white text-xs font-semibold rounded-lg cursor-pointer">Lanjut</button>
                                    </div>
                                </div>

                                <div id="krEnd" class="hidden bg-[#1c1c1e] text-white rounded-xl p-6 text-center">
                                    <p id="krEndTitle" class="text-lg font-bold mb-1"></p>
                                    <p id="krEndText" class="text-xs text-white/70 mb-4"></p>
                                    <button id="krAgain" class="px-5 py-2.5 bg-[#0066cc] text-white text-xs font-semibold rounded-lg cursor-pointer">Main lagi</button>
                                </div>
                            </div>
                        </div>

                        <!-- Sub 3.3: Kualitas Data Rendah -->
                        <div class="mt-8">
                            <h4 class="text-2xl font-semibold text-[#0066cc] mb-4">3.3 Kualitas Data Rendah & Prinsip GIGO</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-bold text-[#1d1d1f] text-base mb-2">Garbage In, Garbage Out (GIGO)</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Jika data masukan ke model AI berkualitas buruk (kotor/typo/kosong), maka hasil prediksi dipastikan salah total.</p>
                                </div>
                                <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-bold text-[#1d1d1f] text-base mb-2">Bias Pengumpulan Data</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Pengumpulan data memihak kelompok tertentu sehingga kesimpulan analisis tidak representative.</p>
                                </div>
                                <div class="bg-[#fafafc] p-5 rounded-xl border border-[#e0e0e0]">
                                    <h5 class="font-bold text-[#1d1d1f] text-base mb-2">Sampel Tidak Mencukupi</h5>
                                    <p class="text-xs text-[#333333] leading-relaxed">Memprediksi populasi 278+ juta jiwa hanya berdasarkan wawancara beberapa orang saja.</p>
                                </div>
                            </div>

                            <!-- WIDGET INTERAKTIF 4: PEMBERSIH DATA (GIGO) -->
                            <div class="mt-6 bg-white border-2 border-amber-300 rounded-2xl p-6 md:p-8 shadow-sm">
                                <div class="mb-4 pb-4 border-b border-[#e0e0e0]">
                                    <h4 class="text-lg font-bold text-[#1d1d1f]">Lab Interaktif 4: Pembersih Data (Efek GIGO)</h4>
                                    <p class="text-xs text-[#7a7a7a]">Tabel nilai ujian ini kotor. Klik baris yang bermasalah (ada 4 masalah), lalu tekan tombol bersihkan dan bandingkan rata-ratanya.</p>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="w-full text-xs border border-[#e0e0e0] rounded-lg overflow-hidden">
                                        <thead class="bg-[#f5f5f7] text-[#1d1d1f]">
                                            <tr>
                                                <th class="text-left p-2 w-10">No</th>
                                                <th class="text-left p-2">Nama</th>
                                                <th class="text-left p-2">Nilai</th>
                                                <th class="text-left p-2">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pdBody"></tbody>
                                    </table>
                                </div>

                                <div class="grid grid-cols-2 gap-3 mt-4">
                                    <div class="bg-red-50 border border-red-200 rounded-xl p-3 text-center">
                                        <p class="text-[10px] font-semibold text-red-700 uppercase tracking-wide">Rata-rata data kotor</p>
                                        <p id="pdDirty" class="text-xl font-bold text-red-600">-</p>
                                    </div>
                                    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-3 text-center">
                                        <p class="text-[10px] font-semibold text-emerald-700 uppercase tracking-wide">Rata-rata setelah dibersihkan</p>
                                        <p id="pdClean" class="text-xl font-bold text-emerald-600">?</p>
                                    </div>
                                </div>

                                <p id="pdMsg" class="text-xs text-[#333333] mt-4 bg-[#f5f5f7] p-3 rounded-lg border border-[#e0e0e0] leading-relaxed" aria-live="polite">
                                    Petunjuk: perhatikan nilai yang tidak masuk akal, sel kosong, penulisan yang aneh, dan baris yang muncul dua kali.
                                </p>

                                <div class="flex flex-wrap gap-2 mt-4">
                                    <button id="pdGo" class="px-4 py-2 bg-[#0066cc] text-white text-xs font-semibold rounded-lg cursor-pointer">Bersihkan & hitung ulang</button>
                                    <button id="pdReset" class="px-4 py-2 bg-[#e0e0e0] text-[#333333] text-xs font-semibold rounded-lg cursor-pointer">Ulangi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SCRIPT INTERAKTIF WIDGET (Lab 2, 3, dan 4) -->
                <script>
                (function () {
                    var $ = function (id) { return document.getElementById(id); };
                    var fmt = function (n, d) { return n.toLocaleString('id-ID', { minimumFractionDigits: d, maximumFractionDigits: d }); };

                    /* ===== LAB 2: SLIDER BASELINE SUMBU Y ===== */
                    var V1 = 88, V2 = 92, TOP = 100;
                    var sbRange = $('sbRange');

                    function sbRender() {
                        var base = Number(sbRange.value);
                        var span = TOP - base;
                        var h1 = (V1 - base) / span * 100;
                        var h2 = (V2 - base) / span * 100;

                        $('sbVal').textContent = base;
                        $('sbBar1').style.height = h1 + '%';
                        $('sbBar2').style.height = h2 + '%';
                        $('sbLabel1').style.bottom = 'calc(' + h1 + '% + 4px)';
                        $('sbLabel2').style.bottom = 'calc(' + h2 + '% + 4px)';

                        var axis = '';
                        for (var i = 4; i >= 0; i--) axis += '<span>' + Math.round(base + span * i / 4) + '</span>';
                        $('sbAxis').innerHTML = axis;

                        var real = (V2 - V1) / V1 * 100;
                        var apparent = (V2 - V1) / (V1 - base) * 100;
                        $('sbReal').textContent = fmt(real, 1) + '%';
                        $('sbApparent').textContent = fmt(apparent, 1) + '%';

                        var info = $('sbInfo'), ap = $('sbApparent');
                        var ratio = apparent / real;
                        if (base === 0) {
                            info.className = 'text-xs text-[#333333] mt-4 bg-blue-50 p-3 rounded-lg border border-blue-200 leading-relaxed';
                            info.innerHTML = '<strong>Zero baseline (jujur).</strong> Sumbu Y dimulai dari 0, sehingga tinggi batang sebanding dengan nilainya. Kenaikan yang tampak sama dengan kenaikan sebenarnya.';
                            ap.className = 'text-xl font-bold text-emerald-600';
                        } else if (ratio < 3) {
                            info.className = 'text-xs text-amber-900 mt-4 bg-amber-50 p-3 rounded-lg border border-amber-200 leading-relaxed';
                            info.innerHTML = '<strong>Mulai bergeser.</strong> Sumbu Y dimulai dari ' + base + '. Kenaikan yang tampak sudah ' + fmt(ratio, 1) + ' kali lipat kenyataan. Perhatikan angka di sumbu kiri.';
                            ap.className = 'text-xl font-bold text-amber-600';
                        } else {
                            info.className = 'text-xs text-red-900 mt-4 bg-red-50 p-3 rounded-lg border border-red-200 leading-relaxed';
                            info.innerHTML = '<strong>Menyesatkan!</strong> Sumbu Y dipotong dan dimulai dari ' + base + '. Kuis 2 tampak ' + fmt((V2 - base) / (V1 - base), 1) + ' kali lebih tinggi dari Kuis 1, padahal nilainya hanya naik 4 poin (' + fmt(real, 1) + '%). Grafik membesar-besarkan selisih sebanyak ' + fmt(ratio, 1) + ' kali.';
                            ap.className = 'text-xl font-bold text-red-600';
                        }

                        var on = 'px-3 py-1.5 text-white text-xs font-semibold rounded-lg cursor-pointer transition-all ';
                        var off = 'px-3 py-1.5 bg-[#e0e0e0] text-[#333333] text-xs font-semibold rounded-lg cursor-pointer transition-all';
                        $('sbPreset0').className = base === 0 ? on + 'bg-[#0066cc]' : off;
                        $('sbPreset85').className = base === 85 ? on + 'bg-red-600' : off;
                    }
                    sbRange.addEventListener('input', sbRender);
                    $('sbPreset0').addEventListener('click', function () { sbRange.value = 0; sbRender(); });
                    $('sbPreset85').addEventListener('click', function () { sbRange.value = 85; sbRender(); });
                    sbRender();

                    /* ===== LAB 3: DETEKTIF KORELASI ===== */
                    var OPT = ['Sebab-akibat langsung', 'Faktor tersembunyi (variabel ketiga)', 'Kebetulan semata', 'Arah terbalik'];
                    var CASES = [
                        { t: 'Penjualan es krim naik, kasus orang tenggelam juga naik.', a: 'Penjualan es krim', b: 'Kasus tenggelam', ans: 1,
                          x: 'Es krim tidak membuat orang tenggelam. Cuaca panas membuat orang membeli es krim sekaligus berenang lebih banyak. Cuaca panas adalah faktor tersembunyi yang memengaruhi keduanya.',
                          da: [.1,.15,.3,.45,.7,.9,1,.95,.7,.45,.2,.1], db: [.08,.12,.28,.5,.65,.88,.97,.9,.62,.4,.22,.12] },
                        { t: 'Kota dengan jumlah polisi lebih banyak ternyata punya angka kejahatan lebih tinggi.', a: 'Jumlah polisi', b: 'Angka kejahatan', ans: 3,
                          x: 'Polisi tidak menyebabkan kejahatan. Kota yang rawan kejahatan justru menambah jumlah polisinya. Arah hubungannya terbalik dari dugaan awal.',
                          da: [.2,.28,.35,.45,.52,.6,.68,.75,.82,.88,.95,1], db: [.25,.3,.4,.42,.55,.58,.7,.72,.8,.9,.93,1] },
                        { t: 'Konsumsi keju per orang naik, jumlah orang yang tersangkut seprai tempat tidur juga naik.', a: 'Konsumsi keju', b: 'Kasus tersangkut seprai', ans: 2,
                          x: 'Tidak ada hubungan masuk akal antara keduanya. Jika kamu mencari cukup banyak data, pasti ada pasangan yang kebetulan bergerak searah. Ini disebut korelasi semu (spurious correlation).',
                          da: [.3,.35,.5,.45,.6,.7,.65,.8,.85,.9,.95,1], db: [.25,.4,.45,.5,.55,.72,.7,.78,.88,.86,.97,1] },
                        { t: 'Semakin lama seseorang merokok, semakin besar penurunan kapasitas paru-parunya.', a: 'Lama merokok', b: 'Penurunan kapasitas paru', ans: 0,
                          x: 'Di sini hubungan sebab-akibat memang didukung banyak penelitian dan mekanisme biologis yang jelas. Korelasi saja tidak cukup untuk menyimpulkan sebab-akibat, tetapi jika ada bukti tambahan seperti ini kesimpulan itu bisa dibenarkan.',
                          da: [.1,.2,.28,.4,.5,.55,.68,.75,.8,.88,.93,1], db: [.12,.18,.3,.38,.52,.6,.66,.77,.82,.86,.95,1] }
                    ];
                    var krI = 0, krS = 0, krLock = false;

                    function line(d, color) {
                        var p = d.map(function (v, i) { return (10 + i * 280 / 11).toFixed(1) + ',' + (90 - v * 80).toFixed(1); }).join(' ');
                        return '<polyline points="' + p + '" fill="none" stroke="' + color + '" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round"/>';
                    }
                    function krShow() {
                        var c = CASES[krI];
                        krLock = false;
                        $('krNo').textContent = krI + 1;
                        $('krTotal').textContent = CASES.length;
                        $('krScore').textContent = krS;
                        $('krTitle').textContent = c.t;
                        $('krLegA').textContent = c.a;
                        $('krLegB').textContent = c.b;
                        $('krChart').innerHTML = '<line x1="10" y1="90" x2="290" y2="90" stroke="#d2d2d7" stroke-width="1"/>' + line(c.da, '#0066cc') + line(c.db, '#f97316');
                        var box = $('krOptions');
                        box.innerHTML = '';
                        OPT.forEach(function (o, i) {
                            var b = document.createElement('button');
                            b.type = 'button';
                            b.textContent = o;
                            b.className = 'p-3 bg-white hover:bg-[#0066cc] hover:text-white border border-[#e0e0e0] rounded-xl text-xs font-semibold text-left transition-all cursor-pointer shadow-sm';
                            b.addEventListener('click', function () { krAnswer(i, b); });
                            box.appendChild(b);
                        });
                        $('krFeedback').classList.add('hidden');
                    }
                    function krAnswer(i, btn) {
                        if (krLock) return;
                        krLock = true;
                        var c = CASES[krI], ok = i === c.ans;
                        var btns = $('krOptions').children;
                        for (var k = 0; k < btns.length; k++) {
                            btns[k].classList.remove('hover:bg-[#0066cc]', 'hover:text-white');
                            btns[k].classList.add('cursor-default');
                        }
                        btns[c.ans].className = 'p-3 bg-emerald-500 text-white border border-emerald-500 rounded-xl text-xs font-semibold text-left cursor-default shadow-sm';
                        if (!ok) btn.className = 'p-3 bg-red-500 text-white border border-red-500 rounded-xl text-xs font-semibold text-left cursor-default shadow-sm';
                        if (ok) krS++;
                        var fb = $('krFeedback');
                        fb.className = 'mt-4 p-4 rounded-xl border-l-4 text-xs leading-relaxed ' + (ok ? 'bg-emerald-50 border-emerald-500 text-emerald-900' : 'bg-red-50 border-red-500 text-red-900');
                        $('krVerdict').textContent = ok ? 'Tepat!' : 'Belum tepat. Jawaban yang benar: ' + OPT[c.ans] + '.';
                        $('krExplain').textContent = c.x;
                        $('krNext').textContent = krI + 1 >= CASES.length ? 'Lihat hasil' : 'Kasus berikutnya';
                        $('krScore').textContent = krS;
                    }
                    $('krNext').addEventListener('click', function () {
                        krI++;
                        if (krI >= CASES.length) {
                            $('krPlay').classList.add('hidden');
                            $('krEnd').classList.remove('hidden');
                            $('krEndTitle').textContent = krS === CASES.length ? 'Detektif andal!' : 'Skor akhir: ' + krS + ' dari ' + CASES.length;
                            $('krEndText').textContent = 'Ingat: dua hal yang bergerak searah belum tentu saling menyebabkan. Cari faktor tersembunyi, cek arah hubungannya, dan waspadai kebetulan.';
                        } else krShow();
                    });
                    $('krAgain').addEventListener('click', function () {
                        krI = 0; krS = 0;
                        $('krEnd').classList.add('hidden');
                        $('krPlay').classList.remove('hidden');
                        krShow();
                    });
                    krShow();

                    /* ===== LAB 4: PEMBERSIH DATA (GIGO) ===== */
                    var ROWS = [
                        { n: 'Andi', v: '85' },
                        { n: 'Budi', v: '90' },
                        { n: 'Citra', v: '9O', p: 'Typo: huruf "O" dipakai sebagai angka nol' },
                        { n: 'Dewi', v: '', p: 'Data kosong' },
                        { n: 'Eka', v: '78' },
                        { n: 'Fajar', v: '900', p: 'Nilai ekstrem: di luar batas 0 sampai 100' },
                        { n: 'Gita', v: '88' },
                        { n: 'Andi', v: '85', p: 'Duplikat: baris yang sama muncul dua kali' },
                        { n: 'Hani', v: '92' },
                        { n: 'Indra', v: '80' }
                    ];
                    var flags = {}, pdDone = false;

                    function num(v) { v = String(v).trim(); return v !== '' && !isNaN(Number(v)); }
                    function mean(list) {
                        var a = list.filter(function (r) { return num(r.v); });
                        var s = 0; a.forEach(function (r) { s += Number(r.v); });
                        return a.length ? s / a.length : 0;
                    }
                    function pdRender() {
                        var h = '';
                        ROWS.forEach(function (r, i) {
                            var f = !!flags[i];
                            var cls = 'border-t border-[#e0e0e0] cursor-pointer transition-colors ';
                            if (pdDone && r.p) cls += 'bg-red-50 text-[#7a7a7a] line-through ';
                            else if (f) cls += 'bg-amber-100 ';
                            else cls += 'hover:bg-[#f5f5f7] ';
                            h += '<tr data-i="' + i + '" tabindex="0" class="' + cls + '">' +
                                '<td class="p-2">' + (i + 1) + '</td>' +
                                '<td class="p-2 font-semibold">' + r.n + '</td>' +
                                '<td class="p-2">' + (r.v === '' ? '<em class="text-[#7a7a7a]">(kosong)</em>' : r.v) + '</td>' +
                                '<td class="p-2 no-underline">' + (pdDone && r.p ? r.p : (f ? '&#9873; Ditandai' : '')) + '</td></tr>';
                        });
                        $('pdBody').innerHTML = h;
                        $('pdDirty').textContent = fmt(mean(ROWS), 2);
                    }
                    function pdToggle(i) {
                        if (pdDone) return;
                        flags[i] = !flags[i];
                        pdRender();
                    }
                    $('pdBody').addEventListener('click', function (e) {
                        var tr = e.target.closest('tr');
                        if (tr) pdToggle(Number(tr.getAttribute('data-i')));
                    });
                    $('pdBody').addEventListener('keydown', function (e) {
                        if (e.key !== 'Enter' && e.key !== ' ') return;
                        var tr = e.target.closest('tr');
                        if (!tr) return;
                        e.preventDefault();
                        var i = Number(tr.getAttribute('data-i'));
                        pdToggle(i);
                        var again = $('pdBody').querySelector('tr[data-i="' + i + '"]');
                        if (again) again.focus();
                    });
                    $('pdGo').addEventListener('click', function () {
                        if (pdDone) return;
                        var total = 0, hit = 0, wrong = 0;
                        ROWS.forEach(function (r, i) {
                            if (r.p) { total++; if (flags[i]) hit++; }
                            else if (flags[i]) wrong++;
                        });
                        var msg = $('pdMsg');
                        if (hit === total && wrong === 0) {
                            pdDone = true;
                            var cleanRows = ROWS.filter(function (r) { return !r.p; });
                            $('pdClean').textContent = fmt(mean(cleanRows), 2);
                            msg.className = 'text-xs text-emerald-900 mt-4 bg-emerald-50 p-3 rounded-lg border border-emerald-200 leading-relaxed';
                            msg.innerHTML = '<strong>Berhasil!</strong> Rata-rata data kotor (' + fmt(mean(ROWS), 2) + ') mustahil karena nilai ujian maksimal 100. Setelah dibersihkan menjadi ' + fmt(mean(cleanRows), 2) + '. Inilah prinsip <strong>GIGO</strong>: data masukan yang kotor menghasilkan kesimpulan yang salah. Catatan: Citra dan Fajar mungkin sebenarnya bernilai 90, tetapi nilai asli harus dipastikan dari sumbernya, bukan ditebak.';
                            pdRender();
                        } else {
                            msg.className = 'text-xs text-amber-900 mt-4 bg-amber-50 p-3 rounded-lg border border-amber-200 leading-relaxed';
                            msg.textContent = 'Kamu menemukan ' + hit + ' dari ' + total + ' masalah' + (wrong ? ', dan ' + wrong + ' baris yang kamu tandai sebenarnya baik-baik saja.' : '.') + ' Periksa lagi, lalu coba tombol bersihkan.';
                        }
                    });
                    $('pdReset').addEventListener('click', function () {
                        flags = {}; pdDone = false;
                        $('pdClean').textContent = '?';
                        var msg = $('pdMsg');
                        msg.className = 'text-xs text-[#333333] mt-4 bg-[#f5f5f7] p-3 rounded-lg border border-[#e0e0e0] leading-relaxed';
                        msg.textContent = 'Petunjuk: perhatikan nilai yang tidak masuk akal, sel kosong, penulisan yang aneh, dan baris yang muncul dua kali.';
                        pdRender();
                    });
                    pdRender();
                })();
                </script>
            </div>

            <!-- Mini Quiz Sub-Bab -->
            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Seorang guru mencatat deretan angka hasil ulangan harian Matematika siswa Kelas X: 75, 80, 90, 65, 85, 70. Setelah dimasukkan ke dalam aplikasi nilai sekolah, sistem menampilkan: 'Rata-rata nilai ulangan Matematika Kelas X adalah 77,5 dan sebanyak 83% siswa telah tuntas mencapai KKM.' Manakah analisis berikut yang paling tepat mengenai perubahan status dari deretan angka menjadi pernyataan tersebut?"
                    data-opt-a="Deretan angka merupakan informasi karena sudah dapat dibaca, sedangkan pernyataan akhir merupakan datum."
                    data-opt-b="Deretan angka merupakan data (fakta mentah) yang belum memiliki makna, sedangkan pernyataan akhir adalah informasi karena data telah diolah, diberi konteks, dan memiliki arti."
                    data-opt-c="Deretan angka merupakan data tidak terstruktur, sedangkan pernyataan akhir merupakan dataset terstruktur."
                    data-opt-d="Deretan angka dan pernyataan akhir keduanya merupakan data mentah karena berasal dari sumber pengamatan yang sama."
                    data-opt-e="Deretan angka merupakan informasi privat, sedangkan pernyataan akhir merupakan data publik."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Tim UKS SMA Merdeka melakukan pendataan kesehatan siswa kelas XII dan mencatat dua variabel utama: Variabel X (Jumlah saudara kandung yang dimiliki oleh setiap siswa) dan Variabel Y (Tinggi badan siswa yang diukur menggunakan pita meteran, misal: 165,5 cm; 170,2 cm). Berdasarkan sifat data kuantitatif/numeriknya, pengelompokan yang paling tepat untuk Variabel X dan Variabel Y adalah ...."
                    data-opt-a="Variabel X adalah data kontinu (hasil pengukuran), sedangkan Variabel Y adalah data diskrit (hasil pencacahan)."
                    data-opt-b="Variabel X adalah data kualitatif nominal, sedangkan Variabel Y adalah data kualitatif ordinal."
                    data-opt-c="Variabel X adalah data diskrit (hasil pencacahan/bilangan bulat), sedangkan Variabel Y adalah data kontinu (hasil pengukuran/berupa rentang desimal)."
                    data-opt-d="Variabel X adalah data tidak terstruktur, sedangkan Variabel Y adalah data terstruktur."
                    data-opt-e="Variabel X adalah data skala interval, sedangkan Variabel Y adalah data skala nominal."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Seorang siswa mengamati dua berkas digital: Berkas A (File Data_Siswa.xlsx yang memuat tabel NISN, Nama, Jenis Kelamin, dan Nilai) dan Berkas B (File Dokumentasi.zip berisikan foto ekstrakurikuler .jpg dan rekaman wawancara .mp3). Berdasarkan bentuk dan struktur digitalnya, klasifikasi yang benar untuk kedua berkas tersebut adalah ...."
                    data-opt-a="Berkas A tergolong data tidak terstruktur, sedangkan Berkas B tergolong data terstruktur."
                    data-opt-b="Berkas A tergolong data terstruktur karena tersusun rapi dalam format tabel berbaris dan berkolom, sedangkan Berkas B tergolong data tidak terstruktur karena tidak memiliki format tabel baku."
                    data-opt-c="Berkas A tergolong data kualitatif nominal, sedangkan Berkas B tergolong data kuantitatif rasio."
                    data-opt-d="Berkas A tergolong data semi-terstruktur, sedangkan Berkas B tergolong data terstruktur."
                    data-opt-e="Berkas A dan Berkas B keduanya tergolong sebagai data kontinu."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah grafik batang menyajikan data porsi penjualan kantin. Sumbu Y dipotong (truncated Y-axis) dan dimulai dari angka 95, bukan angka 0. Akibatnya, batang bulan April terlihat 5 kali lebih tinggi dibandingkan batang bulan Januari, padahal secara numerik penjualan hanya meningkat dari 96 porsi menjadi 100 porsi. Mengapa penyajian grafik tersebut dikategorikan sebagai penyajian data yang menyesatkan (misleading visualization)?"
                    data-opt-a="Karena grafik batang tidak boleh digunakan untuk menyajikan data penjualan kantin."
                    data-opt-b="Karena memotong skala sumbu Y dari angka non-nol membesar-besarkan perbedaan visual secara manipulatif sehingga mengarahkan pembaca pada kesimpulan yang keliru."
                    data-opt-c="Karena data penjualan seharusnya disajikan dalam bentuk diagram lingkaran (pie chart) 3D."
                    data-opt-d="Karena perubahan angka dari 96 ke 100 menunjukkan terjadinya kesalahan Garbage In, Garbage Out (GIGO)."
                    data-opt-e="Karena grafik tersebut mengubah data kuantitatif menjadi data kualitatif ordinal."
                    data-answer="B">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Sebuah riset analisis data menunjukkan korelasi positif yang sangat kuat antara jumlah penjualan es krim di pantai dengan tingkat kasus kecelakaan tenggelam di laut. Peneliti menyimpulkan bahwa 'Mengonsumsi es krim secara langsung menyebabkan seseorang mengalami kecelakaan tenggelam saat berenang.' Evaluasi kritis yang paling tepat terhadap kesimpulan peneliti tersebut adalah ...."
                    data-opt-a="Kesimpulan tersebut benar karena nilai korelasi positif selalu membuktikan adanya hubungan sebab-akibat (causation)."
                    data-opt-b="Kesimpulan tersebut keliru karena korelasi hanya menunjukkan tren hubungan dua variabel numerik, bukan hubungan sebab-akibat; ada variabel ketiga (seperti cuaca panas terik di musim panas) yang memengaruhi kenaikan kedua variabel secara bersamaan."
                    data-opt-c="Kesimpulan tersebut keliru karena data penjualan es krim tergolong data kategorikal nominal, sedangkan angka kecelakaan tergolong data kontinu."
                    data-opt-d="Kesimpulan tersebut benar karena data dikumpulkan langsung dari sumber pihak pertama."
                    data-opt-e="Kesimpulan tersebut terjadi akibat bias sampel pada algoritma pemrosesan basis data relasional."
                    data-answer="B">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'konsep-dasar-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Konsep Dasar Data',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 0, 
                'content' => $content
            ]
        );

        $this->command->info('Materi Bab 1 Sub 1: Konsep Dasar Data berhasil diperbarui total dengan Widget Interaktif & Gambar!');
    }
}