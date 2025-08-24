@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Staf</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Staf</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.struktural.update', $struktural->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Kategori -->
                            <div class="form-group mb-3">
                                <label>Kategori</label>
                                <select name="kategori" id="kategoriSelect" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="kepengurusan"
                                        {{ old('kategori', $struktural->kategori) == 'kepengurusan' ? 'selected' : '' }}>
                                        Kepengurusan Desa
                                    </option>
                                    <option value="bpd"
                                        {{ old('kategori', $struktural->kategori) == 'bpd' ? 'selected' : '' }}>
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
                                    {{-- Opsi diisi lewat JS --}}
                                </select>
                                @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Input tambahan untuk jabatan lain -->
                            <div class="form-group mb-3" id="jabatanLainDiv"
                                style="display: {{ old('jabatan', $struktural->jabatan) == 'lainnya' ? 'block' : 'none' }};">
                                <label>Jabatan Lainnya</label>
                                <input type="text" name="jabatan_lain" class="form-control"
                                    placeholder="Masukkan jabatan lain..."
                                    value="{{ old('jabatan_lain', $struktural->jabatan_lain) }}">
                                @error('jabatan_lain')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Nama -->
                            <div class="form-group mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama..."
                                    value="{{ old('nama', $struktural->nama) }}" required>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Foto -->
                            <div class="form-group mb-3">
                                <label>Foto</label>
                                @if ($struktural->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $struktural->foto) }}" alt="Foto"
                                            class="img-thumbnail" width="120">
                                    </div>
                                @endif
                                <input type="file" name="foto" class="form-control">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                @error('foto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">Update</button>
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

            const oldJabatan = "{{ old('jabatan', $struktural->jabatan) }}";

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

                // Tambahkan opsi "Lainnya"
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
