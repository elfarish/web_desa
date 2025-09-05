@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Tambah Foto Galeri</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul Foto --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Foto (Opsional)</label>
                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}"
                            placeholder="Contoh: Kegiatan Bersih Desa">
                        @error('judul')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Upload Foto --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Foto</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: jpeg, jpg, png, gif, webp | Maks: 2MB</small>
                        @error('gambar')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
