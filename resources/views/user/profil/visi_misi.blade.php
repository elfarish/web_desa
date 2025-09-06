@extends('layouts.app')

@section('title', 'Profil Desa - Desa Pabuaran')

@section('content')
    <div class="container my-5">
        {{-- Visi & Misi --}}
        <section class="mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-5 text-center text-success">Visi & Misi</h2>
            <div class="row g-4">
                {{-- Visi --}}
                <div class="col-md-6">
                    <div class="p-5 bg-gradient-light rounded-4 shadow-sm text-center position-relative overflow-hidden">
                        <div class="mb-3">
                            <i class="bi bi-eye-fill text-success" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-semibold mb-3">Visi</h5>
                        <p class="mb-0 text-success fw-bold fs-6">
                            "Mewujudkan Masyarakat Desa Pabuaran Yang Maju, Cerdas, Dan Sehat"
                        </p>
                    </div>
                </div>
                {{-- Misi --}}
                <div class="col-md-6">
                    <div class="p-5 bg-gradient-light rounded-4 shadow-sm position-relative overflow-hidden">
                        <div class="mb-3 text-center">
                            <i class="bi bi-flag-fill text-success" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-semibold mb-3 text-center">Misi</h5>
                        <p class="mb-0 fs-6">
                            1. Mewujudkan Pemerintahan Desa Yang Jujur dan Berwibawa, Mengedepankan Kejujuran dan Musyawarah Mufakat.<br>
                            2. Meningkatkan Profesionalisme dan Mengaktifkan seluruh Perangkat Desa.<br>
                            3. Mewujudkan sarana dan prasarana Desa yang memadai.<br>
                            4. Meningkatkan Perekonomian dan Kesejahteraan masyarakat Desa.<br>
                            5. Meningkatkan Pelayanan Kesehatan masyarakat Desa secara maksimal.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1000,
                    once: true
                });
            }
        });
    </script>
@endpush
