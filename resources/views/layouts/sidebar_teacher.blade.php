<aside class="sidebar fixed top-0 left-0 z-40 w-[280px] h-screen transition-transform -translate-x-full md:translate-x-0 flex flex-col bg-[#f5f5f7] border-r border-[#e0e0e0]" style="font-family: 'SF Pro Text', 'Inter', system-ui, -apple-system, sans-serif;">
    
    <div class="flex-1 px-4 py-6 overflow-y-auto custom-scrollbar flex flex-col h-full">
        
        {{-- LOGO --}}
        <div class="flex items-center justify-between mb-8 px-2">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-[#1d1d1f] rounded-[8px] flex items-center justify-center text-white font-bold text-lg">V</div>
                <span class="text-[21px] font-semibold text-[#1d1d1f] tracking-[0.231px]">
                    Visual Data
                </span>
            </div>
            <button id="sidebar-close" class="md:hidden text-[#7a7a7a] hover:text-[#1d1d1f] transition-colors focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        {{-- PROFIL GURU --}}
        <div class="mb-8 px-2">
            <div class="flex items-center gap-3">
                <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=ffffff&background=1d1d1f' }}" 
                     class="w-10 h-10 rounded-full border border-[#e0e0e0] object-cover bg-white shadow-sm"
                     alt="{{ Auth::user()->name }}">
                
                <div class="flex flex-col overflow-hidden">
                    <span class="text-[17px] font-semibold text-[#1d1d1f] tracking-[-0.374px] leading-tight truncate">
                        {{ Auth::user()->name }}
                    </span>
                    <span class="text-[12px] font-normal text-[#7a7a7a] tracking-[-0.12px] mt-0.5">
                        Guru Pengampu
                    </span>
                </div>
            </div>
        </div>

        {{-- MENU NAVIGASI --}}
        <ul class="space-y-1 flex-1">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('teacher.dashboard') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.dashboard') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Dashboard
                </a>
            </li>

            {{-- Data Siswa --}}
            <li>
                <a href="{{ route('teacher.students.index') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.students.*') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Data Siswa
                </a>
            </li>

            {{-- Kurikulum --}}
            <li>
                <a href="{{ route('teacher.chapters.index') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.chapters.*') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Kurikulum
                </a>
            </li>

            {{-- PRATINJAU MATERI (ACCORDION DROPDOWN) --}}
            <li x-data="{ open: {{ request()->routeIs('learning.*') || request()->routeIs('quiz.*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] cursor-pointer border-none bg-transparent
                        {{ request()->routeIs('learning.*') || request()->routeIs('quiz.*') 
                             ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                             : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        <span>Pratinjau Materi</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                {{-- Sub-menu Seluruh Bab & Materi --}}
                <div x-show="open" x-collapse class="pl-3 pr-1 py-2 space-y-3 border-l-2 border-[#0066cc]/30 ml-5 mt-1">
                    @if(isset($globalChapters))
                        @foreach($globalChapters as $chapter)
                            <div>
                                <div class="text-[11px] font-bold text-[#7a7a7a] uppercase tracking-wider mb-1">
                                    {{ $chapter->sequence == 0 ? 'Pengantar' : ($chapter->sequence == 99 ? 'Penilaian Akhir' : 'Bab '.$chapter->sequence) }}
                                </div>
                                <div class="space-y-1">
                                    @foreach($chapter->materials as $mat)
                                        <a href="{{ route('learning.show', $mat->slug) }}"
                                           class="block py-1.5 px-2.5 text-[13px] rounded-lg text-[#1d1d1f] hover:bg-black/5 truncate transition-colors text-decoration-none
                                           {{ request()->is('belajar/'.$mat->slug) ? 'font-bold text-[#0066cc] bg-blue-50' : 'font-medium' }}">
                                            {{ $mat->title }}
                                        </a>
                                    @endforeach

                                    @foreach($chapter->quizzes as $quiz)
                                        <a href="{{ route('quiz.show', $quiz->id) }}"
                                           class="flex items-center gap-1.5 py-1.5 px-2.5 text-[13px] rounded-lg text-[#0066cc] hover:bg-blue-50/50 truncate transition-colors text-decoration-none font-semibold">
                                            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span class="truncate">{{ $quiz->title }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </li>

            {{-- Rekap Nilai --}}
            <li>
                <a href="{{ route('teacher.gradebook') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.gradebook') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Rekap Nilai
                </a>
            </li>

            {{-- Pengaturan KKM --}}
            <li>
                <a href="{{ route('teacher.settings.index') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.settings.*') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan KKM
                </a>
            </li>

            {{-- Bantuan / FAQ --}}
            <li>
                <a href="{{ route('teacher.help') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.help') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Bantuan & FAQ
                </a>
            </li>

        </ul>
        
        {{-- TOMBOL LOGOUT --}}
        <div class="mt-8 pt-4 border-t border-[#e0e0e0]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] font-normal text-[#1d1d1f] hover:bg-[#e0e0e0]/50 cursor-pointer border-none bg-transparent">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg> 
                    Keluar Akun
                </button>
            </form>
        </div>

    </div>
</aside>