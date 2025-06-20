@extends('layouts.guest')
@section('title', 'Profil')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-6">Profil Sekolah</h1>

            <div class="grid md:grid-cols-2 gap-10 items-start">
                <div>
                    <p class="text-gray-700 text-lg mb-4 leading-relaxed">
                        SMP Negeri 123 adalah sekolah menengah pertama yang berdiri sejak tahun 1985.
                        Sekolah ini dikenal dengan komitmen terhadap pendidikan berkualitas, penguatan karakter, dan inovasi
                        dalam proses belajar mengajar.
                    </p>

                    <p class="text-gray-700 text-lg mb-4 leading-relaxed">
                        Kami percaya bahwa setiap anak memiliki potensi untuk menjadi individu yang cerdas, mandiri, dan
                        berakhlak mulia.
                    </p>

                    <a href="{{ route('visi-misi') }}"
                        class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium underline">
                        Lihat Visi & Misi Sekolah →
                    </a>
                </div>

                <div class="flex justify-center">
                    <img src="{{ asset('img/gedung-unmer.jpeg') }}" alt="Gedung Sekolah"
                        class="rounded-lg shadow-lg w-full md:w-4/5">
                </div>
            </div>
        </div>
    </section>
@endsection