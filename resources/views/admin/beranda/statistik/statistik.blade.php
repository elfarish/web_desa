@extends('layouts.admin')

@section('title', 'Statistik')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Statistik</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <a href="{{ route('admin.beranda.statistik.create') }}" class="btn btn-primary mb-3">
            Tambah Statistik
        </a>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Tampilan Icon</th>
                            <th>Nama Icon</th>
                            <th>Count</th>
                            <th>Label</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statistik as $item)
                            <tr>
                                <td>
                                    <i class="{{ $item->icon }} fs-2"></i>
                                </td>
                                <td>{{ $item->icon }}</td>
                                <td>{{ $item->count }}</td>
                                <td>{{ $item->label }}</td>
                                <td>
                                    <a href="{{ route('admin.beranda.statistik.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.beranda.statistik.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus statistik ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada statistik</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
