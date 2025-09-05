@csrf

<!-- Nama Template -->
<div class="mb-3">
    <label class="form-label fw-semibold">Nama Template</label>
    <input type="text" name="nama_template" class="form-control"
        value="{{ old('nama_template', $tamplateSurat->nama_template ?? '') }}" required>
    @error('nama_template')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Kategori -->
<div class="mb-3">
    <label class="form-label fw-semibold">Kategori</label>
    <input type="text" name="kategori" class="form-control"
        value="{{ old('kategori', $tamplateSurat->kategori ?? '') }}">
    @error('kategori')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Deskripsi -->
<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi</label>
    <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $tamplateSurat->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- File -->
<div class="mb-3">
    <label class="form-label fw-semibold">File Template</label>
    <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
    <small class="form-text text-muted">Format: pdf, doc, docx</small>

    @if (isset($tamplateSurat) && $tamplateSurat->file_path)
        <div class="mt-2">
            <small class="text-muted d-block">File saat ini:</small>
            <a href="{{ route('admin.layanan.tamplate_surat.download', $tamplateSurat->id) }}"
                class="btn btn-sm btn-success">
                <i class="bi bi-download me-1"></i> Download
            </a>

        </div>
    @endif
</div>

<!-- Tombol -->
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ isset($tamplateSurat) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.layanan.tamplate_surat.index') }}" class="btn btn-secondary">Batal</a>
</div>
