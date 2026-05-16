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
            ['chapter_id' => $chapter->id], 
            [
                'title' => 'Evaluasi Akhir Bab 1: Pengenalan Data',
                'description' => 'Uji pemahamanmu tentang Definisi Data, Jenis-jenis Data, Struktur, dan Persiapan Data untuk AI.',
                'type' => 'final',
                'time_limit' => 45, // 45 Menit
            ]
        );

        // 3. Bersihkan soal lama agar tidak duplikat saat seeder dijalankan ulang
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar 20 Soal Lengkap (A-E)
        $questions = [
            // --- TOPIK: DEFINISI & KONSEP DASAR ---
            [
                'question' => 'Definisi yang paling tepat mengenai “Data” dalam konteks teknologi informasi adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Sebuah aplikasi untuk mengolah angka',
                    'B' => 'Kumpulan fakta, angka, atau informasi mentah yang belum diolah',
                    'C' => 'Hasil akhir dari sebuah keputusan bisnis',
                    'D' => 'Perangkat keras komputer untuk menyimpan file',
                    'E' => 'Kecerdasan buatan yang bisa berpikir sendiri'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Data adalah representasi fakta atau informasi mentah (raw material) sebelum diolah menjadi informasi yang berguna.'
            ],
            [
                'question' => 'Hubungan antara “Data” dan “Kecerdasan Buatan (AI)” dalam buku materi AI dianalogikan seperti....',
                'image' => null,
                'options' => [
                    'A' => 'Mobil dan Supirnya',
                    'B' => 'Kunci dan Gembok',
                    'C' => 'Mesin dan Bahan Bakar',
                    'D' => 'Guru dan Murid',
                    'E' => 'Dokter dan Pasien'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data adalah "bahan bakar" bagi AI. Tanpa data, mesin AI tidak akan bisa berjalan atau belajar.'
            ],
            [
                'question' => 'Alasan data dianggap penting dalam proses pengambilan keputusan (Decision Making) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Agar terlihat canggih dan modern',
                    'B' => 'Untuk menghabiskan anggaran perusahaan',
                    'C' => 'Agar keputusan didasarkan pada fakta dan bukti, bukan sekadar asumsi',
                    'D' => 'Supaya komputer tidak rusak',
                    'E' => 'Untuk memperumit masalah yang sederhana'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Fungsi utama data adalah memberikan bukti (evidence) agar keputusan yang diambil akurat dan objektif.'
            ],

            // --- TOPIK: JENIS DATA (KUALITATIF VS KUANTITATIF) ---
            [
                'question' => 'Contoh Data Kualitatif (Kategorikal) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Tinggi badan siswa (170 cm)',
                    'B' => 'Jumlah gol dalam pertandingan (3 gol)',
                    'C' => 'Suhu ruangan (25 derajat Celcius)',
                    'D' => 'Warna mobil (Merah, Hitam, Putih)',
                    'E' => 'Kecepatan lari (20 km/jam)'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Warna mobil adalah label atau deskripsi kualitas (kualitatif), bukan angka yang bisa dihitung secara matematis.'
            ],
            [
                'question' => 'Contoh Data Kualitatif (Kategorikal) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Nominal',
                    'B' => 'Ordinal',
                    'C' => 'Diskrit',
                    'D' => 'Kontinu',
                    'E' => 'Unstructured'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Ordinal adalah data kategori yang memiliki urutan atau tingkatan (Ranking).'
            ],
            [
                'question' => 'Data “Tingkat Kepuasan Pelanggan” dengan pilihan Sangat Puas, Puas, Netral, dan Kecewa termasuk jenis data....',
                'image' => null,
                'options' => [
                    'A' => 'Kontinu',
                    'B' => 'Nominal',
                    'C' => 'Diskrit',
                    'D' => 'Kualitatif',
                    'E' => 'Abstrak'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data Diskrit (Discrete) adalah data angka bulat yang tidak mungkin berbentuk pecahan (contoh: tidak ada 1,5 siswa).'
            ],
            [
                'question' => 'Pernyataan yang benar mengenai Data Kontinu adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Datanya berupa label nama tanpa urutan',
                    'B' => 'Datanya berupa angka bulat hasil menghitung',
                    'C' => 'Datanya berupa angka desimal hasil pengukuran (ukur)',
                    'D' => 'Datanya tidak bisa diukur dengan alat ukur',
                    'E' => 'Datanya berupa gambar dan suara'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data Kontinu berasal dari pengukuran dan bisa memiliki nilai desimal tak terbatas (contoh: tinggi, berat, suhu).'
            ],

            // --- TOPIK: STRUKTUR DATA (STRUCTURED VS UNSTRUCTURED) ---
            [
                'question' => 'Data yang disusun rapi dalam format baris dan kolom (seperti di Excel) disebut....',
                'image' => null,
                'options' => [
                    'A' => 'Unstructured Data',
                    'B' => 'Structured Data',
                    'C' => 'Big Data',
                    'D' => 'Semi-structured Data',
                    'E' => 'Raw Data'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Structured Data (Terstruktur) adalah data yang memiliki format tetap dan terorganisir dalam tabel.'
            ],
            [
                'question' => 'Contoh data Tidak Terstruktur (Unstructured Data) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Tabel absensi siswa',
                    'B' => 'Laporan keuangan di Excel',
                    'C' => 'Database SQL toko online',
                    'D' => 'Foto, Video, dan Rekaman Suara',
                    'E' => 'Daftar nilai ujian di rapor'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Foto, video, dan suara tidak memiliki struktur baris/kolom yang kaku, sehingga disebut Unstructured Data.'
            ],
            [
                'question' => 'Aplikasi pengolah angka (Spreadsheet) seperti Microsoft Excel sangat cocok digunakan untuk mengelola jenis data....',
                'image' => null,
                'options' => [
                    'A' => 'Data Terstruktur',
                    'B' => 'Data Gambar',
                    'C' => 'Data Suara',
                    'D' => 'Data Video',
                    'E' => 'Data Abstrak'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Excel dirancang khusus untuk data tabular (terstruktur) yang terdiri dari baris dan kolom.'
            ],
            [
                'question' => 'Alasan komputer tradisional sulit memahami data tidak terstruktur (seperti foto kucing) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Karena ukuran filenya terlalu kecil',
                    'B' => 'Karena komputer tidak suka kucing',
                    'C' => 'Karena data tersebut tidak memiliki pola baris dan kolom yang jelas untuk dihitung',
                    'D' => 'Karena foto kucing selalu berwarna hitam putih',
                    'E' => 'Karena komputer hanya bisa membaca bahasa Inggris'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Komputer butuh data yang terorganisir. Data gambar hanyalah kumpulan piksel warna tanpa label yang jelas bagi mesin tradisional.'
            ],

            // --- TOPIK: DATA PREPARATION & LABELING ---
            [
                'question' => 'Makna istilah “Garbage In, Garbage Out” dalam dunia data adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Data sampah harus dibuang ke tempat sampah',
                    'B' => 'Jika data yang dimasukkan berkualitas buruk, maka hasil analisisnya juga akan buruk',
                    'C' => 'Komputer bisa mengubah sampah menjadi emas',
                    'D' => 'Kita harus mendaur ulang komputer bekas',
                    'E' => 'Semua data adalah sampah yang tidak berguna'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Kualitas output AI/Analisis sangat bergantung pada kualitas input datanya. Data jelek = Hasil jelek.'
            ],
            [
                'question' => 'Proses menghapus data ganda (duplikat), memperbaiki data kosong, dan membuang data yang salah disebut....',
                'image' => null,
                'options' => [
                    'A' => 'Data Labeling',
                    'B' => 'Data Cleaning',
                    'C' => 'Data Visualization',
                    'D' => 'Data Mining',
                    'E' => 'Data Storing'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Data Cleaning (Pembersihan Data) adalah langkah wajib sebelum data diolah agar hasilnya akurat.'
            ],
            [
                'question' => 'Fungsi proses “Labeling” (Pemberian Label) dalam melatih AI adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Agar file terlihat berwarna-warni',
                    'B' => 'Memberikan "kunci jawaban" atau nama pada data agar komputer bisa mengenali pola',
                    'C' => 'Menghapus data yang tidak penting',
                    'D' => 'Mengubah gambar menjadi teks',
                    'E' => 'Membesarkan ukuran file'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Labeling memberi tahu komputer "Ini adalah gambar Kucing", sehingga komputer bisa belajar ciri-ciri kucing.'
            ],
            [
                'question' => 'Yang dimaksud dengan “Outlier” (Pencilan) dalam sebuah kumpulan data adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Data yang paling sering muncul',
                    'B' => 'Data yang nilainya rata-rata',
                    'C' => 'Data yang nilainya sangat menyimpang (jauh berbeda) dari data lainnya',
                    'D' => 'Data yang hilang atau kosong',
                    'E' => 'Data yang sudah divalidasi'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Outlier adalah data ekstrem yang nilainya aneh atau jauh dari mayoritas data lain (misal: Nilai 1000 padahal lainnya 1-10).'
            ],
            [
                'question' => 'Cara AI belajar mengenali objek (seperti anak kecil belajar) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Dengan menghafal kamus bahasa',
                    'B' => 'Dengan melihat banyak contoh data yang sudah dilabeli dan mencari pola persamaannya',
                    'C' => 'Dengan menebak-nebak secara acak',
                    'D' => 'Dengan tidur dan bermimpi',
                    'E' => 'AI sudah pintar dari pabriknya tanpa perlu belajar'
                ],
                'correct_answer' => 'b',
                'explanation' => 'AI belajar melalui "Supervised Learning" (pembelajaran terawasi) dengan melihat ribuan contoh yang sudah diberi label.'
            ],
            [
                'question' => 'Langkah yang tepat untuk melatih AI membedakan “Apel” dan “Jeruk” adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Memasukkan satu foto apel saja',
                    'B' => 'Memasukkan foto campur aduk tanpa nama',
                    'C' => 'Mengumpulkan banyak foto apel dan jeruk, lalu memberi label "Apel" dan "Jeruk" dengan benar',
                    'D' => 'Menulis kode program tanpa data',
                    'E' => 'Membiarkan komputer mencari sendiri di internet'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Kita perlu memberikan dataset yang seimbang dan terlabeli dengan jelas untuk setiap kategori.'
            ],

            // --- TOPIK: ETIKA & TAMBAHAN ---
            [
                'question' => 'Etika yang harus diperhatikan saat mengumpulkan data foto atau suara orang lain untuk proyek AI adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Mengambil diam-diam agar natural',
                    'B' => 'Meminta izin terlebih dahulu kepada pemiliknya (Consent)',
                    'C' => 'Langsung menyebarkannya di media sosial',
                    'D' => 'Menjual datanya untuk keuntungan pribadi',
                    'E' => 'Mengedit foto tersebut menjadi jelek'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Privasi dan izin (consent) adalah etika utama dalam pengumpulan data. Kita tidak boleh menggunakan data pribadi orang tanpa izin.'
            ],
            [
                'question' => 'Format file yang mewakili Data Terstruktur adalah....',
                'image' => null,
                'options' => [
                    'A' => '.mp3 (Audio)',
                    'B' => '.jpg (Gambar)',
                    'C' => '.mp4 (Video)',
                    'D' => '.csv (Comma Separated Values)',
                    'E' => '.png (Gambar)'
                ],
                'correct_answer' => 'd',
                'explanation' => 'CSV adalah format file teks sederhana yang menyimpan data dalam bentuk tabel (baris dan kolom).'
            ],
            [
                'question' => 'Peran manusia dalam proses “Data Science” yang bertugas memberi label pada data disebut....',
                'image' => null,
                'options' => [
                    'A' => 'Programmer',
                    'B' => 'Annotator (Pemberi Label)',
                    'C' => 'Hacker',
                    'D' => 'Gamer',
                    'E' => 'Influencer'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Annotator adalah orang yang bertugas secara manual melabeli data untuk pelatihan AI.'
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
        
        $this->command->info('Berhasil membuat 20 Soal Evaluasi Akhir Bab 1: Pengenalan Data!');
    }
}