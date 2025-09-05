<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function slideFoto()
    {
        return view('admin.beranda.slide_foto.index');
    }

    public function statistik()
    {
        return view('admin.beranda.statistik.statistik');
    }
}
