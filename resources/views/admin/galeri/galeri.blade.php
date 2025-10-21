@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
    <div class="container-fluid">
        <!-- Header -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-bold mb-0">
                    <i class="bi bi-images me-2"></i> Galeri Foto
                </h1>
                <form class="d-flex mt-2" style="max-width: 300px;" onsubmit="return filterGaleriForm(event)">
                    <input type="text" class="form-control" placeholder="Cari galeri..."
                           value="{{ request('search') }}"
                           name="search" id="search-input">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">
                        <i class="bi bi-x"></i>
                    </button>
                </form>
            </div>
            @if ($galeri->count())
                <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary shadow-sm mt-2 mt-md-0">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Foto
                </a>
            @endif
        </div>

        <script>
            function filterGaleriForm(event) {
                event.preventDefault();
                const search = document.getElementById('search-input').value;
                const url = new URL(window.location);
                if (search) {
                    url.searchParams.set('search', search);
                } else {
                    url.searchParams.delete('search');
                }
                url.searchParams.delete('page'); // Reset page when searching
                window.location.href = url.toString();
                return false;
            }

            function clearSearch() {
                const url = new URL(window.location);
                url.searchParams.delete('search');
                url.searchParams.delete('page');
                window.location.href = url.toString();
            }
        </script>

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
                            <img src="{{ $foto->gambar_url }}" class="card-img-top"
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
                {{ $galeri->appends(request()->query())->links('pagination::bootstrap-5') }}
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
