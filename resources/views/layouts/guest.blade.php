<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Website Sekolah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow-md p-4">
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

    <main class="container mx-auto py-10">
        @yield('content') {{-- untuk halaman frontend --}}
        {{ $slot ?? '' }} {{-- untuk form login/register --}}
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <p class="text-sm">© {{ date('Y') }} SMP Negeri 123</p>
        <p class="text-sm">Jl. Pendidikan No. 45, Kota Ilmu | Telp: (021) 123-4567</p>
        <p class="text-sm">Email: info@smpn123.sch.id</p>
    </footer>

</body>

</html>