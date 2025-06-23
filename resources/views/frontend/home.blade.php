@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
    <section class="py-16 relative" style="background-image: url('{{ asset('img/hero-bg.WEBP') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 400px;">
        <!-- Overlay gradient untuk kontras -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/60"></div>
        
        <div class="container mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-10 items-center relative z-10">
            <div>
                <h1 class="text-4xl md:text-6xl font-black leading-tight mb-6">
                    <span class="text-white drop-shadow-2xl">Selamat Datang di</span>
                    <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 drop-shadow-lg font-extrabold">
                        SMP Negeri 123
                    </span>
                </h1>
                <p class="mt-6 text-white text-xl font-semibold drop-shadow-lg leading-relaxed bg-black/30 backdrop-blur-sm px-6 py-4 rounded-xl border border-white/20">
                    🎓 Tempat mencetak generasi cerdas, berkarakter, dan berprestasi.
                </p>
                <a href="{{ route('profil') }}"
                    class="inline-flex items-center mt-8 px-8 py-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-white font-bold text-lg rounded-full shadow-2xl hover:shadow-yellow-500/25 hover:from-yellow-400 hover:to-orange-400 transform hover:scale-110 transition-all duration-300 border-2 border-white/20">
                    <span class="mr-3 text-xl">📘</span>
                    Lihat Profil Sekolah
                    <span class="ml-3 text-xl">→</span>
                </a>
            </div>
            
            <div class="flex justify-center">
                <div class="relative group">
                    <!-- Glow effect background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 rounded-full blur-2xl opacity-40 group-hover:opacity-60 animate-pulse scale-110"></div>
                    
                    <!-- Logo container -->
                    <div class="border-yellow-400/70 transition-all duration-300">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah" 
                             class="w-48 md:w-64 shadow-xl transform group-hover:rotate-6 group-hover:scale-105 transition-all duration-300">
                    </div>
                    
                    <!-- Floating rings -->
                    <div class="absolute inset-0 rounded-full border-2 border-yellow-400/30 animate-ping scale-125"></div>
                    <div class="absolute inset-0 rounded-full border-2 border-orange-400/20 animate-ping scale-150 animation-delay-1000"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- FITUR UTAMA --}}
    <section class="bg-white py-14">
        <div class="container mx-auto px-6 md:px-10 grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-blue-50 border rounded-xl shadow-md hover:shadow-lg transition">
                <div class="text-3xl mb-3">🏫</div>
                <h3 class="text-lg font-bold text-blue-700 mb-2">Profil Sekolah</h3>
                <p class="text-gray-600 mb-3">Mengenal sejarah, visi, dan budaya belajar di SMP Negeri 123.</p>
                <a href="{{ route('profil') }}" class="text-sm font-medium text-blue-600 hover:underline">Lihat Selengkapnya
                    →</a>
            </div>

            <div class="p-6 bg-green-50 border rounded-xl shadow-md hover:shadow-lg transition">
                <div class="text-3xl mb-3">📰</div>
                <h3 class="text-lg font-bold text-green-700 mb-2">Berita Terbaru</h3>
                <p class="text-gray-600 mb-3">Simak informasi dan kegiatan terbaru yang menginspirasi dan membanggakan.</p>
                <a href="{{ route('berita.publik') }}" class="text-sm font-medium text-green-600 hover:underline">Baca
                    Berita →</a>
            </div>

            <div class="p-6 bg-yellow-50 border rounded-xl shadow-md hover:shadow-lg transition">
                <div class="text-3xl mb-3">📞</div>
                <h3 class="text-lg font-bold text-yellow-700 mb-2">Kontak Kami</h3>
                <p class="text-gray-600 mb-3">Hubungi kami untuk info lebih lanjut atau jadwal kunjungan sekolah.</p>
                <a href="{{ route('kontak') }}" class="text-sm font-medium text-yellow-700 hover:underline">Hubungi Kami
                    →</a>
            </div>
        </div>
    </section>

@endsection