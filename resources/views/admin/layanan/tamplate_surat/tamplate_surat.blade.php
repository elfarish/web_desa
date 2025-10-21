<file_path>
desa_pabuaran\resources\views\admin\layanan\tamplate_surat\tamplate_surat.blade.php
</file_path>

<edit_description>
Redesign the template surat view with improved styling and layout
</edit_description>
@extends('layouts.admin')

@section('title', 'Template Surat')

@section('content')
    <div class="container-fluid">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Template Surat</h1>
                <p class="text-muted">Kelola template surat untuk layanan desa</p>
            </div>
            <a href="{{ route('admin.layanan.tamplate_surat.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="bi bi-plus-circle-fill me-2"></i>Tambah Template
            </a>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Search and Filter Card --}}
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-8">
                        <label for="search-input" class="form-label fw-semibold">Cari Template</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0"
                                   placeholder="Ketik nama template..."
                                   value="{{ request('search') }}"
                                   name="search" id="search-input">
                            <button class="btn btn-outline-secondary" type="button" onclick="filterTemplateForm()">
                                <i class="bi bi-search"></i>
                            </button>
                            <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid">
                            <button class="btn btn-outline-primary" onclick="refreshPage()">
                                <i class="bi bi-arrow-clockwise me-1"></i>Refresh
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Templates Table Card --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-gray-800">
                        <i class="bi bi-file-earmark-text me-2 text-primary"></i>Daftar Template Surat
                    </h5>
                    <span class="badge bg-primary rounded-pill">{{ $templates->count() }} Template</span>
                </div>
            </div>
            <div class="card-body p-0">
                @forelse($templates as $template)
                    <div class="border-bottom p-3 hover-bg-light">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm me-3">
                                        <div class="avatar-initial bg-primary rounded-circle">
                                            <i class="bi bi-file-earmark-text-fill text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $template->nama_template }}</h6>
                                        <small class="text-muted">{{ $template->kategori ?? 'Umum' }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-0 text-truncate" title="{{ $template->deskripsi }}">
                                    {{ Str::limit($template->deskripsi ?? 'Tidak ada deskripsi', 60) }}
                                </p>
                            </div>
                            <div class="col-md-2 text-center">
                                @if ($template->file_path)
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Available
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-dash-circle me-1"></i>No File
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="btn-group" role="group">
                                    @if ($template->file_path)
                                        <a href="{{ route('admin.layanan.tamplate_surat.download', $template->id) }}"
                                            class="btn btn-sm btn-outline-success" title="Download">
                                            <i class="bi bi-download"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.layanan.tamplate_surat.edit', $template->id) }}"
                                        class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.layanan.tamplate_surat.destroy', $template->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus template ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="bi bi-file-earmark-x display-1 text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada template</h5>
                        <p class="text-muted">Tambahkan template surat pertama Anda untuk memulai.</p>
                        <a href="{{ route('admin.layanan.tamplate_surat.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i>Tambah Template
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Pagination --}}
        @if($templates->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $templates->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

    <style>
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
        }
        .avatar {
            width: 40px;
            height: 40px;
        }
        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .text-gray-800 {
            color: #495057 !important;
        }
    </style>

    <script>
        function filterTemplateForm() {
            const search = document.getElementById('search-input').value;
            const url = new URL(window.location);
            if (search) {
                url.searchParams.set('search', search);
            } else {
                url.searchParams.delete('search');
            }
            url.searchParams.delete('page');
            window.location.href = url.toString();
        }

        function clearSearch() {
            const url = new URL(window.location);
            url.searchParams.delete('search');
            url.searchParams.delete('page');
            window.location.href = url.toString();
        }

        function refreshPage() {
            window.location.reload();
        }

        // Enter key support for search
        document.getElementById('search-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                filterTemplateForm();
            }
        });
    </script>
@endsection
