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
                'description' => 'Evaluasi komprehensif untuk menguji penguasaan materi Konsep Data, Visualisasi, dan Clustering.',
                'is_active' => true
            ]
        );

        // 2. Buat Quiz Header
        $quiz = Quiz::updateOrCreate(
            ['chapter_id' => $chapter->id, 'type' => 'final'], 
            [
                'title' => 'Evaluasi Akhir Pembelajaran',
                'description' => 'Gabungan materi Bab 1 (Data dan Pengolahannya) dan Bab 2 (Visualisasi & Pengelompokan Data) berjumlah 20 Soal.',
                'time_limit' => 60,
            ]
        );

        // 3. Bersihkan soal lama
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar Soal Lengkap (20 Soal Bertingkat: Mudah -> Sulit)
        // KUNCI JAWABAN POLA MERATA: A-B-C-D-E (Diulang 4 Kali)
        $questions = [
            // --- LEVEL MUDAH ---
            [
                'question' => 'Sekumpulan fakta, angka, atau keterangan mentah yang belum diolah dan merepresentasikan suatu keadaan nyata di lapangan dikenal dengan istilah....',
                'options' => [
                    'A' => 'Data mentah observasi',
                    'B' => 'Informasi digital akhir',
                    'C' => 'Variabel acak sistem',
                    'D' => 'Analisis visual grafik',
                    'E' => 'Output program mesin'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Data adalah fakta primer (mentah) yang belum melewati proses pengolahan menjadi informasi yang berguna.'
            ],
            [
                'question' => 'Jenis data berupa label kelompok yang tidak bisa dihitung menggunakan operasi matematika, seperti jenis kelamin laki-laki atau perempuan, diklasifikasikan sebagai data....',
                'options' => [
                    'A' => 'Numerik rasio kontinu',
                    'B' => 'Kualitatif jenis nominal',
                    'C' => 'Kuantitatif angka diskrit',
                    'D' => 'Rasio proporsional urut',
                    'E' => 'Interval berurutan tetap'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Data yang berisi kategori (teks/label) dan tidak bertingkat disebut sebagai data Kualitatif Nominal.'
            ],
            [
                'question' => 'Nilai statistik yang berada tepat di tengah-tengah dan membagi kumpulan data menjadi dua sama besar setelah seluruh angkanya diurutkan disebut sebagai nilai....',
                'options' => [
                    'A' => 'Rata-rata hitung (Mean)',
                    'B' => 'Kemunculan sering (Modus)',
                    'C' => 'Nilai pemisah (Median)',
                    'D' => 'Jangkauan jarak (Range)',
                    'E' => 'Simpangan baku (Varians)'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Median (Q2) adalah ukuran pemusatan yang letaknya persis membelah dua himpunan data yang telah diurutkan.'
            ],
            [
                'question' => 'Proses menyajikan sekumpulan angka ke dalam format grafis seperti diagram agar pola dan trennya lebih mudah dipahami oleh otak manusia secara cepat disebut dengan....',
                'options' => [
                    'A' => 'Rekayasa tabel informasi',
                    'B' => 'Manipulasi struktur data',
                    'C' => 'Pengumpulan sumber angka',
                    'D' => 'Visualisasi grafis data',
                    'E' => 'Pembersihan nilai ekstrem'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Visualisasi data adalah proses menerjemahkan deretan angka menjadi gambar, grafik, atau bagan.'
            ],
            [
                'question' => 'Jenis grafik yang menggunakan persegi panjang terpisah dan paling tepat digunakan ketika kita ingin membandingkan nilai antar kategori yang berbeda adalah grafik....',
                'options' => [
                    'A' => 'Titik pencar koordinat',
                    'B' => 'Lingkaran irisan porsi',
                    'C' => 'Garis lurus bersambung',
                    'D' => 'Histogram nilai kontinu',
                    'E' => 'Diagram batang terpisah'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Diagram batang (Bar Chart) menggunakan batang-batang yang terpisah untuk membandingkan data kategori.'
            ],

            // --- LEVEL MENENGAH ---
            [
                'question' => 'Ciri visual utama yang membedakan pembuatan Histogram dari Diagram Batang biasa adalah batang-batangnya yang harus digambarkan secara....',
                'options' => [
                    'A' => 'Saling berdempetan erat',
                    'B' => 'Menyebar jadi titik kecil',
                    'C' => 'Melingkar membentuk kue',
                    'D' => 'Bertumpuk di satu garis',
                    'E' => 'Terpisah oleh jarak jauh'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Histogram merepresentasikan rentang data numerik kontinu, sehingga batangnya saling menempel tanpa celah.'
            ],
            [
                'question' => 'Visualisasi data yang memanfaatkan titik-titik koordinat pada sumbu kartesius untuk melihat apakah ada korelasi antara dua variabel numerik dikenal dengan nama bagan....',
                'options' => [
                    'A' => 'Grafik batang ganda',
                    'B' => 'Diagram titik sebar',
                    'C' => 'Diagram porsi lingkaran',
                    'D' => 'Diagram kotak kumis',
                    'E' => 'Histogram balok dempet'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Diagram titik sebar (Scatter Plot) digunakan khusus untuk mencari hubungan (korelasi) dua variabel berbeda.'
            ],
            [
                'question' => 'Dalam ilmu komputer, proses untuk mengelompokkan ratusan data acak ke dalam beberapa kelompok berdasarkan tingkat kemiripan karakteristik yang dimilikinya disebut....',
                'options' => [
                    'A' => 'Visualisasi kerumunan',
                    'B' => 'Verifikasi keabsahan',
                    'C' => 'Clustering data mesin',
                    'D' => 'Pengurutan nilai hierarki',
                    'E' => 'Pembersihan baris kosong'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Clustering adalah teknik Machine Learning untuk membagi sekumpulan data ke dalam kelompok (cluster) yang mirip.'
            ],
            [
                'question' => 'Berdasarkan logika pengukuran matematis pada algoritma pengelompokan, dua buah data akan dianggap memiliki tingkat kemiripan yang sangat tinggi apabila letaknya semakin....',
                'options' => [
                    'A' => 'Berjauhan secara posisi',
                    'B' => 'Bersilangan arah garisnya',
                    'C' => 'Acak-acakan polanya',
                    'D' => 'Berdekatan di dalam grafik',
                    'E' => 'Menghilang warna titiknya'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Dalam algoritma pengelompokan spasial, jarak fisik yang dekat merepresentasikan kemiripan atribut antar data.'
            ],
            [
                'question' => 'Pada algoritma pembelajaran mesin K-Means, peran huruf "K" di bagian awal namanya memiliki makna penting yang secara khusus merepresentasikan nilai....',
                'options' => [
                    'A' => 'Kecepatan proses kelompok',
                    'B' => 'Jumlah nilai yang dihapus',
                    'C' => 'Jarak rata-rata kemiringan',
                    'D' => 'Total data pencilan ekstrem',
                    'E' => 'Jumlah kelompok dibentuk'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Huruf K melambangkan target jumlah klaster (kelompok) yang ingin dibangun oleh algoritma K-Means.'
            ],

            // --- LEVEL SEDIKIT SULIT ---
            [
                'question' => 'Sebuah titik data tunggal yang nilainya melompat sangat jauh dan berbeda secara drastis dari kerumunan data utama di dalam Box Plot biasa dijuluki sebagai data....',
                'options' => [
                    'A' => 'Pencilan rentang (Outlier)',
                    'B' => 'Nilai ambang batas atas',
                    'C' => 'Kuartil pemisah tengah',
                    'D' => 'Frekuensi kemunculan nol',
                    'E' => 'Pusat kelompok ekstrem'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Outlier (pencilan) adalah nilai anomali yang letaknya menyimpang dari mayoritas populasi himpunan data.'
            ],
            [
                'question' => 'Jika kita mengamati titik-titik pada Scatter Plot dan melihat bahwa polanya terus bergerak naik dari kiri bawah ke arah kanan atas, hal ini membuktikan kedua variabel memiliki....',
                'options' => [
                    'A' => 'Korelasi sebaran yang acak',
                    'B' => 'Korelasi relasional positif',
                    'C' => 'Korelasi penurunan negatif',
                    'D' => 'Korelasi konstan mendatar',
                    'E' => 'Korelasi nilai kembar nol'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Arah garis tren yang naik ke kanan atas menandakan bahwa jika nilai X naik, maka nilai Y juga akan ikut naik (Positif).'
            ],
            [
                'question' => 'Pada tahap paling awal sesaat sebelum menjalankan algoritma K-Means, hal pertama yang harus diletakkan ke dalam bidang grafik agar komputer bisa menghitung jarak adalah....',
                'options' => [
                    'A' => 'Garis persilangan pembatas',
                    'B' => 'Nilai rata-rata himpunan asli',
                    'C' => 'Titik centroid pusat secara acak',
                    'D' => 'Rentang toleransi jangkauan',
                    'E' => 'Batas pagar pencilan terluar'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Komputer wajib meletakkan titik Centroid (pusat klaster) awal secara sembarang untuk memulai kalkulasi jarak anggotanya.'
            ],
            [
                'question' => 'Agar bentuk visual Histogram terlihat seimbang dan proporsional, ilmuwan data sering menggunakan rumus matematis untuk menentukan jumlah interval ideal yang dinamakan Aturan....',
                'options' => [
                    'A' => 'Teorema sudut Pythagoras',
                    'B' => 'Distribusi peluang Bayes',
                    'C' => 'Gravitasi mekanika Newton',
                    'D' => 'Sturges untuk jumlah kelas',
                    'E' => 'Penjabaran matriks Cramer'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Aturan Sturges memberikan formulasi matematis untuk mencari seberapa banyak jumlah tiang (bin) yang ideal pada Histogram.'
            ],
            [
                'question' => 'Alasan paling logis mengapa batang-batang pada Histogram harus selalu berdempetan tanpa memiliki jarak pemisah adalah karena sumbu horizontalnya merepresentasikan jenis....',
                'options' => [
                    'A' => 'Data bertingkat secara ordinal',
                    'B' => 'Data deskripsi yang panjang',
                    'C' => 'Data label kualitatif nominal',
                    'D' => 'Data yang bersifat kategorikal',
                    'E' => 'Data angka yang bersifat kontinu'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Data kontinu adalah data berurutan yang tak terputus (seperti rentang tinggi badan), sehingga batang di grafiknya pun harus bersambung.'
            ],

            // --- LEVEL SULIT (HOTS) ---
            [
                'question' => 'Proses pergeseran titik dan anggota kelompok pada langkah iterasi K-Means akan dinyatakan selesai (konvergen) hanya jika posisi akhir dari titik pusat kelompoknya dalam keadaan....',
                'options' => [
                    'A' => 'Stabil dan tidak bergeser lagi',
                    'B' => 'Saling berbenturan satu arah',
                    'C' => 'Terus berpindah tanpa henti',
                    'D' => 'Memusat di titik kordinat nol',
                    'E' => 'Menyebar memisahkan anggotanya'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Konvergensi dicapai saat algoritma tidak lagi menemukan lokasi centroid yang lebih baik, sehingga titik pusatnya berhenti bergerak.'
            ],
            [
                'question' => 'Di antara lima indikator penting di dalam grafis Box Plot, selisih rentang matematis yang dihasilkan dari pengurangan nilai Kuartil Atas (Q3) dan Kuartil Bawah (Q1) dikenal dengan nama....',
                'options' => [
                    'A' => 'Standard Deviation Margin',
                    'B' => 'Interquartile Range (IQR)',
                    'C' => 'Mean Absolute Error Base',
                    'D' => 'Variance Population Radius',
                    'E' => 'Maximum Value Tolerance'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Rentang Antar Kuartil (IQR) merepresentasikan panjang kotak utama yang berisi 50% distribusi data paling inti di bagian tengah.'
            ],
            [
                'question' => 'Apabila titik-titik koordinat di dalam bidang Scatter Plot tampak menyebar sangat berantakan dan gagal membentuk pola lintasan yang jelas, maka dapat disimpulkan bahwa kedua variabel....',
                'options' => [
                    'A' => 'Membentuk relasi terbalik kuat',
                    'B' => 'Terkontaminasi bilangan negatif',
                    'C' => 'Sama sekali tidak ada hubungan',
                    'D' => 'Saling mendorong ke satu arah',
                    'E' => 'Berada pada fase tren eksponensial'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Kondisi awan titik yang murni acak tanpa alur linier membuktikan bahwa variabel X tidak mempengaruhi variabel Y.'
            ],
            [
                'question' => 'Sikap analitis dan tindakan kritis yang paling tepat ketika kita menemukan keberadaan sebuah angka ekstrem (outlier) di grafik kita sebelum gegabah menghapusnya dari tabel adalah....',
                'options' => [
                    'A' => 'Merubah angka aslinya menjadi nol',
                    'B' => 'Menduplikasi nilainya jadi seimbang',
                    'C' => 'Menyatukannya dengan nilai tertinggi',
                    'D' => 'Mencari tahu penyebab kemunculannya',
                    'E' => 'Membiarkan hingga tertolak sistem'
                ],
                'correct_answer' => 'd',
                'explanation' => 'Data outlier tidak boleh langsung dibuang karena ia bisa jadi bukan salah ketik, melainkan informasi anomali medis atau alam yang sangat penting.'
            ],
            [
                'question' => 'Saat jumlah data di layar Scatter Plot makin banyak dan padat, titik-titik tersebut secara alami akan saling berdekatan membentuk kerumunan, yang mana hal ini menjadi pondasi teknik algoritma....',
                'options' => [
                    'A' => 'Normalisasi besaran angka',
                    'B' => 'Interpolasi titik linier',
                    'C' => 'Manipulasi rentang grafik',
                    'D' => 'Ekstrapolasi garis tren',
                    'E' => 'Clustering pengelompokan'
                ],
                'correct_answer' => 'e',
                'explanation' => 'Pola kerumunan titik dalam ruang kartesius yang memiliki kedekatan jarak adalah inspirasi utama dari metode pembelajaran mesin Clustering.'
            ]
        ];

        // 5. Insert Batch (Menerjemahkan ke Database)
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
                'points' => 5, // 20 soal x 5 poin = Skor Sempurna 100
                'explanation' => $q['explanation'] ?? null
            ]);
        }
        
        $this->command->info('Uji Kompetensi Akhir Gabungan berhasil disuntikkan! (20 Soal, Kunci Jawaban A-B-C-D-E Sempurna).');
    }
}