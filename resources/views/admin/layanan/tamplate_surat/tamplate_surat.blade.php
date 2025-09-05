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
    </div>
@endsection
