<aside id="main-sidebar" class="sidebar fixed top-0 left-0 z-40 w-[280px] h-screen transition-transform -translate-x-full md:translate-x-0 flex flex-col">
    
    <div class="flex-1 px-4 py-6 overflow-y-auto custom-scrollbar flex flex-col h-full">
        
        <div class="flex items-center justify-between mb-8 px-2">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-eduPrimary rounded-lg flex items-center justify-center text-eduDark font-bold text-xl">V</div>
                <span class="text-xl font-bold tracking-wide text-eduPrimaryHover">
                    Visual<span class="text-eduPrimary">Data.</span>
                </span>
            </div>
            <button id="sidebar-close" class="md:hidden text-eduPrimaryHover hover:text-eduPrimary">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="mb-8 p-4 bg-white/50 rounded-2xl border border-borderLight flex items-center gap-3">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-xl object-cover border border-borderLight">
            <div class="overflow-hidden">
                <div class="text-sm font-bold text-eduPrimaryHover truncate">{{ Auth::user()->name }}</div>
                <div class="text-[10px] text-eduPrimary font-bold uppercase tracking-wider">Siswa / Pelajar</div>
            </div>
        </div>

        @php
            $sidebarPreTest = \App\Models\Quiz::where('type', 'pre_test')->first();
            $sidebarHasDonePreTest = false;

            if ($sidebarPreTest) {
                $sidebarHasDonePreTest = \App\Models\UserProgress::where('user_id', Auth::id())
                                        ->where('quiz_id', $sidebarPreTest->id)
                                        ->exists();
            } else {
                $sidebarHasDonePreTest = true; 
            }
        @endphp

        <nav class="space-y-1.5 font-medium flex-1">
            
            <a id="sidebar-dashboard" href="{{ route('dashboard') }}" 
               class="nav-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 text-eduPrimary hover:text-eduPrimaryHover hover:bg-white/50 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="text-xl opacity-80">📊</span>
                <span class="ms-3 text-sm">Dashboard</span>
            </a>

            @if(!$sidebarHasDonePreTest && isset($globalChapters))
                <div class="px-4 py-5 mt-6 text-center bg-red-50 rounded-2xl border border-red-200 mb-2">
                    <span class="text-3xl mb-2 block">🚫</span>
                    <p class="text-xs text-red-600 font-bold leading-relaxed">Kembali ke Dashboard & Selesaikan Pre-Test untuk membuka materi!</p>
                </div>

                <div class="mt-4 opacity-40 filter blur-[1px] pointer-events-none select-none">
                    @foreach($globalChapters as $chapter)
                        <div class="w-full flex items-center justify-between mt-6 mb-2 px-4 text-[11px] font-bold text-eduPrimaryHover uppercase tracking-wider">
                            <span>
                                @if($chapter->sequence == 0)
                                    Pengantar
                                @elseif($chapter->sequence == 99)
                                    Penilaian Akhir
                                @else
                                    Bab {{ $chapter->sequence }}
                                @endif
                            </span>
                        </div>
                        <div class="space-y-1">
                            @foreach($chapter->materials as $mat)
                                <div class="flex items-center px-4 py-3 rounded-xl text-eduPrimaryHover bg-white/30">
                                    <span class="text-lg opacity-50">🔒</span>
                                    <span class="ms-3 text-sm truncate">{{ $mat->title }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            @elseif($sidebarHasDonePreTest && isset($globalChapters))
                <div id="sidebar-chapters" class="mt-4"> 
                    @php $isUnlocked = true; @endphp
                    @foreach($globalChapters as $chapter)
                        
                        <button class="chapter-toggle w-full flex items-center justify-between mt-6 mb-2 px-4 text-[11px] font-bold text-eduPrimaryHover hover:text-eduPrimary uppercase tracking-wider transition-colors cursor-pointer" data-target="chapter-content-{{ $chapter->id }}">
                            <span>
                                @if($chapter->sequence == 0)
                                    Pengantar
                                @elseif($chapter->sequence == 99)
                                    Penilaian Akhir
                                @else
                                    Bab {{ $chapter->sequence }}
                                @endif
                            </span>
                            <svg class="chevron-icon w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div id="chapter-content-{{ $chapter->id }}" class="chapter-content hidden space-y-1">
                            @foreach($chapter->materials as $material)
                                @php 
                                    $isDone = \App\Models\UserProgress::where('user_id', Auth::id())->where('material_id', $material->id)->exists();
                                @endphp
                                
                                @if($isUnlocked)
                                    <a href="{{ route('learning.show', $material->slug) }}"
                                       class="nav-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 text-eduPrimary hover:text-eduPrimaryHover hover:bg-white/50 {{ request()->is('belajar/'.$material->slug) ? 'active' : '' }}">
                                        <span class="text-lg opacity-80">{{ $material->type == 'simulation_3d' ? '🧊' : '📄' }}</span> 
                                        <span class="ms-3 text-sm truncate">{{ $material->title }}</span>
                                        @if($isDone) <span class="ml-auto text-eduPrimary text-xs font-bold">✓</span> @endif
                                    </a>
                                    @php if (!$isDone) { $isUnlocked = false; } @endphp
                                @else
                                    <div class="locked-item nav-item flex items-center px-4 py-3 rounded-xl text-eduPrimary/60 bg-white/30 cursor-not-allowed select-none"
                                         data-syarat="• Selesaikan materi sebelumnya terlebih dahulu untuk membuka materi ini.">
                                        <span class="text-lg opacity-50">🔒</span> 
                                        <span class="ms-3 text-sm truncate">{{ $material->title }}</span>
                                    </div>
                                    @php $isUnlocked = false; @endphp
                                @endif
                            @endforeach
                            
                            @foreach($chapter->quizzes as $quiz)
                                @php 
                                    $isQuizDone = \App\Models\UserProgress::where('user_id', Auth::id())->where('quiz_id', $quiz->id)->exists(); 
                                @endphp
                                 @if($isUnlocked)
                                    <a href="{{ route('quiz.show', $quiz->id) }}" 
                                       class="nav-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 text-eduPrimary hover:text-eduPrimaryHover hover:bg-white/50 {{ request()->routeIs('quiz.show') && request()->route('id') == $quiz->id ? 'active' : '' }}">
                                        <span class="text-lg opacity-80">📝</span> 
                                        <span class="ms-3 text-sm truncate">{{ $quiz->title }}</span>
                                        @if($isQuizDone) <span class="ml-auto text-eduPrimary text-xs font-bold">✓</span> @endif
                                    </a>
                                @else
                                    <div class="locked-item nav-item flex items-center px-4 py-3 rounded-xl text-eduPrimary/60 bg-white/30 cursor-not-allowed select-none"
                                         data-syarat="• Selesaikan semua materi di bab ini terlebih dahulu untuk membuka evaluasi.">
                                        <span class="text-lg opacity-50">🔒</span> 
                                        <span class="ms-3 text-sm truncate">{{ $quiz->title }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div> 
                    @endforeach
                </div>
            @endif

            <div class="mt-6 mb-4 px-4 border-t border-borderLight"></div>

            @if($sidebarHasDonePreTest)
                <a href="{{ route('sandbox') }}" 
                   class="nav-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 text-eduPrimary hover:text-eduPrimaryHover hover:bg-white/50 {{ request()->routeIs('sandbox') ? 'active' : '' }}">
                    <span class="text-xl opacity-80"></span>
                    <span class="ms-3 text-sm">Sandbox Data</span>
                    <span class="ml-auto bg-eduPrimary text-eduDark text-[9px] px-2 py-0.5 rounded uppercase font-bold tracking-wider"></span>
                </a>
            @else
                <div class="nav-item flex items-center px-4 py-3 rounded-xl text-eduPrimary/60 bg-white/30 cursor-not-allowed select-none">
                    <span class="text-xl opacity-80">🔒</span>
                    <span class="ms-3 text-sm">Sandbox Data</span>
                </div>
            @endif

            <a href="{{ route('spreadsheet.lab') }}"
            class="nav-item flex items-center px-4 py-3 rounded-xl transition-all duration-200 text-eduPrimary hover:text-eduPrimaryHover hover:bg-white/50">
                <span class="text-xl opacity-80"></span>
                <span class="ms-3 text-sm">Spreadsheet Lab</span>
            </a>
        </nav>

        <div class="mt-8 pt-4 border-t border-borderLight">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center p-3 text-red-600 bg-red-50 rounded-xl hover:bg-red-600 hover:text-white transition-all text-sm font-bold">
                    <span class="mr-2"></span> Keluar Akun
                </button>
            </form>
        </div>

    </div>

    <div id="global-tooltip" class="fixed hidden z-[9999] pointer-events-none transition-opacity duration-200 opacity-0">
        <div class="w-64 p-4 bg-white border border-borderLight rounded-xl shadow-2xl text-eduPrimaryHover text-xs relative">
            <div class="absolute -left-2 top-4 w-4 h-4 bg-white border-l border-b border-borderLight transform rotate-45"></div>
            <span class="text-eduPrimary font-bold flex items-center gap-2 border-b border-borderLight pb-2 mb-2 text-sm uppercase">
                <span class="text-lg">📌</span> Informasi
            </span>
            <p id="tooltip-text" class="leading-relaxed"></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tooltip = document.getElementById('global-tooltip');
            const tooltipText = document.getElementById('tooltip-text');
            const lockedItems = document.querySelectorAll('.locked-item');

            lockedItems.forEach(item => {
                item.addEventListener('mouseenter', (e) => {
                    const syarat = item.getAttribute('data-syarat');
                    if(syarat) {
                        tooltipText.innerHTML = syarat; 
                        tooltip.classList.remove('hidden');
                        setTimeout(() => tooltip.classList.remove('opacity-0'), 10); 
                    }
                });
                item.addEventListener('mousemove', (e) => {
                    let top = e.clientY + 10; 
                    let left = e.clientX + 20;
                    if (top + 100 > window.innerHeight) top = e.clientY - 80;
                    tooltip.style.top = `${top}px`;
                    tooltip.style.left = `${left}px`;
                });
                item.addEventListener('mouseleave', () => {
                    tooltip.classList.add('opacity-0');
                    setTimeout(() => tooltip.classList.add('hidden'), 200);
                });
            });

            const chapterToggles = document.querySelectorAll('.chapter-toggle');
            
            chapterToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const targetId = toggle.getAttribute('data-target');
                    const content = document.getElementById(targetId);
                    const icon = toggle.querySelector('.chevron-icon');
                    
                    if(content && icon) {
                        content.classList.toggle('hidden');
                        icon.classList.toggle('rotate-180');
                    }
                });
            });

            const activeItem = document.querySelector('.nav-item.active');
            if (activeItem) {
                const activeChapter = activeItem.closest('.chapter-content');
                if (activeChapter) {
                    activeChapter.classList.remove('hidden'); 
                    const relatedToggle = document.querySelector(`[data-target="${activeChapter.id}"]`);
                    if (relatedToggle) {
                        const icon = relatedToggle.querySelector('.chevron-icon');
                        if (icon) icon.classList.add('rotate-180');
                    }
                }
            } else {
                const firstChapter = document.querySelector('.chapter-content');
                const firstToggle = document.querySelector('.chapter-toggle');
                if(firstChapter && firstToggle) {
                    firstChapter.classList.remove('hidden');
                    const icon = firstToggle.querySelector('.chevron-icon');
                    if(icon) icon.classList.add('rotate-180');
                }
            }
        });
    </script>
</aside>