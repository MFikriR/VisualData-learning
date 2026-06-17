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
            background-color: #fbf5dd !important; 
            color: #0d530e !important; 
        }
        /* Latar Belakang Partikel Data */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .particle { position: absolute; bottom: -100px; background: rgba(48, 109, 41, 0.15); border-radius: 50%; opacity: 0.5; animation: rise 10s infinite linear; border: 1px solid rgba(48, 109, 41, 0.3); box-shadow: 0 0 15px rgba(48, 109, 41, 0.2); }
        @keyframes rise { 0% { bottom: -100px; transform: translateX(0); } 50% { transform: translateX(50px); } 100% { bottom: 120vh; transform: translateX(-50px); } }
    </style>
</head>
<body class="antialiased selection:bg-[#306d29] selection:text-[#fbf5dd]">

    {{-- EFEK PARTIKEL --}}
    <div class="data-particles">
        <div class="particle" style="left:15%; width:4px; height:4px; animation-duration:12s;"></div>
        <div class="particle" style="left:35%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:65%; width:8px; height:8px; animation-duration:10s; animation-delay:2s;"></div>
        <div class="particle" style="left:85%; width:5px; height:5px; animation-duration:14s; animation-delay:0.5s;"></div>
    </div>

    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative z-10" style="background-color: #fbf5dd;">
        {{-- LOGO --}}
        <a href="/" class="flex flex-col items-center gap-3 mb-10 mt-6 group">
            <div class="w-12 h-12 bg-[#306d29] rounded-xl flex items-center justify-center text-[#fbf5dd] font-bold text-2xl shadow-lg shadow-[#306d29]/30 group-hover:bg-[#0d530e] transition-colors">V</div>
            <span class="text-2xl font-bold tracking-wide text-[#0d530e]">Visual<span class="text-[#306d29]">Data.</span></span>
        </a>

        <div class="w-full max-w-md bg-[#e7e1b1] border border-[#306d29]/20 rounded-3xl p-10 shadow-2xl backdrop-blur-md">

            <div class="text-center mb-8">
                @if(request('role') == 'teacher')
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-[#0d530e] tracking-tight">Portal Guru Pengampu</h2>
                    <p class="text-sm font-medium text-[#306d29]">Silakan masuk untuk mengelola kelas dan materi.</p>
                @elseif(request('role') == 'student')
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-[#0d530e] tracking-tight">Selamat Datang, Siswa!</h2>
                    <p class="text-sm font-medium text-[#306d29]">Masuk untuk melanjutkan modul pembelajaran Anda.</p>
                @else
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-[#0d530e] tracking-tight">Masuk ke Sistem</h2>
                    <p class="text-sm font-medium text-[#306d29]">Masukkan kredensial Anda untuk melanjutkan.</p>
                @endif
            </div>

            @if (session('status'))
                <div class="mb-6 p-3 bg-green-100 border border-green-500/50 rounded-lg text-green-700 text-sm font-semibold text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if(request()->has('role'))
                    <input type="hidden" name="role" value="{{ request()->query('role') }}">
                @endif

                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-[#0d530e] mb-2">Email Akademik</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-[#306d29]/30 bg-[#fbf5dd] text-[#0d530e] font-medium focus:ring-2 focus:ring-[#306d29] focus:border-[#306d29] transition-all outline-none placeholder:text-[#306d29]/50" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com">
                    @error('email')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-[#0d530e] mb-2">Kata Sandi</label>
                    <input id="password" type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-[#306d29]/30 bg-[#fbf5dd] text-[#0d530e] font-medium focus:ring-2 focus:ring-[#306d29] focus:border-[#306d29] transition-all outline-none placeholder:text-[#306d29]/50" required autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-6 px-1">
                    <label for="remember_me" class="flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-[#306d29]/50 bg-[#fbf5dd] text-[#306d29] focus:ring-[#306d29] focus:ring-offset-[#fbf5dd] cursor-pointer transition-colors">
                        <span class="ml-2 text-sm font-medium text-[#306d29] group-hover:text-[#0d530e] transition-colors select-none">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#306d29] hover:text-[#0d530e] hover:underline transition-colors">
                            Lupa sandi?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full flex justify-center items-center gap-2.5 py-3.5 px-5 bg-[#306d29] text-[#fbf5dd] font-bold rounded-xl hover:bg-[#0d530e] transition-all shadow-md">
                    Masuk ➔
                </button>

                <div class="mt-8 text-center text-sm font-medium text-[#306d29]">
                    Belum memiliki tiket masuk? <a href="{{ route('register') }}" class="text-[#0d530e] font-bold hover:underline transition-colors">Daftar di sini</a>
                </div>
            </form>
        </div>

        @if(request('role'))
            <div class="mt-6 text-center pb-8">
                <a href="{{ route('role.selection') }}" class="text-sm font-bold flex items-center justify-center gap-2 text-[#306d29] hover:text-[#0d530e] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Ganti Peran Akses
                </a>
            </div>
        @endif
    </div>
</body>
</html>