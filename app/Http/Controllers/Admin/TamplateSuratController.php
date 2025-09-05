<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TamplateSurat;
use Illuminate\Support\Facades\Storage;

class TamplateSuratController extends Controller
{
    public function index()
    {
        $templates = TamplateSurat::latest()->get();
        return view('admin.layanan.tamplate_surat.tamplate_surat', compact('templates'));
    }

    public function create()
    {
        return view('admin.layanan.tamplate_surat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_template' => 'required|string|max:255',
            'kategori'      => 'nullable|string',
            'deskripsi'     => 'nullable|string',
            'file'          => 'required|file|mimes:pdf,doc,docx',
            'file_galeri'   => 'nullable|string', // opsional pilih dari galeri
        ]);

        // Jika upload manual
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . strtolower(str_replace(' ', '_', $request->nama_template)) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('tamplate_surat', $fileName, 'public');
        }
        // Jika pilih dari galeri
        elseif ($request->filled('file_galeri')) {
            $filePath = $request->file_galeri;
        } else {
            $filePath = null;
        }

        TamplateSurat::create([
            'nama_template' => $request->nama_template,
            'kategori'      => $request->kategori,
            'deskripsi'     => $request->deskripsi,
            'file_path'     => $filePath,
        ]);

        return redirect()->route('admin.layanan.tamplate_surat.index')->with('success', 'Tamplate berhasil ditambahkan.');
    }

    public function edit(TamplateSurat $tamplateSurat)
    {
        return view('admin.layanan.tamplate_surat.edit', compact('tamplateSurat'));
    }

    public function update(Request $request, TamplateSurat $tamplateSurat)
    {
        $request->validate([
            'nama_template' => 'required|string|max:255',
            'kategori'      => 'nullable|string',
            'deskripsi'     => 'nullable|string',
            'file'          => 'nullable|file|mimes:pdf,doc,docx',
            'file_galeri'   => 'nullable|string',
        ]);

        $filePath = $tamplateSurat->file_path;

        if ($request->hasFile('file')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $file = $request->file('file');
            $fileName = time() . '_' . strtolower(str_replace(' ', '_', $request->nama_template)) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('tamplate_surat', $fileName, 'public');
        } elseif ($request->filled('file_galeri')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file_galeri;
        }

        $tamplateSurat->update([
            'nama_template' => $request->nama_template,
            'kategori'      => $request->kategori,
            'deskripsi'     => $request->deskripsi,
            'file_path'     => $filePath,
        ]);

        return redirect()->route('admin.layanan.tamplate_surat.index')->with('success', 'Template berhasil diperbarui.');
    }

    public function destroy(TamplateSurat $tamplateSurat)
    {
        if ($tamplateSurat->file_path && Storage::disk('public')->exists($tamplateSurat->file_path)) {
            Storage::disk('public')->delete($tamplateSurat->file_path);
        }
        $tamplateSurat->delete();

        return redirect()->route('admin.layanan.tamplate_surat.index')->with('success', 'Template berhasil dihapus.');
    }

    public function download(TamplateSurat $tamplateSurat)
    {
        if ($tamplateSurat->file_path && Storage::disk('public')->exists($tamplateSurat->file_path)) {
            return response()->download(storage_path('app/public/' . $tamplateSurat->file_path));
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
