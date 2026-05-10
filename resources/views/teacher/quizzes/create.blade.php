@extends('layouts.app_learning')

@section('header', 'Pembuat Evaluasi (Quiz Builder)')

@section('content')
<div class="max-w-5xl mx-auto pb-32">
    
    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 flex items-start gap-3 animate-fade-in shadow-sm">
            <div class="text-red-400 mt-0.5">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-red-400 mb-1">Gagal Menyimpan Kuis!</h4>
                <ul class="list-disc list-inside text-sm text-red-300 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-black text-white tracking-tight">Rakit Kuis Baru</h1>
            <p class="text-slate-400 mt-1 text-sm">Susun evaluasi interaktif untuk mengukur pemahaman siswa.</p>
        </div>
        <a href="{{ route('teacher.chapters.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-600 text-slate-300 text-sm font-bold hover:bg-slate-700 transition-colors flex items-center gap-2">
            <span>←</span> Batal
        </a>
    </div>

    <form action="{{ route('teacher.quizzes.store') }}" method="POST" id="quizForm" enctype="multipart/form-data">
        @csrf

        {{-- 1. INFORMASI DASAR KUIS --}}
        <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 mb-8 relative overflow-hidden group hover:border-blue-500/50 transition-colors">
            <div class="absolute top-0 left-0 w-1.5 h-full bg-eduPrimary"></div>
            
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                <div class="p-2 bg-blue-500/20 rounded-lg text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                Pengaturan Utama Kuis
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Judul Evaluasi <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Evaluasi Akhir Bab 1" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-shadow">
                </div>
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Pilih Bab (Materi) <span class="text-red-500">*</span></label>
                    <select name="chapter_id" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary appearance-none cursor-pointer">
                        @foreach($chapters as $chapter)
                            <option value="{{ $chapter->id }}" {{ old('chapter_id') == $chapter->id ? 'selected' : '' }}>Bab {{ $chapter->sequence }}: {{ $chapter->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Tipe Kuis <span class="text-red-500">*</span></label>
                    <select name="type" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary appearance-none cursor-pointer">
                        <option value="normal">Kuis Latihan Biasa (Normal)</option>
                        <option value="pre_test">Evaluasi Awal (Pre-Test)</option>
                        <option value="post_test">Evaluasi Akhir (Post-Test)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Batas Waktu (Menit)</label>
                    <input type="number" name="time_limit" value="{{ old('time_limit', 0) }}" placeholder="Isi 0 jika tanpa batas waktu" class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white font-medium focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Deskripsi / Instruksi</label>
                    <textarea name="description" rows="2" placeholder="Tuliskan petunjuk pengerjaan kuis untuk siswa di sini..." class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 mb-6">
            <div class="h-px bg-slate-700 flex-grow"></div>
            <span class="text-sm font-bold text-eduPrimary uppercase tracking-widest px-4 py-1.5 rounded-full border border-blue-500/30 bg-blue-500/10">📝 Daftar Pertanyaan</span>
            <div class="h-px bg-slate-700 flex-grow"></div>
        </div>

        {{-- 2. AREA SOAL (DINAMIS) --}}
        <div id="questionsContainer" class="space-y-8">
            {{-- Soal akan dimuat otomatis oleh JS di sini --}}
        </div>

        {{-- 3. FLOATING ACTION BAR --}}
        <div class="fixed bottom-0 left-0 md:left-[260px] lg:left-[280px] right-0 bg-[#0f172a]/90 backdrop-blur-xl border-t border-slate-700 p-4 md:px-8 z-50 shadow-[0_-10px_40px_rgba(0,0,0,0.5)] flex flex-col sm:flex-row justify-between items-center gap-4 transition-all">
            
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center text-blue-400 font-black text-xl shadow-inner" id="total-badge">0</div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Butir Soal</p>
                    <p class="text-sm font-bold text-white" id="total-label">Siap Disimpan</p>
                </div>
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <button type="button" onclick="addQuestion()" class="flex-1 sm:flex-none px-6 py-3.5 rounded-xl border border-slate-600 bg-slate-800 text-slate-300 font-bold hover:bg-slate-700 hover:text-white transition-colors flex items-center justify-center gap-2 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Soal
                </button>

                <button type="submit" class="flex-1 sm:flex-none px-8 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                    💾 Simpan Kuis
                </button>
            </div>
        </div>

    </form>
</div>

{{-- SCRIPT QUIZ BUILDER MAGIC --}}
<script>
    let globalIdCounter = 0; 

    function addQuestion() {
        globalIdCounter++;
        
        const html = `
        <div class="question-card bg-slate-800 rounded-2xl shadow-xl border border-slate-700 relative animate-slide-up transition-all duration-300" id="qCard_${globalIdCounter}">
            
            {{-- Header Kartu --}}
            <div class="flex justify-between items-center bg-slate-900/50 px-6 py-4 rounded-t-2xl border-b border-slate-700">
                <div class="flex items-center gap-4">
                    <h4 class="font-black text-white text-lg question-number-label">
                        Soal #<span>X</span>
                    </h4>
                    <div class="flex bg-slate-800 rounded-lg overflow-hidden border border-slate-600">
                        <button type="button" onclick="moveUp('qCard_${globalIdCounter}')" class="px-2 py-1.5 text-slate-400 hover:bg-eduPrimary hover:text-white transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg></button>
                        <div class="w-px bg-slate-600"></div>
                        <button type="button" onclick="moveDown('qCard_${globalIdCounter}')" class="px-2 py-1.5 text-slate-400 hover:bg-eduPrimary hover:text-white transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    </div>
                </div>

                <button type="button" onclick="removeQuestion('qCard_${globalIdCounter}')" class="text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/20 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors flex items-center gap-1">
                    Hapus ✕
                </button>
            </div>

            {{-- Body Kartu --}}
            <div class="p-6">
                
                {{-- Area Upload Gambar --}}
                <div class="mb-5">
                    <label class="flex items-center gap-2 cursor-pointer w-max text-sm font-bold text-blue-400 bg-blue-500/10 hover:bg-blue-500/20 px-4 py-2.5 rounded-xl border border-blue-500/30 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Sematkan Gambar (Opsional)</span>
                        <input type="file" name="questions[${globalIdCounter}][image]" class="hidden" accept="image/*" onchange="previewImage(this, ${globalIdCounter})">
                    </label>
                    <img id="preview_${globalIdCounter}" src="" class="hidden mt-4 max-h-48 rounded-xl border border-slate-600 shadow-md object-cover bg-slate-900">
                </div>

                {{-- Input Teks Pertanyaan --}}
                <div class="mb-6">
                    <textarea name="questions[${globalIdCounter}][text]" required placeholder="Ketik pertanyaan dengan jelas di sini..." class="w-full p-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary min-h-[100px] text-base font-medium resize-y"></textarea>
                </div>

                {{-- Input Opsi (A - E) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    ${generateOptionHTML(globalIdCounter, 0, 'A')}
                    ${generateOptionHTML(globalIdCounter, 1, 'B')}
                    ${generateOptionHTML(globalIdCounter, 2, 'C')}
                    ${generateOptionHTML(globalIdCounter, 3, 'D')}
                    <div class="md:col-span-2 lg:col-span-1">
                        ${generateOptionHTML(globalIdCounter, 4, 'E')}
                    </div>
                </div>
            </div>
        </div>
        `;

        document.getElementById('questionsContainer').insertAdjacentHTML('beforeend', html);
        updateQuestionNumbers();
        
        const newCard = document.getElementById(`qCard_${globalIdCounter}`);
        setTimeout(() => { newCard.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 100);
    }

    function generateOptionHTML(qId, optIdx, label) {
        return `
        <label class="option-wrapper flex items-center gap-4 p-3 rounded-xl border border-slate-600 bg-slate-900 cursor-pointer hover:border-blue-500/50 transition-all has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-500/10">
            <div class="relative flex items-center justify-center">
                <input type="radio" name="questions[${qId}][correct_index]" value="${optIdx}" ${label==='A' ? 'required' : ''} class="peer w-5 h-5 text-emerald-500 border-slate-500 bg-slate-800 focus:ring-emerald-500 focus:ring-offset-slate-900 cursor-pointer" title="Jadikan Kunci Jawaban">
                <div class="absolute inset-0 rounded-full bg-emerald-500 opacity-0 peer-checked:animate-ping pointer-events-none"></div>
            </div>
            
            <div class="w-full flex gap-3 items-center">
                <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-slate-800 border border-slate-600 text-slate-400 font-bold flex items-center justify-center text-sm shadow-inner group-has-[:checked]:bg-emerald-500 group-has-[:checked]:text-white group-has-[:checked]:border-emerald-500 transition-colors">
                    ${label}
                </span>
                <input type="text" name="questions[${qId}][options][${optIdx}]" ${label==='A' || label==='B' ? 'required' : ''} placeholder="Ketik opsi jawaban..." class="w-full bg-transparent border-none p-0 focus:ring-0 text-white font-medium text-sm placeholder-slate-500">
            </div>
        </label>
        `;
    }

    function previewImage(input, qId) {
        const preview = document.getElementById('preview_' + qId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    }

    function moveUp(cardId) {
        const card = document.getElementById(cardId);
        const prevCard = card.previousElementSibling;
        if (prevCard && prevCard.classList.contains('question-card')) {
            card.parentNode.insertBefore(card, prevCard);
            updateQuestionNumbers();
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function moveDown(cardId) {
        const card = document.getElementById(cardId);
        const nextCard = card.nextElementSibling;
        if (nextCard && nextCard.classList.contains('question-card')) {
            card.parentNode.insertBefore(nextCard, card);
            updateQuestionNumbers();
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    function removeQuestion(cardId) {
        const card = document.getElementById(cardId);
        card.style.transform = 'scale(0.95)';
        card.style.opacity = '0';
        setTimeout(() => {
            card.remove();
            updateQuestionNumbers(); 
        }, 300);
    }

    function updateQuestionNumbers() {
        const cards = document.querySelectorAll('.question-card');
        const badge = document.getElementById('total-badge');
        
        cards.forEach((card, index) => {
            const numberLabel = card.querySelector('.question-number-label span');
            if(numberLabel) {
                numberLabel.textContent = index + 1;
            }
        });

        badge.textContent = cards.length;
        badge.classList.remove('animate-pop');
        void badge.offsetWidth; 
        badge.classList.add('animate-pop');
    }

    document.addEventListener("DOMContentLoaded", function() {
        if(document.querySelectorAll('.question-card').length === 0) {
            addQuestion();
        }
    });
</script>

<style>
    .animate-slide-up { animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes slideUp { 
        from { opacity: 0; transform: translateY(30px) scale(0.98); } 
        to { opacity: 1; transform: translateY(0) scale(1); } 
    }
    .animate-pop { animation: popBadge 0.3s ease-out; }
    @keyframes popBadge {
        0% { transform: scale(1); }
        50% { transform: scale(1.3); }
        100% { transform: scale(1); }
    }
</style>
@endsection