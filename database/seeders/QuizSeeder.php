<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Chapter;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan Chapter 1 ada (dari seeder sebelumnya)
        $chapter1 = Chapter::where('sequence', 1)->first();

        if ($chapter1) {
            // 1. Buat Header Kuis
            $quiz = Quiz::create([
                'chapter_id' => $chapter1->id,
                'title' => 'Kuis Formatif: Visualisasi Data',
                'time_limit' => 10 // 10 menit
            ]);

            // 2. Buat Soal-soal
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => 'Grafik manakah yang paling tepat digunakan untuk melihat distribusi frekuensi data numerik?',
                'option_a' => 'Diagram Batang',
                'option_b' => 'Pie Chart',
                'option_c' => 'Histogram', // Jawaban Benar
                'option_d' => 'Scatter Plot',
                'option_e' => 'Line Chart',
                'correct_answer' => 'c',
                'explanation' => 'Histogram digunakan untuk data numerik kontinu, sedangkan Diagram Batang untuk data kategori.'
            ]);

            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => 'Dalam Box Plot, garis di tengah kotak menunjukkan nilai apa?',
                'option_a' => 'Mean (Rata-rata)',
                'option_b' => 'Median (Nilai Tengah)', // Jawaban Benar
                'option_c' => 'Modus',
                'option_d' => 'Q1 (Kuartil Bawah)',
                'option_e' => 'Q3 (Kuartil Atas)',
                'correct_answer' => 'b',
                'explanation' => 'Garis tengah pada Box Plot merepresentasikan Median (Q2).'
            ]);

            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => 'Apa tujuan utama dari Scatter Plot?',
                'option_a' => 'Melihat perbandingan jumlah',
                'option_b' => 'Melihat hubungan/korelasi dua variabel', // Jawaban Benar
                'option_c' => 'Melihat komposisi persentase',
                'option_d' => 'Melihat data outlier saja',
                'option_e' => 'Mengurutkan data dari kecil ke besar',
                'correct_answer' => 'b',
                'explanation' => 'Scatter Plot memetakan titik X dan Y untuk melihat pola hubungan (korelasi).'
            ]);
        }
    }
}