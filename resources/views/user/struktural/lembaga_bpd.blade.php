@extends('layouts.app')

@section('title', 'Lembaga BPD - Desa Pabuaran')

@section('content')
    <div class="container my-5">

        <h2 class="fw-bold mb-4 text-center" data-aos="fade-up">Lembaga BPD Pabuaran</h2>

        <div class="row justify-content-center">
            @foreach (array_chunk($bpd->toArray(), 2) as $row)
                <div class="row justify-content-center mb-4">
                    @foreach ($row as $anggota)
                        <div class="col-md-3 col-6 mb-4 text-center">
                            <img src="{{ $anggota['foto'] ? asset('storage/' . $anggota['foto']) : asset('images/struktur/default image.png') }}"
                                class="img-fluid rounded shadow" alt="{{ $anggota['nama'] }}">
                            <h6 class="mt-2 mb-0">{{ $anggota['nama'] }}</h6>
                            <small class="text-muted">{{ $anggota['jabatan'] }}</small>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>
@endsection
