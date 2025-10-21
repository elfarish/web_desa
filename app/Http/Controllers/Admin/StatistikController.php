<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Statistik::class, 'statistik');
    }

    /**
     * Tampilkan semua statistik
     */
    public function index()
    {
        $statistik = Statistik::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.beranda.statistik.statistik', compact('statistik'));
    }

    /**
     * Form untuk menambahkan statistik baru
     */
    public function create()
    {
        return view('admin.beranda.statistik.create');
    }

    /**
     * Simpan statistik baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'count' => 'required|integer',
            'label' => 'required|string|max:255',
        ]);

        Statistik::create($request->only('icon', 'count', 'label'));

        return redirect()->route('admin.beranda.statistik.index')
            ->with('success', 'Statistik berhasil ditambahkan.');
    }

    /**
     * Form untuk edit statistik
     */
    public function edit(Statistik $statistik)
    {
        return view('admin.beranda.statistik.edit', compact('statistik'));
    }

    /**
     * Update statistik
     */
    public function update(Request $request, Statistik $statistik)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'count' => 'required|integer',
            'label' => 'required|string|max:255',
        ]);

        $statistik->update($request->only('icon', 'count', 'label'));

        return redirect()->route('admin.beranda.statistik.index')
            ->with('success', 'Statistik berhasil diperbarui.');
    }

    /**
     * Hapus statistik
     */
    public function destroy(Statistik $statistik)
    {
        $statistik->delete();

        return redirect()->route('admin.beranda.statistik.index')
            ->with('success', 'Statistik berhasil dihapus.');
    }
}
