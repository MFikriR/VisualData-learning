@extends('layouts.app_learning')

@section('header', 'Manajemen Siswa')

@section('content')
<div x-data="{ showDeleteModal: false, deleteUrl: '', studentName: '' }" class="space-y-6 pb-20 font-sans">

    {{-- 1. TOOLBAR (TOTAL COUNT, SEARCH, & ADD BUTTON) --}}
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row justify-between items-center gap-4" style="background-color: #ffffff !important;">
        
        {{-- Total Count --}}
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center border border-blue-100" style="background-color: #eff6ff !important; color: #2563eb !important;">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider" style="color: #64748b !important;">Total Terdaftar</p>
                <span class="font-extrabold text-lg" style="color: #0f172a !important;">
                    {{ $students->total() }} Siswa
                </span>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            {{-- Form Pencarian --}}
            <form action="{{ route('teacher.students.index') }}" method="GET" class="flex gap-2 w-full sm:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." 
                        class="w-full pl-11 pr-4 py-2.5 rounded-xl border border-slate-300 transition-all text-sm outline-none"
                        style="background-color: #f8fafc !important; color: #0f172a !important;">
                    <span class="absolute left-3.5 top-3" style="color: #64748b !important;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                </div>
                <button type="submit" class="px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors shadow-sm cursor-pointer border-none" style="background-color: #0f172a !important; color: #ffffff !important;">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('teacher.students.index') }}" class="px-3 py-2.5 rounded-xl text-sm font-semibold transition-colors flex items-center justify-center border text-decoration-none" style="background-color: #fef2f2 !important; color: #dc2626 !important; border-color: #fecaca !important;" title="Reset Pencarian">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </a>
                @endif
            </form>

            {{-- TOMBOL TAMBAH SISWA --}}
            <a href="{{ route('teacher.students.create') }}" class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all flex items-center justify-center gap-2 shadow-sm whitespace-nowrap text-decoration-none" style="background-color: #2563eb !important; color: #ffffff !important;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Tambah Siswa</span>
            </a>
        </div>
    </div>

    {{-- 2. TABEL SISWA --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden" style="background-color: #ffffff !important;">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm" style="color: #0f172a !important;">
                <thead class="text-[11px] uppercase font-bold border-b border-slate-200 tracking-wider" style="background-color: #f8fafc !important; color: #64748b !important;">
                    <tr>
                        <th class="px-6 py-4">Profil Siswa</th>
                        <th class="px-6 py-4 text-center">Kelas & Gender</th>
                        <th class="px-6 py-4 text-center">Status Akun</th>
                        <th class="px-6 py-4 text-center">Tanggal Bergabung</th>
                        <th class="px-6 py-4 text-right">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($students as $student)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            
                            {{-- Kolom Profil --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3.5">
                                    <div class="relative">
                                        <img src="{{ $student->profile_photo_url }}" class="w-10 h-10 rounded-xl object-cover border border-slate-200 bg-white">
                                        <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm leading-snug" style="color: #0f172a !important;">{{ $student->name }}</div>
                                        <div class="text-xs flex items-center gap-1.5 mt-0.5" style="color: #64748b !important;">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            <span>{{ $student->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom Kelas & Gender --}}
                            <td class="px-6 py-4 text-center">
                                <div class="font-bold text-sm" style="color: #0f172a !important;">{{ $student->kelas ?? 'Belum ada kelas' }}</div>
                                <div class="text-[10px] font-semibold uppercase tracking-wider mt-0.5" style="color: #64748b !important;">
                                    @if($student->gender == 'male')
                                        Laki-Laki
                                    @elseif($student->gender == 'female')
                                        Perempuan
                                    @else
                                        -
                                    @endif
                                </div>
                            </td>

                            {{-- Kolom Status --}}
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider border" style="background-color: #ecfdf5 !important; color: #047857 !important; border-color: #a7f3d0 !important;">
                                    Aktif Belajar
                                </span>
                            </td>

                            {{-- Kolom Tanggal --}}
                            <td class="px-6 py-4 text-center">
                                <span class="text-xs font-semibold px-3 py-1.5 rounded-lg border inline-block" style="background-color: #f8fafc !important; color: #334155 !important; border-color: #e2e8f0 !important;">
                                    {{ $student->created_at->format('d M Y') }}
                                </span>
                            </td>

                            {{-- Kolom Aksi --}}
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('teacher.students.show', $student->id) }}" 
                                       class="p-2 rounded-lg border transition-colors inline-flex items-center justify-center text-decoration-none" 
                                       style="background-color: #eff6ff !important; color: #2563eb !important; border-color: #bfdbfe !important;" 
                                       title="Detail Siswa">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('teacher.students.edit', $student->id) }}" 
                                       class="p-2 rounded-lg border transition-colors inline-flex items-center justify-center text-decoration-none" 
                                       style="background-color: #fffbeb !important; color: #d97706 !important; border-color: #fde68a !important;" 
                                       title="Edit Siswa">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <button @click="showDeleteModal = true; deleteUrl = '{{ route('teacher.students.destroy', $student->id) }}'; studentName = '{{ $student->name }}'" 
                                            class="p-2 rounded-lg border transition-colors inline-flex items-center justify-center border-none cursor-pointer" 
                                            style="background-color: #fef2f2 !important; color: #dc2626 !important; border-color: #fecaca !important;" 
                                            title="Hapus Permanen">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center mb-3" style="background-color: #f1f5f9 !important; color: #64748b !important;">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    </div>
                                    <h3 class="text-base font-bold mb-1" style="color: #0f172a !important;">Tidak Ada Data Siswa</h3>
                                    <p class="text-xs" style="color: #64748b !important;">Tidak ditemukan data siswa yang sesuai dengan kata kunci pencarian.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if($students->hasPages())
            <div class="p-4 border-t border-slate-200" style="background-color: #f8fafc !important;">
                {{ $students->links() }}
            </div>
        @endif
    </div>

    {{-- MODAL KONFIRMASI HAPUS (APPLE STYLE MODAL) --}}
    <div x-show="showDeleteModal" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
         style="display: none;">
        
        <div @click.away="showDeleteModal = false" class="rounded-2xl max-w-sm w-full p-6 text-center shadow-2xl border border-slate-200" style="background-color: #ffffff !important;">
            
            <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 border border-red-100" style="background-color: #fef2f2 !important; color: #dc2626 !important;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>

            <h3 class="text-base font-bold mb-1" style="color: #0f172a !important;">Hapus Data Siswa?</h3>
            
            <p class="text-xs leading-relaxed mb-6" style="color: #475569 !important;">
                Akun siswa <span class="font-bold" style="color: #0f172a !important;" x-text="studentName"></span> beserta seluruh riwayat pengerjaan kuis dan nilainya akan dihapus permanen dari sistem.
            </p>

            <div class="flex items-center gap-2">
                <button @click="showDeleteModal = false" type="button" class="flex-1 py-2.5 px-4 font-semibold rounded-xl text-xs transition-colors border-none cursor-pointer" style="background-color: #f1f5f9 !important; color: #0f172a !important;">
                    Batal
                </button>
                <form :action="deleteUrl" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2.5 px-4 font-semibold rounded-xl text-xs transition-colors border-none cursor-pointer shadow-sm" style="background-color: #dc2626 !important; color: #ffffff !important;">
                        Hapus Permanen
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection