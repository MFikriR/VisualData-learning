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
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { 
                extend: { 
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] }, 
                    colors: { 
                        eduPrimary: '#2563eb', // Blue 600
                        eduDark: '#0f172a', // Slate 900
                        eduAccent: '#38bdf8', // Sky 400
                    } 
                } 
            }
        }
    </script>

    <style>
        body {
            font-family: '"Plus Jakarta Sans"', sans-serif;
            background-color: #0f172a;
            background-image: radial-gradient(ellipse at top right, #1e293b, #0f172a);
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Latar Belakang Partikel Data */
        .data-particles {
            position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none;
        }
        .particle {
            position: absolute; bottom: -100px; background: rgba(56, 189, 248, 0.15); border-radius: 50%; opacity: 0.5; animation: rise 10s infinite linear; border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.2);
        }
        @keyframes rise {
            0% { bottom: -100px; transform: translateX(0); }
            50% { transform: translateX(50px); }
            100% { bottom: 120vh; transform: translateX(-50px); }
        }

        /* --- KARTU PERAN (ROLE CARD) --- */
        .card-role {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 40px 30px;
            height: 100%; 
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        /* Hover Effects */
        .card-student:hover {
            border-color: #38bdf8; 
            background: rgba(30, 41, 59, 0.9);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(56, 189, 248, 0.3);
        }
        .card-teacher:hover {
            border-color: #a78bfa; 
            background: rgba(30, 41, 59, 0.9);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(167, 139, 250, 0.3);
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
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .role-icon svg { width: 40px; height: 40px; }

        /* Icon Hover */
        .card-student .role-icon { color: #38bdf8; }
        .card-student:hover .role-icon {
            background: rgba(56, 189, 248, 0.15); border-color: #38bdf8;
            transform: scale(1.1);
        }

        .card-teacher .role-icon { color: #a78bfa; }
        .card-teacher:hover .role-icon {
            background: rgba(167, 139, 250, 0.15); border-color: #a78bfa;
            transform: scale(1.1);
        }

        .role-title {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 12px;
            color: #f8fafc;
            letter-spacing: -0.025em;
        }

        .role-desc {
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 30px;
            font-weight: 500;
            flex-grow: 1;
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
            background: rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .card-student:hover .btn-role {
            background: #2563eb; color: #fff; border-color: #2563eb;
        }

        .card-teacher:hover .btn-role {
            background: #7c3aed; color: #fff; border-color: #7c3aed;
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
<body class="selection:bg-eduPrimary selection:text-white"> 

    {{-- Latar Belakang Partikel --}}
    <div class="data-particles">
        <div class="particle" style="left:15%; width:4px; height:4px; animation-duration:12s;"></div>
        <div class="particle" style="left:35%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:65%; width:8px; height:8px; animation-duration:10s; animation-delay:2s;"></div>
        <div class="particle" style="left:85%; width:5px; height:5px; animation-duration:14s; animation-delay:0.5s;"></div>
    </div>

    {{-- Header --}}
    <div class="text-center mb-12 relative z-10 px-4">
        <div class="w-12 h-12 bg-eduPrimary rounded-xl flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg shadow-blue-500/30">V</div>
        <h1 class="text-3xl md:text-4xl font-extrabold mb-3 text-white tracking-tight">
            Pilih Portal Akses
        </h1>
        <p class="text-slate-400 text-lg font-medium max-w-md mx-auto">
            Silakan pilih peran Anda untuk masuk ke dalam sistem manajemen pembelajaran.
        </p>
    </div>

    <div class="role-grid">
        
        {{-- KARTU SISWA --}}
        <a href="{{ route('login', ['role' => 'student']) }}" class="card-role card-student group">
            <div class="role-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            </div>
            <h2 class="role-title">Portal Siswa</h2>
            <p class="role-desc">Akses modul pembelajaran interaktif, selesaikan tugas, dan lihat rekam jejak nilai akademik Anda.</p>
            <div class="btn-role">
                Masuk Kelas <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>

        {{-- KARTU GURU --}}
        <a href="{{ route('login', ['role' => 'teacher']) }}" class="card-role card-teacher group">
            <div class="role-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </div>
            <h2 class="role-title">Portal Guru</h2>
            <p class="role-desc">Pantau statistik perkembangan siswa, analisis rekapitulasi nilai kelas, dan kelola kurikulum materi.</p>
            <div class="btn-role">
                Ruang Guru <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </div>
        </a>

    </div>

    <div class="relative z-10 mt-12">
        <a href="{{ url('/') }}" class="text-sm flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>
    </div>

</body>
</html>