@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Dashboard Admin</h1>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">

            {{-- Semua fitur placeholder --}}
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
@endsection
