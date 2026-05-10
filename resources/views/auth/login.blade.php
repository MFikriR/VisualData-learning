<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - VisualData</title>

    {{-- FONT PROFESIONAL (PLUS JAKARTA SANS) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { 
            font-family: '"Plus Jakarta Sans"', sans-serif; 
            background-color: #0f172a; 
        }
        /* Latar Belakang Partikel Data */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .particle { position: absolute; bottom: -100px; background: rgba(56, 189, 248, 0.15); border-radius: 50%; opacity: 0.5; animation: rise 10s infinite linear; border: 1px solid rgba(56, 189, 248, 0.3); box-shadow: 0 0 15px rgba(56, 189, 248, 0.2); }
        @keyframes rise { 0% { bottom: -100px; transform: translateX(0); } 50% { transform: translateX(50px); } 100% { bottom: 120vh; transform: translateX(-50px); } }
    </style>
</head>
<body class="antialiased selection:bg-eduPrimary selection:text-white">

    {{-- EFEK PARTIKEL --}}
    <div class="data-particles">
        <div class="particle" style="left:15%; width:4px; height:4px; animation-duration:12s;"></div>
        <div class="particle" style="left:35%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:65%; width:8px; height:8px; animation-duration:10s; animation-delay:2s;"></div>
        <div class="particle" style="left:85%; width:5px; height:5px; animation-duration:14s; animation-delay:0.5s;"></div>
    </div>

    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative z-10 bg-radial-at-top-right from-eduPanel to-eduDark">
        {{-- LOGO (Bersih & Profesional) --}}
        <a href="/" class="flex flex-col items-center gap-3 mb-10 mt-6">
            <div class="w-12 h-12 bg-eduPrimary rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-blue-500/30">V</div>
            <span class="text-2xl font-bold tracking-wide text-white">Visual<span class="text-eduPrimary">Data.</span></span>
        </a>

        <div class="w-full max-w-md bg-slate-800/70 border border-slate-700 rounded-3xl p-10 shadow-2xl backdrop-blur-md">

            <div class="text-center mb-8">
                @if(request('role') == 'teacher')
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-white tracking-tight">Portal Guru Pengampu</h2>
                    <p class="text-sm font-medium text-slate-300">Silakan masuk untuk mengelola kelas dan materi.</p>
                @elseif(request('role') == 'student')
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-white tracking-tight">Selamat Datang, Siswa!</h2>
                    <p class="text-sm font-medium text-slate-300">Masuk untuk melanjutkan modul pembelajaran Anda.</p>
                @else
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-white tracking-tight">Masuk ke Sistem</h2>
                    <p class="text-sm font-medium text-slate-300">Masukkan kredensial Anda untuk melanjutkan.</p>
                @endif
            </div>

            @if (session('status'))
                <div class="mb-6 p-3 bg-emerald-500/20 border border-emerald-500/50 rounded-lg text-emerald-400 text-sm font-semibold text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if(request()->has('role'))
                    <input type="hidden" name="role" value="{{ request()->query('role') }}">
                @endif

                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">Email Akademik</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-slate-300 mb-2">Kata Sandi</label>
                    <input id="password" type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none" required autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6 px-1">
                    <label for="remember_me" class="flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-600 bg-slate-800 text-eduPrimary focus:ring-eduPrimary focus:ring-offset-slate-900 cursor-pointer transition-colors">
                        <span class="ml-2 text-sm font-medium text-slate-300 group-hover:text-white transition-colors select-none">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-eduAccent hover:text-white transition-colors">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full flex justify-center items-center gap-2.5 py-3.5 px-5 bg-eduPrimary text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-md">
                    Masuk ➔
                </button>

                <div class="mt-8 text-center text-sm font-medium text-slate-400">
                    Belum memiliki tiket masuk? <a href="{{ route('register') }}" class="text-eduAccent hover:text-white transition-colors">Daftar di sini</a>
                </div>
            </form>
        </div>

        @if(request('role'))
            <div class="mt-6 text-center pb-8">
                <a href="{{ route('role.selection') }}" class="text-sm font-medium flex items-center justify-center gap-2 text-slate-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Ganti Peran Akses
                </a>
            </div>
        @endif
    </div>
</body>
</html>