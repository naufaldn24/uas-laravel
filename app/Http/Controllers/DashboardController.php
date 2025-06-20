<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahKategori = Kategori::count();
        $jumlahUser = User::count(); // kalau pakai auth

        return view('dashboard', compact('jumlahBerita', 'jumlahKategori', 'jumlahUser'));
    }
}
