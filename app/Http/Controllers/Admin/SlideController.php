<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Slide::class, 'slide');
    }

    public function index()
    {
        $slides = Slide::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.beranda.slide_foto.slide', compact('slides'));
    }

    public function create()
    {
        return view('admin.beranda.slide_foto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:5120', // max 5MB
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('slide', $filename, 'public');
        } else {
            $path = null;
        }

        Slide::create([
            'gambar' => $path,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.beranda.slide.index')
            ->with('success', 'Slide berhasil ditambahkan.');
    }

    public function edit(Slide $slide)
    {
        return view('admin.beranda.slide_foto.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120', // max 5MB
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus file lama
            if ($slide->gambar && Storage::disk('public')->exists($slide->gambar)) {
                Storage::disk('public')->delete($slide->gambar);
            }

            $file = $request->file('gambar');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('slide', $filename, 'public');

            $slide->gambar = $path;
        }

        $slide->is_active = $request->is_active;
        $slide->save();

        return redirect()->route('admin.beranda.slide.index')
            ->with('success', 'Slide berhasil diupdate.');
    }

    public function destroy(Slide $slide)
    {
        if ($slide->gambar && Storage::disk('public')->exists($slide->gambar)) {
            Storage::disk('public')->delete($slide->gambar);
        }

        $slide->delete();

        return redirect()->route('admin.beranda.slide.index')
            ->with('success', 'Slide berhasil dihapus.');
    }
}
