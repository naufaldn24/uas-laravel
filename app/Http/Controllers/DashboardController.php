<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahKategori = Kategori::count();
        $jumlahUser = User::count();

        return view('dashboard', compact('jumlahBerita', 'jumlahKategori', 'jumlahUser'));
    }

    public function chartData()
    {
        $data = Berita::whereNotNull('tanggal')
            ->selectRaw('MONTH(tanggal) as bulan, COUNT(*) as total')
            ->groupByRaw('MONTH(tanggal)')
            ->orderByRaw('MONTH(tanggal)')
            ->get();

        return response()->json($data);
    }
}
