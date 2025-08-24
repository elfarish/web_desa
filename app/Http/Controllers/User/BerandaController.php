<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Statistik;


class BerandaController extends Controller
{
    public function index()
    {
        // Ambil semua slide aktif
        $slides = Slide::where('is_active', true)->latest()->get();

        // Ambil statistik
        $stats = Statistik::all();

        // Kirim ke view user.beranda
        return view('user.beranda', compact('slides', 'stats'));
    }
}
