@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Foto Galeri</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Upload Foto Galeri</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Judul Foto -->
                            <div class="form-group">
                                <label>Judul Foto</label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul Foto..."
                                    value="{{ old('judul') }}">
                                @error('judul')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Gambar -->
                            <div class="form-group">
                                <label>Pilih Gambar</label>
                                <input type="file" name="gambar" class="form-control" required>
                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Upload</button>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
