@extends('layouts.app_learning')
@section('header', 'Pengaturan KKM')
@section('content')
<style>
    /* Menghilangkan tombol panah atas-bawah bawaan browser pada input number */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<div class="max-w-5xl mx-auto py-8 px-4">
    
    {{-- ALERT SUKSES --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 shadow-sm">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('teacher.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-3xl border border-[#e0e0e0] p-8 shadow-sm space-y-8">
            
            {{-- HEADER --}}
            <div class="flex items-start gap-4 pb-6 border-b border-[#f0f0f0]">
                <div class="w-12 h-12 rounded-2xl bg-[#0066cc]/10 border border-[#0066cc]/20 flex items-center justify-center text-[#0066cc] flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-[#1d1d1f] tracking-tight">Pengaturan KKM & Standar Evaluasi</h2>
                    <p class="text-sm text-[#7a7a7a] mt-1 font-normal">Kelola batas Kriteria Ketuntasan Minimal yang berlaku untuk seluruh kuis dan ujian.</p>
                </div>
            </div>

            {{-- GRID CARD KKM --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- 1. Mini Quiz --}}
                <div class="bg-[#f5f5f7] rounded-2xl p-6 border border-[#e5e5ea] flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[11px] font-bold text-[#7a7a7a] uppercase tracking-wider">Modul Pembelajaran</span>
                            <div class="w-7 h-7 rounded-lg bg-blue-100 text-[#0066cc] flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                        </div>
                        <h3 class="text-base font-bold text-[#1d1d1f]">KKM Mini-Quiz Materi</h3>
                        <p class="text-xs text-[#7a7a7a] mt-1 leading-relaxed">Batas tuntas untuk pertanyaan singkat di setiap materi.</p>
                    </div>

                    <div class="relative flex items-center">
                        <input type="number" name="kkm_mini_quiz" min="0" max="100" value="{{ $kkmMiniQuiz }}" required
                            class="w-full bg-[#111827] text-white font-bold text-lg px-4 py-3 rounded-xl pr-16 focus:outline-none focus:ring-2 focus:ring-[#0066cc] transition-all">
                        <span class="absolute right-4 text-xs font-semibold text-gray-400 pointer-events-none">/ 100</span>
                    </div>
                </div>

                {{-- 2. Evaluasi Bab --}}
                <div class="bg-[#f5f5f7] rounded-2xl p-6 border border-[#e5e5ea] flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[11px] font-bold text-[#7a7a7a] uppercase tracking-wider">Ujian Per Bab</span>
                            <div class="w-7 h-7 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            </div>
                        </div>
                        <h3 class="text-base font-bold text-[#1d1d1f]">KKM Evaluasi Bab</h3>
                        <p class="text-xs text-[#7a7a7a] mt-1 leading-relaxed">Batas tuntas kuis evaluasi pada akhir setiap Bab.</p>
                    </div>

                    <div class="relative flex items-center">
                        <input type="number" name="kkm_evaluasi_bab" min="0" max="100" value="{{ $kkmEvaluasiBab }}" required
                            class="w-full bg-[#111827] text-white font-bold text-lg px-4 py-3 rounded-xl pr-16 focus:outline-none focus:ring-2 focus:ring-[#0066cc] transition-all">
                        <span class="absolute right-4 text-xs font-semibold text-gray-400 pointer-events-none">/ 100</span>
                    </div>
                </div>

                {{-- 3. Post-Test --}}
                <div class="bg-[#f5f5f7] rounded-2xl p-6 border border-[#e5e5ea] flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[11px] font-bold text-[#7a7a7a] uppercase tracking-wider">Ujian Akhir</span>
                            <div class="w-7 h-7 rounded-lg bg-pink-100 text-pink-600 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>
                        <h3 class="text-base font-bold text-[#1d1d1f]">KKM Post-Test Akhir</h3>
                        <p class="text-xs text-[#7a7a7a] mt-1 leading-relaxed">Batas tuntas untuk Evaluasi Akhir Pembelajaran.</p>
                    </div>

                    <div class="relative flex items-center">
                        <input type="number" name="kkm_post_test" min="0" max="100" value="{{ $kkmPostTest }}" required
                            class="w-full bg-[#111827] text-white font-bold text-lg px-4 py-3 rounded-xl pr-16 focus:outline-none focus:ring-2 focus:ring-[#0066cc] transition-all">
                        <span class="absolute right-4 text-xs font-semibold text-gray-400 pointer-events-none">/ 100</span>
                    </div>
                </div>

            </div>

            {{-- INFORMASI OTOMATISASI --}}
            <div class="p-5 bg-blue-50/60 rounded-2xl border border-blue-100 flex items-start gap-3">
                <div class="w-8 h-8 rounded-xl bg-[#0066cc] text-white flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#1d1d1f]">Indikator Sistem Otomatis</h4>
                    <p class="text-xs text-[#555555] mt-0.5 leading-relaxed">
                        Siswa yang memperoleh nilai di bawah batas KKM akan otomatis ditandai <strong class="text-red-600 font-bold">Remedial</strong> pada Buku Nilai.
                    </p>
                </div>
            </div>

            {{-- TOMBOL SIMPAN --}}
            <div class="flex justify-end pt-4 border-t border-[#f0f0f0]">
                <button type="submit" 
                    class="flex items-center gap-2 px-6 py-3 bg-[#0066cc] hover:bg-[#0055b3] text-white font-semibold text-sm rounded-2xl shadow-sm transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Simpan Perubahan KKM</span>
                </button>
            </div>

        </div>
    </form>
</div>
@endsection