<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;

class PrePostTestSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan Data Pre-Test & Post-Test Lama
        $oldQuizzes = Quiz::whereIn('type', ['pre_test', 'post_test'])->get();
        foreach ($oldQuizzes as $oq) {
            Question::where('quiz_id', $oq->id)->delete();
            $oq->delete();
        }

        // 2. Buat Header Kuis Pre-Test
        $preTest = Quiz::create([
            'chapter_id' => null,
            'title' => 'Evaluasi Kemampuan Awal (Pre-Test)',
            'description' => 'Uji pemahaman awalmu sebelum mempelajari modul Pengolahan Data, Visualisasi, dan Clustering.',
            'type' => 'pre_test',
            'time_limit' => 30,
        ]);

        // 3. Buat Header Kuis Post-Test
        $postTest = Quiz::create([
            'chapter_id' => null, 
            'title' => 'Ujian Akhir Pembelajaran (Post-Test)',
            'description' => 'Uji pemahaman akhirmu setelah menyelesaikan seluruh modul untuk mengukur perkembangan belajarmu.',
            'type' => 'post_test',
            'time_limit' => 30,
        ]);

        // 4. Daftar 10 Soal Ringkas & Integratif
        $questions = [
            // BAB 1: SOAL 1
            [
                'question' => 'Manakah dari pernyataan berikut yang paling tepat menggambarkan perbedaan mendasar antara data dan informasi?',
                'image' => null,
                'options' => [
                    'A' => 'Data berbentuk angka, sedangkan informasi selalu berbentuk kalimat deskriptif.',
                    'B' => 'Data adalah fakta mentah, sedangkan informasi adalah data yang diolah dan diberi konteks sehingga bermakna.',
                    'C' => 'Data hanya digunakan komputer, sedangkan informasi hanya digunakan manusia.',
                    'D' => 'Data berasal dari internet, sedangkan informasi dari buku perpustakaan.',
                    'E' => 'Data selalu akurat, sedangkan informasi berisi opini yang belum pasti.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Data adalah fakta mentah (raw facts) yang belum diberi konteks, sedangkan informasi adalah data yang telah diolah dan diberi konteks sehingga memiliki makna dan nilai guna.'
            ],

            // BAB 1: SOAL 2
            [
                'question' => 'Seorang peneliti mencatat tinggi badan siswa (165,5 cm) dan jumlah kelereng (25 butir). Klasifikasi jenis data numerik yang tepat untuk kedua data tersebut berturut-turut adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Tinggi badan adalah data diskrit, sedangkan kelereng adalah data kontinu.',
                    'B' => 'Tinggi badan adalah data kualitatif, sedangkan kelereng adalah data kuantitatif.',
                    'C' => 'Tinggi badan adalah data kontinu (pengukuran), sedangkan kelereng adalah data diskrit (cacahan).',
                    'D' => 'Tinggi badan adalah data nominal, sedangkan kelereng adalah data ordinal.',
                    'E' => 'Kedua data merupakan data tidak terstruktur.'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data hasil pengukuran bernilai desimal/rentang adalah data kontinu, sedangkan data hasil menghitung/cacah berupa bilangan bulat adalah data diskrit.'
            ],

            // BAB 1: SOAL 3
            [
                'question' => 'Mengapa prinsip "Garbage In, Garbage Out" (GIGO) sangat krusial untuk diperhatikan sebelum menganalisis data atau melatih model AI?',
                'image' => null,
                'options' => [
                    'A' => 'Karena data yang terlalu banyak membuat memori komputer penuh.',
                    'B' => 'Karena jika data masukan kotor/salah, maka hasil analisis dan keputusan dipastikan salah.',
                    'C' => 'Karena data kotor otomatis diperbaiki oleh sistem.',
                    'D' => 'Karena model AI tidak membutuhkan pembersihan data.',
                    'E' => 'Karena data mentah tidak boleh diolah sama sekali.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Prinsip GIGO menyatakan bahwa kualitas keluaran (output) sangat bergantung pada masukan (input). Data kotor atau salah akan menghasilkan analisis/keputusan yang salah.'
            ],

            // BAB 2: SOAL 4
            [
                'question' => 'Perbedaan visual paling utama antara Histogram dan Diagram Batang (Bar Chart) beserta alasan metodologisnya adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Histogram bercelah karena datanya kategorikal, sedangkan Diagram Batang tidak bercelah.',
                    'B' => 'Histogram menempel tanpa celah (data kontinu), sedangkan Diagram Batang bercelah (kategori terpisah).',
                    'C' => 'Diagram Batang bernuansa 3D, sedangkan Histogram berlatar polos.',
                    'D' => 'Histogram memuat data waktu, sedangkan Diagram Batang memuat data wilayah.',
                    'E' => 'Tidak ada perbedaan antara Histogram dan Diagram Batang.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Histogram menggambarkan distribusi variabel kontinu (interval/bins) sehingga batangnya saling menempel tanpa celah, sedangkan Diagram Batang menggambarkan kategori diskrit/terpisah yang dipisahkan oleh spasi (gap).'
            ],

            // BAB 2: SOAL 5
            [
                'question' => 'Sebuah grafik batang tingkat kepuasan dipotong (Truncated Y-Axis) dan dimulai dari 90%, sehingga beda 91% dan 94% tampak 4 kali lebih tinggi. Mengapa ini tergolong visualisasi menyesatkan?',
                'image' => null,
                'options' => [
                    'A' => 'Melanggar Zero Baseline sehingga membesar-besarkan perbedaan kecil secara manipulatif.',
                    'B' => 'Diagram batang tidak boleh digunakan untuk persentase.',
                    'C' => 'Warna batang yang digunakan tidak seragam.',
                    'D' => 'Persentase harus disajikan dalam Box Plot.',
                    'E' => 'Data persentase tidak boleh dibuat grafik.'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Memotong Sumbu Y melanggar Zero Baseline dan Principle of Proportional Ink, sehingga perbedaan visual tampak jauh lebih dramatis dari nilai numerik sebenarnya.'
            ],

            // BAB 2: SOAL 6
            [
                'question' => 'Komponen visual pada Box Plot yang menandakan keberadaan data pencilan (outlier) berdasarkan rumus pagar Q3 + (1,5 x IQR) adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Garis Median (Q2).',
                    'B' => 'Titik-titik tunggal di luar garis kumis (whisker).',
                    'C' => 'Lebar kotak interkuartil.',
                    'D' => 'Garis rata-rata (Mean).',
                    'E' => 'Sumbu Y pada skala interval.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Data yang nilainya melampaui batas pagar dikategorikan sebagai outlier dan digambarkan sebagai titik tunggal terpisah di luar garis whisker.'
            ],

            // BAB 2: SOAL 7
            [
                'question' => 'Pada Scatter Plot, sebaran titik bergerak naik dari kiri bawah ke kanan atas. Pernyataan kritis yang paling tepat mengenai temuan tersebut adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Terjadi korelasi negatif yang membuktikan sebab-akibat.',
                    'B' => 'Terjadi korelasi positif, namun tidak otomatis membuktikan sebab-akibat (Correlation != Causation).',
                    'C' => 'Tidak ada hubungan sama sekali antara variabel X dan Y.',
                    'D' => 'Data terbukti mengandung kesalahan sampel.',
                    'E' => 'Variabel X dan Y bersifat kualitatif nominal.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Pola miring naik menandakan korelasi positif. Namun, korelasi tidak sama dengan kausalitas (sebab-akibat) karena kenaikan bisa dipicu oleh variabel ketiga.'
            ],

            // BAB 3: SOAL 8
            [
                'question' => 'Mengapa algoritma pengelompokan data seperti K-Means dikategorikan ke dalam paradigma Unsupervised Learning (Pembelajaran Tanpa Pengawasan)?',
                'image' => null,
                'options' => [
                    'A' => 'Karena memerlukan kunci jawaban (label kelas) pada data latih.',
                    'B' => 'Karena mengolah data tanpa label untuk menemukan pola kelompok secara mandiri.',
                    'C' => 'Karena prosesnya tidak bisa dijalankan oleh komputer.',
                    'D' => 'Karena hanya memproses foto dan video.',
                    'E' => 'Karena wajib diawasi manusia setiap detik.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Unsupervised Learning mengelompokkan data tanpa label awal dengan mencari struktur/pola alami berdasarkan kedekatan sifat data.'
            ],

            // BAB 3: SOAL 9
            [
                'question' => 'Pada algoritma K-Means, dasar utama yang digunakan untuk mengalokasikan suatu titik data ke dalam kelompok (cluster) tertentu pada setiap iterasi adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Ukuran file dan format penyimpanan data.',
                    'B' => 'Jarak Euclidean terpendek antara titik data dengan titik pusat cluster (centroid).',
                    'C' => 'Nilai maksimum dikurangi nilai minimum populasi.',
                    'D' => 'Urutan alfabetis nama pemilik data.',
                    'E' => 'Tebakan acak sistem pada perulangan.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Pada K-Means, setiap titik data dihitung jaraknya ke seluruh centroid menggunakan metrik jarak (seperti Jarak Euclidean), lalu dialokasikan ke cluster dengan centroid terdekat.'
            ],

            // BAB 3: SOAL 10
            [
                'question' => 'Pada pengujian variasi nilai K terhadap nilai Sum of Squared Errors (SSE) dalam K-Means, jumlah cluster optimal (K) ditentukan dengan Metode Elbow dengan cara mencari....',
                'image' => null,
                'options' => [
                    'A' => 'Nilai K yang menghasilkan nilai SSE paling tinggi.',
                    'B' => 'Titik siku (patahan grafik) di mana penurunan nilai SSE mulai melambat drastis.',
                    'C' => 'Nilai K yang sama dengan jumlah total titik data.',
                    'D' => 'Nilai K yang bernilai nol.',
                    'E' => 'Titik awal sebelum simulasi dijalankan.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Metode Elbow menentukan K optimal dengan mengidentifikasi titik patahan (siku) pada grafik SSE vs K, yaitu titik di mana penambahan K tidak lagi memberikan penurunan SSE secara signifikan.'
            ],
        ];

        // 5. Masukkan Soal Identik ke Pre-Test DAN Post-Test
        foreach ($questions as $q) {
            Question::create([
                'quiz_id' => $preTest->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                'correct_answer' => strtolower($q['correct_answer']),
                'points' => 10,
                'explanation' => $q['explanation']
            ]);

            Question::create([
                'quiz_id' => $postTest->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                'correct_answer' => strtolower($q['correct_answer']),
                'points' => 10,
                'explanation' => $q['explanation']
            ]);
        }
        
        $this->command->info('✅ Berhasil menyuntikkan 10 Soal Integratif Materi Baru untuk Pre-Test & Post-Test!');
    }
}