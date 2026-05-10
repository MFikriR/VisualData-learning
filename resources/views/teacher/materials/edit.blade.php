@extends('layouts.app_learning')

@section('header', 'Edit Materi Block Builder')

@section('content')
<div class="max-w-5xl mx-auto pb-32">
    
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-black text-white tracking-tight flex items-center gap-3">
            <span>✏️</span> Edit Materi
        </h1>
        <a href="{{ route('teacher.chapters.show', $material->chapter_id) }}" class="px-5 py-2.5 rounded-xl border border-slate-600 text-slate-300 text-sm font-bold hover:bg-slate-700 transition-colors flex items-center gap-2">
            <span>←</span> Batal & Kembali
        </a>
    </div>

    <div class="bg-slate-800 rounded-3xl p-8 shadow-xl border border-slate-700 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-eduPrimary/10 blur-[50px] rounded-full pointer-events-none"></div>

        <form action="{{ route('teacher.materials.update', $material->id) }}" method="POST" class="space-y-8 relative z-10" id="materialForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- 1. PENGATURAN DASAR --}}
            <div class="p-6 bg-slate-900/50 rounded-2xl border border-slate-700">
                <h3 class="font-bold text-white mb-6 border-b border-slate-700 pb-3 flex items-center gap-2">
                    <span class="p-1.5 bg-blue-500/20 text-blue-400 rounded">⚙️</span> Pengaturan Dasar
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Urutan Materi</label>
                        <input type="number" name="sequence" value="{{ $material->sequence }}" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Minimal Level (XP)</label>
                        <input type="number" name="min_level" value="{{ $material->min_level ?? 1 }}" required class="w-full px-5 py-3.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Judul Materi</label>
                    <input type="text" name="title" value="{{ $material->title }}" required class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary transition-all font-black text-lg">
                </div>
            </div>

            {{-- 2. SUSUN ISI MATERI --}}
            <div>
                <h3 class="font-bold text-white mb-6 border-b border-slate-700 pb-3 flex items-center gap-2 mt-10">
                    <span class="p-1.5 bg-emerald-500/20 text-emerald-400 rounded">🧱</span> Susun Isi (Body) Materi
                </h3>
                
                <div id="content-builder" class="space-y-5 mb-8">
                    {{-- Blok akan di-inject di sini oleh JS (Hasil Parse dari DB) --}}
                </div>

                {{-- PANEL TOMBOL TAMBAH BLOK --}}
                <div class="bg-slate-900 rounded-2xl border-2 border-dashed border-slate-600 p-8 text-center hover:border-eduPrimary/50 transition-colors">
                    <p class="text-xs font-bold text-slate-400 mb-6 uppercase tracking-widest">Tambah Blok Baru</p>
                    
                    <div class="flex flex-wrap gap-4 justify-center">
                        <button type="button" onclick="addBlock('title')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-blue-500 hover:bg-blue-500/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">📌</span><span class="text-xs font-bold text-slate-300 group-hover:text-blue-400">Judul (H3)</span></button>
                        <button type="button" onclick="addBlock('subtitle')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-blue-400 hover:bg-blue-400/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">🔖</span><span class="text-xs font-bold text-slate-300 group-hover:text-blue-300">Sub-Judul</span></button>
                        <button type="button" onclick="addBlock('text')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-emerald-500 hover:bg-emerald-500/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">📝</span><span class="text-xs font-bold text-slate-300 group-hover:text-emerald-400">Paragraf</span></button>
                        <button type="button" onclick="addBlock('list')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-emerald-400 hover:bg-emerald-400/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">📋</span><span class="text-xs font-bold text-slate-300 group-hover:text-emerald-300">Poin/List</span></button>
                        <div class="w-px bg-slate-700 mx-2"></div>
                        <button type="button" onclick="addBlock('image')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-purple-500 hover:bg-purple-500/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">🖼️</span><span class="text-xs font-bold text-slate-300 group-hover:text-purple-400">Gambar</span></button>
                        <button type="button" onclick="addBlock('youtube')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-red-500 hover:bg-red-500/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">📺</span><span class="text-xs font-bold text-slate-300 group-hover:text-red-400">YouTube</span></button>
                        <button type="button" onclick="addBlock('alert')" class="flex flex-col items-center justify-center p-4 w-28 bg-slate-800 border border-slate-600 rounded-xl hover:border-amber-500 hover:bg-amber-500/10 transition-colors group"><span class="text-2xl mb-2 group-hover:scale-110 transition-transform">💡</span><span class="text-xs font-bold text-slate-300 group-hover:text-amber-400">Kotak Info</span></button>
                    </div>
                </div>
            </div>

            {{-- 3. FLOATING ACTION BAR --}}
            <div class="fixed bottom-0 left-0 md:left-[260px] lg:left-[280px] right-0 bg-[#0f172a]/90 backdrop-blur-xl border-t border-slate-700 p-4 md:px-8 z-50 shadow-[0_-10px_40px_rgba(0,0,0,0.5)] flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-400 font-black text-xl border border-blue-500/30 block-counter-badge">0</div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Komponen Blok</p>
                        <p class="text-sm font-bold text-white">Siap Diubah</p>
                    </div>
                </div>
                <button type="submit" class="px-8 py-3.5 bg-eduPrimary hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/20 transition-transform hover:-translate-y-1 flex items-center gap-2">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- WADAH TERSEMBUNYI UNTUK DATA HTML DARI DATABASE --}}
<div id="legacy-content" class="hidden">{!! $material->content !!}</div>

<script>
    let globalBlockCounter = 0;

    // FUNGSI PARSING DATA LAMA KE BLOK BARU
    function parseExistingContent() {
        const legacyContainer = document.getElementById('legacy-content');
        const wrapper = legacyContainer.firstElementChild; 

        if (!wrapper || !wrapper.classList.contains('space-y-8')) {
            if(legacyContainer.innerHTML.trim() !== '') {
                addBlock('text', legacyContainer.innerHTML.trim());
            }
            return;
        }

        const blocks = wrapper.children;
        for (let block of blocks) {
            if (block.querySelector('h3')) {
                addBlock('title', block.querySelector('h3').innerText);
            } else if (block.querySelector('h4')) {
                addBlock('subtitle', block.querySelector('h4').innerText);
            } else if (block.querySelector('p')) {
                let html = block.querySelector('p').innerHTML;
                let text = html.replace(/<br\s*[\/]?>/gi, '\n'); 
                addBlock('text', text);
            } else if (block.querySelector('ul')) {
                let lis = block.querySelectorAll('li');
                let text = Array.from(lis).map(li => li.innerText).join('\n');
                addBlock('list', text);
            } else if (block.querySelector('img')) {
                addBlock('image', block.querySelector('img').getAttribute('src'));
            } else if (block.querySelector('iframe')) {
                let src = block.querySelector('iframe').getAttribute('src');
                let match = src.match(/embed\/([^?]+)/);
                let id = match ? match[1] : '';
                addBlock('youtube', id);
            } else if (block.querySelector('.bg-yellow-50') || block.innerText.includes('💡')) {
                let clone = block.cloneNode(true);
                let strong = clone.querySelector('strong');
                if(strong) strong.remove();
                let text = clone.innerText.replace(/^\s+|\s+$/g, '');
                addBlock('alert', text);
            } else {
                 addBlock('text', block.innerHTML);
            }
        }
    }

    function previewMaterialImage(input, blockId) {
        const preview = document.getElementById('preview_' + blockId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function addBlock(type, initialContent = '') {
        globalBlockCounter++;
        const container = document.getElementById('content-builder');
        const blockId = `blockCard_${globalBlockCounter}`;
        
        let blockHtml = '';
        let title = '';
        let icon = '';
        let bgStyle = 'bg-slate-800';
        let borderColor = 'border-slate-600';
        let accentColor = 'text-white';

        const safeValue = initialContent.replace(/"/g, '&quot;');

        switch(type) {
            case 'title':
                title = 'Judul Utama (H3)'; icon = '📌'; borderColor = 'border-blue-500/50'; accentColor='text-blue-400';
                blockHtml = `<input type="text" name="blocks[${globalBlockCounter}][content]" value="${safeValue}" required placeholder="Ketik Judul Besar" class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary font-black text-xl placeholder-slate-600">`;
                break;
            case 'subtitle':
                title = 'Sub-Judul (H4)'; icon = '🔖'; borderColor = 'border-blue-400/50'; accentColor='text-blue-300';
                blockHtml = `<input type="text" name="blocks[${globalBlockCounter}][content]" value="${safeValue}" required placeholder="Ketik Sub-Judul" class="w-full px-5 py-3 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary font-bold text-lg placeholder-slate-600">`;
                break;
            case 'text':
                title = 'Teks Paragraf'; icon = '📝'; borderColor = 'border-emerald-500/50'; accentColor='text-emerald-400';
                blockHtml = `<textarea name="blocks[${globalBlockCounter}][content]" rows="4" required placeholder="Ketik isi materi paragraf di sini..." class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary leading-relaxed placeholder-slate-600">${initialContent}</textarea>`;
                break;
            case 'list':
                title = 'Daftar Poin (Bullet List)'; icon = '📋'; borderColor = 'border-emerald-400/50'; accentColor='text-emerald-300';
                blockHtml = `
                    <p class="text-[11px] text-slate-400 mb-3 font-bold bg-slate-900/50 px-3 py-1.5 rounded-lg w-max border border-slate-700">💡 Gunakan tombol ENTER untuk memisahkan setiap poin list baru.</p>
                    <textarea name="blocks[${globalBlockCounter}][content]" rows="4" required placeholder="Poin pertama\nPoin kedua..." class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary leading-relaxed placeholder-slate-600">${initialContent}</textarea>`;
                break;
            case 'image':
                title = 'Gambar Media'; icon = '🖼️'; borderColor = 'border-purple-500/50'; bgStyle = 'bg-purple-900/10'; accentColor='text-purple-400';
                blockHtml = `
                    <div class="mb-2">
                        <label class="flex items-center gap-2 cursor-pointer w-max text-sm font-bold text-purple-300 bg-purple-500/20 hover:bg-purple-500/30 px-5 py-3 rounded-xl transition-colors border border-purple-500/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>Pilih File Gambar dari Komputer</span>
                            <input type="file" name="blocks[${globalBlockCounter}][file]" class="hidden" accept="image/*" onchange="previewMaterialImage(this, ${globalBlockCounter})">
                        </label>
                        <input type="hidden" name="blocks[${globalBlockCounter}][content]" value="${safeValue}">
                        <p class="text-[11px] text-slate-500 italic mt-2">Abaikan tombol ini jika ingin mempertahankan gambar lama.</p>
                        ${safeValue ? `<img id="preview_${globalBlockCounter}" src="${safeValue}" class="mt-4 max-h-64 rounded-xl border border-slate-600 shadow-md object-cover bg-slate-900">` : `<img id="preview_${globalBlockCounter}" src="" class="hidden mt-4 max-h-64 rounded-xl border border-slate-600 shadow-md object-cover bg-slate-900">`}
                    </div>`;
                break;
            case 'youtube':
                title = 'Video YouTube'; icon = '📺'; borderColor = 'border-red-500/50'; bgStyle = 'bg-red-900/10'; accentColor='text-red-400';
                blockHtml = `
                    <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2 block">Masukkan ID Video YouTube Saja</label>
                    <input type="text" name="blocks[${globalBlockCounter}][content]" value="${safeValue}" required placeholder="Contoh ID: erRc0o5XRCc" class="w-full px-5 py-3 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-red-500 placeholder-slate-600">`;
                break;
            case 'alert':
                title = 'Kotak Info Penting'; icon = '💡'; borderColor = 'border-amber-500/50'; bgStyle = 'bg-amber-900/10'; accentColor='text-amber-400';
                blockHtml = `<textarea name="blocks[${globalBlockCounter}][content]" rows="3" required placeholder="Tulis catatan atau peringatan penting untuk siswa..." class="w-full px-5 py-4 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-amber-500 placeholder-slate-600">${initialContent}</textarea>`;
                break;
        }

        const template = `
            <div id="${blockId}" class="block-card relative p-6 rounded-2xl border-2 ${borderColor} ${bgStyle} shadow-lg group animate-slide-up">
                <div class="flex justify-between items-center mb-5 pb-4 border-b border-slate-700">
                    <div class="flex items-center gap-4">
                        <div class="flex bg-slate-900 rounded-lg overflow-hidden border border-slate-600">
                            <button type="button" onclick="moveUp('${blockId}')" class="px-2 py-1.5 hover:bg-eduPrimary hover:text-white transition-colors text-slate-400"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg></button>
                            <div class="w-px bg-slate-600"></div>
                            <button type="button" onclick="moveDown('${blockId}')" class="px-2 py-1.5 hover:bg-eduPrimary hover:text-white transition-colors text-slate-400"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                        </div>
                        <span class="font-bold ${accentColor} flex items-center gap-2 text-sm uppercase tracking-wider">
                            ${icon} ${title}
                        </span>
                    </div>
                    <button type="button" onclick="removeBlock('${blockId}')" class="text-red-400 hover:text-white bg-red-500/10 hover:bg-red-600 border border-red-500/20 px-3 py-1.5 rounded-lg text-xs font-bold transition-all">
                        Hapus ✕
                    </button>
                </div>
                <input type="hidden" name="blocks[${globalBlockCounter}][type]" value="${type}">
                ${blockHtml}
            </div>
        `;

        container.insertAdjacentHTML('beforeend', template);
        updateCounter();
        setTimeout(() => { document.getElementById(blockId).scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 100);
    }

    function removeBlock(id) {
        const block = document.getElementById(id);
        block.style.transform = 'scale(0.95)';
        block.style.opacity = '0';
        setTimeout(() => { block.remove(); updateCounter(); }, 200);
    }

    function moveUp(id) {
        const node = document.getElementById(id);
        if (node.previousElementSibling) { node.parentNode.insertBefore(node, node.previousElementSibling); }
    }

    function moveDown(id) {
        const node = document.getElementById(id);
        if (node.nextElementSibling) { node.parentNode.insertBefore(node.nextElementSibling, node); }
    }

    function updateCounter() {
        const count = document.querySelectorAll('.block-card').length;
        document.querySelector('.block-counter-badge').textContent = count;
    }

    window.onload = () => { 
        parseExistingContent(); 
        if(document.querySelectorAll('.block-card').length === 0) {
            addBlock('text');
        }
    };
</script>

<style>
    .animate-slide-up { animation: slideUp 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes slideUp { from { opacity: 0; transform: translateY(20px) scale(0.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
</style>
@endsection