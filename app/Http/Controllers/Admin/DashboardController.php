<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisitors = Visitor::count();

        $features = [
            ['icon' => 'bi-newspaper', 'title' => 'Berita', 'desc' => 'Kelola berita desa.'],
            ['icon' => 'bi-people', 'title' => 'Layanan', 'desc' => 'Kelola layanan masyarakat.'],
            ['icon' => 'bi-images', 'title' => 'Galeri', 'desc' => 'Kelola galeri foto desa.'],
            ['icon' => 'bi-bar-chart-line', 'title' => 'Statistik', 'desc' => 'Fitur masih dalam pengembangan.'],
            ['icon' => 'bi-people-fill', 'title' => 'Pengunjung', 'desc' => 'Total: '.$totalVisitors],
            ['icon' => 'bi-tools', 'title' => 'Lainnya', 'desc' => 'Fitur masih dalam pengembangan.'],
        ];

        return view('admin.dashboard', compact('totalVisitors', 'features'));
    }
}
