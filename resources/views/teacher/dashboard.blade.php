@extends('layouts.app_learning')

@section('header', 'Dashboard Pengajar')

@section('content')

@php
    $classAvg = 0;
    if(isset($quizPerformance) && count($quizPerformance) > 0) {
        $classAvg = $quizPerformance->avg('attempts_avg_score') ?? 0;
    }
@endphp

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
    .type-display-lg  { font-size: 40px; font-weight: 600; line-height: 1.10; letter-spacing: 0; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-display-md  { font-size: 34px; font-weight: 600; line-height: 1.47; letter-spacing: -0.374px; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-lead        { font-size: 28px; font-weight: 600; line-height: 1.14; letter-spacing: 0.196px; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-tagline     { font-size: 21px; font-weight: 600; line-height: 1.19; letter-spacing: 0.231px; font-family: 'SF Pro Display', 'Inter', sans-serif; }
    .type-body-strong { font-size: 17px; font-weight: 600; line-height: 1.24; letter-spacing: -0.374px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-body        { font-size: 17px; font-weight: 400; line-height: 1.47; letter-spacing: -0.374px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-caption     { font-size: 14px; font-weight: 400; line-height: 1.43; letter-spacing: -0.224px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-caption-str { font-size: 14px; font-weight: 600; line-height: 1.29; letter-spacing: -0.224px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-btn-util    { font-size: 14px; font-weight: 400; line-height: 1.29; letter-spacing: -0.224px; font-family: 'SF Pro Text', 'Inter', sans-serif; }
    .type-micro       { font-size: 10px; font-weight: 600; line-height: 1.3;  letter-spacing: -0.08px; font-family: 'SF Pro Text', 'Inter', sans-serif; text-transform: uppercase; }

    /* COMPONENTS */
    .card-utility {
        background: var(--color-canvas);
        border: 1px solid var(--color-hairline);
        border-radius: var(--radius-lg);
        padding: var(--space-lg);
        box-shadow: none; /* Apple tidak pakai shadow di UI chrome */
    }

    .btn-primary {
        background: var(--color-primary);
        color: #fff;
        border-radius: var(--radius-pill);
        padding: 8px 16px;
        font-size: 14px; font-weight: 400; letter-spacing: -0.224px;
        border: none; cursor: pointer; text-decoration: none;
        display: inline-flex; align-items: center; justify-content: center;
        transition: transform 0.1s;
    }
    .btn-primary:active { transform: scale(0.95); }
    .btn-primary:hover  { background: var(--color-primary-focus); }

    .btn-pearl {
        background: var(--color-surface-pearl);
        color: var(--color-ink-muted-80);
        border-radius: var(--radius-md);
        border: 1px solid var(--color-hairline);
        padding: 8px 14px;
        font-size: 14px; font-weight: 600;
        display: inline-flex; align-items: center; justify-content: center;
    }

    /* Progress Bar */
    .apple-progress-track {
        width: 100%;
        background: var(--color-divider-soft);
        border-radius: var(--radius-pill);
        height: 6px;
        overflow: hidden;
    }
    .apple-progress-fill {
        height: 100%;
        border-radius: var(--radius-pill);
        background: var(--color-primary); /* Semua bar berwarna biru khas Apple */
    }
    
    /* Layout Adjustments */
    .dashboard-container {
        padding-bottom: var(--space-xxl);
    }
</style>

<div class="dashboard-container space-y-8">
    
    {{-- 1. HEADER RINGKASAN (KPI) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Card Total Siswa --}}
        <div class="card-utility flex items-center gap-4">
            <div class="btn-pearl" style="width: 56px; height: 56px; border-radius: var(--radius-md);">
                <span style="font-size: 24px;">👥</span>
            </div>
            <div>
                <p class="type-micro" style="color: var(--color-ink-muted-48); margin-bottom: 2px;">Total Siswa Terdaftar</p>
                <h3 class="type-display-md" style="color: var(--color-ink);">{{ $totalStudents }}</h3>
            </div>
        </div>

        {{-- Card Rata-rata Kelas --}}
        <div class="card-utility flex items-center gap-4">
            <div class="btn-pearl" style="width: 56px; height: 56px; border-radius: var(--radius-md);">
                <span style="font-size: 24px;">📈</span>
            </div>
            <div>
                <p class="type-micro" style="color: var(--color-ink-muted-48); margin-bottom: 2px;">Rata-rata Evaluasi Kelas</p>
                <div class="flex items-baseline gap-1">
                    <h3 class="type-display-md" style="color: var(--color-ink);">{{ number_format($classAvg, 1) }}</h3>
                    <span class="type-caption-str" style="color: var(--color-ink-muted-48);">/ 100</span>
                </div>
            </div>
        </div>

        {{-- Card Total Ujian --}}
        <div class="card-utility flex items-center gap-4">
            <div class="btn-pearl" style="width: 56px; height: 56px; border-radius: var(--radius-md);">
                <span style="font-size: 24px;">📝</span>
            </div>
            <div>
                <p class="type-micro" style="color: var(--color-ink-muted-48); margin-bottom: 2px;">Data Ujian Terkumpul</p>
                <div class="flex items-baseline gap-1">
                    <h3 class="type-display-md" style="color: var(--color-ink);">{{ $totalAttempts }}</h3>
                    <span class="type-caption-str" style="color: var(--color-ink-muted-48);">Sesi</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. DASHBOARD CONTENT --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
        
        {{-- A. STATISTIK NILAI KUIS --}}
        <div class="card-utility">
            <h3 class="type-lead" style="color: var(--color-ink); margin-bottom: 4px;">Performa per Evaluasi</h3>
            <p class="type-caption" style="color: var(--color-ink-muted-80); margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid var(--color-hairline);">
                Memantau rata-rata nilai siswa pada setiap modul kuis yang tersedia.
            </p>
            
            <div class="space-y-6">
                @forelse($quizPerformance as $quiz)
                    @php 
                        $avg = $quiz->attempts_avg_score ?? 0;
                    @endphp
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <span class="type-body-strong" style="color: var(--color-ink);">
                                {{ Str::limit($quiz->title, 40) }}
                            </span>
                            <div class="flex items-center gap-2">
                                @if($avg >= 70) 
                                    <span class="type-micro" style="color: var(--color-ink-muted-80); background: var(--color-surface-pearl); padding: 4px 8px; border-radius: var(--radius-sm); border: 1px solid var(--color-hairline);">
                                        Lulus KKM
                                    </span> 
                                @endif
                                <span class="type-body-strong" style="color: var(--color-ink); min-width: 3rem; text-align: right;">
                                    {{ number_format($avg, 1) }}
                                </span>
                            </div>
                        </div>
                        <div class="apple-progress-track">
                            <div class="apple-progress-fill" style="width: {{ $avg }}%;"></div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 flex flex-col items-center justify-center">
                        <span style="font-size: 40px; color: var(--color-hairline); margin-bottom: 12px;">📭</span>
                        <p class="type-body" style="color: var(--color-ink-muted-80);">Belum ada data evaluasi yang dikerjakan siswa.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- B. SISWA DENGAN N-GAIN TERBAIK --}}
        <div class="card-utility flex flex-col">
            <div class="flex justify-between items-start mb-4 pb-4 border-b" style="border-color: var(--color-hairline);">
                <div>
                    <h3 class="type-lead" style="color: var(--color-ink); margin-bottom: 4px;">Efektivitas Belajar</h3>
                    <p class="type-caption" style="color: var(--color-ink-muted-80); max-width: 280px;">
                        Peningkatan pemahaman terbaik (Post-Test dan Pre-Test).
                    </p>
                </div>
                <a href="{{ route('teacher.gradebook') }}" class="btn-primary" style="padding: 8px 16px;">
                    Buku Nilai &rarr;
                </a>
            </div>

            <div class="flex-1 mt-2">
                <ul class="space-y-0">
                    @forelse($topStudents as $student)
                        <li class="flex items-center justify-between py-4 border-b last:border-0" style="border-color: var(--color-divider-soft);">
                            
                            <div class="flex items-center gap-4">
                                {{-- Rank Badge --}}
                                <div class="btn-pearl" style="width: 44px; height: 44px; padding: 0; border-radius: var(--radius-full); background: {{ $loop->iteration <= 3 ? 'var(--color-surface-pearl)' : 'transparent' }}; border-color: var(--color-hairline);">
                                    #{{ $loop->iteration }}
                                </div>
                                
                                {{-- Avatar --}}
                                <img src="{{ $student->profile_photo_url }}" class="w-12 h-12 rounded-full object-cover" style="border: 1px solid var(--color-hairline);">
                                
                                {{-- User Info --}}
                                <div>
                                    <p class="type-body-strong" style="color: var(--color-ink); margin-bottom: 2px;">{{ $student->name }}</p>
                                    <p class="type-caption" style="color: var(--color-ink-muted-80);">{{ $student->email }}</p>
                                </div>
                            </div>
                            
                            {{-- Gain Status --}}
                            <div class="text-right flex flex-col items-end">
                                <span class="type-micro" style="color: var(--color-ink-muted-48); margin-bottom: 4px;">Skor Peningkatan</span>
                                <span class="type-caption-str" style="color: var(--color-primary);">
                                    ↗ Tinggi
                                </span>
                            </div>
                            
                        </li>
                    @empty
                        <div class="h-full flex flex-col items-center justify-center text-center py-10">
                            <span style="font-size: 40px; color: var(--color-hairline); margin-bottom: 12px;">📭</span>
                            <p class="type-body-strong" style="color: var(--color-ink); margin-bottom: 4px;">Belum ada perhitungan N-Gain.</p>
                            <p class="type-caption" style="color: var(--color-ink-muted-80); max-width: 250px;">Data akan muncul setelah siswa menyelesaikan Pre-Test dan Post-Test.</p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection