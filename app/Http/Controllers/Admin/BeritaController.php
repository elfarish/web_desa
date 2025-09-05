<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // Pasang middleware auth di constructor
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $berita = Berita::with('user')->latest()->paginate(10);
        return view('admin.berita.berita', compact('berita'));
    }

    public function create()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.berita.create', compact('galeri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'         => 'required|string|max:300',
            'kategori'      => 'required|string|max:100',
            'ringkasan'     => 'required|string|max:500',
            'isi'           => 'required|string|max:5000',
            'status'        => 'required|in:draft,published,pending',
            'tanggal'       => 'required|date',
            'gambar'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'gambar_galeri' => 'nullable|string',
        ]);

        $path = null;

        // Upload file baru
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $namaFile, 'public');
        }
        // Pilih dari galeri
        elseif ($request->filled('gambar_galeri')) {
            $path = str_replace(asset('storage/'), '', $request->gambar_galeri);
        }

        Berita::create([
            'user_id'   => Auth::id() ?? 1,
            'judul'     => $validated['judul'],
            'kategori'  => $validated['kategori'],
            'ringkasan' => $validated['ringkasan'],
            'isi'       => $validated['isi'],
            'status'    => $validated['status'],
            'tanggal'   => $validated['tanggal'],
            'gambar'    => $path,
            'slug'      => Str::slug($validated['judul']) . '-' . time(),
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil disimpan!');
    }

    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->with('user')->firstOrFail();
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        $galeri = Galeri::latest()->get();
        return view('admin.berita.edit', compact('berita', 'galeri'));
    }

    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul'         => 'required|string|max:300',
            'kategori'      => 'required|string|max:100',
            'ringkasan'     => 'required|string|max:500',
            'isi'           => 'required|string|max:5000',
            'status'        => 'required|in:draft,published,pending',
            'tanggal'       => 'required|date',
            'gambar'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'gambar_galeri' => 'nullable|string',
        ]);

        $path = $berita->gambar;

        // Upload file baru
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('berita', $namaFile, 'public');
        }
        // Pilih dari galeri
        elseif ($request->filled('gambar_galeri')) {
            $path = str_replace(asset('storage/'), '', $request->gambar_galeri);
        }

        // Update manual agar user_id selalu ada
        $berita->update([
            'judul'     => $validated['judul'],
            'kategori'  => $validated['kategori'],
            'ringkasan' => $validated['ringkasan'],
            'isi'       => $validated['isi'],
            'status'    => $validated['status'],
            'tanggal'   => $validated['tanggal'],
            'gambar'    => $path,
            'slug'      => $berita->judul !== $validated['judul']
                ? Str::slug($validated['judul']) . '-' . time()
                : $berita->slug,
            'user_id'   => Auth::id() ?? 1,
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
