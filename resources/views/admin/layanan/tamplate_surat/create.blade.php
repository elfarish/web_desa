@extends('layouts.admin')

@section('title', 'Tambah Template Surat')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Tambah Template Surat</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.layanan.tamplate_surat.store') }}" method="POST" enctype="multipart/form-data">
                    @include('admin.layanan.tamplate_surat.form')
                </form>
            </div>
        </div>
    </div>
@endsection
