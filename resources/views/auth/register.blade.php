<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun Akademik - VisualData</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --color-primary:          #0066cc;
            --color-primary-focus:    #0071e3;
            --color-canvas:           #ffffff;
            --color-canvas-parchment: #f5f5f7;
            --color-surface-black:    #000000;
            --color-ink:              #1d1d1f;
            --color-ink-muted-80:     #333333;
            --color-ink-muted-48:     #7a7a7a;
            --color-divider-soft:     #f0f0f0;
            --color-hairline:         #e0e0e0;
            --radius-sm:   8px;
            --radius-lg:   18px;
            --radius-pill: 9999px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'SF Pro Text', 'Inter', system-ui, -apple-system, sans-serif;
            font-size: 17px;
            font-weight: 400;
            line-height: 1.47;
            letter-spacing: -0.374px;
            background: var(--color-canvas-parchment);
            color: var(--color-ink);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* Partikel — warna disesuaikan ke biru */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .particle {
            position: absolute; bottom: -100px;
            background: rgba(0, 102, 204, 0.07);
            border-radius: 50%; opacity: 0.5;
            animation: rise 10s infinite linear;
            border: 1px solid rgba(0, 102, 204, 0.12);
        }
        @keyframes rise {
            0%   { bottom: -100px; transform: translateX(0); }
            50%  { transform: translateX(50px); }
            100% { bottom: 120vh; transform: translateX(-50px); }
        }

        /* Card form */
        .form-card {
            background: var(--color-canvas);
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            padding: 40px;
            width: 100%;
            max-width: 440px;
        }

        /* Input fields */
        .field-input {
            width: 100%;
            padding: 11px 16px;
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-sm);
            background: var(--color-canvas);
            color: var(--color-ink);
            font-family: inherit;
            font-size: 17px;
            font-weight: 400;
            letter-spacing: -0.374px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
            -webkit-appearance: none;
            appearance: none;
        }
        .field-input::placeholder { color: var(--color-ink-muted-48); }
        .field-input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.12);
        }

        /* Label */
        .field-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: -0.224px;
            color: var(--color-ink);
            margin-bottom: 6px;
        }

        /* Select wrapper */
        .select-wrap { position: relative; }
        .select-wrap select { cursor: pointer; }
        .select-arrow {
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--color-ink-muted-48);
        }

        /* Primary button */
        .btn-primary {
            width: 100%;
            background: var(--color-primary);
            color: #fff;
            border: none;
            border-radius: var(--radius-pill);
            padding: 14px 28px;
            font-family: inherit;
            font-size: 17px;
            font-weight: 400;
            letter-spacing: -0.374px;
            cursor: pointer;
            transition: background 0.15s, transform 0.1s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-primary:hover  { background: var(--color-primary-focus); }
        .btn-primary:active { transform: scale(0.98); }
        .btn-primary:focus-visible { outline: 2px solid var(--color-primary-focus); outline-offset: 2px; }

        /* Error text */
        .field-error {
            font-size: 12px;
            color: #d70015;
            margin-top: 5px;
            letter-spacing: -0.12px;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid var(--color-hairline);
            margin: 28px 0;
        }

        /* Logo mark */
        .logo-mark {
            width: 44px; height: 44px;
            background: var(--color-primary);
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            font-family: 'SF Pro Display', 'Inter', system-ui, sans-serif;
            font-size: 22px; font-weight: 600;
            color: #fff;
        }
        .logo-name {
            font-family: 'SF Pro Display', 'Inter', system-ui, sans-serif;
            font-size: 21px; font-weight: 600;
            letter-spacing: 0.231px;
            color: var(--color-ink);
        }
    </style>
</head>
<body class="antialiased">

    {{-- PARTIKEL --}}
    <div class="data-particles">
        <div class="particle" style="left:15%; width:4px; height:4px; animation-duration:12s;"></div>
        <div class="particle" style="left:35%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:65%; width:8px; height:8px; animation-duration:10s; animation-delay:2s;"></div>
        <div class="particle" style="left:85%; width:5px; height:5px; animation-duration:14s; animation-delay:0.5s;"></div>
    </div>

    <div style="min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px 24px;position:relative;z-index:1;">

        {{-- LOGO --}}
        <a href="/" style="display:flex;flex-direction:column;align-items:center;gap:10px;text-decoration:none;margin-bottom:32px;">
            <div class="logo-mark">V</div>
            <span class="logo-name">VisualData</span>
        </a>

        {{-- FORM CARD --}}
        <div class="form-card">

            <div style="text-align:center;margin-bottom:32px;">
                <h1 style="font-family:'SF Pro Display','Inter',system-ui,sans-serif;font-size:28px;font-weight:600;line-height:1.14;letter-spacing:0.196px;color:var(--color-ink);margin-bottom:8px;">
                    Daftar Akun Baru
                </h1>
                <p style="font-size:14px;color:var(--color-ink-muted-80);letter-spacing:-0.224px;line-height:1.5;">
                    Buat akun akademik untuk mengakses media pembelajaran<br>Visualisasi dan Pengelompokan Data SMA Kelas XI.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAMA --}}
                <div style="margin-bottom:16px;">
                    <label for="name" class="field-label">Nama Lengkap Siswa</label>
                    <input id="name" type="text" name="name" class="field-input"
                        value="{{ old('name') }}" required autofocus autocomplete="name"
                        placeholder="Masukkan nama lengkap siswa">
                    @error('name')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div style="margin-bottom:16px;">
                    <label for="email" class="field-label">Email Akademik / Sekolah</label>
                    <input id="email" type="email" name="email" class="field-input"
                        value="{{ old('email') }}" required autocomplete="username"
                        placeholder="siswa@gmail.com">
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div style="margin-bottom:16px;">
                    <label for="password" class="field-label">Kata Sandi</label>
                    <input id="password" type="password" name="password" class="field-input"
                        required autocomplete="new-password"
                        placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div style="margin-bottom:16px;">
                    <label for="password_confirmation" class="field-label">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="field-input"
                        required autocomplete="new-password"
                        placeholder="Ulangi kata sandi">
                </div>

                {{-- JENIS KELAMIN --}}
                <div style="margin-bottom:16px;">
                    <label for="gender" class="field-label">Jenis Kelamin</label>
                    <div class="select-wrap">
                        <select id="gender" name="gender" class="field-input" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin...</option>
                            <option value="male"   {{ old('gender') == 'male'   ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <div class="select-arrow">
                            <svg width="12" height="12" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </div>
                    </div>
                    @error('gender')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KELAS --}}
                <div style="margin-bottom:28px;">
                    <label for="kelas" class="field-label">Pilih Kelas</label>
                    <div class="select-wrap">
                        <select id="kelas" name="kelas" class="field-input" required>
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
                        <div class="select-arrow">
                            <svg width="12" height="12" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </div>
                    </div>
                    @error('kelas')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="role" value="student">

                <button type="submit" class="btn-primary">
                    Daftar Sekarang
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>

                <hr class="divider">

                <p style="text-align:center;font-size:14px;color:var(--color-ink-muted-80);letter-spacing:-0.224px;">
                    Sudah memiliki akun?
                    <a href="{{ route('login', ['role' => 'student']) }}" style="color:var(--color-primary);font-weight:400;text-decoration:none;">
                        Masuk di sini
                    </a>
                </p>

            </form>
        </div>

    </div>
</body>
</html>