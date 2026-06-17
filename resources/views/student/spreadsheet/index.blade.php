@extends('layouts.app_learning')
@section('header', 'Spreadsheet Lab')

@section('content')
<div class="space-y-6">
    {{-- Header Section --}}
    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-2xl">
        <h1 class="text-2xl font-black text-white mb-2">📋 Spreadsheet Data Lab</h1>
        <p class="text-slate-400 text-sm">
            Ketik data eksperimenmu sebebas mungkin. <strong class="text-blue-400">Pastikan Baris 1 (Row 1) digunakan untuk mengetik nama variabelmu</strong> (misal: Titik, Variabel X, Variabel Y). 
        </p>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-wrap gap-3">
        <button id="addRowBtn" class="px-5 py-2 bg-slate-700 hover:bg-slate-600 border border-slate-600 rounded-lg text-white font-bold text-sm transition-all flex items-center gap-2 shadow-sm">
            <span>➕</span> Tambah Baris
        </button>
        <button id="removeRowBtn" class="px-5 py-2 bg-red-900/50 hover:bg-red-700 border border-red-700/50 rounded-lg text-white font-bold text-sm transition-all flex items-center gap-2 shadow-sm">
            <span>➖</span> Kurangi Baris
        </button>
        <button id="downloadCsvBtn" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-500 rounded-lg text-white font-bold text-sm transition-all flex items-center gap-2 shadow-sm ml-auto">
            <span>⬇️</span> Download CSV
        </button>
        <button id="sendSandboxBtn" class="px-6 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white font-black text-sm transition-all flex items-center gap-2 shadow-lg shadow-blue-900/40">
            <span>🚀</span> KIRIM KE SANDBOX
        </button>
    </div>

    {{-- Spreadsheet Container --}}
    <div class="bg-white rounded-xl overflow-hidden shadow-2xl border-4 border-slate-700">
        <div id="spreadsheet" class="w-full text-black"></div>
    </div>
</div>

{{-- JSpreadsheet CE v4 --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jspreadsheet-ce@4/dist/jspreadsheet.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsuites@4/dist/jsuites.min.css" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/jspreadsheet-ce@4/dist/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsuites@4/dist/jsuites.min.js"></script>

<style>
    /* STYLING ALA GOOGLE SHEETS ASLI */
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
        background-color: #fff !important; /* Paksa cell diam menjadi putih */
    }

    /* FIX: Mematikan background sel yang di-klik agar tidak menjadi biru */
    .jexcel > tbody > tr > td.jexcel_selected,
    .jexcel > tbody > tr > td.highlight,
    .jexcel > tbody > tr > td.highlight-left,
    .jexcel > tbody > tr > td.highlight-right,
    .jexcel > tbody > tr > td.highlight-top,
    .jexcel > tbody > tr > td.highlight-bottom { 
        background-color: #fff !important; /* Tetap dipaksa putih */
        border: 2px solid #1a73e8 !important; /* Diberi garis tepi biru ala Google Sheets */
        color: #000 !important;
    }

    /* FIX: Mencegah Tailwind CSS Forms membuat kotak ketikan menjadi biru pekat */
    #spreadsheet textarea, 
    #spreadsheet input, 
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
document.addEventListener('DOMContentLoaded', function() {
    // Matriks Kosong 25 Baris x 15 Kolom
    const emptyMatrix = Array.from({ length: 25 }, () => Array(15).fill(''));

    const table = jspreadsheet(document.getElementById('spreadsheet'), {
        data: emptyMatrix,
        minDimensions: [15, 25],
        defaultColWidth: 100,
        tableOverflow: true,
        tableWidth: "100%",
        tableHeight: "500px",
        csvFileName: 'Dataset_Siswa',
        allowInsertRow: true,
        allowDeleteRow: true,
    });

    // Kontrol Baris
    document.getElementById('addRowBtn').onclick = () => table.insertRow();
    document.getElementById('removeRowBtn').onclick = () => table.deleteRow();

    // Kontrol Download
    document.getElementById('downloadCsvBtn').onclick = () => table.download(true);
    
    // Logika Pintar untuk menangkap data buatan siswa
    document.getElementById('sendSandboxBtn').onclick = () => {
        const raw = table.getData();
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
            alert("Tabel masih kosong! Pastikan Baris 1 diisi nama variabel, dan Baris 2 dst diisi nilainya.");
            return;
        }

        localStorage.setItem('spreadsheetData', JSON.stringify(formattedData));
        localStorage.setItem('spreadsheetHeaders', JSON.stringify(headers.filter(h => h.trim() !== '')));
        window.location.href = '/sandbox';
    };
});
</script>
@endsection