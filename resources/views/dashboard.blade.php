@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/berita" class="bg-blue-100 text-blue-800 p-4 rounded shadow text-center">
                <div class="text-sm">Jumlah Berita</div>
                <div class="text-3xl font-bold">{{ $jumlahBerita }}</div>
            </a>

            <a href="/kategori" class="bg-green-100 text-green-800 p-4 rounded shadow text-center">
                <div class="text-sm">Jumlah Kategori</div>
                <div class="text-3xl font-bold">{{ $jumlahKategori }}</div>
            </a>

            <a href="#" class="bg-purple-100 text-purple-800 p-4 rounded shadow text-center">
                <div class="text-sm">Jumlah User</div>
                <div class="text-3xl font-bold">{{ $jumlahUser }}</div>
            </a>
        </div>
    </div>
@endsection