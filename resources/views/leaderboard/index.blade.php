@extends('layouts.app_learning')

@section('header', 'Papan Peringkat')

@section('content')
    <div class="max-w-5xl mx-auto">
        
        {{-- Header & Judul --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-gray-900 dark:text-white mb-2 flex justify-center items-center gap-2">
                <span class="text-yellow-500">🏆</span> Hall of Fame
            </h1>
            <p class="text-gray-500 dark:text-gray-400">Lihat siapa penguasa data sesungguhnya!</p>
        </div>

        {{-- NAVIGATION TABS (SCROLLABLE) --}}
        <div class="mb-8 overflow-x-auto pb-2">
            <div class="flex gap-2 min-w-max px-2">
                {{-- Tab XP (Default) --}}
                <a href="{{ route('leaderboard.index', ['filter' => 'xp']) }}" 
                   class="px-5 py-2.5 rounded-full font-bold text-sm transition-all border
                   {{ $filter == 'xp' 
                       ? 'bg-indigo-600 text-white border-indigo-600 shadow-lg shadow-indigo-500/30' 
                       : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                   ⭐ Top XP
                </a>

                {{-- Tab Level --}}
                <a href="{{ route('leaderboard.index', ['filter' => 'level']) }}" 
                   class="px-5 py-2.5 rounded-full font-bold text-sm transition-all border
                   {{ $filter == 'level' 
                       ? 'bg-blue-600 text-white border-blue-600 shadow-lg shadow-blue-500/30' 
                       : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                   📊 Top Level
                </a>

                {{-- Tab Progress (BARU DITAMBAHKAN) --}}
                <a href="{{ route('leaderboard.index', ['filter' => 'progress']) }}" 
                   class="px-5 py-2.5 rounded-full font-bold text-sm transition-all border
                   {{ $filter == 'progress' 
                       ? 'bg-pink-600 text-white border-pink-600 shadow-lg shadow-pink-500/30' 
                       : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                   🚀 Paling Rajin
                </a>

                {{-- Tab Per Kuis (Looping) --}}
                @foreach($quizzes as $quiz)
                    <a href="{{ route('leaderboard.index', ['filter' => 'quiz_' . $quiz->id]) }}" 
                       class="px-5 py-2.5 rounded-full font-bold text-sm transition-all border flex items-center gap-2
                       {{ $filter == 'quiz_' . $quiz->id 
                           ? 'bg-emerald-600 text-white border-emerald-600 shadow-lg shadow-emerald-500/30' 
                           : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                       <span>📝</span>
                       {{-- Persingkat Judul Kuis --}}
                       {{ Str::limit(str_replace(['Evaluasi Akhir ', 'Ujian Sertifikasi '], '', $quiz->title), 15) }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- MY RANK CARD --}}
        <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-6 mb-8 text-white flex items-center justify-between shadow-xl relative overflow-hidden border border-gray-700">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-3xl -mr-10 -mt-10"></div>
            
            <div class="flex items-center gap-4 relative z-10">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-2xl font-bold border-2 border-white/20 shadow-inner">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-1">Posisi Kamu</div>
                    <div class="text-2xl font-black tracking-tight">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-300">
                        {{ $metricUnit }}: <span class="text-yellow-400 font-mono text-lg">{{ $myMetricValue }}</span>
                    </div>
                </div>
            </div>
            
            <div class="text-right relative z-10">
                <div class="text-5xl font-black italic text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-500">
                    #{{ $myRank }}
                </div>
                <div class="text-xs text-gray-400 font-bold uppercase mt-1">Peringkat</div>
            </div>
        </div>

        {{-- LEADERBOARD TABLE --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            
            {{-- Table Header --}}
            <div class="grid grid-cols-12 gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                <div class="col-span-2 md:col-span-1 text-center">Rank</div>
                <div class="col-span-7 md:col-span-8">Ranger</div>
                <div class="col-span-3 text-right">{{ $metricUnit }}</div>
            </div>

            {{-- Table Body --}}
            @forelse($leaders as $index => $leader)
                @php 
                    $rank = $index + 1;
                    $isMe = $leader->id == Auth::id();
                    
                    // Style Baris
                    $rowClass = "border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors";
                    
                    // Ikon Juara
                    $rankIcon = "#" . $rank;
                    $rankColor = "text-gray-500 dark:text-gray-400 font-mono";
                    
                    if($rank == 1) {
                        $rankIcon = "👑"; 
                        $rankColor = "text-yellow-500 text-2xl scale-110";
                        $rowClass .= " bg-yellow-50/40 dark:bg-yellow-900/10";
                    } elseif($rank == 2) {
                        $rankIcon = "🥈";
                        $rankColor = "text-gray-400 text-xl";
                    } elseif($rank == 3) {
                        $rankIcon = "🥉";
                        $rankColor = "text-orange-400 text-xl";
                    }
                @endphp

                <div class="grid grid-cols-12 gap-4 p-4 items-center {{ $rowClass }} {{ $isMe ? 'bg-indigo-50 dark:bg-indigo-900/20 ring-1 ring-indigo-500/30 z-10 relative' : '' }}">
                    
                    {{-- Kolom Rank --}}
                    <div class="col-span-2 md:col-span-1 text-center font-black {{ $rankColor }}">
                        {{ $rankIcon }}
                    </div>

                    {{-- Kolom Nama --}}
                    <div class="col-span-7 md:col-span-8 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center font-bold text-gray-600 dark:text-gray-300 text-sm border border-gray-200 dark:border-gray-600">
                            {{ substr($leader->name, 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <div class="font-bold text-gray-900 dark:text-white truncate flex items-center gap-2">
                                {{ $leader->name }}
                                @if($isMe)
                                    <span class="hidden md:inline-block text-[10px] bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300 font-bold">YOU</span>
                                @endif
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                {{ $leader->rank_label }} • Lvl {{ $leader->level }}
                            </div>
                        </div>
                    </div>

                    {{-- Kolom Nilai/XP --}}
                    <div class="col-span-3 text-right font-mono font-bold text-indigo-600 dark:text-indigo-400 text-lg">
                        {{ number_format($leader->$metricKey) }}
                    </div>

                </div>
            @empty
                <div class="p-10 text-center text-gray-500 dark:text-gray-400">
                    <p class="mb-2 text-2xl">🍃</p>
                    <p>Belum ada data untuk kategori ini.</p>
                </div>
            @endforelse

        </div>
    </div>
@endsection