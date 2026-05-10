@extends('layouts.app_learning')

@section('header', 'Edit Informasi Evaluasi')

@section('content')
<div class="max-w-3xl mx-auto pb-20">
    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 relative overflow-hidden group hover:border-blue-500/50 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-eduPrimary"></div>

        <div class="flex justify-between items-center mb-8 pb-4 border-b border-slate-700">
            <h2 class="text-2xl font-black text-white flex items-center gap-3">
                <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400 text-lg">✏️</div>
                Edit Pengaturan Kuis
            </h2>
        </div>
        
        <form action="{{ route('teacher.quizzes.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                {{-- 1. Pilih Bab --}}
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Target Bab (Chapter) <span class="text-red-500">*</span></label>
                    <select name="chapter_id" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-5 py-3.5 text-white focus:ring-2 focus:ring-eduPrimary appearance-none cursor-pointer">
                        @foreach($chapters as $chapter)
                            <option value="{{ $chapter->id }}" {{ $quiz->chapter_id == $chapter->id ? 'selected' : '' }}>
                                Bab {{ $chapter->sequence }}: {{ $chapter->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 2. Judul Kuis --}}
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Judul Kuis <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $quiz->title) }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-5 py-3.5 text-white font-bold focus:ring-2 focus:ring-eduPrimary" required>
                </div>

                {{-- 3. Deskripsi --}}
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Deskripsi (Instruksi)</label>
                    <textarea name="description" rows="3" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-5 py-3.5 text-white focus:ring-2 focus:ring-eduPrimary">{{ old('description', $quiz->description) }}</textarea>
                </div>

                {{-- 4. Waktu --}}
                <div class="mb-8">
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Batas Waktu (Menit)</label>
                    <input type="number" name="time_limit" value="{{ old('time_limit', $quiz->time_limit) }}" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-5 py-3.5 text-white focus:ring-2 focus:ring-eduPrimary">
                    <p class="text-xs text-slate-500 mt-2 font-medium bg-slate-900/50 p-2 rounded-lg border border-slate-700 w-max">💡 Isi 0 jika tidak ada batas waktu.</p>
                </div>
            </div>

            <div class="flex gap-4 mt-10 pt-6 border-t border-slate-700">
                <a href="{{ route('teacher.quizzes.show', $quiz->id) }}" class="w-1/3 py-3.5 text-center rounded-xl border border-slate-600 text-slate-300 font-bold hover:bg-slate-700 transition">Batal</a>
                <button type="submit" class="w-2/3 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white rounded-xl font-bold shadow-lg shadow-blue-500/20 transition transform hover:-translate-y-1">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection