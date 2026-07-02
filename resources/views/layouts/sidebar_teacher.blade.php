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
            <button id="sidebar-close" class="md:hidden text-[#7a7a7a] hover:text-[#1d1d1f] transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        {{-- PROFIL GURU --}}
        <div class="mb-8 px-2">
            <div class="flex items-center gap-3">
                {{-- Mengambil foto profil, jika kosong pakai inisial huruf dari API --}}
                <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=ffffff&background=1d1d1f' }}" 
                     class="w-10 h-10 rounded-full border border-[#e0e0e0] object-cover bg-white shadow-sm">
                
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
                    <span class="text-xl mr-3 {{ request()->routeIs('teacher.dashboard') ? 'grayscale-0' : 'grayscale opacity-60' }}">📊</span>
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
                    <span class="text-xl mr-3 {{ request()->routeIs('teacher.students.*') ? 'grayscale-0' : 'grayscale opacity-60' }}">👥</span>
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
                    <span class="text-xl mr-3 {{ request()->routeIs('teacher.chapters.*') ? 'grayscale-0' : 'grayscale opacity-60' }}">📚</span>
                    Kurikulum
                </a>
            </li>

            {{-- Rekap Nilai --}}
            <li>
                <a href="{{ route('teacher.gradebook') }}"
                   class="flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] 
                   {{ request()->routeIs('teacher.gradebook') 
                        ? 'bg-[#0066cc] text-white font-semibold shadow-sm' 
                        : 'text-[#333333] hover:bg-[#e0e0e0]/50 font-normal' }}">
                    <span class="text-xl mr-3 {{ request()->routeIs('teacher.gradebook') ? 'grayscale-0' : 'grayscale opacity-60' }}">📝</span>
                    Rekap Nilai
                </a>
            </li>

        </ul>
        
        {{-- TOMBOL LOGOUT --}}
        <div class="mt-8 pt-4 border-t border-[#e0e0e0]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-3 py-2.5 rounded-[11px] transition-colors duration-150 text-[17px] tracking-[-0.374px] font-normal text-[#1d1d1f] hover:bg-[#e0e0e0]/50">
                    <span class="text-xl mr-3 grayscale opacity-60">🚪</span> 
                    Keluar Akun
                </button>
            </form>
        </div>

    </div>
</aside>