<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Pabuaran')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/images/logo.svg') }}" type="image/svg+xml">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.svg') }}" type="image/svg+xml">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            font-weight: 600;
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('user.beranda') }}">
                <img src="{{ asset('storage/images/logo.svg') }}" alt="Logo Desa" width="36" height="36"
                    class="me-2 rounded-circle">
                <span class="fw-bold">Desa Pabuaran</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
                <ul class="navbar-nav gap-lg-4 gap-2 ms-lg-auto">

                    {{-- Beranda --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.beranda') ? 'active fw-semibold text-white' : 'text-white-50' }}"
                            href="{{ route('user.beranda') }}">Beranda</a>
                    </li>

                    {{-- Profil Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('profil') ? 'active fw-semibold text-white' : 'text-white-50' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-4 px-2 py-2">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('user.profil.visi_misi') ? 'active fw-semibold text-success' : '' }}"
                                    href="{{ route('user.profil.visi_misi') }}">Visi & Misi</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('user.profil.sejarah_desa') ? 'active fw-semibold text-success' : '' }}"
                                    href="{{ route('user.profil.sejarah_desa') }}">Sejarah</a>
                            </li>
                        </ul>
                    </li>


                    {{-- Struktural --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarStruktural" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Struktural
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarStruktural">
                            <li><a class="dropdown-item"
                                    href="{{ route('user.struktural.kepengurusan') }}">Kepengurusan Desa</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.struktural.lembaga_bpd') }}">Lembaga
                                    BPD</a></li>
                        </ul>
                    </li>


                    {{-- Potensi Desa --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.potensi') ? 'active fw-semibold text-white' : 'text-white-50' }}"
                            href="{{ route('user.potensi.index') }}">Potensi Desa</a>
                    </li>

                    {{-- Berita --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.berita.*') ? 'active fw-semibold text-white' : 'text-white-50' }}"
                            href="{{ route('user.berita.index') }}">Berita</a>
                    </li>

                    {{-- Dropdown Layanan --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('layanan*') ? 'active fw-semibold text-white' : 'text-white-50' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-4 px-2 py-2">
                            <li>
                                <a class="dropdown-item {{ request()->routeIs('layanan.surat') ? 'active fw-semibold text-success' : '' }}"
                                    href="{{ route('user.layanan.surat') }}">
                                    <i class="bi bi-file-earmark-text me-2 text-success"></i> Template Surat
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('user.layanan.pengajuan') ? 'active fw-semibold text-success' : '' }}"
                                    href="{{ route('user.layanan.proposal') }}">
                                    <i class="bi bi-send-check me-2 text-success"></i> Pengajuan Proposal
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-success text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row gy-4">
                {{-- Kolom 1 --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Desa Pabuaran</h5>
                    <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Raya Pabuaran No 01. RT 002/002 Desa
                        Pabuaran, Kec. Kemang, Kab. Bogor</p>
                    <p class="mb-3"><i class="bi bi-envelope-fill me-2"></i>pemdespabuaran001@gmail.com</p>
                    <div class="ratio ratio-16x9 rounded shadow-sm">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1800657528092!2d106.7360589202192!3d-6.498874259949035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c2da8586ea5f%3A0x9d213c1cac0155e7!2sKantor%20Desa%20Pabuaran%20Kec.%20Kemang!5e0!3m2!1sid!2sid!4v1755661884705!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>

                {{-- Kolom 2 --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.beranda') }}"
                                class="text-white-50 text-decoration-none">Beranda</a></li>
                        <li><a href="{{ route('user.profil.visi_misi') }}"
                                class="text-white-50 text-decoration-none">Profil</a></li>
                        <li><a href="{{ route('user.potensi.index') }}"
                                class="text-white-50 text-decoration-none">Potensi
                                Desa</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Layanan</a></li>
                    </ul>
                </div>

                {{-- Kolom 3 --}}
                <div class="col-md-4">
                    <h5 class="fw-semibold mb-3">Ikuti Kami</h5>
                    <div class="d-flex gap-3">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white fs-5"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/pabuaran_maju" target="_blank" rel="noopener noreferrer"
                            class="text-white fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white fs-5"><i
                                class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>

            <hr class="border-white opacity-25 mt-4">
            <div class="text-center small">© {{ date('Y') }} Desa Pabuaran. All rights reserved.</div>
        </div>
    </footer>

    {{-- JS --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    @stack('scripts')

</body>

</html>
