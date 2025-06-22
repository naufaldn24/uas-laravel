@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Berita</h1>

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

        <form method="POST" action="{{ route('berita.update', $berita->id) }}" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input id="judul" name="judul" type="text" value="{{ old('judul', $berita->judul) }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            {{-- Isi --}}
            <div>
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                <textarea id="isi" name="isi" rows="6"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('isi', $berita->isi) }}</textarea>
            </div>

            {{-- Penulis --}}
            <div>
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input id="penulis" type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Tanggal --}}
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            {{-- Kategori --}}
            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $berita->kategori_id) == $kategori->id ? 'selected' : '' }}>
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

                @if ($berita->image)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita"
                            class="w-full max-w-[250px] rounded shadow-md mb-2">
                        <label class="inline-flex items-center gap-2 text-sm">
                            <input type="checkbox" name="remove_image" value="1"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            Hapus Gambar
                        </label>
                    </div>
                @endif
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-4 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection