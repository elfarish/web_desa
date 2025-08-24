<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function create()
    {
        return view('admin.beranda.slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image',
            'is_active' => 'required|boolean',
        ]);

        $file = $request->file('gambar')->store('slide', 'public');

        Slide::create([
            'gambar' => $file,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.beranda')->with('success', 'Slide berhasil ditambahkan.');
    }

    public function edit(Slide $slide)
    {
        return view('admin.beranda.slide.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'gambar' => 'nullable|image',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            if ($slide->gambar && Storage::disk('public')->exists($slide->gambar)) {
                Storage::disk('public')->delete($slide->gambar);
            }

            $file = $request->file('gambar')->store('slide', 'public');
            $slide->gambar = $file;
        }

        $slide->is_active = $request->is_active;
        $slide->save();

        return redirect()->route('admin.beranda')->with('success', 'Slide berhasil diupdate.');
    }

    public function destroy(Slide $slide)
    {
        // Hapus file gambar dari storage jika ada
        if ($slide->gambar && Storage::disk('public')->exists($slide->gambar)) {
            Storage::disk('public')->delete($slide->gambar);
        }

        // Hapus record slide dari database
        $slide->delete();

        return redirect()->route('admin.beranda')->with('success', 'Slide berhasil dihapus.');
    }
}
