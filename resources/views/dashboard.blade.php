@extends('layouts.app_learning')

@section('header', 'Dashboard Akademik')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
<script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>

<style>
    /* =========================================
       APPLE DESIGN TOKENS — CSS REFERENCE
       ========================================= */
    :root {
        /* Accent / Brand */
        --color-primary:          #0066cc;
        --color-primary-focus:    #0071e3;
        --color-primary-on-dark:  #2997ff;

        /* Surface */
        --color-canvas:           #ffffff;
        --color-canvas-parchment: #f5f5f7;
        --color-surface-pearl:    #fafafc;
        --color-surface-tile-1:   #272729;
        --color-surface-tile-2:   #2a2a2c;
        --color-surface-tile-3:   #252527;
        --color-surface-black:    #000000;
        --color-chip-translucent: rgba(210, 210, 215, 0.64);

        /* Text */
        --color-ink:              #1d1d1f;
        --color-ink-muted-80:     #333333;
        --color-ink-muted-48:     #7a7a7a;
        --color-on-dark:          #ffffff;
        --color-body-muted:       #cccccc;

        /* Border */
        --color-divider-soft:     #f0f0f0;
        --color-hairline:         #e0e0e0;

        /* Spacing */
        --space-xxs:     4px;
        --space-xs:      8px;
        --space-sm:      12px;
        --space-md:      17px;
        --space-lg:      24px;
        --space-xl:      32px;
        --space-xxl:     48px;
        --space-section: 80px;

        /* Border Radius */
        --radius-none: 0px;
        --radius-xs:   5px;
        --radius-sm:   8px;
        --radius-md:   11px;
        --radius-lg:   18px;
        --radius-pill: 9999px;
        --radius-full: 9999px;
    }

    /* TYPOGRAPHY */
    .type-display-md  { font-size: 34px; font-weight: 600; line-height: 1.47; letter-spacing: -0.374px; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-lead        { font-size: 28px; font-weight: 600; line-height: 1.14; letter-spacing: 0.196px; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-tagline     { font-size: 21px; font-weight: 600; line-height: 1.19; letter-spacing: 0.231px; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-body-strong { font-size: 17px; font-weight: 600; line-height: 1.24; letter-spacing: -0.374px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-body        { font-size: 17px; font-weight: 400; line-height: 1.47; letter-spacing: -0.374px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-caption     { font-size: 14px; font-weight: 400; line-height: 1.43; letter-spacing: -0.224px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-caption-str { font-size: 14px; font-weight: 600; line-height: 1.29; letter-spacing: -0.224px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-micro       { font-size: 10px; font-weight: 600; line-height: 1.3;  letter-spacing: -0.08px; font-family: 'SF Pro Text', 'Inter', sans-serif; text-transform: uppercase; }

    /* COMPONENTS */
    .card-utility {
        background: var(--color-canvas);
        border: 1px solid var(--color-hairline);
        border-radius: var(--radius-lg);
        padding: var(--space-lg);
        box-shadow: none; /* No shadow by default */
    }

    .btn-primary {
        background: var(--color-primary); color: #fff;
        border-radius: var(--radius-pill); padding: 11px 22px;
        font-size: 17px; font-weight: 400; letter-spacing: -0.374px;
        border: none; cursor: pointer; text-decoration: none;
        display: inline-flex; align-items: center; justify-content: center;
        transition: transform 0.1s;
    }
    .btn-primary:active { transform: scale(0.95); }
    .btn-primary:hover  { background: var(--color-primary-focus); }

    .btn-secondary {
        background: transparent; color: var(--color-primary);
        border: 1px solid var(--color-primary); border-radius: var(--radius-pill);
        padding: 11px 22px; font-size: 17px; font-weight: 400; letter-spacing: -0.374px;
        cursor: pointer; text-decoration: none; display: inline-flex; justify-content: center;
        transition: transform 0.1s;
    }
    .btn-secondary:active { transform: scale(0.95); }

    .btn-store-hero {
        background: var(--color-primary); color: #fff; border-radius: var(--radius-pill);
        padding: 14px 28px; font-size: 18px; font-weight: 300; border: none; cursor: pointer;
        text-decoration: none; display: inline-flex; align-items: center; justify-content: center;
        transition: transform 0.1s;
    }
    .btn-store-hero:active { transform: scale(0.95); }

    .btn-pearl {
        background: var(--color-surface-pearl); color: var(--color-ink-muted-80);
        border-radius: var(--radius-md); border: 1px solid var(--color-hairline);
        padding: 6px 14px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center;
    }

    /* Progress Bar */
    .apple-progress-track {
        width: 100%; background: var(--color-divider-soft); border-radius: var(--radius-pill); height: 6px; overflow: hidden;
    }
    .apple-progress-fill {
        height: 100%; border-radius: var(--radius-pill); background: var(--color-primary); transition: width 1s ease;
    }

    /* Driver.js Theme Clean Apple Override */
    .driver-popover.driverjs-theme {
        background-color: var(--color-canvas); color: var(--color-ink); border: 1px solid var(--color-hairline); 
        border-radius: var(--radius-lg); font-family: inherit; box-shadow: rgba(0, 0, 0, 0.22) 3px 5px 30px 0px;
        z-index: 100000 !important;
    }
    .driver-popover.driverjs-theme .driver-popover-title { color: var(--color-ink); font-weight: 600; font-size: 21px; letter-spacing: -0.02em;}
    .driver-popover.driverjs-theme .driver-popover-description { font-size: 14px; line-height: 1.43; margin-bottom: 15px; color: var(--color-ink-muted-80); letter-spacing: -0.224px; }
    .driver-popover.driverjs-theme button { 
        background-color: var(--color-primary); color: #ffffff; border: none; text-shadow: none; 
        border-radius: var(--radius-pill); padding: 8px 16px; font-weight: 400; font-size: 14px;
    }
    .driver-popover.driverjs-theme button:hover { background-color: var(--color-primary-focus); }
    .driver-popover-close-btn { display: none !important; }
    .driver-overlay { background-color: rgba(0,0,0,0.4) !important; backdrop-filter: blur(4px); }
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

<div class="space-y-8 pb-16">

    @if(session('error'))
        <div class="p-4 rounded-lg flex items-center gap-3" style="background: var(--color-surface-pearl); border: 1px solid #ff3b30; color: var(--color-ink);">
            <span class="text-xl">⚠️</span> <span class="type-body-strong">{{ session('error') }}</span>
        </div>
    @endif

    {{-- KONDISI 1: JIKA BELUM PRE-TEST --}}
    @if(!$hasDonePreTest)
        <div class="card-utility text-center" style="background: var(--color-canvas-parchment); padding: 80px 24px;">
            <div class="mx-auto w-16 h-16 rounded-full flex items-center justify-center mb-6" style="background: var(--color-canvas); border: 1px solid var(--color-hairline); box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;">
                <svg class="w-8 h-8" style="color: var(--color-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            </div>
            
            <span class="type-caption-str uppercase tracking-wider" style="color: #d53b00;">
                Tugas Wajib Akademik
            </span>
            
            <h1 class="type-display-md mt-4 mb-4" style="color: var(--color-ink);">Evaluasi Kemampuan Awal (Pre-Test)</h1>
            
            <p class="type-body max-w-2xl mx-auto mb-10" style="color: var(--color-ink-muted-80);">
                Selamat datang di VisualData! Sebelum memulai pembelajaran, Anda <strong>diwajibkan</strong> mengikuti Pre-Test ini. Tujuannya adalah untuk mengukur pemahaman awal Anda terhadap materi. Nilai Pre-Test tidak akan mempengaruhi nilai akhir Anda.
            </p>

            <a href="{{ route('quiz.show', $preTest->id) }}" class="btn-store-hero">
                Mulai Kerjakan Pre-Test &rarr;
            </a>
        </div>

        {{-- Blurred Background for Locked Modules --}}
        <div class="mt-12" style="opacity: 0.4; filter: blur(3px); pointer-events: none;">
            <h3 class="type-lead mb-6 pb-4" style="border-bottom: 1px solid var(--color-hairline); color: var(--color-ink);">
                Daftar Materi Belajar (Terkunci)
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card-utility h-40" style="background: var(--color-canvas-parchment);"></div>
                <div class="card-utility h-40" style="background: var(--color-canvas-parchment);"></div>
            </div>
        </div>
    @endif

    {{-- KONDISI 2: JIKA SUDAH PRE-TEST (Dashboard Utama) --}}
    @if($hasDonePreTest)
        
        {{-- Welcome Hero Card (Dark Tile Mode) --}}
        <div id="hero-section" class="card-utility flex flex-col md:flex-row items-center justify-between gap-6" style="background: var(--color-surface-tile-1); border: none; padding: 48px 40px;">
            <div class="z-20 text-left">
                <p class="type-micro mb-2" style="color: var(--color-body-muted);">Selamat Datang Kembali,</p>
                <h1 class="type-display-md mb-2" style="color: var(--color-on-dark);">
                    {{ Auth::user()->name }}
                </h1>
                <p class="type-body max-w-lg" style="color: var(--color-body-muted);">
                    Lanjutkan pemahaman komputasionalmu. Tuntaskan semua materi dan kerjakan Post-Test di akhir materi!
                </p>
            </div>
            <div class="hidden md:block z-20 text-right">
                <div class="text-7xl" style="text-shadow: rgba(0, 0, 0, 0.22) 3px 5px 30px;">🎓</div>
            </div>
        </div>

        @php
            $avgScore = 0;
            if(isset($chartScores) && count($chartScores) > 0) {
                $avgScore = round(array_sum($chartScores) / count($chartScores));
            }
        @endphp

        {{-- Statistics Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <div id="stat-pretest" class="card-utility flex items-center gap-4">
                <div class="btn-pearl" style="width: 50px; height: 50px; border-radius: var(--radius-sm); border: none; background: var(--color-canvas-parchment); color: var(--color-primary);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <div>
                    <p class="type-micro mb-1" style="color: var(--color-ink-muted-80);">Nilai Pre-Test</p>
                    <h3 class="type-lead" style="color: var(--color-ink);">{{ $preTestScore }}</h3>
                </div>
            </div>

            <div id="stat-materi" class="card-utility flex items-center gap-4">
                <div class="btn-pearl" style="width: 50px; height: 50px; border-radius: var(--radius-sm); border: none; background: var(--color-canvas-parchment); color: var(--color-primary);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div>
                    <p class="type-micro mb-1" style="color: var(--color-ink-muted-80);">Materi Selesai</p>
                    <h3 class="type-lead" style="color: var(--color-ink);">{{ $finishedItems }} <span class="type-body" style="color: var(--color-ink-muted-48);">/ {{ $totalItems }}</span></h3>
                </div>
            </div>

            <div id="stat-rata" class="card-utility flex items-center gap-4">
                <div class="btn-pearl" style="width: 50px; height: 50px; border-radius: var(--radius-sm); border: none; background: var(--color-canvas-parchment); color: var(--color-primary);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <div>
                    <p class="type-micro mb-1" style="color: var(--color-ink-muted-80);">Rata-rata Evaluasi</p>
                    <h3 class="type-lead" style="color: var(--color-ink);">{{ $avgScore }}</h3>
                </div>
            </div>

            <div id="stat-progress" class="card-utility flex items-center gap-4">
                <div class="btn-pearl" style="width: 50px; height: 50px; border-radius: var(--radius-sm); border: none; background: var(--color-canvas-parchment); color: var(--color-primary);">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <div>
                    <p class="type-micro mb-1" style="color: var(--color-ink-muted-80);">Progres Belajar</p>
                    <h3 class="type-lead" style="color: var(--color-ink);">{{ $progressPercentage }}%</h3>
                </div>
            </div>
        </div>

        {{-- Modules List Container --}}
        <div id="modul-belajar" class="mt-12">
            <h3 class="type-lead mb-6 pb-4" style="border-bottom: 1px solid var(--color-hairline); color: var(--color-ink);">
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
                        <div class="card-utility flex flex-col justify-between transition-colors hover:border-[var(--color-primary)]">
                            <div>
                                <div class="flex justify-between items-start mb-3">
                                    <h4 class="type-body-strong" style="color: var(--color-ink);">
                                        @if($chapter->sequence == 0)
                                            Pengantar & Apersepsi
                                        @elseif($chapter->sequence == 99)
                                            Penilaian Akhir
                                        @else
                                            {{ $chapter->title }}
                                        @endif
                                    </h4>
                                    <span class="btn-pearl">
                                        @if($chapter->sequence == 0)
                                            Pendahuluan
                                        @elseif($chapter->sequence == 99)
                                            Evaluasi
                                        @else
                                            Bab {{ $chapter->sequence }}
                                        @endif
                                    </span>
                                </div>
                                <p class="type-caption mb-8 line-clamp-2" style="color: var(--color-ink-muted-80);">
                                    {{ $chapter->description ?? 'Materi pembelajaran interaktif Visualisasi dan Pengelompokan Data.' }}
                                </p>
                            </div>

                            <div>
                                <div class="flex justify-between type-caption-str mb-2" style="color: var(--color-ink);">
                                    <span>Progres Bab</span>
                                    <span>{{ $chapterPercentage }}%</span>
                                </div>
                                <div class="apple-progress-track mb-5">
                                    <div class="apple-progress-fill" style="width: {{ $chapterPercentage }}%;"></div>
                                </div>
                                
                                @if($chapterMaterials->isNotEmpty())
                                    <a href="{{ route('learning.show', $chapterMaterials->first()->slug) }}" class="{{ $chapterPercentage == 100 ? 'btn-secondary' : 'btn-primary' }} w-full text-center" style="display: block;">
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
                                        <a href="{{ route('quiz.show', $chapterQuiz->id) }}" class="btn-primary w-full text-center" style="display: block;">
                                            Mulai Evaluasi Akhir
                                        </a>
                                    @else
                                        <button disabled class="w-full text-center" style="background: var(--color-surface-pearl); color: var(--color-ink-muted-48); border: 1px solid var(--color-hairline); border-radius: var(--radius-pill); padding: 11px 22px; cursor: not-allowed; font-size: 17px;">
                                            Belum Ada Materi
                                        </button>
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
                        {{-- LOCKED CHAPTER --}}
                        <div class="card-utility" style="background: var(--color-canvas-parchment); position: relative; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between;">
                            <div class="absolute inset-0 flex flex-col items-center justify-center z-10" style="background: rgba(245, 245, 247, 0.7); backdrop-filter: saturate(180%) blur(8px);">
                                <span class="text-4xl mb-2">🔒</span>
                                <h4 class="type-body-strong" style="color: var(--color-ink);">Materi Terkunci</h4>
                                <p class="type-caption text-center px-8 mt-1" style="color: var(--color-ink-muted-80);">Selesaikan 100% materi di bab sebelumnya untuk membuka materi ini.</p>
                            </div>
                            
                            <div style="opacity: 0.3; pointer-events: none;">
                                <div>
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="type-body-strong" style="color: var(--color-ink);">Materi Tersembunyi</h4>
                                        <span class="btn-pearl">
                                            @if($chapter->sequence == 0) Pendahuluan @elseif($chapter->sequence == 99) Evaluasi @else Bab {{ $chapter->sequence }} @endif
                                        </span>
                                    </div>
                                    <p class="type-caption mb-8" style="color: var(--color-ink-muted-80);">Deskripsi materi ini disembunyikan untuk menjaga alur metode tutorial.</p>
                                </div>
                                <div>
                                    <div class="flex justify-between type-caption-str mb-2" style="color: var(--color-ink);">
                                        <span>Progres Bab</span><span>0%</span>
                                    </div>
                                    <div class="apple-progress-track mb-5"></div>
                                    <button disabled class="w-full text-center" style="background: var(--color-hairline); color: var(--color-ink-muted-48); border: none; border-radius: var(--radius-pill); padding: 11px 22px;">Terkunci</button>
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
            <div id="post-test-section" class="card-utility mt-8 flex flex-col md:flex-row items-center justify-between gap-6" style="background: var(--color-surface-pearl);">
                <div>
                    <h4 class="type-body-strong mb-1" style="color: var(--color-ink);">
                        🏆 Evaluasi Akhir Pembelajaran (Post-Test)
                    </h4>
                    <p class="type-caption" style="color: var(--color-ink-muted-80);">Kerjakan evaluasi akhir ini setelah menyelesaikan semua bab untuk mendapatkan nilai akhir.</p>
                </div>
                
                @if($progressPercentage == 100) 
                    <a href="{{ route('quiz.show', $postTest->id) }}" class="btn-primary text-center whitespace-nowrap">
                        {{ $isPostTestDone ? 'Lihat Hasil Evaluasi' : 'Mulai Evaluasi Akhir' }}
                    </a>
                @else
                    <button disabled title="Selesaikan semua bab terlebih dahulu" class="text-center whitespace-nowrap" style="background: var(--color-divider-soft); color: var(--color-ink-muted-48); border: none; border-radius: var(--radius-pill); padding: 11px 22px; font-size: 17px; cursor: not-allowed;">
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