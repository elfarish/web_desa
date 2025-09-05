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
        $slides = Slide::all();
        $stats = Statistik::all(); // <-- pastikan ada
        return view('user.beranda', compact('slides', 'stats'));
    }
}
