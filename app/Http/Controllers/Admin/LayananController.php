<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Halaman utama Layanan (tampilkan semua dokumen)
     */
    public function index()
    {
        $layanans = Dokumen::latest()->get(); // semua kategori
        return view('admin.layanan.index', compact('layanans'));
    }

    /**
     * Form untuk membuat dokumen baru
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Simpan dokumen baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'nama_file' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Jika pilih kategori "lainnya", pakai input tambahan
        $kategori = $request->kategori;
        if ($kategori === 'lainnya' && $request->kategori_lain) {
            $kategori = $request->kategori_lain;
        }

        // Ambil file yang diupload
        $file = $request->file('file');
        $originalExtension = $file->getClientOriginalExtension();

        // Buat nama file rapi: kategori_namafile_timestamp.ext
        $safeName = strtolower(str_replace(' ', '_', $request->nama_file)); // ganti spasi dengan _
        $fileName = $kategori . '_' . $safeName . '_' . time() . '.' . $originalExtension;

        // Simpan file ke storage/public/layanan/dokumen
        $filePath = $file->storeAs('layanan/dokumen', $fileName, 'public');

        Dokumen::create([
            'kategori' => $kategori,
            'nama_file' => $request->nama_file,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.layanan.index')->with('success', 'Dokumen berhasil di-upload.');
    }


    /**
     * Form edit dokumen
     */
    public function edit($id)
    {
        $layanan = Dokumen::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update dokumen
     */
    public function update(Request $request, $id)
    {
        $layanan = Dokumen::findOrFail($id);

        $request->validate([
            'kategori' => 'required|string',
            'nama_file' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // Jika upload file baru, hapus file lama
        if ($request->hasFile('file')) {
            if ($layanan->file_path && Storage::disk('public')->exists($layanan->file_path)) {
                Storage::disk('public')->delete($layanan->file_path);
            }
            $layanan->file_path = $request->file('file')->store('layanan/dokumen', 'public');
        }

        // Update data
        $kategori = $request->kategori;
        if ($kategori === 'lainnya' && $request->kategori_lain) {
            $kategori = $request->kategori_lain;
        }

        $layanan->kategori = $kategori;
        $layanan->nama_file = $request->nama_file;
        $layanan->deskripsi = $request->deskripsi;
        $layanan->save();

        return redirect()->route('admin.layanan.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Download file dokumen
     */
    public function downloadFile($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            $path = storage_path('app/public/' . $dokumen->file_path);
            return response()->download($path, $dokumen->nama_file . '.' . pathinfo($dokumen->file_path, PATHINFO_EXTENSION));
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    /**
     * Hapus dokumen
     */
    public function destroy($id)
    {
        // Ambil dokumen berdasarkan ID
        $dokumen = Dokumen::findOrFail($id);

        // Hapus file fisik jika ada
        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        // Hapus record di database
        $dokumen->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.layanan.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }
}
