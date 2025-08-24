@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <div class="container mt-4">
        <h1>{{ $berita->judul }}</h1>
        <p><strong>Kategori:</strong> {{ $berita->kategori }} | <strong>Penulis:</strong> {{ $berita->penulis }} |
            <strong>Tanggal:</strong> {{ $berita->tanggal->format('d-m-Y') }}</p>
        @if ($berita->gambar)
            <img src="{{ Storage::url($berita->gambar) }}" class="img-fluid mb-3">
        @endif
        <h5>Ringkasan:</h5>
        <p>{{ $berita->ringkasan }}</p>
        <h5>Isi Berita:</h5>
        <p>{!! nl2br(e($berita->isi)) !!}</p>
    </div>
@endsection
