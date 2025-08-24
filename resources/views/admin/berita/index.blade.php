@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Berita</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Berita</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Tambah Berita Button -->
                <div class="mb-3 d-flex justify-content-end">
                    <a href="{{ route('admin.berita.create') }}" class="btn btn-success">Tambah Berita</a>
                </div>

                <!-- Table Berita -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title fw-bold">Daftar Berita Desa</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penulis</th>
                                            <th>Tanggal Buat</th>
                                            <th>Tanggal Update</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $b)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>{{ $loop->iteration + ($berita->currentPage() - 1) * $berita->perPage() }}
                                                </td>
                                                <td>{{ $b->judul }}</td>
                                                <td>{{ $b->kategori }}</td>
                                                <td>{{ $b->penulis }}</td>
                                                <td>{{ $b->created_at ? $b->created_at->format('d-m-Y') : '-' }}</td>
                                                <td>{{ $b->updated_at ? $b->updated_at->format('d-m-Y') : '-' }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ strtolower($b->status) == 'published' ? 'badge-success' : 'badge-warning' }}">
                                                        {{ $b->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.berita.edit', $b->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('admin.berita.destroy', $b->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Hapus berita ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <tr class="expandable-body">
                                                <td colspan="7">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="{{ $b->gambar ? asset('storage/' . $b->gambar) : asset('images/default.png') }}"
                                                                class="img-fluid" alt="{{ $b->judul }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p><strong>Tanggal Kegiatan:</strong>
                                                                {{ $b->tanggal ? \Carbon\Carbon::parse($b->tanggal)->format('d-m-Y') : '-' }}
                                                            </p>
                                                            <p><strong>Ringkasan Berita:</strong> {{ $b->ringkasan }}</p>
                                                            <p><strong>Isi Berita:</strong> {!! nl2br(e($b->isi)) !!}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                                <!-- Pagination -->
                                <div class="mt-3">
                                    {{ $berita->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
