<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;

class UjiKompetensiAkhirSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Bab Khusus "Evaluasi Akhir"
        $chapter = Chapter::firstOrCreate(
            ['sequence' => 99],
            [
                'title' => 'Penilaian Akhir',
                'description' => 'Evaluasi komprehensif untuk menguji penguasaan materi Visualisasi Data dan Clustering.',
                'is_active' => true
            ]
        );

        // 2. Buat Quiz Header
        $quiz = Quiz::updateOrCreate(
            ['chapter_id' => $chapter->id, 'type' => 'final'], 
            [
                'title' => 'Evaluasi Akhir Pembelajaran',
                'description' => 'Gabungan materi Visualisasi Data dan Algoritma K-Means (20 Soal).',
                'time_limit' => 60,
            ]
        );

        // 3. Bersihkan soal lama
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar Soal Lengkap (20 Soal)
        $questions = [
            [
                'question' => 'Definisi yang paling tepat mengenai "Data" sebelum dapat dimanfaatkan oleh Kecerdasan Buatan (AI) atau sistem komputer adalah....',
                'options' => [
                    'A' => 'Kumpulan fakta, angka, hasil pengukuran, atau deskripsi mentah yang belum diolah menjadi informasi.',
                    'B' => 'Hasil akhir dari sebuah keputusan sistem AI.',
                    'C' => 'Proses memberikan label pada sebuah gambar.',
                    'D' => 'Aplikasi perangkat lunak untuk membuat visualisasi.',
                    'E' => 'Perangkat keras untuk menyimpan file multimedia.'
                ],
                'correct_answer' => 'A',
                'explanation' => 'Data adalah fakta atau angka mentah yang belum diproses. Setelah diolah, barulah ia menjadi informasi yang berguna.'
            ],
            [
                'question' => 'Di dalam ilmu data, kita mengenal berbagai jenis data. Jika kita memiliki data berupa "Warna Mobil: Merah, Hitam, Putih", berdasarkan jenisnya data tersebut diklasifikasikan sebagai....',
                'options' => [
                    'A' => 'Data Kuantitatif Kontinu',
                    'B' => 'Data Kualitatif Nominal',
                    'C' => 'Data Kualitatif Ordinal',
                    'D' => 'Data Kuantitatif Diskrit',
                    'E' => 'Data Terstruktur (Structured Data)'
                ],
                'correct_answer' => 'B',
                'explanation' => 'Warna adalah data kualitatif (kategori) dan bersifat nominal karena tidak memiliki tingkatan atau urutan tertentu.'
            ],
            [
                'question' => 'Data seperti teks chat WhatsApp, rekaman suara, foto, dan video tidak memiliki baris dan kolom tabel yang kaku. Dalam ilmu data, wujud data seperti ini diklasifikasikan sebagai....',
                'options' => [
                    'A' => 'Data Terstruktur (Structured Data)',
                    'B' => 'Data Semi-Terstruktur (Semi-Structured Data)',
                    'C' => 'Data Tidak Terstruktur (Unstructured Data)',
                    'D' => 'Data Kuantitatif',
                    'E' => 'Data Diskrit'
                ],
                'correct_answer' => 'C',
                'explanation' => 'Data gambar, suara, dan teks bebas masuk ke dalam kategori data tidak terstruktur karena tidak mengikuti format tabel baris dan kolom.'
            ],
            [
                'question' => 'Dalam tahapan pembersihan data (Data Cleaning), tindakan yang paling tepat jika kita menemukan adanya Missing Values (data yang kosong/tidak diisi oleh responden) yaitu....',
                'options' => [
                    'A' => 'Menggantinya dengan teks atau huruf acak',
                    'B' => 'Membiarkannya saja karena tidak akan memengaruhi AI',
                    'C' => 'Menggandakan data dari baris di atasnya',
                    'D' => 'Menghapus baris data tersebut atau mengisinya dengan nilai rata-rata (imputasi)',
                    'E' => 'Menjadikannya sebagai titik pusat (centroid) utama'
                ],
                'correct_answer' => 'D',
                'explanation' => 'Missing values umumnya ditangani dengan dua cara utama: dihapus (drop) atau diisi dengan nilai yang representatif seperti rata-rata (imputasi).'
            ],
            [
                'question' => 'Proses memberikan "kunci jawaban" atau nama kategori pada sekumpulan data mentah (misalnya memberi label "Kucing" pada kumpulan foto hewan) agar mesin AI dapat belajar mengenali pola disebut dengan tahapan....',
                'options' => [
                    'A' => 'Data Cleaning',
                    'B' => 'Data Mining',
                    'C' => 'Data Scaling',
                    'D' => 'Data Visualization',
                    'E' => 'Data Labeling'
                ],
                'correct_answer' => 'E',
                'explanation' => 'Data Labeling adalah proses identifikasi data mentah dan menambahkan satu atau lebih label informatif agar model machine learning bisa mempelajarinya.'
            ],
            [
                'question' => 'Grafik yang paling tepat digunakan untuk melihat pola hubungan (korelasi) antara dua variabel numerik, seperti pengaruh "Lama Waktu Belajar" terhadap "Nilai Ujian Siswa", adalah....',
                'options' => [
                    'A' => 'Scatter Plot (Diagram Pencar)',
                    'B' => 'Histogram',
                    'C' => 'Diagram Batang (Bar Chart)',
                    'D' => 'Box Plot',
                    'E' => 'Pie Chart'
                ],
                'correct_answer' => 'A',
                'explanation' => 'Scatter Plot adalah standar visualisasi untuk melihat korelasi atau hubungan antara dua variabel numerik (Sumbu X dan Sumbu Y).'
            ],
            [
                'question' => 'Komponen pada grafik Box Plot yang ditandai dengan garis melintang di dalam kotak (box) merepresentasikan nilai statistik berupa....',
                'image' => 'images/quiz/q7_boxplot_anatomi.png', // Pastikan letak gambar sudah sesuai
                'options' => [
                    'A' => 'Modus',
                    'B' => 'Median (Q2)',
                    'C' => 'Rata-rata (Mean)',
                    'D' => 'Jangkauan (Range)',
                    'E' => 'Standar Deviasi'
                ],
                'correct_answer' => 'B',
                'explanation' => 'Garis tebal di tengah kotak pada anatomi Box Plot selalu menunjukkan nilai tengah atau Median (Kuartil 2).'
            ],
            [
                'question' => 'Diketahui data nilai ujian memiliki Kuartil Bawah (Q1) sebesar 40 dan Kuartil Atas (Q3) sebesar 60. Berdasarkan rumus batas wajar statistik (Q3 + 1,5 x IQR), batas nilai untuk menentukan outlier (pencilan) atas adalah....',
                'options' => [
                    'A' => '70',
                    'B' => '80',
                    'C' => '90',
                    'D' => '100',
                    'E' => '110'
                ],
                'correct_answer' => 'C',
                'explanation' => 'IQR = Q3 - Q1 = 60 - 40 = 20. Batas Atas = 60 + (1.5 x 20) = 60 + 30 = 90.'
            ],
            [
                'question' => 'Ciri visual utama yang membedakan Histogram dari Diagram Batang (Bar Chart) adalah batang-batang pada Histogram digambarkan....',
                'options' => [
                    'A' => 'dengan warna-warni yang sangat mencolok',
                    'B' => 'terpisah oleh celah atau spasi yang lebar',
                    'C' => 'secara horizontal memanjang ke arah samping',
                    'D' => 'saling berhimpit tanpa celah (menempel)',
                    'E' => 'menggunakan garis-garis tipis'
                ],
                'correct_answer' => 'D',
                'explanation' => 'Histogram merepresentasikan data numerik kontinu, sehingga rentang batang-batangnya harus saling menempel (berhimpit) tanpa jarak.'
            ],
            [
                'question' => '"Aturan Emas" (Golden Rule) dalam membuat Diagram Batang (Bar Chart) agar tidak memanipulasi persepsi atau pandangan pembaca adalah sumbu nilai (Sumbu Y) harus selalu dimulai dari angka....',
                'options' => [
                    'A' => '10',
                    'B' => '100',
                    'C' => 'Nilai minimum dari data',
                    'D' => 'Nilai rata-rata dari data',
                    'E' => '0 (Nol)'
                ],
                'correct_answer' => 'E',
                'explanation' => 'Sumbu Y pada Bar Chart harus selalu dimulai dari nol agar perbandingan tinggi batang tetap akurat secara proporsional dan tidak memanipulasi mata.'
            ],
            [
                'question' => 'Dalam konsep Machine Learning, algoritma pengelompokan (Clustering) dikategorikan sebagai Unsupervised Learning karena data input yang diolah....',
                'options' => [
                    'A' => 'tidak memiliki label atau kunci jawaban',
                    'B' => 'memiliki label kelas yang sangat jelas',
                    'C' => 'harus dilatih oleh manusia secara manual terlebih dahulu',
                    'D' => 'hanya berisi data kategorikal berupa teks',
                    'E' => 'terdiri dari sekumpulan angka desimal saja'
                ],
                'correct_answer' => 'A',
                'explanation' => 'Unsupervised Learning bekerja membedah data mentah yang tidak memiliki label target atau kelompok sebelumnya (tanpa kunci jawaban).'
            ],
            [
                'question' => 'Metode Elbow digunakan dalam algoritma K-Means untuk membantu kita menentukan jumlah klaster (K) yang paling baik. Titik paling optimal pada grafik Elbow dipilih pada bagian....',
                'image' => 'images/quiz/q13_langkah_kmeans.png', // Pastikan letak gambar sudah sesuai
                'options' => [
                    'A' => 'grafik yang nilainya paling tinggi di puncak',
                    'B' => 'yang membentuk sudut siku tajam sebelum grafik melandai',
                    'C' => 'akhir grafik yang benar-benar datar dan stabil',
                    'D' => 'grafik yang letaknya paling dekat dengan angka nol',
                    'E' => 'tengah-tengah garis lurus yang menurun tajam'
                ],
                'correct_answer' => 'B',
                'explanation' => 'Titik optimal berada di lekukan tajam (seperti siku manusia) karena menunjukkan titik keseimbangan di mana penambahan klaster tidak lagi memberi manfaat signifikan.'
            ],
            [
                'question' => 'Metode perhitungan jarak dengan menarik garis lurus terpendek dari satu titik ke titik lain (diadaptasi dari Teorema Pythagoras) dikenal dengan istilah....',
                'options' => [
                    'A' => 'Manhattan Distance',
                    'B' => 'Hamming Distance',
                    'C' => 'Euclidean Distance',
                    'D' => 'Minkowski Distance',
                    'E' => 'Cosine Similarity'
                ],
                'correct_answer' => 'C',
                'explanation' => 'Euclidean Distance menghitung jarak terpendek (garis lurus / potong kompas) antara dua titik koordinat yang mengacu pada rumus Phytagoras.'
            ],
            [
                'question' => 'Seorang Data Scientist memiliki data "Usia" (puluhan) dan "Gaji" (jutaan). Alasan utama data tersebut wajib dinormalisasi (scaling) sebelum dikelompokkan dengan algoritma K-Means adalah....',
                'options' => [
                    'A' => 'agar jumlah klaster (K) yang terbentuk bisa semakin banyak',
                    'B' => 'untuk menghapus data yang kosong (missing values) secara otomatis',
                    'C' => 'untuk mengubah wujud data numerik menjadi data kategorikal',
                    'D' => 'mencegah fitur dengan angka besar mendominasi fitur dengan angka kecil dalam perhitungan jarak',
                    'E' => 'supaya data menjadi terstruktur dan terhindar dari error system'
                ],
                'correct_answer' => 'D',
                'explanation' => 'Tanpa normalisasi, fitur "Gaji" yang nilainya jutaan akan mendominasi dan mengalahkan pengaruh fitur "Usia" saat komputer menghitung selisih jarak.'
            ],
            [
                'question' => 'Dalam algoritma K-Means, Centroid bertindak sebagai "ketua kelas". Pada tahapan iterasi, posisi Centroid ini akan terus diperbarui dan bergeser dengan cara menghitung....',
                'options' => [
                    'A' => 'jangkauan interkuartil (IQR) dari seluruh data',
                    'B' => 'nilai tengah (median) dari seluruh data',
                    'C' => 'nilai maksimum dari setiap himpunan data',
                    'D' => 'jumlah total seluruh baris data di dalam pangkalan data',
                    'E' => 'nilai rata-rata (mean) dari seluruh anggota di dalam klasternya'
                ],
                'correct_answer' => 'E',
                'explanation' => 'Nama "K-Means" sendiri berasal dari cara kerjanya, di mana ia mencari nilai rata-rata (Means) dari anggota kelompoknya untuk menggeser letak centroid.'
            ],
            [
                'question' => 'Proses perulangan (iterasi) pada algoritma K-Means tidak akan berlangsung selamanya. Algoritma ini dinyatakan telah selesai bekerja atau mencapai status "Konvergen" (Convergence) apabila....',
                'options' => [
                    'A' => 'posisi Centroid sudah stabil (tidak bergeser lagi) dan tidak ada data yang pindah kelompok',
                    'B' => 'semua titik data telah bergabung menjadi satu klaster raksasa',
                    'C' => 'jumlah iterasi yang dilakukan oleh komputer telah mencapai 100 kali',
                    'D' => 'jarak antara satu Centroid dengan Centroid lainnya mendekati angka nol',
                    'E' => 'komputer telah berhasil menghapus seluruh outlier pada himpunan data'
                ],
                'correct_answer' => 'A',
                'explanation' => 'Konvergensi tercapai ketika pengelompokan sudah final, ditandai dengan letak centroid yang tak lagi berpindah tempat pada iterasi berikutnya.'
            ],
            [
                'question' => 'Untuk menilai seberapa bagus kualitas kelompok yang dihasilkan oleh algoritma K-Means, kita dapat melihat nilai Inertia atau SSE (Sum of Squared Errors). Nilai ini pada dasarnya mengukur....',
                'options' => [
                    'A' => 'jarak antar pusat klaster yang satu dengan klaster yang lain',
                    'B' => 'jumlah iterasi putaran yang telah dilakukan oleh komputer',
                    'C' => 'tingkat kepadatan klaster berdasarkan total jarak anggota terhadap Centroid-nya',
                    'D' => 'kecepatan waktu komputasi mesin dalam memproses data',
                    'E' => 'jumlah outlier yang berhasil dideteksi dan dibuang oleh sistem'
                ],
                'correct_answer' => 'C',
                'explanation' => 'Inertia/SSE mengukur seberapa dekat dan padat titik-titik data berkumpul mengelilingi centroidnya. Semakin kecil angkanya, klasternya semakin bagus/padat.'
            ],
            [
                'question' => 'Meskipun algoritma K-Means sangat populer karena cepat dan efisien, algoritma ini memiliki sebuah kelemahan fatal ketika dihadapkan pada himpunan data yang kotor. Kelemahan utama tersebut adalah....',
                'options' => [
                    'A' => 'hanya dapat digunakan untuk memproses data gambar, bukan angka',
                    'B' => 'tidak mampu mengelompokkan data jika barisnya lebih dari ribuan',
                    'C' => 'proses kerjanya terlalu rumit dan tidak bisa divisualisasikan oleh komputer',
                    'D' => 'sangat sensitif terhadap outlier yang dapat menyeret Centroid melenceng terlalu jauh',
                    'E' => 'membutuhkan spesifikasi perangkat keras (hardware) yang sangat mahal'
                ],
                'correct_answer' => 'D',
                'explanation' => 'Karena K-Means menggunakan perhitungan "Rata-rata" (Mean), algoritma ini sangat mudah tertarik dan rusak akurasinya jika terdapat data anomali (Outlier) yang ekstrem.'
            ],
            [
                'question' => 'Jika kita mengibaratkan sebuah sistem pengukuran di mana kita tidak bisa menarik garis lurus, melainkan harus berbelok menyusuri blok-blok gedung layaknya pergerakan taksi di perkotaan, metode perhitungan jarak matematika ini dinamakan....',
                'options' => [
                    'A' => 'Euclidean Distance',
                    'B' => 'Cosine Similarity',
                    'C' => 'Minkowski Distance',
                    'D' => 'Hamming Distance',
                    'E' => 'Manhattan Distance'
                ],
                'correct_answer' => 'E',
                'explanation' => 'Sesuai namanya, Manhattan Distance (atau Taxicab Geometry) menghitung jarak berdasarkan jalur siku-siku seperti tata letak jalanan di kota Manhattan.'
            ],
            [
                'question' => 'Seringkali kita kebingungan menentukan berapa banyak jumlah rentang batang (bin) yang harus dibuat saat menyusun grafik Histogram. Agar pola sebaran data terlihat jelas, ilmuwan data menggunakan sebuah rumus untuk menentukannya yang disebut....',
                'options' => [
                    'A' => 'Metode Elbow',
                    'B' => 'Aturan Sturges',
                    'C' => 'Jarak Euclidean',
                    'D' => 'Rentang Interkuartil (IQR)',
                    'E' => 'K-Means Clustering'
                ],
                'correct_answer' => 'B',
                'explanation' => 'Aturan Sturges (k = 1 + 3.322 log n) adalah standar matematika yang digunakan untuk menemukan jumlah kelas/batang (bin) paling proporsional dalam membuat Histogram.'
            ],
        ];

        // 5. Insert Batch
        foreach ($questions as $q) {
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['question'],
                'image' => $q['image'] ?? null,
                
                'option_a' => $q['options']['A'],
                'option_b' => $q['options']['B'],
                'option_c' => $q['options']['C'],
                'option_d' => $q['options']['D'],
                'option_e' => $q['options']['E'],
                
                'correct_answer' => strtolower($q['correct_answer']),
                'points' => 5, // 20 soal x 5 poin = 100 nilai maksimal
                'explanation' => $q['explanation'] ?? null
            ]);
        }
        
        $this->command->info('Berhasil menyuntikkan Penilaian Akhir Pembelajaran (20 Soal Lengkap dengan Gambar)!');
    }
}