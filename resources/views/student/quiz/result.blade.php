@extends('layouts.app_learning')

@section('header', 'Hasil Evaluasi')

@section('content')
<div class="max-w-3xl mx-auto text-center pt-8 px-4 pb-20">
    
    {{-- 1. IKON STATUS (PRE-TEST SELALU HIJAU/SUKSES) --}}
    <div class="mb-6 flex justify-center">
        @if($passed || $quiz->type == 'pre_test')
            <div class="w-24 h-24 bg-emerald-500/20 rounded-full flex items-center justify-center animate-pulse border-2 border-emerald-500/50 shadow-[0_0_30px_rgba(16,185,129,0.3)]">
                <svg class="w-12 h-12 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        @else
            <div class="w-24 h-24 bg-red-500/20 rounded-full flex items-center justify-center border-2 border-red-500/50 shadow-[0_0_30px_rgba(239,68,68,0.3)]">
                <svg class="w-12 h-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        @endif
    </div>

    {{-- 2. JUDUL & PESAN --}}
    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3 tracking-tight">
        @if($quiz->type == 'pre_test')
            Tes Awal Selesai!
        @elseif($passed)
            Kompetensi Tuntas!
        @else
            Belum Memenuhi Standar
        @endif
    </h1>
    <p class="text-base text-slate-400 mb-8 max-w-lg mx-auto leading-relaxed">
        @if($quiz->type == 'pre_test')
            Terima kasih telah mengerjakan Tes Kemampuan Awal. Ini adalah titik awalmu sebelum mempelajari materi.
        @elseif($passed)
            Selamat! Anda berhasil mencapai nilai KKM (70) dan berhak melanjutkan ke Bab berikutnya.
        @else
            Nilai Anda masih di bawah KKM (70). Sistem mengunci Bab berikutnya. Silakan review materi dan coba lagi.
        @endif
    </p>

    {{-- 3. KARTU SKOR --}}
    <div class="bg-slate-800 rounded-3xl p-8 border border-slate-700 shadow-xl mb-12 relative overflow-hidden max-w-lg mx-auto">
        <div class="relative z-10">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                {{ $quiz->type == 'pre_test' ? 'Skor Awal Anda' : 'Skor Akhir' }}
            </span>
            <div class="text-[5rem] font-black {{ ($passed || $quiz->type == 'pre_test') ? 'text-emerald-400' : 'text-red-400' }} leading-none my-4">
                {{ $score }}
            </div>
            <div class="flex justify-center gap-6 text-sm font-bold text-slate-300">
                <span class="flex items-center gap-2 bg-emerald-500/10 px-4 py-1.5 rounded-lg text-emerald-400 border border-emerald-500/20">
                    ✓ {{ $correctCount }} Benar
                </span>
                <span class="flex items-center gap-2 bg-red-500/10 px-4 py-1.5 rounded-lg text-red-400 border border-red-500/20">
                    ✕ {{ $totalQuestions - $correctCount }} Salah
                </span>
            </div>
        </div>
        
        {{-- Hiasan Background Card --}}
        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r {{ ($passed || $quiz->type == 'pre_test') ? 'from-emerald-400 to-teal-600' : 'from-red-400 to-rose-600' }}"></div>
    </div>

    {{-- 4. AREA PEMBAHASAN SOAL --}}
    <div class="text-left max-w-3xl mx-auto">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2 pb-4 border-b border-slate-700">
            <span class="text-eduPrimary">📋</span> Review & Pembahasan
        </h3>

        <div class="space-y-6">
            @foreach($quiz->questions as $index => $question)
                @php
                    $myAnswer = $userAnswers[$question->id] ?? null; 
                    $isCorrect = $myAnswer && strtolower($myAnswer) == strtolower($question->correct_answer);

                    $myAnswerText = 'Tidak Dijawab';
                    if ($myAnswer) {
                        $colName = 'option_' . strtolower($myAnswer); 
                        $myAnswerText = $question->$colName ?? '-'; 
                    }

                    $correctColName = 'option_' . strtolower($question->correct_answer);
                    $correctAnswerText = $question->$correctColName ?? '-';
                @endphp

                {{-- Kartu Soal --}}
                <div class="p-6 rounded-2xl border {{ $isCorrect ? 'border-emerald-500/30 bg-emerald-500/5' : 'border-red-500/30 bg-red-500/5' }}">
                    
                    {{-- Header Soal --}}
                    <div class="flex justify-between items-start mb-4">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm font-bold {{ $isCorrect ? 'bg-emerald-500/20 text-emerald-400' : 'bg-red-500/20 text-red-400' }}">
                            {{ $index + 1 }}
                        </span>
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $isCorrect ? 'bg-emerald-500/20 text-emerald-400' : 'bg-red-500/20 text-red-400' }}">
                            {{ $isCorrect ? 'Tepat' : 'Keliru' }}
                        </span>
                    </div>

                    {{-- Pertanyaan --}}
                    <p class="text-base font-medium text-slate-200 mb-5 leading-relaxed">
                        {{ $question->question_text }}
                    </p>

                    @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}" class="mb-6 rounded-xl max-h-60 border border-slate-700 bg-slate-800 mx-auto object-contain">
                    @endif

                    {{-- Komparasi Jawaban --}}
                    <div class="grid md:grid-cols-2 gap-4 text-sm mt-2">
                        
                        {{-- Jawaban Kamu --}}
                        <div class="p-4 rounded-xl {{ $isCorrect ? 'bg-emerald-900/30 border border-emerald-800/50' : 'bg-red-900/30 border border-red-800/50' }}">
                            <p class="text-[10px] font-bold opacity-60 mb-1.5 uppercase tracking-wider text-slate-300">Jawaban Anda:</p>
                            <p class="font-bold {{ $isCorrect ? 'text-emerald-400' : 'text-red-400' }}">
                                {{ strtoupper($myAnswer ?? '-') }}. {{ $myAnswerText }}
                            </p>
                        </div>

                        {{-- Kunci Jawaban (Hanya muncul jika salah) --}}
                        @if(!$isCorrect)
                            <div class="p-4 rounded-xl bg-blue-900/20 border border-blue-800/50">
                                <p class="text-[10px] font-bold text-blue-400 mb-1.5 uppercase tracking-wider">Kunci Jawaban Benar:</p>
                                <p class="font-bold text-blue-300">
                                    {{ strtoupper($question->correct_answer) }}. {{ $correctAnswerText }}
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- Penjelasan / Pembahasan --}}
                    @if(!$isCorrect && $question->explanation)
                        <div class="mt-5 pt-5 border-t border-slate-700/50">
                            <div class="bg-slate-900/50 p-4 rounded-xl border border-slate-700">
                                <strong class="text-eduAccent text-sm block mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Pembahasan Materi
                                </strong>
                                <p class="text-sm text-slate-300 leading-relaxed">
                                    {{ $question->explanation }}
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>

    {{-- 5. TOMBOL AKSI (PERBAIKAN LOGIKA PRE-TEST) --}}
    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12">
        
        @if($quiz->type == 'pre_test')
            {{-- JIKA PRE-TEST: Langsung Lanjut Belajar, Apapun Nilainya --}}
            <a href="{{ route('dashboard') }}" class="px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold shadow-lg shadow-emerald-500/20 transition-all transform hover:-translate-y-1">
                Mulai Belajar Materi Bab 1 ➔
            </a>
        @else
            {{-- JIKA EVALUASI / POST-TEST --}}
            @if(!$passed)
                <a href="{{ route('dashboard') }}" class="px-8 py-3.5 rounded-xl border border-slate-600 bg-slate-800 text-slate-300 font-bold hover:bg-slate-700 transition-all">
                    Pelajari Ulang Materi
                </a>
                <a href="{{ route('quiz.show', $quiz->id) }}" class="px-8 py-3.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold shadow-lg shadow-red-500/20 transition-all flex items-center justify-center gap-2 transform hover:-translate-y-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Ulangi Evaluasi
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold shadow-lg shadow-emerald-500/20 transition-all transform hover:-translate-y-1">
                    Lanjut ke Bab Berikutnya ➔
                </a>
            @endif
        @endif
        
    </div>

</div>
@endsection