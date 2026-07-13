@extends('layouts.app_learning')

@section('header', $material->chapter->title)

@section('content')
    {{-- 1. NOTIFIKASI BERHASIL (Apple Light Success Banner Style - Memperbaiki Teks Gaib) --}}
    @if (session('success'))
        <div class="mb-6 p-4 rounded-xl flex items-center gap-3 animate-fade-in" style="background-color: rgba(52, 199, 89, 0.08) !important; border: 1px solid rgba(52, 199, 89, 0.2) !important;">
            {{-- Lingkaran Indikator Menggunakan Warna Hijau iOS Resmi (#34c759) --}}
            <div class="p-2 rounded-full flex-shrink-0" style="background-color: rgba(52, 199, 89, 0.12) !important;">
                <svg class="w-5 h-5" style="color: #34c759 !important;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="text-left">
                <h4 class="text-sm font-semibold" style="color: #1d1d1f !important; margin: 0 !important; line-height: 1.2 !important;">Progres Diperbarui</h4>
                <p class="text-xs mt-0.5" style="color: #333333 !important; margin: 0 !important; line-height: 1.4 !important;">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    {{-- 2. KONTEN UTAMA (Apple Surface Tile 1 Canvas) --}}
    <div class="bg-[#272729] rounded-2xl border border-white/10 p-8 min-h-[60vh] relative transition-colors duration-300 apple-material-viewport">
        
        {{-- Header Judul --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 border-b border-white/10 pb-4">
            <h1 class="text-3xl md:text-4xl font-semibold text-white leading-tight tracking-tight">
                {{ $material->title }}
            </h1>
        </div>

        {{-- Badge Tipe Materi --}}
        <div class="mb-8">
            @if($material->type == 'simulation_3d')
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium bg-[#2997ff]/10 text-[#2997ff] border border-[#2997ff]/20">
                    Simulasi 3D Interaktif
                </span>
            @elseif($material->type == 'simulation_jenis_data' || $material->type == 'simulation_labeling')
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium bg-[#2997ff]/10 text-[#2997ff] border border-[#2997ff]/20">
                    Simulator Interaktif
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-medium bg-white/5 text-[#cccccc] border border-white/10">
                    Materi Bacaan
                </span>
            @endif
        </div>

        <div class="text-[#cccccc] leading-relaxed text-lg">
            
            {{-- A. AREA SIMULASI (3D & 2D) --}}
            @if($material->type == 'simulation_3d')
                <div id="three-canvas-container" 
                    class="w-full h-[500px] rounded-xl overflow-hidden border border-white/10 relative bg-[#1c1c1e] mb-12"
                    data-sim-type="{{ $material->slug }}">
                    
                    <div id="loading-indicator" class="absolute inset-0 flex items-center justify-center pointer-events-none z-10">
                        <span class="text-[#2997ff] font-mono font-medium text-sm bg-[#272729] px-4 py-2 rounded-lg border border-white/10">Memuat Laboratorium 3D...</span>
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
            <div id="material-content-area" class="mt-8 max-w-none text-[#cccccc]">
                {!! $material->content !!}
            </div>

        </div>

        {{-- 3. NAVIGASI BAWAH (Pill Shape Minimalis Tanpa Shadow) --}}
        <div id="bottom-navigation" class="mt-16 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 hidden opacity-0 transition-opacity duration-1000">
            @if($prevMaterial)
                <a href="{{ route('learning.show', $prevMaterial->slug) }}" class="w-full md:w-auto px-6 py-2.5 rounded-full border border-white/20 bg-transparent text-[#2997ff] font-medium hover:bg-white/5 transition-colors flex items-center justify-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    {{ $prevMaterial->title }}
                </a>
            @else
                <div class="hidden md:block"></div> 
            @endif

            @if($nextMaterial)
                <form action="{{ route('learning.complete', $material->slug) }}" method="POST" class="w-full md:w-auto">
                    @csrf
                    <button type="submit" class="w-full md:w-auto px-8 py-2.5 rounded-full bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium transition-colors flex items-center justify-center gap-2 group text-sm cursor-pointer border-none">
                        @if($isCompleted) <span>Lanjut Materi Berikutnya</span> @else <span>Tandai Selesai & Lanjut</span> @endif
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </form>
            @else
                @php
                    $targetQuiz = \App\Models\Quiz::where('chapter_id', $material->chapter_id)
                                    ->whereNotIn('type', ['pre_test', 'post_test'])
                                    ->first();
                @endphp
                <div class="w-full md:w-auto">
                    @if($targetQuiz)
                        <form action="{{ route('learning.complete', $material->slug) }}" method="POST" class="w-full md:w-auto">
                            @csrf
                            <input type="hidden" name="redirect_to_quiz" value="{{ $targetQuiz->id }}">
                            <button type="submit" class="w-full md:w-auto px-8 py-2.5 rounded-full bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium transition-colors flex items-center justify-center gap-2 text-sm border-none cursor-pointer">
                                @if($isCompleted) 
                                    <span>Lanjut ke Evaluasi Akhir</span> 
                                @else 
                                    <span>Selesai & Lanjut Evaluasi</span> 
                                @endif
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('learning.complete', $material->slug) }}" method="POST" class="w-full md:w-auto">
                            @csrf
                            <button type="submit" class="w-full md:w-auto px-8 py-2.5 rounded-full bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium transition-all text-sm border-none cursor-pointer">
                                @if($material->chapter->sequence == 0)
                                    Mulai Belajar
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
    
    {{-- CSS Global Khusus Canvas (Apple Styling Integration) --}}
    <style>
        .apple-material-viewport {
            font-family: "SF Pro Display", "-apple-system", BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        .material-section {
            transition: all 0.5s ease;
            position: relative;
        }
        .material-section.locked {
            filter: blur(6px) grayscale(100%);
            opacity: 0.3;
            pointer-events: none;
            user-select: none;
            max-height: 180px;
            overflow: hidden;
            border-radius: 12px;
        }
        .material-section.locked::after {
            content: "Lanjutkan membaca di atas untuk membuka bagian ini";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            text-align: center;
            transform: translate(-50%, -50%);
            font-size: 15px;
            font-weight: 500;
            color: #7a7a7a;
            filter: blur(0); 
            z-index: 10;
        }

        /* Custom Scrollbar Inside CBT */
        .custom-scrollbar::-webkit-scrollbar { height: 5px; width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
    </style>

    @include('learning.partials.floating_tools')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    {{-- 🔥 SCRIPT STEPPER + MINI QUIZ ENGINE 🔥 --}}
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
                            btn.innerHTML = 'Saya Paham, Lanjut Baca';
                            btn.className = 'px-8 py-2.5 bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors border-none cursor-pointer text-sm';
                            
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
                            const quizItems = document.querySelectorAll('.mini-quiz-item');
                            const btnContainer = document.createElement('div');
                            btnContainer.className = 'mt-8 text-center animate-fade-in relative z-50';
                            
                            const finalBtn = document.createElement('button');
                            
                            if (quizItems.length > 0) {
                                finalBtn.innerHTML = 'Uji Pemahaman';
                                finalBtn.className = 'px-8 py-2.5 bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors border-none cursor-pointer text-sm';
                                finalBtn.onclick = function() {
                                    btnContainer.style.display = 'none';
                                    renderMultiQuiz(quizItems);
                                };
                            } else {
                                finalBtn.innerHTML = 'Saya Sudah Paham';
                                finalBtn.className = 'px-8 py-2.5 bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors border-none cursor-pointer text-sm';
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
            // 🔥 ENGINE MULTI-QUIZ CBT MODE (Apple Dark Token Styles) 🔥
            // ==============================================================
            function renderMultiQuiz(items) {
                let currentIdx = 0;
                const totalQuestions = items.length;
                let userAnswers = new Array(totalQuestions).fill(null);

                const questions = Array.from(items).map(item => ({
                    q: item.getAttribute('data-question'),
                    a: item.getAttribute('data-opt-a'),
                    b: item.getAttribute('data-opt-b'),
                    c: item.getAttribute('data-opt-c'),
                    d: item.getAttribute('data-opt-d'),
                    e: item.getAttribute('data-opt-e'), 
                    ans: item.getAttribute('data-answer').toUpperCase()
                }));

                const quizBox = document.createElement('div');
                quizBox.className = 'mt-10 bg-[#2a2a2c] border border-white/10 rounded-2xl animate-fade-in relative overflow-hidden flex flex-col';
                contentArea.appendChild(quizBox);
                quizBox.scrollIntoView({ behavior: 'smooth', block: 'center' });

                quizBox.innerHTML = `
                    <div class="p-5 border-b border-white/10" style="background-color: rgba(255, 255, 255, 0.02) !important;">
                        <h5 class="text-sm font-semibold text-white mb-2">Petunjuk Pengerjaan Kuis Formatif</h5>
                        <ul class="list-decimal pl-4 text-xs text-[#cccccc] space-y-1">
                            <li>Kuis ini bertujuan untuk menguji pemahaman Anda pada sub-bab materi yang baru saja dipelajari.</li>
                            <li>Pilihlah salah satu opsi jawaban yang Anda anggap paling tepat.</li>
                            <li>Batas kelulusan kuis ini adalah minimal 80%. Jika belum memenuhi, Anda diharapkan mempelajari kembali materi di atas.</li>
                        </ul>
                    </div>

                    <div class="bg-white/5 p-4 border-b border-white/10">
                        <div class="text-xs text-[#7a7a7a] mb-3 flex justify-between items-center tracking-wider font-semibold">
                            <span>NAVIGASI SOAL</span>
                            <span class="font-medium text-white bg-white/10 px-2.5 py-1 rounded" id="quiz-counter"></span>
                        </div>
                        <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar" id="quiz-nav-container"></div>
                    </div>
                    <div class="p-6 md:p-8 flex-1 bg-[#272729]" id="quiz-body"></div>
                    <div class="bg-[#2a2a2c] p-4 md:px-8 border-t border-white/5 flex justify-between items-center">
                        <button id="btn-prev-quiz" class="px-5 py-2 rounded-full bg-transparent border border-white/10 text-[#7a7a7a] font-medium transition-colors text-sm disabled:opacity-30 disabled:cursor-not-allowed cursor-pointer">
                            Kembali
                        </button>
                        <button id="btn-next-quiz" class="px-6 py-2 bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors text-sm border-none cursor-pointer flex items-center gap-1">
                            <span id="btn-next-text">Selanjutnya</span>
                            <svg class="w-4 h-4" id="btn-next-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
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

                for(let i = 0; i < totalQuestions; i++) {
                    let navBtn = document.createElement('button');
                    navBtn.className = 'flex-shrink-0 w-9 h-9 rounded-lg font-medium transition-colors border flex items-center justify-center text-sm cursor-pointer';
                    navBtn.innerText = i + 1;
                    navBtn.onclick = () => { currentIdx = i; loadQuestion(currentIdx); };
                    navContainer.appendChild(navBtn);
                }

                function updateNavUI() {
                    const navBtns = navContainer.querySelectorAll('button');
                    navBtns.forEach((btn, idx) => {
                        btn.className = 'flex-shrink-0 w-9 h-9 rounded-lg font-medium transition-all border flex items-center justify-center text-sm cursor-pointer';
                        
                        if (userAnswers[idx] !== null) {
                            btn.classList.add('bg-[#2997ff]', 'text-white', 'border-[#2997ff]');
                        } else {
                            btn.classList.add('bg-[#1c1c1e]', 'text-[#cccccc]', 'border-white/5', 'hover:bg-white/5');
                        }

                        if (idx === currentIdx) {
                            btn.classList.add('ring-2', 'ring-[#2997ff]', 'ring-offset-2', 'ring-offset-[#272729]');
                        }
                    });
                }

                function loadQuestion(index) {
                    const data = questions[index];
                    let selectedChoice = userAnswers[index]; 
                    
                    counterText.innerText = `${index + 1} / ${totalQuestions}`;
                    updateNavUI();

                    btnPrev.disabled = index === 0;
                    
                    if (index === totalQuestions - 1) {
                        btnNextText.innerText = "Kumpulkan";
                        btnNextIcon.classList.add('hidden');
                    } else {
                        btnNextText.innerText = "Selanjutnya";
                        btnNextIcon.classList.remove('hidden');
                    }

                    let buildOption = (choice, text) => {
                        if (!text) return '';
                        let isSelected = selectedChoice === choice;
                        let borderBGClass = isSelected 
                            ? 'border-[#2997ff] bg-[#2997ff]/10 text-white' 
                            : 'border-white/10 bg-[#1c1c1e] text-[#cccccc] hover:border-white/20 hover:bg-white/5';
                        return `<button class="quiz-opt-btn w-full text-left px-5 py-4 rounded-xl border ${borderBGClass} transition-colors font-medium flex items-start gap-3 cursor-pointer" data-choice="${choice}">
                            <span class="font-semibold text-[#2997ff] flex-shrink-0 w-5">${choice.toLowerCase()}.</span> <span>${text}</span>
                        </button>`;
                    };

                    let optionsHtml = buildOption('A', data.a) + buildOption('B', data.b);
                    if (data.c) optionsHtml += buildOption('C', data.c);
                    if (data.d) optionsHtml += buildOption('D', data.d);
                    if (data.e) optionsHtml += buildOption('E', data.e);

                    quizBody.innerHTML = `
                        <h4 class="text-xl font-medium text-white mb-8 leading-relaxed">${data.q}</h4>
                        <div class="space-y-3" id="quiz-options">
                            ${optionsHtml}
                        </div>
                    `;

                    const btns = quizBody.querySelectorAll('.quiz-opt-btn');
                    btns.forEach(btn => {
                        btn.onclick = function() {
                            btns.forEach(b => {
                                b.className = 'quiz-opt-btn w-full text-left px-5 py-4 rounded-xl border border-white/10 bg-[#1c1c1e] text-[#cccccc] hover:border-white/20 hover:bg-white/5 transition-colors font-medium flex items-start gap-3 cursor-pointer';
                            });
                            
                            this.className = 'quiz-opt-btn w-full text-left px-5 py-4 rounded-xl border border-[#2997ff] bg-[#2997ff]/10 text-white transition-colors font-medium flex items-start gap-3 cursor-pointer';
                            userAnswers[index] = this.getAttribute('data-choice');
                            updateNavUI();
                        }
                    });
                }

                btnPrev.onclick = () => { if (currentIdx > 0) { currentIdx--; loadQuestion(currentIdx); } };
                
                btnNext.onclick = function() {
                    if (currentIdx < totalQuestions - 1) {
                        currentIdx++;
                        loadQuestion(currentIdx);
                    } else {
                        let unanswered = [];
                        userAnswers.forEach((ans, i) => { if(ans === null) unanswered.push(i + 1); });
                        
                        if (unanswered.length > 0) {
                            Swal.fire({
                                title: 'Belum Selesai',
                                text: 'Kamu belum menjawab soal nomor: ' + unanswered.join(', '),
                                icon: 'warning',
                                confirmButtonText: 'Lanjutkan',
                                confirmButtonColor: '#0066cc',
                                background: '#272729',
                                color: '#ffffff'
                            });
                            return; 
                        }
                        
                        evaluateQuiz(); 
                    }
                };

                function evaluateQuiz() {
                    let correctCount = 0;
                    for (let i = 0; i < totalQuestions; i++) {
                        if (userAnswers[i] === questions[i].ans) correctCount++;
                    }
                    
                    let finalScore = Math.round((correctCount / totalQuestions) * 100);
                    let isPassed = finalScore >= 80;

                    if (isPassed) {
                        quizBox.innerHTML = `
                            <div class="text-center py-12 px-6 animate-fade-in bg-[#272729]">
                                <h4 class="text-3xl font-semibold text-white mb-3">Lulus Evaluasi</h4>
                                <p class="text-[#cccccc] mb-8 font-medium text-lg">Kamu menjawab ${correctCount} dari ${totalQuestions} soal dengan benar.</p>
                                
                                <div class="inline-block px-10 py-5 bg-[#2997ff]/10 border border-[#2997ff] rounded-2xl text-[#2997ff] font-mono font-semibold text-4xl mb-4">
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
                            <div class="text-center py-10 px-6 animate-fade-in bg-[#272729]">
                                <h4 class="text-3xl font-semibold text-[#ff453a] mb-2">Belum Memenuhi KKM</h4>
                                <p class="text-[#cccccc] mb-6 font-medium">Kamu menjawab ${correctCount} soal dengan benar. Butuh minimal skor 80 untuk lulus.</p>
                                
                                <div class="inline-block px-8 py-4 bg-[#ff453a]/10 border border-[#ff453a]/30 rounded-2xl text-[#ff453a] font-mono font-semibold text-2xl mb-8">
                                    Skor: ${finalScore}
                                </div>
                                
                                <div class="max-w-md mx-auto p-4 bg-white/5 border border-white/5 rounded-xl mb-6 text-sm text-[#7a7a7a]">
                                    Materi Terkunci. Kamu harus membaca ulang materi dari awal agar dapat mengikuti kuis ini kembali.
                                </div>

                                <button onclick="window.scrollTo(0,0); setTimeout(()=>window.location.reload(), 500);" class="px-8 py-2.5 bg-[#2997ff] hover:bg-[#0071e3] text-white font-medium rounded-full transition-colors border-none cursor-pointer text-sm">
                                    Ulangi Baca Materi
                                </button>
                            </div>
                        `;
                    }
                }

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