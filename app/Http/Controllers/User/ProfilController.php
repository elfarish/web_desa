<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class ProfilController extends Controller
{
    // Halaman profil desa: Sejarah + Galeri
    public function index()
    {
        $sejarah = 'Desa Pabuaran memiliki sejarah panjang ...';

        // Ambil galeri dengan pagination
        $galeri = Galeri::latest()->paginate(12);

        return view('user.profil.index', compact('sejarah', 'galeri'));
    }

    // Halaman sejarah desa (opsional)
    public function sejarah()
    {
        $sejarah = 'Desa Pabuaran memiliki sejarah panjang ...';

        // Ambil galeri dengan pagination
        $galeri = Galeri::latest()->paginate(12);

        return view('user.profil.sejarah_desa', compact('sejarah', 'galeri'));
    }

    // Halaman profil desa (bisa digabung dengan index)
    public function profilDesa()
    {
        $galeri = Galeri::latest()->paginate(12);

        return view('user.profil.profil_desa', compact('galeri'));
    }

    // Halaman Visi & Misi
    public function visiMisi()
    {
        $visi = 'Menjadi desa yang mandiri, sejahtera, dan berbudaya.';
        $misi = [
            'Meningkatkan kualitas pendidikan dan kesehatan masyarakat.',
            'Mengembangkan ekonomi lokal melalui UMKM dan pertanian.',
            'Mendorong partisipasi warga dalam pembangunan desa.',
        ];

        return view('user.profil.visi_misi', compact('visi', 'misi'));
    }
}
