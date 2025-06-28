@extends('layouts.guest')
@section('title', 'Profil')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            {{-- Wrapper utama untuk 2 kolom besar: Konten Utama (kiri) dan Sidebar (kanan) --}}
            <div class="flex flex-col md:flex-row gap-10 items-start">
                {{-- Kolom Kiri: Konten Utama (Judul, Teks Profil, Gambar) --}}
                <div class="w-full md:w-3/4">
                    {{-- Judul "Profil Sekolah" --}}
                    <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-6">Profil Sekolah</h1>

                    {{-- Teks Profil --}}
                    <div class="text-gray-700 leading-relaxed text-justify mb-8">
                        <p class="text-lg mb-4">
                        SMP Negeri 123 berdiri kokoh sejak tahun 1985, mengukir jejak sebagai institusi pendidikan menengah pertama yang berdedikasi
                        tinggi di kota ini. Didirikan dengan visi mulia untuk mencetak generasi penerus bangsa yang cerdas, berkarakter, dan
                        berdaya saing, sekolah ini telah melalui perjalanan panjang yang penuh inovasi dan pencapaian. Sejak awal berdirinya,
                        SMP Negeri 123 telah berkomitmen untuk menjadi pusat keunggulan akademik dan non-akademik, membangun fondasi kuat bagi
                        ribuan siswa untuk meraih masa depan gemilang.
                        </p>

                        <p class="text-lg mb-4">
                        Kami meyakini bahwa setiap anak adalah individu unik yang dianugerahi potensi luar biasa. Filosofi pendidikan kami berpusat
                        pada pengembangan holistik siswa, tidak hanya fokus pada kecerdasan intelektual, tetapi juga pada pembentukan karakter,
                        kecerdasan emosional, dan keterampilan sosial. Kami percaya bahwa pendidikan sejati adalah proses yang membebaskan dan
                        memberdayakan, memungkinkan siswa untuk menemukan bakat terpendam mereka, menumbuhkan rasa ingin tahu, dan menjadi
                        pembelajar seumur hidup yang adaptif serta inovatif.
                        </p>
                        <p class="text-lg mb-4">
                        SMP Negeri 123 mengimplementasikan kurikulum nasional yang diperkaya dengan pendekatan inovatif dan relevan dengan
                        tantangan zaman. Kami secara aktif mengintegrasikan teknologi dalam proses pembelajaran, memanfaatkan laboratorium
                        komputer dan akses internet untuk mendukung eksplorasi pengetahuan yang lebih luas. Metode pengajaran interaktif dan
                        berpusat pada siswa diterapkan untuk mendorong partisipasi aktif, pemikiran kritis, dan kemampuan pemecahan masalah.
                        Program-program pengayaan dirancang untuk mengakomodasi siswa dengan berbagai minat dan kecepatan belajar, memastikan
                        setiap individu mendapatkan dukungan optimal untuk mencapai potensi tertingginya.
                        </p>

                        <a href="{{ route('visi-misi') }}"
                            class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium underline">
                            Lihat Visi & Misi Sekolah →
                        </a>
                    </div>

                    {{-- Gambar Gedung Sekolah --}}
                    <div class="flex justify-center">
                        <img src="{{ asset('img/gedung-unmer.jpeg') }}" alt="Gedung Sekolah"
                            class="rounded-lg shadow-lg w-full object-cover max-h-[400px]">
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
                            <a href="{{ route('berita.show.public', $otherBerita->slug) }}" class="block hover:text-blue-600 transition">
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
        </div>
    </section>
@endsection
