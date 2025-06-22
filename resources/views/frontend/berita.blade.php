@extends('layouts.guest')
@section('title', 'Berita')

@section('content')
<section class="bg-white py-16">
    <div class="container mx-auto px-6 md:px-10">
        <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-12 text-center">
            Pengumuman Sekolah
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @forelse ($beritas as $berita)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden">
                    @php
                        $imagePath = $berita->image 
                            ? asset('storage/' . $berita->image) 
                            : asset('storage/defaults/default-image.png');
                    @endphp

                    <img src="{{ $imagePath }}" alt="{{ $berita->judul }}" class="w-full h-48 object-cover">

                    <div class="p-5 flex flex-col justify-between h-full">
                        <div>
                            <p class="text-sm text-gray-500 mb-1 flex items-center gap-2 flex-wrap">
                                📅 {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                                
                                @if ($berita->kategori)
                                    <span class="px-2 py-0.5 rounded-full text-xs font-semibold
                                        {{ $berita->kategori->nama == 'Akademik' ? 'bg-blue-100 text-blue-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ $berita->kategori->nama }}
                                    </span>
                                @endif
                            </p>

                            <h2 class="text-xl font-semibold text-blue-800 hover:text-blue-900 mb-1">
                                {{ $berita->judul }}
                            </h2>
                            <p class="text-sm text-orange-500 mb-2">✍️ Oleh: {{ $berita->penulis }}</p>

                            <p class="text-gray-700 text-sm leading-relaxed line-clamp-3">
                                {{ \Illuminate\Support\Str::limit($berita->isi, 150) }}
                            </p>

                            <a href="{{ route('berita.show.public', $berita->slug) }}"
                               class="inline-block mt-3 text-blue-600 font-semibold hover:underline hover:text-blue-800 text-sm">
                                Baca selengkapnya →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-2 text-center">Belum ada berita untuk ditampilkan.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="pt-12 flex justify-center">
            {{ $beritas->links() }}
        </div>
    </div>
</section>
@endsection
