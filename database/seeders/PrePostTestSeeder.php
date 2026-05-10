<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;

class PrePostTestSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan Data Pre-Test & Post-Test Lama (Mencegah Duplikat jika di-run ulang)
        $oldQuizzes = Quiz::whereIn('type', ['pre_test', 'post_test'])->get();
        foreach ($oldQuizzes as $oq) {
            Question::where('quiz_id', $oq->id)->delete();
            $oq->delete();
        }

        // 2. Buat Kuis Pre-Test
        $preTest = Quiz::create([
            'chapter_id' => null, // Pre/Post test biasanya tidak terikat 1 bab spesifik
            'title' => 'Evaluasi Kemampuan Awal (Pre-Test)',
            'description' => 'Uji pemahaman awalmu sebelum mempelajari modul Visualisasi dan Clustering Data.',
            'type' => 'pre_test',
            'time_limit' => 30, // 30 Menit
        ]);

        // 3. Buat Kuis Post-Test
        $postTest = Quiz::create([
            'chapter_id' => null, 
            'title' => 'Ujian Akhir Pembelajaran (Post-Test)',
            'description' => 'Uji pemahaman akhirmu setelah menyelesaikan seluruh modul untuk melihat perkembangan belajarmu.',
            'type' => 'post_test',
            'time_limit' => 30, // 30 Menit
        ]);

        // 4. Daftar 10 Soal Lengkap (Mencakup Visualisasi Data & K-Means Clustering)
        $questions = [
            [
                'question' => 'Apa tujuan utama dari proses Visualisasi Data?',
                'image' => null,
                'options' => [
                    'A' => 'Mengubah data teks menjadi angka agar mudah dihitung komputer',
                    'B' => 'Menyembunyikan data rahasia dari publik',
                    'C' => 'Menyajikan data kompleks dalam bentuk grafis agar pola dan informasi mudah dipahami manusia',
                    'D' => 'Menghapus data yang tidak penting (Data Cleaning)',
                    'E' => 'Meningkatkan ukuran file database'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Visualisasi data bertujuan menerjemahkan data yang kompleks menjadi representasi visual (grafik/diagram) agar wawasan dan pola data lebih mudah ditangkap oleh otak manusia.'
            ],
            [
                'question' => 'Jika Anda ingin melihat persebaran umur siswa di sebuah sekolah (melihat rentang dan frekuensi), jenis grafik apa yang paling tepat digunakan?',
                'image' => null,
                'options' => [
                    'A' => 'Pie Chart (Diagram Lingkaran)',
                    'B' => 'Histogram',
                    'C' => 'Scatter Plot (Diagram Titik)',
                    'D' => 'Line Chart (Diagram Garis)',
                    'E' => 'Radar Chart'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Histogram sangat tepat digunakan untuk melihat distribusi atau frekuensi data numerik yang sifatnya kontinu, seperti rentang umur.'
            ],
            [
                'question' => 'Grafik Scatter Plot (Diagram Pencar) paling efektif digunakan untuk tujuan apa?',
                'image' => null,
                'options' => [
                    'A' => 'Menunjukkan komposisi persentase dari sebuah total',
                    'B' => 'Mengetahui hubungan (korelasi) antara dua variabel numerik yang berbeda',
                    'C' => 'Melihat tahapan sebuah proses bisnis',
                    'D' => 'Menampilkan perbandingan kategori produk',
                    'E' => 'Mendeteksi letak geografis suatu data'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Scatter Plot memetakan dua variabel pada sumbu X dan Y untuk melihat apakah ada korelasi (hubungan) positif, negatif, atau tidak ada hubungan sama sekali.'
            ],
            [
                'question' => 'Manakah di bawah ini yang merupakan contoh dari "Data Tidak Terstruktur" (Unstructured Data)?',
                'image' => null,
                'options' => [
                    'A' => 'Tabel absensi siswa di Microsoft Excel',
                    'B' => 'Database produk di minimarket',
                    'C' => 'Kumpulan gambar radiologi paru-paru dan rekaman suara',
                    'D' => 'Data harga saham harian',
                    'E' => 'Daftar nilai ujian di buku rapor'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data tidak terstruktur tidak memiliki format baris dan kolom yang baku, contoh utamanya adalah teks bebas, gambar, video, dan audio.'
            ],
            [
                'question' => 'Dalam Machine Learning, apa yang dimaksud dengan proses "Clustering" (Pengelompokan)?',
                'image' => null,
                'options' => [
                    'A' => 'Memprediksi harga rumah di masa depan berdasarkan data masa lalu',
                    'B' => 'Membagi kumpulan data menjadi beberapa kelompok berdasarkan kemiripan karakteristiknya',
                    'C' => 'Mengubah gambar menjadi teks',
                    'D' => 'Menghitung rata-rata nilai dari sebuah tabel',
                    'E' => 'Menerjemahkan bahasa Indonesia ke bahasa Inggris'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Clustering adalah teknik Unsupervised Learning untuk mengelompokkan data yang tidak memiliki label ke dalam cluster-cluster berdasarkan kemiripan jarak/sifatnya.'
            ],
            [
                'question' => 'Algoritma K-Means merupakan salah satu algoritma pengelompokan. Huruf "K" pada K-Means melambangkan apa?',
                'image' => null,
                'options' => [
                    'A' => 'Jumlah kelompok (cluster) yang ingin dibentuk',
                    'B' => 'Konstanta kecepatan komputer',
                    'C' => 'Jumlah baris data yang ada',
                    'D' => 'Kode keamanan untuk mengenkripsi data',
                    'E' => 'Kecepatan putaran algoritma'
                ],
                'correct_answer' => 'a',
                'explanation' => 'K merepresentasikan jumlah titik pusat (centroid) atau target jumlah kelompok yang ingin kita bentuk dari sekumpulan data.'
            ],
            [
                'question' => 'Bagaimana algoritma K-Means menentukan apakah sebuah data masuk ke Cluster A atau Cluster B?',
                'image' => null,
                'options' => [
                    'A' => 'Dengan menebak secara acak setiap saat',
                    'B' => 'Dengan melihat ukuran file datanya',
                    'C' => 'Dengan menghitung jarak terdekat dari data tersebut ke titik pusat (centroid) masing-masing cluster',
                    'D' => 'Dengan mengurutkan data sesuai abjad namanya',
                    'E' => 'Dengan bertanya kepada pengguna (user)'
                ],
                'correct_answer' => 'c',
                'explanation' => 'K-Means menggunakan metrik jarak (seperti Jarak Euclidean) untuk mengukur seberapa dekat suatu data dengan centroid. Data akan masuk ke cluster dengan centroid terdekat.'
            ],
            [
                'question' => 'Rumus Jarak Euclidean (Euclidean Distance) digunakan dalam algoritma K-Means untuk...',
                'image' => null,
                'options' => [
                    'A' => 'Menghitung waktu yang dibutuhkan untuk menyelesaikan program',
                    'B' => 'Mengukur jarak lurus (garis lurus) antara dua titik data dalam ruang dimensi',
                    'C' => 'Menghitung jumlah data error yang harus dihapus',
                    'D' => 'Memperbesar ukuran grafik visualisasi',
                    'E' => 'Mengubah data kuantitatif menjadi kualitatif'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Euclidean distance adalah formula matematis (mirip teorema Pythagoras) untuk mencari jarak terpendek/garis lurus antara dua titik koordinat data.'
            ],
            [
                'question' => 'Apa yang terjadi pada titik pusat (Centroid) setelah semua data selesai dikelompokkan pada iterasi pertama algoritma K-Means?',
                'image' => null,
                'options' => [
                    'A' => 'Centroid akan dihapus',
                    'B' => 'Centroid akan berubah warna',
                    'C' => 'Posisi Centroid akan diperbarui ke titik rata-rata (mean) dari semua anggota di clusternya',
                    'D' => 'Centroid akan berpindah ke cluster lain',
                    'E' => 'Proses algoritma langsung berhenti seketika'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Setelah pengelompokan selesai, posisi centroid baru akan dihitung berdasarkan nilai rata-rata (mean) dari koordinat semua data yang tergabung dalam cluster tersebut.'
            ],
            [
                'question' => 'Sebuah data bernilai ekstrem (sangat tinggi atau sangat rendah dibandingkan mayoritas data lainnya) dapat merusak visualisasi dan hasil rata-rata. Data seperti ini disebut...',
                'image' => null,
                'options' => [
                    'A' => 'Data Center',
                    'B' => 'Missing Value',
                    'C' => 'Centroid',
                    'D' => 'Outlier (Pencilan)',
                    'E' => 'Metadata'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Outlier adalah data yang anomali atau menyimpang jauh dari kelompok data lainnya. Outlier biasanya bisa dideteksi dengan mudah menggunakan visualisasi Box Plot.'
            ],
        ];

        // 5. Masukkan Soal ke Pre-Test DAN Post-Test (Agar Valid untuk Uji N-Gain)
        foreach ($questions as $q) {
            // Insert ke Pre-Test
            Question::create([
                'quiz_id' => $preTest->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                'correct_answer' => $q['correct_answer'],
                'points' => 10, // 10 Soal x 10 Poin = 100
                'explanation' => $q['explanation']
            ]);

            // Insert ke Post-Test (Soal yang sama)
            Question::create([
                'quiz_id' => $postTest->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                'correct_answer' => $q['correct_answer'],
                'points' => 10,
                'explanation' => $q['explanation']
            ]);
        }
        
        $this->command->info('✅ Berhasil menyuntikkan 10 Soal untuk Ujian Pre-Test & Post-Test!');
    }
}