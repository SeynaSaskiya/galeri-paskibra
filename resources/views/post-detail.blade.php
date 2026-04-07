<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <title>{{ $post->judul }} — Paskibra SMK Al-Hafidz Leuwiliang</title>
    <meta name="description" content="{{ Str::limit(strip_tags($post->isi), 160) }}" />
    <style>
        /* ========== DETAIL PAGE STYLES ========== */
        .hero-detail {
            position: relative;
            width: 100%;
            height: 420px;
            border-radius: 20px;
            overflow: hidden;
        }

        .hero-detail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .hero-detail:hover img {
            transform: scale(1.04);
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 40%, rgba(0,0,0,0.05) 100%);
            z-index: 1;
        }

        .hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 2;
            padding: 48px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .breadcrumb a, .breadcrumb span {
            font-size: 12px;
            font-weight: 500;
            color: rgba(255,255,255,0.5);
            transition: color 0.2s ease;
        }

        .breadcrumb a:hover {
            color: #FF6B18;
        }

        .breadcrumb .separator {
            color: rgba(255,255,255,0.3);
        }

        .meta-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 16px;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: rgba(255,255,255,0.5);
        }

        .meta-item svg {
            width: 14px;
            height: 14px;
            opacity: 0.6;
        }

        .meta-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
        }

        /* Content area */
        .content-grid {
            display: flex;
            gap: 36px;
            margin-top: 48px;
        }

        .content-main {
            flex: 1;
            min-width: 0;
        }

        .content-sidebar {
            width: 320px;
            flex-shrink: 0;
        }

        .article-body {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            border: 1px solid #EEF0F7;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        /* Photo gallery section */
        .gallery-section {
            margin-top: 36px;
        }

        .gallery-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1A1D26;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .gallery-section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: #FF6B18;
            border-radius: 4px;
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .photo-grid-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            border: 1px solid #EEF0F7;
        }

        .photo-grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .photo-grid-item:hover img {
            transform: scale(1.08);
        }

        .photo-grid-item::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.3) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-grid-item:hover::after {
            opacity: 1;
        }

        .photo-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 12px;
            z-index: 2;
            font-size: 11px;
            font-weight: 600;
            color: white;
            opacity: 0;
            transform: translateY(6px);
            transition: all 0.3s ease;
        }

        .photo-grid-item:hover .photo-caption {
            opacity: 1;
            transform: translateY(0);
        }

        /* Sidebar */
        .sidebar-card {
            background: #fff;
            border-radius: 20px;
            padding: 28px;
            border: 1px solid #EEF0F7;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .sidebar-title {
            font-size: 15px;
            font-weight: 700;
            color: #1A1D26;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid #EEF0F7;
        }

        .related-post-item {
            display: flex;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid #F5F6FA;
            transition: all 0.25s ease;
        }

        .related-post-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .related-post-item:first-child {
            padding-top: 0;
        }

        .related-post-item:hover {
            transform: translateX(4px);
        }

        .related-post-thumb {
            width: 72px;
            height: 72px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .related-post-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .related-post-item:hover .related-post-thumb img {
            transform: scale(1.08);
        }

        .related-post-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 4px;
            min-width: 0;
        }

        .related-post-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1A1D26;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-post-info span {
            font-size: 11px;
            color: #A3A6AE;
        }

        /* Author card */
        .author-card {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px;
            background: #FAFBFD;
            border-radius: 14px;
            margin-top: 24px;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, #FF6B18, #FF9A5C);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }

        .author-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .author-info h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1A1D26;
        }

        .author-info span {
            font-size: 11px;
            color: #A3A6AE;
        }

        /* Back button */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #64748B;
            padding: 10px 20px;
            background: white;
            border-radius: 50px;
            border: 1px solid #EEF0F7;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .back-btn:hover {
            color: #FF6B18;
            border-color: rgba(255,107,24,0.3);
            transform: translateX(-3px);
        }

        /* Lightbox */
        .lightbox-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.9);
            z-index: 100;
            align-items: center;
            justify-content: center;
            cursor: zoom-out;
            animation: fadeIn 0.3s ease;
        }

        .lightbox-overlay.active {
            display: flex;
        }

        .lightbox-overlay img {
            max-width: 90%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 12px;
            animation: scaleIn 0.3s ease;
        }

        .lightbox-close {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 101;
        }

        .lightbox-close:hover {
            background: rgba(255,255,255,0.2);
            transform: scale(1.1);
        }

        .lightbox-close svg {
            width: 18px;
            height: 18px;
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Kategori tag */
        .kategori-tag {
            display: inline-block;
            padding: 5px 14px;
            background: rgba(255,107,24,0.12);
            color: #FF6B18;
            font-size: 11px;
            font-weight: 700;
            border-radius: 50px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            backdrop-filter: blur(4px);
        }

        .kategori-tag-white {
            background: rgba(255,255,255,0.15);
            color: white;
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,0.2);
        }
    </style>
</head>
<body class="font-[Poppins] bg-[#F9F9FC]" style="padding-bottom: 0;">

    <!-- NAVBAR -->
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center bg-white rounded-full" style="margin-top: 20px; padding: 10px 12px 10px 20px; box-shadow: 0 2px 16px rgba(0,0,0,0.04);">
        <a href="{{ route('home') }}" class="flex items-center" style="gap: 10px;">
            <div class="flex items-center justify-center bg-[#FF6B18] text-white" style="width: 34px; height: 34px; border-radius: 8px;">
                <img src="{{ asset('assets/images/icons/paskibra.logo.jpeg') }}" alt="icon" style="width: 34px; height: 34px;" />
            </div>
            <span class="font-bold" style="font-size: 14px; color: #1A1D26; letter-spacing: -0.3px;">Paskibra SMK Al-Hafidz Leuwiliang</span>
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

    <!-- HERO DETAIL -->
    <section class="max-w-[1130px] mx-auto" style="margin-top: 30px;">
        <a href="{{ route('home') }}" class="back-btn" style="margin-bottom: 20px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
            Kembali ke Beranda
        </a>

        <div class="hero-detail">
            @if($heroImage)
                <img src="{{ asset('storage/' . $heroImage) }}" alt="{{ $post->judul }}" />
            @else
                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #FF6B18 0%, #FF9A5C 50%, #FFD4B8 100%); display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
            @endif
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <span class="separator">›</span>
                    <span style="color: rgba(255,255,255,0.7);">{{ $post->kategori->judul ?? 'Berita' }}</span>
                </div>
                <span class="kategori-tag kategori-tag-white">{{ $post->kategori->judul ?? 'BERITA' }}</span>
                <h1 class="font-bold text-white" style="font-size: 32px; line-height: 1.3; margin-top: 12px; max-width: 720px;">{{ $post->judul }}</h1>
                <div class="meta-row">
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        {{ $post->created_at->translatedFormat('d F Y') }}
                    </div>
                    <div class="meta-dot"></div>
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        {{ $post->user->name ?? 'Admin' }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT + SIDEBAR -->
    <section class="max-w-[1130px] mx-auto content-grid">

        <!-- MAIN CONTENT -->
        <div class="content-main">
            <div class="article-body">
                <div id="Content-wrapper">
                    {!! $post->isi !!}
                </div>
            </div>

            <!-- GALERI FOTO -->
            @if($allPhotos->isNotEmpty())
            <div class="gallery-section">
                <div class="article-body" style="padding: 28px;">
                    <h3 class="gallery-section-title">Galeri Foto ({{ $allPhotos->count() }})</h3>
                    <div class="photo-grid">
                        @foreach($allPhotos as $foto)
                            <div class="photo-grid-item" onclick="openLightbox('{{ asset('storage/' . $foto->file) }}')">
                                <img src="{{ asset('storage/' . $foto->file) }}" alt="{{ $foto->judul ?? $post->judul }}" loading="lazy" />
                                @if($foto->judul)
                                    <span class="photo-caption">{{ $foto->judul }}</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- SIDEBAR -->
        <div class="content-sidebar">
            <!-- Author Card -->
            <div class="sidebar-card">
                <div class="sidebar-title">Ditulis Oleh</div>
                <div class="author-card" style="margin-top: 0;">
                    <div class="author-avatar">
                        {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="author-info">
                        <h4>{{ $post->user->name ?? 'Admin' }}</h4>
                        <span>{{ $post->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
                    </div>
                </div>
            </div>

            <!-- Kategori Info -->
            <div class="sidebar-card" style="margin-top: 20px;">
                <div class="sidebar-title">Kategori</div>
                <span class="kategori-tag">{{ $post->kategori->judul ?? 'Umum' }}</span>
            </div>

            <!-- Related Posts -->
            @if($relatedPosts->isNotEmpty())
            <div class="sidebar-card" style="margin-top: 20px;">
                <div class="sidebar-title">Postingan Terkait</div>
                @foreach($relatedPosts as $related)
                    @php
                        $relatedThumb = null;
                        if ($related->galeries->isNotEmpty()) {
                            $firstGal = $related->galeries->first();
                            if ($firstGal->fotos->isNotEmpty()) {
                                $relatedThumb = $firstGal->fotos->first()->file;
                            }
                        }
                    @endphp
                    <a href="{{ route('post.show', $related) }}" class="related-post-item">
                        <div class="related-post-thumb">
                            @if($relatedThumb)
                                <img src="{{ asset('storage/' . $relatedThumb) }}" alt="{{ $related->judul }}" loading="lazy" />
                            @else
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #FF6B18, #FF9A5C); display: flex; align-items: center; justify-content: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="related-post-info">
                            <h4>{{ $related->judul }}</h4>
                            <span>{{ $related->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- FOOTER -->
    <footer style="margin-top: 80px; border-top: 1px solid #EEF0F7; background: white;">
        <div class="max-w-[1130px] mx-auto flex justify-between items-center" style="padding: 24px 0;">
            <div class="flex items-center" style="gap: 8px;">
                <div class="flex items-center justify-center bg-[#FF6B18] text-white" style="width: 26px; height: 26px; border-radius: 6px;">
                    <img src="{{ asset('assets/images/icons/paskibra.logo.jpeg') }}" alt="icon" style="width: 28px; height: 28px;" />
                </div>
                <span class="font-semibold text-[#A3A6AE]" style="font-size: 12px;">Paskibra SMK Al-Hafidz Leuwiliang</span>
            </div>
            <p class="text-[#A3A6AE]" style="font-size: 12px;">&copy; {{ date('Y') }} · Paskibra SMK Al-Hafidz Leuwiliang</p>
        </div>
    </footer>

    <!-- LIGHTBOX -->
    <div class="lightbox-overlay" id="lightbox" onclick="closeLightbox()">
        <button class="lightbox-close" onclick="closeLightbox()">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <img id="lightbox-img" src="" alt="Preview" />
    </div>

    <script>
        function openLightbox(src) {
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>
</body>
</html>
