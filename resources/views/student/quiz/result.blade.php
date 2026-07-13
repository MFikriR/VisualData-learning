@extends('layouts.app_learning')

@section('header', 'Hasil Evaluasi')

@section('content')
<div class="apple-result-view max-w-3xl mx-auto text-center pt-8 px-4 pb-20 font-sans">
    
    {{-- 1. IKON STATUS (PRE-TEST SELALU HIJAU/SUKSES - FLAT STYLE TANPA SHADOW) --}}
    <div class="mb-6 flex justify-center">
        @if($passed || $quiz->type == 'pre_test')
            <div class="w-20 h-24 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-200">
                <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
        @else
            <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center border border-red-200">
                <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
        @endif
    </div>

    {{-- 2. JUDUL & PESAN --}}
    <h1 class="text-3xl md:text-4xl font-semibold text-[#1d1d1f] mb-3 tracking-tight">
        @if($quiz->type == 'pre_test')
            Tes Awal Selesai
        @elseif($passed)
            Kompetensi Tuntas
        @else
            Belum Memenuhi Standar
        @endif
    </h1>
    <p class="text-base text-[#7a7a7a] mb-8 max-w-lg mx-auto leading-relaxed font-medium">
        @if($quiz->type == 'pre_test')
            Terima kasih telah mengerjakan Tes Kemampuan Awal. Ini adalah titik awalmu sebelum mempelajari materi.
        @elseif($passed)
            Selamat! Anda berhasil mencapai nilai minimum dan berhak melanjutkan ke Bab berikutnya.
        @else
            Nilai Anda masih di bawah KKM. Sistem mengunci Bab berikutnya. Silakan pelajari ulang materi dan coba lagi.
        @endif
    </p>

    {{-- 3. KARTU SKOR (Apple Card Style Murni) --}}
    <div class="bg-[#fafafc] rounded-2xl p-8 border border-[#e0e0e0] mb-12 relative overflow-hidden max-w-lg mx-auto">
        <div class="relative z-10">
            <span class="text-xs font-semibold text-[#7a7a7a] uppercase tracking-widest">
                {{ $quiz->type == 'pre_test' ? 'Skor Awal Anda' : 'Skor Akhir' }}
            </span>
            <div class="text-[5rem] font-semibold {{ ($passed || $quiz->type == 'pre_test') ? 'text-emerald-600' : 'text-red-600' }} leading-none my-4">
                {{ $score }}
            </div>
            <div class="flex justify-center gap-4 text-sm font-medium">
                <span class="flex items-center gap-1.5 bg-white px-4 py-2 rounded-full text-emerald-600 border border-[#e0e0e0]">
                    Benar: {{ $correctCount }}
                </span>
                <span class="flex items-center gap-1.5 bg-white px-4 py-2 rounded-full text-red-600 border border-[#e0e0e0]">
                    Salah: {{ $totalQuestions - $correctCount }}
                </span>
            </div>
        </div>
        
        {{-- Penanda Garis Atas Premium --}}
        <div class="absolute top-0 left-0 w-full h-1.5 {{ ($passed || $quiz->type == 'pre_test') ? 'bg-emerald-500' : 'bg-red-500' }}"></div>
    </div>

    {{-- 4. AREA PEMBAHASAN SOAL --}}
    <div class="text-left max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold text-[#1d1d1f] mb-6 flex items-center gap-2 pb-4 border-b border-[#e0e0e0]">
            Review dan Pembahasan
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

                {{-- Kartu Review Soal --}}
                <div class="p-6 rounded-xl border {{ $isCorrect ? 'border-emerald-200 bg-emerald-50/10' : 'border-red-200 bg-red-50/10' }}">
                    
                    {{-- Header Soal --}}
                    <div class="flex justify-between items-start mb-4">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg text-sm font-semibold {{ $isCorrect ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
                            {{ $index + 1 }}
                        </span>
                        <span class="px-3 py-1 rounded-full text-[10px] font-semibold uppercase tracking-wider {{ $isCorrect ? 'bg-emerald-100/60 text-emerald-700 border border-emerald-200' : 'bg-red-100/60 text-red-700 border border-red-200' }}">
                            {{ $isCorrect ? 'Tepat' : 'Keliru' }}
                        </span>
                    </div>

                    {{-- Pertanyaan --}}
                    <p class="text-base font-semibold text-[#1d1d1f] mb-5 leading-relaxed">
                        {{ $question->question_text }}
                    </p>

                    @if($question->image)
                        <div class="p-2 border border-[#e0e0e0] bg-white rounded-xl mb-6 max-w-md mx-auto">
                            <img src="{{ asset('storage/' . $question->image) }}" class="w-full h-auto max-h-60 object-contain rounded-lg mx-auto">
                        </div>
                    @endif

                    {{-- Komparasi Jawaban --}}
                    <div class="grid md:grid-cols-2 gap-4 text-sm mt-2">
                        
                        {{-- Jawaban Kamu --}}
                        <div class="p-4 rounded-xl bg-white border {{ $isCorrect ? 'border-emerald-200' : 'border-red-200' }}">
                            <p class="text-[10px] font-semibold text-[#7a7a7a] mb-1.5 uppercase tracking-wider">Jawaban Anda:</p>
                            <p class="font-semibold {{ $isCorrect ? 'text-emerald-600' : 'text-red-600' }}">
                                {{ strtoupper($myAnswer ?? '-') }}. {{ $myAnswerText }}
                            </p>
                        </div>

                        {{-- Kunci Jawaban (Hanya muncul jika salah) --}}
                        @if(!$isCorrect)
                            <div class="p-4 rounded-xl bg-white border border-[#0066cc]/20">
                                <p class="text-[10px] font-semibold text-[#0066cc] mb-1.5 uppercase tracking-wider">Kunci Jawaban Benar:</p>
                                <p class="font-semibold text-[#0066cc]">
                                    {{ strtoupper($question->correct_answer) }}. {{ $correctAnswerText }}
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- Penjelasan / Pembahasan (Perbaikan Keterbacaan Kontras) --}}
                    @if(!$isCorrect && $question->explanation)
                        <div class="mt-5 pt-5 border-t border-[#e0e0e0]">
                            <div class="bg-[#f5f5f7] p-5 rounded-xl border border-[#e0e0e0]">
                                <strong class="text-[#1d1d1f] text-sm mb-2 flex items-center gap-2 font-semibold">
                                    Pembahasan Materi:
                                </strong>
                                <p class="text-sm text-[#333333] leading-relaxed font-medium">
                                    {{ $question->explanation }}
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>

    {{-- 5. TOMBOL AKSI (Apple Pill Shape CTA) --}}
    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12">
        
        @if($quiz->type == 'pre_test')
            <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-[#0066cc] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors text-sm border-none cursor-pointer">
                Mulai Belajar Materi Bab 1
            </a>
        @else
            @if(!$passed)
                <a href="{{ route('dashboard') }}" class="px-8 py-3 rounded-full border border-[#e0e0e0] bg-white text-[#1d1d1f] font-medium hover:bg-[#f5f5f7] transition-colors text-sm">
                    Pelajari Ulang Materi
                </a>
                <a href="{{ route('quiz.show', $quiz->id) }}" class="px-8 py-3 bg-[#ff453a] hover:bg-[#e03b30] text-white font-medium rounded-full transition-colors flex items-center justify-center gap-2 text-sm border-none cursor-pointer">
                    Ulangi Evaluasi
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-[#0066cc] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors text-sm border-none cursor-pointer">
                    Lanjut ke Bab Berikutnya
                </a>
            @endif
        @endif
        
    </div>

</div>

{{-- SHIELD STYLE UNTUK MENANGKAL OVERRIDE WARNA PUTIH DARI LAYOUT UTAMA --}}
<style>
    .apple-result-view h1,
    .apple-result-view h2,
    .apple-result-view h3,
    .apple-result-view h4,
    .apple-result-view p,
    .apple-result-view li {
        color: #1d1d1f !important; /* Mengembalikan teks ke warna tinta gelap Apple */
    }
    .apple-result-view span {
        color: #7a7a7a !important; /* Mengembalikan teks deskripsi ke warna abu-abu */
    }
    /* Proteksi Warna Status Khusus */
    .apple-result-view .text-emerald-600,
    .apple-result-view .text-emerald-700 {
        color: #059669 !important;
    }
    .apple-result-view .text-red-600,
    .apple-result-view .text-red-700 {
        color: #ff453a !important;
    }
    .apple-result-view .text-[#0066cc],
    .apple-result-view .text-blue-600,
    .apple-result-view .text-blue-800 {
        color: #0066cc !important;
    }
    .apple-result-view .text-white,
    .apple-result-view button span,
    .apple-result-view a {
        color: #ffffff; /* Membebaskan teks tombol agar tetap putih */
    }
    .apple-result-view .bg-white p {
        color: #1d1d1f !important;
    }
    /* Mematikan box shadow hiasan kaku */
    .apple-result-view .shadow-xl,
    .apple-result-view .shadow-md,
    .apple-result-view .shadow-sm {
        box-shadow: none !important;
    }
</style>
@endsection