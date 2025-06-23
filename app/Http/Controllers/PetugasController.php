<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all(); // Mengambil semua user dari tabel users
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,petugas', // Anda menambahkan ini, pastikan ada input role di form
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas', // Ini akan mengesampingkan input role jika ada, pastikan sesuai kebutuhan
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    // UBAH: Parameter dari $petugas menjadi $petuga
    public function show(User $petuga)
    {
        // UBAH: Variabel yang dikirim ke view juga menjadi 'petuga'
        return view('admin.petugas.show', compact('petuga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // UBAH: Parameter dari $petugas menjadi $petuga
    public function edit(User $petuga)
    {
        // UBAH: Variabel yang dikirim ke view juga menjadi 'petuga'
        return view('admin.petugas.edit', compact('petuga'));
    }

    /**
     * Update the specified resource in storage.
     */
    // UBAH: Parameter dari $petugas menjadi $petuga
    public function update(Request $request, User $petuga)
    {
        $rules = [
            'name' => 'required|string|max:255',
            // UBAH: Gunakan $petuga->id untuk unique validation
            'email' => 'required|string|email|max:255|unique:users,email,' . $petuga->id,
            'role' => 'required|in:admin,petugas',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8|confirmed';
        }

        $request->validate($rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // UBAH: Gunakan $petuga->update()
        $petuga->update($data);

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // UBAH: Kembali menggunakan Route Model Binding ($petuga)
    public function destroy(User $petuga)
    {
        try {
            // UBAH: Gunakan $petuga->delete()
            $petugas->delete();
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus!');
        } catch (\Exception $e) {
            // UBAH: Gunakan $petuga->id di log error
            Log::error('Gagal menghapus petugas ID ' . $petuga->id . ': ' . $e->getMessage());
            return redirect()->route('petugas.index')->with('error', 'Gagal menghapus petugas. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }
}