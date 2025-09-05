@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <div class="card card-warning shadow-sm">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body">

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Error Validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($method != 'POST')
                        @method($method)
                    @endif

                    {{-- Kategori --}}
                    <div class="form-group mb-3">
                        <label>Kategori</label>
                        <select name="kategori" id="kategoriSelect" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="kepengurusan"
                                {{ old('kategori', $data->kategori ?? '') == 'kepengurusan' ? 'selected' : '' }}>
                                Kepengurusan Desa
                            </option>
                            <option value="bpd" {{ old('kategori', $data->kategori ?? '') == 'bpd' ? 'selected' : '' }}>
                                Lembaga BPD
                            </option>
                        </select>
                        @error('kategori')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Jabatan --}}
                    <div class="form-group mb-3">
                        <label>Jabatan</label>
                        <select name="jabatan" id="jabatanSelect" class="form-control" required></select>
                        @error('jabatan')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Jabatan Lain --}}
                    <div class="form-group mb-3" id="jabatanLainDiv" style="display:none;">
                        <label>Jabatan Lainnya</label>
                        <input type="text" name="jabatan_lain" class="form-control"
                            value="{{ old('jabatan_lain', $data->jabatan_lain ?? '') }}"
                            placeholder="Masukkan jabatan lain...">
                        @error('jabatan_lain')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Nama --}}
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control"
                            value="{{ old('nama', $data->nama ?? '') }}" required>
                        @error('nama')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold">Gambar</label>

                        {{-- Upload Baru --}}
                        <input type="file" name="foto" id="fotoInput" class="form-control mb-2" accept="image/*">
                        <small class="form-text text-muted">Format: jpeg, jpg, png, gif | Maks: 2 MB</small>

                        {{-- Pilih dari Galeri --}}
                        <button type="button" class="btn btn-outline-success mt-2" data-bs-toggle="modal"
                            data-bs-target="#galeriModal">
                            <i class="bi bi-images me-1"></i> Pilih dari Galeri
                        </button>
                        <input type="hidden" name="foto_galeri" id="fotoGaleriInput">


                        {{-- Preview --}}
                        <div class="mt-3" id="previewWrapper" style="display:none;">
                            <small class="text-muted d-block">Preview:</small>
                            <img id="previewImage" class="rounded shadow-sm mt-1" width="150">
                        </div>

                        {{-- Gambar Saat Ini --}}
                        @if (isset($data) && $data->gambar)
                            <div class="mt-2">
                                <small class="text-muted d-block">Gambar saat ini:</small>
                                <img src="{{ asset('storage/' . $data->gambar) }}" width="150"
                                    class="rounded shadow-sm mt-1">
                            </div>
                        @endif
                    </div>

                    {{-- Modal Galeri --}}
                    @include('admin.galeri.modal')

                    {{-- Submit --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('admin.struktural.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script Dynamic Jabatan & Preview Gambar --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // ================= Dynamic Jabatan =================
                const kategoriSelect = document.getElementById('kategoriSelect');
                const jabatanSelect = document.getElementById('jabatanSelect');
                const jabatanLainDiv = document.getElementById('jabatanLainDiv');
                const oldJabatan = "{{ old('jabatan', $data->jabatan ?? '') }}";

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

                    let selectedLain = oldJabatan && !jabatans[kategori]?.includes(oldJabatan) ? 'selected' : '';
                    jabatanSelect.innerHTML += `<option value="lainnya" ${selectedLain}>Lainnya</option>`;

                    if (selectedLain) {
                        jabatanSelect.value = 'lainnya';
                        jabatanLainDiv.style.display = 'block';
                    }

                    toggleJabatanLain();
                }

                function toggleJabatanLain() {
                    jabatanLainDiv.style.display = (jabatanSelect.value === 'lainnya') ? 'block' : 'none';
                }

                kategoriSelect.addEventListener('change', populateJabatan);
                jabatanSelect.addEventListener('change', toggleJabatanLain);
                populateJabatan();

                // ================= Preview Gambar =================
                const fotoInput = document.getElementById('fotoInput'); // pastikan input file bernama foto
                const fotoGaleriInput = document.getElementById(
                'fotoGaleriInput'); // pastikan hidden input bernama foto_galeri
                const previewWrapper = document.getElementById('previewWrapper');
                const previewImage = document.getElementById('previewImage');

                // Upload manual dari PC
                fotoInput.addEventListener('change', function(event) {
                    let file = event.target.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewWrapper.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                        fotoGaleriInput.value = ''; // reset hidden input galeri
                    } else {
                        previewWrapper.style.display = 'none';
                        previewImage.src = '';
                    }
                });

                // Pilih gambar dari galeri
                document.addEventListener('click', function(e) {
                    let target = e.target.closest('.pilih-gambar');
                    if (target) {
                        let src = target.getAttribute('data-src'); // path relatif
                        previewImage.src = src;
                        previewWrapper.style.display = 'block';
                        fotoGaleriInput.value = src;
                        fotoInput.value = ''; // reset input file

                        // Tutup modal galeri
                        let modal = bootstrap.Modal.getInstance(document.getElementById('galeriModal'));
                        if (modal) modal.hide();
                    }
                });
            });
        </script>
    @endpush

@endsection
