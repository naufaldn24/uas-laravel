@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative bg-blue-900 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('/img/sekolah.jpg')] bg-cover bg-center opacity-20"></div>
        <div class="relative container mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-10 items-center">
            {{-- Kiri: Teks --}}
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight drop-shadow">
                    Selamat Datang di <span class="text-yellow-400">SMP Negeri 123</span>
                </h1>
                <p class="mt-4 text-lg drop-shadow">
                    Tempat mencetak generasi <strong>cerdas</strong>, <strong>berkarakter</strong>, dan
                    <strong>berprestasi</strong>.
                </p>
                <a href="{{ route('profil') }}"
                    class="mt-6 inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-full shadow transition hover:scale-105">
                    📘 Lihat Profil Sekolah
                </a>
            </div>

            {{-- Kanan: Logo --}}
            <div class="flex justify-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah" class="w-40 md:w-52 object-contain">
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