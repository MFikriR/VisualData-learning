<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;

class Bab3_05_KuisAkhirSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Pastikan Bab 3 Ada
        $chapter = Chapter::where('sequence', 3)->first();
        
        if (!$chapter) {
            $this->command->error('Bab 3 tidak ditemukan! Jalankan MateriBab2Seeder dulu.');
            return;
        }

        // 2. Buat atau Update Quiz Header
        // PERBAIKAN: Ubah 'duration_minutes' menjadi 'time_limit'
        $quiz = Quiz::updateOrCreate(
            ['chapter_id' => $chapter->id, 'type' => 'final'], 
            [
                'title' => 'Evaluasi Akhir Bab 3: Clustering & K-Means',
                'description' => 'Uji pemahamanmu tentang Konsep Clustering, Perhitungan Jarak, dan Algoritma K-Means.',
                'time_limit' => 45, // <--- SUDAH DIPERBAIKI
            ]
        );

        // 3. Bersihkan soal lama
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar Soal Lengkap (20 Soal)
        $questions = [
            [
                'question' => 'Clustering merupakan teknik utama dalam Unsupervised Learning, yang membedakannya dari Supervised Learning adalah data input yang digunakan bersifat ....',
                'image' => null,
                'options' => [
                    'A' => 'tidak memiliki label atau kunci jawaban',
                    'B' => 'memiliki label yang jelas dan terstruktur',
                    'C' => 'hanya berupa data teks dan gambar',
                    'D' => 'selalu berbentuk data kategorikal',
                    'E' => 'membutuhkan guru untuk melatih komputer'
                ],
                'correct_answer' => 'a', // Ubah ke huruf kecil biar aman
                'explanation' => 'Unsupervised Learning bekerja pada data mentah yang tidak memiliki label/target output.'
            ],
            [
                'question' => 'Berdasarkan karakteristik data inputnya, kotak kosong pada tabel tersebut seharusnya diisi dengan keterangan ....',
                'image' => 'images/quiz/q2_tabel_perbandingan.png', 
                'options' => [
                    'A' => 'data berlabel',
                    'B' => 'data tanpa label (data mentah)',
                    'C' => 'data hasil prediksi',
                    'D' => 'data validasi',
                    'E' => 'data training berlabel'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Unsupervised Learning menggunakan data input tanpa label.'
            ],
            [
                'question' => 'Dalam terminologi K-Means, titik pusat atau "ketua kelas" dari sebuah kelompok yang nilainya dihitung dari rata-rata (mean) seluruh anggota kelompok tersebut dinamakan ....',
                'image' => null,
                'options' => [
                    'A' => 'Cluster',
                    'B' => 'Outlier',
                    'C' => 'Centroid',
                    'D' => 'Inertia',
                    'E' => 'Feature'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Centroid adalah titik pusat dari sebuah klaster.'
            ],
            [
                'question' => 'Nilai yang digunakan untuk mengukur "seberapa padat" sebuah klaster, di mana semakin kecil nilainya maka semakin baik kualitas klasternya karena data berkumpul rapat dekat pusat, dikenal dengan istilah ....',
                'image' => null,
                'options' => [
                    'A' => 'Euclidean',
                    'B' => 'Manhattan',
                    'C' => 'Iterasi',
                    'D' => 'Inertia (SSE)',
                    'E' => 'Konvergensi'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Inertia atau SSE (Sum of Squared Errors) mengukur kepadatan klaster.'
            ],
            [
                'question' => 'Prinsip kerja utama dari Clustering berfokus pada pengenalan pola (Pattern Recognition), yaitu memaksimalkan kemiripan internal dan memaksimalkan ....',
                'image' => null,
                'options' => [
                    'A' => 'jumlah data dalam satu kelompok',
                    'B' => 'kecepatan waktu pemrosesan data',
                    'C' => 'jumlah fitur yang digunakan',
                    'D' => 'nilai rata-rata seluruh data',
                    'E' => 'perbedaan antar kelompok yang satu dengan yang lain'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Tujuan clustering: Intraclass similarity tinggi, Interclass dissimilarity tinggi (beda antar kelompok).'
            ],
            [
                'question' => 'Karakteristik utama dari Euclidean Distance dalam perhitungan jarak antar data adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'sangat sensitif terhadap perubahan posisi dan cocok untuk data kontinu',
                    'B' => 'menghitung jarak berdasarkan selisih absolut koordinat',
                    'C' => 'tidak terpengaruh oleh perbedaan skala data',
                    'D' => 'hanya bisa digunakan pada data kategorikal',
                    'E' => 'lebih tahan terhadap data outlier dibandingkan metode lain'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Euclidean mengukur jarak garis lurus, sangat sensitif terhadap posisi (koordinat).'
            ],
            [
                'question' => 'Alasan utama diperlukannya proses normalisasi (Min-Max Scaling) sebelum menghitung jarak pada data dengan satuan berbeda (misalnya Gaji dalam jutaan dan Usia dalam puluhan) adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'untuk mengubah semua data menjadi bilangan bulat',
                    'B' => 'agar fitur dengan angka besar tidak mendominasi fitur dengan angka kecil',
                    'C' => 'untuk menghapus data yang kosong atau null',
                    'D' => 'agar jumlah klaster yang terbentuk menjadi lebih banyak',
                    'E' => 'supaya komputer bisa bekerja lebih cepat tanpa menghitung'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Normalisasi menyeimbangkan bobot setiap fitur agar perhitungan jarak adil.'
            ],
            [
                'question' => 'Rumus di atas merupakan metode perhitungan jarak yang disebut ....',
                'image' => 'images/quiz/q8_rumus_euclidean.png', 
                'options' => [
                    'A' => 'Manhattan Distance',
                    'B' => 'Minkowski Distance',
                    'C' => 'Euclidean Distance',
                    'D' => 'Hamming Distance',
                    'E' => 'Mahalanobis Distance'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Rumus akar kuadrat selisih kuadrat adalah ciri khas Euclidean Distance (Pythagoras).'
            ],
            [
                'question' => 'Jika kita mengibaratkan seorang supir taksi yang harus melewati blok-blok gedung berbentuk kotak di sebuah kota untuk mencapai tujuan, metode pengukuran jarak yang paling relevan dengan analogi tersebut adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Euclidean Distance',
                    'B' => 'Chebyshev Distance',
                    'C' => 'Cosine Similarity',
                    'D' => 'Manhattan Distance',
                    'E' => 'Correlation Distance'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Manhattan Distance sering disebut Taxicab Geometry karena mengikuti pola grid blok kota.'
            ],
            [
                'question' => 'Prinsip dasar perhitungan jarak dalam algoritma clustering menyatakan bahwa semakin kecil nilai jarak antara dua titik data, maka ....',
                'image' => null,
                'options' => [
                    'A' => 'kedua data tersebut semakin berbeda',
                    'B' => 'salah satu data adalah outlier',
                    'C' => 'kedua data harus dipisah ke klaster berbeda',
                    'D' => 'algoritma akan berhenti bekerja',
                    'E' => 'kedua data tersebut semakin mirip (satu kelompok)'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Jarak kecil = Mirip. Jarak besar = Beda.'
            ],
            [
                'question' => 'Langkah pertama (Inisialisasi) yang dilakukan oleh algoritma K-Means setelah menentukan jumlah K adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'memilih titik pusat (centroid) awal secara acak',
                    'B' => 'menghitung rata-rata seluruh data',
                    'C' => 'mengukur jarak data menggunakan Euclidean',
                    'D' => 'memperbarui posisi titik pusat',
                    'E' => 'menghitung nilai Inertia atau SSE'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Langkah awal K-Means adalah inisialisasi centroid secara random.'
            ],
            [
                'question' => 'Sebuah algoritma K-Means dikatakan telah selesai atau berhenti berproses (stop) apabila kondisi berikut terpenuhi, yaitu ....',
                'image' => null,
                'options' => [
                    'A' => 'jumlah data dalam setiap klaster sudah sama rata',
                    'B' => 'posisi centroid sudah tidak berubah lagi (konvergen)',
                    'C' => 'nilai jarak antar data menjadi nol',
                    'D' => 'komputer telah mencapai batas waktu pemrosesan',
                    'E' => 'pengguna menekan tombol berhenti secara manual'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Konvergensi terjadi saat posisi centroid stabil (tidak berpindah lagi).'
            ],
            [
                'question' => 'Tindakan yang dilakukan pada "Langkah X" adalah ....',
                'image' => 'images\quiz\q14_LangkahX.png',
                'options' => [
                    'A' => 'menghapus data yang jauh dari centroid',
                    'B' => 'mengubah nilai K menjadi lebih besar',
                    'C' => 'memperbarui posisi centroid ke rata-rata (mean) anggota baru',
                    'D' => 'melakukan normalisasi data ulang',
                    'E' => 'menghitung total inersia global'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Setelah penugasan (assignment), langkah selanjutnya adalah Update Centroid.'
            ],
            [
                'question' => 'Pada tahap "Penugasan (Assignment)", setiap titik data akan dimasukkan ke dalam kelompok berdasarkan ....',
                'image' => null,
                'options' => [
                    'A' => 'urutan masuknya data ke dalam sistem',
                    'B' => 'nilai tertinggi dari fitur data tersebut',
                    'C' => 'kemiripan warna pada visualisasi data',
                    'D' => 'jarak terdekat data tersebut terhadap centroid',
                    'E' => 'rata-rata nilai dari seluruh centroid yang ada'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Data akan bergabung dengan centroid yang memiliki jarak Euclidean paling kecil (terdekat).'
            ],
            [
                'question' => 'Dalam penamaan algoritma "K-Means", istilah "Means" merujuk pada metode penentuan pusat kelompok yang menggunakan ....',
                'image' => null,
                'options' => [
                    'A' => 'nilai tengah (median) data',
                    'B' => 'nilai yang paling sering muncul (modus)',
                    'C' => 'nilai maksimum dari data',
                    'D' => 'nilai minimum dari data',
                    'E' => 'nilai rata-rata (mean) dari anggota kelompok'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Means = Rata-rata.'
            ],
            [
                'question' => 'Berdasarkan grafik di bawah, jumlah klaster (K) yang paling efisien untuk dipilih adalah ....',
                'image' => 'images/quiz/q13_langkah_kmeans.png',
                'options' => [
                    'A' => '3 (tiga)',
                    'B' => '1 (satu)',
                    'C' => '5 (lima)',
                    'D' => '10 (sepuluh)',
                    'E' => '2 (dua)'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Pada grafik Elbow Method, titik siku (tekukan tajam) berada di angka 3.'
            ],
            [
                'question' => 'Salah satu kelemahan utama algoritma K-Means yang perlu diwaspadai saat mengolah data yang kotor adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'proses komputasinya sangat lambat untuk data besar',
                    'B' => 'sangat sensitif terhadap outlier (data pencilan) yang bisa merusak posisi rata-rata',
                    'C' => 'sulit dipahami secara logika dan konsep',
                    'D' => 'tidak tersedia di perangkat lunak analisis data umum',
                    'E' => 'hanya bisa digunakan untuk data teks'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Outlier yang nilainya ekstrem akan menarik rata-rata (mean) menjauh, membuat centroid tidak akurat.'
            ],
            [
                'question' => 'Jika dilakukan simulasi manual K-Means dengan K=2 pada data nilai siswa: A=2, D=12. Jika Centroid 1 ada di posisi 3 dan Centroid 2 ada di posisi 20, maka Data D (nilai 12) akan bergabung ke ....',
                'image' => null,
                'options' => [
                    'A' => 'Centroid 1, karena 12 lebih dekat ke 3 daripada 20',
                    'B' => 'tidak masuk ke kelompok manapun',
                    'C' => 'Kelompok 2, karena jaraknya (8) lebih dekat ke Centroid 2 dibanding ke Centroid 1 (9)',
                    'D' => 'kedua kelompok secara bersamaan',
                    'E' => 'menjadi outlier karena nilainya genap'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Jarak ke C1(3) = |12-3| = 9. Jarak ke C2(20) = |12-20| = 8. Karena 8 < 9, maka masuk ke C2 (Kelompok 2).'
            ],
            [
                'question' => 'Proses pengulangan langkah "Penugasan" dan "Pembaruan Centroid" secara terus menerus dalam algoritma K-Means disebut sebagai proses ....',
                'image' => null,
                'options' => [
                    'A' => 'Normalisasi',
                    'B' => 'Inisialisasi',
                    'C' => 'Visualisasi',
                    'D' => 'Iterasi',
                    'E' => 'Evaluasi'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Pengulangan langkah algoritma disebut Iterasi.'
            ],
            [
                'question' => 'Analogi dunia nyata yang paling tepat menggambarkan proses Clustering pada data buku perpustakaan tanpa label genre adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'pustakawan menyusun buku berdasarkan daftar inventaris yang sudah ada',
                    'B' => 'pustakawan memisahkan buku rusak dari buku yang bagus',
                    'C' => 'pustakawan mengurutkan buku berdasarkan tahun terbit dari yang terlama',
                    'D' => 'pustakawan menempelkan stiker kode pada buku yang baru datang',
                    'E' => 'pustakawan menumpuk buku yang memiliki kata kunci mirip (misal: naga, sihir) di satu rak yang sama'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Mengelompokkan berdasarkan kemiripan isi (kata kunci) tanpa label genre sebelumnya adalah analogi Clustering.'
            ],
        ];

        // 5. Insert Batch (DENGAN STRUKTUR BARU)
        foreach ($questions as $q) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['question'],
                'image' => $q['image'], // Ubah 'image_path' jadi 'image'
                
                // MAPPING MANUAL ARRAY KE KOLOM DATABASE
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                
                'correct_answer' => $q['correct_answer'],
                'points' => 5, // Bobot per soal
                'explanation' => $q['explanation'] // Pastikan kolom ini ada di migrasi, jika error, comment dulu
            ]);
        }
        
        $this->command->info('Berhasil menyuntikkan 20 Soal Evaluasi Akhir Bab 2!');
    }
}