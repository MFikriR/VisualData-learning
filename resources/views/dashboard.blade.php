@extends('layouts.app_learning')

@section('header', 'Dashboard Akademik')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>

<style>
    /* =========================================
       MODERN ERGONOMIC DESIGN SYSTEM (CLEAN TECH)
       ========================================= */
    :root {
        --color-primary:          #0066cc;
        --color-primary-hover:    #0052a3;
        --color-primary-light:    #f0f7ff;
        
        --color-canvas:           #ffffff;
        --color-surface-subtle:   #fafafa;
        --color-surface-muted:    #f4f4f6;
        
        --color-ink-main:         #111111;
        --color-ink-subtle:       #555555;
        --color-ink-muted:        #888888;
        
        --color-border:           #e5e5e7;
        --color-border-subtle:    #f0f0f2;
        --color-border-accent:    #0066cc;
        
        --radius-card:            16px;
        --radius-pill:            9999px;

        --font-display: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Inter', sans-serif;
        --font-body: 'SF Pro Text', -apple-system, BlinkMacSystemFont, 'Inter', sans-serif;
    }

    /* TYPOGRAPHY UTILITIES */
    .type-display { font-family: var(--font-display); font-size: 32px; font-weight: 700; line-height: 1.25; letter-spacing: -0.02em; color: var(--color-ink-main); }
    .type-heading { font-family: var(--font-display); font-size: 20px; font-weight: 600; line-height: 1.35; letter-spacing: -0.015em; color: var(--color-ink-main); }
    .type-subheading { font-family: var(--font-body); font-size: 15px; font-weight: 600; line-height: 1.4; color: var(--color-ink-main); }
    .type-body { font-family: var(--font-body); font-size: 14px; font-weight: 400; line-height: 1.5; color: var(--color-ink-subtle); }
    .type-label { font-family: var(--font-body); font-size: 11px; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; color: var(--color-ink-muted); }
    .type-stat { font-family: var(--font-display); font-size: 28px; font-weight: 700; line-height: 1.1; letter-spacing: -0.02em; color: var(--color-ink-main); }

    /* CARD BASE STYLES */
    .dashboard-card {
        background: var(--color-canvas);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-card);
        padding: 24px;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }

    .dashboard-card-interactive {
        cursor: pointer;
    }
    .dashboard-card-interactive:hover {
        border-color: #c5c5c9;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.06);
    }

    /* STATS CARD SPECIAL LAYOUT */
    .stat-card-badge {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--color-surface-muted);
        border: 1px solid var(--color-border-subtle);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-primary);
        flex-shrink: 0;
    }

    /* PROGRESS BAR */
    .custom-progress-track {
        width: 100%;
        height: 6px;
        background: var(--color-surface-muted);
        border-radius: var(--radius-pill);
        overflow: hidden;
    }
    .custom-progress-fill {
        height: 100%;
        background: var(--color-primary);
        border-radius: var(--radius-pill);
        transition: width 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* BUTTON STYLES */
    .btn-action-primary {
        background: var(--color-primary);
        color: #ffffff;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.15s ease;
    }
    .btn-action-primary:hover {
        background: var(--color-primary-hover);
        color: #ffffff;
    }
    .btn-action-secondary {
        background: var(--color-surface-subtle);
        color: var(--color-ink-main);
        border: 1px solid var(--color-border);
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid var(--color-border);
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.15s ease;
    }
    .btn-action-secondary:hover {
        background: var(--color-surface-muted);
        border-color: #c5c5c9;
        color: var(--color-ink-main);
    }

    /* BADGES */
    .badge-pill {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: var(--radius-pill);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.02em;
        background: var(--color-surface-muted);
        color: var(--color-ink-subtle);
        border: 1px solid var(--color-border);
    }
    .badge-pill-accent {
        background: var(--color-primary-light);
        color: var(--color-primary);
        border-color: rgba(0, 102, 204, 0.2);
    }

    /* DRIVER.JS OVERRIDE */
    .driver-popover.driverjs-theme {
        background-color: #ffffff;
        color: var(--color-ink-main);
        border: 1px solid var(--color-border);
        border-radius: 16px;
        font-family: inherit;
        box-shadow: 0 20px 40px -15px rgba(0,0,0,0.15);
        z-index: 100000 !important;
        padding: 20px;
    }
    .driver-popover.driverjs-theme .driver-popover-title {
        color: var(--color-ink-main);
        font-weight: 700;
        font-size: 18px;
        letter-spacing: -0.01em;
    }
    .driver-popover.driverjs-theme .driver-popover-description {
        font-size: 13px;
        line-height: 1.5;
        margin-bottom: 16px;
        color: var(--color-ink-subtle);
    }
    .driver-popover.driverjs-theme button {
        background-color: var(--color-primary);
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        font-weight: 600;
        font-size: 13px;
    }
    .driver-popover.driverjs-theme button:hover { background-color: var(--color-primary-hover); }
    .driver-popover-close-btn { display: none !important; }
    .driver-overlay { background-color: rgba(0,0,0,0.3) !important; backdrop-filter: blur(3px); }
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
        $hasDonePreTest = true; 
    }
@endphp

<div class="space-y-8 pb-16">

    @if(session('error'))
        <div class="p-4 rounded-xl flex items-center gap-3 bg-red-50 border border-red-200 text-red-800">
            <span class="text-lg">⚠️</span> 
            <span class="text-sm font-semibold">{{ session('error') }}</span>
        </div>
    @endif

    {{-- KONDISI 1: JIKA BELUM PRE-TEST --}}
    @if(!$hasDonePreTest)
        <div class="dashboard-card text-center py-16 px-6 bg-gradient-to-b from-white to-[#fafafa]">
            <div class="mx-auto w-14 h-14 rounded-2xl flex items-center justify-center mb-5 bg-blue-50 border border-blue-100 text-blue-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
            
            <span class="badge-pill badge-pill-accent mb-3">
                Tugas Wajib Akademik
            </span>
            
            <h1 class="type-display mt-2 mb-3">Evaluasi Kemampuan Awal (Pre-Test)</h1>
            
            <p class="type-body max-w-xl mx-auto mb-8">
                Selamat datang di VisualData! Sebelum memulai pembelajaran, kamu <strong>diwajibkan</strong> mengikuti Pre-Test ini untuk mengukur pemahaman awal. Nilai Pre-Test tidak memengaruhi nilai akhir.
            </p>

            <a href="{{ route('quiz.show', $preTest->id) }}" class="btn-action-primary py-3 px-8 text-base">
                Mulai Kerjakan Pre-Test &rarr;
            </a>
        </div>

        {{-- Blurred Background for Locked Modules --}}
        <div class="mt-10 opacity-30 filter blur-[2px] pointer-events-none">
            <h3 class="type-heading mb-4 pb-3 border-b border-[#e5e5e7]">
                Daftar Materi Belajar (Terkunci)
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="dashboard-card h-36 bg-[#f4f4f6]"></div>
                <div class="dashboard-card h-36 bg-[#f4f4f6]"></div>
            </div>
        </div>
    @endif

    {{-- KONDISI 2: JIKA SUDAH PRE-TEST (Dashboard Utama) --}}
    @if($hasDonePreTest)
        
        {{-- Welcome Hero Card --}}
        <div id="hero-section" class="dashboard-card flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-blue-50/50 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="z-10">
                <p class="type-label mb-1">Selamat Datang</p>
                <h1 class="type-display mb-2">
                    {{ Auth::user()->name }}
                </h1>
                <p class="type-body max-w-xl">
                    Nikmati pembelajaran Visualisasi & Pengelompokan Data dengan Penuh Semangat!
                </p>
            </div>
        </div>

        @php
            $avgScore = 0;
            if(isset($chartScores) && count($chartScores) > 0) {
                $avgScore = round(array_sum($chartScores) / count($chartScores));
            }
        @endphp

        {{-- Statistics Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Stat 1 --}}
            <div id="stat-pretest" class="dashboard-card flex items-center gap-4">
                <div class="stat-card-badge">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <p class="type-label">Nilai Pre-Test</p>
                    <h3 class="type-stat mt-0.5">{{ $preTestScore }}</h3>
                </div>
            </div>

            {{-- Stat 2 --}}
            <div id="stat-materi" class="dashboard-card flex items-center gap-4">
                <div class="stat-card-badge">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div>
                    <p class="type-label">Materi Selesai</p>
                    <h3 class="type-stat mt-0.5">{{ $finishedItems }} <span class="text-sm font-normal text-[#888888]">/ {{ $totalItems }}</span></h3>
                </div>
            </div>

            {{-- Stat 3 --}}
            <div id="stat-rata" class="dashboard-card flex items-center gap-4">
                <div class="stat-card-badge">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div>
                    <p class="type-label">Rata-rata Evaluasi</p>
                    <h3 class="type-stat mt-0.5">{{ $avgScore }}</h3>
                </div>
            </div>

            {{-- Stat 4 --}}
            <div id="stat-progress" class="dashboard-card flex items-center gap-4">
                <div class="stat-card-badge">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <div>
                    <p class="type-label">Progres Belajar</p>
                    <h3 class="type-stat mt-0.5">{{ $progressPercentage }}%</h3>
                </div>
            </div>
        </div>

        {{-- Modules List Container --}}
        <div id="modul-belajar" class="mt-10">
            <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#e5e5e7]">
                <h3 class="type-heading">Daftar Materi Belajar</h3>
                <span class="type-label">Kurikulum Aktif</span>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
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
                        {{-- UNLOCKED CHAPTER CARD --}}
                        <div class="dashboard-card dashboard-card-interactive flex flex-col justify-between h-full">
                            <div>
                                <div class="flex justify-between items-start gap-3 mb-2">
                                    <h4 class="type-subheading">
                                        @if($chapter->sequence == 0)
                                            Pengantar & Apersepsi
                                        @elseif($chapter->sequence == 99)
                                            Penilaian Akhir
                                        @else
                                            {{ $chapter->title }}
                                        @endif
                                    </h4>
                                    <span class="badge-pill whitespace-nowrap">
                                        @if($chapter->sequence == 0)
                                            Pendahuluan
                                        @elseif($chapter->sequence == 99)
                                            Evaluasi
                                        @else
                                            Bab {{ $chapter->sequence }}
                                        @endif
                                    </span>
                                </div>
                                
                                <p class="type-body text-xs mb-6 line-clamp-2">
                                    {{ $chapter->description ?? 'Materi pembelajaran interaktif Visualisasi dan Pengelompokan Data.' }}
                                </p>
                            </div>

                            <div>
                                <div class="flex justify-between items-center text-xs mb-2 font-medium">
                                    <span class="type-label">Progres Bab</span>
                                    <span class="font-bold text-[#111111]">{{ $chapterPercentage }}%</span>
                                </div>
                                <div class="custom-progress-track mb-5">
                                    <div class="custom-progress-fill" style="width: {{ $chapterPercentage }}%;"></div>
                                </div>
                                
                                @if($chapterMaterials->isNotEmpty())
                                    <a href="{{ route('learning.show', $chapterMaterials->first()->slug) }}" class="{{ $chapterPercentage == 100 ? 'btn-action-secondary' : 'btn-action-primary' }} w-full">
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
                                        <a href="{{ route('quiz.show', $chapterQuiz->id) }}" class="btn-action-primary w-full">
                                            Mulai Evaluasi Akhir
                                        </a>
                                    @else
                                        <button disabled class="btn-action-secondary w-full opacity-50 cursor-not-allowed">
                                            Belum Ada Materi
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>

                        @php
                            if ($chapterPercentage < 100) {
                                $isChapterUnlocked = false;
                            }
                        @endphp
                    @else
                        {{-- LOCKED CHAPTER CARD --}}
                        <div class="dashboard-card bg-[#fafafa] border-dashed flex flex-col justify-between h-full relative overflow-hidden">
                            <div class="absolute inset-0 flex flex-col items-center justify-center z-20 bg-white/80 backdrop-blur-[2px] p-6 text-center">
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center mb-2 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <h4 class="type-subheading text-sm mb-0.5">Materi Terkunci</h4>
                                <p class="type-body text-xs max-w-xs">Selesaikan 100% materi di bab sebelumnya untuk membuka modul ini.</p>
                            </div>
                            
                            {{-- Skeleton/Ghost Background --}}
                            <div class="opacity-20 pointer-events-none">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="type-subheading">Materi Tersembunyi</h4>
                                    <span class="badge-pill">Terkunci</span>
                                </div>
                                <p class="type-body text-xs mb-6">Deskripsi materi ini disembunyikan untuk menjaga alur metode tutorial.</p>
                                <div class="custom-progress-track mb-5"></div>
                                <button disabled class="btn-action-secondary w-full">Terkunci</button>
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
            <div id="post-test-section" class="dashboard-card mt-6 border-l-4 border-l-[#0066cc] flex flex-col md:flex-row items-start md:items-center justify-between gap-4 bg-[#fafafa]">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-base">🏆</span>
                        <h4 class="type-subheading">Evaluasi Akhir Pembelajaran (Post-Test)</h4>
                    </div>
                    <p class="type-body text-xs">Kerjakan evaluasi akhir ini setelah menyelesaikan semua bab untuk mendapatkan nilai akhir.</p>
                </div>
                
                @if($progressPercentage == 100) 
                    <a href="{{ route('quiz.show', $postTest->id) }}" class="btn-action-primary whitespace-nowrap">
                        {{ $isPostTestDone ? 'Lihat Hasil Evaluasi' : 'Mulai Evaluasi Akhir' }}
                    </a>
                @else
                    <button disabled title="Selesaikan semua bab terlebih dahulu" class="btn-action-secondary opacity-50 cursor-not-allowed whitespace-nowrap">
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
            
            nextBtnText: 'Lanjut',
            prevBtnText: 'Kembali',
            doneBtnText: 'Selesai',
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