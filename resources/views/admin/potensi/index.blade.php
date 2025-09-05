@extends('layouts.admin')

@section('title', 'Potensi - Admin Desa')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Manajemen Potensi Desa</h1>

        {{-- Alert sementara --}}
        <div class="alert alert-warning shadow-sm d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>
                Maaf, fitur manajemen potensi desa belum tersedia.
                Silakan kembali lagi nanti.
            </div>
        </div>

        {{-- Placeholder Card --}}
        <div class="card shadow-sm border-0">
            <div class="card-body text-center text-muted py-5">
                <i class="bi bi-hourglass-split fs-1 mb-3 d-block"></i>
                <p class="mb-0">Belum ada data potensi yang bisa ditampilkan.</p>
            </div>
        </div>
    </div>
@endsection
