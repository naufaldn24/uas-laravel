<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('berita_images', 'public');
        }

        Berita::create([
            'user_id' => 1,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'image' => $imagePath,
        ]);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $berita->image;

        if ($request->hasFile('image')) {
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
            $imagePath = $request->file('image')->store('berita_images', 'public');
        } elseif ($request->input('remove_image')) {
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
            $imagePath = null;
        }

        $berita->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'image' => $imagePath,
        ]);

        $berita->fill($request->only(['judul', 'isi', 'penulis', 'tanggal', 'kategori_id']));
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->image) {
            Storage::disk('public')->delete($berita->image);
        }
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    // Metode untuk menampilkan daftar berita publik
    public function publicIndex()
    {
        $beritas = Berita::with('kategori')->latest()->paginate(6);
        return view('frontend.berita', compact('beritas'));
    }

    // Metode untuk menampilkan detail berita publik
    public function showPublic($slug)
    {
        // Cari berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->with('kategori')->firstOrFail();

        // Ambil 5 berita terbaru lainnya, kecuali berita yang sedang dilihat
        // Gunakan where('id', '!=', $berita->id) untuk mengecualikan berita saat ini
        $otherBeritas = Berita::where('id', '!=', $berita->id)
            ->latest()
            ->limit(5) // Ambil 5 berita terbaru
            ->get();

        // Kirim berita dan berita lainnya ke view
        return view('frontend.berita-show', compact('berita', 'otherBeritas'));
    }
}
