@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Detail Event: {{ $event->title }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="mb-4 text-center">
            @if ($event->photo)
                <img src="{{ asset('storage/event_photos/' . $event->photo) }}" alt="{{ $event->title }}" class="w-64 h-64 object-cover mx-auto rounded-lg mb-4">
            @else
                <p class="text-gray-500">Tidak ada foto untuk event ini.</p>
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Judul:</label>
            <p class="text-gray-900">{{ $event->title }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
            <p class="text-gray-900">{{ $event->description ?? '-' }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai Event:</label>
            <p class="text-gray-900">{{ \Carbon\Carbon::parse($event->start_date)->isoFormat('dddd, DD MMMMYYYY') }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Akhir Event:</label>
            <p class="text-gray-900">{{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->isoFormat('dddd, DD MMMMYYYY') : '-' }}</p>
        </div>
    </div>

    <div class="flex items-center">
        <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-3">Edit</a>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Hapus</button>
        </form>
        <a href="{{ route('events.index') }}" class="ml-auto inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
            Kembali ke Daftar Event
        </a>
    </div>
</div>
@endsection