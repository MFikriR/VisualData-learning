<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visual Data - Learning Platform</title>
    
    {{-- FONT PROFESIONAL (PLUS JAKARTA SANS) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { 
                extend: { 
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] }, 
                    colors: { 
                        eduPrimary: '#306d29',       // Hijau Utama
                        eduPrimaryHover: '#0d530e',  // Hijau Gelap
                        eduDark: '#fbf5dd',          // Krem Terang
                        eduPanel: '#e7e1b1',         // Krem Gelap
                        eduAccent: '#306d29',        // Hijau
                        borderLight: 'rgba(48, 109, 41, 0.2)',
                    } 
                } 
            }
        }
    </script>

    {{-- ALPINE JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js', 'resources/js/simulation.js'])

    <style>
        body { 
            background-color: #fbf5dd; 
            color: #0d530e; 
            overflow-x: auto;
            font-family: '"Plus Jakarta Sans"', sans-serif;
        }
        
        .sidebar {
            background-color: #e7e1b1; 
            backdrop-filter: blur(12px); 
            border-right: 1px solid rgba(48,109,41,0.2);
        }
        
        .nav-item.active{
            background:#d8d38d;
            color:#0d530e !important;
            border:1px solid #306d29;
            box-shadow:0 0 0 2px rgba(48,109,41,.15);
            font-weight:700;
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
            .sidebar.open { transform: translateX(0); box-shadow: 10px 0 50px rgba(13,83,14,0.2); } 
        }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(48,109,41,0.3); border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #306d29; }
    </style>
</head>
<body class="font-sans antialiased selection:bg-eduPrimary selection:text-eduDark">
    
    <div class="app-layout min-h-screen flex bg-eduDark">
        
        @if(Auth::check() && Auth::user()->role === 'teacher')
            @include('layouts.sidebar_teacher')
        @else
            @include('layouts.sidebar')
        @endif

        <main class="main-content flex-1 flex flex-col min-h-screen transition-all duration-300 relative z-10">
            
            {{-- HEADER TRANSPARAN --}}
            <header class="sticky top-0 z-40 bg-eduDark/80 backdrop-blur-md border-b border-borderLight px-6 py-4 flex items-center justify-between">
                
                <div class="flex items-center gap-4">
                    <button id="sidebar-toggle" class="md:hidden text-eduPrimaryHover hover:text-eduPrimary">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <h2 class="text-xl font-bold text-eduPrimaryHover tracking-tight flex items-center gap-3">
                        <span class="w-1.5 h-6 bg-eduPrimary rounded-full"></span>
                        @yield('header', 'Dashboard') 
                    </h2>
                </div>
                
                <div class="flex items-center gap-4">
                    {{-- TOMBOL PROFIL --}}
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 focus:outline-none group transition-transform duration-200" title="Profil">
                        <div class="text-right hidden sm:block">
                            <div class="text-sm font-bold text-eduPrimaryHover tracking-wide">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[10px] text-eduPrimary font-bold uppercase tracking-wider">
                                @if(Auth::user()->role == 'teacher')
                                    Guru Pengampu
                                @else
                                    Siswa
                                @endif
                            </div>
                        </div>
                        <img class="h-10 w-10 rounded-xl border border-borderLight group-hover:border-eduPrimary shadow-sm object-cover transition-colors" 
                             src="{{ Auth::user()->profile_photo_url }}" 
                             alt="{{ Auth::user()->name }}">
                    </a>
                </div>
            </header>

            <div class="p-6 md:p-8 content-wrapper-fix">
                @yield('content')
            </div>
        </main>
        
        <div id="sidebar-overlay" class="fixed inset-0 bg-eduPrimaryHover/20 z-40 hidden md:hidden backdrop-blur-sm"></div>
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