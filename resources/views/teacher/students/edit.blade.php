@extends('layouts.app_learning')

@section('header', 'Edit Data Siswa')

@section('content')
<div class="max-w-2xl mx-auto pb-20">
    
    <div class="mb-6">
        <a href="{{ route('teacher.students.index') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-colors bg-slate-800 px-4 py-2 rounded-lg border border-slate-700">
            ← Batal & Kembali
        </a>
    </div>

    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 relative overflow-hidden group hover:border-amber-500/50 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-500"></div>

        <div class="flex items-center gap-5 mb-8 pb-6 border-b border-slate-700">
            <img src="{{ $student->profile_photo_url }}" class="w-16 h-16 rounded-2xl border border-slate-600 bg-slate-900 object-cover">
            <div>
                <h2 class="text-2xl font-black text-white mb-1">Edit: {{ $student->name }}</h2>
                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Pembaruan Informasi Akun</p>
            </div>
        </div>

        <form action="{{ route('teacher.students.update', $student->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $student->name }}" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all">
            </div>

            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Email Login</label>
                <input type="email" name="email" value="{{ $student->email }}" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Kelas</label>
                    <select name="kelas" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all appearance-none">
                        <option value="" disabled {{ !$student->kelas ? 'selected' : '' }}>Pilih Kelas...</option>
                        @for($i = 1; $i <= 8; $i++)
                            <option value="11-{{ $i }}" {{ $student->kelas == "11-$i" ? 'selected' : '' }}>Kelas 11-{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Jenis Kelamin</label>
                    <select name="gender" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all appearance-none">
                        <option value="" disabled {{ !$student->gender ? 'selected' : '' }}>Pilih Gender...</option>
                        <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Laki-laki 👨</option>
                        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Perempuan 👩</option>
                    </select>
                </div>
            </div>

            <div class="p-5 bg-amber-500/5 border border-amber-500/20 rounded-2xl mt-4">
                <label class="block text-[10px] font-extrabold text-amber-500 uppercase tracking-widest mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Ubah Password Akses
                </label>
                <input type="password" name="password" placeholder="Biarkan kosong jika tidak mengubah password" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all placeholder-slate-600">
            </div>

            <div class="pt-6 border-t border-slate-700 flex items-center justify-end gap-4 mt-8">
                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-amber-600 hover:bg-amber-500 text-white font-bold rounded-xl shadow-lg shadow-amber-500/20 transition-transform hover:-translate-y-1">
                    💾 Simpan Pembaruan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection