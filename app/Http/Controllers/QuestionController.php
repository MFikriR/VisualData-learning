<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * PROSES SIMPAN SOAL BARU
     */
    public function store(Request $request, $quizId)
    {
        $quiz = Quiz::findOrFail($quizId);

        $request->validate([
            'question_text'  => 'required|string',
            'image'          => 'nullable|image|max:2048',
            'correct_answer' => 'required|in:a,b,c,d,e',
            'option_a'       => 'required|string',
            'option_b'       => 'required|string',
            'option_c'       => 'nullable|string',
            'option_d'       => 'nullable|string',
            'option_e'       => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('quiz-images', 'public');
        }

        Question::create([
            'quiz_id'        => $quiz->id,
            'question_text'  => $request->question_text,
            'image'          => $imagePath,
            'correct_answer' => $request->correct_answer,
            'option_a'       => $request->option_a,
            'option_b'       => $request->option_b,
            'option_c'       => $request->option_c,
            'option_d'       => $request->option_d,
            'option_e'       => $request->option_e,
        ]);

        return redirect()->route('teacher.quizzes.show', $quiz->id)
                         ->with('success', 'Soal baru berhasil ditambahkan.');
    }

    /**
     * TAMPILKAN FORM EDIT SOAL
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('teacher.questions.edit', compact('question'));
    }

    /**
     * PROSES UPDATE SOAL
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'question_text'  => 'required|string',
            'image'          => 'nullable|image|max:2048',
            'correct_answer' => 'required|in:a,b,c,d,e',
            'option_a'       => 'required|string',
            'option_b'       => 'required|string',
            'option_c'       => 'nullable|string',
            'option_d'       => 'nullable|string',
            'option_e'       => 'nullable|string',
        ]);

        // 1. Handle Hapus Gambar Lama (Jika Opsi Centang Dihapus Dipilih)
        if ($request->boolean('remove_image') && $question->image) {
            Storage::disk('public')->delete($question->image);
            $question->image = null;
        }

        // 2. Handle Upload Gambar Baru
        if ($request->hasFile('image')) {
            if ($question->image) {
                Storage::disk('public')->delete($question->image);
            }
            $question->image = $request->file('image')->store('quiz-images', 'public');
        }

        // 3. Update Data Teks Soal & Pilihan Jawaban
        $question->question_text  = $request->question_text;
        $question->correct_answer = $request->correct_answer;
        $question->option_a       = $request->option_a;
        $question->option_b       = $request->option_b;
        $question->option_c       = $request->option_c;
        $question->option_d       = $request->option_d;
        $question->option_e       = $request->option_e;

        $question->save();

        return redirect()->route('teacher.quizzes.show', $question->quiz_id)
                         ->with('success', 'Soal berhasil diperbarui.');
    }

    /**
     * HAPUS SOAL SATUAN
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $quizId = $question->quiz_id;

        if ($question->image) {
            Storage::disk('public')->delete($question->image);
        }

        $question->delete();

        return redirect()->route('teacher.quizzes.show', $quizId)
                         ->with('success', 'Soal berhasil dihapus.');
    }
}