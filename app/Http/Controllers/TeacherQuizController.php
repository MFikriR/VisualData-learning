<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;

class TeacherQuizController extends Controller
{
    /**
     * 1. TAMPILKAN FORM QUIZ BUILDER
     */
    public function create()
    {
        $chapters = Chapter::orderBy('sequence')->get();
        return view('teacher.quizzes.create', compact('chapters'));
    }

    /**
     * 2. SIMPAN KUIS (BESERTA GAMBAR SOAL)
     */
    public function store(Request $request)
    {
        // A. Validasi
        $request->validate([
            'title' => 'required|string|max:255',
            'chapter_id' => 'required|exists:chapters,id',
            'description' => 'nullable|string',
            'questions' => 'required|array|min:1',
            'questions.*.text' => 'required|string',
            'questions.*.image' => 'nullable|image|max:2048', // Tambahan validasi gambar max 2MB
            'questions.*.options' => 'required|array|min:2', 
            'questions.*.correct_index' => 'required|integer', 
        ]);

        try {
            DB::beginTransaction();

            // 1. Simpan Header Kuis
            $quiz = Quiz::create([
                'chapter_id' => $request->chapter_id,
                'title' => $request->title,
                'description' => $request->description,
                'type' => 'exercise', 
                'time_limit' => 0, 
            ]);

            // 2. Simpan Pertanyaan, Gambar, & Opsi 
            // Urutan $request->questions di sini OTOMATIS menyesuaikan urutan form HTML 
            // sehingga hasil naik/turun di UI akan tersimpan berurutan di Database!
            foreach ($request->questions as $qData) {
                
                // Konversi Index (0,1,2,3,4) menjadi Huruf ('a','b','c','d','e')
                $correctIndex = $qData['correct_index'];
                $correctChar = match((int)$correctIndex) {
                    0 => 'a',
                    1 => 'b',
                    2 => 'c',
                    3 => 'd',
                    4 => 'e',
                    default => 'a',
                };

                // Proses Upload Gambar Jika Ada
                $imagePath = null;
                if (isset($qData['image']) && $qData['image']->isValid()) {
                    $imagePath = $qData['image']->store('quiz-images', 'public');
                }

                // Ambil data opsi
                $optA = $qData['options'][0] ?? null;
                $optB = $qData['options'][1] ?? null;
                $optC = $qData['options'][2] ?? null;
                $optD = $qData['options'][3] ?? null;
                $optE = $qData['options'][4] ?? null;

                // Simpan ke Tabel Questions
                $quiz->questions()->create([
                    'question_text' => $qData['text'],
                    'image' => $imagePath, // Simpan Path Gambar
                    
                    'option_a' => $optA,
                    'option_b' => $optB,
                    'option_c' => $optC,
                    'option_d' => $optD,
                    'option_e' => $optE,
                    
                    'correct_answer' => $correctChar,
                    'points' => 10, 
                ]);
            }

            DB::commit();

            return redirect()->route('teacher.chapters.show', $request->chapter_id)
                             ->with('success', 'Kuis berhasil diterbitkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['msg' => $e->getMessage()]);
        }
    }

    /**
     * 3. HAPUS KUIS
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete(); 
        return back()->with('success', 'Kuis berhasil dihapus.');
    }

    /**
     * 4. TAMPILKAN DETAIL KUIS (PREVIEW GURU)
     */
    public function show($id)
    {
        // Ambil kuis beserta soal-soalnya
        $quiz = Quiz::with('questions')->findOrFail($id);
        
        return view('teacher.quizzes.show', compact('quiz'));
    }

    /**
     * 5. FORM EDIT KUIS (HEADER INFO)
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $chapters = Chapter::orderBy('sequence')->get();
        
        return view('teacher.quizzes.edit', compact('quiz', 'chapters'));
    }

    /**
     * 6. PROSES UPDATE KUIS
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'chapter_id' => 'required|exists:chapters,id',
            'description' => 'nullable|string',
            'time_limit' => 'integer|min:0',
        ]);

        try {
            $quiz->update([
                'title' => $request->title,
                'chapter_id' => $request->chapter_id,
                'description' => $request->description,
                'time_limit' => $request->time_limit ?? 0,
            ]);

            return redirect()->route('teacher.quizzes.show', $quiz->id)
                             ->with('success', 'Informasi kuis berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }
}