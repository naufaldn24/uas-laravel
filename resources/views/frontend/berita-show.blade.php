@extends('layouts.guest')
@section('title', $berita->judul)

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-2">{{ $berita->judul }}</h1>

        <p class="text-sm text-gray-600 mb-4">
            Kategori: <strong>{{ $berita->kategori->nama ?? '-' }}</strong> •
            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
        </p>

        <div class="text-gray-800 leading-relaxed whitespace-pre-line">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </div>
@endsection