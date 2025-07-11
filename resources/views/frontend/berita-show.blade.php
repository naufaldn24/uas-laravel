@extends('layouts.guest')
@section('title', $berita->judul)

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10 flex flex-col md:flex-row gap-8"> {{-- Menggunakan flexbox untuk layout
            2 kolom --}}
            {{-- Kolom Kiri: Konten Berita Utama --}}
            <div class="w-full md:w-3/4 max-w-4xl" data-aos="fade-up"> {{-- Atur lebar kolom utama --}}
                @php
                    $imagePath = $berita->image
                        ? asset('storage/' . $berita->image)
                        : asset('storage/defaults/default-image.png');
                    $shareUrl = urlencode(request()->fullUrl());
                    $shareText = urlencode($berita->judul . ' - Baca di Website SMP Negeri 123');
                @endphp

                {{-- Gambar --}}
                <img src="{{ $imagePath }}" alt="{{ $berita->judul }}"
                    class="w-full max-h-[400px] object-cover rounded-3xl shadow-lg mb-8 transition duration-300 hover:brightness-95">

                {{-- Judul --}}
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
                    {{ $berita->judul }}
                </h1>

                {{-- Info Meta --}}
                <p class="text-sm text-gray-500 mb-4 flex items-center gap-3 flex-wrap">
                    📅 {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                    @if ($berita->kategori)
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r
                                                {{ $berita->kategori->nama == 'Akademik'
                        ? 'from-blue-100 to-blue-400 text-blue-900'
                        : 'from-yellow-100 to-yellow-400 text-yellow-900' }}">
                                    {{ $berita->kategori->nama }}
                                </span>
                    @endif

                    <span class="text-orange-500">✍️ Oleh: {{ $berita->penulis }}</span>
                </p>

                {{-- Isi --}}
                <div class="text-gray-800 leading-relaxed text-justify mt-6 prose max-w-none prose-p:leading-loose">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                {{-- Share + Back --}}
                <div class="mt-10 flex flex-col md:flex-row justify-between items-start gap-4">
                    <a href="{{ route('berita.publik') }}"
                        class="inline-block text-blue-600 hover:text-blue-800 font-semibold transition duration-200 text-sm">
                        ← Kembali ke daftar pengumuman
                    </a>

                    <div class="flex items-center gap-2 text-sm">
                        <span class="text-gray-500">Bagikan:</span>
                        <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank"
                            class="text-green-600 hover:text-green-700 transition">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                        <a href="https://t.me/share/url?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank"
                            class="text-blue-500 hover:text-blue-700 transition">
                            <i class="fab fa-telegram text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Berita Lainnya --}}
            <div class="w-full md:w-1/4 mt-8 md:mt-0" data-aos="fade-left"> {{-- Atur lebar kolom sidebar --}}
                <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 pb-2">Berita Lainnya</h3>
                @forelse ($otherBeritas as $otherBerita)
                    <div class="mb-4 pb-4 border-b last:border-b-0">
                        <a href="{{ route('berita.show.public', $otherBerita->slug) }}"
                            class="block hover:text-blue-600 transition">
                            @php
                                $otherImagePath = $otherBerita->image
                                    ? asset('storage/' . $otherBerita->image)
                                    : asset('storage/defaults/default-image.png');
                            @endphp
                            <img src="{{ $otherImagePath }}" alt="{{ $otherBerita->judul }}"
                                class="w-full h-24 object-cover rounded-md mb-2 shadow-sm">
                            <p class="font-semibold text-gray-800 text-sm leading-tight">{{ $otherBerita->judul }}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ \Carbon\Carbon::parse($otherBerita->tanggal)->translatedFormat('d F Y') }}
                            </p>
                            {{-- Menambahkan tautan "Baca Selengkapnya" --}}
                            <a href="{{ route('berita.show.public', $otherBerita->slug) }}"
                                   class="text-blue-500 hover:underline text-xs mt-2 inline-block">
                                   Baca Selengkapnya →
                                </a>
                        </a>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Tidak ada berita lainnya.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection