<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Struktural;

class StrukturalController extends Controller
{

    public function index()
    {
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
        $ketua = Struktural::where('jabatan', 'Ketua BPD')->first();
        $wakil = Struktural::where('jabatan', 'Wakil Ketua BPD')->first();
        $sekretaris = Struktural::where('jabatan', 'Sekretaris BPD')->first();

        $ketuaBidang = Struktural::where('jabatan', 'Ketua Bidang BPD')->get();
        $anggota = Struktural::where('jabatan', 'Anggota BPD')->get();

        return view('user.struktural.lembaga_bpd', compact('ketua', 'wakil', 'sekretaris', 'ketuaBidang', 'anggota'));
    }
}
