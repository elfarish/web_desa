@extends('layouts.app')

@section('title', 'Potensi Desa - Desa Pabuaran')

@section('content')
    {{-- Hero Section --}}
    <section class="py-5 text-white text-center position-relative"
        style="background-image: url('{{ asset('images/desa_pabuaran.jpg') }}'); background-size: cover; background-position: center;">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>
        <div class="container py-5 position-relative" data-aos="fade-down">
            <h1 class="fw-bold display-5">Potensi Desa</h1>
            <p class="lead">Beragam potensi unggulan Desa Pabuaran untuk kemajuan bersama</p>
        </div>
    </section>

    {{-- Potensi Cards --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                @php
                    $potensis = [
                        [
                            'title' => 'BUMDes',
                            'desc' => 'Badan Usaha Milik Desa (BUMDes) sebagai motor penggerak ekonomi desa.',
                            'icon' => 'bi-bank',
                        ],
                        [
                            'title' => 'UMKM Desa',
                            'desc' => 'Usaha Mikro Kecil dan Menengah lokal yang mendukung perekonomian warga.',
                            'icon' => 'bi-shop',
                        ],
                        [
                            'title' => 'Pertanian',
                            'desc' => 'Sektor pertanian sebagai sumber mata pencaharian utama masyarakat.',
                            'icon' => 'bi-flower2',
                        ],
                        [
                            'title' => 'Perikanan',
                            'desc' => 'Potensi perikanan air tawar dan laut yang menjanjikan.',
                            'icon' => 'bi-droplet-half',
                        ],
                        [
                            'title' => 'Peternakan',
                            'desc' => 'Berbagai jenis peternakan seperti sapi, kambing, dan ayam.',
                            'icon' => 'bi-egg-fried',
                        ],
                        [
                            'title' => 'Koperasi Desa',
                            'desc' => 'Koperasi sebagai wadah pemberdayaan ekonomi masyarakat.',
                            'icon' => 'bi-people',
                        ],
                    ];
                @endphp

                @foreach ($potensis as $index => $item)
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

    {{-- Custom CSS --}}
    @push('styles')
        <style>
            .potensi-card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .potensi-card:hover {
                transform: translateY(-5px);
                box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            }

            .overlay {
                z-index: 1;
            }

            section h1,
            section p {
                z-index: 2;
            }
        </style>
    @endpush
@endsection
