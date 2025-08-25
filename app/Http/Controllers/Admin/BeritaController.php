<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;




class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:300',
            'kategori'  => 'required|string|max:100',
            'ringkasan' => 'required|string', // max 500 karakter
            'isi'       => 'required|string', // max 5000 karakter
            'status'    => 'required|in:draft,published,pending',
            'tanggal'   => 'required|date',
            'gambar'    => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ], [
            'ringkasan.max' => 'Ringkasan terlalu panjang. Maksimal 500 karakter.',
            'isi.max'       => 'Isi berita terlalu panjang. Maksimal 5000 karakter.',
        ]);


        $path = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $namaFile = time() . '.' . $extension;
            $path = $file->storeAs('berita', $namaFile, 'public');
        }

        Berita::create([
            'judul'     => $validated['judul'],
            'kategori'  => $validated['kategori'],
            'ringkasan' => $validated['ringkasan'],
            'isi'       => $validated['isi'],
            'status'    => $validated['status'],
            'tanggal'   => $validated['tanggal'],
            'gambar'    => $path,
            'penulis'   => Auth::user()->name,
            'slug'      => Str::slug($validated['judul'] . '-' . time()),
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil disimpan!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('admin.berita.show', compact('berita'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul'     => 'required|string|max:300',
            'kategori'  => 'required|string|max:100',
            'ringkasan' => 'required|string', // max 500 karakter
            'isi'       => 'required|string', // max 5000 karakter
            'status'    => 'required|in:draft,published,pending',
            'tanggal'   => 'required|date',
            'gambar'    => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ], [
            'ringkasan.max' => 'Ringkasan terlalu panjang. Maksimal 500 karakter.',
            'isi.max'       => 'Isi berita terlalu panjang. Maksimal 5000 karakter.',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $validated['gambar'] = $request->file('gambar')->storeAs('berita', $filename, 'public');
        }

        $validated['penulis'] = Auth::user()->name;

        $berita->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
