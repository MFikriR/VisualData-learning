@extends('layouts.app_learning')

@section('header', 'Hasil Evaluasi')

@section('content')
<div class="max-w-3xl mx-auto text-center pt-8 px-4 pb-20 font-sans">
    
    {{-- 1. IKON STATUS (PRE-TEST SELALU HIJAU/SUKSES) --}}
    <div class="mb-6 flex justify-center">
        @if($passed || $quiz->type == 'pre_test')
            <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center animate-pulse border-4 border-emerald-400 shadow-[0_0_30px_rgba(16,185,129,0.4)]">
                <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        @else
            <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center border-4 border-red-400 shadow-[0_0_30px_rgba(239,68,68,0.4)]">
                <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        @endif
    </div>

    {{-- 2. JUDUL & PESAN --}}
    <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-3 tracking-tight">
        @if($quiz->type == 'pre_test')
            Tes Awal Selesai!
        @elseif($passed)
            Kompetensi Tuntas!
        @else
            Belum Memenuhi Standar
        @endif
    </h1>
    <p class="text-base text-gray-600 mb-8 max-w-lg mx-auto leading-relaxed font-medium">
        @if($quiz->type == 'pre_test')
            Terima kasih telah mengerjakan Tes Kemampuan Awal. Ini adalah titik awalmu sebelum mempelajari materi.
        @elseif($passed)
            Selamat! Anda berhasil mencapai nilai minimum dan berhak melanjutkan ke Bab berikutnya.
        @else
            Nilai Anda masih di bawah KKM. Sistem mengunci Bab berikutnya. Silakan pelajari ulang materi dan coba lagi.
        @endif
    </p>

    {{-- 3. KARTU SKOR --}}
    <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-xl mb-12 relative overflow-hidden max-w-lg mx-auto">
        <div class="relative z-10">
            <span class="text-xs font-black text-gray-400 uppercase tracking-widest">
                {{ $quiz->type == 'pre_test' ? 'Skor Awal Anda' : 'Skor Akhir' }}
            </span>
            <div class="text-[5rem] font-black {{ ($passed || $quiz->type == 'pre_test') ? 'text-emerald-600' : 'text-red-600' }} leading-none my-4">
                {{ $score }}
            </div>
            <div class="flex justify-center gap-4 text-sm font-bold">
                <span class="flex items-center gap-1.5 bg-emerald-50 px-4 py-2 rounded-xl text-emerald-700 border border-emerald-200 shadow-sm">
                    ✅ {{ $correctCount }} Benar
                </span>
                <span class="flex items-center gap-1.5 bg-red-50 px-4 py-2 rounded-xl text-red-700 border border-red-200 shadow-sm">
                    ❌ {{ $totalQuestions - $correctCount }} Salah
                </span>
            </div>
        </div>
        
        {{-- Hiasan Background Card --}}
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r {{ ($passed || $quiz->type == 'pre_test') ? 'from-emerald-400 to-teal-500' : 'from-red-400 to-rose-500' }}"></div>
    </div>

    {{-- 4. AREA PEMBAHASAN SOAL --}}
    <div class="text-left max-w-3xl mx-auto">
        <h3 class="text-xl font-black text-gray-800 mb-6 flex items-center gap-2 pb-4 border-b-2 border-gray-200">
            <span>📋</span> Review & Pembahasan
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
                <div class="p-6 rounded-2xl border-2 {{ $isCorrect ? 'border-emerald-200 bg-emerald-50/30' : 'border-red-200 bg-red-50/30' }} shadow-sm">
                    
                    {{-- Header Soal --}}
                    <div class="flex justify-between items-start mb-4">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm font-black {{ $isCorrect ? 'bg-emerald-200 text-emerald-800' : 'bg-red-200 text-red-800' }}">
                            {{ $index + 1 }}
                        </span>
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $isCorrect ? 'bg-emerald-100 text-emerald-700 border border-emerald-300' : 'bg-red-100 text-red-700 border border-red-300' }}">
                            {{ $isCorrect ? 'Tepat' : 'Keliru' }}
                        </span>
                    </div>

                    {{-- Pertanyaan --}}
                    <p class="text-base font-bold text-gray-800 mb-5 leading-relaxed">
                        {{ $question->question_text }}
                    </p>

                    @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}" class="mb-6 rounded-xl max-h-60 border border-gray-200 bg-white mx-auto object-contain shadow-sm">
                    @endif

                    {{-- Komparasi Jawaban --}}
                    <div class="grid md:grid-cols-2 gap-4 text-sm mt-2">
                        
                        {{-- Jawaban Kamu --}}
                        <div class="p-4 rounded-xl bg-white border shadow-sm {{ $isCorrect ? 'border-emerald-300' : 'border-red-300' }}">
                            <p class="text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Jawaban Anda:</p>
                            <p class="font-bold {{ $isCorrect ? 'text-emerald-600' : 'text-red-600' }}">
                                {{ strtoupper($myAnswer ?? '-') }}. {{ $myAnswerText }}
                            </p>
                        </div>

                        {{-- Kunci Jawaban (Hanya muncul jika salah) --}}
                        @if(!$isCorrect)
                            <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 shadow-sm">
                                <p class="text-[10px] font-bold text-blue-600 mb-1.5 uppercase tracking-wider">Kunci Jawaban Benar:</p>
                                <p class="font-bold text-blue-800">
                                    {{ strtoupper($question->correct_answer) }}. {{ $correctAnswerText }}
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- Penjelasan / Pembahasan (FIX WARNA INVISIBLE DI SINI) --}}
                    @if(!$isCorrect && $question->explanation)
                        <div class="mt-5 pt-5 border-t-2 border-gray-100">
                            <div class="bg-amber-50 p-5 rounded-xl border border-amber-200 shadow-inner">
                                <strong class="text-amber-800 text-sm mb-2 flex items-center gap-2 font-black">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Pembahasan Materi:
                                </strong>
                                <p class="text-sm text-gray-800 leading-relaxed font-medium">
                                    {{ $question->explanation }}
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>

    {{-- 5. TOMBOL AKSI --}}
    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12">
        
        @if($quiz->type == 'pre_test')
            <a href="{{ route('dashboard') }}" class="px-8 py-3.5 rounded-xl bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] font-black shadow-lg transition-all transform hover:-translate-y-1">
                Mulai Belajar Materi Bab 1 ➔
            </a>
        @else
            @if(!$passed)
                <a href="{{ route('dashboard') }}" class="px-8 py-3.5 rounded-xl border-2 border-gray-300 bg-white text-gray-700 font-bold hover:bg-gray-50 transition-all">
                    Pelajari Ulang Materi
                </a>
                <a href="{{ route('quiz.show', $quiz->id) }}" class="px-8 py-3.5 rounded-xl bg-red-600 hover:bg-red-700 text-white font-black shadow-lg transition-all flex items-center justify-center gap-2 transform hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Ulangi Evaluasi
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="px-8 py-3.5 rounded-xl bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] font-black shadow-lg transition-all transform hover:-translate-y-1">
                    Lanjut ke Bab Berikutnya ➔
                </a>
            @endif
        @endif
        
    </div>

</div>
@endsection