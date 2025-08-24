@extends('layouts.app')

@section('title', 'Berita - Desa Pabuaran')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="fw-bold mb-4" data-aos="fade-down">Berita Desa Pabuaran</h1>
            <div class="row g-4">
                @php use Illuminate\Support\Str; @endphp
                @forelse ($berita as $item)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="card h-100 border-0 shadow-sm berita-card">
                            {{-- Container untuk thumbnail 16:9 --}}
                            <div class="thumbnail-16-9">
                                <img src="{{ asset($item->thumbnail ?? 'images/berita/default.png') }}"
                                    alt="{{ $item->judul }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                                <p class="text-muted small mb-1">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }} |
                                    {{ $item->views ?? 0 }} views
                                </p>
                                <p class="card-text">
                                    {{ Str::limit($item->excerpt ?? strip_tags($item->konten), 100, '...') }}</p>
                                <a href="{{ route('berita.show', $item->slug) }}"
                                    class="btn btn-success btn-sm">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada berita tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    @push('styles')
        <style>
            /* Efek hover card */
            .berita-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .berita-card:hover {
                transform: translateY(-5px);
                box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
                cursor: pointer;
            }

            /* Thumbnail 16:9 */
            .thumbnail-16-9 {
                position: relative;
                width: 100%;
                padding-top: 56.25%;
                /* 16:9 = 9/16 = 0.5625 */
                overflow: hidden;
            }

            .thumbnail-16-9 img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                /* agar image tetap proporsional */
            }
        </style>
    @endpush
@endsection
