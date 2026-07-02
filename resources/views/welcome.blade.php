<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VisualData - Media Pembelajaran Interaktif</title>

    {{-- FONT: Inter sebagai fallback SF Pro --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- DRIVER.JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['SF Pro Text', 'SF Pro Display', 'Inter', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['SF Pro Display', 'Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        /* ── Apple Design Tokens ── */
        :root {
            --color-primary:          #0066cc;
            --color-primary-focus:    #0071e3;
            --color-primary-on-dark:  #2997ff;
            --color-canvas:           #ffffff;
            --color-canvas-parchment: #f5f5f7;
            --color-surface-pearl:    #fafafc;
            --color-surface-tile-1:   #272729;
            --color-surface-tile-2:   #2a2a2c;
            --color-surface-black:    #000000;
            --color-chip-translucent: rgba(210,210,215,0.64);
            --color-ink:              #1d1d1f;
            --color-ink-muted-80:     #333333;
            --color-ink-muted-48:     #7a7a7a;
            --color-on-dark:          #ffffff;
            --color-body-muted:       #cccccc;
            --color-divider-soft:     #f0f0f0;
            --color-hairline:         #e0e0e0;
            --space-lg:  24px;
            --space-section: 80px;
            --radius-sm:   8px;
            --radius-md:   11px;
            --radius-lg:   18px;
            --radius-pill: 9999px;
        }

        /* ── Base ── */
        html { scroll-behavior: smooth; }
        body {
            background: var(--color-canvas);
            color: var(--color-ink);
            font-family: 'SF Pro Text', 'Inter', system-ui, -apple-system, sans-serif;
            font-size: 17px;
            font-weight: 400;
            line-height: 1.47;
            letter-spacing: -0.374px;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ── Particles (dipertahankan, warna disesuaikan) ── */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: -1; pointer-events: none; }
        .particle {
            position: absolute; bottom: -100px;
            background: rgba(0,102,204,0.08);
            border-radius: 50%; opacity: 0.4;
            animation: rise 10s infinite linear;
            border: 1px solid rgba(0,102,204,0.15);
        }
        @keyframes rise {
            0%   { bottom: -100px; transform: translateX(0); }
            50%  { transform: translateX(50px); }
            100% { bottom: 120vh; transform: translateX(-50px); }
        }

        /* ── Navbar (global-nav style) ── */
        .global-nav {
            background: var(--color-surface-black);
            height: 44px;
            display: flex; align-items: center;
        }
        .global-nav a {
            color: var(--color-on-dark);
            font-size: 12px; font-weight: 400; letter-spacing: -0.12px;
            transition: opacity 0.15s;
        }
        .global-nav a:hover { opacity: 0.7; }

        /* ── Buttons ── */
        .btn-primary {
            background: var(--color-primary);
            color: #fff;
            border-radius: var(--radius-pill);
            padding: 11px 22px;
            font-size: 17px; font-weight: 400; letter-spacing: -0.374px;
            border: none; cursor: pointer;
            display: inline-block; text-decoration: none;
            transition: background 0.15s, transform 0.1s;
        }
        .btn-primary:hover { background: var(--color-primary-focus); }
        .btn-primary:active { transform: scale(0.95); }
        .btn-primary:focus-visible { outline: 2px solid var(--color-primary-focus); }

        .btn-store-hero {
            background: var(--color-primary);
            color: #fff;
            border-radius: var(--radius-pill);
            padding: 14px 28px;
            font-size: 18px; font-weight: 300;
            border: none; cursor: pointer;
            display: inline-block; text-decoration: none;
            transition: background 0.15s, transform 0.1s;
        }
        .btn-store-hero:hover { background: var(--color-primary-focus); }
        .btn-store-hero:active { transform: scale(0.95); }

        .btn-secondary {
            background: transparent;
            color: var(--color-primary);
            border: 1px solid var(--color-primary);
            border-radius: var(--radius-pill);
            padding: 11px 22px;
            font-size: 17px; font-weight: 400;
            cursor: pointer;
            display: inline-block; text-decoration: none;
            transition: background 0.15s, transform 0.1s;
        }
        .btn-secondary:hover { background: rgba(0,102,204,0.05); }
        .btn-secondary:active { transform: scale(0.95); }

        .btn-nav-dark {
            background: rgba(255,255,255,0.12);
            color: #fff;
            border-radius: var(--radius-sm);
            padding: 7px 14px;
            font-size: 13px; font-weight: 400;
            border: none; cursor: pointer;
            display: inline-block; text-decoration: none;
            transition: background 0.15s, transform 0.1s;
        }
        .btn-nav-dark:hover { background: rgba(255,255,255,0.2); }
        .btn-nav-dark:active { transform: scale(0.95); }

        .btn-nav-ghost {
            color: rgba(255,255,255,0.75);
            padding: 7px 10px;
            font-size: 13px; font-weight: 400;
            background: transparent; border: none; cursor: pointer;
            display: inline-block; text-decoration: none;
            transition: color 0.15s;
        }
        .btn-nav-ghost:hover { color: #fff; }

        /* ── Sections / Tiles ── */
        .tile-light {
            background: var(--color-canvas);
            color: var(--color-ink);
        }
        .tile-parchment {
            background: var(--color-canvas-parchment);
            color: var(--color-ink);
        }
        .tile-dark {
            background: var(--color-surface-tile-1);
            color: var(--color-on-dark);
        }
        .tile-dark-2 {
            background: var(--color-surface-tile-2);
            color: var(--color-on-dark);
        }

        /* ── Cards ── */
        .card-utility {
            background: var(--color-canvas);
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card-utility:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.07);
        }

        .card-dark {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            transition: transform 0.2s;
        }
        .card-dark:hover { transform: translateY(-4px); }

        /* ── Stat cards (hero) ── */
        .stat-card {
            background: var(--color-canvas);
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
        }
        .stat-card .stat-num {
            font-size: 34px; font-weight: 600;
            letter-spacing: -0.374px;
            color: var(--color-primary);
        }
        .stat-card .stat-label {
            font-size: 14px; color: var(--color-ink-muted-80);
            margin-top: 6px; letter-spacing: -0.224px;
        }

        /* ── Badge pill ── */
        .badge-pill {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 6px 16px;
            border-radius: var(--radius-pill);
            background: var(--color-canvas-parchment);
            border: 1px solid var(--color-hairline);
            font-size: 13px; font-weight: 600;
            color: var(--color-ink-muted-80);
            letter-spacing: -0.12px;
        }

        /* ── Section headers ── */
        .section-eyebrow {
            font-size: 12px; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: var(--color-primary);
            margin-bottom: 12px;
        }
        .section-title {
            font-family: 'SF Pro Display', 'Inter', system-ui, sans-serif;
            font-size: 40px; font-weight: 600;
            line-height: 1.10; letter-spacing: 0;
            color: var(--color-ink);
        }
        .section-title-dark { color: var(--color-on-dark); }
        .section-divider {
            width: 40px; height: 2px;
            background: var(--color-primary);
            margin: 16px auto 0;
            border-radius: 2px;
        }

        /* ── Icon badge ── */
        .icon-badge {
            width: 44px; height: 44px;
            border-radius: var(--radius-md);
            background: rgba(0,102,204,0.08);
            display: flex; align-items: center; justify-content: center;
            color: var(--color-primary);
            flex-shrink: 0;
            transition: transform 0.2s;
        }
        .card-utility:hover .icon-badge,
        .card-dark:hover .icon-badge { transform: scale(1.1); }

        /* ── Bab label chip ── */
        .chip-label {
            display: inline-block;
            font-size: 11px; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            padding: 4px 10px;
            border-radius: var(--radius-pill);
            border: 1px solid var(--color-hairline);
            color: var(--color-ink-muted-48);
            margin-bottom: 12px;
        }
        .chip-label-dark {
            border-color: rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.5);
        }

        /* ── Accordion ── */
        .accordion-item {
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            background: var(--color-canvas);
            overflow: hidden;
            margin-bottom: 8px;
        }
        .accordion-btn {
            width: 100%; text-align: left;
            padding: 18px 24px;
            font-size: 17px; font-weight: 600;
            color: var(--color-ink);
            background: transparent; border: none; cursor: pointer;
            display: flex; justify-content: space-between; align-items: center;
            letter-spacing: -0.374px;
            transition: background 0.15s;
        }
        .accordion-btn:hover { background: var(--color-canvas-parchment); }
        .accordion-icon {
            color: var(--color-ink-muted-48);
            font-size: 12px;
            transition: transform 0.25s;
        }
        .accordion-icon.open { transform: rotate(180deg); }
        .accordion-body {
            display: none;
            padding: 0 24px 24px;
            border-top: 1px solid var(--color-hairline);
            background: var(--color-canvas-parchment);
            font-size: 15px; line-height: 1.6;
            color: var(--color-ink-muted-80);
        }
        .accordion-body.open { display: block; }

        /* ── Step indicator ── */
        .step-num {
            width: 32px; height: 32px; flex-shrink: 0;
            border-radius: var(--radius-full);
            background: var(--color-primary);
            color: #fff;
            font-size: 14px; font-weight: 600;
            display: flex; align-items: center; justify-content: center;
        }
        .step-check {
            width: 32px; height: 32px; flex-shrink: 0;
            border-radius: var(--radius-full);
            background: var(--color-canvas-parchment);
            border: 1px solid var(--color-hairline);
            color: var(--color-primary);
            font-size: 14px;
            display: flex; align-items: center; justify-content: center;
        }
        .step-image-box {
            border-radius: var(--radius-lg);
            border: 1px solid var(--color-hairline);
            overflow: hidden;
            background: var(--color-canvas);
        }
        .step-image-box img {
            box-shadow: rgba(0,0,0,0.22) 3px 5px 30px 0; /* product shadow only on images */
        }

        /* ── Tabs ── */
        .tab-bar {
            display: flex;
            border-bottom: 1px solid var(--color-hairline);
            margin-bottom: 20px;
        }
        .tab-btn {
            padding: 10px 16px;
            font-size: 14px; font-weight: 400;
            border: none; background: transparent; cursor: pointer;
            border-bottom: 2px solid transparent;
            color: var(--color-ink-muted-48);
            transition: color 0.15s, border-color 0.15s;
            letter-spacing: -0.224px;
        }
        .tab-btn.active {
            color: var(--color-ink);
            border-bottom-color: var(--color-ink);
            font-weight: 600;
        }
        .tab-btn:hover:not(.active) { color: var(--color-ink-muted-80); }

        /* ── Info grid (profil) ── */
        .info-row {
            padding-bottom: 14px;
            border-bottom: 1px solid var(--color-divider-soft);
        }
        .info-label {
            font-size: 11px; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: var(--color-ink-muted-48);
            margin-bottom: 4px;
        }
        .info-value {
            font-size: 15px; font-weight: 400;
            color: var(--color-ink);
        }

        /* ── Contact box ── */
        .contact-box {
            background: var(--color-canvas-parchment);
            border-radius: var(--radius-md);
            padding: 16px;
            border: 1px solid var(--color-hairline);
        }
        .contact-link {
            color: var(--color-primary);
            font-weight: 400; font-size: 14px;
            text-decoration: none; letter-spacing: -0.224px;
        }
        .contact-link:hover { text-decoration: underline; }

        /* ── Driver.js theme ── */
        .driver-popover.driverjs-theme {
            background: var(--color-canvas);
            color: var(--color-ink);
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            font-family: 'SF Pro Text', 'Inter', system-ui, sans-serif;
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        .driver-popover.driverjs-theme .driver-popover-title {
            color: var(--color-ink);
            font-weight: 600;
            font-size: 17px;
        }
        .driver-popover.driverjs-theme button {
            background: var(--color-primary);
            color: #fff;
            border: none; text-shadow: none;
            border-radius: var(--radius-pill);
            padding: 8px 16px;
            font-size: 14px;
            transition: background 0.15s;
        }
        .driver-popover.driverjs-theme button:hover { background: var(--color-primary-focus); }
        .driver-overlay { background-color: rgba(0,0,0,0.55) !important; }

        /* ── Utility ── */
        .text-primary { color: var(--color-primary); }
        .text-primary-dark { color: var(--color-primary-on-dark); }
        .text-muted { color: var(--color-ink-muted-80); }
        .text-muted-light { color: var(--color-body-muted); }
        .link-primary { color: var(--color-primary); text-decoration: none; }
        .link-primary:hover { text-decoration: underline; }
        .link-dark { color: var(--color-primary-on-dark); text-decoration: none; }
        .link-dark:hover { text-decoration: underline; }

        .animate-fade-in { animation: fadeIn 0.3s ease-in-out forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Hero headline */
        .hero-h1 {
            font-family: 'SF Pro Display', 'Inter', system-ui, sans-serif;
            font-size: clamp(40px, 6vw, 56px);
            font-weight: 600;
            line-height: 1.07;
            letter-spacing: -0.28px;
            color: var(--color-ink);
        }
        .hero-lead {
            font-size: clamp(17px, 2vw, 21px);
            font-weight: 400;
            line-height: 1.47;
            letter-spacing: -0.374px;
            color: var(--color-ink-muted-80);
        }
    </style>
</head>
<body class="antialiased" style="selection-color: var(--color-primary);">

    {{-- Partikel latar ──────────────────────────────────────── --}}
    <div class="data-particles">
        <div class="particle" style="left:10%; width:4px; height:4px; animation-duration:8s;"></div>
        <div class="particle" style="left:30%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:70%; width:8px; height:8px; animation-duration:12s; animation-delay:2s;"></div>
        <div class="particle" style="left:50%; width:5px; height:5px; animation-duration:10s; animation-delay:0.5s;"></div>
        <div class="particle" style="left:85%; width:7px; height:7px; animation-duration:14s; animation-delay:3s;"></div>
    </div>

    {{-- NAVBAR ──────────────────────────────────────────────── --}}
    <nav class="global-nav fixed w-full z-50 top-0 start-0 px-6">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between">

            {{-- Logo --}}
            <a href="#" class="flex items-center gap-2" style="text-decoration:none;">
                <div style="width:22px;height:22px;background:var(--color-primary);border-radius:5px;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#fff;">V</div>
                <span style="color:#fff;font-size:15px;font-weight:600;letter-spacing:-0.2px;">Visual Data</span>
            </a>

            {{-- Menu desktop --}}
            <div class="hidden lg:flex items-center gap-6">
                <a id="nav-beranda"    href="#"             class="btn-nav-ghost">Beranda</a>
                <a id="nav-kompetensi" href="#kompetensi"   class="btn-nav-ghost">Kompetensi</a>
                <a id="nav-materi"     href="#daftar-materi" class="btn-nav-ghost">Daftar Materi</a>
                <a id="nav-petunjuk"   href="#petunjuk"     class="btn-nav-ghost">Petunjuk</a>
                <a id="nav-profil"     href="#profil"        class="btn-nav-ghost">Tentang Media</a>
            </div>

            {{-- Auth buttons --}}
            <div class="flex items-center gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary" style="font-size:13px;padding:7px 16px;">Masuk Kelas →</a>
                    @else
                        <a href="{{ route('role.selection') }}" class="btn-nav-ghost">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-nav-dark">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    {{-- 1. HERO ──────────────────────────────────────────────── --}}
    <section class="tile-light relative flex items-center justify-center" style="min-height:100vh;padding:120px 24px 80px;">

        <div style="position:absolute;top:20%;left:50%;transform:translateX(-50%);width:600px;height:400px;background:rgba(0,102,204,0.04);border-radius:50%;filter:blur(60px);pointer-events:none;"></div>

        <div class="relative text-center" style="max-width:860px;margin:0 auto;">

            <div class="badge-pill" style="margin-bottom:32px;">
                Media Pembelajaran Interaktif Berbasis Web
            </div>

            <h1 class="hero-h1" style="margin-bottom:24px;">
                Mari Belajar<br>
                <span class="text-primary">Visualisasi</span> dan<br>
                <span class="text-primary">Pengelompokan Data</span>
            </h1>

            <p class="hero-lead" style="max-width:600px;margin:0 auto 40px;">
                Pelajari materi konsep data, pengolahan data, visualisasi data, dan pengelompokan data
                melalui media pembelajaran interaktif berbasis web ini.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3" style="margin-bottom:64px;">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-store-hero">Mulai Belajar</a>
                @else
                    <a href="{{ route('register') }}" class="btn-store-hero">Daftar & Mulai Belajar</a>
                @endauth
                <a href="#daftar-materi" class="btn-secondary">Lihat Materi</a>
            </div>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="stat-card"><div class="stat-num">3</div><div class="stat-label">Bab Pembelajaran</div></div>
                <div class="stat-card"><div class="stat-num">10+</div><div class="stat-label">Materi Interaktif</div></div>
                <div class="stat-card"><div class="stat-num">100%</div><div class="stat-label">Berbasis Web</div></div>
            </div>

        </div>
    </section>

    {{-- 2. KOMPETENSI ─────────────────────────────────────────── --}}
    <section id="kompetensi" class="tile-parchment" style="padding:80px 24px;">
        <div style="max-width:1100px;margin:0 auto;">

            <div class="text-center" style="margin-bottom:48px;">
                <p class="section-eyebrow">Kurikulum</p>
                <h2 class="section-title">Capaian & Tujuan Pembelajaran</h2>
                <div class="section-divider"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Capaian Pembelajaran --}}
                <div class="card-utility">
                    <div class="icon-badge" style="margin-bottom:20px;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 style="font-size:17px;font-weight:600;letter-spacing:-0.374px;margin-bottom:12px;">Capaian Pembelajaran</h3>
                    <p style="font-size:14px;line-height:1.6;color:var(--color-ink-muted-80);letter-spacing:-0.224px;">
                        Pada akhir Fase F, peserta didik mampu memanfaatkan sumber data yang terbuka, terpercaya, dan legal
                        untuk mengumpulkan, mengolah, menyajikan, serta menginterpretasikan data secara efektif dan bertanggung
                        jawab guna mendukung pengambilan keputusan sederhana dengan atau tanpa bantuan komputer.
                    </p>
                </div>

                {{-- Bab 1 --}}
                <div class="card-utility">
                    <div class="icon-badge" style="margin-bottom:20px;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 style="font-size:17px;font-weight:600;letter-spacing:-0.374px;margin-bottom:12px;">Tujuan Pembelajaran Bab 1</h3>
                    <ul style="font-size:14px;line-height:1.8;color:var(--color-ink-muted-80);padding-left:16px;letter-spacing:-0.224px;">
                        <li>Menjelaskan pengertian data dan informasi.</li>
                        <li>Mengidentifikasi sumber data yang terbuka, terpercaya, dan legal.</li>
                        <li>Membedakan jenis serta struktur data.</li>
                        <li>Menerapkan tahapan pengolahan data.</li>
                        <li>Menerapkan prinsip etika data dalam penggunaan data.</li>
                    </ul>
                </div>

                {{-- Bab 2 --}}
                <div class="card-utility">
                    <div class="icon-badge" style="margin-bottom:20px;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3v18m8-14H7m10 4H7m8 4H7"/>
                        </svg>
                    </div>
                    <h3 style="font-size:17px;font-weight:600;letter-spacing:-0.374px;margin-bottom:12px;">Tujuan Pembelajaran Bab 2</h3>
                    <ul style="font-size:14px;line-height:1.8;color:var(--color-ink-muted-80);padding-left:16px;letter-spacing:-0.224px;">
                        <li>Menjelaskan tujuan dan manfaat visualisasi data.</li>
                        <li>Membuat dan menginterpretasikan diagram batang, histogram, box plot, dan scatter plot.</li>
                        <li>Menjelaskan konsep kemiripan data dan clustering.</li>
                        <li>Menginterpretasikan hasil pengelompokan data sederhana.</li>
                        <li>Menggunakan aplikasi web untuk visualisasi dan clustering data.</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- 3. DAFTAR MATERI ──────────────────────────────────────── --}}
    <section id="daftar-materi" class="tile-dark" style="padding:80px 24px;">
        <div style="max-width:1100px;margin:0 auto;">

            <div class="text-center" style="margin-bottom:48px;">
                <p class="section-eyebrow" style="color:var(--color-primary-on-dark);">Silabus</p>
                <h2 class="section-title section-title-dark">Daftar Isi Materi</h2>
                <div class="section-divider"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Bab 1 --}}
                <div class="card-dark">
                    <span class="chip-label chip-label-dark">BAB 1</span>
                    <h3 style="font-size:17px;font-weight:600;color:#fff;margin-bottom:16px;letter-spacing:-0.374px;">Data dan Pengolahannya</h3>
                    <ul style="font-size:14px;line-height:1.8;color:var(--color-body-muted);list-style:none;padding:0;">
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Pengertian Data & Informasi</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Sumber & Jenis Data (Kualitatif/Kuantitatif)</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Klasifikasi Struktur Data</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Tahapan Pengolahan Data</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Pembersihan Data (Data Cleaning)</li>
                    </ul>
                </div>

                {{-- Bab 2 --}}
                <div class="card-dark">
                    <span class="chip-label chip-label-dark">BAB 2</span>
                    <h3 style="font-size:17px;font-weight:600;color:#fff;margin-bottom:16px;letter-spacing:-0.374px;">Visualisasi & Pengelompokan</h3>
                    <ul style="font-size:14px;line-height:1.8;color:var(--color-body-muted);list-style:none;padding:0;">
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Pemilihan Jenis Visualisasi yang Tepat</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Diagram Batang & Histogram</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Box Plot & Deteksi Pencilan (Outlier)</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Scatter Plot & Analisis Korelasi</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Konsep Kemiripan & Algoritma K-Means</li>
                    </ul>
                </div>

                {{-- Evaluasi --}}
                <div class="card-dark">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                        <span class="chip-label chip-label-dark">Evaluasi</span>
                        <div style="width:36px;height:36px;border-radius:var(--radius-sm);background:rgba(41,151,255,0.12);display:flex;align-items:center;justify-content:center;">
                            <svg width="18" height="18" fill="none" stroke="var(--color-primary-on-dark)" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0"/>
                            </svg>
                        </div>
                    </div>
                    <h3 style="font-size:17px;font-weight:600;color:#fff;margin-bottom:16px;letter-spacing:-0.374px;">Uji Pemahaman</h3>
                    <ul style="font-size:14px;line-height:1.8;color:var(--color-body-muted);list-style:none;padding:0;">
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Kuis Formatif (Mini-Quiz tiap materi)</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Refleksi Capaian Kompetensi Siswa</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Syarat Kelulusan KKM (Nilai 70)</li>
                        <li style="display:flex;gap:8px;align-items:flex-start;"><span class="text-primary-dark" style="margin-top:2px;">→</span> Evaluasi Akhir Sumatif</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- 4. PETUNJUK ────────────────────────────────────────────── --}}
    <section id="petunjuk" class="tile-light" style="padding:80px 24px;">
        <div style="max-width:760px;margin:0 auto;">

            <div class="text-center" style="margin-bottom:48px;">
                <p class="section-eyebrow">Panduan</p>
                <h2 class="section-title">Petunjuk Penggunaan</h2>
                <div class="section-divider" style="margin-bottom:16px;"></div>
                <p style="font-size:14px;color:var(--color-ink-muted-48);letter-spacing:-0.224px;">
                    Pilih salah satu daftar di bawah untuk melihat tata cara penggunaan media pembelajaran.
                </p>
            </div>

            {{-- ACCORDION 1 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc1')">
                    <span style="display:flex;align-items:center;gap:12px;"><span>🏠</span> Halaman Beranda & Daftar Akun</span>
                    <span id="icon-acc1" class="accordion-icon">▾</span>
                </button>
                <div id="acc1" class="accordion-body">
                    <p style="text-align:center;margin:16px 0 24px;color:var(--color-ink-muted-80);font-size:14px;">
                        Panduan langkah demi langkah untuk mendaftar akun dan masuk ke platform Visual Data.
                    </p>
                    <div style="display:flex;flex-direction:column;gap:28px;">

                        <div style="display:flex;flex-wrap:wrap;gap:16px;align-items:flex-start;">
                            <div class="step-image-box" style="flex:0 0 240px;">
                                <img src="{{ asset('images/Petunjuk 1.png') }}" alt="Petunjuk Langkah 1" style="width:100%;height:auto;max-height:160px;object-fit:contain;">
                            </div>
                            <div style="flex:1;min-width:200px;display:flex;gap:12px;">
                                <div class="step-num">1</div>
                                <div>
                                    <p style="font-weight:600;color:var(--color-ink);margin-bottom:4px;">Akses Halaman Daftar</p>
                                    <p style="font-size:14px;color:var(--color-ink-muted-80);">Klik menu <strong>Daftar</strong> pada Navbar atau tombol "Daftar Sekarang" pada Beranda untuk menuju halaman pendaftaran.</p>
                                </div>
                            </div>
                        </div>

                        <div style="display:flex;flex-wrap:wrap;gap:16px;align-items:flex-start;">
                            <div class="step-image-box" style="flex:0 0 240px;">
                                <img src="{{ asset('images/Petunjuk 2.png') }}" alt="Petunjuk Langkah 2" style="width:100%;height:auto;max-height:160px;object-fit:contain;">
                            </div>
                            <div style="flex:1;min-width:200px;display:flex;gap:12px;">
                                <div class="step-num">2</div>
                                <div>
                                    <p style="font-weight:600;color:var(--color-ink);margin-bottom:4px;">Lengkapi Data Diri</p>
                                    <p style="font-size:14px;color:var(--color-ink-muted-80);">Isi formulir meliputi <strong>Nama Lengkap, Email (aktif), dan Kata Sandi</strong>.</p>
                                </div>
                            </div>
                        </div>

                        <div style="display:flex;flex-wrap:wrap;gap:16px;align-items:flex-start;">
                            <div class="step-image-box" style="flex:0 0 240px;">
                                <img src="{{ asset('images/Petunjuk 3.png') }}" alt="Petunjuk Langkah 3" style="width:100%;height:auto;max-height:160px;object-fit:contain;">
                            </div>
                            <div style="flex:1;min-width:200px;display:flex;gap:12px;">
                                <div class="step-num">3</div>
                                <div>
                                    <p style="font-weight:600;color:var(--color-ink);margin-bottom:4px;">Konfirmasi Pendaftaran</p>
                                    <p style="font-size:14px;color:var(--color-ink-muted-80);">Klik <strong>Daftar Sekarang</strong>. Jika berhasil, kamu langsung masuk ke Dashboard Siswa.</p>
                                </div>
                            </div>
                        </div>

                        <div style="display:flex;flex-wrap:wrap;gap:16px;align-items:flex-start;padding-top:20px;border-top:1px solid var(--color-hairline);">
                            <div class="step-image-box" style="flex:0 0 240px;">
                                <img src="{{ asset('images/Petunjuk 4.png') }}" alt="Petunjuk Langkah 4" style="width:100%;height:auto;max-height:160px;object-fit:contain;">
                            </div>
                            <div style="flex:1;min-width:200px;display:flex;gap:12px;">
                                <div class="step-check">✓</div>
                                <div>
                                    <p style="font-weight:600;color:var(--color-ink);margin-bottom:4px;">Opsi Lain: Masuk (Login)</p>
                                    <p style="font-size:14px;color:var(--color-ink-muted-80);">Jika sudah punya akun, klik <strong>Masuk Kelas</strong> atau menu Masuk untuk login.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- ACCORDION 2 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc2')">
                    <span style="display:flex;align-items:center;gap:12px;"><span>📖</span> Halaman Materi Belajar</span>
                    <span id="icon-acc2" class="accordion-icon">▾</span>
                </button>
                <div id="acc2" class="accordion-body">
                    <ol style="padding-left:20px;display:flex;flex-direction:column;gap:20px;">
                        <li>
                            Baca materi secara <strong>berurutan</strong>. Sub materi terkunci (ikon gembok) hanya terbuka setelah menyelesaikan materi sebelumnya.
                            <div class="step-image-box" style="margin-top:12px;">
                                <img src="{{ asset('images/Petunjuk 5.png') }}" alt="Materi Terkunci" style="width:100%;height:auto;object-fit:cover;">
                            </div>
                        </li>
                        <li>
                            Baca teks penjelasan dan amati <strong>Gambar/Video Animasi</strong> dengan saksama.
                            <div class="step-image-box" style="margin-top:12px;">
                                <img src="{{ asset('images/Petunjuk 6.png') }}" alt="Simulasi Interaktif" style="width:100%;height:auto;object-fit:cover;">
                            </div>
                        </li>
                        <li>
                            Gunakan tombol <strong>Materi Selanjutnya</strong> di bagian bawah untuk berpindah materi.
                            <div class="step-image-box" style="margin-top:12px;">
                                <img src="{{ asset('images/Petunjuk 7.png') }}" alt="Tombol Selanjutnya" style="width:100%;height:auto;object-fit:cover;">
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            {{-- ACCORDION 3 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc3')">
                    <span style="display:flex;align-items:center;gap:12px;"><span>🏆</span> Kuis dan Syarat Kelulusan</span>
                    <span id="icon-acc3" class="accordion-icon">▾</span>
                </button>
                <div id="acc3" class="accordion-body">
                    <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:20px;">
                        <li style="display:flex;gap:12px;align-items:flex-start;">
                            <div style="width:20px;height:20px;flex-shrink:0;border-radius:50%;background:var(--color-primary);color:#fff;font-size:11px;display:flex;align-items:center;justify-content:center;margin-top:2px;">!</div>
                            <div>
                                <strong>Mini-Quiz Formatif:</strong> Di akhir setiap sub-bab. Harus dijawab benar untuk menuntaskan bab.
                                <div class="step-image-box" style="margin-top:10px;">
                                    <img src="{{ asset('images/Petunjuk_Kuis1.png') }}" alt="Kuis Formatif" style="width:100%;height:auto;object-fit:cover;">
                                </div>
                            </div>
                        </li>
                        <li style="display:flex;gap:12px;align-items:flex-start;">
                            <div style="width:20px;height:20px;flex-shrink:0;border-radius:50%;background:var(--color-primary);color:#fff;font-size:11px;display:flex;align-items:center;justify-content:center;margin-top:2px;">!</div>
                            <div>
                                <strong>Evaluasi Akhir (Sumatif):</strong> Mengukur pemahaman keseluruhan di akhir setiap Bab.
                                <div class="step-image-box" style="margin-top:10px;">
                                    <img src="{{ asset('images/Petunjuk_Kuis2.png') }}" alt="Evaluasi Akhir" style="width:100%;height:auto;object-fit:cover;">
                                </div>
                            </div>
                        </li>
                        <li style="display:flex;gap:12px;align-items:flex-start;">
                            <div style="width:20px;height:20px;flex-shrink:0;border-radius:50%;background:var(--color-primary);color:#fff;font-size:11px;display:flex;align-items:center;justify-content:center;margin-top:2px;">!</div>
                            <div>
                                <strong>Syarat Kelulusan:</strong> Nilai evaluasi harus memenuhi <strong>KKM (Nilai 70)</strong>. Jika gagal, kamu bisa mengulangi.
                                <div class="step-image-box" style="margin-top:10px;">
                                    <img src="{{ asset('images/Petunjuk_Kuis3.png') }}" alt="Kelulusan KKM" style="width:100%;height:auto;object-fit:cover;">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- ACCORDION 4 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc4')">
                    <span style="display:flex;align-items:center;gap:12px;"><span>🕹️</span> Fitur Simulator Interaktif</span>
                    <span id="icon-acc4" class="accordion-icon">▾</span>
                </button>
                <div id="acc4" class="accordion-body">
                    <p style="margin-bottom:12px;">
                        Kamu akan menemukan kotak <strong>Simulator Lab</strong> di tengah materi untuk memahami secara teknis, bukan sekadar teori.
                    </p>
                    <ol style="padding-left:20px;display:flex;flex-direction:column;gap:8px;margin-bottom:16px;font-size:14px;color:var(--color-ink-muted-80);">
                        <li>Gunakan <strong>Slider/Tombol Geser</strong> untuk mengubah parameter secara real-time.</li>
                        <li>Tekan <strong>"Proses Data" / "Deteksi"</strong> untuk melihat eksekusi rumus.</li>
                        <li>Amati perubahan pada grafik atau tabel.</li>
                    </ol>
                    <div class="step-image-box">
                        <img src="{{ asset('images/Petunjuk_Simulator.png') }}" alt="Simulator DataViz Studio" style="width:100%;height:auto;object-fit:cover;">
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- 5. PROFIL ───────────────────────────────────────────────── --}}
    <section id="profil" class="tile-parchment" style="padding:80px 24px;">
        <div style="max-width:960px;margin:0 auto;">

            <div class="text-center" style="margin-bottom:48px;">
                <p class="section-eyebrow">Pengembang</p>
                <h2 class="section-title">Tentang Media Ini</h2>
                <div class="section-divider"></div>
            </div>

            {{-- Info card --}}
            <div class="card-utility" style="border-top:3px solid var(--color-primary);margin-bottom:24px;">
                <div style="display:flex;align-items:center;gap:8px;padding-bottom:16px;margin-bottom:20px;border-bottom:1px solid var(--color-hairline);">
                    <svg width="18" height="18" fill="none" stroke="var(--color-primary)" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span style="font-size:14px;font-weight:600;color:var(--color-primary);letter-spacing:-0.224px;">Informasi Pengembangan</span>
                </div>

                <p style="font-size:14px;text-align:center;color:var(--color-ink-muted-48);font-style:italic;margin-bottom:24px;max-width:560px;margin-left:auto;margin-right:auto;">
                    Media pembelajaran ini dibuat untuk memenuhi persyaratan penyelesaian studi Program Strata-1 Pendidikan Komputer.
                </p>

                <h4 style="font-size:21px;font-weight:600;text-align:center;color:var(--color-ink);letter-spacing:0.231px;line-height:1.4;margin-bottom:32px;">
                    Pengembangan Media Pembelajaran Berbasis Web Pada Materi Visualisasi dan Pengelompokan Data Menggunakan Model Tutorial Untuk Siswa SMA
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4">
                    <div class="info-row"><p class="info-label">Nama Peneliti</p><p class="info-value" style="font-weight:600;">Muhammad Fikri Ramadhan</p></div>
                    <div class="info-row"><p class="info-label">Email / Kontak</p><p class="info-value"><a href="mailto:2210131210001@mhs.ulm.ac.id" class="link-primary" style="font-size:14px;">2210131210001@mhs.ulm.ac.id</a></p></div>
                    <div class="info-row"><p class="info-label">Dosen Pembimbing 1</p><p class="info-value">Drs. Harja Santana Purba, M.Kom., Ph.D.</p></div>
                    <div class="info-row"><p class="info-label">Dosen Pembimbing 2</p><p class="info-value">Delsika Pramata Sari, S.Pd., M.Pd</p></div>
                    <div class="info-row"><p class="info-label">Program Studi</p><p class="info-value">S-1 Pendidikan Komputer</p></div>
                    <div class="info-row"><p class="info-label">Instansi</p><p class="info-value">Universitas Lambung Mangkurat</p></div>
                </div>
            </div>

            {{-- Referensi & Bantuan --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Referensi tabs --}}
                <div class="card-utility lg:col-span-2" style="border-left:3px solid var(--color-primary);">
                    <h4 style="font-size:15px;font-weight:600;margin-bottom:16px;display:flex;align-items:center;gap:8px;">
                        <span>📑</span> Referensi & Atribusi
                    </h4>

                    <div class="tab-bar">
                        <button onclick="switchTab('pustaka')" id="tab-btn-pustaka" class="tab-btn active">Daftar Pustaka</button>
                        <button onclick="switchTab('atribusi')" id="tab-btn-atribusi" class="tab-btn">Atribusi</button>
                    </div>

                    <div id="tab-content-pustaka" class="animate-fade-in">
                        <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:12px;font-size:13px;line-height:1.6;color:var(--color-ink-muted-80);">
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Basra, N., Singh, D., & Kaur, K. (2025). Introduction to data visualization. In <em>Fundamentals of data handling and visualization</em> (pp. 7-42). Bhumi Publishing.</span></li>
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Chaerani, D., et al. (2024). <em>Informatika untuk SMA/MA Kelas XI (Edisi Revisi)</em>. Kemendikbudristek RI.</span></li>
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Ikhwanudin, A., & Purbo, O. (2025). Data Adalah Kunci. In <em>AI di tanganmu</em> (pp. 29-44). Institut Teknologi Tangerang Selatan.</span></li>
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Junaidi, & Purbo, O. (2025). Pengenalan Orange Data Mining. In <em>Langkah awal jadi data scientist</em> (pp. 45-94). Institut Teknologi Tangerang Selatan.</span></li>
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Permana, B., et al. (2022). <em>Informatika untuk SMA/MA Kelas XII</em>. Kemendikbudristek RI.</span></li>
                        </ul>
                    </div>
                    <div id="tab-content-atribusi" class="hidden animate-fade-in">
                        <ul style="list-style:none;padding:0;display:flex;flex-direction:column;gap:12px;font-size:13px;line-height:1.6;color:var(--color-ink-muted-80);">
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>UI dikembangkan menggunakan <a href="https://tailwindcss.com/" target="_blank" class="link-primary">Tailwind CSS</a>.</span></li>
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Tutorial interaktif menggunakan <a href="https://driverjs.com/" target="_blank" class="link-primary">Driver.js</a>.</span></li>
                            <li style="display:flex;gap:8px;"><span class="text-primary" style="margin-top:2px;flex-shrink:0;">✔</span> <span>Simulator terinspirasi dari <a href="https://orangedatamining.com/" target="_blank" class="link-primary">Orange Data Mining</a>.</span></li>
                        </ul>
                    </div>
                </div>

                {{-- Bantuan --}}
                <div class="card-utility" style="border-left:3px solid var(--color-primary);">
                    <h4 style="font-size:15px;font-weight:600;margin-bottom:12px;display:flex;align-items:center;gap:8px;"><span>📞</span> Pusat Bantuan</h4>
                    <p style="font-size:13px;color:var(--color-ink-muted-80);margin-bottom:16px;line-height:1.6;">
                        Kendala teknis (login gagal, materi terkunci, bug)? Hubungi:
                    </p>
                    <div class="contact-box" style="display:flex;flex-direction:column;gap:12px;">
                        <div style="display:flex;align-items:center;gap:10px;">
                            <span>📧</span>
                            <a href="mailto:2210131210001@mhs.ulm.ac.id" class="contact-link" style="word-break:break-all;">2210131210001@mhs.ulm.ac.id</a>
                        </div>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <span>💬</span>
                            <a href="https://wa.me/6285824427310" target="_blank" class="contact-link">+62 858-2442-7310 (WA)</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- FOOTER ──────────────────────────────────────────────────── --}}
    <footer style="background:var(--color-canvas-parchment);border-top:1px solid var(--color-hairline);padding:40px 24px;text-align:center;">
        <div style="display:flex;align-items:center;justify-content:center;gap:8px;margin-bottom:12px;opacity:0.6;">
            <div style="width:20px;height:20px;background:var(--color-primary);border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;">V</div>
            <span style="font-size:15px;font-weight:600;color:var(--color-ink);">Visual Data</span>
        </div>
        <p style="font-size:12px;color:var(--color-ink-muted-48);letter-spacing:-0.12px;">
            © {{ date('Y') }} Muhammad Fikri Ramadhan — Pendidikan Komputer ULM. All rights reserved.
        </p>
    </footer>

    {{-- SCRIPTS ─────────────────────────────────────────────────── --}}
    <script>
        function toggleAcc(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById('icon-' + id);
            const isOpen = content.classList.contains('open');
            if (isOpen) {
                content.classList.remove('open');
                icon.classList.remove('open');
            } else {
                content.classList.add('open');
                icon.classList.add('open');
            }
        }
    </script>

    <script>
        function switchTab(tabName) {
            const btnPustaka   = document.getElementById('tab-btn-pustaka');
            const btnAtribusi  = document.getElementById('tab-btn-atribusi');
            const contPustaka  = document.getElementById('tab-content-pustaka');
            const contAtribusi = document.getElementById('tab-content-atribusi');

            if (tabName === 'pustaka') {
                btnPustaka.className  = 'tab-btn active';
                btnAtribusi.className = 'tab-btn';
                contPustaka.classList.remove('hidden');
                contAtribusi.classList.add('hidden');
            } else {
                btnAtribusi.className = 'tab-btn active';
                btnPustaka.className  = 'tab-btn';
                contAtribusi.classList.remove('hidden');
                contPustaka.classList.add('hidden');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const driver = window.driver.js.driver;
            const driverObj = driver({
                showProgress: true,
                animate: true,
                allowClose: false,
                nextBtnText: 'Lanjut →',
                prevBtnText: '← Kembali',
                doneBtnText: 'Selesai',
                popoverClass: 'driverjs-theme',
                steps: [
                    { element: '#nav-kompetensi', popover: { title: 'Kompetensi', description: 'Lihat daftar KI, KD, dan Indikator yang akan dicapai di sini.' } },
                    { element: '#nav-materi',     popover: { title: 'Daftar Materi', description: 'Lihat daftar silabus Bab yang akan kamu pelajari.' } },
                    { element: '#nav-petunjuk',   popover: { title: 'Petunjuk Penggunaan', description: 'Baca panduan lengkap cara menggunakan sistem pembelajaran ini.' } },
                    { element: '#nav-profil',     popover: { title: 'Profil & Info', description: 'Informasi mengenai peneliti dan atribusi aplikasi.' } },
                ]
            });
            if (!localStorage.getItem('tutorial_landing_v2')) {
                setTimeout(() => {
                    driverObj.drive();
                    localStorage.setItem('tutorial_landing_v2', 'true');
                }, 1000);
            }
        });
    </script>

</body>
</html>