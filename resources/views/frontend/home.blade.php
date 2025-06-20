@extends('layouts.guest')
@section('title', 'Beranda')

    @section('content')
        <!-- Hero Section -->
        <div class="bg-blue-100 rounded-xl p-10 mb-10 shadow-md text-center">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo UNMER Malang" class="mx-auto w-24 md:w-32 mb-4">
            <h1 class="text-4xl font-bold text-blue-800 mb-4">Selamat Datang di SMP Negeri 123</h1>
            <p class="text-gray-700 text-lg">Tempat mencetak generasi cerdas, berkarakter, dan berprestasi</p>
            <a href="{{ route('profil') }}"
                class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition">
                Lihat Profil Sekolah
            </a>
        </div>


        <!-- Sekilas Konten -->
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 shadow rounded">
                <h3 class="font-bold text-lg text-blue-700">Profil</h3>
                <p class="text-sm text-gray-600">Mengenal sejarah, visi, dan budaya SMP Negeri 123.</p>
            </div>
            <div class="bg-white p-6 shadow rounded">
                <h3 class="font-bold text-lg text-blue-700">Berita Terbaru</h3>
                <p class="text-sm text-gray-600">Kegiatan dan prestasi terbaru yang membanggakan sekolah.</p>
            </div>
            <div class="bg-white p-6 shadow rounded">
                <h3 class="font-bold text-lg text-blue-700">Kontak Kami</h3>
                <p class="text-sm text-gray-600">Hubungi kami untuk informasi lebih lanjut atau kunjungan sekolah.</p>
            </div>
        </div>

@endsection