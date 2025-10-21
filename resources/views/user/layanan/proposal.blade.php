@extends('layouts.app')

@section('title', 'Template Proposal - Desa Pabuaran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
@endpush

@section('content')
    {{-- Header / Hero Section --}}
    <section class="position-relative text-center" style="height: 300px; overflow: hidden;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('{{ asset('images/kantor_desa.png') }}') center/cover no-repeat;
               filter: blur(3px);
               transform: scale(1.1);
               z-index: 0;">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 overlay-blur" style="z-index: 1;"></div>
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index: 2;">
            <h1 class="fw-bold display-5 text-shadow">Template Proposal</h1>
            <p class="lead text-warning">Panduan & Template Proposal Warga Desa Pabuaran</p>
        </div>
    </section>

    {{-- Tahapan Pengajuan Proposal --}}
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Tahapan Pengajuan Proposal</h2>
                </div>
            </div>
            <div class="row g-4">
                @php
                    $steps = [
                        [
                            'title' => 'Unduh Template Proposal',
                            'desc' => 'Warga mengunduh template proposal yang sudah disediakan oleh desa.',
                            'icon' => 'fas fa-download',
                            'btn' => url('/layanan/surat'),
                            'btnText' => 'Download Template',
                            'btnClass' => 'btn-primary',
                        ],
                        [
                            'title' => 'Lengkapi Proposal Sesuai Format',
                            'desc' => 'Isi data dan lengkapi isi proposal sesuai format/template.',
                            'icon' => 'fas fa-file-alt',
                        ],
                        [
                            'title' => 'Persiapkan Lampiran Pendukung',
                            'desc' => 'Sertakan dokumen pendukung seperti RAB, foto kegiatan, atau surat rekomendasi jika diperlukan.',
                            'icon' => 'fas fa-paperclip',
                        ],
                        [
                            'title' => 'Isi Formulir Pengajuan',
                            'desc' => 'Klik tombol "Ajukan Proposal" untuk mengunggah proposal melalui Google Form (jika tersedia).',
                            'icon' => 'fas fa-file-upload',
                            'btn' => $proposals->isNotEmpty() && $proposals->first()->link ? $proposals->first()->link : null,
                            'btnText' => 'Ajukan Proposal',
                            'btnClass' => 'btn-success',
                        ],
                        [
                            'title' => 'Proses Verifikasi',
                            'desc' => 'Pihak desa akan meninjau dan memverifikasi proposal yang masuk.',
                            'icon' => 'fas fa-check-circle',
                        ],
                        [
                            'title' => 'Hasil & Tindak Lanjut',
                            'desc' => 'Pemohon akan menerima notifikasi hasil pengajuan melalui email/WhatsApp.',
                            'icon' => 'fas fa-bell',
                        ],
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100 step-card">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge bg-success rounded-circle me-3">{{ $index + 1 }}</span>
                                    <h5 class="card-title mb-0">
                                        <i class="{{ $step['icon'] }} me-2 text-primary"></i>{{ $step['title'] }}
                                    </h5>
                                </div>
                                <p class="card-text flex-grow-1 text-muted">{{ $step['desc'] }}</p>
                                @if (isset($step['btn']))
                                    <a href="{{ $step['btn'] }}" class="btn mt-2 {{ $step['btnClass'] ?? 'btn-primary' }}" target="{{ strpos($step['btn'], 'http') === 0 ? '_blank' : '_self' }}">
                                        <i class="{{ $step['icon'] }} me-1"></i> {{ $step['btnText'] }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
