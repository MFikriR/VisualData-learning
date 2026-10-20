<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VisualData - Media Pembelajaran Interaktif</title>

    {{-- FONT & DRIVER.JS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>

    {{-- TAILWIND & CUSTOM STYLES --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['SF Pro Text', 'SF Pro Display', 'Inter', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['SF Pro Display', 'Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    {{-- CSS TERPISAH --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body class="antialiased">

    {{-- PARTIKEL LATAR --}}
    <div class="data-particles">
        <div class="particle" style="left:10%; width:4px; height:4px; animation-duration:8s;"></div>
        <div class="particle" style="left:30%; width:6px; height:6px; animation-duration:15s; animation-delay:1s;"></div>
        <div class="particle" style="left:70%; width:8px; height:8px; animation-duration:12s; animation-delay:2s;"></div>
        <div class="particle" style="left:50%; width:5px; height:5px; animation-duration:10s; animation-delay:0.5s;"></div>
        <div class="particle" style="left:85%; width:7px; height:7px; animation-duration:14s; animation-delay:3s;"></div>
    </div>

    {{-- NAVBAR --}}
    <nav class="global-nav fixed w-full z-50 top-0 start-0 px-6">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between">
            <a href="#" class="flex items-center gap-2 no-underline">
                <div class="w-5 h-5 bg-[#0066cc] rounded flex items-center justify-center text-xs font-bold text-white">V</div>
                <span class="text-white text-sm font-semibold tracking-tight">Visual Data</span>
            </a>

            <div class="hidden lg:flex items-center gap-6">
                <a id="nav-beranda" href="#" class="btn-nav-ghost">Beranda</a>
                <a id="nav-kompetensi" href="#kompetensi" class="btn-nav-ghost">Kompetensi</a>
                <a id="nav-materi" href="#daftar-materi" class="btn-nav-ghost">Daftar Materi</a>
                <a id="nav-petunjuk" href="#petunjuk" class="btn-nav-ghost">Petunjuk</a>
                <a id="nav-profil" href="#profil" class="btn-nav-ghost">Tentang Media</a>
            </div>

            <div class="flex items-center gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary !text-xs !py-1.5 !px-4">Masuk Kelas →</a>
                    @else
                        <a href="{{ route('role.selection') }}" class="btn-nav-ghost">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-nav-dark">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    {{-- 1. HERO --}}
    <section class="tile-light relative flex items-center justify-center min-h-screen pt-32 pb-20 px-6">
        <div class="absolute top-1/5 left-1/2 -translate-x-1/2 w-[600px] h-[400px] bg-[#0066cc]/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative text-center max-w-[860px] mx-auto">
            <div class="badge-pill mb-8">
                Media Pembelajaran Interaktif Berbasis Web
            </div>

            <h1 class="hero-h1 mb-6">
                Mari Belajar<br>
                <span class="text-primary">Visualisasi</span> dan<br>
                <span class="text-primary">Pengelompokan Data</span>
            </h1>

            <p class="hero-lead max-w-[600px] mx-auto mb-10">
                Pelajari materi konsep data, pengolahan data, visualisasi data, dan pengelompokan data
                melalui media pembelajaran interaktif berbasis web ini.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-16">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-store-hero">Mulai Belajar</a>
                @else
                    <a href="{{ route('register') }}" class="btn-store-hero">Daftar & Mulai Belajar</a>
                @endauth
                <a href="#daftar-materi" class="btn-secondary">Lihat Materi</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="stat-card"><div class="stat-num">3</div><div class="stat-label">Bab Pembelajaran</div></div>
                <div class="stat-card"><div class="stat-num">10+</div><div class="stat-label">Materi Interaktif</div></div>
                <div class="stat-card"><div class="stat-num">100%</div><div class="stat-label">Berbasis Web</div></div>
            </div>
        </div>
    </section>

    {{-- 2. KOMPETENSI --}}
    <section id="kompetensi" class="tile-parchment py-20 px-6">
        <div class="max-w-[1100px] mx-auto">
            <div class="text-center mb-12">
                <p class="section-eyebrow">Kurikulum</p>
                <h2 class="section-title">Capaian & Tujuan Pembelajaran</h2>
                <div class="section-divider"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-utility">
                    <div class="icon-badge mb-5">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold mb-3 tracking-tight">Capaian Pembelajaran</h3>
                    <p class="text-sm leading-relaxed text-[#333333]">
                        Pada akhir Fase F, peserta didik mampu memanfaatkan sumber data yang terbuka, terpercaya, dan legal
                        untuk mengumpulkan, mengolah, menyajikan, serta menginterpretasikan data secara efektif dan bertanggung
                        jawab guna mendukung pengambilan keputusan sederhana.
                    </p>
                </div>

                <div class="card-utility">
                    <div class="icon-badge mb-5">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold mb-3 tracking-tight">Tujuan Pembelajaran Bab 1</h3>
                    <ul class="text-sm leading-loose text-[#333333] pl-4 list-disc space-y-1">
                        <li>Menjelaskan pengertian data dan informasi.</li>
                        <li>Mengidentifikasi sumber data yang terbuka, terpercaya, dan legal.</li>
                        <li>Membedakan jenis serta struktur data.</li>
                        <li>Menerapkan tahapan pengolahan data.</li>
                        <li>Menerapkan prinsip etika data.</li>
                    </ul>
                </div>

                <div class="card-utility">
                    <div class="icon-badge mb-5">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3v18m8-14H7m10 4H7m8 4H7"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold mb-3 tracking-tight">Tujuan Pembelajaran Bab 2</h3>
                    <ul class="text-sm leading-loose text-[#333333] pl-4 list-disc space-y-1">
                        <li>Menjelaskan tujuan dan manfaat visualisasi data.</li>
                        <li>Membuat dan menginterpretasikan diagram batang, histogram, box plot, dan scatter plot.</li>
                        <li>Menjelaskan konsep kemiripan data dan clustering.</li>
                        <li>Menginterpretasikan hasil pengelompokan data sederhana.</li>
                        <li>Menggunakan aplikasi web untuk visualisasi dan clustering data.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. DAFTAR MATERI --}}
    <section id="daftar-materi" class="tile-dark py-20 px-6">
        <div class="max-w-[1100px] mx-auto">
            <div class="text-center mb-12">
                <p class="section-eyebrow !text-[#2997ff]">Silabus</p>
                <h2 class="section-title section-title-dark">Daftar Isi Materi</h2>
                <div class="section-divider"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-dark">
                    <span class="chip-label chip-label-dark">BAB 1</span>
                    <h3 class="text-base font-semibold text-white mb-4">Data dan Pengolahannya</h3>
                    <ul class="text-sm leading-loose text-[#cccccc] space-y-1">
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Pengertian Data & Informasi</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Sumber & Jenis Data (Kualitatif/Kuantitatif)</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Klasifikasi Struktur Data</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Tahapan Pengolahan Data</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Pembersihan Data (Data Cleaning)</li>
                    </ul>
                </div>

                <div class="card-dark">
                    <span class="chip-label chip-label-dark">BAB 2</span>
                    <h3 class="text-base font-semibold text-white mb-4">Visualisasi & Pengelompokan</h3>
                    <ul class="text-sm leading-loose text-[#cccccc] space-y-1">
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Pemilihan Jenis Visualisasi yang Tepat</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Diagram Batang & Histogram</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Box Plot & Deteksi Pencilan (Outlier)</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Scatter Plot & Analisis Korelasi</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Konsep Kemiripan & Algoritma K-Means</li>
                    </ul>
                </div>

                <div class="card-dark">
                    <div class="flex items-center justify-between mb-4">
                        <span class="chip-label chip-label-dark">Evaluasi</span>
                        <div class="w-9 h-9 rounded bg-[#2997ff]/10 flex items-center justify-center">
                            <svg width="18" height="18" fill="none" stroke="#2997ff" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-base font-semibold text-white mb-4">Uji Pemahaman</h3>
                    <ul class="text-sm leading-loose text-[#cccccc] space-y-1">
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Kuis Formatif (Mini-Quiz tiap materi)</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Refleksi Capaian Kompetensi Siswa</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Syarat Kelulusan KKM (Nilai 70)</li>
                        <li class="flex gap-2 items-start"><span class="text-primary-dark">→</span> Evaluasi Akhir Sumatif</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. PETUNJUK --}}
    <section id="petunjuk" class="tile-light py-20 px-6">
        <div class="max-w-[760px] mx-auto">
            <div class="text-center mb-12">
                <p class="section-eyebrow">Panduan</p>
                <h2 class="section-title">Petunjuk Penggunaan</h2>
                <div class="section-divider mb-4"></div>
                <p class="text-sm text-[#7a7a7a]">Pilih salah satu daftar di bawah untuk melihat tata cara penggunaan media pembelajaran.</p>
            </div>

            {{-- ACCORDION 1 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc1')">
                    <span class="flex items-center gap-3">Halaman Beranda & Daftar Akun</span>
                    <span id="icon-acc1" class="accordion-icon">▾</span>
                </button>
                <div id="acc1" class="accordion-body">
                    <p class="text-center my-4 text-sm text-[#333333]">Panduan langkah demi langkah untuk mendaftar akun dan masuk ke platform Visual Data.</p>
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-wrap gap-4 items-start">
                            <div class="step-image-box flex-none w-[240px]">
                                <img src="{{ asset('images/Petunjuk 1.png') }}" alt="Petunjuk Langkah 1" class="w-full h-auto max-h-[160px] object-contain">
                            </div>
                            <div class="flex-1 min-w-[200px] flex gap-3">
                                <div class="step-num">1</div>
                                <div>
                                    <p class="font-semibold text-[#1d1d1f] mb-1">Akses Halaman Daftar</p>
                                    <p class="text-sm text-[#333333]">Klik menu <strong>Daftar</strong> pada Navbar atau tombol "Daftar Sekarang" pada Beranda.</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-start">
                            <div class="step-image-box flex-none w-[240px]">
                                <img src="{{ asset('images/Petunjuk 2.png') }}" alt="Petunjuk Langkah 2" class="w-full h-auto max-h-[160px] object-contain">
                            </div>
                            <div class="flex-1 min-w-[200px] flex gap-3">
                                <div class="step-num">2</div>
                                <div>
                                    <p class="font-semibold text-[#1d1d1f] mb-1">Lengkapi Data Diri</p>
                                    <p class="text-sm text-[#333333]">Isi formulir meliputi <strong>Nama Lengkap, Email (aktif), dan Kata Sandi</strong>.</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-start">
                            <div class="step-image-box flex-none w-[240px]">
                                <img src="{{ asset('images/Petunjuk 3.png') }}" alt="Petunjuk Langkah 3" class="w-full h-auto max-h-[160px] object-contain">
                            </div>
                            <div class="flex-1 min-w-[200px] flex gap-3">
                                <div class="step-num">3</div>
                                <div>
                                    <p class="font-semibold text-[#1d1d1f] mb-1">Konfirmasi Pendaftaran</p>
                                    <p class="text-sm text-[#333333]">Klik <strong>Daftar Sekarang</strong>. Kamu akan langsung masuk ke Dashboard Siswa.</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-start pt-5 border-t border-[#e0e0e0]">
                            <div class="step-image-box flex-none w-[240px]">
                                <img src="{{ asset('images/Petunjuk 4.png') }}" alt="Petunjuk Langkah 4" class="w-full h-auto max-h-[160px] object-contain">
                            </div>
                            <div class="flex-1 min-w-[200px] flex gap-3">
                                <div class="step-check">✓</div>
                                <div>
                                    <p class="font-semibold text-[#1d1d1f] mb-1">Opsi Lain: Masuk (Login)</p>
                                    <p class="text-sm text-[#333333]">Jika sudah punya akun, klik <strong>Masuk Kelas</strong> atau menu Masuk untuk login.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ACCORDION 2 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc2')">
                    <span class="flex items-center gap-3">Halaman Materi Belajar</span>
                    <span id="icon-acc2" class="accordion-icon">▾</span>
                </button>
                <div id="acc2" class="accordion-body">
                    <ol class="pl-5 flex flex-col gap-5 list-decimal mt-4">
                        <li>
                            Baca materi secara <strong>berurutan</strong>. Sub materi terkunci hanya terbuka setelah menyelesaikan materi sebelumnya.
                            <div class="step-image-box mt-3">
                                <img src="{{ asset('images/Petunjuk 5.png') }}" alt="Materi Terkunci" class="w-full h-auto object-cover">
                            </div>
                        </li>
                        <li>
                            Baca teks penjelasan dan amati <strong>Gambar/Video Animasi</strong> dengan saksama.
                            <div class="step-image-box mt-3">
                                <img src="{{ asset('images/Petunjuk 6.png') }}" alt="Simulasi Interaktif" class="w-full h-auto object-cover">
                            </div>
                        </li>
                        <li>
                            Gunakan tombol <strong>Materi Selanjutnya</strong> di bagian bawah untuk berpindah materi.
                            <div class="step-image-box mt-3">
                                <img src="{{ asset('images/Petunjuk 7.png') }}" alt="Tombol Selanjutnya" class="w-full h-auto object-cover">
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

            {{-- ACCORDION 3 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc3')">
                    <span class="flex items-center gap-3">Kuis dan Syarat Kelulusan</span>
                    <span id="icon-acc3" class="accordion-icon">▾</span>
                </button>
                <div id="acc3" class="accordion-body">
                    <ul class="flex flex-col gap-5 list-none p-0 mt-4">
                        <li class="flex gap-3 items-start">
                            <div class="w-5 h-5 rounded-full bg-[#0066cc] text-white text-xs flex items-center justify-center mt-0.5 shrink-0">!</div>
                            <div>
                                <strong>Mini-Quiz Formatif:</strong> Di akhir setiap sub-bab. Harus dijawab benar untuk menuntaskan bab.
                                <div class="step-image-box mt-2">
                                    <img src="{{ asset('images/Petunjuk_Kuis1.png') }}" alt="Kuis Formatif" class="w-full h-auto object-cover">
                                </div>
                            </div>
                        </li>
                        <li class="flex gap-3 items-start">
                            <div class="w-5 h-5 rounded-full bg-[#0066cc] text-white text-xs flex items-center justify-center mt-0.5 shrink-0">!</div>
                            <div>
                                <strong>Evaluasi Akhir (Sumatif):</strong> Mengukur pemahaman keseluruhan di akhir setiap Bab.
                                <div class="step-image-box mt-2">
                                    <img src="{{ asset('images/Petunjuk_Kuis2.png') }}" alt="Evaluasi Akhir" class="w-full h-auto object-cover">
                                </div>
                            </div>
                        </li>
                        <li class="flex gap-3 items-start">
                            <div class="w-5 h-5 rounded-full bg-[#0066cc] text-white text-xs flex items-center justify-center mt-0.5 shrink-0">!</div>
                            <div>
                                <strong>Syarat Kelulusan:</strong> Nilai evaluasi harus memenuhi <strong>KKM (Nilai 70)</strong>.
                                <div class="step-image-box mt-2">
                                    <img src="{{ asset('images/Petunjuk_Kuis3.png') }}" alt="Kelulusan KKM" class="w-full h-auto object-cover">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- ACCORDION 4 --}}
            <div class="accordion-item">
                <button class="accordion-btn" onclick="toggleAcc('acc4')">
                    <span class="flex items-center gap-3">Fitur Simulator Interaktif</span>
                    <span id="icon-acc4" class="accordion-icon">▾</span>
                </button>
                <div id="acc4" class="accordion-body">
                    <p class="mb-3 mt-4">Gunakan kotak <strong>Simulator Lab</strong> untuk memahami konsep secara langsung.</p>
                    <ol class="pl-5 flex flex-col gap-2 mb-4 text-sm list-decimal text-[#333333]">
                        <li>Gunakan <strong>Slider/Tombol Geser</strong> untuk mengubah parameter secara real-time.</li>
                        <li>Tekan <strong>"Proses Data" / "Deteksi"</strong> untuk melihat eksekusi rumus.</li>
                        <li>Amati perubahan pada grafik atau tabel.</li>
                    </ol>
                    <div class="step-image-box">
                        <img src="{{ asset('images/Petunjuk_Simulator.png') }}" alt="Simulator DataViz Studio" class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. PROFIL --}}
    <section id="profil" class="tile-parchment py-20 px-6">
        <div class="max-w-[960px] mx-auto">
            <div class="text-center mb-12">
                <p class="section-eyebrow">Pengembang</p>
                <h2 class="section-title">Tentang Media Ini</h2>
                <div class="section-divider"></div>
            </div>

            <div class="card-utility !border-t-4 !border-t-[#0066cc] mb-6">
                <div class="flex items-center gap-2 pb-4 mb-5 border-b border-[#e0e0e0]">
                    <svg width="18" height="18" fill="none" stroke="#0066cc" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-semibold text-[#0066cc]">Informasi Pengembangan</span>
                </div>

                <p class="text-sm text-center text-[#7a7a7a] italic mb-6 max-w-[560px] mx-auto">
                    Media pembelajaran ini dibuat untuk memenuhi persyaratan penyelesaian studi Program Strata-1 Pendidikan Komputer.
                </p>

                <h4 class="text-xl font-semibold text-center text-[#1d1d1f] leading-snug mb-8">
                    Pengembangan Media Pembelajaran Berbasis Web Pada Materi Visualisasi dan Pengelompokan Data Menggunakan Model Tutorial Untuk Siswa SMA
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4">
                    <div class="info-row"><p class="info-label">Nama Peneliti</p><p class="info-value font-semibold">Muhammad Fikri Ramadhan</p></div>
                    <div class="info-row"><p class="info-label">Email / Kontak</p><p class="info-value"><a href="mailto:2210131210001@mhs.ulm.ac.id" class="link-primary text-sm">2210131210001@mhs.ulm.ac.id</a></p></div>
                    <div class="info-row"><p class="info-label">Dosen Pembimbing 1</p><p class="info-value">Drs. Harja Santana Purba, M.Kom., Ph.D.</p></div>
                    <div class="info-row"><p class="info-label">Dosen Pembimbing 2</p><p class="info-value">Delsika Pramata Sari, S.Pd., M.Pd</p></div>
                    <div class="info-row"><p class="info-label">Program Studi</p><p class="info-value">S-1 Pendidikan Komputer</p></div>
                    <div class="info-row"><p class="info-label">Instansi</p><p class="info-value">Universitas Lambung Mangkurat</p></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="card-utility lg:col-span-2 !border-l-4 !border-l-[#0066cc]">
                    <h4 class="text-sm font-semibold mb-4 flex items-center gap-2">Referensi & Atribusi</h4>
                    <div class="tab-bar">
                        <button onclick="switchTab('pustaka')" id="tab-btn-pustaka" class="tab-btn active">Daftar Pustaka</button>
                        <button onclick="switchTab('atribusi')" id="tab-btn-atribusi" class="tab-btn">Atribusi</button>
                    </div>

                    <div id="tab-content-pustaka" class="animate-fade-in">
                        <ul class="list-none p-0 flex flex-col gap-3 text-xs leading-relaxed text-[#333333]">
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Basra, N., Singh, D., & Kaur, K. (2025). Introduction to data visualization. In <em>Fundamentals of data handling and visualization</em> (pp. 7-42). Bhumi Publishing.</span></li>
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Chaerani, D., et al. (2024). <em>Informatika untuk SMA/MA Kelas XI (Edisi Revisi)</em>. Kemendikbudristek RI.</span></li>
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Ikhwanudin, A., & Purbo, O. (2025). Data Adalah Kunci. In <em>AI di tanganmu</em> (pp. 29-44). ITTS.</span></li>
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Junaidi, & Purbo, O. (2025). Pengenalan Orange Data Mining. In <em>Langkah awal jadi data scientist</em> (pp. 45-94). ITTS.</span></li>
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Permana, B., et al. (2022). <em>Informatika untuk SMA/MA Kelas XII</em>. Kemendikbudristek RI.</span></li>
                        </ul>
                    </div>
                    <div id="tab-content-atribusi" class="hidden animate-fade-in">
                        <ul class="list-none p-0 flex flex-col gap-3 text-xs leading-relaxed text-[#333333]">
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>UI dikembangkan menggunakan <a href="https://tailwindcss.com/" target="_blank" class="link-primary">Tailwind CSS</a>.</span></li>
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Tutorial interaktif menggunakan <a href="https://driverjs.com/" target="_blank" class="link-primary">Driver.js</a>.</span></li>
                            <li class="flex gap-2"><span class="text-primary">✔</span> <span>Simulator terinspirasi dari <a href="https://orangedatamining.com/" target="_blank" class="link-primary">Orange Data Mining</a>.</span></li>
                        </ul>
                    </div>
                </div>

                <div class="card-utility !border-l-4 !border-l-[#0066cc]">
                    <h4 class="text-sm font-semibold mb-3">Pusat Bantuan</h4>
                    <p class="text-xs text-[#333333] mb-4 leading-relaxed">Kendala teknis (login gagal, materi terkunci, bug)? Hubungi:</p>
                    <div class="contact-box flex flex-col gap-3">
                        <div class="flex items-center gap-2">
                            <a href="mailto:2210131210001@mhs.ulm.ac.id" class="contact-link break-all">2210131210001@mhs.ulm.ac.id</a>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="https://wa.me/6285824427310" target="_blank" class="contact-link">+62 858-2442-7310 (WA)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-[#f5f5f7] border-t border-[#e0e0e0] py-10 px-6 text-center">
        <div class="flex items-center justify-center gap-2 mb-3 opacity-60">
            <div class="w-5 h-5 bg-[#0066cc] rounded flex items-center justify-center text-xs font-bold text-white">V</div>
            <span class="text-sm font-semibold text-[#1d1d1f]">Visual Data</span>
        </div>
        <p class="text-xs text-[#7a7a7a]">
            © {{ date('Y') }} Muhammad Fikri Ramadhan — Pendidikan Komputer ULM. All rights reserved.
        </p>
    </footer>

    {{-- SCRIPTS --}}
    <script>
        function toggleAcc(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById('icon-' + id);
            const isOpen = content.classList.contains('open');
            if (isOpen) {
                content.classList.remove('open');
                icon.classList.remove('open');
            } else {
                content.classList.add('open');
                icon.classList.add('open');
            }
        }

        function switchTab(tabName) {
            const btnPustaka   = document.getElementById('tab-btn-pustaka');
            const btnAtribusi  = document.getElementById('tab-btn-atribusi');
            const contPustaka  = document.getElementById('tab-content-pustaka');
            const contAtribusi = document.getElementById('tab-content-atribusi');

            if (tabName === 'pustaka') {
                btnPustaka.className  = 'tab-btn active';
                btnAtribusi.className = 'tab-btn';
                contPustaka.classList.remove('hidden');
                contAtribusi.classList.add('hidden');
            } else {
                btnAtribusi.className = 'tab-btn active';
                btnPustaka.className  = 'tab-btn';
                contAtribusi.classList.remove('hidden');
                contPustaka.classList.add('hidden');
            }
        }
    </script>

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
                    { element: '#nav-materi',     popover: { title: 'Daftar Materi', description: 'Lihat daftar silabus Bab yang akan kamu pelajari.' } },
                    { element: '#nav-petunjuk',   popover: { title: 'Petunjuk Penggunaan', description: 'Baca panduan lengkap cara menggunakan sistem pembelajaran ini.' } },
                    { element: '#nav-profil',     popover: { title: 'Profil & Info', description: 'Informasi mengenai peneliti dan atribusi aplikasi.' } },
                ]
            });
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