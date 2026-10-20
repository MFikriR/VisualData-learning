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
            ['chapter_id' => $chapter->id, 'type' => 'final'], 
            [
                'title' => 'Evaluasi Akhir Bab 1: Pengenalan, Pengolahan, dan Analisis Data',
                'description' => 'Evaluasi pemahaman secara menyeluruh tentang Konsep Dasar Data, Pengolahan Data, dan Analisis Data Deskriptif.',
                'time_limit' => 45, // 45 Menit
            ]
        );

        // 3. Bersihkan soal lama agar tidak duplikat saat seeder dijalankan ulang
        Question::where('quiz_id', $quiz->id)->delete();

        // 4. Daftar 20 Soal Evaluasi Akhir Bab 1
        $questions = [
            // Q1: Jawaban B [TP 1.1]
            [
                'question' => 'Istilah data berasal dari bahasa Latin datum. Dalam bidang informatika dan sistem komputer, manakah pernyataan berikut yang paling tepat mendefinisikan konsep Data?',
                'image' => null,
                'options' => [
                    'A' => 'Hasil analisis grafik yang disajikan dalam bentuk rekomendasi keputusan bisnis.',
                    'B' => 'Sekumpulan fakta mentah, angka, teks, gambar, atau suara digital yang disimpan dan belum memiliki arti khusus sebelum diolah.',
                    'C' => 'Informasi matang yang siap digunakan langsung oleh pengambil keputusan tanpa pemrosesan.',
                    'D' => 'Ringkasan nilai rata-rata dan nilai tengah dari hasil pengamatan sampel penelitian.',
                    'E' => 'Kesimpulan akhir dari sebuah riset ilmiah yang sudah dipublikasikan.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Data adalah sekumpulan fakta mentah, angka, teks, gambar, atau suara digital yang disimpan dan belum memiliki arti khusus sebelum diolah menjadi informasi.'
            ],
            // Q2: Jawaban C [TP 1.1]
            [
                'question' => 'Seorang peneliti mencatat deretan angka mentah 160, 175, 168. Setelah diolah oleh sistem komputer, sistem menampilkan kalimat: "Rata-rata tinggi badan siswa kelas XI adalah 167,6 cm". Mengapa kalimat hasil pengolahan tersebut dikategorikan sebagai Informasi?',
                'image' => null,
                'options' => [
                    'A' => 'Karena kalimat tersebut terdiri dari kumpulan angka tanpa huruf.',
                    'B' => 'Karena angka-angka tersebut diambil langsung dari sumber pengamatan tanpa diubah.',
                    'C' => 'Karena data mentah telah diberi satuan, konteks, dan dihitung nilainya sehingga memiliki makna serta nilai guna.',
                    'D' => 'Karena jumlah angka mentah yang dimasukkan ke dalam sistem kurang dari 10 datum.',
                    'E' => 'Karena kalimat tersebut bersifat rahasia dan tidak boleh diketahui oleh publik.'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Informasi adalah data yang telah diolah, diberi konteks, satuan, dan makna sehingga bermanfaat untuk pengambilan keputusan.'
            ],
            // Q3: Jawaban C [TP 1.2]
            [
                'question' => 'Pak Budi mencatat nomor absen siswa (seperti 1, 2, 3) dan kode pos wilayah tempat tinggal siswa (seperti 70111, 70112). Meskipun tersusun atas deretan angka, data tersebut dikategorikan sebagai Data Kategorikal (Nominal) karena...',
                'image' => null,
                'options' => [
                    'A' => 'Angka tersebut didapatkan dari hasil pengukuran menggunakan alat ukur presisi.',
                    'B' => 'Nilai angka tersebut berbentuk desimal atau pecahan yang dapat dibulatkan.',
                    'C' => 'Angka tersebut hanya berfungsi sebagai label/identitas dan tidak logis jika dioperasikan secara aritmatika (dijumlahkan atau dirata-ratakan).',
                    'D' => 'Angka tersebut memiliki tingkatan hierarki di mana angka yang lebih besar selalu lebih baik.',
                    'E' => 'Angka tersebut tersimpan dalam berkas gambar digital .png.'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Data nominal angka seperti nomor absen atau kode pos berfungsi murni sebagai label/identitas dan tidak dapat dioperasikan secara matematika/aritmatika.'
            ],
            // Q4: Jawaban B [TP 1.2]
            [
                'question' => "Pengelola perpustakaan mendata dua jenis variabel:\n- Variabel X: Jumlah buku yang dipinjam oleh siswa (misal: 2 buku, 5 buku).\n- Variabel Y: Berat total tumpukan buku saat ditimbang (misal: 1,2 kg, 2,8 kg).\nPengelompokan sifat data kuantitatif yang paling tepat untuk kedua variabel tersebut adalah...",
                'image' => null,
                'options' => [
                    'A' => 'Variabel X adalah data kontinu, sedangkan Variabel Y adalah data diskrit.',
                    'B' => 'Variabel X adalah data diskrit (hasil pencacahan/bilangan bulat), sedangkan Variabel Y adalah data kontinu (hasil pengukuran/berupa rentang desimal).',
                    'C' => 'Variabel X adalah data tidak terstruktur, sedangkan Variabel Y adalah data terstruktur.',
                    'D' => 'Variabel X adalah data skala nominal, sedangkan Variabel Y adalah data skala ordinal.',
                    'E' => 'Variabel X dan Variabel Y keduanya tergolong sebagai data kualitatif.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Variabel X diperoleh dari hasil menghitung/mencacah (diskrit, bulat), sedangkan Variabel Y diperoleh dari hasil mengukur dengan alat timbang (kontinu, pecahan/desimal).'
            ],
            // Q5: Jawaban C [TP 1.2]
            [
                'question' => 'Berkas digital seperti foto kegiatan ekstrakurikuler (format .jpg), pesan teks chatting kelompok, dan rekaman audio wawancara (format .mp3) diklasifikasikan ke dalam bentuk struktur digital...',
                'image' => null,
                'options' => [
                    'A' => 'Data Terstruktur (Structured Data)',
                    'B' => 'Data Tabel Relasional (SQL Data)',
                    'C' => 'Data Tidak Terstruktur (Unstructured Data)',
                    'D' => 'Data Semi-Terstruktur (XML Data)',
                    'E' => 'Data Numerik Rasio'
                ],
                'correct_answer' => 'c',
                'explanation' => 'File foto, pesan percakapan bebas, dan rekaman audio tidak memiliki skema tabel baris-kolom yang kaku sehingga dikategorikan sebagai Data Tidak Terstruktur.'
            ],
            // Q6: Jawaban B [TP 1.3]
            [
                'question' => 'Sebuah grafik batang menampilkan peningkatan penjualan kantin sekolah. Namun, pembuat grafik memotong skala sumbu Y (Truncated Y-Axis) dan memulainya dari angka 95 (bukan dari 0). Dampak visual yang dirasakan oleh pembaca grafik tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Grafik menjadi sangat datar dan tidak memperlihatkan perbedaan sama sekali.',
                    'B' => 'Perbedaan angka kenaikan yang sebenarnya kecil terlihat seolah-olah melonjak sangat drastis dan berlebihan.',
                    'C' => 'Warna batang grafik secara otomatis berubah menjadi tidak konsisten.',
                    'D' => 'Data angka kuantitatif pada grafik otomatis terkonversi menjadi data kualitatif.',
                    'E' => 'Pembaca dapat melihat nilai presisi dari setiap sampel secara objektif.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Memotong sumbu Y (truncated Y-axis) melanggar prinsip proportional ink dan membesar-besarkan perbedaan selisih data secara manipulatif/visual.'
            ],
            // Q7: Jawaban B [TP 1.3]
            [
                'question' => 'Ditemukan data bahwa tingkat penjualan es krim dan tingkat kasus kecelakaan berenang sama-sama meningkat pada bulan Juli. Seorang analis menyimpulkan bahwa "Memakan es krim menyebabkan orang tenggelam saat berenang". Analisis kritis yang tepat terhadap kesalahan kesimpulan tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Kesimpulan tersebut benar karena nilai korelasi positif selalu membuktikan hubungan sebab-akibat.',
                    'B' => 'Kesimpulan tersebut keliru karena mengabaikan variabel ketiga (yaitu musim panas/terik) yang menjadi penyebab meningkatnya kedua variabel secara bersamaan.',
                    'C' => 'Kesimpulan tersebut keliru karena data es krim tergolong data tidak terstruktur.',
                    'D' => 'Kesimpulan tersebut terjadi akibat kesalahan pemotongan sumbu Y pada grafik.',
                    'E' => 'Kesimpulan tersebut benar karena didasarkan pada sampel data yang berukuran sangat besar.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Korelasi tidak sama dengan kausalitas (Correlation ≠ Causation). Kenaikan penjualan es krim dan kasus tenggelam sama-sama dipengaruhi oleh variabel luar (suhu udara panas di musim panas).'
            ],
            // Q8: Jawaban B [TP 2.1]
            [
                'question' => 'Prinsip "Garbage In, Garbage Out" (GIGO) dalam tahap pengolahan data mengandung arti bahwa...',
                'image' => null,
                'options' => [
                    'A' => 'Komputer akan menghapus file sampah di dalam memori secara otomatis sebelum pemrosesan.',
                    'B' => 'Jika data mentah yang dimasukkan berkualitas kotor atau salah, maka hasil analisis yang dikeluarkan dipastikan salah dan menyesatkan.',
                    'C' => 'Data mentah yang tidak lengkap dapat diubah secara otomatis menjadi informasi yang sempurna oleh algoritma.',
                    'D' => 'Hasil analisis data yang buruk dapat diperbaiki hanya dengan mengubah warna grafik.',
                    'E' => 'Pengolahan data tidak memerlukan tahap pembersihan jika menggunakan komputer canggih.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Prinsip GIGO menegaskan bahwa kualitas output/analisis sangat bergantung pada kualitas input data mentah yang dimasukkan.'
            ],
            // Q9: Jawaban C [TP 2.1]
            [
                'question' => 'Saat memeriksa formulir pendaftaran ulang, staf TU menemukan beberapa baris data di mana kolom "Nomor HP Orang Tua" dikosongkan oleh pendaftar. Teknik penanganan missing values dengan cara mengisi kolom kosong tersebut menggunakan estimasi nilai statistik (seperti rata-rata atau nilai tengah) disebut...',
                'image' => null,
                'options' => [
                    'A' => 'Deletion (Penghapusan baris)',
                    'B' => 'Trimming (Pemotongan)',
                    'C' => 'Imputation (Imputasi)',
                    'D' => 'Sorting (Pengurutan)',
                    'E' => 'Grouping (Pengelompokan)'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Imputasi (Imputation) adalah teknik penanganan data hilang (missing values) dengan cara mengisi nilai pengganti estimasi/statistik.'
            ],
            // Q10: Jawaban C [TP 2.1]
            [
                'question' => 'Pada kolom "Nilai Ujian" siswa dengan skala 0–100, tercatat angka 950 akibat kesalahan ketik (human error). Angka 950 ini berada sangat jauh di luar rentang mayoritas data lainnya. Dalam data cleaning, angka tersebut dikategorikan sebagai...',
                'image' => null,
                'options' => [
                    'A' => 'Data Duplikat (Duplicate Data)',
                    'B' => 'Data Terstruktur (Structured Data)',
                    'C' => 'Pencilan (Outlier)',
                    'D' => 'Nilai Tengah (Median)',
                    'E' => 'Data Kategorikal Ordinal'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Angka yang menyimpang sangat jauh dari rentang nilai normal/mayoritas data dikategorikan sebagai pencilan (outlier) akibat kesalahan ketik.'
            ],
            // Q11: Jawaban B [TP 2.2]
            [
                'question' => 'Guru Olahraga ingin menampilkan tabel daftar siswa mulai dari siswa yang memiliki tinggi badan tertinggi hingga yang terendah. Jenis pengurutan (sorting) yang harus diterapkan pada kolom tinggi badan tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Ascending (Menaik, dari terkecil ke terbesar)',
                    'B' => 'Descending (Menurun, dari terbesar ke terkecil)',
                    'C' => 'Grouping berdasarkan jenis kelamin',
                    'D' => 'Imputasi nilai rata-rata',
                    'E' => 'Filtering data kategorikal'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Pengurutan dari nilai terbesar ke terkecil dinamakan pengurutan menurun atau Descending.'
            ],
            // Q12: Jawaban A [TP 2.2]
            [
                'question' => 'Pengelola kantin mencatat total penjualan makanan sebesar 200 porsi. Sebanyak 50 porsi di antaranya adalah Nasi Goreng. Rumus dan hasil perhitungan persentase proporsi penjualan Nasi Goreng terhadap total penjualan adalah...',
                'image' => null,
                'options' => [
                    'A' => 'PERSENTASE = (50 / 200) × 100% = 25%',
                    'B' => 'PERSENTASE = (200 / 50) × 100% = 400%',
                    'C' => 'AVERAGE = 200 - 50 = 150%',
                    'D' => 'SUM = 200 + 50 = 250%',
                    'E' => 'MEDIAN = (200 + 50) / 2 = 125%'
                ],
                'correct_answer' => 'a',
                'explanation' => 'Persentase proporsi dihitung dengan membagi jumlah bagian (50) dengan total keseluruhan (200) lalu dikalikan 100% = 25%.'
            ],
            // Q13: Jawaban C [TP 2.3]
            [
                'question' => 'Seorang peneliti menyajikan data statistik penelitiannya. Kapan peneliti tersebut lebih disarankan menggunakan Tabel Ringkasan daripada Diagram/Grafik?',
                'image' => null,
                'options' => [
                    'A' => 'Ketika ingin menampilkan tren perkembangan data dari waktu ke waktu secara visual dan cepat.',
                    'B' => 'Ketika target pembaca adalah masyarakat umum yang tidak menyukai angka detail.',
                    'C' => 'Ketika pembaca membutuhkan nilai angka yang presisi, pasti, rinci, dan memuat beberapa variabel dengan satuan berbeda.',
                    'D' => 'Ketika peneliti ingin memperlihatkan proporsi persentase dalam bentuk potongan lingkaran.',
                    'E' => 'Ketika data yang disajikan berbentuk file foto dan video digital.'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Tabel Ringkasan digunakan saat pembaca membutuhkan nilai angka yang rinci, presisi, dan pasti dengan berbagai satuan berbeda.'
            ],
            // Q14: Jawaban C [TP 2.3]
            [
                'question' => 'Guru Informatika ingin menganalisis apakah terdapat pola hubungan atau korelasi antara "Tinggi Badan" (Sumbu X) dan "Berat Badan" (Sumbu Y) dari 30 siswa. Jenis grafik yang paling tepat digunakan adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Diagram Lingkaran (Pie Chart)',
                    'B' => 'Diagram Batang (Bar Chart)',
                    'C' => 'Grafik Pencar (Scatter Plot)',
                    'D' => 'Diagram Garis (Line Chart)',
                    'E' => 'Tabel Frekuensi Tunggal'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Grafik Pencar (Scatter Plot) adalah jenis grafik yang paling tepat untuk melihat pola korelasi atau hubungan antara dua variabel numerik kuantitatif.'
            ],
            // Q15: Jawaban C [TP 3.1]
            [
                'question' => 'Hasil nilai tes simulasi coding dari 5 orang siswa adalah sebagai berikut: 70, 80, 85, 90, 100. Nilai Mean (\bar{x}) dari data tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => '80',
                    'B' => '82,5',
                    'C' => '85',
                    'D' => '90',
                    'E' => '425'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Mean = (70 + 80 + 85 + 90 + 100) / 5 = 425 / 5 = 85.'
            ],
            // Q16: Jawaban C [TP 3.1]
            [
                'question' => 'Pengurus OSIS mendata ukuran baju seragam yang dipesan oleh siswa baru (S, M, L, XL, XXL) untuk menentukan ukuran yang paling banyak diproduksi. Ukuran pemusatan data yang wajib digunakan untuk menganalisis data kategorikal tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Mean (Rata-rata)',
                    'B' => 'Median (Nilai Tengah)',
                    'C' => 'Modus (Nilai yang Sering Muncul)',
                    'D' => 'Jangkauan Interkuartil (IQR)',
                    'E' => 'Standar Deviasi'
                ],
                'correct_answer' => 'c',
                'explanation' => 'Modus (nilai/kategori dengan frekuensi terbanyak) adalah satu-satunya ukuran pemusatan yang dapat digunakan untuk menganalisis data kategorikal/nominal.'
            ],
            // Q17: Jawaban B [TP 3.2]
            [
                'question' => 'Sebuah perusahaan mendata gaji 10 karyawannya. Sembilan staf memiliki gaji di rentang Rp 4 juta–Rp 5 juta, sedangkan 1 orang Direktur Utama memiliki gaji Rp 150 juta (sebagai outlier ekstrem). Mengapa nilai Median lebih jujur dan direkomendasikan untuk menggambarkan rata-rata gaji karyawan daripada Mean?',
                'image' => null,
                'options' => [
                    'A' => 'Karena Median memperhitungakan nilai ekstrim sehingga nilainya menjadi membengkak.',
                    'B' => 'Karena Median bersifat resistan (robust) terhadap nilai pencilan ekstrem dan tidak akan terdistorsi oleh gaji Direktur.',
                    'C' => 'Karena Mean hanya bisa digunakan jika data berbentuk kata-kata/kategorikal.',
                    'D' => 'Karena nilai Median selalu bernilai nol pada data kuantitatif.',
                    'E' => 'Karena rumus Mean membutuhkan perhitungan kuartil terlebih dahulu.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Median bersifat resistan (robust) atau tahan terhadap pencilan ekstrem, sehingga gambaran nilai tengah tidak terdistorsi oleh angka 150 juta milik Direktur Utama.'
            ],
            // Q18: Jawaban A [TP 3.2]
            [
                'question' => 'Diberikan sekumpulan data nilai siswa terurut dengan Kuartil Bawah (Q1 = 65) dan Kuartil Atas (Q3 = 85). Nilai Jangkauan Interkuartil (IQR) dari data tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => '20',
                    'B' => '75',
                    'C' => '150',
                    'D' => '2,5',
                    'E' => '55'
                ],
                'correct_answer' => 'a',
                'explanation' => 'IQR = Q3 - Q1 = 85 - 65 = 20.'
            ],
            // Q19: Jawaban B [TP 3.3]
            [
                'question' => 'Hasil analisis nilai ujian matematika suatu kelas menunjukkan bahwa Mean = 68, namun Median = 85. Ditemukan bahwa ada 2 siswa yang mendapat nilai 10 karena tidak hadir. Wawasan (insight) yang paling tepat dari data tersebut adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Seluruh siswa di kelas tersebut gagal memahami materi matematika.',
                    'B' => 'Mayoritas siswa sebenarnya berkinerja sangat baik (mengelompok di angka 85), dan penurunan nilai rata-rata kelas semata-mata ditarik oleh 2 nilai ekstrem di bawah.',
                    'C' => 'Nilai KKM sekolah harus segera diturunkan menjadi angka 10.',
                    'D' => 'Dua siswa tersebut harus dikeluarkan dari sekolah tanpa analisis lanjutan.',
                    'E' => 'Nilai Median pasti salah hitung karena nilainya lebih besar dari Mean.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Perbandingan Mean (68) dan Median (85) menunjukkan sebaran miring ke kiri akibat outlier nilai 10. Sebenarnya mayoritas siswa berkinerja sangat baik mengelompok di angka 85.'
            ],
            // Q20: Jawaban B [TP 3.3]
            [
                'question' => 'Berdasarkan wawasan (insight) pada soal nomor 19 di atas, tindakan/keputusan pedagogis yang paling tepat dan berkeadilan dilakukan oleh guru adalah...',
                'image' => null,
                'options' => [
                    'A' => 'Mengulang seluruh materi pembelajaran dari awal untuk satu kelas penuh secara klasikal.',
                    'B' => 'Memberikan pendampingan bimbingan/remedial khusus hanya kepada 2 siswa yang tidak hadir tersebut, tanpa mengganggu siswa lain yang sudah paham.',
                    'C' => 'Mengubah seluruh nilai angka menjadi data kategorikal nominal secara acak.',
                    'D' => 'Memotong sumbu Y pada grafik nilai agar terlihat sama rata.',
                    'E' => 'Menghapus data seluruh siswa agar nilai rata-rata menjadi sempurna.'
                ],
                'correct_answer' => 'b',
                'explanation' => 'Karena mayoritas siswa sudah memahami materi, tindakan yang tepat dan adil adalah memberikan intervensi/remedial personal khusus kepada 2 siswa yang tidak hadir.'
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

        $this->command->info('Berhasil membuat 20 Soal Evaluasi Akhir Bab 1: Pengenalan, Pengolahan, dan Analisis Data!');
    }
}