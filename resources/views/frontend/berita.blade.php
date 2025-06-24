@extends('layouts.guest')
@section('title', 'Berita')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-800 mb-12 text-center tracking-tight">
                📢 Pengumuman Sekolah
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @forelse ($beritas as $berita)
                    <a href="{{ route('berita.show.public', $berita->slug) }}" class="group">
                        <div
                            class="bg-white border border-gray-200 rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 overflow-hidden h-full flex flex-col">
                            @php
                                $imagePath = $berita->image
                                    ? asset('storage/' . $berita->image)
                                    : asset('storage/defaults/default-image.png');
                            @endphp

                            <img src="{{ $imagePath }}" alt="{{ $berita->judul }}"
                                class="w-full h-48 object-cover transition duration-300 group-hover:brightness-90">

                            <div class="p-6 flex flex-col flex-1">
                                <p class="text-sm text-gray-500 flex items-center gap-2 flex-wrap mb-2">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                                    @if ($berita->kategori)
                                                        <span class="ml-auto px-3 py-1 rounded-full text-xs font-semibold
                                                                    {{ $berita->kategori->nama == 'Akademik'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-yellow-100 text-yellow-800' }}">
                                                            {{ $berita->kategori->nama }}
                                                        </span>
                                    @endif
                                </p>

                                <h2 class="text-2xl font-bold text-blue-900 group-hover:text-blue-700 transition mb-1">
                                    {{ $berita->judul }}
                                </h2>
                                <p class="text-sm text-orange-500 mb-2">✍️ Oleh: {{ $berita->penulis }}</p>

                                <p class="text-gray-700 text-sm leading-relaxed line-clamp-3 flex-1">
                                    {{ \Illuminate\Support\Str::limit($berita->isi, 150) }}
                                </p>

                                <span
                                    class="inline-block mt-4 text-sm font-medium text-blue-600 group-hover:text-blue-800 underline transition">
                                    Baca selengkapnya →
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500 col-span-3 text-center">Belum ada berita untuk ditampilkan.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="pt-12 flex justify-center">
                {{ $beritas->links() }}
            </div>
        </div>
    </section>
@endsection