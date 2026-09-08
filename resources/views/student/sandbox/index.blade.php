@extends('layouts.app_learning')

@section('header', 'Sandbox: Laboratorium Data')

@section('content')
<div class="min-h-[85vh] font-sans pb-10" style="color: var(--color-body-muted, #cccccc);">

    <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4 pb-6" style="border-bottom: 1px solid rgba(255,255,255,0.08);">
        <div>
            <h1 class="text-3xl font-black tracking-tight flex items-center gap-3 mb-2" style="color: #fff;">
                <span class="p-2 rounded-lg" style="background: rgba(0,102,204,0.15); color: var(--color-primary-on-dark,#2997ff);">🔬</span>
                Laboratorium Data Science
            </h1>
            <p class="text-sm max-w-2xl leading-relaxed" style="color: #94a3b8;">
                Ruang eksperimen interaktif. Unggah dataset berformat <strong style="color: var(--color-primary-on-dark,#2997ff);">.csv</strong> atau gunakan data sampel untuk mempraktikkan visualisasi dan algoritma <em>Clustering</em> secara langsung.
            </p>
        </div>
        <div class="flex gap-3">
            <button onclick="location.reload()" class="px-4 py-2 rounded-xl text-xs font-bold flex items-center gap-2 transition-all" style="border:1px solid rgba(255,255,255,0.12); background: rgba(255,255,255,0.04); color:#cbd5e1;">
                <span>🔄</span> Reset Lab
            </button>
            <a href="{{ route('dashboard') }}" class="px-5 py-2 rounded-xl text-white transition-all text-sm font-bold flex items-center justify-center gap-2 w-full md:w-auto" style="background: var(--color-primary,#0066cc);">
                <span>↩️</span> Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <div class="lg:col-span-1 space-y-6 h-fit sticky top-6">

            <div class="rounded-2xl overflow-hidden" style="background:#1e293b; border:1px solid rgba(255,255,255,0.08);">
                <div class="px-5 py-3" style="border-bottom:1px solid rgba(255,255,255,0.06); background: rgba(255,255,255,0.02);">
                    <h3 class="font-bold text-xs flex items-center gap-2 uppercase tracking-widest" style="color:#fff;">
                        <span class="text-lg">📂</span> 1. Sumber Data
                    </h3>
                </div>

                <div class="p-5">
                    <div class="flex p-1 rounded-xl mb-5" style="background:#0f172a; border:1px solid rgba(255,255,255,0.06);">
                        <button onclick="switchSource('upload')" id="tab-upload" class="flex-1 py-2 text-[10px] font-black uppercase rounded-lg text-white transition-all" style="background: var(--color-primary,#0066cc);">
                            Unggah CSV
                        </button>
                        <button onclick="switchSource('sample')" id="tab-sample" class="flex-1 py-2 text-[10px] font-black uppercase rounded-lg transition-all" style="color:#64748b;">
                            Sampel Bawaan
                        </button>
                    </div>

                    <div id="panel-upload" class="block group">
                        <div class="relative rounded-xl p-6 text-center cursor-pointer transition-all" style="border:2px dashed rgba(255,255,255,0.15); background: rgba(255,255,255,0.02);" onclick="document.getElementById('csvInput').click()">
                            <input type="file" id="csvInput" accept=".csv" class="hidden">
                            <div id="uploadPlaceholder">
                                <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform" style="background: rgba(255,255,255,0.06);">
                                    <svg class="w-6 h-6" style="color:#94a3b8;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                </div>
                                <p class="text-xs font-bold" style="color:#cbd5e1;">Pilih File CSV</p>
                            </div>
                            <div id="fileInfo" class="hidden animate-fade-in">
                                <div class="w-10 h-10 mx-auto mb-3 rounded-full flex items-center justify-center" style="background: rgba(52,199,89,0.15); color:#34c759;">
                                    <span class="text-xl">✅</span>
                                </div>
                                <p class="font-black text-xs truncate px-2 mb-1" style="color:#34c759;" id="fileNameDisplay"></p>
                                <div id="rowCountDisplay" class="text-[10px] font-mono px-2 py-0.5 rounded-md inline-block" style="background: rgba(52,199,89,0.12); color:#34c759; border:1px solid rgba(52,199,89,0.25);"></div>
                            </div>
                        </div>
                    </div>

                    <div id="panel-sample" class="hidden">
                        <select id="sampleSelect" class="w-full text-xs font-bold rounded-xl p-3 outline-none cursor-pointer" style="background:#0f172a; border:1px solid rgba(255,255,255,0.1); color:#fff;">
                            <option value="" selected disabled>-- Pilih Dataset Simulasi --</option>
                            <option value="{{ asset('datasets/iris.csv') }}">🌸 Dataset Bunga Iris</option>
                            <option value="{{ asset('datasets/titanic.csv') }}">🚢 Dataset Kapal Titanic</option>
                            <option value="{{ asset('datasets/customer_segmentation.csv') }}">🛍️ Segmentasi Pelanggan</option>
                        </select>
                        <p class="text-[10px] mt-3 text-center" style="color:#64748b;">Dataset sampel telah dibersihkan agar optimal untuk simulasi visual.</p>
                    </div>
                </div>
            </div>

            <div id="configPanel" class="rounded-2xl opacity-40 pointer-events-none transition-all duration-500" style="background:#1e293b; border:1px solid rgba(255,255,255,0.08);">
                <div class="px-5 py-3 rounded-t-2xl" style="border-bottom:1px solid rgba(255,255,255,0.06); background: rgba(255,255,255,0.02);">
                    <h3 class="font-bold text-xs flex items-center gap-2 uppercase tracking-widest" style="color:#fff;">
                        <span class="text-lg">⚙️</span> 2. Panel Konfigurasi
                    </h3>
                </div>

                <div class="p-5 space-y-5">
                    <div>
                        <label class="text-[10px] uppercase font-black tracking-widest block mb-2" style="color:#94a3b8;">Algoritma / Visualisasi</label>
                        <select id="chartType" class="w-full text-xs font-bold rounded-xl p-3 outline-none cursor-pointer" style="background:#0f172a; border:1px solid rgba(255,255,255,0.1); color:#fff;">
                            <optgroup label="Dasar (1 & 2 Dimensi)">
                                <option value="bar">📊 Bar Chart (Kategorikal)</option>
                                <option value="scatter">📉 Scatter Plot (Korelasi)</option>
                                <option value="histogram">📶 Histogram (Distribusi Frekuensi)</option>
                                <option value="box">📦 Box Plot (Deteksi Outlier)</option>
                            </optgroup>
                            <optgroup label="Pengelompokan Data">
                                <option value="kmeans">🤖 K-Means Clustering</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="space-y-4 pt-4" style="border-top:1px solid rgba(255,255,255,0.06);">
                        <div id="xCont">
                            <label class="text-[10px] uppercase font-black tracking-widest block mb-1" style="color:#94a3b8;">Variabel X</label>
                            <select id="selectX" class="w-full text-xs rounded-lg p-2.5 outline-none" style="background:#0f172a; border:1px solid rgba(255,255,255,0.1); color: var(--color-primary-on-dark,#2997ff);"></select>
                        </div>

                        <div id="yCont">
                            <label class="text-[10px] uppercase font-black tracking-widest block mb-1" style="color:#94a3b8;">Variabel Y</label>
                            <select id="selectY" class="w-full text-xs rounded-lg p-2.5 outline-none" style="background:#0f172a; border:1px solid rgba(255,255,255,0.1); color: var(--color-primary-on-dark,#2997ff);"></select>
                        </div>

                        <div id="zContainer" class="hidden animate-fade-in">
                            <label class="text-[10px] uppercase font-black tracking-widest block mb-1" style="color:#a855f7;">Variabel Z (Dimensi 3)</label>
                            <select id="selectZ" class="w-full text-xs rounded-lg p-2.5 outline-none" style="background:#0f172a; border:1px solid rgba(168,85,247,0.4); color:#c084fc;"></select>
                        </div>

                        <div id="clusterInputContainer" class="hidden animate-fade-in p-4 rounded-xl" style="background: rgba(0,102,204,0.08); border:1px solid rgba(0,102,204,0.25);">
                            <label class="text-[11px] uppercase font-black tracking-widest block mb-3 pb-2" style="color: var(--color-primary-on-dark,#2997ff); border-bottom:1px solid rgba(0,102,204,0.25);">Hyperparameter K-Means</label>

                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-[10px]" style="color:#94a3b8;">Jumlah Klaster (K):</span>
                                    <span id="kValueNum" class="text-sm font-black font-mono px-2 py-0.5 rounded" style="color: var(--color-primary-on-dark,#2997ff); background: rgba(0,0,0,0.4);">3</span>
                                </div>
                                <input type="range" id="kValueRange" min="2" max="7" value="3" class="w-full" style="accent-color: var(--color-primary,#0066cc);" oninput="document.getElementById('kValueNum').innerText = this.value">
                            </div>

                            <label class="flex items-start gap-2 cursor-pointer group p-2 rounded-lg transition-colors" style="background: rgba(0,0,0,0.25); border:1px solid rgba(255,255,255,0.08);">
                                <input type="checkbox" id="normalizeCheck" checked class="mt-0.5 w-4 h-4 rounded" style="accent-color: var(--color-primary,#0066cc);">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider" style="color:#fff;">Terapkan Normalisasi</span>
                                    <p class="text-[9px] mt-1 leading-tight" style="color:#94a3b8;">Gunakan Min-Max Scaler agar fitur dengan angka besar tidak merusak jarak (mencegah Jebakan Skala).</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button onclick="processAndRender()" id="btnExecute" class="w-full py-4 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-transform active:scale-95 flex justify-center items-center gap-2 group" style="background: var(--color-primary,#0066cc);">
                        <span class="group-hover:rotate-180 transition-transform duration-500">⚡</span> Render Visualisasi
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-3 flex flex-col gap-6">

            <div class="rounded-3xl relative min-h-[500px] flex flex-col overflow-hidden transition-all duration-500" id="canvasContainer" style="background:#0f1115; border:1px solid rgba(255,255,255,0.08);">

                <div class="px-6 py-3 flex justify-between items-center z-10" style="border-bottom:1px solid rgba(255,255,255,0.08); background: rgba(15,23,42,0.7); backdrop-filter: blur(6px);">
                    <div class="flex items-center gap-3">
                        <div class="flex gap-1.5">
                            <span class="w-3 h-3 rounded-full" style="background:#ef4444;"></span>
                            <span class="w-3 h-3 rounded-full" style="background:#f59e0b;"></span>
                            <span class="w-3 h-3 rounded-full" style="background:#34c759;"></span>
                        </div>
                        <span class="text-[10px] font-bold font-mono tracking-widest pl-3" style="color:#64748b; border-left:1px solid rgba(255,255,255,0.08);">CANVAS_OUTPUT</span>
                    </div>
                    <button onclick="downloadImage()" class="text-[10px] font-bold uppercase tracking-wider flex items-center gap-2 px-3 py-1.5 rounded-lg transition-colors" style="color:#cbd5e1; background: rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1);">
                        <span>📸</span> Simpan JPG
                    </button>
                </div>

                <div id="chartArea" class="flex-1 w-full h-full relative p-2" style="background-image: radial-gradient(#1e293b 1px, transparent 1px); background-size: 20px 20px;">
                    <div id="placeholder" class="absolute inset-0 flex flex-col items-center justify-center" style="color:#64748b;">
                        <span class="text-6xl mb-4 opacity-20">📊</span>
                        <h4 class="text-lg font-bold mb-1" style="color:#94a3b8;">Layar Utama</h4>
                        <p class="text-xs max-w-sm text-center" style="color:#64748b;">Data yang telah dieksekusi akan divisualisasikan secara interaktif di area ini.</p>
                    </div>
                </div>

                <div id="loadingOverlay" class="absolute inset-0 z-[100] hidden items-center justify-center flex-col" style="background: rgba(15,23,42,0.92); backdrop-filter: blur(4px);">
                    <div class="w-16 h-16 rounded-full animate-spin mb-4" style="border:4px solid rgba(0,102,204,0.25); border-top-color: var(--color-primary,#0066cc);"></div>
                    <p class="text-xs font-black uppercase tracking-widest animate-pulse" style="color: var(--color-primary-on-dark,#2997ff);">Menghitung Komputasi Matematis...</p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                <div id="analysisInfo" class="xl:col-span-2 hidden animate-fade-in p-6 rounded-3xl" style="background: linear-gradient(135deg,#1e293b,#0f172a); border:1px solid rgba(255,255,255,0.08);">
                    <h4 class="font-black mb-4 flex items-center gap-2 text-lg pb-3" style="color:#fff; border-bottom:1px solid rgba(255,255,255,0.08);">
                        <span class="text-2xl">🧠</span> Interpretasi Sistem
                    </h4>
                    <div id="insightText" class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm leading-relaxed" style="color:#cbd5e1;"></div>
                </div>

                <div id="dataPreviewPanel" class="xl:col-span-1 hidden animate-fade-in p-5 rounded-3xl flex flex-col h-64" style="background:#1e293b; border:1px solid rgba(255,255,255,0.08);">
                    <h4 class="font-bold mb-3 flex items-center gap-2 text-sm pb-2" style="color:#fff; border-bottom:1px solid rgba(255,255,255,0.08);">
                        <span>📋</span> Cuplikan Data (Top 5)
                    </h4>
                    <div class="overflow-auto flex-1 custom-scrollbar rounded-lg" style="border:1px solid rgba(255,255,255,0.08); background: rgba(0,0,0,0.3);">
                        <table class="w-full text-left text-[10px] font-mono whitespace-nowrap" style="color:#cbd5e1;">
                            <thead class="sticky top-0" style="background: rgba(255,255,255,0.04); color:#94a3b8;" id="previewHead"></thead>
                            <tbody class="divide-y" style="border-color: rgba(255,255,255,0.06);" id="previewBody"></tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: rgba(0,0,0,0.2); }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #475569; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #64748b; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script src="https://cdn.plot.ly/plotly-2.24.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let parsedData = [];
    let headers = [];

    // ====================================================================
    // --- PENANGKAP DATA DINAMIS DARI SPREADSHEET ---
    // ====================================================================
    document.addEventListener('DOMContentLoaded', function() {
        const rawData = localStorage.getItem('spreadsheetData');
        const rawHeaders = localStorage.getItem('spreadsheetHeaders');

        if (rawData && rawHeaders) {
            const formattedData = JSON.parse(rawData);
            const dynamicHeaders = JSON.parse(rawHeaders);
            const meta = { fields: dynamicHeaders };
            processParsedResult(formattedData, meta, "Data_Spreadsheet_Siswa.csv");
            localStorage.removeItem('spreadsheetData');
            localStorage.removeItem('spreadsheetHeaders');
        }
    });
    // ====================================================================

    // --- 0. UI TAB SWITCHER ---
    function switchSource(mode) {
        const tUp = document.getElementById('tab-upload');
        const tSa = document.getElementById('tab-sample');
        const pUp = document.getElementById('panel-upload');
        const pSa = document.getElementById('panel-sample');

        if(mode === 'upload') {
            pUp.classList.remove('hidden'); pSa.classList.add('hidden');
            tUp.style.background = 'var(--color-primary,#0066cc)'; tUp.style.color = '#fff';
            tSa.style.background = 'transparent'; tSa.style.color = '#64748b';
        } else {
            pUp.classList.add('hidden'); pSa.classList.remove('hidden');
            tSa.style.background = 'var(--color-primary,#0066cc)'; tSa.style.color = '#fff';
            tUp.style.background = 'transparent'; tUp.style.color = '#64748b';
        }
    }

    // --- 1. DATA PARSING & PREVIEW ---
    function processParsedResult(data, meta, name) {
        parsedData = data.filter(row => Object.values(row).every(val => val !== null && val !== ""));
        headers = meta.fields;

        document.getElementById('uploadPlaceholder').classList.add('hidden');
        document.getElementById('fileInfo').classList.remove('hidden');
        document.getElementById('fileNameDisplay').innerText = name;
        document.getElementById('rowCountDisplay').innerText = parsedData.length + " Baris Bersih";
        document.getElementById('configPanel').classList.remove('opacity-40', 'pointer-events-none');

        populateDropdowns();
        generateTablePreview();

        Swal.fire({
            toast: true, position: 'top-end', icon: 'success', title: 'Data Siap!',
            text: 'Dataset berhasil dimuat dan dibersihkan.', showConfirmButton: false, timer: 2000,
            background: '#0f172a', color: '#fff'
        });
    }

    document.getElementById('csvInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(!file) return;
        Papa.parse(file, { header: true, dynamicTyping: true, skipEmptyLines: true, complete: (r) => processParsedResult(r.data, r.meta, file.name) });
    });

    document.getElementById('sampleSelect').addEventListener('change', function(e) {
        if(!e.target.value) return;
        fetch(e.target.value).then(res => res.text()).then(csv => {
            Papa.parse(csv, { header: true, dynamicTyping: true, skipEmptyLines: true, complete: (r) => processParsedResult(r.data, r.meta, e.target.options[e.target.selectedIndex].text) });
        });
    });

    function populateDropdowns() {
        const ids = ['selectX', 'selectY', 'selectZ'];
        ids.forEach(id => {
            const select = document.getElementById(id);
            select.innerHTML = '';
            headers.forEach(h => {
                let opt = document.createElement('option');
                opt.value = h; opt.text = h;
                select.appendChild(opt);
            });
        });
        if(headers.length > 1) document.getElementById('selectY').selectedIndex = 1;
        if(headers.length > 2) document.getElementById('selectZ').selectedIndex = 2;
    }

    function generateTablePreview() {
        const pnl = document.getElementById('dataPreviewPanel');
        const th = document.getElementById('previewHead');
        const tb = document.getElementById('previewBody');

        pnl.classList.remove('hidden');
        th.innerHTML = ''; tb.innerHTML = '';

        let headRow = '<tr>';
        headers.forEach(h => { headRow += '<th class="px-3 py-2">' + h + '</th>'; });
        headRow += '</tr>';
        th.innerHTML = headRow;

        let limit = Math.min(5, parsedData.length);
        for(let i=0; i<limit; i++) {
            let rowHtml = '<tr>';
            headers.forEach(h => {
                rowHtml += '<td class="px-3 py-2 truncate max-w-[100px]" style="border-right:1px solid rgba(255,255,255,0.06);" title="'+parsedData[i][h]+'">' + parsedData[i][h] + '</td>';
            });
            rowHtml += '</tr>';
            tb.innerHTML += rowHtml;
        }
    }

    // --- 2. CONFIG UI LOGIC ---
    // Catatan: opsi "Scatter Plot 3D" generik telah dihapus.
    // Kolom Z hanya relevan untuk visualisasi K-Means Clustering.
    document.getElementById('chartType').addEventListener('change', function(e) {
        const type = e.target.value;
        const zBox = document.getElementById('zContainer');
        const kBox = document.getElementById('clusterInputContainer');
        const xBox = document.getElementById('xCont');

        zBox.classList.add('hidden'); kBox.classList.add('hidden'); xBox.classList.remove('hidden');

        if(type === 'kmeans') { zBox.classList.remove('hidden'); kBox.classList.remove('hidden'); }
        if(type === 'histogram' || type === 'box') xBox.classList.add('hidden');
    });

    // --- 3. MATH & NORMALIZATION ---
    function normalizeData(dataArray) {
        let min = Math.min(...dataArray);
        let max = Math.max(...dataArray);
        if (max === min) return dataArray.map(() => 0);
        return dataArray.map(val => (val - min) / (max - min));
    }

    // --- 4. RENDERER ---
    function processAndRender() {
        const loading = document.getElementById('loadingOverlay');
        loading.classList.remove('hidden');
        loading.classList.add('flex');

        setTimeout(() => {
            try {
                renderChart();
                loading.classList.add('hidden');
            } catch (err) {
                loading.classList.add('hidden');
                console.error(err);
                Swal.fire({ icon: 'error', title: 'Komputasi Gagal', text: 'Pastikan kolom variabel yang dipilih berisi data Numerik (Angka), bukan Teks/Kategori.', background: '#1e293b', color: '#fff' });
            }
        }, 800);
    }

    function renderChart() {
        const type = document.getElementById('chartType').value;
        const xKey = document.getElementById('selectX').value;
        const yKey = document.getElementById('selectY').value;
        const zKey = document.getElementById('selectZ').value;

        document.getElementById('placeholder').style.display = 'none';

        const xData = parsedData.map(d => d[xKey]);
        let yData = parsedData.map(d => d[yKey]);
        const zData = parsedData.map(d => d[zKey]);

        if(type !== 'bar' && type !== 'pie') {
            if(yData.some(isNaN)) throw new Error("Y is not numeric");
        }

        let traces = [];
        let layout = {
            paper_bgcolor: 'rgba(0,0,0,0)', plot_bgcolor: 'rgba(0,0,0,0)',
            font: { color: '#94a3b8', size: 11, family: 'monospace' },
            margin: { t: 40, r: 20, l: 50, b: 50 },
            xaxis: { title: {text: xKey, font: {color: '#f8fafc'}}, gridcolor: '#1e293b', zerolinecolor: '#334155' },
            yaxis: { title: {text: yKey, font: {color: '#f8fafc'}}, gridcolor: '#1e293b', zerolinecolor: '#334155' }
        };

        let calculatedInsights = {};

        if (type === 'bar') {
            traces.push({ x: xData, y: yData, type: 'bar', marker: {color: '#0066cc', line: {color: '#2997ff', width: 1}} });
            calculatedInsights.title = "Analisis Kategorikal";
            calculatedInsights.desc = `Visualisasi ini menampilkan kuantitas dari setiap kategori <b>${xKey}</b>. Cocok untuk membandingkan volume antargrup secara cepat.`;
        }
        else if (type === 'scatter') {
            traces.push({ x: xData, y: yData, mode: 'markers', type: 'scatter', marker: {size: 9, color: '#8b5cf6', opacity: 0.7, line: {color: '#ffffff', width: 0.5}} });
            calculatedInsights.title = "Deteksi Korelasi (2D)";
            calculatedInsights.desc = `Grafik berpencar mengukur hubungan antara <b>${xKey}</b> dan <b>${yKey}</b>. Perhatikan apakah titik-titik membentuk pola garis menanjak (positif), menurun (negatif), atau acak (nihil). Titik yang menyendiri jauh adalah <em>Outlier</em>.`;
        }
        else if (type === 'histogram') {
            traces.push({ x: yData, type: 'histogram', marker: {color: '#34c759', line: {color: '#1e8e3e', width: 1.5}} });
            layout.xaxis.title.text = yKey; layout.yaxis.title.text = "Frekuensi (Jumlah)";
            calculatedInsights.title = "Distribusi Frekuensi";
            calculatedInsights.desc = `Bentuk histogram menunjukkan penyebaran dari <b>${yKey}</b>. Jika membentuk lonceng simetris, distribusinya normal. Jika mengekor ke kanan/kiri, datanya <em>Skewed</em> (condong).`;
        }
        else if (type === 'box') {
            traces.push({ y: yData, type: 'box', name: yKey, marker: {color: '#f59e0b'}, boxpoints: 'outliers' });
            layout.xaxis.visible = false;

            const sortedY = [...yData].sort((a,b)=>a-b);
            const median = sortedY[Math.floor(sortedY.length/2)];
            calculatedInsights.title = "Statistik 5 Serangkai & Outlier";
            calculatedInsights.desc = `Kotak mewakili 50% data pusat. Nilai tengah (Median) dari <b>${yKey}</b> adalah <b>${median.toFixed(2)}</b>. Titik yang jatuh di luar garis kumis adalah data anomali (Pencilan/Outlier).`;
        }
        else if (type === 'kmeans') {
            const k = parseInt(document.getElementById('kValueRange').value);
            const useNorm = document.getElementById('normalizeCheck').checked;

            let processData = [];
            if(useNorm) {
                const normX = normalizeData(xData); const normY = normalizeData(yData); const normZ = normalizeData(zData);
                for(let i=0; i<parsedData.length; i++) processData.push([normX[i], normY[i], normZ[i]]);
            } else {
                for(let i=0; i<parsedData.length; i++) processData.push([xData[i], yData[i], zData[i]]);
            }

            const { labels, inertia, sizes } = runKMeansEngine(processData, k);
            const colors = ['#ef4444', '#34c759', '#0066cc', '#f59e0b', '#a855f7', '#ec4899'];

            for(let i=0; i<k; i++) {
                const idxs = labels.map((c, idx) => c === i ? idx : -1).filter(idx => idx !== -1);
                if (idxs.length > 0) {
                    traces.push({
                        x: idxs.map(idx => xData[idx]),
                        y: idxs.map(idx => yData[idx]),
                        z: idxs.map(idx => zData[idx]),
                        mode: 'markers', type: 'scatter3d',
                        name: 'Klaster ' + (i+1) + ' (' + sizes[i] + ' titik)',
                        marker: { size: 6, color: colors[i % colors.length], opacity: 1, line: {width: 1, color: '#0f172a'} }
                    });
                }
            }
            layout.scene = {
                xaxis: {title: xKey, backgroundcolor: '#0f172a', gridcolor: '#1e293b'},
                yaxis: {title: yKey, backgroundcolor: '#0f172a', gridcolor: '#1e293b'},
                zaxis: {title: zKey, backgroundcolor: '#0f172a', gridcolor: '#1e293b'}
            };

            calculatedInsights.title = `Hasil K-Means Clustering (K=${k})`;
            calculatedInsights.desc = `
                Sistem melakukan konvergensi iteratif menggunakan metrik jarak Euclidean. <br><br>
                <div class="p-3 rounded-lg font-mono text-xs mt-2" style="background: rgba(0,102,204,0.1); border:1px solid rgba(0,102,204,0.3);">
                    <span style="color:#94a3b8;">Skor Evaluasi (Inertia/WCSS): </span> <strong style="color:#ef4444;">${inertia.toFixed(2)}</strong><br>
                    <span style="color:#94a3b8;">Status Normalisasi: </span> <strong style="color:#34c759;">${useNorm ? 'Aktif (Akurat)' : 'Non-Aktif (Rentan Bias Skala)'}</strong>
                </div>
            `;
        }

        Plotly.newPlot('chartArea', traces, layout, {responsive: true, displayModeBar: false});

        document.getElementById('analysisInfo').classList.remove('hidden');
        document.getElementById('insightText').innerHTML = `
            <div class="p-4 rounded-xl" style="background: rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.06);">
                <strong class="block mb-2 font-black uppercase tracking-wider" style="color: var(--color-primary-on-dark,#2997ff);">${calculatedInsights.title}</strong>
                ${calculatedInsights.desc}
            </div>
            <div class="p-4 rounded-xl space-y-2 font-mono text-xs" style="background: rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.06);">
                <strong class="block font-sans mb-2 pb-1" style="color:#fff; border-bottom:1px solid rgba(255,255,255,0.08);">Statistik Kolom Y (${yKey})</strong>
                <div class="flex justify-between"><span style="color:#64748b;">Max Value:</span> <span style="color:#34c759;">${Math.max(...yData).toFixed(2)}</span></div>
                <div class="flex justify-between"><span style="color:#64748b;">Min Value:</span> <span style="color:#ef4444;">${Math.min(...yData).toFixed(2)}</span></div>
                <div class="flex justify-between"><span style="color:#64748b;">Mean (Rata2):</span> <span style="color: var(--color-primary-on-dark,#2997ff);">${(yData.reduce((a,b)=>a+b,0)/yData.length).toFixed(2)}</span></div>
            </div>
        `;
    }

    // --- 5. K-MEANS CORE ENGINE ---
    function runKMeansEngine(vectors, k) {
        let centroids = [];
        for(let i=0; i<k; i++) {
            centroids.push([...vectors[Math.floor(Math.random() * vectors.length)]]);
        }

        let labels = new Array(vectors.length).fill(-1);
        let sizes = new Array(k).fill(0);
        let inertia = 0;

        for(let iter=0; iter<15; iter++) {
            inertia = 0;
            sizes.fill(0);

            for(let i=0; i<vectors.length; i++) {
                let minDist = Infinity;
                let cIndex = 0;
                for(let c=0; c<k; c++) {
                    let sumSq = 0;
                    for(let d=0; d<vectors[i].length; d++) {
                        sumSq += Math.pow(vectors[i][d] - centroids[c][d], 2);
                    }
                    let dist = Math.sqrt(sumSq);
                    if(dist < minDist) { minDist = dist; cIndex = c; }
                }
                labels[i] = cIndex;
                sizes[cIndex]++;
                inertia += Math.pow(minDist, 2);
            }

            let newCentroids = Array(k).fill(0).map(() => Array(vectors[0].length).fill(0));
            for(let i=0; i<vectors.length; i++) {
                for(let d=0; d<vectors[i].length; d++) {
                    newCentroids[labels[i]][d] += vectors[i][d];
                }
            }
            for(let c=0; c<k; c++) {
                if(sizes[c] > 0) {
                    for(let d=0; d<centroids[c].length; d++) {
                        centroids[c][d] = newCentroids[c][d] / sizes[c];
                    }
                }
            }
        }
        return { labels, inertia, sizes };
    }

    function downloadImage() {
        Plotly.downloadImage('chartArea', {format: 'png', filename: 'export_sandbox_ai', height: 800, width: 1200});
    }
</script>
@endsection