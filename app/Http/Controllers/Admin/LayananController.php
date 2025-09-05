<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function pengajuanProposal()
    {
        return view('admin.layanan.pengajuan_proposal.index');
    }

    public function templateSurat()
    {
        $templates = \App\Models\TamplateSurat::latest()->get();
        return view('admin.layanan.tamplate_surat.tamplate_surat', compact('templates'));
    }
}
