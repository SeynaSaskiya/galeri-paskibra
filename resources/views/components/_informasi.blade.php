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