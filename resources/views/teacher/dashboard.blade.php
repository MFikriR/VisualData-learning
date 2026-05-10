@extends('layouts.app_learning')

@section('header', 'Dashboard Pengajar')

@section('content')

@php
    $classAvg = 0;
    if(isset($quizPerformance) && count($quizPerformance) > 0) {
        $classAvg = $quizPerformance->avg('attempts_avg_score') ?? 0;
    }
@endphp

<div class="space-y-8 pb-20 font-sans">
    
    {{-- 1. HEADER RINGKASAN (KPI) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- Card Total Siswa --}}
        <div class="bg-slate-800/80 p-6 rounded-3xl border border-slate-700 shadow-xl flex items-center gap-4 group hover:border-blue-500/50 transition-colors backdrop-blur-sm">
            <div class="p-4 bg-blue-500/10 text-blue-400 rounded-2xl border border-blue-500/20 group-hover:scale-110 group-hover:rotate-3 transition-transform shadow-inner">
                <span class="text-3xl">👥</span>
            </div>
            <div>
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Total Siswa Terdaftar</p>
                <h3 class="text-4xl font-black text-white drop-shadow-md">{{ $totalStudents }}</h3>
            </div>
        </div>

        {{-- Card Rata-rata Kelas --}}
        <div class="bg-slate-800/80 p-6 rounded-3xl border border-slate-700 shadow-xl flex items-center gap-4 group hover:border-emerald-500/50 transition-colors backdrop-blur-sm">
            <div class="p-4 bg-emerald-500/10 text-emerald-400 rounded-2xl border border-emerald-500/20 group-hover:scale-110 group-hover:-rotate-3 transition-transform shadow-inner">
                <span class="text-3xl">📈</span>
            </div>
            <div>
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Rata-rata Evaluasi Kelas</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-4xl font-black text-white drop-shadow-md">{{ number_format($classAvg, 1) }}</h3>
                    <span class="text-xs text-slate-500 font-bold mb-1">/ 100</span>
                </div>
            </div>
        </div>

        {{-- Card Total Ujian --}}
        <div class="bg-slate-800/80 p-6 rounded-3xl border border-slate-700 shadow-xl flex items-center gap-4 group hover:border-purple-500/50 transition-colors backdrop-blur-sm">
            <div class="p-4 bg-purple-500/10 text-purple-400 rounded-2xl border border-purple-500/20 group-hover:scale-110 transition-transform shadow-inner">
                <span class="text-3xl">📝</span>
            </div>
            <div>
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Data Ujian Terkumpul</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-4xl font-black text-white drop-shadow-md">{{ $totalAttempts }}</h3>
                    <span class="text-xs text-slate-500 font-bold mb-1">Sesi</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. DASHBOARD CONTENT --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- A. STATISTIK NILAI KUIS --}}
        <div class="bg-[#0f172a] p-8 rounded-3xl border border-slate-700 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-blue-600/10 blur-[60px] rounded-full pointer-events-none"></div>
            
            <h3 class="text-xl font-bold text-white mb-2 flex items-center gap-3">
                <div class="p-2 bg-blue-500/20 rounded-xl text-blue-400 border border-blue-500/30 shadow-inner">📊</div>
                Performa per Evaluasi
            </h3>
            <p class="text-xs text-slate-400 mb-8 border-b border-slate-700/50 pb-4">Memantau rata-rata nilai siswa pada setiap modul kuis yang tersedia.</p>
            
            <div class="space-y-6 relative z-10">
                @forelse($quizPerformance as $quiz)
                    @php 
                        $avg = $quiz->attempts_avg_score ?? 0;
                        // Logika warna untuk guru (hijau jika di atas KKM 70)
                        $colorClass = $avg >= 70 ? 'bg-gradient-to-r from-emerald-500 to-green-400' : ($avg >= 50 ? 'bg-gradient-to-r from-amber-500 to-yellow-400' : 'bg-gradient-to-r from-red-600 to-rose-400');
                        $textColor = $avg >= 70 ? 'text-emerald-400' : ($avg >= 50 ? 'text-amber-400' : 'text-red-400');
                    @endphp
                    <div class="group">
                        <div class="flex justify-between items-end mb-2">
                            <span class="font-bold text-slate-300 text-sm group-hover:text-white transition-colors">
                                {{ Str::limit($quiz->title, 40) }}
                            </span>
                            <div class="flex items-center gap-2">
                                @if($avg >= 70) <span class="text-[10px] bg-emerald-900/30 text-emerald-400 px-2 py-0.5 rounded border border-emerald-500/30">Lulus KKM</span> @endif
                                <span class="font-black {{ $textColor }} bg-slate-950 px-2 py-1 rounded border border-slate-700 shadow-inner min-w-[3rem] text-center">{{ number_format($avg, 1) }}</span>
                            </div>
                        </div>
                        <div class="w-full bg-slate-900 rounded-full h-2.5 overflow-hidden border border-slate-700 shadow-inner">
                            <div class="{{ $colorClass }} h-full rounded-full transition-all duration-1000 ease-out shadow-[0_0_10px_currentColor]" style="width: {{ $avg }}%"></div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 flex flex-col items-center justify-center">
                        <span class="text-5xl mb-3 opacity-20">📭</span>
                        <p class="text-slate-500 font-medium">Belum ada data evaluasi yang dikerjakan siswa.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- B. SISWA DENGAN N-GAIN TERBAIK --}}
        <div class="bg-[#0f172a] p-8 rounded-3xl border border-slate-700 shadow-2xl relative overflow-hidden flex flex-col">
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-emerald-500/10 blur-[60px] rounded-full pointer-events-none"></div>

            <div class="flex justify-between items-start mb-2 relative z-10 border-b border-slate-700/50 pb-4">
                <div>
                    <h3 class="text-xl font-bold text-white flex items-center gap-3 mb-1">
                        <div class="p-2 bg-emerald-500/20 rounded-xl text-emerald-400 border border-emerald-500/30 shadow-inner">🏆</div>
                        Peringkat Efektivitas Belajar
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        Menampilkan siswa dengan peningkatan pemahaman terbaik berdasarkan selisih nilai Post-Test dan Pre-Test.
                    </p>
                </div>
                <a href="{{ route('teacher.gradebook') }}" class="shrink-0 text-[10px] font-black bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-xl transition-all uppercase tracking-widest shadow-lg active:scale-95 flex items-center gap-2">
                    <span>Buku Nilai</span> <span class="text-sm">→</span>
                </a>
            </div>

            <div class="flex-1 relative z-10 mt-4">
                <ul class="space-y-4">
                    @forelse($topStudents as $student)
                        <li class="flex items-center justify-between p-4 rounded-2xl bg-slate-800/80 border border-slate-700 hover:border-emerald-500/50 transition-all hover:shadow-[0_0_15px_rgba(16,185,129,0.1)] group">
                            
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 flex items-center justify-center font-black rounded-xl {{ $loop->iteration == 1 ? 'bg-gradient-to-br from-amber-400 to-yellow-600 text-white shadow-[0_0_10px_rgba(251,191,36,0.5)] border border-amber-300' : ($loop->iteration == 2 ? 'bg-slate-300 text-slate-700 border border-slate-100' : ($loop->iteration == 3 ? 'bg-amber-700 text-amber-100 border border-amber-500' : 'bg-slate-900 text-slate-500 border border-slate-700')) }}">
                                    #{{ $loop->iteration }}
                                </div>
                                
                                <img src="{{ $student->profile_photo_url }}" class="w-12 h-12 rounded-full object-cover border-2 border-slate-600 group-hover:border-emerald-500 transition-colors bg-slate-900">
                                
                                <div>
                                    <p class="text-sm font-bold text-white mb-0.5">{{ $student->name }}</p>
                                    <p class="text-[10px] font-mono text-slate-400">{{ $student->email }}</p>
                                </div>
                            </div>
                            
                            <div class="text-right flex flex-col items-end">
                                <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mb-1">Skor Peningkatan</span>
                                <span class="text-sm text-emerald-400 font-black bg-emerald-950/50 px-3 py-1 rounded-lg border border-emerald-500/30 flex items-center gap-1">
                                    <span class="text-xs">📈</span> Tinggi
                                </span>
                            </div>
                            
                        </li>
                    @empty
                        <div class="h-full flex flex-col items-center justify-center text-center py-10 opacity-50">
                            <span class="text-5xl mb-4">📭</span>
                            <p class="text-slate-300 font-bold text-sm">Belum ada perhitungan N-Gain.</p>
                            <p class="text-xs text-slate-500 mt-1 max-w-xs">Data akan muncul setelah siswa menyelesaikan Pre-Test dan Post-Test.</p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection