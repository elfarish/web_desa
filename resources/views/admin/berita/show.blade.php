@extends('layouts.admin')
@section('title', 'Detail Berita')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Detail Berita</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($berita->gambar)
                            <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="img-fluid rounded">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 200px;">
                                <span class="text-muted">Tidak ada gambar</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $berita->judul }}</h2>
                        <p class="text-muted mb-2">
                            <strong>Kategori:</strong> {{ $berita->kategori }} |
                            <strong>Status:</strong> 
                            @switch($berita->status)
                                @case('published')
                                    <span class="badge bg-success">Published</span>
                                @break
                                @case('draft')
                                    <span class="badge bg-secondary">Draft</span>
                                @break
                                @default
                                    <span class="badge bg-warning text-dark">Pending</span>
                            @endswitch
                            |
                            <strong>Tanggal:</strong> {{ $berita->formatted_tanggal }}
                        </p>
                        <p class="text-muted mb-3">
                            <strong>Penulis:</strong> {{ $berita->user->name ?? 'Admin' }}
                        </p>
                        <p><strong>Ringkasan:</strong></p>
                        <p>{{ $berita->ringkasan }}</p>
                    </div>
                </div>
                <hr>
                <div>
                    <h4>Isi Berita</h4>
                    <div>{!! nl2br(e($berita->isi)) !!}</div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
@endsection
