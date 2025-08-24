<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistik;

class StatistikController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.beranda');
    }

    public function create()
    {
        return view('admin.beranda.statistik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'  => 'required|string',
            'count' => 'required|integer',
            'label' => 'required|string|max:255'
        ]);

        Statistik::create($request->all());

        return redirect()->route('admin.beranda')->with('success', 'Statistik berhasil ditambahkan.');
    }

    public function edit(Statistik $statistik)
    {
        return view('admin.beranda.statistik.edit', compact('statistik'));
    }

    public function update(Request $request, Statistik $statistik)
    {
        $request->validate([
            'icon'  => 'required|string',
            'count' => 'required|integer',
            'label' => 'required|string|max:255'
        ]);

        $statistik->update($request->all());

        return redirect()->route('admin.beranda')->with('success', 'Statistik berhasil diupdate.');
    }

    public function destroy(Statistik $statistik)
    {
        $statistik->delete();
        return redirect()->route('admin.beranda')->with('success', 'Statistik berhasil dihapus.');
    }
}
