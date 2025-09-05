<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // Daftar berita
    public function index()
    {
        $berita = Berita::where('status', 'published')->latest()->paginate(10);
        return view('user.berita.index', compact('berita'));
    }

    // Detail berita
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'published')->firstOrFail();
        return view('user.berita.show', compact('berita'));
    }
}
