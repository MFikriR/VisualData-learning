@extends('layouts.app_learning')

@section('header', 'Tambah Siswa Baru')

@section('content')
<div class="max-w-2xl mx-auto pb-20">
    
    <div class="mb-6">
        <a href="{{ route('teacher.students.index') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-colors bg-slate-800 px-4 py-2 rounded-lg border border-slate-700">
            ← Kembali ke Daftar
        </a>
    </div>

    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 relative overflow-hidden group hover:border-blue-500/50 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-eduPrimary"></div>

        <h2 class="text-2xl font-black text-white mb-8 flex items-center gap-3">
            <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400 text-lg">📝</div>
            Form Pendaftaran Siswa
        </h2>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl text-sm">
                <ul class="list-disc list-inside font-medium space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teacher.students.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-5 py-3.5 rounded-xl border @error('name') border-red-500 @else border-slate-600 @enderror bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all placeholder-slate-500" placeholder="Ketik nama lengkap siswa...">
            </div>

            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Email Siswa <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-5 py-3.5 rounded-xl border @error('email') border-red-500 @else border-slate-600 @enderror bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all placeholder-slate-500" placeholder="siswa@sekolah.id">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Kelas <span class="text-red-500">*</span></label>
                    <select name="kelas" required class="w-full px-5 py-3.5 rounded-xl border @error('kelas') border-red-500 @else border-slate-600 @enderror bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all appearance-none">
                        <option value="" disabled {{ old('kelas') ? '' : 'selected' }}>Pilih Kelas...</option>
                        @for($i = 1; $i <= 8; $i++)
                            <option value="11-{{ $i }}" {{ old('kelas') == "11-$i" ? 'selected' : '' }}>Kelas 11-{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <select name="gender" required class="w-full px-5 py-3.5 rounded-xl border @error('gender') border-red-500 @else border-slate-600 @enderror bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all appearance-none">
                        <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Gender...</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki 👨</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan 👩</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Password Awal <span class="text-red-500">*</span></label>
                <input type="password" name="password" required class="w-full px-5 py-3.5 rounded-xl border @error('password') border-red-500 @else border-slate-600 @enderror bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all placeholder-slate-500" placeholder="Minimal 8 karakter">
            </div>

            <div class="pt-6 border-t border-slate-700 flex items-center justify-end gap-4 mt-8">
                <button type="reset" class="px-6 py-3.5 text-slate-400 font-bold hover:text-white transition-colors">Reset Form</button>
                <button type="submit" class="px-8 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-transform hover:-translate-y-1">
                    💾 Daftarkan Siswa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection