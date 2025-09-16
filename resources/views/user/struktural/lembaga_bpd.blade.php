@extends('layouts.app')

@section('title', 'Struktur Lembaga BPD - Desa Pabuaran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="position-relative text-center" style="height: 250px; overflow: hidden;">
        <!-- Background + Blur -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('{{ asset('images/kantor_desa.png') }}') center/cover no-repeat;
               filter: blur(3px); transform: scale(1.1); z-index:0;">
        </div>
        <!-- Overlay gelap -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5); z-index:1;"></div>
        <!-- Konten -->
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index:2;">
            <h1 class="fw-bold display-5 text-shadow">Struktur Lembaga BPD</h1>
            <p class="lead text-warning mb-0">Badan Permusyawaratan Desa Pabuaran</p>
        </div>
    </section>

    <div class="container my-5">
        {{-- Ketua --}}
        @if ($ketua)
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-sm-6 col-md-3 person-card">
                    <img src="{{ $ketua->foto ? asset($ketua->foto) : asset('storage/struktural/default_image.png') }}" alt="{{ $ketua->nama }}">
                    <h5>{{ $ketua->nama }}</h5>
                    <small>{{ $ketua->jabatan }}</small>
                </div>
            </div>
        @endif

        {{-- Wakil & Sekretaris --}}
        <div class="row justify-content-center mb-4">
            @if ($wakil)
                <div class="col-12 col-sm-6 col-md-3 person-card">
                    <img src="{{ $wakil->foto ? asset($wakil->foto) : asset('storage/struktural/default_image.png') }}" alt="{{ $wakil->nama }}">
                    <h6>{{ $wakil->nama }}</h6>
                    <small>{{ $wakil->jabatan }}</small>
                </div>
            @endif
            @if ($sekretaris)
                <div class="col-12 col-sm-6 col-md-3 person-card">
                    <img src="{{ $sekretaris->foto ? asset($sekretaris->foto) : asset('storage/struktural/default_image.png') }}" alt="{{ $sekretaris->nama }}">
                    <h6>{{ $sekretaris->nama }}</h6>
                    <small>{{ $sekretaris->jabatan }}</small>
                </div>
            @endif
        </div>

        {{-- Ketua Bidang --}}
        @if (count($ketuaBidang))
            <h5 class="text-center mb-3">Ketua Bidang</h5>
            <div class="row justify-content-center mb-4">
                @foreach ($ketuaBidang as $kb)
                    <div class="col-12 col-sm-6 col-md-3 person-card">
                        <img src="{{ $kb->foto ? asset($kb->foto) : asset('storage/struktural/default_image.png') }}" alt="{{ $kb->nama }}">
                        <h6>{{ $kb->nama }}</h6>
                        <small>{{ $kb->jabatan }}</small>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Anggota --}}
        @if (count($anggota))
            <h5 class="text-center mb-3">Anggota</h5>
            <div class="row justify-content-center">
                @foreach ($anggota as $a)
                    <div class="col-12 col-sm-6 col-md-2 person-card">
                        <img src="{{ $a->foto ? asset($a->foto) : asset('storage/struktural/default_image.png') }}" alt="{{ $a->nama }}">
                        <h6>{{ $a->nama }}</h6>
                        <small>{{ $a->jabatan }}</small>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
