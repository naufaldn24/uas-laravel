@extends('layouts.guest')
@section('title', 'Visi & Misi')

@section('content')
    <section class="bg-white py-16">
        <div class="container mx-auto px-6 md:px-10">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-8">Visi & Misi Sekolah</h1>

            <div class="bg-blue-50 border-l-4 border-blue-400 p-6 mb-10 rounded shadow">
                <h2 class="text-2xl font-semibold text-blue-700 mb-2">Visi</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Menjadi sekolah unggulan dalam mencetak generasi berkarakter, berprestasi, dan berwawasan global.
                </p>
            </div>

            <div class="bg-white p-6 rounded shadow border">
                <h2 class="text-2xl font-semibold text-blue-700 mb-4">Misi</h2>
                <ul class="list-disc list-inside text-gray-700 text-lg space-y-3">
                    <li>Menyelenggarakan pendidikan berkualitas berdasarkan nilai-nilai moral dan budaya bangsa.</li>
                    <li>Mendorong prestasi akademik dan non-akademik melalui kegiatan yang inovatif.</li>
                    <li>Membangun lingkungan belajar yang aman, nyaman, dan inklusif.</li>
                    <li>Menanamkan semangat cinta tanah air dan kepedulian terhadap masyarakat sekitar.</li>
                    <li>Menyiapkan peserta didik menjadi individu yang siap menghadapi tantangan global.</li>
                </ul>
            </div>
        </div>
    </section>
@endsection