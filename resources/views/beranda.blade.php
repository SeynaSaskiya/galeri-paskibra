<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
    <title>PaskibraSMK Al-Hafidz Leuwiliang - Website Galeri Sekolah</title>
</head>
<body class="font-[Poppins] bg-[#F9F9FC]" style="padding-bottom: 0;">

    <!-- NAVBAR MINIMALIS -->
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center bg-white rounded-full" style="margin-top: 20px; padding: 10px 12px 10px 20px; box-shadow: 0 2px 16px rgba(0,0,0,0.04);">
        <a href="{{ route('home') }}" class="flex items-center" style="gap: 10px;">
            <div class="flex items-center justify-center bg-[#FF6B18] text-white" style="width: 34px; height: 34px; border-radius: 8px;">
                <img src="{{ asset('assets/images/icons/paskibra.logo.jpeg') }}" alt="icon" style="width: 34px; height: 34px;" />
            </div>
            <span class="font-bold" style="font-size: 14px; color: #1A1D26; letter-spacing: -0.3px;">SMK Al-Hafidz Leuwiliang</span>
        </a>

        <div class="flex items-center" style="gap: 4px;">
            <a href="{{ route('home') }}#Galeri-Sekolah" class="nav-link">Galeri</a>
            <a href="{{ route('home') }}#Informasi-Terkini" class="nav-link">Informasi</a>
            <a href="{{ route('home') }}#Agenda-Sekolah" class="nav-link">Agenda</a>
            <a href="{{ route('home') }}#Peta-Sekolah" class="nav-link">Peta</a>
            <div style="width: 1px; height: 20px; background: #E8EBF4; margin: 0 8px;"></div>
            @auth
            <a href="{{ url('/admin') }}" class="nav-cta">Dashboard</a>
            @else
            <a href="{{ url('/admin') }}" class="nav-cta">Login</a>
            @endauth
        </div>
    </nav>

    <!-- GALERI KEGIATAN SEKOLAH (CAROUSEL DINAMIS) -->
    <section id="Galeri-Sekolah" style="margin-top: 48px;">
        <div class="max-w-[1130px] mx-auto text-center" style="margin-bottom: 28px;">
            <span class="section-badge">GALERI SEKOLAH</span>
            <h2 class="section-title">Dokumentasi Kegiatan<br>Paskibra SMK Al-Hafidz</h2>
        </div>

        <div class="main-carousel max-w-[1130px] mx-auto">
            @forelse($galeries as $galeri)
                @php
                    $firstFoto = $galeri->fotos->first();
                    $postJudul = $galeri->post->judul ?? 'Galeri Sekolah';
                    $postUser = $galeri->post->user->name ?? 'Admin';
                    $postDate = $galeri->created_at->translatedFormat('d F, Y');
                @endphp
                <div class="featured-news-card relative w-full flex shrink-0 overflow-hidden" style="height: 440px; border-radius: 16px;">
                    @if($firstFoto)
                        <img src="{{ asset('storage/' . $firstFoto->file) }}" class="thumbnail absolute w-full h-full object-cover" alt="{{ $postJudul }}" />
                    @else
                        <div class="absolute w-full h-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Tidak ada foto</span>
                        </div>
                    @endif
                    <div class="absolute w-full h-full z-10" style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.1) 50%, transparent 100%);"></div>
                    <div class="w-full flex items-end justify-between relative z-20" style="padding: 40px;">
                        <div class="flex flex-col" style="gap: 8px; max-width: 680px;">
                            <span style="color: rgba(255,255,255,0.5); font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">
                                {{ $galeri->post->kategori->judul ?? 'Galeri Sekolah' }}
                            </span>
                            <a href="{{ route('post.show', $galeri->post) }}" class="font-bold text-white hover:underline transition-all duration-300" style="font-size: 30px; line-height: 1.25;">
                                {{ $postJudul }}
                            </a>
                            <p style="color: rgba(255,255,255,0.45); font-size: 13px;">{{ $postDate }} · Oleh {{ $postUser }}</p>
                        </div>
                        <div class="flex items-center" style="gap: 10px; margin-bottom: 20px;">
                            <button class="button--previous slider-btn"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" style="width: 14px; height: 14px;" /></button>
                            <button class="button--next slider-btn rotate-180"><img src="{{ asset('assets/images/icons/arrow.svg') }}" alt="arrow" style="width: 14px; height: 14px;" /></button>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback jika belum ada galeri -->
                <div class="featured-news-card relative w-full flex shrink-0 overflow-hidden" style="height: 440px; border-radius: 16px;">
                    <img src="{{ asset('assets/images/thumbnails/cover.png') }}" class="thumbnail absolute w-full h-full object-cover" alt="galeri" />
                    <div class="absolute w-full h-full z-10" style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.1) 50%, transparent 100%);"></div>
                    <div class="w-full flex items-end justify-between relative z-20" style="padding: 40px;">
                        <div class="flex flex-col" style="gap: 8px; max-width: 680px;">
                            <span style="color: rgba(255,255,255,0.5); font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">Galeri Sekolah</span>
                            <span class="font-bold text-white" style="font-size: 30px; line-height: 1.25;">
                                Belum Ada Galeri — Tambahkan via Dashboard
                            </span>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <!-- INFORMASI TERKINI & AGENDA SEKOLAH -->
    <section class="max-w-[1130px] mx-auto" style="margin-top: 72px;">
        <div class="flex" style="gap: 30px;">

            <!-- INFORMASI TERKINI (DINAMIS DARI POSTS) -->
            <div id="Informasi-Terkini" class="flex flex-col" style="gap: 24px; width: 66.6%;">
                <div class="flex justify-between items-end">
                    <div>
                        <span class="section-badge" style="text-align: left;">INFORMASI TERKINI</span>
                        <h2 class="section-title" style="text-align: left; font-size: 22px; margin-top: 6px;">Berita & Prestasi Terbaru</h2>
                    </div>
                    <a href="{{ route('home') }}#Informasi-Terkini" class="font-semibold text-[#FF6B18] text-sm hover:underline">Lihat Semua →</a>
                </div>

                <div class="flex" style="gap: 20px;">
                    @forelse($posts->take(2) as $post)
                        @php
                            // Ambil foto pertama dari galeri pertama post ini
                            $thumbnail = null;
                            if ($post->galeries->isNotEmpty()) {
                                $firstGaleri = $post->galeries->first();
                                if ($firstGaleri->fotos->isNotEmpty()) {
                                    $thumbnail = $firstGaleri->fotos->first()->file;
                                }
                            }
                        @endphp
                        <a href="{{ route('post.show', $post) }}" class="card-news" style="width: 50%;">
                            <div class="news-card-inner">
                                <div class="news-thumb">
                                    <span class="card-badge">{{ strtoupper($post->kategori->judul ?? 'BERITA') }}</span>
                                    @if($thumbnail)
                                        <img src="{{ asset('storage/' . $thumbnail) }}" class="object-cover w-full h-full news-img" alt="{{ $post->judul }}" />
                                    @else
                                        <img src="{{ asset('assets/images/thumbnails/th-building.png') }}" class="object-cover w-full h-full news-img" alt="{{ $post->judul }}" />
                                    @endif
                                </div>
                                <div class="flex flex-col" style="gap: 6px; padding: 4px 2px 0;">
                                    <h3 class="font-bold" style="font-size: 14px; line-height: 1.5; color: #1A1D26;">{{ $post->judul }}</h3>
                                    <p class="text-[#A3A6AE]" style="font-size: 12px; margin-top: auto;">{{ $post->created_at->translatedFormat('d M, Y') }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <!-- Fallback jika belum ada post -->
                        <div class="flex items-center justify-center w-full text-[#A3A6AE] font-medium" style="padding: 60px 0; background: #F1F5F9; border-radius: 16px;">
                            Belum ada informasi — Tambahkan post via Dashboard
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- AGENDA SEKOLAH (DINAMIS DARI POSTS) -->
            <div id="Agenda-Sekolah" class="flex flex-col" style="gap: 24px; width: 33.4%;">
                <div>
                    <span class="section-badge" style="text-align: left;">AGENDA SEKOLAH</span>
                    <h2 class="section-title" style="text-align: left; font-size: 22px; margin-top: 6px;">Jadwal Mendatang</h2>
                </div>

                <div class="flex flex-col" style="gap: 12px;">
                    @forelse($posts->skip(2)->take(3) as $post)
                        <a href="{{ route('post.show', $post) }}" class="card">
                            <div class="agenda-card-inner">
                                <div class="agenda-date">
                                    <span class="font-bold" style="font-size: 20px; line-height: 1;">{{ $post->created_at->format('d') }}</span>
                                    <span class="font-semibold" style="font-size: 10px;">{{ strtoupper($post->created_at->translatedFormat('M')) }}</span>
                                </div>
                                <div class="flex flex-col" style="gap: 4px; min-width: 0;">
                                    <h3 class="font-semibold line-clamp-2" style="font-size: 13px; line-height: 1.45; color: #1A1D26;">{{ $post->judul }}</h3>
                                    <p class="text-[#A3A6AE]" style="font-size: 11px;">{{ $post->kategori->judul ?? 'Umum' }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="flex items-center justify-center text-[#A3A6AE] font-medium" style="padding: 40px 0; background: #F1F5F9; border-radius: 16px; text-align: center; font-size: 13px;">
                            Belum ada agenda
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- PETA SEKOLAH -->
    <section id="Peta-Sekolah" class="max-w-[1130px] mx-auto" style="margin-top: 72px;">
        <div class="text-center" style="margin-bottom: 28px;">
            <span class="section-badge">PETA SEKOLAH</span>
            <h2 class="section-title">Denah & Lokasi Ruangan<br>Paskibra SMK Al-Hafidz Leuwiliang</h2>
        </div>

        <div class="bg-white overflow-hidden flex" style="border-radius: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.04); border: 1px solid #EEF0F7;">
            <div class="flex flex-col justify-center" style="width: 40%; padding: 48px 40px; gap: 16px;">
                <h3 class="font-bold" style="font-size: 20px; color: #1A1D26;">Fasilitas Lengkap</h3>
                <p class="text-[#A3A6AE]" style="font-size: 13px; line-height: 1.7;">
                    Jelajahi denah sekolah kami untuk menemukan ruang kelas, laboratorium komputer, perpustakaan, hingga fasilitas olahraga dengan mudah.
                </p>
                @if($petaSekolah && $petaSekolah->fotos->isNotEmpty())
                <a href="{{ asset('storage/' . $petaSekolah->fotos->first()->file) }}" target="_blank" class="nav-cta" style="width: fit-content; margin-top: 8px; display: inline-flex; align-items: center; gap: 6px;">
                    Lihat Peta HD ↗
                </a>
                @else
                <span class="text-[#A3A6AE] font-semibold" style="display: inline-block; padding: 10px 20px; background: #F1F5F9; border-radius: 50px; font-size: 13px; width: fit-content; margin-top: 8px;">Segera Hadir</span>
                @endif
            </div>
            <div style="width: 60%; height: 360px;" class="relative">
                @if($petaSekolah && $petaSekolah->fotos->isNotEmpty())
                    <img src="{{ asset('storage/' . $petaSekolah->fotos->first()->file) }}" class="w-full h-full object-cover" alt="Peta Sekolah" />
                @else
                    <div class="flex items-center justify-center w-full h-full text-[#A3A6AE] font-medium" style="background: #F1F5F9;">
                        Peta Sekolah Belum Tersedia
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer style="margin-top: 80px; border-top: 1px solid #EEF0F7; background: white;">
        <div class="max-w-[1130px] mx-auto flex justify-between items-center" style="padding: 24px 0;">
            <div class="flex items-center" style="gap: 8px;">
                <div>
                    <img src="{{ asset('assets/images/icons/paskibra.logo.jpeg') }}" alt="icon" style="width: 34px; height: 34px;" />
                </div>
                <span class="font-semibold text-[#A3A6AE]" style="font-size: 12px;">Paskibra SMK Al-Hafidz Leuwiliang</span>
            </div>
            <p class="text-[#A3A6AE]" style="font-size: 12px;">&copy; {{ date('Y') }} · Paskibra SMK Al-Hafidz Leuwiliang</p>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        $('.main-carousel').flickity({
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            autoPlay: 4000,
            wrapAround: true
        });
        var $carousel = $('.main-carousel').flickity();
        $('.button--previous').on('click', function() { $carousel.flickity('previous'); });
        $('.button--next').on('click', function() { $carousel.flickity('next'); });
    </script>
</body>
</html>