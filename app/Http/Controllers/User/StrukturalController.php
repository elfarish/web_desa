<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Struktural;

class StrukturalController extends Controller
{

    public function index()
    {
        $kepengurusan = Struktural::whereNotIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Ketua Bidang', 'Anggota'])
            ->latest()->paginate(10, ['*'], 'kepengurusan_page');

        $bpd = Struktural::whereIn('jabatan', ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Ketua Bidang', 'Anggota'])
            ->latest()->paginate(10, ['*'], 'bpd_page');

        return view('admin.struktural.index', compact('kepengurusan', 'bpd'));
    }

    public function kepengurusan()
    {
        $kepengurusan = [
            'kepalaDesa' => Struktural::where('jabatan', 'Kepala Desa')->first(),
            'sekdes' => Struktural::where('jabatan', 'Sekretaris Desa')->first(),
            'kasiKaur' => Struktural::whereIn('jabatan', ['Kasi Pemerintahan', 'Kasi Kesra', 'Kasi Pelayanan', 'Kaur Perencanaan', 'Kaur Umum dan TU', 'Kaur Keuangan'])->get(),
            'kadus' => Struktural::where('jabatan', 'like', 'Kepala Dusun%')->get(),
            'staf' => Struktural::where('jabatan', 'Staf Pembantu')->get(),
        ];

        return view('user.struktural.kepengurusan', compact('kepengurusan'));
    }

    public function lembagaBPD()
    {
        $bpd = Struktural::whereIn('jabatan', [
            'Ketua',
            'Wakil Ketua',
            'Sekretaris',
            'Ketua Bidang',
            'Anggota'
        ])->get();

        return view('user.struktural.lembaga_bpd', compact('bpd'));
    }
}
