<div class="modal fade" id="galeriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-images me-1"></i> Pilih Gambar dari Galeri
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    @foreach ($galeri as $foto)
                        <div class="col-6 col-md-3">
                            <div class="card h-100 border-0 shadow-sm pilih-gambar" style="cursor:pointer;"
                                data-src="{{ asset('storage/' . $foto->gambar) }}">
                                <img src="{{ asset('storage/' . $foto->gambar) }}"
                                    class="card-img-top rounded pilih-gambar" style="height:120px; object-fit:cover;"
                                    data-src="{{ asset('storage/' . $foto->gambar) }}">
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
