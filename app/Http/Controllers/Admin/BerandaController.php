<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Statistik;

class BerandaController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $stats  = Statistik::all();

        return view('admin.beranda.index', compact('slides', 'stats'));
    }
}
