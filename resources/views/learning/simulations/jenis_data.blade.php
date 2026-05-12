{{-- 
    FILE: resources/views/learning/simulations/jenis_data.blade.php
    DESC: Game Drag & Drop untuk Memilah Jenis Data (Nominal, Ordinal, Diskrit, Kontinu)
--}}

<div class="mt-6 p-6 bg-[#1a1c23] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden select-none" id="game-container">
    
    {{-- Background Grid Decoration --}}
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#4f46e5 1px, transparent 1px); background-size: 20px 20px;"></div>

    {{-- HEADER STATUS --}}
    <div class="relative z-10 flex justify-between items-center mb-8">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-600 rounded-lg shadow-lg shadow-indigo-500/30">
                <span class="text-2xl">🏭</span>
            </div>
            <div>
                <h4 class="text-white font-bold text-lg">Data Sorter v2.0</h4>
                <p class="text-gray-400 text-xs">Sortir data ke kategori yang tepat</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="text-right">
                <p class="text-xs text-gray-500 uppercase font-bold">Score</p>
                <p class="text-2xl font-mono font-bold text-green-400" id="scoreDisplay">0</p>
            </div>
            <div class="text-right">
                <p class="text-xs text-gray-500 uppercase font-bold">Wave</p>
                {{-- Diubah menjadi maksimal 10 --}}
                <p class="text-2xl font-mono font-bold text-blue-400"><span id="waveDisplay">1</span>/10</p>
            </div>
        </div>
    </div>

    {{-- GAME AREA --}}
    <div class="relative z-10 h-[400px] flex flex-col justify-between">
        
        {{-- AREA SPAWN DATA (CONVEYOR BELT) --}}
        <div class="flex justify-center items-center h-32 relative border-b-2 border-dashed border-gray-700/50">
            <div id="spawn-area" class="relative w-full flex justify-center">
                <div id="tutorial-hand" class="absolute top-10 right-1/3 text-4xl animate-bounce hidden z-50 pointer-events-none">👇</div>
                </div>
        </div>

        {{-- AREA KERANJANG (DROP ZONES) --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
            
            <div class="drop-zone group relative p-4 bg-gray-800/50 border-2 border-gray-600 rounded-xl flex flex-col items-center justify-center transition-all hover:border-pink-500 hover:bg-pink-500/10" data-type="nominal">
                <div class="text-3xl mb-2 opacity-50 group-hover:opacity-100 transition-opacity">🏷️</div>
                <h5 class="text-pink-400 font-bold text-sm">NOMINAL</h5>
                <p class="text-[10px] text-gray-500 text-center mt-1">Label / Nama<br>(Tanpa Urutan)</p>
            </div>

            <div class="drop-zone group relative p-4 bg-gray-800/50 border-2 border-gray-600 rounded-xl flex flex-col items-center justify-center transition-all hover:border-purple-500 hover:bg-purple-500/10" data-type="ordinal">
                <div class="text-3xl mb-2 opacity-50 group-hover:opacity-100 transition-opacity">🥇</div>
                <h5 class="text-purple-400 font-bold text-sm">ORDINAL</h5>
                <p class="text-[10px] text-gray-500 text-center mt-1">Peringkat<br>(Ada Urutan)</p>
            </div>

            <div class="drop-zone group relative p-4 bg-gray-800/50 border-2 border-gray-600 rounded-xl flex flex-col items-center justify-center transition-all hover:border-blue-500 hover:bg-blue-500/10" data-type="diskrit">
                <div class="text-3xl mb-2 opacity-50 group-hover:opacity-100 transition-opacity">🔢</div>
                <h5 class="text-blue-400 font-bold text-sm">DISKRIT</h5>
                <p class="text-[10px] text-gray-500 text-center mt-1">Angka Bulat<br>(Hasil Hitung)</p>
            </div>

            <div class="drop-zone group relative p-4 bg-gray-800/50 border-2 border-gray-600 rounded-xl flex flex-col items-center justify-center transition-all hover:border-green-500 hover:bg-green-500/10" data-type="kontinu">
                <div class="text-3xl mb-2 opacity-50 group-hover:opacity-100 transition-opacity">📏</div>
                <h5 class="text-green-400 font-bold text-sm">KONTINU</h5>
                <p class="text-[10px] text-gray-500 text-center mt-1">Angka Desimal<br>(Hasil Ukur)</p>
            </div>

        </div>
    </div>

    {{-- FEEDBACK OVERLAY --}}
    <div id="feedback-overlay" class="absolute inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm hidden">
        <div class="text-center transform transition-all scale-0" id="feedback-content">
            <div class="text-6xl mb-4" id="feedback-icon">🎉</div>
            <h3 class="text-2xl font-bold text-white mb-2" id="feedback-title">Benar!</h3>
            <p class="text-gray-300 text-sm max-w-xs mx-auto" id="feedback-msg">Data ini termasuk Nominal.</p>
            <button onclick="nextWave()" class="mt-6 px-6 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full font-bold transition-all">
                Lanjut ➡️
            </button>
        </div>
    </div>

    {{-- TUTORIAL OVERLAY --}}
    <div id="tutorial-overlay" class="absolute inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-md">
        <div class="text-center max-w-md p-6">
            <h2 class="text-3xl font-bold text-white mb-4">Tutorial Singkat 🎓</h2>
            <div class="space-y-4 text-left text-gray-300 text-sm bg-gray-800 p-4 rounded-lg border border-gray-700">
                <p>1. Sebuah <strong>Kotak Data</strong> akan muncul di atas.</p>
                <p>2. <strong>Tarik (Drag)</strong> kotak tersebut.</p>
                <p>3. <strong>Lepaskan (Drop)</strong> ke dalam keranjang kategori yang benar di bawah.</p>
            </div>
            <button onclick="startTutorial()" class="mt-6 px-8 py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg font-bold shadow-lg shadow-green-500/30 transition-all transform hover:scale-105">
                Mulai Simulasi 🚀
            </button>
        </div>
    </div>

</div>

{{-- LOGIKA JAVASCRIPT --}}
<script>
    // --- DATABASE SOAL 10 GAMBAR ---
    const gameData = [
        { id: 1, image: "{{ asset('images/simulasi/golongan darah.png') }}", text: "Golongan Darah", type: "nominal", desc: "Golongan darah hanya nama/kategori, tidak ada tingkatan." },
        { id: 2, image: "{{ asset('images/simulasi/Label Ukuran Kaos.png') }}", text: "Ukuran Kaos", type: "ordinal", desc: "Ada urutan tingkatan ukuran dari kecil ke besar." },
        { id: 3, image: "{{ asset('images/simulasi/Jumlah Notifikasi Chat di HP.png') }}", text: "Notifikasi HP", type: "diskrit", desc: "Dihitung secara bulat (tidak mungkin pecahan)." },
        { id: 4, image: "{{ asset('images/simulasi/Termometer Suhu Ruangan.png') }}", text: "Suhu Ruangan", type: "kontinu", desc: "Hasil pengukuran alat dan bisa dalam bentuk desimal." },
        { id: 5, image: "{{ asset('images/simulasi/Review Toko Online.png') }}", text: "Review Toko", type: "ordinal", desc: "Ada tingkatan kepuasan dari 1 hingga 5 bintang." },
        { id: 6, image: "{{ asset('images/simulasi/Jenis Kendaraan.png') }}", text: "Jenis Kendaraan", type: "nominal", desc: "Hanya kategori jenis, tidak ada urutan peringkat." },
        { id: 7, image: "{{ asset('images/simulasi/Stopwatch.png') }}", text: "Stopwatch", type: "kontinu", desc: "Waktu adalah hasil pengukuran yang detail (desimal)." },
        { id: 8, image: "{{ asset('images/simulasi/Jumlah Siswa Hadir.png') }}", text: "Siswa Hadir", type: "diskrit", desc: "Jumlah manusia pasti dihitung bulat." },
        { id: 9, image: "{{ asset('images/simulasi/Tinggi Badan Siswa.png') }}", text: "Tinggi Badan", type: "kontinu", desc: "Tinggi badan diukur dengan alat dan bisa pecahan." },
        { id: 10, image: "{{ asset('images/simulasi/Member Minimarket.png') }}", text: "Member Minimarket", type: "ordinal", desc: "Ada hierarki/urutan dari Silver, Gold, ke Platinum." }
    ];

    let currentLevel = 0;
    let score = 0;
    let isTutorial = true;

    // --- FUNGSI UTAMA ---
    function startTutorial() {
        document.getElementById('tutorial-overlay').classList.add('hidden');
        spawnData(0); // Spawn soal pertama
        
        // Tampilkan petunjuk tangan
        const hand = document.getElementById('tutorial-hand');
        hand.classList.remove('hidden');
        
        // Posisikan tangan menunjuk ke Nominal (karena soal 1 jawabannya Nominal)
        setTimeout(() => {
            hand.classList.add('hidden');
        }, 3000);
    }

    function spawnData(index) {
        const area = document.getElementById('spawn-area');
        area.innerHTML = ''; // Bersihkan area
        
        if (index >= gameData.length) {
            endGame();
            return;
        }

        const data = gameData[index];
        
        // Buat Elemen Data
        const item = document.createElement('div');
        // --- SEBELUM: item.className = "... w-40 h-32 ..."
        // --- SESUDAH: Kita besarkan kotak putihnya jadi h-48 w-48 agar lebih lapang
        item.className = "cursor-grab active:cursor-grabbing w-48 h-48 bg-white text-gray-900 rounded-lg shadow-xl flex flex-col items-center justify-center font-bold text-center p-2 transform transition-transform hover:scale-105 border-4 border-indigo-500 z-40"; // <--- UBAH w-40 h-32 jadi w-48 h-48
        item.setAttribute('draggable', true);
        item.setAttribute('id', 'draggable-item');
        
        // Memasukkan gambar asli dan teks ke dalam kotak
        item.innerHTML = `
            <img src="${data.image}" alt="${data.text}" class="h-32 w-32 object-contain mb-1 pointer-events-none rounded"> <div class="text-xs leading-tight">${data.text}</div>
        `;

        // Event Listeners untuk Drag
        item.addEventListener('dragstart', dragStart);
        item.addEventListener('dragend', dragEnd);
        
        // Support Touch Device (Mobile)
        item.addEventListener('touchstart', handleTouchStart, {passive: false});
        item.addEventListener('touchmove', handleTouchMove, {passive: false});
        item.addEventListener('touchend', handleTouchEnd);

        area.appendChild(item);

        // Update Display
        document.getElementById('waveDisplay').innerText = index + 1;
    }

    // --- DRAG & DROP LOGIC ---
    const dropZones = document.querySelectorAll('.drop-zone');

    dropZones.forEach(zone => {
        zone.addEventListener('dragover', dragOver);
        zone.addEventListener('dragenter', dragEnter);
        zone.addEventListener('dragleave', dragLeave);
        zone.addEventListener('drop', drop);
    });

    function dragStart(e) {
        e.dataTransfer.setData('text/plain', e.target.id);
        setTimeout(() => {
            this.classList.add('invisible');
        }, 0);
    }

    function dragEnd() {
        this.classList.remove('invisible');
    }

    function dragOver(e) {
        e.preventDefault(); // Wajib agar bisa di-drop
    }

    function dragEnter(e) {
        e.preventDefault();
        this.classList.add('bg-gray-700', 'scale-105');
    }

    function dragLeave() {
        this.classList.remove('bg-gray-700', 'scale-105');
    }

    function drop(e) {
        e.preventDefault();
        this.classList.remove('bg-gray-700', 'scale-105');
        
        // Logika Pengecekan Jawaban
        const correctType = gameData[currentLevel].type;
        const droppedType = this.getAttribute('data-type');
        
        checkAnswer(droppedType === correctType);
    }

    // --- TOUCH LOGIC (MOBILE) ---
    // Sederhana: Menyimpan posisi awal dan akhir touch
    let initialX = null;
    let initialY = null;
    let draggedItem = null;

    function handleTouchStart(e) {
        draggedItem = e.target.closest('#draggable-item');
        initialX = e.touches[0].clientX;
        initialY = e.touches[0].clientY;
    }

    function handleTouchMove(e) {
        if (!draggedItem) return;
        e.preventDefault();
        const currentX = e.touches[0].clientX;
        const currentY = e.touches[0].clientY;
        const diffX = currentX - initialX;
        const diffY = currentY - initialY;
        
        draggedItem.style.transform = `translate(${diffX}px, ${diffY}px)`;
    }

    function handleTouchEnd(e) {
        if (!draggedItem) return;
        
        // Cek elemen di bawah jari saat dilepas
        const changedTouch = e.changedTouches[0];
        const elemBelow = document.elementFromPoint(changedTouch.clientX, changedTouch.clientY);
        const dropZone = elemBelow ? elemBelow.closest('.drop-zone') : null;

        if (dropZone) {
            const correctType = gameData[currentLevel].type;
            const droppedType = dropZone.getAttribute('data-type');
            checkAnswer(droppedType === correctType);
        } else {
            // Reset posisi jika tidak di drop zone
            draggedItem.style.transform = 'translate(0px, 0px)';
        }
        draggedItem = null;
    }

    // --- GAME SYSTEM ---
    function checkAnswer(isCorrect) {
        const item = document.getElementById('draggable-item');
        if(item) item.remove(); // Hapus item

        const overlay = document.getElementById('feedback-overlay');
        const content = document.getElementById('feedback-content');
        const icon = document.getElementById('feedback-icon');
        const title = document.getElementById('feedback-title');
        const msg = document.getElementById('feedback-msg');

        overlay.classList.remove('hidden');
        
        // Animasi Pop-up
        setTimeout(() => {
            content.classList.remove('scale-0');
            content.classList.add('scale-100');
        }, 50);

        if (isCorrect) {
            score += 10; // Skor disesuaikan jadi 10 per soal (total 100)
            document.getElementById('scoreDisplay').innerText = score;
            icon.innerText = "🎉";
            title.innerText = "Tepat Sekali!";
            title.className = "text-2xl font-bold text-green-400 mb-2";
            msg.innerText = gameData[currentLevel].desc;
        } else {
            icon.innerText = "💥";
            title.innerText = "Ups, Salah Keranjang!";
            title.className = "text-2xl font-bold text-red-400 mb-2";
            msg.innerText = "Jawaban yang benar adalah: " + gameData[currentLevel].type.toUpperCase() + ". " + gameData[currentLevel].desc;
        }
    }

    function nextWave() {
        // Tutup Feedback
        const content = document.getElementById('feedback-content');
        content.classList.remove('scale-100');
        content.classList.add('scale-0');
        
        setTimeout(() => {
            document.getElementById('feedback-overlay').classList.add('hidden');
            currentLevel++;
            spawnData(currentLevel);
        }, 300);
    }

    function endGame() {
        const area = document.getElementById('spawn-area');
        area.innerHTML = `
            <div class="text-center animate-fade-in">
                <div class="text-5xl mb-2">🏆</div>
                <h3 class="text-white font-bold">Simulasi Selesai!</h3>
                <p class="text-gray-400">Skor Akhir: ${score} / 100</p>
                <button onclick="location.reload()" class="mt-4 text-xs text-indigo-400 hover:text-white underline">Main Lagi</button>
            </div>
        `;
    }
</script>