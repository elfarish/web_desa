@extends('layouts.app')

@section('title', 'Template Proposal - Desa Pabuaran')

@section('content')
    {{-- Header / Hero Section --}}
    <section class="position-relative text-center" style="height: 300px; overflow: hidden;">
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: url('{{ asset('storage/images/kantor_desa.png') }}') center/cover no-repeat;
               filter: blur(3px);
               transform: scale(1.1);
               z-index: 0;">
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 overlay-blur" style="z-index: 1;"></div>
        <div class="position-relative text-white d-flex flex-column justify-content-center align-items-center h-100"
            style="z-index: 2;">
            <h1 class="fw-bold display-5 text-shadow">Template Proposal</h1>
            <p class="lead text-warning m-4">Panduan & Template Proposal Warga Desa Pabuaran</p>
        </div>
    </section>

    {{-- Tahapan Pengajuan Proposal --}}
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">Tahapan Pengajuan Proposal</h2>
            <div class="row g-4">
                @php
                    $steps = [
                        [
                            'title' => 'Unduh Template Proposal',
                            'desc' => 'Warga mengunduh template proposal yang sudah disediakan oleh desa.',
                            'icon' => 'fas fa-download',
                            'btn' => $proposals->isNotEmpty()
                                ? route('user.layanan.proposal.download', $proposals->first()->id)
                                : null,
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
                            'desc' =>
                                'Sertakan dokumen pendukung seperti RAB, foto kegiatan, atau surat rekomendasi jika diperlukan.',
                            'icon' => 'fas fa-paperclip',
                        ],
                        [
                            'title' => 'Isi Formulir Pengajuan',
                            'desc' =>
                                'Klik tombol "Ajukan Proposal" untuk mengunggah proposal melalui Google Form (jika tersedia).',
                            'icon' => 'fas fa-file-upload',
                            'btn' =>
                                $proposals->isNotEmpty() && $proposals->first()->link
                                    ? $proposals->first()->link
                                    : null,
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
                                    <a href="{{ $step['btn'] }}" class="btn mt-2 {{ $step['btnClass'] ?? 'btn-primary' }}"
                                        target="{{ strpos($step['btn'], 'http') === 0 ? '_blank' : '_self' }}">
                                        <i class="{{ $step['icon'] }} me-1"></i> {{ $step['btnText'] }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Daftar Semua Template Proposal
            <div class="mt-5">
                <h3 class="fw-bold mb-4 text-center">Daftar Template Proposal</h3>
                <div class="row g-4">
                    @forelse ($proposals as $proposal)
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">{{ $proposal->nama ?? 'Proposal Tanpa Judul' }}</h5>
                                    <p class="card-text flex-grow-1 text-muted">
                                        {{ $proposal->deskripsi ?? 'Tidak ada deskripsi' }}
                                    </p>
                                    @if ($proposal->file_path)
                                        <a href="{{ route('user.layanan.proposal.download', $proposal->id) }}"
                                            class="btn btn-warning mt-auto">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    @elseif ($proposal->link)
                                        <a href="{{ $proposal->link }}" target="_blank" class="btn btn-info mt-auto">
                                            <i class="fas fa-external-link-alt"></i> Lihat Proposal
                                        </a>
                                    @else
                                        <span class="text-muted mt-auto">Tidak ada file</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum ada template proposal tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div> --}}
        </div>
    </section>

    {{-- Custom Styles --}}
    <style>
        .overlay-blur {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .text-shadow {
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
        }

        .step-card .badge {
            width: 35px;
            height: 35px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-card .btn {
            transition: all 0.3s ease;
        }

        .step-card .btn:hover {
            transform: translateY(-2px);
        }
    </style>
@endsection
