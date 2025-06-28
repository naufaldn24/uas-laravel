@extends('layouts.guest')
@section('title', 'Visi & Misi')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-8">Visi & Misi Sekolah</h1>

            {{-- Wrapper utama untuk 2 kolom besar: Konten Visi & Misi (kiri) dan Sidebar (kanan) --}}
            <div class="flex flex-col md:flex-row gap-10 items-start">
                {{-- Kolom Kiri: Konten Visi & Misi --}}
                <div class="w-full md:w-3/4">
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6 mb-10 rounded shadow">
                        <h2 class="text-2xl font-semibold text-blue-700 mb-2">Visi</h2>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Menjadi sekolah unggulan dalam mencetak generasi berkarakter, berprestasi, dan berwawasan
                            global.
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded shadow border">
                        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Misi</h2>
                        <ul class="list-disc list-inside text-gray-700 text-lg space-y-3">
                            <li>Menyelenggarakan pendidikan berkualitas berdasarkan nilai-nilai moral dan budaya bangsa.
                            </li>
                            <li>Mendorong prestasi akademik dan non-akademik melalui kegiatan yang inovatif.</li>
                            <li>Membangun lingkungan belajar yang aman, nyaman, dan inklusif.</li>
                            <li>Menanamkan semangat cinta tanah air dan kepedulian terhadap masyarakat sekitar.</li>
                            <li>Menyiapkan peserta didik menjadi individu yang siap menghadapi tantangan global.</li>
                        </ul>
                    </div>
                </div>

                {{-- Kolom Kanan: Berita Lainnya (Sidebar) --}}
                <div class="w-full md:w-1/4 mt-8 md:mt-0">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 pb-2">Berita Lainnya</h3>
                    @forelse ($otherBeritas as $otherBerita)
                        <div class="mb-4 pb-4 border-b last:border-b-0">
                            @php
                                $otherImagePath = $otherBerita->image
                                ? asset('storage/' . $otherBerita->image)
                                : asset('storage/defaults/default-image.png');
                            @endphp
                            <a href="{{ route('berita.show.public', $otherBerita->slug) }}"
                                class="block hover:text-blue-600 transition">
                                <img src="{{ $otherImagePath }}" alt="{{ $otherBerita->judul }}"
                                    class="w-full h-24 object-cover rounded-md mb-2 shadow-sm">
                                <p class="font-semibold text-gray-800 text-sm leading-tight">{{ $otherBerita->judul }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse($otherBerita->tanggal)->translatedFormat('d F Y') }}
                                </p>
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
        </div>
    </section>
@endsection