@extends('layouts.admin')

@section('title', 'Edit Slide')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Edit Slide</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.beranda.slide.update', $slide->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.beranda.slide_foto.form')
                </form>
            </div>
        </div>
    </div>
@endsection
