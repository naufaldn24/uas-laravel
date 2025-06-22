@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Kategori</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('kategori.store') }}">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition-all duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection