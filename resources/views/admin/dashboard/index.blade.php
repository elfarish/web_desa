@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Stat cards -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- Total Berita -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalBerita }}</h3>
                                <p>Total Berita</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <a href="{{ route('admin.berita.index') }}" class="small-box-footer">
                                Lihat Berita <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- Total Dokumen Layanan -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalLayanan }}</h3>
                                <p>Total Dokumen</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <a href="{{ route('admin.layanan.index') }}" class="small-box-footer">
                                Lihat Dokumen <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- Total Struktural / Potensi -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $totalStruktural }}</h3>
                                <p>Total Struktural</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('admin.struktural.index') }}" class="small-box-footer">
                                Lihat Struktural <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- Total Pengunjung -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $totalVisitors }}</h3>
                                <p>Pengunjung Website</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Info Pengunjung <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Optional: chart atau data tambahan bisa ditambahkan di bawah -->
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Statistik Website</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="website-stats-chart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        const ctx = document.getElementById('website-stats-chart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($statsLabels) !!},
                datasets: [{
                    label: 'Pengunjung per hari',
                    data: {!! json_encode($statsData) !!},
                    backgroundColor: 'rgba(60,141,188,0.2)',
                    borderColor: 'rgba(60,141,188,1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endsection
