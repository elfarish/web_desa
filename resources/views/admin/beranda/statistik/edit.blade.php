@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Statistik</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Statistik</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.statistik.update', $statistik->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Label Statistik -->
                            <div class="form-group">
                                <label>Label Statistik</label>
                                <input type="text" name="label" class="form-control"
                                    placeholder="Contoh: Jumlah Penduduk" value="{{ old('label', $statistik->label) }}"
                                    required>
                                @error('label')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Count -->
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="count" class="form-control" placeholder="Contoh: 1200"
                                    value="{{ old('count', $statistik->count) }}" required>
                                @error('count')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Icon Bootstrap Icons -->
                            <div class="form-group">
                                <label>Icon (Bootstrap Icon Class)</label>
                                <input type="text" name="icon" class="form-control" placeholder="Contoh: bi-people"
                                    value="{{ old('icon', $statistik->icon) }}" required>
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="text-muted">Gunakan class icon dari <a href="https://icons.getbootstrap.com/"
                                        target="_blank">Bootstrap Icons</a></small>
                            </div>

                            <button type="submit" class="btn btn-success">Update Statistik</button>
                            <a href="{{ route('admin.beranda') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
