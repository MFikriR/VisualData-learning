{{-- CDN Library JSpreadsheet CE v4 & jSuites --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jspreadsheet-ce@4/dist/jspreadsheet.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsuites@4/dist/jsuites.min.css" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/jspreadsheet-ce@4/dist/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsuites@4/dist/jsuites.min.js"></script>

{{-- CONTAINER BUBBLE TOOLS --}}
<div id="floating-tools-container" class="fixed bottom-6 right-6 z-[100] flex flex-col-reverse items-end gap-3">
    
    {{-- Tombol Utama --}}
    <button id="main-bubble-btn" class="relative w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full shadow-2xl flex items-center justify-center text-white text-3xl cursor-grab active:cursor-grabbing hover:scale-110 transition-transform duration-300 group">
        <span id="main-icon" class="transition-transform duration-300 group-[.menu-open]:rotate-45">🛠️</span>
    </button>

    {{-- Daftar Menu Melayang --}}
    <div id="tools-list" class="flex flex-col-reverse items-end gap-3 transition-all duration-300 opacity-0 translate-y-10 pointer-events-none scale-90">
        
        {{-- 1. Tombol Tanya Guru AI --}}
        <button onclick="askGuruAi({{ $material->id }})" data-tool-name="Tanya Guru AI" class="tool-btn w-12 h-12 bg-pink-500 hover:bg-pink-600 rounded-full shadow-lg flex items-center justify-center text-white text-2xl transition-all hover:scale-110 relative">
            🤖
        </button>

        {{-- 2. Tombol Spreadsheet Data Lab --}}
        <button onclick="openSpreadsheetLab()" data-tool-name="Spreadsheet Lab" class="tool-btn w-12 h-12 bg-emerald-500 hover:bg-emerald-600 rounded-full shadow-lg flex items-center justify-center text-white text-2xl transition-all hover:scale-110 relative">
            📊
        </button>
        
    </div>
</div>

{{-- MODAL POP-UP SPREADSHEET LAB --}}
<div id="spreadsheet-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[200] hidden flex items-center justify-center p-4 md:p-6 animate-fade-in">
    <div class="bg-slate-900 border border-slate-700 rounded-2xl w-full max-w-5xl max-h-[90vh] flex flex-col shadow-2xl overflow-hidden">
        
        {{-- Modal Header --}}
        <div class="p-5 bg-slate-800 border-b border-slate-700 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold !text-white flex items-center gap-2">
                    <span>📊</span> Spreadsheet Data Lab
                </h3>
                <p class="text-xs !text-slate-300 mt-1">
                    Ketik data eksperimenmu. <strong class="!text-blue-400">Gunakan Baris 1 (Row 1) untuk nama variabel</strong> (misal: Titik, X, Y).
                </p>
            </div>
            <button onclick="closeSpreadsheetLab()" class="w-9 h-9 bg-slate-700 hover:bg-slate-600 rounded-full !text-slate-300 hover:!text-white flex items-center justify-center transition-colors text-lg font-bold border-none cursor-pointer">
                ✕
            </button>
        </div>

        {{-- Modal Toolbar --}}
        <div class="p-4 bg-slate-800/60 border-b border-slate-700/60 flex flex-wrap gap-2.5 items-center text-sm">
            <button id="modalAddRowBtn" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 border border-slate-600 rounded-lg text-white font-semibold transition-all flex items-center gap-1.5 cursor-pointer">
                <span>➕</span> Tambah Baris
            </button>
            <button id="modalRemoveRowBtn" class="px-4 py-2 bg-red-900/50 hover:bg-red-700 border border-red-700/50 rounded-lg text-white font-semibold transition-all flex items-center gap-1.5 cursor-pointer">
                <span>➖</span> Kurangi Baris
            </button>
            <button id="modalDownloadCsvBtn" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 rounded-lg text-white font-semibold transition-all flex items-center gap-1.5 ml-auto cursor-pointer">
                <span>⬇️</span> Download CSV
            </button>
            <button id="modalSendSandboxBtn" class="px-5 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white font-bold transition-all flex items-center gap-1.5 shadow-lg shadow-blue-900/40 cursor-pointer border-none">
                <span>🚀</span> Simpan ke Sandbox
            </button>
        </div>

        {{-- Modal Body (Canvas Spreadsheet) --}}
        <div class="p-4 flex-1 overflow-auto bg-slate-950">
            <div class="bg-white rounded-lg overflow-hidden border border-slate-700 shadow-inner">
                <div id="modal-spreadsheet" class="w-full text-black"></div>
            </div>
        </div>

    </div>
</div>

<style>
    /* CSS Bubble Animation */
    #floating-tools-container.menu-open #tools-list { opacity: 1; transform: translateY(0); pointer-events: auto; scale: 1; }
    .tool-btn::before { content: attr(data-tool-name); position: absolute; right: 120%; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.8); color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; white-space: nowrap; opacity: 0; pointer-events: none; transition: opacity 0.2s; }
    .tool-btn:hover::before { opacity: 1; }

    /* STYLING ALA GOOGLE SHEETS ASLI (MODAL ISOLATED) */
    .jexcel { font-family: Arial, sans-serif !important; background: #fff; }
    .jexcel > thead > tr > td { 
        background-color: #f8f9fa !important;
        color: #5f6368 !important; 
        font-weight: normal !important; 
        border: 1px solid #e2e3e3 !important;
        text-align: center;
    }
    .jexcel > tbody > tr > td.jexcel_row {
        background-color: #f8f9fa !important;
        color: #5f6368 !important;
        border: 1px solid #e2e3e3 !important;
    }
    .jexcel > tbody > tr > td { 
        font-size: 13px; 
        padding: 4px 8px !important; 
        border: 1px solid #e2e3e3 !important; 
        color: #000 !important;
        background-color: #fff !important;
    }
    .jexcel > tbody > tr > td.jexcel_selected,
    .jexcel > tbody > tr > td.highlight,
    .jexcel > tbody > tr > td.highlight-left,
    .jexcel > tbody > tr > td.highlight-right,
    .jexcel > tbody > tr > td.highlight-top,
    .jexcel > tbody > tr > td.highlight-bottom { 
        background-color: #fff !important; 
        border: 2px solid #1a73e8 !important;
        color: #000 !important;
    }
    #modal-spreadsheet textarea, 
    #modal-spreadsheet input, 
    .jexcel_textarea {
        color: #000000 !important; 
        background-color: #ffffff !important; 
        font-size: 13px !important;
        font-family: Arial, sans-serif !important;
        line-height: normal !important;
        box-shadow: none !important;
        outline: none !important;
        border: none !important;
        --tw-ring-color: transparent !important;
        --tw-ring-shadow: none !important;
        --tw-ring-offset-shadow: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
</style>    

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- LOGIKA BUBBLE MENU ---
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
            document.addEventListener('mousemove', onMouseMove); 
            document.addEventListener('mouseup', onMouseUp);
        });

        function onMouseMove(e) {
            const dx = e.clientX - startX; const dy = e.clientY - startY;
            if (Math.abs(dx) > dragThreshold || Math.abs(dy) > dragThreshold) {
                isDragging = true; container.classList.remove('menu-open'); mainIcon.innerText = '🛠️'; 
                container.style.right = `${initialRight - dx}px`; container.style.bottom = `${initialBottom - dy}px`;
            }
        }

        function onMouseUp(e) {
            document.removeEventListener('mousemove', onMouseMove); 
            document.removeEventListener('mouseup', onMouseUp);
            if (!isDragging) { 
                container.classList.toggle('menu-open'); 
                mainIcon.innerText = container.classList.contains('menu-open') ? '❌' : '🛠️'; 
            }
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
            title: 'Tanya Guru AI',
            input: 'textarea',
            inputLabel: 'Apa yang membuatmu bingung?',
            inputPlaceholder: 'Contoh: Jelaskan materi ini dengan analogi...',
            showCancelButton: true, confirmButtonText: 'Kirim', confirmButtonColor: '#4f46e5',
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
    // 2. FUNGSI SPREADSHEET LAB (MODAL POP-UP)
    // =========================================
    let modalJspreadsheetInstance = null;

    function openSpreadsheetLab() {
        const modal = document.getElementById('spreadsheet-modal');
        modal.classList.remove('hidden');

        // Inisialisasi JSpreadsheet HANYA SEKALI agar data siswa tersimpan saat modal ditutup/dibuka
        if (!modalJspreadsheetInstance) {
            const emptyMatrix = Array.from({ length: 25 }, () => Array(15).fill(''));

            modalJspreadsheetInstance = jspreadsheet(document.getElementById('modal-spreadsheet'), {
                data: emptyMatrix,
                minDimensions: [15, 25],
                defaultColWidth: 100,
                tableOverflow: true,
                tableWidth: "100%",
                tableHeight: "420px",
                csvFileName: 'Dataset_Siswa',
                allowInsertRow: true,
                allowDeleteRow: true,
            });

            // Event Toolbar Modal
            document.getElementById('modalAddRowBtn').onclick = () => modalJspreadsheetInstance.insertRow();
            document.getElementById('modalRemoveRowBtn').onclick = () => modalJspreadsheetInstance.deleteRow();
            document.getElementById('modalDownloadCsvBtn').onclick = () => modalJspreadsheetInstance.download(true);

            // Simpan Data Ke Sandbox & LocalStorage
            document.getElementById('modalSendSandboxBtn').onclick = () => {
                const raw = modalJspreadsheetInstance.getData();
                const headers = raw[0]; 
                let formattedData = [];
                
                for(let i = 1; i < raw.length; i++) {
                    let row = raw[i];
                    if(row.every(cell => cell === "" || cell === null)) continue;
                    
                    let obj = {};
                    headers.forEach((h, colIndex) => {
                        if(h && h.trim() !== '') {
                            let val = row[colIndex];
                            if (!isNaN(val) && val !== "") val = Number(val);
                            obj[h.trim()] = val;
                        }
                    });
                    
                    if(Object.keys(obj).length > 0) formattedData.push(obj);
                }

                if(formattedData.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Tabel Masih Kosong!',
                        text: 'Pastikan Baris 1 diisi nama variabel, dan Baris 2 dst diisi nilainya.',
                        background: '#1e293b', color: '#fff'
                    });
                    return;
                }

                // Simpan ke LocalStorage
                localStorage.setItem('spreadsheetData', JSON.stringify(formattedData));
                localStorage.setItem('spreadsheetHeaders', JSON.stringify(headers.filter(h => h.trim() !== '')));

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Disimpan!',
                    text: 'Data eksperimenmu telah disimpan ke Sandbox. Kamu bisa membukanya kapan saja tanpa kehilangan posisi belajar saat ini.',
                    showCancelButton: true,
                    confirmButtonText: 'Buka Sandbox (Tab Baru)',
                    cancelButtonText: 'Lanjut Belajar di Sini',
                    confirmButtonColor: '#2563eb',
                    background: '#1e293b', color: '#fff'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open('/sandbox', '_blank');
                    }
                });
            };
        }
    }

    function closeSpreadsheetLab() {
        document.getElementById('spreadsheet-modal').classList.add('hidden');
    }
</script>