@extends('layouts.app_learning')

@section('header', 'Evaluasi Pembelajaran')

@section('content')
<div class="max-w-7xl mx-auto apple-quiz-player font-sans pb-20">

    <div class="mb-6 bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-6">
        <h1 class="text-2xl font-semibold text-[#1d1d1f] mb-2">
            {{ $quiz->title }}
        </h1>
        <p class="text-sm text-[#7a7a7a]">
            {{ $quiz->description ?? 'Kerjakan soal dengan teliti. Waktu akan terus berjalan sejak tombol konfirmasi ditekan.' }}
        </p>
    </div>

    {{-- =============================================== --}}
    {{-- LAYAR ATURAN (TAMPIL SEBELUM KUIS DIMULAI)       --}}
    {{-- =============================================== --}}
    <div id="rulesScreen" class="bg-white border border-[#e0e0e0] rounded-2xl p-6 md:p-10 animate-fade-in shadow-sm">
        <div class="text-center mb-8">
            <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-[#0066cc]/5 border border-[#0066cc]/10 flex items-center justify-center">
                <svg class="w-7 h-7 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-[#1d1d1f] mb-1">{{ $quiz->title }}</h2>
            <p class="text-sm text-[#7a7a7a] max-w-xl mx-auto">
                Bacalah seluruh aturan pengerjaan di bawah ini dengan teliti sebelum memulai evaluasi.
            </p>
        </div>

        {{-- Grid Parameter Info Ringkas --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 text-center">
                <p class="text-[10px] text-[#7a7a7a] font-semibold uppercase tracking-wider mb-1">Jumlah Soal</p>
                <p class="text-xl font-semibold text-[#1d1d1f]">{{ count($quiz->questions) }}</p>
            </div>
            <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 text-center">
                <p class="text-[10px] text-[#7a7a7a] font-semibold uppercase tracking-wider mb-1">Waktu</p>
                <p class="text-xl font-semibold text-[#1d1d1f]">
                    @if($quiz->time_limit > 0)
                        {{ $quiz->time_limit }} Menit
                    @else
                        Tanpa Batas
                    @endif
                </p>
            </div>
            <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 text-center">
                <p class="text-[10px] text-[#7a7a7a] font-semibold uppercase tracking-wider mb-1">Tipe Soal</p>
                <p class="text-xl font-semibold text-[#1d1d1f]">Pilihan Ganda</p>
            </div>
            <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 text-center">
                <p class="text-[10px] text-[#7a7a7a] font-semibold uppercase tracking-wider mb-1">Percobaan</p>
                <p class="text-xl font-semibold text-[#1d1d1f]">1x</p>
            </div>
        </div>

        {{-- Daftar Aturan Pengerjaan Resmi --}}
        <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-6 mb-8">
            <h3 class="text-xs font-semibold text-[#1d1d1f] uppercase tracking-wider mb-4">Aturan Pengerjaan</h3>
            <ul class="space-y-4 text-sm text-[#333333]">
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-[#0066cc]/10 text-[#0066cc] text-xs font-semibold flex items-center justify-center mt-0.5">1</span>
                    <span>Waktu pengerjaan akan mulai berjalan segera setelah kamu menekan tombol <strong class="text-[#1d1d1f] font-semibold">"Mulai Kuis"</strong> dan tidak dapat dijeda secara manual.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-[#0066cc]/10 text-[#0066cc] text-xs font-semibold flex items-center justify-center mt-0.5">2</span>
                    <span>Pastikan koneksi internet stabil. Jangan menutup, memuat ulang (refresh), atau meninggalkan halaman browser selama ujian berlangsung.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-[#0066cc]/10 text-[#0066cc] text-xs font-semibold flex items-center justify-center mt-0.5">3</span>
                    <span>Kamu dapat berpindah antar nomor soal secara bebas menggunakan panel blok navigasi angka di sebelah kanan.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-[#0066cc]/10 text-[#0066cc] text-xs font-semibold flex items-center justify-center mt-0.5">4</span>
                    <span>Jika durasi batas waktu habis, seluruh jawaban yang sudah sempat terpilih akan <strong class="text-[#1d1d1f] font-semibold">otomatis dikumpulkan</strong> oleh sistem ke database.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-[#0066cc]/10 text-[#0066cc] text-xs font-semibold flex items-center justify-center mt-0.5">5</span>
                    <span>Kerjakan secara mandiri dan jujur. Hasil evaluasi formatif ini akan direkam sebagai bagian dari pemetaan penilaian akhir kompetensi bab.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-[#ff453a]/10 text-[#ff453a] text-xs font-semibold flex items-center justify-center mt-0.5">!</span>
                    <span class="text-[#ff453a] font-medium">Kuis evaluasi yang telah dikumpulkan secara final <strong class="text-[#ff453a] font-semibold">tidak dapat diulang kembali</strong>.</span>
                </li>
            </ul>
        </div>

        {{-- Checkbox Konfirmasi Kesiapan --}}
        <label class="flex items-start gap-3 mb-6 cursor-pointer select-none bg-[#fafafc] border border-[#e0e0e0] rounded-xl p-4 hover:border-[#0066cc]/50 transition-colors">
            <input type="checkbox" id="agreeRules" onchange="toggleStartButton()" class="mt-1 w-4 h-4 rounded border-[#e0e0e0] text-[#0066cc] focus:ring-[#0066cc]">
            <span class="text-sm text-[#333333] leading-relaxed">
                Saya sudah membaca, memahami seluruh aturan di atas, serta siap untuk memulai sesi evaluasi ini sekarang.
            </span>
        </label>

        {{-- Tombol Aksi Mulai Kuis --}}
        <button type="button" id="btnStartQuiz" onclick="startQuiz()" disabled 
                style="background: #e0e0e0 !important; color: #7a7a7a !important;" 
                class="w-full py-4 rounded-xl font-semibold text-base uppercase tracking-wider cursor-not-allowed transition-all flex items-center justify-center gap-2 border-none">
            Mulai Kuis
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </button>
    </div>

    {{-- =============================================== --}}
    {{-- KONTEN KUIS (TERSEMBUNYI SAMPAI TOMBOL DIKLIK)   --}}
    {{-- =============================================== --}}
    <div id="quizContent" class="hidden">
        <form id="quizForm" action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="flex flex-col md:flex-row gap-6 relative items-start">
            @csrf
            
            {{-- AREA UTAMA PANEL LEMBAR SOAL --}}
            <div class="w-full md:w-3/4 bg-white border border-[#e0e0e0] rounded-2xl p-6 md:p-10 min-h-[500px] flex flex-col relative">

                @foreach($quiz->questions as $index => $question)
                    <div id="question-card-{{ $index }}" class="question-card {{ $index === 0 ? 'block' : 'hidden' }} flex-1 animate-fade-in">

                        {{-- Batas Kategori Atas Soal --}}
                        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-[#e0e0e0]">
                            <div class="flex-none w-10 h-10 rounded-xl bg-[#0066cc]/5 border border-[#0066cc]/10 text-[#0066cc] font-semibold flex items-center justify-center text-base">
                                {{ $index + 1 }}
                            </div>
                            <h3 class="text-xs font-semibold text-[#7a7a7a] uppercase tracking-wider">Pertanyaan Pilihan Ganda</h3>
                        </div>

                        {{-- Isian Teks Soal --}}
                        <p class="text-lg font-semibold text-[#1d1d1f] leading-relaxed mb-6">
                            {{ $question->question_text }}
                        </p>

                        {{-- Lampiran Gambar Soal (Jika Ada) --}}
                        @if($question->image)
                            <div class="mb-8 text-center p-2 border border-[#e0e0e0] bg-[#fafafc] rounded-xl inline-block">
                                <img src="{{ asset('storage/' . $question->image) }}" alt="Gambar Soal {{ $index + 1 }}" class="max-w-full h-auto max-h-[300px] rounded-lg object-contain">
                            </div>
                        @endif

                        {{-- Loop Struktur Radio Jawaban (Modern Apple Style View) --}}
                        <div class="space-y-3">
                            @foreach(['a' => $question->option_a, 'b' => $question->option_b, 'c' => $question->option_c, 'd' => $question->option_d, 'e' => $question->option_e] as $val => $text)
                                @if(!empty($text))
                                    <label class="group flex items-start p-4 rounded-xl border border-[#e0e0e0] bg-white cursor-pointer transition-all hover:bg-[#fafafc] hover:border-[#0066cc] relative overflow-hidden">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $val }}" class="peer sr-only option-radio" data-qindex="{{ $index }}" required>
                                        
                                        <div class="flex-none w-5 h-5 rounded-full border border-[#7a7a7a] peer-checked:border-[#0066cc] peer-checked:bg-[#0066cc] mr-4 mt-0.5 transition-all relative">
                                            <div class="absolute inset-0 m-auto w-2 h-2 rounded-full bg-white transform scale-0 peer-checked:scale-100 transition-transform"></div>
                                        </div>
                                        
                                        <div class="flex-1 text-sm md:text-base">
                                            <span class="font-semibold text-[#7a7a7a] group-hover:text-[#0066cc] peer-checked:text-[#0066cc] mr-2 uppercase text-choice-prefix">{{ $val }}.</span>
                                            <span class="text-[#333333] font-medium text-choice-content">{{ $text }}</span>
                                        </div>
                                        <div class="absolute inset-0 border border-[#0066cc] rounded-xl opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity"></div>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

                {{-- Navigasi Langkah Soal (Prev / Next) --}}
                <div class="mt-10 pt-6 border-t border-[#e0e0e0] flex justify-between items-center mt-auto">
                    <button type="button" id="btnPrev" onclick="changeQuestion(-1)" class="px-6 py-2 rounded-full border border-[#e0e0e0] text-[#1d1d1f] font-medium hover:bg-[#f5f5f7] transition-colors flex items-center gap-2 text-sm invisible">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Sebelumnya
                    </button>

                    <button type="button" id="btnNext" onclick="changeQuestion(1)" class="px-6 py-2 bg-[#0066cc] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors flex items-center gap-2 text-sm border-none cursor-pointer">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    
                    <button type="button" id="btnSubmit" onclick="confirmSubmit()" class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-full transition-colors flex items-center gap-2 text-sm border-none cursor-pointer hidden">
                        Selesai dan Kumpulkan
                    </button>
                </div>
            </div>

            {{-- AREA SIDEBAR KANAN: NAVIGASI NOMOR CBT & TIMER PANEL --}}
            <div class="w-full md:w-1/4 md:sticky md:top-24 space-y-4">

                {{-- Panel Kotak Timer Sisa Waktu --}}
                <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-5 text-center">
                    <p class="text-xs font-semibold text-[#7a7a7a] uppercase tracking-wider mb-2">Sisa Waktu</p>
                    <div class="flex items-center justify-center gap-2 text-3xl font-semibold font-mono tracking-widest text-[#1d1d1f]" id="timerDisplay">
                        @if($quiz->time_limit > 0)
                            {{ sprintf('%02d', $quiz->time_limit) }} : 00
                        @else
                            ∞
                        @endif
                    </div>
                </div>

                {{-- Panel Grid Peta Nomor Soal --}}
                <div class="bg-[#fafafc] border border-[#e0e0e0] rounded-2xl p-5">
                    <p class="text-xs font-semibold text-[#7a7a7a] uppercase tracking-wider mb-4 text-center">Navigasi Soal</p>

                    <div class="grid grid-cols-5 gap-2 mb-6">
                        @foreach($quiz->questions as $index => $question)
                            <button type="button" onclick="jumpToQuestion({{ $index }})" id="nav-btn-{{ $index }}" class="nav-btn w-full aspect-square flex items-center justify-center rounded-lg text-sm font-semibold border border-[#e0e0e0] bg-white text-[#7a7a7a] hover:border-[#0066cc] hover:text-[#0066cc] transition-colors cursor-pointer">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>

                    {{-- Petunjuk Legend Indikator Status --}}
                    <div class="space-y-2 text-xs font-medium text-[#7a7a7a] border-t border-[#e0e0e0] pt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded border border-[#e0e0e0] bg-white"></div> Belum Dijawab
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded bg-emerald-500"></div> Sudah Dijawab
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded border-2 border-[#0066cc] bg-white"></div> Posisi Saat Ini
                        </div>
                    </div>
                </div>

                {{-- Tombol Kumpul Responsif Mobile --}}
                <button type="button" onclick="confirmSubmit()" class="w-full md:hidden py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-xl text-sm border-none cursor-pointer shadow-sm">
                    Kumpulkan Jawaban
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JAVASCRIPT CBT ENGINE CONTROL --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let currentQ = 0;
    const totalQ = {{ count($quiz->questions) }};
    let quizTimerInterval = null;

    function toggleStartButton() {
        const checkbox = document.getElementById('agreeRules');
        const btnStart = document.getElementById('btnStartQuiz');

        if (checkbox.checked) {
            btnStart.disabled = false;
            btnStart.style.removeProperty('background');
            btnStart.style.removeProperty('color');
            btnStart.className = "w-full py-4 rounded-xl font-semibold text-base uppercase tracking-wider transition-all flex items-center justify-center gap-2 bg-[#0066cc] hover:bg-[#0071e3] text-white cursor-pointer border-none";
        } else {
            btnStart.disabled = true;
            btnStart.style.setProperty('background', '#e0e0e0', 'important');
            btnStart.style.setProperty('color', '#7a7a7a', 'important');
            btnStart.className = "w-full py-4 rounded-xl font-semibold text-base uppercase tracking-wider transition-all flex items-center justify-center gap-2 cursor-not-allowed border-none";
        }
    }

    function startQuiz() {
        const checkbox = document.getElementById('agreeRules');
        if (!checkbox.checked) return;

        document.getElementById('rulesScreen').classList.add('hidden');
        document.getElementById('quizContent').classList.remove('hidden');

        window.scrollTo({ top: 0, behavior: 'smooth' });

        updateUI();
        startQuizTimer();
    }

    document.addEventListener('DOMContentLoaded', () => {
        const radios = document.querySelectorAll('.option-radio');
        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                const qIndex = this.getAttribute('data-qindex');
                const navBtn = document.getElementById(`nav-btn-${qIndex}`);
                navBtn.className = "nav-btn w-full aspect-square flex items-center justify-center rounded-lg text-sm font-semibold bg-emerald-500 text-white border border-emerald-600 cursor-pointer";
            });
        });
    });

    function changeQuestion(step) {
        let nextQ = currentQ + step;
        if (nextQ >= 0 && nextQ < totalQ) {
            jumpToQuestion(nextQ);
        }
    }

    function jumpToQuestion(index) {
        document.getElementById(`question-card-${currentQ}`).classList.add('hidden');
        document.getElementById(`question-card-${currentQ}`).classList.remove('block');

        currentQ = index;
        document.getElementById(`question-card-${currentQ}`).classList.remove('hidden');
        document.getElementById(`question-card-${currentQ}`).classList.add('block');

        updateUI();
    }

    function updateUI() {
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');
        const btnSubmit = document.getElementById('btnSubmit');
        
        if (currentQ === 0) {
            btnPrev.classList.add('invisible');
        } else {
            btnPrev.classList.remove('invisible');
        }
        
        if (currentQ === totalQ - 1) {
            btnNext.classList.add('hidden');
            btnSubmit.classList.remove('hidden');
        } else {
            btnNext.classList.remove('hidden');
            btnSubmit.classList.add('hidden');
        }
        
        document.querySelectorAll('.nav-btn').forEach((btn, idx) => {
            btn.classList.remove('ring-2', 'ring-[#0066cc]', 'ring-offset-2', 'ring-offset-white');
            if (idx === currentQ) {
                btn.classList.add('ring-2', 'ring-[#0066cc]', 'ring-offset-2', 'ring-offset-white');
            }
        });
    }

    function confirmSubmit() {
        let answered = 0;
        for(let i=0; i<totalQ; i++) {
            let card = document.getElementById(`question-card-${i}`);
            if(card && card.querySelector('.option-radio')) {
                let radioName = card.querySelector('.option-radio').name;
                if(document.querySelector(`input[name="${radioName}"]:checked`)) {
                    answered++;
                }
            }
        }

        let warningText = '';
        if (answered < totalQ) {
            warningText = `<br><br><span class="text-[#ff453a] font-semibold">Peringatan: Terdapat ${totalQ - answered} butir soal yang belum Anda jawab!</span>`;
        }
        
        Swal.fire({
            title: 'Kumpulkan Ujian?',
            html: `Pastikan seluruh berkas jawaban Anda telah diisi dengan benar. Sesi ujian yang telah dikirim tidak dapat diulang.${warningText}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#7a7a7a',
            confirmButtonText: 'Ya, Kumpulkan',
            cancelButtonText: 'Batal',
            background: '#ffffff',
            color: '#1d1d1f'
        }).then((result) => {
            if (result.isConfirmed) {
                if (quizTimerInterval) clearInterval(quizTimerInterval);
                document.getElementById('quizForm').submit();
            }
        });
    }

    @if($quiz->time_limit > 0)
        function startQuizTimer() {
            let timeRemaining = {{ $quiz->time_limit * 60 }};
            const timerDisplay = document.getElementById('timerDisplay');

            quizTimerInterval = setInterval(() => {
                timeRemaining--;

                let minutes = Math.floor(timeRemaining / 60);
                let seconds = timeRemaining % 60;

                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                timerDisplay.innerHTML = `${minutes} : ${seconds}`;
                
                if (timeRemaining <= 180 && timeRemaining > 0) {
                    timerDisplay.classList.add('text-[#ff453a]', 'animate-pulse');
                }
                
                if (timeRemaining <= 0) {
                    clearInterval(quizTimerInterval);
                    timerDisplay.innerHTML = "00 : 00";

                    Swal.fire({
                        title: 'Waktu Selesai!',
                        text: 'Batas durasi pengerjaan habis. Berkas jawaban Anda dikumpulkan otomatis oleh sistem.',
                        icon: 'info',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        background: '#ffffff',
                        color: '#1d1d1f',
                        timer: 3000
                    }).then(() => {
                        document.getElementById('quizForm').submit();
                    });
                }
            }, 1000);
        }
    @else
        function startQuizTimer() {}
    @endif
</script>

<style>
    .animate-fade-in { animation: fadeIn 0.3s ease-in-out forwards; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* 🛡️ Mengatasi bentrokan pemaksaan warna teks putih global pada layout pengerjaan */
    #rulesScreen p, #rulesScreen h2, #rulesScreen h3, #rulesScreen span, #rulesScreen li, #rulesScreen strong,
    #quizContent p, #quizContent h3, #quizContent span {
        color: inherit !important;
    }
    
    /* LOCAL SHIELD STYLE: Mengembalikan teks putih gaib menjadi gelap pekat khas Apple */
    .apple-quiz-player h1, .apple-quiz-player h2, .apple-quiz-player h3, .apple-quiz-player h4, 
    .apple-quiz-player p, .apple-quiz-player li, .apple-quiz-player span, .apple-quiz-player strong {
        color: #1d1d1f !important;
    }
    
    /* Warna penyesuaian khusus elemen sekunder / muted */
    .apple-quiz-player p, .apple-quiz-player .text-slate-400, .apple-quiz-player .text-[#7a7a7a] {
        color: #7a7a7a !important;
    }
    .apple-quiz-player .text-[#ff453a] {
        color: #ff453a !important;
    }

    /* 🟢 FIX MUTLAK: Memaksa teks angka navigasi soal (button) keluar dari aturan putih global */
    .apple-quiz-player .nav-btn {
        color: #7a7a7a !important; /* Angka abu-abu default saat belum dijawab */
        background-color: #ffffff !important;
    }

    /* Warna angka navigasi ketika menjadi nomor soal aktif saat ini */
    .apple-quiz-player .nav-btn.ring-2 {
        color: #0066cc !important; /* Angka berubah menjadi biru Apple */
    }

    /* Warna angka navigasi ketika nomor soal sudah selesai dijawab (Berwarna Hijau) */
    .apple-quiz-player .nav-btn.bg-emerald-500 {
        color: #ffffff !important; /* Dipaksa tetap putih bersih di atas latar hijau */
        background-color: #10b981 !important;
        border-color: #059669 !important;
    }

    /* Perbaikan Angka Badge Nomor Soal Aktif (Kiri Atas) */
    .question-card div.flex-none {
        color: #0066cc !important;
    }

    /* Proteksi teks tombol navigasi utama (Wajib tetap putih murni) */
    #btnNext, #btnSubmit {
        color: #ffffff !important;
    }
    #btnPrev {
        color: #1d1d1f !important;
    }

    /* KOREKSI TOTAL BARIS PILIHAN JAWABAN (Mencegah teks memutih saat peer-checked) */
    .text-choice-prefix {
        color: #7a7a7a !important;
    }
    .text-choice-content {
        color: #333333 !important;
    }

    /* Efek seleksi premium saat opsi jawaban di-klik siswa (Checked State) */
    #quizContent label:has(input:checked) {
        background-color: rgba(0, 102, 204, 0.05) !important;
        border-color: #0066cc !important;
    }
    #quizContent label:has(input:checked) .text-slate-500,
    #quizContent label:has(input:checked) .text-choice-prefix {
        color: #0066cc !important;
    }
    #quizContent label:has(input:checked) .text-slate-300,
    #quizContent label:has(input:checked) .text-choice-content {
        color: #1d1d1f !important;
        font-weight: 600 !important;
    }

    /* Mematikan hiasan bayangan kaku agar senada dengan flat minimalis Apple */
    .apple-quiz-player .shadow-xl, 
    .apple-quiz-player .shadow-md, 
    .apple-quiz-player .shadow-sm { 
        box-shadow: none !important; 
    }
</style>
@endsection