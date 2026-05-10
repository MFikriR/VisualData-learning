<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VisualData - Learning Platform</title>
    
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

    {{-- ALPINE JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        // Paksa Dark Mode untuk konsistensi tema
        document.documentElement.classList.add('dark');
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/simulation.js'])

    <style>
        body { 
            background-color: #0f172a; /* Slate 900 */
            color: #f8fafc; /* Slate 50 */
            overflow-x: auto;
            font-family: '"Plus Jakarta Sans"', sans-serif;
        }
        
        .sidebar {
            background-color: rgba(15, 23, 42, 0.95); /* EduDark translusen */
            backdrop-filter: blur(12px); 
            border-right: 1px solid rgba(255,255,255,0.05);
        }
        
        .nav-item.active {
            background: rgba(37, 99, 235, 0.15); /* eduPrimary opacity */
            color: #38bdf8; /* eduAccent */
            border-right: 3px solid #2563eb;
            font-weight: 700;
        }
        
        .main-content { 
            margin-left: 280px;
            min-width: 0;
            width: 100%;
            overflow-x: hidden;
        }

        .content-wrapper-fix{
            width:100%;
            min-width:0;
            overflow-x:auto;
        }

        @media (max-width: 768px) { 
            .main-content { margin-left: 0; } 
            .sidebar { transform: translateX(-100%); z-index: 50; } 
            .sidebar.open { transform: translateX(0); box-shadow: 10px 0 50px rgba(0,0,0,0.8); } 
        }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #2563eb; }
    </style>
</head>
<body class="font-sans antialiased selection:bg-eduPrimary selection:text-white">
    
    <div class="app-layout min-h-screen flex bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-800 via-eduDark to-eduDark">
        
        @if(Auth::check() && Auth::user()->role === 'teacher')
            @include('layouts.sidebar_teacher')
        @else
            @include('layouts.sidebar')
        @endif

        <main class="main-content flex-1 flex flex-col min-h-screen transition-all duration-300 relative z-10">
            
            {{-- HEADER TRANSPARAN --}}
            <header class="sticky top-0 z-40 bg-[#0f172a]/80 backdrop-blur-md border-b border-white/5 px-6 py-4 flex items-center justify-between">
                
                <div class="flex items-center gap-4">
                    <button id="sidebar-toggle" class="md:hidden text-slate-300 hover:text-white">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h2 class="text-xl font-bold text-white tracking-tight flex items-center gap-3">
                        <span class="w-1.5 h-6 bg-eduPrimary rounded-full"></span>
                        @yield('header', 'Dashboard') 
                    </h2>
                </div>
                
                <div class="flex items-center gap-4">
                    {{-- TOMBOL PROFIL --}}
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 focus:outline-none group transition-transform duration-200" title="Profil">
                        <div class="text-right hidden sm:block">
                            <div class="text-sm font-bold text-white tracking-wide">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[10px] text-eduAccent font-bold uppercase tracking-wider">
                                @if(Auth::user()->role == 'teacher')
                                    Guru Pengampu
                                @else
                                    Siswa
                                @endif
                            </div>
                        </div>
                        <img class="h-10 w-10 rounded-xl border border-slate-600 group-hover:border-eduAccent shadow-sm object-cover transition-colors" 
                             src="{{ Auth::user()->profile_photo_url }}" 
                             alt="{{ Auth::user()->name }}">
                    </a>
                </div>
            </header>

            <div class="p-6 md:p-8 content-wrapper-fix">
                @yield('content')
            </div>
        </main>
        
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/80 z-40 hidden md:hidden backdrop-blur-sm"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const closeBtn = document.getElementById('sidebar-close');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function openSidebar() { sidebar.classList.add('open'); overlay.classList.remove('hidden'); }
            function closeSidebar() { sidebar.classList.remove('open'); overlay.classList.add('hidden'); }

            if(toggleBtn) toggleBtn.addEventListener('click', openSidebar);
            if(closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if(overlay) overlay.addEventListener('click', closeSidebar);
        });
    </script>
</body>
</html>