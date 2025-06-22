@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold mb-4">Daftar Berita</h1>

            {{-- Flash Message --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('berita.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700 transition">
                + Tambah Berita
            </a>

            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 shadow-sm">
                <thead class="bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">Penulis</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Gambar</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($beritas as $berita)
        <tr>
            <td>{{ $berita->judul }}</td>
            <td>{{ $berita->penulis }}</td>
            <td>{{ $berita->tanggal }}</td>
            <td>{{ $berita->kategori->nama ?? 'N/A' }}</td> {{-- Pastikan ini 'nama' atau 'nama_kategori' sesuai kolom kategori Anda --}}
            <<td>
                @if ($berita->image)
                    <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita" style="max-width: 100px; max-height: 80px;">
                @else
                    Tidak Ada Gambar
                @endif
            </td>
            <td>
                {{-- Ini adalah kolom Aksi Anda --}}
                <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button button type="submit" onclick="return confirm('Yakin ingin menghapus berita ini?')"
                    class="text-red-500 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach

                    <!-- @foreach ($beritas as $berita)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $berita->judul }}</td>
                            <td class="px-4 py-2">{{ $berita->penulis }}</td>
                            <td class="px-4 py-2">{{ $berita->tanggal }}</td>
                            <td class="px-4 py-2">{{ $berita->kategori->nama ?? '-' }}</td>
                            <td>{{ $berita->kategori->nama_kategori ?? 'N/A' }}</td> {{-- Asumsi ada relasi kategori --}}
                            <td>
                @if ($berita->image)
                    <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita" style="max-width: 100px; max-height: 80px;">
                @else
                    Tidak Ada Gambar
                @endif
            </td><td>
                </td>
        </tr>

                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('berita.edit', $berita->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus berita ini?')"
                                        class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach -->
                </tbody>
            </table>
        </div>
    </div>
@endsection