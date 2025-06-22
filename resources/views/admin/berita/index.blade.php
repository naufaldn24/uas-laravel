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

            <div class="overflow-x-auto"> {{-- Tambahkan div ini untuk scroll horizontal jika tabel terlalu lebar --}}
            <table class="min-w-full divide-y divide-gray-200 border border-gray-200 sm">
                <thead class="bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">Judul</th> {{-- border-r untuk batas kanan --}}
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">Penulis</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">Kategori</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">Gambar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th> {{-- Tidak perlu border-r di kolom terakhir --}}
            </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($beritas as $berita)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">{{ $berita->judul }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">{{ $berita->penulis }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">{{ $berita->tanggal }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">{{ $berita->kategori->nama ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap border-r border-gray-200">
                        @if ($berita->image)
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="Gambar Berita" style="max-width: 100px; max-height: 80px;">
                        @else
                            Tidak Ada Gambar
                        @endif
                    </td>
                    {{-- Ini adalah kolom Aksi Anda --}}
                    <td class="px-2 py-4 whitespace-nowrap text-center text-sm font-medium">
        {{-- Tombol EDIT --}}
        <a href="{{ route('berita.edit', $berita->id) }}" class="text-blue-600 hover:text-blue-900 inline-flex items-center">
            <i class="fas fa-edit mr-1"></i> {{-- Icon Edit --}}
            Edit {{-- Anda bisa hapus teks 'Edit' jika ingin hanya icon --}}
        </a>

        {{-- Tombol HAPUS --}}
        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')" class="inline ml-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900 inline-flex items-center">
                <i class="fas fa-trash-alt mr-1"></i> {{-- Icon Hapus --}}
                Hapus {{-- Anda bisa hapus teks 'Hapus' jika ingin hanya icon --}}
            </button>
        </form>
    </td>
                </tr>
            <td>
                
    @endforeach
    {{-- Jika tidak ada data --}}
            @if($beritas->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">Belum ada berita.</td>
                </tr>
            @endif

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