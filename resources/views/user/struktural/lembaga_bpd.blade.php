@extends('layouts.app')

@section('title', 'Struktur Lembaga BPD - Desa Pabuaran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="position-relative text-center" style="height: 300px; overflow: hidden;">
        <!-- Background + Blur -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('{{ asset('images/kantor_desa.png') }}') center/cover no-repeat;
               filter: blur(3px);
               transform: scale(1.1);
               z-index: 0;">
        </div>
        <!-- Overlay gelap -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5); z-index: 1;"></div>
        <!-- Konten -->
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index: 2;">
            <h1 class="fw-bold display-5 text-shadow">Struktur Lembaga BPD</h1>
            <p class="lead text-warning">Badan Permusyawaratan Desa Pabuaran</p>
        </div>
    </section>

    <div class="container my-5">
        {{-- Ketua --}}
        @if ($ketua)
            <div class="row justify-content-center mb-4">
                <div class="col-md-3 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $ketua->foto ? $ketua->foto_url : asset('images/default-person.png') }}" class="img-fluid rounded shadow" style="max-width: 150px;" alt="{{ $ketua->nama }}" loading="lazy">
                    <h5 class="mt-2 mb-0 fw-semibold">{{ $ketua->nama }}</h5>
                    <small class="text-muted">{{ $ketua->jabatan }}</small>
                </div>
            </div>
        @endif

        {{-- Wakil & Sekretaris --}}
        <div class="row justify-content-center mb-4">
            @if ($wakil)
                <div class="col-md-3 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $wakil->foto ? $wakil->foto_url : asset('images/default-person.png') }}" class="img-fluid rounded shadow" style="max-width: 150px;" alt="{{ $wakil->nama }}" loading="lazy">
                    <h6 class="mt-2 mb-0">{{ $wakil->nama }}</h6>
                    <small class="text-muted">{{ $wakil->jabatan }}</small>
                </div>
            @endif
            @if ($sekretaris)
                <div class="col-md-3 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $sekretaris->foto ? $sekretaris->foto_url : asset('images/default-person.png') }}" class="img-fluid rounded shadow" style="max-width: 150px;" alt="{{ $sekretaris->nama }}" loading="lazy">
                    <h6 class="mt-2 mb-0">{{ $sekretaris->nama }}</h6>
                    <small class="text-muted">{{ $sekretaris->jabatan }}</small>
                </div>
            @endif
        </div>

        {{-- Ketua Bidang --}}
        @if (count($ketuaBidang))
            <h5 class="text-center mb-3">Ketua Bidang</h5>
            <div class="row justify-content-center mb-4">
                @foreach ($ketuaBidang as $kb)
                    <div class="col-md-3 col-sm-6 col-12 person-card text-center">
                        <img src="{{ $kb->foto ? $kb->foto_url : asset('images/default-person.png') }}" class="img-fluid rounded shadow" style="max-width: 150px;" alt="{{ $kb->nama }}" loading="lazy">
                        <h6 class="mt-2 mb-0">{{ $kb->nama }}</h6>
                        <small class="text-muted">{{ $kb->jabatan }}</small>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Anggota --}}
        @if (count($anggota))
            <h5 class="text-center mb-3">Anggota</h5>
            <div class="row justify-content-center">
                @foreach ($anggota as $a)
                    <div class="col-md-2 col-sm-6 col-12 person-card text-center">
                        <img src="{{ $a->foto ? $a->foto_url : asset('images/default-person.png') }}" class="img-fluid rounded shadow" style="max-width: 150px;" alt="{{ $a->nama }}" loading="lazy">
                        <h6 class="mt-2 mb-0">{{ $a->nama }}</h6>
                        <small class="text-muted">{{ $a->jabatan }}</small>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
