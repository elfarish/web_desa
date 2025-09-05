@extends('layouts.admin')

@section('title', 'Pengajuan Proposal')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Pengajuan Proposal</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <a href="{{ route('admin.layanan.pengajuan_proposal.create') }}" class="btn btn-primary mb-3">
            Tambah Pengajuan
        </a>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Link</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proposals as $proposal)
                            <tr>
                                <td>{{ $proposal->nama }}</td>
                                <td><a href="{{ $proposal->link }}" target="_blank">{{ $proposal->link }}</a></td>
                                <td>
                                    <a href="{{ route('admin.layanan.pengajuan_proposal.edit', $proposal->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.layanan.pengajuan_proposal.destroy', $proposal->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus pengajuan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada pengajuan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
