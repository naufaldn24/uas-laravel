<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title') - SMP Negeri 123</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gray-50 text-gray-800 antialiased font-sans transition-colors duration-300 dark:bg-gray-900 dark:text-gray-100">

    <!-- Navbar -->
    <header
        class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur shadow-sm transition-all duration-300">
        <div class="container mx-auto px-6 md:px-10 flex items-center justify-between py-4">
            <h1 class="text-xl font-bold text-blue-800 dark:text-white">SMP Negeri 123</h1>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="/"
                    class="{{ request()->is('/') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-600 dark:text-gray-300 hover:text-blue-600' }}">Beranda</a>
                <a href="/profil"
                    class="{{ request()->is('profil') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-600 dark:text-gray-300 hover:text-blue-600' }}">Profil</a>
                <a href="/visi-misi"
                    class="{{ request()->is('visi-misi') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-600 dark:text-gray-300 hover:text-blue-600' }}">Visi
                    & Misi</a>
                <a href="/berita-umum"
                    class="{{ request()->is('berita*') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-600 dark:text-gray-300 hover:text-blue-600' }}">Berita</a>
                <a href="/kontak"
                    class="{{ request()->is('kontak') ? 'text-blue-600 dark:text-blue-400 font-semibold' : 'text-gray-600 dark:text-gray-300 hover:text-blue-600' }}">Kontak</a>
                <input type="text" placeholder="Cari..."
                    class="px-2 py-1 rounded-md border text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-white focus:outline-none">
                <button id="dark-toggle"
                    class="ml-3 text-xl text-gray-600 dark:text-gray-300 hover:text-blue-600 transition">
                    <i class="fas fa-moon"></i>
                </button>
            </nav>

            <!-- Hamburger (Mobile) -->
            <button id="menu-toggle" class="md:hidden text-xl text-gray-600 dark:text-gray-300">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-6 pb-4 space-y-3 text-sm font-medium">
            <a href="/"
                class="block {{ request()->is('/') ? 'text-blue-600 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:text-blue-600' }}">Beranda</a>
            <a href="/profil"
                class="block {{ request()->is('profil') ? 'text-blue-600 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:text-blue-600' }}">Profil</a>
            <a href="/visi-misi"
                class="block {{ request()->is('visi-misi') ? 'text-blue-600 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:text-blue-600' }}">Visi
                & Misi</a>
            <a href="/berita-umum"
                class="block {{ request()->is('berita*') ? 'text-blue-600 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:text-blue-600' }}">Berita</a>
            <a href="/kontak"
                class="block {{ request()->is('kontak') ? 'text-blue-600 font-semibold' : 'text-gray-700 dark:text-gray-300 hover:text-blue-600' }}">Kontak</a>
            <div class="flex items-center gap-2">
                <input type="text" placeholder="Cari..."
                    class="w-full px-2 py-1 rounded-md border text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-white focus:outline-none">
                <button id="dark-toggle-mobile" class="text-lg text-gray-600 dark:text-gray-300">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t mt-20 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} SMP Negeri 123. All rights reserved.
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        // Mobile menu toggle
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        toggleBtn?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Dark mode toggle
        const darkBtn = document.getElementById('dark-toggle');
        const darkBtnMobile = document.getElementById('dark-toggle-mobile');
        const html = document.documentElement;

        function toggleDark() {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        }

        darkBtn?.addEventListener('click', toggleDark);
        darkBtnMobile?.addEventListener('click', toggleDark);

        // Load saved theme
        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }
    </script>

</body>

</html>