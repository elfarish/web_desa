@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Upload Dokumen Baru</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.layanan.index') }}">Upload Dokumen</a></li>
                            <li class="breadcrumb-item active">Buat Baru</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Upload Dokumen</h3>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- Kategori -->
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Dokumen</label>
                                <select name="kategori" id="kategori" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="surat">Surat</option>
                                    <option value="proposal">Proposal</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Input untuk kategori lainnya -->
                            <div class="mb-3" id="kategoriLainDiv" style="display:none;">
                                <label for="kategori_lain" class="form-label">Tulis Kategori Lainnya</label>
                                <input type="text" name="kategori_lain" id="kategori_lain" class="form-control"
                                    placeholder="Masukkan kategori sendiri">
                            </div>

                            <!-- Judul -->
                            <div class="mb-3">
                                <label for="nama_file" class="form-label">Nama File / Judul</label>
                                <input type="text" name="nama_file" id="nama_file" class="form-control"
                                    placeholder="Masukkan judul" required>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                    placeholder="Masukkan deskripsi (opsional)"></textarea>
                            </div>

                            <!-- Upload File -->
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Dokumen</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-1"></i>
                                Upload</button>
                            <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script>
        const kategoriSelect = document.getElementById('kategori');
        const kategoriLainDiv = document.getElementById('kategoriLainDiv');

        kategoriSelect.addEventListener('change', function() {
            if (this.value === 'lainnya') {
                kategoriLainDiv.style.display = 'block';
                document.getElementById('kategori_lain').required = true;
            } else {
                kategoriLainDiv.style.display = 'none';
                document.getElementById('kategori_lain').required = false;
            }
        });
    </script>
@endsection
