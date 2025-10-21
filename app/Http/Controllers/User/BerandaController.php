<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Statistik;

class BerandaController extends Controller
{
    public function index()
    {
        $slides = Slide::where('is_active', true)->get(); // Only active slides
        $stats = Statistik::all();

        // Add visitor count to stats
        $visitorCount = \App\Models\Visitor::count();
        $stats->push((object) [
            'icon' => 'bi bi-eye',
            'count' => $visitorCount,
            'label' => 'Pengunjung Website',
        ]);

        return view('user.beranda', compact('slides', 'stats'));
    }
}
