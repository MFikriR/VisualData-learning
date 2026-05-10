<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Material;

class Bab2_06_KuisAkhirSeeder extends Seeder
{
    public function run(): void
    {
        // 0. MEMBERSIHKAN DUPLIKAT LAMA
        Material::where('title', 'LIKE', '%Evaluasi Akhir Bab 2%')->delete();

        // 1. Pastikan Bab 2 Ada
        $chapter = Chapter::where('sequence', 2)->first();
        
        if (!$chapter) {
            $this->command->error('Bab 2 tidak ditemukan! Jalankan ContentSeeder dulu.');
            return;
        }

        // 2. Buat atau Update Quiz Header
        // PENTING: Gunakan 'time_limit' bukan 'duration_minutes'
        $quiz = Quiz::updateOrCreate(
            ['chapter_id' => $chapter->id], 
            [
                'title' => 'Evaluasi Akhir Bab 2: Visualisasi Data',
                'description' => 'Uji pemahamanmu tentang Diagram Batang, Histogram, Box Plot, dan Scatter Plot.',
                'type' => 'final',
                'time_limit' => 45, 
            ]
        );

        // 3. Bersihkan soal lama agar tidak duplikat
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar Soal Lengkap
        $questions = [
            [
                'question' => 'Perbedaan visual utama yang membedakan antara Diagram Batang (Bar Chart) dan Histogram adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Diagram Batang memiliki celah antar batang, sedangkan Histogram batang-batangnya saling menempel',
                    'B' => 'Diagram Batang selalu berbentuk vertikal, sedangkan Histogram selalu horizontal',
                    'C' => 'Histogram digunakan untuk data kategori, sedangkan Diagram Batang untuk data numerik',
                    'D' => 'Histogram menggunakan garis, sedangkan Diagram Batang menggunakan titik',
                    'E' => 'Diagram Batang memiliki sumbu negatif, sedangkan Histogram tidak'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Pada Histogram (data kontinu) batang saling berimpit, sedangkan Diagram Batang (data kategori) terpisah.'
            ],
            [
                'question' => 'Berdasarkan Diagram Batang data penjualan buah di atas ini, buah yang memiliki jumlah penjualan paling sedikit adalah ....',
                'image' => 'images/quiz/q2_diagram_buah.png',
                'options' => [
                    'A' => 'Apel',
                    'B' => 'Anggur',
                    'C' => 'Mangga',
                    'D' => 'Jeruk',
                    'E' => 'Melon'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Batang terpendek pada diagram menunjukkan buah Anggur.'
            ],
            [
                'question' => 'Alasan batang-batang pada grafik Histogram digambarkan saling berhimpit tanpa celah adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Agar grafik terlihat lebih rapi dan hemat tempat',
                    'B' => 'Karena datanya bersifat kategorikal yang terpisah',
                    'C' => 'Karena merepresentasikan data numerik kontinu di mana interval nilai saling bersambung',
                    'D' => 'Untuk menunjukkan adanya korelasi antar variabel',
                    'E' => 'Supaya bisa memuat lebih banyak kategori data'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Histogram digunakan untuk data kontinu (interval), sehingga tidak ada jeda antar kelas.'
            ],
            [
                'question' => 'Gambar Histogram berikut memiliki ekor yang memanjang ke arah kanan (Skewed Right). Hal ini mengindikasikan bahwa distribusi datanya ....',
                'image' => 'images/quiz/q4_histogram_skewed.png',
                'options' => [
                    'A' => 'Terdistribusi normal (simetris sempurna)',
                    'B' => 'Mayoritas data bernilai besar atau tinggi',
                    'C' => 'Tidak memiliki data outlier sama sekali',
                    'D' => 'Miring positif, di mana mayoritas data bernilai kecil namun ada sedikit data bernilai sangat besar',
                    'E' => 'Data tidak valid dan harus dibuang'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Skewed Right (Positif) berarti ekor memanjang ke kanan, artinya ada sebagian kecil data yang bernilai sangat besar.'
            ],
            [
                'question' => 'Jika seorang peneliti memiliki data nilai ujian dari 100 siswa, jumlah kelas (batang) ideal yang sebaiknya dibuat menggunakan Aturan Sturges adalah ....',
                'image' => null,
                'options' => [
                    'A' => '5 batang',
                    'B' => '6 batang',
                    'C' => '7 batang',
                    'D' => '10 batang',
                    'E' => '8 batang'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Rumus Sturges: k = 1 + 3.322 log(100) = 1 + 3.322(2) = 7.644, dibulatkan menjadi 8.'
            ],
            [
                'question' => 'Dalam analisis statistik menggunakan Box Plot, yang dimaksud dengan nilai IQR (Interquartile Range) adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Selisih antara Kuartil Atas (Q3) dan Kuartil Bawah (Q1)',
                    'B' => 'Nilai rata-rata dari seluruh kumpulan data',
                    'C' => 'Selisih antara nilai Maksimum dan Minimum',
                    'D' => 'Nilai tengah data (Median)',
                    'E' => 'Batas garis untuk menentukan data pencilan'
                ],
                'correct_answer' => 'a',
                'explanation' => 'IQR adalah rentang antar kuartil, dihitung dengan Q3 dikurangi Q1.'
            ],
            [
                'question' => 'Perhatikan gambar anatomi Box Plot berikut. Bagian garis di tengah-tengah kotak merepresentasikan nilai ....',
                'image' => 'images/quiz/q7_boxplot_anatomi.png',
                'options' => [
                    'A' => 'Mean (Rata-rata)',
                    'B' => 'Median (Q2)',
                    'C' => 'Modus',
                    'D' => 'Outlier',
                    'E' => 'Kuartil 3 (Q3)'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Garis horizontal di dalam kotak pada Box Plot selalu menunjukkan nilai Median (Q2).'
            ],
            [
                'question' => 'Diketahui sebuah data memiliki Kuartil Bawah (Q1) = 40 dan Kuartil Atas (Q3) = 60. Nilai Pagar Atas (Upper Fence) untuk mendeteksi adanya outlier pada data tersebut adalah ....',
                'image' => null,
                'options' => [
                    'A' => '70',
                    'B' => '80',
                    'C' => '90',
                    'D' => '100',
                    'E' => '110'
                ],
                'correct_answer' => 'c',
                'explanation' => 'IQR = 60-40 = 20. Upper Fence = Q3 + (1.5 * IQR) = 60 + (1.5 * 20) = 60 + 30 = 90.'
            ],
            [
                'question' => 'Simbol titik kecil yang berada terpisah jauh di luar garis kumis (whisker) pada sebuah grafik Box Plot disebut sebagai ....',
                'image' => 'images/quiz/q9_boxplot_outlier.png',
                'options' => [
                    'A' => 'Median',
                    'B' => 'Quartile',
                    'C' => 'Range',
                    'D' => 'Outlier (Pencilan)',
                    'E' => 'Centroid'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Titik di luar whisker menandakan data tersebut adalah outlier (pencilan) yang jauh dari sebaran data normal.'
            ],
            [
                'question' => 'Pola titik-titik pada Scatter Plot yang bergerak naik dari kiri bawah ke kanan atas menunjukkan adanya hubungan ....',
                'image' => 'images/quiz/q10_scatter_positive.png',
                'options' => [
                    'A' => 'Korelasi Negatif',
                    'B' => 'Tidak ada korelasi',
                    'C' => 'Korelasi Non-linear',
                    'D' => 'Distribusi Normal',
                    'E' => 'Korelasi Positif'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Jika X naik dan Y ikut naik (arah kanan atas), itu adalah korelasi positif.'
            ],
            [
                'question' => 'Kesimpulan yang tepat untuk gambar Scatter Plot dengan titik-titik menyebar secara acak tanpa pola yang jelas adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Tidak ada korelasi antara kedua variabel',
                    'B' => 'Terdapat korelasi positif kuat',
                    'C' => 'Terdapat korelasi negatif kuat',
                    'D' => 'Terdapat banyak data outlier',
                    'E' => 'Data memiliki distribusi normal'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Penyebaran acak menandakan tidak ada hubungan (korelasi) yang jelas antara variabel X dan Y.'
            ],
            [
                'question' => 'Pola titik-titik pada Scatter Plot yang bergerak turun dari kiri atas ke kanan bawah menunjukkan adanya hubungan yang bersifat ....',
                'image' => 'images/quiz/q12_scatter_negative.png',
                'options' => [
                    'A' => 'Korelasi Positif',
                    'B' => 'Korelasi Negatif',
                    'C' => 'Tidak ada korelasi',
                    'D' => 'Distribusi Normal',
                    'E' => 'Distribusi Bimodal'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Jika X naik tapi Y turun (arah kanan bawah), itu adalah korelasi negatif.'
            ],
            [
                'question' => 'Jika sebuah Histogram memiliki ekor yang memanjang ke arah kiri (Skewed Left), hal ini mengindikasikan bahwa sebagian besar data berkumpul di area nilai ....',
                'image' => null,
                'options' => [
                    'A' => 'Rendah',
                    'B' => 'Rata-rata',
                    'C' => 'Tinggi',
                    'D' => 'Nol',
                    'E' => 'Negatif'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Skewed Left artinya ekor di kiri (nilai kecil), sehingga gunungan data (mayoritas) ada di kanan (nilai tinggi).'
            ],
            [
                'question' => 'Panjang kotak di bagian tengah pada grafik Box Plot (jarak antara garis Q1 dan Q3) merepresentasikan nilai ....',
                'image' => null,
                'options' => [
                    'A' => 'Median (Q2)',
                    'B' => 'Jangkauan (Range)',
                    'C' => 'Rata-rata (Mean)',
                    'D' => 'Interquartile Range (IQR)',
                    'E' => 'Batas Outlier'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Panjang kotak (box) adalah visualisasi dari IQR.'
            ],
            [
                'question' => 'Penggunaan Diagram Batang Horizontal (Horizontal Bar Chart) sangat disarankan apabila data yang akan ditampilkan memiliki karakteristik ....',
                'image' => null,
                'options' => [
                    'A' => 'Data bersifat numerik kontinu',
                    'B' => 'Jumlah kategori sangat sedikit (kurang dari 3)',
                    'C' => 'Ingin melihat tren kenaikan waktu',
                    'D' => 'Ingin melihat komposisi persentase (donat)',
                    'E' => 'Label kategori berupa teks yang panjang'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Batang horizontal memberikan ruang lebih banyak untuk menulis label kategori yang panjang agar mudah dibaca.'
            ],
            [
                'question' => 'Dalam rumus statistik Box Plot, sebuah data akan dianggap sebagai outlier bawah jika nilainya lebih kecil dari batas ....',
                'image' => null,
                'options' => [
                    'A' => 'Q1 - (1.5 X IQR)',
                    'B' => 'Q3 + (1.5 X IQR)',
                    'C' => 'Q1 - IQR',
                    'D' => 'Q3 + IQR',
                    'E' => 'Median - (1.5 X IQR)'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Rumus pagar bawah (lower fence) adalah Q1 dikurangi 1.5 kali IQR.'
            ],
            [
                'question' => 'Agar tidak memanipulasi persepsi pembaca terhadap perbedaan tinggi batang yang sebenarnya kecil, sumbu nilai (Sumbu Y) pada Diagram Batang harus selalu dimulai dari angka ....',
                'image' => null,
                'options' => [
                    'A' => '100',
                    'B' => 'Angka Nol (0)',
                    'C' => '10',
                    'D' => '1',
                    'E' => '0,5'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Bar chart harus mulai dari 0 (zero baseline) agar proporsi visual akurat.'
            ],
            [
                'question' => 'Jika seorang Data Scientist ingin mengetahui apakah variabel "Luas Tanah" memiliki hubungan (korelasi) dengan variabel "Harga Rumah", jenis visualisasi yang paling tepat dipilih adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Histogram',
                    'B' => 'Diagram Batang',
                    'C' => 'Scatter Plot',
                    'D' => 'Box Plot',
                    'E' => 'Pie Chart'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Scatter plot adalah standar untuk melihat korelasi antara dua variabel numerik.'
            ],
            [
                'question' => 'Jenis grafik yang paling tepat digunakan untuk membandingkan data kategori seperti Jumlah Siswa antar Kelas 10, Kelas 11, dan Kelas 12 adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Scatter Plot',
                    'B' => 'Box Plot',
                    'C' => 'Histogram',
                    'D' => 'Diagram Batang (Bar Chart)',
                    'E' => 'Line Chart'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Perbandingan antar kategori diskrit paling baik menggunakan Diagram Batang.'
            ],
            [
                'question' => 'Grafik yang harus digunakan untuk melihat distribusi frekuensi data numerik kontinu seperti Tinggi Badan seluruh siswa adalah ....',
                'image' => null,
                'options' => [
                    'A' => 'Diagram Batang',
                    'B' => 'Pie Chart',
                    'C' => 'Scatter Plot',
                    'D' => 'Map Chart',
                    'E' => 'Histogram'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Data numerik kontinu seperti tinggi badan divisualisasikan distribusinya menggunakan Histogram.'
            ],
        ];

        // 5. Insert Batch (INI BAGIAN KUNCI YANG DIPERBAIKI)
        foreach ($questions as $q) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                
                // MAPPING MANUAL (WAJIB ADA)
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                
                'correct_answer' => strtolower($q['correct_answer']), // Pastikan huruf kecil
                'points' => 5,
                'explanation' => $q['explanation']
            ]);
        }
        
        $this->command->info('Berhasil menyuntikkan 20 Soal Evaluasi Akhir Bab 1 dengan Struktur Baru!');
    }
}