<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun Akademik - VisualData</title>
    
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
        <a href="/" class="flex flex-col items-center gap-3 mb-10">
            <div class="w-12 h-12 bg-eduPrimary rounded-xl flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-blue-500/30">V</div>
            <span class="text-2xl font-bold tracking-wide text-white">Visual<span class="text-eduPrimary">Data.</span></span>
        </a>

        <div class="w-full max-w-md bg-eduPanel/70 border border-borderLight rounded-3xl p-10 shadow-2xl backdrop-blur-md">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-2 text-white tracking-tight">Daftar Akun Baru</h2>
                <p class="text-sm font-medium text-slate-300">Buat akun akademik untuk mengakses modul pembelajaran data science SMA Kelas XI.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Nama Lengkap Siswa</label>
                    <input id="name" type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap siswa">
                    @error('name')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">Email Akademik / Sekolah</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none" value="{{ old('email') }}" required autocomplete="username" placeholder="siswa@sekolah.com">
                    @error('email')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-slate-300 mb-2">Kata Sandi</label>
                    <input id="password" type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm font-semibold text-slate-300 mb-2">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none" required autocomplete="new-password" placeholder="Ulangi kata sandi">
                </div>

                {{-- TAMBAHAN: DROPDOWN JENIS KELAMIN --}}
                <div class="mb-5">
                    <label for="gender" class="block text-sm font-semibold text-slate-300 mb-2">Jenis Kelamin</label>
                    <div class="relative">
                        <select id="gender" name="gender" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none appearance-none cursor-pointer" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin...</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    @error('gender')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TAMBAHAN: DROPDOWN PILIHAN KELAS --}}
                <div class="mb-6">
                    <label for="kelas" class="block text-sm font-semibold text-slate-300 mb-2">Pilih Kelas</label>
                    <div class="relative">
                        <select id="kelas" name="kelas" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all outline-none appearance-none cursor-pointer" required>
                            <option value="" disabled {{ old('kelas') ? '' : 'selected' }}>Pilih Kelas Kamu...</option>
                            <option value="11-1" {{ old('kelas') == '11-1' ? 'selected' : '' }}>Kelas 11-1</option>
                            <option value="11-2" {{ old('kelas') == '11-2' ? 'selected' : '' }}>Kelas 11-2</option>
                            <option value="11-3" {{ old('kelas') == '11-3' ? 'selected' : '' }}>Kelas 11-3</option>
                            <option value="11-4" {{ old('kelas') == '11-4' ? 'selected' : '' }}>Kelas 11-4</option>
                            <option value="11-5" {{ old('kelas') == '11-5' ? 'selected' : '' }}>Kelas 11-5</option>
                            <option value="11-6" {{ old('kelas') == '11-6' ? 'selected' : '' }}>Kelas 11-6</option>
                            <option value="11-7" {{ old('kelas') == '11-7' ? 'selected' : '' }}>Kelas 11-7</option>
                            <option value="11-8" {{ old('kelas') == '11-8' ? 'selected' : '' }}>Kelas 11-8</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    @error('kelas')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="role" value="student">

                <button type="submit" class="w-full flex justify-center items-center gap-2.5 py-3.5 px-5 bg-eduPrimary text-white font-bold rounded-xl hover:bg-eduPrimaryHover transition-all shadow-md">
                    Daftar Sekarang ➔
                </button>

                <div class="mt-8 text-center text-sm font-medium text-slate-400">
                    Sudah memiliki akun masuk? <a href="{{ route('login') }}" class="text-eduAccent hover:text-white transition-colors">Masuk di sini</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>