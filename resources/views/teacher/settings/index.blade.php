@extends('layouts.app_learning')

@section('header', 'Pengaturan KKM')

@section('content')
<div class="max-w-4xl mx-auto pb-20 font-sans space-y-6">

    {{-- NOTIFIKASI SUKSES (Tampil saat berhasil menyimpan) --}}
    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-500 text-white rounded-xl flex items-center justify-center font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-900">Pembaruan Berhasil</h4>
                    <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 p-1 border-none bg-transparent cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
    @endif

    {{-- KARTU UTAMA PENGATURAN KKM --}}
    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-[#e0e0e0]">
        
        {{-- HEADER FORM --}}
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-[#e0e0e0]">
            <div class="w-12 h-12 bg-blue-50 text-[#0066cc] rounded-2xl flex items-center justify-center border border-blue-100 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-[#1d1d1f]">Pengaturan KKM & Standar Evaluasi</h2>
                <p class="text-xs text-[#7a7a7a] font-medium mt-0.5">Kelola batas Kriteria Ketuntasan Minimal yang berlaku untuk seluruh kuis dan ujian.</p>
            </div>
        </div>

        <form action="{{ route('teacher.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- GRID FORM AMBANG BATAS KKM --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                
                {{-- 1. KKM Mini Quiz --}}
                <div class="p-5 bg-[#f5f5f7] rounded-2xl border border-[#e0e0e0] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-[#7a7a7a] uppercase tracking-wider">Modul Pembelajaran</span>
                        <span class="p-1.5 bg-blue-100 text-[#0066cc] rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </span>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#1d1d1f]">KKM Mini-Quiz Materii</label>
                        <p class="text-[11px] text-[#7a7a7a] mt-0.5 mb-3">Batas tuntas untuk pertanyaan singkat di setiap materi.</p>
                    </div>
                    <div class="relative">
                        <input type="number" name="kkm_mini_quiz" value="{{ $kkm_mini_quiz ?? 70 }}" min="0" max="100" required 
                            class="w-full px-4 py-2.5 rounded-xl border border-[#e0e0e0] bg-white text-[#1d1d1f] font-bold text-lg focus:ring-2 focus:ring-[#0066cc]/20 focus:border-[#0066cc] transition-all outline-none">
                        <span class="absolute right-3.5 top-3 text-xs font-semibold text-[#86868b]">/ 100</span>
                    </div>
                </div>

                {{-- 2. KKM Evaluasi Bab --}}
                <div class="p-5 bg-[#f5f5f7] rounded-2xl border border-[#e0e0e0] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-[#7a7a7a] uppercase tracking-wider">Ujian Per Bab</span>
                        <span class="p-1.5 bg-purple-100 text-purple-700 rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </span>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#1d1d1f]">KKM Evaluasi Bab</label>
                        <p class="text-[11px] text-[#7a7a7a] mt-0.5 mb-3">Batas tuntas kuis evaluasi pada akhir setiap Bab.</p>
                    </div>
                    <div class="relative">
                        <input type="number" name="kkm_evaluasi_bab" value="{{ $kkm_evaluasi_bab ?? 70 }}" min="0" max="100" required 
                            class="w-full px-4 py-2.5 rounded-xl border border-[#e0e0e0] bg-white text-[#1d1d1f] font-bold text-lg focus:ring-2 focus:ring-[#0066cc]/20 focus:border-[#0066cc] transition-all outline-none">
                        <span class="absolute right-3.5 top-3 text-xs font-semibold text-[#86868b]">/ 100</span>
                    </div>
                </div>

                {{-- 3. KKM Uji Kompetensi / Post-Test --}}
                <div class="p-5 bg-[#f5f5f7] rounded-2xl border border-[#e0e0e0] space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold text-[#7a7a7a] uppercase tracking-wider">Ujian Akhir</span>
                        <span class="p-1.5 bg-pink-100 text-pink-700 rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </span>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#1d1d1f]">KKM Post-Test Akhir</label>
                        <p class="text-[11px] text-[#7a7a7a] mt-0.5 mb-3">Batas tuntas untuk Evaluasi Akhir Pembelajaran.</p>
                    </div>
                    <div class="relative">
                        <input type="number" name="kkm_post_test" value="{{ $kkm_post_test ?? 70 }}" min="0" max="100" required 
                            class="w-full px-4 py-2.5 rounded-xl border border-[#e0e0e0] bg-white text-[#1d1d1f] font-bold text-lg focus:ring-2 focus:ring-[#0066cc]/20 focus:border-[#0066cc] transition-all outline-none">
                        <span class="absolute right-3.5 top-3 text-xs font-semibold text-[#86868b]">/ 100</span>
                    </div>
                </div>

            </div>

            {{-- PRATINJAU INDIKATOR KETUNTASAN --}}
            <div class="p-5 bg-blue-50/60 border border-blue-200/80 rounded-2xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-500 text-white rounded-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-[#1d1d1f]">Indikator Sistem Otomatis</h4>
                        <p class="text-xs text-[#7a7a7a] mt-0.5">Siswa yang memperoleh nilai di bawah batas KKM akan otomatis ditandai <span class="font-bold text-red-600">Remedial</span> pada Buku Nilai.</p>
                    </div>
                </div>
            </div>

            {{-- TOMBOL SIMPAN --}}
            <div class="pt-4 border-t border-[#e0e0e0] flex items-center justify-end gap-3">
                <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-[#0066cc] hover:bg-[#0071e3] text-white font-semibold rounded-xl shadow-sm transition-colors cursor-pointer border-none text-sm flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Simpan Perubahan KKM</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection