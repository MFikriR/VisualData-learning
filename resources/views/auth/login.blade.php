<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - VisualData</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/variables.css', 'resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary:          #0066cc;
            --color-primary-focus:    #0071e3;
            --color-canvas:           #ffffff;
            --color-canvas-parchment: #f5f5f7;
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
            font-size: 17px; font-weight: 400;
            line-height: 1.47; letter-spacing: -0.374px;
            background: var(--color-canvas-parchment);
            color: var(--color-ink);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        .data-particles { position: fixed; width: 100%; height: 100%; z-index: 0; pointer-events: none; }
        .particle {
            position: absolute; bottom: -100px;
            background: rgba(0,102,204,0.07); border-radius: 50%; opacity: 0.5;
            animation: rise 10s infinite linear;
            border: 1px solid rgba(0,102,204,0.12);
        }
        @keyframes rise {
            0%   { bottom: -100px; transform: translateX(0); }
            50%  { transform: translateX(50px); }
            100% { bottom: 120vh; transform: translateX(-50px); }
        }

        /* Form card */
        .form-card {
            background: var(--color-canvas);
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-lg);
            padding: 40px;
            width: 100%; max-width: 440px;
        }

        /* Input */
        .field-input {
            width: 100%; padding: 11px 16px;
            border: 1px solid var(--color-hairline);
            border-radius: var(--radius-sm);
            background: var(--color-canvas);
            color: var(--color-ink);
            font-family: inherit; font-size: 17px; font-weight: 400;
            letter-spacing: -0.374px;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
            -webkit-appearance: none; appearance: none;
        }
        .field-input::placeholder { color: var(--color-ink-muted-48); }
        .field-input:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(0,102,204,0.12);
        }

        .field-label {
            display: block; font-size: 14px; font-weight: 600;
            letter-spacing: -0.224px; color: var(--color-ink); margin-bottom: 6px;
        }

        /* Button */
        .btn-primary {
            width: 100%; background: var(--color-primary); color: #fff;
            border: none; border-radius: var(--radius-pill);
            padding: 14px 28px; font-family: inherit;
            font-size: 17px; font-weight: 400; letter-spacing: -0.374px;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: background 0.15s, transform 0.1s; text-decoration: none;
        }
        .btn-primary:hover  { background: var(--color-primary-focus); }
        .btn-primary:active { transform: scale(0.98); }
        .btn-primary:focus-visible { outline: 2px solid var(--color-primary-focus); outline-offset: 2px; }

        .field-error { font-size: 12px; color: #d70015; margin-top: 5px; letter-spacing: -0.12px; }

        .divider { border: none; border-top: 1px solid var(--color-hairline); margin: 28px 0; }

        /* Status alert */
        .alert-success {
            margin-bottom: 20px; padding: 12px 16px;
            background: #f0f7ff; border: 1px solid rgba(0,102,204,0.2);
            border-radius: var(--radius-sm);
            font-size: 14px; color: var(--color-primary); text-align: center;
            letter-spacing: -0.224px;
        }

        /* Logo */
        .logo-mark {
            width: 44px; height: 44px; background: var(--color-primary);
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            font-family: 'SF Pro Display','Inter',system-ui,sans-serif;
            font-size: 22px; font-weight: 600; color: #fff;
            transition: background 0.15s;
        }
        .logo-mark:hover { background: var(--color-primary-focus); }
        .logo-name {
            font-family: 'SF Pro Display','Inter',system-ui,sans-serif;
            font-size: 21px; font-weight: 600; letter-spacing: 0.231px; color: var(--color-ink);
        }

        /* Remember + forgot row */
        .checkbox-label {
            display: flex; align-items: center; gap: 8px; cursor: pointer;
        }
        .checkbox-label input[type=checkbox] {
            width: 16px; height: 16px;
            border: 1px solid var(--color-hairline);
            border-radius: 4px; accent-color: var(--color-primary);
            cursor: pointer;
        }
        .checkbox-label span {
            font-size: 14px; color: var(--color-ink-muted-80); letter-spacing: -0.224px;
            user-select: none;
        }
        .link-primary {
            font-size: 14px; color: var(--color-primary); font-weight: 400;
            text-decoration: none; letter-spacing: -0.224px;
        }
        .link-primary:hover { text-decoration: underline; }

        /* Back link */
        .back-link {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 14px; color: var(--color-ink-muted-48); font-weight: 400;
            text-decoration: none; letter-spacing: -0.224px;
            transition: color 0.15s;
        }
        .back-link:hover { color: var(--color-ink); }
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
                @if(request('role') == 'teacher')
                    <h1 style="font-family:'SF Pro Display','Inter',system-ui,sans-serif;font-size:28px;font-weight:600;line-height:1.14;letter-spacing:0.196px;color:var(--color-ink);margin-bottom:8px;">Portal Guru Pengampu</h1>
                    <p style="font-size:14px;color:var(--color-ink-muted-80);letter-spacing:-0.224px;line-height:1.5;">Silakan masuk untuk mengelola kelas dan materi.</p>
                @elseif(request('role') == 'student')
                    <h1 style="font-family:'SF Pro Display','Inter',system-ui,sans-serif;font-size:28px;font-weight:600;line-height:1.14;letter-spacing:0.196px;color:var(--color-ink);margin-bottom:8px;">Selamat Datang, Siswa!</h1>
                    <p style="font-size:14px;color:var(--color-ink-muted-80);letter-spacing:-0.224px;line-height:1.5;">Masuk untuk melanjutkan media pembelajaran Anda.</p>
                @else
                    <h1 style="font-family:'SF Pro Display','Inter',system-ui,sans-serif;font-size:28px;font-weight:600;line-height:1.14;letter-spacing:0.196px;color:var(--color-ink);margin-bottom:8px;">Masuk ke Sistem</h1>
                    <p style="font-size:14px;color:var(--color-ink-muted-80);letter-spacing:-0.224px;line-height:1.5;">Masukkan kredensial Anda untuk melanjutkan.</p>
                @endif
            </div>

            @if (session('status'))
                <div class="alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if(request()->has('role'))
                    <input type="hidden" name="role" value="{{ request()->query('role') }}">
                @endif

                {{-- EMAIL --}}
                <div style="margin-bottom:16px;">
                    <label for="email" class="field-label">Email Akademik</label>
                    <input id="email" type="email" name="email" class="field-input"
                        value="{{ old('email') }}" required autofocus autocomplete="username"
                        placeholder="nama@email.com">
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div style="margin-bottom:20px;">
                    <label for="password" class="field-label">Kata Sandi</label>
                    <input id="password" type="password" name="password" class="field-input"
                        required autocomplete="current-password"
                        placeholder="••••••••">
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- REMEMBER + LUPA SANDI --}}
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:28px;">
                    <label class="checkbox-label" for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link-primary">Lupa sandi?</a>
                    @endif
                </div>

                <button type="submit" class="btn-primary">
                    Masuk
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>

                <hr class="divider">

                <p style="text-align:center;font-size:14px;color:var(--color-ink-muted-80);letter-spacing:-0.224px;">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}" class="link-primary" style="font-weight:600;">Daftar di sini</a>
                </p>

            </form>
        </div>

        {{-- BACK LINK --}}
        @if(request('role'))
            <div style="margin-top:24px;padding-bottom:32px;">
                <a href="{{ route('role.selection') }}" class="back-link">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Ganti Peran Akses
                </a>
            </div>
        @endif

    </div>
</body>
</html>