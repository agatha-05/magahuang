@extends('front.master')
@section('content')
    <body class="font-[Poppins]">
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
        class="hidden md:flex md:w-[450px] items-center rounded-full border border-[#8b0000] p-[12px_20px] gap-[10px] focus-within:ring-2
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
        
        <!-- Navigasi Kategori (Dibuat Responsif) -->
        <nav id="Category" class="max-w-[1130px] mx-auto flex flex-wrap justify-center items-center gap-4 mt-[30px] px-4">
            @foreach ($categories as $category)
            <a href="{{ route('front.category', $category->slug) }}" class="rounded-full p-[10px_18px] flex gap-[8px] font-semibold text-sm transition-all duration-300 border border-[#1560bd] hover:ring-2 hover:ring-[#1560bd] shrink-0">
                <div class="flex w-5 h-5 shrink-0">
                    <img src="{{ Storage::url($category->icon) }}" alt="icon" />
                </div>
                <span class="hidden sm:inline">{{ $category->name }}</span>
            </a>
            @endforeach
        </nav>
        
        <!-- Bagian Heading dan Form Pencarian (Dibuat Responsif) -->
        <section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px] px-4">
            <h1 class="text-3xl sm:text-4xl leading-tight sm:leading-[45px] font-bold text-center">
                Explore Hot Trending <br class="hidden sm:inline" />
                Good News Today
            </h1>
            <form action="{{ route('front.search') }}" method="GET" class="w-full max-w-[500px]">
                <label for="search-bar" class="w-full flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#1560bd] focus-within:ring-2 focus-within:ring-[#1560bd] rounded-[50px] group">
                    <div class="flex w-5 h-5 shrink-0">
                        <img src="{{ asset('assets/images/icons/search-normal.svg') }}" alt="icon" />
                    </div>
                    <input
                        autocomplete="off"
                        type="text"
                        id="search-bar"
                        name="keyword"
                        placeholder="Search hot trendy news today..."
                        class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full"
                    />
                </label>
            </form>
        </section>

        <!-- Bagian Rekomendasi Artikel Trending (Updated Grid for responsiveness) -->
        <!-- Bagian ini akan tampil jika hasil pencarian kosong (articles->isEmpty()) -->
        @if ($articles->isEmpty())
        <section id="trending-articles" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] px-4">
            <h2 class="text-[26px] leading-[39px] font-bold text-[#1560bd]">Artikel Trending Hari Ini</h2>
            
            <p class="text-gray-500 -mt-5">Tidak ada artikel yang cocok dengan kata kunci "{{ ucfirst($keyword) }}". Berikut adalah rekomendasi artikel terpopuler:</p>

            {{-- Grid responsif: 1 kolom di mobile, 2 di tablet, 3 di desktop --}}
            <div id="search-cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">
                {{-- Asumsi Anda memiliki variabel $trendingArticles yang berisi artikel trending --}}
                @forelse ($trendingArticles as $article) 
                <a href="{{ route('front.details', $article->slug) }}" class="card">
                    <div
                        class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#1560bd] hover:ring-2 hover:ring-[#1560bd] rounded-[20px] overflow-hidden bg-white">
                        <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                            <div
                                class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                <p class="text-xs leading-[18px] font-bold uppercase">{{ $article->category->name }}</p>
                            </div>
                            <img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo"
                                class="object-cover w-full h-full" />
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold">
                                {{ substr($article->name, 0, 55) }}{{ strlen($article->name) > 55 ? '...':''}}
                            </h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                {{ $article->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </a>
                @empty
                    <p class="col-span-full text-lg text-red-500">Tidak ada artikel trending yang tersedia saat ini.</p>
                @endforelse
            </div>
        </section>
        <!-- Garis pemisah hanya ditampilkan jika ada hasil pencarian -->
        @else
        <div class="max-w-[1130px] mx-auto border-t border-[#1560bd] mt-[50px] px-4"></div>
        @endif

        <!-- Hasil Pencarian (Updated Grid for responsiveness) -->
        <section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[50px] mb-[100px] px-4 {{ $articles->isEmpty() ? 'hidden' : '' }}">
            <h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>{{ ucfirst($keyword) }}</span></h2>
            {{-- Grid responsif: 1 kolom di mobile, 2 di tablet, 3 di desktop --}}
            <div id="search-cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">
                @forelse ($articles as $article)
                <a href="{{ route('front.details', $article->slug) }}" class="card">
                    <div
                        class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#1560bd] hover:ring-2 hover:ring-[#1560bd] rounded-[20px] overflow-hidden bg-white">
                        <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
                            <div
                                class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
                                <p class="text-xs leading-[18px] font-bold uppercase">{{ $article->category->name }}</p>
                            </div>
                            <img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo"
                                class="object-cover w-full h-full" />
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="text-lg leading-[27px] font-bold">
                                {{ substr($article->name, 0, 55) }}{{ strlen($article->name) > 55 ? '...':''}}
                            </h3>
                            <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                {{ $article->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </a>
                @empty
                <p class="col-span-full text-lg text-red-500">belum ada artikel dengan keyword tersebut</p>
                @endforelse
            </div>
        </section>
    </body>
@endsection