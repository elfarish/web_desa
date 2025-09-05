@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold mb-0">
                <i class="bi bi-images me-2"></i> Galeri Foto
            </h1>
            @if ($galeri->count())
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Foto
                </a>
            @endif
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Grid Galeri --}}
        <div class="row g-4">
            @forelse($galeri as $foto)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-card">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $foto->gambar) }}" class="card-img-top"
                                alt="{{ $foto->judul ?? 'Foto Galeri' }}" style="height: 220px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h6 class="fw-semibold text-truncate mb-1">{{ $foto->judul ?? 'Tanpa Judul' }}</h6>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-calendar me-1"></i>
                                {{ $foto->created_at->format('d M Y') }}
                            </p>
                            <form action="{{ route('admin.galeri.destroy', $foto->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076500.png" alt="Empty" width="120"
                        class="mb-3 opacity-50">
                    <h5 class="text-muted">Belum ada foto di galeri.</h5>
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-plus-circle me-1"></i> Upload Foto Pertama
                    </a>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($galeri->count())
            <div class="d-flex justify-content-center mt-4">
                {{ $galeri->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    {{-- Custom CSS --}}
    @push('styles')
        <style>
            .hover-card:hover {
                transform: translateY(-5px);
                transition: 0.3s;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15) !important;
            }
        </style>
    @endpush
@endsection
