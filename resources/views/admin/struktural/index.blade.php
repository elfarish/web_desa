@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Struktural Desa Pabuaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Struktural</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Tombol tambah staf -->
                <div class="mb-3 d-flex justify-content-end">
                    <a href="{{ route('admin.struktural.create') }}" class="btn btn-success rounded-pill shadow-sm px-3">
                        <i class="fas fa-plus-circle"></i> Tambah Staf
                    </a>
                </div>

                <!-- Kepengurusan -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title fw-bold">Daftar Kepengurusan Desa</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="text-center table-light">
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 100px; min-width: 80px;">Foto</th>
                                        <th style="min-width: 100px;">Nama</th>
                                        <th style="min-width: 150px;">Jabatan</th>
                                        <th style="width: 180px; min-width: 140px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kepengurusan as $index => $staf)
                                        <tr>
                                            <td class="text-center">{{ $kepengurusan->firstItem() + $index }}</td>
                                            <td class="text-center">
                                                <img src="{{ $staf->foto ? asset('storage/' . $staf->foto) : asset('images/struktur/default image.png') }}"
                                                    alt="{{ $staf->nama }}" width="60" class="rounded shadow-sm">
                                            </td>
                                            <td>{{ $staf->nama }}</td>
                                            <td>{{ $staf->jabatan }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('admin.struktural.edit', $staf->id) }}"
                                                        class="btn btn-sm btn-primary  shadow-sm">
                                                        <i class="fas fa-pen"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.struktural.destroy', $staf->id) }}"
                                                        method="POST" onsubmit="return confirm('Hapus staf ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm ">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $kepengurusan->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                <!-- BPD -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title fw-bold">Daftar Lembaga BPD</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="text-center table-light">
                                    <tr>
                                        <th style="width: 50px">No</th>
                                        <th style="width: 100px">Foto</th>
                                        <th style="min-width: 120px;">Nama</th>
                                        <th style="min-width: 150px;">Jabatan</th>
                                        <th style="width: 180px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bpd as $index => $anggota)
                                        <tr>
                                            <td class="text-center">{{ $bpd->firstItem() + $index }}</td>
                                            <td class="text-center">
                                                <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : asset('images/struktur/default image.png') }}"
                                                    alt="{{ $anggota->nama }}" width="60" class="rounded shadow-sm">
                                            </td>
                                            <td>{{ $anggota->nama }}</td>
                                            <td>{{ $anggota->jabatan }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('admin.struktural.edit', $staf->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-pen"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.struktural.destroy', $staf->id) }}"
                                                        method="POST" onsubmit="return confirm('Hapus staf ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $bpd->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
