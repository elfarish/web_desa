<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10); // Ambil data galeri
        return view('admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan langsung ke folder storage/app/public/galeri
            $file->move(storage_path('app/public/galeri'), $filename);

            Galeri::create([
                'judul' => $request->judul,
                'gambar' => $filename,
            ]);

            return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil diupload.');
        }

        return back()->withErrors(['gambar' => 'Gagal mengupload gambar.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari foto berdasarkan ID
        $foto = Galeri::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        $filePath = storage_path('app/public/galeri/' . $foto->gambar);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Hapus data dari database
        $foto->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}
