<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * 1. TAMPILKAN HALAMAN PENGERJAAN KUIS (Dengan Fitur Lock 1x Percobaan)
     */
    public function show($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        
        // KUNCI EVALUASI AKHIR: Jika bertipe 'final' dan sudah pernah dikerjakan, langsung lempar ke halaman hasil
        if ($quiz->type == 'final') {
            $attempt = QuizAttempt::where('user_id', Auth::id())
                ->where('quiz_id', $quiz->id)
                ->latest()
                ->first();
                
            if ($attempt) {
                $userAnswers = json_decode($attempt->answers, true) ?? [];
                $totalQuestions = $quiz->questions->count();
                $correctCount = 0;
                
                foreach ($quiz->questions as $question) {
                    $userAnswer = $userAnswers[$question->id] ?? null;
                    if ($userAnswer && strtolower($userAnswer) == strtolower($question->correct_answer)) {
                        $correctCount++;
                    }
                }
                
                $score = $attempt->score;
                $passed = $score >= 70;
                
                // Kirim flash message pemberitahuan bahwa akses pengerjaan ulang dikunci
                session()->flash('error', '🚫 Akses Dikunci: Evaluasi akhir bab ini hanya dapat ditempuh 1 kali pengerjaan.');

                return view('student.quiz.result', [
                    'quiz'           => $quiz,
                    'score'          => $score,
                    'passed'         => $passed,
                    'correctCount'   => $correctCount,
                    'totalQuestions' => $totalQuestions,
                    'userAnswers'    => $userAnswers
                ]);
            }
        }

        return view('student.quiz.show', compact('quiz'));
    }

    /**
     * 2. PROSES JAWABAN SISWA & HITUNG NILAI
     */
    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        
        // 1. Ambil Jawaban User
        $userAnswers = $request->input('answers', []); 
        
        $correctCount = 0;
        $totalQuestions = $quiz->questions->count();
        
        // 2. Koreksi Jawaban
        foreach ($quiz->questions as $question) {
            $userAnswer = $userAnswers[$question->id] ?? null;
            if ($userAnswer && strtolower($userAnswer) == strtolower($question->correct_answer)) {
                $correctCount++;
            }
        }

        // 3. Hitung Skor
        $score = ($totalQuestions > 0) ? round(($correctCount / $totalQuestions) * 100, 1) : 0;

        // 4. Simpan Riwayat
        if (class_exists(QuizAttempt::class)) {
            QuizAttempt::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
                'score'   => $score,
                'answers' => json_encode($userAnswers),
            ]);
        }

        // 5. Logika Kelulusan 
        $kkm = 70;
        $passed = $score >= $kkm;
        
        // 6. Simpan UserProgress
        $isCompleted = ($passed || in_array($quiz->type, ['pre_test', 'post_test'])) ? true : false;

        UserProgress::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
            ],
            [
                'score' => $score,
                'is_completed' => $isCompleted,
                'completed_at' => now(),
            ]
        );

        // 7. TAMPILKAN HASIL
        return view('student.quiz.result', [
            'quiz'           => $quiz,
            'score'          => $score,
            'passed'         => $passed,
            'correctCount'   => $correctCount,
            'totalQuestions' => $totalQuestions,
            'userAnswers'    => $userAnswers
        ]);
    }
}