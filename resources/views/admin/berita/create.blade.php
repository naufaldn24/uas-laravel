@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Berita</h1>

        {{-- Pesan Error Validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Judul --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input id="judul" type="text" name="judul" value="{{ old('judul') }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            {{-- Isi --}}
            <div>
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                <textarea id="isi" name="isi" rows="6"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('isi') }}</textarea>
            </div>

            {{-- Penulis --}}
            <div>
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input id="penulis" type="text" name="penulis" value="{{ old('penulis') }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tanggal --}}
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            {{-- Kategori --}}
            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Gambar --}}
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
                <input type="file" name="image" id="image"
                    class="mt-1 w-full text-sm border border-gray-300 rounded-md shadow-sm">
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-4 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection