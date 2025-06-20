<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategori')->latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.berita.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Berita::create($request->all());

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.berita.edit', compact('berita', 'kategoris'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $berita->fill($request->only(['judul', 'isi', 'penulis', 'tanggal', 'kategori_id']));
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    // ✅ Tambahan: untuk menampilkan berita publik ke frontend
    public function publicIndex()
    {
        $beritas = Berita::with('kategori')->latest()->paginate(4);
        return view('frontend.berita', compact('beritas'));
    }


    public function showPublic($slug)
    {
        $berita = Berita::where('slug', $slug)->with('kategori')->firstOrFail();
        return view('frontend.berita-show', compact('berita'));
    }
    
}
