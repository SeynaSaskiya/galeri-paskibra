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