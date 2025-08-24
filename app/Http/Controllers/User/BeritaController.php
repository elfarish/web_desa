<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('profile.berita.index', compact('berita'));
    }

    public function show(string $slug)
    {
        $item = Berita::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Hitung views
        $item->increment('views');

        return view('profile.berita.show', compact('item'));
    }
}
