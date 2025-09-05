@csrf

<div class="mb-3">
    <label class="form-label">Gambar Slide</label>
    <input type="file" name="gambar" class="form-control" {{ isset($slide) ? '' : 'required' }}>
    <div class="form-text">
        Format: JPG, PNG, JPEG. Maksimal ukuran: 5MB.
    </div>
    @if (isset($slide) && $slide->gambar)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $slide->gambar) }}" alt="Slide" style="max-height: 150px;">
        </div>
    @endif
    @error('gambar')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="is_active" class="form-select" required>
        <option value="1" {{ isset($slide) && $slide->is_active ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ isset($slide) && !$slide->is_active ? 'selected' : '' }}>Tidak Aktif</option>
    </select>
    @error('is_active')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ isset($slide) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.beranda.slide.index') }}" class="btn btn-secondary">Batal</a>
</div>
