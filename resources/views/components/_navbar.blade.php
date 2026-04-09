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