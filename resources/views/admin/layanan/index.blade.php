@extends('layouts.admin')

@section('title', 'Berita - Admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Layanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.layanan.index') }}">Layanan</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Tombol tambah surat/proposal -->
                <div class="mb-3">
                    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary me-2">
                        <i class="fas fa-file-alt me-1"></i> Upload Dokumen
                    </a>
                </div>

                <!-- Daftar layanan -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Dokumen Desa</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>File</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($layanans as $index => $layanan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ ucfirst($layanan->kategori) }}</td>
                                        <td>{{ $layanan->nama_file }}</td>
                                        <td>
                                            @if ($layanan->file_path)
                                                <a href="{{ asset('storage/' . $layanan->file_path) }}"
                                                    class="btn btn-sm btn-info">Download</a>
                                            @else
                                                Tidak ada file
                                            @endif
                                        </td>
                                        <td>{{ $layanan->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.layanan.edit', $layanan->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST"
                                                style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada layanan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
