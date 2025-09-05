@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Tambah Berita</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.berita.form')
                </form>
            </div>
        </div>
    </div>
@endsection
