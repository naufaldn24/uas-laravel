<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        <div class="min-h-screen flex">
    
            {{-- Sidebar --}}
            <aside class="w-64 bg-gray-900 text-white min-h-screen shadow-md">
                <div class="p-4 font-bold text-lg border-b">Admin Panel</div>
                <nav class="mt-4 space-y-1">
                    <a href="/dashboard"
                        class="flex items-center px-4 py-2 text-sm rounded-md hover:bg-gray-800 hover:text-white {{ request()->is('dashboard') ? 'bg-gray-800 text-white font-semibold' : 'text-gray-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m4 0h4m-8 0H7" />
                        </svg>
                        <span class="ml-2">Dashboard</span>
                    </a>
                
                    <a href="/berita"
                        class="flex items-center px-4 py-2 text-sm rounded-md hover:bg-gray-800 hover:text-white {{ request()->is('berita*') ? 'bg-gray-800 text-white font-semibold' : 'text-gray-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h7l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z" />
                        </svg>
                        <span class="ml-2">Berita</span>
                    </a>
                
                    <a href="/kategori"
                        class="flex items-center px-4 py-2 text-sm rounded-md hover:bg-gray-800 hover:text-white {{ request()->is('kategori*') ? 'bg-gray-800 text-white font-semibold' : 'text-gray-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                        <span class="ml-2">Kategori</span>
                    </a>
                </nav>

            </aside>
    
            {{-- Main Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </body>

</html>
