@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Edit Berita</h1>

        {{-- Pesan error validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('berita.update', $berita->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input id="judul" name="judul" type="text" value="{{ old('judul', $berita->judul) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            {{-- Isi --}}
            <div class="mt-4">
                <label for="isi" class="block text-sm font-medium text-gray-700 mb-1">Isi</label>
                <textarea id="isi" name="isi" rows="6"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('isi', $berita->isi) }}</textarea>
            </div>

            {{-- Penulis --}}
            <div class="mt-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                <input id="penulis" type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Tanggal --}}
            <div class="mt-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- Kategori --}}
            <div class="mt-4">
                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" id="kategori_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $berita->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{--Gambar--}}
            <div class="mt-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Berita</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                @if ($berita->image)
                    <div class="mt-2">
                        <p>Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita" style="max-width: 200px;">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image" value="1">
                            <label class="form-check-label" for="remove_image">Hapus Gambar</label>
                        </div>
                    </div>
                @endif
            </div>


            {{-- Tombol --}}
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition-all duration-200">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection