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