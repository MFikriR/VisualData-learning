<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;

class Bab2_KuisAkhirSeeder extends Seeder
{
    public function run(): void
    {
        $chapter = Chapter::where('sequence', 2)->first();

        if ($chapter) {
            // 1. Buat Header Kuis Evaluasi Bab 2
            $quiz = Quiz::updateOrCreate(
                ['chapter_id' => $chapter->id, 'type' => 'chapter_evaluation'],
                [
                    'title' => 'Evaluasi Bab 2: Visualisasi Data',
                    'description' => 'Uji pemahaman komprehensif Bab 2 (Diagram Batang, Histogram, Box Plot, dan Scatter Plot).',
                    'time_limit' => 30, // 30 Menit
                ]
            );

            // 2. Bersihkan soal lama
            Question::where('quiz_id', $quiz->id)->delete();

            // 3. Daftar 20 Soal Lengkap Bab 2
            $questions = [
                [
                    'question' => 'Pengurus OSIS ingin menyajikan data jumlah pendaftar di 5 kelompok ekstrakurikuler yang terpisah (Pramuka, Paskibra, PMR, KIR, dan Basket). Alasan metodologis yang paling tepat memilih Diagram Batang untuk data tersebut adalah...',
                    'options' => [
                        'A' => 'Karena diagram batang digunakan untuk menampilkan perubahan data kontinu dari detik ke detik.',
                        'B' => 'Karena sangat efektif membandingkan besaran nilai atau frekuensi antar-kategori terpisah secara visual.',
                        'C' => 'Karena diagram batang membagi data ke dalam sektor lingkaran berpersentase total 100%.',
                        'D' => 'Karena diagram batang hanya dapat digunakan untuk data numerik berskala rasio tanpa kategori.',
                        'E' => 'Karena diagram batang tidak memerlukan adanya sumbu koordinat maupun skala angka.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Diagram Batang digunakan khusus untuk membandingkan besaran nilai atau frekuensi antar-kategori diskrit/terpisah.'
                ],
                [
                    'question' => 'Komponen anatomi visual pada Diagram Batang yang berfungsi menandakan bahwa kategori data bersifat terpisah (diskrit) dan membedakannya secara tegas dari Histogram adalah...',
                    'options' => [
                        'A' => 'Garis tren lurus (line of best fit)',
                        'B' => 'Adanya celah/spasi pemisah (gap) yang konsisten antar-batang',
                        'C' => 'Batang-batang yang saling berimpit tanpa celah',
                        'D' => 'Penggunaan simbol titik koordinat (x, y)',
                        'E' => 'Skala sumbu Y yang dipotong (truncated axis)'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Celah/gap antar-batang pada diagram batang menandakan bahwa data bersifat kategorikal terpisah.'
                ],
                [
                    'question' => 'Tim peneliti sekolah menyajikan data survei mengenai "10 Faktor Utama Penyebab Siswa Terlambat Masuk Sekolah", di mana setiap nama faktor dituliskan dalam kalimat deskriptif yang cukup panjang. Bentuk diagram batang yang paling efektif digunakan beserta alasannya adalah...',
                    'options' => [
                        'A' => 'Diagram Batang Vertikal (Column Chart), karena selalu lebih bagus untuk semua jenis data.',
                        'B' => 'Diagram Batang Horizontal, karena label kategori panjang diletakkan di Sumbu Y mendatar sehingga tidak tumpang tindih.',
                        'C' => 'Diagram Lingkaran 3D, karena dapat memuat kalimat panjang di dalam irisan lingkaran.',
                        'D' => 'Diagram Garis (Line Chart), karena faktor penyebab terlambat merupakan data time-series.',
                        'E' => 'Diagram Batang Bertumpuk (Stacked Bar Chart) tanpa label angka.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Diagram batang horizontal sangat cocok jika label kategori berupa kalimat panjang agar dapat dibaca mendatar di Sumbu Y.'
                ],
                [
                    'question' => 'Sebuah grafik berita menampilkan perbandingan tingkat kelulusan dua sekolah. Batang Sekolah A tampak 4 kali lebih tinggi dari Sekolah B. Namun setelah diperiksa, Sumbu Y dipotong (Truncated Y-Axis) dan dimulai dari angka 90%, padahal nilai Sekolah A adalah 94% dan Sekolah B adalah 91%. Evaluasi kritis terhadap grafik tersebut adalah...',
                    'options' => [
                        'A' => 'Grafik tersebut valid karena skala sumbu Y bebas dimulai dari angka berapa saja.',
                        'B' => 'Menyesatkan (misleading) karena memotong sumbu Y membesar-besarkan selisih 3% seolah-olah berbeda 4 kali lipat.',
                        'C' => 'Grafik tersebut salah karena seharusnya menggunakan piktogram.',
                        'D' => 'Grafik tersebut sudah jujur karena angka persentase dituliskan di atas batang.',
                        'E' => 'Grafik tersebut tergolong sebagai histogram kontinu.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Memotong sumbu Y (Truncated Y-Axis) melanggar prinsip Zero Baseline dan Proportional Ink sehingga grafik menjadi misleading.'
                ],
                [
                    'question' => 'Untuk membuat Diagram Batang kategori nominal yang jujur, komunikatif, dan mempermudah pembaca menganalisis hierarki data dari yang tertinggi hingga terendah, dua langkah etis yang wajib diterapkan adalah...',
                    'options' => [
                        'A' => 'Menggunakan Zero Baseline (Sumbu Y mulai 0) dan melakukan pengurutan batang (Sorting Bars).',
                        'B' => 'Memotong sumbu Y dari angka terendah dan memberi efek warna 3D berlebihan.',
                        'C' => 'Menghilangkan label sumbu dan menggunakan warna acak non-monotonik.',
                        'D' => 'Menghapus jarak pemisah (gap) antar-batang.',
                        'E' => 'Mengubah skala sumbu Y menjadi skala non-linear yang tidak teratur.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Dua prinsip penyajian etis diagram batang adalah Zero Baseline dan Sorting Bars.'
                ],
                [
                    'question' => 'Alasan utama mengapa batang-batang pada Histogram dibuat saling berimpit/menempel tanpa celah (gap) adalah...',
                    'options' => [
                        'A' => 'Karena hemat tempat saat dicetak di kertas.',
                        'B' => 'Karena mewakili data numerik kontinu yang berkesinambungan di sepanjang rentang interval kelas (bins).',
                        'C' => 'Karena data yang divisualisasikan berupa data kualitatif nominal terpisah.',
                        'D' => 'Karena terjadi kesalahan desain saat pembuatan grafik.',
                        'E' => 'Karena histogram khusus digunakan untuk data kategorikal ordinal.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Histogram menggambarkan distribusi frekuensi dari data numerik kontinu, sehingga batangnya saling berimpit.'
                ],
                [
                    'question' => 'Perbedaan mendasar antara Sumbu Horizontal (Sumbu X) pada Histogram dengan Sumbu Horizontal pada Diagram Batang adalah...',
                    'options' => [
                        'A' => 'Sumbu X Histogram memuat interval angka kontinu (bins), sedangkan Sumbu X Diagram Batang memuat label kategori terpisah.',
                        'B' => 'Sumbu X Histogram memuat nama bulan, sedangkan Sumbu X Diagram Batang memuat angka desimal.',
                        'C' => 'Sumbu X Histogram tidak memerlukan skala angka.',
                        'D' => 'Sumbu X Diagram Batang khusus digunakan untuk variabel terikat (dependen).',
                        'E' => 'Tidak ada perbedaan antara Sumbu X kedua grafik tersebut.'
                    ],
                    'correct_answer' => 'a',
                    'explanation' => 'Sumbu X Histogram memuat interval/rentang kelas kontinu, sedangkan Sumbu X Diagram Batang memuat kategori diskrit.'
                ],
                [
                    'question' => 'Seorang analis mengumpulkan 100 data numerik kontinu kadar gula darah. Jika jumlah interval kelas (K) ditentukan menggunakan Aturan Sturges (K = 1 + 3,322 log10(N) dengan log10(100) = 2), maka jumlah interval kelas ideal untuk histogram tersebut adalah...',
                    'options' => [
                        'A' => '5 kelas',
                        'B' => '7 kelas (dibulatkan dari 7,64)',
                        'C' => '10 kelas',
                        'D' => '12 kelas',
                        'E' => '15 kelas'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'K = 1 + 3,322(2) = 1 + 6,644 = 7,644, yang dibulatkan menjadi 7 kelas.'
                ],
                [
                    'question' => 'Hasil ujian Kimia yang sangat sulit menunjukkan bentuk histogram Miring Kiri (Left-Skewed). Karakteristik grafik dan hubungan nilai statistik pemusatan yang benar adalah...',
                    'options' => [
                        'A' => 'Puncak data berada di sebelah kiri, ekor memanjang ke kanan, dan Mean > Modus.',
                        'B' => 'Sebagian besar nilai tinggi (mengumpul kanan), ekor memanjang ke kiri, dan Mean < Median < Modus.',
                        'C' => 'Tinggi batang kiri dan kanan seimbang, sehingga Mean = Median.',
                        'D' => 'Grafik memiliki dua puncak sama tinggi yang membagi populasi menjadi dua.',
                        'E' => 'Nilai mean, median, dan modus berada di luar rentang sumbu X.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Distribusi Miring Kiri (Left-Skewed) memiliki ekor memanjang ke kiri dengan hubungan Mean < Median < Modus.'
                ],
                [
                    'question' => 'Sebuah histogram usia peserta pelatihan kerja menunjukkan dua puncak (Bimodal Distribution) yang terpisah pada kelompok usia 18–22 tahun dan 45–50 tahun. Wawasan (insight) analitis yang tepat adalah...',
                    'options' => [
                        'A' => 'Terjadi kesalahan input data (Garbage In, Garbage Out).',
                        'B' => 'Terdapat dua kelompok populasi berbeda di dalam dataset, sehingga data tidak boleh digabung dalam satu rata-rata.',
                        'C' => 'Seluruh peserta pelatihan memiliki usia yang seragam.',
                        'D' => 'Data usia peserta merupakan data kategorikal nominal.',
                        'E' => 'Skala sumbu Y wajib dipotong (truncated) agar grafik menjadi satu puncak.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Bimodal distribution menandakan adanya dua subpopulasi yang berbeda karakteristik di dalam satu dataset.'
                ],
                [
                    'question' => 'Diberikan ringkasan lima angka dari sebuah Box Plot: Minimum = 50, Q1 = 65, Median (Q2) = 75, Q3 = 85, dan Maksimum = 95. Nilai Jangkauan Interkuartil (IQR) dari data tersebut adalah...',
                    'options' => [
                        'A' => '10',
                        'B' => '20 (dihitung dari Q3 - Q1 = 85 - 65)',
                        'C' => '30',
                        'D' => '45',
                        'E' => '150'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'IQR = Q3 - Q1 = 85 - 65 = 20.'
                ],
                [
                    'question' => 'Bagian kotak persegi panjang (box) pada Diagram Kotak merepresentasikan...',
                    'options' => [
                        'A' => 'Seluruh 100% data sampel penelitian.',
                        'B' => 'Tempat mengumpulnya 50% data bagian tengah (antara Q1 dan Q3).',
                        'C' => 'Tempat beradanya 25% data paling ekstrem.',
                        'D' => 'Rentang nilai mean dan mode saja.',
                        'E' => 'Daerah yang pasti bebas dari pencilan (outlier).'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Kotak (box) merepresentasikan IQR, yaitu tempat beradanya 50% data bagian tengah.'
                ],
                [
                    'question' => 'Hasil pendataan penggunaan listrik rumah tangga memiliki Q1 = 310 kWh dan Q3 = 330 kWh. Salah satu rumah mencatatkan 750 kWh. Berdasarkan rumus pagar pencilan, evaluasi perhitungan yang benar mengenai angka 750 kWh adalah...',
                    'options' => [
                        'A' => 'Bukan pencilan karena batas atas pagar adalah 800 kWh.',
                        'B' => 'Pencilan atas karena IQR = 20 kWh dan Batas Atas Pagar adalah 360 kWh (Q3 + 1,5 x IQR), di mana 750 > 360.',
                        'C' => 'Merupakan pencilan bawah karena nilainya lebih besar dari median.',
                        'D' => 'Bukan pencilan karena masih terhubung oleh garis whisker.',
                        'E' => 'Merupakan nilai rata-rata kuadrat sampel.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Batas Atas = Q3 + 1,5(IQR) = 330 + 1,5(20) = 360 kWh. Karena 750 > 360, maka 750 kWh adalah pencilan atas.'
                ],
                [
                    'question' => 'Sebuah Box Plot menunjukkan posisi garis Median (Q2) berada sangat rapat dengan garis Q3, sementara garis whisker sebelah kiri membentang sangat panjang ke arah nilai rendah. Bentuk sebaran data (skewness) grafik tersebut adalah...',
                    'options' => [
                        'A' => 'Simetris Normal',
                        'B' => 'Miring Kanan (Positively Skewed)',
                        'C' => 'Miring Kiri (Negatively Skewed)',
                        'D' => 'Bimodal',
                        'E' => 'Uniform / Seragam'
                    ],
                    'correct_answer' => 'c',
                    'explanation' => 'Median yang dekat dengan Q3 dan whisker kiri yang panjang menandakan sebaran Miring Kiri (Negatively Skewed).'
                ],
                [
                    'question' => 'Dua model AI diuji konsistensi waktu pelatihannya: Model A (IQR = 0,3 jam) dan Model B (IQR = 1,8 jam). Jika industri membutuhkan model dengan performa paling stabil dan seragam, evaluasi keputusan yang tepat adalah...',
                    'options' => [
                        'A' => 'Memilih Model B karena IQR-nya lebih besar.',
                        'B' => 'Memilih Model A karena rentang IQR sempit (0,3 jam) menandakan variabilitas sebaran waktu lebih konsisten.',
                        'C' => 'Memilih Model B karena memiliki pencilan.',
                        'D' => 'Memilih kedua model secara acak.',
                        'E' => 'Menolak kedua model karena tidak menggunakan grafik garis.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Semakin sempit rentang IQR, semakin rendah variabilitas data dan semakin konsisten/stabil nilainya.'
                ],
                [
                    'question' => 'Seorang peneliti ingin menganalisis hubungan antara "Jarak Tempuh Perjalanan (km)" dengan "Konsumsi Bahan Bakar (Liter)". Peletakan variabel pada sumbu koordinat Scatter Plot yang benar adalah...',
                    'options' => [
                        'A' => 'Jarak tempuh pada Sumbu Y (dependen), Konsumsi BBM pada Sumbu X (independen).',
                        'B' => 'Jarak tempuh pada Sumbu X (Variabel Independen) dan Konsumsi BBM pada Sumbu Y (Variabel Dependen).',
                        'C' => 'Kedua variabel diletakkan bersamaan pada Sumbu X.',
                        'D' => 'Konsumsi BBM pada Sumbu X (bebas), Jarak tempuh pada Sumbu Y (terikat).',
                        'E' => 'Sumbu X dan Y hanya boleh memuat data kualitatif.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Variabel independen (pemprediksi) diletakkan di Sumbu X, sedangkan variabel dependen (respon) diletakkan di Sumbu Y.'
                ],
                [
                    'question' => 'Setiap simbol titik (•) yang tersebar pada bidang Kartesius Diagram Sebar merepresentasikan...',
                    'options' => [
                        'A' => 'Nilai rata-rata dari seluruh sampel.',
                        'B' => 'Pasangan koordinat (x, y) dari satu pengamatan bivariat tunggal.',
                        'C' => 'Panjang interval kelas (bin width).',
                        'D' => 'Batas pagar pencilan atas dan bawah.',
                        'E' => 'Persentase proporsi sektor lingkaran.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Titik pada Scatter Plot merepresentasikan pasangan data bivariat (x, y) dari satu pengamatan tunggal.'
                ],
                [
                    'question' => 'Sebaran titik-titik data pada Scatter Plot bergerak miring turun dari kiri atas ke kanan bawah secara rapat. Pola korelasi dan arti praktis dari grafik tersebut adalah...',
                    'options' => [
                        'A' => 'Korelasi Positif Kuat; jika nilai X naik, nilai Y ikut naik.',
                        'B' => 'Korelasi Negatif Kuat Linear; jika nilai X meningkat, nilai Y justru cenderung menurun.',
                        'C' => 'Tidak Ada Korelasi; perubahan X tidak memengaruhi Y.',
                        'D' => 'Korelasi Kurva Non-Linear Positif.',
                        'E' => 'Korelasi Sempurna r = 0.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Pola turun ke kanan bawah menandakan Korelasi Negatif, artinya jika X naik maka Y cenderung turun.'
                ],
                [
                    'question' => 'Di dalam Scatter Plot, terdapat satu titik data yang letaknya terpisah jauh di atas garis tren umum. Evaluasi tindakan dan dampak yang tepat terhadap titik pencilan (outlier) tersebut adalah...',
                    'options' => [
                        'A' => 'Membuang titik tersebut langsung tanpa dicatat.',
                        'B' => 'Mengidentifikasi sebagai outlier dan menganalisis alasannya karena dapat memengaruhi kemiringan garis best-fit.',
                        'C' => 'Memindahkan titik tersebut secara paksa ke garis tren.',
                        'D' => 'Mengubah skala sumbu X agar titik tersebut sejajar.',
                        'E' => 'Menghapus seluruh garis tren dari grafik.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Outlier pada scatter plot wajib dianalisis alasannya karena dapat memengaruhi kemiringan garis regresi/best-fit.'
                ],
                [
                    'question' => 'Ditemukan korelasi positif sangat tinggi (r = 0,89) antara "Jumlah Penjualan Sepatu Lari" dan "Jumlah Penjualan Es Krim". Analis menyimpulkan bahwa "Membeli sepatu lari menyebabkan masyarakat menjadi haus dan membeli es krim". Evaluasi kritis terhadap kesimpulan tersebut adalah...',
                    'options' => [
                        'A' => 'Kesimpulan sangat tepat karena r = 0,89 membuktikan kausalitas mutlak.',
                        'B' => 'Keliru karena korelasi tinggi tidak otomatis menyiratkan sebab-akibat; kenaikan dipicu oleh variabel ketiga (cuaca panas).',
                        'C' => 'Kesimpulan salah karena r = 0,89 menandakan tidak ada korelasi.',
                        'D' => 'Kesimpulan tepat karena data merupakan data bivariat.',
                        'E' => 'Kesimpulan salah karena korelasi hanya berlaku untuk data kategorikal.'
                    ],
                    'correct_answer' => 'b',
                    'explanation' => 'Korelasi tinggi tidak membuktikan kausalitas/sebab-akibat (Correlation != Causation).'
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