<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsTeacher
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login, atau role-nya BUKAN teacher
        if (!Auth::check() || Auth::user()->role !== 'teacher') {
            // Tendang balik ke dashboard siswa atau halaman utama
            return redirect('/dashboard')->with('error', 'Akses ditolak. Area khusus Guru.');
        }

        return $next($request);
    }
}