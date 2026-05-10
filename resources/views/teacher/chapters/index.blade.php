@extends('layouts.app_learning')

@section('header', 'Manajemen Kurikulum')

@section('content')
<div class="space-y-8 pb-20">

    {{-- 1. HEADER CARD --}}
    <div class="bg-slate-800 rounded-3xl p-8 border border-slate-700 flex flex-col md:flex-row justify-between items-center gap-6 shadow-xl relative overflow-hidden group hover:border-blue-500/50 transition-colors">
        <div class="absolute top-0 right-0 w-32 h-32 bg-eduPrimary/10 blur-[50px] rounded-full pointer-events-none"></div>

        <div class="flex items-center gap-5 relative z-10 w-full md:w-auto">
            <div class="p-4 bg-blue-500/20 rounded-2xl text-blue-400 border border-blue-500/30 hidden md:block">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div>
                <h2 class="text-2xl font-black text-white mb-1">Daftar Bab Materi</h2>
                <p class="text-sm text-slate-400">Kelola struktur kurikulum, materi pelajaran, dan kuis evaluasi.</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto relative z-10">
            <a href="{{ route('teacher.quizzes.create') }}" class="w-full sm:w-auto px-6 py-3.5 bg-slate-900 hover:bg-slate-700 text-white font-bold rounded-xl border border-slate-600 flex items-center justify-center gap-2 transition-all text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Rakit Evaluasi
            </a>

            <a href="{{ route('teacher.chapters.create') }}" class="w-full sm:w-auto px-6 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 flex items-center justify-center gap-2 transition-all transform hover:-translate-y-1 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Buat Bab Baru
            </a>
        </div>
    </div>

    {{-- 2. GRID CARD BAB --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($chapters as $chapter)
            <div class="bg-slate-800 rounded-3xl p-6 border border-slate-700 shadow-xl transition-all group relative overflow-hidden flex flex-col h-full hover:border-slate-500">
                
                {{-- Hiasan Background Angka --}}
                <div class="absolute -right-4 -top-4 text-9xl font-black text-slate-900/50 z-0 select-none group-hover:scale-110 transition-transform duration-500">
                    {{ $chapter->sequence }}
                </div>

                <div class="relative z-10 flex flex-col h-full">
                    <div class="flex justify-between items-start mb-6">
                        <span class="px-3 py-1.5 bg-slate-900 text-slate-300 text-[10px] font-extrabold uppercase tracking-widest rounded-lg border border-slate-700 shadow-inner">
                            Bab {{ $chapter->sequence }}
                        </span>
                        
                        <div class="flex gap-2">
                            <a href="{{ route('teacher.chapters.edit', $chapter->id) }}" class="p-2 text-slate-400 hover:text-amber-400 bg-slate-900 hover:bg-amber-500/10 rounded-lg border border-slate-700 transition-colors" title="Edit Judul Bab">✏️</a>
                            
                            <form action="{{ route('teacher.chapters.destroy', $chapter->id) }}" method="POST" onsubmit="return confirm('Yakin hapus Bab ini? Semua materi di dalamnya akan ikut lenyap!');">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-400 bg-slate-900 hover:bg-red-500/10 rounded-lg border border-slate-700 transition-colors" title="Hapus Bab">🗑️</button>
                            </form>
                        </div>
                    </div>

                    <h3 class="text-xl font-black text-white mb-3 line-clamp-2 leading-tight">{{ $chapter->title }}</h3>
                    <p class="text-sm text-slate-400 mb-6 line-clamp-3 leading-relaxed flex-grow">
                        {{ $chapter->description ?? 'Tidak ada deskripsi untuk bab ini.' }}
                    </p>

                    <div class="flex items-center gap-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest border-t border-slate-700 pt-5 mb-5">
                        <span class="flex items-center gap-2 bg-slate-900 px-3 py-1.5 rounded-lg border border-slate-700">
                            📄 {{ $chapter->materials_count }} Materi
                        </span>
                        <span class="flex items-center gap-2 bg-slate-900 px-3 py-1.5 rounded-lg border border-slate-700">
                            ⚔️ {{ $chapter->quizzes_count }} Kuis
                        </span>
                    </div>
                    
                    <a href="{{ route('teacher.chapters.show', $chapter->id) }}" class="block text-center w-full py-3.5 bg-slate-900 hover:bg-blue-500/20 text-slate-300 hover:text-blue-400 font-bold text-sm rounded-xl border border-slate-700 hover:border-blue-500/30 transition-colors mt-auto">
                        Kelola Isi Bab →
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center text-slate-500 bg-slate-800/50 rounded-3xl border-2 border-dashed border-slate-700">
                <div class="text-6xl mb-4 opacity-50">📂</div>
                <p class="font-bold text-lg mb-1 text-white">Kurikulum Kosong</p>
                <p class="text-sm">Silakan buat Bab pertama Anda untuk memulai merakit materi.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection