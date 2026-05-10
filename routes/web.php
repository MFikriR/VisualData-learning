<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SandboxController;
use App\Http\Controllers\TeacherQuizController; 
use App\Http\Controllers\QuestionController; // ✅ Import yang benar

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. LANDING PAGE
Route::get('/', function () {
    return view('welcome');
});

// 2. HALAMAN PEMILIHAN PERAN (Siswa vs Guru)
Route::get('/masuk', function () {
    return view('auth.role-selection');
})->name('role.selection');

// 3. DASHBOARD UTAMA (Logika Pengarah)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// 4. RUTE KHUSUS SISWA & UMUM (Harus Login)
Route::middleware('auth')->group(function () {
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Fitur Belajar
    Route::get('/belajar/{slug}', [LearningController::class, 'show'])->name('learning.show');
    Route::post('/belajar/{slug}/complete', [LearningController::class, 'completeMaterial'])->name('learning.complete');
    
    // Fitur Kuis
    Route::get('/kuis/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/kuis/{id}', [QuizController::class, 'submit'])->name('quiz.submit');

    // Fitur Tambahan (Leaderboard & AI)
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard.index');
    Route::post('/ask-ai', [LearningController::class, 'askAi'])->name('learning.askAi');

    // Sandbox Data
    Route::get('/sandbox', [SandboxController::class, 'index'])->name('sandbox');
});


// 5. RUTE KHUSUS GURU (Middleware: Auth + Teacher)
// Semua route di sini otomatis punya awalan nama 'teacher.'
Route::middleware(['auth', 'teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    
    // A. Dashboard Utama
    Route::get('/dashboard', [TeacherController::class, 'index'])->name('dashboard');

    // B. Manajemen Siswa (CRUD LENGKAP)
    Route::get('/students', [TeacherController::class, 'students'])->name('students.index');
    Route::get('/students/create', [TeacherController::class, 'create'])->name('students.create');
    Route::post('/students', [TeacherController::class, 'store'])->name('students.store');
    Route::get('/students/{id}', [TeacherController::class, 'showStudent'])->name('students.show');
    Route::get('/students/{id}/edit', [TeacherController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [TeacherController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [TeacherController::class, 'destroy'])->name('students.destroy');

    // C. Manajemen Kurikulum / Bab
    Route::get('/chapters', [ChapterController::class, 'index'])->name('chapters.index');
    Route::get('/chapters/create', [ChapterController::class, 'create'])->name('chapters.create');
    Route::post('/chapters', [ChapterController::class, 'store'])->name('chapters.store');
    Route::get('/chapters/{id}/edit', [ChapterController::class, 'edit'])->name('chapters.edit');
    Route::put('/chapters/{id}', [ChapterController::class, 'update'])->name('chapters.update');
    Route::delete('/chapters/{id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');

    // C.1. Detail Bab (Halaman Kelola Materi)
    Route::get('/chapters/{id}', [ChapterController::class, 'show'])->name('chapters.show');

    // D. Manajemen Materi (Materials)
    
    // 1. Form Tambah Materi
    Route::get('/chapters/{chapterId}/materials/create', [App\Http\Controllers\MaterialController::class, 'create'])->name('materials.create');
    Route::post('/chapters/{chapterId}/materials', [App\Http\Controllers\MaterialController::class, 'store'])->name('materials.store');

    // 2. Edit & Hapus Materi
    Route::get('/materials/{id}/edit', [App\Http\Controllers\MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/{id}', [App\Http\Controllers\MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/{id}', [App\Http\Controllers\MaterialController::class, 'destroy'])->name('materials.destroy');

    // E. Buku Nilai
    Route::get('/gradebook', [TeacherController::class, 'gradebook'])->name('gradebook');

    // F. Manajemen Kuis (Quiz Builder)
    Route::get('/quizzes/create', [TeacherQuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes', [TeacherQuizController::class, 'store'])->name('quizzes.store');
    
    // Detail & Edit Kuis
    Route::get('/quizzes/{id}', [TeacherQuizController::class, 'show'])->name('quizzes.show');      // Detail
    Route::get('/quizzes/{id}/edit', [TeacherQuizController::class, 'edit'])->name('quizzes.edit'); // Form Edit
    Route::put('/quizzes/{id}', [TeacherQuizController::class, 'update'])->name('quizzes.update');  // Proses Update
    Route::delete('/quizzes/{id}', [TeacherQuizController::class, 'destroy'])->name('quizzes.destroy');

    // G. Manajemen Soal (Edit Spesifik Per Soal)
    // Route ini otomatis menjadi: teacher.questions.edit, teacher.questions.update, dll.
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});

require __DIR__.'/auth.php';