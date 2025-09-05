@extends('layouts.admin')

@section('title', 'Tambah Statistik')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Tambah Statistik</h1>

        <form action="{{ route('admin.beranda.statistik.store') }}" method="POST">
            @include('admin.beranda.statistik.form', ['submitButtonText' => 'Simpan'])
        </form>
    </div>
@endsection
