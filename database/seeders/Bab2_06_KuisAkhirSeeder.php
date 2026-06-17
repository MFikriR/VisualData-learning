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

        // 2. Buat atau Update Quiz Header (Sesuai Kolom Database Asli)
        $quiz = Quiz::updateOrCreate(
            ['chapter_id' => $chapter->id], 
            [
                'title' => 'Evaluasi Akhir Bab 2: Visualisasi & Pengelompokan',
                'description' => 'Uji pemahamanmu tentang materi visualisasi grafik (Bar, Histogram, Box Plot, Scatter Plot) dan konsep pengelompokan data menggunakan algoritma K-Means.',
                'type' => 'final',
                'time_limit' => 45, 
            ]
        );

        // 3. Bersihkan soal lama agar tidak duplikat
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar 20 Soal Lengkap (Kunci Jawaban Merata: A-B-C-D-E x4)
        $questions = [
            // --- KELOMPOK 1 ---
            [
                'question' => 'Proses menyajikan sekumpulan angka ke dalam format grafis seperti diagram atau gambar agar pola dan trennya lebih mudah dipahami oleh otak manusia disebut dengan istilah....',
                'image' => null,
                'options' => [
                    'A' => 'Visualisasi data',
                    'B' => 'Manipulasi data',
                    'C' => 'Pengumpulan data',
                    'D' => 'Pengelompokan data',
                    'E' => 'Pembersihan data'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Visualisasi data adalah proses menerjemahkan tabel angka menjadi grafik atau visual.'
            ],
            [
                'question' => 'Jenis grafik yang menggunakan persegi panjang terpisah dan paling tepat digunakan ketika kita ingin membandingkan jumlah antar kategori yang berbeda adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Diagram lingkaran',
                    'B' => 'Diagram batang',
                    'C' => 'Diagram garis lurus',
                    'D' => 'Diagram titik pencar',
                    'E' => 'Diagram kotak garis'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Diagram batang (Bar Chart) sangat ideal untuk membandingkan nilai antar kategori diskrit.'
            ],
            [
                'question' => 'Ciri khas visual paling utama dari Histogram yang membedakannya secara langsung dengan diagram batang biasa adalah letak batang-batangnya yang digambar secara....',
                'image' => null,
                'options' => [
                    'A' => 'Menyebar menjadi titik kecil',
                    'B' => 'Melingkar membentuk irisan',
                    'C' => 'Saling berdempetan tanpa celah',
                    'D' => 'Bertumpuk di satu garis lurus',
                    'E' => 'Terpisah dengan jarak sangat jauh'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Histogram merepresentasikan rentang data numerik kontinu, sehingga batangnya saling menempel.'
            ],
            [
                'question' => 'Pada visualisasi Box Plot, indikator statistik yang melambangkan posisi batas 75% data teratas dalam sebuah kelompok persebaran data disebut sebagai....',
                'image' => null,
                'options' => [
                    'A' => 'Nilai rata-rata kelas',
                    'B' => 'Batas kuartil bawah (Q1)',
                    'C' => 'Nilai tengah (Median)',
                    'D' => 'Batas kuartil atas (Q3)',
                    'E' => 'Nilai batas minimum'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Kuartil Atas (Q3) adalah batas yang menandakan 75% sebaran data.'
            ],
            [
                'question' => 'Visualisasi data yang memanfaatkan titik-titik pada sumbu kartesius untuk melihat apakah ada hubungan (korelasi) antara dua variabel numerik yang berbeda dikenal dengan nama....',
                'image' => null,
                'options' => [
                    'A' => 'Grafik batang ganda',
                    'B' => 'Histogram kontinu',
                    'C' => 'Diagram lingkaran',
                    'D' => 'Diagram kotak garis',
                    'E' => 'Scatter plot'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Scatter Plot (Diagram Pencar) adalah standar untuk mencari korelasi dua variabel numerik.'
            ],

            // --- KELOMPOK 2 ---
            [
                'question' => 'Dalam dunia ilmu komputer, sebuah proses yang bertujuan untuk membagi ratusan data ke dalam beberapa kelompok berdasarkan tingkat kemiripan karakteristiknya disebut....',
                'image' => null,
                'options' => [
                    'A' => 'Clustering',
                    'B' => 'Visualisasi',
                    'C' => 'Verifikasi',
                    'D' => 'Pengurutan',
                    'E' => 'Pembersihan'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Clustering adalah teknik untuk mengelompokkan data yang mirip ke dalam satu cluster.'
            ],
            [
                'question' => 'Berdasarkan logika pengukuran pada algoritma pengelompokan, dua buah data akan dianggap memiliki tingkat kemiripan yang tinggi apabila jarak keduanya di dalam grafik semakin....',
                'image' => null,
                'options' => [
                    'A' => 'Berjauhan letaknya',
                    'B' => 'Berdekatan posisinya',
                    'C' => 'Bersilangan arahnya',
                    'D' => 'Acak-acakan polanya',
                    'E' => 'Menghilang titiknya'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Semakin dekat jarak antar data, komputer menganggapnya semakin mirip.'
            ],
            [
                'question' => 'Pada algoritma pembelajaran mesin K-Means, peran huruf "K" di bagian awal namanya memiliki makna penting yang merepresentasikan....',
                'image' => null,
                'options' => [
                    'A' => 'Kecepatan proses pencarian',
                    'B' => 'Jumlah nilai yang dihapus',
                    'C' => 'Jumlah kelompok yang dibuat',
                    'D' => 'Konstanta jarak kemiringan',
                    'E' => 'Total data ekstrem dibuang'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Huruf K melambangkan jumlah cluster (kelompok) yang ingin dibentuk oleh pengguna.'
            ],
            [
                'question' => 'Salah satu contoh nyata penerapan konsep pengelompokan data (clustering) yang biasa kita temui secara otomatis pada layanan digital seperti YouTube atau Spotify adalah fitur....',
                'image' => null,
                'options' => [
                    'A' => 'Mengubah batas resolusi video',
                    'B' => 'Menghapus riwayat penjelajahan',
                    'C' => 'Mempercepat durasi otomatis',
                    'D' => 'Memberikan rekomendasi konten',
                    'E' => 'Menampilkan lirik pada layar'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Sistem rekomendasi mengelompokkan pengguna dengan selera mirip untuk memberikan saran.'
            ],
            [
                'question' => 'Sebuah titik data tunggal yang nilainya melompat sangat jauh dan berbeda secara drastis dari mayoritas kerumunan data utama di dalam Box Plot sering kali dijuluki sebagai....',
                'image' => null,
                'options' => [
                    'A' => 'Data minimum',
                    'B' => 'Data kuartil',
                    'C' => 'Data median',
                    'D' => 'Data frekuensi',
                    'E' => 'Data outlier'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Outlier (pencilan) adalah data yang menyimpang sangat jauh dari mayoritas kelompok data.'
            ],

            // --- KELOMPOK 3 ---
            [
                'question' => 'Jika kita mengamati titik-titik pada Scatter Plot dan melihat bahwa polanya terus bergerak naik memanjang ke arah kanan atas, hal ini menjadi bukti bahwa kedua variabel memiliki....',
                'image' => null,
                'options' => [
                    'A' => 'Korelasi positif',
                    'B' => 'Korelasi negatif',
                    'C' => 'Korelasi acak',
                    'D' => 'Korelasi stabil',
                    'E' => 'Korelasi nol'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Korelasi positif terjadi ketika variabel X naik, maka variabel Y juga ikut naik (arah kanan atas).'
            ],
            [
                'question' => 'Untuk menentukan jumlah pembagian kelompok interval kelas yang paling ideal agar bentuk Histogram terlihat seimbang, para ilmuwan data sering menggunakan rumus matematis yang disebut Aturan....',
                'image' => null,
                'options' => [
                    'A' => 'Pythagoras',
                    'B' => 'Sturges',
                    'C' => 'Bayes',
                    'D' => 'Newton',
                    'E' => 'Cramer'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Aturan Sturges digunakan untuk menghitung jumlah bin ideal pada pembuatan Histogram.'
            ],
            [
                'question' => 'Alasan logis mengapa batang-batang pada Histogram harus selalu berdempetan dan tidak memiliki jarak pemisah adalah karena sumbu horizontalnya digunakan untuk merepresentasikan jenis data....',
                'image' => null,
                'options' => [
                    'A' => 'Deskriptif',
                    'B' => 'Kualitatif',
                    'C' => 'Kontinu',
                    'D' => 'Nominal',
                    'E' => 'Ordinal'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data kontinu adalah rangkaian angka yang saling bersambung tanpa jeda.'
            ],
            [
                'question' => 'Pada tahapan awal saat menjalankan algoritma K-Means, hal pertama yang harus diletakkan ke dalam bidang grafik sebelum komputer dapat menghitung jarak kedekatan setiap data adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Nilai simpangan acak',
                    'B' => 'Titik letak pencilan',
                    'C' => 'Garis pembatas batas',
                    'D' => 'Titik centroid awal',
                    'E' => 'Nilai rata-rata asli'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Centroid (titik pusat kelompok) harus ditentukan posisinya terlebih dahulu sebelum menghitung jarak.'
            ],
            [
                'question' => 'Proses pergeseran letak kelompok pada langkah K-Means akan dinyatakan selesai atau berhenti berulang apabila posisi akhir dari anggota kelompoknya dalam keadaan....',
                'image' => null,
                'options' => [
                    'A' => 'Berjauhan letaknya',
                    'B' => 'Saling bertabrakan',
                    'C' => 'Terus berpindah',
                    'D' => 'Bersilangan arah',
                    'E' => 'Stabil tidak berubah'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Algoritma akan berhenti (konvergen) ketika pusat kelompok (centroid) sudah tidak bergeser lagi.'
            ],

            // --- KELOMPOK 4 ---
            [
                'question' => 'Di antara lima buah indikator penting yang secara ringkas dirangkum ke dalam satu visualisasi Box Plot, indikator yang melambangkan titik pembagi dua sebaran data secara seimbang adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Nilai median',
                    'B' => 'Batas jumlah',
                    'C' => 'Nilai rentang',
                    'D' => 'Kuartil atas',
                    'E' => 'Batas pencilan'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Median (Q2) atau nilai tengah selalu ditandai dengan garis di dalam kotak Box Plot.'
            ],
            [
                'question' => 'Apabila titik-titik koordinat di dalam bidang Scatter Plot tampak menyebar sangat berantakan dan gagal membentuk pola lintasan yang jelas, maka pengamat dapat mengambil kesimpulan bahwa kedua variabel tersebut....',
                'image' => null,
                'options' => [
                    'A' => 'Membentuk pola terbalik',
                    'B' => 'Tidak memiliki korelasi',
                    'C' => 'Memiliki relasi positif',
                    'D' => 'Saling terikat sangat kuat',
                    'E' => 'Membentuk pola eksponensial'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Bentuk acak yang menyebar tanpa pola menandakan kedua variabel tidak saling berhubungan.'
            ],
            [
                'question' => 'Jika seorang analis mengatur jumlah interval (kelompok) terlalu banyak sehingga jaraknya sangat sempit pada Histogram, maka grafik yang dihasilkannya akan rusak karena memunculkan banyak....',
                'image' => null,
                'options' => [
                    'A' => 'Margin kesesatan',
                    'B' => 'Titik perpotongan',
                    'C' => 'Gangguan informasi (noise)',
                    'D' => 'Garis persilangan',
                    'E' => 'Kotak ruang hampa'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Interval yang terlalu banyak akan membuat grafik berduri-duri yang mengganggu analisis (noise).'
            ],
            [
                'question' => 'Sikap dan tindakan analitis yang paling tepat ketika kita menemukan keberadaan sebuah angka ekstrem (outlier) di dalam kelompok data kita sebelum memutuskan untuk menghapusnya adalah....',
                'image' => null,
                'options' => [
                    'A' => 'Mengganti angkanya menjadi nol',
                    'B' => 'Menggabungkannya secara paksa',
                    'C' => 'Membiarkannya tanpa dianalisis',
                    'D' => 'Memeriksa penyebab kemunculannya',
                    'E' => 'Menduplikasi nilainya agar sama'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Outlier tidak selalu salah ketik, bisa jadi adalah kejadian unik yang penting untuk diteliti lebih lanjut.'
            ],
            [
                'question' => 'Ketika data pada Scatter Plot semakin padat, titik-titik tersebut secara alami akan saling berdekatan membentuk sebuah kerumunan, yang mana hal ini menjadi pondasi utama diciptakannya teknik....',
                'image' => null,
                'options' => [
                    'A' => 'Normalisasi data',
                    'B' => 'Interpolasi titik',
                    'C' => 'Manipulasi grafik',
                    'D' => 'Ekstrapolasi waktu',
                    'E' => 'Clustering algoritma'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Kerumunan titik yang mirip secara jarak adalah pondasi dari metode pengelompokan (Clustering).'
            ]
        ];

        // 5. Insert Batch dengan Mapping ke Database
        foreach ($questions as $q) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['question'],
                'image' => $q['image'],
                
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                
                'correct_answer' => strtolower($q['correct_answer']), 
                'points' => 5, // Menggunakan points, bukan score
                'explanation' => $q['explanation']
            ]);
        }
        
        $this->command->info('Berhasil menyuntikkan 20 Soal Evaluasi Akhir Bab 2!');
    }
}