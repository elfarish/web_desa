<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Daftar berita
    public function index(Request $request)
    {
        $query = Berita::query();

        // Add search functionality
        if ($request->has('search') && $request->search) {
            $query->where('judul', 'like', '%'.$request->search.'%')
                ->orWhere('kategori', 'like', '%'.$request->search.'%');
        }

        $berita = $query->where('status', 'published')
            ->with('user:id,name') // Only load necessary user data
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        return view('user.berita.index', compact('berita'));
    }

    // Detail berita
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'published')
            ->with('user:id,name') // Only load necessary user data
            ->firstOrFail();

        return view('user.berita.show', compact('berita'));
    }
}
