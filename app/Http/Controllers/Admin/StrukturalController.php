<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Struktural;
use Illuminate\Support\Facades\Storage;

class StrukturalController extends Controller
{
    public function index()
    {
        // Hanya data kategori 'kepengurusan'
        $kepengurusan = Struktural::where('kategori', 'kepengurusan')
            ->orderBy('id', 'asc')
            ->paginate(5);

        // Hanya data kategori 'bpd'
        $bpd = Struktural::where('kategori', 'bpd')
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('admin.struktural.index', compact('kepengurusan', 'bpd'));
    }

    public function create()
    {
        return view('admin.struktural.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:kepengurusan,bpd',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Buat nama file custom: nama-staf-timestamp.ext
            $filename = time() . '-' . preg_replace('/\s+/', '-', strtolower($request->nama)) . '.' . $request->file('foto')->extension();

            // Simpan ke storage/app/public/struktural
            $path = $request->file('foto')->storeAs('struktural', $filename, 'public');

            $validated['foto'] = $path;
        }

        Struktural::create($validated);

        return redirect()->route('admin.struktural.index')->with('success', 'Data berhasil ditambahkan.');
    }


    public function edit(Struktural $struktural)
    {
        return view('admin.struktural.edit', compact('struktural'));
    }


    public function update(Request $request, Struktural $struktural)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:kepengurusan,bpd',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if ($struktural->foto && Storage::disk('public')->exists($struktural->foto)) {
                Storage::disk('public')->delete($struktural->foto);
            }

            // Buat nama file custom: timestamp-nama.ext
            $filename = time() . '-' . preg_replace('/\s+/', '-', strtolower($request->nama)) . '.' . $request->file('foto')->extension();

            // Simpan ke storage/app/public/struktural
            $path = $request->file('foto')->storeAs('struktural', $filename, 'public');

            $validated['foto'] = $path;
        }

        $struktural->update($validated);

        return redirect()->route('admin.struktural.index')->with('success', 'Data struktural berhasil diperbarui.');
    }


    public function destroy(Struktural $struktural)
    {
        // Hapus foto jika ada
        if ($struktural->foto) {
            Storage::disk('public')->delete($struktural->foto);
        }

        // Hapus data dari database
        $struktural->delete();

        return redirect()->route('admin.struktural.index')->with('success', 'Data struktural berhasil dihapus.');
    }
}
