@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Manajemen Berita</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Card Berita --}}
        <div class="card shadow-sm">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0">Daftar Berita</h5>
                <div class="d-flex flex-wrap gap-2">
                    <form class="d-flex me-2" style="min-width: 250px;" onsubmit="return filterBeritaForm(event)">
                        <input type="text" class="form-control" placeholder="Cari berita..."
                               value="{{ request('search') }}"
                               name="search" id="search-input">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                        <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">
                            <i class="bi bi-x"></i>
                        </button>
                    </form>
                    <select class="form-select me-2" onchange="filterByStatus(this.value)" style="width: auto;">
                        <option value="">Semua Status</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Tambah Berita
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="80">Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($berita as $item)
                            <tr>
                                <td>
                                    @if ($item->gambar)
                                        <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                                            class="img-thumbnail" style="max-width: 70px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $item->judul }}</strong>
                                    <div class="small text-muted">
                                        {{ Str::limit($item->ringkasan, 50) }}
                                    </div>
                                </td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    @switch($item->status)
                                        @case('published')
                                            <span class="badge bg-success">Published</span>
                                        @break

                                        @case('draft')
                                            <span class="badge bg-secondary">Draft</span>
                                        @break

                                        @default
                                            <span class="badge bg-warning text-dark">Pending</span>
                                    @endswitch
                                </td>
                                <td>
                                    {{ $item->formatted_tanggal }}
                                </td>
                                <td>{{ $item->user->name ?? 'Admin' }}</td>
                                <td>
                                    <a href="{{ route('admin.berita.show', $item->slug) }}" class="btn btn-info btn-sm"
                                        title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.berita.edit', $item->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada berita</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $berita->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            function filterBeritaForm(event) {
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

            function filterByStatus(status) {
                const url = new URL(window.location);
                if (status) {
                    url.searchParams.set('status', status);
                } else {
                    url.searchParams.delete('status');
                }
                url.searchParams.delete('page'); // Reset page when filtering
                window.location.href = url.toString();
            }

            function clearSearch() {
                const url = new URL(window.location);
                url.searchParams.delete('search');
                url.searchParams.delete('page');
                window.location.href = url.toString();
            }
        </script>
    @endsection
