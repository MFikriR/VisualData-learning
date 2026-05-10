<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Form Tambah Materi
     */
    public function create($chapterId)
    {
        $chapter = Chapter::findOrFail($chapterId);
        return view('teacher.materials.create', compact('chapter'));
    }

    /**
     * Simpan Materi Baru (Sistem Block Builder)
     */
    public function store(Request $request, $chapterId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sequence' => 'required|integer|min:1',
            'min_level' => 'required|integer|min:1',
            'blocks' => 'required|array',
            'blocks.*.file' => 'nullable|image|max:3072' // Validasi gambar max 3MB
        ]);

        $compiledHtml = '<div class="space-y-8 text-gray-800 dark:text-gray-200">';

        foreach ($request->blocks as $index => $block) {
            $type = $block['type'];
            $content = $block['content'] ?? '';

            // 1. Judul Utama (H3)
            if ($type === 'title' && !empty(trim($content))) {
                $compiledHtml .= '<div><h3 class="text-3xl font-black text-indigo-600 dark:text-indigo-400 mb-4">' . e($content) . '</h3></div>';
            } 
            
            // 2. Sub-Judul (H4)
            elseif ($type === 'subtitle' && !empty(trim($content))) {
                $compiledHtml .= '<div><h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 mt-4">' . e($content) . '</h4></div>';
            } 
            
            // 3. Teks Paragraf Biasa
            elseif ($type === 'text' && !empty(trim($content))) {
                $compiledHtml .= '<div><p class="mb-4 text-justify leading-relaxed">' . nl2br(e($content)) . '</p></div>';
            } 
            
            // 4. Daftar Poin (List)
            elseif ($type === 'list' && !empty(trim($content))) {
                $compiledHtml .= '<div><ul class="list-disc pl-6 mb-4 space-y-2">';
                $lines = explode("\n", str_replace("\r", "", $content));
                foreach ($lines as $line) {
                    if (trim($line) !== '') {
                        $compiledHtml .= '<li>' . e(trim($line)) . '</li>';
                    }
                }
                $compiledHtml .= '</ul></div>';
            } 
            
            // 5. Gambar (Dengan Upload)
            elseif ($type === 'image') {
                $imagePath = $content; // Path bawaan (jika input manual)

                // Cek apakah ada file fisik yang diupload
                if ($request->hasFile("blocks.{$index}.file")) {
                    $file = $request->file("blocks.{$index}.file");
                    if ($file->isValid()) {
                        $path = $file->store('materi-images', 'public');
                        $imagePath = '/storage/' . $path; 
                    }
                }

                if (empty(trim($imagePath))) continue; 

                $compiledHtml .= '
                    <div>
                        <div class="flex justify-center my-6">
                            <img src="' . e($imagePath) . '" alt="Gambar Materi" class="rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 max-w-full h-auto">
                        </div>
                    </div>';
            } 
            
            // 6. Video YouTube
            elseif ($type === 'youtube' && !empty(trim($content))) {
                $compiledHtml .= '
                    <div class="mb-10">
                        <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-700 bg-black aspect-video group">
                            <div class="absolute top-4 left-4 z-10 bg-black/60 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full border border-white/10 flex items-center gap-2">
                                <span class="text-red-500 animate-pulse">●</span> VIDEO
                            </div>
                            <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/' . e($content) . '?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>';
            } 
            
            // 7. Kotak Info
            elseif ($type === 'alert' && !empty(trim($content))) {
                $compiledHtml .= '
                    <div>
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 p-5 rounded-xl border-l-4 border-yellow-500 my-4 text-gray-800 dark:text-gray-200 shadow-sm">
                            <strong class="flex items-center gap-2 mb-1 text-yellow-700 dark:text-yellow-400">💡 Catatan Penting:</strong>
                            ' . nl2br(e($content)) . '
                        </div>
                    </div>';
            }
        }

        $compiledHtml .= '</div>';

        $slug = Str::slug($request->title);

        Material::create([
            'chapter_id' => $chapterId,
            'title' => $request->title,
            'slug' => $slug . '-' . time(),
            'type' => 'text',
            'sequence' => $request->sequence,
            'min_level' => $request->min_level,
            'content' => $compiledHtml,
            'video_url' => null,
        ]);

        return redirect()->route('teacher.chapters.show', $chapterId)
                         ->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Form Edit Materi
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('teacher.materials.edit', compact('material'));
    }

    /**
     * Update Materi (Dengan Dukungan Upload Gambar)
     */
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'sequence' => 'required|integer|min:1',
            'min_level' => 'required|integer|min:1',
            'blocks' => 'required|array',
            'blocks.*.file' => 'nullable|image|max:3072' 
        ]);

        $compiledHtml = '<div class="space-y-8 text-gray-800 dark:text-gray-200">';

        foreach ($request->blocks as $index => $block) {
            $type = $block['type'];
            $content = $block['content'] ?? '';

            if ($type === 'title' && !empty(trim($content))) {
                $compiledHtml .= '<div><h3 class="text-3xl font-black text-indigo-600 dark:text-indigo-400 mb-4">' . e($content) . '</h3></div>';
            } 
            elseif ($type === 'subtitle' && !empty(trim($content))) {
                $compiledHtml .= '<div><h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2 mt-4">' . e($content) . '</h4></div>';
            } 
            elseif ($type === 'text' && !empty(trim($content))) {
                $compiledHtml .= '<div><p class="mb-4 text-justify leading-relaxed">' . nl2br(e($content)) . '</p></div>';
            } 
            elseif ($type === 'list' && !empty(trim($content))) {
                $compiledHtml .= '<div><ul class="list-disc pl-6 mb-4 space-y-2">';
                $lines = explode("\n", str_replace("\r", "", $content));
                foreach ($lines as $line) {
                    if (trim($line) !== '') {
                        $compiledHtml .= '<li>' . e(trim($line)) . '</li>';
                    }
                }
                $compiledHtml .= '</ul></div>';
            } 
            
            // 🔥 PERUBAHAN BLOK GAMBAR (UPLOAD FILE)
            elseif ($type === 'image') {
                $imagePath = $content; // Ambil path lama (hidden input)

                // Cek apakah ada gambar BARU yang diupload untuk mengganti yang lama
                if ($request->hasFile("blocks.{$index}.file")) {
                    $file = $request->file("blocks.{$index}.file");
                    if ($file->isValid()) {
                        $path = $file->store('materi-images', 'public');
                        $imagePath = '/storage/' . $path; 
                    }
                }

                if (empty(trim($imagePath))) continue;

                $compiledHtml .= '
                    <div>
                        <div class="flex justify-center my-6">
                            <img src="' . e($imagePath) . '" alt="Gambar Materi" class="rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 max-w-full h-auto">
                        </div>
                    </div>';
            } 
            
            elseif ($type === 'youtube' && !empty(trim($content))) {
                $compiledHtml .= '
                    <div class="mb-10">
                        <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden shadow-2xl border border-gray-200 dark:border-gray-700 bg-black aspect-video group">
                            <div class="absolute top-4 left-4 z-10 bg-black/60 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full border border-white/10 flex items-center gap-2">
                                <span class="text-red-500 animate-pulse">●</span> VIDEO
                            </div>
                            <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/' . e($content) . '?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>';
            } 
            elseif ($type === 'alert' && !empty(trim($content))) {
                $compiledHtml .= '
                    <div>
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 p-5 rounded-xl border-l-4 border-yellow-500 my-4 text-gray-800 dark:text-gray-200 shadow-sm">
                            <strong class="flex items-center gap-2 mb-1 text-yellow-700 dark:text-yellow-400">💡 Catatan Penting:</strong>
                            ' . nl2br(e($content)) . '
                        </div>
                    </div>';
            }
        }

        $compiledHtml .= '</div>';

        $material->update([
            'title' => $request->title,
            'sequence' => $request->sequence,
            'min_level' => $request->min_level,
            'content' => $compiledHtml, 
        ]);

        return redirect()->route('teacher.chapters.show', $material->chapter_id)
                         ->with('success', 'Materi berhasil diperbarui!');
    }

    /**
     * Hapus Materi
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $chapterId = $material->chapter_id; 
        
        $material->delete();

        return redirect()->route('teacher.chapters.show', $chapterId)
                         ->with('success', 'Materi berhasil dihapus!');
    }
}