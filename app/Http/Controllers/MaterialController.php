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
            'title'         => 'required|string|max:255',
            'sequence'      => 'required|integer|min:1',
            'min_level'     => 'required|integer|min:1',
            'blocks'        => 'required|array',
            'blocks.*.file' => 'nullable|image|max:3072'
        ]);

        $compiledHtml = $this->compileBlocks($request->blocks, $request);
        $slug = Str::slug($request->title);

        Material::create([
            'chapter_id' => $chapterId,
            'title'      => $request->title,
            'slug'       => $slug . '-' . time(),
            'type'       => 'text',
            'sequence'   => $request->sequence,
            'min_level'  => $request->min_level,
            'content'    => $compiledHtml,
            'video_url'  => null,
        ]);

        return redirect()->route('teacher.chapters.show', $chapterId)
                         ->with('success', 'Materi berhasil ditambahkan.');
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
     * Update Materi
     */
    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'title'         => 'required|string|max:255',
            'sequence'      => 'required|integer|min:1',
            'min_level'     => 'required|integer|min:1',
            'blocks'        => 'required|array',
            'blocks.*.file' => 'nullable|image|max:3072' 
        ]);

        $compiledHtml = $this->compileBlocks($request->blocks, $request);

        $material->update([
            'title'     => $request->title,
            'sequence'  => $request->sequence,
            'min_level' => $request->min_level,
            'content'   => $compiledHtml, 
        ]);

        return redirect()->route('teacher.chapters.show', $material->chapter_id)
                         ->with('success', 'Materi berhasil diperbarui.');
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
                         ->with('success', 'Materi berhasil dihapus.');
    }

    /**
     * Private Helper: Kompilasi Array Block Builder Menjadi HTML Terstruktur
     */
    private function compileBlocks(array $blocks, Request $request): string
    {
        $compiledHtml = '<div class="space-y-6 text-[#1d1d1f]">';

        foreach ($blocks as $index => $block) {
            $type = $block['type'] ?? '';
            $content = $block['content'] ?? '';

            // 1. Judul Utama (H3)
            if ($type === 'title' && !empty(trim($content))) {
                $compiledHtml .= '<div><h3 class="text-2xl font-bold text-[#0066cc] mb-3">' . e($content) . '</h3></div>';
            } 
            
            // 2. Sub-Judul (H4)
            elseif ($type === 'subtitle' && !empty(trim($content))) {
                $compiledHtml .= '<div><h4 class="text-lg font-bold text-[#1d1d1f] mb-2 mt-4">' . e($content) . '</h4></div>';
            } 
            
            // 3. Teks Paragraf
            elseif ($type === 'text' && !empty(trim($content))) {
                $compiledHtml .= '<div><p class="mb-4 text-justify leading-relaxed text-[#1d1d1f]">' . nl2br(e($content)) . '</p></div>';
            } 
            
            // 4. Daftar Poin (List)
            elseif ($type === 'list' && !empty(trim($content))) {
                $compiledHtml .= '<div><ul class="list-disc pl-6 mb-4 space-y-1.5 text-[#1d1d1f]">';
                $lines = explode("\n", str_replace("\r", "", $content));
                foreach ($lines as $line) {
                    if (trim($line) !== '') {
                        $compiledHtml .= '<li>' . e(trim($line)) . '</li>';
                    }
                }
                $compiledHtml .= '</ul></div>';
            } 
            
            // 5. Gambar (Penyimpanan Berkas Storage)
            elseif ($type === 'image') {
                $imagePath = $content;

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
                            <img src="' . e($imagePath) . '" alt="Gambar Materi" class="rounded-2xl border border-[#e0e0e0] shadow-sm max-w-full h-auto">
                        </div>
                    </div>';
            } 
            
            // 6. Video Embed YouTube
            elseif ($type === 'youtube' && !empty(trim($content))) {
                $compiledHtml .= '
                    <div class="mb-8">
                        <div class="relative w-full md:max-w-4xl mx-auto rounded-2xl overflow-hidden border border-[#e0e0e0] bg-black aspect-video">
                            <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/' . e($content) . '?rel=0&modestbranding=1" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>';
            } 
            
            // 7. Kotak Catatan / Alert
            elseif ($type === 'alert' && !empty(trim($content))) {
                $compiledHtml .= '
                    <div>
                        <div class="bg-[#f5f5f7] p-5 rounded-2xl border-l-4 border-[#0066cc] my-4 text-[#1d1d1f]">
                            <strong class="block mb-1 text-[#0066cc] font-bold">Catatan Penting:</strong>
                            ' . nl2br(e($content)) . '
                        </div>
                    </div>';
            }
        }

        $compiledHtml .= '</div>';

        return $compiledHtml;
    }
}