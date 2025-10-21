@extends('layouts.admin')

@section('title', 'Template Surat')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Template Surat</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Tombol Tambah dengan margin bawah --}}
        <div class="mb-3">
            <a href="{{ route('admin.layanan.tamplate_surat.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Template
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0">Daftar Template Surat</h5>
                <form class="d-flex me-2" style="min-width: 250px;" onsubmit="return filterTemplateForm(event)">
                    <input type="text" class="form-control" placeholder="Cari template..."
                           value="{{ request('search') }}" name="search" id="search-input">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">
                        <i class="bi bi-x"></i>
                    </button>
                </form>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Template</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($templates as $template)
                            <tr>
                                <td>{{ $template->nama_template }}</td>
                                <td>{{ $template->kategori ?? '-' }}</td>
                                <td>{{ $template->deskripsi ?? '-' }}</td>
                                <td>
                                    @if ($template->file_path)
                                        <a href="{{ route('admin.layanan.tamplate_surat.download', $template->id) }}"
                                            class="btn btn-sm btn-success">
                                            Download
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.layanan.tamplate_surat.edit', $template->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.layanan.tamplate_surat.destroy', $template->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus template ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada template</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function filterTemplateForm(event) {
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
    </div>
@endsection
