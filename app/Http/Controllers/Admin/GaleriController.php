<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Galeri::class, 'galeri');
    }

    /**
     * Menampilkan daftar galeri.
     */
    public function index(Request $request)
    {
        $query = Galeri::query();

        // Add search functionality
        if ($request->has('search') && $request->search) {
            $query->where('judul', 'like', '%'.$request->search.'%');
        }

        $galeri = $query->latest()->paginate(12)->appends($request->query());

        return view('admin.galeri.galeri', compact('galeri'));
    }

    /**
     * Tampilkan form untuk menambahkan galeri baru.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Simpan galeri baru ke storage dan database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // buat nama file rapi
        $file = $request->file('gambar');
        $namaAsli = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $slugNama = Str::slug($validated['judul'] ?? $namaAsli);
        $namaFile = time().'_'.$slugNama.'.'.$file->getClientOriginalExtension();

        // simpan ke folder galeri
        $path = $file->storeAs('galeri', $namaFile, 'public');

        Galeri::create([
            'judul' => $validated['judul'] ?? null,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil diupload.');
    }

    /**
     * Tampilkan form untuk mengedit galeri.
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    /**
     * Perbarui data galeri.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            $file = $request->file('gambar');
            $namaAsli = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $slugNama = Str::slug($validated['judul'] ?? $namaAsli);
            $namaFile = time().'_'.$slugNama.'.'.$file->getClientOriginalExtension();

            $galeri->gambar = $file->storeAs('galeri', $namaFile, 'public');
        }

        $galeri->judul = $validated['judul'] ?? $galeri->judul;
        $galeri->save();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Hapus galeri beserta file gambarnya.
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}
