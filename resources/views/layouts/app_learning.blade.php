<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Data - Learning Platform</title>
    
    {{-- FONT: Inter sebagai alternatif terdekat SF Pro Text/Display khas Apple --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { 
                extend: { 
                    fontFamily: { 
                        sans: ['"SF Pro Text"', '"Inter"', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['"SF Pro Display"', '"Inter"', 'system-ui', '-apple-system', 'sans-serif']
                    }, 
                    colors: { 
                        applePrimary: '#0066cc',
                        applePrimaryFocus: '#0071e3',
                        appleCanvas: '#ffffff',
                        appleParchment: '#f5f5f7',
                        appleInk: '#1d1d1f',
                        appleMuted: '#7a7a7a',
                        appleHairline: '#e0e0e0',
                    } 
                } 
            }
        }
    </script>

    {{-- ALPINE JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js', 'resources/js/simulation.js'])

    <style>
        /* =========================================
           APPLE DESIGN TOKENS (LIGHT THEME)
           ========================================= */
        :root {
            --color-primary:          #0066cc;
            --color-primary-focus:    #0071e3;
            --color-canvas:           #ffffff;
            --color-canvas-parchment: #f5f5f7;
            --color-surface-pearl:    #fafafc;
            --color-ink:              #1d1d1f;
            --color-ink-muted-80:     #333333;
            --color-ink-muted-48:     #7a7a7a;
            --color-divider-soft:     #f0f0f0;
            --color-hairline:         #e0e0e0;
            --radius-pill:            9999px;
        }

        body { 
            background-color: var(--color-canvas) !important; 
            color: var(--color-ink) !important; 
            overflow-x: hidden;
            font-family: 'SF Pro Text', 'Inter', system-ui, -apple-system, sans-serif;
            font-size: 17px;
            line-height: 1.47;
            letter-spacing: -0.374px;
            -webkit-font-smoothing: antialiased;
        }
        
        /* Sidebar Kiri: Menggunakan warna Parchment khas Apple (#f5f5f7) */
        .sidebar {
            background-color: var(--color-canvas-parchment) !important; 
            border-right: 1px solid var(--color-hairline) !important;
            z-index: 50;
        }
        
        /* Navigasi Aktif berbentuk Kapsul Biru Bersih */
        .nav-item.active {
            background: var(--color-primary) !important;
            color: #ffffff !important;
            border-radius: var(--radius-pill) !important;
            font-weight: 500;
            box-shadow: none;
            border: none;
        }
        
        .main-content { 
            margin-left: 280px;
            min-width: 0;
            width: 100%;
            overflow-x: hidden;
            background-color: var(--color-canvas) !important;
        }

        .content-wrapper-fix {
            width: 100%;
            min-width: 0;
            overflow-x: auto;
        }

        /* Navigasi Atas: Frosted Glass Transparan Putih Bersih */
        .apple-frosted-header {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: saturate(180%) blur(20px) !important;
            -webkit-backdrop-filter: saturate(180%) blur(20px) !important;
            border-bottom: 1px solid var(--color-hairline) !important;
        }

        @media (max-width: 768px) { 
            .main-content { margin-left: 0; } 
            .sidebar { transform: translateX(-100%); transition: transform 0.3s ease; } 
            .sidebar.open { transform: translateX(0); } 
        }

        /* macOS Style Scrollbar untuk Tema Terang */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0, 0, 0, 0.12); border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(0, 0, 0, 0.24); }

        /* ====================================================================
           GLOBAL NORMALIZATION PATCH v4 (Koreksi Mutlak Lab Mini & Form Kontras)
           ==================================================================== */
        /* 1. Mengatur teks dasar area bacaan utama (default gelap/mengikuti halaman anak) */
        .content-wrapper-fix h1, 
        .content-wrapper-fix h2, 
        .content-wrapper-fix h3, 
        .content-wrapper-fix h4, 
        .content-wrapper-fix p,
        .content-wrapper-fix li {
            color: #ffffff;
        }

        /* 2. Mempertegas teks cetak tebal (strong) bawaan artikel luar */
        .content-wrapper-fix strong {
            color: #ffffff;
            font-weight: 600;
        }

        /* 3. ISOLASI ELEMEN KOTAK TERANG: Memaksa teks judul, label, dan paragraf menjadi gelap */
        .content-wrapper-fix [class*="bg-[#f5f5f7]"] h1, .content-wrapper-fix [class*="bg-[#f5f5f7]"] h2,
        .content-wrapper-fix [class*="bg-[#f5f5f7]"] h3, .content-wrapper-fix [class*="bg-[#f5f5f7]"] h4,
        .content-wrapper-fix [class*="bg-[#f5f5f7]"] p,  .content-wrapper-fix [class*="bg-[#f5f5f7]"] li,
        .content-wrapper-fix [class*="bg-[#f5f5f7]"] strong,
        .content-wrapper-fix [class*="bg-[#fafafc]"] h1, .content-wrapper-fix [class*="bg-[#fafafc]"] h2,
        .content-wrapper-fix [class*="bg-[#fafafc]"] h3, .content-wrapper-fix [class*="bg-[#fafafc]"] h4,
        .content-wrapper-fix [class*="bg-[#fafafc]"] p,  .content-wrapper-fix [class*="bg-[#fafafc]"] li,
        .content-wrapper-fix [class*="bg-[#fafafc]"] label,
        .content-wrapper-fix [class*="bg-[#e7e1b1]"] * {
            color: var(--color-ink) !important;
        }

        /* 4. PROTEKSI INPUT & SELECT (Lab Mini): Memaksa background putih bersih dan teks gelap pekat */
        .content-wrapper-fix input[type="text"],
        .content-wrapper-fix select {
            background-color: #ffffff !important;
            color: var(--color-ink) !important;
            border: 1px solid var(--color-hairline) !important;
        }

        /* 5. PROTEKSI TOMBOL UTAMA (Primary CTA): Memaksa teks tombol biru menjadi putih bersih */
        .content-wrapper-fix button,
        .content-wrapper-fix [class*="bg-[#0066cc]"],
        .content-wrapper-fix [class*="bg-[#0066cc]"] span {
            color: #ffffff !important;
        }

        /* 6. PROTEKSI PANEL OUTPUT HITAM LAB MINI: Mengembalikan fungsionalitas teks terang di dalam terminal hitam */
        .content-wrapper-fix [class*="bg-[#1c1c1e]"],
        .content-wrapper-fix [class*="bg-[#1c1c1e]"] * {
            background-color: #1c1c1e !important;
            color: #ffffff !important;
        }
        .content-wrapper-fix [class*="bg-[#1c1c1e]"] .animate-pulse,
        .content-wrapper-fix [class*="bg-[#1c1c1e]"] div {
            color: #cccccc !important;
        }

        /* 7. Menghapus efek drop shadow hiasan agar flat elegan khas Apple */
        .shadow-2xl, .shadow-xl, .shadow-lg, .shadow-md, .shadow-inner {
            box-shadow: none !important;
        }
    </style>
</head>
<body class="selection:bg-applePrimary selection:text-white">
    
    <div class="app-layout min-h-screen flex">
        
        @if(Auth::check() && Auth::user()->role === 'teacher')
            @include('layouts.sidebar_teacher')
        @else
            @include('layouts.sidebar')
        @endif

        <main class="main-content flex-1 flex flex-col min-h-screen transition-all duration-300 relative z-10">
            
            {{-- HEADER: Apple Frosted Glass Style Terang --}}
            <header class="sticky top-0 z-40 apple-frosted-header px-6 py-3 flex items-center justify-between">
                
                <div class="flex items-center gap-4">
                    {{-- Hamburger Menu Button (Mobile) --}}
                    <button id="sidebar-toggle" class="md:hidden text-[#1d1d1f] hover:text-applePrimary transition-colors focus:outline-none">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    
                    {{-- Judul Halaman --}}
                    <h2 class="text-[21px] font-semibold text-[#1d1d1f] tracking-[0.231px] font-display">
                        @yield('header', 'Dashboard') 
                    </h2>
                </div>
                
                <div class="flex items-center gap-4">
                    {{-- TOMBOL PROFIL --}}
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 focus:outline-none group transition-transform duration-200" title="Profil Pengguna">
                        <div class="text-right hidden sm:block">
                            <div class="text-[14px] font-semibold text-[#1d1d1f] tracking-[-0.224px] leading-tight">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[12px] text-[#7a7a7a] tracking-[-0.12px] mt-0.5">
                                @if(Auth::user()->role == 'teacher')
                                    Guru Pengampu
                                @else
                                    Siswa
                                @endif
                            </div>
                        </div>
                        
                        {{-- Foto Profil Bundar ala Apple --}}
                        <img class="h-9 w-9 rounded-full border border-appleHairline group-hover:border-applePrimary object-cover transition-colors bg-white shadow-sm" 
                             src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=ffffff&background=1d1d1f' }}" 
                             alt="{{ Auth::user()->name }}">
                    </a>
                </div>
            </header>

            {{-- MAIN CONTENT AREA --}}
            <div class="p-6 md:p-8 content-wrapper-fix">
                @yield('content')
            </div>
        </main>
        
        {{-- Overlay Gelap untuk Sidebar di Mobile --}}
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/20 z-40 hidden md:hidden backdrop-blur-sm transition-opacity"></div>
    </div>

    {{-- SCRIPT TOGGLE SIDEBAR MOBILE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if(toggleBtn && sidebar && overlay) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.add('open'); 
                    overlay.classList.remove('hidden'); 
                });
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('open'); 
                    overlay.classList.add('hidden'); 
                });
            }
        });
    </script>
</body>
</html>