@extends('layouts.app_learning')

@section('title', $material->title)

@section('content')
{{-- Container Utama: Menggunakan skema warna hitam pekat premium --}}
<div class="apple-learning-viewport flex flex-col h-screen overflow-hidden bg-[#000000] relative">
    
    {{-- Header Mobile --}}
    <div class="lg:hidden p-3 bg-[#1c1c1e] border-b border-white/5 flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="text-xs font-medium text-[#7a7a7a] hover:text-white transition-colors">Kembali</a>
    </div>

    {{-- AREA SCROLLABLE (Video & Teks) --}}
    <div class="flex-1 overflow-y-auto p-4 md:p-8 custom-scrollbar">
        <div class="max-w-5xl mx-auto pb-20">
            
            {{-- Header Judul Materi --}}
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-3">
                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold uppercase tracking-wider
                        {{ $material->type == 'video' ? 'bg-[#ff453a]/10 text-[#ff453a] border border-[#ff453a]/20' : 'bg-[#2997ff]/10 text-[#2997ff] border border-[#2997ff]/20' }}">
                        {{ $material->type == 'video' ? 'VIDEO' : 'BACAAN' }}
                    </span>
                    <span class="text-xs text-[#7a7a7a] font-mono">Bab {{ $material->chapter->sequence }} - Bagian {{ $material->sequence }}</span>
                </div>
                <h1 class="text-2xl md:text-4xl font-semibold text-white leading-tight tracking-tight">{{ $material->title }}</h1>
            </div>

            {{-- KOTAK KONTEN UTAMA (Menggunakan Apple Surface Tile) --}}
            <div class="bg-[#272729] border border-white/10 rounded-2xl overflow-hidden">
                
                {{-- 1. VIDEO PLAYER (Full Width) --}}
                @if($material->type == 'video' && $material->video_url)
                    <div class="aspect-video w-full bg-black relative border-b border-white/5">
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
                    <div class="p-6 md:p-10 prose prose-invert max-w-none text-[#cccccc] text-base md:text-lg leading-relaxed article-body">
                        {!! nl2br(e($material->content)) !!}
                    </div>
                @endif

                {{-- INFO JIKA KOSONG --}}
                @if($material->type == 'text' && !$material->content)
                     <div class="p-10 text-center text-[#7a7a7a] italic text-sm">
                         Belum ada konten teks untuk materi ini.
                     </div>
                @endif

                {{-- FOOTER NAVIGASI (Tombol Aksi Minimalis Tanpa Shadow) --}}
                <div class="p-6 bg-[#2a2a2c] border-t border-white/5 flex justify-between items-center gap-4">
                    {{-- Tombol Dashboard --}}
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-full font-medium text-[#7a7a7a] hover:text-white hover:bg-white/5 transition-colors text-sm">
                        Kembali ke Dashboard
                    </a>

                    {{-- Tombol Selesai / Lanjut --}}
                    <form action="{{ route('learning.complete', $material->slug) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-8 py-2.5 bg-[#2997ff] hover:bg-[#0071e3] text-white rounded-full font-medium text-sm transition-colors cursor-pointer flex items-center gap-1">
                            @if($nextMaterial)
                                <span>Lanjut Materi Berikutnya</span>
                            @else
                                <span>Selesai Bab Ini</span>
                            @endif
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Tipografi & Kompatibilitas CSS Reference Apple */
    .apple-learning-viewport {
        font-family: "SF Pro Display", "-apple-system", BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .article-body p {
        color: #cccccc !important;
    }
    
    .article-body strong {
        color: #ffffff !important;
        font-weight: 600;
    }

    /* Kustomisasi scrollbar halus berpadu dengan kanvas hitam */
    .custom-scrollbar::-webkit-scrollbar { 
        width: 6px; 
    }
    .custom-scrollbar::-webkit-scrollbar-track { 
        background: #000000; 
    }
    .custom-scrollbar::-webkit-scrollbar-thumb { 
        background: rgba(255, 255, 255, 0.15); 
        border-radius: 9999px; 
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { 
        background: rgba(255, 255, 255, 0.3); 
    }
</style>
@endsection