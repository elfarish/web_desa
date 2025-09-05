@extends('layouts.app')

@section('title', 'Potensi Desa - Desa Pabuaran')

@section('content')
    {{-- Hero Section --}}
    <section class="position-relative text-center" style="height: 300px; overflow: hidden;">
        <style>
            .overlay-blur {
                background: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(4px);
            }

            .potensi-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .potensi-card:hover {
                transform: translateY(-5px);
                box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            }

            .text-shadow {
                text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
            }
        </style>

        <!-- Background + Blur -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('{{ asset('storage/images/kantor_desa.png') }}') center/cover no-repeat;
                   filter: blur(3px);
                   transform: scale(1.1);
                   z-index: 0;">
        </div>

        <!-- Overlay gelap -->
        <div class="position-absolute top-0 start-0 w-100 h-100 overlay-blur" style="z-index: 1;"></div>

        <!-- Konten -->
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index: 2;">
            <h1 class="fw-bold display-5 text-shadow">Potensi Desa</h1>
            <p class="lead text-warning">Beragam potensi unggulan Desa Pabuaran</p>
        </div>
    </section>

    {{-- Potensi Cards --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($potensi as $index => $item)
                    <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div class="card border-0 shadow h-100 potensi-card">
                            <div class="card-body text-center p-4">
                                <i class="bi {{ $item['icon'] }} text-success mb-3" style="font-size: 2.5rem;"></i>
                                <h5 class="card-title fw-bold">{{ $item['title'] }}</h5>
                                <p class="card-text">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Optional Bottom Section --}}
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="fw-bold">Kenali Potensi Desa Lebih Dekat</h2>
            <p>Potensi ini menjadi motor penggerak ekonomi dan pembangunan masyarakat Desa Pabuaran.</p>
        </div>
    </section>

    {{-- AOS Animation Init --}}
    @push('scripts')
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 800,
                once: true
            });
        </script>
    @endpush

@endsection

@push('styles')
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endpush
