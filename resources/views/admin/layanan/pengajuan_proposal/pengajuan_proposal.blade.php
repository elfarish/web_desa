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
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0">Daftar Pengajuan Proposal</h5>
                <form class="d-flex me-2" style="min-width: 250px;" onsubmit="return filterProposalForm(event)">
                    <input type="text" class="form-control" placeholder="Cari pengajuan..."
                           value="{{ request('search') }}" name="search" id="search-input">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">
                        <i class="bi bi-x"></i>
                    </button>
                </form>
            </div>
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

        <script>
            function filterProposalForm(event) {
                event.preventDefault();
                const search = document.getElementById('search-input').value;
                const url = new URL(window.location);
                if (search) {
                    url.searchParams.set('search', search);
                } else {
                    url.searchParams.delete('search');
                }
                url.searchParams.delete('page'); // Reset page when searching
                window.location.href = url.toString();
                return false;
            }

            function clearSearch() {
                const url = new URL(window.location);
                url.searchParams.delete('search');
                url.searchParams.delete('page');
                window.location.href = url.toString();
            }
        </script>
    </div>
@endsection
