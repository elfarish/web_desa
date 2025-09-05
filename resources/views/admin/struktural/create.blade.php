@extends('layouts.admin')

@section('content')
    @include('admin.struktural.form', [
        'title' => 'Tambah Staf',
        'route' => route('admin.struktural.store'),
        'method' => 'POST',
    ])
@endsection
