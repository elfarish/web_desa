@extends('layouts.app')

@section('title', 'Template Surat - Desa Pabuaran')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="fw-bold mb-4 text-center">Template Surat Pernyataan</h1>

            <p class="mb-5 text-center">
                Halaman ini menyediakan template surat untuk warga Desa Pabuaran.
                Silakan pilih salah satu jenis surat untuk diunduh:
            </p>

            <div class="row g-4 justify-content-center">
                @forelse($surats as $surat)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm hover-shadow transition h-100">
                            {{-- Thumbnail Preview --}}
                            <div class="doc-thumbnail mb-3"
                                style="height:200px; overflow:hidden; display:flex; align-items:center; justify-content:center; background:#f8f9fa; border-radius:5px;">
                                @if (Str::endsWith($surat->file_path, '.pdf'))
                                    <iframe src="{{ asset('storage/' . $surat->file_path) }}"
                                        style="width:100%; height:100%; border:none;"></iframe>
                                @else
                                    <img src="{{ $surat->preview ?? asset('images/file-icon.png') }}" alt="Preview"
                                        style="max-height:100%; max-width:100%;">
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title text-center mb-2">{{ $surat->nama_file }}</h6>
                                <p class="card-text text-muted text-center mb-3" style="font-size:0.85rem;">
                                    {{ Str::limit($surat->deskripsi, 60) }}
                                </p>
                                <a href="{{ route('user.layanan.surat.download', $surat->id) }}"
                                    class="btn btn-success btn-sm mt-auto w-100 text-center">
                                    <i class="fas fa-download me-1"></i> Unduh
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>
                            Saat ini belum ada template surat tersedia.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        .hover-shadow:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .transition {
            transition: all 0.3s ease-in-out;
        }

        .doc-thumbnail iframe {
            pointer-events: none;
            border-radius: 5px;
        }
    </style>
@endsection
