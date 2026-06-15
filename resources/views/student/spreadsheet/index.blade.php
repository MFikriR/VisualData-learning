@extends('layouts.app_learning')

@section('header', 'Spreadsheet Lab')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6">
        <h1 class="text-2xl font-black text-white mb-2">
            📋 Spreadsheet Data Lab
        </h1>
        <p class="text-slate-400 text-sm">
            Buat, edit, dan simpan data secara langsung seperti menggunakan spreadsheet. 
            Klik dua kali (double-click) pada sel untuk mulai mengetik.
        </p>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-wrap gap-3">
        <button id="addRowBtn"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-xl text-white font-bold text-sm transition-colors">
            ➕ Tambah Baris
        </button>

        <button id="downloadCsvBtn"
            class="px-4 py-2 bg-emerald-600 hover:bg-emerald-500 rounded-xl text-white font-bold text-sm transition-colors">
            ⬇️ Export CSV
        </button>

        <button id="sendSandboxBtn"
            class="px-4 py-2 bg-purple-600 hover:bg-purple-500 rounded-xl text-white font-bold text-sm transition-colors">
            🚀 Kirim ke Sandbox
        </button>
    </div>

    {{-- Spreadsheet Container --}}
    <div class="bg-white border border-slate-700 rounded-2xl p-4 overflow-x-auto text-slate-800 relative z-0">
        <div id="spreadsheet"></div>
    </div>

</div>

{{-- CSS Dependencies (Versi Community Edition - 100% Gratis) --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jspreadsheet-ce/dist/jspreadsheet.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsuites/dist/jsuites.min.css" type="text/css" />

{{-- JS Dependencies (Versi Community Edition - 100% Gratis) --}}
<script src="https://cdn.jsdelivr.net/npm/jspreadsheet-ce/dist/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsuites/dist/jsuites.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Data Dummy Default
    const initialData = [
        ['Titik A', 15, 25],
        ['Titik B', 20, 30],
        ['Titik C', 10, 15],
        ['Titik D', 35, 45],
        ['Titik E', 40, 50],
    ];

    // 2. Inisialisasi JSpreadsheet CE
    const table = jspreadsheet(document.getElementById('spreadsheet'), {
        data: initialData,
        columns: [
            { type: 'text', title: 'Nama Data', width: 150 },
            { type: 'numeric', title: 'Nilai X', width: 100 },
            { type: 'numeric', title: 'Nilai Y', width: 100 },
            { type: 'text', title: 'Kolom Z', width: 100 }, // Kolom kosong tambahan
        ],
        // Fitur ala Google Sheets
        minDimensions: [6, 20], // Otomatis membuat tabel ukuran 6 kolom x 20 baris
        tableOverflow: true,
        tableWidth: "100%",
        tableHeight: "450px",
        csvFileName: 'Dataset_VisualData_Lab', // Nama file default saat di-download
        allowInsertRow: true,
        allowInsertColumn: true,
        allowDeleteRow: true,
        allowDeleteColumn: true,
        wordWrap: true,
    });

    // 3. Logika Tombol Tambah Baris
    document.getElementById('addRowBtn').addEventListener('click', () => {
        table.insertRow(); 
    });

    // 4. Logika Tombol Export CSV
    document.getElementById('downloadCsvBtn').addEventListener('click', () => {
        // Mengunduh langsung dengan format CSV yang rapi
        table.download(true);
    });

    // 5. Logika Tombol Kirim ke Sandbox
    document.getElementById('sendSandboxBtn').addEventListener('click', () => {
        const currentData = table.getData();
        localStorage.setItem('spreadsheetData', JSON.stringify(currentData));
        window.location.href = '/sandbox';
    });
});
</script>

@endsection