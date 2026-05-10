<div id="floating-tools-container" class="fixed bottom-6 right-6 z-[100] flex flex-col-reverse items-end gap-3">
    
    <button id="main-bubble-btn" class="relative w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full shadow-2xl flex items-center justify-center text-white text-3xl cursor-grab active:cursor-grabbing hover:scale-110 transition-transform duration-300 group">
        <span id="main-icon" class="transition-transform duration-300 group-[.menu-open]:rotate-45">🛠️</span>
    </button>

    <div id="tools-list" class="flex flex-col-reverse items-end gap-3 transition-all duration-300 opacity-0 translate-y-10 pointer-events-none scale-90">
        
        <button onclick="askGuruAi({{ $material->id }})" data-tool-name="Tanya Guru AI" class="tool-btn w-12 h-12 bg-pink-500 hover:bg-pink-600 rounded-full shadow-lg flex items-center justify-center text-white text-2xl transition-all hover:scale-110 relative">
            🤖
        </button>

        <button onclick="openScientificCalc()" data-tool-name="Kalkulator Lengkap" class="tool-btn w-12 h-12 bg-emerald-500 hover:bg-emerald-600 rounded-full shadow-lg flex items-center justify-center text-white text-2xl transition-all hover:scale-110 relative">
            🧮
        </button>
        
    </div>
</div>

<style>
    /* CSS Bubble Animation */
    #floating-tools-container.menu-open #tools-list { opacity: 1; transform: translateY(0); pointer-events: auto; scale: 1; }
    .tool-btn::before { content: attr(data-tool-name); position: absolute; right: 120%; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.8); color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; white-space: nowrap; opacity: 0; pointer-events: none; transition: opacity 0.2s; }
    .tool-btn:hover::before { opacity: 1; }

    /* Calculator Styles */
    .calc-tab-btn { padding: 8px; font-size: 0.9rem; font-weight: 600; color: #6b7280; border-bottom: 2px solid transparent; transition: all 0.2s; }
    .calc-tab-btn.active { color: #4f46e5; border-bottom-color: #4f46e5; }
    .dark .calc-tab-btn.active { color: #818cf8; border-bottom-color: #818cf8; }
    
    .btn-calc { height: 45px; border-radius: 8px; font-size: 1rem; font-weight: 600; box-shadow: 0 2px 0 rgba(0,0,0,0.05); transition: transform 0.1s; display: flex; align-items: center; justify-content: center; }
    .btn-calc:active { transform: translateY(2px); box-shadow: none; }
    .btn-num { bg-white; dark:bg-gray-700; color: #1f2937; dark:color-white; }
    .btn-op { background-color: #e0e7ff; color: #4338ca; }
    .btn-fn { background-color: #f3f4f6; color: #374151; font-size: 0.9rem; }
    .dark .btn-fn { background-color: #374151; color: #e5e7eb; }
</style>    

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- LOGIKA BUBBLE MENU (Sama seperti sebelumnya) ---
        const container = document.getElementById('floating-tools-container');
        const mainBtn = document.getElementById('main-bubble-btn');
        const mainIcon = document.getElementById('main-icon');
        let isDragging = false;
        let startX, startY, initialRight, initialBottom;
        let dragThreshold = 5; 

        mainBtn.addEventListener('mousedown', function(e) {
            isDragging = false; startX = e.clientX; startY = e.clientY;
            const rect = container.getBoundingClientRect();
            initialRight = window.innerWidth - rect.right;
            initialBottom = window.innerHeight - rect.bottom;
            document.addEventListener('mousemove', onMouseMove); document.addEventListener('mouseup', onMouseUp);
        });

        function onMouseMove(e) {
            const dx = e.clientX - startX; const dy = e.clientY - startY;
            if (Math.abs(dx) > dragThreshold || Math.abs(dy) > dragThreshold) {
                isDragging = true; container.classList.remove('menu-open'); mainIcon.innerText = '🛠️'; 
                container.style.right = `${initialRight - dx}px`; container.style.bottom = `${initialBottom - dy}px`;
            }
        }

        function onMouseUp(e) {
            document.removeEventListener('mousemove', onMouseMove); document.removeEventListener('mouseup', onMouseUp);
            if (!isDragging) { container.classList.toggle('menu-open'); mainIcon.innerText = container.classList.contains('menu-open') ? '❌' : '🛠️'; }
        }
        
        document.addEventListener('click', function(e) {
            if (!container.contains(e.target) && container.classList.contains('menu-open')) {
                container.classList.remove('menu-open'); mainIcon.innerText = '🛠️';
            }
        });
    });

    // =========================================
    // 1. FUNGSI TANYA GURU AI
    // =========================================
    async function askGuruAi(materialId) {
        const { value: question } = await Swal.fire({
            title: 'Tanya Guru AI 🤖',
            input: 'textarea',
            inputLabel: 'Apa yang membuatmu bingung?',
            inputPlaceholder: 'Contoh: Jelaskan materi ini dengan analogi...',
            showCancelButton: true, confirmButtonText: 'Kirim 🚀', confirmButtonColor: '#4f46e5',
            background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
            color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
        });

        if (!question) return;

        Swal.fire({ 
            title: 'Sedang Berpikir...', html: 'Guru AI sedang mencari jawaban... 🧠', 
            didOpen: () => { Swal.showLoading(); },
            background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
            color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
        });

        fetch("{{ route('learning.askAi') }}", {
            method: "POST",
            headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            body: JSON.stringify({ material_id: materialId, question: question })
        })
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                title: '🎓 Jawaban Guru AI', html: `<div class="text-left text-sm md:text-base">${data.answer}</div>`, icon: 'success', width: '600px', confirmButtonColor: '#ec4899',
                background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
                color: document.documentElement.classList.contains('dark') ? '#fff' : '#333'
            });
        })
        .catch(error => Swal.fire({ icon: 'error', title: 'Oops...', text: 'Gagal terhubung.', background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff' }));
    }

    // =========================================
    // 2. FUNGSI KALKULATOR ILMIAH & STATISTIK
    // =========================================
    function openScientificCalc() {
        const calcHtml = `
            <div class="w-full max-w-[400px]">
                <input type="text" id="calc-display" class="w-full mb-3 p-4 text-right text-xl font-mono bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg focus:outline-none shadow-inner" placeholder="0" readonly>
                
                <div class="flex border-b border-gray-200 dark:border-gray-600 mb-3">
                    <button onclick="switchTab('main')" id="tab-main" class="calc-tab-btn active w-1/2">Utama</button>
                    <button onclick="switchTab('stats')" id="tab-stats" class="calc-tab-btn w-1/2">Statistik (f)</button>
                </div>

                <div id="panel-main" class="grid grid-cols-4 gap-2">
                    <button onclick="calcClear()" class="btn-calc bg-red-100 text-red-600">AC</button>
                    <button onclick="calcAppend('(')" class="btn-calc btn-fn bg-gray-200 dark:bg-gray-600">(</button>
                    <button onclick="calcAppend(')')" class="btn-calc btn-fn bg-gray-200 dark:bg-gray-600">)</button>
                    <button onclick="calcBack()" class="btn-calc bg-orange-100 text-orange-600">⌫</button>

                    <button onclick="calcAppend('sin(')" class="btn-calc btn-fn bg-gray-100 dark:bg-gray-700">sin</button>
                    <button onclick="calcAppend('cos(')" class="btn-calc btn-fn bg-gray-100 dark:bg-gray-700">cos</button>
                    <button onclick="calcAppend('tan(')" class="btn-calc btn-fn bg-gray-100 dark:bg-gray-700">tan</button>
                    <button onclick="calcAppend('/')" class="btn-calc btn-op">÷</button>

                    <button onclick="calcAppend('7')" class="btn-calc bg-white dark:bg-gray-800">7</button>
                    <button onclick="calcAppend('8')" class="btn-calc bg-white dark:bg-gray-800">8</button>
                    <button onclick="calcAppend('9')" class="btn-calc bg-white dark:bg-gray-800">9</button>
                    <button onclick="calcAppend('*')" class="btn-calc btn-op">×</button>

                    <button onclick="calcAppend('4')" class="btn-calc bg-white dark:bg-gray-800">4</button>
                    <button onclick="calcAppend('5')" class="btn-calc bg-white dark:bg-gray-800">5</button>
                    <button onclick="calcAppend('6')" class="btn-calc bg-white dark:bg-gray-800">6</button>
                    <button onclick="calcAppend('-')" class="btn-calc btn-op">-</button>

                    <button onclick="calcAppend('1')" class="btn-calc bg-white dark:bg-gray-800">1</button>
                    <button onclick="calcAppend('2')" class="btn-calc bg-white dark:bg-gray-800">2</button>
                    <button onclick="calcAppend('3')" class="btn-calc bg-white dark:bg-gray-800">3</button>
                    <button onclick="calcAppend('+')" class="btn-calc btn-op">+</button>

                    <button onclick="calcAppend('0')" class="btn-calc bg-white dark:bg-gray-800 col-span-2">0</button>
                    <button onclick="calcAppend('.')" class="btn-calc bg-white dark:bg-gray-800">.</button>
                    <button onclick="calcResult()" class="btn-calc bg-indigo-600 text-white shadow-lg shadow-indigo-500/30">=</button>
                </div>

                <div id="panel-stats" class="grid grid-cols-3 gap-2 hidden">
                    <button onclick="calcAppend('^')" class="btn-calc btn-fn">xʸ</button>
                    <button onclick="calcAppend('sqrt(')" class="btn-calc btn-fn">√</button>
                    <button onclick="calcAppend('cbrt(')" class="btn-calc btn-fn">³√</button>

                    <button onclick="calcAppend('mean(')" class="btn-calc bg-indigo-50 text-indigo-700 font-bold border border-indigo-200">mean</button>
                    <button onclick="calcAppend('stdev(')" class="btn-calc bg-indigo-50 text-indigo-700 font-bold border border-indigo-200">stdev</button>
                    <button onclick="calcAppend('!')" class="btn-calc btn-fn">n!</button>

                    <button onclick="calcAppend('nPr(')" class="btn-calc btn-fn">nPr</button>
                    <button onclick="calcAppend('nCr(')" class="btn-calc btn-fn">nCr</button>
                    <button onclick="calcAppend('abs(')" class="btn-calc btn-fn">abs</button>
                    
                    <button onclick="calcAppend('log(')" class="btn-calc btn-fn">log</button>
                    <button onclick="calcAppend('ln(')" class="btn-calc btn-fn">ln</button>
                    <button onclick="calcAppend('e')" class="btn-calc btn-fn">e</button>

                    <button onclick="calcAppend('PI')" class="btn-calc btn-fn">π</button>
                    <button onclick="calcAppend(',')" class="btn-calc bg-yellow-50 text-yellow-700 font-bold border border-yellow-200">,</button>
                    <button onclick="calcResult()" class="btn-calc bg-indigo-600 text-white shadow-lg">=</button>
                </div>
                
                <div class="mt-3 text-xs text-gray-400 text-center">
                    Gunakan koma (,) untuk memisahkan data statistik.<br>Contoh: <code>mean(10, 20, 30)</code>
                </div>
            </div>
        `;

        Swal.fire({
            title: null,
            html: calcHtml,
            showConfirmButton: false, showCloseButton: true,
            background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
            color: document.documentElement.classList.contains('dark') ? '#fff' : '#333',
            didOpen: () => { window.currentCalc = ''; window.calcTab = 'main'; }
        });
    }

    // --- LOGIKA KALKULATOR UTAMA ---
    window.switchTab = function(tabName) {
        document.getElementById('panel-main').classList.add('hidden');
        document.getElementById('panel-stats').classList.add('hidden');
        document.getElementById('tab-main').classList.remove('active');
        document.getElementById('tab-stats').classList.remove('active');

        document.getElementById('panel-' + tabName).classList.remove('hidden');
        document.getElementById('tab-' + tabName).classList.add('active');
    }

    window.calcAppend = function(val) { window.currentCalc += val; document.getElementById('calc-display').value = window.currentCalc; }
    window.calcClear = function() { window.currentCalc = ''; document.getElementById('calc-display').value = ''; }
    window.calcBack = function() { window.currentCalc = window.currentCalc.slice(0, -1); document.getElementById('calc-display').value = window.currentCalc; }

    window.calcResult = function() {
        try {
            // Definisikan Fungsi Statistik agar bisa dibaca eval()
            const PI = Math.PI;
            const e = Math.E;
            const sin = (x) => Math.sin(x); // Default Radians (Standar Programming)
            const cos = (x) => Math.cos(x);
            const tan = (x) => Math.tan(x);
            const sqrt = Math.sqrt;
            const cbrt = Math.cbrt;
            const abs = Math.abs;
            const log = Math.log10;
            const ln = Math.log;

            // Rata-rata (Mean)
            const mean = (...args) => {
                if (args.length === 0) return 0;
                let sum = args.reduce((a, b) => a + b, 0);
                return sum / args.length;
            };

            // Standar Deviasi (Sample)
            const stdev = (...args) => {
                if (args.length < 2) return 0;
                const m = mean(...args);
                const sumSqDiff = args.reduce((a, b) => a + Math.pow(b - m, 2), 0);
                return Math.sqrt(sumSqDiff / (args.length - 1));
            };

            // Faktorial
            const fact = (n) => {
                if (n < 0) return NaN;
                if (n === 0 || n === 1) return 1;
                let result = 1;
                for (let i = 2; i <= n; i++) result *= i;
                return result;
            };

            // Permutasi (nPr)
            const nPr = (n, r) => fact(n) / fact(n - r);

            // Kombinasi (nCr)
            const nCr = (n, r) => fact(n) / (fact(r) * fact(n - r));

            // Persiapkan String untuk Eval
            let expression = window.currentCalc
                .replace(/\^/g, '**')
                .replace(/(\d+)!/g, 'fact($1)'); // Mengubah 5! menjadi fact(5)

            // Hitung
            // Kita pakai Function constructor untuk membuat scope aman berisi fungsi2 statistik
            // Ini trik agar eval bisa memanggil fungsi 'mean', 'stdev', dll.
            let result = new Function('PI', 'e', 'sin', 'cos', 'tan', 'sqrt', 'cbrt', 'abs', 'log', 'ln', 'mean', 'stdev', 'fact', 'nPr', 'nCr', 'return ' + expression)
                (PI, e, sin, cos, tan, sqrt, cbrt, abs, log, ln, mean, stdev, fact, nPr, nCr);

            if(!Number.isInteger(result) && !isNaN(result)) result = parseFloat(result.toFixed(5)); // Max 5 desimal
            
            document.getElementById('calc-display').value = result;
            window.currentCalc = result.toString();

        } catch (e) {
            console.error(e);
            document.getElementById('calc-display').value = 'Error Syntax';
        }
    }
</script>