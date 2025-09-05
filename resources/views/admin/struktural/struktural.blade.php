@extends('layouts.admin')

@section('title', 'Data Struktural')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Data Struktural</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Kepengurusan --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Kepengurusan</h5>
                <a href="{{ route('admin.struktural.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
            <div id="tabel-kepengurusan" class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="120">Foto</th>
                            <th>Nama</th>
                            <th width="300">Jabatan</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kepengurusan as $item)
                            <tr>
                                <td class="align-middle">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-thumbnail"
                                            style="max-width:80px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif


                                </td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->jabatan }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.struktural.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.struktural.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $kepengurusan->withQueryString()->links() }}
                </div>
            </div>
        </div>

        {{-- BPD --}}
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">BPD</h5>
                <a href="{{ route('admin.struktural.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
            <div id="tabel-bpd" class="card-body table-responsive">
                <table class="table table-bordered table-striped align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th width="120">Foto</th>
                            <th>Nama</th>
                            <th width="300">Jabatan</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bpd as $item)
                            <tr>
                                <td class="align-middle">
                                    @if ($item->foto)
                                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}"
                                            class="img-thumbnail" style="max-width: 80px;">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->jabatan }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.struktural.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.struktural.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $bpd->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Script scroll otomatis ke tabel setelah klik pagination --}}
    <script>
        document.querySelectorAll('.pagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                // Menentukan target scroll berdasarkan tabel yang diklik
                const parentCard = this.closest('.card-body');
                const targetId = parentCard ? '#' + parentCard.id : '';
                window.location.href = url + targetId;
            });
        });
    </script>
@endsection
