@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
    <section class="bg-gradient-to-br from-blue-100 to-white py-16">
        <div class="container mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 leading-tight">
                    Selamat Datang di <span class="text-blue-700">SMP Negeri 123</span>
                </h1>
                <p class="mt-4 text-gray-700 text-lg">
                    Tempat mencetak generasi cerdas, berkarakter, dan berprestasi.
                </p>
                <a href="{{ route('profil') }}"
                    class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 hover:scale-105 transition">
                    📘 Lihat Profil Sekolah
                </a>
            </div>
            <div class="flex justify-center">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo Sekolah" class="w-48 md:w-64">
            </div>
        </div>
    </section>

    <section class="bg-white py-14">
        <div class="container mx-auto px-6 md:px-10 grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-gray-50 border rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-bold text-blue-700 mb-2">Profil</h3>
                <p class="text-gray-600">Mengenal sejarah, visi, dan budaya SMP Negeri 123.</p>
            </div>
            <div class="p-6 bg-gray-50 border rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-bold text-blue-700 mb-2">Berita Terbaru</h3>
                <p class="text-gray-600">Kegiatan dan prestasi terbaru yang membanggakan sekolah.</p>
            </div>
            <div class="p-6 bg-gray-50 border rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-bold text-blue-700 mb-2">Kontak Kami</h3>
                <p class="text-gray-600">Hubungi kami untuk informasi lebih lanjut atau kunjungan sekolah.</p>
            </div>
        </div>
    </section>
@endsection