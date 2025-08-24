@extends('layouts.app')

@section('title', 'Beranda - Desa Pabuaran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endpush

@section('content')

    {{-- Hero Section (Carousel) --}}
    <section class="hero-section position-relative text-white">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @forelse ($slides ?? [] as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $slide->gambar) }}" class="d-block w-100"
                            alt="Slide {{ $index + 1 }}">
                    </div>
                @empty
                    <div class="carousel-item active">
                        <div style="background-color: #333; height: 100vh;"></div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Caption tetap diam -->
        <div
            class="carousel-caption d-flex flex-column justify-content-center text-center position-absolute top-0 start-0 w-100 h-100">
            <h1 class="display-4 fw-bold hero-animate">
                Selamat Datang di<br> Website
                <span class="text-warning">Desa Pabuaran</span>
            </h1>
            <p class="lead mt-3 hero-animate">
                Website resmi Desa Pabuaran sebagai sarana keterbukaan informasi dan layanan masyarakat.
            </p>
            <a href="#profil" class="btn btn-warning btn-lg mt-3 hero-animate">Lihat Profil Desa</a>

        </div>
    </section>

    {{-- Sambutan Kepala Desa --}}
    <section id="profil">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-down">Sambutan Kepala Desa</h2>
            <div class="row align-items-center">
                <div class="col-md-4 mb-4 text-center" data-aos="zoom-in">
                    <img src="{{ asset('storage/images/sambutan.png') }}" alt="Kepala Desa"
                        class="img-fluid rounded shadow mb-3">
                    <h5 class="mb-0">Ayoh Yohana</h5>
                    <small class="text-muted">Kepala Desa</small>
                </div>

                <div class="col-md-8" data-aos="fade-left">
                    <p class="fs-5">
                        Selamat datang di website resmi <strong>Desa Pabuaran</strong>. Website ini menjadi sarana
                        keterbukaan informasi dan pelayanan kepada masyarakat. Kami berkomitmen untuk memberikan layanan
                        terbaik,
                        membangun desa dengan partisipatif, serta menjaga transparansi dalam tata kelola pemerintahan desa.
                    </p>
                    <p class="fs-5">
                        Semoga website ini bermanfaat bagi seluruh warga Desa Pabuaran dan masyarakat umum.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- Statistik Penduduk --}}
    <section class="py-5 bg-light d-flex align-items-center">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Statistik Penduduk</h2>
            <div class="row g-4 justify-content-center">
                @foreach ($stats as $index => $stat)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div
                            class="stat-card bg-white rounded shadow-sm p-4 h-100 d-flex flex-column align-items-center justify-content-center text-center">
                            <i class="bi {{ $stat->icon }} text-success mb-3" style="font-size: 2.5rem;"></i>
                            <h3 class="text-success fw-bold mb-2">
                                <span class="counter" data-count="{{ $stat->count }}">0</span>
                            </h3>
                            <p class="mb-0 fw-semibold">{{ $stat->label }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/beranda.js') }}"></script>
@endpush
