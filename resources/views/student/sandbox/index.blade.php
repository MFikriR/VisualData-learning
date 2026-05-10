@extends('layouts.app_learning')

@section('header', 'Sandbox: Laboratorium Data')

@section('content')
<div class="min-h-[85vh] text-slate-200 font-sans pb-10">
    
    <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4 border-b border-slate-700/50 pb-6">
        <div>
            <h1 class="text-3xl font-black text-white tracking-tight flex items-center gap-3 mb-2">
                <span class="p-2 bg-blue-600/20 rounded-lg text-blue-400 shadow-[0_0_15px_rgba(37,99,235,0.3)]">🔬</span> 
                Laboratorium Data Science
            </h1>
            <p class="text-slate-400 text-sm max-w-2xl leading-relaxed">
                Ruang eksperimen interaktif. Unggah dataset berformat <strong class="text-blue-400">.csv</strong> atau gunakan data sampel untuk mempraktikkan visualisasi dan algoritma <em>Clustering</em> secara langsung.
            </p>
        </div>
        <div class="flex gap-3">
            <button onclick="location.reload()" class="px-4 py-2 rounded-xl border border-slate-700 bg-slate-800/50 hover:bg-slate-700 transition-all text-xs font-bold flex items-center gap-2 text-slate-300">
                <span>🔄</span> Reset Lab
            </button>
            <a href="{{ route('dashboard') }}" class="px-5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white transition-all text-sm font-bold flex items-center justify-center gap-2 shadow-lg shadow-blue-900/20 w-full md:w-auto">
                <span>↩️</span> Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        
        <div class="lg:col-span-1 space-y-6 h-fit sticky top-6">
            
            <div class="bg-[#1e293b] border border-slate-600 rounded-2xl shadow-xl overflow-hidden">
                <div class="px-5 py-3 border-b border-slate-600/50 bg-slate-800/80">
                    <h3 class="font-bold text-white text-xs flex items-center gap-2 uppercase tracking-widest">
                        <span class="text-lg">📂</span> 1. Sumber Data
                    </h3>
                </div>

                <div class="p-5">
                    <div class="flex bg-slate-900 p-1 rounded-xl mb-5 border border-slate-700 shadow-inner">
                        <button onclick="switchSource('upload')" id="tab-upload" class="flex-1 py-2 text-[10px] font-black uppercase rounded-lg bg-blue-600 text-white transition-all shadow-md">
                            Unggah CSV
                        </button>
                        <button onclick="switchSource('sample')" id="tab-sample" class="flex-1 py-2 text-[10px] font-black uppercase rounded-lg text-slate-500 hover:text-white transition-all">
                            Sampel Bawaan
                        </button>
                    </div>

                    <div id="panel-upload" class="block group">
                        <div class="relative border-2 border-dashed border-slate-600 bg-slate-800/50 rounded-xl p-6 text-center hover:border-blue-500 hover:bg-blue-900/10 transition-all cursor-pointer" onclick="document.getElementById('csvInput').click()">
                            <input type="file" id="csvInput" accept=".csv" class="hidden">
                            <div id="uploadPlaceholder">
                                <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform shadow-inner">
                                    <svg class="w-6 h-6 text-slate-400 group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-300 group-hover:text-white transition-colors">Pilih File CSV</p>
                            </div>
                            <div id="fileInfo" class="hidden animate-fade-in">
                                <div class="w-10 h-10 mx-auto mb-3 bg-green-500/20 text-green-400 rounded-full flex items-center justify-center">
                                    <span class="text-xl">✅</span>
                                </div>
                                <p class="text-green-400 font-black text-xs truncate px-2 mb-1" id="fileNameDisplay"></p>
                                <div id="rowCountDisplay" class="text-[10px] font-mono bg-green-900/30 text-green-300 px-2 py-0.5 rounded-md inline-block border border-green-500/30"></div>
                            </div>
                        </div>
                    </div>

                    <div id="panel-sample" class="hidden">
                        <select id="sampleSelect" class="w-full bg-slate-900 text-xs font-bold border border-slate-600 rounded-xl p-3 text-white focus:border-blue-500 outline-none cursor-pointer shadow-inner">
                            <option value="" selected disabled>-- Pilih Dataset Simulasi --</option>
                            <option value="{{ asset('datasets/iris.csv') }}">🌸 Dataset Bunga Iris</option>
                            <option value="{{ asset('datasets/titanic.csv') }}">🚢 Dataset Kapal Titanic</option>
                            <option value="{{ asset('datasets/customer_segmentation.csv') }}">🛍️ Segmentasi Pelanggan</option>
                        </select>
                        <p class="text-[10px] text-slate-500 mt-3 text-center">Dataset sampel telah dibersihkan agar optimal untuk simulasi visual.</p>
                    </div>
                </div>
            </div>

            <div id="configPanel" class="bg-[#1e293b] border border-slate-600 rounded-2xl shadow-xl opacity-40 pointer-events-none transition-all duration-500">
                <div class="px-5 py-3 border-b border-slate-600/50 bg-slate-800/80 rounded-t-2xl">
                    <h3 class="font-bold text-white text-xs flex items-center gap-2 uppercase tracking-widest">
                        <span class="text-lg">⚙️</span> 2. Panel Konfigurasi
                    </h3>
                </div>
                
                <div class="p-5 space-y-5">
                    <div>
                        <label class="text-[10px] text-slate-400 uppercase font-black tracking-widest block mb-2">Algoritma / Visualisasi</label>
                        <select id="chartType" class="w-full bg-slate-900 text-xs font-bold border border-slate-600 rounded-xl p-3 text-white focus:border-blue-500 outline-none cursor-pointer">
                            <optgroup label="Dasar (1 & 2 Dimensi)" class="bg-slate-800 text-gray-400">
                                <option value="bar" class="text-white">📊 Bar Chart (Kategorikal)</option>
                                <option value="scatter" class="text-white">📉 Scatter Plot (Korelasi)</option>
                                <option value="histogram" class="text-white">📶 Histogram (Distribusi Frekuensi)</option>
                                <option value="box" class="text-white">📦 Box Plot (Deteksi Outlier)</option>
                            </optgroup>
                            <optgroup label="Advanced Machine Learning" class="bg-slate-800 text-indigo-400">
                                <option value="scatter3d" class="text-white">🧊 Scatter Plot 3D</option>
                                <option value="kmeans" class="text-white">🤖 K-Means Clustering (3D)</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="space-y-4 pt-4 border-t border-slate-600/50">
                        <div id="xCont">
                            <label class="text-[10px] text-slate-400 uppercase font-black tracking-widest block mb-1">Variabel X</label>
                            <select id="selectX" class="w-full bg-slate-900 text-xs border border-slate-600 rounded-lg p-2.5 text-blue-300 focus:border-blue-500 outline-none"></select>
                        </div>

                        <div id="yCont">
                            <label class="text-[10px] text-slate-400 uppercase font-black tracking-widest block mb-1">Variabel Y</label>
                            <select id="selectY" class="w-full bg-slate-900 text-xs border border-slate-600 rounded-lg p-2.5 text-blue-300 focus:border-blue-500 outline-none"></select>
                        </div>

                        <div id="zContainer" class="hidden animate-fade-in">
                            <label class="text-[10px] text-purple-400 uppercase font-black tracking-widest block mb-1">Variabel Z (Dimensi 3)</label>
                            <select id="selectZ" class="w-full bg-slate-900 text-xs border border-purple-500/50 rounded-lg p-2.5 text-purple-300 focus:border-purple-500 outline-none"></select>
                        </div>

                        <div id="clusterInputContainer" class="hidden animate-fade-in bg-indigo-950/40 p-4 rounded-xl border border-indigo-500/30">
                            <label class="text-[11px] text-indigo-300 uppercase font-black tracking-widest block mb-3 border-b border-indigo-500/30 pb-2">Hyperparameter K-Means</label>
                            
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-[10px] text-gray-400">Jumlah Klaster (K):</span>
                                    <span id="kValueNum" class="text-sm font-black text-indigo-400 font-mono bg-black/50 px-2 py-0.5 rounded">3</span>
                                </div>
                                <input type="range" id="kValueRange" min="2" max="7" value="3" class="w-full accent-indigo-500" oninput="document.getElementById('kValueNum').innerText = this.value">
                            </div>

                            <label class="flex items-start gap-2 cursor-pointer group bg-black/30 p-2 rounded-lg border border-gray-700 hover:border-indigo-400 transition-colors">
                                <input type="checkbox" id="normalizeCheck" checked class="mt-0.5 w-4 h-4 text-indigo-600 rounded border-gray-600 bg-gray-900 focus:ring-indigo-500">
                                <div>
                                    <span class="text-[10px] font-bold text-white uppercase tracking-wider">Terapkan Normalisasi</span>
                                    <p class="text-[9px] text-gray-400 mt-1 leading-tight">Gunakan Min-Max Scaler agar fitur dengan angka besar tidak merusak jarak (mencegah Jebakan Skala).</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button onclick="processAndRender()" id="btnExecute" class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-black text-xs uppercase tracking-widest rounded-xl transition-transform active:scale-95 shadow-lg flex justify-center items-center gap-2 group">
                        <span class="group-hover:rotate-180 transition-transform duration-500">⚡</span> Render Visualisasi
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-3 flex flex-col gap-6">
            
            <div class="bg-[#0f1115] rounded-3xl border border-slate-700 shadow-2xl relative min-h-[500px] flex flex-col overflow-hidden transition-all duration-500" id="canvasContainer">
                
                <div class="px-6 py-3 border-b border-slate-700/80 flex justify-between items-center bg-slate-900/80 backdrop-blur-md z-10">
                    <div class="flex items-center gap-3">
                        <div class="flex gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-green-500/80"></span>
                        </div>
                        <span class="text-[10px] text-slate-500 font-bold font-mono tracking-widest border-l border-slate-700 pl-3">CANVAS_OUTPUT</span>
                    </div>
                    <button onclick="downloadImage()" class="text-[10px] font-bold uppercase tracking-wider text-slate-300 hover:text-white flex items-center gap-2 bg-slate-800 hover:bg-slate-700 px-3 py-1.5 rounded-lg transition-colors border border-slate-600">
                        <span>📸</span> Simpan JPG
                    </button>
                </div>
                
                <div id="chartArea" class="flex-1 w-full h-full relative p-2 bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:20px_20px]">
                    <div id="placeholder" class="absolute inset-0 flex flex-col items-center justify-center text-slate-500">
                        <span class="text-6xl mb-4 opacity-20 drop-shadow-md">📊</span>
                        <h4 class="text-lg font-bold text-slate-400 mb-1">Layar Utama</h4>
                        <p class="text-xs text-slate-500 max-w-sm text-center">Data yang telah dieksekusi akan divisualisasikan secara interaktif di area ini.</p>
                    </div>
                </div>

                <div id="loadingOverlay" class="absolute inset-0 bg-slate-900/90 backdrop-blur-sm z-[100] hidden items-center justify-center flex-col">
                    <div class="w-16 h-16 border-4 border-blue-500/30 border-t-blue-500 rounded-full animate-spin mb-4 shadow-[0_0_15px_rgba(37,99,235,0.5)]"></div>
                    <p class="text-xs font-black uppercase tracking-widest text-blue-400 animate-pulse">Menghitung Komputasi Matematis...</p>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                
                <div id="analysisInfo" class="xl:col-span-2 hidden animate-fade-in bg-gradient-to-br from-slate-800 to-slate-900 p-6 rounded-3xl border border-slate-700 shadow-xl">
                    <h4 class="font-black text-white mb-4 flex items-center gap-2 text-lg border-b border-slate-700 pb-3">
                        <span class="text-2xl">🧠</span> Interpretasi Sistem
                    </h4>
                    <div id="insightText" class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm text-slate-300 leading-relaxed">
                        </div>
                </div>

                <div id="dataPreviewPanel" class="xl:col-span-1 hidden animate-fade-in bg-slate-800 p-5 rounded-3xl border border-slate-700 shadow-xl flex flex-col h-64">
                    <h4 class="font-bold text-white mb-3 flex items-center gap-2 text-sm border-b border-slate-700 pb-2">
                        <span>📋</span> Cuplikan Data (Top 5)
                    </h4>
                    <div class="overflow-auto flex-1 custom-scrollbar rounded-lg border border-slate-700 bg-black/40">
                        <table class="w-full text-left text-[10px] font-mono text-slate-300 whitespace-nowrap">
                            <thead class="bg-slate-700/50 text-slate-400 sticky top-0" id="previewHead"></thead>
                            <tbody class="divide-y divide-slate-700/50" id="previewBody"></tbody>
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
    .animate-slide-down { animation: fadeIn 0.3s ease-out forwards; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script src="https://cdn.plot.ly/plotly-2.24.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let parsedData = [];
    let headers = [];

    // --- 0. UI TAB SWITCHER ---
    function switchSource(mode) {
        const tUp = document.getElementById('tab-upload');
        const tSa = document.getElementById('tab-sample');
        const pUp = document.getElementById('panel-upload');
        const pSa = document.getElementById('panel-sample');

        if(mode === 'upload') {
            pUp.classList.remove('hidden'); pSa.classList.add('hidden');
            tUp.className = "flex-1 py-2 text-[10px] font-black uppercase rounded-lg bg-blue-600 text-white shadow-md transition-all";
            tSa.className = "flex-1 py-2 text-[10px] font-black uppercase rounded-lg text-slate-500 hover:text-white transition-all";
        } else {
            pUp.classList.add('hidden'); pSa.classList.remove('hidden');
            tSa.className = "flex-1 py-2 text-[10px] font-black uppercase rounded-lg bg-blue-600 text-white shadow-md transition-all";
            tUp.className = "flex-1 py-2 text-[10px] font-black uppercase rounded-lg text-slate-500 hover:text-white transition-all";
        }
    }

    // --- 1. DATA PARSING & PREVIEW ---
    function processParsedResult(data, meta, name) {
        // Auto Cleaning: Hapus baris yang null/kosong
        parsedData = data.filter(row => {
            return Object.values(row).every(val => val !== null && val !== "");
        });

        headers = meta.fields;
        
        // Update UI Panel Upload
        document.getElementById('uploadPlaceholder').classList.add('hidden');
        document.getElementById('fileInfo').classList.remove('hidden');
        document.getElementById('fileNameDisplay').innerText = name;
        document.getElementById('rowCountDisplay').innerText = parsedData.length + " Baris Bersih";
        document.getElementById('configPanel').classList.remove('opacity-40', 'pointer-events-none');
        
        populateDropdowns();
        generateTablePreview();

        Swal.fire({
            toast: true, position: 'top-end', icon: 'success', title: 'Data Siap!',
            text: 'Dataset berhasi dimuat dan dibersihkan.', showConfirmButton: false, timer: 2000,
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

        // Headers
        let headRow = '<tr>';
        headers.forEach(h => { headRow += '<th class="px-3 py-2">' + h + '</th>'; });
        headRow += '</tr>';
        th.innerHTML = headRow;

        // Tampilkan maks 5 baris
        let limit = Math.min(5, parsedData.length);
        for(let i=0; i<limit; i++) {
            let rowHtml = '<tr class="hover:bg-slate-700/30">';
            headers.forEach(h => {
                rowHtml += '<td class="px-3 py-2 border-r border-slate-700/50 last:border-0 truncate max-w-[100px]" title="'+parsedData[i][h]+'">' + parsedData[i][h] + '</td>';
            });
            rowHtml += '</tr>';
            tb.innerHTML += rowHtml;
        }
    }

    // --- 2. CONFIG UI LOGIC ---
    document.getElementById('chartType').addEventListener('change', function(e) {
        const type = e.target.value;
        const zBox = document.getElementById('zContainer');
        const kBox = document.getElementById('clusterInputContainer');
        const xBox = document.getElementById('xCont');

        zBox.classList.add('hidden'); kBox.classList.add('hidden'); xBox.classList.remove('hidden');

        if(type === 'kmeans' || type === 'scatter3d') zBox.classList.remove('hidden');
        if(type === 'kmeans') kBox.classList.remove('hidden');
        if(type === 'histogram' || type === 'box') xBox.classList.add('hidden'); 
    });

    // --- 3. MATH & NORMALIZATION ---
    function normalizeData(dataArray) {
        let min = Math.min(...dataArray);
        let max = Math.max(...dataArray);
        if (max === min) return dataArray.map(() => 0); // Hindari pembagian nol
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
        }, 800); // Simulasi delay komputasi
    }

    function renderChart() {
        const type = document.getElementById('chartType').value;
        const xKey = document.getElementById('selectX').value;
        const yKey = document.getElementById('selectY').value;
        const zKey = document.getElementById('selectZ').value;
        
        document.getElementById('placeholder').style.display = 'none';
        
        // Ambil data spesifik kolom
        const xData = parsedData.map(d => d[xKey]);
        let yData = parsedData.map(d => d[yKey]);
        const zData = parsedData.map(d => d[zKey]);

        // Cek murni numerik untuk Histogram, Box, Scatter, Kmeans
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
            traces.push({ x: xData, y: yData, type: 'bar', marker: {color: '#3b82f6', line: {color: '#60a5fa', width: 1}} });
            calculatedInsights.title = "Analisis Kategorikal";
            calculatedInsights.desc = `Visualisasi ini menampilkan kuantitas dari setiap kategori <b>${xKey}</b>. Cocok untuk membandingkan volume antargrup secara cepat.`;
        } 
        else if (type === 'scatter') {
            traces.push({ x: xData, y: yData, mode: 'markers', type: 'scatter', marker: {size: 9, color: '#8b5cf6', opacity: 0.7, line: {color: '#ffffff', width: 0.5}} });
            calculatedInsights.title = "Deteksi Korelasi (2D)";
            calculatedInsights.desc = `Grafik berpencar mengukur hubungan antara <b>${xKey}</b> dan <b>${yKey}</b>. Perhatikan apakah titik-titik membentuk pola garis menanjak (positif), menurun (negatif), atau acak (nihil). Titik yang menyendiri jauh adalah <em>Outlier</em>.`;
        }
        else if (type === 'histogram') {
            traces.push({ x: yData, type: 'histogram', marker: {color: '#10b981', line: {color: '#047857', width: 1.5}} });
            layout.xaxis.title.text = yKey; layout.yaxis.title.text = "Frekuensi (Jumlah)";
            calculatedInsights.title = "Distribusi Frekuensi";
            calculatedInsights.desc = `Bentuk histogram menunjukkan penyebaran dari <b>${yKey}</b>. Jika membentuk lonceng simetris, distribusinya normal. Jika mengekor ke kanan/kiri, datanya <em>Skewed</em> (condong).`;
        }
        else if (type === 'box') {
            traces.push({ y: yData, type: 'box', name: yKey, marker: {color: '#f59e0b'}, boxpoints: 'outliers' });
            layout.xaxis.visible = false;
            
            // Hitung manual untuk insight
            const sortedY = [...yData].sort((a,b)=>a-b);
            const median = sortedY[Math.floor(sortedY.length/2)];
            calculatedInsights.title = "Statistik 5 Serangkai & Outlier";
            calculatedInsights.desc = `Kotak mewakili 50% data pusat. Nilai tengah (Median) dari <b>${yKey}</b> adalah <b>${median.toFixed(2)}</b>. Titik yang jatuh di luar garis kumis adalah data anomali (Pencilan/Outlier).`;
        }
        else if (type === 'scatter3d') {
            traces.push({
                x: xData, y: yData, z: zData,
                mode: 'markers', type: 'scatter3d',
                marker: { size: 6, color: yData, colorscale: 'Viridis', opacity: 0.8 }
            });
            layout.scene = { 
                xaxis: {title: xKey, backgroundcolor: '#0f172a', gridcolor: '#1e293b', zerolinecolor: '#334155'}, 
                yaxis: {title: yKey, backgroundcolor: '#0f172a', gridcolor: '#1e293b', zerolinecolor: '#334155'}, 
                zaxis: {title: zKey, backgroundcolor: '#0f172a', gridcolor: '#1e293b', zerolinecolor: '#334155'} 
            };
            calculatedInsights.title = "Ruang Vektor 3 Dimensi";
            calculatedInsights.desc = `Visualisasi tingkat lanjut yang memetakan hubungan antara tiga variabel sekaligus. Warnanya direpresentasikan oleh variasi nilai <b>${yKey}</b>.`;
        }
        else if (type === 'kmeans') {
            const k = parseInt(document.getElementById('kValueRange').value);
            const useNorm = document.getElementById('normalizeCheck').checked;
            
            // Persiapkan vektor untuk K-Means
            let processData = [];
            if(useNorm) {
                const normX = normalizeData(xData); const normY = normalizeData(yData); const normZ = normalizeData(zData);
                for(let i=0; i<parsedData.length; i++) processData.push([normX[i], normY[i], normZ[i]]);
            } else {
                for(let i=0; i<parsedData.length; i++) processData.push([xData[i], yData[i], zData[i]]);
            }

            // Jalankan Algoritma
            const { labels, inertia, sizes } = runKMeansEngine(processData, k);
            
            // Siapkan warna per klaster
            const colors = ['#ef4444', '#10b981', '#3b82f6', '#f59e0b', '#a855f7', '#ec4899'];

            for(let i=0; i<k; i++) {
                // Filter indeks array asli berdasarkan label cluster
                const idxs = labels.map((c, idx) => c === i ? idx : -1).filter(idx => idx !== -1);
                
                if (idxs.length > 0) {
                    traces.push({
                        x: idxs.map(idx => xData[idx]), // Gambar tetap data asli
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
                <div class="bg-indigo-950/50 p-3 rounded-lg border border-indigo-500/30 font-mono text-xs mt-2">
                    <span class="text-gray-400">Skor Evaluasi (Inertia/WCSS): </span> <strong class="text-red-400">${inertia.toFixed(2)}</strong><br>
                    <span class="text-gray-400">Status Normalisasi: </span> <strong class="text-emerald-400">${useNorm ? 'Aktif (Akurat)' : 'Non-Aktif (Rentan Bias Skala)'}</strong>
                </div>
            `;
        }

        Plotly.newPlot('chartArea', traces, layout, {responsive: true, displayModeBar: false});
        
        // Tampilkan Insight
        document.getElementById('analysisInfo').classList.remove('hidden');
        document.getElementById('insightText').innerHTML = `
            <div class="bg-black/30 p-4 rounded-xl border border-slate-700/50">
                <strong class="text-indigo-400 block mb-2 font-black uppercase tracking-wider">${calculatedInsights.title}</strong>
                ${calculatedInsights.desc}
            </div>
            <div class="bg-black/30 p-4 rounded-xl border border-slate-700/50 space-y-2 font-mono text-xs">
                <strong class="text-white block font-sans mb-2 border-b border-slate-700 pb-1">Statistik Kolom Y (${yKey})</strong>
                <div class="flex justify-between"><span class="text-slate-500">Max Value:</span> <span class="text-emerald-400">${Math.max(...yData).toFixed(2)}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Min Value:</span> <span class="text-red-400">${Math.min(...yData).toFixed(2)}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">Mean (Rata2):</span> <span class="text-blue-400">${(yData.reduce((a,b)=>a+b,0)/yData.length).toFixed(2)}</span></div>
            </div>
        `;
    }

    // --- 5. K-MEANS CORE ENGINE ---
    function runKMeansEngine(vectors, k) {
        // Init centroids acak
        let centroids = [];
        for(let i=0; i<k; i++) {
            centroids.push([...vectors[Math.floor(Math.random() * vectors.length)]]);
        }

        let labels = new Array(vectors.length).fill(-1);
        let sizes = new Array(k).fill(0);
        let inertia = 0;

        for(let iter=0; iter<15; iter++) { // 15 Iterasi cukup untuk sandbox
            inertia = 0;
            sizes.fill(0);

            // Assignment Step
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
                inertia += Math.pow(minDist, 2); // WCSS
            }

            // Update Centroid Step
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