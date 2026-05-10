{{-- 
    FILE: resources/views/learning/simulations/labeling.blade.php
    DESC: Simulasi Melatih Model AI dengan Labeling Gambar (Teachable Machine Lite)
--}}

<div class="mt-6 p-6 bg-[#0d1117] rounded-xl border border-gray-700 shadow-2xl relative overflow-hidden select-none font-sans" id="ai-lab-container">
    
    {{-- Background Tech Decoration --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-purple-600/10 rounded-full blur-3xl pointer-events-none"></div>

    {{-- HEADER --}}
    <div class="relative z-10 flex justify-between items-center mb-8 border-b border-gray-800 pb-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-blue-600 rounded-lg flex items-center justify-center text-xl shadow-lg">
                🧠
            </div>
            <div>
                <h4 class="text-white font-bold tracking-wide">AI TRAINING LAB</h4>
                <p class="text-gray-400 text-xs">Model: Animal_Recognition_v1.0</p>
            </div>
        </div>
        
        {{-- ACCURACY METER --}}
        <div class="flex items-center gap-4">
            <div class="text-right">
                <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wider">Model Accuracy</p>
                <div class="flex items-end gap-1 justify-end">
                    <span class="text-2xl font-mono font-bold text-white" id="accuracy-display">0</span>
                    <span class="text-sm text-gray-500 mb-1">%</span>
                </div>
            </div>
            {{-- Progress Bar --}}
            <div class="w-32 h-2 bg-gray-800 rounded-full overflow-hidden">
                <div id="accuracy-bar" class="h-full bg-gradient-to-r from-red-500 to-green-500 w-0 transition-all duration-500"></div>
            </div>
        </div>
    </div>

    {{-- MAIN LAB AREA --}}
    <div class="relative z-10 grid grid-cols-1 md:grid-cols-12 gap-6">
        
        {{-- 1. INPUT STREAM (DATA FEED) --}}
        <div class="md:col-span-4 bg-gray-900/50 rounded-xl border border-gray-700 p-4 flex flex-col items-center justify-center relative min-h-[250px]">
            <p class="absolute top-3 left-3 text-[10px] text-gray-500 font-mono">VIDEO FEED (DATA INPUT)</p>
            
            {{-- Screen Area --}}
            <div id="screen-display" class="w-full aspect-square max-w-[200px] bg-black rounded-lg border-2 border-dashed border-gray-600 flex items-center justify-center relative overflow-hidden group">
                <div id="current-image" class="text-8xl transition-transform duration-300 group-hover:scale-110">❓</div>
                
                {{-- Scan Line Animation --}}
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-green-500/10 to-transparent w-full h-full animate-scan pointer-events-none"></div>
            </div>

            <div class="mt-4 flex gap-2">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                <span class="text-xs text-red-400 font-mono">LIVE FEED ACTIVE</span>
            </div>
        </div>

        {{-- 2. CONTROL PANEL (LABELING) --}}
        <div class="md:col-span-8 flex flex-col justify-center">
            <div class="mb-4">
                <h5 class="text-white font-bold mb-1">Berikan Label pada Data ini:</h5>
                <p class="text-xs text-gray-400">Klik tombol yang sesuai dengan gambar di samping untuk melatih AI.</p>
            </div>

            <div class="grid grid-cols-2 gap-4" id="buttons-container">
                <button onclick="trainModel('kucing')" id="btn-kucing" class="group relative p-4 bg-gray-800 hover:bg-indigo-600 border border-gray-600 hover:border-indigo-400 rounded-xl transition-all duration-200 flex flex-col items-center gap-2">
                    <span class="text-3xl group-hover:scale-125 transition-transform">🐱</span>
                    <span class="text-sm font-bold text-gray-300 group-hover:text-white">Kucing</span>
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-gray-600 group-hover:bg-green-400"></span>
                </button>

                <button onclick="trainModel('anjing')" id="btn-anjing" class="group relative p-4 bg-gray-800 hover:bg-orange-600 border border-gray-600 hover:border-orange-400 rounded-xl transition-all duration-200 flex flex-col items-center gap-2">
                    <span class="text-3xl group-hover:scale-125 transition-transform">🐶</span>
                    <span class="text-sm font-bold text-gray-300 group-hover:text-white">Anjing</span>
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-gray-600 group-hover:bg-green-400"></span>
                </button>

                <button onclick="trainModel('burung')" id="btn-burung" class="group relative p-4 bg-gray-800 hover:bg-sky-600 border border-gray-600 hover:border-sky-400 rounded-xl transition-all duration-200 flex flex-col items-center gap-2">
                    <span class="text-3xl group-hover:scale-125 transition-transform">🐦</span>
                    <span class="text-sm font-bold text-gray-300 group-hover:text-white">Burung</span>
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-gray-600 group-hover:bg-green-400"></span>
                </button>

                <button onclick="trainModel('ikan')" id="btn-ikan" class="group relative p-4 bg-gray-800 hover:bg-teal-600 border border-gray-600 hover:border-teal-400 rounded-xl transition-all duration-200 flex flex-col items-center gap-2">
                    <span class="text-3xl group-hover:scale-125 transition-transform">🐠</span>
                    <span class="text-sm font-bold text-gray-300 group-hover:text-white">Ikan</span>
                    <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-gray-600 group-hover:bg-green-400"></span>
                </button>
            </div>
            
            {{-- Console Log --}}
            <div class="mt-6 bg-black rounded-lg p-3 font-mono text-[10px] h-24 overflow-y-auto border border-gray-800 opacity-70" id="ai-console">
                <div class="text-green-500">> System initialized...</div>
                <div class="text-gray-500">> Waiting for training data...</div>
            </div>
        </div>
    </div>

    {{-- TUTORIAL OVERLAY --}}
    <div id="tutorial-overlay-ai" class="absolute inset-0 z-50 flex items-center justify-center bg-black/85 backdrop-blur-sm">
        <div class="max-w-lg w-full p-6 bg-[#161b22] border border-gray-600 rounded-2xl shadow-2xl relative">
            
            {{-- Step 1 --}}
            <div id="tut-step-1" class="tutorial-step">
                <div class="text-4xl mb-4 text-center">📸</div>
                <h3 class="text-xl font-bold text-white text-center mb-2">Langkah 1: Lihat Data</h3>
                <p class="text-gray-400 text-center text-sm mb-6">
                    Di layar sebelah kiri, akan muncul gambar (Data Input). Tugasmu adalah mengidentifikasi gambar tersebut.
                </p>
                <button onclick="nextTutorial(2)" class="w-full py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg font-bold">Lanjut</button>
            </div>

            {{-- Step 2 --}}
            <div id="tut-step-2" class="tutorial-step hidden">
                <div class="text-4xl mb-4 text-center">🏷️</div>
                <h3 class="text-xl font-bold text-white text-center mb-2">Langkah 2: Beri Label</h3>
                <p class="text-gray-400 text-center text-sm mb-6">
                    Klik tombol label yang sesuai (Kucing, Anjing, dll). Ini disebut proses <strong>Labeling</strong>. AI akan belajar dari jawabanmu.
                </p>
                <button onclick="nextTutorial(3)" class="w-full py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg font-bold">Lanjut</button>
            </div>

            {{-- Step 3 --}}
            <div id="tut-step-3" class="tutorial-step hidden">
                <div class="text-4xl mb-4 text-center">📈</div>
                <h3 class="text-xl font-bold text-white text-center mb-2">Langkah 3: Jaga Akurasi</h3>
                <p class="text-gray-400 text-center text-sm mb-6">
                    Jika kamu salah memberi label (Data Kotor), akurasi AI akan turun. Capai akurasi <strong>100%</strong> untuk menyelesaikan misi!
                </p>
                <button onclick="closeTutorial()" class="w-full py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg font-bold shadow-lg shadow-green-500/20">Mulai Training 🚀</button>
            </div>

        </div>
    </div>

    {{-- WIN OVERLAY --}}
    <div id="win-overlay" class="absolute inset-0 z-50 flex items-center justify-center bg-black/90 hidden">
        <div class="text-center animate-bounce-in">
            <div class="text-6xl mb-4">🤖🎓</div>
            <h2 class="text-3xl font-bold text-white mb-2">Model AI Terlatih!</h2>
            <p class="text-gray-400 mb-6">Kamu berhasil melatih AI dengan data yang bersih.</p>
            <div class="flex gap-3 justify-center">
                <button onclick="location.reload()" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-full text-sm">Ulangi</button>
                <button onclick="alert('Lanjut ke Bab berikutnya!')" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full font-bold shadow-lg">Selesai</button>
            </div>
        </div>
    </div>

</div>

<style>
    @keyframes scan {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(100%); }
    }
    .animate-scan {
        animation: scan 2s linear infinite;
    }
</style>

<script>
    // --- DATASET TRAINING ---
    const trainingData = [
        { emoji: "🐱", label: "kucing" },
        { emoji: "🐕", label: "anjing" },
        { emoji: "🐦", label: "burung" },
        { emoji: "🐡", label: "ikan" },
        { emoji: "🐈", label: "kucing" },
        { emoji: "🐩", label: "anjing" },
        { emoji: "🦅", label: "burung" },
        { emoji: "🐠", label: "ikan" },
        { emoji: "😹", label: "kucing" }, // Data lebih sulit
        { emoji: "🦈", label: "ikan" }
    ];

    let currentIdx = 0;
    let accuracy = 0;
    let correctAnswers = 0;
    let totalAttempts = 0;

    // --- TUTORIAL LOGIC ---
    function nextTutorial(step) {
        document.querySelectorAll('.tutorial-step').forEach(el => el.classList.add('hidden'));
        document.getElementById(`tut-step-${step}`).classList.remove('hidden');
    }

    function closeTutorial() {
        document.getElementById('tutorial-overlay-ai').classList.add('hidden');
        loadData();
    }

    // --- GAME LOGIC ---
    function loadData() {
        if (currentIdx < trainingData.length) {
            const data = trainingData[currentIdx];
            const screen = document.getElementById('current-image');
            
            // Efek Glitch saat ganti gambar
            screen.style.opacity = 0;
            setTimeout(() => {
                screen.innerText = data.emoji;
                screen.style.opacity = 1;
                logConsole(`> Incoming Data #${currentIdx + 1}: Received Image input.`);
            }, 200);
        } else {
            finishGame();
        }
    }

    function trainModel(userLabel) {
        if (currentIdx >= trainingData.length) return;

        const correctLabel = trainingData[currentIdx].label;
        totalAttempts++;

        if (userLabel === correctLabel) {
            correctAnswers++;
            logConsole(`<span class="text-green-400">> Labeling: Correct! [${userLabel}] matched. Learning pattern...</span>`);
            flashScreen('green');
        } else {
            logConsole(`<span class="text-red-400">> ERROR: Mislabel detected! Expected [${correctLabel}], got [${userLabel}]. Noise introduced.</span>`);
            flashScreen('red');
        }

        updateAccuracy();
        currentIdx++;
        
        // Delay sedikit sebelum data berikutnya
        setTimeout(loadData, 500);
    }

    function updateAccuracy() {
        // Hitung persentase (Target harus 100% di akhir)
        // Logika game: Skor = (Benar / Total Soal) * 100
        // Tapi kita tampilkan real-time
        let percentage = Math.round((correctAnswers / totalAttempts) * 100);
        
        // Update Text
        const accDisplay = document.getElementById('accuracy-display');
        animateValue(accDisplay, parseInt(accDisplay.innerText), percentage, 500);

        // Update Bar
        const bar = document.getElementById('accuracy-bar');
        bar.style.width = percentage + "%";
        
        // Warna Bar
        if(percentage < 50) bar.className = "h-full w-0 transition-all duration-500 bg-red-500";
        else if(percentage < 80) bar.className = "h-full w-0 transition-all duration-500 bg-yellow-500";
        else bar.className = "h-full w-0 transition-all duration-500 bg-green-500";
    }

    function logConsole(msg) {
        const consoleEl = document.getElementById('ai-console');
        const line = document.createElement('div');
        line.innerHTML = msg;
        consoleEl.appendChild(line);
        consoleEl.scrollTop = consoleEl.scrollHeight; // Auto scroll
    }

    function flashScreen(color) {
        const screen = document.getElementById('screen-display');
        const originalBorder = screen.className;
        
        if (color === 'green') {
            screen.classList.add('border-green-500', 'bg-green-900/20');
        } else {
            screen.classList.add('border-red-500', 'bg-red-900/20');
        }

        setTimeout(() => {
            screen.classList.remove('border-green-500', 'bg-green-900/20', 'border-red-500', 'bg-red-900/20');
        }, 300);
    }

    function animateValue(obj, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            obj.innerHTML = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    function finishGame() {
        const finalScore = Math.round((correctAnswers / trainingData.length) * 100);
        
        if (finalScore === 100) {
            document.getElementById('win-overlay').classList.remove('hidden');
        } else {
            // Game Over jika tidak sempurna (Opsional, atau biarkan selesai apa adanya)
            alert(`Training Selesai! Akurasi Model: ${finalScore}%. Coba lagi untuk mencapai 100%!`);
            location.reload();
        }
    }
</script>