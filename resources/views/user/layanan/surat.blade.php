@extends('layouts.app')

@section('title', 'Layanan Surat - Desa Pabuaran')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">
                <i class="bi bi-file-earmark-text me-2"></i> Daftar Template Surat
            </h2>

            {{-- Search Form --}}
            <div class="mb-4">
                <form class="d-flex justify-content-center" style="max-width: 400px; margin: 0 auto;" onsubmit="return filterTemplateForm(event)">
                    <input type="text" class="form-control" placeholder="Cari template surat..."
                           value="{{ request('search') }}" name="search" id="search-input">
                    <button class="btn btn-primary ms-2" type="submit">
                        <i class="bi bi-search"></i> Cari
                    </button>
                    @if(request('search'))
                        <button class="btn btn-outline-secondary ms-2" type="button" onclick="clearSearch()">
                            <i class="bi bi-x"></i> Hapus
                        </button>
                    @endif
                </form>
            </div>

            <div class="row g-4">
                @forelse ($templates as $template)
                    @php
                        $kategori = $template->kategori ?? 'Lainnya';
                        $badgeClass = match (strtolower($kategori)) {
                            'proposal' => 'bg-primary',
                            'surat pernyataan' => 'bg-success',
                            'surat keterangan' => 'bg-info',
                            default => 'bg-secondary',
                        };
                        $fileExt = pathinfo($template->file_path, PATHINFO_EXTENSION);
                        $fileIcon = match (strtolower($fileExt)) {
                            'pdf' => 'bi-file-earmark-pdf text-danger',
                            'doc', 'docx' => 'bi-file-earmark-word text-primary',
                            default => 'bi-file-earmark',
                        };
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100 border-0 rounded-4">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold d-flex align-items-center mb-2">
                                    <i class="bi {{ $fileIcon }} me-2 fs-4"></i>
                                    {{ $template->nama_template }}
                                </h5>
                                <span class="badge {{ $badgeClass }} mb-3 px-3 py-2 rounded-pill">
                                    {{ $kategori }}
                                </span>
                                <p class="card-text grow text-muted">
                                    {{ $template->deskripsi ?? 'Tidak ada deskripsi' }}
                                </p>
                                <div class="d-grid gap-2 mt-auto">
                                    @if ($fileExt === 'pdf')
                                        <a href="{{ $template->file_path_url }}" target="_blank" class="btn btn-outline-primary rounded-pill">
                                            <i class="bi bi-eye"></i> Preview
                                        </a>
                                    @endif
                                    <a href="{{ route('user.layanan.surat.download', $template->id) }}" class="btn btn-warning rounded-pill">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">Belum ada template surat tersedia.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $templates->appends(request()->query())->links() }}
            </div>
        </div>
    </section>

    <script>
        function filterTemplateForm(event) {
            event.preventDefault();
            const search = document.getElementById('search-input').value;
            const url = new URL(window.location);
            if (search) {
                url.searchParams.set('search', search);
            } else {
                url.searchParams.delete('search');
            }
            url.searchParams.delete('page'); // Reset page when searching
            window.location.href = url.toString();
            return false;
        }

        function clearSearch() {
            const url = new URL(window.location);
            url.searchParams.delete('search');
            url.searchParams.delete('page');
            window.location.href = url.toString();
        }
    </script>
@endsection
