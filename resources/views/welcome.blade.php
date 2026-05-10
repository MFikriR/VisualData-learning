<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VisualData - Media Pembelajaran Interaktif</title>
    
    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    {{-- DRIVER.JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        eduPrimary: '#2563eb', // Blue 600
                        eduDark: '#0f172a', // Slate 900
                        eduAccent: '#38bdf8', // Teal/Cyan
                    },
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        body { 
            background: #0f172a; 
            color: #f8fafc;
            overflow-x: hidden;
        }
        
        /* Animasi Partikel Data */
        .data-particles { position: fixed; width: 100%; height: 100%; z-index: -1; pointer-events: none; }
        .particle {
            position: absolute; bottom: -100px; background: rgba(56, 189, 248, 0.15); border-radius: 50%; opacity: 0.5; animation: rise 10s infinite linear; border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.2);
        }
        @keyframes rise {
            0% { bottom: -100px; transform: translateX(0); }
            50% { transform: translateX(50px); }
            100% { bottom: 120vh; transform: translateX(-50px); }
        }

        /* Glass Panel Elegan */
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }

        /* Driver.js Theme Professional */
        .driver-popover.driverjs-theme {
            background-color: #1e293b; color: #f8fafc; border: 1px solid #334155; border-radius: 12px; font-family: '"Plus Jakarta Sans"', sans-serif; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
        }
        .driver-popover.driverjs-theme .driver-popover-title { color: #38bdf8; font-weight: 700; }
        .driver-popover.driverjs-theme button { background-color: #2563eb; color: white; border: none; text-shadow: none; border-radius: 6px; padding: 6px 12px; }
        .driver-popover.driverjs-theme button:hover { background-color: #1d4ed8; }
        .driver-overlay { background-color: rgba(0,0,0,0.8) !important; }

        .animate-fade-in { animation: fadeIn 0.3s ease-in-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="antialiased selection:bg-eduPrimary selection:text-white">

    {{-- Latar Belakang Partikel Data --}}
    <div class="data-particles">
        <div class="particle" style="left:10%; width:4px; height:4px; animation-duration:8s;"></div>
        <div class="particle" style="left:30%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:70%; width:8px; height:8px; animation-duration:12s; animation-delay:2s;"></div>
        <div class="particle" style="left:50%; width:5px; height:5px; animation-duration:10s; animation-delay:0.5s;"></div>
        <div class="particle" style="left:85%; width:7px; height:7px; animation-duration:14s; animation-delay:3s;"></div>
    </div>

    {{-- NAVBAR --}}
    <nav class="fixed w-full z-50 top-0 start-0 bg-[#0f172a]/90 backdrop-blur-md border-b border-slate-800 transition-all duration-300">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between p-4">
            
            <a href="#" class="flex items-center space-x-2 group">
                <div class="w-8 h-8 bg-eduPrimary rounded-lg flex items-center justify-center text-white font-bold text-xl">V</div>
                <span class="self-center text-xl font-bold whitespace-nowrap text-white tracking-wide">
                    VisualData<span class="text-eduPrimary">.</span>
                </span>
            </a>

            {{-- MENU UTAMA --}}
            <div class="hidden lg:flex items-center space-x-6">
                <a id="nav-beranda" href="#" class="text-sm font-semibold text-slate-300 hover:text-white transition-colors">Beranda</a>
                <a id="nav-kompetensi" href="#kompetensi" class="text-sm font-semibold text-slate-300 hover:text-white transition-colors">Kompetensi</a>
                <a id="nav-materi" href="#daftar-materi" class="text-sm font-semibold text-slate-300 hover:text-white transition-colors">Daftar Materi</a>
                <a id="nav-petunjuk" href="#petunjuk" class="text-sm font-semibold text-slate-300 hover:text-white transition-colors">Petunjuk</a>
                <a id="nav-profil" href="#profil" class="text-sm font-semibold text-slate-300 hover:text-white transition-colors">Tentang Media</a>
            </div>

            <div class="flex md:order-2 space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white bg-eduPrimary hover:bg-blue-700 font-semibold rounded-lg text-sm px-5 py-2 transition-all shadow-[0_0_10px_rgba(37,99,235,0.5)]">
                            Masuk Kelas ➔
                        </a>
                    @else
                        <a href="{{ route('role.selection') }}" class="text-slate-300 font-semibold text-sm hover:text-white px-4 py-2 transition-colors border border-transparent hover:border-slate-600 rounded-lg">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white text-eduDark font-bold rounded-lg text-sm px-5 py-2 hover:bg-slate-200 transition-all shadow-sm">
                                Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    {{-- 1. HERO SECTION --}}
    <section class="relative min-h-[90vh] flex items-center justify-center pt-20 px-4 text-center z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-800 via-eduDark to-eduDark">
        <div class="max-w-4xl mx-auto">
            <div class="inline-block py-1.5 px-4 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 font-semibold text-sm mb-6 backdrop-blur-sm">
                Media Pembelajaran Interaktif Berbasis Web
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight text-white tracking-tight drop-shadow-lg">
                Media Pembelajaran Interaktif<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Visualiasi dan Pengelompokan Data</span>
            </h1>
            
            <p class="mb-10 text-lg md:text-xl font-normal text-slate-400 max-w-2xl mx-auto leading-relaxed">
                Mari belajar mengenal data serta bagaimana data tersebut bisa di visualisasi kan. Mulai belajar melalui <strong>Model Tutorial</strong> interaktif.
            </p>
            
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-eduPrimary text-white text-lg font-bold py-3.5 px-8 rounded-xl shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:bg-blue-700 hover:scale-105 transition-all flex items-center justify-center gap-2">
                        Mulai Belajar
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-eduPrimary text-white text-lg font-bold py-3.5 px-8 rounded-xl shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:bg-blue-700 hover:scale-105 transition-all flex items-center justify-center gap-2">
                        Daftar & Mulai Belajar
                    </a>
                @endauth
                <a href="#daftar-materi" class="bg-slate-800 text-slate-200 border border-slate-600 text-lg font-semibold py-3.5 px-8 rounded-xl hover:bg-slate-700 transition-all flex items-center justify-center">
                    Lihat Daftar Materi
                </a>
            </div>
        </div>
    </section>

    {{-- 2. BAGIAN KOMPETENSI (KI, KD, INDIKATOR) --}}
    <section id="kompetensi" class="py-20 relative bg-[#0f172a] border-t border-slate-800">
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black mb-4 text-white tracking-wide">Kompetensi Pembelajaran</h2>
                <div class="w-20 h-1 bg-eduPrimary mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="glass-panel p-8 group hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-white">Kompetensi Inti (KI)</h3>
                    <ul class="list-disc list-outside ml-4 space-y-3 text-slate-400 text-sm">
                        <li>Memahami pengetahuan faktual, konseptual, dan prosedural berdasarkan rasa ingin tahu tentang ilmu pengetahuan dan teknologi.</li>
                        <li>Mengolah dan menyaji data secara konkret menggunakan metode sesuai kaidah keilmuan.</li>
                    </ul>
                </div>

                <div class="glass-panel p-8 group hover:border-emerald-500 transition-colors">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center text-emerald-400 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-white">Kompetensi Dasar (KD)</h3>
                    <ul class="list-disc list-outside ml-4 space-y-3 text-slate-400 text-sm">
                        <li>3.1 Memahami konsep dasar data, jenis visualisasi, dan pengelompokan data (Clustering) menggunakan algoritma K-Means.</li>
                        <li>4.1 Mengolah dan menyajikan data melalui visualisasi serta menerapkan analisis algoritma K-Means secara komputasional.</li>
                    </ul>
                </div>

                <div class="glass-panel p-8 group hover:border-purple-500 transition-colors">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center text-purple-400 mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-white">Indikator Pencapaian</h3>
                    <ul class="list-disc list-outside ml-4 space-y-3 text-slate-400 text-sm">
                        <li>Siswa mampu menjelaskan konsep, jenis, dan proses persiapan data. <strong>(Bab 1)</strong></li>
                        <li>Siswa mampu membuat dan membaca berbagai jenis grafik visualisasi data. <strong>(Bab 2)</strong></li>
                        <li>Siswa mampu menerapkan dan mengevaluasi langkah-langkah algoritma K-Means Clustering. <strong>(Bab 3)</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. DAFTAR ISI MATERI (SILABUS CARDS) --}}
    <section id="daftar-materi" class="py-20 relative z-10 bg-[#161b22] border-t border-slate-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-white mb-4 tracking-wide uppercase">Daftar Isi Materi</h2>
                <div class="w-20 h-1 bg-red-500 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                
                {{-- Bab 1 --}}
                <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg hover:-translate-y-2 transition-transform">
                    <span class="bg-red-500/20 text-red-400 font-black text-[10px] uppercase tracking-widest px-3 py-1 rounded border border-red-500/50 mb-4 inline-block">BAB 1</span>
                    <h3 class="text-xl font-bold text-white mb-4">Pengantar Data</h3>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2"><span class="text-red-400 mt-0.5">•</span> Pengertian & Konsep Data</li>
                        <li class="flex items-start gap-2"><span class="text-red-400 mt-0.5">•</span> Jenis-Jenis Data (Nominal, Kontinu, dll)</li>
                        <li class="flex items-start gap-2"><span class="text-red-400 mt-0.5">•</span> Struktur Data (Terstruktur & Bebas)</li>
                        <li class="flex items-start gap-2"><span class="text-red-400 mt-0.5">•</span> Persiapan: Cleaning & Labeling</li>
                    </ul>
                </div>

                {{-- Bab 2 --}}
                <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg hover:-translate-y-2 transition-transform">
                    <span class="bg-blue-500/20 text-blue-400 font-black text-[10px] uppercase tracking-widest px-3 py-1 rounded border border-blue-500/50 mb-4 inline-block">BAB 2</span>
                    <h3 class="text-xl font-bold text-white mb-4">Visualisasi Data</h3>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">•</span> Konsep Diagram Batang (Bar)</li>
                        <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">•</span> Histogram & Bentuk Distribusi</li>
                        <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">•</span> Box Plot & Deteksi Outlier</li>
                        <li class="flex items-start gap-2"><span class="text-blue-400 mt-0.5">•</span> Scatter Plot & Arah Korelasi</li>
                    </ul>
                </div>

                {{-- Bab 3 --}}
                <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 shadow-lg hover:-translate-y-2 transition-transform">
                    <span class="bg-purple-500/20 text-purple-400 font-black text-[10px] uppercase tracking-widest px-3 py-1 rounded border border-purple-500/50 mb-4 inline-block">BAB 3</span>
                    <h3 class="text-xl font-bold text-white mb-4">Pengelompokan</h3>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">•</span> Konsep Clustering & Terminologi AI</li>
                        <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">•</span> Peran Jarak (Euclidean) & Normalisasi</li>
                        <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">•</span> Algoritma K-Means (5 Langkah)</li>
                        <li class="flex items-start gap-2"><span class="text-purple-400 mt-0.5">•</span> Evaluasi: Metode Elbow</li>
                    </ul>
                </div>

                {{-- Evaluasi --}}
                <div class="bg-gradient-to-b from-emerald-900/30 to-slate-800 border border-emerald-700/50 rounded-2xl p-6 shadow-lg hover:-translate-y-2 transition-transform">
                    <span class="bg-emerald-500/20 text-emerald-400 font-black text-[10px] uppercase tracking-widest px-3 py-1 rounded border border-emerald-500/50 mb-4 inline-block">EVALUASI</span>
                    <h3 class="text-xl font-bold text-white mb-4">Uji Pemahaman</h3>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2"><span class="text-emerald-400 mt-0.5">•</span> Kuis Formatif (Mini-Quiz tiap materi)</li>
                        <li class="flex items-start gap-2"><span class="text-emerald-400 mt-0.5">•</span> Syarat Kelulusan KKM (Nilai 70)</li>
                        <li class="flex items-start gap-2"><span class="text-emerald-400 mt-0.5">•</span> Evaluasi Akhir Bab (Sumatif)</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- 4. PETUNJUK PENGGUNAAN (ACCORDION) --}}
    <section id="petunjuk" class="py-20 relative z-10 bg-[#0f172a] border-t border-slate-800">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-white mb-4 tracking-wide uppercase">Petunjuk Penggunaan</h2>
                <div class="w-20 h-1 bg-eduPrimary mx-auto rounded-full mb-4"></div>
                <p class="text-slate-400 text-sm">Pilih salah satu daftar di bawah untuk melihat tata cara penggunaan media pembelajaran.</p>
            </div>

            {{-- ACCORDION 1: Beranda & Daftar Akun --}}
                <div class="border border-slate-700 rounded-xl bg-slate-800 overflow-hidden shadow-lg hover:border-blue-500 transition-colors">
                    <button class="w-full text-left px-6 py-4 font-bold text-white flex justify-between items-center focus:outline-none hover:bg-slate-700/50 transition-colors" onclick="toggleAcc('acc1')">
                        <span class="flex items-center gap-3"><span class="text-xl">🏠</span> Halaman Beranda & Daftar Akun</span>
                        <span id="icon-acc1" class="transform transition-transform text-slate-400">▼</span>
                    </button>
                    <div id="acc1" class="hidden px-6 pb-6 text-slate-300 text-sm bg-slate-900/50 pt-4 border-t border-slate-700">
                        
                        <p class="mb-8 text-slate-400 max-w-xl mx-auto text-center">Berikut adalah panduan langkah demi langkah untuk mendaftar akun dan masuk ke dalam platform VisualData.</p>
                        
                        {{-- ALUR PROSES DAFTAR --}}
                        <div class="space-y-12">
                            
                            {{-- Langkah 1 --}}
                            <div class="flex flex-col md:flex-row items-center gap-6">
                                <div class="w-full md:w-2/5 p-4 bg-slate-800 rounded-xl border border-slate-700 shadow-xl">
                                    <img src="{{ asset('images/Petunjuk 1.png') }}" alt="Petunjuk Langkah 1" class="w-full h-auto rounded-lg max-h-[180px] object-contain">
                                </div>
                                <div class="w-full md:w-3/5 flex gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center w-9 h-9 font-bold bg-eduPrimary text-white rounded-full text-base">1</div>
                                    <div class="leading-relaxed">
                                        <p class="text-white font-bold">Akses Halaman Daftar</p>
                                        <p>Klik menu <strong>Daftar</strong> pada Navigasi atas (Navbar) atau tombol "Daftar Sekarang" pada bagian Beranda untuk menuju halaman pendaftaran siswa baru.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Langkah 2 --}}
                            <div class="flex flex-col md:flex-row items-center gap-6">
                                <div class="w-full md:w-2/5 p-4 bg-slate-800 rounded-xl border border-slate-700 shadow-xl">
                                    <img src="{{ asset('images/Petunjuk 2.png') }}" alt="Petunjuk Langkah 2" class="w-full h-auto rounded-lg max-h-[180px] object-contain">
                                </div>
                                <div class="w-full md:w-3/5 flex gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center w-9 h-9 font-bold bg-eduPrimary text-white rounded-full text-base">2</div>
                                    <div class="leading-relaxed">
                                        <p class="text-white font-bold">Lengkapi Data Diri</p>
                                        <p>Isi data diri kamu pada formulir yang tersedia meliputi <strong>Nama Lengkap, Email (aktif), dan Kata Sandi</strong>.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Langkah 3 --}}
                            <div class="flex flex-col md:flex-row items-center gap-6">
                                <div class="w-full md:w-2/5 p-4 bg-slate-800 rounded-xl border border-slate-700 shadow-xl">
                                    <img src="{{ asset('images/Petunjuk 3.png') }}" alt="Petunjuk Langkah 3" class="w-full h-auto rounded-lg max-h-[180px] object-contain">
                                </div>
                                <div class="w-full md:w-3/5 flex gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center w-9 h-9 font-bold bg-eduPrimary text-white rounded-full text-base">3</div>
                                    <div class="leading-relaxed">
                                        <p class="text-white font-bold">Konfirmasi Pendaftaran</p>
                                        <p>Klik tombol <strong>Daftar Sekarang</strong> setelah semua data terisi dengan benar. Jika berhasil, kamu akan langsung masuk ke Dashboard Siswa.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Langkah 4 --}}
                            <div class="flex flex-col md:flex-row items-center gap-6 border-t border-slate-700 pt-10">
                                <div class="w-full md:w-2/5 p-4 bg-slate-800 rounded-xl border border-slate-700 shadow-xl">
                                    <img src="{{ asset('images/Petunjuk 4.png') }}" alt="Petunjuk Langkah 4" class="w-full h-auto rounded-lg max-h-[180px] object-contain">
                                </div>
                                <div class="w-full md:w-3/5 flex gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center w-9 h-9 font-bold bg-slate-700 text-slate-300 rounded-full text-base hover:bg-eduPrimary hover:text-white transition-colors">✔</div>
                                    <div class="leading-relaxed">
                                        <p class="text-slate-200 font-bold">Opsi Lain: Masuk (Login)</p>
                                        <p>Jika kamu sudah memiliki akun sebelumnya, kamu tidak perlu mendaftar lagi. Klik tombol <strong>Masuk Kelas</strong> atau menu Masuk untuk menuju halaman Login.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- ACCORDION 2 --}}
                <div class="border border-slate-700 rounded-xl bg-slate-800 overflow-hidden">
                    <button class="w-full text-left px-6 py-4 font-bold text-white flex justify-between items-center focus:outline-none hover:bg-slate-700/50 transition-colors" onclick="toggleAcc('acc2')">
                        <span class="flex items-center gap-3"><span class="text-xl">📖</span> Halaman Materi Belajar</span>
                        <span id="icon-acc2" class="transform transition-transform text-slate-400">▼</span>
                    </button>
                    <div id="acc2" class="hidden px-6 pb-6 text-slate-300 text-sm bg-slate-900/50 pt-4 border-t border-slate-700">
                        <ol class="list-decimal pl-5 space-y-6">
                            <li>
                                Kamu harus membaca materi secara <strong>berurutan</strong>. Jika terdapat sub materi yang masih terkunci (ikon gembok), kamu harus menyelesaikan materi sebelumnya.
                                <div class="mt-3 rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                                    <img src="{{ asset('images/Petunjuk 5.png') }}" alt="Petunjuk Materi Terkunci" class="w-full h-auto object-cover">
                                </div>
                            </li>
                            <li>
                                Baca teks penjelasan dan amati <strong>Gambar/Video Animasi</strong> yang disediakan dengan saksama.
                                <div class="mt-3 rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                                    <img src="{{ asset('images/Petunjuk 6.png') }}" alt="Petunjuk Simulasi Interaktif" class="w-full h-auto object-cover">
                                </div>
                            </li>
                            <li>
                                Gunakan tombol <strong>Materi Selanjutnya</strong> di bagian bawah halaman untuk berpindah materi.
                                <div class="mt-3 rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                                    <img src="{{ asset('images/Petunjuk 7.png') }}" alt="Petunjuk Tombol Selanjutnya" class="w-full h-auto object-cover">
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>

                {{-- ACCORDION 3 --}}
                <div class="border border-slate-700 rounded-xl bg-slate-800 overflow-hidden">
                    <button class="w-full text-left px-6 py-4 font-bold text-white flex justify-between items-center focus:outline-none hover:bg-slate-700/50 transition-colors" onclick="toggleAcc('acc3')">
                        <span class="flex items-center gap-3"><span class="text-xl">🏆</span> Kuis dan Syarat Kelulusan</span>
                        <span id="icon-acc3" class="transform transition-transform text-slate-400">▼</span>
                    </button>
                    <div id="acc3" class="hidden px-6 pb-6 text-slate-300 text-sm bg-slate-900/50 pt-4 border-t border-slate-700">
                        <ul class="space-y-6"> <li class="flex items-start gap-3">
                                <span class="bg-blue-600 text-white w-5 h-5 flex items-center justify-center rounded-full text-[10px] shrink-0 mt-0.5">!</span>
                                <div class="w-full">
                                    <strong>Mini-Quiz Formatif:</strong> Berada di akhir setiap sub-bab. Harus dijawab dengan benar untuk menuntaskan bab tersebut.
                                    <div class="mt-3 rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                                        <img src="{{ asset('images/Petunjuk_Kuis1.png') }}" alt="Tampilan Pengerjaan Kuis" class="w-full h-auto object-cover">
                                    </div>
                                </div>
                            </li>
                            
                            <li class="flex items-start gap-3">
                                <span class="bg-blue-600 text-white w-5 h-5 flex items-center justify-center rounded-full text-[10px] shrink-0 mt-0.5">!</span>
                                <div class="w-full">
                                    <strong>Evaluasi Akhir (Sumatif):</strong> Digunakan untuk mengukur pemahaman keseluruhan di akhir setiap Bab.
                                    <div class="mt-3 rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                                        <img src="{{ asset('images/Petunjuk_Kuis2.png') }}" alt="Tampilan Evaluasi Akhir" class="w-full h-auto object-cover">
                                    </div>
                                </div>
                            </li>
                            
                            <li class="flex items-start gap-3">
                                <span class="bg-blue-600 text-white w-5 h-5 flex items-center justify-center rounded-full text-[10px] shrink-0 mt-0.5">!</span>
                                <div class="w-full">
                                    <strong>Syarat Kelulusan:</strong> Pastikan nilai evaluasi akhir kamu memenuhi standar <strong>KKM (Nilai 70)</strong> agar bisa melanjutkan ke bab berikutnya. Jika gagal, kamu bisa mengulanginya kembali.
                                    <div class="mt-3 rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                                        <img src="{{ asset('images/Petunjuk_Kuis3.png') }}" alt="Tampilan Hasil Kelulusan dan KKM" class="w-full h-auto object-cover">
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                
                {{-- ACCORDION 4 --}}
                <div class="border border-slate-700 rounded-xl bg-slate-800 overflow-hidden">
                    <button class="w-full text-left px-6 py-4 font-bold text-white flex justify-between items-center focus:outline-none hover:bg-slate-700/50 transition-colors" onclick="toggleAcc('acc4')">
                        <span class="flex items-center gap-3"><span class="text-xl">🕹️</span> Fitur Simulator Interaktif</span>
                        <span id="icon-acc4" class="transform transition-transform text-slate-400">▼</span>
                    </button>
                    <div id="acc4" class="hidden px-6 pb-6 text-slate-300 text-sm bg-slate-900/50 pt-4 border-t border-slate-700">
                        <p class="mb-3">Media ini dirancang untuk membantumu memahami materi secara teknis (bukan sekadar teori). Kamu akan menemukan kotak <strong>Simulator Lab</strong> di tengah materi.</p>
                        
                        <ol class="list-decimal pl-5 space-y-2 mb-5">
                            <li>Gunakan <strong>Slider/Tombol Geser</strong> untuk mengubah angka parameter secara *real-time*.</li>
                            <li>Tekan tombol <strong>"Proses Data" / "Deteksi"</strong> untuk melihat bagaimana komputer mengeksekusi rumus tersebut.</li>
                            <li>Amati perubahan pada grafik atau tabel yang terjadi akibat interaksimu.</li>
                        </ol>

                        <div class="rounded-lg overflow-hidden border border-slate-600 shadow-lg">
                            <img src="{{ asset('images/Petunjuk_Simulator.png') }}" alt="Tampilan Fitur Simulator DataViz Studio" class="w-full h-auto object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. PROFIL PENGEMBANG & ATRIBUSI --}}
    <section id="profil" class="py-20 relative z-10 bg-[#161b22] border-t border-slate-800">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-black text-white mb-4 tracking-wide uppercase">Tentang Media Ini</h2>
                <div class="w-20 h-1 bg-eduPrimary mx-auto rounded-full"></div>
            </div>

            <div class="bg-slate-800 border-t-4 border-t-eduPrimary rounded-2xl p-6 md:p-10 shadow-2xl mb-8">
                <h3 class="text-lg font-bold text-blue-400 mb-6 flex items-center gap-2 border-b border-slate-700 pb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Informasi Pengembangan
                </h3>
                
                <p class="text-sm text-slate-400 mb-8 text-center max-w-2xl mx-auto italic">
                    Media pembelajaran ini dibuat untuk memenuhi persyaratan penyelesaian studi Program Strata-1 Pendidikan Komputer.
                </p>

                <h4 class="text-xl md:text-2xl font-black text-white text-center mb-10 leading-relaxed uppercase">
                    Pengembangan Media Pembelajaran Berbasis Web Pada Materi Visualisasi dan Pengelompokan Data Menggunakan Metode Tutorial Untuk Siswa SMA
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-10 text-sm">
                    <div class="border-b border-slate-700/50 pb-2">
                        <span class="block text-slate-500 font-bold uppercase tracking-widest text-[10px] mb-1">Nama Peneliti</span>
                        <span class="text-white font-medium text-base">Muhammad Fikri Ramadhan</span>
                    </div>
                    <div class="border-b border-slate-700/50 pb-2">
                        <span class="block text-slate-500 font-bold uppercase tracking-widest text-[10px] mb-1">Email / Kontak</span>
                        <span class="text-blue-400 font-medium">2210131210001@mhs.ulm.ac.id</span>
                    </div>
                    <div class="border-b border-slate-700/50 pb-2">
                        <span class="block text-slate-500 font-bold uppercase tracking-widest text-[10px] mb-1">Dosen Pembimbing 1</span>
                        <span class="text-white font-medium">Drs. Harja Santana Purba, M.Kom., Ph.D.</span>
                    </div>
                    <div class="border-b border-slate-700/50 pb-2">
                        <span class="block text-slate-500 font-bold uppercase tracking-widest text-[10px] mb-1">Dosen Pembimbing 2</span>
                        <span class="text-white font-medium">Delsika Pramata Sari, S.Pd., M.Pd</span>
                    </div>
                    <div class="border-b border-slate-700/50 pb-2">
                        <span class="block text-slate-500 font-bold uppercase tracking-widest text-[10px] mb-1">Program Studi</span>
                        <span class="text-white font-medium">S-1 Pendidikan Komputer</span>
                    </div>
                    <div class="border-b border-slate-700/50 pb-2">
                        <span class="block text-slate-500 font-bold uppercase tracking-widest text-[10px] mb-1">Instansi</span>
                        <span class="text-white font-medium">Universitas Lambung Mangkurat</span>
                    </div>
                </div>
            </div>

            {{-- Atribusi & Pusat Bantuan --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                {{-- TAB: Daftar Pustaka & Atribusi (Lebar 2 Kolom) --}}
                <div class="lg:col-span-2 bg-slate-800 border-l-4 border-l-purple-500 p-6 rounded-xl shadow-lg border-y border-r border-slate-700">
                    <h4 class="font-bold text-white mb-4 flex items-center gap-2"><span>📑</span> Referensi & Atribusi</h4>
                    
                    {{-- Navigasi Tabs --}}
                    <div class="flex border-b border-slate-700 mb-4">
                        <button onclick="switchTab('pustaka')" id="tab-btn-pustaka" class="px-4 py-2 text-sm font-bold border-b-2 border-purple-500 text-purple-400 transition-colors focus:outline-none">
                            Daftar Pustaka
                        </button>
                        <button onclick="switchTab('atribusi')" id="tab-btn-atribusi" class="px-4 py-2 text-sm font-semibold border-b-2 border-transparent text-slate-400 hover:text-slate-300 transition-colors focus:outline-none">
                            Atribusi
                        </button>
                    </div>

                    {{-- Isi Tab: Daftar Pustaka --}}
                    <div id="tab-content-pustaka" class="text-sm text-slate-300 animate-fade-in">
                        <ul class="space-y-3 leading-relaxed">
                            <li class="flex items-start gap-3">
                                <span class="text-purple-400 mt-1">✔</span> 
                                <span>Basra, N., Singh, D., & Kaur, K. (2025). Introduction to data visualization. In S. Chopra, N. Basra, Simran, & D. Mohapatra (Eds.), <em>Fundamentals of data handling and visualization</em> (pp. 7-42). Kolhapur: Bhumi Publishing.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-purple-400 mt-1">✔</span> 
                                <span>Ikhwanudin, A., & Purbo, O. (2025). Data Adalah Kunci: Membangun Fondasi Pembelajaran AI. In A. Ikhwanudin, & O. W. Purbo, <em>AI di tanganmu: Dari teori ke proyek nyata dan masa depan teknologi (Buku AI SMA kelas 10 semester 2)</em> (pp. 29-44). Institut Teknologi Tangerang Selatan.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-purple-400 mt-1">✔</span> 
                                <span>Junaidi, & Purbo, O. (2025). Pengenalan Orange Data Mining, Eksplorasi Dataset Sederhana: Buah, Cuaca, Emosi T, dan Visualisasi Data & Pengelompokan. In Junaidi, & O. W. Purbo, <em>Langkah awal jadi data scientist: AI, visualisasi, dan analisis emosi (Buku AI SMA kelas 11 semester 1)</em> (pp. 45-94). Institut Teknologi Tangerang Selatan.</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Isi Tab: Atribusi --}}
                    <div id="tab-content-atribusi" class="hidden text-sm text-slate-300 animate-fade-in">
                        <ul class="space-y-3 leading-relaxed">
                            <li class="flex items-start gap-3">
                                <span class="text-purple-400 mt-1">✔</span> 
                                <span>Desain antarmuka (UI) dikembangkan menggunakan framework <a href="https://tailwindcss.com/" target="_blank" class="text-blue-400 hover:underline">Tailwind CSS</a>.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-purple-400 mt-1">✔</span> 
                                <span>Sistem tutorial interaktif (pop-up panduan) ditenagai oleh pustaka <a href="https://driverjs.com/" target="_blank" class="text-blue-400 hover:underline">Driver.js</a>.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-purple-400 mt-1">✔</span> 
                                <span>Simulator algoritma terinspirasi dari antarmuka visual <a href="https://orangedatamining.com/" target="_blank" class="text-blue-400 hover:underline">Orange Data Mining</a>.</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- BOX: Pusat Bantuan (Lebar 1 Kolom) --}}
                <div class="lg:col-span-1 bg-slate-800 border-l-4 border-l-teal-500 p-6 rounded-xl shadow-lg border-y border-r border-slate-700 h-fit">
                    <h4 class="font-bold text-white mb-4 flex items-center gap-2"><span>📞</span> Pusat Bantuan</h4>
                    <p class="text-sm text-slate-400 mb-6">Jika mengalami kendala teknis (login gagal, materi terkunci, bug), silakan hubungi kontak berikut:</p>
                    
                    <div class="space-y-4 text-sm bg-slate-900/50 p-4 rounded-lg border border-slate-700/50">
                        <div class="flex items-center gap-3 text-slate-300">
                            <span class="text-lg">📧</span> 
                            <a href="mailto:2210131210001@mhs.ulm.ac.id" class="text-teal-400 font-semibold hover:text-teal-300 transition-colors break-all">2210131210001@mhs.ulm.ac.id</a>
                        </div>
                        <div class="flex items-center gap-3 text-slate-300">
                            <span class="text-lg">💬</span> 
                            <a href="https://wa.me/6285824427310" target="_blank" class="text-teal-400 font-semibold hover:text-teal-300 transition-colors">+62 858-2442-7310 (WA)</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-black border-t border-slate-800 py-8 relative z-10 text-center">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-center space-x-2 mb-4 opacity-50">
                <div class="w-6 h-6 bg-slate-700 rounded flex items-center justify-center text-white font-bold text-xs">V</div>
                <span class="text-lg font-bold text-slate-400">VisualData.</span>
            </div>
            <p class="text-slate-600 text-xs tracking-wider uppercase font-semibold">
                © {{ date('Y') }} Muhammad Fikri Ramadhan - Pendidikan Komputer ULM. All rights reserved.
            </p>
        </div>
    </footer>

    {{-- SCRIPT ACCORDION --}}
    <script>
        function toggleAcc(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById('icon-' + id);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
    </script>

    {{-- SCRIPT UNTUK TABS DAFTAR PUSTAKA --}}
    <script>
        function switchTab(tabName) {
            const btnPustaka = document.getElementById('tab-btn-pustaka');
            const btnAtribusi = document.getElementById('tab-btn-atribusi');
            const contentPustaka = document.getElementById('tab-content-pustaka');
            const contentAtribusi = document.getElementById('tab-content-atribusi');

            if (tabName === 'pustaka') {
                // Aktifkan Pustaka
                btnPustaka.className = "px-4 py-2 text-sm font-bold border-b-2 border-purple-500 text-purple-400 transition-colors focus:outline-none";
                btnAtribusi.className = "px-4 py-2 text-sm font-semibold border-b-2 border-transparent text-slate-400 hover:text-slate-300 transition-colors focus:outline-none";
                contentPustaka.classList.remove('hidden');
                contentAtribusi.classList.add('hidden');
            } else {
                // Aktifkan Atribusi
                btnAtribusi.className = "px-4 py-2 text-sm font-bold border-b-2 border-purple-500 text-purple-400 transition-colors focus:outline-none";
                btnPustaka.className = "px-4 py-2 text-sm font-semibold border-b-2 border-transparent text-slate-400 hover:text-slate-300 transition-colors focus:outline-none";
                contentAtribusi.classList.remove('hidden');
                contentPustaka.classList.add('hidden');
            }
        }
    </script>

    {{-- DRIVER.JS SCRIPT (Diperbarui narasinya) --}}
    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const driver = window.driver.js.driver;

            const driverObj = driver({
                showProgress: true,
                animate: true,
                allowClose: false,
                nextBtnText: 'Lanjut →',
                prevBtnText: '← Kembali',
                doneBtnText: 'Selesai',
                popoverClass: 'driverjs-theme',
                steps: [
                    { element: '#nav-kompetensi', popover: { title: 'Kompetensi', description: 'Lihat daftar KI, KD, dan Indikator yang akan dicapai di sini.' } },
                    { element: '#nav-materi', popover: { title: 'Daftar Materi', description: 'Lihat daftar silabus Bab yang akan kamu pelajari.' } },
                    { element: '#nav-petunjuk', popover: { title: 'Petunjuk Penggunaan', description: 'Baca panduan lengkap cara menggunakan sistem pembelajaran ini.' } },
                    { element: '#nav-profil', popover: { title: 'Profil & Info', description: 'Informasi mengenai peneliti dan atribusi aplikasi.' } },
                ]
            });

            // Jalankan tour otomatis untuk pengguna baru
            if (!localStorage.getItem('tutorial_landing_v2')) {
                setTimeout(() => {
                    driverObj.drive();
                    localStorage.setItem('tutorial_landing_v2', 'true');
                }, 1000);
            }
        });
    </script>

</body>
</html>