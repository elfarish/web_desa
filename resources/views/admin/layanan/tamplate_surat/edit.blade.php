@extends('layouts.admin')

@section('title', 'Edit Template Surat')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Edit Template Surat</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.layanan.tamplate_surat.update', $tamplateSurat->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.layanan.tamplate_surat.form')
                </form>
            </div>
        </div>
    </div>
@endsection
