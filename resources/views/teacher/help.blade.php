@extends('layouts.app_learning')

@section('header', 'Bantuan & FAQ Pengajar')

@section('content')
<div class="min-h-screen bg-[#f5f5f7] py-8 px-4 sm:px-6 lg:px-8 font-sans">
    <div class="max-w-4xl mx-auto space-y-6">
        
        {{-- HEADER BANNER --}}
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-[#e0e0e0] shadow-sm">
            <div class="flex items-center gap-4 mb-2">
                <div class="w-12 h-12 bg-blue-50 text-[#0066cc] rounded-2xl flex items-center justify-center text-2xl font-bold">
                    🧑‍🏫
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-[#1d1d1f] tracking-tight">Bantuan Penggunaan Media untuk Guru</h1>
                    <p class="text-sm text-[#7a7a7a] mt-0.5">Panduan fungsionalitas dan hak akses pengajar pada platform VisualData.</p>
                </div>
            </div>
        </div>

        {{-- FAQ ACCORDION CONTAINER --}}
        <div class="bg-white rounded-2xl p-6 border border-[#e0e0e0] shadow-sm space-y-3">
            <h2 class="text-lg font-bold text-[#1d1d1f] mb-4 px-2">Pertanyaan Sering Diajukan (FAQ)</h2>

            {{-- ITEM FAQ 1 --}}
            <div x-data="{ open: false }" class="border border-[#e0e0e0] rounded-xl overflow-hidden transition-all">
                <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50/50 hover:bg-gray-100/50 text-left cursor-pointer transition-colors border-none">
                    <span class="text-sm sm:text-base font-semibold text-[#1d1d1f] flex items-center gap-2">
                        <span>📘</span> Apa itu platform VisualData?
                    </span>
                    <svg class="w-5 h-5 text-[#7a7a7a] transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="p-4 bg-white border-t border-[#e0e0e0] text-xs sm:text-sm text-[#424245] leading-relaxed">
                    VisualData adalah media pembelajaran interaktif berbasis web yang dirancang khusus untuk memfasilitasi pemahaman konsep analisis data, pengolahan data, hingga visualisasi data. Sebagai Guru Pengampu, Anda memiliki wewenang untuk memantau aktivitas belajar siswa, mengelola kurikulum, serta mengevaluasi hasil kuis secara *real-time*.
                </div>
            </div>

            {{-- ITEM FAQ 2 --}}
            <div x-data="{ open: false }" class="border border-[#e0e0e0] rounded-xl overflow-hidden transition-all">
                <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50/50 hover:bg-gray-100/50 text-left cursor-pointer transition-colors border-none">
                    <span class="text-sm sm:text-base font-semibold text-[#1d1d1f] flex items-center gap-2">
                        <span>👥</span> Bagaimana cara memantau data dan progres belajar siswa?
                    </span>
                    <svg class="w-5 h-5 text-[#7a7a7a] transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="p-4 bg-white border-t border-[#e0e0e0] text-xs sm:text-sm text-[#424245] leading-relaxed">
                    Anda dapat mengklik menu <strong>Data Siswa</strong> pada bilah navigasi samping. Di halaman tersebut, Anda dapat melihat daftar seluruh siswa terdaftar, melakukan filter berdasarkan kelas, menambahkan akun siswa baru, melihat detail histori pengerjaan kuis per siswa, hingga memperbarui atau menghapus akun siswa.
                </div>
            </div>

            {{-- ITEM FAQ 3 --}}
            <div x-data="{ open: false }" class="border border-[#e0e0e0] rounded-xl overflow-hidden transition-all">
                <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50/50 hover:bg-gray-100/50 text-left cursor-pointer transition-colors border-none">
                    <span class="text-sm sm:text-base font-semibold text-[#1d1d1f] flex items-center gap-2">
                        <span>📝</span> Bagaimana cara melihat dan mengontrol nilai kuis (Rekap Nilai)?
                    </span>
                    <svg class="w-5 h-5 text-[#7a7a7a] transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="p-4 bg-white border-t border-[#e0e0e0] text-xs sm:text-sm text-[#424245] leading-relaxed">
                    Pilih menu <strong>Rekap Nilai</strong>. Halaman ini menyajikan tabel matriks lengkap yang memuat nilai Pre-Test, Evaluasi Bab, hingga Evaluasi Akhir setiap siswa. Anda juga dapat menggunakan filter kelas atau jenis kelamin untuk menyaring data nilai kelas yang sedang diampu.
                </div>
            </div>

            {{-- ITEM FAQ 4 --}}
            <div x-data="{ open: false }" class="border border-[#e0e0e0] rounded-xl overflow-hidden transition-all">
                <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50/50 hover:bg-gray-100/50 text-left cursor-pointer transition-colors border-none">
                    <span class="text-sm sm:text-base font-semibold text-[#1d1d1f] flex items-center gap-2">
                        <span>📖</span> Apa itu fitur Pratinjau Materi (Bypass Lock)?
                    </span>
                    <svg class="w-5 h-5 text-[#7a7a7a] transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="p-4 bg-white border-t border-[#e0e0e0] text-xs sm:text-sm text-[#424245] leading-relaxed">
                    Fitur <strong>Pratinjau Materi</strong> dirancang agar Guru dapat meninjau seluruh materi pembelajaran, simulator laboratorium, dan soal evaluasi secara bebas. Berbeda dengan akun Siswa yang materi pembelajarannya terkunci secara bertahap, akun Guru dibebaskan dari aturan penguncian (*bypass lock*) sehingga Anda dapat langsung membuka bab atau sub-bab mana pun tanpa harus menyelesaikan Pre-Test terlebih dahulu.
                </div>
            </div>

            {{-- ITEM FAQ 5 --}}
            <div x-data="{ open: false }" class="border border-[#e0e0e0] rounded-xl overflow-hidden transition-all">
                <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50/50 hover:bg-gray-100/50 text-left cursor-pointer transition-colors border-none">
                    <span class="text-sm sm:text-base font-semibold text-[#1d1d1f] flex items-center gap-2">
                        <span>📚</span> Bagaimana cara mengelola bab, materi, dan soal kuis?
                    </span>
                    <svg class="w-5 h-5 text-[#7a7a7a] transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="p-4 bg-white border-t border-[#e0e0e0] text-xs sm:text-sm text-[#424245] leading-relaxed">
                    Akses menu <strong>Kurikulum</strong> untuk mengatur daftar Bab. Dari detail bab, Anda dapat menambah materi baru (baik teks maupun simulasi 3D) serta menyusun kuis melalui fitur *Quiz Builder* yang mendukung opsi bergambar dan penentuan kunci jawaban otomatis.
                </div>
            </div>

            {{-- ITEM FAQ 6 --}}
            <div x-data="{ open: false }" class="border border-[#e0e0e0] rounded-xl overflow-hidden transition-all">
                <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50/50 hover:bg-gray-100/50 text-left cursor-pointer transition-colors border-none">
                    <span class="text-sm sm:text-base font-semibold text-[#1d1d1f] flex items-center gap-2">
                        <span>💬</span> Butuh bantuan teknis lebih lanjut?
                    </span>
                    <svg class="w-5 h-5 text-[#7a7a7a] transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open" x-collapse class="p-4 bg-white border-t border-[#e0e0e0] text-xs sm:text-sm text-[#424245] leading-relaxed">
                    Jika Anda mengalami kendala teknis dalam pengoperasian aplikasi atau menemukan eror pada sistem, silakan hubungi tim pengembang melalui email dukungan teknis di <a href="mailto:support@visualdata.id" class="text-[#0066cc] font-semibold underline">support@visualdata.id</a>.
                </div>
            </div>

        </div>

    </div>
</div>
@endsection