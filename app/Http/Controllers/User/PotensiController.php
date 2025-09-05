<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class PotensiController extends Controller
{
    public function index()
    {
        $potensi = [
            ['title' => 'BUMDes', 'desc' => 'Badan Usaha Milik Desa (BUMDes) sebagai motor penggerak ekonomi desa.', 'icon' => 'bi-bank'],
            ['title' => 'UMKM Desa', 'desc' => 'Usaha Mikro Kecil dan Menengah lokal yang mendukung perekonomian warga.', 'icon' => 'bi-shop'],
            ['title' => 'Pertanian', 'desc' => 'Sektor pertanian sebagai sumber mata pencaharian utama masyarakat.', 'icon' => 'bi-flower2'],
            ['title' => 'Perikanan', 'desc' => 'Potensi perikanan air tawar dan laut yang menjanjikan.', 'icon' => 'bi-droplet-half'],
            ['title' => 'Peternakan', 'desc' => 'Berbagai jenis peternakan seperti sapi, kambing, dan ayam.', 'icon' => 'bi-egg-fried'],
            ['title' => 'Koperasi Desa', 'desc' => 'Koperasi sebagai wadah pemberdayaan ekonomi masyarakat.', 'icon' => 'bi-people'],
        ];

        return view('user.potensi.index', compact('potensi'));
    }
}
