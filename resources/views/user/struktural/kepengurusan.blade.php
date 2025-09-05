@extends('layouts.app')

@section('title', 'Kepengurusan Desa - Desa Pabuaran')

@section('content')
    {{-- Hero Section --}}
    <section class="position-relative text-center" style="height: 300px; overflow: hidden;">

        <style>
            .overlay-blur {
                background: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(4px);
            }
        </style>

        <!-- Background + Blur -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('{{ asset('storage/images/kantor_desa.png') }}') center/cover no-repeat;
               filter: blur(3px);
               transform: scale(1.1); /* biar gak kelihatan edge hitam pas blur */
               z-index: 0;">
        </div>

        <!-- Overlay gelap -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5); z-index: 1;">
        </div>

        <!-- Konten -->
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index: 2;">
            <h1 class="fw-bold display-5 text-shadow">Kepengurusan Desa</h1>
            <p class="lead text-warning">Struktural Staf kepengurusan Desa Pabuaran</p>
        </div>
    </section>


    <div class="container my-5">

        <style>
            .person-card {
                padding: 10px;
            }

            .person-card img {
                transition: transform 0.3s;
            }

            .person-card img:hover {
                transform: scale(1.05);
            }

            @media (max-width: 576px) {
                .person-card img {
                    max-width: 80%;
                }
            }
        </style>

        {{-- Kepala Desa --}}
        @if ($kepengurusan['kepalaDesa'])
            <div class="row justify-content-center mb-4">
                <div class="col-md-3 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $kepengurusan['kepalaDesa']->foto
                        ? asset('storage/' . $kepengurusan['kepalaDesa']->foto)
                        : asset('storage/struktural/default_image.png') }}"
                        class="img-fluid rounded shadow" alt="{{ $kepengurusan['kepalaDesa']->nama }}">

                    <h5 class="mt-2 mb-0 fw-semibold">{{ $kepengurusan['kepalaDesa']->nama }}</h5>
                    <small class="text-muted">{{ $kepengurusan['kepalaDesa']->jabatan }}</small>
                </div>
            </div>
        @endif

        {{-- Sekretaris Desa --}}
        @if ($kepengurusan['sekdes'])
            <div class="row justify-content-center mb-4">
                <div class="col-md-3 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $kepengurusan['sekdes']->foto
                        ? asset('storage/' . $kepengurusan['sekdes']->foto)
                        : asset('storage/struktural/default_image.png') }}"
                        class="img-fluid rounded shadow" alt="{{ $kepengurusan['sekdes']->nama }}">
                    <h5 class="mt-2 mb-0 fw-semibold">{{ $kepengurusan['sekdes']->nama }}</h5>
                    <small class="text-muted">{{ $kepengurusan['sekdes']->jabatan }}</small>
                </div>
            </div>
        @endif

        {{-- Kepala Seksi & Kepala Urusan --}}
        <div class="row justify-content-center mb-4">
            @foreach ($kepengurusan['kasiKaur'] as $staf)
                <div class="col-md-2 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $staf->foto ? asset('storage/' . $staf->foto) : asset('storage/struktural/default_image.png') }}"
                        class="img-fluid rounded shadow" alt="{{ $staf->nama }}">
                    <h6 class="mt-2 mb-0">{{ $staf->nama }}</h6>
                    <small class="text-muted">{{ $staf->jabatan }}</small>
                </div>
            @endforeach
        </div>

        {{-- Kepala Dusun --}}
        <div class="row justify-content-center mb-4">
            @foreach ($kepengurusan['kadus'] as $dusun)
                <div class="col-md-2 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $dusun->foto ? asset('storage/' . $dusun->foto) : asset('storage/struktural/default_image.png') }}"
                        class="img-fluid rounded shadow" alt="{{ $dusun->nama }}">
                    <h6 class="mt-2 mb-0">{{ $dusun->nama }}</h6>
                    <small class="text-muted">{{ $dusun->jabatan }}</small>
                </div>
            @endforeach
        </div>

        {{-- Staf Pembantu --}}
        <div class="row justify-content-center">
            @foreach ($kepengurusan['staf'] as $pembantu)
                <div class="col-md-2 col-sm-6 col-12 person-card text-center">
                    <img src="{{ $pembantu->foto ? asset('storage/' . $pembantu->foto) : asset('storage/struktural/default_image.png') }}"
                        class="img-fluid rounded shadow" alt="{{ $pembantu->nama }}">
                    <h6 class="mt-2 mb-0">{{ $pembantu->nama }}</h6>
                    <small class="text-muted">{{ $pembantu->jabatan }}</small>
                </div>
            @endforeach
        </div>

    </div>
@endsection
