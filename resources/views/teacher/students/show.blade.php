@extends('layouts.app_learning')

@section('header', 'Laporan Akademik Siswa')

@section('content')
<div class="space-y-8 pb-20 max-w-6xl mx-auto">

    <div>
        <a href="{{ route('teacher.students.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-400 hover:text-white transition-colors bg-slate-800 px-4 py-2 rounded-lg border border-slate-700">
            ← Kembali ke Daftar Siswa
        </a>
    </div>

    {{-- 2. PROFILE HEADER --}}
    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 flex flex-col md:flex-row items-center md:items-start gap-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-eduPrimary/10 blur-[50px] rounded-full pointer-events-none"></div>
        
        {{-- Foto Profil --}}
        <div class="relative z-10">
            <img src="{{ $student->profile_photo_url }}" class="w-32 h-32 rounded-2xl border border-slate-600 object-cover shadow-lg bg-slate-900">
            <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-emerald-500 border-4 border-slate-800 rounded-full" title="Status: Siswa Aktif"></div>
        </div>

        {{-- Info & Statistik Akademik --}}
        <div class="text-center md:text-left flex-1 w-full z-10">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4 mb-6">
                <div>
                    <h1 class="text-3xl font-black text-white mb-2">{{ $student->name }}</h1>
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 text-sm font-bold">
                        <span class="px-3 py-1.5 bg-slate-900 text-slate-300 rounded-lg border border-slate-700 flex items-center gap-1.5">
                            <span>📧</span> {{ $student->email }}
                        </span>
                        <span class="px-3 py-1.5 bg-slate-900 text-blue-400 rounded-lg border border-blue-500/30 flex items-center gap-1.5">
                            <span>🏫</span> Kelas {{ $student->kelas ?? '-' }}
                        </span>
                        <span class="px-3 py-1.5 bg-slate-900 text-pink-400 rounded-lg border border-pink-500/30 flex items-center gap-1.5">
                            <span>{{ $student->gender == 'male' ? '👨' : '👩' }}</span> 
                            {{ $student->gender == 'male' ? 'Laki-Laki' : ($student->gender == 'female' ? 'Perempuan' : 'Belum Diatur') }}
                        </span>
                    </div>
                </div>
                <a href="{{ route('teacher.students.edit', $student->id) }}" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-700 text-white rounded-xl text-sm font-bold border border-slate-600 transition-colors flex items-center justify-center gap-2">
                    ✏️ Edit Profil
                </a>
            </div>

            {{-- Statistik Grid Akademik --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="p-5 bg-slate-900/50 rounded-2xl border border-slate-700">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1">Rata-rata Evaluasi</p>
                    <p class="text-3xl font-black {{ $averageScore >= 70 ? 'text-emerald-400' : 'text-amber-400' }}">
                        {{ number_format($averageScore, 1) }}
                    </p>
                </div>
                <div class="p-5 bg-slate-900/50 rounded-2xl border border-slate-700">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1">Total Kuis Tuntas</p>
                    <p class="text-3xl font-black text-white">{{ $completedQuizzes }}</p>
                </div>
                <div class="p-5 bg-slate-900/50 rounded-2xl border border-slate-700 col-span-2 md:col-span-1">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1">Bergabung Sejak</p>
                    <p class="text-lg font-bold text-slate-300 mt-2">{{ $student->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- 3. RIWAYAT PENGERJAAN KUIS --}}
        <div class="lg:col-span-2 bg-slate-800 rounded-3xl shadow-xl border border-slate-700 overflow-hidden">
            <div class="p-6 border-b border-slate-700 bg-slate-900/30">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <span class="p-1.5 bg-blue-500/20 text-blue-400 rounded-lg">📝</span> Riwayat Evaluasi
                </h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-slate-900/80 text-xs uppercase font-bold text-slate-500">
                        <tr>
                            <th class="px-6 py-4">Judul Kuis / Ujian</th>
                            <th class="px-6 py-4">Waktu Pengerjaan</th>
                            <th class="px-6 py-4 text-center">Nilai</th>
                            <th class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($student->quizAttempts->sortByDesc('created_at') as $attempt)
                            <tr class="hover:bg-slate-750 transition-colors">
                                <td class="px-6 py-4 font-bold text-white">
                                    {{ $attempt->quiz->title }}
                                </td>
                                <td class="px-6 py-4 text-xs text-slate-400">
                                    {{ $attempt->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-mono font-black text-lg {{ $attempt->score >= 70 ? 'text-emerald-400' : 'text-red-400' }}">
                                        {{ $attempt->score }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($attempt->score >= 70)
                                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-lg text-[10px] font-bold uppercase tracking-wide">Tuntas</span>
                                    @else
                                        <span class="px-3 py-1 bg-red-500/10 text-red-400 border border-red-500/20 rounded-lg text-[10px] font-bold uppercase tracking-wide">Remedial</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-slate-500 italic">
                                    Siswa belum mengerjakan evaluasi apapun.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        {{-- 4. MATERI YANG SUDAH DIBACA --}}
        <div class="bg-slate-800 rounded-3xl shadow-xl border border-slate-700 overflow-hidden h-max">
            <div class="p-6 border-b border-slate-700 bg-slate-900/30">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <span class="p-1.5 bg-emerald-500/20 text-emerald-400 rounded-lg">📚</span> Modul Terbaca
                </h3>
            </div>
            <div class="p-6">
                <div class="flex flex-wrap gap-2">
                    @forelse($student->progress->where('is_completed', true)->whereNotNull('material_id') as $prog)
                        @if($prog->material)
                            <span class="px-3 py-2 bg-slate-900 text-slate-300 rounded-xl text-xs font-bold border border-slate-600 flex items-center gap-2">
                                <span class="text-emerald-400">✓</span> {{ Str::limit($prog->material->title, 25) }}
                            </span>
                        @endif
                    @empty
                        <p class="text-slate-500 text-sm text-center w-full py-4">Belum ada modul yang diselesaikan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
@endsection