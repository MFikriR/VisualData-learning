@extends('layouts.app_learning')

@section('header', $material->chapter->title)

@section('content')
    {{-- 1. NOTIFIKASI BERHASIL --}}
    @if (session('success'))
        <div class="mb-6 p-4 rounded-xl bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 flex items-center gap-3 animate-bounce-short">
            <div class="p-2 bg-blue-100 dark:bg-blue-800 rounded-full text-blue-600 dark:text-blue-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-blue-800 dark:text-blue-200">Progres Tersimpan!</h4>
                <p class="text-sm text-blue-700 dark:text-blue-300">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- 2. KONTEN UTAMA --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-8 shadow-sm min-h-[60vh] relative transition-colors duration-300">
        
        {{-- Header Judul --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                {{ $material->title }}
            </h1>
        </div>

        {{-- Badge Tipe Materi --}}
        <div class="mb-8">
            @if($material->type == 'simulation_3d')
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-300 border border-indigo-100 dark:border-indigo-700">
                    🧊 Simulasi 3D Interaktif
                </span>
            @elseif($material->type == 'simulation_jenis_data' || $material->type == 'simulation_labeling')
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-300 border border-purple-100 dark:border-purple-700">
                    💻 Simulator Interaktif
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 border border-gray-200 dark:border-gray-600">
                    📄 Materi Bacaan
                </span>
            @endif
        </div>

        <div class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg">
            
            {{-- A. AREA SIMULASI (3D & 2D) --}}
            @if($material->type == 'simulation_3d')
                <div id="three-canvas-container" 
                    class="w-full h-[500px] rounded-xl overflow-hidden shadow-2xl border border-gray-700 relative bg-[#050505] mb-12"
                    data-sim-type="{{ $material->slug }}">
                    
                    <div id="loading-indicator" class="absolute inset-0 flex items-center justify-center pointer-events-none z-10">
                        <span class="text-indigo-400 font-mono text-sm animate-pulse">Memuat Laboratorium 3D...</span>
                    </div>
                </div>

                @if($material->slug == 'simulasi-3d-diagram-batang')
                    @include('learning.simulations.bar_chart')
                @elseif($material->slug == 'simulasi-3d-histogram')
                    @include('learning.simulations.histogram')
                @elseif($material->slug == 'simulasi-3d-boxplot')
                    @include('learning.simulations.box_plot')
                @elseif($material->slug == 'simulasi-3d-scatterplot-correlation')
                    @include('learning.simulations.scatter_correlation')
                @elseif($material->slug == 'simulasi-3d-konsep-clustering')
                    @include('learning.simulations.clustering_concept')
                @elseif($material->slug == 'simulasi-3d-jarak-clustering')
                    @include('learning.simulations.clustering') 
                @elseif($material->slug == 'simulasi-3d-jarak-euclidean')
                    @include('learning.simulations.distance_euclidean')
                @elseif($material->slug == 'simulasi-3d-kmeans')
                    @include('learning.simulations.clustering_kmeans')
                @endif
            
            @elseif($material->type == 'simulation_jenis_data')
                @include('learning.simulations.jenis_data')
            @elseif($material->type == 'simulation_labeling')
                @include('learning.simulations.labeling')
            @endif

            {{-- B. KONTEN TEKS PENJELASAN --}}
            <div id="material-content-area" class="mt-8 prose dark:prose-invert max-w-none text-gray-800 dark:text-gray-200">
                {!! $material->content !!}
            </div>

        </div>

        {{-- 3. NAVIGASI BAWAH --}}
        <div id="bottom-navigation" class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4 hidden opacity-0 transition-opacity duration-1000">
            @if($prevMaterial)
                <a href="{{ route('learning.show', $prevMaterial->slug) }}" class="w-full md:w-auto px-6 py-3 rounded-xl border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    {{ $prevMaterial->title }}
                </a>
            @else
                <div class="hidden md:block"></div> 
            @endif

            @if($nextMaterial)
                <form action="{{ route('learning.complete', $material->slug) }}" method="POST" class="w-full md:w-auto">
                    @csrf
                    <button type="submit" class="w-full md:w-auto px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-500/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2 group">
                        @if($isCompleted) <span>Lanjut Materi Berikutnya</span> @else <span>Tandai Selesai & Lanjut</span> @endif
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </form>
            @else
                @php
                    // Pastikan yang dipanggil BUKAN pre_test/post_test
                    $targetQuiz = \App\Models\Quiz::where('chapter_id', $material->chapter_id)
                                    ->whereNotIn('type', ['pre_test', 'post_test'])
                                    ->first();
                @endphp
                <div class="w-full md:w-auto">
                    @if($targetQuiz)
                        <form action="{{ route('learning.complete', $material->slug) }}" method="POST" class="w-full md:w-auto">
                            @csrf
                            <input type="hidden" name="redirect_to_quiz" value="{{ $targetQuiz->id }}">
                            <button type="submit" class="w-full md:w-auto px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-500/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2 animate-pulse">
                                @if($isCompleted) 
                                    <span>Lanjut ke Evaluasi Akhir</span> 
                                @else 
                                    <span>Selesai & Lanjut Evaluasi</span> 
                                @endif
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('learning.complete', $material->slug) }}" method="POST" class="w-full md:w-auto">
                            @csrf
                            <button type="submit" class="w-full md:w-auto px-8 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold shadow-lg shadow-green-500/30 hover:-translate-y-1 transition-all">
                                @if($material->chapter->sequence == 0)
                                    Mulai belajar
                                @else
                                    Selesaikan Bab Ini
                                @endif
                            </button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
    
    {{-- CSS Global --}}
    <style>
        @keyframes bounce-short { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
        .animate-bounce-short { animation: bounce-short 0.5s ease-in-out 1; }
        .animate-fade-in { animation: fadeIn 0.5s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        
        .material-section {
            transition: all 0.5s ease;
            position: relative;
        }
        .material-section.locked {
            filter: blur(5px) grayscale(80%);
            opacity: 0.4;
            pointer-events: none;
            user-select: none;
            max-height: 180px;
            overflow: hidden;
            border-radius: 12px;
        }
        .material-section.locked::after {
            content: "🔒 Lanjutkan membaca di atas untuk membuka bagian ini";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            text-align: center;
            transform: translate(-50%, -50%);
            font-size: 16px;
            font-weight: bold;
            color: #3b82f6;
            text-shadow: 0 2px 4px rgba(0,0,0,0.8);
            filter: blur(0); 
            z-index: 10;
        }
    </style>

    @include('learning.partials.floating_tools')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    {{-- 🔥 SCRIPT STEPPER + MINI QUIZ 🔥 --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            const contentArea = document.getElementById('material-content-area');
            const navBottom = document.getElementById('bottom-navigation');
            const isAlreadyCompleted = {{ $isCompleted ? 'true' : 'false' }};
            
            if (contentArea && !isAlreadyCompleted) {
                let mainWrapper = contentArea.firstElementChild;
                
                if (!mainWrapper || mainWrapper.tagName.toLowerCase() !== 'div') {
                    mainWrapper = contentArea;
                }

                // Jangan ikutkan kotak kuis lama (mini-quiz-container) dan array multi-kuis baru (mini-quiz-item)
                const sections = Array.from(mainWrapper.children).filter(child => 
                    child.tagName.toLowerCase() === 'div' && 
                    !child.classList.contains('mini-quiz-container') &&
                    child.id !== 'mini-quiz-data'
                );

                if (sections.length > 1) {
                    sections.forEach((wrapper, index) => {
                        wrapper.classList.add('material-section', 'pb-4');
                        if (index > 0) {
                            wrapper.classList.add('locked');
                        } else {
                            addUnlockButton(wrapper, index, sections);
                        }
                    });

                    function addUnlockButton(wrapper, currentIndex, allSections) {
                        if (currentIndex < allSections.length - 1) {
                            const btnContainer = document.createElement('div');
                            btnContainer.className = 'mt-8 text-center animate-fade-in relative z-50'; 
                            
                            const btn = document.createElement('button');
                            btn.innerHTML = 'Saya Paham, Lanjut Baca 👇';
                            btn.className = 'px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full shadow-lg shadow-blue-500/30 transition-all transform hover:scale-105';
                            
                            btn.onclick = function() {
                                btnContainer.style.display = 'none'; 
                                const nextWrapper = allSections[currentIndex + 1];
                                nextWrapper.classList.remove('locked');
                                nextWrapper.classList.add('animate-fade-in');
                                
                                setTimeout(() => { nextWrapper.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 100);
                                addUnlockButton(nextWrapper, currentIndex + 1, allSections);
                            };

                            btnContainer.appendChild(btn);
                            wrapper.appendChild(btnContainer);
                        } else {
                            // Cek Kuis Multi-Soal di Akhir
                            const quizItems = document.querySelectorAll('.mini-quiz-item');
                            const btnContainer = document.createElement('div');
                            btnContainer.className = 'mt-8 text-center animate-fade-in relative z-50';
                            
                            const finalBtn = document.createElement('button');
                            
                            if (quizItems.length > 0) {
                                finalBtn.innerHTML = 'Uji Pemahamanmu 🧠';
                                finalBtn.className = 'px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg shadow-blue-500/20 transition-all transform hover:scale-105';
                                finalBtn.onclick = function() {
                                    btnContainer.style.display = 'none';
                                    renderMultiQuiz(quizItems);
                                };
                            } else {
                                finalBtn.innerHTML = 'Saya Sudah Paham ✅';
                                finalBtn.className = 'px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-full shadow-lg shadow-emerald-500/20 transition-all transform hover:scale-105';
                                finalBtn.onclick = function() {
                                    btnContainer.style.display = 'none';
                                    showBottomNav();
                                };
                            }
                            
                            btnContainer.appendChild(finalBtn);
                            wrapper.appendChild(btnContainer);
                        }
                    }

                } else {
                    navBottom.classList.remove('hidden', 'opacity-0');
                }

            } else if (contentArea && isAlreadyCompleted) {
                navBottom.classList.remove('hidden', 'opacity-0');
            }

            // ==============================================================
            // 🔥 ENGINE MULTI-QUIZ CBT MODE (Navigasi & Simpan State) 🔥
            // ==============================================================
            function renderMultiQuiz(items) {
                let currentIdx = 0;
                const totalQuestions = items.length;
                let userAnswers = new Array(totalQuestions).fill(null); // Menyimpan jawaban sementara siswa

                // Ambil semua data soal dari HTML tersembunyi
                const questions = Array.from(items).map(item => ({
                    q: item.getAttribute('data-question'),
                    a: item.getAttribute('data-opt-a'),
                    b: item.getAttribute('data-opt-b'),
                    c: item.getAttribute('data-opt-c'),
                    d: item.getAttribute('data-opt-d'),
                    e: item.getAttribute('data-opt-e'), 
                    ans: item.getAttribute('data-answer').toUpperCase()
                }));

                // Buat Kotak Kuis Utama
                const quizBox = document.createElement('div');
                quizBox.className = 'mt-10 bg-slate-800 border-2 border-blue-500/30 rounded-3xl shadow-2xl animate-fade-in relative overflow-hidden text-gray-800 dark:text-gray-200 flex flex-col';
                contentArea.appendChild(quizBox);
                quizBox.scrollIntoView({ behavior: 'smooth', block: 'center' });

                // Bikin Kerangka UI Utama
                quizBox.innerHTML = `
                    <div class="bg-slate-900/80 p-4 border-b border-slate-700">
                        <div class="text-sm text-slate-400 mb-3 flex justify-between items-center">
                            <span class="font-bold tracking-wide">NAVIGASI SOAL</span>
                            <span class="font-black text-white bg-blue-600/20 text-blue-400 px-3 py-1 rounded border border-blue-500/50 shadow-inner" id="quiz-counter"></span>
                        </div>
                        <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar" id="quiz-nav-container">
                            </div>
                    </div>
                    <div class="p-6 md:p-8 flex-1" id="quiz-body">
                        </div>
                    <div class="bg-slate-900/50 p-4 md:px-8 border-t border-slate-700 flex justify-between items-center">
                        <button id="btn-prev-quiz" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white font-bold rounded-lg transition-all flex items-center gap-2 disabled:opacity-30 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Kembali
                        </button>
                        <button id="btn-next-quiz" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg transition-all flex items-center gap-2">
                            <span id="btn-next-text">Selanjutnya</span>
                            <svg class="w-5 h-5" id="btn-next-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                `;

                const navContainer = quizBox.querySelector('#quiz-nav-container');
                const quizBody = quizBox.querySelector('#quiz-body');
                const btnPrev = quizBox.querySelector('#btn-prev-quiz');
                const btnNext = quizBox.querySelector('#btn-next-quiz');
                const btnNextText = quizBox.querySelector('#btn-next-text');
                const btnNextIcon = quizBox.querySelector('#btn-next-icon');
                const counterText = quizBox.querySelector('#quiz-counter');

                // Generate Tombol Nomor Navigasi
                for(let i = 0; i < totalQuestions; i++) {
                    let navBtn = document.createElement('button');
                    navBtn.className = 'flex-shrink-0 w-10 h-10 rounded-lg font-bold transition-all border-2 flex items-center justify-center nav-number-btn';
                    navBtn.innerText = i + 1;
                    navBtn.onclick = () => { currentIdx = i; loadQuestion(currentIdx); };
                    navContainer.appendChild(navBtn);
                }

                function updateNavUI() {
                    const navBtns = navContainer.querySelectorAll('.nav-number-btn');
                    navBtns.forEach((btn, idx) => {
                        // Reset kelas dasar
                        btn.className = 'flex-shrink-0 w-10 h-10 rounded-lg font-bold transition-all border-2 flex items-center justify-center nav-number-btn';
                        
                        // Mewarnai tombol jika sudah dijawab
                        if (userAnswers[idx] !== null) {
                            btn.classList.add('bg-blue-600', 'text-white', 'border-blue-500');
                        } else {
                            btn.classList.add('bg-slate-800', 'text-slate-400', 'border-slate-600', 'hover:bg-slate-700');
                        }

                        // Beri ring/highlight pada nomor yang sedang aktif
                        if (idx === currentIdx) {
                            btn.classList.add('ring-2', 'ring-white', 'ring-offset-2', 'ring-offset-slate-900', 'transform', 'scale-110');
                        }
                    });
                }

                function loadQuestion(index) {
                    const data = questions[index];
                    let selectedChoice = userAnswers[index]; 
                    
                    counterText.innerText = `Soal ${index + 1} / ${totalQuestions}`;
                    updateNavUI();

                    // Atur ketersediaan tombol Prev & Next
                    btnPrev.disabled = index === 0;
                    
                    if (index === totalQuestions - 1) {
                        btnNextText.innerText = "Kumpulkan Ujian 📝";
                        btnNextIcon.classList.add('hidden');
                        btnNext.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                        btnNext.classList.add('bg-emerald-600', 'hover:bg-emerald-700', 'animate-pulse');
                    } else {
                        btnNextText.innerText = "Selanjutnya";
                        btnNextIcon.classList.remove('hidden');
                        btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
                        btnNext.classList.remove('bg-emerald-600', 'hover:bg-emerald-700', 'animate-pulse');
                    }

                    // Helper render opsi jawaban
                    let buildOption = (choice, text) => {
                        if (!text) return '';
                        let isSelected = selectedChoice === choice;
                        let bgClass = isSelected ? 'border-blue-500 bg-blue-500/20 shadow-[0_0_15px_rgba(59,130,246,0.3)]' : 'border-slate-600 bg-slate-900 hover:border-blue-400 hover:bg-blue-500/10';
                        return `<button class="quiz-opt-btn w-full text-left px-5 py-4 rounded-xl border-2 ${bgClass} text-slate-300 transition-all font-medium flex items-start gap-3" data-choice="${choice}">
                            <span class="font-black text-blue-400 mt-0.5 flex-shrink-0 w-6">${choice.toLowerCase()}.</span> <span>${text}</span>
                        </button>`;
                    };

                    let optionsHtml = buildOption('A', data.a) + buildOption('B', data.b);
                    if (data.c) optionsHtml += buildOption('C', data.c);
                    if (data.d) optionsHtml += buildOption('D', data.d);
                    if (data.e) optionsHtml += buildOption('E', data.e);

                    quizBody.innerHTML = `
                        <h4 class="text-xl font-bold text-white mb-8 leading-relaxed">${data.q}</h4>
                        <div class="space-y-3" id="quiz-options">
                            ${optionsHtml}
                        </div>
                    `;

                    const btns = quizBody.querySelectorAll('.quiz-opt-btn');
                    btns.forEach(btn => {
                        btn.onclick = function() {
                            // Reset tampilan semua opsi
                            btns.forEach(b => {
                                b.classList.remove('border-blue-500', 'bg-blue-500/20', 'shadow-[0_0_15px_rgba(59,130,246,0.3)]');
                                b.classList.add('border-slate-600', 'bg-slate-900');
                            });
                            
                            // Sorot opsi yang dipilih
                            this.classList.remove('border-slate-600', 'bg-slate-900');
                            this.classList.add('border-blue-500', 'bg-blue-500/20', 'shadow-[0_0_15px_rgba(59,130,246,0.3)]');
                            
                            // Simpan jawaban & perbarui navigasi atas
                            userAnswers[index] = this.getAttribute('data-choice');
                            updateNavUI();
                        }
                    });
                }

                // Aksi Tombol Prev & Next
                btnPrev.onclick = () => { if (currentIdx > 0) { currentIdx--; loadQuestion(currentIdx); } };
                
                btnNext.onclick = function() {
                    if (currentIdx < totalQuestions - 1) {
                        currentIdx++;
                        loadQuestion(currentIdx);
                    } else {
                        // Cek apakah ada soal yang belum dijawab
                        let unanswered = [];
                        userAnswers.forEach((ans, i) => { if(ans === null) unanswered.push(i + 1); });
                        
                        if (unanswered.length > 0) {
                            Swal.fire({
                                title: 'Belum Selesai!',
                                text: 'Kamu belum menjawab soal nomor: ' + unanswered.join(', '),
                                icon: 'warning',
                                confirmButtonText: 'Lanjutkan Mengerjakan',
                                confirmButtonColor: '#3b82f6',
                                background: '#1e293b',
                                color: '#fff'
                            });
                            return; // Stop eksekusi agar tidak disubmit
                        }
                        
                        evaluateQuiz(); // Panggil fungsi penilaian
                    }
                };

                // 🔥 FUNGSI PENILAIAN DI AKHIR KUIS 🔥
                function evaluateQuiz() {
                    let correctCount = 0;
                    for (let i = 0; i < totalQuestions; i++) {
                        if (userAnswers[i] === questions[i].ans) correctCount++;
                    }
                    
                    let finalScore = Math.round((correctCount / totalQuestions) * 100);
                    let isPassed = finalScore >= 80;

                    if (isPassed) {
                        quizBox.innerHTML = `
                            <div class="text-center py-12 px-6 animate-fade-in">
                                <div class="text-7xl mb-6 drop-shadow-lg animate-bounce-short">🎉</div>
                                <h4 class="text-3xl font-black text-emerald-400 mb-3">Lulus! Pemahamanmu Hebat!</h4>
                                <p class="text-slate-300 mb-8 font-medium text-lg">Kamu menjawab ${correctCount} dari ${totalQuestions} soal dengan benar.</p>
                                
                                <div class="inline-block px-10 py-5 bg-emerald-900/30 border-2 border-emerald-500/50 rounded-2xl text-emerald-400 font-mono font-black text-4xl mb-4 shadow-[0_0_30px_rgba(16,185,129,0.3)]">
                                    Skor: ${finalScore}
                                </div>
                            </div>
                        `;
                        
                        let forms = document.querySelectorAll('#bottom-navigation form');
                        forms.forEach(f => {
                            let oldInput = f.querySelector('input[name="mini_quiz_score"]');
                            if(oldInput) oldInput.remove();
                            let scoreInput = document.createElement('input');
                            scoreInput.type = 'hidden';
                            scoreInput.name = 'mini_quiz_score';
                            scoreInput.value = finalScore;
                            f.appendChild(scoreInput);
                        });

                        showBottomNav(); 
                    } else {
                        quizBox.innerHTML = `
                            <div class="text-center py-10 px-6 animate-fade-in">
                                <div class="text-7xl mb-4 drop-shadow-lg">⚠️</div>
                                <h4 class="text-3xl font-black text-red-400 mb-2">Belum Memenuhi KKM</h4>
                                <p class="text-slate-300 mb-6 font-medium">Kamu hanya menjawab ${correctCount} soal dengan benar. Butuh minimal skor 80 untuk lulus.</p>
                                
                                <div class="inline-block px-8 py-4 bg-red-900/30 border border-red-500/50 rounded-2xl text-red-400 font-mono font-black text-2xl mb-8 shadow-[0_0_20px_rgba(239,68,68,0.2)]">
                                    Skor: ${finalScore}
                                </div>
                                
                                <div class="p-4 bg-orange-900/20 border border-orange-500/50 rounded-xl mb-6 text-sm text-orange-200">
                                    🚨 <strong>Sistem Terkunci.</strong> Kamu harus membaca ulang materi dari awal agar dapat mengikuti kuis ini kembali.
                                </div>

                                <button onclick="window.scrollTo(0,0); setTimeout(()=>window.location.reload(), 500);" class="px-8 py-3 bg-orange-600 hover:bg-orange-700 text-white font-bold rounded-xl shadow-lg transition-all hover:-translate-y-1 inline-flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    Ulangi Baca Materi
                                </button>
                            </div>
                        `;
                    }
                }

                // Inisialisasi awal
                loadQuestion(currentIdx);
            }

            function showBottomNav() {
                navBottom.classList.remove('hidden');
                setTimeout(() => {
                    navBottom.classList.remove('opacity-0');
                    navBottom.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 50);
            }
        });
    </script>

    {{-- LOAD LIBRARY THREE.JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

@endsection