@extends('layouts.app_learning')

@section('header', 'Edit Data Siswa')

@section('content')
<div class="max-w-2xl mx-auto pb-20 font-sans">
    
    {{-- TOMBOL KEMBALI --}}
    <div class="mb-6">
        <a href="{{ route('teacher.students.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-800 hover:text-blue-600 transition-colors bg-white px-4 py-2.5 rounded-xl border border-slate-200 shadow-sm text-decoration-none" style="color: #1e293b !important;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Batal & Kembali
        </a>
    </div>

    {{-- KARTU UTAMA EDIT DATA --}}
    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200" style="background-color: #ffffff !important;">
        
        {{-- HEADER PROFIL --}}
        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-slate-200">
            <img src="{{ $student->profile_photo_url }}" class="w-14 h-14 rounded-2xl border border-slate-200 bg-slate-100 object-cover">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900" style="color: #0f172a !important;">Edit Data: {{ $student->name }}</h2>
                <p class="text-xs text-slate-500 font-medium mt-0.5" style="color: #64748b !important;">Pembaruan informasi akun siswa</p>
            </div>
        </div>

        <form action="{{ route('teacher.students.update', $student->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- NAMA LENGKAP --}}
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5" style="color: #334155 !important;">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $student->name }}" required 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 bg-slate-50 text-slate-900 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm outline-none"
                    style="color: #0f172a !important; background-color: #f8fafc !important;">
            </div>

            {{-- EMAIL LOGIN --}}
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5" style="color: #334155 !important;">Email Akses Login</label>
                <input type="email" name="email" value="{{ $student->email }}" required 
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 bg-slate-50 text-slate-900 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm outline-none"
                    style="color: #0f172a !important; background-color: #f8fafc !important;">
            </div>

            {{-- KELAS & JENIS KELAMIN --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5" style="color: #334155 !important;">Kelas</label>
                    <select name="kelas" required 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 bg-slate-50 text-slate-900 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm outline-none"
                        style="color: #0f172a !important; background-color: #f8fafc !important;">
                        <option value="" disabled {{ !$student->kelas ? 'selected' : '' }}>Pilih Kelas...</option>
                        @for($i = 1; $i <= 8; $i++)
                            <option value="11-{{ $i }}" {{ $student->kelas == "11-$i" ? 'selected' : '' }}>Kelas 11-{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5" style="color: #334155 !important;">Jenis Kelamin</label>
                    <select name="gender" required 
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 bg-slate-50 text-slate-900 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm outline-none"
                        style="color: #0f172a !important; background-color: #f8fafc !important;">
                        <option value="" disabled {{ !$student->gender ? 'selected' : '' }}>Pilih Jenis Kelamin...</option>
                        <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>

            {{-- UBAH PASSWORD --}}
            <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl mt-2" style="background-color: #fffbeb !important;">
                <label class="block text-xs font-bold text-amber-900 mb-1.5 flex items-center gap-1.5" style="color: #78350f !important;">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Ubah Password Akses (Opsional)
                </label>
                <input type="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengubah password" 
                    class="w-full px-4 py-2.5 rounded-xl border border-amber-300 bg-white text-slate-900 focus:ring-2 focus:ring-amber-500 transition-all text-sm outline-none placeholder-slate-400"
                    style="color: #0f172a !important; background-color: #ffffff !important;">
            </div>

            {{-- TOMBOL SIMPAN --}}
            <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3 mt-6">
                <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-sm transition-colors cursor-pointer border-none text-sm" style="background-color: #2563eb !important; color: #ffffff !important;">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection