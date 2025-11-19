<!DOCTYPE html>
<html lang="id">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
    <div class="logo-container flex gap-[30px] items-center">
        <!-- Logo Link -->
        <a href="{{ route('front.index') }}" class="flex shrink-0">
            <img src="{{ asset('assets/images/logos/favicon.ico') }}" alt="logo" />
        </a>

        <!-- Title/Nama Aplikasi yang Sekarang Bisa Diklik -->
        <a href="{{ route('front.index') }}" class="flex shrink-0">
            <span class="text-3xl font-extrabold text-[#8b0000] tracking-tight hidden sm:block">
                MagaHuang
            </span>
        </a>
    </nav>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Paket Premium - Contoh Web</title>
    <!-- Memuat Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Poppins atau fallback Sans-serif */
        .font-\[Poppins\] {
            font-family: 'Poppins', sans-serif;
        }
        body {
            /* Warna latar belakang cerah yang umum */
            background-color: #f7f7f7;
            font-family: 'Poppins', sans-serif;
        }
        .premium-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); /* Bayangan default yang halus */
        }
        /* Efek hover untuk kartu premium */
        .premium-card:hover {
            transform: translateY(-8px);
            /* Bayangan yang lebih menonjol saat hover */
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.1), 0 5px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
    <script>
        // Konfigurasi Tailwind dengan warna kustom yang terinspirasi dari tema Anda
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-teal': '#20B2AA', // Teal utama
                        'accent-orange': '#FF6B18', // Oranye aksen
                    }
                }
            }
        }

        // Fungsi sederhana untuk menangani klik tombol (menggantikan alert)
        function selectPlan(planName) {
            const messageBox = document.getElementById('message-box');
            const messageText = document.getElementById('message-text');
            
            // Tampilkan pesan
            messageText.textContent = `Anda telah memilih Paket ${planName}! Lanjutkan ke pembayaran.`;
            messageBox.classList.remove('hidden');
            messageBox.classList.add('flex');
            
            // Pastikan pesan berada di atas semua konten lain
            messageBox.style.zIndex = 50; 

            // Sembunyikan pesan setelah 3 detik
            setTimeout(() => {
                messageBox.classList.remove('flex');
                messageBox.classList.add('hidden');
            }, 3000);
        }
    </script>
</head>
<body class="font-[Poppins] min-h-screen">

    <!-- Kotak Pesan Modal Kustom (Pengganti alert()) -->
    <div id="message-box" class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-30">
        <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm mx-auto text-center border-t-4 border-primary-teal animate-fade-in">
            <p id="message-text" class="text-lg font-semibold text-gray-800"></p>
        </div>
    </div>

    <!-- Bagian Utama Halaman Premium -->
    <section class="py-16 md:py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                Pilihan Paket <span class="text-primary-teal">Premium</span>
            </h2>
            <p class="text-lg text-blue-600 mb-12 max-w-2xl mx-auto">
                Dapatkan akses tak terbatas, fitur eksklusif, dan tingkatkan potensi web Anda.
            </p>

            <!-- Grid Harga (Pricing Grid) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 md:gap-8">

                <!-- Kartu Paket 1: Dasar -->
                <div class="premium-card bg-white p-8 rounded-2xl shadow-xl border-2 border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Dasar</h3>
                        <p class="text-gray-500 mb-6">Cocok untuk pemula dan penggunaan personal.</p>
                        <div class="flex items-center justify-center mb-6">
                            <span class="text-5xl font-extrabold text-gray-900">Rp 0</span>
                            <span class="text-xl font-medium text-gray-500 ml-2">/ selamanya</span>
                        </div>
                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Akses fitur dasar
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                1 Proyek aktif
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                <span class="line-through text-gray-400">Bebas Iklan</span>
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                <span class="line-through text-gray-400">Dukungan Prioritas</span>
                            </li>
                        </ul>
                    </div>
                    <button onclick="selectPlan('Dasar')" class="w-full py-3 mt-4 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition duration-150 shadow-md">
                        Mulai Gratis
                    </button>
                </div>

                <!-- Kartu Paket 2: Pro (Paling Populer) - Disorot -->
                <div class="premium-card bg-white p-8 rounded-2xl shadow-2xl ring-4 ring-primary-teal flex flex-col justify-between transform lg:scale-110 z-10">
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider bg-accent-orange text-white py-1 px-3 rounded-full inline-block mb-3 shadow-lg">
                            Paling Populer
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Pro</h3>
                        <p class="text-gray-500 mb-6">Pilihan terbaik untuk profesional dan tim kecil.</p>
                        <div class="flex items-center justify-center mb-6">
                            <span class="text-base font-medium text-gray-500 mr-1">Rp</span>
                            <span class="text-6xl font-extrabold text-blue-500 mr-1">59K</span>
                            <span class="text-xl font-medium text-gray-500 ml-2">/ bulan</span>
                        </div>
                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700 font-semibold">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-gray-900">Semua fitur Dasar</span>
                            </li>
                            <li class="flex items-center text-gray-700 font-semibold">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-gray-900">Bebas Iklan</span> (pengalaman bersih)
                            </li>
                            <li class="flex items-center text-gray-700 font-semibold">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Proyek tidak terbatas
                            </li>
                            <li class="flex items-center text-gray-700 font-semibold">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Dukungan Prioritas 24/7
                            </li>
                        </ul>
                    </div>
                    <button onclick="selectPlan('Pro')" class="w-full py-4 mt-4 bg-primary-teal text-white font-bold rounded-lg hover:bg-teal-600 transition duration-150 shadow-lg shadow-primary-teal/50">
                        Pilih Paket Pro
                    </button>
                </div>

                <!-- Kartu Paket 3: Platinum -->
                <div class="premium-card bg-white p-8 rounded-2xl shadow-xl border-2 border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Platinum</h3>
                        <p class="text-gray-500 mb-6">Kekuatan penuh untuk perusahaan dan agensi.</p>
                        <div class="flex items-center justify-center mb-6">
                            <span class="text-base font-medium text-gray-500 mr-1">Rp</span>
                            <span class="text-5xl font-extrabold text-gray-900">129K</span>
                            <span class="text-xl font-medium text-gray-500 ml-2">/ bulan</span>
                        </div>
                        <ul class="text-left space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Semua fitur Pro
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Fitur Eksklusif (beta access)
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Analisis Mendalam & Laporan Khusus
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Manajer Akun Khusus
                            </li>
                        </ul>
                    </div>
                    <button onclick="selectPlan('Platinum')" class="w-full py-3 mt-4 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-700 transition duration-150 shadow-md">
                        Daftar Platinum
                    </button>
                </div>

            </div>
            <!-- Akhir Grid Harga -->

        </div>
    </section>

    <!-- Bagian FAQ/Jaminan Kepuasan (Pelengkap) -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h3 class="text-3xl font-bold text-gray-900 mb-8">Pertanyaan Umum (FAQ)</h3>
            <div class="space-y-4 text-left">
                <!-- Item FAQ 1 -->
                <details class="group bg-white p-4 rounded-xl shadow-sm cursor-pointer ring-1 ring-primary-teal/20 transition-all duration-300 hover:ring-2 hover:ring-accent-orange/50">
                    <summary class="flex justify-between items-center font-medium text-primary-teal list-none">
                        <span>Apakah saya bisa membatalkan langganan kapan saja?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <p class="text-gray-600 mt-2 pt-2 border-t border-gray-100">Ya, Anda dapat membatalkan paket premium Anda kapan saja tanpa biaya tersembunyi. Akses premium akan tetap aktif hingga akhir periode penagihan yang sudah dibayar.</p>
                </details>
                <!-- Item FAQ 2 -->
                <details class="group bg-white p-4 rounded-xl shadow-sm cursor-pointer ring-1 ring-primary-teal/20 transition-all duration-300 hover:ring-2 hover:ring-accent-orange/50">
                    <summary class="flex justify-between items-center font-medium text-primary-teal list-none">
                        <span>Apa perbedaan utama antara Pro dan Platinum?</span>
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <p class="text-gray-600 mt-2 pt-2 border-t border-gray-100">Paket Platinum mencakup fitur analisis data yang lebih mendalam, akses awal ke fitur-fitur baru (beta), dan layanan Manajer Akun Khusus untuk dukungan dan konsultasi yang lebih personal.</p>
                </details>
            </div>
        </div>
    </section>

</body>
</html>