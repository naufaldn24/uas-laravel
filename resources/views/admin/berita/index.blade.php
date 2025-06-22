@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Berita</h1>
            <a href="{{ route('berita.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                + Tambah Berita
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="min-w-full table-auto text-sm border-collapse">
            <thead class="bg-blue-50">
                <tr class="text-sm text-blue-800 font-semibold text-left">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
                <tbody>
                    @forelse ($beritas as $index => $berita)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">{{ $berita->judul }}</td>
                            <td class="py-2 px-4 border-b">{{ $berita->kategori->nama ?? '-' }}</td>
                            <td class="py-2 px-4 border-b">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                            </td>
                            <td class="py-2 px-4 border-b">
                                @if ($berita->image)
                                    <img src="{{ asset('storage/' . $berita->image) }}" alt="gambar"
                                        class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="italic text-gray-500">Tidak ada</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b space-x-2">
                                {{-- View (public page) --}}
                                <a href="{{ route('berita.show.public', $berita->slug) }}" target="_blank"
                                    class="inline-block text-blue-600 hover:text-blue-800">
                                    👁️ View
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('berita.edit', $berita->id) }}"
                                    class="inline-block text-yellow-500 hover:text-yellow-700">
                                    ✏️ Edit
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        ❌ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 px-4 text-center text-gray-500">
                                Belum ada berita yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
