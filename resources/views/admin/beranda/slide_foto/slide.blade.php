@extends('layouts.admin')

@section('title', 'Slide Foto')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Slide Foto</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <a href="{{ route('admin.beranda.slide.create') }}" class="btn btn-primary mb-3">Tambah Slide</a>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($slides as $slide)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'+ $slide->gambar) }}" alt="Slide" class="img-fluid"
                                        style="max-height: 100px;">
                                </td>
                                <td>
                                    @if ($slide->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.beranda.slide.edit', $slide->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.beranda.slide.destroy', $slide->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus slide ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada slide</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
