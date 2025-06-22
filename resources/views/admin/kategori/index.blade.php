@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-6 text-blue-800">Daftar Kategori</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 text-right">
            <a href="{{ route('kategori.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 shadow">
                + Tambah Kategori
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
                <thead class="bg-blue-50 text-blue-700 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama Kategori</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($kategoris as $kategori)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-sm">{{ $kategori->nama }}</td>
                            <td class="px-6 py-3 text-center text-sm">
                                <a href="{{ route('kategori.edit', $kategori->id) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium mr-3">✏️ Edit</a>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                        class="text-red-500 hover:text-red-700 font-medium">🗑️ Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection