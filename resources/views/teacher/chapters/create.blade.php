@extends('layouts.app_learning')

@section('header', 'Buat Bab Baru')

@section('content')
<div class="max-w-2xl mx-auto pb-20">
    
    <div class="mb-6">
        <a href="{{ route('teacher.chapters.index') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-colors bg-slate-800 px-4 py-2 rounded-lg border border-slate-700">
            ← Kembali ke Kurikulum
        </a>
    </div>

    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 relative overflow-hidden group hover:border-blue-500/50 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-eduPrimary"></div>

        <h2 class="text-2xl font-black text-white mb-8 flex items-center gap-3">
            <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400 text-lg border border-blue-500/30">📝</div>
            Tambah Bab Kurikulum
        </h2>

        <form action="{{ route('teacher.chapters.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                {{-- Input Urutan --}}
                <div class="col-span-1">
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Urutan Bab <span class="text-red-500">*</span></label>
                    <input type="number" name="sequence" required placeholder="1" 
                        class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all text-center font-black text-xl placeholder-slate-600">
                </div>

                {{-- Input Judul --}}
                <div class="col-span-1 md:col-span-3">
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Judul Bab <span class="text-red-500">*</span></label>
                    <input type="text" name="title" required placeholder="Misal: Pengenalan K-Means" 
                        class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white font-bold focus:ring-2 focus:ring-eduPrimary transition-all placeholder-slate-600">
                </div>
            </div>

            {{-- Input Deskripsi --}}
            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Deskripsi Singkat Bab</label>
                <textarea name="description" rows="4" placeholder="Jelaskan secara singkat apa yang akan dipelajari di bab ini..." 
                    class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all placeholder-slate-600"></textarea>
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-8 mt-8 border-t border-slate-700 flex items-center justify-end gap-4">
                <button type="reset" class="px-6 py-3.5 text-slate-400 font-bold hover:text-white transition-colors">Reset Form</button>
                <button type="submit" class="px-8 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-transform hover:-translate-y-1">
                    💾 Simpan Bab Baru
                </button>
            </div>
        </form>
    </div>
</div>
@endsection