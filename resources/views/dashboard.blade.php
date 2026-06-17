@extends('layouts.app_learning')

@section('header', 'Dashboard Akademik')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>

<style>
    /* Tema Cream & Green untuk Tutorial Pop-up */
    .driver-popover.driverjs-theme {
        background-color: #fbf5dd;
        color: #0d530e;
        border: 1px solid #306d29;
        border-radius: 12px;
        box-shadow: 0 20px 25px -5px rgba(13, 83, 14, 0.3);
        z-index: 100000 !important;
        font-family: '"Plus Jakarta Sans"', sans-serif;
    }
    .driver-popover.driverjs-theme .driver-popover-title {
        font-size: 18px;
        font-weight: 800;
        color: #306d29; 
    }
    .driver-popover.driverjs-theme .driver-popover-description {
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 15px;
        color: #0d530e;
    }
    .driver-popover.driverjs-theme button {
        background-color: #306d29;
        color: #fbf5dd;
        border-radius: 6px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: bold;
        border: none;
        text-shadow: none;
        cursor: pointer;
    }
    .driver-popover.driverjs-theme button:hover {
        background-color: #0d530e;
    }
    .driver-popover-close-btn { display: none !important; }
    .driver-overlay { background-color: rgba(13, 83, 14, 0.7) !important; }
</style>

@php
    $preTest = \App\Models\Quiz::where('type', 'pre_test')->first();
    $hasDonePreTest = false;
    $preTestScore = 0;

    if ($preTest) {
        $progress = \App\Models\UserProgress::where('user_id', Auth::id())
                            ->where('quiz_id', $preTest->id)
                            ->first();
        if ($progress) {
            $hasDonePreTest = true;
            $preTestScore = $progress->score;
        }
    } else {
        // Jika tidak ada kuis dengan type 'pre_test', anggap sudah selesai
        $hasDonePreTest = true; 
    }
@endphp

<div class="space-y-8">

    @if(session('error'))
        <div class="p-4 bg-red-100 border border-red-400 rounded-xl text-red-700 font-bold flex items-center gap-3 shadow-sm">
            <span class="text-xl">⚠️</span> {{ session('error') }}
        </div>
    @endif

    @if(!$hasDonePreTest)
        <div class="bg-[#e7e1b1] rounded-3xl border border-[#306d29]/30 shadow-lg overflow-hidden relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#306d29]/5 blur-[80px] rounded-full pointer-events-none"></div>
            
            <div class="p-10 md:p-16 flex flex-col items-center text-center relative z-10">
                <div class="w-20 h-20 bg-[#fbf5dd] rounded-full flex items-center justify-center mb-6 border border-[#306d29]/30 shadow-md animate-pulse">
                    <svg class="w-10 h-10 text-[#306d29]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                
                <span class="px-4 py-1 rounded-full bg-red-100 text-red-600 text-xs font-extrabold uppercase tracking-widest mb-4 border border-red-200">
                    Tugas Wajib Akademik
                </span>
                
                <h1 class="text-3xl md:text-5xl font-black text-[#0d530e] mb-4 tracking-tight">Evaluasi Kemampuan Awal (Pre-Test)</h1>
                
                <p class="text-[#306d29] text-lg max-w-2xl leading-relaxed mb-10">
                    Selamat datang di VisualData! Sebelum memulai pembelajaran, Anda <strong>diwajibkan</strong> mengikuti Pre-Test ini. Tujuannya adalah untuk mengukur pemahaman awal Anda terhadap materi Visualisasi dan Pengelompokan Data. Nilai Pre-Test tidak akan mempengaruhi nilai akhir rapor Anda.
                </p>

                <a href="{{ route('quiz.show', $preTest->id) }}" class="px-10 py-4 bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] text-lg font-bold rounded-xl shadow-lg hover:-translate-y-1 transition-all flex items-center gap-3">
                    Mulai Kerjakan Pre-Test Sekarang ➔
                </a>
            </div>
        </div>

        <div class="opacity-40 pointer-events-none filter blur-[2px] mt-12">
            <h3 class="text-xl font-bold text-[#0d530e] mb-6 flex items-center gap-2 border-b border-[#306d29]/20 pb-4">
                <span>📚</span> Daftar Materi Belajar (Terkunci)
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-[#e7e1b1] border border-[#306d29]/20 rounded-xl p-5 h-40"></div>
                <div class="bg-[#e7e1b1] border border-[#306d29]/20 rounded-xl p-5 h-40"></div>
            </div>
        </div>
    @endif

    @if($hasDonePreTest)
        
        <div id="hero-section" class="relative rounded-2xl p-1 bg-[#306d29] shadow-xl overflow-hidden">
            <div class="bg-[#e7e1b1] rounded-xl p-8 relative z-10 h-full flex flex-col md:flex-row items-center justify-between gap-6">
                
                <div class="z-20">
                    <p class="text-[#306d29] font-bold tracking-widest text-xs uppercase mb-2">Selamat Datang Kembali,</p>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-[#0d530e] tracking-tight">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-[#306d29] mt-2 max-w-lg text-sm leading-relaxed">
                        Lanjutkan pemahaman komputasionalmu. Tuntaskan semua materi dan kerjakan Post-Test di akhir materi! 📚
                    </p>
                </div>

                <div class="hidden md:block z-20 text-right">
                    <div class="text-6xl drop-shadow-md">
                        🎓
                    </div>
                </div>

                <div class="absolute top-0 right-0 w-64 h-64 bg-[#fbf5dd]/30 blur-[60px] rounded-full pointer-events-none"></div>
            </div>
        </div>

        @php
            $avgScore = 0;
            if(isset($chartScores) && count($chartScores) > 0) {
                $avgScore = round(array_sum($chartScores) / count($chartScores));
            }
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div id="stat-pretest" class="bg-[#e7e1b1] border border-[#306d29]/20 p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:border-[#306d29]/50 transition-colors">
                <div class="p-3.5 bg-[#fbf5dd] text-[#306d29] rounded-xl border border-[#306d29]/10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#306d29] font-bold uppercase tracking-wider">Nilai Pre-Test</p>
                    <h3 class="text-2xl font-black text-[#0d530e]">{{ $preTestScore }}</h3>
                </div>
            </div>

            <div id="stat-materi" class="bg-[#e7e1b1] border border-[#306d29]/20 p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:border-[#306d29]/50 transition-colors">
                <div class="p-3.5 bg-[#fbf5dd] text-[#306d29] rounded-xl border border-[#306d29]/10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#306d29] font-bold uppercase tracking-wider">Materi Selesai</p>
                    <h3 class="text-2xl font-black text-[#0d530e]">{{ $finishedItems }} <span class="text-xs text-[#306d29]/70">/ {{ $totalItems }}</span></h3>
                </div>
            </div>

            <div id="stat-rata" class="bg-[#e7e1b1] border border-[#306d29]/20 p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:border-[#306d29]/50 transition-colors">
                <div class="p-3.5 bg-[#fbf5dd] text-[#306d29] rounded-xl border border-[#306d29]/10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#306d29] font-bold uppercase tracking-wider">Rata-rata Evaluasi</p>
                    <h3 class="text-2xl font-black text-[#0d530e]">{{ $avgScore }}</h3>
                </div>
            </div>

            <div id="stat-progress" class="bg-[#e7e1b1] border border-[#306d29]/20 p-6 rounded-2xl shadow-sm flex items-center gap-4 hover:border-[#306d29]/50 transition-colors">
                <div class="p-3.5 bg-[#fbf5dd] text-[#306d29] rounded-xl border border-[#306d29]/10">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] text-[#306d29] font-bold uppercase tracking-wider">Progres Belajar</p>
                    <h3 class="text-2xl font-black text-[#0d530e]">{{ $progressPercentage }}%</h3>
                </div>
            </div>
        </div>

        <div id="modul-belajar" class="bg-[#e7e1b1] p-8 rounded-3xl border border-[#306d29]/20 shadow-sm mt-8">
            <h3 class="text-xl font-bold text-[#0d530e] mb-6 flex items-center gap-3 border-b border-[#306d29]/20 pb-4">
                <div class="w-8 h-8 bg-[#fbf5dd] text-[#306d29] rounded-lg flex items-center justify-center border border-[#306d29]/20">📚</div>
                Daftar Materi Belajar
            </h3>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @php $isChapterUnlocked = true; @endphp
                
                @foreach($globalChapters as $chapter)
                    @php
                        $chapterMaterials = $chapter->materials;
                        $totalChapterItems = $chapterMaterials->count();
                        
                        $chapterQuiz = \App\Models\Quiz::where('chapter_id', $chapter->id)->first();
                        if($chapterQuiz) {
                            $totalChapterItems += 1;
                        }

                        $completedChapterMaterials = \App\Models\UserProgress::where('user_id', Auth::id())
                                                        ->whereIn('material_id', $chapterMaterials->pluck('id'))
                                                        ->where('is_completed', true)
                                                        ->count();
                        
                        $completedChapterQuiz = 0;
                        if($chapterQuiz) {
                            $completedChapterQuiz = \App\Models\UserProgress::where('user_id', Auth::id())
                                                        ->where('quiz_id', $chapterQuiz->id)
                                                        ->where('is_completed', true)
                                                        ->count();
                        }

                        $totalChapterCompleted = $completedChapterMaterials + $completedChapterQuiz;
                        $chapterPercentage = ($totalChapterItems > 0) ? round(($totalChapterCompleted / $totalChapterItems) * 100) : 0;
                    @endphp

                    @if($isChapterUnlocked)
                        <div class="bg-[#fbf5dd] border border-[#306d29]/20 rounded-2xl p-6 hover:border-[#306d29]/50 transition-colors flex flex-col justify-between shadow-sm">
                            <div>
                                <div class="flex justify-between items-start mb-3">
                                    <h4 class="text-lg font-bold text-[#0d530e]">
                                        @if($chapter->sequence == 0)
                                            Pengantar & Apersepsi
                                        @elseif($chapter->sequence == 99)
                                            Penilaian Akhir
                                        @else
                                            {{ $chapter->title }}
                                        @endif
                                    </h4>
                                    <span class="text-[10px] font-bold px-2.5 py-1 bg-[#e7e1b1] rounded-md text-[#306d29] border border-[#306d29]/30">
                                        @if($chapter->sequence == 0)
                                            Pendahuluan
                                        @elseif($chapter->sequence == 99)
                                            Evaluasi
                                        @else
                                            Bab {{ $chapter->sequence }}
                                        @endif
                                    </span>
                                </div>
                                <p class="text-sm text-[#306d29] mb-8 line-clamp-2 leading-relaxed">{{ $chapter->description ?? 'Materi pembelajaran interaktif Visualisasi dan Pengelompokan Data.' }}</p>
                            </div>

                            <div>
                                <div class="flex justify-between text-xs mb-2 font-bold uppercase tracking-wider">
                                    <span class="text-[#306d29]">Progres Bab</span>
                                    <span class="text-[#306d29]">{{ $chapterPercentage }}%</span>
                                </div>
                                <div class="w-full bg-[#e7e1b1] rounded-full h-2 mb-5 overflow-hidden border border-[#306d29]/10">
                                    <div class="bg-[#306d29] h-full rounded-full transition-all duration-1000" style="width: {{ $chapterPercentage }}%"></div>
                                </div>
                                
                                @if($chapterMaterials->isNotEmpty())
                                    <a href="{{ route('learning.show', $chapterMaterials->first()->slug) }}" class="block w-full py-3 text-center rounded-xl bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] font-bold text-sm transition-all shadow-md">
                                        @if($chapterPercentage == 0)
                                            Mulai Belajar
                                        @elseif($chapterPercentage == 100)
                                            Ulangi Bab Ini
                                        @else
                                            Lanjutkan Belajar
                                        @endif
                                    </a>
                                @else
                                    @if($chapter->sequence == 99 && $chapterQuiz)
                                        <a href="{{ route('quiz.show', $chapterQuiz->id) }}" class="block w-full py-3 text-center rounded-xl bg-[#306d29] hover:bg-[#0d530e] text-[#fbf5dd] font-bold text-sm transition-all shadow-md">
                                            Mulai Evaluasi Akhir
                                        </a>
                                    @else
                                        <button disabled class="block w-full py-3 text-center rounded-xl bg-[#e7e1b1] border border-[#306d29]/20 text-[#306d29]/70 font-bold text-sm cursor-not-allowed">Belum Ada Materi</button>
                                    @endif
                                @endif
                            </div>
                        </div>

                        @php
                            // Logika Pengunci: Jika bab ini belum 100%, bab berikutnya otomatis terkunci
                            if ($chapterPercentage < 100) {
                                $isChapterUnlocked = false;
                            }
                        @endphp
                    @else
                        <div class="bg-[#fbf5dd]/60 border border-[#306d29]/10 rounded-2xl p-6 flex flex-col justify-between relative overflow-hidden group">
                            <div class="absolute inset-0 bg-[#fbf5dd]/80 backdrop-blur-sm z-10 flex flex-col items-center justify-center border border-[#306d29]/20 rounded-2xl transition-all duration-300">
                                <span class="text-4xl mb-2 drop-shadow-md">🔒</span>
                                <h4 class="font-bold text-[#0d530e]">Materi Terkunci</h4>
                                <p class="text-[10px] text-[#306d29] mt-1 px-8 text-center leading-relaxed">Selesaikan 100% materi di bab sebelumnya untuk membuka materi ini.</p>
                            </div>
                            
                            <div class="opacity-20 filter blur-[3px] select-none pointer-events-none">
                                <div>
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="text-lg font-bold text-[#0d530e]">Materi Tersembunyi</h4>
                                        <span class="text-[10px] font-bold px-2.5 py-1 bg-[#e7e1b1] rounded-md text-[#306d29] border border-[#306d29]/30">
                                            @if($chapter->sequence == 0)
                                                Pendahuluan
                                            @elseif($chapter->sequence == 99) 
                                                Evaluasi 
                                            @else 
                                                Bab {{ $chapter->sequence }} 
                                            @endif
                                        </span>
                                    </div>
                                    <p class="text-sm text-[#306d29] mb-8 line-clamp-2 leading-relaxed">Deskripsi materi ini disembunyikan untuk menjaga alur metode tutorial.</p>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs text-[#306d29] mb-2 font-bold uppercase tracking-wider">
                                        <span>Progres Bab</span>
                                        <span>0%</span>
                                    </div>
                                    <div class="w-full bg-[#e7e1b1] rounded-full h-2 mb-5 overflow-hidden"></div>
                                    <button disabled class="block w-full py-3 text-center rounded-xl bg-[#e7e1b1] border border-[#306d29]/20 text-[#306d29]/70 font-bold text-sm">Terkunci</button>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
            
            @php
                $postTest = \App\Models\Quiz::where('type', 'post_test')->first();
                $isPostTestDone = false;
                if ($postTest) {
                    $isPostTestDone = \App\Models\UserProgress::where('user_id', Auth::id())
                                        ->where('quiz_id', $postTest->id)
                                        ->exists();
                }
            @endphp
            
            @if($postTest)
            <div id="post-test-section" class="mt-8 p-6 bg-[#306d29] border border-[#0d530e] rounded-2xl flex flex-col md:flex-row items-center justify-between gap-6 shadow-md">
                <div>
                    <h4 class="text-lg font-bold text-[#fbf5dd] mb-1 flex items-center gap-2">
                        <span class="text-xl">🏆</span> Evaluasi Akhir Pembelajaran (Post-Test)
                    </h4>
                    <p class="text-sm text-[#e7e1b1]">Kerjakan evaluasi akhir ini setelah menyelesaikan semua bab untuk mendapatkan nilai akhir.</p>
                </div>
                
                @if($progressPercentage == 100) 
                    <a href="{{ route('quiz.show', $postTest->id) }}" class="shrink-0 px-8 py-3 bg-[#fbf5dd] hover:bg-[#e7e1b1] text-[#0d530e] font-bold rounded-xl shadow-lg transition-colors">
                        {{ $isPostTestDone ? 'Lihat Hasil Evaluasi' : 'Mulai Evaluasi Akhir' }}
                    </a>
                @else
                    <button disabled title="Selesaikan semua bab terlebih dahulu" class="shrink-0 px-8 py-3 bg-[#0d530e] border border-[#0d530e] text-[#fbf5dd]/60 font-bold rounded-xl cursor-not-allowed">
                        Terkunci 🔒
                    </button>
                @endif
            </div>
            @endif

        </div>

    @endif 
</div>

@if($hasDonePreTest)
<script>
    document.addEventListener('DOMContentLoaded', () => {
        
        // 1. TUTORIAL DRIVER.JS
        const driver = window.driver.js.driver;
        const tourKey = 'dashboard_tour_user_{{ Auth::id() }}';

        const driverObj = driver({
            showProgress: true,
            animate: true,
            allowClose: false,
            overlayClickNext: false,
            allowKeyboardControl: false,
            
            nextBtnText: 'Lanjut →',
            prevBtnText: '← Kembali',
            doneBtnText: 'Siap Belajar! 🚀',
            popoverClass: 'driverjs-theme',

            steps: [
                {
                    element: '#hero-section',
                    popover: {
                        title: 'Dashboard Belajar',
                        description: 'Ini adalah halaman utamamu. Di sini kamu bisa memantau seluruh progres akademik dan statistik belajarmu.'
                    }
                },
                {
                    element: '#main-sidebar',
                    popover: {
                        title: 'Navigasi Materi',
                        description: 'Gunakan menu di sebelah kiri untuk mengakses materi Pembelajaran dan Sandbox Data.'
                    }
                },
                {
                    element: '#stat-rata',
                    popover: {
                        title: 'Rata-rata Nilai',
                        description: 'Pantau terus rata-rata nilai evaluasimu di sini. Pastikan nilainya tetap memuaskan!'
                    }
                },
                {
                    element: '#modul-belajar',
                    popover: {
                        title: 'Pilih Modulmu',
                        description: 'Ini adalah daftar kurikulum yang harus diselesaikan. Klik "Mulai Belajar" pada Bab 1 untuk memulai! Selesaikan secara berurutan untuk membuka bab selanjutnya.'
                    }
                },
                @if($postTest)
                {
                    element: '#post-test-section',
                    popover: {
                        title: 'Evaluasi Akhir',
                        description: 'Bagian ini akan bisa diklik setelah kamu menyelesaikan 100% materi pembelajaran.'
                    }
                }
                @endif
            ],

            onDestroyed: () => {
                localStorage.setItem(tourKey, 'true');
            }
        });

        if (!localStorage.getItem(tourKey)) {
            setTimeout(() => {
                driverObj.drive();
            }, 1500);
        }

    });
</script>
@endif

@endsection