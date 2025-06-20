@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-6">Daftar Kategori</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 text-right">
            <a href="{{ route('kategori.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Kategori
            </a>
        </div>

        <table class="min-w-full table-auto border border-gray-300 divide-y divide-gray-200 shadow-sm">
            <thead class="bg-gray-100 text-xs text-gray-700 uppercase font-semibold">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($kategoris as $kategori)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $kategori->nama }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus kategori ini?')"
                                    class="text-red-500 hover:underline ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection