@extends('layouts.guest')
@section('title', 'Berita')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-8 text-center">Berita Terbaru</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($beritas as $berita)
                    <div
                        class="bg-gray-50 border rounded-lg shadow hover:shadow-md transition p-6 flex flex-col justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">
                                📅 {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                @if ($berita->kategori)
                                    • 🏷️ {{ $berita->kategori->nama }}
                                @endif
                            </p>
                            <h2 class="text-xl font-semibold text-blue-800 mb-2">{{ $berita->judul }}</h2>
                            <p class="text-gray-700">{{ \Illuminate\Support\Str::limit($berita->isi, 150) }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('berita.show.public', $berita->slug) }}"
                                class="text-blue-600 font-semibold hover:underline hover:text-blue-800">
                                Baca selengkapnya →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 col-span-2 text-center">Belum ada berita untuk ditampilkan.</p>
                @endforelse
            </div>
            {{-- Simpel dan bersih --}}
            <div class="pt-10 flex justify-center">
                {{ $beritas->links() }}
            </div>
        </div>
    </section>
@endsection