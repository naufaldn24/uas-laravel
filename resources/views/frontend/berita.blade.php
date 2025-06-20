@extends('layouts.guest')
@section('title', 'Berita')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Berita Terbaru</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-bold text-lg">Juara Lomba Sains Tingkat Kota</h3>
            <p class="text-sm text-gray-600">19 Juni 2025</p>
            <p>SMP Negeri 123 kembali menorehkan prestasi dalam lomba sains tingkat kota...</p>
        </div>

        <div class="p-4 bg-white shadow rounded">
            <h3 class="font-bold text-lg">Kegiatan Donor Darah Bersama PMI</h3>
            <p class="text-sm text-gray-600">10 Juni 2025</p>
            <p>Sebagai bentuk kepedulian sosial, sekolah mengadakan kegiatan donor darah rutin...</p>
        </div>
    </div>
@endsection