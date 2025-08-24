@extends('layouts.app')

@section('title', $item->judul . ' - Desa Pabuaran')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="fw-bold mb-3">{{ $item->judul }}</h1>
            <p class="text-muted">
                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }} | {{ $item->views }} views
            </p>

            <img src="{{ asset($item->thumbnail ?? 'images/berita/default.png') }}" class="img-fluid mb-4"
                alt="{{ $item->judul }}">

            {{-- Jika konten mengandung HTML, tampilkan langsung --}}
            <div>{!! $item->konten !!}</div>

            {{-- Tombol Share --}}
            <div class="mt-4">
                <h5>Bagikan Berita:</h5>
                @php
                    $url = urlencode(Request::url());
                    $title = urlencode($item->judul);
                @endphp

                <a href="https://wa.me/?text={{ $title }}%20{{ $url }}" target="_blank"
                    class="btn btn-success btn-sm">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank"
                    class="btn btn-primary btn-sm">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
                <button onclick="copyLink()" class="btn btn-danger btn-sm">
                    <i class="bi bi-instagram"></i> Instagram
                </button>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $url }}&title={{ $title }}"
                    target="_blank" class="btn btn-secondary btn-sm">
                    <i class="bi bi-linkedin"></i> LinkedIn
                </a>
            </div>

            <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Berita</a>
        </div>
    </section>

    <script>
        function copyLink() {
            navigator.clipboard.writeText("{{ Request::url() }}").then(() => {
                alert("Link berita berhasil disalin! Silakan tempel di Instagram.");
            });
        }
    </script>
@endsection
