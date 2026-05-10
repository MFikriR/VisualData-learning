@extends('layouts.app_learning')

@section('header', 'Edit Bab')

@section('content')
<div class="max-w-2xl mx-auto pb-20">
    
    <div class="mb-6">
        <a href="{{ route('teacher.chapters.index') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-colors bg-slate-800 px-4 py-2 rounded-lg border border-slate-700">
            ← Batal & Kembali
        </a>
    </div>

    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 relative overflow-hidden group hover:border-amber-500/50 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-500"></div>

        <h2 class="text-2xl font-black text-white mb-8 flex items-center gap-3">
            <div class="p-2 bg-amber-500/20 rounded-lg text-amber-400 text-lg border border-amber-500/30">✏️</div>
            Edit Judul & Info Bab
        </h2>

        <form action="{{ route('teacher.chapters.update', $chapter->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="col-span-1">
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Urutan</label>
                    <input type="number" name="sequence" value="{{ $chapter->sequence }}" required 
                        class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all text-center font-black text-xl">
                </div>

                <div class="col-span-1 md:col-span-3">
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Judul Bab</label>
                    <input type="text" name="title" value="{{ $chapter->title }}" required 
                        class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white font-bold focus:ring-2 focus:ring-amber-500 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="4" 
                    class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 transition-all">{{ $chapter->description }}</textarea>
            </div>

            <div class="pt-8 mt-8 border-t border-slate-700 flex items-center justify-end gap-4">
                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-amber-600 hover:bg-amber-500 text-white font-bold rounded-xl shadow-lg shadow-amber-500/20 transition-transform hover:-translate-y-1">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection