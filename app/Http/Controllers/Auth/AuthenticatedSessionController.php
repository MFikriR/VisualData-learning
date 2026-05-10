<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException; // <--- WAJIB ADA INI

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Cek Email & Password (Bawaan Laravel)
        $request->authenticate();

        // 2. Regenerate Session (Bawaan Laravel)
        $request->session()->regenerate();

        // ==================================================
        // 3. LOGIC GATE: CEK KECOCOKAN ROLE (GATEKEEPER)
        // ==================================================
        
        $user = $request->user();
        $expectedRole = $request->input('role'); // Ditangkap dari hidden input

        // Hanya cek jika 'expected_role' dikirim dari form
        if ($expectedRole) {
            
            // Jika Role di Database TIDAK SAMA dengan Pintu Masuk
            if ($user->role !== $expectedRole) {
                
                // TENDANG KELUAR! (Logout Paksa)
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // Tentukan Pesan Error
                $message = ($expectedRole == 'student') 
                    ? 'Akun ini terdaftar sebagai Guru. Silakan login melalui menu Akses Kontrol.' 
                    : 'Akun ini terdaftar sebagai Siswa. Silakan login melalui menu Masuk Misi.';

                // Lempar Error kembali ke halaman login
                throw ValidationException::withMessages([
                    'email' => $message,
                ]);
            }
        }

        // ==================================================
        // 4. JIKA LOLOS, ARAHKAN KE DASHBOARD SESUAI ROLE
        // ==================================================

        // Jika Guru -> Ke Dashboard Guru
        if ($user->role === 'teacher') {
            return redirect()->intended(route('teacher.dashboard'));
        }
        
        // Jika Siswa -> Ke Dashboard Siswa (Default)
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}