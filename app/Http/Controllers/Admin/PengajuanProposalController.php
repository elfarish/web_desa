<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengajuanProposal;

class PengajuanProposalController extends Controller
{
    /**
     * Tampilkan semua pengajuan proposal
     */
    public function index()
    {
        $proposals = PengajuanProposal::all(); // ubah variabel jadi plural
        return view('admin.layanan.pengajuan_proposal.pengajuan_proposal', compact('proposals'));
    }

    /**
     * Form untuk membuat pengajuan baru
     */
    public function create()
    {
        return view('admin.layanan.pengajuan_proposal.create');
    }

    /**
     * Simpan pengajuan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url|max:255',
        ]);

        PengajuanProposal::create($request->only('nama', 'link'));

        return redirect()->route('admin.layanan.pengajuan_proposal.index')
            ->with('success', 'Pengajuan berhasil ditambahkan.');
    }


    /**
     * Form edit pengajuan
     */
    public function edit(PengajuanProposal $pengajuanProposal)
    {
        return view('admin.layanan.pengajuan_proposal.edit', compact('pengajuanProposal'));
    }

    /**
     * Update pengajuan
     */
    public function update(Request $request, PengajuanProposal $pengajuanProposal)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'required|url|max:255',
        ]);

        $pengajuanProposal->update($request->only('nama', 'link'));

        return redirect()->route('admin.layanan.pengajuan_proposal.index')
            ->with('success', 'Pengajuan berhasil diperbarui.');
    }


    /**
     * Hapus pengajuan
     */
    public function destroy(PengajuanProposal $pengajuanProposal)
    {
        $pengajuanProposal->delete();

        return redirect()->route('admin.layanan.pengajuan_proposal.index')
            ->with('success', 'Pengajuan berhasil dihapus.');
    }
}
