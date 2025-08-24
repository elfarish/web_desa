@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Staf</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Staf</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.struktural.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Kategori -->
                            <div class="form-group mb-3">
                                <label>Kategori</label>
                                <select name="kategori" id="kategoriSelect" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="kepengurusan" {{ old('kategori') == 'kepengurusan' ? 'selected' : '' }}>
                                        Kepengurusan Desa
                                    </option>
                                    <option value="bpd" {{ old('kategori') == 'bpd' ? 'selected' : '' }}>
                                        Lembaga BPD
                                    </option>
                                </select>
                                @error('kategori')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Jabatan -->
                            <div class="form-group mb-3">
                                <label>Jabatan</label>
                                <select name="jabatan" id="jabatanSelect" class="form-control" required>
                                    <option value="">-- Pilih Jabatan --</option>
                                    {{-- Opsi akan diisi lewat JS --}}
                                </select>
                                @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input tambahan untuk jabatan lain -->
                            <div class="form-group mb-3" id="jabatanLainDiv" style="display: none;">
                                <label>Jabatan Lainnya</label>
                                <input type="text" name="jabatan_lain" class="form-control"
                                    placeholder="Masukkan jabatan lain..." value="{{ old('jabatan_lain') }}">
                                @error('jabatan_lain')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama -->
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama..."
                                    value="{{ old('nama') }}" required>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Foto -->
                            <div class="form-group mb-3">
                                <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                                @error('foto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('admin.struktural.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Script untuk opsi dinamis jabatan -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategoriSelect = document.getElementById('kategoriSelect');
            const jabatanSelect = document.getElementById('jabatanSelect');
            const jabatanLainDiv = document.getElementById('jabatanLainDiv');

            const oldJabatan = "{{ old('jabatan') }}";

            const jabatans = {
                kepengurusan: [
                    'Kepala Desa', 'Sekretaris Desa', 'Kasi Pemerintahan', 'Kasi Kesra', 'Kasi Pelayanan',
                    'Kaur Perencanaan', 'Kaur Umum dan TU', 'Kaur Keuangan',
                    'Kepala Dusun Satu', 'Kepala Dusun Dua', 'Kepala Dusun Tiga', 'Staf Pembantu'
                ],
                bpd: [
                    'Ketua BPD', 'Wakil Ketua BPD', 'Sekretaris BPD', 'Ketua Bidang BPD', 'Anggota BPD'
                ]
            };

            function populateJabatan() {
                const kategori = kategoriSelect.value;
                jabatanSelect.innerHTML = '<option value="">-- Pilih Jabatan --</option>';

                if (kategori && jabatans[kategori]) {
                    jabatans[kategori].forEach(j => {
                        let selected = oldJabatan === j ? 'selected' : '';
                        jabatanSelect.innerHTML += `<option value="${j}" ${selected}>${j}</option>`;
                    });
                }

                // Tambahkan opsi "Lainnya" selalu ada
                let selectedLain = oldJabatan === 'lainnya' ? 'selected' : '';
                jabatanSelect.innerHTML += `<option value="lainnya" ${selectedLain}>Lainnya</option>`;

                toggleJabatanLain();
            }

            function toggleJabatanLain() {
                if (jabatanSelect.value === 'lainnya') {
                    jabatanLainDiv.style.display = 'block';
                } else {
                    jabatanLainDiv.style.display = 'none';
                }
            }

            kategoriSelect.addEventListener('change', populateJabatan);
            jabatanSelect.addEventListener('change', toggleJabatanLain);

            // Inisialisasi saat load
            populateJabatan();
        });
    </script>
@endsection
