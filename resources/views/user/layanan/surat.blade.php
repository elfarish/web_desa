@extends('layouts.app')

@section('title', 'Layanan Surat - Desa Pabuaran')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">
                <i class="bi bi-file-earmark-text me-2"></i> Daftar Template Surat
            </h2>

            <div class="row g-4">
                @forelse ($templates as $template)
                    @php
                        $kategori = $template->kategori ?? 'Lainnya';
                        $badgeClass = match (strtolower($kategori)) {
                            'proposal' => 'bg-primary',
                            'surat pernyataan' => 'bg-success',
                            'surat keterangan' => 'bg-info',
                            default => 'bg-secondary',
                        };
                        $fileExt = pathinfo($template->file_path, PATHINFO_EXTENSION);
                        $fileIcon = match (strtolower($fileExt)) {
                            'pdf' => 'bi-file-earmark-pdf text-danger',
                            'doc', 'docx' => 'bi-file-earmark-word text-primary',
                            default => 'bi-file-earmark',
                        };
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100 border-0 rounded-4">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold d-flex align-items-center mb-2">
                                    <i class="bi {{ $fileIcon }} me-2 fs-4"></i>
                                    {{ $template->nama_template }}
                                </h5>
                                <span class="badge {{ $badgeClass }} mb-3 px-3 py-2 rounded-pill">
                                    {{ $kategori }}
                                </span>
                                <p class="card-text grow text-muted">
                                    {{ $template->deskripsi ?? 'Tidak ada deskripsi' }}
                                </p>
                                <div class="d-grid gap-2 mt-auto">
                                    @if ($fileExt === 'pdf')
                                        <a href="{{ asset('storage/' . $template->file_path) }}" target="_blank" class="btn btn-outline-primary rounded-pill">
                                            <i class="bi bi-eye"></i> Preview
                                        </a>
                                    @endif
                                    <a href="{{ route('user.layanan.surat.download', $template->id) }}" class="btn btn-warning rounded-pill">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada template surat tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
