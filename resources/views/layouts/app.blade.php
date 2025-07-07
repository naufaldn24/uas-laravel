<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@yield('scripts')
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white flex flex-col min-h-screen">
            <div class="p-5 text-xl font-extrabold border-b border-gray-700 tracking-wide">
                📂 Admin Panel
            </div>
            <nav class="flex-1 mt-4 space-y-1 px-2">
                <a href="/dashboard"
                    class="flex items-center px-4 py-2 text-sm rounded-md transition-all duration-200 
                    {{ request()->is('dashboard') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                <a href="/berita"
                    class="flex items-center px-4 py-2 text-sm rounded-md transition-all duration-200 
                    {{ request()->is('berita*') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-newspaper w-5"></i>
                    <span class="ml-3">Berita</span>
                </a>

                <a href="/kategori"
                    class="flex items-center px-4 py-2 text-sm rounded-md transition-all duration-200 
                    {{ request()->is('kategori*') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-tags w-5"></i>
                    <span class="ml-3">Kategori</span>
                </a>

                <a href="/events"
                    class="flex items-center px-4 py-2 text-sm rounded-md transition-all duration-200 
                    {{ request()->is('events*') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-calendar-alt w-5"></i>
                    <span class="ml-3">Event</span>
                </a>
                
                <a href="/petugas"
                    class="flex items-center px-4 py-2 text-sm rounded-md transition-all duration-200 
                    {{ request()->is('petugas*') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-3">Petugas</span>
                </a>

                
            </li>
            </nav>

            {{-- Footer Sidebar --}}
            <div class="p-4 border-t border-gray-700 text-xs text-gray-400">
                &copy; {{ date('Y') }} SMP Negeri 123
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
