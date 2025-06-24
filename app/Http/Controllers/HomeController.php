<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get(); // atau take(3) kalau mau dibatasi
        return view('frontend.home', compact('beritas'));
    }
}

