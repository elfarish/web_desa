<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\FormLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LayananController extends Controller
{
    public function surat()
    {
        $surats = Dokumen::where('kategori', 'surat')->latest()->get();
        return view('user.layanan.surat', compact('surats'));
    }

    // Download surat
    public function downloadSurat($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            $path = storage_path('app/public/' . $dokumen->file_path);
            return response()->download($path, $dokumen->nama_file . '.' . pathinfo($dokumen->file_path, PATHINFO_EXTENSION));
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    public function proposal()
    {
        // Ambil semua dokumen kategori 'proposal'
        $proposals = Dokumen::where('kategori', 'proposal')->latest()->get();

        return view('user.layanan.proposal', compact('proposals'));
    }

    public function downloadProposal($id)
    {
        $proposal = Dokumen::findOrFail($id);

        if ($proposal->file_path && Storage::disk('public')->exists($proposal->file_path)) {
            $path = storage_path('app/public/' . $proposal->file_path);
            return response()->download($path, $proposal->nama_file . '.' . pathinfo($proposal->file_path, PATHINFO_EXTENSION));
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
