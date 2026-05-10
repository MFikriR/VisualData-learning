<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
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
            'question_text' => 'required|string',
            'image' => 'nullable|image|max:2048', // Validasi Gambar (Max 2MB)
            'correct_answer' => 'required|in:a,b,c,d,e',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            // Opsi C, D, E boleh null/kosong jika soal cuma True/False, tapi disarankan required jika pilihan ganda biasa
        ]);

        // 1. Handle Upload Gambar Baru (Jika Ada)
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($question->image) {
                Storage::disk('public')->delete($question->image);
            }
            // Simpan gambar baru
            $path = $request->file('image')->store('quiz-images', 'public');
            $question->image = $path;
        }

        // 2. Update Data Teks
        $question->question_text = $request->question_text;
        $question->correct_answer = $request->correct_answer;
        
        // Update Opsi (Sesuai kolom database Anda: option_a, option_b...)
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->option_e = $request->option_e;

        $question->save();

        // Redirect kembali ke halaman Detail Kuis (Show Quiz)
        return redirect()->route('teacher.quizzes.show', $question->quiz_id)
                         ->with('success', 'Soal berhasil diperbarui!');
    }

    /**
     * HAPUS SOAL SATUAN
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $quizId = $question->quiz_id; // Simpan ID kuis untuk redirect

        // Hapus gambar jika ada
        if ($question->image) {
            Storage::disk('public')->delete($question->image);
        }

        $question->delete();

        return redirect()->route('teacher.quizzes.show', $quizId)
                         ->with('success', 'Soal berhasil dihapus.');
    }
}