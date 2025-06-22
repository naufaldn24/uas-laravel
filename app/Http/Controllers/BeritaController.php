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
        $imagePath = null; // Inisialisasi dengan null

        if ($request->hasFile('image')) {
            // Ini adalah bagian KRITIS untuk menyimpan gambar dan mendapatkan PATH yang benar
            $imagePath = $request->file('image')->store('berita_images', 'public');
            // 'berita_images' adalah subfolder di dalam storage/app/public
            // dd($imagePath);
            // 'public' adalah disk storage yang mengarah ke storage/app/public
            // $imagePath akan berisi string seperti 'berita_images/nama_unik_file.jpg'
        }
       
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi, // Pastikan 'isi' juga disimpan
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'image' => $imagePath, // Pastikan ini $imagePath, yang berisi path relatif
        ]);

        // Berita::create($request->all());

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
        $imagePath = $berita->image; // Pertahankan gambar yang sudah ada secara default

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('berita_images', 'public');
        } elseif ($request->input('remove_image')) { // Opsional: Tambahkan checkbox untuk menghapus gambar
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
