@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Edit Petugas</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM ACTION SUDAH BENAR --}}
        <form method="POST" action="{{ route('petugas.update', $petuga->id) }}">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                {{-- PERBAIKAN DI SINI: $petugas.name menjadi $petuga.name --}}
                <input id="name" type="text" name="name" value="{{ old('name', $petuga->name) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                {{-- PERBAIKAN DI SINI: $petugas.email menjadi $petuga.email --}}
                <input id="email" type="email" name="email" value="{{ old('email', $petuga->email) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            {{-- Password (Opsional untuk Edit) --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password (biarkan kosong jika tidak ingin mengubah)</label>
                <input id="password" type="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tambahkan input role (pastikan ini ada di form Anda, saya tambahkan di sini) --}}
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select id="role" name="role"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    {{-- PERBAIKAN DI SINI: $petugas.role menjadi $petuga.role --}}
                    <option value="admin" {{ old('role', $petuga->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    {{-- PERBAIKAN DI SINI: $petugas.role menjadi $petuga.role --}}
                    <option value="petugas" {{ old('role', $petuga->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition-all duration-200">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection