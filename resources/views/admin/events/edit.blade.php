@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Event: {{ $event->title }}</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT') {{-- Penting untuk metode UPDATE --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Event:</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title', $event->title) }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi:</label>
            <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai Event:</label>
            <input type="date" name="start_date" id="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('start_date', $event->start_date ? $event->start_date->format('Y-m-d') : '') }}" required>
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Akhir Event (opsional):</label>
            <input type="date" name="end_date" id="end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('end_date', $event->end_date ? $event->end_date->format('Y-m-d') : '') }}">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Foto Event (opsional):</label>
            @if ($event->photo)
                <div class="mb-2">
                    <p class="text-sm text-gray-600">Foto saat ini:</p>
                    <img src="{{ asset('storage/event_photos/' . $event->photo) }}" alt="{{ $event->title }}" class="w-32 h-32 object-cover rounded-md">
                </div>
            @endif
            <input type="file" name="photo" id="photo" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto. Ukuran maks: 2MB, Format: JPG, PNG, GIF</p>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Perbarui Event
            </button>
            <a href="{{ route('events.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection