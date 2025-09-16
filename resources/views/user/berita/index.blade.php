@extends('layouts.app')

@section('title', 'Berita - Desa Pabuaran')

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
        <div class="position-absolute top-0 start-0 w-100 h-100 overlay-blur" style="z-index: 1;"></div>

        <!-- Konten -->
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index: 2;">
            <h1 class="fw-bold display-5 text-shadow">Berita Desa</h1>
            <p class="lead text-warning">Informasi terbaru dan kegiatan Desa Pabuaran</p>
        </div>
    </section>

    {{-- Berita Cards --}}
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4">Berita Desa Pabuaran</h2>
            <div class="row g-4">
                @foreach ($berita as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card berita-card position-relative h-100 shadow-sm">
                            @if ($item->gambar)
                                <img src="{{ asset($item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                            @endif
                            <div class="card-badge">{{ $item->kategori }}</div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                                <p class="card-text flex-grow-1">{{ $item->ringkasan }}</p>
                                <a href="{{ route('user.berita.show', $item->slug) }}" class="btn btn-success btn-sm mt-auto">Baca Selengkapnya</a>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between small">
                                <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                                <span>{{ $item->penulis }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $berita->links() }}
            </div>
        </div>
    </section>
@endsection
