<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Chapter;

class Bab1_01_ApaItuDataSeeder extends Seeder
{
    public function run()
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
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-white text-[#0066cc] font-semibold rounded-full flex items-center justify-center text-sm border border-[#e0e0e0]">1</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>menjelaskan konsep dasar data</strong>, membedakan data dan informasi, serta memahami peran penting data sebagai bahan bakar Kecerdasan Buatan (AI).</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        1. Mengenal Data
                    </h3>
                    
                    <div class="space-y-6">
                        <p class="text-lg leading-relaxed text-[#333333]">
                            <strong>Data</strong> adalah kumpulan fakta, angka, hasil pengukuran, atau deskripsi dari suatu kejadian yang belum diolah. Di dunia digital, data dapat berwujud angka, teks, gambar, suara, maupun video. Contoh data yang sering ditemui dalam kehidupan sehari-hari ditunjukkan pada Tabel 1.
                        </p>

                        <div class="bg-white border border-[#e0e0e0] rounded-xl overflow-hidden mt-6 max-w-4xl mx-auto">
                            <div class="bg-[#f5f5f7] py-3 px-5 border-b border-[#e0e0e0] text-center">
                                <h4 class="text-sm font-semibold text-[#1d1d1f]">Tabel 1. Contoh Berbagai Jenis Data</h4>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm text-[#1d1d1f]">
                                    <thead class="bg-[#fafafc] text-[#1d1d1f] border-b border-[#e0e0e0]">
                                        <tr>
                                            <th class="px-6 py-4 font-semibold w-1/3">Jenis Data</th>
                                            <th class="px-6 py-4 font-semibold border-l border-[#e0e0e0]">Contoh</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#e0e0e0] bg-white">
                                        <tr class="hover:bg-[#f5f5f7] transition-colors"><td class="px-6 py-4 font-medium">Angka</td><td class="px-6 py-4 border-l border-[#e0e0e0] font-mono text-[#0066cc] font-medium">80, 75, 90</td></tr>
                                        <tr class="hover:bg-[#f5f5f7] transition-colors"><td class="px-6 py-4 font-medium">Teks</td><td class="px-6 py-4 border-l border-[#e0e0e0] font-mono text-[#0066cc] font-medium">"Budi", "Bandung"</td></tr>
                                        <tr class="hover:bg-[#f5f5f7] transition-colors"><td class="px-6 py-4 font-medium">Tanggal</td><td class="px-6 py-4 border-l border-[#e0e0e0] font-mono text-[#0066cc] font-medium">10 Januari 2026</td></tr>
                                        <tr class="hover:bg-[#f5f5f7] transition-colors"><td class="px-6 py-4 font-medium">Gambar</td><td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Foto profil, hasil tangkapan layar</td></tr>
                                        <tr class="hover:bg-[#f5f5f7] transition-colors"><td class="px-6 py-4 font-medium">Suara</td><td class="px-6 py-4 border-l border-[#e0e0e0] text-[#333333]">Rekaman percakapan, musik</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <p class="text-lg leading-relaxed text-[#333333] mt-6">
                            Berdasarkan contoh pada Tabel 1, data dapat berupa berbagai bentuk. Data-data tersebut belum memiliki makna yang utuh sebelum diberikan konteks dan diolah menjadi informasi. Perhatikan contoh data mentah (<em>raw data</em>) pada Gambar berikut.
                        </p>
                        
                        <div class="mt-8 mb-8 max-w-4xl mx-auto bg-[#fafafc] rounded-xl p-2 border border-[#e0e0e0]">
                            <img src="/images/raw-data.png" alt="Ilustrasi Raw Data" class="w-full h-auto rounded-lg">
                            <p class="text-center text-sm text-[#7a7a7a] font-medium italic mt-3 mb-2">Gambar 1. Tumpukan teks acak tanpa maksud jelas</p>
                        </div>

                        <div class="bg-[#f5f5f7] border-l-4 border-[#0066cc] p-6 rounded-r-xl mt-6">
                            <h4 class="font-semibold text-[#1d1d1f] mb-2">Fakta Penting:</h4>
                            <p class="text-[#333333] font-medium">"Tanpa konteks, data hanyalah tumpukan karakter yang membingungkan."</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-6 border-b border-[#e0e0e0] pb-4">
                        2. Data dan Informasi
                    </h3>
                    <p class="text-lg leading-relaxed text-[#333333] mb-6">
                        Data dan informasi sering dianggap sama, padahal keduanya memiliki perbedaan. Data adalah fakta atau nilai mentah yang belum memiliki makna yang jelas. Sementara itu, <strong>informasi adalah data yang telah diolah, diberi konteks, dan memiliki makna</strong> sehingga dapat digunakan untuk mengambil keputusan.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-[#fafafc] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="text-lg font-semibold text-[#1d1d1f] mb-4 border-b border-[#e0e0e0] pb-2">Contoh Data Mentah</h4>
                            <div class="bg-white p-4 rounded-lg font-mono text-[#1d1d1f] text-lg border border-[#e0e0e0] text-center font-medium">34,5</div>
                            <p class="text-[#7a7a7a] font-medium text-sm mt-4 leading-relaxed">Angka di atas tidak memiliki makna jika kita tidak mengetahui konteksnya. Apakah angka tersebut menunjukkan suhu tubuh seseorang, harga suatu barang, atau nilai hasil pengukuran tertentu?</p>
                        </div>
                        <div class="bg-[#0066cc]/5 p-6 rounded-xl border border-[#0066cc]/20">
                            <h4 class="text-lg font-semibold text-[#0066cc] mb-4 border-b border-[#0066cc]/10 pb-2">Menjadi Informasi</h4>
                            <div class="bg-[#0066cc] p-4 rounded-lg font-mono text-white text-lg text-center font-medium">Suhu tubuh pasien adalah 34,5°C</div>
                            <p class="text-[#333333] font-medium text-sm mt-4 leading-relaxed">Ketika data tersebut diberi konteks, data tersebut berubah menjadi informasi yang dapat dipahami dan siap digunakan untuk mengambil keputusan medis.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-semibold text-[#1d1d1f] mb-6">
                        Lab Mini: Mesin Pemberi Konteks
                    </h3>
                    
                    <p class="text-[#333333] leading-relaxed mb-6">
                        Mari kita buktikan bahwa data mentah tidak akan berguna jika tidak memiliki konteks! Masukkan sebuah angka bebas, lalu pilih konteksnya. Lihat bagaimana angka tersebut berubah menjadi informasi.
                    </p>

                    <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-semibold text-[#1d1d1f] text-sm mb-2">1. Ketik Data Mentah (Angka/Kata)</h4>
                                    <input type="text" id="rawInputData" class="w-full p-3 bg-white border border-[#e0e0e0] text-[#1d1d1f] rounded-lg font-mono text-lg focus:ring-1 focus:ring-[#0066cc] focus:border-[#0066cc] transition-all outline-none" placeholder="Contoh: 100">
                                </div>
                                
                                <div class="mt-4">
                                    <h4 class="font-semibold text-[#1d1d1f] text-sm mb-2">2. Pilih Konteks</h4>
                                    <select id="contextSelector" class="w-full p-3 bg-white border border-[#e0e0e0] text-[#1d1d1f] rounded-lg font-sans focus:ring-1 focus:ring-[#0066cc] focus:border-[#0066cc] transition-all cursor-pointer outline-none font-medium">
                                        <option value="suhu">Suhu (°C)</option>
                                        <option value="kecepatan">Kecepatan (km/jam)</option>
                                        <option value="harga">Harga Barang (Rupiah)</option>
                                        <option value="nilai">Nilai Ujian Siswa</option>
                                        <option value="jarak">Jarak (Meter)</option>
                                    </select>
                                </div>
                                
                                <button onclick="generateInformation()" class="w-full py-3 mt-2 bg-[#0066cc] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors flex items-center justify-center gap-2 border-none cursor-pointer">
                                    Ubah Menjadi Informasi
                                </button>
                            </div>

                            <div class="relative bg-[#1c1c1e] text-white p-6 rounded-xl font-mono h-full min-h-[220px] flex flex-col">
                                <div class="absolute top-0 right-0 bg-white/10 text-[#cccccc] text-xs font-medium px-3 py-1 rounded-bl-lg">OUTPUT PANEL</div>
                                <div id="infoOutputScreen" class="flex-1 flex flex-col justify-center space-y-3 mt-4">
                                    <p class="opacity-50 text-sm animate-pulse text-[#cccccc]">// Menunggu input dari pengguna...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] border-b border-[#e0e0e0] pb-4 mb-8">
                        3. Data sebagai Bahan Bakar AI
                    </h3>
                    
                    <div class="mb-8 max-w-4xl mx-auto bg-[#fafafc] rounded-xl p-2 border border-[#e0e0e0]">
                        <img src="/images/bahan-bakar-ai.png" alt="Data adalah Bahan Bakar AI" class="w-full h-auto rounded-lg">
                        <p class="text-center text-sm text-[#7a7a7a] font-medium italic mt-3 mb-2">Gambar 2. Data sebagai bahan bakar AI</p>
                    </div>

                    <div class="space-y-6 text-lg leading-relaxed text-[#333333]">
                        <p class="font-semibold text-xl text-[#1d1d1f]">
                            Mengya AI Membutuhkan Data?
                        </p>
                        <p>
                            Bayangkan sebuah mobil balap super canggih. Sehebat apa pun mesinnya, mobil tersebut tidak akan dapat bergerak tanpa bahan bakar. Begitu pula dengan Artificial Intelligence (AI). AI membutuhkan data untuk mempelajari pola, memahami hubungan antar data, dan menghasilkan keputusan yang bermanfaat.
                        </p>
                        <p>
                            Tanpa data, AI tidak dapat memahami kebiasaan pengguna, mengenali objek, ataupun memberikan rekomendasi yang sesuai. Selain digunakan untuk melatih AI, data juga digunakan untuk membuat visualisasi, menemukan pola, dan mendukung pengambilan keputusan. Oleh karena itu, sebelum dimanfaatkan, data perlu dikumpulkan, dibersihkan, dan diolah dengan benar.
                        </p>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-semibold text-[#1d1d1f] mb-6">Contoh Penggunaan Data pada AI</h3>
                    <p class="text-[#333333] mb-8 leading-relaxed">
                        Kecerdasan Buatan (AI) memanfaatkan data untuk mempelajari pola dan menghasilkan rekomendasi atau keputusan yang membantu manusia. Semakin banyak data yang berkualitas, relevan, dan akurat, semakin baik kemampuan AI dalam memberikan hasil yang tepat. Berikut beberapa contoh pemanfaatan AI:
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-3">1. Rekomendasi Tontonan</h4>
                            <p class="text-[#7a7a7a] text-sm leading-relaxed">YouTube dapat merekomendasikan video yang sesuai dengan minat pengguna karena sistemnya mempelajari data riwayat tontonan yang pernah dilihat sebelumnya.</p>
                        </div>
                        <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-3">2. Filter Spam Email</h4>
                            <p class="text-[#7a7a7a] text-sm leading-relaxed">Layanan email dapat memisahkan pesan penting dan pesan spam secara otomatis karena AI telah mempelajari pola dari ribuan contoh email sebelumnya.</p>
                        </div>
                        <div class="bg-[#f5f5f7] p-6 rounded-xl border border-[#e0e0e0]">
                            <h4 class="font-semibold text-[#1d1d1f] text-lg mb-3">3. Asisten Virtual</h4>
                            <p class="text-[#7a7a7a] text-sm leading-relaxed">Asisten virtual seperti Google Assistant atau Siri memanfaatkan data suara pengguna untuk memahami perintah dan memberikan jawaban yang sesuai.</p>
                        </div>
                    </div>

                    <h3 class="text-2xl font-semibold text-[#1d1d1f] mt-12 mb-6">Siklus Belajar AI</h3>
                    <p class="text-[#333333] mb-6 leading-relaxed">
                        AI bekerja melalui tiga tahapan utama:
                    </p>

                    <div class="mb-8 max-w-4xl mx-auto bg-[#fafafc] rounded-xl p-2 border border-[#e0e0e0]">
                        <img src="/images/siklus-ai.png" alt="Siklus Belajar AI" class="w-full h-auto rounded-lg">
                        <p class="text-center text-sm text-[#7a7a7a] font-medium italic mt-3 mb-2">Gambar 3. Siklus AI Belajar</p>
                    </div>

                    <p class="text-[#333333] leading-relaxed">
                        Proses inilah yang memungkinkan AI membantu manusia dalam menyelesaikan berbagai permasalahan sehari-hari.
                    </p>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-semibold text-[#1d1d1f] border-b border-[#e0e0e0] pb-4 mb-6">4. Pentingnya Kualitas Data</h3>
                    <p class="text-lg leading-relaxed text-[#333333] mb-8">
                        Kualitas data sangat memengaruhi hasil yang diberikan oleh AI. Semakin lengkap, akurat, dan relevan data yang digunakan, semakin baik hasil yang dihasilkan. Sebaliknya, data yang tidak lengkap atau mengandung kesalahan dapat menyebabkan rekomendasi maupun keputusan yang kurang tepat.
                    </p>

                    <div class="mb-8 max-w-4xl mx-auto bg-[#fafafc] rounded-xl p-2 border border-[#e0e0e0]">
                        <img src="/images/kualitas-data.png" alt="Pentingnya Kualitas Data" class="w-full h-auto rounded-lg">
                        <p class="text-center text-sm text-[#7a7a7a] font-medium italic mt-3 mb-2">Gambar 4. Data Berkualitas vs Tidak Berkualitas</p>
                    </div>

                    <p class="text-lg leading-relaxed text-[#333333]">
                        Oleh karena itu, sebelum data digunakan untuk visualisasi, analisis, maupun kecerdasan buatan, data perlu dikumpulkan, dibersihkan, dan diolah dengan benar. Tahapan tersebut akan dipelajari lebih lanjut pada materi pengolahan data.
                    </p>
                </div>

                <script>
                    function generateInformation() {
                        let rawVal = document.getElementById('rawInputData').value.trim();
                        let ctx = document.getElementById('contextSelector').value;
                        let ctxText = document.getElementById('contextSelector').options[document.getElementById('contextSelector').selectedIndex].text;
                        let outputDiv = document.getElementById('infoOutputScreen');

                        if (rawVal === '') {
                            outputDiv.innerHTML = '<p class="text-[#ff453a] font-medium p-3">Error: Data mentah tidak boleh kosong!</p>';
                            return;
                        }

                        outputDiv.innerHTML = '<div class="animate-pulse text-[#7a7a7a]">Memproses konteks data...</div>';

                        setTimeout(() => {
                            let resultStr = '';
                            if (ctx === 'suhu') {
                                resultStr = `Berdasarkan hasil pemeriksaan, suhu tubuh pasien saat ini adalah ${rawVal}°C.`;
                            } else if (ctx === 'kecepatan') {
                                resultStr = `Kendaraan tersebut melaju dengan kecepatan konstan sebesar ${rawVal} km/jam di jalan tol.`;
                            } else if (ctx === 'harga') {
                                resultStr = `Total harga barang yang harus dibayar oleh pelanggan adalah Rp ${rawVal}.`;
                            } else if (ctx === 'nilai') {
                                resultStr = `Siswa tersebut mendapatkan nilai ${rawVal} pada ujian akhir semester.`;
                            } else if (ctx === 'jarak') {
                                resultStr = `Jarak dari rumah menuju sekolah adalah ${rawVal} meter.`;
                            }

                            outputDiv.innerHTML = 
                                '<div><span class="text-[#7a7a7a]">></span> Data Mentah : <span class="text-white font-medium">' + rawVal + '</span></div>' +
                                '<div><span class="text-[#7a7a7a]">></span> Konteks &nbsp;&nbsp;&nbsp;: <span class="text-white font-medium">' + ctxText + '</span></div>' +
                                '<div class="mt-4 pt-3 border-t border-white/10">' +
                                    '<span class="text-[#7a7a7a]">></span> Informasi Bermakna: <br>' +
                                    '<span class="text-white font-medium text-lg mt-2 block leading-relaxed">"' + resultStr + '"</span>' +
                                '</div>';
                        }, 600);
                    }

                    document.addEventListener('click', function(e) {
                        let textTombol = e.target.innerText || '';
                        let isKuisButton = textTombol.toLowerCase().includes('uji pemahaman') || 
                                           textTombol.toLowerCase().includes('mulai kuis') || 
                                           textTombol.toLowerCase().includes('kerjakan kuis');
                                           
                        if (isKuisButton || e.target.closest('.tombol-mulai-kuis')) {
                            let areaMateri = document.getElementById('areaMateriPelajaran');
                            if(areaMateri) areaMateri.classList.add('blur-md', 'pointer-events-none', 'opacity-30', 'select-none');
                            let aiTool = document.getElementById('floating-tools-container'); 
                            if(aiTool) aiTool.style.display = 'none';
                        }
                        
                        let isResetButton = textTombol.toLowerCase().includes('ulangi') || 
                                            textTombol.toLowerCase().includes('coba lagi') || 
                                            textTombol.toLowerCase().includes('selesai');
                                            
                        if (isResetButton) {
                            let areaMateri = document.getElementById('areaMateriPelajaran');
                            if(areaMateri) areaMateri.classList.remove('blur-md', 'pointer-events-none', 'opacity-30', 'select-none');
                            let aiTool = document.getElementById('floating-tools-container'); 
                            if(aiTool) aiTool.style.display = 'flex';
                        }
                    });
                </script>
            </div>

            <div id="mini-quiz-data" class="hidden">
                <div class="mini-quiz-item" 
                    data-question="Pernyataan yang paling tepat mengenai pengertian data adalah ...."
                    data-opt-a="Kumpulan fakta, angka, hasil pengukuran, atau deskripsi suatu kejadian yang belum diolah."
                    data-opt-b="Hasil analisis yang digunakan untuk mengambil keputusan."
                    data-opt-c="Grafik yang digunakan untuk menyajikan informasi."
                    data-opt-d="Sekumpulan rekomendasi yang dihasilkan AI."
                    data-opt-e="Hasil akhir dari proses pengolahan data."
                    data-answer="A">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pernyataan yang sesuai dengan perbedaan data dan informasi adalah ...."
                    data-opt-a="Data dan informasi memiliki makna yang sama."
                    data-opt-b="Data selalu berbentuk grafik, sedangkan informasi berbentuk tabel."
                    data-opt-c="Informasi adalah data yang belum diproses."
                    data-opt-d="Data hanya dapat berupa angka."
                    data-opt-e="Informasi merupakan data yang telah diolah dan diberi konteks sehingga memiliki makna."
                    data-answer="E">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pernyataan yang sesuai dengan fakta penting pada materi adalah ...."
                    data-opt-a="Data selalu dapat dipahami tanpa penjelasan tambahan."
                    data-opt-b="Data mentah selalu berbentuk angka."
                    data-opt-c="Tanpa konteks, data hanyalah tumpukan karakter yang membingungkan."
                    data-opt-d="Semua data langsung menjadi informasi."
                    data-opt-e="Data hanya digunakan oleh komputer."
                    data-answer="C">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pernyataan yang paling tepat mengenai hubungan data dan AI adalah ...."
                    data-opt-a="AI dapat bekerja dengan baik meskipun tidak memiliki data."
                    data-opt-b="Data hanya digunakan AI untuk menyimpan informasi."
                    data-opt-c="AI memanfaatkan data untuk mengganti peran manusia sepenuhnya."
                    data-opt-d="Data sering disebut sebagai bahan bakar AI karena digunakan untuk mempelajari pola dan menghasilkan keputusan atau rekomendasi."
                    data-opt-e="AI hanya membutuhkan data gambar untuk bekerja."
                    data-answer="D">
                </div>
                <div class="mini-quiz-item" 
                    data-question="Pernyataan yang sesuai dengan pentingnya kualitas data adalah ...."
                    data-opt-a="Semakin banyak data, hasil AI selalu benar."
                    data-opt-b="Data yang lengkap, akurat, dan relevan membantu AI menghasilkan hasil yang lebih tepat."
                    data-opt-c="Data yang tidak lengkap akan meningkatkan akurasi AI."
                    data-opt-d="Data yang mengandung kesalahan tidak memengaruhi hasil analisis."
                    data-opt-e="Kualitas data hanya penting untuk visualisasi data."
                    data-answer="B">
                </div>
            </div>
EOT;

        Material::updateOrCreate(
            ['slug' => 'apa-itu-data'], 
            [
                'chapter_id' => $chapterId,
                'title' => 'Apa Itu Data?',
                'type' => 'text',
                'sequence' => 1,
                'min_level' => 0, 
                'content' => $content
            ]
        );
        
        $this->command->info('Materi Bab 1: Apa Itu Data berhasil disinkronisasi dengan Tema Baru dan Soal Kuis!');
    }
}