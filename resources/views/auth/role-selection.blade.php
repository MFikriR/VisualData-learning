<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Akses - VisualData</title>
    
    {{-- FONT PROFESIONAL (PLUS JAKARTA SANS) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/js/app.js']) 
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { 
                extend: { 
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] }, 
                    colors: { 
                        palette1: '#fbf5dd', /* Lightest / Background */
                        palette2: '#e7e1b1', /* Light / Card Background */
                        palette3: '#306d29', /* Medium / Primary Green */
                        palette4: '#0d530e', /* Darkest / Text & Headings */
                    } 
                } 
            }
        }
    </script>

    <style>
        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            background: #fbf5dd; /* palette1 */
            color: #0d530e; /* palette4 */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Latar Belakang Partikel Data */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .particle { position: absolute; bottom: -100px; background: rgba(48, 109, 41, 0.15); border-radius: 50%; opacity: 0.5; animation: rise 10s infinite linear; border: 1px solid rgba(48, 109, 41, 0.3); box-shadow: 0 0 15px rgba(48, 109, 41, 0.2); }
        @keyframes rise { 0% { bottom: -100px; transform: translateX(0); } 50% { transform: translateX(50px); } 100% { bottom: 120vh; transform: translateX(-50px); } }

        /* --- KARTU PERAN (ROLE CARD) --- */
        .card-role {
            background: #e7e1b1; /* palette2 */
            border: 1px solid rgba(48, 109, 41, 0.2); /* border hijau samar */
            border-radius: 24px;
            padding: 40px 32px;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: 0.3s;
            box-shadow:
                0 1px 3px rgba(13, 83, 14, 0.05),
                0 8px 24px rgba(13, 83, 14, 0.05);
            position: relative;
            z-index: 10;
        }

        /* Hover Effects */
        .card-role:hover {
            transform: translateY(-6px);
            border-color: #306d29; /* palette3 */
            box-shadow: 0 10px 30px rgba(48, 109, 41, 0.2);
        }

        /* Common Elements */
        .role-icon {
            width: 80px;
            height: 80px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.4s ease;
            background: rgba(48, 109, 41, 0.1);
            border: 1px solid rgba(48, 109, 41, 0.2);
            color: #306d29; /* palette3 */
        }
        .role-icon svg { width: 40px; height: 40px; }

        /* Icon Hover */
        .card-role:hover .role-icon {
            background: rgba(48, 109, 41, 0.2);
            border-color: #306d29;
            transform: scale(1.1);
            color: #0d530e; /* palette4 */
        }

        .role-title {
            color: #0d530e; /* palette4 */
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .role-desc {
            color: #306d29; /* palette3 */
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .btn-role {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.3s;
            background: transparent;
            color: #306d29;
            border: 2px solid rgba(48, 109, 41, 0.3);
            margin-top: auto;
        }

        .card-role:hover .btn-role {
            background: #306d29; /* palette3 */
            color: #fbf5dd; /* palette1 */
            border-color: #306d29;
        }
        
        .role-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            width: 100%;
            max-width: 800px;
            padding: 0 20px;
        }
        
        @media (min-width: 768px) {
            .role-grid { grid-template-columns: 1fr 1fr; gap: 2rem; }
        }
    </style>
</head>
<body class="selection:bg-palette3 selection:text-palette1"> 
    
    {{-- EFEK PARTIKEL --}}
    <div class="data-particles">
        <div class="particle" style="left:15%; width:4px; height:4px; animation-duration:12s;"></div>
        <div class="particle" style="left:35%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:65%; width:8px; height:8px; animation-duration:10s; animation-delay:2s;"></div>
        <div class="particle" style="left:85%; width:5px; height:5px; animation-duration:14s; animation-delay:0.5s;"></div>
    </div>

    {{-- Header --}}
    <div class="text-center mb-12 relative z-10 px-4 mt-6">
        <a href="/" class="flex flex-col items-center gap-3 mb-8 group cursor-pointer inline-flex">
            <div class="w-12 h-12 bg-palette3 rounded-xl flex items-center justify-center text-palette1 font-bold text-2xl shadow-lg shadow-palette3/30 group-hover:bg-palette4 transition-colors">V</div>
            <span class="text-2xl font-bold tracking-wide text-palette4">Visual<span class="text-palette3">Data.</span></span>
        </a>
        
        <h1 class="text-4xl md:text-5xl font-extrabold text-palette4 mb-4 tracking-tight">
            Pilih Peran Akses
        </h1>
        <p class="text-lg text-palette3 max-w-xl mx-auto font-medium">
            Tentukan jalur masuk Anda untuk mulai menjelajahi ekosistem pembelajaran.
        </p>
    </div>

    <div class="role-grid relative z-10">
        
        {{-- KARTU SISWA --}}
        <a href="{{ route('login', ['role' => 'student']) }}" class="card-role group">
            <div class="role-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            </div>
            <h2 class="role-title">Gerbang Siswa</h2>
            <p class="role-desc">Pelajari materi, kerjakan simulasi data, dan pantau perkembangan hasil belajarmu.</p>
            <div class="btn-role">
                Masuk Sebagai Siswa <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>

        {{-- KARTU GURU --}}
        <a href="{{ route('login', ['role' => 'teacher']) }}" class="card-role group">
            <div class="role-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </div>
            <h2 class="role-title">Portal Guru</h2>
            <p class="role-desc">Kelola kurikulum materi, pantau nilai akhir siswa, dan lihat perkembangan kelas.</p>
            <div class="btn-role">
                Masuk Sebagai Guru <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>

    </div>

    <div class="relative z-10 mt-12 pb-8">
        <a href="{{ url('/') }}" class="text-sm font-semibold flex items-center gap-2 text-palette3 hover:text-palette4 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda Utama
        </a>
    </div>

</body>
</html>