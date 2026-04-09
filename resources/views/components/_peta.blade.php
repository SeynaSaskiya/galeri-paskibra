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