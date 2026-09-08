@extends('layouts.app_learning')

@section('header', 'Laporan Akademik Siswa')

@section('content')
<div class="space-y-6 pb-20 max-w-6xl mx-auto font-sans">

    {{-- 1. TOMBOL KEMBALI --}}
    <div>
        <a href="{{ route('teacher.students.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#1d1d1f] hover:text-[#0066cc] transition-colors bg-white px-4 py-2 rounded-xl border border-[#e0e0e0] shadow-sm text-decoration-none">
            ← Kembali ke Daftar Siswa
        </a>
    </div>

    {{-- 2. PROFILE HEADER --}}
    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-[#e0e0e0] flex flex-col md:flex-row items-center md:items-start gap-6 sm:gap-8 relative overflow-hidden">
        
        {{-- Foto Profil --}}
        <div class="relative flex-shrink-0">
            <img src="{{ $student->profile_photo_url }}" class="w-28 h-28 sm:w-32 sm:h-32 rounded-2xl border border-[#e0e0e0] object-cover bg-[#f5f5f7]">
            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-500 border-2 border-white rounded-full" title="Status: Siswa Aktif"></div>
        </div>

        {{-- Info & Statistik Akademik --}}
        <div class="text-center md:text-left flex-1 w-full">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4 mb-6">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1d1d1f] tracking-tight mb-2">{{ $student->name }}</h1>
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-2.5 text-xs sm:text-sm font-semibold">
                        <span class="px-3 py-1.5 bg-[#f5f5f7] text-[#424245] rounded-xl border border-[#e0e0e0] flex items-center gap-1.5">
                            <span>📧</span> {{ $student->email }}
                        </span>
                        <span class="px-3 py-1.5 bg-blue-50 text-[#0066cc] rounded-xl border border-blue-200 flex items-center gap-1.5">
                            <span>🏫</span> Kelas {{ $student->kelas ?? '-' }}
                        </span>
                        <span class="px-3 py-1.5 bg-pink-50 text-pink-600 rounded-xl border border-pink-200 flex items-center gap-1.5">
                            <span>{{ $student->gender == 'male' ? '👨' : '👩' }}</span> 
                            {{ $student->gender == 'male' ? 'Laki-Laki' : ($student->gender == 'female' ? 'Perempuan' : 'Belum Diatur') }}
                        </span>
                    </div>
                </div>
                <a href="{{ route('teacher.students.edit', $student->id) }}" class="px-4 py-2.5 bg-[#f5f5f7] hover:bg-[#e0e0e0]/70 text-[#1d1d1f] rounded-xl text-xs sm:text-sm font-semibold border border-[#e0e0e0] transition-colors flex items-center justify-center gap-2 text-decoration-none">
                    ✏️ Edit Profil
                </a>
            </div>

            {{-- Statistik Grid Akademik --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3.5">
                <div class="p-4 bg-[#f5f5f7] rounded-xl border border-[#e0e0e0]">
                    <p class="text-[10px] text-[#7a7a7a] font-bold uppercase tracking-wider mb-1">Rata-rata Evaluasi</p>
                    <p class="text-2xl sm:text-3xl font-black {{ $averageScore >= 70 ? 'text-emerald-600' : 'text-amber-600' }}">
                        {{ number_format($averageScore, 1) }}
                    </p>
                </div>
                <div class="p-4 bg-[#f5f5f7] rounded-xl border border-[#e0e0e0]">
                    <p class="text-[10px] text-[#7a7a7a] font-bold uppercase tracking-wider mb-1">Total Kuis Tuntas</p>
                    <p class="text-2xl sm:text-3xl font-black text-[#1d1d1f]">{{ $completedQuizzes }}</p>
                </div>
                <div class="p-4 bg-[#f5f5f7] rounded-xl border border-[#e0e0e0] col-span-2 md:col-span-1">
                    <p class="text-[10px] text-[#7a7a7a] font-bold uppercase tracking-wider mb-1">Bergabung Sejak</p>
                    <p class="text-base sm:text-lg font-bold text-[#1d1d1f] mt-1">{{ $student->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- 3. RIWAYAT PENGERJAAN KUIS --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-[#e0e0e0] overflow-hidden">
            <div class="p-5 border-b border-[#e0e0e0] bg-[#f5f5f7]">
                <h3 class="text-base font-bold text-[#1d1d1f] flex items-center gap-2">
                    <span class="p-1.5 bg-blue-50 text-[#0066cc] rounded-lg text-sm">📝</span> Riwayat Evaluasi
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-[#1d1d1f]">
                    <thead class="bg-[#f5f5f7]/50 text-[11px] uppercase font-bold text-[#7a7a7a] border-b border-[#e0e0e0] tracking-wider">
                        <tr>
                            <th class="px-6 py-3.5">Judul Kuis / Ujian</th>
                            <th class="px-6 py-3.5">Waktu Pengerjaan</th>
                            <th class="px-6 py-3.5 text-center">Nilai</th>
                            <th class="px-6 py-3.5 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f0f0f0]">
                        @forelse($student->quizAttempts->sortByDesc('created_at') as $attempt)
                            <tr class="hover:bg-[#f5f5f7]/60 transition-colors">
                                <td class="px-6 py-4 font-bold text-[#1d1d1f]">
                                    {{ $attempt->quiz->title }}
                                </td>
                                <td class="px-6 py-4 text-xs text-[#7a7a7a]">
                                    {{ $attempt->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-mono font-black text-base {{ $attempt->score >= 70 ? 'text-emerald-600' : 'text-red-600' }}">
                                        {{ $attempt->score }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($attempt->score >= 70)
                                        <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full text-[10px] font-bold uppercase tracking-wider">Tuntas</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-red-50 text-red-700 border border-red-200 rounded-full text-[10px] font-bold uppercase tracking-wider">Remedial</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-[#7a7a7a] italic text-xs">
                                    Siswa belum mengerjakan evaluasi apapun.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- 4. MATERI YANG SUDAH DIBACA --}}
        <div class="bg-white rounded-2xl shadow-sm border border-[#e0e0e0] overflow-hidden h-max">
            <div class="p-5 border-b border-[#e0e0e0] bg-[#f5f5f7]">
                <h3 class="text-base font-bold text-[#1d1d1f] flex items-center gap-2">
                    <span class="p-1.5 bg-emerald-50 text-emerald-600 rounded-lg text-sm">📚</span> Modul Terbaca
                </h3>
            </div>
            <div class="p-5">
                <div class="flex flex-wrap gap-2">
                    @forelse($student->progress->where('is_completed', true)->whereNotNull('material_id') as $prog)
                        @if($prog->material)
                            <span class="px-3 py-1.5 bg-[#f5f5f7] text-[#1d1d1f] rounded-xl text-xs font-semibold border border-[#e0e0e0] flex items-center gap-1.5">
                                <span class="text-emerald-600 font-bold">✓</span> {{ Str::limit($prog->material->title, 25) }}
                            </span>
                        @endif
                    @empty
                        <p class="text-[#7a7a7a] text-xs text-center w-full py-4">Belum ada modul yang diselesaikan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
@endsection