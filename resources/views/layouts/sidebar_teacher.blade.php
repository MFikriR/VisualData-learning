<aside class="sidebar fixed top-0 left-0 z-40 w-[280px] h-screen transition-transform -translate-x-full md:translate-x-0 flex flex-col">
    
    <div class="flex-1 px-4 py-6 overflow-y-auto custom-scrollbar flex flex-col h-full">
        
        {{-- LOGO --}}
        <div class="flex items-center justify-between mb-8 px-2">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-eduPrimary rounded-lg flex items-center justify-center text-white font-bold text-xl">V</div>
                <span class="text-xl font-bold tracking-wide text-eduPrimaryHover">
                    Visual <span class="text-eduPrimary">Data</span>
                </span>
            </div>
            <button id="sidebar-close" class="md:hidden text-slate-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        {{-- PROFIL GURU --}}
        <div class="mb-8 p-4 bg-white/30 rounded-2xl border border-eduPrimary/30 flex items-center gap-3 shadow-sm">
            <div class="text-sm font-bold text-eduPrimaryHover truncate">
                {{ Auth::user()->name }}
            </div>

            <div class="text-[10px] text-eduPrimary font-bold uppercase tracking-wider">
                Guru Pengampu
            </div>
        </div>

        {{-- MENU NAVIGASI --}}
        <ul class="space-y-3 font-medium flex-1">

            <li>
                <a href="{{ route('teacher.dashboard') }}"
                class="nav-item flex items-center px-4 py-3 rounded-xl border border-transparent transition-all duration-200
                {{ request()->routeIs('teacher.dashboard')
                        ? 'active shadow-md'
                        : 'text-eduPrimaryHover hover:bg-white/40 hover:border-eduPrimary/40' }}">
                    <span class="text-xl drop-shadow-sm">📊</span>
                    <span class="ms-3 text-sm font-bold tracking-wide">
                        Dashboard
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('teacher.students.index') }}"
                class="nav-item flex items-center px-4 py-3 rounded-xl border border-transparent transition-all duration-200
                {{ request()->routeIs('teacher.students.*')
                        ? 'active shadow-md'
                        : 'text-eduPrimaryHover hover:bg-white/40 hover:border-eduPrimary/40' }}">
                    <span class="text-xl drop-shadow-sm">👥</span>
                    <span class="ms-3 text-sm font-bold tracking-wide">
                        Data Siswa
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('teacher.chapters.index') }}"
                class="nav-item flex items-center px-4 py-3 rounded-xl border border-transparent transition-all duration-200
                {{ request()->routeIs('teacher.chapters.*')
                        ? 'active shadow-md'
                        : 'text-eduPrimaryHover hover:bg-white/40 hover:border-eduPrimary/40' }}">
                    <span class="text-xl drop-shadow-sm">📚</span>
                    <span class="ms-3 text-sm font-bold tracking-wide">
                        Kurikulum
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('teacher.gradebook') }}"
                class="nav-item flex items-center px-4 py-3 rounded-xl border border-transparent transition-all duration-200
                {{ request()->routeIs('teacher.gradebook')
                        ? 'active shadow-md'
                        : 'text-eduPrimaryHover hover:bg-white/40 hover:border-eduPrimary/40' }}">
                    <span class="text-xl drop-shadow-sm">📝</span>
                    <span class="ms-3 text-sm font-bold tracking-wide">
                        Rekap Nilai
                    </span>
                </a>
            </li>

        </ul>
        
        {{-- TOMBOL LOGOUT --}}
        <div class="mt-8 pt-4 border-t border-eduPrimary/20">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center p-3
                    text-red-600 bg-red-100
                    border border-red-200
                    rounded-xl
                    hover:bg-red-500 hover:text-white
                    transition-all text-sm font-bold">
                    <span class="mr-2">🚪</span> Keluar Akun
                </button>
            </form>
        </div>

    </div>
</aside>