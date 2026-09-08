@extends('layouts.app_learning')

@section('header', 'Buku Nilai Kelas')

@section('content')

<style>
    .table-wrapper {
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: visible;
        position: relative;
        isolation: isolate;
        -webkit-overflow-scrolling: touch;
    }

    .table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .table-wrapper::-webkit-scrollbar-track {
        background: #f5f5f7;
        border-radius: 999px;
    }

    .table-wrapper::-webkit-scrollbar-thumb {
        background: #d2d2d7;
        border-radius: 999px;
    }

    .table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #b0b0b5;
    }

    .gradebook-table {
        position: relative;
        width: max-content;
        min-width: max-content;
        border-collapse: separate;
        border-spacing: 0;
    }

    .sticky-right-head {
        position: sticky;
        right: 0;
        z-index: 45;
        background: #f5f5f7;
        box-shadow: -4px 0 8px rgba(0, 0, 0, 0.04);
    }

    .sticky-right-col {
        position: sticky;
        right: 0;
        z-index: 35;
        background: #ffffff;
        box-shadow: -4px 0 8px rgba(0, 0, 0, 0.04);
    }

    /* =========================================================
       PERBAIKAN CSS KHUSUS CETAK / EXPORT PDF (LANDSCAPE PRESISI)
       ========================================================= */
    @media print {
        @page {
            size: landscape;
            margin: 5mm;
        }

        header,
        .sidebar,
        #sidebar-overlay,
        .filter-section,
        button[onclick="window.print()"],
        .print-hidden {
            display: none !important;
        }

        body,
        .main-content,
        .app-layout {
            background: #ffffff !important;
            color: #000000 !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        .table-wrapper {
            overflow: visible !important;
            width: 100% !important;
        }

        table {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
            table-layout: auto !important;
            border-collapse: collapse !important;
            margin-top: 6px !important;
        }

        /* Reset posisi sticky dan ukuran minimum Tailwind untuk cetak */
        th, td, .sticky-right-head, .sticky-right-col {
            position: static !important;
            box-shadow: none !important;
            background: transparent !important;
            min-width: 0 !important;
            max-width: none !important;
        }

        th, td {
            border: 1px solid #333333 !important;
            padding: 3px 2px !important;
            color: #000000 !important;
            font-size: 7.5pt !important;
            line-height: 1.15 !important;
            text-align: center !important;
            vertical-align: middle !important;
            word-break: break-word !important;
            overflow-wrap: break-word !important;
            white-space: normal !important;
        }

        th {
            background: #f0f0f0 !important;
            font-weight: bold !important;
            -webkit-print-color-adjust: exact !important;
        }

        /* Penyesuaian Lebar Kolom Proposional untuk Cetak */
        th:nth-child(1), td:nth-child(1) { width: 22px !important; } /* No */
        th:nth-child(2), td:nth-child(2) { width: 110px !important; text-align: left !important; } /* Nama Siswa */
        th:nth-child(3), td:nth-child(3) { width: 35px !important; } /* Kelas */

        /* Menampilkan angka nilai secara bersih tanpa kotak badge tebal */
        td span {
            border: none !important;
            background: transparent !important;
            font-size: 8pt !important;
            padding: 0 !important;
            width: auto !important;
            display: inline !important;
        }

        .print-header-doc {
            display: block !important;
            text-align: center;
            margin-bottom: 6px;
            border-bottom: 2px solid #000;
            padding-bottom: 4px;
        }

        td img {
            display: none !important;
        }
    }

    .print-header-doc {
        display: none;
    }
</style>

<div class="space-y-6 print:space-y-0 w-full min-w-0 font-sans">
    
    {{-- DOKUMEN HEADER KETIKA DICETAK --}}
    <div class="print-header-doc">
        <h1 style="font-size: 20px; font-weight: bold; margin: 0; color: #000;">REKAPITULASI NILAI EVALUASI SISWA</h1>
        <h2 style="font-size: 14px; margin: 4px 0 0 0; color: #333;">Mata Pelajaran: Data Science / Visualisasi Data</h2>
        @if(request('kelas'))
            <h3 style="font-size: 13px; margin: 4px 0 0 0; color: #333;">Kelas: {{ request('kelas') }}</h3>
        @endif
        <p style="font-size: 11px; margin: 4px 0 0 0; color: #666;">Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d M Y') }}</p>
    </div>

    {{-- TOOLBAR KONTROL (FILTER & PENCARIAN) --}}
    <div class="print-hidden flex flex-col lg:flex-row justify-between items-center gap-4 bg-white p-5 rounded-2xl border border-[#e0e0e0] shadow-sm w-full min-w-0">
        <div>
            <h2 class="text-lg font-bold text-[#1d1d1f]">Buku Nilai (Gradebook) Lengkap</h2>
            <p class="text-xs text-[#7a7a7a] flex items-center gap-1 mt-0.5">
                <span>Geser tabel ke kanan</span>
                <svg class="w-3.5 h-3.5 text-[#0066cc]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                <span>untuk melihat riwayat evaluasi lengkap.</span>
            </p>
        </div>
        
        <div class="filter-section flex flex-col md:flex-row items-center gap-3 w-full lg:w-auto">
            
            {{-- FORM FILTER KELAS & GENDER --}}
            <form method="GET" action="{{ route('teacher.gradebook') }}" class="w-full md:w-auto flex flex-col sm:flex-row gap-2.5 relative">
                
                {{-- Filter Kelas --}}
                <div class="relative w-full sm:w-36">
                    <select name="kelas" onchange="this.form.submit()" class="w-full pl-3.5 pr-8 py-2.5 rounded-xl border border-[#e0e0e0] bg-[#f5f5f7] text-[#1d1d1f] focus:bg-white focus:ring-2 focus:ring-[#0066cc]/20 focus:border-[#0066cc] transition-all text-xs font-semibold appearance-none cursor-pointer outline-none">
                        <option value="">Semua Kelas</option>
                        @if(isset($availableClasses))
                            @foreach($availableClasses as $kls)
                                <option value="{{ $kls }}" {{ request('kelas') == $kls ? 'selected' : '' }}>Kelas {{ $kls }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2.5 pointer-events-none text-[#86868b]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                {{-- Filter Gender --}}
                <div class="relative w-full sm:w-40">
                    <select name="gender" onchange="this.form.submit()" class="w-full pl-3.5 pr-8 py-2.5 rounded-xl border border-[#e0e0e0] bg-[#f5f5f7] text-[#1d1d1f] focus:bg-white focus:ring-2 focus:ring-[#0066cc]/20 focus:border-[#0066cc] transition-all text-xs font-semibold appearance-none cursor-pointer outline-none">
                        <option value="">Semua Gender</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2.5 pointer-events-none text-[#86868b]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </form>

            {{-- PENCARIAN NAMA --}}
            <div class="relative w-full md:w-52">
                <input type="text" id="searchInput" placeholder="Cari nama siswa..." class="w-full pl-9 pr-3.5 py-2.5 rounded-xl border border-[#e0e0e0] bg-[#f5f5f7] text-[#1d1d1f] focus:bg-white focus:ring-2 focus:ring-[#0066cc]/20 focus:border-[#0066cc] transition-all text-xs placeholder-[#86868b] outline-none">
                <span class="absolute left-3 top-3 text-[#86868b]">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
            </div>

            {{-- TOMBOL CETAK --}}
            <button onclick="window.print()" class="w-full md:w-auto px-4 py-2.5 bg-[#f5f5f7] hover:bg-[#e0e0e0] text-[#1d1d1f] rounded-xl transition-colors flex justify-center items-center gap-2 border border-[#e0e0e0] text-xs font-semibold cursor-pointer" title="Cetak Rekap PDF">
                <svg class="w-4 h-4 text-[#1d1d1f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                <span>Cetak / PDF</span>
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
                'color' => 'bg-indigo-50 text-indigo-700 border-indigo-200'
            ]);
        }

        // 2. Loop Bab Pembelajaran
        foreach($chapters as $chapter) {
            if ($chapter->sequence == 0) {
                continue; 
            }

            $isFinal = ($chapter->sequence == 99);

            // A. Masukkan Materi (Mini-Quiz)
            foreach($chapter->materials as $mat) {
                if (str_contains(strtolower($mat->title), 'simulasi')) {
                    continue; 
                }

                $columns->push([
                    'type' => 'material', 'id' => $mat->id, 'title' => $mat->title,
                    'label' => $isFinal ? 'Materi' : 'Materi Bab ' . $chapter->sequence,
                    'color' => 'bg-[#f5f5f7] text-[#424245] border-[#e0e0e0]'
                ]);
            }

            // B. Masukkan Kuis Evaluasi Bab
            $chapterQuizzes = $quizzes->where('chapter_id', $chapter->id)->whereNotIn('type', ['pre_test', 'post_test']);
            foreach($chapterQuizzes as $cQuiz) {
                $label = ($isFinal || $cQuiz->type == 'final') ? 'Evaluasi Akhir' : 'Evaluasi Bab ' . $chapter->sequence;
                $color = ($isFinal || $cQuiz->type == 'final') ? 'bg-purple-50 text-purple-700 border-purple-200' : 'bg-blue-50 text-[#0066cc] border-blue-200';
                
                $columns->push([
                    'type' => 'quiz', 'id' => $cQuiz->id, 'title' => $cQuiz->title, 'label' => $label, 'color' => $color
                ]);
            }
        }

        // 3. Post-Test Akhir
        $postTest = $quizzes->where('type', 'post_test')->first();
        if ($postTest) {
            $columns->push([
                'type' => 'quiz', 'id' => $postTest->id, 'title' => $postTest->title ?? 'Post-Test Akhir', 'label' => 'Post-Test',
                'color' => 'bg-pink-50 text-pink-700 border-pink-200'
            ]);
        }
    @endphp

    {{-- KOTAK TABEL UTAMA --}}
    <div class="bg-white rounded-2xl border border-[#e0e0e0] shadow-sm print:border-none print:shadow-none w-full min-w-0 relative z-10 overflow-hidden">
        
        <div class="table-wrapper block w-full overflow-x-auto overflow-y-visible">
            <table class="text-sm text-left border-collapse whitespace-nowrap min-w-max w-max">
                
                <thead class="bg-[#f5f5f7] text-[11px] uppercase font-bold text-[#7a7a7a] print:text-black border-b border-[#e0e0e0]">
                    <tr>
                        <th class="px-4 py-4 sticky left-0 bg-[#f5f5f7] z-30 border-b border-r border-[#e0e0e0] shadow-[2px_0_5px_rgba(0,0,0,0.02)] print:relative print:shadow-none print:border-black w-14 text-center">
                            No
                        </th>
                        <th class="px-5 py-4 sticky left-[56px] bg-[#f5f5f7] z-30 border-b border-r border-[#e0e0e0] shadow-[2px_0_5px_rgba(0,0,0,0.02)] print:relative print:shadow-none print:border-black min-w-[200px]">
                            Nama Siswa
                        </th>
                        <th class="px-4 py-4 sticky left-[256px] bg-[#f5f5f7] z-30 border-b border-r border-[#e0e0e0] shadow-[2px_0_5px_rgba(0,0,0,0.02)] print:relative print:shadow-none print:border-black text-center w-24">
                            Kelas
                        </th>
                        
                        @foreach($columns as $col)
                            <th class="px-4 py-4 text-center border-b border-[#e0e0e0] min-w-[140px] max-w-[160px] print:border-black">
                                <div class="flex flex-col items-center">
                                    <span class="text-[9px] {{ $col['color'] }} px-2 py-0.5 rounded-md uppercase tracking-wider mb-1.5 border print-hidden font-bold">
                                        {{ $col['label'] }}
                                    </span>
                                    <span title="{{ $col['title'] }}" class="text-[#1d1d1f] print:text-black font-semibold text-xs leading-tight whitespace-normal break-words text-center">
                                        {{ Str::limit(str_replace(['Konsep ', 'Simulasi: ', 'Persiapan Data: '], '', $col['title']), 28) }}
                                    </span>
                                </div>
                            </th>
                        @endforeach

                        <th class="sticky-right-head px-6 py-4 text-center border-b border-l border-[#e0e0e0] text-[#0066cc] font-extrabold min-w-[120px] print:bg-transparent print:border-black print:text-black print:shadow-none">
                            Rata-Rata
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#f0f0f0]" id="gradeTableBody">
                    @forelse($students as $index => $student)
                        <tr class="hover:bg-[#f5f5f7]/60 transition-colors group">
                            
                            <td class="px-4 py-3.5 sticky left-0 bg-white group-hover:bg-[#fafafc] z-20 border-r border-[#e0e0e0] print:relative print:border-black text-center text-xs font-semibold text-[#7a7a7a]">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-5 py-3.5 sticky left-[56px] bg-white group-hover:bg-[#fafafc] z-20 border-r border-[#e0e0e0] print:relative print:border-black">
                                <a href="{{ route('teacher.students.show', $student->id) }}" class="flex items-center gap-3 print:pointer-events-none text-[#1d1d1f] hover:text-[#0066cc] transition-colors text-decoration-none">
                                    <img src="{{ $student->profile_photo_url }}" class="w-8 h-8 rounded-xl object-cover border border-[#e0e0e0] bg-[#f5f5f7] print-hidden">
                                    <div class="font-bold text-sm search-name">{{ $student->name }}</div>
                                </a>
                            </td>

                            <td class="px-4 py-3.5 sticky left-[256px] bg-white group-hover:bg-[#fafafc] z-20 text-center border-r border-[#e0e0e0] print:relative print:border-black">
                                <span class="bg-[#f5f5f7] border border-[#e0e0e0] px-2 py-0.5 rounded-md text-xs font-semibold text-[#424245] print:bg-transparent print:border-none">
                                    {{ $student->kelas ?? '-' }}
                                </span>
                            </td>
                            
                            @php $totalScore = 0; $countItems = 0; @endphp
                            
                            @foreach($columns as $col)
                                @php
                                    $score = null;
                                    $isMaterialDone = false;

                                    if ($col['type'] == 'material') {
                                        $progress = $student->progress->where('material_id', $col['id'])->first();
                                        if ($progress) {
                                            $score = $progress->score;
                                            $isMaterialDone = $progress->is_completed;
                                        }
                                    } else {
                                        $attempt = $student->quizAttempts->where('quiz_id', $col['id'])->first();
                                        $score = $attempt ? $attempt->score : null;
                                    }
                                    
                                    if($score !== null) { 
                                        $totalScore += $score; 
                                        $countItems++; 
                                    }
                                    
                                    $bgClass = 'bg-[#f5f5f7] text-[#86868b] border-[#e0e0e0]';
                                    $valText = '-';
                                    
                                    if ($score !== null) {
                                        $valText = $score;
                                        if ($score >= 70) {
                                            $bgClass = 'bg-emerald-50 text-emerald-700 font-bold border-emerald-200';
                                        } else {
                                            $bgClass = 'bg-red-50 text-red-600 font-bold border-red-200';
                                        }
                                    } elseif ($isMaterialDone) {
                                        $valText = '✓';
                                        $bgClass = 'bg-blue-50 text-[#0066cc] font-bold border-blue-200';
                                    }
                                @endphp
                                <td class="px-4 py-3.5 text-center border-[#e0e0e0] print:border-black border-r border-dashed">
                                    <span class="inline-block w-11 py-1 rounded-lg text-xs border {{ $bgClass }}">
                                        {{ $valText }}
                                    </span>
                                </td>
                            @endforeach
                            
                            @php 
                                $avg = $countItems > 0 ? round($totalScore / $countItems, 1) : 0;
                                $avgColor = $avg >= 70 ? 'text-emerald-600' : ($avg > 0 ? 'text-red-600' : 'text-[#86868b]');
                            @endphp
                            <td class="sticky-right-col px-6 py-3.5 text-center border-l border-[#e0e0e0] font-mono font-black text-sm {{ $avgColor }} print:bg-transparent print:border-black print:text-black print:shadow-none">
                                {{ $avg > 0 ? $avg : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="px-6 py-12 text-center text-[#7a7a7a] italic text-xs print:border-black print:text-black">
                                Belum ada siswa yang terdaftar, atau tidak ada siswa di kelas ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    {{-- PETUNJUK WARNA (LEGEND) --}}
    <div class="print-hidden bg-white p-4 rounded-2xl border border-[#e0e0e0] flex flex-wrap justify-between items-center text-xs text-[#7a7a7a] shadow-sm w-full min-w-0">
        <div class="flex flex-wrap gap-5 mb-2 sm:mb-0">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-emerald-50 border border-emerald-200 inline-block"></span> Lulus (≥70)</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-red-50 border border-red-200 inline-block"></span> Perlu Perbaikan (&lt;70)</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-blue-50 border border-blue-200 inline-block"></span> Selesai (Materi)</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded bg-[#f5f5f7] border border-[#e0e0e0] inline-block"></span> Belum Dikerjakan</div>
        </div>
        <div class="italic text-[10px] text-[#86868b]">
            *Nilai yang ditampilkan merupakan capaian tertinggi siswa. Rata-rata dihitung dari kuis bernilai angka.
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