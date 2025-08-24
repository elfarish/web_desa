@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Button Add New -->
                <div class="mb-3">
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Foto
                    </a>
                </div>

                <!-- Table Daftar Galeri -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Foto Galeri</h3>
                    </div>
                    <div class="card-body table-responsive">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Preview</th>
                                    <th>Judul</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galeri as $key => $foto)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('storage/galeri/' . $foto->gambar) }}"
                                                alt="{{ $foto->judul }}" class="img-thumbnail"
                                                style="width: 120px; height: 80px; object-fit: cover;">
                                        </td>
                                        <td>{{ $foto->judul ?? '-' }}</td>
                                        <td>{{ $foto->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.galeri.edit', $foto->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.galeri.destroy', $foto->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada foto galeri.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $galeri->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
