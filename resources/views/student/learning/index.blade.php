@extends('layouts.app_learning')

@section('title', $material->title)

@section('content')
{{-- Container Utama: Langsung Flex Column, hapus sidebar internal --}}
<div class="flex flex-col h-screen overflow-hidden bg-[#0a0a0a] relative">
    
    {{-- Header Mobile (Hanya muncul di layar kecil) --}}
    <div class="lg:hidden p-3 bg-[#1a1a1a] border-b border-[#333] flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="text-xs font-bold text-gray-400">← Kembali</a>
    </div>

    {{-- AREA SCROLLABLE (Video & Teks) --}}
    <div class="flex-1 overflow-y-auto p-4 md:p-8 custom-scrollbar">
        <div class="max-w-5xl mx-auto pb-20">
            
            {{-- Header Judul Materi --}}
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-3">
                    <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider
                        {{ $material->type == 'video' ? 'bg-red-500/10 text-red-400 border border-red-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20' }}">
                        {{ $material->type == 'video' ? 'VIDEO' : 'BACAAN' }}
                    </span>
                    <span class="text-xs text-gray-500 font-mono">Bab {{ $material->chapter->sequence }} - Part {{ $material->sequence }}</span>
                </div>
                <h1 class="text-2xl md:text-4xl font-black text-white leading-tight">{{ $material->title }}</h1>
            </div>

            {{-- KOTAK KONTEN UTAMA --}}
            <div class="bg-[#151515] border border-[#222] rounded-2xl overflow-hidden shadow-2xl mb-8">
                
                {{-- 1. VIDEO PLAYER (Full Width) --}}
                @if($material->type == 'video' && $material->video_url)
                    <div class="aspect-video w-full bg-black relative">
                        <iframe 
                            class="w-full h-full"
                            src="{{ $material->youtube_embed_url }}" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                @endif

                {{-- 2. TEKS KONTEN --}}
                @if($material->content)
                    <div class="p-6 md:p-10 prose prose-invert max-w-none text-gray-300 text-base md:text-lg leading-relaxed">
                        {!! nl2br(e($material->content)) !!}
                    </div>
                @endif

                {{-- INFO JIKA KOSONG --}}
                @if($material->type == 'text' && !$material->content)
                     <div class="p-10 text-center text-gray-500 italic">
                         Belum ada konten teks untuk materi ini.
                     </div>
                @endif

                {{-- FOOTER NAVIGASI (Tombol Selesai) --}}
                <div class="p-6 bg-[#1a1a1a] border-t border-[#333] flex justify-between items-center gap-4">
                    {{-- Tombol Dashboard --}}
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl font-bold text-gray-400 hover:text-white hover:bg-[#252525] transition-colors">
                        ← Dashboard
                    </a>

                    {{-- Tombol Selesai / Lanjut --}}
                    <form action="{{ route('learning.complete', $material->slug) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl font-bold shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/40 transition-all flex items-center gap-2 transform hover:-translate-y-0.5">
                            @if($nextMaterial)
                                <span>Lanjut Materi Berikutnya</span> <span>→</span>
                            @else
                                <span>🎉 Selesai Bab Ini!</span>
                            @endif
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Styling scrollbar */
    .custom-scrollbar::-webkit-scrollbar { width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #0a0a0a; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #555; }
</style>
@endsection