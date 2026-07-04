@extends('layouts.app_learning')
@section('header', 'Evaluasi Pembelajaran')
@section('content')
<div class="max-w-7xl mx-auto">

    <div class="mb-6 bg-eduPanel border border-borderLight rounded-2xl p-6 shadow-sm">
        <h1 class="text-2xl font-black text-eduPrimaryHover mb-2">
            {{ $quiz->title }}
        </h1>
        <p class="text-sm text-eduPrimary">
            {{ $quiz->description ?? 'Kerjakan soal dengan teliti. Waktu akan terus berjalan.' }}
        </p>
    </div>

    {{-- =============================================== --}}
    {{-- LAYAR ATURAN (TAMPIL SEBELUM KUIS DIMULAI) --}}
    {{-- =============================================== --}}
    <div id="rulesScreen" class="bg-slate-800 border border-slate-700 rounded-2xl shadow-xl p-6 md:p-10 animate-fade-in">
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-eduPrimary/20 border border-eduPrimary/50 flex items-center justify-center">
                <svg class="w-8 h-8 text-eduPrimary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-black text-white mb-2">{{ $quiz->title }}</h2>
            <p class="text-sm text-slate-400 max-w-xl mx-auto">
                Bacalah seluruh aturan pengerjaan di bawah ini dengan teliti sebelum memulai evaluasi.
            </p>
        </div>

        {{-- Info Ringkas --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
            <div class="bg-slate-900/60 border border-slate-700 rounded-xl p-4 text-center">
                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Jumlah Soal</p>
                <p class="text-xl font-black text-white">{{ count($quiz->questions) }}</p>
            </div>
            <div class="bg-slate-900/60 border border-slate-700 rounded-xl p-4 text-center">
                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Waktu</p>
                <p class="text-xl font-black text-white">
                    @if($quiz->time_limit > 0)
                        {{ $quiz->time_limit }} Menit
                    @else
                        Tanpa Batas
                    @endif
                </p>
            </div>
            <div class="bg-slate-900/60 border border-slate-700 rounded-xl p-4 text-center">
                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Tipe Soal</p>
                <p class="text-xl font-black text-white">Pilihan Ganda</p>
            </div>
            <div class="bg-slate-900/60 border border-slate-700 rounded-xl p-4 text-center">
                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Percobaan</p>
                <p class="text-xl font-black text-white">1x</p>
            </div>
        </div>

        {{-- Daftar Aturan --}}
        <div class="bg-slate-900/40 border border-slate-700 rounded-xl p-6 mb-8">
            <h3 class="text-sm font-bold text-slate-300 uppercase tracking-wider mb-4">Aturan Pengerjaan</h3>
            <ul class="space-y-3 text-sm text-slate-300">
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-eduPrimary/20 text-eduPrimary text-xs font-bold flex items-center justify-center mt-0.5">1</span>
                    <span>Waktu pengerjaan akan mulai berjalan segera setelah kamu menekan tombol <strong class="text-white">"Mulai Kuis"</strong> dan tidak dapat dijeda.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-eduPrimary/20 text-eduPrimary text-xs font-bold flex items-center justify-center mt-0.5">2</span>
                    <span>Pastikan koneksi internet stabil. Jangan menutup atau me-refresh halaman selama mengerjakan.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-eduPrimary/20 text-eduPrimary text-xs font-bold flex items-center justify-center mt-0.5">3</span>
                    <span>Kamu dapat berpindah antar soal secara bebas menggunakan tombol navigasi nomor di sebelah kanan.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-eduPrimary/20 text-eduPrimary text-xs font-bold flex items-center justify-center mt-0.5">4</span>
                    <span>Jika waktu habis, jawaban yang sudah dipilih akan <strong class="text-white">otomatis dikumpulkan</strong> secara sistem.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-eduPrimary/20 text-eduPrimary text-xs font-bold flex items-center justify-center mt-0.5">5</span>
                    <span>Kerjakan secara mandiri dan jujur. Hasil evaluasi ini akan menjadi bagian dari penilaian akhir bab.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="flex-none w-5 h-5 rounded-full bg-red-500/20 text-red-400 text-xs font-bold flex items-center justify-center mt-0.5">!</span>
                    <span class="text-red-300">Kuis yang sudah dikumpulkan <strong>tidak dapat diulang kembali</strong>.</span>
                </li>
            </ul>
        </div>

        {{-- Checkbox Konfirmasi --}}
        <label class="flex items-start gap-3 mb-6 cursor-pointer select-none bg-slate-900/40 border border-slate-700 rounded-xl p-4 hover:border-eduPrimary/50 transition-colors">
            <input type="checkbox" id="agreeRules" onchange="toggleStartButton()" class="mt-1 w-5 h-5 rounded border-slate-600 bg-slate-900 text-eduPrimary focus:ring-eduPrimary focus:ring-offset-slate-800">
            <span class="text-sm text-slate-300">
                Saya sudah membaca dan memahami seluruh aturan di atas, serta siap untuk memulai evaluasi ini sekarang.
            </span>
        </label>

        {{-- Tombol Mulai --}}
        <button type="button" id="btnStartQuiz" onclick="startQuiz()" disabled class="w-full py-4 rounded-xl bg-slate-700 text-slate-400 font-black text-base uppercase tracking-wider cursor-not-allowed transition-all flex items-center justify-center gap-2">
            Mulai Kuis
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>
    </div>

    {{-- =============================================== --}}
    {{-- KONTEN KUIS (TERSEMBUNYI SAMPAI SISWA MENEKAN MULAI) --}}
    {{-- =============================================== --}}
    <div id="quizContent" class="hidden">
        <form id="quizForm" action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="flex flex-col md:flex-row gap-6 relative items-start">
            @csrf
            {{-- AREA UTAMA: SOAL --}}
            <div class="w-full md:w-3/4 bg-slate-800 border border-slate-700 rounded-2xl shadow-xl p-6 md:p-10 min-h-[500px] flex flex-col relative">

                @foreach($quiz->questions as $index => $question)
                    <div id="question-card-{{ $index }}" class="question-card {{ $index === 0 ? 'block' : 'hidden' }} flex-1 animate-fade-in">

                        {{-- Header Soal --}}
                        <div class="flex items-center gap-4 mb-8 pb-4 border-b border-slate-700/50">
                            <div class="flex-none w-10 h-10 rounded-xl bg-eduPrimary/20 border border-eduPrimary/50 text-eduPrimary font-black flex items-center justify-center text-lg">
                                {{ $index + 1 }}
                            </div>
                            <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider">Pertanyaan Pilihan Ganda</h3>
                        </div>

                        {{-- Teks Soal --}}
                        <p class="text-lg font-medium text-white leading-relaxed mb-6">
                            {{ $question->question_text }}
                        </p>
                        {{-- Gambar Soal --}}
                        @if($question->image)
                            <div class="mb-8 text-center">
                                <img src="{{ asset('storage/' . $question->image) }}" alt="Gambar Soal {{ $index + 1 }}" class="max-w-full h-auto max-h-[300px] rounded-xl border border-slate-600 shadow-md inline-block">
                            </div>
                        @endif
                        {{-- Pilihan Jawaban --}}
                        <div class="space-y-3">
                            @foreach(['a' => $question->option_a, 'b' => $question->option_b, 'c' => $question->option_c, 'd' => $question->option_d, 'e' => $question->option_e] as $val => $text)
                                @if(!empty($text))
                                    <label class="group flex items-start p-4 rounded-xl border border-slate-700 bg-slate-900/50 cursor-pointer transition-all hover:bg-slate-750 hover:border-eduPrimary relative overflow-hidden">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $val }}" class="peer sr-only option-radio" data-qindex="{{ $index }}" required>
                                        <div class="flex-none w-5 h-5 rounded-full border-2 border-slate-500 peer-checked:border-eduPrimary peer-checked:bg-eduPrimary mr-4 mt-0.5 transition-all relative">
                                            <div class="absolute inset-0 m-auto w-2 h-2 rounded-full bg-white transform scale-0 peer-checked:scale-100 transition-transform"></div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="font-bold text-slate-500 group-hover:text-eduPrimary peer-checked:text-eduPrimary mr-2 uppercase">{{ $val }}.</span>
                                            <span class="text-slate-300 peer-checked:text-white font-medium">{{ $text }}</span>
                                        </div>
                                        <div class="absolute inset-0 border-2 border-eduPrimary rounded-xl opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity"></div>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
                {{-- Navigasi Bawah (Prev / Next) --}}
                <div class="mt-10 pt-6 border-t border-slate-700 flex justify-between items-center mt-auto">
                    <button type="button" id="btnPrev" onclick="changeQuestion(-1)" class="px-6 py-2.5 rounded-lg border border-slate-600 text-slate-300 font-semibold hover:bg-slate-700 hover:text-white transition-colors flex items-center gap-2 invisible">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Sebelumnya
                    </button>

                    <button type="button" id="btnNext" onclick="changeQuestion(1)" class="px-6 py-2.5 rounded-lg bg-eduPrimary text-white font-bold shadow-md hover:bg-blue-700 transition-colors flex items-center gap-2">
                        Selanjutnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    <button type="button" id="btnSubmit" onclick="confirmSubmit()" class="px-6 py-2.5 rounded-lg bg-emerald-600 text-white font-bold shadow-md hover:bg-emerald-700 transition-colors flex items-center gap-2 hidden">
                        Selesai & Kumpulkan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                </div>
            </div>
            {{-- AREA SIDEBAR: NAVIGASI CBT & TIMER --}}
            <div class="w-full md:w-1/4 md:sticky md:top-24 space-y-4">

                {{-- Timer --}}
                <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-lg p-5 text-center">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Sisa Waktu</p>
                    <div class="flex items-center justify-center gap-2 text-3xl font-black font-mono tracking-widest text-white" id="timerDisplay">
                        @if($quiz->time_limit > 0)
                            {{ sprintf('%02d', $quiz->time_limit) }} : 00
                        @else
                            ∞
                        @endif
                    </div>
                </div>
                {{-- Grid Nomor Soal --}}
                <div class="bg-slate-800 border border-slate-700 rounded-2xl shadow-lg p-5">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 text-center">Navigasi Soal</p>

                    <div class="grid grid-cols-5 gap-2 mb-6">
                        @foreach($quiz->questions as $index => $question)
                            <button type="button" onclick="jumpToQuestion({{ $index }})" id="nav-btn-{{ $index }}" class="nav-btn w-full aspect-square flex items-center justify-center rounded-lg text-sm font-bold border border-slate-600 bg-slate-900 text-slate-400 hover:border-eduPrimary hover:text-eduPrimary transition-colors">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                    {{-- Legend --}}
                    <div class="space-y-2 text-xs font-medium text-slate-400 border-t border-slate-700 pt-4">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded border border-slate-600 bg-slate-900"></div> Belum Dijawab
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded bg-emerald-500"></div> Sudah Dijawab
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded border-2 border-eduPrimary bg-slate-800"></div> Posisi Saat Ini
                        </div>
                    </div>
                </div>

                {{-- Tombol Kumpul Darurat (Mobile) --}}
                <button type="button" onclick="confirmSubmit()" class="w-full md:hidden py-3 bg-emerald-600 text-white font-bold rounded-xl shadow-md">
                    Kumpulkan Jawaban
                </button>
            </div>
        </form>
    </div>
</div>
{{-- SCRIPT CBT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let currentQ = 0;
    const totalQ = {{ count($quiz->questions) }};
    let quizTimerInterval = null;

    // Aktifkan/nonaktifkan tombol "Mulai Kuis" berdasarkan checkbox
    function toggleStartButton() {
        const checkbox = document.getElementById('agreeRules');
        const btnStart = document.getElementById('btnStartQuiz');

        if (checkbox.checked) {
            btnStart.disabled = false;
            btnStart.classList.remove('bg-slate-700', 'text-slate-400', 'cursor-not-allowed');
            btnStart.classList.add('bg-eduPrimary', 'text-white', 'hover:bg-blue-700', 'cursor-pointer', 'shadow-lg');
        } else {
            btnStart.disabled = true;
            btnStart.classList.add('bg-slate-700', 'text-slate-400', 'cursor-not-allowed');
            btnStart.classList.remove('bg-eduPrimary', 'text-white', 'hover:bg-blue-700', 'cursor-pointer', 'shadow-lg');
        }
    }

    // Mulai kuis: sembunyikan layar aturan, tampilkan soal, mulai timer
    function startQuiz() {
        const checkbox = document.getElementById('agreeRules');
        if (!checkbox.checked) return;

        document.getElementById('rulesScreen').classList.add('hidden');
        document.getElementById('quizContent').classList.remove('hidden');

        window.scrollTo({ top: 0, behavior: 'smooth' });

        updateUI();
        startQuizTimer();
    }

    // Inisialisasi listener radio (boleh dipasang dari awal, tidak masalah walau kuis belum tampil)
    document.addEventListener('DOMContentLoaded', () => {
        const radios = document.querySelectorAll('.option-radio');
        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                const qIndex = this.getAttribute('data-qindex');
                const navBtn = document.getElementById(`nav-btn-${qIndex}`);
                navBtn.classList.remove('bg-slate-900', 'text-slate-400', 'border-slate-600');
                navBtn.classList.add('bg-emerald-500', 'text-white', 'border-emerald-600');
            });
        });
    });

    // Pindah Soal Prev/Next
    function changeQuestion(step) {
        let nextQ = currentQ + step;
        if (nextQ >= 0 && nextQ < totalQ) {
            jumpToQuestion(nextQ);
        }
    }

    // Lompat ke soal spesifik dari Grid
    function jumpToQuestion(index) {
        document.getElementById(`question-card-${currentQ}`).classList.add('hidden');
        document.getElementById(`question-card-${currentQ}`).classList.remove('block');

        currentQ = index;
        document.getElementById(`question-card-${currentQ}`).classList.remove('hidden');
        document.getElementById(`question-card-${currentQ}`).classList.add('block');

        updateUI();
    }

    // Perbarui Tombol Prev/Next & Border Aktif di Grid
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
            if (idx === currentQ) {
                btn.classList.add('ring-2', 'ring-eduPrimary', 'ring-offset-2', 'ring-offset-slate-800');
            } else {
                btn.classList.remove('ring-2', 'ring-eduPrimary', 'ring-offset-2', 'ring-offset-slate-800');
            }
        });
    }

    // Konfirmasi Submit
    function confirmSubmit() {
        let answered = 0;
        for(let i=0; i<totalQ; i++) {
            if(document.querySelector(`input[name="answers[${document.getElementById(`question-card-${i}`).querySelector('.option-radio').name.match(/\d+/)[0]}]"]:checked`)) {
                answered++;
            }
        }

        let warningText = '';
        if (answered < totalQ) {
            warningText = `<br><br><span class="text-red-400 font-bold">Peringatan: Ada ${totalQ - answered} soal yang BELUM dijawab!</span>`;
        }
        Swal.fire({
            title: 'Kumpulkan Ujian?',
            html: `Pastikan semua jawaban sudah benar. Ujian yang dikumpulkan tidak dapat diulang.${warningText}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#475569',
            confirmButtonText: 'Ya, Kumpulkan',
            cancelButtonText: 'Batal',
            background: '#1e293b',
            color: '#f8fafc'
        }).then((result) => {
            if (result.isConfirmed) {
                if (quizTimerInterval) clearInterval(quizTimerInterval);
                document.getElementById('quizForm').submit();
            }
        });
    }

    // --- TIMER SYSTEM (baru mulai setelah startQuiz() dipanggil) ---
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
                    timerDisplay.classList.remove('text-white');
                    timerDisplay.classList.add('text-red-500', 'animate-pulse');
                }
                if (timeRemaining <= 0) {
                    clearInterval(quizTimerInterval);
                    timerDisplay.innerHTML = "00 : 00";

                    Swal.fire({
                        title: 'Waktu Habis!',
                        text: 'Jawaban Anda akan dikumpulkan secara otomatis.',
                        icon: 'info',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        background: '#1e293b',
                        color: '#f8fafc',
                        timer: 3000
                    }).then(() => {
                        document.getElementById('quizForm').submit();
                    });
                }
            }, 1000);
        }
    @else
        function startQuizTimer() {
            // Tidak ada batas waktu, tidak perlu interval
        }
    @endif
</script>
<style>
    .animate-fade-in { animation: fadeIn 0.3s ease-in-out forwards; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection