@csrf

<!-- Icon -->
<div class="mb-3">
    <label class="form-label fw-semibold">Icon</label>
    <input type="text" name="icon" class="form-control" value="{{ old('icon', $statistik->icon ?? '') }}" required>
    <small class="text-muted d-block">
        Masukkan nama class icon. Misalnya untuk <strong>Bootstrap Icons</strong> gunakan format:
        <code>bi bi-bar-chart-line</code> atau <code>bi bi-people</code>.<br>
        Lihat semua icon di <a href="https://icons.getbootstrap.com/" target="_blank"
            class="text-decoration-underline">https://icons.getbootstrap.com/</a>
    </small>
    <div class="mt-2">
        <strong>Contoh Preview:</strong>
        <i class="bi bi-bar-chart-line me-2"></i> <i class="bi bi-people"></i>
    </div>
    @error('icon')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Count -->
<div class="mb-3">
    <label class="form-label fw-semibold">Count</label>
    <input type="number" name="count" class="form-control" value="{{ old('count', $statistik->count ?? '') }}"
        required>
    @error('count')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Label -->
<div class="mb-3">
    <label class="form-label fw-semibold">Label</label>
    <input type="text" name="label" class="form-control" value="{{ old('label', $statistik->label ?? '') }}"
        required>
    @error('label')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Tombol -->
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
    <a href="{{ route('admin.beranda.statistik.index') }}" class="btn btn-secondary">Batal</a>
</div>
