@extends('layouts.app_learning')

@section('header', 'Buku Nilai Kelas')

@section('content')

<style>

    .table-wrapper{
        width:100%;
        max-width:100%;
        overflow-x:auto;
        overflow-y:visible;
        position:relative;
        isolation:isolate;
        -webkit-overflow-scrolling:touch;
    }

    .table-wrapper::-webkit-scrollbar{
        height:12px;
    }

    .table-wrapper::-webkit-scrollbar-track{
        background:#0f172a;
        border-radius:999px;
    }

    .table-wrapper::-webkit-scrollbar-thumb{
        background:#3b82f6;
        border-radius:999px;
        border:2px solid #0f172a;
    }

    .table-wrapper::-webkit-scrollbar-thumb:hover{
        background:#60a5fa;
    }

    .gradebook-table{
        position:relative;
        width:max-content;
        min-width:max-content;
        border-collapse:collapse;
    }

    .sticky-right-head{
        position:sticky;
        right:0;
        z-index:45;
        background:#0f172a;
        box-shadow:-6px 0 12px rgba(0,0,0,0.35);
    }

    .sticky-right-col{
        position:sticky;
        right:0;
        z-index:35;
        background:#1e293b;
        box-shadow:-6px 0 12px rgba(0,0,0,0.25);
    }

    @media print {

        header,
        .sidebar,
        #sidebar-overlay,
        .filter-section,
        button[onclick="window.print()"],
        .print-hidden{
            display:none !important;
        }

        body,
        .main-content,
        .app-layout{
            background:#fff !important;
            color:#000 !important;
            margin:0 !important;
            padding:0 !important;
        }

        .bg-slate-800,
        .bg-slate-900,
        .bg-slate-900\/50,
        .dark\:bg-gray-800{
            background:transparent !important;
            border:none !important;
            box-shadow:none !important;
        }

        .gradebook-table{
            width:100% !important;
            min-width:100% !important;
            border-collapse:collapse !important;
            margin-top:20px !important;
        }

        th,
        td{
            border:1px solid #000 !important;
            padding:8px !important;
            color:#000 !important;
            background:transparent !important;
            box-shadow:none !important;
        }

        th{
            background:#f3f4f6 !important;
            font-weight:bold !important;
            color:#000 !important;
            -webkit-print-color-adjust:exact !important;
        }

        *{
            border-radius:0 !important;
        }

        .print-header-doc{
            display:block !important;
            text-align:center;
            margin-bottom:20px;
            border-bottom:2px solid #000;
            padding-bottom:10px;
        }

        td img{
            display:none !important;
        }

    }

    .print-header-doc{
        display:none;
    }

</style>

<div class="space-y-6 print:space-y-0 w-full min-w-0"> <div class="print-header-doc">
        <h1 style="font-size: 24px; font-weight: bold; margin: 0;">REKAPITULASI NILAI EVALUASI SISWA</h1>
        <h2 style="font-size: 16px; margin: 5px 0 0 0;">Mata Pelajaran: Data Science / Visualisasi Data</h2>
        @if(request('kelas'))
            <h3 style="font-size: 14px; margin: 5px 0 0 0;">Kelas: {{ request('kelas') }}</h3>
        @endif
        <p style="font-size: 12px; margin: 5px 0 0 0;">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
    </div>

    <div class="print-hidden flex flex-col lg:flex-row justify-between items-center gap-4 bg-slate-800 p-5 rounded-2xl shadow-sm border border-slate-700 w-full min-w-0">
        <div>
            <h2 class="text-xl font-bold text-white">Buku Nilai (Gradebook) Lengkap</h2>
            <p class="text-sm text-slate-400">Geser tabel ke kanan <span class="text-blue-400 font-bold text-lg">(&rarr;)</span> untuk melihat riwayat Mini-Quiz dan Evaluasi.</p>
        </div>
        
        <div class="filter-section flex flex-col md:flex-row items-center gap-3 w-full lg:w-auto">
            
            {{-- FORM FILTER KELAS & GENDER (Digabung agar submit bersamaan) --}}
            <form method="GET" action="{{ route('teacher.gradebook') }}" class="w-full md:w-auto flex flex-col sm:flex-row gap-3 relative">
                
                {{-- Filter Kelas --}}
                <div class="relative w-full sm:w-36">
                    <select name="kelas" onchange="this.form.submit()" class="w-full pl-4 pr-10 py-2.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-blue-500 transition-all text-sm appearance-none cursor-pointer">
                        <option value="">Semua Kelas</option>
                        @if(isset($availableClasses))
                            @foreach($availableClasses as $kls)
                                <option value="{{ $kls }}" {{ request('kelas') == $kls ? 'selected' : '' }}>Kelas {{ $kls }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </div>
                </div>

                {{-- Filter Gender --}}
                <div class="relative w-full sm:w-40">
                    <select name="gender" onchange="this.form.submit()" class="w-full pl-4 pr-10 py-2.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-blue-500 transition-all text-sm appearance-none cursor-pointer">
                        <option value="">Semua Gender</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Laki-laki 👨</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Perempuan 👩</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </div>
                </div>
            </form>

            {{-- PENCARIAN NAMA --}}
            <div class="relative w-full md:w-56">
                <input type="text" id="searchInput" placeholder="Cari nama siswa..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all text-sm">
                <span class="absolute left-3 top-3 text-slate-400">🔍</span>
            </div>

            {{-- TOMBOL CETAK --}}
            <button onclick="window.print()" class="w-full md:w-auto p-2.5 bg-slate-700 hover:bg-slate-600 text-white rounded-xl transition-colors flex justify-center items-center gap-2" title="Cetak / PDF">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                <span class="md:hidden">Cetak PDF</span>
            </button>
        </div>
    </div>

    @php
        $columns = collect();
        
        // 1. Pre-Test Awal
        $preTest = $quizzes->where('type', 'pre_test')->first();
        if ($preTest) {
            $columns->push([
                'type' => 'quiz', 'id' => $preTest->id, 'title' => 'Pre-Test Awal', 'label' => 'Pre-Test',
                'color' => 'bg-indigo-500/20 text-indigo-400 border-indigo-500/30'
            ]);
        }

        // 2. Loop setiap Bab (Materi & Kuis dikembalikan)
        foreach($chapters as $chapter) {
            // Kita tetap SKIP Bab 0 (Peta & Apersepsi) agar tabel tidak nyampah
            if ($chapter->sequence == 0) {
                continue; 
            }

            $isFinal = ($chapter->sequence == 99);

            // A. Masukkan semua materi (Mini-Quiz)
            foreach($chapter->materials as $mat) {
                
                // 🛑 BLOKIR SIMULASI 3D AGAR TIDAK MASUK BUKU NILAI
                if (str_contains(strtolower($mat->title), 'simulasi')) {
                    continue; 
                }

                $columns->push([
                    'type' => 'material', 'id' => $mat->id, 'title' => $mat->title,
                    'label' => $isFinal ? 'Materi' : 'Materi Bab ' . $chapter->sequence,
                    'color' => 'bg-slate-700 text-slate-300 border-slate-600'
                ]);
            }

            // B. Masukkan kuis evaluasi bab
            $chapterQuizzes = $quizzes->where('chapter_id', $chapter->id)->whereNotIn('type', ['pre_test', 'post_test']);
            foreach($chapterQuizzes as $cQuiz) {
                $label = ($isFinal || $cQuiz->type == 'final') ? 'Evaluasi Akhir' : 'Evaluasi Bab ' . $chapter->sequence;
                $color = ($isFinal || $cQuiz->type == 'final') ? 'bg-purple-500/20 text-purple-400 border-purple-500/30' : 'bg-blue-500/20 text-blue-400 border-blue-500/30';
                
                $columns->push([
                    'type' => 'quiz', 'id' => $cQuiz->id, 'title' => $cQuiz->title, 'label' => $label, 'color' => $color
                ]);
            }
        }

        // 3. Post-Test Akhir
        $postTest = $quizzes->where('type', 'post_test')->first();
        if ($postTest) {
            $columns->push([
                'type' => 'quiz', 'id' => $postTest->id, 'title' => 'Post-Test Akhir', 'label' => 'Post-Test',
                'color' => 'bg-pink-500/20 text-pink-400 border-pink-500/30'
            ]);
        }
    @endphp

    {{-- KOTAK UTAMA (w-full min-w-0 adalah pelindung flexbox) --}}
    <div class="bg-slate-800 rounded-2xl shadow-sm border border-slate-700 print:border-none print:shadow-none w-full min-w-0 relative z-10">
        
        {{-- KONTANER BISA DI-SCROLL --}}
        <div class="table-wrapper block w-full overflow-x-auto overflow-y-visible">
            {{-- whitespace-nowrap sangat penting disini agar tabel tidak turun ke bawah --}}
            <table class="text-sm text-left border-collapse whitespace-nowrap min-w-max w-max">
                
                <thead class="bg-slate-900/80 text-xs uppercase font-bold text-slate-400 print:text-black">
                    <tr>
                        <th class="px-6 py-5 sticky left-0 bg-slate-900 z-30 border-b border-r border-slate-700 shadow-[4px_0_10px_-5px_rgba(0,0,0,0.3)] print:relative print:shadow-none print:border-black w-16">
                            No
                        </th>
                        <th class="px-6 py-5 sticky left-[64px] bg-slate-900 z-30 border-b border-r border-slate-700 shadow-[4px_0_10px_-5px_rgba(0,0,0,0.3)] print:relative print:shadow-none print:border-black min-w-[200px]">
                            Nama Siswa
                        </th>
                        <th class="px-4 py-5 sticky left-[264px] bg-slate-900 z-30 border-b border-r border-slate-700 shadow-[4px_0_10px_-5px_rgba(0,0,0,0.3)] print:relative print:shadow-none print:border-black text-center w-24">
                            Kelas
                        </th>
                        
                        @foreach($columns as $col)
                            <th class="px-4 py-5 text-center border-b border-slate-700 min-w-[140px] max-w-[160px] print:border-black">
                                <div class="flex flex-col items-center">
                                    <span class="text-[9px] {{ $col['color'] }} px-2 py-0.5 rounded uppercase tracking-widest mb-2 border print-hidden">
                                        {{ $col['label'] }}
                                    </span>
                                    <span title="{{ $col['title'] }}" class="text-slate-200 print:text-black font-semibold text-xs leading-tight whitespace-normal break-words text-center">
                                        {{ Str::limit(str_replace(['Konsep ', 'Simulasi: ', 'Persiapan Data: '], '', $col['title']), 30) }}
                                    </span>
                                </div>
                            </th>
                        @endforeach

                        <th class="sticky-right-head px-6 py-5 text-center border-b border-l border-slate-700 text-amber-400 min-w-[120px] print:bg-transparent print:border-black print:text-black print:shadow-none">
                            Rata-Rata
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700/50" id="gradeTableBody">
                    @forelse($students as $index => $student)
                        <tr class="hover:bg-slate-700/30 transition-colors group">
                            
                            <td class="px-6 py-4 sticky left-0 bg-slate-800 z-20 border-r border-slate-700 group-hover:bg-slate-750 print:relative print:border-black print:text-center">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-6 py-4 sticky left-[64px] bg-slate-800 z-20 border-r border-slate-700 group-hover:bg-slate-750 print:relative print:border-black">
                                <a href="{{ route('teacher.students.show', $student->id) }}" class="flex items-center gap-3 print:pointer-events-none text-white print:text-black">
                                    <img src="{{ $student->profile_photo_url }}" class="w-9 h-9 rounded-xl object-cover border border-slate-600 print-hidden">
                                    <div class="font-bold search-name">{{ $student->name }}</div>
                                </a>
                            </td>

                            <td class="px-4 py-4 sticky left-[264px] bg-slate-800 z-20 text-center border-r border-slate-700 group-hover:bg-slate-750 print:relative print:border-black text-slate-300 print:text-black">
                                <span class="bg-slate-900 border border-slate-600 px-2 py-1 rounded text-xs print:bg-transparent print:border-none">{{ $student->kelas ?? '-' }}</span>
                            </td>
                            
                            @php $totalScore = 0; $countItems = 0; @endphp
                            
                            @foreach($columns as $col)
                                @php
                                    $score = null;
                                    $isMaterialDone = false;

                                    if ($col['type'] == 'material') {
                                        // Cari data materi/mini-quiz di tabel UserProgress
                                        $progress = $student->progress->where('material_id', $col['id'])->first();
                                        if ($progress) {
                                            $score = $progress->score;
                                            $isMaterialDone = $progress->is_completed;
                                        }
                                    } else {
                                        // Cari nilai kuis di tabel QuizAttempts
                                        $attempt = $student->quizAttempts->where('quiz_id', $col['id'])->first();
                                        $score = $attempt ? $attempt->score : null;
                                    }
                                    
                                    // Hitung rata-rata hanya jika ada skor angka
                                    if($score !== null) { 
                                        $totalScore += $score; 
                                        $countItems++; 
                                    }
                                    
                                    $bgClass = 'bg-slate-700 text-slate-500 border-slate-600 print-badge-gray';
                                    $valText = '-';
                                    
                                    if ($score !== null) {
                                        $valText = $score;
                                        if ($score >= 70) {
                                            $bgClass = 'bg-emerald-500/20 text-emerald-400 font-bold border-emerald-500/30 print-badge-green';
                                        } else {
                                            $bgClass = 'bg-red-500/20 text-red-400 font-bold border-red-500/30 print-badge-red';
                                        }
                                    } elseif ($isMaterialDone) {
                                        // Untuk materi yang diselesaikan tanpa skor angka (hanya bacaan/simulasi)
                                        $valText = '✓';
                                        $bgClass = 'bg-blue-500/20 text-blue-400 font-bold border-blue-500/30 print-badge-green';
                                    }
                                @endphp
                                <td class="px-4 py-4 text-center border-slate-700 print:border-black border-r border-dashed">
                                    <span class="inline-block w-12 py-1.5 rounded-lg text-xs border {{ $bgClass }}">
                                        {{ $valText }}
                                    </span>
                                </td>
                            @endforeach
                            
                            @php 
                                $avg = $countItems > 0 ? round($totalScore / $countItems, 1) : 0;
                                $avgColor = $avg >= 70 ? 'text-emerald-400' : ($avg > 0 ? 'text-red-400' : 'text-slate-500');
                            @endphp
                            <td class="sticky-right-col px-6 py-4 text-center border-l border-slate-700 font-mono font-bold text-base {{ $avgColor }} print:bg-transparent print:border-black print:text-black print:shadow-none">
                                {{ $avg > 0 ? $avg : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="px-6 py-12 text-center text-slate-500 italic print:border-black print:text-black">
                                Belum ada siswa yang terdaftar, atau tidak ada siswa di kelas ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>
    
    <div class="print-hidden bg-slate-900 p-4 rounded-xl border border-slate-700 flex flex-wrap justify-between items-center text-xs text-slate-400 shadow-sm w-full min-w-0">
        <div class="flex flex-wrap gap-5 mb-2 sm:mb-0">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-emerald-500/20 border border-emerald-500/30"></span> Lulus (≥70)</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-red-500/20 border border-red-500/30"></span> Perlu Perbaikan (&lt;70)</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-blue-500/20 border border-blue-500/30"></span> Selesai (Materi)</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-slate-700 border border-slate-600"></span> Belum Dikerjakan</div>
        </div>
        <div class="italic text-[10px]">
            *Nilai yang ditampilkan adalah nilai tertinggi yang dicapai siswa pada masing-masing ujian. Rata-rata dihitung dari kuis bernilai angka.
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#gradeTableBody tr');
        rows.forEach(row => {
            let nameElement = row.querySelector('.search-name');
            if (nameElement) {
                let name = nameElement.textContent.toLowerCase();
                row.style.display = name.includes(filter) ? '' : 'none';
            }
        });
    });
</script>
@endsection