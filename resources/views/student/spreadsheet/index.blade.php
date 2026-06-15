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
            Data yang dibuat dapat digunakan pada Sandbox Data untuk visualisasi dan K-Means Clustering.
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
    {{-- Diubah menjadi bg-white agar JSpreadsheet bisa terbaca dengan jelas --}}
    <div class="bg-white border border-slate-700 rounded-2xl p-4 overflow-x-auto text-slate-800">
        <div id="spreadsheet"></div>
    </div>

</div>

{{-- CSS Dependencies --}}
<link rel="stylesheet" href="https://jspreadsheet.com/v4/jspreadsheet.css" type="text/css" />
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

{{-- JS Dependencies --}}
<script src="https://jspreadsheet.com/v4/jspreadsheet.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Data Dummy Default (Bekal awal agar tabel tidak kosong)
    const initialData = [
        ['Titik A', 15, 25],
        ['Titik B', 20, 30],
        ['Titik C', 10, 15],
        ['Titik D', 35, 45],
        ['Titik E', 40, 50],
    ];

    // 2. Inisialisasi JSpreadsheet ke dalam div #spreadsheet
    const table = jspreadsheet(document.getElementById('spreadsheet'), {
        data: initialData,
        columns: [
            { type: 'text', title: 'Nama Data', width: 150 },
            { type: 'numeric', title: 'Nilai X', width: 100 },
            { type: 'numeric', title: 'Nilai Y', width: 100 },
        ],
        tableOverflow: true,
        tableWidth: "100%",
        tableHeight: "350px",
    });

    // 3. Logika Tombol Tambah Baris
    document.getElementById('addRowBtn').addEventListener('click', () => {
        table.insertRow(); // Sekarang fungsi ini tahu 'table' itu apa
    });

    // 4. Logika Tombol Export CSV
    document.getElementById('downloadCsvBtn').addEventListener('click', () => {
        table.download();
    });

    // 5. Logika Tombol Kirim ke Sandbox
    document.getElementById('sendSandboxBtn').addEventListener('click', () => {
        // Ambil semua data dari tabel yang baru diedit siswa
        const currentData = table.getData();

        // Simpan ke memori browser
        localStorage.setItem('spreadsheetData', JSON.stringify(currentData));

        // Pindahkan halaman ke rute sandbox K-Means (Pastikan rute '/sandbox' sudah kamu buat)
        window.location.href = '/sandbox';
    });
});
</script>

@endsection