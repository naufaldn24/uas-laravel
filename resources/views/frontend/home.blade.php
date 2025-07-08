@extends('layouts.guest')
@section('title', 'Beranda')

@section('content')
    {{-- HERO SECTION (JANGAN DIUBAH - sesuai permintaan) --}}
    <section class="py-16 relative"
        style="background-image: url('{{ asset('img/hero-bg.WEBP') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 400px;">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-black/60"></div>
        <div class="container mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-10 items-center relative z-10">
            <div>
                <h1 class="text-4xl md:text-6xl font-black leading-tight mb-6">
                    <span class="text-white drop-shadow-2xl">Selamat Datang di</span><br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 drop-shadow-lg font-extrabold">SMP
                        Negeri 123 Malang</span>
                </h1>
                <p
                    class="mt-6 text-white text-xl font-semibold drop-shadow-lg leading-relaxed bg-black/30 backdrop-blur-sm px-6 py-4 rounded-xl border border-white/20">
                    🎓 Tempat mencetak generasi cerdas, berkarakter, dan berprestasi.
                </p>
                <a href="{{ route('profil') }}"
                    class="inline-flex items-center mt-8 px-8 py-4 bg-gradient-to-r from-yellow-500 to-orange-500 text-white font-bold text-lg rounded-full shadow-2xl hover:shadow-yellow-500/25 hover:from-yellow-400 hover:to-orange-400 transform hover:scale-110 transition-all duration-300 border-2 border-white/20">
                    <span class="mr-3 text-xl">📘</span> Lihat Profil Sekolah <span class="ml-3 text-xl">→</span>
                </a>
            </div>
            <div class="flex justify-center">
                <div class="relative group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 rounded-full blur-2xl opacity-40 group-hover:opacity-60 animate-pulse scale-110">
                    </div>
                    <div class="border-yellow-400/70 transition-all duration-300">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo Sekolah"
                            class="w-48 md:w-64 shadow-xl transform group-hover:rotate-6 group-hover:scale-105 transition-all duration-300">
                    </div>
                    <div class="absolute inset-0 rounded-full border-2 border-yellow-400/30 animate-ping scale-125"></div>
                    <div
                        class="absolute inset-0 rounded-full border-2 border-orange-400/20 animate-ping scale-150 animation-delay-1000">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SEKOLAH DALAM ANGKA --}}
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="p-6 rounded-xl bg-blue-50 shadow hover:shadow-lg transition">
                <div class="text-4xl mb-2">👨‍🎓</div>
                <h3 class="text-lg font-semibold text-blue-700">500+</h3>
                <p class="text-sm text-gray-600">Siswa Aktif</p>
            </div>
            <div class="p-6 rounded-xl bg-green-50 shadow hover:shadow-lg transition">
                <div class="text-4xl mb-2">👩‍🏫</div>
                <h3 class="text-lg font-semibold text-green-700">35+</h3>
                <p class="text-sm text-gray-600">Guru Berkualitas</p>
            </div>
            <div class="p-6 rounded-xl bg-yellow-50 shadow hover:shadow-lg transition">
                <div class="text-4xl mb-2">🏫</div>
                <h3 class="text-lg font-semibold text-yellow-700">20</h3>
                <p class="text-sm text-gray-600">Ruang Kelas</p>
            </div>
            <div class="p-6 rounded-xl bg-red-50 shadow hover:shadow-lg transition">
                <div class="text-4xl mb-2">🏆</div>
                <h3 class="text-lg font-semibold text-red-700">100+</h3>
                <p class="text-sm text-gray-600">Prestasi Diraih</p>
            </div>
        </div>
    </section>

    {{-- TENTANG SEKOLAH --}}
    <section class="bg-gradient-to-br from-blue-50 to-white py-20">
        <div class="container mx-auto px-6 md:px-10 flex flex-col-reverse md:flex-row items-center gap-10">
            <div class="w-full md:w-1/2">
                <img src="{{ asset('img/gedung-unmer.jpeg') }}" alt="Ilustrasi Sekolah"
                    class="w-full max-w-md mx-auto">
            </div>
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Sekolah Ramah & Inklusif</h2>
                <p class="text-gray-700 mb-6 leading-relaxed">Kami berkomitmen membentuk lingkungan belajar yang
                    menyenangkan, inklusif, dan berbasis teknologi. Setiap siswa berhak mendapatkan pendidikan berkualitas.
                </p>
                <a href="{{ route('profil') }}"
                    class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">Baca
                    Profil Sekolah</a>
            </div>
        </div>
    </section>

    {{-- BERITA TERBARU --}}
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">📢 Berita Terbaru</h2>
            <div class="flex gap-6 overflow-x-auto snap-x pb-4">
                @foreach($beritas as $berita)
                    <div class="min-w-[300px] max-w-sm snap-start bg-white border rounded-xl shadow hover:shadow-lg transition">
                        @php
                            $image = $berita->image ? asset('storage/' . $berita->image) : asset('storage/defaults/default-image.png');
                        @endphp
                        <img src="{{ $image }}" class="h-40 w-full object-cover rounded-t-xl" alt="{{ $berita->judul }}">
                        <div class="p-4">
                            <h3 class="font-semibold text-blue-800 text-lg line-clamp-2">{{ $berita->judul }}</h3>
                            <p class="text-sm text-gray-500 mt-2 line-clamp-3">
                                {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}</p>
                            <a href="{{ route('berita.show.public', $berita->slug) }}"
                                class="mt-4 inline-block text-sm text-blue-600 hover:underline">Baca Selengkapnya →</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('berita.publik') }}"
                    class="inline-block mt-4 text-blue-700 font-medium hover:underline">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    {{-- CTA PENDAFTARAN --}}
    <section class="bg-gradient-to-r from-blue-800 via-blue-700 to-blue-900 text-white py-16">
        <div class="container mx-auto px-6 md:px-10 text-center">
            <h2 class="text-3xl font-bold mb-4">Ingin Bergabung dengan Kami?</h2>
            <p class="text-lg mb-6">Daftarkan diri Anda atau kunjungi sekolah kami untuk informasi lebih lanjut.</p>
            <a href="#kontak"
                class="inline-block px-8 py-4 bg-yellow-400 text-blue-900 font-semibold rounded-full shadow-lg hover:bg-yellow-300 transition-all duration-300">
                Hubungi Kami Sekarang →
            </a>
        </div>
    </section>
@endsection