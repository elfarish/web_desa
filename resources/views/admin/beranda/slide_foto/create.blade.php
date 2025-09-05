@extends('layouts.admin')

@section('title', 'Tambah Slide')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Tambah Slide</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.beranda.slide.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.beranda.slide_foto.form')
                </form>
            </div>
        </div>
    </div>
@endsection
