<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;
use App\Models\Material;
use App\Models\Chapter; 
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str; 

class LearningController extends Controller
{
    /**
     * Tampilkan Halaman Belajar (Player)
     */
    public function show($slug)
    {
        // 1. CEK PRE-TEST (WAJIB)
        $preTest = Quiz::where('type', 'pre_test')->first();
        if ($preTest) {
            $hasDonePreTest = UserProgress::where('user_id', Auth::id())
                                ->where('quiz_id', $preTest->id)
                                ->exists();
            if (!$hasDonePreTest) {
                return redirect()->route('dashboard')
                    ->with('error', 'Akses Terkunci: Selesaikan Evaluasi Awal (Pre-Test) terlebih dahulu!');
            }
        }

        $material = Material::with('chapter')->where('slug', $slug)->firstOrFail();

        // 2. CEK SYARAT AKSES MATERI (KUNCI URUTAN & KKM)
        $accessCheck = $this->canAccessMaterial(Auth::user(), $material);
        if ($accessCheck !== true) {
            return redirect()->route('dashboard')->with('error', $accessCheck);
        }

        $chapters = Chapter::with(['materials' => function($q) {
            $q->orderBy('sequence', 'asc');
        }, 'materials.progress' => function($q) {
            $q->where('user_id', Auth::id());
        }])->orderBy('sequence', 'asc')->get();

        $isCompleted = UserProgress::where('user_id', Auth::id())
            ->where('material_id', $material->id)
            ->where('is_completed', true)
            ->exists();

        // 🔥 PERBAIKAN 1: NEXT MATERIAL HANYA DI DALAM BAB YANG SAMA
        // Jika ini materi terakhir di bab ini, biarkan $nextMaterial = null agar tombol Kuis muncul!
        $nextMaterial = Material::where('chapter_id', $material->chapter_id)
            ->where('sequence', '>', $material->sequence)
            ->orderBy('sequence', 'asc')
            ->first();

        // LOGIKA PREV MATERIAL (MUNDUR)
        $prevMaterial = Material::where('chapter_id', $material->chapter_id)
            ->where('sequence', '<', $material->sequence)
            ->orderBy('sequence', 'desc')
            ->first();

        if (!$prevMaterial) {
            $prevChapter = Chapter::where('sequence', '<', $material->chapter->sequence)
                ->orderBy('sequence', 'desc')
                ->first();
            
            if ($prevChapter) {
                $prevMaterial = $prevChapter->materials()->orderBy('sequence', 'desc')->first();
            }
        }

        return view('learning.show', compact('material', 'chapters', 'nextMaterial', 'prevMaterial', 'isCompleted'));
    }

    /**
     * 🔥 PERBAIKAN 2: GATEKEEPER STRICT KKM (MINIMAL 70)
     */
    private function canAccessMaterial($user, $material)
    {
        if ($material->chapter->sequence == 1 && $material->sequence == 1) {
            return true;
        }

        // Jika bukan materi pertama di bab ini, cek materi sebelumnya
        if ($material->sequence > 1) {
            $prevMaterial = Material::where('chapter_id', $material->chapter_id)
                ->where('sequence', $material->sequence - 1)
                ->first();

            if ($prevMaterial) {
                $isPrevCompleted = UserProgress::where('user_id', $user->id)
                    ->where('material_id', $prevMaterial->id)
                    ->exists();

                if (!$isPrevCompleted) {
                    return "🚫 Akses Ditolak: Kamu harus membaca materi sebelumnya secara berurutan.";
                }
            }
        } 
        // JIKA INI MATERI PERTAMA DI BAB BARU (Misal: Bab 2 Materi 1)
        else {
            $prevChapter = Chapter::where('sequence', '<', $material->chapter->sequence)
                                ->orderBy('sequence', 'desc')->first();

            if ($prevChapter) {
                // Cari kuis di bab sebelumnya
                $prevQuiz = Quiz::where('chapter_id', $prevChapter->id)
                                ->whereNotIn('type', ['pre_test', 'post_test'])
                                ->first();
                
                if ($prevQuiz) {
                    $quizProgress = UserProgress::where('user_id', $user->id)
                        ->where('quiz_id', $prevQuiz->id)
                        ->first();

                    // Cek apakah sudah dikerjakan
                    if (!$quizProgress) {
                        return "🚫 Akses Ditolak: Kamu harus mengerjakan Evaluasi Bab " . $prevChapter->sequence . " terlebih dahulu.";
                    }

                    // 🔥 CEK NILAI KKM
                    if ($quizProgress->score < 70) {
                        return "🚫 Akses Ditolak: Kamu belum Tuntas di Bab " . $prevChapter->sequence . ". Nilaimu: " . $quizProgress->score . " (Minimal 70). Silakan ulangi evaluasi.";
                    }
                } else {
                    // Jika bab sebelumnya tidak ada kuis, pastikan materi terakhirnya dibaca
                    $lastMaterial = Material::where('chapter_id', $prevChapter->id)->orderBy('sequence', 'desc')->first();
                    if ($lastMaterial) {
                        $isLastCompleted = UserProgress::where('user_id', $user->id)->where('material_id', $lastMaterial->id)->exists();
                        if (!$isLastCompleted) {
                            return "🚫 Akses Ditolak: Selesaikan materi terakhir di Bab " . $prevChapter->sequence . ".";
                        }
                    }
                }
            }
        }

        return true;
    }

    public function completeMaterial(Request $request, $slug)
    {
        $material = Material::where('slug', $slug)->firstOrFail();
        $user = Auth::user();
        
        $progressCheck = UserProgress::where('user_id', $user->id)
            ->where('material_id', $material->id)
            ->first();

        // 🔥 TANGKAP NILAI MINI QUIZ DARI JAVASCRIPT 🔥
        $miniQuizScore = $request->input('mini_quiz_score', 0); // Default 0 jika materi tidak ada kuisnya

        if (!$progressCheck) {
            UserProgress::create([
                'user_id' => $user->id,
                'material_id' => $material->id,
                'is_completed' => true,
                'score' => $miniQuizScore, // Simpan nilai formatiif di sini!
                'completed_at' => now(),
            ]);
            session()->flash('success', 'Materi berhasil diselesaikan! 📚');
        } else {
            // Opsional: Jika siswa mengulang kuis materi dan nilainya lebih baik, kita update
            if($miniQuizScore > $progressCheck->score) {
                $progressCheck->update(['score' => $miniQuizScore]);
            }
        }
        
        if ($request->has('redirect_to_quiz')) {
            $quizId = $request->input('redirect_to_quiz');
            return redirect()->route('quiz.show', $quizId);
        }

        $nextMaterial = Material::where('chapter_id', $material->chapter_id)
            ->where('sequence', '>', $material->sequence)
            ->orderBy('sequence', 'asc')
            ->first();
        
        if (!$nextMaterial) {
            $chapterQuiz = Quiz::where('chapter_id', $material->chapter_id)
                        ->whereNotIn('type', ['pre_test', 'post_test'])
                        ->first();
            if ($chapterQuiz) {
                return redirect()->route('quiz.show', $chapterQuiz->id);
            }

            $nextChapter = Chapter::where('sequence', '>', $material->chapter->sequence)->orderBy('sequence', 'asc')->first();
            if ($nextChapter) {
                $nextMaterial = $nextChapter->materials()->orderBy('sequence', 'asc')->first();
            }
        }

        return $nextMaterial
            ? redirect()->route('learning.show', $nextMaterial->slug)
            : redirect()->route('dashboard')->with('success', 'Selamat! Kurikulum telah tuntas!');
    }

    public function askAi(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'question'    => 'required|string|max:500',
        ]);

        $material = Material::findOrFail($request->material_id);
        $userQuestion = $request->question;
        $prompt = "Berperanlah sebagai Guru Privat yang asik. Konteks: Siswa belajar '{$material->title}'. Pertanyaan: '{$userQuestion}'. Jawab santai, jelas, max 3 paragraf. Gunakan formatting HTML bold untuk poin penting.";
        $apiKey = env('GEMINI_API_KEY');

        try {
            $response = Http::withoutVerifying()->timeout(30)->withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}", [
                "contents" => [["parts" => [["text" => $prompt]]]]
            ]);

            if (!$response->successful()) return response()->json(['answer' => 'Error API Google.'], 500);

            $data = $response->json();
            $answer = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, AI sedang istirahat.';
            $answer = preg_replace('/\*\*(.*?)\*\*/', '<b>$1</b>', $answer);
            $answer = nl2br(e($answer));
            $answer = str_replace(['&lt;b&gt;', '&lt;/b&gt;'], ['<b>', '</b>'], $answer);

            return response()->json(['answer' => $answer]);

        } catch (\Throwable $e) {
            return response()->json(['answer' => 'Terjadi kesalahan sistem.'], 500);
        }
    }
}