@extends('layouts.app_learning')

@section('header', 'Edit Butir Soal')

@section('content')
<div class="max-w-3xl mx-auto pb-20">
    
    <div class="bg-slate-800 rounded-3xl p-8 border border-slate-700 shadow-xl relative overflow-hidden group hover:border-emerald-500/50 transition-colors">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-500"></div>
        
        <div class="flex justify-between items-center mb-8 pb-4 border-b border-slate-700">
            <h2 class="text-2xl font-black text-white flex items-center gap-3">
                <div class="p-2 bg-emerald-500/20 rounded-lg text-emerald-400 text-lg">📝</div>
                Edit Pertanyaan
            </h2>
            <a href="{{ route('teacher.quizzes.show', $question->quiz_id) }}" class="text-sm font-bold text-slate-400 hover:text-white bg-slate-900 px-4 py-2 rounded-lg border border-slate-600 transition">
                Batal & Kembali
            </a>
        </div>

        <form action="{{ route('teacher.questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- 1. Teks Pertanyaan --}}
            <div class="mb-8">
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Teks Pertanyaan Utama <span class="text-red-500">*</span></label>
                <textarea name="question_text" rows="4" class="w-full bg-slate-900 border border-slate-600 rounded-xl px-5 py-4 text-white focus:ring-2 focus:ring-emerald-500 text-lg font-medium" required>{{ old('question_text', $question->question_text) }}</textarea>
            </div>

            {{-- 2. Gambar (Opsional) --}}
            <div class="mb-8 p-5 bg-slate-900/50 border border-slate-700 rounded-2xl">
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Gambar Soal Pendukung (Opsional)</label>
                
                @if($question->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $question->image) }}" class="h-32 rounded-xl border border-slate-600 bg-slate-900 object-cover shadow-sm">
                        <p class="text-xs text-slate-500 mt-2 font-medium">Gambar saat ini</p>
                    </div>
                @endif

                <input type="file" name="image" class="block w-full text-sm text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-500/10 file:text-emerald-400 hover:file:bg-emerald-500/20 cursor-pointer">
                <p class="text-[10px] text-slate-500 mt-2 italic">*Abaikan/biarkan kosong jika tidak ingin mengubah gambar.</p>
            </div>

            {{-- 3. Opsi Jawaban A-E --}}
            <div class="mb-8">
                <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Pilihan Jawaban (Opsi)</label>
                <div class="space-y-3">
                    @foreach(['a', 'b', 'c', 'd', 'e'] as $opt)
                        @php $col = 'option_'.$opt; @endphp
                        <div class="flex items-center gap-3 p-2 border border-slate-700 bg-slate-900 rounded-xl focus-within:ring-2 focus-within:ring-emerald-500 transition-shadow">
                            <span class="w-10 h-10 flex-none bg-slate-800 rounded-lg flex items-center justify-center font-bold text-slate-400 uppercase border border-slate-600">
                                {{ $opt }}
                            </span>
                            <input type="text" name="option_{{ $opt }}" value="{{ old('option_'.$opt, $question->$col) }}" class="flex-1 bg-transparent border-none px-2 py-2 text-white focus:ring-0 font-medium" placeholder="Ketik opsi {{ strtoupper($opt) }}...">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- 4. Kunci Jawaban --}}
            <div class="mb-10 p-5 bg-emerald-500/5 border border-emerald-500/20 rounded-2xl">
                <label class="block text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest mb-3 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Pilih Kunci Jawaban Benar
                </label>
                <select name="correct_answer" class="w-full bg-emerald-900/30 border border-emerald-500/50 rounded-xl px-5 py-3.5 text-emerald-300 font-bold focus:ring-2 focus:ring-emerald-500 appearance-none cursor-pointer">
                    @foreach(['a', 'b', 'c', 'd', 'e'] as $opt)
                        <option value="{{ $opt }}" {{ $question->correct_answer == $opt ? 'selected' : '' }} class="bg-slate-800 text-white">
                            Opsi {{ strtoupper($opt) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl font-bold shadow-lg shadow-emerald-500/20 transition transform hover:-translate-y-1 flex justify-center items-center gap-2">
                💾 Simpan Perubahan Soal
            </button>

        </form>
    </div>
</div>
@endsection