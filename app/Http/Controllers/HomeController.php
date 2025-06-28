<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Pastikan model Berita diimpor

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get(); // atau take(3) kalau mau dibatasi
        return view('frontend.home', compact('beritas'));
    }

    // Metode baru untuk halaman Profil
    public function profil()
    {
        // Ambil beberapa berita terbaru untuk ditampilkan di sidebar
        $otherBeritas = Berita::latest()->limit(5)->get(); // Ambil 5 berita terbaru

        return view('frontend.profil', compact('otherBeritas'));
    }
    public function visiMisi()
    {
        // Ambil beberapa berita terbaru untuk ditampilkan di sidebar
        $otherBeritas = Berita::latest()->limit(5)->get(); // Ambil 5 berita terbaru

        return view('frontend.visi-misi', compact('otherBeritas'));
    }
}
