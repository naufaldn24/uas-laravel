<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Website Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

    <nav id="navbar" class="bg-white shadow-md p-4 fixed top-0 left-0 w-full z-50 transition-transform duration-300 ease-in-out">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">SMP Negeri 123</h1>
            <ul class="flex gap-4">
                <li><a href="/" class="hover:text-blue-500">Beranda</a></li>
                <li><a href="/profil" class="hover:text-blue-500">Profil</a></li>
                <li><a href="/visi-misi" class="hover:text-blue-500">Visi & Misi</a></li>
                <li><a href="{{ route('berita.publik') }}" class="hover:text-blue-500">Berita</a></li>
                <li><a href="/kontak" class="hover:text-blue-500">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Spacer untuk kompensasi navbar fixed -->
    <div class="h-20"></div>

    <main class="container mx-auto py-10">
        @yield('content') {{-- untuk halaman frontend --}}
        {{ $slot ?? '' }} {{-- untuk form login/register --}}
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <p class="text-sm">© {{ date('Y') }} SMP Negeri 123</p>
        <p class="text-sm">Jl. Pendidikan No. 45, Kota Ilmu | Telp: (021) 123-4567</p>
        <p class="text-sm">Email: info@smpn123.sch.id</p>
    </footer>

    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scroll ke bawah dan sudah lewat 100px - sembunyikan navbar
                navbar.style.transform = 'translateY(-100%)';
            } else {
                // Scroll ke atas atau masih di atas - tampilkan navbar
                navbar.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
        });
    </script>

</body>

</html>