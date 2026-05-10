@extends('layouts.app_learning')

@section('header', 'Pengaturan Profil')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8 pb-20">
        
        {{-- SECTION 1: INFO PROFIL --}}
        <div class="p-8 bg-slate-800 border border-slate-700 rounded-3xl shadow-xl relative overflow-hidden group hover:border-blue-500/30 transition-colors">
            <div class="absolute top-0 right-0 p-8 opacity-10">
                <span class="text-9xl grayscale">🎓</span>
            </div>

            <div class="relative z-10">
                <div class="mb-6 pb-4 border-b border-slate-700">
                    <h2 class="text-2xl font-black text-white">Informasi Akun</h2>
                    <p class="text-sm text-slate-400 mt-1">Perbarui nama tampilan dan alamat email login Anda.</p>
                </div>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- SECTION 2: GANTI PASSWORD --}}
        <div class="p-8 bg-slate-800 border border-slate-700 rounded-3xl shadow-xl">
            <div class="max-w-xl">
                <div class="mb-6 pb-4 border-b border-slate-700">
                    <h2 class="text-2xl font-black text-white">Keamanan Password</h2>
                    <p class="text-sm text-slate-400 mt-1">Pastikan akun Anda menggunakan password yang panjang dan acak.</p>
                </div>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- SECTION 3: HAPUS AKUN (DANGER ZONE) --}}
        <div class="p-8 bg-red-900/10 border border-red-500/20 rounded-3xl shadow-xl">
            <div class="max-w-xl">
                <div class="mb-6 pb-4 border-b border-red-500/20">
                    <h2 class="text-2xl font-black text-red-400">Hapus Akun</h2>
                    <p class="text-sm text-red-300/70 mt-1">Hati-hati! Sekali akun dihapus, semua data nilai dan progres belajar akan lenyap selamanya.</p>
                </div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    {{-- Kustomisasi CSS untuk Form Bawaan Breeze agar menyatu dengan Dark Mode --}}
    <style>
        .dark input[type="text"], .dark input[type="email"], .dark input[type="password"] {
            background-color: #0f172a !important; /* bg-slate-900 */
            border-color: #475569 !important; /* border-slate-600 */
            color: #f8fafc !important; /* text-white */
            border-radius: 0.75rem !important; /* rounded-xl */
            padding: 0.75rem 1.25rem !important;
        }
        .dark input[type="text"]:focus, .dark input[type="email"]:focus, .dark input[type="password"]:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5) !important;
        }
        .dark label {
            color: #94a3b8 !important; /* text-slate-400 */
            font-size: 10px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            margin-bottom: 0.5rem !important;
        }
        .dark button[type="submit"]:not(.bg-red-600) {
            background-color: #2563eb !important;
            border-radius: 0.75rem !important;
            font-weight: bold !important;
            padding: 0.75rem 2rem !important;
        }
    </style>
@endsection