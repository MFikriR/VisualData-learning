<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Akses - VisualData</title>
    
    {{-- FONT: Inter sebagai fallback terdekat SF Pro Text/Display khas Apple --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/js/app.js']) 
    
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
            --color-chip-translucent: rgba(0, 102, 204, 0.08); /* Disesuaikan ke nuansa biru */

            /* Text */
            --color-ink:              #1d1d1f;
            --color-ink-muted-80:     #333333;
            --color-ink-muted-48:     #7a7a7a;
            --color-on-dark:          #ffffff;

            /* Border */
            --color-divider-soft:     #f0f0f0;
            --color-hairline:         #e0e0e0;

            /* Spacing */
            --space-xs:      8px;
            --space-sm:      12px;
            --space-md:      17px;
            --space-lg:      24px;
            --space-xl:      32px;
            --space-xxl:     48px;

            /* Border Radius */
            --radius-none: 0px;
            --radius-xs:   5px;
            --radius-sm:   8px;
            --radius-md:   11px;
            --radius-lg:   18px;
            --radius-pill: 9999px;
            --radius-full: 9999px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'SF Pro Text', 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--color-canvas-parchment);
            color: var(--color-ink);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            margin: 0; padding: 0;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            min-height: 100vh;
        }

        /* TYPOGRAPHY */
        .type-display-md  { font-size: 34px; font-weight: 600; line-height: 1.14; letter-spacing: 0.196px; font-family: 'SF Pro Display', 'Inter', sans-serif;}
        .type-lead        { font-size: 28px; font-weight: 600; line-height: 1.14; letter-spacing: 0.196px; font-family: 'SF Pro Display', 'Inter', sans-serif;}
        .type-body-strong { font-size: 17px; font-weight: 600; line-height: 1.24; letter-spacing: -0.374px; }
        .type-body        { font-size: 17px; font-weight: 400; line-height: 1.47; letter-spacing: -0.374px; }
        .type-caption-str { font-size: 14px; font-weight: 600; line-height: 1.29; letter-spacing: -0.224px; }
        .type-caption     { font-size: 14px; font-weight: 400; line-height: 1.43; letter-spacing: -0.224px; }

        /* COMPONENTS */
        .logo-mark {
            width: 48px; height: 48px; background: var(--color-ink);
            border-radius: var(--radius-sm); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-family: 'SF Pro Display', 'Inter', sans-serif; font-size: 24px; font-weight: 600;
        }

        /* Utility Card for Roles */
        .card-role {
            background: var(--color-canvas);
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            padding: 40px var(--space-xl);
            display: flex; flex-direction: column; align-items: center; text-align: center;
            text-decoration: none; color: inherit;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.1s ease;
        }
        
        .card-role:hover {
            border-color: var(--color-primary);
            box-shadow: 0 4px 24px rgba(0, 102, 204, 0.08); /* Soft blue shadow */
        }
        .card-role:active {
            transform: scale(0.98);
        }

        .icon-container {
            width: 72px; height: 72px;
            background: var(--color-chip-translucent);
            color: var(--color-primary);
            border-radius: var(--radius-full);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: var(--space-lg);
            transition: transform 0.2s ease, background 0.2s ease;
        }
        .card-role:hover .icon-container {
            transform: scale(1.05);
            background: rgba(0, 102, 204, 0.12);
        }
        .icon-container svg { width: 32px; height: 32px; }

        /* Primary Button Inside Card */
        .btn-primary {
            background: var(--color-primary); color: #fff;
            border-radius: var(--radius-pill); padding: 11px 22px;
            font-size: 17px; font-weight: 400; letter-spacing: -0.374px;
            border: none; cursor: pointer; width: 100%; margin-top: auto;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: background 0.15s ease;
        }
        .card-role:hover .btn-primary {
            background: var(--color-primary-focus);
        }

        /* Layout Grid */
        .role-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            width: 100%;
            max-width: 800px;
            padding: 0 24px;
            margin-top: 40px;
        }
        @media (min-width: 768px) {
            .role-grid { grid-template-columns: 1fr 1fr; }
        }

        /* Back link */
        .back-link {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 14px; color: var(--color-ink-muted-48); font-weight: 400;
            text-decoration: none; letter-spacing: -0.224px;
            transition: color 0.15s; margin-top: 48px; padding-bottom: 32px;
        }
        .back-link:hover { color: var(--color-ink); }
    </style>
</head>
<body class="antialiased"> 

    {{-- HEADER --}}
    <div style="text-align:center; padding: 0 24px; margin-top: 32px;">
        <a href="/" style="display:flex; flex-direction:column; align-items:center; gap:10px; text-decoration:none; margin-bottom:32px;">
            <div class="logo-mark">V</div>
        </a>
        
        <h1 class="type-display-md" style="color: var(--color-ink); margin-bottom: 12px;">
            Pilih Peran Akses
        </h1>
        <p class="type-body" style="color: var(--color-ink-muted-80); max-width: 480px; margin: 0 auto;">
            Tentukan jalur masuk Anda untuk mulai menjelajahi ekosistem pembelajaran VisualData.
        </p>
    </div>

    {{-- KARTU PILIHAN --}}
    <div class="role-grid">
        
        {{-- KARTU SISWA --}}
        <a href="{{ route('login', ['role' => 'student']) }}" class="card-role">
            <div class="icon-container">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                </svg>
            </div>
            <h2 class="type-lead" style="color: var(--color-ink); margin-bottom: 12px;">Gerbang Siswa</h2>
            <p class="type-caption" style="color: var(--color-ink-muted-80); margin-bottom: 32px; line-height: 1.5;">
                Pelajari materi, kerjakan simulasi data, dan pantau perkembangan hasil belajarmu.
            </p>
            <div class="btn-primary">
                Masuk Sebagai Siswa
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </div>
        </a>

        {{-- KARTU GURU --}}
        <a href="{{ route('login', ['role' => 'teacher']) }}" class="card-role">
            <div class="icon-container">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
            <h2 class="type-lead" style="color: var(--color-ink); margin-bottom: 12px;">Portal Guru</h2>
            <p class="type-caption" style="color: var(--color-ink-muted-80); margin-bottom: 32px; line-height: 1.5;">
                Kelola kurikulum materi, pantau nilai akhir siswa, dan lihat perkembangan kelas.
            </p>
            <div class="btn-primary">
                Masuk Sebagai Guru
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </div>
        </a>

    </div>

    {{-- KEMBALI KE BERANDA --}}
    <a href="{{ url('/') }}" class="back-link">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Beranda Utama
    </a>

</body>
</html>