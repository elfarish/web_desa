@extends('layouts.app')

@section('title', 'Profil Desa - Desa Pabuaran')

@section('content')
    <div class="container my-5">
        {{-- Sejarah Desa --}}
        <section class="mb-5 pb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-4 text-center text-success">Sejarah Desa</h2>
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-success">
                        <p>
                            Desa Pabuaran pada awalnya merupakan bagian dari Kecamatan Semplak yang termasuk wilayah Kota
                            Bogor. Namun, pada tahun 1995, Kecamatan Semplak mengalami pemekaran wilayah sehingga Desa Pabuaran
                            menjadi bagian dari Kecamatan Kemang, Kabupaten Bogor.
                        </p>
                        <p>
                            Sejak tahun 1960, kepemimpinan Desa Pabuaran telah berganti beberapa kali, dimulai dari
                            <strong>Kasda (1961–1971)</strong>, <strong>Irna (1971–1978)</strong>, <strong>Dasim (1978–1988)</strong>,
                            <strong>M. Aman (1988–1998)</strong>, <strong>Endih Supandi (1998–2013)</strong>,
                            hingga <strong>Ayoh Yohana</strong> yang menjabat sejak tahun 2013 hingga sekarang.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/desa_pabuaran.jpg') }}" class="img-fluid rounded shadow-lg border" alt="Foto Sejarah Desa">
                </div>
            </div>
        </section>

        {{-- Galeri Foto Desa --}}
        <section class="mb-5 pb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-4 text-center text-success">Galeri Foto Desa</h2>
            @if (!empty($galeri) && count($galeri) > 0)
                <div id="galeriCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded shadow-lg">
                        @foreach ($galeri as $key => $foto)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ $foto->gambar_url }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="{{ $foto->judul ?? 'Foto Desa' }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galeriCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galeriCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-indicators mt-3">
                        @foreach ($galeri as $key => $foto)
                            <button type="button" data-bs-target="#galeriCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center text-muted">Belum ada foto galeri.</p>
            @endif
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1000,
                    once: true
                });
            }
        });
    </script>
@endpush
