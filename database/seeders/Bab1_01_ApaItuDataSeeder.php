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
            <div id="areaMateriPelajaran" class="space-y-12 text-[#0d530e] font-sans transition-all duration-1000 relative z-10 pb-20">

                <div class="mb-12 bg-[#e7e1b1] border-l-4 border-[#306d29] p-6 md:p-8 rounded-r-2xl shadow-lg relative overflow-hidden">
                    <h3 class="text-xl md:text-2xl font-black text-[#306d29] mb-5">
                        Tujuan Pembelajaran
                    </h3>
                    <ul class="space-y-4 text-[#0d530e]">
                        <li class="flex items-start gap-3">
                            <span class="mt-0.5 flex-shrink-0 w-6 h-6 bg-[#fbf5dd] text-[#306d29] font-bold rounded-full flex items-center justify-center text-sm border border-[#306d29]/30">1</span>
                            <p class="leading-relaxed">Peserta didik mampu <strong>menjelaskan konsep dasar data</strong>, membedakan data dan informasi, serta memahami peran penting data sebagai bahan bakar Kecerdasan Buatan (AI).</p>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-3xl md:text-4xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        1. Apa Itu Data?
                    </h3>
                    
                    <div class="space-y-6">
                        <p class="text-lg leading-relaxed text-[#0d530e]">
                             <strong>Data</strong> adalah kumpulan fakta, angka, hasil pengukuran, atau deskripsi dari suatu kejadian yang belum diolah. Di dunia digital, data dapat berwujud angka, teks, gambar, suara, maupun video. Contoh data yang sering ditemui dalam kehidupan sehari-hari ditunjukkan pada Tabel 1.
                        </p>

                        <div class="bg-[#e7e1b1] border border-[#306d29]/30 rounded-xl overflow-hidden shadow-lg mt-6 max-w-4xl mx-auto">
                            <div class="bg-[#306d29] py-3 px-5 border-b border-[#0d530e] text-center">
                                <h4 class="text-sm font-bold text-[#fbf5dd] italic">Tabel 1. Contoh Berbagai Jenis Data</h4>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm text-[#0d530e]">
                                    <thead class="bg-[#306d29] text-[#fbf5dd]">
                                        <tr>
                                            <th class="px-6 py-4 font-bold w-1/3">Jenis Data</th>
                                            <th class="px-6 py-4 font-bold border-l border-[#0d530e]/50">Contoh</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#306d29]/20 bg-[#fbf5dd]">
                                        <tr class="hover:bg-[#e7e1b1] transition-colors"><td class="px-6 py-4 font-bold">Angka</td><td class="px-6 py-4 border-l border-[#306d29]/20 font-mono text-[#306d29] font-bold">80, 75, 90</td></tr>
                                        <tr class="hover:bg-[#e7e1b1] transition-colors"><td class="px-6 py-4 font-bold">Teks</td><td class="px-6 py-4 border-l border-[#306d29]/20 font-mono text-[#306d29] font-bold">"Budi", "Bandung"</td></tr>
                                        <tr class="hover:bg-[#e7e1b1] transition-colors"><td class="px-6 py-4 font-bold">Tanggal</td><td class="px-6 py-4 border-l border-[#306d29]/20 font-mono text-[#306d29] font-bold">10 Januari 2026</td></tr>
                                        <tr class="hover:bg-[#e7e1b1] transition-colors"><td class="px-6 py-4 font-bold">Gambar</td><td class="px-6 py-4 border-l border-[#306d29]/20">Foto profil, hasil tangkapan layar</td></tr>
                                        <tr class="hover:bg-[#e7e1b1] transition-colors"><td class="px-6 py-4 font-bold">Suara</td><td class="px-6 py-4 border-l border-[#306d29]/20">Rekaman percakapan, musik</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <p class="text-lg leading-relaxed text-[#0d530e] mt-6">
                            Berdasarkan contoh pada Tabel 1, data dapat berupa berbagai bentuk. Data-data tersebut belum memiliki makna yang utuh sebelum diberikan konteks dan diolah menjadi informasi. Perhatikan contoh data mentah (<em>raw data</em>) pada Gambar berikut.
                        </p>
                        
                        <div class="mt-8 mb-8 max-w-4xl mx-auto bg-white rounded-xl p-2 shadow-lg border border-[#e7e1b1]">
                            <img src="/images/raw-data.png" alt="Ilustrasi Raw Data" class="w-full h-auto rounded-lg">
                            <p class="text-center text-sm text-[#306d29] font-medium italic mt-3 mb-2">Gambar 1. Tumpukan teks acak tanpa maksud jelas</p>
                        </div>

                        <div class="bg-[#e7e1b1] border-l-4 border-[#306d29] p-6 rounded-r-xl mt-6 shadow-sm">
                            <h4 class="font-bold text-[#306d29] mb-2">Fakta Penting:</h4>
                            <p class="text-[#0d530e] font-medium">"Tanpa konteks, data hanyalah tumpukan karakter yang membingungkan."</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-3xl font-black text-[#0d530e] mb-6 border-b border-[#306d29]/30 pb-4">
                        2. Data dan Informasi
                    </h3>
                    <p class="text-lg leading-relaxed text-[#0d530e] mb-6">
                        Data dan informasi sering dianggap sama, padahal keduanya memiliki perbedaan. Data adalah fakta atau nilai mentah yang belum memiliki makna yang jelas. Sementara itu, <strong>informasi adalah data yang telah diolah, diberi konteks, dan memiliki makna</strong> sehingga dapat digunakan untuk memahami suatu keadaan atau mengambil keputusan.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-[#e7e1b1] p-6 rounded-xl border border-[#306d29]/30 shadow-md">
                            <h4 class="text-lg font-bold text-[#0d530e] mb-4 border-b border-[#306d29]/20 pb-2">Contoh Data Mentah</h4>
                            <div class="bg-[#fbf5dd] p-4 rounded-lg font-mono text-[#306d29] text-lg border border-[#306d29]/30 text-center font-bold">34,5</div>
                            <p class="text-[#306d29] font-medium text-sm mt-4 leading-relaxed">Angka di atas tidak memiliki makna jika kita tidak mengetahui konteksnya. Apakah angka tersebut menunjukkan suhu tubuh seseorang, harga suatu barang, atau nilai hasil pengukuran tertentu?</p>
                        </div>
                        <div class="bg-[#306d29]/10 p-6 rounded-xl border border-[#306d29]/40 shadow-md">
                            <h4 class="text-lg font-bold text-[#306d29] mb-4 border-b border-[#306d29]/30 pb-2">Menjadi Informasi</h4>
                            <div class="bg-[#306d29] p-4 rounded-lg font-mono text-[#fbf5dd] text-lg border border-[#0d530e] text-center font-bold">"Suhu tubuh pasien adalah 34,5°C"</div>
                            <p class="text-[#0d530e] font-medium text-sm mt-4 leading-relaxed">Ketika data tersebut diberi konteks, data tersebut berubah menjadi informasi yang dapat dipahami dan siap digunakan untuk mengambil keputusan medis.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-black text-[#0d530e] mb-6">
                        Lab Mini: Mesin Pemberi Konteks
                    </h3>
                    
                    <p class="text-[#0d530e] leading-relaxed mb-6">
                        Mari kita buktikan bahwa data mentah tidak akan berguna jika tidak memiliki konteks! Masukkan sebuah angka bebas, lalu pilih konteksnya. Lihat bagaimana angka tersebut berubah menjadi informasi.
                    </p>

                    <div class="bg-[#e7e1b1] border border-[#306d29]/30 rounded-xl p-6 shadow-xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-bold text-[#0d530e] text-sm mb-2">1. Ketik Data Mentah (Angka/Kata)</h4>
                                    <input type="text" id="rawInputData" class="w-full p-3 bg-[#fbf5dd] border border-[#306d29]/30 text-[#0d530e] rounded-lg font-mono text-lg focus:ring-2 focus:ring-[#306d29] focus:border-[#306d29] transition-all outline-none" placeholder="Contoh: 100">
                                </div>
                                
                                <div class="mt-4">
                                    <h4 class="font-bold text-[#0d530e] text-sm mb-2">2. Pilih Konteks</h4>
                                    <select id="contextSelector" class="w-full p-3 bg-[#fbf5dd] border border-[#306d29]/30 text-[#0d530e] rounded-lg font-sans focus:ring-2 focus:ring-[#306d29] focus:border-[#306d29] transition-all cursor-pointer outline-none font-medium">
                                        <option value="suhu">🌡️ Suhu (°C)</option>
                                        <option value="kecepatan">🚗 Kecepatan (km/jam)</option>
                                        <option value="harga">💰 Harga Barang (Rupiah)</option>
                                        <option value="nilai">📝 Nilai Ujian Siswa</option>
                                        <option value="jarak">📏 Jarak (Meter)</option>
                                    </select>
                                </div>
                                
                                <button onclick="generateInformation()" class="w-full py-3 mt-2 bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] font-bold rounded-lg transition-all flex items-center justify-center gap-2 shadow-md">
                                    <span>✨</span> Ubah Menjadi Informasi
                                </button>
                            </div>

                            <div class="relative bg-[#306d29] text-[#fbf5dd] p-6 rounded-lg font-mono border border-[#0d530e] h-full min-h-[220px] flex flex-col shadow-inner">
                                <div class="absolute top-0 right-0 bg-[#0d530e] text-[#e7e1b1] text-xs font-bold px-3 py-1 rounded-bl-lg border-b border-l border-[#0d530e]">OUTPUT PANEL</div>
                                <div id="infoOutputScreen" class="flex-1 flex flex-col justify-center space-y-3 mt-4">
                                    <p class="opacity-70 text-sm animate-pulse text-[#e7e1b1]">// Menunggu input dari pengguna...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl md:text-4xl font-black text-[#0d530e] border-b border-[#306d29]/30 pb-4 mb-8">
                        3. Data sebagai Bahan Bakar AI
                    </h3>
                    
                    <div class="mb-8 max-w-4xl mx-auto bg-white rounded-xl p-2 shadow-lg border border-[#e7e1b1]">
                        <img src="/images/bahan-bakar-ai.png" alt="Data adalah Bahan Bakar AI" class="w-full h-auto rounded-lg">
                        <p class="text-center text-sm text-[#306d29] font-medium italic mt-3 mb-2">Gambar 2. Data sebagai bahan bakar AI</p>
                    </div>

                    <div class="space-y-6 text-lg leading-relaxed text-[#0d530e]">
                        <p class="font-bold text-xl text-[#306d29]">
                            Mengapa AI Membutuhkan Data?
                        </p>
                        <p>
                            Bayangkan sebuah mobil balap super canggih. Sehebat apa pun mesinnya, mobil tersebut tidak akan dapat bergerak tanpa bahan bakar. Begitu pula dengan Artificial Intelligence (AI). AI membutuhkan data untuk mempelajari pola, memahami hubungan antar data, dan menghasilkan rekomendasi atau keputusan yang bermanfaat.
                        </p>
                        <p>
                            Tanpa data, AI tidak dapat memahami kebiasaan pengguna, mengenali objek, ataupun memberikan rekomendasi yang sesuai. Selain digunakan untuk melatih AI, data juga digunakan untuk membuat visualisasi, menemukan pola, dan mendukung pengambilan keputusan. Oleh karena itu, sebelum dimanfaatkan, data perlu dikumpulkan, dibersihkan, dan diolah dengan benar.
                        </p>
                    </div>
                </div>

                <div class="mt-16">
                    <h3 class="text-2xl font-bold text-[#0d530e] mb-6">Contoh Penggunaan Data pada AI</h3>
                    <p class="text-[#0d530e] mb-8 leading-relaxed">
                        Kecerdasan Buatan (AI) memanfaatkan data untuk mempelajari pola dan menghasilkan rekomendasi atau keputusan yang membantu manusia. Semakin banyak data yang berkualitas, relevan, dan akurat, semakin baik kemampuan AI dalam memberikan hasil yang tepat. Berikut beberapa contoh pemanfaatan AI:
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-[#e7e1b1] p-6 rounded-xl border border-[#306d29]/30 shadow-sm hover:shadow-md transition-shadow">
                            <h4 class="font-bold text-[#306d29] text-lg mb-3">1. Rekomendasi Tontonan</h4>
                            <p class="text-[#0d530e] text-sm leading-relaxed">YouTube dapat merekomendasikan video yang sesuai dengan minat pengguna karena sistemnya mempelajari data riwayat tontonan yang pernah dilihat sebelumnya.</p>
                        </div>
                        <div class="bg-[#e7e1b1] p-6 rounded-xl border border-[#306d29]/30 shadow-sm hover:shadow-md transition-shadow">
                            <h4 class="font-bold text-[#306d29] text-lg mb-3">2. Filter Spam Email</h4>
                            <p class="text-[#0d530e] text-sm leading-relaxed">Layanan email dapat memisahkan pesan penting dan pesan spam secara otomatis karena AI telah mempelajari pola dari ribuan contoh email sebelumnya.</p>
                        </div>
                        <div class="bg-[#e7e1b1] p-6 rounded-xl border border-[#306d29]/30 shadow-sm hover:shadow-md transition-shadow">
                            <h4 class="font-bold text-[#306d29] text-lg mb-3">3. Asisten Virtual</h4>
                            <p class="text-[#0d530e] text-sm leading-relaxed">Asisten virtual seperti Google Assistant atau Siri memanfaatkan data suara pengguna untuk memahami perintah dan memberikan jawaban yang sesuai.</p>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#0d530e] mt-12 mb-6">Siklus Belajar AI</h3>
                    <p class="text-[#0d530e] mb-6 leading-relaxed">
                        AI bekerja melalui tiga tahapan utama:
                    </p>

                    <div class="mb-8 max-w-4xl mx-auto bg-white rounded-xl p-2 shadow-lg border border-[#e7e1b1]">
                        <img src="/images/siklus-ai.png" alt="Siklus Belajar AI" class="w-full h-auto rounded-lg">
                        <p class="text-center text-sm text-[#306d29] font-medium italic mt-3 mb-2">Gambar 3. Siklus AI Belajar</p>
                    </div>

                    <p class="text-[#0d530e] leading-relaxed">
                        Proses inilah yang memungkinkan AI membantu manusia dalam menyelesaikan berbagai permasalahan sehari-hari.
                    </p>
                </div>

                <div class="mt-20">
                    <h3 class="text-3xl font-black text-[#0d530e] border-b border-[#306d29]/30 pb-4 mb-6">4. Pentingnya Kualitas Data</h3>
                    <p class="text-lg leading-relaxed text-[#0d530e] mb-8">
                        Kualitas data sangat memengaruhi hasil yang diberikan oleh AI. Semakin lengkap, akurat, dan relevan data yang digunakan, semakin baik hasil yang dihasilkan. Sebaliknya, data yang tidak lengkap atau mengandung kesalahan dapat menyebabkan rekomendasi maupun keputusan yang kurang tepat.
                    </p>

                    <div class="mb-8 max-w-4xl mx-auto bg-white rounded-xl p-2 shadow-lg border border-[#e7e1b1]">
                        <img src="/images/kualitas-data.png" alt="Pentingnya Kualitas Data" class="w-full h-auto rounded-lg">
                        <p class="text-center text-sm text-[#306d29] font-medium italic mt-3 mb-2">Gambar 4. Data Berkualitas vs Tidak Berkualitas</p>
                    </div>

                    <p class="text-lg leading-relaxed text-[#0d530e]">
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
                            outputDiv.innerHTML = '<p class="text-red-200 font-bold bg-red-900/50 border border-red-400 p-3 rounded-lg">Error: Data mentah tidak boleh kosong!</p>';
                            return;
                        }

                        outputDiv.innerHTML = '<div class="animate-pulse text-[#e7e1b1]">Menyisipkan konteks ke dalam data...</div>';

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
                                '<div><span class="text-[#e7e1b1]">></span> Data Mentah : <span class="text-[#fbf5dd] font-bold">' + rawVal + '</span></div>' +
                                '<div><span class="text-[#e7e1b1]">></span> Konteks &nbsp;&nbsp;&nbsp;: <span class="text-[#fbf5dd] font-bold">' + ctxText + '</span></div>' +
                                '<div class="mt-4 pt-3 border-t border-[#fbf5dd]/30">' +
                                    '<span class="text-[#e7e1b1]">></span> INFORMASI BERMAKNA: <br>' +
                                    '<span class="text-[#fbf5dd] font-bold text-lg mt-2 block leading-relaxed">"' + resultStr + '"</span>' +
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