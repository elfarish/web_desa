@extends('layouts.app')

@section('title', $berita->judul . ' - Desa Pabuaran')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('user.beranda') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.berita.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
                </ol>
            </nav>

            {{-- Judul dan Metadata --}}
            <div class="mb-4 text-center">
                <h1 class="fw-bold">{{ $berita->judul }}</h1>
                <p class="text-muted">
                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }} |
                    {{ $berita->penulis }}
                </p>
            </div>

            {{-- Share Buttons --}}
            <div class="my-4 d-flex justify-content-center gap-3 flex-wrap">
                @php
                    $url = request()->fullUrl();
                    $title = $berita->judul;
                    $message = "Baca berita terbaru di Desa Pabuaran: \"$title\". Klik di sini untuk detail: $url";

                    $whatsappUrl = 'https://wa.me/?text=' . rawurlencode($message);
                    $twitterUrl = 'https://twitter.com/intent/tweet?text=' . rawurlencode($message);
                    $linkedinUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode($url);
                    $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($url);
                @endphp

                <a href="{{ $whatsappUrl }}" target="_blank" class="btn btn-success btn-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Bagikan ke WhatsApp">
                    <i class="bi bi-whatsapp fs-4"></i>
                </a>
                <a href="{{ $facebookUrl }}" target="_blank" class="btn btn-primary btn-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Bagikan ke Facebook">
                    <i class="bi bi-facebook fs-4"></i>
                </a>
                <a href="{{ $twitterUrl }}" target="_blank" class="btn btn-info btn-lg rounded-circle text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Bagikan ke Twitter">
                    <i class="bi bi-twitter fs-4"></i>
                </a>
                <a href="{{ $linkedinUrl }}" target="_blank" class="btn btn-secondary btn-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Bagikan ke LinkedIn">
                    <i class="bi bi-linkedin fs-4"></i>
                </a>
                <button onclick="navigator.clipboard.writeText('{{ $url }}'); alert('Link disalin!');" class="btn btn-outline-dark btn-lg rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Salin Link">
                    <i class="bi bi-link-45deg fs-4"></i>
                </button>
            </div>

            {{-- Inisialisasi tooltip Bootstrap --}}
            @push('scripts')
                <script>
                    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                        return new bootstrap.Tooltip(tooltipTriggerEl)
                    })
                </script>
            @endpush

            {{-- Gambar utama --}}
            @if ($berita->gambar)
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/' + $berita->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $berita->judul }}" style="max-height: 500px; width: auto; object-fit: cover;">
                </div>
            @endif

            {{-- Isi Berita --}}
            <div class="card p-4 shadow-sm mb-4">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            {{-- Kembali --}}
            <div class="text-center">
                <a href="{{ route('user.berita.index') }}" class="btn btn-primary">&larr; Kembali ke Berita</a>
            </div>
        </div>
    </section>
@endsection
