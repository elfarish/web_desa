@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Beranda</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Beranda</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                {{-- Slide --}}
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold">Slide</h3>
                    <a href="{{ route('admin.slide.create') }}" class="btn btn-success">Tambah Slide</a>
                </div>
                <div class="card mb-4">
                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar Slide</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($slides as $index => $slide)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $slide->gambar) }}" class="img-fluid"
                                                style="max-height: 100px;">
                                        </td>
                                        <td>{{ $slide->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                                        <td>
                                            <a href="{{ route('admin.slide.edit', $slide->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.slide.destroy', $slide->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Hapus slide ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada slide</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Statistik --}}
                <div class="mb-3 d-flex justify-content-between align-items-center mt-5">
                    <h3 class="card-title fw-bold">Statistik Penduduk</h3>
                    <a href="{{ route('admin.statistik.create') }}" class="btn btn-success">Tambah Statistik</a>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Icon</th>
                                    <th>Count</th>
                                    <th>Label</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($stats as $stat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><i class="bi {{ $stat->icon }}"></i></td>
                                        <td>{{ $stat->count }}</td>
                                        <td>{{ $stat->label }}</td>
                                        <td>
                                            <a href="{{ route('admin.statistik.edit', $stat->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.statistik.destroy', $stat->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Hapus statistik ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada statistik</td>
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
