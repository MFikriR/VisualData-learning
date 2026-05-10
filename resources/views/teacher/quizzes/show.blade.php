@extends('layouts.app_learning')

@section('header', 'Detail Kuis')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    {{-- Header Info Kuis --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col md:flex-row justify-between items-start gap-4">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 text-xs font-bold rounded-full">
                    {{ $quiz->chapter->title ?? 'Tanpa Bab' }}
                </span>
                <span class="text-xs text-gray-500 font-bold">⏱️ {{ $quiz->time_limit }} Menit</span>
            </div>
            <h1 class="text-2xl font-black text-gray-800 dark:text-white">{{ $quiz->title }}</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">{{ $quiz->description }}</p>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('teacher.quizzes.edit', $quiz->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-bold text-sm transition">
                ✏️ Edit Info
            </a>
            <form action="{{ route('teacher.quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Hapus kuis ini permanen?');">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-bold text-sm transition">
                    🗑️ Hapus
                </button>
            </form>
        </div>
    </div>

    {{-- Daftar Soal --}}
    <div class="space-y-4">
        <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300 ml-1">Daftar Pertanyaan ({{ $quiz->questions->count() }})</h3>

        @foreach($quiz->questions as $index => $q)
            <div class="bg-white dark:bg-gray-800 rounded-xl p-5 border border-gray-200 dark:border-gray-700 shadow-sm relative group">
                
                <div class="flex gap-4">
                    {{-- Nomor Soal --}}
                    <span class="flex-none w-8 h-8 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center font-bold text-sm text-gray-600 dark:text-gray-300">
                        {{ $index + 1 }}
                    </span>
                    
                    <div class="flex-1">
                        {{-- Header Soal & Tombol Edit --}}
                        <div class="flex justify-between items-start mb-3">
                            <p class="font-bold text-gray-800 dark:text-white text-lg">{{ $q->question_text }}</p>
                            
                            {{-- 🔥 TOMBOL AKSI SOAL (SUDAH DIPERBAIKI ROUTE-NYA) --}}
                            <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                {{-- PERBAIKAN: Tambahkan 'teacher.' --}}
                                <a href="{{ route('teacher.questions.edit', $q->id) }}" class="p-1.5 text-blue-500 bg-blue-50 hover:bg-blue-100 rounded-lg" title="Edit Soal Ini">
                                    ✏️
                                </a>
                                {{-- PERBAIKAN: Tambahkan 'teacher.' --}}
                                <form action="{{ route('teacher.questions.destroy', $q->id) }}" method="POST" onsubmit="return confirm('Hapus soal ini?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-1.5 text-red-500 bg-red-50 hover:bg-red-100 rounded-lg" title="Hapus Soal">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        {{-- Gambar Jika Ada --}}
                        @if($q->image)
                            <img src="{{ asset('storage/'.$q->image) }}" class="h-32 rounded-lg border border-gray-300 mb-4 bg-gray-50">
                        @endif

                        {{-- Opsi Jawaban --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                            @foreach(['a','b','c','d','e'] as $opt)
                                @php $col = 'option_'.$opt; @endphp
                                @if(!empty($q->$col))
                                    <div class="p-2 rounded border flex justify-between items-center {{ $q->correct_answer == $opt ? 'bg-green-50 dark:bg-green-900/20 border-green-500 text-green-700 dark:text-green-400 font-bold' : 'border-gray-200 dark:border-gray-700 text-gray-500' }}">
                                        <span>
                                            <span class="uppercase mr-1">{{ $opt }}.</span> {{ $q->$col }}
                                        </span>
                                        @if($q->correct_answer == $opt) 
                                            <span class="text-xs bg-green-200 text-green-800 px-2 py-0.5 rounded-full">Kunci</span> 
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pt-6">
        <a href="{{ route('teacher.chapters.index') }}" class="text-gray-500 hover:text-white underline">← Kembali ke Manajemen Kurikulum</a>
    </div>
</div>
@endsection