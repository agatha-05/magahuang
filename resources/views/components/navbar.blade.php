<nav id="Navbar" class="max-w-[1130px] mx-auto flex flex-wrap justify-between items-center mt-[30px] px-4">

    {{-- LOGO, BRANDING, & MOBILE MENU TOGGLE (Always Visible) --}}
    <div class="logo-container flex items-center gap-2 sm:gap-4 md:gap-[30px] w-full md:w-auto justify-between">
        <a href="{{ route('front.index') }}" class="flex shrink-0">
            <img src="{{ asset('assets/images/logos/favicon.ico') }}" alt="logo" class="w-8 h-8 md:w-10 md:h-10" />
        </a>

        <a href="{{ route('front.index') }}" class="flex shrink-0">
            {{-- Teks Brand hanya tampil di layar 'sm' (sekitar tablet) ke atas --}}
            <span class="text-xl md:text-3xl font-extrabold text-[#8b0000] tracking-tight hidden sm:block">
                MagaHuang
            </span>
        </a>

        {{-- Divider (Sembunyi di Mobile) --}}
        <div class="hidden md:block h-10 border border-[#8b0000] shrink-0"></div>

        {{-- MOBILE MENU BUTTON (Hanya Tampil di Bawah Layar MD) --}}
        <button id="mobile-menu-button" class="md:hidden p-2 focus:outline-none">
            <svg class="w-6 h-6 text-[#8b0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
    </div>

    {{-- SEARCH FORM (Desktop Only) --}}
    <form method="GET" action="{{ route('front.search') }}"
        {{-- Hanya tampil di layar MD ke atas --}}
        class="hidden md:flex md:w-[450px] items-center rounded-full border border-[#8b0000] p-[12px_20px] gap-[10px]  focus-within:ring-2
        focus-within:ring-[#8b0000] transition-all duration-200">

        {{-- @csrf --}}

        <button type="submit" class="flex w-5 h-5 shrink-0">
            <img src="{{ asset('assets/images/icons/search-normal.svg') }}" alt="icon" />
        </button>
        <input type="text" name="keyword" id="search-desktop"
            class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#8b0000]"
            placeholder="Cari berita tren terbaru hari ini..." />
    </form>


    {{-- NAVIGATION BUTTONS & MOBILE MENU CONTENT --}}
    {{-- Di Desktop (md:flex): Tampil normal. Di Mobile (hidden): Sembunyi, hanya muncul saat burger menu diklik --}}
    <div id="nav-buttons"
        class="hidden md:flex items-center gap-3 w-full md:w-auto mt-4 md:mt-0 flex-col md:flex-row p-4 md:p-0 bg-white md:bg-transparent shadow-lg md:shadow-none rounded-lg z-10 transition-all duration-300">

        {{-- SEARCH FORM (Mobile Only - Full Width) --}}
        <form method="GET" action="{{ route('front.search') }}"
            class="flex md:hidden w-full items-center rounded-full border border-[#8b0000] p-[12px_20px] gap-[10px] focus-within:ring-2 focus-within:ring-[#8b0000] transition-all duration-200 mb-3">
            <button type="submit" class="flex w-5 h-5 shrink-0">
                <img src="{{ asset('assets/images/icons/search-normal.svg') }}" alt="icon" />
            </button>
            <input type="text" name="keyword" id="search-mobile"
                class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#8b0000]"
                placeholder="Cari berita tren terbaru hari ini..." />
        </form>

        {{-- TOMBOL PREMIUM DIPERBARUI --}}
        <a href="{{ route('front.premium') }}"
            class="rounded-full p-[12px_22px] flex justify-center gap-[10px] font-bold transition-all duration-200 bg-[#8b0000] font-semibold transition-all duration-300 border border-[#b22222] hover:ring-2 hover:ring-[#b22222] text-white w-full md:w-auto hover:shadow-[0_10px_20px_0_#b22222]" >Premium</a>

        {{-- TOMBOL PASANG IKLAN --}}
        <a href=""
            class="rounded-full p-[12px_22px] flex justify-center gap-[10px] font-bold transition-all duration-200 bg-[#8b0000] text-white hover:shadow-[0_10px_20px_0_#b22222] w-full md:w-auto">
            <div class="flex w-6 h-6 shrink-0">
                <img src="{{ asset('assets/images/icons/ads.ico') }}" alt="icon" />
            </div>
            <span>Pasang Iklan</span>
        </a>
    </div>
</nav>

{{-- SCRIPT UNTUK MENGAKTIFKAN MENU MOBILE --}}
@push('after-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('mobile-menu-button');
        const navButtons = document.getElementById('nav-buttons');

        if (menuButton && navButtons) {
            menuButton.addEventListener('click', function () {
                // Toggle kelas 'hidden' untuk menampilkan/menyembunyikan menu
                navButtons.classList.toggle('hidden');
                
                // Pastikan menu selalu berbentuk kolom di mobile saat terlihat
                if (!navButtons.classList.contains('hidden')) {
                    navButtons.classList.add('flex');
                    navButtons.classList.remove('flex-row'); // Jaga agar tetap kolom
                    navButtons.classList.add('flex-col'); // Jaga agar tetap kolom
                } else {
                    navButtons.classList.remove('flex');
                }
            });
        }
    });
</script>
@endpush                                                                                                                                                                                                                                                                                                        