@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Edit Berita</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @include('admin.berita.form')
                </form>
            </div>
        </div>
    </div>
@endsection
