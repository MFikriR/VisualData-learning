<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;
use App\Models\Material;
use App\Models\Chapter; 
use App\Models\Quiz;
use App\Models\Setting;
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
        $user = Auth::user();

        // 1. CEK PRE-TEST (Wajib untuk siswa, guru & akun bypass di-bypass)
        if ($user && $user->role !== 'teacher' && $user->email !== 'bypass@gmail.com') {
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
        }

        $material = Material::with('chapter')->where('slug', $slug)->firstOrFail();

        // 2. CEK SYARAT AKSES MATERI (Urutan & KKM Dinamis)
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

        $nextMaterial = Material::where('chapter_id', $material->chapter_id)
            ->where('sequence', '>', $material->sequence)
            ->orderBy('sequence', 'asc')
            ->first();

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
     * Pengecekan Syarat Akses Materi & Batas KKM Dinamis (Bypass Guru & Akun Demo)
     */
    private function canAccessMaterial($user, $material)
    {
        // Bypass akses untuk peran guru atau akun bypass demo
        if ($user && ($user->role === 'teacher' || $user->email === 'bypass@gmail.com')) {
            return true;
        }

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
                    return "Akses Ditolak: Anda harus membaca materi sebelumnya secara berurutan.";
                }
            }
        } 
        // Jika materi pertama di bab baru
        else {
            $prevChapter = Chapter::where('sequence', '<', $material->chapter->sequence)
                                ->orderBy('sequence', 'desc')->first();

            if ($prevChapter) {
                $prevQuiz = Quiz::where('chapter_id', $prevChapter->id)
                                ->whereNotIn('type', ['pre_test', 'post_test'])
                                ->first();
                
                if ($prevQuiz) {
                    $quizProgress = UserProgress::where('user_id', $user->id)
                        ->where('quiz_id', $prevQuiz->id)
                        ->first();

                    if (!$quizProgress) {
                        return "Akses Ditolak: Anda harus mengerjakan Evaluasi Bab " . $prevChapter->sequence . " terlebih dahulu.";
                    }

                    $kkmEvaluasi = (int) Setting::get('kkm_evaluasi_bab', 70);

                    if ($quizProgress->score < $kkmEvaluasi) {
                        return "Akses Ditolak: Anda belum mencapai ketuntasan di Bab " . $prevChapter->sequence . ". Nilai Anda: " . $quizProgress->score . " (Minimal " . $kkmEvaluasi . "). Silakan ulangi evaluasi.";
                    }
                } else {
                    $lastMaterial = Material::where('chapter_id', $prevChapter->id)->orderBy('sequence', 'desc')->first();
                    if ($lastMaterial) {
                        $isLastCompleted = UserProgress::where('user_id', $user->id)->where('material_id', $lastMaterial->id)->exists();
                        if (!$isLastCompleted) {
                            return "Akses Ditolak: Selesaikan materi terakhir di Bab " . $prevChapter->sequence . ".";
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * Simpan Progres Penyelesaian Materi
     */
    public function completeMaterial(Request $request, $slug)
    {
        $material = Material::where('slug', $slug)->firstOrFail();
        $user = Auth::user();
        
        $progressCheck = UserProgress::where('user_id', $user->id)
            ->where('material_id', $material->id)
            ->first();

        $miniQuizScore = $request->input('mini_quiz_score', 0);

        if (!$progressCheck) {
            UserProgress::create([
                'user_id'      => $user->id,
                'material_id'  => $material->id,
                'is_completed' => true,
                'score'        => $miniQuizScore,
                'completed_at' => now(),
            ]);
            session()->flash('success', 'Materi berhasil diselesaikan.');
        } else {
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
            : redirect()->route('dashboard')->with('success', 'Selamat! Kurikulum telah tuntas.');
    }

    /**
     * Asisten AI Tanya Jawab Materi
     */
    public function askAi(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materials,id',
            'question'    => 'required|string|max:500',
        ]);

        $material = Material::findOrFail($request->material_id);
        $userQuestion = $request->question;
        $prompt = "Berperanlah sebagai Guru Privat yang interaktif. Konteks: Siswa belajar '{$material->title}'. Pertanyaan: '{$userQuestion}'. Jawab santai, jelas, maksimal 3 paragraf. Gunakan formatting HTML bold untuk poin penting.";
        
        $apiKey = env('GEMINI_API_KEY');

        if (empty($apiKey)) {
            return response()->json(['answer' => 'API Key Gemini belum terpasang di berkas .env.'], 500);
        }

        $models = ['gemini-flash-latest', 'gemini-2.5-flash', 'gemini-3-flash-preview', 'gemini-pro-latest'];
        $lastError = 'Gagal terhubung ke server Google.';

        foreach ($models as $model) {
            try {
                $response = Http::withoutVerifying()->timeout(30)->withHeaders([
                    'Content-Type' => 'application/json',
                ])->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", [
                    "contents" => [
                        [
                            "parts" => [
                                ["text" => $prompt]
                            ]
                        ]
                    ]
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $answer = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, AI sedang tidak dapat merespons.';
                    
                    $answer = preg_replace('/\*\*(.*?)\*\*/', '<b>$1</b>', $answer);
                    $answer = nl2br(e($answer));
                    $answer = str_replace(['&lt;b&gt;', '&lt;/b&gt;'], ['<b>', '</b>'], $answer);

                    return response()->json(['answer' => $answer]);
                } else {
                    $lastError = "Model {$model} (HTTP " . $response->status() . ")";
                    \Illuminate\Support\Facades\Log::warning("Gemini Error [{$model}]: " . $response->body());
                }
            } catch (\Throwable $e) {
                $lastError = $e->getMessage();
                \Illuminate\Support\Facades\Log::error("Gemini Exception [{$model}]: " . $e->getMessage());
            }
        }

        return response()->json(['answer' => "Error API Google ({$lastError}). Pastikan API Key di buat melalui Google AI Studio."], 500);
    }
}