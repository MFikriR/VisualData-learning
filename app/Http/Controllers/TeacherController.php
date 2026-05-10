<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\UserProgress;
use App\Models\Chapter;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->with('quizAttempts')->get();
        $totalStudents = $students->count();
        $totalAttempts = QuizAttempt::count();

        // MENGHAPUS GAMIFIKASI: Mengganti Average XP dengan Average Score (Rata-rata Nilai)
        $averageScore = 0;
        if ($totalAttempts > 0) {
            $averageScore = round(QuizAttempt::avg('score'), 1);
        }

        // MENGHAPUS GAMIFIKASI: Top Students sekarang berdasarkan Rata-rata Nilai Ujian, bukan XP
        $topStudents = $students->map(function($student) {
            $student->avg_score = $student->quizAttempts->avg('score') ?? 0;
            return $student;
        })->sortByDesc('avg_score')->take(5);

        $recentStudents = User::where('role', 'student')
                              ->orderBy('created_at', 'desc')
                              ->take(5)
                              ->get();

        $quizPerformance = Quiz::withAvg('attempts', 'score')->get();

        return view('teacher.dashboard', compact(
            'totalStudents', 
            'averageScore', // Variabel baru pengganti averageXp
            'totalAttempts', 
            'topStudents',
            'recentStudents',
            'quizPerformance'
        ));
    }

    public function students(Request $request)
    {
        $query = User::where('role', 'student');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // Tambahan Filter Kelas di Menu Manajemen Siswa
        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        $students = $query->orderBy('kelas', 'asc')->orderBy('name', 'asc')->paginate(10);
        
        // Ambil daftar kelas untuk dropdown filter
        $availableClasses = User::where('role', 'student')->whereNotNull('kelas')->select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('teacher.students.index', compact('students', 'availableClasses'));
    }

    public function showStudent($id)
    {
        $student = User::with(['progress', 'quizAttempts.quiz'])
                       ->where('role', 'student')
                       ->findOrFail($id);

        $completedQuizzes = $student->progress->where('is_completed', true)->whereNotNull('quiz_id')->count();
        $averageScore = $student->quizAttempts->avg('score') ?? 0;

        return view('teacher.students.show', compact('student', 'completedQuizzes', 'averageScore'));
    }

    /**
     * 🔥 BUKU NILAI (GRADEBOOK) YANG DISEMPURNAKAN 🔥
     * Memuat Filter Kelas, Pre-Test, Semua Kuis Bab, Evaluasi Akhir, dan Post-Test!
     */
    public function gradebook(Request $request)
    {
        // 1. Ambil daftar kelas untuk Dropdown Filter
        $availableClasses = User::where('role', 'student')
                                ->whereNotNull('kelas')
                                ->select('kelas')
                                ->distinct()
                                ->orderBy('kelas', 'asc')
                                ->pluck('kelas');

        // 2. Query Siswa (Ambil progress materi & riwayat kuis tertinggi)
        $query = User::where('role', 'student')
                     ->with(['progress', 'quizAttempts' => function($q) {
                         $q->orderBy('score', 'desc'); // Urutkan dari nilai tertinggi
                     }]);

        // 3. Terapkan Filter Kelas jika ada
        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $students = $query->orderBy('kelas', 'asc')->orderBy('name', 'asc')->get();

        // 4. Ambil Bab dan Materinya secara berurutan (Untuk Mini-Quiz)
        $chapters = Chapter::with(['materials' => function($q) {
            $q->orderBy('sequence', 'asc');
        }])->orderBy('sequence', 'asc')->get();

        // 5. Ambil Semua Kuis (Pre-Test, Evaluasi Bab, Post-Test)
        $quizzes = Quiz::all();

        return view('teacher.gradebook', compact(
            'students', 
            'availableClasses', 
            'chapters', 
            'quizzes'
        ));
    }

    public function create()
    {
        return view('teacher.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8',
            'kelas' => 'required|string',
            'gender' => 'required|in:male,female',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => 'student', 
            'kelas' => $request->kelas,
            'gender' => $request->gender,
        ]);

        return redirect()->route('teacher.students.index')
                         ->with('success', 'Siswa baru berhasil didaftarkan!');
    }

    public function edit($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);
        return view('teacher.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = User::where('role', 'student')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8',
            'kelas' => 'required|string',
            'gender' => 'required|in:male,female',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->kelas = $request->kelas;
        $student->gender = $request->gender;

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        $student->save();

        return redirect()->route('teacher.students.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $student = User::where('role', 'student')->findOrFail($id);
        $student->delete();

        return redirect()->route('teacher.students.index')->with('success', 'Siswa berhasil dihapus!');
    }
}