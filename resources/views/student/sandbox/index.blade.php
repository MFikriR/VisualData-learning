@extends('layouts.app_learning')

@section('header', 'Sandbox: Laboratorium Data')

@section('content')
<div class="min-h-[85vh] font-sans pb-10 text-[#111111]">

    {{-- HEADER BAR --}}
    <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4 pb-6 border-b border-[#e5e5e7]">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight flex items-center gap-3 mb-2 text-[#111111]">
                <div class="p-2.5 rounded-xl bg-blue-50 text-[#0066cc] border border-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.6 15.12a2 2 0 01-1.183-1.874V5.07a2 2 0 01.767-1.581l.4-.3a2 2 0 011.233-.42h10.38a2 2 0 011.233.42l.4.3a2 2 0 01.767 1.581v8.484a2 2 0 01-.422 1.258z"></path></svg>
                </div>
                Laboratorium Data Science
            </h1>
            <p class="text-sm max-w-2xl leading-relaxed text-[#555555]">
                Ruang eksperimen interaktif. Unggah dataset berformat <strong class="text-[#0066cc]">.csv</strong> atau gunakan data sampel untuk mempraktikkan visualisasi dan algoritma <em>Clustering</em> secara langsung.
            </p>
        </div>
        <div class="flex gap-3">
            <button onclick="location.reload()" class="px-4 py-2.5 rounded-xl text-xs font-semibold flex items-center gap-2 transition-all bg-white border border-[#e5e5e7] text-[#111111] hover:bg-gray-50 shadow-sm">
                <svg class="w-4 h-4 text-[#555555]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                Reset Lab
            </button>
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl text-white bg-[#0066cc] hover:bg-[#0052a3] transition-all text-xs font-semibold flex items-center justify-center gap-2 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        {{-- SIDEBAR PANEL --}}
        <div class="lg:col-span-1 space-y-6 h-fit sticky top-6">

            {{-- PANEL 1: SUMBER DATA --}}
            <div class="rounded-2xl bg-white border border-[#e5e5e7] shadow-sm overflow-hidden">
                <div class="px-5 py-3.5 border-b border-[#f0f0f2] bg-[#fafafa]">
                    <h3 class="font-bold text-xs flex items-center gap-2 uppercase tracking-wider text-[#111111]">
                        <svg class="w-4 h-4 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                        1. Sumber Data
                    </h3>
                </div>

                <div class="p-5">
                    <div class="flex p-1 rounded-xl mb-4 bg-gray-100 border border-[#e5e5e7]">
                        <button onclick="switchSource('upload')" id="tab-upload" class="flex-1 py-2 text-[10px] font-bold uppercase rounded-lg text-white transition-all bg-[#0066cc]">
                            Unggah CSV
                        </button>
                        <button onclick="switchSource('sample')" id="tab-sample" class="flex-1 py-2 text-[10px] font-bold uppercase rounded-lg text-[#555555] transition-all">
                            Sampel Bawaan
                        </button>
                    </div>

                    {{-- PANEL UPLOAD --}}
                    <div id="panel-upload" class="block group">
                        <div class="relative rounded-xl p-6 text-center cursor-pointer transition-all border-2 border-dashed border-[#e5e5e7] bg-[#fafafa] hover:border-[#0066cc] hover:bg-blue-50/30" onclick="document.getElementById('csvInput').click()">
                            <input type="file" id="csvInput" accept=".csv" class="hidden">
                            <div id="uploadPlaceholder">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-white border border-[#e5e5e7] group-hover:scale-110 transition-transform text-[#0066cc]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                </div>
                                <p class="text-xs font-bold text-[#111111]">Pilih File CSV</p>
                            </div>
                            <div id="fileInfo" class="hidden animate-fade-in">
                                <div class="w-9 h-9 mx-auto mb-2 rounded-full flex items-center justify-center bg-green-50 border border-green-200 text-green-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <p class="font-bold text-xs truncate px-2 mb-1 text-green-700" id="fileNameDisplay"></p>
                                <div id="rowCountDisplay" class="text-[10px] font-mono px-2.5 py-0.5 rounded-md inline-block bg-green-100/60 text-green-800 border border-green-200"></div>
                            </div>
                        </div>
                    </div>

                    {{-- PANEL SAMPLE --}}
                    <div id="panel-sample" class="hidden">
                        <select id="sampleSelect" class="w-full text-xs font-semibold rounded-xl p-3 outline-none cursor-pointer bg-white border border-[#e5e5e7] text-[#111111] focus:border-[#0066cc]">
                            <option value="" selected disabled>-- Pilih Dataset Simulasi --</option>
                            <option value="{{ asset('datasets/iris.csv') }}">Dataset Bunga Iris</option>
                            <option value="{{ asset('datasets/titanic.csv') }}">Dataset Kapal Titanic</option>
                            <option value="{{ asset('datasets/housing.csv') }}">Perumahan</option>
                            <option value="{{ asset('datasets/animal.csv') }}">Hewan</option>
                        </select>
                        <p class="text-[10px] mt-2.5 text-center text-[#888888]">Dataset sampel telah dibersihkan agar optimal untuk simulasi visual.</p>
                    </div>
                </div>
            </div>

            {{-- PANEL 2: KONFIGURASI --}}
            <div id="configPanel" class="rounded-2xl bg-white border border-[#e5e5e7] shadow-sm overflow-hidden opacity-40 pointer-events-none transition-all duration-300">
                <div class="px-5 py-3.5 border-b border-[#f0f0f2] bg-[#fafafa]">
                    <h3 class="font-bold text-xs flex items-center gap-2 uppercase tracking-wider text-[#111111]">
                        <svg class="w-4 h-4 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        2. Panel Konfigurasi
                    </h3>
                </div>

                <div class="p-5 space-y-4">
                    <div>
                        <label class="text-[10px] uppercase font-bold tracking-wider block mb-1.5 text-[#555555]">Algoritma / Visualisasi</label>
                        <select id="chartType" class="w-full text-xs font-semibold rounded-xl p-2.5 outline-none cursor-pointer bg-white border border-[#e5e5e7] text-[#111111]">
                            <optgroup label="Dasar (1 & 2 Dimensi)">
                                <option value="bar">Bar Chart (Kategorikal)</option>
                                <option value="scatter">Scatter Plot (Korelasi)</option>
                                <option value="histogram">Histogram (Distribusi Frekuensi)</option>
                                <option value="box">Box Plot (Deteksi Outlier)</option>
                            </optgroup>
                            <optgroup label="Pengelompokan Data">
                                <option value="kmeans">K-Means Clustering (3D)</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="space-y-3 pt-3 border-t border-[#f0f0f2]">
                        <div id="xCont">
                            <label class="text-[10px] uppercase font-bold tracking-wider block mb-1 text-[#555555]">Variabel X</label>
                            <select id="selectX" class="w-full text-xs rounded-lg p-2 outline-none bg-white border border-[#e5e5e7] text-[#0066cc] font-medium"></select>
                        </div>

                        <div id="yCont">
                            <label class="text-[10px] uppercase font-bold tracking-wider block mb-1 text-[#555555]">Variabel Y</label>
                            <select id="selectY" class="w-full text-xs rounded-lg p-2 outline-none bg-white border border-[#e5e5e7] text-[#0066cc] font-medium"></select>
                        </div>

                        <div id="zContainer" class="hidden animate-fade-in">
                            <label class="text-[10px] uppercase font-bold tracking-wider block mb-1 text-purple-700">Variabel Z (Dimensi 3)</label>
                            <select id="selectZ" class="w-full text-xs rounded-lg p-2 outline-none bg-purple-50/50 border border-purple-200 text-purple-800 font-medium"></select>
                        </div>

                        <div id="clusterInputContainer" class="hidden animate-fade-in p-3.5 rounded-xl bg-blue-50/50 border border-blue-100">
                            <label class="text-[10px] uppercase font-bold tracking-wider block mb-2 pb-1.5 text-[#0066cc] border-b border-blue-100">Hyperparameter K-Means</label>

                            <div class="mb-3">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-[10px] text-[#555555]">Jumlah Klaster (K):</span>
                                    <span id="kValueNum" class="text-xs font-bold font-mono px-2 py-0.5 rounded bg-white border border-blue-200 text-[#0066cc]">3</span>
                                </div>
                                <input type="range" id="kValueRange" min="2" max="7" value="3" class="w-full accent-[#0066cc]" oninput="document.getElementById('kValueNum').innerText = this.value">
                            </div>

                            <label class="flex items-start gap-2 cursor-pointer p-2 rounded-lg bg-white border border-blue-100">
                                <input type="checkbox" id="normalizeCheck" checked class="mt-0.5 w-3.5 h-3.5 rounded accent-[#0066cc]">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#111111]">Terapkan Normalisasi</span>
                                    <p class="text-[9px] mt-0.5 leading-tight text-[#666666]">Gunakan Min-Max Scaler untuk mencegah bias skala numerik.</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button onclick="processAndRender()" id="btnExecute" class="w-full py-3 bg-[#0066cc] hover:bg-[#0052a3] text-white font-semibold text-xs uppercase tracking-wider rounded-xl transition-all shadow-sm flex justify-center items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Render Visualisasi
                    </button>
                </div>
            </div>
        </div>

        {{-- MAIN CANVAS AREA --}}
        <div class="lg:col-span-3 flex flex-col gap-6">

            <div class="rounded-2xl relative min-h-[480px] flex flex-col overflow-hidden bg-white border border-[#e5e5e7] shadow-sm transition-all" id="canvasContainer">

                <div class="px-5 py-3 flex justify-between items-center border-b border-[#e5e5e7] bg-[#fafafa]">
                    <div class="flex items-center gap-2.5">
                        <div class="flex gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                        </div>
                        <span class="text-[10px] font-bold font-mono tracking-wider pl-2.5 border-l border-[#e5e5e7] text-[#888888]">CANVAS_OUTPUT</span>
                    </div>
                    <button onclick="downloadImage()" class="text-[10px] font-semibold uppercase tracking-wider flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-[#e5e5e7] text-[#111111] hover:bg-gray-50 shadow-sm transition-all">
                        <svg class="w-3.5 h-3.5 text-[#555555]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Simpan PNG
                    </button>
                </div>

                <div id="chartArea" class="flex-1 w-full h-full relative p-2 bg-[#fdfdfd]">
                    <div id="placeholder" class="absolute inset-0 flex flex-col items-center justify-center text-[#888888]">
                        <svg class="w-14 h-14 mb-3 opacity-30 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <h4 class="text-base font-bold mb-1 text-[#111111]">Layar Utama Simulasi</h4>
                        <p class="text-xs max-w-sm text-center text-[#666666]">Data yang telah dieksekusi akan divisualisasikan secara interaktif di area ini.</p>
                    </div>
                </div>

                <div id="loadingOverlay" class="absolute inset-0 z-[100] hidden items-center justify-center flex-col bg-white/90 backdrop-blur-sm">
                    <div class="w-12 h-12 rounded-full border-4 border-blue-100 border-t-[#0066cc] animate-spin mb-3"></div>
                    <p class="text-xs font-bold uppercase tracking-wider text-[#0066cc] animate-pulse">Menghitung Komputasi Matematis...</p>
                </div>
            </div>

            {{-- RESULT INSIGHT & PREVIEW --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                <div id="analysisInfo" class="xl:col-span-2 hidden animate-fade-in p-5 rounded-2xl bg-white border border-[#e5e5e7] shadow-sm">
                    <h4 class="font-bold mb-3 flex items-center gap-2 text-base pb-2 text-[#111111] border-b border-[#f0f0f2]">
                        <svg class="w-5 h-5 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Interpretasi Sistem
                    </h4>
                    <div id="insightText" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs leading-relaxed text-[#444444]"></div>
                </div>

                <div id="dataPreviewPanel" class="xl:col-span-1 hidden animate-fade-in p-5 rounded-2xl bg-white border border-[#e5e5e7] shadow-sm flex flex-col h-64">
                    <h4 class="font-bold mb-3 flex items-center gap-2 text-xs pb-2 text-[#111111] border-b border-[#f0f0f2]">
                        <svg class="w-4 h-4 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Cuplikan Data (Top 5)
                    </h4>
                    <div class="overflow-auto flex-1 custom-scrollbar rounded-xl border border-[#e5e5e7] bg-[#fafafa]">
                        <table class="w-full text-left text-[10px] font-mono whitespace-nowrap text-[#111111]">
                            <thead class="sticky top-0 bg-gray-100 text-[#555555] font-bold" id="previewHead"></thead>
                            <tbody class="divide-y divide-[#e5e5e7]" id="previewBody"></tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f0f0f2; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.3s ease-out forwards; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script src="https://cdn.plot.ly/plotly-2.24.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let parsedData = [];
    let headers = [];

    // --- INTEGRASI SPREADSHEET LAB ---
    document.addEventListener('DOMContentLoaded', function() {
        const rawData = localStorage.getItem('spreadsheetData');
        const rawHeaders = localStorage.getItem('spreadsheetHeaders');

        if (rawData && rawHeaders) {
            try {
                const formattedData = JSON.parse(rawData);
                const dynamicHeaders = JSON.parse(rawHeaders);
                const meta = { fields: dynamicHeaders };
                processParsedResult(formattedData, meta, "Data_Spreadsheet_Siswa.csv");
                localStorage.removeItem('spreadsheetData');
                localStorage.removeItem('spreadsheetHeaders');
            } catch (e) {
                console.error("Gagal memuat data spreadsheet:", e);
            }
        }
    });

    // --- TAB SWITCHER ---
    function switchSource(mode) {
        const tUp = document.getElementById('tab-upload');
        const tSa = document.getElementById('tab-sample');
        const pUp = document.getElementById('panel-upload');
        const pSa = document.getElementById('panel-sample');

        if(mode === 'upload') {
            pUp.classList.remove('hidden'); pSa.classList.add('hidden');
            tUp.classList.add('bg-[#0066cc]', 'text-white'); tUp.classList.remove('text-[#555555]');
            tSa.classList.remove('bg-[#0066cc]', 'text-white'); tSa.classList.add('text-[#555555]');
        } else {
            pUp.classList.add('hidden'); pSa.classList.remove('hidden');
            tSa.classList.add('bg-[#0066cc]', 'text-white'); tSa.classList.remove('text-[#555555]');
            tUp.classList.remove('bg-[#0066cc]', 'text-white'); tUp.classList.add('text-[#555555]');
        }
    }

    // --- PARSING DATA CSV ---
    function processParsedResult(data, meta, name) {
        parsedData = data.filter(row => Object.values(row).every(val => val !== null && val !== undefined && val !== ""));
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
            text: 'Dataset berhasil dimuat dan dibersihkan.', showConfirmButton: false, timer: 2000
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
        headers.forEach(h => { headRow += '<th class="px-3 py-2 border-b border-[#e5e5e7]">' + h + '</th>'; });
        headRow += '</tr>';
        th.innerHTML = headRow;

        let limit = Math.min(5, parsedData.length);
        for(let i=0; i<limit; i++) {
            let rowHtml = '<tr>';
            headers.forEach(h => {
                rowHtml += '<td class="px-3 py-2 truncate max-w-[100px] border-r border-[#e5e5e7]" title="'+parsedData[i][h]+'">' + parsedData[i][h] + '</td>';
            });
            rowHtml += '</tr>';
            tb.innerHTML += rowHtml;
        }
    }

    // --- CONFIG EVENT LISTENER ---
    document.getElementById('chartType').addEventListener('change', function(e) {
        const type = e.target.value;
        const zBox = document.getElementById('zContainer');
        const kBox = document.getElementById('clusterInputContainer');
        const xBox = document.getElementById('xCont');

        zBox.classList.add('hidden'); kBox.classList.add('hidden'); xBox.classList.remove('hidden');

        if(type === 'kmeans') { zBox.classList.remove('hidden'); kBox.classList.remove('hidden'); }
        if(type === 'histogram' || type === 'box') xBox.classList.add('hidden');
    });

    // --- UTILITAS NUMERIK & NORMALISASI ---
    function isNumericArray(arr) {
        return arr.every(val => val !== null && val !== undefined && val !== "" && !isNaN(Number(val)));
    }

    function normalizeData(dataArray) {
        let numericArr = dataArray.map(v => Number(v) || 0);
        let min = Math.min(...numericArr);
        let max = Math.max(...numericArr);
        if (max === min) return numericArr.map(() => 0);
        return numericArr.map(val => (val - min) / (max - min));
    }

    // --- PROSES DAN RENDER VISUALISASI ---
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
                Swal.fire({ 
                    icon: 'error', 
                    title: 'Komputasi Gagal', 
                    text: err.message || 'Pastikan kolom variabel yang dipilih berisi data Numerik (Angka), bukan Teks/Kategori.'
                });
            }
        }, 500);
    }

    function renderChart() {
        const type = document.getElementById('chartType').value;
        const xKey = document.getElementById('selectX').value;
        const yKey = document.getElementById('selectY').value;
        const zKey = document.getElementById('selectZ').value;

        document.getElementById('placeholder').style.display = 'none';

        const xData = parsedData.map(d => d[xKey]);
        const yData = parsedData.map(d => d[yKey]);
        const zData = parsedData.map(d => d[zKey]);

        // Validasi tipe data numerik untuk grafik selain Bar
        if(type !== 'bar') {
            if(!isNumericArray(yData)) {
                throw new Error(`Variabel Y (${yKey}) harus berisi nilai angka/numerik.`);
            }
        }

        let traces = [];
        let layout = {
            paper_bgcolor: 'rgba(0,0,0,0)', 
            plot_bgcolor: 'rgba(245,245,247,0.5)',
            font: { color: '#111111', size: 11, family: 'sans-serif' },
            margin: { t: 30, r: 20, l: 50, b: 50 },
            xaxis: { title: {text: xKey, font: {color: '#111111'}}, gridcolor: '#e5e5e7', zerolinecolor: '#d1d1d6' },
            yaxis: { title: {text: yKey, font: {color: '#111111'}}, gridcolor: '#e5e5e7', zerolinecolor: '#d1d1d6' }
        };

        let calculatedInsights = {};
        const numYData = yData.map(v => (v !== null && v !== "" && !isNaN(Number(v))) ? Number(v) : 0);

        if (type === 'bar') {
            traces.push({ x: xData, y: yData, type: 'bar', marker: {color: '#0066cc', line: {color: '#0052a3', width: 1}} });
            calculatedInsights.title = "Analisis Kategorikal";
            calculatedInsights.desc = `Visualisasi ini menampilkan kuantitas dari setiap kategori <b>${xKey}</b>. Cocok untuk membandingkan volume antargrup secara cepat.`;
        }
        else if (type === 'scatter') {
            traces.push({ x: xData, y: yData, mode: 'markers', type: 'scatter', marker: {size: 8, color: '#0066cc', opacity: 0.7, line: {color: '#ffffff', width: 1}} });
            calculatedInsights.title = "Deteksi Korelasi (2D)";
            calculatedInsights.desc = `Grafik berpencar mengukur hubungan antara <b>${xKey}</b> dan <b>${yKey}</b>. Perhatikan apakah titik-titik membentuk pola garis menanjak (positif), menurun (negatif), atau acak (nihil).`;
        }
        else if (type === 'histogram') {
            traces.push({ x: numYData, type: 'histogram', marker: {color: '#34c759', line: {color: '#28a745', width: 1}} });
            layout.xaxis.title.text = yKey; layout.yaxis.title.text = "Frekuensi";
            calculatedInsights.title = "Distribusi Frekuensi";
            calculatedInsights.desc = `Bentuk histogram menunjukkan penyebaran nilai dari <b>${yKey}</b>. Lonceng simetris menandakan distribusi normal.`;
        }
        else if (type === 'box') {
            traces.push({ y: numYData, type: 'box', name: yKey, marker: {color: '#f59e0b'}, boxpoints: 'outliers' });
            layout.xaxis.visible = false;

            const sortedY = [...numYData].sort((a,b)=>a-b);
            const median = sortedY[Math.floor(sortedY.length/2)];
            calculatedInsights.title = "Statistik Box Plot & Outlier";
            calculatedInsights.desc = `Kotak mewakili 50% data pusat. Nilai tengah (Median) dari <b>${yKey}</b> adalah <b>${median.toFixed(2)}</b>. Titik di luar kumis adalah Pencilan (Outlier).`;
        }
        else if (type === 'kmeans') {
            if(!isNumericArray(xData) || !isNumericArray(yData) || !isNumericArray(zData)) {
                throw new Error("K-Means memerlukan data berformat numerik pada ketiga variabel (X, Y, Z).");
            }

            const k = parseInt(document.getElementById('kValueRange').value);
            const useNorm = document.getElementById('normalizeCheck').checked;

            let processData = [];
            if(useNorm) {
                const normX = normalizeData(xData); 
                const normY = normalizeData(yData); 
                const normZ = normalizeData(zData);
                for(let i=0; i<parsedData.length; i++) processData.push([normX[i], normY[i], normZ[i]]);
            } else {
                for(let i=0; i<parsedData.length; i++) processData.push([Number(xData[i])||0, Number(yData[i])||0, Number(zData[i])||0]);
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
                        name: 'Klaster ' + (i+1) + ' (' + sizes[i] + ' item)',
                        marker: { size: 5, color: colors[i % colors.length], opacity: 0.9, line: {width: 0.5, color: '#ffffff'} }
                    });
                }
            }
            layout.scene = {
                xaxis: {title: xKey, backgroundcolor: '#f5f5f7', gridcolor: '#e5e5e7'},
                yaxis: {title: yKey, backgroundcolor: '#f5f5f7', gridcolor: '#e5e5e7'},
                zaxis: {title: zKey, backgroundcolor: '#f5f5f7', gridcolor: '#e5e5e7'}
            };

            calculatedInsights.title = `Hasil K-Means Clustering (K=${k})`;
            calculatedInsights.desc = `
                Pengelompokan otomatis berbasis metrik jarak Euclidean. <br><br>
                <div class="p-2.5 rounded-lg font-mono text-xs mt-1 bg-blue-50/60 border border-blue-100 text-[#111111]">
                    <span class="text-[#555555]">Skor Evaluasi (WCSS): </span> <strong class="text-red-600">${inertia.toFixed(2)}</strong><br>
                    <span class="text-[#555555]">Status Normalisasi: </span> <strong class="text-green-600">${useNorm ? 'Aktif (Akurat)' : 'Non-Aktif'}</strong>
                </div>
            `;
        }

        Plotly.newPlot('chartArea', traces, layout, {responsive: true, displayModeBar: false});

        const maxYVal = numYData.length > 0 ? Math.max(...numYData) : 0;
        const minYVal = numYData.length > 0 ? Math.min(...numYData) : 0;
        const meanYVal = numYData.length > 0 ? (numYData.reduce((a,b)=>a+b,0) / numYData.length) : 0;

        document.getElementById('analysisInfo').classList.remove('hidden');
        document.getElementById('insightText').innerHTML = `
            <div class="p-3.5 rounded-xl bg-gray-50 border border-[#e5e5e7]">
                <strong class="block mb-1.5 font-bold uppercase tracking-wider text-[#0066cc]">${calculatedInsights.title}</strong>
                ${calculatedInsights.desc}
            </div>
            <div class="p-3.5 rounded-xl space-y-1.5 font-mono text-xs bg-gray-50 border border-[#e5e5e7]">
                <strong class="block font-sans mb-1.5 pb-1 border-b border-[#e5e5e7] text-[#111111]">Statistik Kolom Y (${yKey})</strong>
                <div class="flex justify-between"><span class="text-[#666666]">Max Value:</span> <span class="text-green-600 font-bold">${maxYVal.toFixed(2)}</span></div>
                <div class="flex justify-between"><span class="text-[#666666]">Min Value:</span> <span class="text-red-600 font-bold">${minYVal.toFixed(2)}</span></div>
                <div class="flex justify-between"><span class="text-[#666666]">Rata-rata:</span> <span class="text-[#0066cc] font-bold">${meanYVal.toFixed(2)}</span></div>
            </div>
        `;
    }

    // --- ALGORITMA CORE K-MEANS ---
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
        Plotly.downloadImage('chartArea', {format: 'png', filename: 'export_sandbox_visualdata', height: 800, width: 1200});
    }
</script>
@endsection