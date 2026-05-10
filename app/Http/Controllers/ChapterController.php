<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    /**
     * Tampilkan Daftar Bab
     */
    public function index()
    {
        // 🔥 UPDATE: Gunakan withCount untuk menghitung jumlah 'materials' dan 'quizzes' otomatis
        // Hasil hitungan bisa dipanggil di view dengan: $chapter->materials_count dan $chapter->quizzes_count
        $chapters = Chapter::withCount(['materials', 'quizzes'])
                            ->orderBy('sequence', 'asc')
                            ->get();

        return view('teacher.chapters.index', compact('chapters'));
    }

    /**
     * Form Tambah Bab
     */
    public function create()
    {
        return view('teacher.chapters.create');
    }

    /**
     * Simpan Bab Baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sequence' => 'required|integer|unique:chapters,sequence', // Urutan tidak boleh kembar
        ]);

        Chapter::create($request->all());

        return redirect()->route('teacher.chapters.index')->with('success', 'Bab berhasil ditambahkan!');
    }

    /**
     * Form Edit Bab
     */
    public function edit($id)
    {
        $chapter = Chapter::findOrFail($id);
        return view('teacher.chapters.edit', compact('chapter'));
    }

    /**
     * Update Bab
     */
    public function update(Request $request, $id)
    {
        $chapter = Chapter::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Validasi unik sequence, KECUALI untuk bab ini sendiri
            'sequence' => 'required|integer|unique:chapters,sequence,'.$id, 
        ]);

        $chapter->update($request->all());

        return redirect()->route('teacher.chapters.index')->with('success', 'Bab berhasil diperbarui!');
    }

    /**
     * Hapus Bab
     */
    public function destroy($id)
    {
        $chapter = Chapter::findOrFail($id);
        // Hapus (Materi & Kuis di dalamnya akan ikut terhapus jika di database sudah set cascade, 
        // atau bisa kita tambahkan logika manual nanti)
        $chapter->delete();

        return redirect()->route('teacher.chapters.index')->with('success', 'Bab berhasil dihapus!');
    }

    /**
     * Tampilkan Detail Bab & Daftar Materinya
     */
    public function show($id)
    {
        // Ambil Bab beserta Materinya DAN Kuisnya
        $chapter = Chapter::with([
            // 1. Ambil Materi (Tetap diurutkan sesuai kode asli Anda)
            'materials' => function($query) {
                $query->orderBy('sequence', 'asc');
            },
            // 2. Ambil Kuis (Ini tambahan baru agar muncul di view)
            'quizzes'
        ])->findOrFail($id);

        return view('teacher.chapters.show', compact('chapter'));
    }
}