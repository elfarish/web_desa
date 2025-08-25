@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Layanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.layanan.index') }}">Layanan</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Layanan</h3>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <!-- Kategori -->
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="surat" {{ $layanan->kategori == 'surat' ? 'selected' : '' }}>Surat
                                    </option>
                                    <option value="proposal" {{ $layanan->kategori == 'proposal' ? 'selected' : '' }}>
                                        Proposal</option>
                                    <option value="lainnya" {{ $layanan->kategori == 'lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                            </div>

                            <!-- nama_file -->
                            <div class="mb-3">
                                <label for="nama_file" class="form-label">Nama File</label>
                                <input type="text" name="nama_file" id="nama_file" class="form-control"
                                    value="{{ $layanan->nama_file }}" required>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ $layanan->deskripsi }}</textarea>
                            </div>

                            <!-- Upload File -->
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File (opsional)</label>
                                <input type="file" name="file" id="file" class="form-control">
                                @if ($layanan->file_path)
                                    <small>File saat ini: <a href="{{ asset('storage/' . $layanan->file_path) }}"
                                            target="_blank">{{ basename($layanan->file_path) }}</a></small>
                                @endif
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
                            <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
