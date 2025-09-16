@extends('layouts.auth')

@section('title', 'Login Admin')

@section('content')
    <div class="card login-card">
        <div class="card-body text-center">
            <div class="login-header mb-4">
                <img src="{{ asset('logo.svg') }}" alt="Logo Desa" class="mb-3"
                    style="width:100px; height:auto;">
                <h4 class="fw-bold text-success">Login Admin</h4>
            </div>

            <form method="POST" action="{{ route('login') }}" class="text-start">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-login w-100">Login</button>
            </form>
        </div>
    </div>
@endsection
