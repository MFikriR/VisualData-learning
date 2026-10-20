<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;

class Bab3_KuisAkhirSeeder extends Seeder
{
    public function run(): void
    {
        $chapter = Chapter::where('sequence', 3)->first();

        if ($chapter) {
            // 1. Buat Header Kuis Evaluasi Bab 3
            $quiz = Quiz::updateOrCreate(
                ['chapter_id' => $chapter->id, 'type' => 'chapter_evaluation'],
                [
                    'title' => 'Evaluasi Bab 3: Pengelompokan Data (Clustering)',
                    'description' => 'Uji pemahaman komprehensif Bab 3 (Konsep Unsupervised Learning, Algoritma K-Means, dan Simulasi Lab).',
                    'time_limit' => 30, // 30 Menit
                ]
            );

            // 2. Bersihkan soal lama
            Question::where('quiz_id', $quiz->id)->delete();

            // 3. Daftar 20 Soal Lengkap Bab 3
            $questions = [
                [
                    'question' => 'Pengelompokan data (clustering) berpatokan pada dua prinsip utama, yaitu homogenitas internal dan heterogenitas eksternal. Maksud dari prinsip homogenitas internal adalah...',
                    'options' => [
                        'A' => 'Objek-objek data yang berada di dalam satu klaster yang sama memiliki tingkat kemiripan yang sangat tinggi.',
                        'B' => 'Objek-objek data yang berada pada klaster berbeda memiliki karakteristik yang persis sama.',
                        'C' => 'Seluruh titik data wajib diubah menjadi label kategorikal biner sebelum dihitung.',
                        'D' => 'Setiap klaster harus memiliki jumlah anggota data yang persis sama.',
                        'E' => 'Nilai rata-rata seluruh klaster harus bernilai nol.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Homogenitas internal berarti data di dalam satu klaster yang sama memiliki tingkat kemiripan yang tinggi.'
                ],
                [
                    'question' => 'Mengapa teknik clustering seperti algoritma K-Means dikategorikan sebagai metode Pembelajaran Tanpa Pengawasan (Unsupervised Learning)?',
                    'options' => [
                        'A' => 'Karena algoritma memerlukan data latih yang memiliki kunci jawaban/label target kelas.',
                        'B' => 'Karena algoritma mengolah data mentah tanpa label (unlabeled data) untuk menemukan struktur atau pola kelompok tersembunyi secara mandiri.',
                        'C' => 'Karena proses perhitungannya wajib didampingi oleh manusia pada setiap iterasi.',
                        'D' => 'Karena algoritma hanya dapat mengolah data teks berbentuk kalimat deskriptif.',
                        'E' => 'Karena algoritma pasti menghasilkan pohon keputusan (decision tree).'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Unsupervised Learning bekerja mengelompokkan data mentah tanpa bantuan label target kelas awal.'
                ],
                [
                    'question' => 'Perbedaan mendasar antara tugas Klasifikasi (Supervised Learning) dan Klasterisasi (Unsupervised Learning) terletak pada...',
                    'options' => [
                        'A' => 'Klasifikasi menggunakan data tanpa label, sedangkan klasterisasi menggunakan data berlabel target.',
                        'B' => 'Klasifikasi bertujuan mengelompokkan data berdasarkan kemiripan, sedangkan klasterisasi memprediksi nilai masa depan.',
                        'C' => 'Klasifikasi melatih model menggunakan data berlabel untuk memprediksi kategori, sedangkan klasterisasi mengelompokkan data tanpa label berdasarkan tingkat kemiripan fitur.',
                        'D' => 'Klasifikasi khusus untuk data angka, sedangkan klasterisasi khusus untuk data foto.',
                        'E' => 'Klasifikasi tidak memerlukan algoritma komputer, sedangkan klasterisasi memerlukan superkomputer.'
                    ],
                    'correct_answer' => 'c',
                    'explanation' => 'Klasifikasi melatih model menggunakan data berlabel, sedangkan klasterisasi mengelompokkan data tanpa label.'
                ],
                [
                    'question' => 'Dua titik koordinat data pada bidang 2D adalah A(1, 2) dan B(5, 5). Jarak Euclidean (Euclidean Distance) antara titik A dan titik B adalah...',
                    'options' => [
                        'A' => '3',
                        'B' => '4',
                        'C' => '5 (dihitung dari sqrt((5-1)^2 + (5-2)^2) = sqrt(16 + 9) = sqrt(25))',
                        'D' => '7',
                        'E' => '25'
                    ],
                    'correct_answer' => 'c',
                    'explanation' => 'Jarak Euclidean d = sqrt((5-1)^2 + (5-2)^2) = sqrt(16 + 9) = sqrt(25) = 5.'
                ],
                [
                    'question' => 'Sebelum melakukan perhitungan jarak Euclidean dan pengalokasian anggota pada iterasi pertama algoritma K-Means, dua langkah awal yang WAJIB dilakukan adalah...',
                    'options' => [
                        'A' => 'Menentukan nilai K (jumlah klaster) dan menentukan K titik centroid awal secara acak.',
                        'B' => 'Menghapus seluruh data pencilan (outlier) dan menghitung nilai rata-rata populasi.',
                        'C' => 'Membuat garis regresi best-fit dan mengurutkan data secara descending.',
                        'D' => 'Mengubah data numerik menjadi data kategorikal nominal.',
                        'E' => 'Memotong sumbu koordinat pada skala 90%.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Tahap awal K-Means adalah menetapkan nilai K dan menentukan K centroid awal secara acak.'
                ],
                [
                    'question' => 'Sebuah titik data S(5, 5) diuji jaraknya terhadap dua centroid: Centroid C1(1, 2) dan Centroid C2(8, 9). Hasil perhitungan menunjukkan d(S, C1) = 5,00 dan d(S, C2) = 5,00. Alokasi klaster yang benar untuk titik S adalah...',
                    'options' => [
                        'A' => 'Dialokasikan ke C1 saja karena nilai koordinat C1 lebih kecil.',
                        'B' => 'Dialokasikan ke C2 saja karena nilai koordinat C2 lebih besar.',
                        'C' => 'Titik S berjarak sama ke kedua centroid (d(S, C1) = d(S, C2) = 5,00), sehingga titik S berada tepat di garis perbatasan kedua klaster.',
                        'D' => 'Titik S dikategorikan sebagai outlier dan dibuang dari dataset.',
                        'E' => 'Titik S otomatis membuat klaster baru bernama C3.'
                    ],
                    'correct_answer' => 'c',
                    'explanation' => 'Karena jaraknya persis sama (5,00), titik S berada tepat di batas koordinat kedua centroid.'
                ],
                [
                    'question' => 'Setelah alokasi Iterasi 1, Klaster 1 memiliki 3 data anggota dengan koordinat: S1(10, 20), S2(20, 30), dan S3(30, 40). Koordinat Centroid Baru (C1\') hasil pembaruan untuk iterasi berikutnya adalah...',
                    'options' => [
                        'A' => '(10, 20)',
                        'B' => '(20, 30) (dihitung dari rata-rata X = (10+20+30)/3 = 20 dan Y = (20+30+40)/3 = 30)',
                        'C' => '(30, 40)',
                        'D' => '(60, 90)',
                        'E' => '(15, 25)'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Centroid baru dihitung dari rata-rata (mean) anggota: X = 60/3 = 20, Y = 90/3 = 30.'
                ],
                [
                    'question' => 'Proses iterasi perulangan pada algoritma K-Means (hitung jarak -> alokasi klaster -> update centroid) dinyatakan selesai (konvergen) apabila...',
                    'options' => [
                        'A' => 'Jumlah iterasi telah mencapai tepat 100 kali.',
                        'B' => 'Nilai centroid bernilai nol.',
                        'C' => 'Tidak ada lagi objek data yang berpindah keanggotaan klaster dan posisi titik centroid telah stabil.',
                        'D' => 'Seluruh data numerik terhapus dari memori komputer.',
                        'E' => 'Jumlah klaster K bertambah menjadi dua kali lipat.'
                    ],
                    'correct_answer' => 'c',
                    'explanation' => 'K-Means konvergen saat tidak ada lagi data yang berpindah klaster dan posisi centroid stabil.'
                ],
                [
                    'question' => 'Jika pada iterasi ke-2 terdapat 2 objek data yang berpindah dari Klaster 1 ke Klaster 2, langkah yang WAJIB dilakukan oleh algoritma K-Means selanjutnya adalah...',
                    'options' => [
                        'A' => 'Menghentikan program secara mendadak.',
                        'B' => 'Mengaku kalah dan mengulang dari langkah pembuatan tabel CSV.',
                        'C' => 'Menghitung kembali koordinat Centroid Baru untuk Klaster 1 dan Klaster 2 berdasarkan rata-rata anggota terbarunya.',
                        'D' => 'Menghapus 2 objek data yang berpindah tersebut.',
                        'E' => 'Mengubah metrik jarak menjadi diagram batang horizontal.'
                    ],
                    'correct_answer' => 'c',
                    'explanation' => 'Setiap kali ada perpindahan data, koordinat centroid baru wajib dihitung ulang dari rata-rata anggota terbarunya.'
                ],
                [
                    'question' => 'Seorang siswa mencoba menjalankan K-Means dengan menentukan nilai K = N (di mana jumlah klaster sama persis dengan jumlah total titik data). Evaluasi kritis terhadap hasil klasterisasi tersebut adalah...',
                    'options' => [
                        'A' => 'Hasil klasterisasi sangat berguna karena nilai SSE bernilai 0 dan setiap data menjadi centroid untuk dirinya sendiri, namun tidak memberikan makna pengelompokan (segmen) sama sekali.',
                        'B' => 'Hasil klasterisasi gagal total karena komputer akan mengalami crash.',
                        'C' => 'Hasil klasterisasi otomatis berubah menjadi grafik Scatter Plot korelasi negatif.',
                        'D' => 'Hasil klasterisasi merupakan metode paling ideal untuk semua jenis riset Data Science.',
                        'E' => 'Nilai centroid otomatis bernilai tak terhingga.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Jika K = N, nilai SSE = 0 karena tiap data menjadi centroidnya sendiri, tetapi tidak membentuk segmentasi kelompok.'
                ],
                [
                    'question' => 'Pada laboratorium simulasi interaktif K-Means, mengapa lokasi penentuan Centroid Awal (Initial Centroids) sangat memengaruhi jalannya simulasi?',
                    'options' => [
                        'A' => 'Karena lokasi centroid awal dapat memengaruhi arah pergeseran kelompok dan jumlah iterasi hingga mencapai titik konvergen.',
                        'B' => 'Karena centroid awal menentukan warna tampilan antarmuka perangkat lunak.',
                        'C' => 'Karena centroid awal menghapus data outlier secara otomatis.',
                        'D' => 'Karena lokasi centroid awal mengubah data angka menjadi variabel kualitatif.',
                        'E' => 'Karena centroid awal tidak berpengaruh sama sekali terhadap hasil simulasi.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'K-Means sensitif terhadap inisialisasi centroid awal, yang memengaruhi pergerakan kelompok dan kecepatan konvergensi.'
                ],
                [
                    'question' => 'Saat mengamati layar simulasi K-Means, indikator visual yang menunjukkan bahwa garis batas wilayah klaster (Voronoi tessellation) telah mencapai kondisi konvergen (stabil) adalah...',
                    'options' => [
                        'A' => 'Titik-titik data bergerak memutar tanpa henti.',
                        'B' => 'Titik-titik centroid tidak lagi bergeser dan keanggotaan data pada setiap klaster tidak mengalami perubahan.',
                        'C' => 'Warna seluruh titik data berubah menjadi hitam putih.',
                        'D' => 'Nilai SSE melonjak naik menjadi sangat tinggi.',
                        'E' => 'Grafik berubah menjadi diagram lingkaran 3D.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Indikator visual konvergensi adalah saat centroid berhenti bergeser dan batas keanggotaan klaster stabil.'
                ],
                [
                    'question' => 'Metrik Sum of Squared Errors (SSE) atau Within-Cluster Sum of Squares (WCSS) pada simulasi K-Means didefinisikan sebagai...',
                    'options' => [
                        'A' => 'Jumlah seluruh data yang ada di dalam database.',
                        'B' => 'Total penjumlahan dari kuadrat jarak Euclidean antara setiap titik datum dengan titik centroid klasternya.',
                        'C' => 'Selisih antara nilai maksimum dan minimum pada sumbu X.',
                        'D' => 'Perkalian antara nilai K dengan jumlah iterasi.',
                        'E' => 'Jarak terpanjang antara dua centroid yang berbeda.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'SSE merepresentasikan total kuadrat jarak Euclidean antara setiap datum dengan centroid di klasternya.'
                ],
                [
                    'question' => 'Mengapa nilai SSE / WCSS cenderung bernilai semakin kecil saat nilai jumlah klaster (K) ditingkatkan?',
                    'options' => [
                        'A' => 'Karena semakin banyak klaster, jarak antara setiap titik datum ke centroid terdekatnya menjadi semakin pendek.',
                        'B' => 'Karena data yang dimasukkan ke dalam sistem semakin sedikit.',
                        'C' => 'Karena algoritma memotong sumbu koordinat secara otomatis.',
                        'D' => 'Karena nilai kuadrat jarak diubah menjadi bilangan negatif.',
                        'E' => 'Karena nilai K yang besar menghapus data outlier.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Menambah jumlah K membuat jumlah kelompok lebih banyak, sehingga jarak setiap data ke centroid terdekatnya makin pendek.'
                ],
                [
                    'question' => 'Seorang siswa mencatat hasil pengujian variasi nilai K terhadap SSE: K=1 -> SSE=1200; K=2 -> SSE=550; K=3 -> SSE=180; K=4 -> SSE=140; K=5 -> SSE=115. Berdasarkan Metode Elbow, jumlah klaster optimal (K) yang harus dipilih adalah...',
                    'options' => [
                        'A' => 'K = 1, karena nilai SSE paling tinggi.',
                        'B' => 'K = 3, karena terjadi penurunan SSE yang sangat tajam hingga K=3, dan setelah K=3 penurunan SSE melambat drastis (membentuk titik siku).',
                        'C' => 'K = 5, karena selalu pilih angka K paling besar.',
                        'D' => 'K = 2, karena K=2 adalah angka genap pertama.',
                        'E' => 'K = 10, karena tidak terbatas.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Titik siku terjadi di K=3, di mana penurunan SSE berubah dari tajam (1200->550->180) menjadi melandai (180->140->115).'
                ],
                [
                    'question' => 'Istilah "Titik Siku" (Elbow Point) pada grafik Metode Elbow merujuk pada...',
                    'options' => [
                        'A' => 'Titik tertinggi pada grafik di mana nilai SSE paling maksimal.',
                        'B' => 'Titik sudut patahan pada grafik di mana penurunan nilai SSE mulai melambat secara drastis sebagai indikator nilai K paling ideal dan efisien.',
                        'C' => 'Titik perpotongan antara sumbu X dan sumbu Y di koordinat (0,0).',
                        'D' => 'Titik di mana nilai K bernilai negatif.',
                        'E' => 'Titik pertama saat simulasi baru dimulai.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Elbow point adalah titik patahan grafik di mana penurunan SSE melambat secara drastis, menunjukkan K paling efisien.'
                ],
                [
                    'question' => 'Apabila dari hasil laboratorium simulasi diperoleh nilai SSE yang sangat kecil (mendekati 0) untuk suatu klaster, interpretasi kualitas klaster yang benar adalah...',
                    'options' => [
                        'A' => 'Kualitas klaster buruk karena datanya terlalu sedikit.',
                        'B' => 'Kualitas klaster sangat baik karena sebaran data di dalam klaster berada sangat rapat mengumpul di sekitar centroid-nya (homogenitas internal tinggi).',
                        'C' => 'Kualitas klaster tidak dapat diukur karena terjadi kesalahan hitung.',
                        'D' => 'Klaster tersebut wajib dibuang dari analisis.',
                        'E' => 'Nilai K wajib dikurangi menjadi 1.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Nilai SSE yang kecil menandakan sebaran data sangat rapat di sekitar centroid (homogenitas internal tinggi).'
                ],
                [
                    'question' => 'Tujuan utama dari tahap Profilisasi Klaster (Cluster Profiling) setelah simulasi K-Means selesai adalah...',
                    'options' => [
                        'A' => 'Mengubah nilai angka statistik dan titik koordinat centroid akhir menjadi deskripsi segmen kualitatif yang bermakna bagi pengambil keputusan.',
                        'B' => 'Menghapus data siswa yang tidak lulus ujian.',
                        'C' => 'Mengulang kembali proses simulasi dari iterasi ke-1.',
                        'D' => 'Membuat grafik batang 3D dengan warna-warni acak.',
                        'E' => 'Menghitung koefisien korelasi Pearson antar variabel.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Cluster Profiling bertujuan menerjemahkan angka koordinat centroid menjadi segmen/label kualitatif yang intuitif.'
                ],
                [
                    'question' => 'Petugas perpustakaan mengelompokkan kebiasaan membaca siswa dan memperoleh 3 klaster dengan koordinat centroid akhir: Klaster 1 (28 artikel, 32 jam/bulan), Klaster 2 (14 artikel, 15 jam/bulan), Klaster 3 (3 artikel, 4 jam/bulan). Penamaan label profil kualitatif yang paling tepat untuk Klaster 3 adalah...',
                    'options' => [
                        'A' => 'Pembaca Sangat Aktif / Literat Mandiri',
                        'B' => 'Pembaca Pasif / Perlu Pendampingan',
                        'C' => 'Pembaca Moderat / Sedang',
                        'D' => 'Siswa Berprestasi Akademik Tinggi',
                        'E' => 'Kelompok Data Outlier Ekstrem'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Centroid (3 artikel, 4 jam/bulan) merepresentasikan tingkat aktivitas paling rendah, sehingga dilabeli Pembaca Pasif/Perlu Pendampingan.'
                ],
                [
                    'question' => 'Berdasarkan evaluasi profil Klaster 3 (Centroid: 3 artikel, 4 jam/bulan) pada Soal 19 di atas, intervensi kebijakan perpustakaan yang paling tepat sasaran dilakukan oleh pihak sekolah adalah...',
                    'options' => [
                        'A' => 'Memberikan penghargaan Duta Literasi Sekolah kepada Klaster 3.',
                        'B' => 'Memberikan program tantangan membaca berhadiah (reading challenge) dan bimbingan literasi khusus untuk memotivasi minat baca siswa Klaster 3.',
                        'C' => 'Dikeluarkan dari keanggotaan perpustakaan digital.',
                        'D' => 'Memaksa siswa Klaster 3 berpindah secara manual ke Klaster 1.',
                        'E' => 'Menghapus layanan perpustakaan digital sekolah.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Intervensi tepat sasaran untuk klaster bernilai rendah adalah memberikan program motivasi dan pendampingan khusus.'
                ]
            ];

            // 4. Insert Batch ke Database
            foreach ($questions as $q) {
                Question::create([
                    'quiz_id' => $quiz->id,
                    'question_text' => $q['question'],
                    'image' => null,
                    'option_a' => $q['options']['A'],
                    'option_b' => $q['options']['B'],
                    'option_c' => $q['options']['C'],
                    'option_d' => $q['options']['D'],
                    'option_e' => $q['options']['E'],
                    'correct_answer' => strtolower($q['correct_answer']),
                    'points' => 5, // 20 x 5 = 100
                    'explanation' => $q['explanation']
                ]);
            }
        }
    }
}