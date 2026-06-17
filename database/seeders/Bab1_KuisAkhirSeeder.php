<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;

class Bab1_KuisAkhirSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pastikan Bab 1 Ada (Cari berdasarkan sequence 1)
        $chapter = Chapter::where('sequence', 1)->first();
        
        if (!$chapter) {
            $this->command->error('Bab 1 tidak ditemukan! Pastikan kamu sudah menjalankan seeder materi Bab 1.');
            return;
        }

        // 2. Buat atau Update Quiz Header
        $quiz = Quiz::updateOrCreate(
            ['chapter_id' => $chapter->id, 'type' => 'final'], 
            [
                'title' => 'Evaluasi Akhir Bab 1: Data dan Pengolahannya',
                'description' => 'Uji pemahamanmu secara menyeluruh tentang Sumber, Jenis, Struktur, dan teknik Pengolahan Data di era digital.',
                'time_limit' => 45, // 45 Menit
            ]
        );

        // 3. Bersihkan soal lama agar tidak duplikat saat seeder dijalankan ulang
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar 20 Soal Evaluasi Akhir Bab 1 (Pola Kunci: A,B,C,D,E berulang 4 kali)
        $questions = [
            // Q1: Jawaban A
            [
                'question' => 'Kumpulan fakta, angka, hasil pengukuran, atau deskripsi kejadian yang sifatnya masih sangat mentah dan belum diolah sama sekali disebut sebagai....',
                'image' => null,
                'options' => [
                    'A' => 'Data',
                    'B' => 'Informasi',
                    'C' => 'Pengetahuan',
                    'D' => 'Kecerdasan Buatan',
                    'E' => 'Keputusan Analisis'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Data adalah bentuk paling dasar. Bagaikan bahan makanan mentah yang belum dimasak menjadi makanan siap saji (Informasi).'
            ],
            // Q2: Jawaban B
            [
                'question' => 'Kumpulan data (seperti data cuaca BMKG) yang sengaja dipublikasikan agar bisa diakses dan dimanfaatkan oleh siapa saja tanpa melanggar hukum disebut sebagai sumber data....',
                'image' => null,
                'options' => [
                    'A' => 'Komersial (Berbayar)',
                    'B' => 'Terbuka (Open Data)',
                    'C' => 'Pribadi (Konfidensial)',
                    'D' => 'Rahasia (Tingkat Tinggi)',
                    'E' => 'Internal (Batas Organisasi)'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Sesuai namanya, Open Data (Data Terbuka) dirilis agar masyarakat bisa memanfaatkannya secara bebas.'
            ],
            // Q3: Jawaban C
            [
                'question' => 'Data sensus penduduk dari BPS atau rekam medis rumah sakit sangat akurat karena diterbitkan oleh lembaga berwenang. Ini adalah contoh dari sumber data yang bersifat....',
                'image' => null,
                'options' => [
                    'A' => 'Kualitatif Deskriptif Bebas',
                    'B' => 'Terstruktur Pola Angka Penuh',
                    'C' => 'Terpercaya Tingkat Validitasnya',
                    'D' => 'Sekunder Dari Pihak Ketiga Saja',
                    'E' => 'Primer Hasil Uji Coba Lapangan'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data Terpercaya adalah data yang bisa diandalkan karena berasal dari pihak atau instansi yang kredibilitasnya sudah diakui.'
            ],
            // Q4: Jawaban D
            [
                'question' => 'Mengambil nomor WhatsApp atau menyebarkan alamat rumah teman di internet tanpa meminta izin terlebih dahulu merupakan bentuk pelanggaran terhadap prinsip sumber data....',
                'image' => null,
                'options' => [
                    'A' => 'Terstruktur Dan Sistematis Angka',
                    'B' => 'Kuantitatif Dengan Batas Ukuran',
                    'C' => 'Terpercaya Atas Dasar Bukti Kuat',
                    'D' => 'Legal Bersumber Pada Aturan Hukum',
                    'E' => 'Ordinal Yang Memiliki Jenjang Rapi'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Kita harus mematuhi hukum privasi. Data yang diambil tanpa izin adalah tindakan ilegal (melanggar prinsip Data Legal).'
            ],
            // Q5: Jawaban E
            [
                'question' => 'Alasan utama mengapa kita harus mendefinisikan "masalah" dengan jelas sebelum mulai mengumpulkan data adalah agar data yang kita kumpulkan nanti sifatnya....',
                'image' => null,
                'options' => [
                    'A' => 'Acak namun luas tak terhingga batasnya',
                    'B' => 'Rumit dan butuh algoritma tinggi PC',
                    'C' => 'Murni berbasis angka agar cepat diolah',
                    'D' => 'Hanya berisi opini bebas dari netizen',
                    'E' => 'Benar-benar sesuai dengan tujuannya'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Mengetahui masalahnya membuat kita tidak membuang waktu mengumpulkan data yang salah atau tidak relevan dengan solusi.'
            ],
            // Q6: Jawaban A
            [
                'question' => 'Ciri khas yang paling membedakan data "Kualitatif Nominal" (seperti Jenis Kelamin) dengan jenis data kualitatif lainnya adalah bahwa label kategorinya....',
                'image' => null,
                'options' => [
                    'A' => 'Sama sekali tidak memiliki tingkatan atau urutan',
                    'B' => 'Mempunyai rentang selisih ukur yang sangat pasti',
                    'C' => 'Menghadirkan tingkatan atau ranking yang berurutan',
                    'D' => 'Sanggup dikenakan operasi penjumlahan matematika',
                    'E' => 'Cenderung mengandung bilangan pecahan atau desimal'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Data nominal murni berfungsi sebagai label saja. (Laki-laki tidak lebih tinggi pangkatnya dari Perempuan, dan sebaliknya).'
            ],
            // Q7: Jawaban B
            [
                'question' => 'Sebuah formulir penilaian guru membagi jawaban siswa menjadi: Sangat Buruk, Buruk, Baik, dan Sangat Baik. Dilihat dari bentuk teksnya yang bertingkat, ini termasuk jenis data kualitatif....',
                'image' => null,
                'options' => [
                    'A' => 'Tipe Nominal Murni Labeling Dasar',
                    'B' => 'Tipe Ordinal Berjenjang Terstruktur',
                    'C' => 'Kuantitatif Jenis Diskrit Bulat Murni',
                    'D' => 'Kuantitatif Jenis Kontinu Hasil Ukur',
                    'E' => 'Format Bebas Campuran Tidak Resmi'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Walau berupa kata-kata (Kualitatif), penilaian tersebut memiliki urutan level dari terendah ke tertinggi (Ordinal).'
            ],
            // Q8: Jawaban C
            [
                'question' => 'Laporan perawat di UKS mencatat suhu tubuh seorang siswa adalah 36,7 derajat celcius. Mengingat nilainya didapat dari termometer dan berbentuk desimal, hasil ini termasuk data kuantitatif....',
                'image' => null,
                'options' => [
                    'A' => 'Diskrit Hasil Kegiatan Hitung Bebas',
                    'B' => 'Nominal Kategori Tanpa Tingkatan',
                    'C' => 'Kontinu Hasil Penggunaan Alat Ukur',
                    'D' => 'Ordinal Peringkat Berurutan Teratur',
                    'E' => 'Abstrak Konstruksi Matematika Murni'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data yang didapat melalui alat ukur dan dapat memiliki nilai pecahan koma/desimal secara logis disebut data Kuantitatif Kontinu.'
            ],
            // Q9: Jawaban D
            [
                'question' => 'Wali kelas mencatat bahwa siswa yang tidak hadir hari ini berjumlah 3 orang. Karena didapat dari proses menghitung orang satu per satu, jumlah kehadiran ini disebut data kuantitatif....',
                'image' => null,
                'options' => [
                    'A' => 'Nominal Berlabel Tekstual Bebas',
                    'B' => 'Kontinu Dengan Rentang Desimal',
                    'C' => 'Ordinal Bersistem Penilaian Ranking',
                    'D' => 'Diskrit Bilangan Bulat Hasil Hitung',
                    'E' => 'Terstruktur Pola Tabel Baris Kolom'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Kita tidak bisa membelah manusia menjadi bilangan desimal. Data angka bulat dari hasil menghitung cacah disebut data Diskrit.'
            ],
            // Q10: Jawaban E
            [
                'question' => 'Kumpulan nilai ujian ratusan siswa yang disimpan dengan sangat rapi ke dalam kotak-kotak baris dan kolom di aplikasi Microsoft Excel, adalah ciri mutlak dari wujud data....',
                'image' => null,
                'options' => [
                    'A' => 'Semi Terstruktur Berbasis Penanda Tag',
                    'B' => 'Tidak Terstruktur Komposisi Amat Bebas',
                    'C' => 'Kualitatif Deskriptif Rangkaian Kalimat',
                    'D' => 'Kuantitatif Campuran Karakter Bebas Liar',
                    'E' => 'Terstruktur Format Tabel Aplikasi Disiplin'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Komputer paling mudah membaca tabel. Format tabel baris dan kolom adalah wujud sejati dari data yang Terstruktur.'
            ],
            // Q11: Jawaban A
            [
                'question' => 'Menurut tips rahasia visualisasi, bentuk grafik "Diagram Batang (Bar Chart)" sangat tepat jika kita ingin melihat perbandingan nilai pada data yang berjenis....',
                'image' => null,
                'options' => [
                    'A' => 'Kategori label (Seperti Nominal dan Ordinal)',
                    'B' => 'Kelanjutan angka (Data Kontinu bilangan ukur)',
                    'C' => 'Komposisi file media gambar tanpa batas tegas',
                    'D' => 'Rekaman gelombang audio musik atau jenis suara',
                    'E' => 'Rangkaian dialog chat obrolan keseharian liar'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Diagram Batang memang diciptakan untuk membandingkan kelompok/kategori data (Misal: membandingkan Jumlah Laki-laki vs Perempuan).'
            ],
            // Q12: Jawaban B
            [
                'question' => 'Format file seperti JSON sangat disukai pembuat web karena tidak perlu tabel kaku, tapi cukup memakai "tag" penanda. Gaya penyimpanan yang tidak kaku ini disebut data....',
                'image' => null,
                'options' => [
                    'A' => 'Terstruktur Penuh Arsitektur Batas Tabel',
                    'B' => 'Semi Terstruktur Kategori Penuh Kelenturan',
                    'C' => 'Tidak Terstruktur Absolut Tanpa Komposisi',
                    'D' => 'Nominal Numerik Karakter Bilangan Pecahan',
                    'E' => 'Tingkat Tinggi Hasil Penggalian Dalam Lanjut'
                ],
                'correct_answer' => 'b',
                'explanation' => 'JSON tidak punya tabel ketat, tapi datanya tidak berantakan berkat sistem tag-nya. Posisi di tengah ini disebut Semi Terstruktur.'
            ],
            // Q13: Jawaban C
            [
                'question' => 'Sebagian besar informasi yang diunggah ke internet oleh netizen setiap hari berwujud foto, video TikTok, dan pesan suara WhatsApp. Secara ilmu data, format liar ini diklasifikasikan sebagai data....',
                'image' => null,
                'options' => [
                    'A' => 'Terstruktur Sistem Tabel Relasional Internal',
                    'B' => 'Semi Terstruktur Kumpulan Berkas Identitas',
                    'C' => 'Tidak Terstruktur Pola Media Tidak Beraturan',
                    'D' => 'Kuantitatif Murni Deretan Angka Matematika',
                    'E' => 'Kualitatif Deskripsi Format Surat Resmi Teks'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Foto dan pesan suara tidak memiliki batas sel, baris, maupun penanda kolom. Inilah alasan kuat mengapa mereka disebut Tidak Terstruktur.'
            ],
            // Q14: Jawaban D
            [
                'question' => 'Cara pengumpulan data yang paling cepat, murah, dan praktis jika pengurus OSIS ingin mengetahui pendapat dari 300 siswa sekaligus secara bersamaan adalah dengan membagikan....',
                'image' => null,
                'options' => [
                    'A' => 'Kamera video untuk merekam observasi diam-diam',
                    'B' => 'Undangan wawancara secara langsung satu per satu',
                    'C' => 'Buku catatan kosong untuk dokumentasi perpustakaan',
                    'D' => 'Survei atau kuesioner form berbasis platform digital',
                    'E' => 'Alat instrumen uji eksperimen tertutup laboratorium'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Link kuesioner digital (seperti Google Forms) dapat diisi ratusan anak pada detik yang sama dari HP masing-masing.'
            ],
            // Q15: Jawaban E
            [
                'question' => 'Proses pembersihan (Data Cleaning) wajib dilakukan agar jangan sampai ada nama siswa yang tertulis dua kali di daftar kelas. Jika dibiarkan, "Data Duplikat" ini akan menyebabkan...',
                'image' => null,
                'options' => [
                    'A' => 'Tampilan warna baris memudar dengan cepat',
                    'B' => 'Terjadinya kerusakan file dokumen mendadak',
                    'C' => 'Letak sel vertikal tertukar secara otomatis',
                    'D' => 'Aplikasi mengalami kebocoran kerahasiaan',
                    'E' => 'Perhitungan hasil rata-rata menjadi keliru'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Nama yang ganda membuat mesin mengira jumlah siswa lebih banyak dari aslinya, sehingga rumus rata-rata nilainya pasti akan salah.'
            ],
            // Q16: Jawaban A
            [
                'question' => 'Seringkali komputer kebingungan memproses data karena seseorang menuliskan nama kota "Banjarmasin", "banjarmasin", dan "BANJARMASIN". Data yang kotor akibat keteledoran jari ini disebut masalah....',
                'image' => null,
                'options' => [
                    'A' => 'Kesalahan penulisan ketik (Typo / Format Error)',
                    'B' => 'Kegagalan pengisian formulir (Missing Value Kritis)',
                    'C' => 'Penyalinan otomatis data yang sama persis (Duplikat)',
                    'D' => 'Kegagalan penerapan metodologi pengamatan manual',
                    'E' => 'Kekurangan kapasitas memori simpan komputer lokal'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Huruf besar dan kecil yang tidak seragam (Typo format) membuat komputer membacanya sebagai kota yang sama sekali berbeda.'
            ],
            // Q17: Jawaban B
            [
                'question' => 'Pada tampilan aplikasi pengolah angka (Spreadsheet), sebuah kotak kecil perpotongan silang antara Kolom C menurun dan Baris 5 mendatar disebut dengan istilah....',
                'image' => null,
                'options' => [
                    'A' => 'Tampilan Utuh Jendela Kerja (Worksheet File)',
                    'B' => 'Satuan Wadah Nilai Tunggal (Sel / Cell C5)',
                    'C' => 'Fungsi Bahasa Pemrograman Khusus (Formula Utama)',
                    'D' => 'Deretan Baris Utama (Header Identitas Kolom Tabel)',
                    'E' => 'Kumpulan Baris Keterangan (Tabel Eksekusi Lanjutan)'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Setiap kotak kecil tempat kita mengetik angka atau teks di dalam antarmuka Spreadsheet dinamakan Sel (Cell).'
            ],
            // Q18: Jawaban C
            [
                'question' => 'Jika kamu memblok daftar nilai seluruh kelas di Excel dan ingin komputer langsung memperlihatkan "skor tertinggi" yang diraih di kelas tersebut, kamu harus menggunakan perintah fungsi....',
                'image' => null,
                'options' => [
                    'A' => 'Penelusuran ambang angka nilai terendah (Fungsi MIN)',
                    'B' => 'Kalkulasi nilai sebaran tengah kelas rata (Fungsi AVG)',
                    'C' => 'Pelacakan capaian maksimum angka terbesar (Fungsi MAX)',
                    'D' => 'Pengkalkulasian total penjumlahan gabungan (Fungsi SUM)',
                    'E' => 'Penghitungan jumlah partisipan tes ujian (Fungsi COUNT)'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Fungsi MAX ditugaskan murni untuk memindai kolom dan menampilkan siapa pemilik angka paling besar (maksimal).'
            ],
            // Q19: Jawaban D
            [
                'question' => 'Apabila panitia lomba OSIS hanya ingin menghitung secara cepat "ada berapa banyak siswa" yang datanya sudah masuk ke dalam daftar tabel, panitia tersebut wajib menggunakan rumus....',
                'image' => null,
                'options' => [
                    'A' => 'Penguraian sebaran nilai poin tertinggi populasi (MAX)',
                    'B' => 'Penambahan volume absolut kumulatif seluruh skor (SUM)',
                    'C' => 'Pemecahan hasil ujian secara pukul nilai rata-rata (AVG)',
                    'D' => 'Pencacah kuantitas banyak kotak terisi data (Fungsi COUNT)',
                    'E' => 'Pencarian batas skor evaluasi terbawah populasi (Fungsi MIN)'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Fungsi COUNT berguna untuk "menghitung kepala" atau jumlah baris data yang sudah terisi dalam sebuah tabel rekapitulasi.'
            ],
            // Q20: Jawaban E
            [
                'question' => 'Setelah fakta mentah dari lapangan berhasil dibersihkan dan diproses sedemikian rupa, data tersebut akhirnya berubah menjadi sesuatu yang sangat berharga untuk pengambilan keputusan, yaitu....',
                'image' => null,
                'options' => [
                    'A' => 'Laporan daftar absensi pengamatan terstruktur',
                    'B' => 'Basis tabel mentah format berkas penyimpanan',
                    'C' => 'Sistem tata kelola perangkat lunak terintegrasi',
                    'D' => 'Struktur relasi tabel baris kolom antarmuka',
                    'E' => 'Informasi matang yang siap dimanfaatkan manusia'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Itulah esensi dari siklus data. Data yang tadinya mentah dan tak berarti, kini telah naik pangkat menjadi "Informasi" yang berguna.'
            ],
        ];

        // 5. Insert Batch Soal
        foreach ($questions as $q) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                
                // Mapping Options
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                
                'correct_answer' => strtolower($q['correct_answer']),
                'points' => 5, // 20 soal x 5 poin = 100
                'explanation' => $q['explanation']
            ]);
        }
        
        $this->command->info('Berhasil membuat 20 Soal Statement Evaluasi Akhir Bab 1: Data & Pengolahannya (Bahasa SMA & Distribusi Merata)!');
    }
}