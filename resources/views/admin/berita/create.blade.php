@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Berita</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Berita</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Judul -->
                                    <div class="form-group">
                                        <label>Judul Berita</label>
                                        <input type="text" name="judul" class="form-control"
                                            placeholder="Judul Berita..." value="{{ old('judul') }}" required>
                                        @error('judul')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Kategori -->
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>
                                                Kegiatan</option>
                                            <option value="Infrastruktur"
                                                {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur
                                            </option>
                                            <option value="Pengumuman"
                                                {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                        </select>
                                        @error('kategori')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggal Berita -->
                            <div class="form-group">
                                <label>Tanggal Berita</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', date('Y-m-d')) }}" required>
                                @error('tanggal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <!-- Ringkasan -->
                            <div class="form-group">
                                <label>Ringkasan Berita</label>
                                <textarea name="ringkasan" class="form-control" rows="3" placeholder="Ringkasan Berita..." required>{{ old('ringkasan') }}</textarea>
                                @error('ringkasan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Isi Berita -->
                            <div class="form-group">
                                <label>Isi Berita</label>
                                <textarea name="isi" class="form-control" rows="5" placeholder="Isi Berita..." required>{{ old('isi') }}</textarea>
                                @error('isi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Gambar -->
                            <div class="form-group">
                                <label>Gambar Berita</label>
                                <input type="file" name="gambar" class="form-control">
                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published
                                    </option>
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Berita</button>
                            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
