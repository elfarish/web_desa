<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Struktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Struktural::class, 'struktural');
    }

    public function index()
    {
        $kepengurusan = Struktural::where('kategori', 'kepengurusan')->orderBy('jabatan')->paginate(10);
        $bpd = Struktural::where('kategori', 'bpd')->orderBy('jabatan')->paginate(10);

        return view('admin.struktural.struktural', compact('kepengurusan', 'bpd'));
    }

    public function create()
    {
        $galeri = Galeri::latest()->get();

        return view('admin.struktural.create', compact('galeri'));
    }

    public function edit(Struktural $struktural)
    {
        $galeri = Galeri::latest()->get();

        return view('admin.struktural.edit', compact('struktural', 'galeri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:kepengurusan,bpd',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'foto_galeri' => 'nullable|string',
        ]);

        $path = null;

        // Upload file baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $cleanName = preg_replace('/[^a-z0-9\-]/', '', strtolower($request->nama));
            $filename = uniqid().'-'.$cleanName.'.'.$extension;

            $path = $file->storeAs('struktural', $filename, 'public');
        }
        // Pilih dari galeri
        elseif ($request->filled('foto_galeri')) {
            $path = $request->foto_galeri;
        }

        $validated['foto'] = $path;

        Struktural::create($validated);

        return redirect()->route('admin.struktural.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, Struktural $struktural)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:kepengurusan,bpd',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'foto_galeri' => 'nullable|string',
        ]);

        $path = $struktural->foto;

        // Upload file baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $cleanName = preg_replace('/[^a-z0-9\-]/', '', strtolower($request->nama));
            $filename = uniqid().'-'.$cleanName.'.'.$extension;

            // Hapus foto lama jika bukan dari galeri
            if ($path && Storage::disk('public')->exists($path) && strpos($path, 'galeri/') !== 0) {
                Storage::disk('public')->delete($path);
            }

            $path = $file->storeAs('struktural', $filename, 'public');
        }
        // Pilih dari galeri
        elseif ($request->filled('foto_galeri')) {
            // Hapus foto lama jika bukan dari galeri
            if ($path && Storage::disk('public')->exists($path) && strpos($path, 'galeri/') !== 0) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->foto_galeri;
        }

        $validated['foto'] = $path;

        $struktural->update($validated);

        return redirect()->route('admin.struktural.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Struktural $struktural)
    {
        if ($struktural->foto && Storage::disk('public')->exists($struktural->foto) && strpos($struktural->foto, 'galeri/') !== 0) {
            Storage::disk('public')->delete($struktural->foto);
        }

        $struktural->delete();

        return redirect()->route('admin.struktural.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
