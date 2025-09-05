@extends('layouts.admin')

@section('title', 'Edit Statistik')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Edit Statistik</h1>

        <form action="{{ route('admin.beranda.statistik.update', $statistik->id) }}" method="POST">
            @method('PUT')
            @include('admin.beranda.statistik.form', ['submitButtonText' => 'Update'])
        </form>
    </div>
@endsection
