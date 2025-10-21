<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function pengajuanProposal()
    {
        return view('admin.layanan.pengajuan_proposal.index');
    }

    public function templateSurat()
    {
        $query = \App\Models\TamplateSurat::query();

        if (request('search')) {
            $query->where('nama_template', 'like', '%'.request('search').'%');
        }

        $templates = $query->latest()->paginate(10);

        return view('admin.layanan.tamplate_surat.tamplate_surat', compact('templates'));
    }
}
