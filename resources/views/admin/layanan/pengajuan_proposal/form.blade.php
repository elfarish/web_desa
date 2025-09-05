@csrf

<!-- Nama -->
<div class="mb-3">
    <label class="form-label fw-semibold">Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $pengajuanProposal->nama ?? '') }}"
        required>
    @error('nama')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Link -->
<div class="mb-3">
    <label class="form-label fw-semibold">Link</label>
    <input type="url" name="link" class="form-control" value="{{ old('link', $pengajuanProposal->link ?? '') }}"
        required>
    @error('link')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Tombol -->
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ isset($pengajuanProposal) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.layanan.pengajuan_proposal.index') }}" class="btn btn-secondary">Batal</a>
</div>
