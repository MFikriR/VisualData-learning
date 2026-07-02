@extends('layouts.app_learning')

@section('header', 'Pengaturan Profil')

@section('content')
    <div class="apple-profile-container max-w-4xl mx-auto space-y-8 pb-20">
        
        {{-- SECTION 1: INFO PROFIL --}}
        <div class="apple-card">
            <div class="relative z-10">
                <div class="apple-card-header mb-6 pb-4">
                    <h2 class="type-tagline text-white">Informasi Akun</h2>
                    <p class="type-caption text-dim mt-1">Perbarui nama tampilan dan alamat email login Anda.</p>
                </div>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- SECTION 2: GANTI PASSWORD --}}
        <div class="apple-card">
            <div class="max-w-xl">
                <div class="apple-card-header mb-6 pb-4">
                    <h2 class="type-tagline text-white">Keamanan Password</h2>
                    <p class="type-caption text-dim mt-1">Pastikan akun Anda menggunakan password yang panjang dan acak.</p>
                </div>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- SECTION 3: HAPUS AKUN (DANGER ZONE) --}}
        <div class="apple-card-danger">
            <div class="max-w-xl">
                <div class="apple-card-header-danger mb-6 pb-4">
                    <h2 class="type-tagline text-red">Hapus Akun</h2>
                    <p class="type-caption text-red-dim mt-1">Hati-hati! Sekali akun dihapus, semua data nilai dan progres belajar akan lenyap selamanya.</p>
                </div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    {{-- Kustomisasi CSS berbasis Apple Design Tokens --}}
    <style>
        :root {
            /* Apple Design Colors */
            --apple-primary: #0066cc;
            --apple-primary-focus: #0071e3;
            --apple-primary-on-dark: #2997ff;
            
            /* Dark Surface Tiles */
            --apple-tile-bg: #272729;
            --apple-tile-bg-hover: #2a2a2c;
            --apple-input-bg: #1c1c1e;
            --apple-danger-bg: rgba(255, 69, 58, 0.08);
            
            /* Text & Borders */
            --apple-text-main: #ffffff;
            --apple-text-muted: #aeaeaf;
            --apple-text-danger: #ff453a;
            --apple-text-danger-muted: rgba(255, 69, 58, 0.7);
            --apple-border: rgba(255, 255, 255, 0.08);
            --apple-border-danger: rgba(255, 69, 58, 0.2);

            /* Radius & Fonts */
            --apple-radius-lg: 18px;
            --apple-radius-pill: 9999px;
            --apple-font-stack: "SF Pro Display", "-apple-system", BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        /* Container Font Setting */
        .apple-profile-container {
            font-family: var(--apple-font-stack);
            -webkit-font-smoothing: antialiased;
        }

        /* Typography Styles */
        .type-tagline {
            font-size: 21px;
            font-weight: 600;
            vertical-align: middle;
            letter-spacing: 0.231px;
        }
        .type-caption {
            font-size: 14px;
            font-weight: 400;
            letter-spacing: -0.224px;
        }
        .text-dim { color: var(--apple-text-muted); }
        .text-red { color: var(--apple-text-danger); }
        .text-red-dim { color: var(--apple-text-danger-muted); }

        /* Card Layouts */
        .apple-card {
            background-color: var(--apple-tile-bg);
            border: 1px solid var(--apple-border);
            border-radius: var(--apple-radius-lg);
            padding: 2rem;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }
        .apple-card:hover {
            background-color: var(--apple-tile-bg-hover);
            border-color: rgba(255, 255, 255, 0.15);
        }
        .apple-card-danger {
            background-color: var(--apple-danger-bg);
            border: 1px solid var(--apple-border-danger);
            border-radius: var(--apple-radius-lg);
            padding: 2rem;
        }

        /* Card Headers Divider Line */
        .apple-card-header {
            border-b-width: 1px;
            border-color: var(--apple-border);
        }
        .apple-card-header-danger {
            border-b-width: 1px;
            border-color: var(--apple-border-danger);
        }

        /* Form Inputs Customization (Breeze Overrides) */
        .dark input[type="text"], 
        .dark input[type="email"], 
        .dark input[type="password"],
        .dark select {
            background-color: var(--apple-input-bg) !important;
            border: 1px solid var(--apple-border) !important;
            color: var(--apple-text-main) !important;
            border-radius: 10px !important;
            padding: 0.75rem 1rem !important;
            font-size: 15px !important;
            transition: border-color 0.15s ease, box-shadow 0.15s ease !important;
        }
        .dark input[type="text"]:focus, 
        .dark input[type="email"]:focus, 
        .dark input[type="password"]:focus,
        .dark select:focus {
            border-color: var(--apple-primary-on-dark) !important;
            box-shadow: 0 0 0 3px rgba(41, 151, 255, 0.25) !important;
            outline: none !important;
        }

        /* Input Labels Styling */
        .dark label {
            color: var(--apple-text-muted) !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            text-transform: none !important;
            letter-spacing: normal !important;
            margin-bottom: 0.5rem !important;
            display: block;
        }

        /* Apple Pill Buttons Styling */
        .dark button[type="submit"]:not(.bg-red-600) {
            background-color: var(--apple-primary-on-dark) !important;
            color: #ffffff !important;
            border-radius: var(--apple-radius-pill) !important;
            font-weight: 500 !important;
            font-size: 15px !important;
            padding: 10px 22px !important;
            border: none !important;
            cursor: pointer !important;
            transition: transform 0.1s ease, background-color 0.15s ease !important;
        }
        .dark button[type="submit"]:not(.bg-red-600):active {
            transform: scale(0.97) !important;
            background-color: var(--apple-primary-focus) !important;
        }

        /* Danger/Delete Account Button Styling */
        .dark button.bg-red-600,
        .dark button[type="submit"].bg-red-600 {
            background-color: var(--apple-text-danger) !important;
            color: #ffffff !important;
            border-radius: var(--apple-radius-pill) !important;
            font-weight: 500 !important;
            font-size: 15px !important;
            padding: 10px 22px !important;
            border: none !important;
            transition: transform 0.1s ease !important;
        }
        .dark button.bg-red-600:active {
            transform: scale(0.97) !important;
        }
    </style>
@endsection