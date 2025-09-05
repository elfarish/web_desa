@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row g-4">

            {{-- Semua fitur placeholder --}}
            @php
                $features = [
                    ['icon' => 'bi-newspaper', 'title' => 'Berita', 'desc' => 'Kelola berita desa.'],
                    ['icon' => 'bi-people', 'title' => 'Layanan', 'desc' => 'Kelola layanan masyarakat.'],
                    ['icon' => 'bi-images', 'title' => 'Galeri', 'desc' => 'Kelola galeri foto desa.'],
                    [
                        'icon' => 'bi-bar-chart-line',
                        'title' => 'Statistik',
                        'desc' => 'Fitur masih dalam pengembangan.',
                    ],
                    ['icon' => 'bi-people', 'title' => 'Pengunjung', 'desc' => 'Fitur masih dalam pengembangan.'],
                    ['icon' => 'bi-tools', 'title' => 'Lainnya', 'desc' => 'Fitur masih dalam pengembangan.'],
                ];
            @endphp

            @foreach ($features as $feature)
                <div class="col-md-4 col-sm-6">
                    <div class="card-admin shadow-sm text-center p-4 h-100 bg-light border-dashed">
                        <i class="bi {{ $feature['icon'] }} fs-1 mb-3 text-muted"></i>
                        <h5>{{ $feature['title'] }}</h5>
                        <p class="text-muted">{{ $feature['desc'] }}</p>
                        <button class="btn btn-secondary" disabled>Segera Hadir</button>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <style>
        /* Card placeholder border dashed untuk bedakan fitur belum aktif */
        .border-dashed {
            border: 2px dashed #ccc !important;
            background-color: #f8f9fa;
        }

        .card-admin h5 {
            font-weight: 600;
        }

        .card-admin p {
            font-size: 0.9rem;
        }

        .card-admin i {
            display: block;
        }
    </style>
@endsection
