<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quiz;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'xp'); 
        $quizzes = Quiz::orderBy('id', 'asc')->get();

        // Query Dasar (Hanya Siswa)
        $query = User::where('role', 'student');
        
        // Default Config
        $metricUnit = 'XP'; 
        $metricKey = 'xp'; 

        // --- LOGIKA FILTER ---
        if ($filter === 'level') {
            // A. Top Level
            // PERBAIKAN: Urutkan by XP (karena Level hanyalah hasil bagi dari XP)
            // SQL tidak bisa order by 'level' karena kolom itu tidak ada di tabel.
            $query->orderBy('xp', 'desc')->orderBy('created_at', 'asc');
            
            $metricUnit = 'Level';
            $metricKey = 'level'; // Di View, ini akan otomatis memanggil Accessor getLevelAttribute()

        } elseif ($filter === 'progress') {
            // B. Top Progress (Paling Rajin)
            $query->withCount(['progress' => function ($q) {
                $q->where('is_completed', true);
            }])
            ->orderBy('progress_count', 'desc')
            ->orderBy('xp', 'desc');
            
            $metricUnit = 'Materi';
            $metricKey = 'progress_count'; 

        } elseif (str_starts_with($filter, 'quiz_')) {
            // C. Top Nilai Kuis
            $quizId = explode('_', $filter)[1];
            $query->join('user_progress', 'users.id', '=', 'user_progress.user_id')
                  ->where('user_progress.quiz_id', $quizId)
                  ->orderBy('user_progress.score', 'desc')
                  ->select('users.*', 'user_progress.score as quiz_score');
            
            $metricUnit = 'Nilai';
            $metricKey = 'quiz_score';

        } else {
            // D. Top XP (Default)
            $query->orderBy('xp', 'desc')->orderBy('created_at', 'asc');
        }

        // Ambil Data (Limit 100)
        $leaders = $query->take(100)->get();

        // --- HITUNG POSISI SAYA ---
        $myId = Auth::id();
        $myRankPosition = $leaders->search(function ($user) use ($myId) {
            return $user->id === $myId;
        });
        $myRank = ($myRankPosition !== false) ? $myRankPosition + 1 : '100+';
        
        // Hitung Nilai Metric Saya untuk Kartu di Atas
        if ($metricKey == 'quiz_score') {
             $prog = UserProgress::where('user_id', $myId)->where('quiz_id', explode('_', $filter)[1] ?? 0)->first();
             $myMetricValue = $prog ? $prog->score : 'Belum';
        } elseif ($metricKey == 'progress_count') {
             $myMetricValue = UserProgress::where('user_id', $myId)->where('is_completed', true)->count();
        } else {
             // Untuk XP dan Level
             $myMetricValue = Auth::user()->$metricKey;
        }

        return view('leaderboard.index', compact('leaders', 'myRank', 'filter', 'quizzes', 'metricUnit', 'metricKey', 'myMetricValue'));
    }
}