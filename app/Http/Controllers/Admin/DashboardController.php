<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Potensi;
use App\Models\Struktural;
use App\Models\Visitor; // pastikan ada model Visitor untuk tracking pengunjung
use App\Models\Todo;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total
        $totalBerita = Berita::count();
        $totalDokumen = Layanan::count();
        $totalPotensi = Potensi::count();
        $totalStruktural = Struktural::count();
        $totalVisitors = Visitor::count(); // total pengunjung web

        // Recent Messages
        $recentMessages = Message::latest()->take(5)->get();

        // To Do List
        $todoList = Todo::orderBy('deadline', 'asc')->take(6)->get();

        // Chart pengunjung (misal per bulan tahun ini)
        $visitorLabels = [];
        $visitorData = [];
        for ($m = 1; $m <= 12; $m++) {
            $visitorLabels[] = date('M', mktime(0, 0, 0, $m, 1));
            $visitorData[] = Visitor::whereMonth('created_at', $m)->whereYear('created_at', date('Y'))->count();
        }

        // Chart layanan populer (top 5 layanan dengan download terbanyak)
        $layananTop = Layanan::orderBy('download_count', 'desc')->take(5)->get();
        $layananLabels = $layananTop->pluck('nama_file');
        $layananData = $layananTop->pluck('download_count');

        return view('admin.dashboard.index', compact(
            'totalBerita',
            'totalDokumen',
            'totalPotensi',
            'totalStruktural',
            'totalVisitors',
            'recentMessages',
            'todoList',
            'visitorLabels',
            'visitorData',
            'layananLabels',
            'layananData'
        ));
    }
}
