@csrf
@if (isset($berita))
    @method('PUT')
@endif

<!-- Judul -->
<div class="mb-3">
    <label class="form-label fw-semibold">Judul</label>
    <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul ?? '') }}" required>
    @error('judul')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Kategori -->
<div class="mb-3">
    <label class="form-label fw-semibold">Kategori</label>
    <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $berita->kategori ?? '') }}"
        required>
    @error('kategori')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Ringkasan -->
<div class="mb-3">
    <label class="form-label fw-semibold">Ringkasan</label>
    <textarea name="ringkasan" rows="3" class="form-control" required>{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
    @error('ringkasan')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Isi -->
<div class="mb-3">
    <label class="form-label fw-semibold">Isi Berita</label>
    <textarea name="isi" rows="6" class="form-control" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
    @error('isi')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Status -->
<div class="mb-3">
    <label class="form-label fw-semibold">Status</label>
    <select name="status" class="form-control" required>
        <option value="draft" {{ old('status', $berita->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $berita->status ?? '') == 'published' ? 'selected' : '' }}>Published
        </option>
        <option value="pending" {{ old('status', $berita->status ?? '') == 'pending' ? 'selected' : '' }}>Pending
        </option>
    </select>
    @error('status')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Tanggal -->
<div class="mb-3">
    <label class="form-label fw-semibold">Tanggal</label>
    <input type="date" name="tanggal" class="form-control"
        value="{{ old('tanggal', isset($berita->tanggal) ? \Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d') : '') }}"
        required>
    @error('tanggal')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Gambar -->
<div class="mb-3">
    <label class="form-label fw-semibold">Gambar</label>
    <input type="file" name="gambar" id="gambarInput" class="form-control mb-2" accept="image/*">
    <small class="form-text text-muted">Format: jpeg, jpg, png, gif | Maks: 2 MB</small>
    <button type="button" class="btn btn-outline-success mt-2" data-bs-toggle="modal" data-bs-target="#galeriModal">
        <i class="bi bi-images me-1"></i> Pilih dari Galeri
    </button>
    <input type="hidden" name="gambar_galeri" id="gambarGaleriInput">

    <!-- Preview -->
    <div class="mt-3" id="previewWrapper" style="display:none;">
        <small class="text-muted d-block">Preview:</small>
        <img id="previewImage" class="rounded shadow-sm mt-1" width="150">
    </div>

    @if (isset($berita) && $berita->gambar)
        <div class="mt-2">
            <small class="text-muted d-block">Gambar saat ini:</small>
            <img src="{{ asset('storage/' . $berita->gambar) }}" width="150" class="rounded shadow-sm mt-1">
        </div>
    @endif
</div>

<!-- Tombol -->
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ isset($berita) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
</div>

@include('admin.galeri.modal')

@push('scripts')
    <script>
        const gambarInput = document.getElementById('gambarInput');
        const gambarGaleriInput = document.getElementById('gambarGaleriInput');
        const previewWrapper = document.getElementById('previewWrapper');
        const previewImage = document.getElementById('previewImage');

        // Upload manual dari PC
        gambarInput.addEventListener('change', function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewWrapper.style.display = 'block';
                }
                reader.readAsDataURL(file);
                gambarGaleriInput.value = '';
            } else {
                previewWrapper.style.display = 'none';
                previewImage.src = '';
            }
        });

        // Pilih gambar dari galeri
        document.addEventListener('click', function(e) {
            let target = e.target.closest('.pilih-gambar');
            if (target) {
                let src = target.getAttribute('data-src');
                previewImage.src = src;
                previewWrapper.style.display = 'block';
                gambarGaleriInput.value = src;
                gambarInput.value = '';
                let modal = bootstrap.Modal.getInstance(document.getElementById('galeriModal'));
                if (modal) modal.hide();
            }
        });
    </script>
@endpush
