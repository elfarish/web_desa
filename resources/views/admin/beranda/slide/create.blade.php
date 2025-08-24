@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Slide</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Slide</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.slide.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Gambar Slide -->
                            <div class="form-group">
                                <label>Gambar Slide</label>
                                <input type="file" name="gambar" class="form-control" required>
                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status Aktif -->
                            <div class="form-group">
                                <label>Aktif</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" selected>Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('is_active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Slide</button>
                            <a href="{{ route('admin.slide.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
