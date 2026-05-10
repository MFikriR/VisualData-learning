@extends('layouts.app_learning')

@section('header', 'Kelola Materi Bab')

@section('content')
<div class="space-y-6">

    {{-- 1. HEADER BAB --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border border-gray-200 dark:border-gray-700 relative overflow-hidden">
        
        {{-- Tombol Kembali --}}
        <a href="{{ route('teacher.chapters.index') }}" class="absolute top-6 right-6 z-20 text-sm font-bold text-gray-500 hover:text-indigo-600 transition-colors">
            ← Kembali ke Kurikulum
        </a>

        <div class="relative z-10">
            <span class="px-3 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-xs font-bold uppercase tracking-wider rounded-lg border border-indigo-100 dark:border-indigo-800 mb-2 inline-block">
                BAB {{ $chapter->sequence }}
            </span>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white mb-2">{{ $chapter->title }}</h1>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl">
                {{ $chapter->description ?? 'Tidak ada deskripsi.' }}
            </p>
        </div>
        
        {{-- Hiasan Background --}}
        <div class="absolute -right-10 -bottom-10 text-[10rem] font-black text-gray-50 dark:text-gray-700/10 select-none z-0">
            {{ $chapter->sequence }}
        </div>
    </div>

    {{-- 2. DAFTAR MATERI --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        
        {{-- Toolbar Materi --}}
        <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white flex items-center gap-2">
                <span>📚</span> Daftar Materi Pelajaran
            </h3>
            
            <a href="{{ route('teacher.materials.create', $chapter->id) }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-bold transition-colors shadow-lg shadow-indigo-500/30 flex items-center gap-2">
                <span>+</span> Tambah Materi Baru
            </a>
        </div>

        {{-- List Materi --}}
        <div class="divide-y divide-gray-100 dark:divide-gray-700">
            @forelse($chapter->materials as $material)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors group flex items-center justify-between gap-4">
                    
                    {{-- Info Materi --}}
                    <div class="flex items-center gap-4">
                        {{-- Icon Tipe --}}
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-lg 
                            {{ $material->type == 'video' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                            {{ $material->type == 'video' ? '📺' : '📄' }}
                        </div>
                        
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-bold bg-gray-100 dark:bg-gray-700 text-gray-500 px-1.5 py-0.5 rounded">
                                    Urutan {{ $material->sequence }}
                                </span>
                                <span class="text-xs uppercase font-bold text-gray-400">{{ $material->type }}</span>
                            </div>
                            <h4 class="font-bold text-gray-900 dark:text-white">{{ $material->title }}</h4>
                        </div>
                    </div>

                    {{-- Aksi --}}
                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        {{-- Tombol Edit --}}
                        <a href="{{ route('teacher.materials.edit', $material->id) }}" class="p-2 bg-yellow-50 text-yellow-600 rounded-lg hover:bg-yellow-100 transition-colors" title="Edit Materi">
                            ✏️
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('teacher.materials.destroy', $material->id) }}" method="POST" onsubmit="return confirm('Hapus materi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors" title="Hapus Materi">
                                🗑️
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="p-12 text-center">
                    <div class="text-4xl mb-4">📭</div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Belum ada materi</h3>
                    <p class="text-gray-500 text-sm mb-6">Bab ini masih kosong. Yuk mulai isi materinya!</p>
                    <a href="{{ route('teacher.materials.create', $chapter->id) }}" class="text-indigo-600 font-bold hover:underline">
                        + Buat Materi Pertama
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    {{-- ========================================== --}}
    {{-- 3. DAFTAR KUIS / EVALUASI (BAGIAN BARU) --}}
    {{-- ========================================== --}}
    <div class="mt-8">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white flex items-center gap-2">
                <span>📝</span> Kuis & Evaluasi
            </h3>
            
            {{-- Tombol Pintas Tambah Kuis --}}
            <a href="{{ route('teacher.quizzes.create') }}" class="text-sm text-indigo-600 font-bold hover:underline flex items-center gap-1">
                <span>+</span> Tambah Kuis Lain
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm">
            @forelse($chapter->quizzes as $quiz)
                <div class="p-4 border-b border-gray-100 dark:border-gray-700 last:border-0 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors group">
                    
                    {{-- Judul & Info Kuis --}}
                    <div class="flex items-center gap-4 flex-1">
                        <div class="p-2 bg-purple-100 text-purple-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <div>
                            {{-- JUDUL KUIS BISA DIKLIK --}}
                            <a href="{{ route('teacher.quizzes.show', $quiz->id) }}" class="font-bold text-gray-800 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 hover:underline transition-colors">
                                {{ $quiz->title }}
                            </a>
                            <p class="text-xs text-gray-500">
                                {{ $quiz->questions->count() }} Soal • {{ $quiz->type == 'exercise' ? 'Latihan' : 'Ujian' }}
                            </p>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        
                        {{-- 1. Tombol Detail (Mata) --}}
                        <a href="{{ route('teacher.quizzes.show', $quiz->id) }}" class="p-1.5 text-gray-400 hover:text-blue-500 hover:bg-blue-50 rounded transition-colors" title="Lihat Detail Kuis">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </a>

                        {{-- 2. Tombol Edit Info (Pensil) --}}
                        <a href="{{ route('teacher.quizzes.edit', $quiz->id) }}" class="p-1.5 text-gray-400 hover:text-yellow-500 hover:bg-yellow-50 rounded transition-colors" title="Edit Info Kuis">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </a>

                        {{-- 3. Tombol Hapus (Tong Sampah) --}}
                        <form action="{{ route('teacher.quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kuis ini? Semua data soal di dalamnya akan ikut terhapus permanen.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded transition-colors" title="Hapus Kuis">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center text-gray-400 italic bg-gray-50 dark:bg-gray-800/50">
                    Belum ada kuis yang dibuat untuk bab ini.
                    <br>
                    <a href="{{ route('teacher.quizzes.create') }}" class="text-indigo-500 text-sm font-bold hover:underline mt-2 inline-block">Buat Kuis Sekarang</a>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection