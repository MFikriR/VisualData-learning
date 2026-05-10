@extends('layouts.app_learning')

@section('header', 'Manajemen Siswa')

@section('content')
<div class="space-y-6 pb-20">

    {{-- 1. TOOLBAR (SEARCH & ACTIONS) --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-slate-800 p-5 rounded-2xl shadow-xl border border-slate-700">
        
        {{-- Total Count --}}
        <div class="flex items-center gap-3">
            <span class="p-2.5 bg-blue-500/20 text-blue-400 rounded-xl border border-blue-500/30">👥</span>
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Terdaftar</p>
                <span class="font-black text-white text-lg">
                    {{ $students->total() }} Siswa
                </span>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
            {{-- Form Pencarian --}}
            <form action="{{ route('teacher.students.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
                <div class="relative w-full md:w-64">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." 
                        class="w-full pl-11 pr-4 py-2.5 rounded-xl border border-slate-600 bg-slate-900 text-white focus:ring-2 focus:ring-eduPrimary focus:border-eduPrimary transition-all text-sm placeholder-slate-500">
                    <span class="absolute left-4 top-2.5 text-slate-400">🔍</span>
                </div>
                <button type="submit" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-white rounded-xl text-sm font-bold transition-colors">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('teacher.students.index') }}" class="px-3 py-2.5 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-xl text-sm font-bold transition-colors flex items-center justify-center border border-red-500/30" title="Reset Pencarian">
                        ✖
                    </a>
                @endif
            </form>

            {{-- TOMBOL TAMBAH SISWA --}}
            <a href="{{ route('teacher.students.create') }}" class="px-5 py-2.5 bg-eduPrimary hover:bg-blue-700 text-white rounded-xl text-sm font-bold transition-colors flex items-center justify-center gap-2 shadow-lg shadow-blue-500/20 whitespace-nowrap">
                <span>+</span> Tambah Siswa
            </a>
        </div>
    </div>

    {{-- 2. TABEL SISWA --}}
    <div class="bg-slate-800 rounded-3xl shadow-xl border border-slate-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-slate-900/80 text-xs uppercase font-bold text-slate-400 border-b border-slate-700">
                    <tr>
                        <th class="px-6 py-5">Profil Siswa</th>
                        <th class="px-6 py-5 text-center">Kelas & Gender</th> <th class="px-6 py-5 text-center">Status Akun</th>
                        <th class="px-6 py-5 text-center">Tanggal Bergabung</th>
                        <th class="px-6 py-5 text-right">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($students as $student)
                        <tr class="hover:bg-slate-750 transition-colors group">
                            
                            {{-- Kolom Profil --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <img src="{{ $student->profile_photo_url }}" class="w-12 h-12 rounded-xl object-cover border border-slate-600">
                                        <div class="absolute -bottom-1 -right-1 w-3.5 h-3.5 bg-emerald-500 border-2 border-slate-800 rounded-full"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold text-white text-base mb-0.5">{{ $student->name }}</div>
                                        <div class="text-xs text-slate-400 flex items-center gap-1">
                                            <span>📧</span> {{ $student->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom Kelas & Gender BARU --}}
                            <td class="px-6 py-4 text-center">
                                <div class="font-bold text-slate-300">{{ $student->kelas ?? 'Belum ada kelas' }}</div>
                                <div class="text-[10px] text-slate-500 font-bold uppercase mt-1">
                                    @if($student->gender == 'male')
                                        👨 Laki-Laki
                                    @elseif($student->gender == 'female')
                                        👩 Perempuan
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>

                            {{-- Kolom Status --}}
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-[10px] font-bold uppercase tracking-wide">
                                    Aktif Belajar
                                </span>
                            </td>

                            {{-- Kolom Tanggal --}}
                            <td class="px-6 py-4 text-center">
                                <span class="text-xs font-bold text-slate-400 bg-slate-900 px-3 py-1.5 rounded-lg border border-slate-700">
                                    {{ $student->created_at->format('d M Y') }}
                                </span>
                            </td>

                            {{-- Kolom Aksi --}}
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('teacher.students.show', $student->id) }}" class="p-2 bg-blue-500/10 text-blue-400 rounded-lg hover:bg-blue-500/20 border border-blue-500/20 transition-colors" title="Lihat Detail & Nilai">
                                        👁️
                                    </a>
                                    <a href="{{ route('teacher.students.edit', $student->id) }}" class="p-2 bg-amber-500/10 text-amber-400 rounded-lg hover:bg-amber-500/20 border border-amber-500/20 transition-colors" title="Edit Siswa">
                                        ✏️
                                    </a>
                                    <form action="{{ route('teacher.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Hapus siswa ini? Data nilai akan ikut terhapus permanen.');" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-500/10 text-red-400 rounded-lg hover:bg-red-500/20 border border-red-500/20 transition-colors" title="Hapus Permanen">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="text-5xl mb-4 opacity-50">🔍</div>
                                    <h3 class="text-lg font-bold text-white mb-1">Tidak ada data siswa</h3>
                                    <p class="text-slate-400 text-sm">Tidak ditemukan data siswa yang sesuai pencarian.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if($students->hasPages())
            <div class="p-5 border-t border-slate-700 bg-slate-900/30">
                {{ $students->links() }}
            </div>
        @endif
    </div>
</div>
@endsection