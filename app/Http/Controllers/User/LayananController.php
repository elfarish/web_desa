<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PengajuanProposal;
use App\Models\TamplateSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Halaman daftar template surat (untuk user).
     */
    public function surat(Request $request)
    {
        $query = TamplateSurat::query();

        // Add search functionality
        if ($request->has('search') && $request->search) {
            $query->where('nama_template', 'like', '%'.$request->search.'%')
                ->orWhere('kategori', 'like', '%'.$request->search.'%');
        }

        $templates = $query->latest()->paginate(10)->appends($request->query());

        return view('user.layanan.surat', compact('templates'));
    }

    /**
     * Halaman daftar proposal (untuk user).
     */
    public function proposal(Request $request)
    {
        $query = PengajuanProposal::query();

        // Add search functionality
        if ($request->has('search') && $request->search) {
            $query->where('nama', 'like', '%'.$request->search.'%');
        }

        $proposals = $query->latest()->paginate(10)->appends($request->query());

        return view('user.layanan.proposal', compact('proposals'));
    }

    /**
     * Download template surat berdasarkan ID.
     */
    public function downloadSurat($id)
    {
        $template = TamplateSurat::findOrFail($id);

        // Cek apakah file ada di storage/public
        if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
            return response()->download(storage_path('app/public/'.$template->file_path), basename($template->file_path));
        }

        return redirect()->back()->with('error', 'File surat tidak ditemukan.');
    }

    /**
     * Download file proposal berdasarkan ID.
     */
    public function downloadProposal($id)
    {
        $proposal = PengajuanProposal::findOrFail($id);

        // Cek apakah file ada di storage/public
        if ($proposal->file_path && Storage::disk('public')->exists($proposal->file_path)) {
            return response()->download(storage_path('app/public/'.$proposal->file_path));
        }

        // Kalau tidak ada file fisik, cek apakah ada link (Google Drive / URL eksternal)
        if ($proposal->link) {
            return redirect()->away($proposal->link);
        }

        return redirect()->back()->with('error', 'File proposal tidak ditemukan.');
    }
}
