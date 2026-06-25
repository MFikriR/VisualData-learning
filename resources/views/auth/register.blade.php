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
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        palette1: '#fbf5dd', /* Lightest / Background */
                        palette2: '#e7e1b1', /* Light / Form & Input Background */
                        palette3: '#306d29', /* Medium / Primary Green (Buttons) */
                        palette4: '#0d530e', /* Darkest / Text & Hover States */
                    },
                }
            }
        }
    </script>

    <style>
        body { 
            font-family: '"Plus Jakarta Sans"', sans-serif; 
            background-color: #fbf5dd; /* palette1 */
            color: #0d530e; /* palette4 */
        }
        /* Latar Belakang Partikel Data */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .particle { position: absolute; bottom: -100px; background: rgba(48, 109, 41, 0.15); border-radius: 50%; opacity: 0.5; animation: rise 10s infinite linear; border: 1px solid rgba(48, 109, 41, 0.3); box-shadow: 0 0 15px rgba(48, 109, 41, 0.2); }
        @keyframes rise { 0% { bottom: -100px; transform: translateX(0); } 50% { transform: translateX(50px); } 100% { bottom: 120vh; transform: translateX(-50px); } }
    </style>
</head>
<body class="antialiased selection:bg-palette3 selection:text-palette1">
    
    {{-- EFEK PARTIKEL --}}
    <div class="data-particles">
        <div class="particle" style="left:15%; width:4px; height:4px; animation-duration:12s;"></div>
        <div class="particle" style="left:35%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:65%; width:8px; height:8px; animation-duration:10s; animation-delay:2s;"></div>
        <div class="particle" style="left:85%; width:5px; height:5px; animation-duration:14s; animation-delay:0.5s;"></div>
    </div>

    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative z-10">
        {{-- LOGO (Bersih & Profesional) --}}
        <a href="/" class="flex flex-col items-center gap-3 mb-10">
            <div class="w-12 h-12 bg-palette3 rounded-xl flex items-center justify-center text-palette1 font-bold text-2xl shadow-lg shadow-palette4/20">V</div>
            <span class="text-2xl font-bold tracking-wide text-palette4">Visual<span class="text-palette3">Data.</span></span>
        </a>

        <div class="w-full max-w-md bg-palette1 border border-palette3/20 rounded-3xl p-10 shadow-2xl backdrop-blur-md">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold mb-2 text-palette4 tracking-tight">Daftar Akun Baru</h2>
                <p class="text-sm font-medium text-palette3">Buat akun akademik untuk mengakses modul pembelajaran Visualisasi dan Pengelompokan Data SMA Kelas XI.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- INPUT NAMA --}}
                <div class="mb-5">
                    <label for="name" class="block text-sm font-semibold text-palette4 mb-2">Nama Lengkap Siswa</label>
                    <input id="name" type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-palette3/30 bg-palette2 text-white font-medium focus:ring-2 focus:ring-palette3 focus:border-palette3 transition-all outline-none placeholder:text-white/60" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap siswa">
                    @error('name')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INPUT EMAIL --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-semibold text-palette4 mb-2">Email Akademik / Sekolah</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-palette3/30 bg-palette2 text-white font-medium focus:ring-2 focus:ring-palette3 focus:border-palette3 transition-all outline-none placeholder:text-white/60" value="{{ old('email') }}" required autocomplete="username" placeholder="siswa@gmail.com">
                    @error('email')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INPUT KATA SANDI --}}
                <div class="mb-5">
                    <label for="password" class="block text-sm font-semibold text-palette4 mb-2">Kata Sandi</label>
                    <input id="password" type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-palette3/30 bg-palette2 text-white font-medium focus:ring-2 focus:ring-palette3 focus:border-palette3 transition-all outline-none placeholder:text-white/60" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- INPUT KONFIRMASI KATA SANDI --}}
                <div class="mb-5">
                    <label for="password_confirmation" class="block text-sm font-semibold text-palette4 mb-2">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-palette3/30 bg-palette2 text-white font-medium focus:ring-2 focus:ring-palette3 focus:border-palette3 transition-all outline-none placeholder:text-white/60" required autocomplete="new-password" placeholder="Ulangi kata sandi">
                </div>

                {{-- DROPDOWN JENIS KELAMIN --}}
                <div class="mb-5">
                    <label for="gender" class="block text-sm font-semibold text-palette4 mb-2">Jenis Kelamin</label>
                    <div class="relative">
                        <select id="gender" name="gender" class="w-full px-4 py-3 rounded-xl border border-palette3/30 bg-palette2 text-palette4 font-medium focus:ring-2 focus:ring-palette3 focus:border-palette3 transition-all outline-none appearance-none cursor-pointer" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin...</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-palette3">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    @error('gender')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DROPDOWN PILIHAN KELAS --}}
                <div class="mb-6">
                    <label for="kelas" class="block text-sm font-semibold text-palette4 mb-2">Pilih Kelas</label>
                    <div class="relative">
                        <select id="kelas" name="kelas" class="w-full px-4 py-3 rounded-xl border border-palette3/30 bg-palette2 text-palette4 font-medium focus:ring-2 focus:ring-palette3 focus:border-palette3 transition-all outline-none appearance-none cursor-pointer" required>
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
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-palette3">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    @error('kelas')
                        <p class="text-red-600 font-medium text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="role" value="student">

                <button type="submit" class="w-full flex justify-center items-center gap-2.5 py-3.5 px-5 bg-palette3 text-palette1 font-bold rounded-xl hover:bg-palette4 transition-all shadow-md mt-8">
                    Daftar Sekarang ➔
                </button>

                <div class="mt-8 text-center text-sm font-medium text-palette4">
                    Sudah memiliki akun masuk? <a href="{{ route('login') }}" class="text-palette3 font-bold hover:underline transition-colors">Masuk di sini</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>