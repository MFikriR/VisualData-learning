<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Material;
use App\Models\Chapter;
use App\Models\UserProgress;
use App\Models\QuizAttempt;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. CEK ROLE
        if ($user->role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        }

        // 2. DATA SIDEBAR
        $globalChapters = Chapter::with('materials')->orderBy('sequence', 'asc')->get();

        // ==========================================
        // 3. LOGIKA PROGRES GABUNGAN (MATERI + KUIS)
        // ==========================================
        
        // A. Hitung Item MATERI (Hanya materi biasa, simulasi)
        $totalMaterials = Material::count();
        $completedMaterials = UserProgress::where('user_id', $user->id)
                                          ->whereNotNull('material_id')
                                          ->where('is_completed', true)
                                          ->count();

        // B. Hitung Item KUIS (Abaikan Pre-Test & Post-Test dalam hitungan modul)
        $totalQuizzes = Quiz::whereNotIn('type', ['pre_test', 'post_test'])->count();
        
        // Kuis dianggap tuntas jika is_completed = true ATAU score >= 70 (KKM)
        $passedQuizzes = UserProgress::where('user_id', $user->id)
                                     ->whereNotNull('quiz_id')
                                     ->where(function($query) {
                                         $query->where('is_completed', true)
                                               ->orWhere('score', '>=', 70);
                                     })
                                     ->whereHas('quiz', function($q) {
                                         $q->whereNotIn('type', ['pre_test', 'post_test']);
                                     })
                                     ->count();

        // C. Gabungkan Keduanya
        $totalItems = $totalMaterials + $totalQuizzes;
        $finishedItems = $completedMaterials + $passedQuizzes;
        
        // Hitung Persentase Total
        $progressPercentage = ($totalItems > 0) ? round(($finishedItems / $totalItems) * 100) : 0;
        
        // Hitung Nilai Pre-Test (Jika Ada)
        $preTestScore = 0;
        $preTest = Quiz::where('type', 'pre_test')->first();
        if($preTest) {
            $preTestAttempt = QuizAttempt::where('user_id', $user->id)->where('quiz_id', $preTest->id)->orderBy('created_at', 'desc')->first();
            if($preTestAttempt) {
                $preTestScore = $preTestAttempt->score;
            }
        }

        // Hitung Rata-Rata Evaluasi (Semua Percobaan Kuis)
        $averageEvaluation = QuizAttempt::where('user_id', $user->id)->avg('score') ?? 0;
        $averageEvaluation = round($averageEvaluation, 1);

        // ==========================================
        // 4. DATA CHART RIWAYAT NILAI
        // ==========================================
        $recentAttempts = QuizAttempt::with('quiz')
                            ->where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get()
                            ->sortBy('created_at');

        $chartLabels = $recentAttempts->pluck('quiz.title')->map(function($title){
            return str_replace(['Evaluasi Akhir ', 'Ujian Sertifikasi '], '', $title);
        })->toArray();
        
        $chartScores = $recentAttempts->pluck('score')->toArray();

        return view('dashboard', compact(
            'user', 'globalChapters',
            'totalItems', 'finishedItems', 'progressPercentage',
            'preTestScore', 'averageEvaluation',
            'chartLabels', 'chartScores'
        ));
    }
}