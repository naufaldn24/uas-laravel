@extends('layouts.guest')
@section('title', $berita->judul)

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10 max-w-4xl">
            @php
                $imagePath = $berita->image
                    ? asset('storage/' . $berita->image)
                    : asset('storage/defaults/default-image.png');
            @endphp

            <img src="{{ $imagePath }}" alt="{{ $berita->judul }}"
                class="w-full max-h-[400px] object-cover rounded-xl shadow mb-8">

            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                {{ $berita->judul }}
            </h1>

            <p class="text-sm text-gray-500 mb-2 flex items-center gap-3 flex-wrap">
                📅 {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                @if ($berita->kategori)
                    <span
                        class="px-2 py-0.5 rounded-full text-xs font-semibold
                            {{ $berita->kategori->nama == 'Akademik' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $berita->kategori->nama }}
                    </span>
                @endif

                <span class="text-orange-500">✍️ Oleh: {{ $berita->penulis }}</span>
            </p>

            <div class="text-gray-800 leading-relaxed text-justify mt-6 prose max-w-none">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <div class="mt-10">
                <a href="{{ route('berita.publik') }}"
                    class="inline-block text-blue-600 hover:text-blue-800 font-semibold transition duration-200 text-sm">
                    ← Kembali ke daftar pengumuman
                </a>
            </div>
        </div>
    </section>
@endsection