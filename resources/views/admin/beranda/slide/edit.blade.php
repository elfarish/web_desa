@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Slide</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Slide</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.slide.update', $slide->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Upload Gambar -->
                            <div class="form-group">
                                <label>Gambar Slide</label>
                                <input type="file" name="gambar" class="form-control">

                                @if ($slide->gambar)
                                    <div class="mt-2 mb-2">
                                        <strong>Gambar saat ini:</strong>
                                        <div>
                                            <img src="{{ asset('storage/' . $slide->gambar) }}" alt="Gambar Slide"
                                                class="img-fluid" style="max-height: 150px;">
                                        </div>
                                    </div>
                                @endif

                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status Aktif -->
                            <div class="form-group">
                                <label>Status Aktif</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" {{ $slide->is_active ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ !$slide->is_active ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('is_active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <button type="submit" class="btn btn-success">Update Slide</button>
                            <a href="{{ route('admin.beranda') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
